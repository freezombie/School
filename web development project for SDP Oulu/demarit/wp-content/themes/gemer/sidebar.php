<!-- BEGIN sidebar -->
<div id="sidebar">

	

	
	<!-- begin popular posts -->
	<div class="box">
	<h2>Popular Posts</h2>
	<ul class="popular">
	<?php dp_popular_posts(3); ?>
	</ul>
	</div>
	<!-- end popular posts -->
	
	<!-- begin flickr photos -->
	<div class="box">
	<h2>Flickr Photos</h2>
	<p class="flickr">
    
    
    <!-- 
    
    for displaying flickr photos, just install and set up flickrRSS plugin; DOWNLOAD: http://wordpress.org/extend/plugins/flickr-rss/
    
    -->
    
    
	<?php if (function_exists('get_flickrRSS')) get_flickrRSS(); ?>
	</p>
	</div>
	<!-- end flickr photos -->
	
	<!-- begin featured video -->
	<div class="box">
	<h2>Featured Video</h2>
	<div class="video">
	<script type="text/javascript">showVideo('<?php echo dp_settings("youtube") ?>');</script>
	</div>
	</div>
	<!-- end featured video -->
	
	<!-- begin tag cloud -->
	<div class="box">
	<h2>Tag Cloud</h2>
	<div class="tags">
	<?php wp_tag_cloud( $args ); ?> 
	</div>
	</div>
	<!-- end tag cloud -->
	
	
	
	<!-- BEGIN half sidebars -->
	<?php include(TEMPLATEPATH."/left.php");?>
	<?php include(TEMPLATEPATH."/right.php");?>
	<!-- END half sidebars -->

</div>
<!-- END sidebar -->
