<?php
/*
Template Name: Contact Form
*/

$error = true; if(isset($_POST['email'])) { include(THEME_FUNCTIONS . '/sendmail.php'); }

get_header(); 

?>
                <div class="page_content">
                		<div class="left_side">
       					 <?php get_sidebar(); ?>
                        </div>
                        <!-- .left_box -->
                    <!-- .left_side -->
                    <div class="right_side">  
					 
						<?php if (have_posts()) : $count = 0; ?>
						<?php while (have_posts()) : the_post(); $count++; ?>
						
							<?php the_content(); ?>
							<br /><br />	
				 			<form action="" method="post" class="ajax_form">
								<input type="hidden" id="temp_url" name="temp_url" value="<?php bloginfo('template_directory'); ?>" />
								<input type="hidden" id="tempcode" name="tempcode" value="<?php echo base64_encode(get_option('admin_email')); ?>" />
								<input type="hidden" id="myblogname" name="myblogname" value="<?php bloginfo('name'); ?>" />
								
							<?php if (!isset($error) || $error == true){ ?> 

	                        	<div><label for="name"><?php _e('Name ', 'tfuse') ?><span><?php _e(' *', 'tfuse') ?></span></label></div>
    	                        <div class="input">
        	                    	<div class="input_left"></div>
            		               	<input id="name" name="yourname" class="input_middle input_middle_contact required" type="text" value="" />
                    	        	<div class="input_right"></div>
                        	   	 	<div class="clear_container"></div>
                            	</div>
                            
                            	<div><label for="email"><?php _e('Email ', 'tfuse') ?> <span><?php _e(' *', 'tfuse') ?></span></label></div>
                            	<div class="input">
                            		<div class="input_left"></div>
                            		<input id="email" name="email" class="input_middle input_middle_contact required" type="text" value="" />
                            		<div class="input_right"></div>
                           	 		<div class="clear_container"></div>
                            	</div>
                            
                            	<div><label for="company"><?php _e(' Company', 'tfuse') ?></label></div>
                            	<div class="input">
                            		<div class="input_left"></div>
                            		<input id="company" name="company" class="input_middle input_middle_contact" type="text" value="" />
                            		<div class="input_right"></div>
                           	 		<div class="clear_container"></div>
                            	</div>
                            
                            	<div><label for="message"><?php _e('Message ', 'tfuse') ?> <span><?php _e('*', 'tfuse') ?></span></label></div>
                            	<div class="inputms">
                            		<div class="textarea_left"></div>
                            		<textarea id="message" name="message" cols="100" rows="100" class="textarea_middle required"></textarea>
                            		<div class="textarea_right"></div>
                           	 		<div class="clear_container"></div>
                            	</div>
                            
                            	<p class="mandatory_fields"><?php _e('* mandatory fields', 'tfuse') ?><br /><br /></p>                            
                            	<div class="submit_button">
                        			<div class="submit_left"></div>
                           			<input class="submit_middle submit btn-submit" id="send" type="submit" value="Send message" />
                            		<div class="submit_right"></div>
                                	<div class="clear_container"></div>
                    			</div>
						</div> 
					<?php } else { ?> 
					
						<br>
						<h2 style="width:100%;"><?php _e('Your message has been sent!', 'tfuse') ?></h2>
						<div class="confirm">
							<p class="textconfirm"><br /><?php _e('Thank you for contacting us,', 'tfuse') ?><br/><?php _e('We will get back to you within 2 business days.', 'tfuse') ?></p>
						</div>

					<?php } ?>
                        </form>
                        <div class="clear_container"></div>
                    </div>
                    <!-- .right_side -->
        <?php endwhile; else: ?>     
        
            <div class="contact_box">
                 
				 <p><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></p>
             
            </div>
            <!-- contact_box -->
             
        <?php endif; ?>  
		
		<?php get_footer(); ?>
                </div>
                <!-- .PAGE_CONTENT -->
    </div>
    <!--/ middle -->
  </div>
  <!--/ container -->

