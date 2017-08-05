<?php /*
Template Name: Page RESOURCES
*/ ?>
<?php get_header();?>
	<div class="wrap2">
		<div id="RZCwrapper">
			<div class="Row">
<?php if (have_posts()) : 
		while (have_posts()) : the_post(); ?>
				<div class="Col8 Left">
					<div id="dnn_leftPane" class="Col10">
						<div class="DnnModule DnnModule-DNN_HTML DnnModule-418">
							<a name="418"></a>
							<div class="DNNContainer_noTitle2">
								<div id="dnn_ctr418_ContentPane">
									<!-- Start_Module_418 -->
									<div id="dnn_ctr418_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
										<div id="dnn_ctr418_HtmlModule_lblContent" class="Normal">
											<?php the_content();?>
											<?php $terms = get_terms( 'resources_category' ); 
											$i=1;
												foreach ( $terms as $term ) { 
													$term_link = get_term_link( $term );
													if ( is_wp_error( $term_link ) ) {
														continue;
													}?>
													<h4 class="ContentHeadRed"><?php echo $term->name;?></h4>
													
<?php
$category = $term->term_id;
$args = array(
		'posts_per_page' => 9999,
		'post_type' => 'resources',
		'tax_query' => array(
			array(
				'taxonomy' => 'resources_category',
				'field' => 'id',
				'terms' => $category
			)
		)
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {		
		while ( $query->have_posts() ) {
		$query->the_post();?>
												<a href="#fancyboxID-<?php echo $i;?>" class="fancybox-inline"><?php the_title();?></a><br />
												<div style="display:none" class="fancybox-hidden">
													<div id="fancyboxID-<?php echo $i;?>" class="hentry" style="width:860px;max-width:100%;">
													<h2 class="ContentHead"><?php the_title();?></h2>
													<?php the_content();?>
													</div>
												</div>
<?php 
$i++;}
	}
	wp_reset_postdata();?>													
												<?php }?>
										</div>
									</div>
									<!-- End_Module_418 -->
								</div>
								<div class="clear"></div>
							</div>
						</div>
					</div>
					<div class="clr"></div>
					<div id="dnn_leftPaneLowerLeft" class="Col25 Left DNNEmptyPane"></div>
					<div id="dnn_leftPaneLowerRight" class="Col73 Left DNNEmptyPane"></div>
					<div class="clr"></div>
					<div id="dnn_leftPaneBottom" class="Col10 DNNEmptyPane"></div>
					<div class="clr"></div>
					<div id="dnn_leftPaneLowerLeftLarge" class="Col73 Left DNNEmptyPane"></div>
					<div id="dnn_leftPaneLowerRightSmall" class="Col25 Left DNNEmptyPane"></div>
					<div class="clr"></div>
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