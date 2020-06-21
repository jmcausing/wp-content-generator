<?php
/*
Plugin Name: WP Content Generator
Plugin URI: http://causingdesignscom.kinsta.cloud/
Description: This plugin is to generate content for post types that are currently registered.
Author: John Mark Causing
Author URI:  http://causingdesignscom.kinsta.cloud/
*/


// reference for loading progress bar 
// https://www.webslesson.info/2019/09/how-to-create-progress-bar-for-data-insert-in-php-using-ajax.html

// redirect to plugin option page when plugin is activated
function wcg_activation_redirect( $plugin ) {
  if( $plugin == plugin_basename( __FILE__ ) ) {
      exit( wp_redirect( admin_url( 'admin.php?page=wcg_page' ) ) );
  }
}
add_action( 'activated_plugin', 'wcg_activation_redirect' );




// Call js scripts
wp_register_script( 'wcg_js', plugin_dir_url(__FILE__).'js/wcg.js', array('jquery') );
wp_enqueue_script( 'wcg_js' );

// Add CSS 
function wcg_enqueue_custom_admin_style() {
  wp_register_style( 'wcg_css', plugin_dir_url( __FILE__ ) . 'css/wcg.css', false, '1.0.0' );
  wp_enqueue_style( 'wcg_css' );
}
add_action( 'admin_enqueue_scripts', 'wcg_enqueue_custom_admin_style' ); 



// Creating plugin page -- START
// #####
function wcg_register_options_page() {
    add_menu_page('WP Content Generator', 'WP Content Generator', 'manage_options', 'wcg_page', 'wcg_admin_page');
  }
add_action('admin_menu', 'wcg_register_options_page');
   
function wcg_admin_page() {

  
  // let's get all registered post types for dropdown select
  global $wp_post_types;


?>


<div class="wcg_container">



    <h1> Here are the available post types (registered) </h1>


    <div class="wcg_inputs"> 
      <label> Number of contents</label>
      <input type="number"  min="1" max="55" value="20" class="wcg_count"> 
    </div>

    <div class="wcg_inputs">
      <label> With featured image?</label>
      <input type="checkbox" class="wcg_featured_image">
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

    <div class="wcg_inputs">
      <button class="wcg_delete"> Delete them all!</button>
    </div>

    <div class="wcg_preloader_create">
      <h1 class="wcg_loading_create_done" style="display:none;"> &#9989; Content created...</h1>
      <h1 class="wcg_preloader_create_h1" style="display:none;">Creating content...</h1>
      <div class="wcg_loading_create" style="display: none;"></div>
    </div>


    <div class="wcg_preloader_delete">
      <h1 class="wcg_loading_delete_done" style="display:none;"> &#9989; Content deleted...</h1>
      <h1 class="wcg_preloader_delete_h1" style="display:none;">Deleting content...</h1>
      <div class="wcg_loading_delete" style="display: none;"></div>
    </div>

</div>
  
<?php
}


// #####
// Creating plugin page -- END


/// This is your ajax handler called to generate contents file
function wcg_start_generate_function() {

  // Retrieve data from ajax
  if( isset( $_POST[ "post_type" ] ) ) {

      $post_type = $_POST[ "post_type" ];
      $quantity = $_POST[ "post_qty" ];

      
      // ==========
      // start loop
      for($x = 1; $x <= $quantity; $x++) {


        //  echo 'This is the post type selected ' . $post_type;
        // Gather post data.
        $my_post = array(
            'post_title'    => 'My post',
            'post_type' => $post_type,
            'post_content'  => 'This is my post.',
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_category' => array( 8,39 ),
        );

        // Insert the post into the database while getting the post_id
        $result = wp_insert_post( $my_post );

        echo "Post ID  " .  $result . "  inserted!\n";

/* 
        wp_localize_script( 'wcg_js', 'wcg_data', array(
            'wcg_post_id' => $result
        ) );

 */

        if ( $result && ! is_wp_error( $result ) ) {
              $post_id = $result;
              // insert post meta for flagging
              update_post_meta($post_id, 'wp_content_generator', '1' );
         }


      }
      // end loop
      // ==========


      // For debugging
      $count_post = $x - 1;
      echo "Done! " .  $count_post . " post inserted!\n";

      die;
    
  }
}
add_action('wp_ajax_wcg_start_generate', 'wcg_start_generate_function'); // wp_ajax_{action}
add_action('wp_ajax_wcg_start_generate', 'wcg_start_generate_function'); // wp_ajax_nopriv_{action}



/// This is your ajax handler called to generate contents file
function wcg_purge_posts() {



  // Retrieve data from ajax
  if( isset( $_POST[ "post_type" ] ) ) {

      echo "Start purging contents..\n";
    
      $post_type = $_POST[ "post_type" ];

      $quantity = $_POST[ "post_qty" ];

      $allposts= get_posts( array('post_type'=>$post_type, 'numberposts'=>-1) );

      $query = new WP_Query( array( 'meta_key' => 'wp_content_generator', 'meta_value' => '1' ) );

      echo "Total post to delete " .  $query->found_posts . "\n"; 


    
      foreach ($allposts as $eachpost) {

        $post_id = $eachpost->ID;


        $flag =  (bool) get_post_meta( $post_id, 'wp_content_generator', true );

        echo "Checking if content is from WP Content Generator". "\n";

        if ( true !== $flag ) {
          return false;
        }

        echo "Deleting post ID " . $post_id  . "\n";

        wp_delete_post( $eachpost->ID, true );

      }

      echo "Done! Post deleted";

      die;
    
  }
}
add_action('wp_ajax_wcg_purge_posts', 'wcg_purge_posts'); // wp_ajax_{action}
add_action('wp_ajax_wcg_purge_posts', 'wcg_purge_posts'); // wp_ajax_nopriv_{action}
