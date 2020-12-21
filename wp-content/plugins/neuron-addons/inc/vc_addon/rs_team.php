<?php
/*
Element Description: Rs Team Box
*/
     
    // Element Mapping
    function vc_grassyTeam_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
        
        $category_dropdown = array( __( 'All Categories', 'neuron_addon' ) => '0' );	
        $args = array(
            'taxonomy' => array('team-category'),//ur taxonomy
            'hide_empty' => true,                  
        );

		$terms_= new WP_Term_Query( $args );
		foreach ( (array)$terms_->terms as $term ) {
			$category_dropdown[$term->name] = $term->slug;		
		} 
        // Map the block with vc_map()
        vc_map( 
            array(
				'name'        => __('Team Showcase', 'neuron_addon'),
				'base'        => 'vc_grassyTeam',
				'description' => __('Team Showcase Information', 'neuron_addon'), 
				'category'    => __('by AuburnForest', 'neuron_addon'),   
				'icon'        => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(


                	array(
						"type"       => "dropdown",
						"heading"    => __("Layout Type", 'neuron_addon'),
						"param_name" => "type",
						"value" => array(							
							'Slider' => "Slider", 
							'Grid' => "Grid",											
							'List' => "list"											
						),
						
					),

                	array(
						"type"       => "dropdown",
						"heading"    => __("Select team Style", 'neuron_addon'),
						"param_name" => "slider_style",
						"value" => array(							
							'Style 1' => "team-slider-style1", 
							'Style 2' => "team-slider-style2",
							'Style 3' => "team-slider-style3",
							'Style 4' => "team-slider-style4"
						),
						"dependency" => Array('element' => 'type', 'value' => array('Slider')),
					),

					array(
						"type"       => "dropdown",
						"heading"    => __("Select team Style", 'neuron_addon'),
						"param_name" => "grid_style",
						"value" => array(							
							'Style 1' => "team-grid-style1", 
							'Style 2' => "team-grid-style2",
							'Style 3' => "team-style4",
							'Style 4' => "team-style5"
						),
						"dependency" => Array('element' => 'type', 'value' => array('Grid')),
					),

					array(
						"type"       => "dropdown",
						"heading"    => __("Select team Grid", 'neuron_addon'),
						"param_name" => "team_col",
						"value" => array(							 
							'2 Column' => "2 Column", 
							'3 Column' => "3 Column",
							'4 Column' => "4 Column",
							'6 Column' => "6 Column",
							'Full Width' => "Full Width"																	
						),
						"dependency" => Array('element' => 'type', 'value' => array('Grid')),
						
					),	
				
					  
                         
                    array(

						"type"       => "dropdown",
						"heading"    => __("Show title", 'neuron_addon'),
						"param_name" => "title",
						"value" => array(							    						
							'Yes' => "Yes", 
							'No' => "No",						
						),						
					),  
					array(
					"type" => "dropdown_multi",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Categories", 'neuron_addon' ),
					"param_name" => "cat",
					'value' => $category_dropdown,
					), 
             				
				
					
					array(
						"type"       => "dropdown",
						"heading"    => __("Show Short Description", 'neuron_addon'),
						"param_name" => "description",
						"value" => array(

							'Yes' => "Yes", 
							'No' => "No", 	

						),
						"dependency" => Array('element' => 'grid_style', 'value' => array('team-grid-style2', 'team-grid-style3')),	
						
					),

					array(
						"type"       => "dropdown",
						"heading"    => __("Content Alignment", 'neuron_addon'),
						"param_name" => "content_align",
						"value" => array(

							'Left' => "text-left", 
							'Center' => "text-center", 	
							'Right' => "text-right", 	

						),
						"dependency" => Array('element' => 'grid_style', 'value' => array('team-grid-style2', 'team-grid-style3')),	
						
					),
					
					array(
						"type"       => "textfield",
						"heading"    => __("Team Per Pgae", 'neuron_addon'),
						"param_name" => "team_per",
						'value' => -1,
						'description' => __( 'You can write how many team member show. ex(2)', 'neuron_addon' ),					
					),	

								

					array(
						"type"       => "textfield",
						"heading"    => __("Excerpt Limit", 'neuron_addon'),
						"param_name" => "excerpt_limit",
						'value' => "22",						
					), 

				array(
					"type"       => "dropdown",
					"heading"    => __("Show  Pagination", 'neuron_addon'),
					"param_name" => "pagination_team",
					"value" 	 => array(			    						
						'No'  => "",											
						'Yes' => "yes", 
					),
					"dependency" => Array('element' => 'type', 'value' => array('Grid')),
				),

				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 1199px )", 'neuron_addon' ),
					"param_name" => "col_lg",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "3",
					"group" 	  => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),	
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 991px )", 'neuron_addon' ),
					"param_name" => "col_md",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "3",
					"group" 	  => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Tablets > 767px )", 'neuron_addon' ),
					"param_name" => "col_sm",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "3",
					"group" 	  => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Phones < 768px )", 'neuron_addon' ),
					"param_name" => "col_xs",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "2",
					"group" 	  => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Small Phones < 480px )", 'neuron_addon' ),
					"param_name" => "col_mobile",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "1",
					"group" 	  => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
				),

				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Navigation Dots", 'neuron_addon' ),
					"param_name" => "slider_dots",
					"value" => array(
						__( 'Disabled', 'neuron_addon' ) => 'false',
						__( 'Enabled', 'neuron_addon' )  => 'true',
						),
					"description" => __( "Enable or disable navigation dots. Default: Disable", 'neuron_addon' ),
					"group" => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
				),

				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Navigation Nav", 'neuron_addon' ),
					"param_name" => "slider_nav",
					"value" => array(
						__( 'Enabled', 'neuron_addon' )  => 'true',
						__( 'Disabled', 'neuron_addon' ) => 'false',
						),
					"description" => __( "Enable or disable navigation Nav. Default: Enable", 'neuron_addon' ),
					"group" => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay", 'neuron_addon' ),
					"param_name" => "slider_autoplay",
					"value" => array( 
						__( "Enable", 'neuron_addon' )  => 'true',
						__( "Disable", 'neuron_addon' ) => 'false',
						),
					"description" => __( "Enable or disable autoplay. Default: Enable", 'neuron_addon' ),
					"group" => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Stop on Hover", 'neuron_addon' ),
					"param_name" => "slider_stop_on_hover",
					"value" => array( 
						__( "Enable", 'neuron_addon' )  => 'true',
						__( "Disable", 'neuron_addon' ) => 'false',
						),
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Stop autoplay on mouse hover. Default: Enable", 'neuron_addon' ),
					"group" => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
				),

				array(
					"type" 		  => "dropdown",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Interval", 'neuron_addon' ),
					"param_name"  => "slider_interval",
					"value" 	  => array( 
						__( "5 Seconds", 'neuron_addon' )  => '5000',
						__( "4 Seconds", 'neuron_addon' )  => '4000',
						__( "3 Seconds", 'neuron_addon' )  => '3000',
						__( "2 Seconds", 'neuron_addon' )  => '4000',
						__( "1 Seconds", 'neuron_addon' )  => '1000',
						),
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds", 'neuron_addon' ),
					"group" 	  => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
				),
				array(
					"type"		  => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Slide Speed", 'neuron_addon' ),
					"param_name"  => "slider_autoplay_speed",
					"value" 	  => 200,
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Slide speed in milliseconds. Default: 200", 'neuron_addon' ),
					"group" 	  => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
				),	
				array(
					"type" 		 => "dropdown",
					"holder" 	 => "div",
					"class" 	 => "",
					"heading" 	 => __( "Loop", 'neuron_addon' ),
					"param_name" => "slider_loop",
					"value" 	 => array( 
						__( "Enable", 'neuron_addon' )  => 'true',
						__( "Disable", 'neuron_addon' ) => 'false',
						),
					"description"=> __( "Loop to first item. Default: Enable", 'neuron_addon' ),
					"group" 	 => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'type', 'value' => array('Slider')),
				),

				array(
					'type' => 'css_editor',
					'heading' => __( 'CSS box', 'neuron_addon' ),
					'param_name' => 'css',
					'group' => __( 'Design Options', 'neuron_addon' ),
				),            
                        
                ),
				
					
            )
        );                                   
    }
     
   add_action( 'vc_before_init', 'vc_grassyTeam_mapping' );
     
    // Element HTML
    function vc_grassyTeam_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'title'                 => '',						
					'description'           => '',	
					'content_align'         => 'text-left',	
					'team_per'              => '-1',										
					'type'                  => 'Slider',	
					'team_col'              => '',
					'excerpt_limit'         => '150',
					'slider_style'          => 'team-slider-style1',
					'grid_style'            => 'team-grid-style1',
					'col_lg'                => '3',
					'col_md'                => '3',
					'col_sm'                => '3',
					'col_xs'                => '2',
					'col_mobile'            => '1',
					'slider_nav'            => 'true',
					'slider_dots'           => 'false',
					'slider_autoplay'       => 'true',
					'slider_stop_on_hover'  => 'true',
					'slider_interval'       => '5000',
					'slider_autoplay_speed' => '200',
					'slider_loop'           => 'true',				
					'css'                   => '' ,
					'cat'					=> '',  
					'pagination_team'  => ''           
					), 
                $atts,'vc_grassyTeam'
           )
        );

	
        $a = shortcode_atts(array(
            'screenshots' => 'screenshots',
        ), $atts);

        $img = wp_get_attachment_image_src($a["screenshots"], "large");
        $imgSrc = $img[0];
		
		//extract content
		$atts['content'] = $content;

		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts ); 

		$owl_data = array( 
			'nav'                => ( $slider_nav === 'true' ) ? true : false,
			'dots'               => ( $slider_dots === 'true' ) ? true : false,
			'autoplay'           => ( $slider_autoplay === 'true' ) ? true : false,
			'autoplayTimeout'    => $slider_interval,
			'autoplaySpeed'      => $slider_autoplay_speed,
			'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true : false,
			'loop'               => ( $slider_loop === 'true' ) ? true : false,
			'margin'             => 35,
			'responsive'         => array(
				'0'    => array( 'items' => $col_mobile ),
				'576'  => array( 'items' => $col_xs ),
				'768'  => array( 'items' => $col_sm ),
				'992'  => array( 'items' => $col_md ),
				'1200' => array( 'items' => $col_lg ),
				)				
			);
		$owl_data = json_encode( $owl_data );          

		global $medvill_option;

        if($type == 'Slider'){

		$html='<div class="rs-team '.$slider_style.'">
		<div class="team-carousel owl-carousel owl-navigation-yes" data-carousel-options="'.esc_attr( $owl_data ).'">';		
		$post_title_show='';
		$degination='';
		$description_team='';
			
        //******************//
        // query post
        //******************//
        $cat;
        $arr_cats=array();
        $arr= explode(',', $cat);  

			for ($i=0; $i < count($arr) ; $i++) { 
           	//$cats = get_term_by('slug', $arr[$i], $taxonomy);
           	// if(is_object($cats)):
           	$arr_cats[]= $arr[$i];
           	//endif;
        }  

		if(empty($cat)){
        	$best_wp = new wp_Query(array(
					'post_type' => 'teams',
					'posts_per_page' =>$team_per,
					
			));	  
        }   
        else{
        	$best_wp = new wp_Query(array(
					'post_type' => 'teams',
					'posts_per_page' =>$team_per,
					'tax_query' => array(
				        array(
				            'taxonomy' => 'team-category',
				            'field' => 'slug', //can be set to ID
				            'terms' => $arr_cats//if field is ID you can reference by cat/term number
				        ),
				    )
			));	  
        }  
		while($best_wp->have_posts()): $best_wp->the_post();
		   $post_title= get_the_title($best_wp->ID);
		   
		    if($title!='No'){
		   		 $post_title_show= get_the_title($best_wp->ID);
			}		
					
			$post_img_url  = get_the_post_thumbnail_url($best_wp->ID,'full');
			$post_img_url2 = get_the_post_thumbnail_url($best_wp->ID,'medvill_team_slider_img'); 
			$post_url      = get_post_permalink($best_wp->ID); 
			
			
		    $designation = get_post_meta( get_the_ID(), 'team_desination', true );	


			
		    
			if($description!='No'){
		   		$description_team = get_post_meta( get_the_ID(), 'description', true );
			}
		   
			//retrive social icon values
			
			$facebook       = get_post_meta( get_the_ID(), 'facebook', true );
			$twitter        = get_post_meta( get_the_ID(), 'twitter', true );
			$google_plus    = get_post_meta( get_the_ID(), 'google_plus', true );
			$linkedin       = get_post_meta( get_the_ID(), 'linkedin', true );		 
			
			
			$fb             ='';
			$tw             ='';
			$gp             ='';
			$ldin           ='';
			
			if($facebook    !=''){
			$fb             ='<a href="'.$facebook.'" class="social-icon"><i class="fa fa-facebook"></i></a> ';
			}
			if($twitter     !=''){
			$tw             ='<a href="'.$twitter.'" class="social-icon"><i class="fa fa-twitter"></i></a>';
			}
			if($google_plus !=''){
			$gp             ='<a href="'.$google_plus.'" class="social-icon"><i class="fa fa-google-plus"></i></a> ';
			}
			if($linkedin    !=''){
			$ldin           ='<a href="'.$linkedin.'" class="social-icon"><i class="fa fa-linkedin"></i></a>';
			}
			$degination_show3 = '<div class="designation">'.get_the_term_list( $best_wp->ID, 'team-category', ' ', ', ').'</div>';	

			$team_normal_text = '<h3 class="team-name"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>';



			if ($slider_style == 'team-slider-style2') {
				$html .='<div class="team-item-wrap">
				    <div class="team-img">
					    <div class="team-img-sec">
					        <img src="'.$post_img_url.'" alt="'.$post_title.'" />  
					        <div class="normal-text text-center">
					            '.$team_normal_text.'
					            <div class="cat-team nolink">'.$designation.'</div>
						        <div class="team-social">
									'.$fb.'
									'.$gp.'
									'.$tw.'
									'.$ldin.'
						        </div>
					        </div>	
			            </div>
				    </div>				    
				</div>';
			}

			else if($slider_style == 'team-slider-style3') {
				$html .='<div class="rs-team-grid rs-team team-style5">
					<div class="team-item">
							<div class="team-item-inner">
								<a href="'.$post_url.'">

									<img src="'.$post_img_url.'" alt="'.$post_title.'" />
								</a>
								<div class="normal-text">
									<span class="person-name"><a href="'.$post_url.'">'.$post_title_show.'</a></span>
									<div class="designation nolink">'.$designation.'</div>
									<p class="team-text">'.$description_team.'</p>
									<div class="social-icons">
										'.$fb.'
										'.$gp.'
										'.$tw.'
										'.$ldin.'
							        </div>
								</div>
							</div>
					  	</div>
					</div>';
			}

			else if($slider_style == 'team-slider-style4') {
				$html .='<div class="rs-team-grid rs-team team-style4">
					<div class="team-item">
							<div class="team-item-inner">
								<a href="'.$post_url.'">
									<img src="'.$post_img_url.'" alt="'.$post_title.'" />
								</a>
								<div class="normal-text">
									<span class="person-name"><a href="'.$post_url.'">'.$post_title_show.'</a></span>
									<div class="designation">'.$designation.'</div>								
									<div class="social-icons">
										'.$fb.'
										'.$gp.'
										'.$tw.'
										'.$ldin.'
							        </div>
								</div>
							</div>
					  	</div>
					</div>';
			}

			else {
				$html .='<div class="team-item">
	                    <div class="team-img text-center">
	                        <a href="'.$post_url.'">
								<img src="'.$post_img_url.'" alt="'.$post_title.'" />
							</a>
	                    </div>
	                    <div class="detail-part">
	                        <div class="author fly">
	                            <h4 class="name mb-7"><a href="'.$post_url.'">'.$post_title_show.'</a></h4>
	                            <span class="designation">'.$designation.'</span>
	                        </div>
	                        <div class="social-links fly">
	                            <ul>
	                                <li>'.$gp.'</li>
	                                <li>'.$tw.'</li> 
	                                <li>'.$ldin.'</li>
	                                <li>'.$fb.'</li>
	                            </ul>
	                        </div>
	                    </div>
	                </div>';
			}				 	
			
		endwhile; 
       	wp_reset_query();
		$html .='</div>
	   <div>
	 </div>
	</div>'
	;
    return $html; 
    }



    if($type == 'list'){

    	$html='<div class="rs-team-grid rs-team" id="team-list-style">
		<div class="row">';		
		$post_title_show='';		
		$description_team='';
			
        //******************//
        // query post
        //******************//
        $cat;
        $arr_cats=array();
        $arr= explode(',', $cat);  

			for ($i=0; $i < count($arr) ; $i++) { 
           	//$cats = get_term_by('slug', $arr[$i], $taxonomy);
           	// if(is_object($cats)):
           	$arr_cats[]= $arr[$i];
           	//endif;
        }

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		if(empty($cat)){
        	$best_wp = new wp_Query(array(
					'post_type' => 'teams',
					'posts_per_page' =>$team_per,
					'paged' => $paged					
			));	  
        }   
        else{
        	$best_wp = new wp_Query(array(
					'post_type' => 'teams',
					'posts_per_page' =>$team_per,
					'paged' => $paged,
					'tax_query' => array(
				        array(
				            'taxonomy' => 'team-category',
				            'field' => 'slug', //can be set to ID
				            'terms' => $arr_cats//if field is ID you can reference by cat/term number
				        ),
				    )
			));	  
        }  
		while($best_wp->have_posts()): $best_wp->the_post();
		   $post_title= get_the_title($best_wp->ID);
		   
		    if($title!='No'){
		   		 $post_title_show= get_the_title($best_wp->ID);
			}		
				

		    $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');


		    $post_url=get_post_permalink($best_wp->ID); 
			
			
		    $designation = get_post_meta( get_the_ID(), 'team_desination', true );
		

		    $description_team        = unitek_custom_excerpt($excerpt_limit); 
			if($description!='No'){
		    	$description_team = unitek_custom_excerpt($excerpt_limit);
			}
			$description_team	= unitek_custom_excerpt($excerpt_limit);
		   
			//retrive social icon values			
			$facebook    = get_post_meta( get_the_ID(), 'facebook', true );
			$twitter     = get_post_meta( get_the_ID(), 'twitter', true );
			$google_plus = get_post_meta( get_the_ID(), 'google_plus', true );
			$linkedin    = get_post_meta( get_the_ID(), 'linkedin', true );
			$show_phone  = get_post_meta( get_the_ID(), 'phone', true );
			$show_email  = get_post_meta( get_the_ID(), 'email', true );			
			$fb='';
			$tw='';
			$gp='';
			$ldin='';
			$phn='';
			$mail='';


			$phn_text = __( 'Phone: ','medvill' );
			$mail_text = __( 'Email: ','medvill' );


		

			if($show_phone!=''){
				$phn ='<div class="phone"><span><i class="fa flaticon-call"></i> </span>'.$show_phone.'</div>';
			}

			if($show_email!=''){
				$mail ='<div class="phone"><span><i class="glyph-icon flaticon-email"> </i></span><a href="mailto:'.$show_email.'">'.$show_email.'</a></div>';
			}

			if($facebook!=''){
				$fb='<a href="'.$facebook.'" class="social-icon"><i class="fa fa-facebook"></i></a> ';
			}
			if($twitter!=''){
				$tw='<a href="'.$twitter.'" class="social-icon"><i class="fa fa-twitter"></i></a>';
			}
			if($google_plus!=''){
				$gp='<a href="'.$google_plus.'" class="social-icon"><i class="fa fa-google-plus"></i></a> ';
			}
			if($linkedin!=''){
				$ldin='<a href="'.$linkedin.'" class="social-icon"><i class="fa fa-linkedin"></i></a>';
			}

			$team_normal_text = '<h2 class="team-name"><a href="'.$post_url.'">'.$post_title_show.'</a></h2>';

			$degination_show3 = get_the_term_list( $best_wp->ID, 'team-category', ' ', ', ');


	
			$html .='<div class="col-md-12">	
				<div class="team-item-wrap">
				    <div class="team-img">
				    	<div class="row rs-vertical-middle">
				    		<div class="col-md-4">
							    <div class="team-img-sec">
							        <a href="'.$post_url.'">
							        	<img src="'.$post_img_url.'" alt="'.$post_title.'" />  
							        </a>
					            </div>

				            </div>
				            <div class="col-md-8">
					            <div class="wrap-text">
							        <div class="normal-text">
							            '.$team_normal_text.'
							            <div class="social-info">
							            '.$mail.'
							            '.$phn.'
							            </div>

							            <div class="team-social">			  
					                  	  '.$fb.'
					                	  '.$gp.'
					                	  '.$tw.'
					                	  '.$ldin.'	
					                  	</div>
							        </div>
							        <p class="team-desc">'.$description_team.'</p>';

						        $html .='</div>
						    </div>				    
					    </div>				    
				    </div>				    
				</div>

			</div>';

		endwhile; 
       	wp_reset_query();
		$html .='</div>
	   <div>
	 </div>
	</div>'
	;

		$paginaiton = paginate_links( array(
			'total' => $best_wp->max_num_pages
		));
		if( $paginaiton && $pagination_team == 'yes' ){
			    $pagination_page = paginate_links( array(
			    	'total' => $best_wp->max_num_pages
			    ));
			$html .=  '<div class="pagination-area pagination-gap"><div class="nav-links">'.$pagination_page.'</div></div>';  
		}
    	return $html; 
	}


	if($type == 'Grid'){
		//Slect grid layout
		 $team_col_grid ='';		
		//echo $team_col;
        if($team_col == '2 Column'){
        	$team_col_grid = 6;
        }
        if($team_col == '3 Column'){
        	$team_col_grid = 4;
        }
        if($team_col == '4 Column'){
        	$team_col_grid = 3;
        }
        if($team_col == '6 Column'){
        	$team_col_grid = 2;
        }
        if($team_col == 'Full Width'){
        	$team_col_grid = 12;
        }

        $html='<div class="rs-team-grid rs-team '.$grid_style.'">
		<div class="row">';		
		$post_title_show='';		
		$description_team='';
			
        //******************//
        // query post
        //******************//
        $cat;
        $arr_cats=array();
        $arr= explode(',', $cat);  

			for ($i=0; $i < count($arr) ; $i++) { 
           	//$cats = get_term_by('slug', $arr[$i], $taxonomy);
           	// if(is_object($cats)):
           	$arr_cats[]= $arr[$i];
           	//endif;
        }

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		if(empty($cat)){
        	$best_wp = new wp_Query(array(
					'post_type' => 'teams',
					'posts_per_page' =>$team_per,
					'paged' => $paged					
			));	  
        }   
        else{
        	$best_wp = new wp_Query(array(
					'post_type' => 'teams',
					'posts_per_page' =>$team_per,
					'paged' => $paged,
					'tax_query' => array(
				        array(
				            'taxonomy' => 'team-category',
				            'field' => 'slug', //can be set to ID
				            'terms' => $arr_cats//if field is ID you can reference by cat/term number
				        ),
				    )
			));	  
        }  
		while($best_wp->have_posts()): $best_wp->the_post();
		   $post_title= get_the_title($best_wp->ID);
		   
		    if($title!='No'){
		   		 $post_title_show= get_the_title($best_wp->ID);
			}		
				

		    $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');


		    $post_url=get_post_permalink($best_wp->ID); 
			
		

		   $designation  = get_post_meta( get_the_ID(), 'team_desination', true );	   
		
		    
			if($description!='No'){
		    	$description_team = get_post_meta( get_the_ID(), 'description', true );
			}

		   
			
			$show_phone  = get_post_meta( get_the_ID(), 'phone', true );
			$show_email  = get_post_meta( get_the_ID(), 'email', true );
		
		
			if($facebook!=''){
				$fb='<a href="'.$facebook.'" class="social-icon"><i class="fa fa-facebook"></i></a> ';
			}
			if($twitter!=''){
				$tw='<a href="'.$twitter.'" class="social-icon"><i class="fa fa-twitter"></i></a>';
			}
			if($google_plus!=''){
				$gp='<a href="'.$google_plus.'" class="social-icon"><i class="fa fa-google-plus"></i></a> ';
			}
			if($linkedin!=''){
				$ldin='<a href="'.$linkedin.'" class="social-icon"><i class="fa fa-linkedin"></i></a>';
			}


			$facebook       = get_post_meta( get_the_ID(), 'facebook', true );
			$twitter        = get_post_meta( get_the_ID(), 'twitter', true );
			$google_plus    = get_post_meta( get_the_ID(), 'google_plus', true );
			$linkedin       = get_post_meta( get_the_ID(), 'linkedin', true );		 
			
			
			$fb             ='';
			$tw             ='';
			$gp             ='';
			$ldin           ='';
			
			if($facebook    !=''){
			$fb             ='<a href="'.$facebook.'" class="social-icon"><i class="fa fa-facebook"></i></a> ';
			}
			if($twitter     !=''){
			$tw             ='<a href="'.$twitter.'" class="social-icon"><i class="fa fa-twitter"></i></a>';
			}
			if($google_plus !=''){
			$gp             ='<a href="'.$google_plus.'" class="social-icon"><i class="fa fa-google-plus"></i></a> ';
			}
			if($linkedin    !=''){
			$ldin           ='<a href="'.$linkedin.'" class="social-icon"><i class="fa fa-linkedin"></i></a>';
			}

			$team_normal_text = '<h3 class="team-name"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>
			';						
			if ($grid_style == 'team-grid-style2') {
				$html .='<div class="col-lg-'.$team_col_grid.' col-md-6 '.$grid_style.'">	

					<div class="team-item-wrap">
					    <div class="team-img">
						    <div class="team-img-sec">
						        <img src="'.$post_img_url.'" alt="'.$post_title.'" /> 
						        <div class="normal-text text-center">
						            '.$team_normal_text.'

						            <div class="cat-team nolink">'.$designation.'</div>
							        <div class="team-social">
										'.$fb.'
										'.$gp.'
										'.$tw.'
										'.$ldin.'
							        </div>
						        </div>
				            </div>
					    </div>				    
					</div>
				</div>';
			}


			else if($grid_style == 'team-grid-style3') {
				$html .='<div class="col-lg-'.$team_col_grid.' col-md-6 '.$grid_style.'">
				<div class="team-item-wrap">
					    <div class="team-img">
						    <div class="team-img-sec">
						    	<a href="'.$post_url.'">
						        	<img src="'.$post_img_url.'" alt="'.$post_title.'" />
						        </a>
					        	<div class="team-content">
							        '.$team_normal_text.'
							        <p class="team-desc">'.$description_team.'</p>				                
				                  	<div class="team-social">			  
				                  	  '.$fb.'
				                	  '.$gp.'
				                	  '.$tw.'
				                	  '.$ldin.'	
				                  	</div>
			                  	</div>
				            </div>
					    </div>				    
				    </div>				    
				</div>';
			}



			elseif($grid_style == 'team-style4') {
			$html .='<div class="team-item col-lg-'.$team_col_grid.' col-md-6">
					<div class="team-wrapper">
					    <div class="team_photo">
					        <a href="'.$post_url.'">
								<img src="'.$post_img_url.'" class="img_team" alt="'.$post_title.'" />
					        </a>
					    </div>
					    <div class="team_desc">
					        <div class="name">
					        	<a href="'.$post_url.'">'.$post_title_show.'</a>					            
					        </div>
					        <span class="team-title">'.$designation.'</span>

					        <div class="team-social">
								'.$fb.'
								'.$gp.'
								'.$tw.'
								'.$ldin.'
					        </div>
					    </div>
					</div>
			  	</div>';
			}

			elseif( $grid_style =='team-style5' ){	
				$html .='<div class="col-lg-'.$team_col_grid.' col-md-6 '.$grid_style.'">
						<div class="team-item">
							<div class="team-item-inner">
								<a href="'.$post_url.'">
									<img src="'.$post_img_url.'" alt="'.$post_title.'" />
								</a>
								<div class="normal-text">
									<span class="person-name"><a href="'.$post_url.'">'.$post_title_show.'</a></span>
									<span class="team-title">'.$designation.'</span>
									<p class="team-text">'.$description_team.'</p>
									<div class="social-icons">
										'.$fb.'
										'.$gp.'
										'.$tw.'
										'.$ldin.'
							        </div>
								</div>
							</div>
					  	</div>
		  		</div>';
			}

			else {
				$html .='<div class="col-lg-'.$team_col_grid.' col-md-6">
					<div class="team-item">
	                    <div class="team-img text-center">
	                        <a href="'.$post_url.'">
								<img src="'.$post_img_url.'" alt="'.$post_title.'" />
							</a>
	                    </div>
	                    <div class="detail-part">
	                        <div class="author fly">
	                            <h4 class="name mb-7"><a href="'.$post_url.'">'.$post_title_show.'</a></h4>
	                            <span class="designation">'.$designation.'</span>
	                        </div>
	                        <div class="social-links fly">
	                            <ul>
	                                <li>'.$fb.'</li>
	                                <li>'.$gp.'</li>
	                                <li>'.$tw.'</li> 
	                                <li>'.$ldin.'</li>
	                            </ul>
	                        </div>
	                    </div>
	                </div>
				</div>';

			}				 	
			
		endwhile; 
       	wp_reset_query();
		$html .='</div>
	   <div>
	 </div>
	</div>'
	;


	$paginaiton = paginate_links( array(
		'total' => $best_wp->max_num_pages
	));
	if( $paginaiton && $pagination_team == 'yes' ){
		    $pagination_page = paginate_links( array(
		    	'total' => $best_wp->max_num_pages
		    ));
		$html .=  '<div class="pagination-area pagination-gap"><div class="nav-links">'.$pagination_page.'</div></div>';  
	}

        return $html; 
	}
}

add_shortcode( 'vc_grassyTeam', 'vc_grassyTeam_html' );