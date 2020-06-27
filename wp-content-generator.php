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


// Load JS and CSS scripts for admin
function wcg_admin_scripts() {
  wp_enqueue_style(  'wcg_css', plugin_dir_url( __FILE__ ) . 'css/wcg.css', false, '1.0.0' );
  wp_enqueue_script( 'wcg_js', plugin_dir_url(__FILE__).'js/wcg.js', array('jquery') );
}
add_action( 'admin_enqueue_scripts', 'wcg_admin_scripts' );


// Loren Ipsum text generator -- START -- Title generator
// ######  
// Usage: 
// echo Lorem::title(1);
abstract class Lorem {
  public static function title($nparagraphs) {
      $paragraphs = [];
      for($p = 0; $p < $nparagraphs; ++$p) {
          $nsentences = random_int(1, 1);
          $sentences = [];
          for($s = 0; $s < $nsentences; ++$s) {
              $frags = [];
              $commaChance = .33;
              while(true) {
                  $nwords = random_int(2, 4);
                  $words = self::random_values(self::$lorem, $nwords);
                  $frags[] = implode(' ', $words);
                  if(self::random_float() >= $commaChance) {
                      break;
                  }
                  $commaChance /= 2;
              }

              $sentences[] = ucfirst(implode(', ', $frags)) . '.';
          }
          $paragraphs[] = implode(' ', $sentences);
      }
      return implode("\n\n", $paragraphs);
  }

  private static function random_float() {
      return random_int(0, PHP_INT_MAX - 1) / PHP_INT_MAX;
  }

  private static function random_values($arr, $count) {
      $keys = array_rand($arr, $count);
      if($count == 1) {
          $keys = [$keys];
      }
      return array_intersect_key($arr, array_fill_keys($keys, null));
  }

  private static $lorem = ['lorem', 'ipsum', 'dolor', 'sit', 'amet', 'consectetur', 'adipiscing', 'elit', 'praesent', 'interdum', 'dictum', 'mi', 'non', 'egestas', 'nulla', 'in', 'lacus', 'sed', 'sapien', 'placerat', 'malesuada', 'at', 'erat', 'etiam', 'id', 'velit', 'finibus', 'viverra', 'maecenas', 'mattis', 'volutpat', 'justo', 'vitae', 'vestibulum', 'metus', 'lobortis', 'mauris', 'luctus', 'leo', 'feugiat', 'nibh', 'tincidunt', 'a', 'integer', 'facilisis', 'lacinia', 'ligula', 'ac', 'suspendisse', 'eleifend', 'nunc', 'nec', 'pulvinar', 'quisque', 'ut', 'semper', 'auctor', 'tortor', 'mollis', 'est', 'tempor', 'scelerisque', 'venenatis', 'quis', 'ultrices', 'tellus', 'nisi', 'phasellus', 'aliquam', 'molestie', 'purus', 'convallis', 'cursus', 'ex', 'massa', 'fusce', 'felis', 'fringilla', 'faucibus', 'varius', 'ante', 'primis', 'orci', 'et', 'posuere', 'cubilia', 'curae', 'proin', 'ultricies', 'hendrerit', 'ornare', 'augue', 'pharetra', 'dapibus', 'nullam', 'sollicitudin', 'euismod', 'eget', 'pretium', 'vulputate', 'urna', 'arcu', 'porttitor', 'quam', 'condimentum', 'consequat', 'tempus', 'hac', 'habitasse', 'platea', 'dictumst', 'sagittis', 'gravida', 'eu', 'commodo', 'dui', 'lectus', 'vivamus', 'libero', 'vel', 'maximus', 'pellentesque', 'efficitur', 'class', 'aptent', 'taciti', 'sociosqu', 'ad', 'litora', 'torquent', 'per', 'conubia', 'nostra', 'inceptos', 'himenaeos', 'fermentum', 'turpis', 'donec', 'magna', 'porta', 'enim', 'curabitur', 'odio', 'rhoncus', 'blandit', 'potenti', 'sodales', 'accumsan', 'congue', 'neque', 'duis', 'bibendum', 'laoreet', 'elementum', 'suscipit', 'diam', 'vehicula', 'eros', 'nam', 'imperdiet', 'sem', 'ullamcorper', 'dignissim', 'risus', 'aliquet', 'habitant', 'morbi', 'tristique', 'senectus', 'netus', 'fames', 'nisl', 'iaculis', 'cras', 'aenean'];
}
// ######  
// Loren Ipsum text generator -- END


