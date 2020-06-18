<?php
/*
Plugin Name: WP Content Generator
Plugin URI: http://causingdesignscom.kinsta.cloud/
Description: This plugin is to generate content for post types that are currently registered.
Author: John Mark Causing
Author URI:  http://causingdesignscom.kinsta.cloud/
*/




// redirect to plugin option page when plugin is activated
function wcg_activation_redirect( $plugin ) {
  if( $plugin == plugin_basename( __FILE__ ) ) {
      exit( wp_redirect( admin_url( 'admin.php?page=wcg_page' ) ) );
  }
}
add_action( 'activated_plugin', 'wcg_activation_redirect' );






function wcg_register_options_page() {
 
    add_menu_page('WP Content Generator', 'WP Content Generator', 'manage_options', 'wcg_page', 'wcg_admin_page');
  
  }
  
  add_action('admin_menu', 'wcg_register_options_page');
  
  
function wcg_admin_page() {



  
  
  // let's get all registered post types
  global $wp_post_types;
  // var_dump($wp_post_types);

?>


<style>

.wcg_inputs {
  display: inline;
  padding: 15px;
  margin: 10px;
}

</style>

<div class="wcg_container">

  <h1> Here are the available post types (registered) </h1>


  <div class="wcg_inputs"> 
    <input type="number"  min="1" max="55" value="20" class="wcg_count">
  </div>

  <div class="wcg_inputs">
    <input type="checkbox" class="wcg_featured_image"> <label> With featured image?</label>
  </div>

  <div class="wcg_inputs">
  <!--  Get all registered post types -->
  <label> Select post type</label>
    <select name="" id="" class="wgc_post_type">
        <?php
          // get all registered post types
          foreach ( $wp_post_types as $type ) { 
        ?>
        <option> <?php echo $type->name ?> </option>
        <?php } ?>
    </select>
  </div>

  <div class="wcg_inputs">
    <button class="wcg_submit"> Generate content!</button>
  </div>



</div>
  
  
   







<?php
}