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
 * Register the custom post
 */

class Lb_portfolio_register_posts
{
    protected $lb_portfolio = 'lb_portfolio';
    protected $args;
    
    public function __construct() {
    
        add_action( 'init', array( $this, 'register_post_type' ) );
    }

    public function register_post_type() {
        
        $labels = array( 
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
    
        $args = array(
            'labels' => $labels,
            'public' => true,
            'has archive' => true,
            'show_in_rest' => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' )
        );
        
        register_post_type( $this->lb_portfolio, $args );
    }
}

$lb_portfolio = new lb_portfolio_register_posts();




/**
 * Get template from theme, if not in theme get template from plugin
 */

/**
 * Flush permalinks on plugin activation
 */

