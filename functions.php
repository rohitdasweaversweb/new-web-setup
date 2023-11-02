<?php

/*****************************************
* Weaver's Web Functions & Definitions *
*****************************************/
$functions_path = get_template_directory().'/functions/';
// $post_type_path = get_template_directory().'/inc/post-types/';
/*--------------------------------------*/
/* Optional Panel Helper Functions
/*--------------------------------------*/

require_once($functions_path.'admin-functions.php');
require_once($functions_path.'admin-interface.php');
require_once($functions_path.'theme-options.php');
function weaversweb_ftn_wp_enqueue_scripts(){
    if(!is_admin()){
        wp_enqueue_script('jquery');
        if(is_singular()and get_site_option('thread_comments')){
            wp_print_scripts('comment-reply');
			}
		}
	}
add_action('wp_enqueue_scripts','weaversweb_ftn_wp_enqueue_scripts');
function weaversweb_ftn_get_option($name){
    $options = get_option('weaversweb_ftn_options');
    if(isset($options[$name]))
        return $options[$name];
	}
function weaversweb_ftn_update_option($name, $value){
    $options = get_option('weaversweb_ftn_options');
    $options[$name] = $value;
    return update_option('weaversweb_ftn_options', $options);
	}
function weaversweb_ftn_delete_option($name){
    $options = get_option('weaversweb_ftn_options');
    unset($options[$name]);
    return update_option('weaversweb_ftn_options', $options);
	}
function get_theme_value($field){
	$field1 = weaversweb_ftn_get_option($field);
	if(!empty($field1)){
		$field_val = $field1;

		}
	return	$field_val;
	}
/*--------------------------------------*/
/* Post Type Helper Functions
/*--------------------------------------*/

// require_once($post_type_path.'testimonials.php');
// require_once($post_type_path.'teams.php');
// require_once($post_type_path.'projects.php');
// require_once($post_type_path.'perks.php');

/*--------------------------------------*/
/* Theme Helper Functions
/*--------------------------------------*/
if(!function_exists('weaversweb_theme_setup')):
	function weaversweb_theme_setup(){
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		register_nav_menus(array(
			'primary' => __('Primary Menu','weaversweb'),
			'secondary'  => __('Secondary Menu','weaversweb'),
			));

		add_theme_support('html5',array('search-form','comment-form','comment-list','gallery','caption'));
		}
	endif;
add_action('after_setup_theme','weaversweb_theme_setup');
function weaversweb_widgets_init(){
	register_sidebar(array(
		'name'          => __('Widget Area','weaversweb'),

		'id'            => 'sidebar-1',

		'description'   => __('Add widgets here to appear in your sidebar.','weaversweb'),

		'before_widget' => '<div id="%1$s" class="widget %2$s">',

		'after_widget'  => '</div>',

		'before_title'  => '<h2 class="widget-title">',

		'after_title'   => '</h2>',
		));

	}
add_action('widgets_init','weaversweb_widgets_init');




function weaversweb_scripts(){

	wp_enqueue_style('bootstrap-grid.min.css',get_template_directory_uri().'/assets/css/bootstrap-grid.min.css',array());

	wp_enqueue_style('animate.min.css',get_template_directory_uri().'/assets/css/animate.min.css',array());

	wp_enqueue_style('bootstrap.min.css',get_template_directory_uri().'/assets/css/bootstrap.min.css',array());

	wp_enqueue_style('font-awesome-all.min.css',get_template_directory_uri().'/assets/css/font-awesome-all.min.css',array());

	wp_enqueue_style('slick.css',get_template_directory_uri().'/assets/css/slick.css',array());

	wp_enqueue_style('slick-theme.css',get_template_directory_uri().'/assets/css/slick-theme.css',array());
	
   	wp_enqueue_style('custom.css',get_template_directory_uri().'/assets/css/custom.css',array());
	// Load the Internet Explorer specific script.

	global $wp_scripts;

    wp_enqueue_script('bootstrap.bundle.min.js',get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js',array('jquery'),time(),true);

	wp_enqueue_script('font-awesome-all.min.js',get_template_directory_uri().'/assets/js/font-awesome-all.min.js',array('jquery'),time(),true);

	wp_enqueue_script('slick.js',get_template_directory_uri().'/assets/js/slick.js',array('jquery'),time(),true);

	wp_enqueue_script('jquery.js',get_template_directory_uri().'/assets/js/jquery.min.js',array('jquery'),time(),true);

  	 wp_register_script('custom.js',get_template_directory_uri().'/assets/js/custom.js',array(),1,1,1);
	 
	   wp_localize_script('custom.js', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

	 wp_enqueue_script('custom.js');

    
	}
add_action('wp_enqueue_scripts','weaversweb_scripts');
add_action('wp_head','hook_javascript');
function hook_javascript() {
?>
<script type="text/javascript">
	var ajaxurl = "<?php echo admin_url('admin-ajax.php')  ?>";
</script>
<?php 
}


// Body Class

// SVG format supporter
add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype($filename, $mimes);
	return [
	'ext' => $filetype['ext'],
	'type' => $filetype['type'],
	'proper_filename' => $data['proper_filename']
	];
	
	
	}, 10, 4);
	
	
	function cc_mime_types($mimes)
	{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
	}
	add_filter('upload_mimes', 'cc_mime_types');
	
	
	function fix_svg()
	{
	echo '<style type="text/css">
	.attachment-266x266, .thumbnail img {
	width: 100% !important;
	height: auto !important;
	}
	</style>';
	}
	add_action('admin_head', 'fix_svg');

	// ==================================================register===================
	function custom_register_user() {
		// Get the serialized form data
		$serializedData = $_POST['formData'];
	    //   print_r($serializedData);die();
		// Parse the serialized data into an array
		parse_str($serializedData, $formFields);
	
		// Access specific form fields
		$username = sanitize_text_field($formFields['username']);
		// print_r($username);
		$email = sanitize_email($formFields['email']);
		$password = sanitize_text_field($formFields['password']);
	
	
		$user_id = wp_create_user($username, $password, $email);
	
			if (is_wp_error($user_id)) {
				echo json_encode(array('message' => $user_id->get_error_message()));
			} else {
				echo"success";
			}
		// Make sure to exit the script after sending the response
		wp_die();
	}
	
	add_action('wp_ajax_custom_register_user', 'custom_register_user');
	add_action('wp_ajax_nopriv_custom_register_user', 'custom_register_user');
	
	// ================================Login & logout===================

	// Login function

	function start_session() {
		if (!session_id()) {
			session_start();
		}
	}
	
	add_action('init', 'start_session');
	
function custom_user_login() {

	$serializedData = $_POST['formData'];
	// print_r($serializedData);
	parse_str($serializedData, $formFields);
	
	
	// Access specific form fields
	$username = sanitize_text_field($formFields['login-username']);
	
	$password = sanitize_text_field($formFields['login-password']);
 
    
    $user = wp_signon(array('user_login' => $username, 'user_password' => $password), false);

    if (is_wp_error($user)) {
        echo 'failed';
    } else {
		$_SESSION['user'] = $username;
        echo 'success';
    }

    wp_die();
}

add_action('wp_ajax_custom_user_login', 'custom_user_login');
add_action('wp_ajax_nopriv_custom_user_login', 'custom_user_login');

// Logout function
function custom_user_logout() {
	// print_r('sourav yessss');die();

	session_destroy(); 
	

    echo 'success';
	
	
    wp_die();
}

add_action('wp_ajax_custom_user_logout', 'custom_user_logout');
add_action('wp_ajax_nopriv_custom_user_logout', 'custom_user_logout');
