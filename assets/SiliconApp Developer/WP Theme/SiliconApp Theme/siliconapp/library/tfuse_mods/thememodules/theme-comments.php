<?php
// Fist full of comments
function custom_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>

   <?php if (!$comment->comment_parent) { ?>
   <?php  $GLOBALS['comment_r_count'] = 0; ?>
    	<a name="comment-<?php comment_ID() ?>"></a>
	<div class="comment_entry <?php comment_class(); ?>" id="li-comment-<?php comment_ID() ?>">
		<div class="comments_entry_top"></div>
		<div class="comments_entry_middle">
			<div class="user_info">
				<p class="name"><?php the_commenter_link() ?></p>
				<p class="entry_info"><?php echo get_comment_date() ?></p>
			</div>
			<!-- .user_info -->


<?php $reply_enable = get_option('thread_comments');
 
 if( $reply_enable ==  1 ) { ?>
			<div class="add_a_comment">
				<div class="older_articles">
					<div class="button_left"></div>
					<div class="button_middle"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></div>
					<div class="button_right"></div>
				</div>
			</div>
			<!-- .add_a_comment -->
 <?php   }?>


			<div class="clear_container"></div>
	 <?php   
	 //$text =get_option('thread_comments');
//print_r ($text); 
	 
	 //print_r ($comment); ?>
			<?php comment_text() ?>
			<?php if ($comment->comment_approved == '0') { ?>
				<p class='unapproved'><?php _e('Your comment is awaiting moderation.', 'tfuse'); ?></p>
			<?php } ?>

		</div>
		<div class="comments_entry_bottom"></div>
	</div>
	<br />
	<!-- .comment_entry -->
	
      <?php } else { ?>
      <?php $GLOBALS['comment_r_count'] ++; ?>
		<a name="comment-<?php comment_ID() ?>"></a>
		<?php $stylesheet = explode( '-', get_option(PREFIX."_alt_stylesheet") ); if($stylesheet[0]=='light') $logofolder = 'light'; else $logofolder = 'dark'; ?>
		<img class="reply_icon" src="<?php echo get_bloginfo('template_directory').'/styles/'.$logofolder ?>/images/reply_icon.gif" alt="" />
		<div class="comment_entry reply">
			<div class="reply_top"></div>
			<div class="reply_middle">
				<div class="user_info">
					<p class="name"><?php the_commenter_link() ?></p>
					<p class="entry_info"><?php echo get_comment_date() ?></p>
				</div>
				<!-- .user_info -->
				<div class="clear_container"></div>
		 			<?php comment_text(); ?>
			</div>
			<div class="reply_bottom"></div>
		</div>
		<!-- .comment_entry -->
		<div class="clear_container"></div>
		<br />
   <?php } ?>
		
<?php 
}

// PINGBACK / TRACKBACK OUTPUT
function list_pings($comment, $args, $depth) {

	$GLOBALS['comment'] = $comment; ?>
	
	<li id="comment-<?php comment_ID(); ?>">
		<span class="author"><?php comment_author_link(); ?></span> - 
		<span class="date"><?php echo get_comment_date() ?></span>
		<span class="pingcontent"><?php comment_text() ?></span>

<?php 
} 
		
function the_commenter_link() {
    $commenter = get_comment_author_link();
    if ( ereg( ']* class=[^>]+>', $commenter ) ) {$commenter = ereg_replace( '(]* class=[\'"]?)', '\\1url ' , $commenter );
    } else { $commenter = ereg_replace( '(<a )/', '\\1class="url "' , $commenter );}
    echo $commenter ;
}

function the_commenter_avatar($args) {
    $email = get_comment_author_email();
    $avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( "$email",  $args['avatar_size']) );
    echo $avatar;
}

?>