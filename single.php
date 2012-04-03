<?php get_header(); ?>

<div id="bd" class="single">
<div id="yui-main"><div class="yui-b">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post-wrap" id="post">
		<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
	                <div><?php the_time('Y年n月j日l'); ?></div> 
			<div class="story-content">
			<?php the_content(); ?>
			</div><!-- end post content -->
		<div class="metawrap">
		<p>
			<?php the_tags('tags: ', ', ', '<br />'); ?>
			posted in <?php the_category(', ') ?> by <?php the_author() ?>
			<?php edit_post_link('Edit', ' | ', ''); ?>
		</p>

		<p class="interact">
<?php 
if('open' == $post->comment_status || 'open' == $post->ping_status) {
    _e(' Follow comments via the '); 
    comments_rss_link('RSS Feed');
}

if('open'==$post->comment_status) {
?> | <a href="#respond"><?php _e('Leave a comment'); ?></a> <?php 
} 

if('open' == $post->ping_status) { 
?>| <a href="<?php trackback_url(true); ?>"><?php _e('Trackback URL'); ?></a> <?php 
} 

?>
</p>
		</div><!-- end meta wrap -->
	</div><!-- end post -->
<?php comments_template(); endwhile; else: ?>
		<h2 class="post-title"><?php _e('Not Found'); ?></h2>
		<p class="center"><?php _e("Sorry, but the post you're looking for couldn't be found. Double check your URL or you should try searching for it."); ?></p>
		<?php @include (TEMPLATEPATH . "/searchform.php"); ?>
<?php endif; ?>
</div>
</div>
<?php get_footer(); ?>
