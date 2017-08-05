<?php 
/*========== page EXTRA FIELDS ========*/
add_action('admin_init', 'page_extra_fields', 1);
function page_extra_fields(){
add_meta_box('extra_fields', 'Options', 'page_extra_fields_box_func', 'page', 'normal', 'high');
}
function page_extra_fields_box_func($post){?>	
			<p>
				<label style="width:150px; display:inline-block;">Enable video block?</label>
				<select class="multilang" name="extra[page_video]" />
						<?php $sel_v = get_post_meta($post->ID, 'page_video', 1); ?>
						<option value="0">NO</option>
						<option value="1" <?php selected( $sel_v, '1' )?>>YES</option>
				</select>
			</p>
			<p>
				<label style="width:150px; display:inline-block;">Video category?</label>
				<select class="multilang" name="extra[video_cat]" />
					<?php $sel_v = get_post_meta($post->ID, 'video_cat', 1); ?>
						<?php $terms = get_terms( 'video_category' ); 
						foreach ( $terms as $term ) { 
							$term_link = get_term_link( $term );
							if ( is_wp_error( $term_link ) ) {
								continue;
							}?>
							<option value="<?php echo $term->term_id; ?>" <?php selected( $sel_v, ''.$term->term_id.'' )?>><?php echo $term->name;?></option>
						<?php }?>
				</select>
				
			</p>
<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?}
add_action('save_post', 'page_extra_fields_update', 0);
function page_extra_fields_update($post_id){
if (!wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__))return false;
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return false;
if (!current_user_can('edit_post', $post_id)) return false;
if (!isset($_POST['extra'])) return false;
$_POST['extra'] = array_map('trim', $_POST['extra']);
foreach( $_POST['extra'] as $key=>$value ){
if(empty($value)){
delete_post_meta($post_id, $key);
continue;
}
update_post_meta($post_id, $key, $value);
}
return $post_id;
}
/*========== END page EXTRA FIELDS ========*/
/*========== video EXTRA FIELDS ========*/
add_action('admin_init', 'video_extra_fields', 1);
function video_extra_fields(){
add_meta_box('extra_fields', 'Options', 'video_extra_fields_box_func', 'video', 'normal', 'high');
}
function video_extra_fields_box_func($post){?>	
		<h3>Video url:</h3>
		<input type="text" size="90" name="extra[video_url]" value="<?php echo get_post_meta($post->ID, 'video_url', true); ?>" />
		<br />
<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?}
add_action('save_post', 'video_extra_fields_update', 0);
function video_extra_fields_update($post_id){
if (!wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__))return false;
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return false;
if (!current_user_can('edit_post', $post_id)) return false;
if (!isset($_POST['extra'])) return false;
$_POST['extra'] = array_map('trim', $_POST['extra']);
foreach( $_POST['extra'] as $key=>$value ){
if(empty($value)){
delete_post_meta($post_id, $key);
continue;
}
update_post_meta($post_id, $key, $value);
}
return $post_id;
}
/*========== END video EXTRA FIELDS ========*/

function upload_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_bloginfo('template_directory').'/functions/custom_uploader.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
} 
function upload_styles() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'upload_scripts'); 
add_action('admin_print_styles', 'upload_styles');
?>