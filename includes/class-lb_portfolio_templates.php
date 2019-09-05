<?php
/**
 * @package LB Portfolio
 * @version 1.0
 */

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
                        $template_path = $this->theme_file;
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
                if ( $this->theme_file = locate_template( array ( 'taxonomy.php' ) ) ) {
                        $this->template_path = $this->theme_file;
                    } else {
                        $this->template_path = plugin_dir_path( __FILE__ ) . '../templates/taxonomy.php';
                    }
            }
           
            return $this->template_path;
    }
}

new Lb_portfolio_templates();