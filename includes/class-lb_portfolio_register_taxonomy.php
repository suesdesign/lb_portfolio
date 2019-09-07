<?php
/**
 * @package LB Portfolio
 * @version 1.0
 */

/**
 * Register the taxnomoy
 */

class Lb_Portfolio_Register_Taxonomy
{
    protected $lb_portfolio = 'lb_portfolio';
    protected $args;
    protected $lables;

/**
 * Add action to register the taxonomy
 */
    
    public function __construct() {
        add_action( 'init', array( $this, 'register_taxonomy' ) );
    }

    public function register_taxonomy() {
        
        $this->labels = array( 
            'name' => _x( 'Portfolio Categories', 'taxonomy general name' ),
            'singular_name' => _x( 'Portfolio category', 'taxonomy singular name' ),
            'search_items' =>  __( 'Search portfolio categories' ),
            'popular_items' => __( 'Popular portfolio categories' ),
            'all_items' => __( 'All portfolio categories' ),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => __( 'Edit Portfolio category' ), 
            'update_item' => __( 'Update Portfolio category' ),
            'add_new_item' => __( 'Add New Portfolio category' ),
            'new_item_name' => __( 'New Portfolio category Name' ),
            'separate_items_with_commas' => __( 'Separate portfolio categories with commas' ),
            'add_or_remove_items' => __( 'Add or remove portfolio categories' ),
            'choose_from_most_used' => __( 'Choose from the most used portfolio categories' ),
            'menu_name' => __( 'Portfolio categories' )
        );
    
        register_taxonomy( 'portfolio_categories','lb_portfolio', array(
            'hierarchical' => false,
            'labels' => $this->labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array( 'slug' => 'portfolio_categories' ),
            'show_in_rest' => true,
          ));
        
        register_taxonomy( $this->lb_portfolio, $this->args );
    }
}


new Lb_Portfolio_Register_Taxonomy();