<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {
	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$themename = 'destro';
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Test data
	$magpro_slider_start = array("false" => __("No", 'destro' ),"true" => __("Yes", 'destro' ));
	$homecat_array = array("hori" => __("Horizontal Layout", 'destro' ),"verti" => __("Vertical Layout", 'destro' ));
	
	// Pull all the categories into an array
	$options_categories = array();  
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = __("Select a page:", 'destro' );
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri(). '/admin/images/';
		
	$options = array();
		
		
							
	$options[] = array( "name" => "country1",
						"type" => "innertabopen");	

		$options[] = array( "name" => __("Select a Skin", 'destro' ),
							"type" => "groupcontaineropen");	

				$options[] = array( "name" => __("Select a Skin", 'destro' ),
										"desc" => __("Please note that default and destro skins are same if you are using destro theme. If you are using a child theme then default skin will be child theme.", 'destro' ),
										"id" => "skin_style",
										"type" => "images",
										"std" => "default",
										"options" => array(
											'destro' => $imagepath . 'destro.png',
											'azurite' => $imagepath . 'azurite.png',
											'blaze' => $imagepath . 'blaze.png',
											'mead' => $imagepath . 'mead.png',
											'liten' => $imagepath . 'liten.png',
											'pink' => $imagepath . 'pink.png',
											'alken' => $imagepath . 'alken.png',
											'oren' => $imagepath . 'oren.png',
											'lity' => $imagepath . 'lity.png',
											'browne' => $imagepath . 'browne.png',
											'silv' => $imagepath . 'silv.png',
											'kawfee' => $imagepath . 'kawfee.png',
											'bred' => $imagepath . 'bred.png',
											'gren' => $imagepath . 'gren.png',
											'rubia' => $imagepath . 'rubia.png',
											'aqua' => $imagepath . 'aqua.png',
											'bgre' => $imagepath . 'bgre.png',
											'blby' => $imagepath . 'blby.png',
											'blbr' => $imagepath . 'blbr.png',
											'brow' => $imagepath . 'brow.png',
											'yrst' => $imagepath . 'yrst.png',
											'grun' => $imagepath . 'grun.png',
											'kafe' => $imagepath . 'kafe.png',
											'slek' => $imagepath . 'slek.png',
											'krem' => $imagepath . 'krem.png',
											'grngy' => $imagepath . 'grngy.png',
											'kopr' => $imagepath . 'kopr.png',
											'marn' => $imagepath . 'marn.png',
											'gree' => $imagepath . 'gree.png',
											'brwgrn' => $imagepath . 'brwgrn.png',
											'pnkr' => $imagepath . 'pnkr.png',
											'bkrd' => $imagepath . 'bkrd.png',
											'default' => $imagepath . 'default.png')
										);						

										
		$options[] = array( "type" => "groupcontainerclose");



		$options[] = array( "name" => __("Logo Settings", 'destro' ),
							"type" => "groupcontaineropen");	

				$options[] = array( "name" => __("Upload Logo", 'destro' ),
									"desc" => __("Upload your logo here. max width 450px, It will replace the blog title and description.", 'destro' ),
									"id" => "header_logo",
									"type" => "proupgrade");	
									
				$options[] = array( "name" => __("Upload FavIcon", 'destro' ),
									"desc" => __("Upload your favicon here.", 'destro' ),
									"id" => "favicon",
									"type" => "proupgrade");														

										
		$options[] = array( "type" => "groupcontainerclose");	
		

		$options[] = array( "name" => __("Adsense Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Google Adsense ID", 'destro' ),
										"desc" => __("Enter your full adsense id. Ex : pub-1234567890", 'destro' ),
										"id" => "google_adsense_id",
										"std" => "",
										"type" => "proupgrade");		
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Single Page Settings", 'destro' ),
							"type" => "groupcontaineropen");
							
					$options[] = array( "name" => __("Show Featured Image?", 'destro' ),
										"desc" => __("Select yes if you want to show featured image as header.", 'destro' ),
										"id" => "show_featured_image_single",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Ratings?", 'destro' ),
										"desc" => __("Select yes if you want to show ratings under post title.", 'destro' ),
										"id" => "show_rat_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);										
										
					$options[] = array( "name" => __("Show Posted by and Date?", 'destro' ),
										"desc" => __("Select yes if you want to show Posted by and Date under post title.", 'destro' ),
										"id" => "show_pd_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);											
										
					$options[] = array( "name" => __("Show Categories and Tags?", 'destro' ),
										"desc" => __("Select yes if you want to show categories under post title.", 'destro' ),
										"id" => "show_cats_on_single",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
										
					$options[] = array( "name" => __("Show Social Share Buttons?", 'destro' ),
										"desc" => __("Select yes if you want to show social buttons under post title.", 'destro' ),
										"id" => "show_socialbuts_on_single",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);																	

					$options[] = array( "name" => __("Show Author Bio", 'destro' ),
										"desc" => __("Select yes if you want to show Author Bio Box on single post page.", 'destro' ),
										"id" => "show_author_bio",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show RSS Box", 'destro' ),
										"desc" => __("Select yes if you want to show RSS box on single post page.", 'destro' ),
										"id" => "show_rss_box",
										"std" => "true",
										"type" => "select",
										"options" => $magpro_slider_start);		
										
					$options[] = array( "name" => __("Show Social Box", 'destro' ),
										"desc" => __("Select yes if you want to show social box on single post page.", 'destro' ),
										"id" => "show_social_box",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Next/Previous Box", 'destro' ),
										"desc" => __("Select yes if you want to show Next/Previous box on single post page.", 'destro' ),
										"id" => "show_np_box",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Related Posts Box", 'destro' ),
										"desc" => __("Select yes if you want to show Next/Previous box on single post page.", 'destro' ),
										"id" => "show_related_box",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);																																								
										
		$options[] = array( "type" => "groupcontainerclose");						
		
		
		
	$options[] = array( "type" => "innertabclose");	


	$options[] = array( "name" => "country2",
						"type" => "innertabopen");	
						
		$options[] = array( "name" => __("Social Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Twitter", 'destro' ),
										"desc" => __("Enter your twitter id. Do not enter the twitter url, Enter only the id.", 'destro' ),
										"id" => "twitter_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Redditt", 'destro' ),
										"desc" => __("Enter your reddit url", 'destro' ),
										"id" => "redit_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Delicious", 'destro' ),
										"desc" => __("Enter your delicious url", 'destro' ),
										"id" => "delicious_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Technorati", 'destro' ),
										"desc" => __("Enter your technorati url", 'destro' ),
										"id" => "technorati_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Facebook", 'destro' ),
										"desc" => __("Enter your facebook url", 'destro' ),
										"id" => "facebook_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Stumble", 'destro' ),
										"desc" => __("Enter your stumbleupon url", 'destro' ),
										"id" => "stumble_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Youtube", 'destro' ),
										"desc" => __("Enter your youtube url", 'destro' ),
										"id" => "youtube_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Flickr", 'destro' ),
										"desc" => __("Enter your flickr url", 'destro' ),
										"id" => "flickr_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("LinkedIn", 'destro' ),
										"desc" => __("Enter your linkedin url", 'destro' ),
										"id" => "linkedin_id",
										"std" => "",
										"type" => "text");

					$options[] = array( "name" => __("Google", 'destro' ),
										"desc" => __("Enter your google url", 'destro' ),
										"id" => "google_id",
										"std" => "",
										"type" => "text");

							
		$options[] = array( "type" => "groupcontainerclose");											
														
	$options[] = array( "type" => "innertabclose");
	
	
	$options[] = array( "name" => "country3",
						"type" => "innertabopen");	
								
		$options[] = array( "name" => __("Slider Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Select Category", 'destro' ),
										"desc" => __("Posts from this category will be shown in the slider.", 'destro' ),
										"id" => "magpro_slidercat",
										"std" => "true",
										"type" => "select",
										"options" => $options_categories);
					
					$options[] = array( "name" => __("Show slider on homepage", 'destro' ),
										"desc" => __("Select yes if you want to show slider on homepage.", 'destro' ),
										"id" => "show_magpro_slider_home",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);
										
					$options[] = array( "name" => __("Show slider on Single post page", 'destro' ),
										"desc" => __("Select yes if you want to show slider on Single post page.", 'destro' ),
										"id" => "show_magpro_slider_single",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show slider on Pages", 'destro' ),
										"desc" => __("Select yes if you want to show slider on Pages.", 'destro' ),
										"id" => "show_magpro_slider_page",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show slider on Category Pages", 'destro' ),
										"desc" => __("Select yes if you want to show slider on Category Pages.", 'destro' ),
										"id" => "show_magpro_slider_archive",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);																														
					
					$options[] = array( "name" => __("Auto Start?", 'destro' ),
										"desc" => __("Select yes if you want the slider to start scrolling automaticaly on page load. Only applies to Accordian and Botique sliders.", 'destro' ),
										"id" => "magpro_slider_auto",
										"std" => "false",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);
										
					$options[] = array( "name" => __("How many slides?", 'destro' ),
										"desc" => __("Enter a number. Ex: 5 or 7", 'destro' ),
										"id" => "magpro_slidernumposts",
										"std" => "5",
										"class" => "mini",
										"type" => "text");										

					$options[] = array( "name" => __("Pause Duration", 'destro' ),
										"desc" => __("Time between slide changes. 1000 is 1 Second", 'destro' ),
										"id" => "magpro_slider_time",
										"std" => "7000",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("Select a Slider", 'ThemeAlley' ),
										"desc" => __("Type of slider to use", 'ThemeAlley' ),
										"id" => "magpro_slider",
										"std" => "cheader",
										"type" => "images",
										"options" => array(
											'wilto' => $imagepath . 'wilto.png',
											'cheader' => $imagepath . 'cheader.png')
										);										

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Sliders Available in PRO Version", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upgrade now for these Sliders", 'destro' ),
										"desc" => __("Available in PRO", 'destro' ),
										"id" => "magpro_slider_upgrade",
										"std" => "anything",
										"type" => "proimages",
										"options" => array(
											'nivo' => $imagepath . 'nivo.png',
											'camera' => $imagepath . 'camera.png',
											'piecemaker' => $imagepath . 'piecemaker.png',
											'accordian' => $imagepath . 'accordian.png',
											'boutique' => $imagepath . 'boutique.png',	
											'videoboutique' => $imagepath . 'boutiquevid.png',	
											'ken' => $imagepath . 'ken.png',
											'ruby' => $imagepath . 'ruby.png',	
											'wilto' => $imagepath . 'wilto.png',																							
											'wiltovideo' => $imagepath . 'wiltovid.png')
										);				

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
								

	$options[] = array( "name" => "country4",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Layout Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Select a homepage layout", 'destro' ),
										"desc" => __("Images for layout.", 'destro' ),
										"id" => "homepage_layout",
										"std" => "mag",
										"type" => "images",
										"options" => array(
											'maglite' => $imagepath . 'maglite.png',
											'mag' => $imagepath . 'mag.png',
											'standard' => $imagepath . 'standard.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");		
		
		$options[] = array( "name" => __("Layouts Available in PRO", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Upgrade now for these layouts.", 'destro' ),
										"desc" => __("UpGrade Now.", 'destro' ),
										"id" => "homepage_layout_upgrade",
										"std" => "",
										"type" => "proimages",
										"options" => array(
											'magpro' => $imagepath . 'magpro.png',
											'magvideo' => $imagepath . 'magvid.png',											
											'maglite' => $imagepath . 'maglite.png',
											'mag' => $imagepath . 'mag.png',
											'magthree' => $imagepath . 'magthree.png',
											'magfour' => $imagepath . 'magfour.png',
											'magfive' => $imagepath . 'magfive.png',
											'magsix' => $imagepath . 'magsix.png',
											'magseven' => $imagepath . 'magseven.png',
											'mageight' => $imagepath . 'mageight.png',
											'standard' => $imagepath . 'standard.png')
										);					

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");		
	
	$options[] = array( "name" => "country6",
						"type" => "innertabopen");

		$options[] = array( "name" => __("MagPro Settings", 'destro' ),
							"type" => "tabheading");

	
		
		$options[] = array( "name" => __("Recent Posts", 'destro' ),
							"type" => "groupcontaineropen");	


					$options[] = array( "name" => __("How Many Recent Posts?", 'destro' ),
										"desc" => __("Enter a number like 7 or 10", 'destro' ),
										"id" => "magpro_recent_posts_num",
										"std" => "10",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");			
		
		$options[] = array( "name" => __("Video Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Videos", 'destro' ),
										"desc" => __("Select yes if you want to show videos.", 'destro' ),
										"id" => "magpro_show_videos",
										"std" => "false",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);

					$options[] = array( "name" => __("Select a Category", 'destro' ),
										"desc" => __("For posts in this category, You need to create a custom field called video and enter the url to video in its value field", 'destro' ),
										"id" => "magpro_show_videos_cat",
										"type" => "proupgrade",
										"options" => $options_categories);


					$options[] = array( "name" => __("How many Videos", 'destro' ),
										"desc" => __("How many Videos would you like to show.", 'destro' ),
										"id" => "magpro_show_videos_num",
										"std" => "3",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Top Rated/Most Popular", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Top Rated/Most popular box ?", 'destro' ),
										"desc" => __("Select yes or no", 'destro' ),
										"id" => "magpro_show_mostbox",
										"std" => "false",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);


					$options[] = array( "name" => __("How many Posts", 'destro' ),
										"desc" => __("How many posts would you like to show.", 'destro' ),
										"id" => "magpro_show_mostboxnum",
										"std" => "10",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Gallery", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Gallery?", 'destro' ),
										"desc" => __("Select yes or no", 'destro' ),
										"id" => "magpro_show_gallery",
										"std" => "false",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);

					$options[] = array( "name" => __("Which Gallery?", 'destro' ),
										"desc" => __("Enter the gallery ID", 'destro' ),
										"id" => "magpro_galid",
										"std" => "",
										"type" => "proupgrade");


					$options[] = array( "name" => __("How many Images?", 'destro' ),
										"desc" => __("Enter the number of images you would like to show", 'destro' ),
										"id" => "magpro_galnum",
										"std" => "10",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Category Boxes", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Category Boxes", 'destro' ),
										"desc" => __("Select yes or no", 'destro' ),
										"id" => "magpro_show_catbox",
										"std" => "false",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);

					$options[] = array( "name" => __("Which Layout", 'destro' ),
										"desc" => __("Select horizontal or vertical", 'destro' ),
										"id" => "magpro_show_catbox_which",
										"std" => "hori",
										"type" => "proupgrade",
										"options" => $homecat_array);


					$options[] = array( "name" => __("Which Categories?", 'destro' ),
										"desc" => __("Enter the category ID's seperated by comma. Ex : 1, 7, 20", 'destro' ),
										"id" => "magpro_catbox_id",
										"std" => "",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("How many posts per box?", 'destro' ),
										"desc" => __("Enter a number. Ex : 1, 7, 20", 'destro' ),
										"id" => "magpro_catbox_num",
										"std" => "7",
										"type" => "proupgrade");										
										
		$options[] = array( "type" => "groupcontainerclose");						
		
									
						
	$options[] = array( "type" => "innertabclose");		


	$options[] = array( "name" => "country12",
						"type" => "innertabopen");
		
		$options[] = array( "name" => __("Video Mag Settings", 'destro' ),
							"type" => "tabheading");
		
						
	
		
		$options[] = array( "name" => __("Recent Tab Settings", 'destro' ),
							"type" => "groupcontaineropen");	
										
					$options[] = array( "name" => __("Show Recent Videos Tab?", 'destro' ),
										"desc" => __("Select yes if you want to show Recent Videos tab in the homepage", 'destro' ),
										"id" => "video_mag_recent",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);	

					$options[] = array( "name" => __("How many posts?", 'destro' ),
										"desc" => __("Enter a number. Ex : 1, 7, 20", 'destro' ),
										"id" => "video_mag_recent_num",
										"std" => "7",
										"type" => "proupgrade");

					$options[] = array( "name" => __("Select the Layout Type", 'destro' ),
										"desc" => __("Images for layout.", 'destro' ),
										"id" => "video_mag_recent_layout",
										"std" => "vidrecentone",
										"type" => "proupgrade",
										"options" => array(
											'vidrecentone' => $imagepath . 'vidone.png',
											'vidrecenttwo' => $imagepath . 'vidtwo.png',
											'vidrecentthree' => $imagepath . 'vidthree.png',
											'vidrecentfour' => $imagepath . 'vidfour.png')
										);																								
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Top Rated Settings", 'destro' ),
							"type" => "groupcontaineropen");	
										
					$options[] = array( "name" => __("Show Top Rated Videos Tab?", 'destro' ),
										"desc" => __("Select yes if you want to show Top Rated Videos tab in the homepage", 'destro' ),
										"id" => "video_mag_toprated",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);	

					$options[] = array( "name" => __("How many posts?", 'destro' ),
										"desc" => __("Enter a number. Ex : 1, 7, 20", 'destro' ),
										"id" => "video_mag_toprated_num",
										"std" => "7",
										"type" => "proupgrade");

					$options[] = array( "name" => __("Select the Layout Type", 'destro' ),
										"desc" => __("Images for layout.", 'destro' ),
										"id" => "video_mag_toprated_layout",
										"std" => "vidtopratedone",
										"type" => "proupgrade",
										"options" => array(
											'vidtopratedone' => $imagepath . 'vidone.png',
											'vidtopratedtwo' => $imagepath . 'vidtwo.png',
											'vidtopratedthree' => $imagepath . 'vidthree.png',
											'vidtopratedfour' => $imagepath . 'vidfour.png')
										);																								
										
		$options[] = array( "type" => "groupcontainerclose");		
		
		$options[] = array( "name" => __("Most Popular Settings", 'destro' ),
							"type" => "groupcontaineropen");	
										
					$options[] = array( "name" => __("Show Top Rated Videos Tab?", 'destro' ),
										"desc" => __("Select yes if you want to show Top Rated Videos tab in the homepage", 'destro' ),
										"id" => "video_mag_most",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);	

					$options[] = array( "name" => __("How many posts?", 'destro' ),
										"desc" => __("Enter a number. Ex : 1, 7, 20", 'destro' ),
										"id" => "video_mag_most_num",
										"std" => "7",
										"type" => "proupgrade");

					$options[] = array( "name" => __("Select the Layout Type", 'destro' ),
										"desc" => __("Images for layout.", 'destro' ),
										"id" => "video_mag_most_layout",
										"std" => "vidmostone",
										"type" => "proupgrade",
										"options" => array(
											'vidmostone' => $imagepath . 'vidone.png',
											'vidmosttwo' => $imagepath . 'vidtwo.png',
											'vidmostthree' => $imagepath . 'vidthree.png',
											'vidmostfour' => $imagepath . 'vidfour.png')
										);																							
										
		$options[] = array( "type" => "groupcontainerclose");			
		
		$options[] = array( "name" => __("Favourite Tab Settings", 'destro' ),
							"type" => "groupcontaineropen");	
										
					$options[] = array( "name" => __("Show Favourite Videos Tab?", 'destro' ),
										"desc" => __("Select yes if you want to show Favourite Videos tab in the homepage", 'destro' ),
										"id" => "video_mag_fav",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Select Category", 'destro' ),
										"desc" => __("Posts from this category will be shown in the Favourites tab.", 'destro' ),
										"id" => "video_mag_fav_cat",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $options_categories);

					$options[] = array( "name" => __("How many posts?", 'destro' ),
										"desc" => __("Enter a number. Ex : 1, 7, 20", 'destro' ),
										"id" => "video_mag_fav_num",
										"std" => "7",
										"type" => "proupgrade");

					$options[] = array( "name" => __("Select the Layout Type", 'destro' ),
										"desc" => __("Images for layout.", 'destro' ),
										"id" => "video_mag_fav_layout",
										"std" => "vidfavone",
										"type" => "proupgrade",
										"options" => array(
											'vidfavone' => $imagepath . 'vidone.png',
											'vidfavtwo' => $imagepath . 'vidtwo.png',
											'vidfavthree' => $imagepath . 'vidthree.png',
											'vidfavfour' => $imagepath . 'vidfour.png')
										);																					
										
		$options[] = array( "type" => "groupcontainerclose");		
									
		$options[] = array( "name" => __("Category Boxes", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Category Boxes", 'destro' ),
										"desc" => __("Select yes or no", 'destro' ),
										"id" => "video_mag_show_catbox",
										"std" => "false",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);

					$options[] = array( "name" => __("Which Categories?", 'destro' ),
										"desc" => __("Enter the category ID's seperated by comma. Ex : 1, 7, 20", 'destro' ),
										"id" => "video_mag_catbox_id",
										"std" => "",
										"type" => "proupgrade");
										
					$options[] = array( "name" => __("How many posts per box?", 'destro' ),
										"desc" => __("Enter a number. Ex : 1, 7, 20", 'destro' ),
										"id" => "video_mag_catbox_num",
										"std" => "2",
										"type" => "proupgrade");										
										
		$options[] = array( "type" => "groupcontainerclose");		

						
	$options[] = array( "type" => "innertabclose");	

	
	$options[] = array( "name" => "country7",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Mag Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'destro' ),
										"desc" => __("Select yes if you want to show ratings", 'destro' ),
										"id" => "show_ratings_mag",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Thumbnail?", 'destro' ),
										"desc" => __("Select yes if you want to show thumbnail in the post", 'destro' ),
										"id" => "show_postthumbnail_mag",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country8",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("MagLite Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'destro' ),
										"desc" => __("Select yes if you want to show ratings", 'destro' ),
										"id" => "show_ratings_maglite",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Thumbnail?", 'destro' ),
										"desc" => __("Select yes if you want to show thumbnail in the post", 'destro' ),
										"id" => "show_postthumbnail_maglite",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	
	
	
	
	$options[] = array( "name" => "country13",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("MagThree Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'destro' ),
										"desc" => __("Select yes if you want to show ratings", 'destro' ),
										"id" => "show_ratings_magthree",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Thumbnail?", 'destro' ),
										"desc" => __("Select yes if you want to show thumbnail in the post", 'destro' ),
										"id" => "show_postthumbnail_magthree",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country14",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("MagFour Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'destro' ),
										"desc" => __("Select yes if you want to show ratings", 'destro' ),
										"id" => "show_ratings_magfour",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Thumbnail?", 'destro' ),
										"desc" => __("Select yes if you want to show thumbnail in the post", 'destro' ),
										"id" => "show_postthumbnail_magfour",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");		
	
	$options[] = array( "name" => "country15",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("MagFive Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'destro' ),
										"desc" => __("Select yes if you want to show ratings", 'destro' ),
										"id" => "show_ratings_magfive",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Thumbnail?", 'destro' ),
										"desc" => __("Select yes if you want to show thumbnail in the post", 'destro' ),
										"id" => "show_postthumbnail_magfive",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country16",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("MagSix Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'destro' ),
										"desc" => __("Select yes if you want to show ratings", 'destro' ),
										"id" => "show_ratings_magsix",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Thumbnail?", 'destro' ),
										"desc" => __("Select yes if you want to show thumbnail in the post", 'destro' ),
										"id" => "show_postthumbnail_magsix",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");
	
	$options[] = array( "name" => "country17",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("MagSeven Settings", 'destro' ),
							"type" => "tabheading");
		
		
		$options[] = array( "name" => __("Recent Posts Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'destro' ),
										"desc" => __("Select yes if you want to show ratings", 'destro' ),
										"id" => "show_ratings_magseven",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Thumbnail?", 'destro' ),
										"desc" => __("Select yes if you want to show thumbnail in the post", 'destro' ),
										"id" => "show_postthumbnail_magseven",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);																			

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Category Box Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'destro' ),
										"desc" => __("Select yes if you want to show ratings", 'destro' ),
										"id" => "show_ratings_magseven_cat",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Which categories in left sidebar?", 'destro' ),
										"desc" => __("Enter the category ID's seperated by comma. Ex : 1, 7, 20", 'destro' ),
										"id" => "magseven_catbox_id",
										"std" => "",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("How many Posts per Category?", 'destro' ),
										"desc" => __("Enter the number of posts per category you would like to show", 'destro' ),
										"id" => "magseven_catbox_num",
										"std" => "7",
										"type" => "proupgrade");																											

										
		$options[] = array( "type" => "groupcontainerclose");									
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country18",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("MagEight Settings", 'destro' ),
							"type" => "tabheading");
		
		
		$options[] = array( "name" => __("Recent Posts Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'destro' ),
										"desc" => __("Select yes if you want to show ratings", 'destro' ),
										"id" => "show_ratings_mageight",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show Thumbnail?", 'destro' ),
										"desc" => __("Select yes if you want to show thumbnail in the post", 'destro' ),
										"id" => "show_postthumbnail_mageight",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);																			

										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Category Box Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'destro' ),
										"desc" => __("Select yes if you want to show ratings", 'destro' ),
										"id" => "show_ratings_mageight_cat",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Which categories in left sidebar?", 'destro' ),
										"desc" => __("Enter the category ID's seperated by comma. Ex : 1, 7, 20", 'destro' ),
										"id" => "mageight_catbox_id",
										"std" => "",
										"type" => "proupgrade");	
										
					$options[] = array( "name" => __("How many Posts per Category?", 'destro' ),
										"desc" => __("Enter the number of posts per category you would like to show", 'destro' ),
										"id" => "mageight_catbox_num",
										"std" => "7",
										"type" => "proupgrade");																											

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");			
	
	
	
	
	
	$options[] = array( "name" => "country9",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Standard Blog Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Ratings?", 'destro' ),
										"desc" => __("Select yes if you want to show ratings", 'destro' ),
										"id" => "show_ratings_standard",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);		
										
					$options[] = array( "name" => __("Show Categories/Tags?", 'destro' ),
										"desc" => __("Select yes if you want to show categories and tags in posts", 'destro' ),
										"id" => "show_ctags_standard",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country5",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Sidebar Settings", 'destro' ),
							"type" => "tabheading");
			
		
		$options[] = array( "name" => __("Sidebar Ad Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show 300x250 ads in sidebar?", 'destro' ),
										"desc" => __("Select yes if you want to show 300x250 ads in sidebar. If you select yes, go to widgets page and drag/drop the ads", 'destro' ),
										"id" => "show_sidebar_ads",
										"std" => "true",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);		
										
					$options[] = array( "name" => __("Show 125x125 ads in sidebar?", 'destro' ),
										"desc" => __("Select yes if you want to show 125x125 ads in sidebar. If you select yes, go to widgets page and drag/drop the ads", 'destro' ),
										"id" => "show_sidebar_ads_onetwofive",
										"std" => "false",
										"type" => "select",
										"class" => "mini", //mini, tiny, small
										"options" => $magpro_slider_start);											
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Feedburner Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show feedburner?", 'destro' ),
										"desc" => __("Select yes if you want to show feedburner in sidebar.", 'destro' ),
										"id" => "show_feedburner",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);
										
					$options[] = array( "name" => __("Feedburner Id", 'destro' ),
										"desc" => __("Enter your feedburner id", 'destro' ),
										"id" => "feedburner_id",
										"std" => "",
										"type" => "proupgrade");																												
																				
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Social Settings", 'destro' ),
							"type" => "groupcontaineropen");	

										
					$options[] = array( "name" => __("Show Twitter Updates?", 'destro' ),
										"desc" => __("Select yes if you want to show twitter updates in sidebar.", 'destro' ),
										"id" => "show_twitter_updates",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);																												
																				
		$options[] = array( "type" => "groupcontainerclose");		
		
		$options[] = array( "name" => __("Video Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Videos in sidebar?", 'destro' ),
										"desc" => __("Select yes if you want to show videos in sidebar.", 'destro' ),
										"id" => "sidebar_show_videos",
										"std" => "false",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);

					$options[] = array( "name" => __("Select a Category", 'destro' ),
										"desc" => __("For posts in this category, You need to create a custom field called video and enter the url to video in its value field", 'destro' ),
										"id" => "sidebar_show_videos_cat",
										"type" => "proupgrade",
										"options" => $options_categories);


					$options[] = array( "name" => __("How many Videos", 'destro' ),
										"desc" => __("How many Videos would you like to show.", 'destro' ),
										"id" => "sidebar_show_videos_num",
										"std" => "3",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Top Rated/Most Popular", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Top Rated/Most popular box in sidebar?", 'destro' ),
										"desc" => __("Select yes or no", 'destro' ),
										"id" => "sidebar_show_mostbox",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);

					$options[] = array( "name" => __("Select the Layout Type", 'destro' ),
										"desc" => __("Images for layout.", 'destro' ),
										"id" => "tabboxsidebarlayout",
										"std" => "tabbigthumb",
										"type" => "proupgrade",
										"options" => array(
											'tabbigthumb' => $imagepath . 'vidone.png',
											'tabsmallthumb' => $imagepath . 'vidfour.png')
										);	

					$options[] = array( "name" => __("How many posts", 'destro' ),
										"desc" => __("How many posts would you like to show.", 'destro' ),
										"id" => "sidebar_show_mostboxnum",
										"std" => "10",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");	
		
		$options[] = array( "name" => __("Polls", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show Polls?", 'destro' ),
										"desc" => __("Select yes or no", 'destro' ),
										"id" => "sidebar_show_poll",
										"std" => "false",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);


					$options[] = array( "name" => __("Which Poll?", 'destro' ),
										"desc" => __("Enter the poll ID", 'destro' ),
										"id" => "sidebar_show_poll_id",
										"std" => "",
										"type" => "proupgrade");
										
		$options[] = array( "type" => "groupcontainerclose");												
						
	$options[] = array( "type" => "innertabclose");		
	
	$options[] = array( "name" => "country10",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("AD Settings", 'destro' ),
							"type" => "tabheading");		
		
		$options[] = array( "name" => __("Header Ad Settings", 'destro' ),
							"type" => "groupcontaineropen");	

					
					$options[] = array( "name" => __("Show Adsense?", 'destro' ),
										"desc" => __("If yes, adsense will be show else enter html adcode below", 'destro' ),
										"id" => "show_header_adsense",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);		
										
					$options[] = array( "name" => __("Header Ad code", 'destro' ),
										"desc" => __("Enter the html ad code", 'destro' ),
										"id" => "header_ad_code",
										"type" => "proupgrade");														

										
		$options[] = array( "type" => "groupcontainerclose");								
						
	$options[] = array( "type" => "innertabclose");	
	
	$options[] = array( "name" => "country11",
						"type" => "innertabopen");
						
		$options[] = array( "name" => __("Footer Settings", 'destro' ),
							"type" => "tabheading");		
		
		$options[] = array( "name" => __("Footer Widgets", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show footer widgets on homepage?", 'destro' ),
										"desc" => __("Select yes if you want to show footer widgets on homepage.", 'destro' ),
										"id" => "show_footer_widgets_home",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);
										
					$options[] = array( "name" => __("Show footer widgets on single post pages?", 'destro' ),
										"desc" => __("Select yes if you want to show footer widgets on single post pages.", 'destro' ),
										"id" => "show_footer_widgets_single",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);	
										
					$options[] = array( "name" => __("Show footer widgets on pages?", 'destro' ),
										"desc" => __("Select yes if you want to show footer widgets on pages.", 'destro' ),
										"id" => "show_footer_widgets_page",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);		
										
					$options[] = array( "name" => __("Show footer widgets on category pages?", 'destro' ),
										"desc" => __("Select yes if you want to show footer widgets on category pages.", 'destro' ),
										"id" => "show_footer_widgets_archive",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);																													
																				
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Footer Logo", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show footer logo?", 'destro' ),
										"desc" => __("Select yes if you want to show logo in footer.", 'destro' ),
										"id" => "show_footer_logo",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);

				$options[] = array( "name" => __("Upload Logo", 'destro' ),
									"desc" => __("Upload your logo here. Max width 250px", 'destro' ),
									"id" => "footer_logo",
									"type" => "proupgrade");						

										
		$options[] = array( "type" => "groupcontainerclose");
		
		$options[] = array( "name" => __("Search Box", 'destro' ),
							"type" => "groupcontaineropen");	

					$options[] = array( "name" => __("Show search box in footer?", 'destro' ),
										"desc" => __("Select yes if you want to show search box in footer.", 'destro' ),
										"id" => "show_footer_search",
										"std" => "true",
										"type" => "proupgrade",
										"options" => $magpro_slider_start);						

										
		$options[] = array( "type" => "groupcontainerclose");												
						
	$options[] = array( "type" => "innertabclose");			
							
						

							
		
	return $options;
}