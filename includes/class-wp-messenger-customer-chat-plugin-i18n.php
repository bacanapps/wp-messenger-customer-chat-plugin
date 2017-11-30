<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.paypal.me/dorelljames
 * @since      1.0.0
 *
 * @package    Wp_Messenger_Customer_Chat_Plugin
 * @subpackage Wp_Messenger_Customer_Chat_Plugin/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Wp_Messenger_Customer_Chat_Plugin
 * @subpackage Wp_Messenger_Customer_Chat_Plugin/includes
 * @author     Dorell James Galang <galangdj@gmail.com>
 */
class Wp_Messenger_Customer_Chat_Plugin_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'wp-messenger-customer-chat-plugin',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
