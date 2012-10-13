<?php 
/* 
	Placeholdit class uses the placehol.it service to generate images for develolopment sites	
*/

class ds_place {

	/* Loads the One Widget right now */

	public function __construct() {
		add_action( 'widgets_init', array($this, 'load_widgets') );
	}

	public function load_widgets() {
		register_widget( 'Placeholdit_Widget' );
	}
	
	public function image($instance) {
		$title = apply_filters('widget_title', $instance['title'] );
		$width = $instance['width'];
		$tal = $instance['aslabel']; 
		$height = $instance['height'];
		$background = $instance['background'];
		$color = $instance['color'];
		$format = $instance['format'];	
		$kitten = $instance['kitten'];
		
		$width = ($wisth == '') ? '300' : $width;
		
		switch	($kitten) {
			case true :
				$base = "http://placekitten.com/";				
				$img = $base.$width;

				if ( $height ) 
					$img .= "/".$height;
			
				break;
			case false :
				$base = "http://placehold.it/";
				$img = $base.$width;

				if ( $height ) 
					$img .= "x".$height;

				if ( $background ) 
					$img .= "/".$background;
		
				if ( $color ) 
					$img .= "/".$color;
		
				if ( $format ) 
					$img .= ".".$format;
		
				if ( $tal ) 
					$img .= "&text=".$title;
				
				break;
				
			default :
			
		}

		return '<img src="'.$img.'" />';
		
	}
}
?>