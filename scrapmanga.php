<?php 
/**
 * Plugin Name:         Scrapper Manga
 * Plugin URI:          #
 * Description:         
 * Version:             1.0.0
 * Requires at least:   5.2
 * Requires PHP:        7.0
 * Author:              César De Paz
 * Author URI:          
 * License:             GPL v2 or later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:         prefix
 * Domain Path:         /languages
 */

if ( ! defined( 'WPINC' ) ) {
    die;
}
global $wpdb;

define( 'SCRAPMANGA_REALPATH_BASENAME_PLUGIN', dirname( plugin_basename( __FILE__ ) ) . '/' );
define( 'SCRAPMANGA_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'SCRAPMANGA_DIR_URI', plugin_dir_url( __FILE__ ) );
define( 'SCRAPMANGA_VERSION', '1.0.0' );

require_once SCRAPMANGA_DIR_PATH . 'includes/class-scrapmanga-master.php';

function run_scrapmanga_master() {
    $scrapmanga_master = new SCRAPMANGA_Master;
    $scrapmanga_master->run();
}

run_scrapmanga_master();