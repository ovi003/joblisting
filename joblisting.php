<?php 

/*

Plugin Name: Job Listing
Plugin URI: https://mhcovi.com/joblisting
Description: This is a simple but full functional job listing plugin. Where user can search jobs by categories.
Author: Ovi
Author URI: https://mhcovi.com
Liscence: GPLv2 or later
Version: 1.0.0
Text Domain: joblisting

*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

*/

defined('ABSPATH') or die('Hey! Access denied');

class Joblisting
{
	public $plugin;

	function __construct(){
		$this->plugin = plugin_basename(__FILE__);

		add_action( 'init', [ $this, 'register_joblisting'] );
	}

	public function activate(){

		$this->register_joblisting();

		flush_rewrite_rules();
	}

	public function register(){

		add_action( 'admin_enqueue_scripts' , [ $this, 'admin_enqueue' ] );

		add_action( 'wp_enqueue_scripts' , [ $this, 'enqueue' ] );

		add_action( 'admin_menu' , [ $this, 'add_settings_page' ] );

		add_filter( "plugin_action_links_$this->plugin", [ $this, 'settings_link' ] );

		add_shortcode( 'joblisting', [ $this, 'list_all_jobs' ] );

		add_action( 'init', [ $this, 'make_job_category' ] );

		add_action( 'add_meta_boxes', [ $this, 'adding_job_meta_boxes'] );

		add_action( 'save_post', [ $this, 'jl_save_metabox_field'] );

		add_action( 'wp_ajax_joblist', [ $this, 'search_jobs' ] );

		add_action( 'wp_ajax_nopriv_joblist', [ $this, 'search_jobs' ] );

		add_action( 'wp_ajax_scroll', [ $this, 'jl_infinitepaginate' ] );

		add_action( 'wp_ajax_nopriv_scroll', [ $this, 'jl_infinitepaginate' ] );
	}

	public function jl_infinitepaginate(){ 
	 
	    # Load the posts
	    $args = array(
	    	'post_type' => 'joblisting',
	    	'orderby' 	=> 'date',
	    	'order' 	=> 'DESC',
	    	'posts_per_pages' => 1,
	    	'offset'=>2
	    );

	    $jobs = new WP_Query($args);

	    require_once plugin_dir_path(__FILE__) . 'templates/job-list.php';
	 
	    exit;
	}

	public function search_jobs(){

		$keyword = $_GET['data']['q'];
		$position = $_GET['data']['position'];
		$categorie = $_GET['data']['categories'];
		

		if( isset($keyword) ){
			$args = [
				'post_type' => 'joblisting',
				's'			=> $keyword,
			];


			if(!empty($position)){
				$args['meta_query'][] = [
					'key'=>'position',
					'value'=> $position,
					'compare'=>'='
				];
			}

			if(!empty($categorie)){
				$args['tax_query'] = [
					'relation'=>'OR',
					[
						'taxonomy' => 'job_categories',
						'field'    => 'slug',
						'terms'    => $categorie,
					],
				];
			}
			$jobs = new Wp_query($args);
		}
		require_once plugin_dir_path(__FILE__) . 'templates/job-list.php';

		wp_die();

	}

	public function jl_save_metabox_field( $post_id){

			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return $post_id;
			}

			if ( ! isset( $_POST['position'] ) || ! isset( $_POST['location'] ) || ! wp_verify_nonce( $_POST['jl-meta_box_nonce'], 'joblisting_nonce' ) ) {
				return $post_id;
			}

			$meta_values['position'] = esc_textarea( $_POST['position'] );
			$meta_values['location'] = esc_textarea( $_POST['location'] );

			foreach ( $meta_values as $key => $value ) :

