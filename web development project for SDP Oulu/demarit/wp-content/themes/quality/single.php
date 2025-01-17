<?php
  /*	@Theme Name	:	Quality
  * 	@file         :	single.php
  * 	@package      :	Quality
  * 	@author       :	VibhorPurandare
  * 	@license      :	license.txt
  * 	@filesource   :	wp-content/themes/quality/single.php
  */	
  get_header(); ?>
<div class="page-seperator"></div>
<div class="container">
  <div class="row">
    <div class="qua_page_heading">
      <h1><?php the_title(); ?></h1>
      <div class="qua-separator"></div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row qua_blog_wrapper" >
<div class="<?php if( is_active_sidebar('sidebar-primary')) { echo "col-md-8"; } else { echo "col-md-12"; } ?>">
      <?php the_post(); ?>
      <div class="qua_blog_detail_section">
        <div class="qua_blog_post_img">
          <?php $defalt_arg =array('class' => "img-responsive"); ?>
          <?php if(has_post_thumbnail()): ?>
          <a  href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('quality_blog_img', $defalt_arg); ?>
          </a>
          <?php endif; ?>	
        </div>
        <div class="qua_post_date">
          <span class="date"><?php echo get_the_date('j'); ?></span>
          <h6><?php echo the_time('M'); ?></h6>
        </div>
        <div class="qua_post_title_wrapper">
          <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
          <div class="qua_post_detail">
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><i class="fa fa-user"></i><?php echo get_the_author(); ?></a>
            <a href="<?php comments_link(); ?>"><i class="fa fa-comments"></i><?php comments_number( 'No Comment', 'One comment', '% comments' ); ?></a>
            <?php if(get_the_tag_list() != '') { ?>
            <div class="qua_tags">
              <i class="fa fa-tags"></i><?php the_tags('', ', ', '<br />'); ?>								
            </div>
            <?php }?>
            <?php if(get_the_category_list() != '') { ?>
            <div class="qua_post_cats">
              <i class="fa fa-group"></i><?php the_category(' '); ?>
            </div>
            <?php } ?>
          </div>
        </div>
        <div class="clear"></div>
        <div class="qua_blog_post_content">
          <?php the_content( __( 'Read More' , 'quality' ) ); ?>
		  <?php wp_link_pages( ); ?>
        </div>
      </div>
      <?php comments_template('',true); ?>				
    </div>
    <?php get_sidebar(); ?>	
  </div>
</div>
<?php get_footer(); ?>