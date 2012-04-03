<?php get_header(); ?>

<div id="bd" class="searchresults">
<div id="yui-main"><div class="yui-b">
	<h2 class="pagetitle">Search Results for '<?php echo $_GET['s']; ?>'</h2>
	<ul>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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
			<div class="previous"><?php next_posts_link('&laquo; Previous Results') ?></div>
			<div class="next"><?php previous_posts_link('More Results &raquo;') ?></div>
		</div>			
	<?php else : ?>
		<h2 class="pagetitle"><?php _e('No Results Found'); ?></h2>
		<p><?php _e('Sorry, but there were no entries that matched your search for '.$_GET['s']. 
		' You may want to try broadening or narrowing your search terms for better results.'); ?></p>
		<?php @include (TEMPLATEPATH.'/searchform.php'); ?>
	<?php endif; ?>
</div>
</div>
<?php get_footer(); ?>
