<?php
/*
Plugin Name: WP Content Generator
Plugin URI: http://causingdesignscom.kinsta.cloud/
Description: This plugin is to generate content for post types that are currently registered.
Author: John Mark Causing
Author URI:  http://causingdesignscom.kinsta.cloud/
*/






function wcg_register_options_page() {
 
    add_menu_page('WP Content Generator', 'WP Content Generator', 'manage_options', 'wcg_page', 'wcg_admin_page');
  
  }
  
  add_action('admin_menu', 'wcg_register_options_page');
  
  
function wcg_admin_page() {


/*   
    // Check if file exist then call the js chart file
    $filename = WP_CONTENT_DIR . "/uploads/ajax-log.json";
    if(file_exists($filename)){
      // call the js chart file
      echo '<script type="text/javascript" src="' . plugin_dir_url(__FILE__) . '/js/charts.js"></script>';
    }
    else{
      echo "<h1>Ajax file has been deleted</h1>";
    }


     */
  
  

  
   $html_output = ' <h1> Here are the available post types (registered) </h1>
  
  
   ';
       echo $html_output;

global $wp_post_types;
// var_dump($wp_post_types);

foreach ( $wp_post_types as $type ) { 

    echo $type->name . "<br>";

}



}