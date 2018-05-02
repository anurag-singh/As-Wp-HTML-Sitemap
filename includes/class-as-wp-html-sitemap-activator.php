<?php

/**
 * Fired during plugin activation
 *
 * @link       http://anuragsingh.me
 * @since      1.0.0
 *
 * @package    As_Wp_Html_Sitemap
 * @subpackage As_Wp_Html_Sitemap/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    As_Wp_Html_Sitemap
 * @subpackage As_Wp_Html_Sitemap/includes
 * @author     Anurag Singh <developer.anuragsingh@outlook.com>
 */
class As_Wp_Html_Sitemap_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		flush_rewrite_rules();

		add_action('init', array($this, 'create_new_post_programmatically'));
		
	}

	/**
	 * Create a new page to hold HTML sitemap's shortcode
	 *
	 * @since    1.0.0
	 */
	public function create_new_post_programmatically() {
			// global $wpdb;

			// $postName  = 'Coming Soon';				// Post Title
			// $postContent = '[coming-soon]';			// Post Content

			// // Check if post's slug already exists
			// if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . sanitize_title( $postName ) . "'", 'ARRAY_A')) {
			// 	$is_slug_exists = TRUE;
			// } else {
			// 	$is_slug_exists = FALSE;
			// }


			// if ( is_admin()){

			// 	// Check if post' Title already exits
			//     $post_obj = get_page_by_title($postName);

			//     // Setup post's details
			//     $sitemap_page = array(
			// 	    'post_type' => 'page',
			// 	    'post_title' => $postName,
			// 	    'post_content' => $postContent,
			// 	    'post_status' => 'publish',
			// 	    'post_author' => 1,
			//     );

			//     // Create a new post, If post's ID  and post's slug not exists
			//     if(!isset($post_obj->ID) && $is_slug_exists == FALSE){
			//         $page_id = wp_insert_post($sitemap_page);
			//     }
		 //    }
		
	}
}
