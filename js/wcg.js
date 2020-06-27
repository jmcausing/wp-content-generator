jQuery(document).ready(function ($) {


    // Create contents -- START
    $( ".wcg_submit" ).click(function() {

        with_featured_image = jQuery('.wcg_featured_image').is(":checked");
        post_type = jQuery('select.wgc_post_type').val();
        qty = jQuery('.wcg_count').val();

         data = {
            "action": "wcg_start_generate",
            "post_type": post_type,
            "post_qty": qty,
            "featured_image": with_featured_image
        };

        $.ajax({ 
            url : "/wp-admin/admin-ajax.php",
            data : data,
            type : "POST",

            beforeSend : function ( xhr ) {
                // loading animation
                $('.wcg_loading_create').css('display','block'); 
                $('.wcg_preloader_create_h1').css('display','block'); 
                $('.wcg_loading_create_done').css('display','none'); 
                $('.wcg_loading_delete_done').css('display','none'); 
            },

            success : function( data ){
                $('.wcg_loading_create_done').css('display','block'); 
                $('.wcg_loading_create').css('display','none'); 
                $('.wcg_preloader_create_h1').css('display','none'); 
                $('.wcg_loading_delete_done').css('display','none'); 
                

                console.log(data);
            }   
        });
    });
    // Create contents -- END


    // Delete contents -- START
    $( "button.wcg_delete" ).click(function() {
    
        confirm("Do you wish to delete the ajax log file?");

        post_type = jQuery('select.wgc_post_type').val();
        qty = jQuery('.wcg_count').val();

         data = {
            "action": "wcg_purge_posts",
            "post_type": post_type,
            "post_qty": qty,
        };

        $.ajax({ 
            url : "/wp-admin/admin-ajax.php",
            data : data,
            type : "POST",

            beforeSend : function ( xhr ) {
                // loading animation
                $('.wcg_loading_delete').css('display','block'); 
                $('.wcg_preloader_delete_h1').css('display','block'); 
                $('.wcg_loading_create_done').css('display','none'); 
            },

            success : function( data ){
                $('.wcg_loading_delete_done').css('display','block'); 
                $('.wcg_loading_delete').css('display','none'); 
                $('.wcg_preloader_delete_h1').css('display','none'); 
                $('.wcg_loading_create_done').css('display','none'); 
   
                console.log(data);
            }   
        });
    });
    // Delete contents -- END



});

