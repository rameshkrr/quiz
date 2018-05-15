<?php 

// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
remove_action('welcome_panel', 'wp_welcome_panel');

//Hide Your WordPress Version Number
function wpb_remove_version() {
return '';
}
add_filter('the_generator', 'wpb_remove_version');

// enable threaded comments
function enable_threaded_comments(){
	if (!is_admin()) {
		if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script('comment-reply');
		}
}
add_action('get_header', 'enable_threaded_comments');

//add menus
function tailor_menu_support(){
	
	add_theme_support('menus');
	register_nav_menu('primary','primary navigation');
	register_nav_menu('secondary','footer navigation');	
}
add_action('init','tailor_menu_support' );

//add thumbnail
add_theme_support( 'post-thumbnails' ); 

//enable html5
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

//user social links
function add_to_author_profile( $contactmethods ) {
	
	$contactmethods['rss_url'] = 'Instagram';
	$contactmethods['google_profile'] = 'Google Profile URL';
	$contactmethods['twitter_profile'] = 'Twitter Profile URL';
	$contactmethods['facebook_profile'] = 'Facebook Profile URL';
	$contactmethods['linkedin_profile'] = 'Linkedin Profile URL';
	$contactmethods['pintrest_profile'] = 'Pintrest Profile URL';
	
	return $contactmethods;
}
add_filter( 'user_contactmethods', 'add_to_author_profile', 10, 1);

//add scripts

function tailor_addScript(){

	//stylesheets
	wp_enqueue_style('bootstrap',get_template_directory_uri() . '/css/bootstrap.min.css', array(), '5.0', 'all' );
	wp_enqueue_style('font-awesome' , get_template_directory_uri(). '/css/fontawesome.min.css', array(), '5.0' , 'all');
	wp_enqueue_style('customeStyle' , get_template_directory_uri(). '/css/style.css', array(), '6.0' , 'all');		
	
	//scripts
	wp_register_script('jquery', get_template_directory_uri() .'/js/jquery.min.js',true);
	wp_register_script('bootstrapjs', get_template_directory_uri() .'/js/bootstrap.min.js',true);
    wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrapjs' );
	}
add_action('wp_enqueue_scripts','tailor_addScript');
