<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>
				
				<p class="nocomments">This post is password protected. Enter the password to view comments.<p>
				
				<?php
				return;
            }
        }

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
?>

<!-- You can start editing here. -->
<div id="commentwrap">
<?php if($comments) : // if comments or trackbacks are open or there is at least one comment. ?>
<h3 id="comments"><?php comments_number('0 Comments', '1 Comment', '% Comments' ); ?> to "<?php the_title(); ?>"</h3>
	
	<ol id="commentlist">
	<?php foreach ($comments as $comment) : // start comment loop. ?>
		<?php if($comment->user_id == $post->post_author) $oddcomment = 'authorpost'; ?>
		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID(); ?>">
			<p><?php echo get_avatar( $comment, 32 ); ?><cite><?php comment_author_link(); ?></cite> wrote:</p>
			<?php comment_text(); ?>
			<?php if ($comment->comment_approved == '0') : // if comment is moderated ?>
				<p class="moderation">Your comment is awaiting moderation.</p>
			<?php endif; // end if comment is moderated ?>
			<p class="commentmetadata"><a href="#comment-<?php comment_ID(); ?>" title="">Link</a> | <?php comment_date('F jS, Y'); ?> at <?php comment_time(); ?> <?php edit_comment_link('edit',' | ',''); ?></p>
		</li>
	<?php 
		if ('alt' == $oddcomment) $oddcomment = '';
		else $oddcomment = 'alt'; // decorate author and alternating comments.
		endforeach; // end comment loop.  
	?>
	</ol>
	<?php else : // this is displayed if there are no comments so far
	 	if ('open' == $post->comment_status) : ?> 
			<!-- If comments are open, but there are no comments. -->
			
	<?php else : // comments are closed ?>
			<!-- If comments are closed. -->
		
<?php endif; endif;
	
	if ('open' == $post->comment_status) : // if comments are open, show the form. ?>	
<h3 id="respond">Leave Your Comment</h3>
	<?php if ( get_option('comment_registration') && !$user_ID ) : // login is required and not logged in ?>
	<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>#respond">logged in</a> to post a comment.</p>
	<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ($user_ID) : // user's logged in ?>				
			<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>				
		<?php else : // otherwise show commenter info form ?>
			<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
			<label for="author"><small>Name <?php if ($req) echo "(required)"; ?></small></label></p>
			
			<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
			<label for="email"><small>Mail (will not be published) <?php if ($req) echo "(required)"; ?></small></label></p>
			
			<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
			<label for="url"><small>Website</small></label></p>
		<?php endif; // end if user's logged in ?>
		<!-- to show commenters which tags are allowed, uncomment the line below. -->
		<!--<p><strong>Allowed (X)HTML:</strong> <?php echo allowed_tags(); ?></p>-->
		<textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea>
		<p><input name="submit" type="submit" id="submit" tabindex="5" value="Post Comment" /></p>
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		<?php do_action('comment_form', $post->ID); ?>
	</form>
<?php 
// delete the following lines and the sky will fall on your head (or it'll just break your comments)
	endif; 
endif; // end if comments. ?>

</div><!-- end comment wrap -->