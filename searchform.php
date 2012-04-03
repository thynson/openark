<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<input type="text" size="14" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" class="s" />
<input type="submit" id="searchsubmit" value="<?php _e('GO'); ?>" />
</form>