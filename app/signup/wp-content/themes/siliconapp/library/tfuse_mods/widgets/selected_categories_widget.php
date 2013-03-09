<?php

class TFuse_Categories extends WP_Widget {

	function TFuse_Categories() {
		$widget_ops = array( 'classname' => 'widget_categories', 'description' => __( "A list of categories" ) );
		$this->WP_Widget('categories', __('Categories'), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract( $args );

		$title = apply_filters('widget_title', empty( $instance['title'] ) ? __( 'Categories' ) : $instance['title'], $instance, $this->id_base);
		$c = $instance['count'] ? '1' : '0';
		$h = $instance['hierarchical'] ? '1' : '0';

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;

		$cat_args = array('orderby' => 'name', 'show_count' => $c, 'hierarchical' => $h );
		$categories = get_categories( $cat_args );
		$count_cat = count($categories);
		$cat_ID = get_query_var('cat');
?>
<div class="left_box">
	<div class="left_box_top"></div>
	<div class="left_box_middle blog_cat_box">
		<div class="blog_categories">
		<?php $k = 0; foreach($categories as $category) { $k++; ?>

		<a class="blog_cat<?php if($cat_ID==$category->term_id) echo ' selected' ?>" href="<?php echo get_category_link( $category->term_id ) ?>"><?php echo $category->name ?></a>
        <a class="entries_no" href="#"><span><?php echo $category->count ?></span></a>
        <?php if($k<$count_cat) { ?><div class="sep_blog_categories"></div><?php } else { ?><div class="clear_container"></div><?php } ?>

		<?php } ?>
		</div>
		<!-- .blog_categories -->
	</div>
	<div class="left_box_bottom"></div>
</div>
<!-- .left_box -->

<?php
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['count'] = !empty($new_instance['count']) ? 1 : 0;
		$instance['hierarchical'] = !empty($new_instance['hierarchical']) ? 1 : 0;

		return $instance;
	}

	function form( $instance ) {
		//Defaults
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = esc_attr( $instance['title'] );
		$count = isset($instance['count']) ? (bool) $instance['count'] :false;
		$hierarchical = isset( $instance['hierarchical'] ) ? (bool) $instance['hierarchical'] : false;
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>"<?php checked( $count ); ?> />
		<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e( 'Show post counts' ); ?></label><br />

		<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id('hierarchical'); ?>" name="<?php echo $this->get_field_name('hierarchical'); ?>"<?php checked( $hierarchical ); ?> />
		<label for="<?php echo $this->get_field_id('hierarchical'); ?>"><?php _e( 'Show hierarchy' ); ?></label></p>
<?php
	}

}

function TFuse_deregister_categories_widgets(){
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Comments');
	//unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Meta');        
}
add_action('widgets_init','TFuse_deregister_categories_widgets');

register_widget('TFuse_Categories');
?>