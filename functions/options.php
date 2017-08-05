<?php
function additional_mime_types( $mimes ) {
	$mimes['rar'] = 'application/x-rar-compressed';
	$mimes['swf'] = 'application/x-shockwave-flash';

	return $mimes;
}
add_filter( 'upload_mimes', 'additional_mime_types' );
// user menu
add_action('admin_menu', 'omr_create_menu');
function omr_create_menu() {
// first level menu
add_menu_page('Theme options', 'Theme options', 'administrator', 
__FILE__, 'omr_settings_page', ''.get_bloginfo('stylesheet_directory').'/functions/ico.png');

// call function register settings
add_action( 'admin_init', 'register_mysettings' );
}

function mytheme_add_init() {
    if ( is_admin() ) {
        wp_enqueue_style("functions", "".get_bloginfo('stylesheet_directory')."/functions/functions.css", false, "1.0", "all");
        wp_enqueue_script("rm_script", "".get_bloginfo('stylesheet_directory')."/functions/script.js", false, "1.0");
    }
}
add_action( 'admin_print_styles', 'mytheme_add_init' );

function register_mysettings() {
// register ssetings
register_setting( 'omr-settings-group', 'ok_logo' );
register_setting( 'omr-settings-group', 'ok_phone' );
register_setting( 'omr-settings-group', 'ok_fb' );
register_setting( 'omr-settings-group', 'ok_tw' );
register_setting( 'omr-settings-group', 'ok_copyright' );
register_setting( 'omr-settings-group', 'ok_ga_code' );
}
function omr_settings_page() {
?>
<div class="wrap">
<h1>General Settings</h1>

<form method="post" action="options.php">
<?php settings_fields('omr-settings-group'); ?>

<div class="rm_section">
	<div class="rm_title">
		<h3><img src="<?php bloginfo('stylesheet_directory'); ?>/functions/3.gif" class="inactive" alt=""/>
		Other options</h3>
	<div class="clearfix"></div>
	</div>
	<div class="rm_options">
		<div class="rm_input rm_text">
			<!--<div class="section_block">
				<h3>First block</h3>
				<p><label for="ok_certification_title_1">Title:</label>
				<input id="ok_certification_title_1" type="text" size="90" name="ok_certification_title_1" value="<?php echo get_option('ok_certification_title_1'); ?>" /></p>				
				<?php
				$content = get_option('ok_certification_content_1');;
				$editor_id = 'ok_certification_content_1';
				wp_editor( $content, $editor_id );
				?>
			</div>	-->
			<p>
				<span>Logo:</span>
			</p>
			<p>				
				<input type="text" size="75" id="ok_logo" name="ok_logo" value="<?php echo get_option('ok_logo'); ?>" class="large-text" />
				<input type="button" class="media-button button" name="custom_image_btn" value="Загрузить" />
			</p>
			<p>
				<label for="ok_phone">Phone:</label>
				<input id="ok_phone" type="text" size="90" name="ok_phone" value="<?php echo get_option('ok_phone'); ?>" />
			</p>
			<p>
				<label for="ok_fb">Facebook url:</label>
				<input id="ok_fb" type="text" size="90" name="ok_fb" value="<?php echo get_option('ok_fb'); ?>" />
			</p>
			<p>
				<label for="ok_tw">Twitter url:</label>
				<input id="ok_tw" type="text" size="90" name="ok_tw" value="<?php echo get_option('ok_tw'); ?>" />
			</p>
			<p>
				<label for="ok_copyright" style="display:block;">Copyrite</label>
				<textarea class="multilang" name="ok_copyright" style="width:320px;height:150px;" type="textarea" ><?php echo get_option('ok_copyright'); ?></textarea>
			</p>
			<p>
				<label for="ok_ga_code" style="display:block;">Google Analytics</label>
				<textarea class="multilang" name="ok_ga_code" style="width:320px;height:150px;" type="textarea" ><?php echo get_option('ok_ga_code'); ?></textarea>
			</p>
		<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<p class="submit">
<input style="width:350px;" type="submit" class="button-primary" value="Save" 
/>
</p>
</form>
</div>
<?php } ?>