<?php /*
Template Name: Home
*/ ?>
<?php get_header();?>
	<div class="wrap2">
		<div id="RZCwrapper">    
			<div id="dnn_ContentPane" class="Col1 DNNEmptyPane"></div>
				<div class="Row">
					<div class="Col8 Left">
						<div id="dnn_leftPane" class="Col10 DNNEmptyPane"></div>
						<div class="clr"></div>
						<div id="dnn_leftPaneLowerLeft" class="Col25 Left">
							<?php dynamic_sidebar('home_left');?>
						</div>
<?php if (have_posts()) : 
		while (have_posts()) : the_post(); ?>	
						<div id="dnn_leftPaneLowerRight" class="Col73 Left">
							<div class="DnnModule DnnModule-DNN_HTML DnnModule-501">								
								<div class="DNNContainer_Title_h55 SpacingBottom">
									<div id="dnn_ctr501_ContentPane">
										<!-- Start_Module_501 -->
										<div id="dnn_ctr501_ModuleContent" class="DNNModuleContent ModDNNHTMLC">
											<div id="dnn_ctr501_HtmlModule_lblContent" class="Normal">
												<div class="row-fluid hide">
													<p class="span6" style="text-align: left;"><a href="https://www.youtube.com/watch?v=bHoLsdNTZ2M"><img src="http://www.rueziffra.com/wp-content/uploads/2016/09/rz-home-video-cover.png" alt="Rue and Ziffra, P.A. - Central Florida Attorney" /></a></p>
													<div class="span6" style="padding: 16px;">
													<h3 id="ContactLink"><a href="<?php echo get_option('home');?>/contact">
													<span class="talk">Talk to a lawyer</span><br />
													<span class="rightnow">Right Now!</span><br />
													<span class="freeconsul">Free Consultation</span><br />
													<span class="talk">Available 24/7</span></a></h3>
													</div>
												</div>
												<div class="clear"></div>
											</div>
										</div>
										<!-- End_Module_501 -->
									</div>
									<div class="clear"></div>
								</div>
							</div>
							<div class="DnnModule DnnModule-DNN_HTML DnnModule-417">
								<div class="DNNContainer_gravity">
									<div id="dnn_ctr417_ContentPane">
											<!-- Start_Module_417 -->
											
											<?php the_content();?>
											
											<!-- End_Module_417 -->
									</div>
									<div class="clear"></div>
								</div>
							</div>
<?php if(get_post_meta($post->ID, 'page_video', 1)=='1'){
	$category=get_post_meta($post->ID, 'video_cat', 1);?>
							<div class="DnnModule DnnModule-LiveContent DnnModule-792">
								<div class="DNNContainer_noTitle2">								
									<div id="dnn_ctr792_ContentPane">
										<!-- Start_Module_792 -->
										<h2 class="ContentHead"><?php $array = get_term_by('id', $category, 'video_category', 'ARRAY_A'); echo $array[name]; ?></h2>
										<div class="pinboard">
										<div id="dnn_ctr792_ModuleContent" class="DNNModuleContent ModLiveContentC">
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
										</div>
										<!-- End_Module_792 -->
									</div>
									<div class="clear"></div>
								</div>
							</div>
<?php }?>
						</div>
<?php 	endwhile;
endif; ?>
            	<div class="clr"></div>
            <div id="dnn_leftPaneBottom" class="Col10 DNNEmptyPane"></div>
            	<div class="clr"></div>
            <div id="dnn_leftPaneLowerLeftLarge" class="Col73 Left DNNEmptyPane"></div>
	    <div id="dnn_leftPaneLowerRightSmall" class="Col25 Left DNNEmptyPane"></div>
            	<div class="clr"></div>
    	</div>
		
		
        <div id="dnn_rightPane" class="Col2 Left">
			<?php dynamic_sidebar('home_right');?>
		</div>
        <div class="clr"></div>
  </div><!--End Row-->

</div><!--End RZCWrapper-->
</div>

<div class="clr"></div>
<?php include('prefooter.php');?>
<?php get_footer();?>


   