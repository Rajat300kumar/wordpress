<?php
/*
Element Description: Rs Custom Video*/

// Stop all if VC is not enabled
if ( !defined( 'WPB_VC_VERSION' ) ) {
    return;
}
function vc_space_mapping() {
         
     
        vc_map(
        	   array(
					"name" => 'AF Space',
					"base" => "rs_space",
	                'description' => __(' Space for controlling for different devices', 'neuron_addon'), 
	                'category' => __('by AuburnForest', 'neuron_addon'),   
	                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',   
					"params" => array(

						array(
						"type" => "textfield",
						"heading" => esc_html__("Space Larger Devices ( width >= 992px )", 'neuron_addon'),
						"param_name" => "space_lg",
						"description" => "Enter number."
						),
						array(
						"type" => "textfield",
						"heading" => esc_html__("Space Medium Devices ( 768px <= width <= 991px )", 'neuron_addon'),
						"param_name" => "space_md",
						"description" => "Enter number."
						),
						array(
						"type" => "textfield",
						"heading" => esc_html__("Space Small Devices ( 576px <= width <= 767px )", 'neuron_addon'),
						"param_name" => "space_sm",
						"description" => "Enter number."
						),
						array(
						"type" => "textfield",
						"heading" => esc_html__("Space very Small Devices ( width <= 575px )", 'neuron_addon'),
						"param_name" => "space_xs",
						"description" => "Enter number."
						),
				 	)
				));

                                     
}
  
add_action( 'vc_before_init', 'vc_space_mapping' );
  
 // Element HTML
 function vc_space_html( $atts ) {
        
    // Params extraction
    extract(
        shortcode_atts(
            array(					
				'space_lg' => '100',
				'space_md' => '65',
				'space_sm' => '50',                   
				'space_xs' => '40',                    
            ), 
            $atts, 'rs_space'
        )
    );
    $uqid = uniqid();
    
    $compact = compact('uqid', 'space_lg', 'space_md', 'space_sm', 'space_xs' );



   $html = '<div id="rs-space-'.esc_attr($uqid).'" class="rs-space">
                <div class="rs-space-data" data-conf="'.htmlspecialchars(json_encode($compact)).'"></div>			
			</div>';

	return $html;			     	
}

add_shortcode( 'rs_space', 'vc_space_html' );