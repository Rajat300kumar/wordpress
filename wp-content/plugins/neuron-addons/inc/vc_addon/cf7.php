<?php
/*
Element Description: Rs Custom Heading*/

    // Element Mapping
    function vc_cf7_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }


        $cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

		$contact_forms = array();
		if ( $cf7 ) {
			foreach ( $cf7 as $cform ) {
				$contact_forms[ $cform->post_title ] = $cform->ID;
			}
		} else {
			$contact_forms[ esc_html__( 'No contact forms found', 'js_composer' ) ] = 0;
		}
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => esc_html__( 'Contact Form 7', 'js_composer' ),				
                'base' => 'vc_cf7',
                'description' => __('contact form', 'neuron_addon'), 
                'category' => __('by AuburnForest', 'neuron_addon'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(  

	            array(
					'type' => 'dropdown',
					'heading' => esc_html__( 'Select contact form', 'js_composer' ),
					'param_name' => 'id',
					'value' => $contact_forms,
					'save_always' => true,
					'description' => esc_html__( 'Choose previously created contact form from the drop down list.', 'js_composer' ),
				),
				                   
				
				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Primary Background", 'neuron_addon' ),
					"param_name" => "primarybg",
					"value" => '',
					"description" => __( "Choose primary color", 'neuron_addon' ),
	                'group' => 'Styles',
				),

				array(
					"type" => "colorpicker",
					"class" => "",
					"heading" => __( "Secondary Background", 'neuron_addon' ),
					"param_name" => "secondarybg",
					"value" => '',
					"description" => __( "Choose color", 'neuron_addon' ),
	                'group' => 'Styles',		                
				),				
				
				array(
					'type'        => 'textfield',
					'heading'     => __( 'Extra class name', 'neuron_addon'),
					'param_name'  => 'el_class',
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
  
add_action( 'vc_before_init', 'vc_cf7_mapping' );
  
// Element HTML
function vc_cf7_html($atts, $content) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'id'          => '',
					'el_class'    =>'',
					'primarybg'   => '',
					'secondarybg' => '',
					'css'         => ''
                ), 
                $atts, 'vc_cf7'
            )
        );

        	 //custom class added
			$wrapper_classes  = array($el_class) ;			
			$class_to_filter  = implode( ' ', array_filter( $wrapper_classes ) );		
			$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
            $cf7_css= '';
			if(!empty($primarybg) && !empty($secondarybg)){
				$cf7_css .="background-image: linear-gradient(-41deg, {$primarybg}, {$secondarybg});";	
			}
			if(!empty($bnt_border)){
				$cf7_css .="border-color:{$bnt_border};";
			}
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );			
    		$html = '			
			<div class="rs-cf7 '.$css_class.' '.$css_class_custom.'" style="'.$cf7_css.'">				
			  	'.do_shortcode( '[contact-form-7 id="'.$id.'"]' ).'
			  			
			</div>';
              
   return $html; }
add_shortcode( 'vc_cf7', 'vc_cf7_html' );