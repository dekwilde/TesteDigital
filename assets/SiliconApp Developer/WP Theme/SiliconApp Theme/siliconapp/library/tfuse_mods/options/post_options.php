<?php
/* Initializes all the theme settings option fields for posts area. */
function post_option_fields(){
	global $tfuse, $post_options;
	$prefix = $tfuse->prefix;
	
	$post_options = array();	

	/* Single Post */ 
	$post_options[] = array(	"name"    	=> "Single Post",
								"id"      	=> "{$prefix}_post_side_media",
								"page"		=> "post", 					 
								"type"		=> "metabox",				 
								"context"	=> "side");				 
	
	/* Disable Single Post Image */						
	$post_options[] = array( 	"name" 		=> "Disable Single Post Image",
								"desc" 		=> "",
								"id" 		=> "{$prefix}_post_single_image",
								"std" 		=> "false",
								"type"		=> "checkbox");
	
	/* Disable Single Post Video */						
	$post_options[] = array( 	"name" 		=> "Disable Single Post Video",
								"desc" 		=> "",
								"id" 		=> "{$prefix}_post_single_video",
								"std" 		=> "false",
								"type"		=> "checkbox");
	
	/* Disable Single Post Video */						
	$post_options[] = array( 	"name" 		=> "Disable Single Post Comments",
								"desc" 		=> "",
								"id" 		=> "{$prefix}_post_single_comments",
								"std" 		=> "false",
								"type"		=> "checkbox");
	
 	/* Post Data Panel */ 
	$post_options[] = array(	"name"    	=> "Post Images",
								"id"      	=> "{$prefix}_post_data",
								"page"		=> "post", 					 
								"type"		=> "metabox",				 
								"context"	=> "normal");				 
	
	 /* Custom Header Image */
	 $post_options[] = array(	"name" 		=> "Custom Post Image (Large format)",
								"desc" 		=> "Upload a Post Image for your post, or specify the image address of your online Post Image. (http://yoursite.com/image.png)",
								"id" 		=> "{$prefix}_post_image",
								"std" 		=> "",
								"type" 		=> "upload"); 
	
	 /* Custom Header Image */
	 $post_options[] = array(	"name" 		=> "Custom Post Image (Medium - 485 x 151px)",
								"desc" 		=> "Upload a Post Image for your post, or specify the image address of your online Post Image. (http://yoursite.com/image.png) ",
								"id" 		=> "{$prefix}_post_image_medium",
								"std" 		=> "",
								"type" 		=> "upload"); 
	
	 /* Custom Header Image */
	 $post_options[] = array(	"name" 		=> "Custom Post Image (Small - 270 x 135px)",
								"desc" 		=> "Upload a Post Image for your post, or specify the image address of your online Post Image. (http://yoursite.com/image.png) ",
								"id" 		=> "{$prefix}_post_image_small",
								"std" 		=> "",
								"type" 		=> "upload"); 
	
	 /* Custom Header Image */
	 $post_options[] = array(	"name" 		=> "Custom Post Video",
								"desc" 		=> "Read <a target='_blank' href='http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/'>prettyPhoto documentation</a> for info on how to add video or flash in this URL.",
								"id" 		=> "{$prefix}_post_video",
								"std" 		=> "",
								"type" 		=> "text"); 
	 
	if(get_option("{$prefix}_deactivate_tfuse_seo")!='true') {
 	/* SEO Panel */ 
	$post_options[] = array(	"name"    	=> "SEO",
								"id"      	=> "{$prefix}_post_seo",
								"page"		=> "post", 					 
								"type"		=> "metabox",				 
								"context"	=> "normal");
	
	$post_options[] = array(	"name" 		=> "Custom Post Title",
								"desc" 		=> "Enter your prefered custom title or leave blank for deafault value.",
								"id" 		=> "{$prefix}_post_seo_title",
								"std" 		=> "",
								"type" 		=> "text");
	
	$post_options[] = array(	"name" 		=> "Custom Post Keywords",
								"desc" 		=> "Enter your prefered custom keywords or leave blank for deafault value.",
								"id" 		=> "{$prefix}_post_seo_keywords",
								"std" 		=> "",
								"type" 		=> "textarea");
	
	$post_options[] = array(	"name" 		=> "Custom Post Description",
								"desc" 		=> "Enter your prefered custom description or leave blank for deafault value.",
								"id" 		=> "{$prefix}_post_seo_description",
								"std" 		=> "",
								"type" 		=> "textarea");													
	}

 
	/* END custom_option_fields() */
	update_option("{$tfuse->prefix}_post_options",$post_options);
	// END custom_option_fields()
}

?>