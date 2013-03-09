<?php get_header(); ?>
<div class="page_content">
	<!-- content -->   
	<div class="right_side blog_right_side">
	
		<div class="blog_category">
			<p><?php _e('Search Results for ', 'tfuse'); printf(__('\'%s\''), $s); ?></p>
		</div>
	
		
		<?php if (have_posts()) : $count = 0; ?>          
		<?php while (have_posts()) : the_post(); $count++; ?>
			<div class="blog_entry<?php if($count>1) echo ' not_first' ?>">	
				<div class="comment_buble"><a href="<?php the_permalink() ?>" title="<?php _e('Got something to say?', 'tfuse'); ?>"><?php comments_number('0','1','%'); ?></a></div>
				<div class="entry">
					<h4><a href="<?php the_permalink() ?>" title="<?php the_title();?>"><?php the_title();?></a></h4>
					<p class="entry_info"><?php the_time('l, F j, Y') ?>&nbsp;&nbsp;//&nbsp;&nbsp;<a href="#"><?php the_category(', '); ?></a></p>
					<?php 
					$src_image = '';
					$large_image 	= get_post_meta($post->ID, PREFIX."_post_image", true);
					$medium_image 	= get_post_meta($post->ID, PREFIX."_post_image_medium", true);
					if ($medium_image!='') { $src_image = $medium_image; } else { $src_image = $large_image; }
					if ($src_image!='')
					echo '<div class="entry_img"><img src="'.tfuse_get_image(485, '', 'src', $src_image, '', true).'" alt="'.get_the_title().'" width="485" /></div>';
					?>					   
					<?php the_excerpt(); ?>
					<div class="button read_more">
						<div class="button_left"></div>
						<div class="button_middle"><a href="<?php the_permalink() ?>"><?php _e('Go to article', 'tfuse'); ?></a></div>
						<div class="button_right"></div>
						<div class="clear_container"></div>
					</div>
					<!-- .button -->
			  </div>
			  <!-- .entry -->
			  <div class="clear_container"></div>
			</div>
			<!-- .blog_entry -->					
		<?php endwhile; else: ?>
 		<div class="no_results">
			<p class="error2"><?php _e('Sorry no results were found.', 'tfuse') ?></p>
		</div>
		<?php endif; ?>  
                 
		<div class="other_articles">
			<?php 
			function dr_previous_posts_link() {
				ob_start();
				previous_posts_link(__('Newer articles', 'tfuse'));
				$buffer = ob_get_contents();
				ob_end_clean();
				if(!empty($buffer)) echo "
				<div class=\"button newer_articles\">
					<div class=\"button_left_back\"></div>
					<div class=\"button_middle_back\">$buffer</div>
					<div class=\"button_right_back\"></div>
					<div class=\"clear_container\"></div>
				</div>
				";
			}
			function dr_next_posts_link() {
				ob_start();
				next_posts_link(__('Older articles', 'tfuse'));
				$buffer = ob_get_contents();
				ob_end_clean();
				if(!empty($buffer)) echo "
				<div class=\"button older_articles\">
					<div class=\"button_left\"></div>
					<div class=\"button_middle\">$buffer</div>
					<div class=\"button_right\"></div>
					<div class=\"clear_container\"></div>
				</div>
				";
			}
			?>
			<?php dr_previous_posts_link() ?>
			<?php dr_next_posts_link() ?>
			<div class="clear_container"></div>
		</div>
	</div>
	<!-- .right_side -->                
    
    <div class="left_side blog_left_side">
    <?php get_sidebar(); ?>
	</div>
    <!-- .left_side -->
    
	<div class="clear_container"></div>
</div>
<!-- .PAGE_CONTENT -->
<?php get_footer(); ?>