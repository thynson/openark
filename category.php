<?php get_header(); ?>

<div id="bd" class="categories">
<div id="yui-main"><div class="yui-b">
	<?php if (have_posts()) : ?>
	<h2 class="pagetitle">'<?php echo single_cat_title(); ?>' Category</h2>
	<ul>
	<?php while (have_posts()) : the_post(); ?>
		<li>
		<div class="post-wrap" id="post-<?php the_ID(); ?>">
			<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
	                <div><?php the_time('F j, Y'); ?></div> 
			<?php the_excerpt(); ?> 
			<p class="post-meta">
				posted in <?php the_category(', ') ?> by <?php the_author() ?>
				<?php edit_post_link('Edit', ' | ', ''); ?>
			</p>
		</div>
		</li>
	<?php endwhile; ?>
	</ul>
		<div class="nav">
			<div class="previous"><?php next_posts_link('&laquo; Previous Category Listings') ?></div>
			<div class="next"><?php previous_posts_link('More Category Listings &raquo;') ?></div>
		</div>			
	<?php else : ?>
		<h2 class="pagetitle"><?php _e('The Category Does Not Exist'); ?></h2>
		<p><?php _e("Sorry, but the category you're looking for doesn't exist. Please try selecting a category from the menu."); ?></p>
	<?php endif; ?>		
</div>
</div>
<?php get_footer(); ?>
