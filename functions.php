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


//auto activate ACF PRO
activate_plugin( 'advanced-custom-fields-pro/acf.php' );


//ADD FONTS and VCU Brand Bar
add_action('wp_enqueue_scripts', 'alt_lab_scripts');
function alt_lab_scripts() {
	$query_args = array(
		'family' => 'Open Sans:300,400,700|Playfair Display:400,700|Oswald:400,500,700',
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

function acf_fetch_cv_uploader(){
  global $post;
  $html = '';
  $exists = get_field('cv_uploader');
  // print("<pre>".print_r($exists,true)."</pre>");

    if($exists) {

      return '<div class="card"><a href="' . $exists . '">Download my full CV <i class="fa fa-arrow-down" aria-hidden="true"></i></a></div>';
    }
}

function acf_fetch_capstone_main(){
  $html = '';
  $cap_content = get_field('cap_content');

    if( $cap_content) {      
      $html = $cap_content;  
     return $html;    
    }
}

function acf_fetch_capstone_notes(){
  $html = '';
  $cap_notes_aside = get_field('cap_notes_aside');

    if( $cap_notes_aside) {      
      
      echo '<div class="envs-notes-prompt"><h3>Notes</h3></div>';
      $html = $cap_notes_aside;  
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

function where_am_i($menu_slug){
  $current_slug = get_queried_object()->slug;
  // var_dump ($menu_slug);
  // var_dump ($current_slug);
  if ($menu_slug == $current_slug){
    return 'class="active"';
  }
}


function menu_maker(){
  $html = '';
  $base_url = get_site_url();

  if(get_field('menu_cats', 'option')){
    $cats = get_field('menu_cats', 'option');
    foreach ($cats as $cat) {
      $html .= '<li '. where_am_i($cat->slug) .'><a href="' . $base_url . '/category/' . $cat->slug .'">' . $cat->name . '</a></li>'; 
    }
    return $html;
  } else {
    return popular_categories();//if not set via ACF then show three most popular
  }
 
}


function popular_categories(){
  $html = '';
  $base_url = get_site_url();
  $cats = get_categories( array(
      'orderby' => 'count',
      'order'   => 'DESC',
      'hide_empty' =>  true,      
  ) );
  foreach ($cats as $key => $cat) {   
    if ( $key < 3){      
      $html .= '<li><a href="' . $base_url . '/category/' . $cat->slug .'">' . $cat->name . '</a></li>'; 
    } 
  }
   return $html;
}



//MAKE SURE ACF IS ON
if( class_exists('acf') ) {
//CUSTOMIZER PAGE

//if (is_plugin_active('advanced-custom-fields-pro')){
  $args = array(
    'page_title'=>'Portfolio Options',
    'menu_title'=>'Portfolio Options',    
    'menu_slug'=>'portfolio-options',
    'redirect'=>true,
    'position' => '0.001',
    'capability' => 'edit_posts',
    'icon_url' => 'dashicons-admin-site'
    );

  acf_add_options_page( $args );
//}
}

if( function_exists('acf_add_local_field_group') ):

  acf_add_local_field_group(array(
    'key' => 'group_5ccc70a378ace',
    'title' => 'Basic Information',
    'fields' => array(
      array(
        'key' => 'field_5ccc70b921d02',
        'label' => 'Your Name:',
        'name' => 'name',
        'type' => 'text',
        'instructions' => 'Please enter your name as you\'d like it to be displayed.',
        'required' => 1,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_5ccc71e484d50',
        'label' => 'Profile Picture',
        'name' => 'profile_picture',
        'type' => 'image',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'array',
        'preview_size' => 'medium',
        'library' => 'all',
        'min_width' => '',
        'min_height' => '',
        'min_size' => '',
        'max_width' => '',
        'max_height' => '',
        'max_size' => '',
        'mime_types' => '',
      ),
      array(
        'key' => 'field_5ccc7105d9f73',
        'label' => 'Who am I, and where am I from?',
        'name' => 'bio_question_1',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 1,
        'delay' => 0,
      ),
      array(
        'key' => 'field_5ccc71b0f08f5',
        'label' => 'What does Sustainability mean to me?',
        'name' => 'bio_question_2',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 1,
        'delay' => 0,
      ),
      array(
        'key' => 'field_5ccc722de88bd',
        'label' => 'How do I plan to innovate a more sustainable future?',
        'name' => 'bio_question_3',
        'type' => 'wysiwyg',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 1,
        'delay' => 0,
      ),
      array(
        'key' => 'field_5cd187bfd9656',
        'label' => 'What Post categories do you want in your PROJECTS menu?',
        'name' => 'menu_cats',
        'type' => 'taxonomy',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'taxonomy' => 'category',
        'field_type' => 'checkbox',
        'add_term' => 1,
        'save_terms' => 0,
        'load_terms' => 0,
        'return_format' => 'object',
        'multiple' => 0,
        'allow_null' => 0,
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'options_page',
          'operator' => '==',
          'value' => 'portfolio-options',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
  ));
  
  acf_add_local_field_group(array(
    'key' => 'group_5ccb375cb5f5e',
    'title' => 'Capstone',
    'fields' => array(
      array(
        'key' => 'field_5cd457d7fb05c',
        'label' => 'Content',
        'name' => 'cap_content',
        'type' => 'wysiwyg',
        'instructions' => 'This will be a flexible section. Early-stage student will likely have a stated interest paragraph, while students with completed capstones should have a content-heavy. For early stage students, I would ask them to come up with ideas for the following, but have them combine them as prose.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => 'Working Title:
  
  Objective:
  
  Skills:
  
  Intended Outcome:',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 1,
        'delay' => 0,
      ),
      array(
        'key' => 'field_5cd46ccf9c0a6',
        'label' => 'Notes aside',
        'name' => 'cap_notes_aside',
        'type' => 'wysiwyg',
        'instructions' => 'This is an optional area for you to highlight items about your process or anything else you wish to note about your capstone.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'tabs' => 'all',
        'toolbar' => 'full',
        'media_upload' => 1,
        'delay' => 0,
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'page-templates/fullwidthpage-capstone.php',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'permalink',
      1 => 'the_content',
      2 => 'excerpt',
      3 => 'discussion',
      4 => 'comments',
      5 => 'slug',
      6 => 'format',
      7 => 'featured_image',
      8 => 'tags',
      9 => 'send-trackbacks',
    ),
    'active' => 1,
    'description' => '',
    'modified' => 1567019310,
  ));
  
  acf_add_local_field_group(array(
    'key' => 'group_5ccb36d1b17c0',
    'title' => 'Curriculum Vitae',
    'fields' => array(
      array(
        'key' => 'field_5ccb36d1c045d',
        'label' => 'Interests',
        'name' => 'cv_interests',
        'type' => 'textarea',
        'instructions' => 'In the box below, write a 2-3 sentence “I” statement that summarizes your professional interests. For example, “I am an aspiring engineer with a focus on renewable power and materials science. I am interested in the life cycle of materials used in small- and large-scale solar utilities,” or “I hope to apply my studies in Marketing to create effective messaging for environmental campaigns. My goal is to help non-profit organizations target new audiences and increase sustainable awareness.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'maxlength' => '',
        'rows' => '',
        'new_lines' => '',
      ),
      array(
        'key' => 'field_5ccb36d1c0475',
        'label' => 'Skills',
        'name' => 'cv_skills',
        'type' => 'repeater',
        'instructions' => 'In a list, summarize your skills and proficiencies. What advanced software have you used? What artistic mediums have you worked with? Where have you excelled intellectually–in writing, in presentations, in applied statistics, in field laboratories?
  Be sure to create consistency within this list. If you end one bullet point with a period, end them all with one. If you use gerunds to describe one proficiency, don’t switch to conjugated verb tenses in the next.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => '',
        'min' => 1,
        'max' => 0,
        'layout' => 'table',
        'button_label' => '',
        'sub_fields' => array(
          array(
            'key' => 'field_5ccc54aa93c1e',
            'label' => 'List your skills by adding a Row for each',
            'name' => 'type_of_skill',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '•',
            'append' => '',
            'maxlength' => '',
          ),
        ),
      ),
      array(
        'key' => 'field_5ccb36d1c048b',
        'label' => 'Academic Major (and Minor if applicable)',
        'name' => 'cv_academics',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => 'field_5ccc725a92c51',
        'min' => 1,
        'max' => 0,
        'layout' => 'table',
        'button_label' => '',
        'sub_fields' => array(
          array(
            'key' => 'field_5ccc725a92c51',
            'label' => 'Major(s)',
            'name' => 'majors',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5ccc72f0dd033',
            'label' => 'Minor(s)',
            'name' => 'minors',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
        ),
      ),
      array(
        'key' => 'field_5ccc7390947b4',
        'label' => 'Coursework',
        'name' => 'cv_coursework',
        'type' => 'repeater',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => 'field_5ccc73e9947b5',
        'min' => 1,
        'max' => 0,
        'layout' => 'table',
        'button_label' => '',
        'sub_fields' => array(
          array(
            'key' => 'field_5ccc73e9947b5',
            'label' => 'Course number',
            'name' => 'course_number',
            'type' => 'text',
            'instructions' => 'ex. ENVS 310',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5ccc74c0947b6',
            'label' => 'Course Title',
            'name' => 'course_title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5ccc74d7947b7',
            'label' => 'Semester',
            'name' => 'course_semester',
            'type' => 'select',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'choices' => array(
              'Fall' => 'Fall',
              'Spring' => 'Spring',
              'Summer' => 'Summer',
            ),
            'default_value' => array(
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 0,
            'return_format' => 'value',
            'ajax' => 0,
            'placeholder' => '',
          ),
          array(
            'key' => 'field_5ccc74ef947b8',
            'label' => 'Year',
            'name' => 'course_year',
            'type' => 'number',
            'instructions' => 'ex. 2018',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'min' => 2001,
            'max' => 2100,
            'step' => '',
          ),
        ),
      ),
      array(
        'key' => 'field_5ccc7358947b3',
        'label' => 'Expected graduation date',
        'name' => 'expected_graduation_date',
        'type' => 'date_picker',
        'instructions' => '',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'display_format' => 'F j, Y',
        'return_format' => 'F j, Y',
        'first_day' => 1,
      ),
      array(
        'key' => 'field_5ccb3baed7c53',
        'label' => 'Work History',
        'name' => 'cv_work_history',
        'type' => 'repeater',
        'instructions' => 'List your work history from most recent backwards. Provide the institution, the position title, responsibilities, and the approximate dates (month/year) of your employment. For work that is ongoing, use “present” as the end date.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'collapsed' => '',
        'min' => 0,
        'max' => 0,
        'layout' => 'table',
        'button_label' => '',
        'sub_fields' => array(
          array(
            'key' => 'field_5cd43e4265ce7',
            'label' => 'Institution',
            'name' => 'work_institution',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5cd43e7465ce8',
            'label' => 'Position Title',
            'name' => 'work_position_title',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5cd43e9d65ce9',
            'label' => 'Responsibilities',
            'name' => 'work_responsibilities',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => '',
            'new_lines' => '',
          ),
          array(
            'key' => 'field_5cd43ef065cea',
            'label' => 'Start Date',
            'name' => 'work_start_date',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
          array(
            'key' => 'field_5cd43fbe918fc',
            'label' => 'End Date',
            'name' => 'work_end_date',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
              'width' => '',
              'class' => '',
              'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
          ),
        ),
      ),
      array(
        'key' => 'field_5d234bdf0bfe9',
        'label' => 'CV Uploader',
        'name' => 'cv_uploader',
        'type' => 'file',
        'instructions' => 'Upload a PDF of your own CV here to be downloadable by anyone.',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'return_format' => 'url',
        'library' => 'all',
        'min_size' => '',
        'max_size' => '',
        'mime_types' => 'pdf',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'page-templates/fullwidthpage-cv.php',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'permalink',
      1 => 'the_content',
      2 => 'excerpt',
      3 => 'discussion',
      4 => 'comments',
      5 => 'slug',
      6 => 'format',
      7 => 'tags',
      8 => 'send-trackbacks',
    ),
    'active' => 1,
    'description' => '',
    'modified' => 1566929627,
  ));
  
  acf_add_local_field_group(array(
    'key' => 'group_5d657d45da93b',
    'title' => 'Use the Portfolio Options menu to edit this information',
    'fields' => false,
    'location' => array(
      array(
        array(
          'param' => 'page_template',
          'operator' => '==',
          'value' => 'page-templates/fullwidthpage-biography.php',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => array(
      0 => 'permalink',
      1 => 'the_content',
      2 => 'excerpt',
      3 => 'discussion',
      4 => 'comments',
      5 => 'revisions',
      6 => 'slug',
      7 => 'author',
      8 => 'format',
      9 => 'page_attributes',
      10 => 'featured_image',
      11 => 'categories',
      12 => 'tags',
      13 => 'send-trackbacks',
    ),
    'active' => 1,
    'description' => '',
  ));
  
  endif;
