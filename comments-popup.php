<?php 
/* Don't remove these lines. */
add_filter('comment_text', 'popuplinks');
foreach ($posts as $post) { start_wp();
$oddcomment = 'alt';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
     <title>Comments on <?php the_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_settings('blog_charset'); ?>" />
	<style type="text/css" media="screen">
		@import url( <?php bloginfo('stylesheet_url'); ?> );
	</style>

</head>
<body>
<div id="commentspopup">
<h1 id="top"><em><?php the_title(); ?></em> Comments</h1>

<div id="popupcontent">
<p class="interact"><?php if('open' == $post->comment_status || 'open' == $post->ping_status) { comments_rss_link('Comment RSS Feed'); } if('open'==$post->comment_status) { ?> | <a href="#respond"><?php _e('Leave a comment'); ?></a> <?php } if('open' == $post->ping_status) { ?>| <a href="<?php trackback_url(true); ?>">Trackback URL</a> <?php } ?></p>

<?php
// this line is WordPress' motor, do not delete it.
$comment_author = (isset($_COOKIE['comment_author_' . COOKIEHASH])) ? trim($_COOKIE['comment_author_'. COOKIEHASH]) : '';
$comment_author_email = (isset($_COOKIE['comment_author_email_'. COOKIEHASH])) ? trim($_COOKIE['comment_author_email_'. COOKIEHASH]) : '';
$comment_author_url = (isset($_COOKIE['comment_author_url_'. COOKIEHASH])) ? trim($_COOKIE['comment_author_url_'. COOKIEHASH]) : '';
$comments = get_approved_comments($id);
$post = get_post($id);
if (!empty($post->post_password) && $_COOKIE['wp-postpass_'. COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
	echo(get_the_password_form());
} else { ?>

<?php if ($comments) : ?>
<ol id="commentlist">
	<?php foreach ($comments as $comment) : // start comment loop. ?>
			<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID(); ?>">
				<p><cite><?php comment_author_link(); ?></cite> wrote,</p>
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

 if ('open' == $post->comment_status) : ?>
<div class="commentwrap">
<h2>Leave a comment</h2>
	<?php if ( get_option('comment_registration') && !$user_ID ) : // login is required and not logged in ?>
	<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>#respond">logged in</a> to post a comment.</p>
	<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<fieldset>
			<legend>Comment Form</legend>
				<?php if ($user_ID) : // user's logged in ?>				
					<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>				
				<?php else : // otherwise show commenter info form ?>
				<dl class="commentinfo">
					<dt><label for="author">Name <?php if ($req) echo "(required)"; ?></label></dt>
					<dd><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="25" tabindex="1" /></dd>
					<dt><label for="email">E-mail (will not be published) <?php if ($req) echo "(required)"; ?></label></dt>
					<dd><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" <?php if($req) echo 'class="req"'; ?> size="25" tabindex="2" /></dd>
					<dt><label for="url">Website</label></dt>
					<dd><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" <?php if($req) echo 'class="req"'; ?> size="25" tabindex="3" /></dd>
				</dl>
				<?php endif; // end if user's logged in ?>
				<dl class="commentbox">
					<dt><label for="comment">Your Comments</label></dt>
					<dd>
						<!--<p><strong>Allowed (X)HTML:</strong> <?php echo allowed_tags(); ?></p>-->
						<textarea name="comment" id="comment" cols="50" rows="10" tabindex="4"></textarea>
					</dd>			
				</dl>
				<p><input name="submit" type="submit" id="submit" tabindex="5" value="Post Comment" /></p>
				<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
				<?php do_action('comment_form', $post->ID); ?>
		</fieldset>
</form>
</div>
<?php endif; 
else :
?>
<p>The comment form is closed.</p>
<?php
endif; 
} // end password check
?>

<p><strong><a href="javascript:window.close()">Close this window.</a></strong></p>

<?php // if you delete this the sky will fall on your head
}
?>

<!-- // this is just the end of the motor - don't touch that line either :) -->
<script type="text/javascript">
<!--
document.onkeypress = function esc(e) {	
	if(typeof(e) == "undefined") { e=event; }
	if (e.keyCode == 27) { self.close(); }
}
// -->
</script>
</div>
<?php get_footer(); ?>