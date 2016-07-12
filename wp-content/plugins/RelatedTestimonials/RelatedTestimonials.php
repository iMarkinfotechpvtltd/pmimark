<?php
/*
Plugin Name: RelatedTestimonials
Plugin URI: http://www.example.com
Description: Gives feature to add Testimonials in Pages.
Version: 0.1
Author: Pushpa Sharma
Author URI: https://www.example.com
*/
defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );

if ( ! class_exists( 'RelatedTestimonials' ) ) {
	class RelatedTestimonials
	{
		public function __construct()
		{ 
		      add_action( 'admin_menu', 'register_my_custom_menu_page' );
		}
	}
	new RelatedTestimonials;
 }
   
function register_my_custom_menu_page(){
	//add_menu_page( 'Related Post', 'Related Post', 'manage_options', 'relatedpostvideos', 'my_custom_menu_page', plugins_url( 'RelatedPostVideos/icons/icon_download.gif' ), 6 ); 
	
	//add_menu_page('Add Testimonial','Add Testimonial','manage_options',120, array(&$this,'my_custom_menu_page'));
}  

function my_custom_menu_page(){
	include("form.php");	
}


add_action( 'init', 'testimonials_post_type' );
function testimonials_post_type() {
    $labels = array(
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Testimonial',
        'edit_item' => 'Edit Testimonial',
        'new_item' => 'New Testimonial',
        'view_item' => 'View Testimonial',
        'search_items' => 'Search Testimonials',
        'not_found' =>  'No Testimonials found',
        'not_found_in_trash' => 'No Testimonials in the trash',
        'parent_item_colon' => '',
    );
 
    register_post_type( 'testimonials', array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'exclude_from_search' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 10,
        'supports' => array( 'title','editor' ),
        'register_meta_box_cb' => 'testimonials_meta_boxes', // Callback function for custom metaboxes
    ) );
}


function testimonials_meta_boxes() {
    add_meta_box( 'testimonials_form', 'Testimonial Details', 'testimonials_form', 'testimonials', 'normal', 'high' );
}
 
function testimonials_form() {
    $post_id = get_the_ID();
    $testimonial_data = get_post_meta( $post_id, '_testimonial', true );
	
    $authName = ( empty( $testimonial_data['authName'] ) ) ? '' : $testimonial_data['authName'];
    $source = ( empty( $testimonial_data['source'] ) ) ? '' : $testimonial_data['source'];
    $position = ( empty( $testimonial_data['position'] ) ) ? '' : $testimonial_data['position'];
 
    wp_nonce_field( 'testimonials', 'testimonials' );
    ?>
	
	 <p>
        <label>Author Name </label><br />
        <input type="text" value="<?php echo $authName; ?>" name="testimonial[authName]" size="40" />
    </p>
   
    <p>
        <label>Business/Site Name (optional)</label><br />
        <input type="text" value="<?php echo $source; ?>" name="testimonial[source]" size="40" />
    </p>
	
	<p>
        <label>Position</label><br />
        <input type="text" value="<?php echo $position; ?>" name="testimonial[position]" size="40" />
    </p>
   
    <?php
}

add_action( 'save_post', 'testimonials_save_post' );
function testimonials_save_post( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;
 
 
    if ( ! empty( $_POST['testimonials'] ) && ! wp_verify_nonce( $_POST['testimonials'], 'testimonials' ) )
        return;
 
    if ( ! empty( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) )
            return;
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) )
            return;
    }
 
    if ( ! wp_is_post_revision( $post_id ) && 'testimonials' == get_post_type( $post_id ) ) {
        remove_action( 'save_post', 'testimonials_save_post' );
 
        wp_update_post( array(
            'ID' => $post_id,
           ) );
 
        add_action( 'save_post', 'testimonials_save_post' );
    }
 
    if ( ! empty( $_POST['testimonial'] ) ) {
       
	    $testimonial_data['authName'] = ( empty( $_POST['testimonial']['authName'] ) ) ? '' : sanitize_text_field( $_POST['testimonial']['authName'] );
        $testimonial_data['source'] = ( empty( $_POST['testimonial']['source'] ) ) ? '' : sanitize_text_field( $_POST['testimonial']['source'] );
		$testimonial_data['position'] = ( empty( $_POST['testimonial']['position'] ) ) ? '' : sanitize_text_field( $_POST['testimonial']['position'] );
        
 
        update_post_meta( $post_id, '_testimonial', $testimonial_data );
    } else {
        delete_post_meta( $post_id, '_testimonial' );
    }
}



