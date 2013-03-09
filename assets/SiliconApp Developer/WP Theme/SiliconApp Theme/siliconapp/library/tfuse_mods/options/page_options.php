<?php
/* Initializes all the theme settings option fields for pages area. */
function page_option_fields(){
	global $tfuse, $page_options;
	$prefix = $tfuse->prefix;
	
	$page_options = array();  	
 
 	/***********************************************************
		Sidebar
	************************************************************/
 	
	
	
 	/***********************************************************
		Normal
	************************************************************/
	
	/* Header Panel */ 
	$page_options[] = array(	"name"    	=> "Pages Submenu",
								"id"      	=> "{$prefix}_page_header",
								"page"		=> "page", 					 
								"type"		=> "metabox",				 
								"context"	=> "normal");				 	
	/* Header Title */						
	$page_options[] = array( 	"name" 		=> "Submenu Header Title",
								"desc" 		=> "Enter your preferred Header Title for subenu pages (only on parent page).",
								"id" 		=> "{$prefix}_page_header_title",
								"std" 		=> "All the features you need:",
								"type"		=> "text");

	 /* Custom Page Icon */
	 $page_options[] = array(	"name" 		=> "Submenu Page Icon",
								"desc" 		=> "Upload an icon for your left submenu page if this is a subpage.",
								"id" 		=> "{$prefix}_page_icon_image",
								"std" 		=> "",
								"type" 		=> "upload"); 
	 
	if(get_option("{$prefix}_deactivate_tfuse_seo")!='true') {
	/* SEO Panel */
	$page_options[] = array(	"name"    	=> "SEO",
								"id"      	=> "{$prefix}_page_seo",
								"page"		=> "page",
								"type"		=> "metabox",
								"context"	=> "normal");

	$page_options[] = array(	"name" 		=> "Custom Post Title",
								"desc" 		=> "Enter your prefered custom title or leave blank for deafault value.",
								"id" 		=> "{$prefix}_page_seo_title",
								"std" 		=> "",
								"type" 		=> "text");

	$page_options[] = array(	"name" 		=> "Custom Post Keywords",
								"desc" 		=> "Enter your prefered custom keywords or leave blank for deafault value.",
								"id" 		=> "{$prefix}_page_seo_keywords",
								"std" 		=> "",
								"type" 		=> "textarea");

	$page_options[] = array(	"name" 		=> "Custom Post Description",
								"desc" 		=> "Enter your prefered custom description or leave blank for deafault value.",
								"id" 		=> "{$prefix}_page_seo_description",
								"std" 		=> "",
								"type" 		=> "textarea");
	}

 	/***********************************************************
		Advanced
	************************************************************/
	
 	
	/* END custom_option_fields() */
	update_option("{$tfuse->prefix}_page_options",$page_options);
	// END custom_option_fields()
}

?>