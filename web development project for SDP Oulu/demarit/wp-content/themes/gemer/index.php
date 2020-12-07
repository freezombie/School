<?php get_header(); ?>

<!-- BEGIN content -->
<div id="content">

	<!-- begin featured news -->
	<div class="featured">
	<h2>Featured News</h2>
	<div id="featured">
		<?php
		$tmp_query = $wp_query;
		query_posts('showposts=3&cat=' . get_cat_ID(dp_settings('featured')));
		if (have_posts()) :
		while (have_posts()) : the_post(); 
		?>
		<!-- begin post -->
		<div class="fpost">
			<a href="<?php the_permalink(); ?>"><?php dp_attachment_image($post->ID, 'thumbnail', 'alt="' . $post->post_title . '"'); ?></a>
			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p class="details"></p>
			<p><?php echo dp_clean($post->post_content, 300); ?></p>
		</div>
		<!-- end post -->
		<?php endwhile; endif; ?>
	</div>
	</div>
	<!-- end featured news -->
	
	<?php
	$wp_query = $tmp_query;
	if (have_posts()) :
	$odd = false;
	while (have_posts()) : the_post();
	$odd = !$odd;
	?>
	
	<!-- begin post -->
	<div class="<?php if ($odd) echo 'uneven '; ?>post">
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<a href="<?php the_permalink(); ?>"></a>
    <?php $screen = get_post_meta($post->ID,'screen', true); ?>
			<img src="<?php echo ($screen); ?>" width="181" height="100" alt=""  />
	<p><?php echo dp_clean($post->post_content, 150); ?></p>
	<div class="postmeta">
    <p class="category"><?php the_category(', '); ?></p>
	<p class="comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
	</div>
    </div>
	<!-- end post -->
	
	<?php endwhile; ?>
	
		<div class="postnav">
		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
		</div>
	
	<?php else : ?>
	<div class="notfound">
	<h2>Not Found</h2>
	<p>Sorry, but you are looking for something that is not here.</p>
	</div>
	<?php endif; ?>

</div>
<!-- END content -->

<?php get_sidebar(); get_footer(); ?>