/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function myplugin_add_meta_box() {

	$screens = array( 'page' );
 
	foreach ( $screens as $screen ) {

		add_meta_box(
			'myplugin_sectionid',
			__( 'Related Testimonials', 'myplugin_textdomain' ),
			'myplugin_meta_box_callback',
			$screen
		);
	}
}
add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function myplugin_meta_box_callback( $post ) {
    global $wpdb;
	// Add an nonce field so we can check for it later.
	wp_nonce_field( 'myplugin_meta_box', 'myplugin_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	 
	$value = get_post_meta( $post->ID, 'related_testimonial_ids', true ); 
	$post_type = $post->post_type;
	
	$postType = 'testimonials';	
	
	
	$posts = $wpdb->get_results("SELECT * FROM ".$wpdb->prefix."posts WHERE post_type = '".$postType."' and post_status = 'publish' ORDER BY post_date DESC"); 
	
	  $totalPosts = 0;
	  if ($posts) {
	       $current_postid = get_the_ID(); 
		   $postdata = get_post_meta($current_postid, 'related_testimonial_ids');
		   $related_posts = $postdata[0];
		   $related_posts_array = explode(",", $related_posts);
		   
	       echo '<div style="overflow-y: scroll; height: 200px;">Select the Testimonial below to relate:<br><br>'; 
				foreach ( $posts as $post ) {
				   $post_id = $post->ID;
				   $post_title = $post->post_title;
				    if($current_postid != $post_id) {
					        if (in_array($post_id, $related_posts_array)) {
							     ?>
									 <input type="checkbox" id="post_id" checked="checked" name="post_id_<?php echo $totalPosts; ?>" value="<?php echo $post_id; ?>" />
									 &nbsp; <?php echo $post_title; ?><br>
								 <?php	 
							}
							else {
								 ?>
									 <input type="checkbox" id="post_id" name="post_id_<?php echo $totalPosts; ?>" value="<?php echo $post_id; ?>" />
									 &nbsp; <?php echo $post_title; ?><br>
								 <?php	
						    }
				    } 	 
					$totalPosts = $totalPosts + 1;  
				}
		   echo '</div>';		
      }
	  else {
             echo 'Currently there are not any post video available to relate.';
/* 			echo '<label for="myplugin_new_field">';
			_e( 'Description for this field', 'myplugin_textdomain' );
			echo '</label> ';
			echo '<input type="text" id="myplugin_new_field" name="myplugin_new_field" value="' . esc_attr( $value ) . '" size="25" />';
 */	
     }
	 echo '<input type="hidden" id="totalPosts" name="totalPosts" value="'.$totalPosts.'" />';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function myplugin_save_meta_box_data( $post_id ) { 
	 $totalPosts = $_REQUEST['totalPosts'];
	     
	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'myplugin_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	} 
 
    if($totalPosts > 0)
	 {
	        $finalData = '';
	        for($i=0; $i<$totalPosts; $i++)
			{
			       if( isset($_REQUEST['post_id_'.$i]) and $_REQUEST['post_id_'.$i] != '' )
				   {
				            $postvar = 'post_id_'.$i;
				            $$postvar = $_REQUEST['post_id_'.$i];
							 if($finalData == '')
							 {
							      $finalData .= $$postvar; 
							 }
							 else{
							      $finalData .= "," . $$postvar; 
							 } 
				   }
			}
             if($finalData != '')
              {
                     // Sanitize user input.
					 $my_data = sanitize_text_field( $finalData ); 
					 // Update the meta field in the database.
					 update_post_meta( $post_id, 'related_testimonial_ids', $my_data );
              }	 		
	 }
	 else
	 { } 
	
}
add_action( 'save_post', 'myplugin_save_meta_box_data' );


?>
