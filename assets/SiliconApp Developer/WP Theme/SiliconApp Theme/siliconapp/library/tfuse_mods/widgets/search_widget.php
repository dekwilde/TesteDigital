<?php

// =============================== Search widget ======================================

class TFuse_search extends WP_Widget {

	function TFuse_search() {
		$widget_ops = array('description' => '' );
		parent::WP_Widget(false, __('TFuse - Search', 'tfuse'),$widget_ops);      
	}

	function widget($args, $instance) { 
		include(TEMPLATEPATH . '/search-form.php');
    }

    function update($new_instance, $old_instance) {                
       return $new_instance;
    }

    function form($instance) {        
 	}
} 
register_widget('TFuse_search');


/* 
	Deregister Default Widgets 
*/
function TFuse_deregister_widgets(){
	unregister_widget('WP_Widget_Search');         
}
add_action('widgets_init','TFuse_deregister_widgets');  


?>