<?php
/**
 * Frontpage generation functions
 * Creates the slider, the columns, the titles and the extra text
 *
 * @package nirvana
 * @subpackage Functions
 */

//wp_enqueue_style( 'nirvana-frontpage' );

function nirvana_excerpt_length_slider( $length ) {
	return 50;
}

function nirvana_excerpt_more_slider( $more ) {
	return '...';
}

     $nirvanas= nirvana_get_theme_options();
     foreach ($nirvanas as $key => $value) { ${"$key"} = $value; } 
?>

<div id="frontpage">
<?php
// When a post query has been selected from the Slider type in the admin area
     global $post;
     // Initiating query
     $custom_query = new WP_query();
     $slides = array();
	 
	 if($nirvana_slideNumber>0):

     // Switch for Query type
     switch ($nirvana_slideType) {
          case 'Latest Posts' :
               $custom_query->query('showposts='.$nirvana_slideNumber.'&ignore_sticky_posts=1');
          break;
          case 'Random Posts' :
               $custom_query->query('showposts='.$nirvana_slideNumber.'&orderby=rand&ignore_sticky_posts=1');
          break;
          case 'Latest Posts from Category' :
               $custom_query->query('showposts='.$nirvana_slideNumber.'&category_name='.$nirvana_slideCateg.'&ignore_sticky_posts=1');
          break;
          case 'Random Posts from Category' :
               $custom_query->query('showposts='.$nirvana_slideNumber.'&category_name='.$nirvana_slideCateg.'&orderby=rand&ignore_sticky_posts=1');
          break;
          case 'Sticky Posts' :
               $custom_query->query(array('post__in'  => get_option( 'sticky_posts' ), 'showposts' =>$nirvana_slideNumber,'ignore_sticky_posts' => 1));
          break;
          case 'Specific Posts' :
               // Transofm string separated by commas into array
               $pieces_array = explode(",", $nirvana_slideSpecific);
               $custom_query->query(array( 'post_type' => 'any', 'post__in' => $pieces_array, 'ignore_sticky_posts' => 1,'orderby' => 'post__in' ));
               break;
          case 'Custom Slides':

               break;
		  case 'Disabled':
			   break;
     }//switch
	 
	endif; // slidenumber>0
	if ($nirvanas['nirvana_excerpttype']=='Characters') {
		remove_filter( 'get_the_excerpt', 'nirvana_excerpt_length_chars' );
	}
	else {
		remove_filter( 'excerpt_length', 'nirvana_excerpt_length_words' );
		remove_filter( 'get_the_excerpt', 'nirvana_custom_excerpt_more',10 );
	}
	 add_filter( 'excerpt_length', 'nirvana_excerpt_length_slider', 999 );
	 add_filter( 'excerpt_more', 'nirvana_excerpt_more_slider', 999 );
	 
     // switch for reading/creating the slides
     switch ($nirvana_slideType) {
		  case 'Disabled':
			   break;
          case 'Custom Slides':
               for ($i=1;$i<=5;$i++):
                    if(${"nirvana_sliderimg$i"}):
                         $slide['image'] = esc_url(${"nirvana_sliderimg$i"});
                         $slide['link'] = esc_url(${"nirvana_sliderlink$i"});
                         $slide['title'] = ${"nirvana_slidertitle$i"};
                         $slide['text'] = ${"nirvana_slidertext$i"};
                         $slides[] = $slide;
                    endif;
               endfor;
               break;
          default:
			   if($nirvana_slideNumber>0):	
               if ( $custom_query->have_posts() ) while ($custom_query->have_posts()) :
                    $custom_query->the_post();
                         $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'slider');
                	$slide['image'] = $img[0];
                	$slide['link'] = get_permalink();
                	$slide['title'] = get_the_title();
                	$slide['text'] = get_the_excerpt();
                	$slides[] = $slide;
               endwhile;
			   endif; // slidenumber>0
               break;
     }; // switch


if (count($slides)>0):
     ?>
