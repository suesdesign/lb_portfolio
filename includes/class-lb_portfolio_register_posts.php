<?php
/**
 * @package LB Portfolio
 * @version 1.0
 */

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