// Loren Ipsum text generator -- START -- Body generator
// ######  
// Usage: 
// echo Lorem::body(5);
abstract class Lorem_body {
  public static function body($nparagraphs) {
      $paragraphs = [];
      for($p = 0; $p < $nparagraphs; ++$p) {
          $nsentences = random_int(3, 8);
          $sentences = [];
          for($s = 0; $s < $nsentences; ++$s) {
              $frags = [];
              $commaChance = .33;
              while(true) {
                  $nwords = random_int(3, 15);
                  $words = self::random_values(self::$lorem, $nwords);
                  $frags[] = implode(' ', $words);
                  if(self::random_float() >= $commaChance) {
                      break;
                  }
                  $commaChance /= 2;
              }

              $sentences[] = ucfirst(implode(', ', $frags)) . '.';
          }
          $paragraphs[] = implode(' ', $sentences);
      }
      return implode("\n\n", $paragraphs);
  }

  private static function random_float() {
      return random_int(0, PHP_INT_MAX - 1) / PHP_INT_MAX;
  }

  private static function random_values($arr, $count) {
      $keys = array_rand($arr, $count);
      if($count == 1) {
          $keys = [$keys];
      }
      return array_intersect_key($arr, array_fill_keys($keys, null));
  }

  private static $lorem = ['lorem', 'ipsum', 'dolor', 'sit', 'amet', 'consectetur', 'adipiscing', 'elit', 'praesent', 'interdum', 'dictum', 'mi', 'non', 'egestas', 'nulla', 'in', 'lacus', 'sed', 'sapien', 'placerat', 'malesuada', 'at', 'erat', 'etiam', 'id', 'velit', 'finibus', 'viverra', 'maecenas', 'mattis', 'volutpat', 'justo', 'vitae', 'vestibulum', 'metus', 'lobortis', 'mauris', 'luctus', 'leo', 'feugiat', 'nibh', 'tincidunt', 'a', 'integer', 'facilisis', 'lacinia', 'ligula', 'ac', 'suspendisse', 'eleifend', 'nunc', 'nec', 'pulvinar', 'quisque', 'ut', 'semper', 'auctor', 'tortor', 'mollis', 'est', 'tempor', 'scelerisque', 'venenatis', 'quis', 'ultrices', 'tellus', 'nisi', 'phasellus', 'aliquam', 'molestie', 'purus', 'convallis', 'cursus', 'ex', 'massa', 'fusce', 'felis', 'fringilla', 'faucibus', 'varius', 'ante', 'primis', 'orci', 'et', 'posuere', 'cubilia', 'curae', 'proin', 'ultricies', 'hendrerit', 'ornare', 'augue', 'pharetra', 'dapibus', 'nullam', 'sollicitudin', 'euismod', 'eget', 'pretium', 'vulputate', 'urna', 'arcu', 'porttitor', 'quam', 'condimentum', 'consequat', 'tempus', 'hac', 'habitasse', 'platea', 'dictumst', 'sagittis', 'gravida', 'eu', 'commodo', 'dui', 'lectus', 'vivamus', 'libero', 'vel', 'maximus', 'pellentesque', 'efficitur', 'class', 'aptent', 'taciti', 'sociosqu', 'ad', 'litora', 'torquent', 'per', 'conubia', 'nostra', 'inceptos', 'himenaeos', 'fermentum', 'turpis', 'donec', 'magna', 'porta', 'enim', 'curabitur', 'odio', 'rhoncus', 'blandit', 'potenti', 'sodales', 'accumsan', 'congue', 'neque', 'duis', 'bibendum', 'laoreet', 'elementum', 'suscipit', 'diam', 'vehicula', 'eros', 'nam', 'imperdiet', 'sem', 'ullamcorper', 'dignissim', 'risus', 'aliquet', 'habitant', 'morbi', 'tristique', 'senectus', 'netus', 'fames', 'nisl', 'iaculis', 'cras', 'aenean'];
}
// ######  
// Loren Ipsum text generator -- END



