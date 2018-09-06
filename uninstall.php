<?php 

if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    die();
}

global $wpdb;
$posts = $wpdb->prefix.'posts';
$postsMeta = $wpdb->prefix . 'postmeta';
$termRelationship = $wpdb->prefix . 'term_relationships';

$wpdb->query("DELETE FROM {$posts} WHERE post_type='post_type'");
$wpdb->query("DELETE FROM {$postsMeta} WHERE post_id NOT IN (SELECT id FROM {$posts})");
$wpdb->query("DELETE FROM {$termRelationship} WHERE object_id NOT IN (SELECT id FROM {$posts})");