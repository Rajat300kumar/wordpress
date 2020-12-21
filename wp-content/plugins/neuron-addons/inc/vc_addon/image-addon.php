<?php
/*
Element Description: RS Client elements
*/
// Element Mapping

function vc_imageanimate_mapping() {
	 
	// Stop all if VC is not enabled
	if ( !defined( 'WPB_VC_VERSION' ) ) {
		return;
	}

	 
	// Map the block with vc_map()
	vc_map( 
		array(
			'name' => __('AF Image Animation', 'neuron_addon'),
			'base' => 'vc_image_animation',
			'description' => __('Image Module', 'neuron_addon'), 
			'category' => __('by AuburnForest', 'neuron_addon'),   
			'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',    
			'params' => array( 		

			array(
				"type"        => "attach_image",
				"heading"     => __( "Upload Image 1", "rsaddon" ),
				"description" => __( "Add image", "rsaddon" ),
				"param_name"  => "screenshots",
				"value"       => "",				
			),

			array(
				"type"        => "attach_image",
				"heading"     => __( "Upload Image 2", "rsaddon" ),
				"description" => __( "Add secondary image", "rsaddon" ),
				"param_name"  => "secondary_screenshots",
				"value"       => "",				
			),

		

			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'neuron_addon'),
				'param_name' => 'el_class',
				'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'neuron_addon'),
			),	
			
			array(
			'type' => 'css_editor',
			'heading' => __( 'CSS box', 'neuron_addon'),
			'param_name' => 'css',
			'group' => __( 'Design Options', 'neuron_addon'),
			),           
		 ),
		)
	);                                
	
}
     
 add_action( 'vc_before_init', 'vc_imageanimate_mapping' );
     
    // Element HTML
   function vc_image_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
					
					'el_class'              => '',					
					'css'                   => ''            
                ), 
                $atts,'vc_image_animation'
           )
        );
	
        $a = shortcode_atts(array(
          'screenshots' => 'screenshots',
        ), $atts);

        $a2 = shortcode_atts(array(
          'secondary_screenshots' => 'secondary_screenshots',
        ), $atts);

        $a3 = shortcode_atts(array(
          'third_screenshots' => 'third_screenshots',
        ), $atts);

		$img  = wp_get_attachment_image_src($a["screenshots"], "large");
		$img2 = wp_get_attachment_image_src($a2["secondary_screenshots"], "large");
		$img3 = wp_get_attachment_image_src($a3["third_screenshots"], "large");

       	$imgSrc  = $img[0];
		$imgSrc2 = $img2[0];
		$imgSrc3 = $img3[0];

	  
	   //custom class added
		$wrapper_classes  = array($el_class) ;			
		$class_to_filter  = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
		
	
		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

		$html = '<div class="af-image-animate '.$css_class_custom.' '.$css_class.'">

		    <div class="af-image_list1">
		        <img src="'.$imgSrc.'" alt="image-1" />
		     </div>
		     <div class="af-image_list2 wow fadeInUp" data-wow-delay="300ms" data-wow-duration="2000ms">
		        <img class="animate_lr" src="'.$imgSrc2.'" alt="image-1" />
		     </div>
		   </div>';
     

		
return $html; 
}
add_shortcode( 'vc_image_animation', 'vc_image_html' );