				if ( 'revision' === $post->post_type ) {
					return;
				}
				if ( get_post_meta( $post_id, $key, false ) ) {
					update_post_meta( $post_id, $key, $value );
				} else {
					add_post_meta( $post_id, $key, $value);
				}
				if ( ! $value ) {
					delete_post_meta( $post_id, $key );
				}
			endforeach;
	}

	public function adding_job_meta_boxes(){

		add_meta_box(
			'joblisting_meta_box',
			'Job Listing Field',
			[ $this, 'render_joblisting_metabox_fields'],
			'joblisting',
			'normal'
		);
	}
	public function render_joblisting_metabox_fields($post){

		wp_nonce_field( 'joblisting_nonce', 'jl-meta_box_nonce' );

		$position = get_post_meta( $post->ID, 'position', true );
		$location = get_post_meta( $post->ID, 'location', true );
	?>

		<div class="jl-metabox-wrapper">
			<div class="row clearfix">
				<div class="col-6">
					<div class="form-group">
						<label for="">Position</label>
						<input type="text" name="position" value="<?= esc_textarea( $position ) ?>" class="widefat">
					</div>
				</div>
				<div class="col-6">
					<div class="form-group">
						<label for="">Location</label>
						<input type="text" name="location" value="<?= esc_textarea( $location ) ?>" class="widefat">
					</div>
				</div>
			</div>
		</div>
		
	<?php }
	public function make_job_category(){
		register_taxonomy(  
		       'job_categories','joblisting',
		       [ 
		           'hierarchical' => true,  
		           'label' => 'Categories',  //Display name
		           'query_var' => true,
		           'rewrite' => [
		               'slug' => 'job_categories',
		               'with_front' => false // Don't display the category base before 
		           ]
		       ]
		   ); 
	}

	public function settings_link($links){
		$settings_link = '<a href="admin.php?page=job-listing">Settings</a>';

		array_push($links, $settings_link);

		return $links;
	}
	public function list_all_jobs(){


		require_once plugin_dir_path(__FILE__) . 'templates/search-form.php';

		$args = array(
			'post_type' => 'joblisting',
			'orderby' 	=> 'date',
			'order' 	=> 'DESC',
			'posts_per_page' => 2
		);

		$jobs = new WP_Query($args);
		
		
		require_once plugin_dir_path(__FILE__) . 'templates/job-list.php';
	}

	public function add_settings_page(){

		add_menu_page( 'Job Listing Settings', 'Job Settings', 'manage_options', 'job-listing', [ $this, 'settings_page' ], 'dashicons-store', 110 );
	}

	public function settings_page(){

		require_once plugin_dir_path(__FILE__) . 'templates/index.php';

	}

	public function deactivate(){
		flush_rewrite_rules();
	}

	public function admin_enqueue(){
		wp_enqueue_style('joblistingadmin', plugins_url('assets/css/admin.css',__FILE__));
	}

	public function enqueue(){
		wp_enqueue_style('joblistingstyle', plugins_url('assets/css/joblisting.css',__FILE__));

		wp_enqueue_script('joblistingscript', plugins_url('joblisting/assets/js/joblisting.js'),['jquery'],null,true);

		wp_localize_script('joblistingscript','ajax_url',admin_url('admin-ajax.php'));
	}

	public function register_joblisting(){
		$labels = array(
			'name'               => __( 'Jobs Listing' ),
			'singular_name'      => __( 'Job' ),
			'add_new'            => __( 'Add New Job' ),
			'add_new_item'       => __( 'Add New Job' ),
			'edit_item'          => __( 'Edit Job' ),
			'new_item'           => __( 'Add New Job' ),
			'view_item'          => __( 'View Job' ),
			'search_items'       => __( 'Search Job' ),
			'not_found'          => __( 'No jobs found' ),
			'not_found_in_trash' => __( 'No jobs found in trash' )
		);
		$supports = array(
			'title',
			'editor',
			'thumbnail',
			'comments',
			'revisions',
		);
		$args = array(
			'labels'               => $labels,
			'supports'             => $supports,
			'public'               => true,
			'capability_type'      => 'post',
			'has_archive'          => true,
			'menu_position'        => 30,
			'menu_icon'            => 'dashicons-calendar-alt',
		);
		register_post_type( 'joblisting', $args );
	}
}

if(class_exists('Joblisting')){
	$joblisting = new Joblisting();
	$joblisting->register();
}

register_activation_hook( __FILE__,[$joblisting, 'activate'] );

register_deactivation_hook( __FILE__,[$joblisting, 'deactivate'] );



