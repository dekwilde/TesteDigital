<?php get_header(); ?>
    
<div class="page_content">

	<div class="right_side blog_right_side">
	
		<?php  
		if ( is_category() ) {
			$cat_ID = get_query_var('cat');		
			$the_category= get_category($cat_ID);
			if ( isset($the_category->parent) ) $parent_id = $the_category->parent;
			if($parent_id) echo "<div class=\"blog_category\"><p>".$the_category->name."</p></div>";
		}
		?>
	
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
						<div class="button_middle"><a href="<?php the_permalink() ?>"><?php _e('Read more &amp; Talk about it', 'tfuse'); ?></a></div>
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
			<div class="blog_entry">
				<p class="error2"><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></p>
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
	<?php
		if ( is_category() ) {
			$child_cats = get_categories(array('child_of' => $parent_id, 'hide_empty'=>false));
			$nr_child_cats = count($child_cats);
			
			if ($parent_id == 0) $parent_id = $cat_ID;
			$menutitle = tfuse_qtranslate(get_option(PREFIX.'_category_header_title_'.$parent_id));
			
		} else {
			$nr_child_cats = 0;
		}
		
		if ($nr_child_cats > 0)
		{
	?>
		<p><?php _e($menutitle,'tfuse') ?></p>
		<div class="left_box">
			<div class="left_box_top"></div>
			<div class="left_box_middle blog_cat_box">
				<div class="blog_categories">
				<?php $k = 0; foreach($child_cats as $category) { $k++; ?>
		
				<a class="blog_cat<?php if($cat_ID==$category->term_id) echo ' selected' ?>" href="<?php echo get_category_link( $category->term_id ) ?>"><?php echo $category->name ?></a>
		        <a class="entries_no" href="#"><span><?php echo $category->count ?></span></a>
		        <?php if($k<$nr_child_cats) { ?><div class="sep_blog_categories"></div><?php } else { ?><div class="clear_container"></div><?php } ?>
		
				<?php } ?>
				</div>
				<!-- .blog_categories -->
			</div>
			<div class="left_box_bottom"></div>
		</div>
		<!-- .left_box -->
		<br />
	<?php } ?>

	<?php get_sidebar(); ?>
	</div>
    <!-- .left_side -->
    
	<div class="clear_container"></div>
</div>
<!-- .PAGE_CONTENT -->
<?php get_footer(); ?>