<?php
/*
Element Description: Rs Team Box
*/
     
    // Element Mapping
     function vc_portfolio_slider_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
        $category_dropdown = array( __( 'All Categories', 'rsaddon' ) => '0' );	
        $args = array(
                    'taxonomy' => array('portfolio-category'),//ur taxonomy
                    'hide_empty' => false,                  
            );

		$terms_= new WP_Term_Query( $args );
		foreach ( (array)$terms_->terms as $term ) {
			$category_dropdown[$term->name] = $term->slug;		
		}

         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Portfolio Slider', 'rsaddon'),
                'base' => 'vc_rsPortfolioslider',
                'description' => __('Portfolio Information', 'rsaddon'), 
                'category' => __('by AuburnForest', 'rsaddon'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(

                	array(
                		"type" => "dropdown",
                		"heading" => __("Style", 'rsaddon'),
                		"param_name" => "slider_style",
                		"value" => array(	
                			__('Style 1', 'rsaddon') => "style1", 
                			__('Style 2', 'rsaddon') => "style2",

                		),
                		'description' => __( 'Select your portfolio slider style here.', 'rsaddon' ),                		
                	),	
                         
                    array(
						"type" => "dropdown",
						"heading" => __("Show title", "rsaddon"),
						"param_name" => "title",
						"value" => array(							    						
							'Yes' => "Yes", 
							'No' => "No",																																										
						),	
					),                     
           			
           			array(
           				"type"       => "dropdown",
           				"heading"    => __("Show  Category", 'rsaddon'),
           				"param_name" => "port_cat",
           				"value" 	 => array(
           					'No'  => "",											
           					'Yes' => "yes", 
           				),
           			),
					
					array(
						"type" => "dropdown",
						"heading" => __("Show Short Description", 'rsaddon'),
						"param_name" => "description",
						"value" => array(					
							'Yes' => "Yes", 
							'No' => "No", 																																															
						),
					),

					
					array(
						"type" => "textfield",
						"heading" => __("Portfolio Per Pgae", "rsaddon"),
						"param_name" => "team_per",
						'value' =>"6",
						'description' => __( 'You can write how many team member show. ex(2)', 'rsaddon' ),					
					),	


					array(
					"type" => "dropdown_multi",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Categories", 'rsaddon' ),
					"param_name" => "cat",
					'value' => $category_dropdown,
					),


				
					array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 1199px )", 'rsaddon' ),
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
					"group" 	  => __( "Slider Options", 'rsaddon' ),
					
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 991px )", 'rsaddon' ),
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
					"group" 	  => __( "Slider Options", 'rsaddon' ),
					
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Tablets > 767px )", 'rsaddon' ),
					"param_name" => "col_sm",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "2",
					"group" 	  => __( "Slider Options", 'rsaddon' ),
					
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Phones < 768px )", 'rsaddon' ),
					"param_name" => "col_xs",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "1",
					"group" 	  => __( "Slider Options", 'rsaddon' ),
					
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Small Phones < 480px )", 'rsaddon' ),
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
					"group" 	  => __( "Slider Options", 'rsaddon' ),
					
					),

					array(
						"type" => "dropdown",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Navigation Dots", 'rsaddon' ),
						"param_name" => "slider_dots",
						"value" => array(
							__( 'Disabled', 'rsaddon' ) => 'false',
							__( 'Enabled', 'rsaddon' )  => 'true',
							),
						"description" => __( "Enable or disable navigation dots. Default: Disable", 'rsaddon' ),
						"group" => __( "Slider Options", 'rsaddon' ),					
					
					),

					array(
						"type" => "dropdown",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Navigation Nav", 'rsaddon' ),
						"param_name" => "slider_nav",
						"value" => array(
							__( 'Disabled', 'rsaddon' ) => 'false',
							__( 'Enabled', 'rsaddon' )  => 'true',
							),
						"description" => __( "Enable or disable navigation nave. Default: Disable", 'rsaddon' ),
						"group" => __( "Slider Options", 'rsaddon' ),					
					
					),

				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay", 'rsaddon' ),
					"param_name" => "slider_autoplay",
					"value" => array( 
						__( "Enable", "rsaddon" )  => 'true',
						__( "Disable", "rsaddon" ) => 'false',
						),
					"description" => __( "Enable or disable autoplay. Default: Enable", 'rsaddon' ),
					"group" => __( "Slider Options", 'rsaddon' ),
					
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Stop on Hover", 'rsaddon' ),
					"param_name" => "slider_stop_on_hover",
					"value" => array( 
						__( "Enable", "rsaddon" )  => 'true',
						__( "Disable", "rsaddon" ) => 'false',
						),
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Stop autoplay on mouse hover. Default: Enable", 'rsaddon' ),
					"group" => __( "Slider Options", 'rsaddon' ),
					
					),

				array(
					"type" 		  => "dropdown",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Interval", 'rsaddon' ),
					"param_name"  => "slider_interval",
					"value" 	  => array( 
						__( "5 Seconds", "rsaddon" )  => '5000',
						__( "4 Seconds", "rsaddon" )  => '4000',
						__( "3 Seconds", "rsaddon" )  => '3000',
						__( "2 Seconds", "rsaddon" )  => '4000',
						__( "1 Seconds", "rsaddon" )  => '1000',
						),
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds", 'rsaddon' ),
					"group" 	  => __( "Slider Options", 'rsaddon' ),
					
				),
				array(
					"type"		  => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Slide Speed", 'rsaddon' ),
					"param_name"  => "slider_autoplay_speed",
					"value" 	  => 2000,
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Slide speed in milliseconds. Default: 200", 'rsaddon' ),
					"group" 	  => __( "Slider Options", 'rsaddon' ),
					
				),	
				array(
					"type" => "textfield",
					"heading" => __("Read More Text", 'sikkha'),
					"param_name" => "more_text",
					'description' => __( 'Type your read more text here', 'sikkha' ),
					"dependency" => Array('element' => 'readmore_type', 'value' => array('rm_text')),
				),  
				array(
					"type" 		 => "dropdown",
					"holder" 	 => "div",
					"class" 	 => "",
					"heading" 	 => __( "Loop", 'rsaddon' ),
					"param_name" => "slider_loop",
					"value" 	 => array( 
						__( "Enable", "rsaddon" )  => 'true',
						__( "Disable", "rsaddon" ) => 'false',
						),
					"description"=> __( "Loop to first item. Default: Enable", 'rsaddon' ),
					"group" 	 => __( "Slider Options", 'rsaddon' ),
					
				),

					array(
					'type' => 'css_editor',
					'heading' => __( 'CSS box', 'rsaddon' ),
					'param_name' => 'css',
					'group' => __( 'Design Options', 'rsaddon' ),
				),            
                        
                ),
				
					
            )
        );                                   
    }
     
   add_action( 'vc_before_init', 'vc_portfolio_slider_mapping' );
     
    // Element HTML
     function vc_portfolioslider_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'title'                 => '',
					'slider_style'          => '',
					'cat'                   => '',	
					'port_cat'              => '',	
					'description'           => '',	
					'more_text'           	=> '',	
					'team_per'              => '6',				
					'icon_fontawesome'      => 'fa fa-users',					
					'col_lg'                => '3',
					'col_md'                => '3',
					'col_sm'                => '2',
					'col_xs'                => '1',
					'col_mobile'            => '1',
					'slider_nav'            => 'false',
					'slider_dots'           => 'false',
					'slider_autoplay'       => 'true',
					'slider_stop_on_hover'  => 'true',
					'slider_interval'       => '5000',
					'slider_autoplay_speed' => '2000',
					'slider_loop'           => 'true',				
					'css'                   => ''            
                ), 
                $atts,'vc_rsPortfolioslider'
           )
        );
	
        $a = shortcode_atts(array(
            'screenshots' => 'screenshots',
        ), $atts);

        $img = wp_get_attachment_image_src($a["screenshots"], "large");
        $imgSrc = $img[0];
		
		//extract content
		$atts['content'] = $content;

		//extact icon 
		$iconClass = isset( ${'icon_fontawesome'} ) ? esc_attr( ${'icon_fontawesome'} ) : 'fa fa-users';
		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts ); 

		$randclass = substr(md5(mt_rand()), 0, 7);
		$portfolio_item_data = array( 	
			'slidesToShow'    => $col_lg,
			'nav'             => ( $slider_nav === 'true' ) ? true : false,
			'autoplay'        => ( $slider_autoplay === 'true' ) ? true : false,
			'autoplaySpeed'   => $slider_autoplay_speed,
			'pauseOnHover'    => ( $slider_stop_on_hover === 'true' ) ? true : false,
			'slider_dots'     => ( $slider_dots === 'true' ) ? true : false,
			'col_lg'          => $col_lg,
			'col_md'          => $col_md,
			'col_sm'          => $col_sm,
			'col_xs'          => $col_xs,
			'col_mobile'      => $col_mobile,	
		);
		wp_localize_script( 'pivotal-main', 'portfolio_data', $portfolio_item_data );   	 


		$taxonomy = "portfolio-category";

		if( $slider_style == 'style2'){

		$html='<div class="rs-project-section '.$slider_style.'">
		<div class="portfolio-slider-data" id="'.esc_attr( $randclass ).'">';		
		$post_title_show='';
		$degination='';
		$description_team='';
        //******************//
        // query post
        //******************//

        	 	$arr_cats=array();
                $arr= explode(',', $cat);
					for ($i=0; $i < count($arr) ; $i++) { 
	               	//$cats = get_term_by('slug', $arr[$i], $taxonomy);
	               	// if(is_object($cats)):
	               	$arr_cats[]= $arr[$i];
	               	//endif;
	            }	            
			   $best_wp = new wp_Query(array(
					'post_type' => 'portfolios',
					'posts_per_page' =>$team_per,
					'tax_query' => array(
				        array(
				            'taxonomy' => 'portfolio-category',
				            'field' => 'slug', //can be set to ID
				            'terms' => $arr_cats//if field is ID you can reference by cat/term number
				        ),
				    )
				));				     
		
			while($best_wp->have_posts()): $best_wp->the_post();
			   $post_title= get_the_title($best_wp->ID);
			   
			    if($title!='No'){
			   		 $post_title_show= get_the_title($best_wp->ID);
				}		
						
			    $post_img_url = get_the_post_thumbnail($best_wp->ID,'pivotal_portfolio_slider');
			    $post_url=get_post_permalink($best_wp->ID); 
				
				
				$cats_show = get_the_term_list( $best_wp->ID, $taxonomy, ' ', '<span class="separator">,</span> ');	
				
				$cats_shows = '';

				if('yes'== $port_cat){
					$cats_shows = '<span>'.$cats_show.'</span>';
				}

				if($description!='No'){
			    	$description_team = get_post_meta( get_the_ID(), 'description', true );
				}
			   				
				//retrive social icon values
				
				$html .='<div class="project-item">
                        '.$post_img_url.'
                        <div class="project-content">
                            <div class="p-icon">
                                <a href="'.$post_url.'"><i class="glyph-icon flaticon-next"></i></a>
                            </div>
                            <div class="title">
                                '.$cats_shows.'
                                <a href="'.$post_url.'">'.$post_title_show.'</a>
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
}	
else{        
	$html='<div class="rs-portfolio '.$slider_style.'">
	<div class="portfolio-slider-data" id="'.esc_attr( $randclass ).'">';	;		
	$post_title_show='';
	$degination='';
	$description_team='';
    //******************//
    // query post
    //******************//

    	 	$arr_cats=array();
            $arr= explode(',', $cat);
				for ($i=0; $i < count($arr) ; $i++) { 
               	//$cats = get_term_by('slug', $arr[$i], $taxonomy);
               	// if(is_object($cats)):
               	$arr_cats[]= $arr[$i];
               	//endif;
            }	            
		   $best_wp = new wp_Query(array(
				'post_type' => 'portfolios',
				'posts_per_page' =>$team_per,
				'tax_query' => array(
			        array(
			            'taxonomy' => 'portfolio-category',
			            'field' => 'slug', //can be set to ID
			            'terms' => $arr_cats//if field is ID you can reference by cat/term number
			        ),
			    )
			));				     
	
		while($best_wp->have_posts()): $best_wp->the_post();
		   $post_title= get_the_title($best_wp->ID);
		   
		    if($title!='No'){
		   		 $post_title_show= get_the_title($best_wp->ID);
			}		
					
		    $post_img_url = get_the_post_thumbnail($best_wp->ID,'pivotal_portfolio_slider');
		    $post_url=get_post_permalink($best_wp->ID); 

			$cats_show = get_the_term_list( $best_wp->ID, $taxonomy, ' ', '<span class="separator">,</span> ');	
			
			$cats_shows = '';
			
			if('yes'== $port_cat){
				$cats_shows = '<div class="categories">'.$cats_show.'</div>';
			}
			
			if($description!='No'){
		    $description_team = get_post_meta( get_the_ID(), 'description', true );
			}
		   				
			//retrive social icon values
			
			$html .='<div class="portfolio-slider">
			    <div class="portfolio-item content-overlay">
                    <div class="portfolio-img">
                       '.$post_img_url.'                       
                        <div class="portfolio-content"> 
		                	'.$cats_shows.'
                            <h3 class="p-title"><a href="'.$post_url.'">'.$post_title_show.'</a></h3>
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
}	
    return $html; 
 
}

add_shortcode( 'vc_rsPortfolioslider', 'vc_portfolioslider_html' );