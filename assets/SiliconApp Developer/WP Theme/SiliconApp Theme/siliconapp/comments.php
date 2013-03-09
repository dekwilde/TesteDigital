<?php
	
// Do not delete these lines

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
	<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'tfuse') ?></p>

<?php return; } ?>

<?php $comments_by_type = &separate_comments($comments); ?>    

<!-- You can start editing here. -->
<!--comment-->
<div class="comments">
		<h4 class="comments_title"><?php _e('Comments', 'tfuse') ?></h4>
		<div class="add_a_comment">
			<div class="older_articles">
				<div class="button_left"></div>
				<div class="button_middle"><a href="<?php comments_link();?>"><?php _e('Add a comment', 'tfuse') ?></a></div>
				<div class="button_right"></div>
			</div>
			<!-- .button -->
		</div>
		<!-- .add_a_comment -->

		<div class="clear_container"></div>
		<br /><br />
<?php if ( have_comments() ) : ?>

<?php if ( ! empty($comments_by_type['comment']) ) : ?> 

		<?php wp_list_comments('avatar_size=40&callback=custom_comment&type=comment'); ?>


		<div class="navigation">
			<div class="fl"><?php previous_comments_link() ?></div>
			<div class="fr"><?php next_comments_link() ?></div>
			<div class="fix"></div>
			</div><!-- /.navigation -->
<?php endif; ?>

<?php else : // this is displayed if there are no comments so far ?>

		<?php if ('open' == $post->comment_status) : ?>
			<!-- If comments are open, but there are no comments. -->
			<p class="comments"><?php _e('No comments yet.', 'tfuse') ?></p>

		<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
			<p class="comments"><?php _e('Comments are closed.', 'tfuse') ?></p>

		<?php endif; ?>

<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
		<a name="comments"></a>
		<div id="respond">
		<br /><br />
			<h4 class="comments_title"><?php _e('Add a comment', 'tfuse') ?></h4>
			<div class="clear_container"></div>
			<br />
			<div class="cancel-comment-reply">
				<small><?php cancel_comment_reply_link(); ?></small>
			</div><!-- /.cancel-comment-reply -->


			<?php if ( get_option('comment_registration') && !$user_ID ) : //If registration required & not logged in. ?>

				<p><?php _e('You must be', 'tfuse') ?> <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('logged in', 'tfuse') ?></a> <?php _e('to post a comment.', 'tfuse') ?></p>

			<?php else : //No registration required ?>

				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

					<?php if ( $user_ID ) : //If user is logged in ?>
						<div class="comment-top">
							<p><?php _e('Logged in as', 'tfuse') ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(); ?>" title="<?php _e('Log out of this account', 'roxigo') ?>"><?php _e('Logout', 'tfuse') ?> &raquo;</a></p>
						</div>

					<?php else : //If user is not logged in ?>

						<div><label for="name"><?php _e('Name', 'tfuse') ?><span><?php _e(' *', 'tfuse') ?></span></label></div>
						<div class="input">
							<div class="input_left"></div>
							<input name="author" id="commentauthor_post" class="inputtext input_middle input_middle_contact" type="text" value="" />
							<div class="input_right"></div>
							<div class="clear_container"></div>
						</div>
						<!-- Your name -->

						<div><label for="email"><?php _e('Email ', 'tfuse') ?><span><?php _e('*', 'tfuse') ?></span></label></div>
						<div class="input">
							<div class="input_left"></div>
							<input name="email" id="email_post" class="inputtext input_middle input_middle_contact" type="text" value="" />
							<div class="input_right"></div>
							<div class="clear_container"></div>
						</div>
						<!-- Your email -->

					<?php endif; // End if logged in ?>

					<!--<p><strong>XHTML:</strong> <?php _e('You can use these tags', 'tfuse'); ?>: <?php echo allowed_tags(); ?></p>-->
						<div><label for="message"><?php _e('Message', 'tfuse'); ?><span><?php _e(' *', 'tfuse'); ?></span></label></div>
						<div class="inputms">
							<div class="textarea_left"></div>
							<textarea id="comment_post" name="comment" cols="100" rows="100" class="textarea_middle textarea_comments"></textarea>
							<div class="textarea_right"></div>
							<div class="clear_container"></div>
						</div>

						<p class="mandatory_fields"><?php _e('* mandatory fields', 'tfuse'); ?><br /><br /></p>

						<div class="submit_button">
							<div class="submit_left"></div>
							<input class="submit_middle" type="submit" value="Send message" id="submit" />
							<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
							<div class="submit_right"></div>
							<div class="clear_container"></div>
						</div>

						<?php comment_id_fields(); ?>
						<?php do_action('comment_form', $post->ID); ?>

					<?php endif; // If registration required ?>
				</form>
				<div class="comment_form_bottom"></div>
		</div>
<?php endif; // if you delete this the sky will fall on your head ?>
</div>
