<?php
class Placeholdit_Widget extends WP_Widget {

	function Placeholdit_Widget() {
		/* Widget settings. */
		$widget_ops = array( 'classname' => 'placeholdit', 'description' => __('A widget that creates a placeholder image.', 'placeholdit') );

		/* Widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'placeholdit-widget' );

		/* Create the widget. */
		$this->WP_Widget( 'placeholdit-widget', __('Placeholdit Widget', 'placeholdit'), $widget_ops, $control_ops );
	}

	/**
	 * How to display the widget on the screen.
	 */
	function widget( $args, $instance ) {
		extract( $args );
		global $placeholdit;

		/* Before widget (defined by themes). */
		echo $before_widget;

		/* Display the widget title if one was input (before and after defined by themes). */
		if ( $title && !$tal )
			echo $before_title . $title . $after_title;
	
			echo $placeholdit->image($instance);		

		/* After widget (defined by themes). */
		echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['aslabel'] = strip_tags( $new_instance['aslabel'] );

		$instance['width'] = strip_tags( $new_instance['width'] );
		$instance['height'] = strip_tags( $new_instance['height'] );
		$instance['background'] = strip_tags( $new_instance['background'] );
		$instance['color'] = strip_tags( $new_instance['color'] );

		$instance['kitten'] = strip_tags( $new_instance['kitten'] );

		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => __('Placeholdit', 'placeholdit'), 'width' => __('125', 'placeholdit'), 'height' => '125', 'background' => 'cccccc', 'color' => '454545' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'hybrid'); ?></label>
			<input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		</p>

		<!-- Title as Labe: checkbox -->
		<p>
		<?php $checked = ($instance['aslabel']) ? 'checked="true"' : ''; ?>
			<input id="<?php echo $this->get_field_id( 'aslabel' ); ?>" name="<?php echo $this->get_field_name( 'aslabel' ); ?>" <?php echo $checked ?> type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'aslabel' ); ?>"><?php _e('Use title as Label', 'placeholdit'); ?></label>
		</p>

		
		<!-- Width: Text Input -->
		<p>
			<input id="<?php echo $this->get_field_id( 'width' ); ?>" name="<?php echo $this->get_field_name( 'width' ); ?>" value="<?php echo $instance['width']; ?>" style="width:50px;" />
			<label for="<?php echo $this->get_field_id( 'width' ); ?>"><?php _e('Width (px):', 'placeholdit'); ?></label>
		</p>

		<!-- Height: Text Input -->
		<p>
			<input id="<?php echo $this->get_field_id( 'height' ); ?>" name="<?php echo $this->get_field_name( 'height' ); ?>" value="<?php echo $instance['height']; ?>" style="width:50px;" />
			<label for="<?php echo $this->get_field_id( 'height' ); ?>"><?php _e('Height (px):', 'placeholdit'); ?></label>
		</p>

		<!-- Background: Text Input -->
		<p>
			<input id="<?php echo $this->get_field_id( 'background' ); ?>" name="<?php echo $this->get_field_name( 'background' ); ?>" value="<?php echo $instance['background']; ?>" style="width:50px;" />
			<label for="<?php echo $this->get_field_id( 'background' ); ?>"><?php _e('Background (hex):', 'placeholdit'); ?></label>
		</p>

		<!-- Color: Text Input -->
		<p>
			<input id="<?php echo $this->get_field_id( 'color' ); ?>" name="<?php echo $this->get_field_name( 'color' ); ?>" value="<?php echo $instance['color']; ?>" style="width:50px;" />
			<label for="<?php echo $this->get_field_id( 'color' ); ?>"><?php _e('Font Color (hex):', 'placeholdit'); ?></label>
		</p>

		<!-- Use Pplacekitten instead as Labe: checkbox -->
		<p>
		<?php $checked = ($instance['kitten']) ? 'checked="true"' : ''; ?>
			<input id="<?php echo $this->get_field_id( 'kitten' ); ?>" name="<?php echo $this->get_field_name( 'kitten' ); ?>" <?php echo $checked ?> type="checkbox" />
			<label for="<?php echo $this->get_field_id( 'kitten' ); ?>"><?php _e('Use <a href="http://placekitten.com">Placekitten</a> instead.', 'placeholdit'); ?></label>
		</p>

	<?php
	}
}
?>