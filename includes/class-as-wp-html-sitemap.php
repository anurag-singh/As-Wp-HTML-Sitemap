<?php
# ref - https://www.ibenic.com/creating-wordpress-menu-pages-oop/

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://anuragsingh.me
 * @since      1.0.0
 *
 * @package    As_Wp_Html_Sitemap
 * @subpackage As_Wp_Html_Sitemap/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    As_Wp_Html_Sitemap
 * @subpackage As_Wp_Html_Sitemap/includes
 * @author     Anurag Singh <developer.anuragsingh@outlook.com>
 */
class As_Wp_Html_Sitemap {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      As_Wp_Html_Sitemap_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $as_wp_html_sitemap    The string used to uniquely identify this plugin.
	 */
	protected $as_wp_html_sitemap;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'AS_WP_HTML_SITEMAP' ) ) {
			$this->version = AS_WP_HTML_SITEMAP;
		} else {
			$this->version = '1.0.0';
		}
		$this->as_wp_html_sitemap = 'as-wp-html-sitemap';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - As_Wp_Html_Sitemap_Loader. Orchestrates the hooks of the plugin.
	 * - As_Wp_Html_Sitemap_i18n. Defines internationalization functionality.
	 * - As_Wp_Html_Sitemap_Admin. Defines all hooks for the admin area.
	 * - As_Wp_Html_Sitemap_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-as-wp-html-sitemap-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-as-wp-html-sitemap-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-as-wp-html-sitemap-admin.php';


		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-as-wp-html-sitemap-public.php';



		$this->loader = new As_Wp_Html_Sitemap_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the As_Wp_Html_Sitemap_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new As_Wp_Html_Sitemap_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new As_Wp_Html_Sitemap_Admin( $this->get_as_wp_html_sitemap(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );


	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new As_Wp_Html_Sitemap_Public( $this->get_as_wp_html_sitemap(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
		$this->loader->add_shortcode( 'html_sitemap', $plugin_public, 'render_html_sitemap' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_as_wp_html_sitemap() {
		return $this->as_wp_html_sitemap;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    As_Wp_Html_Sitemap_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	 * Convert text into sanitize text.
	 * Replace all black space (' ') with '-'
	 * lowercase all characters
	 * @since     1.0.0
	 * @return    string
	 */
	private function get_sanitized_labels($text) {
		$name = ucwords(strtolower(preg_replace('/\s+/', ' ', $text) ));
		$slug = strtolower(sanitize_title( $text ) );

		$single = ucfirst($name);

		$last_character = substr($single, -1);

		if ($last_character === 'y') {
			$plural = substr_replace($single, 'ies', -1);
		}
		else {
			$plural = $single.'s'; // add 's' to convert singular name to plural
		}

		$response = array(
						'name'		=>	$name,
						'single' 	=> 	$single,
						'plural' 	=> 	$plural,
						'slug'		=> 	$slug
					);

		return $response;
	}

}
