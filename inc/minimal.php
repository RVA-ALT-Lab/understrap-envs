<?php 
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
    remove_menu_page( 'tools.php' ); //export etc
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


add_menu_page('Extras', 'Extras', 'upload_files', 'extra-tools', 'extras_text_callback',  'dashicons-chart-pie', 100);
