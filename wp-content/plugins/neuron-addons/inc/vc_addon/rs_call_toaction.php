<?php
/*
Element Description:  Call to Box
*/
 
// Element Class 

function rs_call_to_action() {   

  // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Call to Action', 'neuron_addon'),
                'base' => 'vc_rsCallBox',
                'description' => __('Call to Action Information', 'neuron_addon'), 
                'category' => __('by AuburnForest', 'neuron_addon'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array( 

                	array(
	                    "type" => "dropdown",
	                    "heading" => __("Select Style", 'neuron_addon'),
	                    "param_name" => "cta_style",
	                    "value" => array(
							__( 'Style 1', 'neuron_addon') => 'Style 1',
							__( 'Style 2', 'neuron_addon') => 'Style 2',
							__( 'Style 3', 'neuron_addon') => 'Style 3',
	                    ),
	                ), 
	                         
                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'class' => 'title-class',
                        'heading' => __( 'Title', 'neuron_addon' ),
                        'param_name' => 'cta_title',
                        'value' => __( '', 'neuron_addon' ),
                        'description' => __( 'Call to action title here', 'neuron_addon' ),
                        'admin_label' => false,
                        'weight' => 0,                       
                    ),

                    array(
                        'type' => 'textfield',
                        'holder' => 'h3',
                        'heading' => __( 'Sub Title', 'neuron_addon' ),
                        'param_name' => 'cta_subtitle',
                        'value' => __( '', 'neuron_addon' ),
                        'description' => __( 'Call to action sub title here', 'neuron_addon' ),
                        'admin_label' => false,
                        'weight' => 0,                       
                    ),

                    array(
						'type'        => 'textarea_html',
						'heading'     => __( 'Text', 'neuron_addon'),
						'param_name'  => 'content',
						'value'       => __( '', 'neuron_addon'),
						'description' => __( 'Description text here', 'neuron_addon'),                    
					),

                    array(
						"type"        => "attach_image",
						"heading"     => __( "Call to Action Logo", 'neuron_addon' ),
						"description" => __( "Add cta logo here", 'neuron_addon' ),
						"param_name"  => "cta_logo",
						"value"       => "",
					),								
										
					array(
                        'type' => 'textfield',
                        'holder' => 'h4',
                        'class' => 'tag-btn',
                        'heading' => __( 'Button Text', 'neuron_addon' ),
                        'param_name' => 'tag_btn',
                        'value' => __( '', 'neuron_addon' ),
                        'description' => __( 'Tag line button text here', 'neuron_addon' ),
                        'admin_label' => false,
                        'weight' => 0,                        
                    ),	
					
					array(
						'type' => 'vc_link',
						'heading' => __( 'Button URL (Link)', 'neuron_addon' ),
						'param_name' => 'tag_link',
						'description' => __( 'Add link to button.', 'neuron_addon' ),
					),

					array(
                        'type' => 'textfield',
                        'holder' => 'p',
                        'class' => 'btn-hints',
                        'heading' => __( 'Button Below Text', 'neuron_addon' ),
                        'param_name' => 'btn_hints',
                        'value' => __( '', 'neuron_addon' ),
                        'description' => __( 'Button below text here', 'neuron_addon' ),
                        'admin_label' => false,
                        'weight' => 0,                        
                    ),
																	
					 array(
						'type' => 'textfield',
						'heading' => __( 'Extra class name', 'neuron_addon' ),
						'param_name' => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'neuron_addon' ),
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Title color", 'neuron_addon' ),
						"param_name" => "title_color",
						"value" => '#ea4c23', //Default Red color
						"description" => __( "Choose title color", 'neuron_addon' ),
                        'group' => 'Style',
					 ),

					array(
                        'type' => 'textfield',
                        'class' => 'title-fontsize',
                        'heading' => __( 'Title Font Size', 'neuron_addon' ),
                        'param_name' => 'title_fontsize',
                        'value' => __( '40px', 'neuron_addon' ),
                        'description' => __( 'Enter title font size here', 'neuron_addon' ),
                        'group' => 'Style',                      
                    ),
					 
					 array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Sub Title Color", 'neuron_addon' ),
						"param_name" => "subtitle_color",
						"value" => '#fff', //Default Red color
						"description" => __( "Choose sub title color", 'neuron_addon' ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					 ),					

					 array(
                        'type' => 'textfield',
                        'class' => 'title-fontsize',
                        'heading' => __( 'Sub Title Font Size', 'neuron_addon' ),
                        'param_name' => 'subtitle_fontsize',
                        'value' => __( '20px', 'neuron_addon' ),
                        'description' => __( 'Enter sub title font size here', 'neuron_addon' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',        
                    ),                    
					
					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Description Color", 'neuron_addon' ),
						"param_name" => "desc_color",
						"value" => '#666', //Default Red color
						"description" => __( "Choose description color", 'neuron_addon' ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					),

					array(
                        'type' => 'textfield',
                        'class' => 'desc-fontsize',
                        'heading' => __( 'Description Font Size', 'neuron_addon' ),
                        'param_name' => 'desc_fontsize',
                        'value' => __( '15px', 'neuron_addon' ),
                        'description' => __( 'Enter description font size here', 'neuron_addon' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',        
                    ),

                    array(
                        'type' => 'textfield',
                        'class' => 'desc_lheight',
                        'heading' => __( 'Description Line Height', 'neuron_addon' ),
                        'param_name' => 'desc_lheight',
                        'value' => __( '25px', 'neuron_addon' ),
                        'description' => __( 'Enter description line height here', 'neuron_addon' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',        
                    ),

					 array(
                        'type' => 'textfield',
                        'class' => 'hints-fontsize',
                        'heading' => __( 'Note Text Font Size', 'neuron_addon' ),
                        'param_name' => 'hints_fontsize',
                        'value' => __( '12px', 'neuron_addon' ),
                        'description' => __( 'Enter note font size here', 'neuron_addon' ),
                        'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',                      
                    ),

					 array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button Background Color", 'neuron_addon' ),
						"param_name" => "btn_bg",
						"value" => '#ea4c23',
						"description" => __( "Choose button background color", 'neuron_addon' ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button Border Color", 'neuron_addon' ),
						"param_name" => "btn_border_color",
						"value" => '#ea4c23',
						"description" => __( "Choose button border color", 'neuron_addon' ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button Color", 'neuron_addon' ),
						"param_name" => "btn_text_color",
						"value" => '#fff',
						"description" => __( "Choose button color", 'neuron_addon' ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button Hover Background Color", 'neuron_addon' ),
						"param_name" => "btn_hover_bg",
						"value" => '#d0401b',
						"description" => __( "Choose hover button background color", 'neuron_addon' ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button Hover Border Color", 'neuron_addon' ),
						"param_name" => "btn_hoverborder",
						"value" => '#d0401b',
						"description" => __( "Choose hover button border color", 'neuron_addon' ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Button Hover Text Color", 'neuron_addon' ),
						"param_name" => "btn_hover_text_color",
						"value" => '#fff',
						"description" => __( "Choose hover button color", 'neuron_addon' ),
						'admin_label' => false,
                        'weight' => 0,
                        'group' => 'Style',
					),
					
					array(
					'type' => 'css_editor',
					'heading' => __( 'CSS box', 'neuron_addon' ),
					'param_name' => 'css',
					'group' => __( 'Design Options', 'neuron_addon' ),
				),            
                        
                ),
				
					
            )
        );                                
        
    }
	
add_action( 'vc_before_init', 'rs_call_to_action' );

/*
*
* @param array $atts    - the attributes of shortcode
* @param string $content - the content between the shortcodes tags
*
* @return string $html - the HTML content for this shortcode.
*/
// Element HTML
 function vc_rsCallBox_html( $atts, $content ) {
         $attributes = array();
        // Params extraction
         extract(
			$atts = shortcode_atts(	
                array(
					'cta_style'            => 'Style 1',
					'cta_title'            => '',
					'cta_subtitle'         => '',
					'cta_logo'             => '',
					'tag_btn'              => '',
					'tag_link'             => '',
					'btn_hints'            =>'',
					'hints_fontsize'       =>'12px',
					'title_color'          => '#ea4c23',
					'title_fontsize'       => '40px',
					'subtitle_color'       => '',
					'desc_color'           => '#666',
					'subtitle_fontsize'    => '20px',
					'desc_fontsize'        => '15px',
					'desc_lheight'         => '25px',
					'btn_bg'               => '#ea4c23',
					'btn_border_color'     => '#ea4c23',
					'btn_text_color'       => '#fff',
					'btn_hover_bg'         => '#d0401b',
					'btn_hoverborder'      => '#d0401b',
					'btn_hover_text_color' => '#fff',					
					'el_class'             =>'',
					'css'                  => ''
                ), 
                $atts,'vc_rsCallBox'
            )
        );

         $a = shortcode_atts(array(
          'cta_logo' => 'cta_logo',
        ), $atts);
        $img = wp_get_attachment_image_src($a["cta_logo"], "large");
        $imgSrc = $img[0];

		//extract content
		$atts['content'] = $content;
		//extract css edit box
		$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
		//parse link for vc link		
		$tag_link = ( '||' === $tag_link ) ? '' : $tag_link;
		$tag_link = vc_build_link( $tag_link );
		$use_link = false;
		if ( strlen( $tag_link['url'] ) > 0 ) {
			$use_link = true;
			$a_href = $tag_link['url'];
			$a_title = $tag_link['title'];
			$a_target = $tag_link['target'];
		}
		
		if ( $use_link ) {
			$attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
			$attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
			if ( ! empty( $a_target ) ) {
				$attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
			}
		}
		$attributes = implode( ' ', $attributes );
		
		 //custom class added
		$wrapper_classes = array($el_class) ;			
		$class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );		
		$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );
		$btn_style = '';
		$description = '';
		$sub_title_style = '';

		if(!empty($title_fontsize) && empty($title_color)){
			$title_style = 'style="font-size: '.$title_fontsize.'; line-height: 1.2 "';				
		}
		if(!empty($title_color)){
			$title_style = ($title_color) ? ' style="color: '.$title_color.'"' : '';
			if(!empty($title_fontsize)){
				$title_style = 'style="color: '.$title_color.'; font-size: '.$title_fontsize.'; line-height: 1.2 "';				
			}
		}

		if(!empty($subtitle_fontsize) && empty($subtitle_color)){
			$sub_title_style = 'style="font-size: '.$subtitle_fontsize.'; "';				
		}
		if(!empty($subtitle_color)){
			$sub_title_style = ($subtitle_color) ? ' style="color: '.$subtitle_color.'"' : '';
			if(!empty($title_fontsize)){
				$sub_title_style = 'style="color: '.$subtitle_color.'; font-size: '.$subtitle_fontsize.'; "';			
			}
		}

		$desc_style = "";
		if ( !empty($desc_fontsize) ) { 
			$desc_style .= 'font-size: '.$desc_fontsize.';';				
		}
		if ( !empty($desc_color) ) { 
			$desc_style .= 'color: '.$desc_color.';';				
		}
		
		if ( !empty($desc_lheight) ) { 
			$desc_style .= 'line-height: '.$desc_lheight.';';				
		}

		if( !empty($hints_fontsize) ){
			$hints_style = 'style="font-size: '.$hints_fontsize.'; line-height: '.$hints_fontsize.' "';				
		}

		if(!empty($btn_bg)){
			$btn_style .= 'background: '.$btn_bg.';';				
		}
		if(!empty($btn_border_color)){
			$btn_style .= 'border-color: '.$btn_border_color.';';				
		}
		if(!empty($btn_text_color)){
			$btn_style .= 'color: '.$btn_text_color.';';
		}
		

		$cta_title    = ($cta_title) ? '<h2 '.$title_style.' class="exp-title">'.$atts['cta_title'].'</h2>' : "";
		$cta_style_class    = ($cta_style=="Style 1") ? 'style1' : "style2";		
		$cta_subtitle = ($cta_subtitle) ? '<p '.$sub_title_style.' class="eta-subtitle">'.$atts['cta_subtitle'].'</p>' : "";
		$btn_hints    = ($btn_hints) ? '<p '.$hints_style.' class="cta-hints">'.$atts['btn_hints'].'</p>' : "";
		$imgSrc       = ($imgSrc) ? '<div class="title-img"><img src="'.$imgSrc.'" alt="" /></div>' : '';
		if ($content) {
            $description = '<div class="description" style="'.$desc_style.'">'.balanceTags($atts['content'], true).'</div>';
       	}
      	
      	if("Style 1"==$cta_style){
	      	if(!empty($imgSrc)){
		        $html = '
			        <div class="rs-cta '.$css_class_custom.'">
						<div class="cta-wrap '.$cta_style_class.' '.$css_class.'">
							<div class="row">
								<div class="col-lg-5 hidden-md">
									'.$imgSrc.'
								</div>
								<div class="col-lg-7">
									<div class="vertical-middle">
										<div class="vertical-middle-cell title-wrap discount-title">
											'.$cta_subtitle.'
											'.$cta_title.'
											'.$description.'
											<div class="button-wrap">
												<a style="'.$btn_style.'" '. $attributes .' data-leavebg="'.$btn_bg.'" data-leaveborder="'.$btn_border_color.'" data-leavecolor="'.$btn_text_color.'" data-hoverbg="'.$btn_hover_bg.'" data-hoverborder="'.$btn_hoverborder.'" data-hovertext="'.$btn_hover_text_color.'">'.$tag_btn.'</a>
											</div>
										</div>
									</div>


								</div>							
								
							</div>
						</div>
					</div>';
			}
			if(empty($imgSrc)){
		        $html = '
			        <div class="rs-cta '.$css_class_custom.'">
						<div class="cta-wrap '.$cta_style_class.' '.$css_class.'">
							<div class="row">
								<div class="col-lg-9">
									<div class="vertical-middle">
										<div class="vertical-middle-cell title-wrap">
											'.$cta_title.'
											'.$cta_subtitle.'
											'.$description.'
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="text-right vertical-middle">
										<div class="vertical-middle-cell button-wrap">
											<a style="'.$btn_style.'" ' . $attributes . ' class="readon" data-leavebg="'.$btn_bg.'" data-leaveborder="'.$btn_border_color.'" data-leavecolor="'.$btn_text_color.'" data-hoverbg="'.$btn_hover_bg.'" data-hoverborder="'.$btn_hoverborder.'" data-hovertext="'.$btn_hover_text_color.'">'.$tag_btn.'</a>
											'.$btn_hints.'
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>';
			}
			
        }
        if("Style 2"==$cta_style){
	      	if(!empty($imgSrc)){
		        $html = '
			        <div class="rs-cta '.$css_class_custom.'">
						<div class="cta-wrap '.$cta_style_class.' '.$css_class.'">
							'.$imgSrc.'
							<div class="title-wrap">
								'.$cta_title.'
								'.$cta_subtitle.'
								'.$description.'
							</div>
							<div class="button-wrap">
								<a style="'.$btn_style.'" ' . $attributes . ' class="readon" data-leavebg="'.$btn_bg.'" data-leaveborder="'.$btn_border_color.'" data-leavecolor="'.$btn_text_color.'" data-hoverbg="'.$btn_hover_bg.'" data-hoverborder="'.$btn_hoverborder.'" data-hovertext="'.$btn_hover_text_color.'">'.$tag_btn.'</a>
								'.$btn_hints.'
							</div>
						</div>
					</div>';
			}
			if(empty($imgSrc)){
		        $html = '
			        <div class="rs-cta '.$css_class_custom.'">
						<div class="cta-wrap '.$cta_style_class.' '.$css_class.'">
							<div class="title-wrap">
								'.$cta_title.'
								'.$cta_subtitle.'
								'.$description.'
							</div>
							<div class="button-wrap">
								<a style="'.$btn_style.'" ' . $attributes . ' class="readon" data-leavebg="'.$btn_bg.'" data-leaveborder="'.$btn_border_color.'" data-leavecolor="'.$btn_text_color.'" data-hoverbg="'.$btn_hover_bg.'" data-hoverborder="'.$btn_hoverborder.'" data-hovertext="'.$btn_hover_text_color.'">'.$tag_btn.' </a>
								'.$btn_hints.'
							</div>
						</div>
					</div>';
			}
			
        }
        if("Style 3"==$cta_style){
	      	if(!empty($imgSrc)){
		        $html = '
			        <div class="rs-cta '.$css_class_custom.' rs-cat-style3">
						<div class="cta-wrap '.$css_class.'">
						    <div class="container">
							<div class="row">
								<div class="col-lg-7">
									<div class="vertical-middle">
										<div class="vertical-middle-cell title-wrap">
											'.$cta_title.'
											'.$cta_subtitle.'
											'.$description.'
											<div class="button-wrap">
												<a style="'.$btn_style.'" ' . $attributes . ' class="readon" data-leavebg="'.$btn_bg.'" data-leaveborder="'.$btn_border_color.'" data-leavecolor="'.$btn_text_color.'" data-hoverbg="'.$btn_hover_bg.'" data-hoverborder="'.$btn_hoverborder.'" data-hovertext="'.$btn_hover_text_color.'">'.$tag_btn.'</a>
												'.$btn_hints.'
											</div>
										</div>
										
									</div>
								</div>
								<div class="col-lg-5 mobl-mt40">
									<div class="text-right vertical-middle">
										<div class="vertical-middle-cell">
											'.$imgSrc.'
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>';
			}
			if(empty($imgSrc)){
		        $html = '
			        <div class="rs-cta '.$css_class_custom.' rs-ctabg-style3">
						<div class="cta-wrap '.$css_class.'">
						 <div class="container">
							<div class="row">
								<div class="col-lg-9">
									<div class="vertical-middle">
										<div class="vertical-middle-cell title-wrap">
											'.$cta_title.'
											'.$cta_subtitle.'
											'.$description.'
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<div class="text-right vertical-middle">
										<div class="vertical-middle-cell button-wrap">
											<a style="'.$btn_style.'" ' . $attributes . ' class="pry-btn" data-leavebg="'.$btn_bg.'" data-leaveborder="'.$btn_border_color.'" data-leavecolor="'.$btn_text_color.'" data-hoverbg="'.$btn_hover_bg.'" data-hoverborder="'.$btn_hoverborder.'" data-hovertext="'.$btn_hover_text_color.'">'.$tag_btn.'</a>
											'.$btn_hints.'
										</div>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>';
			}			
        }     
	return $html;
  }
add_shortcode( 'vc_rsCallBox', 'vc_rsCallBox_html' );
?>