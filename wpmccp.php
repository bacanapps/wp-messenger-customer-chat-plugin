<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.paypal.me/dorelljames
 * @since             1.0.0
 * @package           WPMCCP
 *
 * @wordpress-plugin
 * Plugin Name:       Wordpress Messenger Customer Chat Plugin (WPMCCP)
 * Plugin URI:        https://github.com/dorelljames/wp-messenger-customer-chat-plugin
 * Description:       WordPress Messenger Customer Chat Plugin (WPMCCP) allows you to integrate your Messenger experience directly into your website.
 * Version:           1.1.0
 * Author:            Dorell James Galang
 * Author URI:        https://www.paypal.me/dorelljames
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpmccp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Current plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WPMCCP_PLUGIN_VERSION', '1.1.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpmccp-activator.php
 */
function activate_wpmccp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpmccp-activator.php';
	WPMCCP_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpmccp-deactivator.php
 */
function deactivate_wpmccp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpmccp-deactivator.php';
	WPMCCP_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpmccp' );
register_deactivation_hook( __FILE__, 'deactivate_wpmccp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpmccp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpmccp() {

	$plugin = new WPMCCP();
	$plugin->run();

}
run_wpmccp();
