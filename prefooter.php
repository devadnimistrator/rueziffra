<div class="clr"></div>

<div id="footer">
        <div id="dnn_FooterImage" class="Row DNNEmptyPane"></div>
		<div class="Row foothead">
			<h3 class="FootHeader">Office Locations</h3>
			<div class="Col7 Left Pad">
<p class="FootText">
<strong>Port Orange: </strong> &bull; 632 Dunlawton Ave. &bull; Port Orange, FL 32127 &bull; (386) 788-7700<br />
<strong>DeLand: </strong> &bull; 101 N. Woodland Blvd., Ste. 213 &bull; DeLand, FL 32720 &bull; (386) 668-6292<br />
<strong>Palm Coast: </strong> &bull; 389 Palm Coast Pkwy. SW, Ste.4 &bull; Palm Coast, FL 32137 &bull; (386) 439-0249
<br /><span>© 2017 Rue & Ziffra by <a href="http://webdaytona.com">Web Daytona</a></span>
				</p>
			</div>
			<div class="Col2 Left">
				<?php
									if(function_exists('wp_nav_menu'))
										wp_nav_menu( array( 'menu_class' => 'FootTextL', 'container' => 'none', 'theme_location' => 'menu_footer') );
									else
										wp_page_menu('show_home=1&menu_class=FootTextL&title_li=&depth=1&sort_column=menu_order');
								?>
			</div>
			<div class="clr"></div>
		</div>		
    </div>
</div><!--/footer-->