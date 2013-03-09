<?php get_header(); ?>
<div class="page_content">
	<div class="right_side blog_right_side">
		<div class="blog_category">
		<p><?php _e('Page not found', 'tfuse') ?></p>
		</div>
		<div class="no_results">
		<p class="error2"><?php _e('The page you were looking for doesn&rsquo;t seem to exist', 'tfuse') ?></p>
		</div>
		<!-- .no_results -->
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