<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://anuragsingh.me
 * @since      1.0.0
 *
 * @package    As_Wp_Html_Sitemap
 * @subpackage As_Wp_Html_Sitemap/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    As_Wp_Html_Sitemap
 * @subpackage As_Wp_Html_Sitemap/includes
 * @author     Anurag Singh <developer.anuragsingh@outlook.com>
 */
class As_Wp_Html_Sitemap_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		global $wpdb;

		$postName  = 'Sitemap';				// Post Title

		// Check if post's slug already exists
		if($wpdb->get_row("SELECT post_name FROM wp_posts WHERE post_name = '" . sanitize_title( $postName ) . "'", 'ARRAY_A')) {
			$is_slug_exists = TRUE;
		} else {
			$is_slug_exists = FALSE;
		}


		if(is_admin()){
			// Check if post' Title already exits
		    $post_obj = get_page_by_title($postName);

		    // Create a new post, If post's ID  and post's slug not exists
		    if(isset($post_obj->ID) && $is_slug_exists == TRUE){
		    	wp_delete_post( $post_obj->ID, TRUE );
		    }
	    }

	}

}
