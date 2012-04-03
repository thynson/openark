<?php get_header(); ?>

<div id="bd" class="page">
<div id="yui-main"><div class="yui-b">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post-wrap" id="post-<?php the_ID(); ?>">
		<h1 class="post-title"><?php the_title(); ?></h1>
			<div class="story-content">
			<?php the_content(); ?>
			<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
			<?php edit_post_link('Edit', '<p>', '</p>'); ?>
			</div><!-- end post content -->
	</div><!-- end post -->
<?php endwhile;
// to enable comments, uncomment the line below 
// comments_template(); 
else: ?>
		<h2 class="title"><?php _e('Not Found'); ?></h2>
		<p><?php _e("Sorry, but the page you're looking for couldn't be found. Double check your URL or you should try searching for it."); ?></p>
		<?php @include (TEMPLATEPATH . "/searchform.php"); ?>
<?php endif; ?>
</div>
</div>
<?php get_footer(); ?>