<div class="slider-wrapper theme-default <?php if($nirvana_fpsliderarrows=="Visible on Hover"): ?>slider-navhover<?php endif; ?> slider-<?php echo  preg_replace("/[^a-z0-9]/i","",strtolower($nirvana_fpslidernav)); ?>">
     <div class="ribbon"></div>
     <div id="slider" class="nivoSlider">
	<?php foreach($slides as $id=>$slide):
            if($slide['image']): ?>
            <a href='<?php echo ($slide['link']?$slide['link']:'#'); ?>'>
                 <img src='<?php echo $slide['image']; ?>' data-thumb='<?php echo $slide['image']; ?>' alt="" <?php if ($slide['title'] || $slide['text']): ?>title="#caption<?php echo $id;?>" <?php endif; ?> />
            </a><?php endif; ?>
     <?php endforeach; ?>
     </div>
     <?php foreach($slides as $id=>$slide): ?>
            <div id="caption<?php echo $id;?>" class="nivo-html-caption">
                <?php echo '<h2>'.$slide['title'].'</h2><div class="slider-text-separator"></div><div class="slide-text"><div class="inline-slide-text">'.$slide['text'].'</div></div>'; ?>
									<?php if($nirvana_slidereadmore && $slide['link'] ): ?>
						<div class="readmore">
							<a href="<?php echo esc_url($slide['link']) ?>"><?php echo esc_attr($nirvana_slidereadmore) ?> <i class="column-arrow"></i> </a>
						</div>
						<?php endif; ?>
            </div>

	<?php endforeach; ?>
     </div>
<?php endif; ?> 


<div id="pp-afterslider">
<?php
// First FrontPage Title
if($nirvana_fronttext1 || $nirvana_fronttext3) { ?><div id="pp-texttop"><?php
if($nirvana_fronttext1) {?><div id="front-text1" class="ppbox"> <h2><?php echo do_shortcode($nirvana_fronttext1) ?> </h2></div><?php }
if($nirvana_fronttext3) {?><div id="front-text3" class="ppbox"> <?php echo do_shortcode($nirvana_fronttext3) ?></div><?php }
?></div><?php }
//COLUMNS
     // Initiating query
     $custom_query2 = new WP_query();
     $columns= array();
	 
	 if($nirvana_columnNumber>0):
     // Switch for Query type
     switch ($nirvana_columnType) {
          case 'Latest Posts' :
               $custom_query2->query('showposts='.$nirvana_columnNumber.'&ignore_sticky_posts=1');
          break;
          case 'Random Posts' :
               $custom_query2->query('showposts='.$nirvana_columnNumber.'&orderby=rand&ignore_sticky_posts=1');
          break;
          case 'Latest Posts from Category' :
               $custom_query2->query('showposts='.$nirvana_columnNumber.'&category_name='.$nirvana_columnCateg.'&ignore_sticky_posts=1');
          break;
          case 'Random Posts from Category' :
               $custom_query2->query('showposts='.$nirvana_columnNumber.'&category_name='.$nirvana_columnCateg.'&orderby=rand&ignore_sticky_posts=1');
          break;
          case 'Sticky Posts' :
               $custom_query2->query(array('post__in'  => get_option( 'sticky_posts' ), 'showposts' =>$nirvana_columnNumber,'ignore_sticky_posts' => 1));
          break;
          case 'Specific Posts' :
               // Transofm string separated by commas into array
               $pieces_array = explode(",", $nirvana_columnSpecific);
               $custom_query2->query(array( 'post_type' => 'any', 'post__in' => $pieces_array, 'ignore_sticky_posts' => 1,'orderby' => 'post__in' ));
               break;
          case 'Widget Columns':
		  
			   break;
		  case 'Disabled':

               break;
     }//switch
	 
	 endif; // columnNumber>0
	 
	 
	    // switch for reading/creating the columns
     switch ($nirvana_columnType) {
		  case 'Disabled':
			   break;
          case 'Widget Columns':
		       // if widgets loaded 
               if (is_active_sidebar('presentation-page-columns-area')) {
					echo '<div id="front-columns-box"><div id="front-columns" class="ppbox">';
					 if($nirvana_columnstitle) { echo "<h2>".do_shortcode($nirvana_columnstitle)."</h2>";}
					dynamic_sidebar( 'presentation-page-columns-area' );
					echo "</div></div>";
				}
				// if no widgets loaded use the defaults
			   else {
					global $nirvana_column_defaults;
					nirvana_columns_output($nirvana_column_defaults,$nirvana_nrcolumns); 
				}
               break;
          default: 
			   if($nirvana_columnNumber>0):
               if ( $custom_query2->have_posts() ) 
					while ($custom_query2->have_posts()) :
						$custom_query2->the_post();
                        $img = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'columns');
						$column['image'] = $img[0];
						$column['link'] = get_permalink();
						$column['text'] = get_the_excerpt();
						$column['title'] = get_the_title();
						$columns[] = $column;
					endwhile; 
					nirvana_columns_output($columns,$nirvana_nrcolumns);
			   endif; // columnNumber>0
               break;
     }; // switch
	


