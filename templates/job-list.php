
<div id="joblist">
	<?php 
		
		while($jobs->have_posts()): $jobs->the_post(); ?>
		
		<div class="single-job">
			<h3 class="job-title">
				<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

			</h3>
			<div class="job-content">
				<div class="row" style="overflow: auto;">
					<div class="float-left">
						<strong>Position: </strong><?php echo get_post_meta( get_the_ID(), 'position', true ); ?>
					</div>
					<div class="float-right">
						<strong>Categories: </strong>
						<?php $terms = get_the_terms(get_the_ID(), 'job_categories'); ?>
						<?php 
							foreach ($terms as $key => $value) {
								if($key > 0){
									echo ', ';
								}
								echo $value->name;
							}
						?>
					</div>
				</div>
				<div class="location">
					<strong>Location:</strong>

					<?php echo get_post_meta( get_the_ID(), 'location', true ); ?>
				</div>
				
			</div>
		</div>
		
	<?php
		endwhile;


		// $total_pages = $jobs->max_num_pages;

	 //    if ($total_pages > 1){

	 //        $current_page = max(1, get_query_var('paged'));

	 //        echo paginate_links(array(
	 //            'base' => get_pagenum_link(1) . '%_%',
	 //            'format' => '/page/%#%',
	 //            'current' => $current_page,
	 //            'total' => $total_pages,
	 //            'prev_text'    => __('« prev'),
	 //            'next_text'    => __('next »'),
	 //        ));
	 //    } 


	?>

	<div class="text-center">
		<button id="loadMore">Load More</button>
	</div>
</div>