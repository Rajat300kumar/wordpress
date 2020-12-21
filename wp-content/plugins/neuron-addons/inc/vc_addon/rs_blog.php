<?php
/*
Element Description: Rs Blog Box*/
    if ( !defined( 'WPB_VC_VERSION' ) ) {
		return;
	}
	if ( !class_exists( 'AuburnForest_Blog_Box' ) ) {   

		class AuburnForest_Blog_Box extends AuburnForest_VC_Modules {
			public function __construct(){
				$this->name = __( "Blog Module", 'neuron_addon' );
				$this->base = 'vc_rsBlog';				
				parent::__construct();
			}
    		// Element Mapping
     		
		public function fields(){
				
	        $categories = get_categories();
			$category_dropdown = array( 'All Categories' => '0' );

			foreach ( $categories as $category ) {
				$category_dropdown[$category->name] = $category->slug;
			}    
	        // Map the block with vc_map()
	      	$fields = array(           		          
					array(
						"type"       => "dropdown",
						"heading"    => __("Blog Type", 'neuron_addon'),
						"param_name" => "blog_style",
						"value"      => array(
							'Slider' => "Slider", 
							'Grid'   => "Grid",									
						),						
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Select Blog Style", 'neuron_addon'),
						"param_name" => "news_style",
						"value"      => array(				    						
							'Style 1' => "style1",																
							'Style 2' => "style2",																
						),					
					),
					array(
						'type'       => 'dropdown',
						'heading'    => __( 'Blog Content Alignment', 'rsaddon' ),
						'param_name' => 'align',
						'value' => array(
							__( 'Left', 'rsaddon' )   => 'text-left',
							__( 'Center', 'rsaddon' ) => 'text-center',
						),
						'description' => __( 'Select alignment here.', 'rsaddon' ),
					),					
		            array(
						"type"       => "dropdown",
						"heading"    => __("Show title", 'neuron_addon'),
						"param_name" => "title",
						"value"      => array(				    						
							'Yes' => "Yes", 
							'No'  => "No",											
						),						
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Show  Blog Meta", 'neuron_addon'),
						"param_name" => "blog_meta",
						"value" 	 => array(			    						
							'No'  => "",											
							'Yes' => "yes", 
						),
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Show  Author Info", 'neuron_addon'),
						"param_name" => "blog_information",
						"value" 	 => array(
							'No'  => "",											
							'Yes' => "yes", 
						),
						"dependency" => Array('element' => 'blog_meta', 'value' => array('yes')),
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Show  Category", 'neuron_addon'),
						"param_name" => "blog_cat",
						"value" 	 => array(
							'No'  => "",											
							'Yes' => "yes", 
						),
						"dependency" => Array('element' => 'blog_meta', 'value' => array('yes')),
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Show Post Thumbnail", 'neuron_addon'),
						"param_name" => "show_thumb",
						"value"      => array(						    						
							'Yes' => "yes", 
							'No' => "no", 																			
						),					
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Show  Date", 'neuron_addon'),
						"param_name" => "blog_date",
						"value" 	 => array(
							'No'  => "",								
							'Yes' => "yes", 
						),
						"dependency" => Array('element' => 'show_thumb', 'value' => array('yes')),
					),			
					array(
						"type"       => "dropdown",
						"heading"    => __("Show Excerpt", 'neuron_addon'),
						"param_name" => "show_excerpt",
						"value"      => array(						    						
							'Yes' => "yes", 
							'No' => "no", 																			
						),						
					),
					array(
                        "type"       => "textfield",
                        "heading"    => __("Excerpt Limit", 'neuron_addon'),
                        "param_name" => "excerpt_limit",
                        'value' => "22",
                        "dependency" => Array('element' => 'show_excerpt', 'value' => array('yes')),                        
                    ),                    
                    array(
						"type"       => "dropdown",
						"heading"    => __("Show ReadMore", 'neuron_addon'),
						"param_name" => "readmore",
						"value"      => array(
							'Yes' => "Yes",
							'No' => "No",
						),						
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Button Type", 'neuron_addon'),
						"param_name" => "readmore_type",
						"value"      => array(
							'Text' => "text",
							'Icon' => "icon",
						),
						"dependency" => Array('element' => 'readmore', 'value' => array('Yes')),					
					),
					array(
						"type"        => "textfield",
						"heading"     => __("Read More Text", 'neuron_addon'),
						"param_name"  => "more_text",
						'description' => __( 'Type your read more text here', 'neuron_addon' ),
						"dependency"  => Array('element' => 'readmore_type', 'value' => array('text')),
					),
					array(
						"type"       => "dropdown_multi",
						"holder"     => "div",
						"class"      => "",
						"heading"    => __( "Categories", 'neuron_addon' ),
						"param_name" => "cat",
						'value'      => $category_dropdown,
					),					
					
					array(
							"type"       => "dropdown",
							"heading"    => __("Blog Column Per Row", 'neuron_addon'),
							"param_name" => "pre_row",
							"value"      => array(							
								'One'   => "Col-1", 
								'Two'   => "Col-2",
								'Three' => "Col-3",	
								'Four'  => "Col-4",																						
							),
							"dependency" => Array('element' => 'blog_style', 'value' => array('Grid')),						
					),	
					
					array(
						"type" => "textfield",
						"heading" => __("Post Per page", 'neuron_addon'),
						"param_name" => "post_per",
						'description' => __( 'Write -1 to show all', 'neuron_addon' ),										
					),
					array(
						"type"       => "dropdown",
						"heading"    => __("Show  Pagination", 'neuron_addon'),
						"param_name" => "pagination",
						"value" 	 => array(			    						
							'No'  => "",											
							'Yes' => "yes", 
						),
						"dependency" => Array('element' => 'blog_style', 'value' => array('Grid')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),	
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
					
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Navigation Arrow", 'neuron_addon' ),
					"param_name" => "slider_nav",
					"value" => array(
						__( 'Disabled', 'neuron_addon' ) => 'false',
						__( 'Enabled', 'neuron_addon' )  => 'true',
						),
					"description" => __( "Enable or disable navigation dots. Default: Disable", 'neuron_addon' ),
					"group" => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
					
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay", 'neuron_addon' ),
					"param_name" => "slider_autoplay",
					"value" => array( 
						__( "Enable", "rsaddon" )  => 'true',
						__( "Disable", "rsaddon" ) => 'false',
						),
					"description" => __( "Enable or disable autoplay. Default: Enable", 'neuron_addon' ),
					"group" => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Stop on Hover", 'neuron_addon' ),
					"param_name" => "slider_stop_on_hover",
					"value" => array( 
						__( "Enable", "rsaddon" )  => 'true',
						__( "Disable", "rsaddon" ) => 'false',
						),
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Stop autoplay on mouse hover. Default: Enable", 'neuron_addon' ),
					"group" => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
				),

				array(
					"type" 		  => "dropdown",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Interval", 'neuron_addon' ),
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
					"description" => __( "Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds", 'neuron_addon' ),
					"group" 	  => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
				),	
				array(
					"type" 		 => "dropdown",
					"holder" 	 => "div",
					"class" 	 => "",
					"heading" 	 => __( "Loop", 'neuron_addon' ),
					"param_name" => "slider_loop",
					"value" 	 => array(
						__( "Enable", "rsaddon" )  => 'true',
						__( "Disable", "rsaddon" ) => 'false',
					),
					"description"=> __( "Loop to first item. Default: Enable", 'neuron_addon' ),
					"group" 	 => __( "Slider Options", 'neuron_addon' ),
					"dependency" => Array('element' => 'blog_style', 'value' => array('Slider')),
					),

					 array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'neuron_addon' ),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'neuron_addon' ),
					),		 
				
					array(
					'type' => 'css_editor',
					'heading' => __( 'CSS box', 'neuron_addon' ),
					'param_name' => 'css',
					'group' => __( 'Design Options', 'neuron_addon' ),
					),            
            );
		return $fields;                           
    }
     
    public function shortcode( $atts, $content = '' ) {
        $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					
					'title'                 => 'yes',
					'degination'            => '',	
					'align'                 => '',	
					'post_per'              => '',	
					'show_excerpt'          => 'Yes',
					'excerpt_limit'         => '22',
					'blog_style'            =>'Slider',					
					'news_style'            =>'style1',					
					'blog_meta'             =>'',
					'blog_cat'              =>'',
					'blog_information'      =>'',
					'blog_date'             =>'',
					'show_thumb'            =>'',
					'pre_row'               => 'Col-1',
					'col_lg'                => '3',
					'col_md'                => '3',
					'col_sm'                => '3',
					'col_xs'                => '2',
					'col_mobile'            => '1',
					'slider_nav'            => 'false',
					'slider_dots'           => 'true',
					'slider_autoplay'       => 'true',
					'slider_stop_on_hover'  => 'true',
					'slider_interval'       => '5000',
					'slider_autoplay_speed' => '200',
					'slider_loop'           => 'true',
					'el_class'              =>'',				
					'icon_fontawesome'      => 'fa fa-users',					
					'css'                   => '',   
					'cat'                   => '' ,
					'readmore'              => 'Yes',
					'readmore_type'         => 'text',
					'more_text'             => 'Read More',
					'pagination'            => ''
                ), 
                $atts,'vc_rsBlog'
           )
        );

      
	
		$a      = shortcode_atts(array( 'screenshots' => 'screenshots',), $atts);
		$cat    = empty( $cat ) ? '' : $cat;
		$img    = wp_get_attachment_image_src($a["screenshots"], "large");
		$imgSrc = $img[0];	
		
		//extact icon 
		$iconClass = isset( ${'icon_fontawesome'} ) ? esc_attr( ${'icon_fontawesome'} ) : 'fa fa-users';
       
     
		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
		//custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );


		$owl_data = array( 
			'nav'                => ( $slider_nav === 'true' ) ? true : false,
			'navText'            => array( "<i class='icofont icofont-bubble-left'></i>", "<i class='icofont icofont-bubble-right'></i>" ),
			'dots'               => ( $slider_dots == 'false' ) ? false : true,
			'autoplay'           => ( $slider_autoplay === 'true' ) ? true : false,
			'autoplayTimeout'    => $slider_interval,
			'stagePadding'       => 12,
			'autoplaySpeed'      => $slider_autoplay_speed,
			'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true : false,
			'loop'               => ( $slider_loop === 'true' ) ? true : false,
			'margin'             => 30,
			'stagePadding'       => 0,
			'items'       => 3,
			'responsive'         => array(
				'0'    => array( 'items' => $col_mobile ),
				'480'  => array( 'items' => $col_xs ),
				'768'  => array( 'items' => $col_sm ),
				'992'  => array( 'items' => $col_md ),
				'1200' => array( 'items' => $col_lg ),
				)				
			);
		
		$owl_data = json_encode( $owl_data );
	       	if( $blog_style == 'Slider' ){
	       
			    switch ( $news_style ) {

			    	case 'style3':
						$template = 'blog-slider-three';
						break;

					case 'style2':
						$template = 'blog-slider-two';
						break;

					default:
						$template = 'blog-slider-one';
						break;
				}
			}
			else{
				switch ( $news_style ) {

			    	case 'style3':
						$template = 'blog-grid-three';
						break;

					case 'style2':
						$template = 'blog-grid-two';
						break;

					default:
						$template = 'blog-grid-one';
						break;
				}
			}
			return $this->template( $template, get_defined_vars() );	
		}
	}
}
new AuburnForest_Blog_Box;