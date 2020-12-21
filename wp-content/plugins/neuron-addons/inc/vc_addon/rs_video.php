<?php
/*
Element Description: Rs Custom Video*/

    // Element Mapping
    function vc_video_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
				'name'        => __('Video', 'neuron_addon'),
				'base'        => 'vc_video',
				'description' => __('Video Addon', 'neuron_addon'), 
				'category'    => __('by AuburnForest', 'neuron_addon'),   
				'icon'        => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(	

		

			array(
				'type'        => 'textfield',
				'heading'     => __( 'Video link', 'neuron_addon' ),
				'param_name'  => 'video_link',
				'value'       => __( '', 'neuron_addon' ),
				'description' => __( 'Video link here', 'neuron_addon' ),
				'admin_label' => false,
				'weight'      => 0,
			   
			),

			 array(
				'type'        => 'textfield',
				'heading'     => __( 'Extra class name', 'neuron_addon' ),
				'param_name'  => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'neuron_addon' ),
			),		                  
						
			array(
			'type'       => 'css_editor',
			'heading'    => __( 'CSS box', 'neuron_addon' ),
			'param_name' => 'css',
			'group'      => __( 'Design Options', 'neuron_addon' ),
			),                  
                        
         ),
      )
   );                                      
}
  
add_action( 'vc_before_init', 'vc_video_mapping' );
  
 // Element HTML
 function vc_video_html( $atts ) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(					
					'image'                  => '',
					'title'                  => '',
					'backgroundcolor'        => '#2280fc',
					'bordercolor'        => '#2280fc',
					'iconcolor'              => '#fff',
					'video_style'            => 'style1',
					'subcolor'               => '',                   
					'description'            => '',                    
					'video_link'             => '',                    
					'font_heading_container' => '',
					'el_class'               =>'',
					'css'                    => ''
                ), 
                $atts, 'vc_video'
            )
        );
		
		//for css edit box value extract
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
         //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
  
  		$a = shortcode_atts(array(
  		    'screenshots' => 'screenshots',
  		), $atts);

  		$image = wp_get_attachment_image_src( $image, 'full' );
  		$rand = rand(1, 30);

        // Fill $html var with data

  			$html = '<div class="rs-video-2 video-item-'.$rand.' '.$css_class.'">';   					

				    $html .= '<a class="popup-videos" href="'.esc_url($video_link).'" title="'.esc_attr($title).'">
						<i  class="flaticon-play-button"></i>
					</a>
				    <div class="video-desc" style="color:'.$backgroundcolor.'!important">'.$description.'</div>
				    <div class="overly-border" style="border-color:'.$bordercolor.'!important"></div>
			</div>';   		

		return $html;
}

add_shortcode( 'vc_video', 'vc_video_html' );