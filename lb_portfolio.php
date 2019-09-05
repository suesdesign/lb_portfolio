<?php
/**
 * @package LB Portfolio
 * @version 1.0
 */

 /*
Plugin Name: LB Portfolio
Plugin URI: http://suesdesign.co.uk/
Description: Lucy Barker portfolio
Author: Sue Johnson
Version: 1.0
Author URI: http://suesdesign.co.uk/
*/

/**
 * Exit if this file is accessed directly
 */

if( ! defined('ABSPATH') ) {
    exit;
}



/**
 * Required files
 */

require plugin_dir_path( __FILE__ ) . 'includes/class-lb_portfolio_register_posts.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-lb_portfolio_templates.php';
require plugin_dir_path( __FILE__ ) . 'includes/class-lb_portfolio_register_taxonomy.php';




