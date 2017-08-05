<?php /*
Template Name: No title
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