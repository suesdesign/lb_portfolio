<?php
/**
 * @package LB Portfolio
 * @version 1.0
 */

/**
 * Get template from theme, if not in theme get template from plugin
 */

class Lb_Portfolio_Templates
{
    protected $template_path;
    protected $theme_file;
    
    public function __construct() {
        add_filter( 'template_include', array( $this, 'lb_templates' ) );
    }
    
    public function lb_templates($original_template) {
        if ( is_page('projects') ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
                if ( $this->theme_file = locate_template( array ( 'lb_portfolio-page.php' ) ) ) {
                        $this->template_path = $this->theme_file;
                    } else {
                        $this->template_path = plugin_dir_path( __FILE__ ) . '../templates/lb_portfolio-page.php';
                    }
            }
        
           else if ( is_singular( 'lb_portfolio' ) ) {
                if ( $this->theme_file = locate_template( array ( 'single-lb_portfolio-posts.php' ) ) ) {
                        $this->template_path = $this->theme_file;
                    } else {
                        $this->template_path = plugin_dir_path( __FILE__ ) . '../templates/single-lb_portfolio-posts.php';
                    }
            }

            else if ( is_tax() ) {
                if ( $this->theme_file = locate_template( array ( 'taxonomy-portfolio_categories.php' ) ) ) {
                        $this->template_path = $this->theme_file;
                    } else {
                        $this->template_path = plugin_dir_path( __FILE__ ) . '../templates/taxonomy-portfolio_categories.php';
                    }
            }

            else {
                $this->template_path = $original_template;
            }
           
            return $this->template_path;
    }
}


new Lb_Portfolio_Templates();