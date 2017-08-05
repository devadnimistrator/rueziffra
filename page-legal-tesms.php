<?php /*
Template Name: Page leal terms search
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
							<div class="DNNContainer_noTitle2">
								<div id="dnn_ctr418_ContentPane">
									<!-- Start_Module_418 -->
									<div id="dnn_ctr418_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
										<div id="dnn_ctr418_HtmlModule_lblContent" class="Normal">
											<?php the_content();?>
											<div class="clear"></div>
											<div class="row-fluid terms_search">
											<?php $terms = get_terms( 'legalterms_category' ); 
											$numItems = count($arr);
											$r=0; 
											$i=1;
												foreach ( $terms as $term ) { 
													$term_link = get_term_link( $term );
													if ( is_wp_error( $term_link ) ) {
														continue;
													}?>
												
													<div class="span4">
														<div style="float: left; width: 20px;"><strong><span style="font-size: medium;"><?php echo $term->name;?></span></strong></div>
														<ul style="list-style: none;">
<?php
$category = $term->term_id;
$args = array(
		'posts_per_page' => 9999,
		'post_type' => 'legalterms',
		'tax_query' => array(
			array(
				'taxonomy' => 'legalterms_category',
				'field' => 'id',
				'terms' => $category
			)
		)
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {		
		while ( $query->have_posts() ) {
		$query->the_post();?>
												<li><a href="#fancyboxID-<?php echo $i;?>" class="fancybox-inline"><?php the_title();?></a></li>
												<div style="display:none" class="fancybox-hidden">
													<div id="fancyboxID-<?php echo $i;?>" class="hentry" style="width:860px;max-width:100%;">
													<h2 class="ContentHead"><?php the_title();?></h2>
													<?php the_content();?>
													</div>
												</div>
<?php 
$i++;}
	}
			wp_reset_postdata();?>						</ul>
													</div>
												
												<?php if($r==3){$r=0;}else{$r++;} }?>
												</div>
										</div>
									</div>
									<!-- End_Module_418 -->
									<div class="clear"></div>
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