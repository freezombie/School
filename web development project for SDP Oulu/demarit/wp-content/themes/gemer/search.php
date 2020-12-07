<?php get_header(); ?>

<!-- BEGIN content -->
<div id="content">

	<h2 class="title">Search Results for <strong><?php the_search_query(); ?></strong></h2>
	
	<?php
	if (have_posts()) :
	$odd = false;
	while (have_posts()) : the_post();
	$odd = !$odd;
	?>
	
	<!-- begin post -->
	<div class="<?php if ($odd) echo 'uneven '; ?>post">
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<a href="<?php the_permalink(); ?>"><?php dp_attachment_image($post->ID, 'thumbnail', 'alt="' . $post->post_title . '"'); ?></a>
	<p><?php echo dp_clean($post->post_content, 150); ?></p>
	<p class="category"><?php the_category(', '); ?></p>
	<p class="comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
	</div>
	<!-- end post -->
	
	<?php endwhile; ?>
	
		<div class="postnav">
		<?php if(function_exists('wp_page_numbers')) { wp_page_numbers(); } ?>
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
