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
 * Register the custom post
 */

class Lb_portfolio_register_posts
{
    protected $lb_portfolio = 'lb_portfolio';
    protected $args;
    protected $lables;

/**
 * Add action to register the post type and flush permalinks on plugin activation
 */
    
    public function __construct() {
        add_action( 'init', array( $this, 'register_post_type' ) );
        register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
        register_activation_hook( __FILE__, 'lb_portfolio_flush_rewrites' );
    }

    public function register_post_type() {
        
        $this->labels = array( 
            'name'               => _x( 'Portfolio', 'lb_portfolio' ),
            'singular name'      => _x( 'Projects', 'lb_portfolio' ),
            'add_new'            => _x( 'Add new Project', 'lb_portfolio' ),
            'add_new_item'       => __( 'Add new Project', 'lb_portfolio' ),
            'edit_item'          => __( 'Edit Project', 'lb_portfolio' ),
            'new_item'           => __( 'New Project', 'lb_portfolio' ),
            'all_items'          => __( 'All Projects', 'lb_portfolio' ),
            'view_item'          => __( 'View Projects', 'lb_portfolio' ),
            'search_items'       => __( 'Search Projects', 'lb_portfolio' ),
            'not_found'          => __( 'No Projects', 'lb_portfolio' ),
            'not_found_in_trash' => __( 'No Projects found in trash', 'lb_portfolio' )
        );
    
        $this->args = array(
            'labels' => $this->labels,
            'public' => true,
            'has archive' => true,
            'show_in_rest' => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' )
        );
        
        register_post_type( $this->lb_portfolio, $this->args );
    }

/**
 * Flush rewrite rules
 */

    function lb_portfolio_flush_rewrites() {
	    register_post_type();
        flush_rewrite_rules();
    }
}

new Lb_portfolio_register_posts();




/**
 * Get template from theme, if not in theme get template from plugin
 */

class Lb_portfolio_templates
{
    protected $template_path;
    protected $theme_file;
    
    public function __construct() {
        add_filter( 'template_include', array( $this, 'lb_templates' ) );
    }

    public function lb_templates() {
        if ( is_page('portfolio') ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
                if ( $this->theme_file = locate_template( array ( 'lb_portfolio-page.php' ) ) ) {
                        $this->template_path = $this->theme_file;
                    } else {
                        $this->template_path = plugin_dir_path( __FILE__ ) . 'templates/lb_portfolio-page.php';
                    }
            }
        
            else if ( is_singular( 'lb_portfolio' ) ) {
                if ( $this->theme_file = locate_template( array ( 'single-lb_portfolio-posts.php' ) ) ) {
                        $this->template_path = $this->theme_file;
                    } else {
                        $this->template_path = plugin_dir_path( __FILE__ ) . 'templates/single-lb_portfolio-posts.php';
                    }
            }
           
            return $this->template_path;
    }
}

new Lb_portfolio_templates();


