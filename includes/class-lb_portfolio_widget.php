<?php
/**
 * Adds Portfolio Categories widget.
 */
class Lb_Portfolio_Widget extends WP_Widget {
	protected $widget_args;
	protected $terms;

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'lb_portfolio', // Base ID
			esc_html__( 'Portfolio Categories', 'lb_portfolio' ), // Name
			array( 'description' => esc_html__( 'Portfolio Widget', 'lb_portfolio' ), ) // Args
		);
		add_action( 'widgets_init', array( $this, 'register_portfolio_widget' ) );
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 * @param array $widget_args Arguments for the widget content on front end
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		// Widget front end content
		$widget_args = array( 
			'taxonomy' => 'portfolio_categories',
			'title_li' => '',
			'current_category' => 0
		);
			
		// Wrap taxonomies list in an unordered list 
		echo '<ul>'; 
		echo wp_list_categories($widget_args);
		echo '</ul>';
		echo $args['after_widget'];

	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'lb_portfolio' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'lb_portfolio' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		return $instance;
	}
	
	function register_portfolio_widget() {
		register_widget( 'Lb_Portfolio_Widget' );
	}

}

new Lb_Portfolio_Widget();