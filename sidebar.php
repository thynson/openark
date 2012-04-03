<ul class="sidebar">
<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : // use widgets otherwise use static ?>
	<li id="search"><h2><?php _e('Search') ?></h2>
		<ul>
		<li>
			<?php @include(TEMPLATEPATH.'/searchform.php'); ?>
		</li>
		</ul>
	</li>
	<li id="recentposts"><h2><?php _e('Recent Posts'); ?></h2>
		<ul>
		<?php $postslist = get_posts('numberposts=5&order=DESC&orderby=date'); foreach ($postslist as $post) : setup_postdata($post);
		?> 
			<li><a href="<?php the_permalink() ?>" rel="bookmark" title="Link to <?php the_title(); ?>"><?php the_title(); ?></a>
			</li>
		<?php endforeach; ?>
		</ul>
	</li>
	<li id="archives"><h2><?php _e('Archives');?></h2>
		<ul>
			<?php wp_get_archives('type=monthly'); ?>
		</ul>
	</li>
	<?php wp_list_bookmarks(); ?>
	<li id="categories"><h2><?php _e('Categories');?></h2>
		<ul>
			<?php wp_list_categories('show_count=1&title_li=&feed=RSS'); ?>
		</ul>
	</li>
	<li id="meta"><h2><?php _e('Meta');?></h2>
		<ul>
			<li class="rss"><a href="<?php bloginfo('rss2_url'); ?>">RSS 2.0 Feed</a></li>
			<li><a href="<?php bloginfo('atom_url'); ?>">Atom Feed</a></li>
			<li><a href="<?php bloginfo_rss('comments_rss2_url'); ?>">Comments RSS Feed</a></li>
			<?php wp_register('<li>','</li>'); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
			<li><a href="http://validator.w3.org/check/referer" title="This page validates as XHTML 1.0 Transitional">Valid <abbr title="eXtensible HyperText Markup Language">XHTML</abbr></a></li>
		</ul>
	</li>
	<li id="tagcloud"><h2><?php _e('Tag Cloud'); ?></h2>
		<ul>
			<li>
			<?php wp_tag_cloud('smallest=10&largest=16'); ?>
			</li>
		</ul>
	</li>
<?php endif; ?>
</ul>
