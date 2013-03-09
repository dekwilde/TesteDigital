<?php

// Register widgetized areas

function the_widgets_init() {
	global $tfuse;
	$prefix = $tfuse->prefix;

    if ( !function_exists('register_sidebars') )
        return;

    register_sidebar(array('name' => 'General Sidebar','id' => 'sidebar-1','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<p>','after_title' => '</p>'));
   	register_sidebar(array('name' => 'Sidebar Page','id' => 'sidebar-page','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<p>','after_title' => '</p>'));
    register_sidebar(array('name' => 'Sidebar Single Post','id' => 'sidebar-single-post','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<p>','after_title' => '</p>'));
    register_sidebar(array('name' => 'Sidebar Category','id' => 'sidebar-category','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<p>','after_title' => '</p>'));


 	// Multi Page Widget
	$multi_widget = "{$prefix}_multi_widget_pages_hidden";
	$count_multi_widget = get_option( $multi_widget );
	
	if( $count_multi_widget > 1 ) {

		for($i = 0; $i < $count_multi_widget; $i++)
		{
			$str_page = get_option( "{$prefix}_multi_widget_pages_". $i );		
			$pageArr = explode("_",$str_page);
			if ( !isset($pageArr[1]) ) $pageArr[1] = 0;
			$page_id = $pageArr[1];
			if ( $page_id > 0 ) register_sidebar(array('name' => "Sidebar Page - ".get_the_title($page_id),'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<p>','after_title' => '</p>'));			
		}
	}
	
	// Multi Category Widget
	$multi_widget = "{$prefix}_multi_widget_categories_hidden";
	$count_multi_widget = get_option( $multi_widget );
	
	if( $count_multi_widget > 1 ) {

		for($i = 0; $i < $count_multi_widget; $i++)
		{
			$str_cat = get_option( "{$prefix}_multi_widget_categories_". $i );	
			$catArr = explode("_",$str_cat);
			if ( !isset($catArr[1]) ) $catArr[1] = 0;
			$cat_id = $catArr[1];
			if ( $cat_id > 0 ) register_sidebar(array('name' => "Sidebar Category - ".get_cat_name($cat_id),'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<p>','after_title' => '</p>'));			
		}
	}
	
	// Multi Post Widget
	$multi_widget = "{$prefix}_multi_widget_posts_hidden";
	$count_multi_widget = get_option( $multi_widget );
	
	if( $count_multi_widget > 1 ) {

		for($i = 0; $i < $count_multi_widget; $i++)
		{
			$str_post = get_option( "{$prefix}_multi_widget_posts_". $i );		
			$postArr = explode("_",$str_post);
			$post_id = $postArr[1];
			if ( $post_id > 0 ) register_sidebar(array('name' => "Sidebar Post - ".get_the_title($post_id),'before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<p>','after_title' => '</p>'));			
		}
	}
	
	// Boxes Widget
	$boxes_widget = "{$prefix}_home_box_count";
	$count_multi_widget = get_option( $boxes_widget );
	
	if( $count_multi_widget > 1 ) {

		for($i = 1; $i <= $count_multi_widget; $i++)
		{ 
			$type_widget = get_option("{$prefix}_home_box".$i);
			if($i == $count_multi_widget) { $last_box = 'plast'; } else { $last_box = ''; }  
			if ( $type_widget == 'widget' ) register_sidebar(array('name' => "Home Page Box ".$i,'before_widget' => '<div id="%1$s" class="panel '.$last_box.' widget %2$s">','after_widget' => '</div>','before_title' => '<p>','after_title' => '</p><div class="line"></div>'));			
		}
	}
	
 }

add_action( 'init', 'the_widgets_init' );

?>