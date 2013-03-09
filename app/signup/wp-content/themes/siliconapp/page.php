<?php get_header(); ?>
<div class="page_content">
	<div class="left_side">
	<?php
	$template_directory = get_bloginfo('template_directory');
	$page_data = get_page ( $post->ID );
	$parent_id = $page_data->post_parent;
	if ($parent_id == 0) $parent_id = $post->ID;
	$subpages = get_pages ( 'child_of=' . $parent_id . '&sort_column=menu_order' );
	$nr_child_pages = count ( $subpages );
	
	if ($nr_child_pages > 0)
	{
		$j = 1;
		$menutitle = tfuse_qtranslate(get_post_meta ( $parent_id, PREFIX.'_page_header_title', true ));
		echo "<p>". __($menutitle,'tfuse') ."</p>";
		echo '<ul class="sec_menu">';
		foreach ( $subpages as $page ) {		
			if ($nr_child_pages == 1)
				$li = '<li class="child1">';
			elseif ($j == 1)
			{
				if($page->ID == $post->ID) $li = '<li class="first first_on">'; 
				else $li = '<li class="first">';
			}
			elseif ($j == $nr_child_pages)
			{
				if($page->ID == $post->ID) $li = '<li class="last last_on">'; 
				else $li = '<li class="last">';
			}
			else
			{
				if($page->ID == $post->ID) $li = '<li class="on">'; 
				else $li = '<li>';
			}
				
			$menuico = get_post_meta ( $page->ID, PREFIX.'_page_icon_image', true );
			if($menuico=='') $menuico = $template_directory.'/images/optimized_icon.png';
			$li .= '<img class="optimized" src="' . $menuico . '" />';
			echo $li . '<a href="' . get_permalink ( $page->ID ) . '">' . get_the_title ( $page->ID ) . '</a></li>';
			$j++;
		}
		echo '</ul><br />';
	} //else echo "&nbsp;";
	
	?>

	<?php get_sidebar () ?>
	</div>
	<!-- .left_side -->

	<div class="right_side">
		<?php if (have_posts ()) : $count = 0; ?>
		<?php while ( have_posts () ) : the_post (); $count ++; ?>
			<?php the_content (); ?>
		<?php endwhile; else: ?>
			<p class="error2"><?php _e ( 'Sorry, no posts matched your criteria.', 'tfuse' ) ?></p>
		<?php endif; ?>
		<div class="clear_container"></div>
	</div>
	<!-- .right_side -->

	<div class="clear_container"></div>
</div>
<!-- .PAGE_CONTENT -->

<?php get_footer () ?>