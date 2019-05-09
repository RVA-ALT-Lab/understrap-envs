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

/**
 * Minimal-ize the backend
 */
require get_template_directory() . '/inc/minimal.php';

/**
 * Extra Tools text
 */
require get_template_directory() . '/inc/extras-text.php';



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
/* Now this done on the options page
*/

//Options page


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
  $rows = get_field('cv_work_history');

    if($rows)
    {
      echo '<div class="cv-work-history col-md-12">';

      foreach($rows as $row)
      {
        echo '<div class="work-title-stuff">' . $row['work_institution'] . ' - ' . $row['work_position_title'] . '</div> <div class="work-duites">'. $row['work_responsibilities'] . '</div> <div class="work-dates">' . $row['work_start_date'] . ' – ' . $row['work_end_date'] .'</div>';
      }

      echo '</div>';
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

function acf_fetch_cv_academic_major(){
  global $post;
  $html = '';
  $rows = get_field('cv_academics');
  
    if($rows)
    {
      echo '<div class="majors"><ul>';

      foreach($rows as $row)
      {
        echo '<li>' . $row['majors'] . '</li>';
      }

      echo '</ul></div>';
    }

}

function acf_fetch_cv_academic_minor(){
  global $post;
  $html = '';
  $rows = get_field('cv_academics');
  // print("<pre>".print_r($rows,true)."</pre>");

  if($rows)
    {
      if($rows[0]['minors'])
        
        {
          echo '<div class="minors"><h4>Minor</h4><ul>';
        }

      foreach($rows as $row)
      {
        if($row['minors'])
          {
          echo '<li>' . $row['minors'] . '</li>';
          }
      }

      echo '</ul></div>';
    }

}

function acf_fetch_cv_coursework_data(){
  global $post;
  $html = '';
  $rows = get_field('cv_coursework');
  // print("<pre>".print_r($rows,true)."</pre>");
  
    if($rows)
    {
      echo '<div class="cv-courseinfo col-md-12">';

      foreach($rows as $row)
      {
        echo '<div class="row"><div class="course-number col-md-3">' . $row['course_number'] . '</div> <div class="course-title col-md-3">'. $row['course_title'] . '</div> <div class="course-semester col-md-3">'. $row['course_semester'] . '</div> <div class="course-year col-md-3">'. $row['course_year'] . '</div></div>';
      }

      echo '</div>';
    }

}

// function acf_fetch_cv_coursework_compress(){
//   global $post;
//   $html = '';
//   $rows = get_field('cv_coursework');
//   print("<pre>".print_r($rows,true)."</pre>");
  
//     if($rows)
//     {
//       echo '<div class="cv-courseinfo"><ul>';

//       foreach($rows as $row)
//       {
//         echo '<div class="chunk"><li>' . $row['course_number'] . '</li>';
//         echo '<li>' . $row['course_title'] . '</li>';
//         echo '<li>' . $row['course_semester'] . '</li>';
//         echo '<li>' . $row['course_year'] . '</li></div>';
//       }

//       echo '</ul></div>';
//     }
// }


function acf_fetch_cv_graduation(){
  $html = '';
  $graduation_date = get_field('expected_graduation_date');

    if( $graduation_date) {      
      $html = $graduation_date;  
     return $html;    
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

function menu_maker(){
  $html = '';
  $base_url = get_site_url();
  if(get_field('menu_cats', 'option')){
    $cats = get_field('menu_cats', 'option');
    foreach ($cats as $cat) {
      $html .= '<li><a href="' . $base_url . '/category/' . $cat->slug .'">' . $cat->name . '</a></li>'; 
    }
    return $html;
  } else {
    popular_categories();//if not set via ACF then show three most popular
  }
 
}


function popular_categories(){
  $html = '';
  $base_url = get_site_url();
  $cats = get_categories( array(
      'orderby' => 'count',
      'order'   => 'ASC',
      'hide_empty' =>  true,      
  ) );
  foreach ($cats as $key => $cat) {
    if ( $key < 3){
      $html .= '<li><a href="' . $base_url . '/category/' . $cat->slug .'">' . $cat->name . '</a></li>'; 
    } 
  }
    return $html;
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

