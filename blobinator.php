<?php

/**
 *
 * @link              http://www.blobinator.com
 * @since             1.0.0
 * @package           Blobinator
 *
 * @wordpress-plugin
 * Plugin Name:       Blobinator
 * Plugin URI:        http://www.blobinator.com
 * Description:       Wordpress Plugin for appending insights to blobs of text or images. Helpful for editing your content and articles.
 * Version:           1.1.1
 * Author:            Michael Bordash
 * Author URI:        https://github.com/mbordash
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.en.html
 * Text Domain:       blobinator
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-blobinator-activator.php
 */
function activate_blobinator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-blobinator-activator.php';
	Blobinator_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-blobinator-deactivator.php
 */

function deactivate_blobinator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-blobinator-deactivator.php';
	Blobinator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_blobinator' );
register_deactivation_hook( __FILE__, 'deactivate_blobinator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-blobinator.php';

// Load the API Key library if it is not already loaded. Must be placed in the root plugin file.
if ( ! class_exists( 'AM_License_Menu' ) ) {
    // Uncomment next line if this is a plugin
    require_once( plugin_dir_path( __FILE__ ) . 'admin/am-license-menu.php' );

    // Uncomment next line if this is a theme
    // require_once( get_stylesheet_directory() . '/am-license-menu.php' );

    /**
     * @param string $file             Must be __FILE__ from the root plugin file, or theme functions file.
     * @param string $software_title   Must be exactly the same as the Software Title in the product.
     * @param string $software_version This product's current software version.
     * @param string $plugin_or_theme  'plugin' or 'theme'
     * @param string $api_url          The URL to the site that is running the API Manager. Example: https://www.toddlahman.com/
     *
     * @return \AM_License_Submenu|null
     */
    AM_License_Menu::instance( __FILE__, 'Blobinator Content Analyzer - Free', '1.0.0', 'plugin', 'https://www.blobinator.com/' );

}


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_blobinator() {

	$plugin = new Blobinator();
	$plugin->run();

}
run_blobinator();
