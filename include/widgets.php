<?php

function shape_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar1', 'shape' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'sef' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	/*register_sidebar( array(
		'name' => __( 'Sidebar2', 'shape' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'sef' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );*/
}
add_action( 'widgets_init', 'shape_widgets_init' );



//////////////////////////////////
/*
// Creating the widget 
class wpb_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'wpb_widget', 

// Widget name will appear in UI
__('WPBeginner Widget', 'wpb_widget_domain'), 

// Widget description
array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'wpb_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
$product_no = apply_filters( 'widget_title', $instance['product_no'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
//echo __( 'Hello, World!', 'wpb_widget_domain' );
//echo 'product_no=> '.$product_no;
echo '<ul>';
// This is where you run the code and display the output
  $args = array('post_type'=>'product','posts_per_page'=>$product_no );
	$my_query = new WP_Query($args);
	while ($my_query->have_posts()) : $my_query->the_post(); 
			echo '<li>'.get_the_title().'</li>';
	endwhile; 
echo '</ul>';
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
if ( isset( $instance[ 'product_no' ] ) ) {
$product_no = $instance[ 'product_no' ];
}
else {
$product_no = 5;
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id( 'product_no' ); ?>"><?php _e( 'product number:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'product_no' ); ?>" name="<?php echo $this->get_field_name( 'product_no' ); ?>" type="text" value="<?php echo esc_attr( $product_no ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
$instance['product_no'] = ( ! empty( $new_instance['product_no'] ) ) ? strip_tags( $new_instance['product_no'] ) : '';
return $instance;
}
} // Class wpb_widget ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 
 */
 