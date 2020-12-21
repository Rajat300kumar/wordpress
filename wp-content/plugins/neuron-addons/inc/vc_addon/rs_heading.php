<?php
/*
Element Description: Rs Custom Heading*/

    // Element Mapping
    function vc_infobox_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
         
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Heading', 'neuron_addon'),
                'base' => 'vc_infobox',
                'description' => __('heading box', 'neuron_addon'), 
                'category' => __('by AuburnForest', 'neuron_addon'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(  

	                array(
	                    "type" => "dropdown",
	                    "heading" => __("Select Style", 'neuron_addon'),
	                    "param_name" => "style",
	                    "value" => array(
							__( 'Default', 'neuron_addon')   => '',
							__( 'Border Bottom', 'neuron_addon')        => 'style2',
	                    ),
	                ),

	                array(
	                	"type" => "dropdown",
	                	"heading" => __("Select Title Tag", 'neuron_addon'),
	                	"param_name" => "title_tag",
	                	"value" => array(
	                		__("H1", 'neuron_addon') => 'h1',                
	                		__("H2", 'neuron_addon') => 'h2',                
	                		__("H3", 'neuron_addon') => 'h3',                
	                		__("H4", 'neuron_addon') => 'h4',                
	                		__("H5", 'neuron_addon') => 'h5',                
	                		__("H6", 'neuron_addon') => 'h6',                
	                	),
	                	'std' => 'h2',						
	                	'description' => __( 'Set your main title tag here', 'mifo' ),
	                ), 
                         
					array(
						'type'        => 'textarea',
						'class'       => 'title-class',
						'heading'     => __( 'Title', 'neuron_addon'),
						'param_name'  => 'title',
						'value'       => __( '', 'neuron_addon'),
						'description' => __( 'Add heading title here.', 'neuron_addon'),
						'admin_label' => false,
						'weight'      => 0,					   
					), 					

					array(
						'type'        => 'textfield',
						'class'       => 'span-class',
						'heading'     => __( 'Title Part2', 'neuron_addon'),
						'param_name'  => 'title_span',
						'value'       => __( '', 'neuron_addon'),
						'description' => __( 'Add heading title 2nd part here', 'neuron_addon'),
						'admin_label' => false,
						'weight'      => 0,		
						"dependency" => Array('element' => 'style', 'value' => array('style11')),			   
					),  
					 
					array(
						'type'        => 'textfield',
						'holder'      => 'h4',
						'class'       => 'text-class',
						'heading'     => __( 'Subtitle', 'neuron_addon'),
						'param_name'  => 'sub_text',
						'value'       => __( '', 'neuron_addon'),
						'description' => __( 'Sub title text here', 'neuron_addon'),
						'admin_label' => false,
						'weight'      => 0,                        
					),

					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => __( "Title Uppercase", 'neuron_addon' ),
						"param_name" => "title_case",
						"value" => '',
						"description" => __( "If checked title will be show in uppercase.", 'neuron_addon' ),
					),

					array(
						"type" => "checkbox",
						"class" => "",
						"heading" => __( "Sub Title Uppercase", 'neuron_addon' ),
						"param_name" => "subtitle_case",
						"value" => '',
						"description" => __( "If checked sub title will be show in uppercase.", 'neuron_addon' ),
						
					),

			

					array(
						'type'        => 'textfield',
						'heading'     => __( 'Padding between title & border', 'neuron_addon'),
						'param_name'  => 'gap_padding',
						'value'       => __( '20px', 'neuron_addon'),
						'description' => __( 'Enter gap between title and border. Ex: top right bottom left', 'neuron_addon'),  
						"dependency" => Array('element' => 'style', 'value' => array('style11')),                 
					),	
	

					array(
						'type'        => 'textarea_html',
						'heading'     => __( 'Text', 'neuron_addon'),
						'param_name'  => 'content',
						'value'       => __( '', 'neuron_addon'),
						'description' => __( 'Description text here', 'neuron_addon'),    

					),

					array(
					    "type" => "dropdown",
					    "heading" => __("Select Align", 'neuron_addon'),
					    "param_name" => "align",
					    "value" => array(
					        __( 'Left', 'neuron_addon')   => '',
					        __( 'Center', 'neuron_addon') => 'text-center',
					        __( 'Right', 'neuron_addon')  => 'text-right',
					    ),
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Title color", 'neuron_addon' ),
						"param_name" => "title_color",
						"value" => '',
						"description" => __( "Choose title color", 'neuron_addon' ),
		                'group' => 'Styles',
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Title Span color", 'neuron_addon' ),
						"param_name" => "title_span_color",
						"value" => '',
						"description" => __( "Choose title Span color", 'neuron_addon' ),
		                'group' => 'Styles',
		                "dependency" => Array('element' => 'style', 'value' => array('style11')),
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Title Border color", 'neuron_addon' ),
						"param_name" => "title_border_color",
						"value" => '',
						"description" => __( "Choose title Border color", 'neuron_addon' ),
		                'group' => 'Styles',
		                "dependency" => Array('element' => 'style', 'value' => array('style11')),
					),


					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Sub Text Color", 'neuron_addon' ),
						"param_name" => "sub_text_color",
						"value" => '',
						"description" => __( "Choose sub text color here", 'neuron_addon' ),
		                'group' => 'Styles',
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Text Color", 'neuron_addon' ),
						"param_name" => "text_color",
						"value" => '',
						"description" => __( "Choose sub text color here", 'neuron_addon' ),
		                'group' => 'Styles',
					),


					array(
						"type"        => "attach_image",
						"heading"     => __( "Heading Image", "rsaddon" ),
						"description" => __( "Add Heading image", "rsaddon" ),
						"param_name"  => "headingbg",
						"value"       => "",
						'group' => 'Styles',
						"dependency" => Array('element' => 'style', 'value' => array('style9')),
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
  
add_action( 'vc_before_init', 'vc_infobox_mapping' );
  
// Element HTML
function vc_infobox_html($atts, $content) {
         
        // Params extraction
        extract(
            shortcode_atts(
                array(
					'style'              => '',
					'title'              => '',
					'title_span'         => '',
					'title_tag'          => 'h2',
					'title_case'         => '',
					'subtitle_case'      => '',
					'title_color'        => '',
					'title_span_color'   => '',
					'title_border_color' => '',
					'gap_padding'        => '',
					'sub_text'           => '',
					'sub_text_color'     => '',
					'text_color'         => '',
					'description'        => '',
					'align'              => '',
					'headingbg'          => '',
					'el_class'           =>'',
					'css'                => ''
                ), 
                $atts, 'vc_infobox'
            )
        );

        $a = shortcode_atts(array(
          'headingbg' => 'headingbg',
        ), $atts);
        $img = wp_get_attachment_image_src($a["headingbg"], "large");
        $imgSrc = $img[0];

		//for css edit box value extract
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		
        //custom class added
		$wrapper_classes  = array($el_class) ;			
		$class_to_filter  = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
		
		$title_color    = ($title_color) ? ' style="color: '.$title_color.'"' : '';
		$title_span_color    = ($title_span_color) ? ' style="color: '.$title_span_color.'"' : '';
		$sub_text_border = ($sub_text_color) ? $sub_text_color : '';
		$sub_text_color = ($sub_text_color) ? ' style="color: '.$sub_text_color.'"' : '';
		$text_color     = ($text_color) ? ' style="color: '.$text_color.'"' : '';
		$gap_padding     = ($gap_padding) ? ' style="padding: '.$gap_padding.'"' : '';
		$title_case = ($title_case=="true") ? 'title-upper' : '';
		$subtitle_case = ($subtitle_case=="true") ? 'title-upper' : '';
		$title_span       = ($title_span) ? '<span'.$title_span_color.'>'.wp_kses_post($title_span).'</span>' : '';
		$sub_text       = ($sub_text) ? '<span'.$sub_text_color.' data-border-color="'.$sub_text_border.'" class="sub-text '.$subtitle_case.'">'.wp_kses_post($sub_text).'</span>' : '';




		if(!empty($title)):
		$main_title     = ($title) ? '<'.$title_tag.' class="title '.$title_case.'"'.$title_color.'>'.wp_kses_post($title).' '.$title_span.'</'.$title_tag.'>' : '';
	   else:
	   	   $main_title     =  '<'.$title_tag.' class="title '.$title_case.'"'.$title_color.'></'.$title_tag.'>' ;
	   endif;

	

		$titleimg  = $imgSrc ? '<div class="title-img"><img src="'.$imgSrc.'" alt=""/></div>' : '';

	
        // Fill $html var with data
        $html = '
        <div class="rs-heading '.$style.' '.$css_class.' '.$css_class_custom.' '.$align.'">
        	<div class="title-inner" '.$gap_padding.' data-border-color="'.$title_border_color.'">
        		'.$titleimg.'
	            '.$sub_text.'
	            '.$main_title.'
	        </div>';
	        if ($content) {
            	$html .= '<div class="description" '.$text_color.'>'.force_balance_tags($content).'</div>';
        	}
        $html .= '</div>';  	
         
        return $html;         
    }
add_shortcode( 'vc_infobox', 'vc_infobox_html' );