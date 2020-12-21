<?php
/*
	Element Description: Rs Latest Product Slider
*/
 if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
}     
// Element Mapping
if ( !class_exists( 'AuburnForest_VC_Latest_Product_Slider' ) ) {    
         
    class AuburnForest_VC_Latest_Product_Slider extends AuburnForest_VC_Modules {
		public function __construct(){
			$this->name = __( "Latest Product Slider", 'neuron_addon' );
			$this->base = 'rs_latest_product_slider';				
			parent::__construct();
		}     
       
		public function fields(){
			$category_dropdown = array( __( 'All Categories', 'neuron_addon' ) => '0' );	
	        $args = array(
	            'taxonomy' => array('product_cat'),//ur taxonomy
	            'hide_empty' => false,                  
	        );

			$terms_= new WP_Term_Query( $args );
			foreach ( (array)$terms_->terms as $term ) {
				$category_dropdown[$term->name] = $term->slug;		
			} 

			$fields = array(
				array(
					"type"       => "dropdown",
					"heading"    => __("Product Type", 'neuron_addon'),
					"param_name" => "product_style",
					"value"      => array(
						'Slider' => "Slider", 
						'Grid'   => "Grid",									
					),						
				),
				array(
					"type"       => "dropdown",
					"heading"    => __("Product Column Per Row", 'neuron_addon'),
					"param_name" => "pre_row",
					"value"      => array(							
						'One'   => "Col-1", 
						'Two'   => "Col-2",
						'Three' => "Col-3",	
						'Four'  => "Col-4",																						
					),
					"dependency" => Array('element' => 'product_style', 'value' => array('Grid')),						
				),	
				array(
					"type" => "textfield",
					"heading" => __("Product Per Pgae", "rsaddon"),
					"param_name" => "product_per",
					'value' =>"6",
					'description' => __( 'You can write how many product show. ex(2)', 'neuron_addon' ),					
				),

				array(
					"type" => "dropdown_multi",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Categories", 'neuron_addon' ),
					"param_name" => "cat",
					'value' => $category_dropdown,
					'admin'       => false	
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
					"dependency" => Array('element' => 'product_style', 'value' => array('Slider')),	
				
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
					"dependency" => Array('element' => 'product_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'product_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'product_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'product_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'product_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'product_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'product_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'product_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'product_style', 'value' => array('Slider')),
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
					"dependency" => Array('element' => 'product_style', 'value' => array('Slider')),
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

     
    // Element HTML
    public function shortcode( $atts, $content = '' ) {
        $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'product_per'           => '6',				
					'col_lg'                => '3',
					'col_md'                => '3',
					'col_sm'                => '3',
					'col_xs'                => '2',
					'col_mobile'            => '1',
					'product_style'         => 'Slider',
					'pre_row'         		=> '3',
					'slider_nav'            => 'true',
					'slider_dots'           => 'false',
					'slider_autoplay'       => 'true',
					'slider_stop_on_hover'  => 'true',
					'slider_interval'       => '5000',
					'slider_autoplay_speed' => '200',
					'slider_loop'           => 'true',				
					'css'                   => '' , 
					'cat'					=> ''                  
                ), 
                $atts,'rs_latest_product_slider'
           		)
        	);	


			$owl_data = array( 
				'nav'                => ( $slider_nav === 'true' ) ? true : false,
				'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
				'dots'               => ( $slider_dots === 'true' ) ? true : false,
				'autoplay'           => ( $slider_autoplay === 'true' ) ? true : false,
				'autoplayTimeout'    => $slider_interval,
				'autoplaySpeed'      => $slider_autoplay_speed,
				'autoplayHoverPause' => ( $slider_stop_on_hover === 'true' ) ? true : false,
				'loop'               => ( $slider_loop === 'true' ) ? true : false,
				'margin'             => 30,
				'responsive'         => array(
					'0'    => array( 'items' => $col_mobile ),
					'480'  => array( 'items' => $col_xs ),
					'768'  => array( 'items' => $col_sm ),
					'992'  => array( 'items' => $col_md ),
					'1200' => array( 'items' => $col_lg ),
				)				
			);
			$owl_data = json_encode( $owl_data );



        	

        	switch ( $product_style ) {

	    		case 'Slider':
					$template = 'latest-product-slider';
					break;

				case 'Grid':
					$template = 'latest_product_grid';
					break;
				
				default:
					$template = 'latest-product-slider';
				break;
			}
			return $this->template( $template, get_defined_vars() );
		}
	}
}

new AuburnForest_VC_Latest_Product_Slider;