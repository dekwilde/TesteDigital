<?php get_header(); ?>

<div class="page_content">
	
	<div class="left_side">			
	<?php	
		$cat_ID = get_query_var('cat');		
		$the_category= get_category($cat_ID);
		$parent_id = $the_category->parent;
		$category_description =  tfuse_qtranslate($the_category->category_description);
		
		if ($parent_id == 0) $parent_id = $cat_ID;
		$child_cats = get_categories(array('child_of' => $parent_id, 'hide_empty'=>false));
		$nr_child_cats = count($child_cats);
		$menutitle = tfuse_qtranslate(get_option(PREFIX.'_category_header_title_'.$parent_id));
		
		if ($nr_child_cats > 0)
		{
			$j = 1;
			echo "<p>". __($menutitle,'tfuse') ."</p>";
			echo '<ul class="sec_menu">';
			foreach ( $child_cats as $cat ) {		
				if ($nr_child_cats == 1)
					$li = '<li class="child1">';
				elseif ($j == 1)
				{
					if($cat->term_id == $cat_ID) $li = '<li class="first first_on">'; 
					else $li = '<li class="first">';
				}
				elseif ($j == $nr_child_cats)
				{
					if($cat->term_id == $cat_ID) $li = '<li class="last last_on">'; 
					else $li = '<li class="last">';
				}
				else
				{
					if($cat->term_id == $cat_ID) $li = '<li class="on">'; 
					else $li = '<li>';
				}
					
				$menuico = get_option(PREFIX.'_category_icon_'.$cat->term_id);
				if($menuico=='') $menuico = $template_directory.'/images/optimized_icon.png';
				$li .= '<img class="optimized" src="' . $menuico . '" />';
				echo $li . '<a href="'.get_category_link( $cat->term_id ) .'">'.$cat->cat_name.'</a></li>';
				$j++;
			}
			echo '</ul><br />';
		} else echo "&nbsp;";	
		?>
		
		<?php get_sidebar(); ?>
	
	</div>
	<!-- .left_side -->
			
	<div class="right_side">            
		<div>
			<h3><a href="<?php get_category_link($cat_ID) ?>" title="<?php echo get_cat_name($cat_ID); ?>"><?php echo get_cat_name($cat_ID); ?></a></h3>
			<?php echo "<p>".$category_description."</p>"; ?>
		</div>

			<?php global $post; if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); $count++; ?>
            
	            <?php
				$post_video 	= get_post_meta($post->ID, PREFIX."_post_video", true);
				$large_image 	= get_post_meta($post->ID, PREFIX."_post_image", true);
				$medium_image 	= get_post_meta($post->ID, PREFIX."_post_image_medium", true);
				$small_image 	= get_post_meta($post->ID, PREFIX."_post_image_small", true);
				$disableprety	= get_option(PREFIX."_disable_lightbox");
				
				$src_image = $media = '';
				
				if ($post_video!='') { $media = $post_video; } elseif ($large_image!='') { $media = $large_image; } elseif ($medium_image!='') { $media = $medium_image; } else { $media = $small_image; }
				
				if ($small_image!='') { $src_image = $small_image; } elseif ($medium_image!='') { $src_image = $medium_image; } else { $src_image = $large_image; }
								
				if ($media=='') $media = $src_image;
				if ($src_image!='')
					$img_in = '<img src="'.tfuse_get_image(270, 135, 'src', $src_image, '', true).'" alt="'.get_the_title().'" width="270" height="135" />';
				?>
 
				<div class="project">
					<div class="project_img">
					<?php if ($src_image!='') { ?>
						<?php if ( $disableprety!='true' ) { ?>
							<a class="portfolio_img_hover" href="<?php echo $media ?>" rel="prettyPhoto[roadtrip]" title="<?php the_title() ?>"></a>
						<?php } ?>
                        <a href="<?php the_permalink() ?>"><?php echo $img_in; ?></a>
                    <?php } ?>
					</div>
	                <h3><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
					<?php the_excerpt(); ?>
				</div>

            <?php endwhile; else: ?>
                <div>
                    <p class="error2"><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></p>
                </div>
            <?php endif; ?> 

			<div class="pagination">
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
			<!-- .older_entries -->

	</div>
	<!-- .right_side -->
	
	<div class="clear_container"></div>
</div>
<!-- .PAGE_CONTENT -->

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$("a[rel^='prettyPhoto']").prettyPhoto({theme:'facebook'});
	});
</script>

<?php get_footer(); ?>              