<?php
/**
 * @package     CF
 * @link      	https://github.com/sean-wilk/
 * @copyright   Copyright (c) 2019, Sean Wilkinson
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Sean Wilkinson <sean@wearego.digital>
 *
 * @wordpress-plugin
 * Plugin Name:       Capiot Functionality
 * Plugin URI:        https://github.com/sean-wilk/
 * Description:       Custom functionality plugin for Capiot
 * Version:           1.1.0
 * Author:            Sean Wilkinson
 * Author URI:        http://wearego.digital
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
	die;
}
if( !class_exists( 'CF' ) ) {
	class CF {

		/**
		 * Instance of the class
		 *
		 * @since 1.0.0
		 * @var Instance of CF class
		 */
		private static $instance;

		/**
		 * Instance of the plugin
		 *
		 * @since 1.0.0
		 * @static
		 * @staticvar array $instance
		 * @return Instance
		 */
		public static function instance() {
			if ( !isset( self::$instance ) && ! ( self::$instance instanceof CF ) ) {
				self::$instance = new CF;
				self::$instance->define_constants();
				add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
				self::$instance->includes();
				self::$instance->init = new CF_Init();
			}
		return self::$instance;
		}

		/**
		 * Define the plugin constants
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function define_constants() {
			// Plugin Version
			if ( ! defined( 'CF_VERSION' ) ) {
				define( 'CF_VERSION', '1.0.0' );
			}
			// Prefix
			if ( ! defined( 'CF_PREFIX' ) ) {
				define( 'CF_PREFIX', 'CF_' );
			}
			// Textdomain
			if ( ! defined( 'CF_TEXTDOMAIN' ) ) {
				define( 'CF_TEXTDOMAIN', 'CF' );
			}
			// Plugin Options
			if ( ! defined( 'CF_OPTIONS' ) ) {
				define( 'CF_OPTIONS', 'CF-options' );
			}
			// Plugin Directory
			if ( ! defined( 'CF_PLUGIN_DIR' ) ) {
				define( 'CF_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
			}
			// Plugin URL
			if ( ! defined( 'CF_PLUGIN_URL' ) ) {
				define( 'CF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
			}
			// Plugin Root File
			if ( ! defined( 'CF_PLUGIN_FILE' ) ) {
				define( 'CF_PLUGIN_FILE', __FILE__ );
			}
		}

		/**
		 * Load the required files
		 *
		 * @since  1.0.0
		 * @access private
		 * @return void
		 */
		private function includes() {
			$includes_path = plugin_dir_path( __FILE__ ) . 'includes/';
			require_once CF_PLUGIN_DIR . 'includes/class-cf-register-post-types.php';
			require_once CF_PLUGIN_DIR . 'includes/class-cf-register-taxonomies.php';
			require_once CF_PLUGIN_DIR . 'includes/class-cf-register-widgets.php';
			require_once CF_PLUGIN_DIR . 'includes/class-cf-register-custom-fields.php';

			require_once CF_PLUGIN_DIR . 'includes/template-functions.php';
			require_once CF_PLUGIN_DIR . 'includes/class-cf-init.php';
		}

		/**
		 * Load the plugin text domain for translation.
		 *
		 * @since  1.0.0
		 * @access public
		 */
		public function load_textdomain() {
			$CF_lang_dir = dirname( plugin_basename( CF_PLUGIN_FILE ) ) . '/languages/';
			$CF_lang_dir = apply_filters( 'CF_lang_dir', $CF_lang_dir );

			$locale = apply_filters( 'plugin_locale',  get_locale(), CF_TEXTDOMAIN );
			$mofile = sprintf( '%1$s-%2$s.mo', CF_TEXTDOMAIN, $locale );

			$mofile_local  = $CF_lang_dir . $mofile;
			$mofile_global = WP_LANG_DIR . '/edd/' . $mofile;

			if ( file_exists( $mofile_local ) ) {
				load_textdomain( CF_TEXTDOMAIN, $mofile_local );
			} else {
				load_plugin_textdomain( CF_TEXTDOMAIN, false, $CF_lang_dir );
			}
		}

		/**
		 * Throw error on object clone
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', CF_TEXTDOMAIN ), '1.6' );
		}

		/**
		 * Disable unserializing of the class
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', CF_TEXTDOMAIN ), '1.6' );
		}

	}
}
/**
 * Return the instance
 *
 * @since 1.0.0
 * @return object The Safety Links instance
 */
function CF_Run() {
	return CF::instance();
}
CF_Run();
