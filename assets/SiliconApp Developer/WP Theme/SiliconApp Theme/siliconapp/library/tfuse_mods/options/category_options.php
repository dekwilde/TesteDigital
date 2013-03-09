<?php
/* Initializes all the theme settings option fields for categories area. */
function category_option_fields(){
	global $tfuse, $category_options;
	$prefix = $tfuse->prefix;
	
	$category_options = array();
	
	/* Choise Header Bar Type */
	$category_options[] = array("name" 		=> "Choice Category Template",
								"desc" 		=> "Some themes have custom templates you can use for certain categories that might have additional features or custom layouts. If so, you'll see them above.",
								"id" 		=> "{$prefix}_category_template",
								"std" 		=> "default",
								"type"		=> "select",
								"options" 	=> tfuse_category_template());
	
	/* Header Title */						
	$category_options[] = array("name" 		=> "Submenu Header Title",
								"desc" 		=> "Enter your preferred Header Title for categories subenu (only on parent category).",
								"id" 		=> "{$prefix}_category_header_title",
								"std" 		=> "Categories",
								"type"		=> "text");
								 
	/* Custom Category Icon */
	$category_options[] = array("name" 		=> "Submenu Category Icon",
								"desc" 		=> "Upload an icon for categories submenu page if this is a subcategory (only in portfolio template).",
								"id" 		=> "{$prefix}_category_icon",
								"std" 		=> "",
								"type" 		=> "upload"); 
	
	if(get_option("{$prefix}_deactivate_tfuse_seo")!='true') {
	$category_options[] = array("name" 		=> "SEO - Title",
								"desc" 		=> "Enter your prefered custom title or leave blank for deafault value.",
								"id" 		=> "{$prefix}_cat_seo_title",
								"std" 		=> "",
								"type" 		=> "text");
	
	$category_options[] = array("name" 		=> "SEO - Keywords",
								"desc" 		=> "Enter your prefered custom keywords or leave blank for deafault value.",
								"id" 		=> "{$prefix}_cat_seo_keywords",
								"std" 		=> "",
								"type" 		=> "textarea");
	
	$category_options[] = array("name" 		=> "SEO - Description",
								"desc" 		=> "Enter your prefered custom description or leave blank for deafault value.",
								"id" 		=> "{$prefix}_cat_seo_description",
								"std" 		=> "",
								"type" 		=> "textarea");
	}
	
	/* END custom_option_fields() */
	update_option("{$tfuse->prefix}_category_options",$category_options);
	// END custom_option_fields()
}

?>