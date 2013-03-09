<?php get_header(); ?>
    
<div class="page_content">

	<div class="right_side blog_right_side">
	
		<div class="blog_category">
			<div class="newer_articles">
				<div class="button_left_back"></div>
				<div class="button_middle_back"><a href="javascript: history.go(-1)"><?php _e('Back', 'tfuse') ?></a></div>
				<div class="button_right_back"></div>

			</div>
			<!-- .button -->
			<div class="clear_container"></div>
		</div>
	
		<?php  
		$cat_ID = get_query_var('cat');		
		$the_category= get_category($cat_ID);
		if ( isset($the_category->parent) ) $parent_id = $the_category->parent;
		?>
	
		<?php if (have_posts()) : $count = 0; ?>
		<?php while (have_posts()) : the_post(); $count++; ?>
					
		<div class="blog_entry">	
			<div class="comment_buble"><a href="#" title="<?php _e('Got something to say?', 'tfuse') ?>"><?php comments_number('0','1','%'); ?></a></div>
			<div class="entry">
				<h4><a href="<?php the_permalink() ?>" title="<?php the_title();?>"><?php the_title();?></a></h4>
				<p class="entry_info"><?php the_time('l, F j, Y') ?></p>

				<?php 
				$post_video 	= get_post_meta($post->ID, PREFIX."_post_video", true);
				$large_image 	= get_post_meta($post->ID, PREFIX."_post_image", true);
				$medium_image 	= get_post_meta($post->ID, PREFIX."_post_image_medium", true);
				$small_image 	= get_post_meta($post->ID, PREFIX."_post_image_small", true);
				$disablevideo	= get_post_meta($post->ID, PREFIX."_post_single_video", true);
				$disableimage	= get_post_meta($post->ID, PREFIX."_post_single_image", true);
				$disableprety	= get_option(PREFIX."_disable_lightbox");
				$src_image 		= '';
				
				if ($post_video!='' && $disablevideo=='true') { $media = $post_video; } elseif ($large_image!='') { $media = $large_image; } elseif ($medium_image!='') { $media = $medium_image; } else { $media = $small_image; }
				
				if ($medium_image!='') { $src_image = $medium_image; } elseif ($large_image!='') { $src_image = $large_image; } elseif ($small_image!='') { $src_image = $small_image; }
			
				if ($src_image!='') { 
					$img_in = '<img class="entry_img" src="'.tfuse_get_image(485, '', 'src', $src_image, '', true).'" alt="'.get_the_title().'" width="485" />';
				?>
					<div id="gallery">
					<?php if ( $disablevideo != 'true' && $post_video != '' ) { echo tfuse_get_embed(485, 300, PREFIX."_post_video"); } ?>
		          	<?php if($img_in!='' && $disableimage!='true') { ?>
						<?php if ( $disableprety!='true' ) {?>
							<a href="<?php echo $media; ?>" rel="prettyPhoto[gallery1]" title="<?php the_title(); ?>"><?php echo $img_in ?></a>
						<?php } else {?>
							<?php echo $img_in ?>
						<?php } ?>
					<?php } ?>
					</div>
					
					<div style="display:none;">
					<?php 
						//get image from medial ibrary
						$attachments = get_children( array(
							'post_parent' => $post->ID,
							'numberposts' => -1,
							'post_type' => 'attachment',
							'post_mime_type' => 'image')
						);
				
					    if ( !empty($attachments) ) {
				
						    $size = 'full';
						    foreach ( $attachments as $att_id => $attachment ) {       
						    	$src = wp_get_attachment_image_src($att_id, $size, true);
						    	$image_link_attach = $src[0];
					?>
					<a href="<?php echo $image_link_attach; ?>" rel="prettyPhoto[gallery1]" ><?php echo wp_get_attachment_image( $att_id, $size ); ?></a>
					<?php 
						    }
					    }
					//end attachement
					?>
					</div>
					
				<?php } the_content();  ?>

			</div>
            <!-- .entry -->
            <div class="clear_container"></div>
        </div>
        <!-- .blog_entry -->		  
		<?php endwhile; else: ?>
			<div class="blog_entry">
				<p class="error2"><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></p>
			</div>
		<?php endif; ?>  
		<div class="sep_blog_article"></div>	
		<?php if ( get_post_meta($post->ID, PREFIX.'_post_single_comments', true)!='true' ) { comments_template(); } ?>

	</div>
	<!-- .right_side -->
	
	<div class="left_side blog_left_side">
	<?php get_sidebar(); ?>
	</div>
    <!-- .left_side -->
    
	<div class="clear_container"></div>
</div>
<!-- .PAGE_CONTENT -->
<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
$("#gallery a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook'});
});
</script>
<?php get_footer(); ?>
