<?php
$OPTION = NWS_get_global_options();
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) {
		echo '<p class="nocomments">'.__('This post is password protected. Enter the password to view comments.', 'wpShop').'</p>';
		return;
	}
?>
<!-- You can start editing here. -->
<div style="display:none">
<div id="comments" class="clearfix">
	
		<h2 class="comments_title">
        <span><?php comments_number(__('No Comments yet', 'wpShop'), __('One Comment', 'wpShop'), __('% Comments', 'wpShop')); ?></span></h2>
	
		<?php if ( have_comments() ) : ?>
		
			<?php if ( ! empty($comments_by_type['comment']) ) : ?>	
					
					<ul class="commentlist">
						<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
					</ul>
			<?php endif; ?> 
			
			
			<?php if ( ! empty($comments_by_type['pings']) ) : ?>
			
				<div class="trackbacks">
					<div class="trackbacks_padding clearfix">
						<h2 class="trackback_title"><?php _e('Trackbacks/Pingbacks','wpShop'); ?></h2>
						<a href="#pings" class="show_trackbacks"><?php _e('show/hide trackbacks','wpShop'); ?></a>
					</div>
				</div>
				<ol id="pings" class="trackback">
					<?php wp_list_comments('type=pings&callback=list_pings'); ?>
				</ol>
			
			<?php endif; ?>
			
			<div class="comment_navigation clearfix">
				<div class="alignleft"><?php previous_comments_link() ?></div>
				<div class="alignright"><?php next_comments_link() ?></div>
			</div>
			
		<?php else : // this is displayed if there are no comments so far ?>
				
			<?php if ('open' == $post->comment_status) :
				// If comments are open, but there are no comments.
				echo "<p>".__('Be the first to write a comment','wpShop')."</p>";
			else : // comments are closed
				echo "<p>".__('Comments are closed.','wpShop')."</p>";
			endif;
			
		endif;?>
	
</div><!-- end comments -->
</div>
<?php if ('open' == $post->comment_status) : ?>

	<div id="respond" class="clearfix"><br />
<br />
<br />
<br />

		<div style="display:none;">
		<h2 class="respond_title"><span><?php comment_form_title(__('Leave a Comment','wpShop'), __('Leave a Comment to %s','wpShop')); ?></span></h2>
            <div class="cancel-comment-reply">
                <small><?php cancel_comment_reply_link(); ?></small>
            </div>
        </div>
			
		<?php if (get_option('comment_registration') && !$user_ID ) : ?>
		
			<p>
				<?php printf(__('You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'wpShop'), get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?>
			</p>
        
		<?php else : ?>
			<div style="display:none">
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

			<?php if ( $user_ID ) : ?>
				<p><?php _e('Logged in as','wpShop'); ?> 
					<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 
					<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php _e('Log out of this account','wpShop'); ?>"><?php _e('Log out','wpShop'); ?> </a>
				</p>
				
			<?php else : ?>
					<label for="author"><?php _e('Name','wpShop');?><span> <?php if ($req) echo "(required)"; ?></span></label>
					<input type="text" name="author" id="author" class="text" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
					
					<label for="email"><?php _e('Mail','wpShop');?><span> <?php if ($req) echo "(required)"; ?></span></label>
					<input type="text" name="email" id="email" class="text" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
					
					<label for="url"><?php _e('Website','wpShop');?></label>
					<input type="text" name="url" id="url" class="text" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
					
			

			<?php endif; ?>

				
				<label for="comment"><?php _e('Your Comment','wpShop');?></label>
				<textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
				<!--<p class="notes"><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->
				<input name="submit" type="submit" id="submit" class="formbutton" tabindex="5" value="<?php _e('Submit Comment','wpShop');?>" />
				<?php comment_id_fields(); ?>
				<?php do_action('comment_form', $post->ID); ?>

			</form>
            </div>
		<?php endif; // If registration required and not logged in ?>
	</div><!--  respond -->
<?php endif; // if you delete this the sky will fall on your head ?>