// redirect to plugin option page when plugin is activated
function wcg_activation_redirect( $plugin ) {
  if( $plugin == plugin_basename( __FILE__ ) ) {
      exit( wp_redirect( admin_url( 'admin.php?page=wcg_page' ) ) );
  }
}
add_action( 'activated_plugin', 'wcg_activation_redirect' );


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
      <input type="number"  min="1" max="55" value="2" class="wcg_count"> 
    </div>

    <div class="wcg_inputs">
      <label> With featured image?</label>
      <input type="checkbox" name="wcg_featured_image" class="wcg_featured_image" checked>
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

      $featured_image = $_POST['featured_image'];

      $post_type = $_POST[ "post_type" ];
      $quantity = $_POST[ "post_qty" ];

      
      // ==========
      // start loop
      for($x = 1; $x <= $quantity; $x++) {

        $wcg_post_title = Lorem::title(1);
        $wcg_post_body = Lorem_body::body(5);
        
        //  echo 'This is the post type selected ' . $post_type;
        // Gather post data.
        $my_post = array(
            'post_title'    => $wcg_post_title,
            'post_type' => $post_type,
            'post_content'  => $wcg_post_body,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_category' => array( 8,39 ),
        );

        // Insert the post into the database while getting the post_id
        $post_id = wp_insert_post( $my_post );

        echo "Post ID  " .  $post_id . "  inserted!\n";

        // Insert featured image  -- START
        // ###########

        if ($featured_image =='true') {
   
          // Add Featured Image to Post
          $image_url        = 'https://picsum.photos/200/300?random=1'; // Define the image URL here
          $image_name       = 'wp-header-logo.png';
          $upload_dir       = wp_upload_dir(); // Set upload folder
          $image_data       = file_get_contents($image_url); // Get image data
          $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
          $filename         = basename( $unique_file_name ); // Create image file name

          // Check folder permission and define file location
          if( wp_mkdir_p( $upload_dir['path'] ) ) {
              $file = $upload_dir['path'] . '/' . $filename;
          } else {
              $file = $upload_dir['basedir'] . '/' . $filename;
          }

          // Create the image  file on the server
          file_put_contents( $file, $image_data );

          // Check image file type
          $wp_filetype = wp_check_filetype( $filename, null );

          // Set attachment data
          $attachment = array(
              'post_mime_type' => $wp_filetype['type'],
              'post_title'     => sanitize_file_name( $filename ),
              'post_content'   => '',
              'post_status'    => 'inherit'
          );

          // Create the attachment
          $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

          // Include image.php
          require_once(ABSPATH . 'wp-admin/includes/image.php');

          // Define attachment metadata
          $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

          // Assign metadata to attachment
          wp_update_attachment_metadata( $attach_id, $attach_data );

          // And finally assign featured image to post
          set_post_thumbnail( $post_id, $attach_id );

      }
        // ###########
        // Insert featured image  -- END
        

        $img_src = 'https://picsum.photos/200/300?random=1';


        if ( $post_id && ! is_wp_error( $post_id ) ) {
              $post_id_meta = $post_id;
              // insert post meta for flagging
              update_post_meta($post_id_meta, 'wp_content_generator', '1' );
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


        // Check flag if created by this plugin then proceed to deletion
        $flag =  (bool) get_post_meta( $post_id, 'wp_content_generator', true );

        echo "Checking if content is from WP Content Generator". "\n";

        if ( true !== $flag ) {
          return false;
        }

        echo "Deleting post ID " . $post_id  . "\n";

        
        
        // Delete post meta from attachment
        $att_id =  get_post_meta( $post_id, '_thumbnail_id', true );
        delete_post_meta($att_id, '_wp_attached_file');
        delete_post_meta($att_id, '_wp_attachment_metadata');

        // delete post
        wp_delete_post( $eachpost->ID, true );


      }

      echo "Done! Post deleted";

      die;
    
  }
}
add_action('wp_ajax_wcg_purge_posts', 'wcg_purge_posts'); // wp_ajax_{action}
add_action('wp_ajax_wcg_purge_posts', 'wcg_purge_posts'); // wp_ajax_nopriv_{action}
