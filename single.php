<?php get_header();?>
	<div class="wrap2">
		<div id="RZCwrapper">
			<div class="Row">
				<div class="Col8 Left">
					<div id="dnn_leftPane" class="Col10">
<?php if (have_posts()) : 
		while (have_posts()) : the_post(); ?>
						<div class="DnnModule DnnModule-EasyDNNnews DnnModule-1094">
							<div class="DNNContainer_noTitle2">
								<div id="dnn_ctr1094_ContentPane">
									<!-- Start_Module_1094 -->
									<div id="dnn_ctr1094_ModuleContent" class="DNNModuleContent ModEasyDNNnewsC">
										<div id="EDN_NewsOne" class="news eds_subCollection_news eds_news_NewsOne eds_template_Details_Article_Default eds_templateGroup_newsDetailsDefault eds_styleSwitchCriteria_portalSettingsSource">
											<div id="dnn_ctr1094_ViewEasyDNNNewsMain_ctl00_pnlViewArticle">
												<div class="article details">
													<div class="article_image left_image" style="display:none;">
				
				
													</div>
													<h1><?php the_title();?></h1>
													<p class="meta_text no_margin">
														Author: <?php the_author(); ?>
														<span class="separator">/</span>
														<?php the_time('F j, Y');?>
														<span class="separator">/</span>
														Categories: <?php the_category(', ');?>
													</p>
													<div class="clear_content"></div>
													<div class="main_content">
														<?php the_content();?>
														<div class="clear_content"></div>
													</div>
													<p class="meta_text eds_viewsComments">Number of views (<?php echo get_post_meta ($post->ID,'views',true); ?>)<span class="separator">/</span>Comments (<?php comments_number( '0', '1', '%' ); ?>)</p>
													<div class="box_list_container">Tags: <?php the_tags(', ');?></div>
		
													<div id="dnn_ctr1094_ViewEasyDNNNewsMain_ctl00_upPanelComments">
														
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- End_Module_1094 -->
								</div>
								<div class="clear"></div>
							</div>
						</div>
<?php 	endwhile;
endif; ?>						
					</div>
				</div>
				<div id="dnn_rightPane" class="Col2 Left">
					<?php dynamic_sidebar('page_right');?>
				</div>
				<div class="clr"></div>
			</div><!--End Row-->
		</div>
    <?php include('prefooter.php');?>
	</div>
<?php get_footer();?>