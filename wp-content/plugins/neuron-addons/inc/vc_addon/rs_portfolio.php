<?php
/*
Element Description: Portfolio Box
*/
     // Element Mapping
    function vc_Portfolio_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
        
        $category_dropdown = array( __( 'All Categories', 'rsaddon' ) => '0' );	
        $args = array(
            'taxonomy' => array('portfolio-category'),//ur taxonomy
            'hide_empty' => true,                  
        );

		$terms_= new WP_Term_Query( $args );
		foreach ( (array)$terms_->terms as $term ) {
			$category_dropdown[$term->name] = $term->slug;		
		}

        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Portfolio Box', 'rsaddon'),
                'base' => 'vc_Portfolio',
                'description' => __('Portfolio Box Information', 'rsaddon'), 
                'category' => __('by AuburnForest', 'rsaddon'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(

                    array(
                    	"type" => "dropdown",
                    	"heading" => __("Portfolio Style", "rsaddon"),
                    	"param_name" => "portfolio_style",
                    	"value" => array(		
                    		__("Style 1", "rsaddon") => "1",
                    		__("Style 2", "rsaddon") => "2",
                    		__("Style 3", "rsaddon") => "3",
                    		__("Style 4", "rsaddon") => "4",
                    		__("Style 5", "rsaddon") => "5",
                    	),
                    	"description" => __("Select your portfolio style here", "rsaddon"),                    	
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
						"type" => "dropdown_multi",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Categories", 'rsaddon' ),
						"param_name" => "cat",
						'value' => $category_dropdown,
					),

					array(
						"type" => "dropdown",
						"heading" => __("Show Filter", "rsaddon"),
						"param_name" => "show_filter",
						"value" => array(	
						    						
							'Yes' => "Yes", 
							'No' => "No", 															
						),
					),

					array(
						"type" => "dropdown",
						"heading" => __("Show Categories", "rsaddon"),
						"param_name" => "show_category",
						"value" => array(		
							'Yes' => "yes", 
							'No' => "",
						),
					),

					array(
						"type" => "dropdown",
						"heading" => __("Filter Alignment", "rsaddon"),
						"param_name" => "filter_align",
						"value" => array(
                            'Center' => "Center",		
							'Left' 	 => "Left", 
							'Right'	 => "Right", 
																					
						),
						"dependency" => Array('element' => 'show_filter', 'value' => array('Yes')),						
					),

					array(
						'type' => 'textfield',
						'holder' => 'h3',						
						'heading' => __( 'Filter Default Title', 'rsaddon' ),
						'param_name' => 'filter_title',
						'value' => __( '', 'rsaddon' ),
						'description' => __( 'You can add here filter default title (ex: All Projects)' ),
						'admin_label' => false,
						'weight' => 0,
						'value' => 'All Projects',
						"dependency" => Array('element' => 'show_filter', 'value' => array('Yes')),
					   
					),

					array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'heading' => __( 'View Details Text', 'rsaddon' ),
                        'param_name' => 'view_details',
                        'value' => __( '', 'rsaddon' ),
                        'description' => __( 'View Details Text here', 'rsaddon' ),
                        'admin_label' => false,
                        'weight' => 0,                       
                    ),
             			
             				
					array(
						"type" => "dropdown",
						"heading" => __("Show tagline", "rsaddon"),
						"param_name" => "tagline",
						"value" => array(	
						    						
							'Yes' => "Yes", 
							'No' => "No", 																																															
						),						
					),

					array(
						'type' => 'textfield',
						'holder' => 'h3',						
						'heading' => __( 'Project Per Page', 'rsaddon' ),
						'param_name' => 'per_page',
						'value' => __( '', 'rsaddon' ),
						'description' => __( 'How many project want to show per page', 'rsaddon' ),
						'admin_label' => false,
						'weight' => 0,
						'value' => '9'
					   
					),  
					
					array(
						"type" => "dropdown",
						"heading" => __("How many Column ", "rsaddon"),
						"param_name" => "column",
						"value" => array(							    						
							'Select' => "",
							'Two' => "Two",
							'Four' => "Four", 
							'Three' => "Three",
							'Full' => "Full",
						),
						
					),

					array(
						"type" => "dropdown",
						"heading" => __("How many Item Offset ", "rsaddon"),
						"param_name" => "offset",
						"value" => array(							    						
							'Select' => "",
							'1' => "1",
							'2' => "2", 
							'3' => "3",
						),
						
					),

                    array(
						"type" => "dropdown",
						"heading" => __("Gutter Gap", "rsaddon"),
						"param_name" => "gutter",
						"value" => array(							    						
							'Yes' => "", 
							'No'  => "no",
						),						
					),
						
					array(
						'type' => 'colorpicker',
						'heading' => __( 'View Details color', 'rsaddon' ),
						'param_name' => 'vd_color',
						"value" => '#ffffff', //Default color
						"description" => __( "Choose color", "rsaddon" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					),		
							
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Title color", "rsaddon" ),
						"param_name" => "titlecolor",
						"value" => '#ffffff', //Default color
						"description" => __( "Choose color", "rsaddon" ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),					  
							 
					
					array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Tag line color", "rsaddon" ),
					"param_name" => "linecolor",
					"value" => '#ffffff', //Default  color
					"description" => __( "Choose color", "rsaddon" ),
					'admin_label' => false,
					'weight' => 0,
					'group' => 'Style',
				 ),	
				  array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'js_composer' ),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'rsaddon' ),
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
     add_action( 'vc_before_init', 'vc_Portfolio_mapping' );
     
    // Element HTML
     function vc_Portfolio_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'title'            => '',
					'tagline'          => '',		
					'portfolio_style'  => '1',
					'titlecolor'       => '',
					'view_details'       => '',
					'column'           =>'',
					'offset'           => '',
					'per_page'         => '9',
					'el_class'         => '',
					'vd_color'         => '#ffffff',
					'css'              => '',
					'cat'              => '',
					'filter_align'     => 'center',
					'gutter'           => '',
					'show_filter'      => '',
					'show_category'    => 'yes',
					'filter_title'     =>  'All Projects'
					
                ), 
                $atts,'vc_Portfolio'
           )
        );
	
        $a = shortcode_atts(array(
            'screenshots' => 'screenshots',
        ), $atts);

        $img = wp_get_attachment_image_src($a["screenshots"], "large");

        $gutter_gap = '';
        $gutter_gap = ($gutter !== '') ? ' gutter-no-gap' : '';

        $imgSrc = $img[0];

        $taxonomy = '';
		
		//extract content
		$atts['content'] = $content;
		//extact icon 		
		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
		 //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
  
		
		$col_grid='';
		$col_group='';
		$col_full='';
		$col_filter='';
		$col_grid=$column;
		
		if($col_grid =='Two'){
			$col_group = 6;
		}
		if($col_grid =='Three'){
			$col_group = 4;
		}
		
		if($col_grid == 'Four'){
			$col_group = 3;
		}
		
		if($col_grid == 'Full'){
			$col_group=3;
			$col_full='full-grid';		
			$col_filter='col-filter';		
		}
		
        //******************//
        // query post
        //******************//
        $all_project = $filter_title;


        $html ='<div class="rs-portfolio-style'.$portfolio_style.$gutter_gap.' '.$css_class_custom.' '.$col_filter.'">
		<div class="'.$css_class.'">';
        // Get taxonomy form portfolio
       
        if($show_filter !='No'):
		    $html .= '<div class="portfolio-filter  filter-'.strtolower($filter_align).'">
		                <button class="active" data-filter="*">'.$all_project.'</button>'; 
		                $taxonomy = "portfolio-category";
		                $arr= explode(',', $cat);

						for ($i=0; $i < count($arr) ; $i++) { 
		               	 $cats = get_term_by('slug', $arr[$i], $taxonomy);

		               	 if(is_object($cats)):
		               	 	$slug= '.filter_'.$cats->slug;

		               	 	$html .= '<button data-filter="'.$slug.'">'.$cats->name.'</button>';	
		               	 endif;
		               }			

		            
		    $html .=' </div>'; 
		endif;
		
        $html .='<div class="grid"> <div class="row">'; 
        	
                $arr_cats = array();
                $arr= explode(',', $cat);
					for ($i=0; $i < count($arr) ; $i++) { 
	               	//$cats = get_term_by('slug', $arr[$i], $taxonomy);
	               	// if(is_object($cats)):
	               	$arr_cats[]= $arr[$i];
	               	//endif;
	            }

	      		if(empty($cat)){
		        	$best_wp = new wp_Query(array(
							'post_type' => 'portfolios',
							'posts_per_page' =>$per_page,
							'offset' => $offset
							
					));	  
		        }

		        else{
	            
			    $best_wp = new wp_Query(array(
						'post_type' => 'portfolios',
						'posts_per_page' =>$per_page,
						'offset' => $offset,					
						'tax_query' => array(
					        array(
					            'taxonomy' => 'portfolio-category',
					            'field' => 'slug', //can be set to ID
					            'terms' => $arr_cats//if field is ID you can reference by cat/term number
					        ),
					    )
					));
				}	
       			if( $best_wp->have_posts() ): while( $best_wp->have_posts() ) : $best_wp->the_post();
				$termsArray = get_the_terms( $best_wp->ID, "portfolio-category" );  //Get the terms for this particular item
				$termsString = ""; //initialize the string that will contain the terms
				$termsSlug = "";

				 foreach ( $termsArray as $term ) { // for each term 
				 	$termsString .= 'filter_'.$term->slug.' '; //create a string that has all the slugs 
					$termsSlug .= $term->name;
				 }

				$cats_show = get_the_term_list( $best_wp->ID, 'portfolio-category', ' ', ', ');
				
			   $post_title = get_the_title($best_wp->ID);
			  
			    if($title!='No'){
			   		 $post_title_show = get_the_title($best_wp->ID);

				}	
				else{
					 $post_title_show = '';
				}			
			    $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
			    $post_url=get_post_permalink($best_wp->ID); 
				if($tagline!='No'){
			   		 $post_tagline = get_post_meta( get_the_ID(), 'tagline', true );
				}
				else{
					 $post_tagline='';
					}

				$cats_show = get_the_term_list( $best_wp->ID, 'portfolio-category', ' ', '<span class="separator">,</span> ');

				$paginate = paginate_links( array(
					'total' => $best_wp->max_num_pages
				));
					
				
						
				$html .='
				
				<div class="col-lg-'.$col_group.' '.$col_full.' col-md-6 grid-item mb-30 '.$termsString.'">
                            <div class="portfolio-item content-overlay">
                                <div class="portfolio-img">

                                   <img src="'.$post_img_url.'" alt="'.$post_title.'" />';

                                   	if ($portfolio_style !== '1') {
	                                    $html .='<a style="color: '.$vd_color.'; border-color: '.$vd_color.';" class="read_more" href="'.$post_url.'">
	                                        '.$view_details.'
	                                    </a>';
                                   	}

                                $html .='</div>
                                <div class="portfolio-content">
                                    <div class="vertical-middle">
                                        <div class="vertical-middle-cell">';
                                           	if ($portfolio_style == '1') {
        	                                    $html .='<a style="color: '.$vd_color.'" class="read_more" href="'.$post_url.'">
        	                                        '.$view_details.'
        	                                    </a>';
                                           	}
                                            $html .='<h4 class="p-title"><a href="'.$post_url.'">'.$post_title_show.'</a></h4>';
                                            if ($show_category !== '') {
                                            	$html .='<p class="p-category">'.$cats_show.'</p>';
                                            }
                                        $html .='</div>
                                    </div>
                                </div>
                            </div>
                        </div>';
					
						endwhile; 
				wp_reset_query();
			endif;
			
		$html .= '</div></div>
		</div>
		</div>';



		if( $portfolio_style == '1'){
			$html ='<div class="rs-portfolio '.$css_class_custom.' '.$col_filter.'">
				<div class="'.$css_class.'">';
		        // Get taxonomy form portfolio
		       
		        if($show_filter !='No'):
				    $html .= '<div class="portfolio-filter  filter-'.strtolower($filter_align).'">
				                <button class="active" data-filter="*">'.$all_project.'</button>'; 
				                $taxonomy = "portfolio-category";
				                $arr= explode(',', $cat);

								for ($i=0; $i < count($arr) ; $i++) { 
				               	 $cats = get_term_by('slug', $arr[$i], $taxonomy);

				               	 if(is_object($cats)):
				               	 	$slug= '.filter_'.$cats->slug;

				               	 	$html .= '<button data-filter="'.$slug.'">'.$cats->name.'</button>';	
				               	 endif;
				               }			

				            
				    $html .=' </div>'; 
				endif;
				
		        $html .='<div class="grid"> <div class="row">'; 
		        	
                $arr_cats = array();
                $arr= explode(',', $cat);
					for ($i=0; $i < count($arr) ; $i++) { 
	               	//$cats = get_term_by('slug', $arr[$i], $taxonomy);
	               	// if(is_object($cats)):
	               	$arr_cats[]= $arr[$i];
	               	//endif;
	            }

	      		if(empty($cat)){
		        	$best_wp = new wp_Query(array(
							'post_type' => 'portfolios',
							'posts_per_page' =>$per_page,
							'offset' => $offset
							
					));	  
		        }

		        else{
	            
			    $best_wp = new wp_Query(array(
						'post_type' => 'portfolios',
						'posts_per_page' =>$per_page,
						'offset' => $offset,					
						'tax_query' => array(
					        array(
					            'taxonomy' => 'portfolio-category',
					            'field' => 'slug', //can be set to ID
					            'terms' => $arr_cats//if field is ID you can reference by cat/term number
					        ),
					    )
					));
				}	
       			if( $best_wp->have_posts() ): while( $best_wp->have_posts() ) : $best_wp->the_post();
				$termsArray = get_the_terms( $best_wp->ID, "portfolio-category" );  //Get the terms for this particular item
				$termsString = ""; //initialize the string that will contain the terms
				$termsSlug = "";

				 foreach ( $termsArray as $term ) { // for each term 
				 	$termsString .= 'filter_'.$term->slug.' '; //create a string that has all the slugs 
					$termsSlug .= $term->name;
				 }

				$cats_show = get_the_term_list( $best_wp->ID, 'portfolio-category', ' ', ', ');
				
			   $post_title = get_the_title($best_wp->ID);
			  
			    if($title!='No'){
			   		 $post_title_show = get_the_title($best_wp->ID);

				}	
				else{
					 $post_title_show = '';
				}			
			    $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'af_portfolio_slider');
			    $post_url=get_post_permalink($best_wp->ID); 
				if($tagline!='No'){
			   		 $post_tagline = get_post_meta( get_the_ID(), 'tagline', true );
				}
				else{
					 $post_tagline='';
					}

				$cats_show = get_the_term_list( $best_wp->ID, 'portfolio-category', ' ', '<span class="separator">,</span> ');

				$paginate = paginate_links( array(
					'total' => $best_wp->max_num_pages
				));
					
				
						
				$html .='
				
				<div class="col-lg-'.$col_group.' '.$col_full.' col-md-6 grid-item mb-40 '.$termsString.'">
                    <div class="portfolio-item rs-grid-style1 content-overlay">
	                   <div class="portfolio-slider">
						    <div class="portfolio-item content-overlay">
			                    <div class="portfolio-img">
			                       <img src="'.$post_img_url.'" alt="'.$post_title.'" />                   
			                        <div class="portfolio-content"> ';
			                            $html .='<h4 class="p-title"><a href="'.$post_url.'">'.$post_title_show.'</a></h4>';
			                        $html .='</div>
			                    </div>
			                </div>
						</div>
                    </div>
                </div>';
			
				endwhile; 
				wp_reset_query();
			endif;
			
		$html .= '</div></div>
		</div>
		</div>';
		}

		//portfolio Style 2
		if( $portfolio_style == '2'){

			$html ='<div class="rs-project-section '.$gutter_gap.' '.$css_class_custom.' '.$col_filter.'">
			<div class="'.$css_class.'">';
	        // Get taxonomy form portfolio
	       
	        if($show_filter !='No'):
			    $html .= '<div class="portfolio-filter  filter-'.strtolower($filter_align).'">
			                <button class="active" data-filter="*">'.$all_project.'</button>'; 
			                $taxonomy = "portfolio-category";
			                $arr= explode(',', $cat);

							for ($i=0; $i < count($arr) ; $i++) { 
			               	 $cats = get_term_by('slug', $arr[$i], $taxonomy);

			               	 if(is_object($cats)):
			               	 	$slug= '.filter_'.$cats->slug;

			               	 	$html .= '<button data-filter="'.$slug.'">'.$cats->name.'</button>';	
			               	 endif;
			               }			

			            
			    $html .=' </div>'; 
			endif;
			
	        $html .='<div class="grid"> <div class="row">'; 
	        		$cat;
	                $arr_cats = array();
	                $arr= explode(',', $cat);
						for ($i=0; $i < count($arr) ; $i++) { 
		               	//$cats = get_term_by('slug', $arr[$i], $taxonomy);
		               	// if(is_object($cats)):
		               	$arr_cats[]= $arr[$i];
		               	//endif;
		            }

		      		if(empty($cat)){
			        	$best_wp = new wp_Query(array(
								'post_type' => 'portfolios',
								'posts_per_page' =>$per_page,
								'offset' => $offset
								
						));	  
			        }

			        else{
		            
				    $best_wp = new wp_Query(array(
							'post_type' => 'portfolios',
							'posts_per_page' =>$per_page,
							'offset' => $offset,					
							'tax_query' => array(
						        array(
						            'taxonomy' => 'portfolio-category',
						            'field' => 'slug', //can be set to ID
						            'terms' => $arr_cats//if field is ID you can reference by cat/term number
						        ),
						    )
						));
					}	
	       			if( $best_wp->have_posts() ): while( $best_wp->have_posts() ) : $best_wp->the_post();
					$termsArray = get_the_terms( $best_wp->ID, "portfolio-category" );  //Get the terms for this particular item
					$termsString = ""; //initialize the string that will contain the terms
					$termsSlug = "";

					 foreach ( $termsArray as $term ) { // for each term 
					 	$termsString .= 'filter_'.$term->slug.' '; //create a string that has all the slugs 
						$termsSlug .= $term->name;
					 }

					$cats_show = get_the_term_list( $best_wp->ID, 'portfolio-category', ' ', ', ');
					
				   $post_title = get_the_title($best_wp->ID);
				  
				    if($title!='No'){
				   		 $post_title_show = get_the_title($best_wp->ID);

					}	
					else{
						 $post_title_show = '';
					}			
				    $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'af_portfolio_slider');
				    $post_url=get_post_permalink($best_wp->ID); 
					if($tagline!='No'){
				   		 $post_tagline = get_post_meta( get_the_ID(), 'tagline', true );
					}
					else{
						 $post_tagline='';
						}

					$cats_show = get_the_term_list( $best_wp->ID, 'portfolio-category', ' ', '<span class="separator">,</span> ');

					$paginate = paginate_links( array(
						'total' => $best_wp->max_num_pages
					));
					
					
							
					$html .='				
					<div class="col-lg-'.$col_group.' '.$col_full.' col-md-6 grid-item mb-30 '.$termsString.'">

	                            <div class="project-item">
				                        <img src="'.$post_img_url.'" alt="'.$post_title.'" />
				                        <div class="project-content">
				                            <div class="p-icon">
				                                <a href="'.$post_url.'"><i class="glyph-icon flaticon-next"></i></a>
				                            </div>
				                            <div class="title">
				                                 <span>'.$cats_show.'</span>
				                                <a href="'.$post_url.'">'.$post_title_show.'</a>
				                            </div>
				                        </div>
				                 </div>

	                        </div>';
						
							endwhile; 
					wp_reset_query();
				endif;
				
			$html .= '</div></div>
			</div>
			</div>';
		}

	  return $html; 
    }

add_shortcode( 'vc_Portfolio', 'vc_Portfolio_html' );  