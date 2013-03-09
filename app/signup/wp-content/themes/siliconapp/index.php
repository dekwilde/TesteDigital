<?php get_header(); ?>

<?php  
$placeholder[1] = "<div class=\"main_features\">
                    	<h3>MAIN FEATURES DESCRIPTION</h3>
                        <div class=\"sep\"></div>
                        
                        <ul class=\"features\">
                        	<li class=\"left\">Beautifull and unique GUI, offers an easy to use workflow and highly polished visual cues.</li>
                        	<li class=\"right\">Muskehounds are always ready. One for all and all for one, helping everybody.</li>
                        	<li class=\"left\">Straight nine' the curve, flat'nin' the hills. Someday the mountain might get 'em.</li>
                            <li class=\"right\">One for all and all for one, it's a pretty story. Sharing everything with fun, that's the way!</li>
                        	<li class=\"left\">But the law never will. Makin' their way, the only way they know how.</li>
                            <li class=\"right last\">If you've got a problem chum, think how it could be.</li>
                        </ul>
                        
                        <div class=\"clear_container\"></div>
                        <div class=\"sep\"></div>
                        
                        <div class=\"button\">
                        	<div class=\"button_left\"></div>
                            <div class=\"button_middle\"><a href=\"#\">View All the Features</a></div>
                            <div class=\"button_right\"></div>
                            <div class=\"clear_container\"></div>
                    	</div>
                        <!-- .button -->
                    </div>";

$placeholder[2] = "<div class=\"closer_look\">
                    	<h3>TAKE A CLOSER LOOK</h3>
                        <div class=\"sep\"></div>
                        
                        <p>Curios about Appstorm? Check the interface screenshots below:</p>
                        <div class=\"screenshot\">
                        	<a href=\"#\"><img src=\"http://localhost/wp3test/wp-content/themes/siliconapp_3.0/images/screen1.jpg\" alt=\"Aplication Homepage\" title=\"Aplication Homepage\" /></a>
                        </div>
                        
                        <div class=\"screenshot\">
                        	<a href=\"#\"><img src=\"http://localhost/wp3test/wp-content/themes/siliconapp_3.0/images/screen2.jpg\" alt=\"Aplication Homepage\" title=\"Aplication Homepage\" /></a>
                        </div>
                        
                        <div class=\"screenshot\">
                        	<a href=\"#\"><img src=\"http://localhost/wp3test/wp-content/themes/siliconapp_3.0/images/screen3.jpg\" alt=\"Aplication Homepage\" title=\"Aplication Homepage\" /></a>
                        </div>
                        
                        <div class=\"clear_container\"></div>
                        <div class=\"sep\"></div>
                        
                        <div class=\"button\">
                        	<div class=\"button_left\"></div>
                            <div class=\"button_middle\"><a href=\"#\">Download Latest Update</a></div>
                            <div class=\"button_right\"></div>
                            <div class=\"clear_container\"></div>
                    	</div>
                        <!-- .button -->
                    </div>";    
     
?>



<div class="app_box">
  <div class="corner_fix"></div>
  <div id="slides">
    <div class="slide-wrapper">
      <div class="app_text">
        <h1><?php echo tfuse_qtranslate(get_option(PREFIX.'_slider_box1_title')) ?></h1>
        <p><?php echo tfuse_qtranslate(get_option(PREFIX.'_slider_box1_text')) ?></p>
      </div>
    </div>
    <div class="slide-wrapper">
      <div class="app_text">
        <h1><?php echo tfuse_qtranslate(get_option(PREFIX.'_slider_box2_title')) ?></h1>
        <p><?php echo tfuse_qtranslate(get_option(PREFIX.'_slider_box2_text')) ?></p>
      </div>
    </div>
    <div class="slide-wrapper">
      <div class="app_text">
        <h1><?php echo tfuse_qtranslate(get_option(PREFIX.'_slider_box3_title')) ?></h1>
        <p><?php echo tfuse_qtranslate(get_option(PREFIX.'_slider_box3_text')) ?></p>
      </div>
    </div>
  </div>
  <!-- .tab_text -->
  <div id="myController"> 
  	<a class="left_tab left_tab_on tab_on jFlowControl" id="left" href="#"><?php echo html_entity_decode(get_option(PREFIX.'_slider_box1_button',ENT_QUOTES,'UTF-8')); ?></a> 
	<a class="middle_tab tab_off jFlowControl" id="middle" href="#"><?php echo html_entity_decode(get_option(PREFIX.'_slider_box2_button',ENT_QUOTES,'UTF-8')); ?></a> 
	<a class="right_tab tab_off jFlowControl" id="right" href="#"><?php echo html_entity_decode(get_option(PREFIX.'_slider_box3_button',ENT_QUOTES,'UTF-8')); ?></a> 
  </div>
  <img src="<?php if ( get_option(PREFIX.'_home_page_image') <> '' ) { echo get_option(PREFIX.'_home_page_image'); } else { bloginfo('template_directory'); ?>/images/box.png<?php } ?>" class="box png" alt="" />
  <div class="clear_container"></div>
</div>
<!-- .APP_BOX -->

<div class="under_fold">
  <div class="options"> 
    <?php echo tfuse_qtranslate(get_option(PREFIX.'_middle_box_1')) ?>
	<?php echo tfuse_qtranslate(get_option(PREFIX.'_middle_box_2')) ?>
	<?php echo tfuse_qtranslate(get_option(PREFIX.'_middle_box_3')) ?>
    <div class="clear_container"></div>
  </div>
  <!-- .options -->
  

    <?php 
		//call class
		$boxes = new tfuse_display_box(PREFIX.'_home_box', $placeholder);
		$boxes-> display();
	?>

    
  <div class="clear_container"></div>
</div>
<!-- .under_fold -->

<?php get_footer(); ?>