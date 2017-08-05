<?php get_header();?>
	<div class="wrap2">
		<div id="RZCwrapper">
			<div class="Row">
				<div class="Col8 Left">
					<div id="dnn_leftPane" class="Col10">
						<div class="DnnModule DnnModule-EasyDNNnews DnnModule-1094">
							<div class="DNNContainer_noTitle2">
								<div id="dnn_ctr1094_ContentPane">
									<!-- Start_Module_1094 -->
									<div id="dnn_ctr1094_ModuleContent" class="DNNModuleContent ModEasyDNNnewsC">
										<div id="EDN_NewsOne" class="news eds_subCollection_news eds_news_NewsOne eds_template_List_Article_Default eds_templateGroup_newsListDefault eds_styleSwitchCriteria_portalSettingsSource">
											<div id="dnn_ctr1094_ViewEasyDNNNewsMain_ctl00_pnlListArticles">	
												<!--ArticleRepeat:Before:-->
												<span id="dnn_ctr1094_ViewEasyDNNNewsMain_ctl00_dlArticleList" class="edn_1094_article_list_wrapper">
<?php if (have_posts()) : 
		while (have_posts()) : the_post(); ?>
													<span valign="top">
														<!--ArticleTemplate-->
														<div class="article in_list span">
															<div class="content">
																<h1><a href="<?php the_permalink();?>" target="_self"><?php the_title();?></a></h1>
																<h2 class="edn_subTitle"></h2>
																<div class="summary">
																	<?php the_content();?>
																</div>
															</div>
															<div class="meta_text">
																Author: <?php the_author(); ?>
																<span class="separator">/</span>
																Number of views (<?php echo get_post_meta ($post->ID,'views',true); ?>)
																<span class="separator">/</span>
																Comments (<?php comments_number( '0', '1', '%' ); ?>)
															</div>
															<div class="box_list_container clear_bottom">Categories: <?php the_category(' ');?></div>
															<div class="box_list_container">Tags: <?php the_tags(' ');?></div>
														</div>
													</span>
<?php 	endwhile;
endif; ?>
												</span>	
												<div id="dnn_ctr1094_ViewEasyDNNNewsMain_ctl00_pnlArticlePager" class="article_pager">
													<?php wp_corenavi();?>
												</div>
											</div>		
										</div>		
									</div>		
								</div>		
							</div>		
						</div>	
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