function nirvana_columns_output($columns,$nr_columns){ 
 $counter=0;
  $nirvanas= nirvana_get_theme_options();
     foreach ($nirvanas as $key => $value) { ${"$key"} = $value; }
	 ?> 
 <div id="front-columns-box">
 <div id="front-columns" class="ppbox">
 <?php if($nirvana_columnstitle) { echo "<h2>".do_shortcode($nirvana_columnstitle)."</h2>";}?>
 <?php 
	foreach($columns as $column): 
		if($column['image']) : $counter++;?>  
		<div class="column<?php echo ($counter%$nr_columns)?$counter%$nr_columns:$nr_columns; ?>"> 					
			<?php if ($column['image']) {	?>
				<div class="column-image">
					<img  src="<?php echo esc_url($column['image']) ?>" id="columnImage<?php echo $counter; ?>" alt="" />
					
						<div class="column-image-inside">
						<a class="column-link" href="<?php echo esc_url($column['link']) ?>">&nbsp;	</a>
						<div class="column-image-inside-centered">	
								<?php if ($column['title']) { echo "<a href='".esc_url($column['link'])."'><h3 class='column-header-image'>".$column['title']."</h3></a>"; } ?>	
							<div class="column-text-separator"></div>
							<?php if ($column['text']) { ?>		
								<div class="column-text">
									<?php echo do_shortcode($column['text']); ?>							
								</div>
							<?php } ?>
						</div> <!--column-image-inside-centered-->
						</div> <!--column-image-inside-->
				</div><!--column-image-->
			<?php } ?>
		</div><?php endif; // if image
	endforeach; ?>
</div> </div><?php 
}

if($nirvana_fronttext2 || $nirvana_fronttext4) {?><div id="pp-textmiddle"><?php
// Second FrontPage title
if($nirvana_fronttext2) {?><div id="front-text2" class="ppbox"> <h2><?php echo do_shortcode($nirvana_fronttext2) ?> </h2></div><?php }
// Frontpage second text area
if($nirvana_fronttext4) {?><div id="front-text4" class="ppbox"> <?php echo do_shortcode($nirvana_fronttext4) ?> </div><?php }
?></div><?php }
 if ($nirvanas['nirvana_excerpttype']=='Characters') {
   add_filter( 'get_the_excerpt', 'nirvana_excerpt_length_chars' );
 }
 else {
	 remove_filter( 'excerpt_length', 'nirvana_excerpt_length_slider', 999 );
	 remove_filter( 'excerpt_more', 'nirvana_excerpt_more_slider', 999 );
	 add_filter( 'excerpt_length', 'nirvana_excerpt_length_words' );
add_filter( 'get_the_excerpt', 'nirvana_custom_excerpt_more',10 );
}
if ($nirvana_frontposts=="Enable"): get_template_part('content/content', 'frontpage'); endif; ?>

<?php
// Third FrontPage Title/Text
if($nirvana_fronttext5 || $nirvana_fronttext6) { ?><div id="pp-textbottom"><?php
if($nirvana_fronttext5) {?><div id="front-text5" class="ppbox"> <h2><?php echo do_shortcode($nirvana_fronttext5) ?> </h2></div><?php }
if($nirvana_fronttext6) {?><div id="front-text6" class="ppbox"> <?php echo do_shortcode($nirvana_fronttext6) ?></div><?php }
?></div><?php } ?>

</div> <!-- #pp-afterslider -->
</div> <!-- #frontpage -->
<?php // End of nirvana_frontpage_generator
?>
