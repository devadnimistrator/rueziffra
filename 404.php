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
													
<?php 	endwhile;
else:?>
<span valign="top">
														<!--ArticleTemplate-->
														<div class="article in_list span">
															<div class="content">
																<h1>Error 404</h1>
																<p>Sorry, the page you are looking for cannot be found and might have been removed, had its name changed, or is temporarily unavailable. It is recommended that you start again from the homepage. Feel free to contact us if the problem persists or if you definitely cannot find what you’re looking for.</p>
															</div>
														</div>
													</span>
<?php endif; ?>
												</span>	
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