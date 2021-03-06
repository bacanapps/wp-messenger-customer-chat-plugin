<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.paypal.me/dorelljames
 * @since      1.0.0
 *
 * @package    WPMCCP
 * @subpackage WPMCCP/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WPMCCP
 * @subpackage WPMCCP/admin
 * @author     Dorell James Galang <galangdj@gmail.com>
 */
class WPMCCP_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function wpmccp_enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WPMCCP_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WPMCCP_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpmccp-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function wpmccp_enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WPMCCP_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WPMCCP_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpmccp-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Register the administration menu for this plugin into the WordPress Dashboard menu.
	 *
	 * @since    1.0.0
	 */

	public function wpmccp_add_plugin_admin_menu() {

	    /*
	     * Add a settings page for this plugin to the Settings menu.
	     *
	     * NOTE:  Alternative menu locations are available via WordPress administration menu functions.
	     *
	     *        Administration Menus: http://codex.wordpress.org/Administration_Menus
	     *
	     */
	    add_options_page( 'WordPress Messenger Customer Chat Plugin (WMCCP)', 'WPMCCP', 'manage_options', $this->plugin_name, array($this, 'wpmccp_display_plugin_setup_page')
	    );
	}

	 /**
	 * Add settings action link to the plugins page.
	 *
	 * @since    1.0.0
	 */

	public function wpmccp_add_action_links( $links ) {
	    /*
	    *  Documentation : https://codex.wordpress.org/Plugin_API/Filter_Reference/plugin_action_links_(plugin_file_name)
	    */
	   $settings_link = array(
	    '<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
	   );
	   return array_merge(  $settings_link, $links );

	}

	/**
	 * Render the settings page for this plugin.
	 *
	 * @since    1.0.0
	 */

	public function wpmccp_display_plugin_setup_page() {
	    include_once( 'partials/wpmccp-admin-display.php' );
	}

	/**
	 * Input validation
	 */
	public function wpmccp_validate($input) {
    	$valid = array();

		// Validation for ref options
		if ( isset($input['ref']) ) {
			foreach($input['ref'] as $index => $ref) {
				$valid['ref'][$index] = sanitize_text_field($ref);
			}
		}

		// Validate others
    	$valid['facebook_page_id'] = (isset($input['facebook_page_id']) && !empty($input['facebook_page_id'])) ? $input['facebook_page_id'] : null;
		$valid['is_minimized'] = (isset($input['is_minimized']) && !empty($input['is_minimized']) && $input['is_minimized'] === "TRUE" ) ? true : false;
		$valid['ref_prefix'] = (isset($input['ref_prefix']) && !empty($input['ref_prefix'])) ? $input['ref_prefix'] : null;
		$valid['custom_fb_sdk_app_id'] = (isset($input['custom_fb_sdk_app_id']) && !empty($input['custom_fb_sdk_app_id'])) ? $input['custom_fb_sdk_app_id'] : null;

    	return $valid;
    }

    public function wpmccp_options_update() {
		register_setting($this->plugin_name, $this->plugin_name, array($this, 'wpmccp_validate'));
	}

}
