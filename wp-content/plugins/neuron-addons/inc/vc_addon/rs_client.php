<?php
/*
Element Description: RS Client elements
*/
// Element Mapping

function vc_bstartRsClient_mapping() {
	 
	// Stop all if VC is not enabled
	if ( !defined( 'WPB_VC_VERSION' ) ) {
		return;
	}

	$category_dropdown = array( __( 'All Categories', 'neuron_addon' ) => '0' );	
    $args = array(
		'taxonomy'   => array('rsclient-category'),//ur taxonomy
		'hide_empty' => true,                  
    );

	$terms_= new WP_Term_Query( $args );
	foreach ( (array)$terms_->terms as $term ) {
		$category_dropdown[$term->name] = $term->slug;		
	}
	 
	// Map the block with vc_map()
	vc_map( 
		array(
			'name'        => __('Client Module', 'neuron_addon'),
			'base'        => 'vc_bstartClient',
			'description' => __('Client Module', 'neuron_addon'), 
			'category'    => __('by AuburnForest', 'neuron_addon'),   
			'icon'        => get_template_directory_uri().'/framework/assets/img/vc-icon.png',    
			'params' => array( 
			array(
				'type'        => 'textfield',
				'holder'      => 'h3',
				'class'       => 'title-class',
				'heading'     => __( 'Post Per Page', 'neuron_addon'),
				'param_name'  => 'title',
				'value'       => __( '6', 'neuron_addon'),				
				'admin_label' => false,
				'weight'      => 0,
				'description' => __( 'Write -1 to show all', 'neuron_addon'),	
			   
			),  

			array(
				"type"        => "textfield",
				"holder"      => "div",
				"class"       => "",
				"heading"     => __( "Images Custom Width", 'rs-addon' ),
				"param_name"  => "image_width",	
				'description' => __( 'ex: 50px', 'neuron_addon'),			
			),

			array(
				"type"       => "dropdown_multi",
				"holder"     => "div",
				"class"      => "",
				"heading"    => __( "Categories", 'rs-addon' ),
				"param_name" => "cat",
				'value'      => $category_dropdown,
			),

			array(
				"type"       => "dropdown",
				"heading"    => __("Clients Type", 'neuron_addon'),
				"param_name" => "clients_styles",
				"value"      => array(
					'Slider' => "Slider", 
					'Grid'   => "Grid",									
				),						
			),

			array(
				"type"       => "dropdown",
				"heading"    => __("Clients Column Per Row", 'neuron_addon'),
				"param_name" => "pre_rows",
				"value"      => array(							
					'One'  	 => "one", 
					'Two'    => "two",
					'Three'  => "three",	
					'Four'   => "four",																						
					'Five'   => "five",																						
					'Six'    => "six",																						
				),
				"dependency" => Array('element' => 'clients_styles', 'value' => array('Grid')),						
			),	

			array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 1199px )", 'neuron_addon'),
					"param_name" => "col_lg",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "6",
					"group" 	  => __( "Slider Options", 'neuron_addon'),
					"dependency" => Array('element' => 'clients_styles', 'value' => array('Slider')),
					),

				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Desktops > 991px )", 'neuron_addon'),
					"param_name" => "col_md",
					"value" => array(							
								'1' => "1", 
								'2' => "2",
								'3' => "3",	
								'4' => "4",
								'5' => "5",
								'6' => "6",																						
							),
					"std" => "6",
					"group" 	  => __( "Slider Options", 'neuron_addon'),
					"dependency" => Array('element' => 'clients_styles', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Tablets > 767px )", 'neuron_addon'),
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
					"group" 	  => __( "Slider Options", 'neuron_addon'),
					"dependency" => Array('element' => 'clients_styles', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Phones < 768px )", 'neuron_addon'),
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
					"group" 	  => __( "Slider Options", 'neuron_addon'),
					"dependency" => Array('element' => 'clients_styles', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Number of columns ( Small Phones < 480px )", 'neuron_addon'),
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
					"group" 	  => __( "Slider Options", 'neuron_addon'),
					"dependency" => Array('element' => 'clients_styles', 'value' => array('Slider')),
				),

				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Navigation Dots", 'neuron_addon'),
					"param_name" => "slider_nav",
					"value" => array(
						__( 'Disabled', 'neuron_addon') => 'false',
						__( 'Enabled', 'neuron_addon')  => 'true',
						),
					"description" => __( "Enable or disable navigation dots. Default: Disable", 'neuron_addon'),
					"group" => __( "Slider Options", 'neuron_addon'),
					"dependency" => Array('element' => 'clients_styles', 'value' => array('Slider')),				
				),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Navigation Arrows", 'neuron_addon'),
					"param_name" => "slider_arrows",
					"value" => array(
						__( 'Disabled', 'neuron_addon') => 'false',
						__( 'Enabled', 'neuron_addon')  => 'true',
						),
					"description" => __( "Enable or disable navigation arrows. Default: Disable", 'neuron_addon'),
					"group" => __( "Slider Options", 'neuron_addon'),
					"dependency" => Array('element' => 'clients_styles', 'value' => array('Slider')),				
				),

				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Autoplay", 'neuron_addon'),
					"param_name" => "slider_autoplay",
					"value" => array( 
						__( "Enable", "rsaddon" )  => 'true',
						__( "Disable", "rsaddon" ) => 'false',
						),
					"description" => __( "Enable or disable autoplay. Default: Enable", 'neuron_addon'),
					"group" => __( "Slider Options", 'neuron_addon'),
					"dependency" => Array('element' => 'clients_styles', 'value' => array('Slider')),
					),
				array(
					"type" => "dropdown",
					"holder" => "div",
					"class" => "",
					"heading" => __( "Stop on Hover", 'neuron_addon'),
					"param_name" => "slider_stop_on_hover",
					"value" => array( 
						__( "Enable", "rsaddon" )  => 'true',
						__( "Disable", "rsaddon" ) => 'false',
						),
					'dependency' => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Stop autoplay on mouse hover. Default: Enable", 'neuron_addon'),
					"group" => __( "Slider Options", 'neuron_addon'),
					"dependency" => Array('element' => 'clients_styles', 'value' => array('Slider')),
					),

				array(
					"type" 		  => "dropdown",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Interval", 'neuron_addon'),
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
					"description" => __( "Set any value for example 5 seconds to play it in every 5 seconds. Default: 5 Seconds", 'neuron_addon'),
					"group" 	  => __( "Slider Options", 'neuron_addon'),
					"dependency" => Array('element' => 'clients_styles', 'value' => array('Slider')),
					),
				array(
					"type"		  => "textfield",
					"holder" 	  => "div",
					"class" 	  => "",
					"heading" 	  => __( "Autoplay Slide Speed", 'neuron_addon'),
					"param_name"  => "slider_autoplay_speed",
					"value" 	  => 200,
					'dependency'  => array(
						'element' => 'slider_autoplay',
						'value'   => array( 'true' ),
						),
					"description" => __( "Slide speed in milliseconds. Default: 200", 'neuron_addon'),
					"group" 	  => __( "Slider Options", 'neuron_addon'),
					"dependency" => Array('element' => 'clients_styles', 'value' => array('Slider')),
					),	
				array(
					"type" 		 => "dropdown",
					"holder" 	 => "div",
					"class" 	 => "",
					"heading" 	 => __( "Loop", 'neuron_addon'),
					"param_name" => "slider_loop",
					"value" 	 => array( 
						__( "Enable", "rsaddon" )  => 'true',
						__( "Disable", "rsaddon" ) => 'false',
						),
					"description"=> __( "Loop to first item. Default: Enable", 'neuron_addon'),
					"group" 	 => __( "Slider Options", 'neuron_addon'),
					"dependency" => Array('element' => 'clients_styles', 'value' => array('Slider')),
					),				


			 array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'neuron_addon'),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'neuron_addon'),
			),	
			
			array(
				'type'       => 'css_editor',
				'heading'    => __( 'CSS box', 'neuron_addon'),
				'param_name' => 'css',
				'group'      => __( 'Design Options', 'neuron_addon'),
			),           
		 ),
		)
	);                                
	
}
     
 add_action( 'vc_before_init', 'vc_bstartRsClient_mapping' );
     
    // Element HTML
   function vc_bstartClient_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'title'                 => '6',
					'col_lg'                => '6',
					'clients_styles'        => 'Slider',
					'pre_rows'        		=> 'five',
					'col_md'                => '6',
					'col_sm'                => '3',
					'col_xs'                => '2',
					'col_mobile'            => '1',
					'slider_nav'            => 'false',
					'slider_dots'           => 'false',
					'slider_autoplay'       => 'true',
					'slider_stop_on_hover'  => 'true',
					'slider_interval'       => '5000',
					'slider_autoplay_speed' => '200',
					'slider_loop'           => 'true',
					'cat'                   => '',
					'el_class'              => '',					
					'css'                   => '',
					'image_width'			=> ''            
                ), 
                $atts,'vc_bstartClient'
           )
        );
	
       //post per page
	   $per_page=$title;
	  
	   //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
		
	
		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

		$owl_data = array( 
			'nav'                => ( $slider_nav === 'true' ) ? true : false,
			'navText'            => array( "<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>" ),
			'dots'               => ( $slider_dots === 'false' ) ? false : true,
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


        if( $clients_styles == 'Slider' ){
			$html='<div class="rs-partner '.$css_class.' '.$css_class_custom.'">           
		<div class="partner-carousel owl-carousel" data-carousel-options="'.esc_attr( $owl_data ).'">';      
			
			if(empty($cat)){
	        	$best_wp = new wp_Query(array(
					'posts_per_page' =>$per_page,
					'post_type'=>'rsclient',
					'order' => 'DESC',										
				));	  
		    }else{
				$best_wp = new wp_Query(array(
						'posts_per_page' =>$per_page,
						'post_type'=>'rsclient',
						'order' => 'DESC',
						'tax_query' => array(
					        array(
					            'taxonomy' => 'rsclient-category',
					            'field' => 'slug', //can be set to ID
					            'terms' => $arr_cats//if field is ID you can reference by cat/term number
					        ),
					    )
					));
				}		   
			
				while($best_wp->have_posts()): $best_wp->the_post();
					$post_title= get_the_title($best_wp->ID);				
					$post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');	
					$client_link = get_post_meta( get_the_ID(), 'client_link', true );	

		       		$html .='<div class="partner-item">
					<a href="'.$client_link.'" target="_blank"><img src="'.$post_img_url.'" alt="'.$post_title.'"></a>
					</div>';

				endwhile; 
			wp_reset_query();
		$html .='</div>
	</div>';

	} else {
			
		$html='<div class="rs-partner '.$css_class.' '.$css_class_custom.'">           
			<ul class="clients-grids cols-'.$pre_rows.'">';      
				
				if(empty($cat)){
		        	$best_wp = new wp_Query(array(
						'posts_per_page' =>$per_page,
						'post_type'=>'rsclient',
						'order' => 'DESC',										
					));	  
			    }else{
					$best_wp = new wp_Query(array(
							'posts_per_page' =>$per_page,
							'post_type'=>'rsclient',
							'order' => 'DESC',
							'tax_query' => array(
						        array(
						            'taxonomy' => 'rsclient-category',
						            'field' => 'slug', //can be set to ID
						            'terms' => $arr_cats//if field is ID you can reference by cat/term number
						        ),
						    )
						));
					}	

				    $i = 1;

				    $image_width = !empty($image_width) ? 'style="max-width:'.$image_width.'"' : '';

					while($best_wp->have_posts()): $best_wp->the_post();
					   $post_title= get_the_title($best_wp->ID);				
					   $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');	
					   $client_link = get_post_meta( get_the_ID(), 'client_link', true );

					   


							
						$html .='<li class="partner-item">
							<a href="'.$client_link.'" target="_blank"><img '.$image_width.' src="'.$post_img_url.'" alt="'.$post_title.'"></a>
						</li>';
                        $i++;
					endwhile; 
				wp_reset_query();
			$html .='</ul>
		</div>';
	}		
return $html; 
}
add_shortcode( 'vc_bstartClient', 'vc_bstartClient_html' );