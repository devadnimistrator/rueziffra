<?php
	// main picture
	add_theme_support( 'post-thumbnails' );
	
		// size thumbnail
	add_image_size( 'video', 180, 135, true ); 

	// register menus
	if(function_exists('register_nav_menus')) {
		register_nav_menus( array(
			'menu_head' => __('Header navigation'),
			//'menu_main' => __('Main navigation'),
			'menu_footer' => __('Footer navigation'),
		));
	}
	function my_wp_nav_menu_args($args=''){  
    $args['container'] = '';  
    return $args;  
} // function  
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );  

// pagination
function wp_corenavi() {
   global $wp_query, $wp_rewrite;
   $pages = '';
   $max = $wp_query->max_num_pages;
   if (!$current = get_query_var('paged')) $current = 1;
   $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
   $a['total'] = $max;
   $a['current'] = $current;

   $total = 0; //1 - выводить текст "Страница N из N", 0 - не выводить
   $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
   $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
   $a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
   $a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"

   if ($max > 1) echo '<div class="pagination">';
   //if ($total == 1 && $max > 1) $pages = '<span class="pages">Страница ' . $current . ' из ' . $max . '</span>'."\r\n";
   echo $pages . paginate_links($a);
   if ($max > 1) echo '</div>';
}

if (function_exists('register_sidebar')) {
    
	register_sidebar(array(
      'id' => 'home_left',
      'name' => 'Home left Sidebar', 
      'description' => 'add', 
      'before_widget' => '<div id="%1$s" class="widget_home_left DnnModule-DNN_HTML DnnModule %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="Marr"><span id="dnn_ctr799_dnnTITLE_titleLabel" class="TitleH33">',
      'after_title' => '</span></h3>', 
    ));
	register_sidebar(array(
      'id' => 'home_right',
      'name' => 'Home right Sidebar', 
      'description' => 'add', 
      'before_widget' => '<div id="%1$s" class="widget_home_right DnnModule-DNN_HTML DnnModule %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h2 class="Marr"><span id="dnn_ctr420_dnnTITLE_titleLabel" class="TitleH2">',
      'after_title' => '</span></h2>', 
    ));
	register_sidebar(array(
      'id' => 'page_right',
      'name' => 'Page right Sidebar', 
      'description' => 'add', 
      'before_widget' => '<div id="%1$s" class="widget_page_right DnnModule-DNN_HTML DnnModule %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="Marr"><span id="dnn_ctr799_dnnTITLE_titleLabel" class="TitleH33">',
      'after_title' => '</span></h3>', 
    ));
	}

// Creating the widget 
class wpb_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'wpb_widget', 

// Widget name will appear in UI
__('Files list', 'wpb_widget_domain'), 

// Widget description
array( 'description' => __( 'Files list', 'wpb_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
global $post;
	$tmp_post = $post;
	$args = array(
		'numberposts' => 9999,
		'post_type' => 'files',
	);
	$myposts = get_posts( $args );
	foreach( $myposts as $post ) : setup_postdata($post);?>
		<div class="file">
			<a href="<?php echo get_post_meta($post->ID, 'pdf_file', true);?>"><?php the_title();?></a><span><?php echo get_post_meta($post->ID, 'file_description', true);?></span>
        </div>
<?php endforeach;
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( '', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

function improved_trim_excerpt($text) {
	global $post;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
		$text = strip_tags($text, '<p>');
		$excerpt_length = 100;
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words)> $excerpt_length) {
			array_pop($words);
			array_push($words, '');
			$text = implode(' ', $words);
		}
	}
	return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'improved_trim_excerpt');

/* Підключення налаштувань, типів постів, додаткових полів */
//require_once(TEMPLATEPATH . '/functions/options.php');
require_once(TEMPLATEPATH . '/functions/post-type.php');
require_once(TEMPLATEPATH . '/functions/extra-fields.php');
remove_filter( 'sanitize_title', 'sanitize_title_with_dashes' );
add_filter( 'sanitize_title', 'wpse5029_sanitize_title_with_dashes' );
function wpse5029_sanitize_title_with_dashes($title) {
    $title = strip_tags($title);
    // Preserve escaped octets.
    $title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
    // Remove percent signs that are not part of an octet.
    $title = str_replace('%', '', $title);
    // Restore octets.
    $title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

    $title = remove_accents($title);
    if (seems_utf8($title)) {
        //if (function_exists('mb_strtolower')) {
        //    $title = mb_strtolower($title, 'UTF-8');
        //}
        $title = utf8_uri_encode($title, 200);
    }

    //$title = strtolower($title);
    $title = preg_replace('/&.+?;/', '', $title); // kill entities
    $title = str_replace('.', '-', $title);
    // Keep upper-case chars too!
    $title = preg_replace('/[^%a-zA-Z0-9 _-]/', '', $title);
    $title = preg_replace('/\s+/', '-', $title);
    $title = preg_replace('|-+|', '-', $title);
    $title = trim($title, '-');

    return $title;
}
/* Views */
add_action('wp_head', 'kama_postviews');
function kama_postviews() {

/* ------------ Options -------------- */
$meta_key		= 'views';	
$who_count 		= 0;
$exclude_bots 	= 1;

global $user_ID, $post;
	if(is_singular()) {
		$id = (int)$post->ID;
		static $post_views = false;
		if($post_views) return true; 
		$post_views = (int)get_post_meta($id,$meta_key, true);
		$should_count = false;
		switch( (int)$who_count ) {
			case 0: $should_count = true;
				break;
			case 1:
				if( (int)$user_ID == 0 )
					$should_count = true;
				break;
			case 2:
				if( (int)$user_ID > 0 )
					$should_count = true;
				break;
		}
		if( (int)$exclude_bots==1 && $should_count ){
			$useragent = $_SERVER['HTTP_USER_AGENT'];
			$notbot = "Mozilla|Opera"; 
			$bot = "Bot/|robot|Slurp/|yahoo";
			if ( !preg_match("/$notbot/i", $useragent) || preg_match("!$bot!i", $useragent) )
				$should_count = false;
		}

		if($should_count)
			if( !update_post_meta($id, $meta_key, ($post_views+1)) ) add_post_meta($id, $meta_key, 1, true);
	}
	return true;
}


?>