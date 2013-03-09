<?php
/* Initializes all the theme settings option fields for admin area. */ 	
function admin_option_fields(){
	global $admin_options, $tfuse;	
	$prefix = $tfuse->prefix;
	
	$admin_options = array();  
  	
	/* General Tab */
 	$admin_options[] = array( 	"name"  	=> "General",
								"type"  	=> "tab",
								"id"    	=> "general");
	
	/* General Settings Panel */
	$admin_options[] = array( 	"name"  	=> "General Settings",
								"type"  	=> "heading");
	
	// Theme Stylesheet Option  
	$admin_options[] = array(	"name" 		=> "Theme Stylesheet",
								"desc" 		=> "Please select your colour scheme here.",
								"id" 		=> "{$prefix}_alt_stylesheet",
								"std" 		=> "",
								"type" 		=> "select",
								"options" 	=> tfuse_styles());
	
	// Custom Logo Option  
	 $admin_options[] = array( "name" 		=> "Custom Logo",
								"desc" 		=> "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
								"id" 		=> "{$prefix}_logo",
								"std" 		=> "",
								"type" 		=> "upload"); 

	// Custom Favicon Option  
	$admin_options[] = array( 	"name"  	=> "Custom Favicon",
								"desc"  	=> "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
								"id"    	=> "{$prefix}_custom_favicon",
								"std"   	=> "",
								"type"  	=> "upload"); 
	
	// Tracking Code Option  
	$admin_options[] = array( 	"name"  	=> "Tracking Code",
								"desc"  	=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
								"id"    	=> "{$prefix}_google_analytics",
								"std"   	=> "",
								"type"  	=> "textarea");        
	
	// RSS URL Option  
	$admin_options[] = array( 	"name"  	=> "RSS URL",
								"desc"  	=> "Enter your preferred RSS URL. (Feedburner or other)",
								"id"    	=> "{$prefix}_feedburner_url",
								"std"   	=> "",
								"type"  	=> "text");
	// E-Mail URL Option  
	$admin_options[] = array(	"name"  	=> "E-Mail URL",
								"desc"  	=> "Enter your preferred E-mail subscription URL. (Feedburner or other)",
								"id"    	=> "{$prefix}_feedburner_id",
								"std"   	=> "",
								"type"  	=> "text");
	
	// Custom CSS Option  
	$admin_options[] = array( 	"name"  	=> "Custom CSS",
							  	"desc"  	=> "Quickly add some CSS to your theme by adding it to this block.",
								"id"    	=> "{$prefix}_custom_css",
								"std"   	=> "",
								"type"  	=> "textarea");

	//Footer Text Option
	$admin_options[] = array( 	"name"  	=> "Footer Text",
								"desc"  	=> "Enter your preferred footer text for your theme.",
								"id"    	=> "{$prefix}_footer_text",
								"std"   	=> "&amp;copy; 2010 Software Company. All rights reserved",
								"type"  	=> "text");        

								   
	/* Middle boxes Bar Panel */
 	$admin_options[] = array( 	"name"  	=> "Middle Boxes",
								"type"  	=> "heading",
								"id"    	=> "middle_boxes");

	// Middle Boxes 1
	$admin_options[] = array(	"name"  	=> "Middle Box 1",
								"desc"  	=> "Paste content for Middle Box 1. ",
								"id"    	=> "{$prefix}_middle_box_1",
								"std"   	=> "",
								"type"  	=> "textarea");
				
	// Middle Boxes 2
	$admin_options[] = array(	"name"  	=> "Middle Box 2",
								"desc"  	=> "Paste content for Middle Box 2. ",
								"id"    	=> "{$prefix}_middle_box_2",
								"std"   	=> "",
								"type"  	=> "textarea");
								
	// Middle Boxes 3
	$admin_options[] = array(	"name"  	=> "Middle Box 3",
								"desc"  	=> "Paste content for Middle Box 3. ",
								"id"    	=> "{$prefix}_middle_box_3",
								"std"   	=> "",
								"type"  	=> "textarea");
	
	/* Sidebar Panel */
	$admin_options[] = array(	"name"  	=> "Sidebar",
					    	  	"type"  	=> "heading"); 

	// Extra Widget Areas for specific Pages Option  
 	$admin_options[] = array(	"name"  	=> "Extra Widget Areas for specific Pages",
								"desc"  	=> "Here you can add widget areas for single pages. That way you can put different content for each page into your sidebar.<br/>
												After you have choosen the Pages press the 'Save Changes' button and then start adding widgets to your new widget areas <a href='widgets.php'>here</a>.<br/><br/>
												<strong>Attention</strong> when removing areas: You have to be carefull when deleting widget areas that are not the last one in the list.<br/> It is recommended to avoid this. If you want to know more about this topic please read the documentation that comes with this theme.<br/>",
								"id"    	=> "{$prefix}_multi_widget_pages",
								"type"  	=> "multi",
								"subtype" 	=> "page");
	
	// Extra Widget Areas for specific Categories Option  
	$admin_options[] = array(	"name"  	=> "Extra Widget Areas for specific Categories",
								"desc"  	=> "Here you can add widget areas for single categories. That way you can put different content for each category into your sidebar.<br/>
												After you have choosen the Pages press the 'Save Changes' button and then start adding widgets to your new widget areas <a href='widgets.php'>here</a>.<br/><br/>
												<strong>Attention</strong> when removing areas: You have to be carefull when deleting widget areas that are not the last one in the list.<br/> It is recommended to avoid this. If you want to know more about this topic please read the documentation that comes with this theme.<br/>",
								"id"    	=> "{$prefix}_multi_widget_categories",
								"type"  	=> "multi",
								"subtype" 	=> "category");
	
	// Extra Widget Areas for specific Posts  
	$admin_options[] = array(	"name"  	=> "Extra Widget Areas for specific Posts",
								"desc"  	=> "Here you can add widget areas for single post. That way you can put different content for each post into your sidebar.<br/>
												After you have choosen the Posts press the 'Save Changes' button and then start adding widgets to your new widget areas <a href='widgets.php'>here</a>.<br/><br/>
												<strong>Attention</strong> when removing areas: You have to be carefull when deleting widget areas that are not the last one in the list.<br/> It is recommended to avoid this. If you want to know more about this topic please read the documentation that comes with this theme.<br/>",
								"id"    	=> "{$prefix}_multi_widget_posts",
								"type"  	=> "multi",
								"subtype" 	=> "post");
	
	/* Cufon Panel */
	$admin_options[] = array( 	"name"  	=> "Cufon Font",
								"type"  	=> "heading");    
	
	// Enable Dynamic Image Resizer Option  
	$admin_options[] = array( 	"name"  	=> "Disable Cufon Font",
								"desc"  	=> "This will disable the cufon font.",
								"id"    	=> "{$prefix}_cufon",
								"std"   	=> "false",
								"type"  	=> "checkbox");
	
	/* Lightbox (prettyPhoto) Panel */
	$admin_options[] = array(   "name"  	=> "Lightbox (prettyPhoto)",
								"type"  	=> "heading");    

	// Disable posts lightbox (prettyPhoto) Option  
	$admin_options[] = array(	"name"  	=> "Disable lightbox",
								"desc"  	=> "Disable lightbox (prettyPhoto)",
								"id"    	=> "{$prefix}_disable_lightbox",
								"std"   	=> "false",
								"type"  	=> "checkbox");

	/* Disable SEO options Panel */
	$admin_options[] = array(   "name"  	=> "Disable SEO options",
								"type"  	=> "heading");

	// Disable SEO options Option
	$admin_options[] = array(	"name"  	=> "Disable SEO",
								"desc"  	=> "Disable framework SEO options",
								"id"    	=> "{$prefix}_deactivate_tfuse_seo",
								"std"   	=> "false",
								"type"  	=> "checkbox");
		
	/* Dynamic Images Panel */
	$admin_options[] = array( 	"name"  	=> "Dynamic Images",
								"type"  	=> "heading");    
	
	// Enable Dynamic Image Resizer Option  
	$admin_options[] = array( 	"name"  	=> "Enable Dynamic Image Resizer",
								"desc"  	=> "This will enable the thumb.php script. It dynamicaly resizes images on your site.",
								"id"    	=> "{$prefix}_resize",
								"std"   	=> "false",
								"type"  	=> "checkbox");    
	
	/* HomePage Tab */
	$admin_options[] = array( 	"name"  	=> "Homepage",
								"type"  	=> "tab",
								"id"    	=> "homepage");
	
	/* HomePage - Boxes Panel */
	$admin_options[] = array(   "name"  	=> "Homepage Boxes",
								"type"  	=> "heading");    
	
	// HomePage - Boxes Option  
	$admin_options[] = array(	"name" 		=> "HomePage - Box",
								"desc" 		=> "How to populate HomePage - Box",
								"id"   		=> "{$prefix}_home_box",
								"type" 		=> "boxes",
								"count"		=> 2);
								
								
	/* HomePage - Slider Panel */
	$admin_options[] = array(   "name"  	=> "Homepage Slider",
								"type"  	=> "heading");
								
	// HomePage - Slider Box1 Title  
	$admin_options[] = array( 	"name" 		=> "Slider home page box1 title",
								"desc" 		=> "Enter home page box1 title",
								"id" 		=> "{$prefix}_slider_box1_title",
								"std" 		=> "",
								"type" 		=> "text"); 

	// HomePage - Slider Box1 Text 
	$admin_options[] = array( 	"name" 		=> "Slider home page box1 text",
								"desc" 		=> "Enter  home page slider box1 text",
								"id" 		=> "{$prefix}_slider_box1_text",
								"std" 		=> "",
								"type" 		=> "textarea"); 
								
	// HomePage - Slider Box1 button 
	$admin_options[] = array( 	"name" 		=> "Slider home page box1 button",
								"desc" 		=> "Enter  home page box1 button",
								"id" 		=> "{$prefix}_slider_box1_button",
								"std" 		=> "",
								"type" 		=> "text"); 
	
	// HomePage - Slider Box2 Title  
	$admin_options[] = array( 	"name" 		=> "Slider home page box2 title",
								"desc" 		=> "Enter home page box2 title",
								"id" 		=> "{$prefix}_slider_box2_title",
								"std" 		=> "",
								"type" 		=> "text"); 

	// HomePage - Slider Box2 Text 
	$admin_options[] = array( 	"name" 		=> "Slider home page box2 text",
								"desc" 		=> "Enter  home page slider box2 text",
								"id" 		=> "{$prefix}_slider_box2_text",
								"std" 		=> "",
								"type" 		=> "textarea"); 
								
	// HomePage - Slider Box2 button 
	$admin_options[] = array( 	"name" 		=> "Slider home page box2 button",
								"desc" 		=> "Enter  home page box2 button",
								"id" 		=> "{$prefix}_slider_box2_button",
								"std" 		=> "",
								"type" 		=> "text"); 
								
	// HomePage - Slider Box3 Title  
	$admin_options[] = array( 	"name" 		=> "Slider home page box3 title",
								"desc" 		=> "Enter home page box3 title",
								"id" 		=> "{$prefix}_slider_box3_title",
								"std" 		=> "",
								"type" 		=> "text"); 

	// HomePage - Slider Box3 Text 
	$admin_options[] = array( 	"name" 		=> "Slider home page box3 text",
								"desc" 		=> "Enter  home page slider box3 text",
								"id" 		=> "{$prefix}_slider_box3_text",
								"std" 		=> "",
								"type" 		=> "textarea"); 
								
	// HomePage - Slider Box3 button 
	$admin_options[] = array( 	"name" 		=> "Slider home page box3 button",
								"desc" 		=> "Enter  home page box3 button",
								"id" 		=> "{$prefix}_slider_box3_button",
								"std" 		=> "",
								"type" 		=> "text"); 
								
	// HomePage - Slider Delay 
	$admin_options[] = array( 	"name" 		=> "Slider home page delay",
								"desc" 		=> "Enter  home page Slider Delay",
								"id" 		=> "{$prefix}_homepage_slider_timeout",
								"std" 		=> "5",
								"type" 		=> "text"); 
	
	 // Custom Home Page Image Option  
	 $admin_options[] = array( "name" 		=> "Custom Home Page Image",
								"desc" 		=> "Upload a home page image for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)",
								"id" 		=> "{$prefix}_home_page_image",
								"std" 		=> "",
								"type" 		=> "upload");

	if(get_option("{$prefix}_deactivate_tfuse_seo")!='true') { 
 	 /* SEO Tab */
	$admin_options[] = array( 	"name"  	=> "SEO",
								"type"  	=> "tab",
								"id"    	=> "seo");
	
	$admin_options[] = array(   "name"  	=> "META Data for HomePage",
								"type"  	=> "heading");
	
	$admin_options[] = array( 	"name" 		=> "Home Page Title",
								"desc" 		=> "Enter custom title for home page.",
								"id" 		=> "{$prefix}_homepage_title",
								"std" 		=> "",
								"type" 		=> "text");
	
	$admin_options[] = array( 	"name" 		=> "Keywords",
								"desc" 		=> "Enter custom keywords for home page.",
								"id" 		=> "{$prefix}_homepage_keywords",
								"std" 		=> "",
								"type" 		=> "textarea");
	
	$admin_options[] = array( 	"name" 		=> "Description",
								"desc" 		=> "Enter custom description for home page.",
								"id" 		=> "{$prefix}_homepage_description",
								"std" 		=> "",
								"type" 		=> "textarea");
	

	$admin_options[] = array(   "name"  	=> "General META",
								"type"  	=> "heading");
	
	$admin_options[] = array( 	"name" 		=> "Keywords",
								"desc" 		=> "Enter general keywords for home page, categories, arhives and other pages than single posts and pages.",
								"id" 		=> "{$prefix}_general_keywords",
								"std" 		=> "",
								"type" 		=> "textarea");
	
	$admin_options[] = array( 	"name" 		=> "Description",
								"desc" 		=> "Enter general description for home page, categories, arhives and other pages than single posts and pages.",
								"id" 		=> "{$prefix}_general_description",
								"std" 		=> "",
								"type" 		=> "textarea");
	}
									
	/* END admin_option_fields() */
	update_option("{$tfuse->prefix}_admin_options",$admin_options);
	// END admin_option_fields()
}

?>