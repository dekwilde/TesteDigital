<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

	<title><?php wp_title() ?></title>
	
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php $feedburner_url = get_option(PREFIX.'_feedburner_url'); if ( $feedburner_url <> '' ) { echo $feedburner_url; } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/styles/dark-blue.css" />  
     
    <?php $template_directory = get_bloginfo('template_directory'); ?>   
    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );  ?>
    <?php wp_head(); ?>

	<script type="text/javascript" src="<?php echo $template_directory ?>/js/jquery-1.3.2.min.js"></script>
	<?php if(get_option(PREFIX.'_cufon')!='true') { ?>
    <script type="text/javascript" src="<?php echo $template_directory ?>/js/cufon-yui.js"></script>
    <script type="text/javascript" src="<?php echo $template_directory ?>/js/custom.font.js"></script>
	<?php } ?>
    <script type="text/javascript" src="<?php echo $template_directory ?>/js/jquery-latest.js"></script>
    <script type="text/javascript" src="<?php echo $template_directory ?>/js/jquery.flow.1.2.js"></script>
    <script type="text/javascript" src="<?php echo $template_directory ?>/js/custom.js"></script>
    
    <!--[if IE 6]>
    <link type="text/css" rel="stylesheet" href="<?php echo $template_directory ?>/css/ie6.css" />
    <![endif]--> 

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.prettyPhoto.js"></script>
	
	<!-- slider -->
	<?php 
		if ( is_front_page() ) {
		$ms = get_option(PREFIX.'_homepage_slider_timeout');
		$ms = 100 * $ms;	
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#myController").jFlow({
				slides: "#slides",
				controller: ".jFlowControl",
				slideWrapper : "#jFlowSlide",
				selectedWrapper: "jFlowSelected", 
				auto: true,
				width: "587px",
				height: "170px",
				duration: <?php echo $ms; ?>
			});
			$("#myController a").click(function () { 
				var $this_alias = $(this).attr("id"); 
				$("#myController a").each(function(){
					var $new_alias = $(this).attr("id"); 
					if($(this).attr("id") == $this_alias){
						$(this).removeClass($this_alias + "_off tab_off").addClass($this_alias + "_tab_on tab_on");
					}else{
						$(this).removeClass($new_alias + "_tab_on tab_on").addClass($new_alias + "_tab_off tab_off");
					}
				})
			});
		});
	</script>
	<!-- slider -->
	<?php } ?>
</head>

<body>
	<?php if ( is_front_page() ) { ?>
	<div id="html_wrapper">
		<div id="body_wrapper">
			<div id="content_wrapper">
	<?php } else { ?>
	<div id="html_secondary_wrapper">
		<div id="body_secondary_wrapper">
			<div id="content_secondary_wrapper">
	<?php } ?>
	
	<div class="header">
		<?php $stylesheet = explode( '-', get_option(PREFIX."_alt_stylesheet") ); if($stylesheet[0]=='light') $logofolder = 'light'; else $logofolder = 'dark'; ?>
		<div class="logo"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>"><img class="png" src="<?php if ( get_option(PREFIX.'_logo') <> '' ) { echo get_option(PREFIX.'_logo'); } else { echo $template_directory.'/styles/'.$logofolder ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
	  	<!-- .logo -->
	  
		<?php include( THEME_MODULES . '/page-nav.php' ); ?>
		<!-- .main_menu -->
	  
	  <div class="clear_container"></div>
	  <?php if ( !is_front_page() ) { ?>
		  <?php include( THEME_MODULES . '/featured.php' ); ?>
	  <!-- .options -->
	  <?php } ?>
	  
	</div>
	<!-- .HEADER -->
