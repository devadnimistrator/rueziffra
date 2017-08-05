<?php /*
Template Name: Clean page
*/ ?>
<?php get_header();?>
	<div class="wrap2">
		<div id="RZCwrapper">
			<div class="Row">
<?php if (have_posts()) : 
		while (have_posts()) : the_post(); ?>
				<div class="Col8 Left">
					<?php the_content();?>
<?php if(get_post_meta($post->ID, 'page_video', 1)=='1'){
	$category=get_post_meta($post->ID, 'video_cat', 1);?>
					<div class="DnnModule DnnModule-LiveContent DnnModule-673">
						<div class="DNNContainer_noTitle2">
							<div id="dnn_ctr673_ContentPane">
								<!-- Start_Module_673 -->
								<h2 class="ContentHead"><?php $array = get_term_by('id', $category, 'video_category', 'ARRAY_A'); echo $array[name]; ?></h2>
								<a name="<?php echo $array[slug];?>"></a>
								<div id="dnn_ctr673_ModuleContent" class="DNNModuleContent ModLiveContentC">
									<div class="pinboard">
										<!--<div class="sortby">
											<span>Sort:</span><a href="">Recent</a><a href="">Most Viewed</a><a href="">Highest Rated</a>
										</div>-->
										<div id="dnn_ctr673_View_LC673">
											<div id="LCElementsWrapper673" class="elements_wrapper">
												<ul>
<?php
$args = array(
		'posts_per_page' => 9999,
		'post_type' => 'video',
		'tax_query' => array(
			array(
				'taxonomy' => 'video_category',
				'field' => 'id',
				'terms' => $category
			)
		)
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
		$query->the_post();?>
						
													<li class="lc_element_item">
														<a id="LC67312" class="highslide " href="<?php echo get_post_meta($post->ID, 'video_url', true); ?>"><img alt="" src="<?php the_post_thumbnail_url('video');?>"></a>
														<p class="title"><?php the_title();?></p>
													</li>
<?php 
}
	}
	wp_reset_postdata();?>	
												</ul>
											</div>
										</div>   
										<div style="clear: both"></div>
									</div>
								</div><!-- End_Module_673 -->
							</div>
							<div class="clear"></div>
						</div>
					</div>	
<?php }?>
					
				</div>
<?php 	endwhile;
endif; ?>
				<div id="dnn_rightPane" class="Col2 Left">
					<?php dynamic_sidebar('page_right');?>
				</div>
				<div class="clr"></div>
			</div><!--End Row-->
		</div>
    <?php include('prefooter.php');?>
	</div>
<?php get_footer();?>