<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.lakshman.com.np/content-security-policy-pro-support/
 * @since             1.0.0
 * @package           Lakshman_Content_Security_Policy
 *
 * @wordpress-plugin
 * Plugin Name:       Content Security Policy Pro
 * Plugin URI:        https://wordpress.org/plugins/content-security-policy-pro/
 * Description:       The new Content-Security-Policy HTTP response header helps you reduce XSS risks on modern browsers by declaring what dynamic resources are allowed to load via a HTTP Header. This Content Security Plolicy plugin will help the setup the CSP
 * Version:           1.3.5
 * Author:            Laxman Thapa
 * Author URI:        http://lakshman.com.np
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       content-security-policy
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-content-security-policy.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_content_security_policy_pro() {
	$plugin = new Lakshman_Content_Security_Policy();
	$plugin->run();

}
run_content_security_policy_pro();
