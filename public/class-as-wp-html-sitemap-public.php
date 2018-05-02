<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://anuragsingh.me
 * @since      1.0.0
 *
 * @package    As_Wp_Html_Sitemap
 * @subpackage As_Wp_Html_Sitemap/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    As_Wp_Html_Sitemap
 * @subpackage As_Wp_Html_Sitemap/public
 * @author     Anurag Singh <developer.anuragsingh@outlook.com>
 */
class As_Wp_Html_Sitemap_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $as_wp_html_sitemap    The ID of this plugin.
	 */
	private $as_wp_html_sitemap;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $as_wp_html_sitemap       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $as_wp_html_sitemap, $version ) {

		$this->as_wp_html_sitemap = $as_wp_html_sitemap;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in As_Wp_Html_Sitemap_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The As_Wp_Html_Sitemap_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->as_wp_html_sitemap, plugin_dir_url( __FILE__ ) . 'css/as-wp-html-sitemap-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in As_Wp_Html_Sitemap_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The As_Wp_Html_Sitemap_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->as_wp_html_sitemap, plugin_dir_url( __FILE__ ) . 'js/as-wp-html-sitemap-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Display content through short code
	 *
	 * @since    1.0.0
	 */
	public function render_shortcode() {
		global $post;
		print_r($post);
	}

}
