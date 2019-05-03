<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom pagination for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';


//ADD FONTS and VCU Brand Bar
add_action('wp_enqueue_scripts', 'alt_lab_scripts');
function alt_lab_scripts() {
	$query_args = array(
		'family' => 'Roboto:300,400,700|Old+Standard+TT:400,700|Oswald:400,500,700',
		'subset' => 'latin,latin-ext',
	);
	wp_enqueue_style ( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );

	wp_enqueue_script( 'vcu_brand_bar', 'https:///branding.vcu.edu/bar/academic/latest.js', array(), '1.1.1', true );

	wp_enqueue_script( 'alt_lab_js', get_template_directory_uri() . '/js/alt-lab.js', array(), '1.1.1', true );
    }

//add footer widget areas
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - far left',
    'id' => 'footer-far-left',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - medium left',
    'id' => 'footer-med-left',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);


if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - medium right',
    'id' => 'footer-med-right',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - far right',
    'id' => 'footer-far-right',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

//set a path for IMGS

  if( !defined('THEME_IMG_PATH')){
   define( 'THEME_IMG_PATH', get_stylesheet_directory_uri() . '/imgs/' );
  }


//ACF stuff
//Biography Page

function acf_fetch_bio_question_one(){
  global $post;
  $html = '';
  $bio_question_one = get_field('bio_question_one');

    if( $bio_question_one) {      
      $html = $bio_question_one;  
     return $html;    
    }
}

function acf_fetch_bio_question_two(){
  global $post;
  $html = '';
  $bio_question_two = get_field('bio_question_two');

    if( $bio_question_two) {      
      $html = $bio_question_two;  
     return $html;    
    }
}

function acf_fetch_bio_question_three(){
  global $post;
  $html = '';
  $bio_question_three = get_field('bio_question_three');

    if( $bio_question_three) {      
      $html = $bio_question_three;  
     return $html;    
    }
}

function acf_fetch_bio_profile_picture(){
  global $post;
  $html = '';
  $bio_profile_picture = get_field('bio_profile_picture');

    if( $bio_profile_picture) {      
      $html = $bio_profile_picture;
     return '<img class="bio-profile-pic" src="'. $html .'">';    
    }
}

//CV Page


function acf_fetch_cv_interests(){
  global $post;
  $html = '';
  $cv_interests = get_field('cv_interests');

    if( $cv_interests) {      
      $html = $cv_interests;  
     return $html;    
    }
}

function acf_fetch_cv_skills(){
  global $post;
  $html = '';
  $cv_skills = get_field('cv_skills');

    if( $cv_skills) {      
      $html = $cv_skills;  
     return $html;    
    }
}

function acf_fetch_cv_academics(){
  global $post;
  $html = '';
  $cv_academics = get_field('cv_academics');

    if( $cv_academics) {      
      $html = $cv_academics;  
     return $html;    
    }
}

function acf_fetch_cv_work_history(){
  global $post;
  $html = '';
  $cv_work_history = get_field('cv_work_history');

    if( $cv_work_history) {      
      $html = $cv_work_history;  
     return $html;    
    }
}

function acf_fetch_cv_name(){
  $html = '';
  $cv_name = get_field('cv_name', 17);

    if( $cv_name) {      
      $html = $cv_name;  
     return $html;    
    }
}

function acf_fetch_cv_skills_data(){
  global $post;
  $html = '';
  $rows = get_field('cv_skills');
  
    if($rows)
    {
      echo '<ul>';

      foreach($rows as $row)
      {
        echo '<li>' . $row['type_of_skill'] . '</li>';
      }

      echo '</ul>';
    }

}


function bannerMaker(){
	global $post;
	 if ( get_the_post_thumbnail_url( $post->ID ) ) {
      //$thumbnail_id = get_post_thumbnail_id( $post->ID );
      $thumb_url = get_the_post_thumbnail_url($post->ID);
      //$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

        return '<div class="jumbotron custom-header-img" style="background-image:url('. $thumb_url .')"></div>';

    } 
}

//CUSTOMIZER PAGE

$args = array(
  'page_title'=>'Portfolio Options',
  'menu_title'=>'Portfolio Options',    
  'menu_slug'=>'portfolio-options',
  'redirect'=>true,
  'position' => '0.001',
  'capability' => 'edit_posts',
  'icon_url' => 'dashicons-universal-access-alt',
  );

acf_add_options_page( $args );




//ACF JSON SAVER
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    
    // return
    return $path;
    
}

/*
***
LAND-O-PURIFICATION
***
*/

//remove sidebar items
function remove_menus() {
  if (!is_super_admin()){
    remove_menu_page( 'index.php' );                  //Dashboard
    remove_menu_page( 'jetpack' );                    //Jetpack* 
    remove_menu_page( 'themes.php' );                 //Appearance
    remove_menu_page( 'plugins.php' );                //Plugins
    remove_menu_page( 'users.php' );                  //Users
    remove_menu_page( 'options-general.php' );        //Settings
    remove_menu_page( 'edit-comments.php' );        //comments
    remove_menu_page( 'upload.php' );        //media - can always get there through editor?
  }
}
add_action( 'admin_menu', 'remove_menus' );

//hide acf from sidebar if not super admin
add_filter('acf/settings/show_admin', 'my_acf_show_admin');

function my_acf_show_admin( $show ) {
    
    return is_super_admin();
    
}

//redirects from dashboard to posts and removes the dashboard menu item
function remove_the_dashboard () {
    global $menu, $submenu, $user_ID;
    $the_user = new WP_User($user_ID);
    reset($menu); $page = key($menu);
    while ((__('Dashboard') != $menu[$page][0]) && next($menu))
    $page = key($menu);
    if (__('Dashboard') == $menu[$page][0]) unset($menu[$page]);
    reset($menu); $page = key($menu);
    while (!$the_user->has_cap($menu[$page][1]) && next($menu))
    $page = key($menu);
    if (preg_match('#wp-admin/?(index.php)?$#',$_SERVER['REQUEST_URI']) && ('index.php' != $menu[$page][2]))
    wp_redirect(get_option('siteurl') . '/wp-admin/admin.php?page=acf-options-portfolio-options');
}
add_action('admin_menu', 'remove_the_dashboard');

//hide bio page from page list
function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );
