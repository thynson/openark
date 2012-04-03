<?php get_header(); ?>

<div id="bd" class="archives">
<div id="yui-main"><div class="yui-b">
	<?php if (have_posts()) : 
		if (is_category()) { // category listing ?>				
		<h2 class="pagetitle">Archive for the '<?php echo single_cat_title(); ?>' Category</h2>
		<?php } elseif (is_tag()) { // daily archive listing ?>
		<h2 class="pagetitle">'<?php single_tag_title(); ?>' Tag</h2>
		<?php } elseif (is_day()) { // daily archive listing ?>
		<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
		<?php } elseif (is_month()) { // monthly archive listing ?>
<!--		<h2 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h2>
-->
		<?php } elseif (is_year()) { // yearly archive listing ?>
		<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
		<?php } elseif (is_search()) { // search listing ?>
		<h2 class="pagetitle">Search Results</h2>
		<?php } elseif (is_author()) { // author archive ?>
		<h2 class="pagetitle">Author Archive</h2>
		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { // paginated archive ?>
		<h2 class="pagetitle">Blog Archives</h2>
		<?php } ?>
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
			<div class="previous"><?php next_posts_link('&laquo; Previous Results') ?></div>
			<div class="next"><?php previous_posts_link('More Results &raquo;') ?></div>
		</div>			
	<?php else : 
		if(!is_search()) : ?>
		<h2 class="pagetitle"><?php _e('Archive Does Not Exist'); ?></h2>
		<p><?php _e("Sorry, but the archive you're looking for doesn't seem to exist. 
		You may want to try searching for the entry you're looking for."); ?></p>
		<?php @include (TEMPLATEPATH.'/searchform.php'); 
		else : ?>
		<h2 class="pagetitle"><?php _e('No Results Found'); ?></h2>
		<p><?php _e("Sorry, but there were no entries that matched your search for '".$_GET['s']."' 
		 You may want to try broadening or narrowing your search terms for better results."); ?></p>
		<?php @include (TEMPLATEPATH.'/searchform.php'); 
		endif; ?>			
	<?php endif; ?>	
</div>
</div><!-- end content -->

<?php get_footer(); ?>
