<?php
/*
Element Description: Rs Services Box
*/
	if ( !defined( 'WPB_VC_VERSION' ) ) {
		return;
	}
	// Element Mapping
	if ( !class_exists( 'AuburnForest_Pricetable' ) ) {   
	 
		class AuburnForest_Pricetable extends AuburnForest_VC_Modules {
			public function __construct(){
				$this->name = __( "Price Table", 'neuron_addon' );
				$this->base = 'vc_RsPriceBox';				
				parent::__construct();
			}
			
			public function fields(){
				$fields = array(
					array(
						"type"        => "textfield",
						"heading"     => __("Title", 'neuron_addon'),
						"param_name"  => "title",
						"holder"      => "h3",
						"value"       => "",
						"description" => __("Enter the text <strong>BLANK</strong> to create a blank spacer area.", 'neuron_addon')
					),

					array(
						"type"        => "textfield",
						"heading"     => __("Sub Title", 'neuron_addon'),
						"param_name"  => "subtitle",
						"holder"      => "h4",
						"value"       => "",
						"description" => __("Enter the text <strong>BLANK</strong> to create a blank spacer area.", 'neuron_addon')
					),				
																												
					array(
						"type"                  => "checkbox",
						"class"                 => "",
						"heading"               => __("Featured Plan", 'neuron_addon'),
						"param_name"            => "featured",
						"value"                 =>  array(
						__('Enable', 'neuron_addon') => "true", 
						)
					),

					array(
						"type"        => "textfield",
						"heading"     => __("Featured Text", 'neuron_addon'),
						"param_name"  => "feature_text",
						"value"       => "",
						"description" => __("Enter the text <strong>BLANK</strong> to create a blank spacer area.", 'neuron_addon')
					),					
																	
					array(
						"type"        => "textfield",
						"heading"     => __("Price", 'neuron_addon'),
						"param_name"  => "price",
						"value"       => "20",
						"description" => __("Enter price.", 'neuron_addon')
					),

					array(
						"type"        => "textfield",
						"heading"     => __("Currency", 'neuron_addon'),
						"param_name"  => "currency",
						"value"       => "$",
						"description" => __("E.g. $", 'neuron_addon')
					),

					array(
						"type"        => "textfield",
						"heading"     => __("Per", 'neuron_addon'),
						"param_name"  => "per",
						"value"       => "",
						"description" => __("E.g. / mo", 'neuron_addon')
					),	

					array(
						"type"        => "textarea_html",
						"holder"      => "div",
						"class"       => "",
						"heading"     => __("Content", 'neuron_addon'),
						"param_name"  => "content",
						"value"       => __("<ul><li>Feature</li><li>Feature</li><li>Feature</li></ul>", 'neuron_addon'),
						"description" => __("See Font Awesome <a href=\"http://fortawesome.github.io/Font-Awesome/icons/\" target=\"_blank\">Icons</a> : Enter Icon Name e.g.<strong> fa-compass</strong>", 	'neuron_addon')
					),	
						
					array(
						"type"       => "dropdown",
						"heading"    => __("Select Style", 'neuron_addon'),
						"param_name" => "style",
						"value" => array(							
							'Style1' => "style1", 
							'Style2' => "style2",
							'Style3' => "style3",												
						),
						"group" => __('Styles', 'neuron_addon')
					),

					array(
						"type"       => "colorpicker",
						"heading"    => __("Price Boxes Background", 'neuron_addon'),
						"param_name" => "boxes_color",
						'value'      => '#f9f9f9',
						"group"      => __('Styles', 'neuron_addon')
					),

				
					array(
						"type"        => "attach_image",
						"heading"     => __( "Price Box Icon", 'neuron_addon' ),
						"description" => __( "Add icon", 'neuron_addon' ),
						"param_name"  => "icon_image",
						"value"       => "",
						"group" => __('Styles', 'neuron_addon'),
						"dependency" => Array('element' => 'style', 'value' => array('style2')),
					),

					array(
						"type"        => "attach_image",
						"heading"     => __( "Top Area Background", 'neuron_addon' ),
						"description" => __( "Add Image", 'neuron_addon' ),
						"param_name"  => "bg_image",
						"value"       => "",
						"group" => __('Styles', 'neuron_addon'),
						"dependency" => Array('element' => 'style', 'value' => array('style2')),
					),				
					

					array(
						"type" => "colorpicker",
						"heading" => __("Price Color", 'neuron_addon'),
						"param_name" => "price_color",
						"value" => "",
						"group" => __('Styles', 'neuron_addon')
					),		
									
					array(
						"type"       => "colorpicker",
						"heading"    => __("Title Color", 'neuron_addon'),
						"param_name" => "title_color",
						"value"      => "",
						"group"      => __('Styles', 'neuron_addon')
					),
				
					array(
						"type"       => "colorpicker",
						"heading"    => __("Title Area Background Color", 'neuron_addon'),
						"param_name" => "title_background",
						"value"      => "",
						"group"      => __('Styles', 'neuron_addon'),
						"dependency" => Array('element' => 'style', 'value' => array('style3')),	
					),	
					
					array(
						"type"       => "colorpicker",
						"heading"    => __("Subtitle Color", 'neuron_addon'),
						"param_name" => "subtitle_color",
						"value"      => "",
						"group"      => __('Styles', 'neuron_addon')
					),	
						
					array(
						"type"       => "colorpicker",
						"heading"    => __("Feature Highlight Color", 'neuron_addon'),
						"param_name" => "highlight_color",
						"value"      => "#fff",
						"group"      => __('Styles', 'neuron_addon')
					),					
					
					array(
						"type"       => "colorpicker",
						"heading"    => __("Feature Highlight Border Color", 'neuron_addon'),
						"param_name" => "highlight_border_color",
						"value"      => "#e1e1e1",
						"group"      => __('Styles', 'neuron_addon')
					),					
												
														
					array(
						"type" => "colorpicker",
						"heading" => __("Text Color", 'neuron_addon'),
						"param_name" => "text_color",
						"value" => "",
						"group" => __('Styles', 'neuron_addon')
					),	
					
					array(
						"type" => "dropdown",
						"heading" => __("Button Settings", 'neuron_addon'),
						"param_name" => "btn",
						"value" => array(							
							'Button Link' => "btn_link", 
							'Button Code' => "btn_code", 						
						),
						
					),
					
					array(
						"type"       => "textfield",
						"heading"    => __("Button Text", 'neuron_addon'),
						"param_name" => "button_text",
						"value"      => "Select",
						"dependency" => Array('element' => 'btn', 'value' => array('btn_link')),
					),

					array(
						'type'        => 'vc_link',
						'heading'     => __( 'URL (Link)', 'neuron_addon' ),
						'param_name'  => 'button_link',
						'description' => __( 'Add link to button.', 'neuron_addon' ),
						"dependency"  => Array('element' => 'btn', 'value' => array('btn_link')),
					),

					array(
						"type"       => "textarea_raw_html",
						"heading"    => __("Button Code", 'neuron_addon'),
						"param_name" => "button_code",	
						"value"      => "",	
						"dependency" => Array('element' => 'btn', 'value' => array('btn_code')),					
					),

					array(
						"type"       => "colorpicker",
						"heading"    => __("Boxes Border Color", 'neuron_addon'),
						"param_name" => "boxes_border_color",
						"value"      => "#e1e1e1",
						"group"      => __('Styles', 'neuron_addon')
					),
						
					array(
						"type"       => "colorpicker",
						"heading"    => __("Featured Boxes Border Color", 'neuron_addon'),
						"param_name" => "featured_border_color",
						"value"      => "#4caf50",
						"group"      => __('Styles', 'neuron_addon')
					),
					

					array(
						"type" => "colorpicker",
						"heading" => __("Button Background", 'neuron_addon'),
						"param_name" => "button_color",	
						"value" => "",	
						"group" => __('Styles', 'neuron_addon'),
						"dependency" => Array('element' => 'style', 'value' => array('style3')),					
					),

					array(
						"type" => "colorpicker",
						"heading" => __("Button Text Color", 'neuron_addon'),
						"param_name" => "button_text_color",	
						"value" => "",	
						"group" => __('Styles', 'neuron_addon'),
						"dependency" => Array('element' => 'style', 'value' => array('style3')),					
					),

					array(
						"type" => "colorpicker",
						"heading" => __("Button Hover Color", 'neuron_addon'),
						"param_name" => "button_hover_color",	
						"value" => "",	
						"group" => __('Styles', 'neuron_addon'),
						"dependency" => Array('element' => 'style', 'value' => array('style3')),					
					),	

					array(
						"type" => "colorpicker",
						"heading" => __("Button Hover Background", 'neuron_addon'),
						"param_name" => "button_hover_background",	
						"value" => "",	
						"group" => __('Styles', 'neuron_addon'),
						"dependency" => Array('element' => 'style', 'value' => array('style3')),						
					),
				);
				return $fields;
			}

			// Element HTML
		    public function shortcode( $atts, $content = '' ) {
		    	$attributes = array();
		        // Params extraction
			    extract(
					$atts = shortcode_atts(	
						array(
							'title'                   => '',
							'subtitle'                => '',
							'price'                   => '20',
							'currency'                => '$',
							'featured'                => '',
							'feature_text'            => '',
							'per'                     => '',		
							'button_text'             => 'Select',
							'button_link'             => '',
							'style'                   => 'style1',
							'boxes_color'             => '#f9f9f9',
							'inner_color'             => '',
							'highlight_color'         => '#fff',
							'highlight_border_color'  => '#e1e1e1',
							'boxes_border_color'      => '#e1e1e1',
							'featured_border_color'   => '#4caf50',
							'inner_border'            => '',
							'title_color'             => '',
							'price_color'             => '',							
							'icon_image'              => '',
							'bg_image'				  => '',	
							'title_background'        => '',
							'subtitle_color'          => '',
							'background_color'        => '',
							'button_hover_color'      => '',
							'button_hover_background' => '',
							'text_color'              => '',
							'btn'                     => '',
							'button_code'             => '',
							'button_color'            => '#0c1f28',
							'button_text_color'       => '#fff',	
							
						), $atts, 'vc_RsPriceBox'
					)	
				);

		        $a = shortcode_atts(array(					
					'icon_image' => 'icon_image',
					'bg_image'   => 'bg_image',
			    ), $atts);
			  
			    $icons = wp_get_attachment_image_src($a["icon_image"], "large");
			    $iconSrc = $icons[0];

			    $titlebg = wp_get_attachment_image_src($a["bg_image"], "large");
			    $titlebg = $titlebg[0];

			    if ($iconSrc) {
					$iconbg ='<div class="price-icon"><img style="background:'.$atts['highlight_color'].';" src="'.$iconSrc.'" alt="Price Icon" /></div>';
					$watermark ='<div class="water-mark"><img src="'.$iconSrc.'" alt="Water Mark Icon" /></div>';
			    }else{
					$iconbg    = "";
					$watermark = "";
			    }

					//parse link for vc linke
					$html="";		
					$button_link = ( '||' === $button_link ) ? '' : $button_link;
					$button_link = vc_build_link( $button_link );
					$use_link = false;
					if ( strlen( $button_link['url'] ) > 0 ) {
						$use_link = true;
						$a_href = $button_link['url'];
						$a_title = $button_link['title'];
						$a_target = $button_link['target'];
					}

					$boxes_color = ($boxes_color) ? 'style="background: '.$boxes_color.'"' : '';
					
					if ( $use_link ) {
						$attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
						$attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
						if ( ! empty( $a_target ) ) {
							$attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
						}
					}
					$attributes = implode( ' ', $attributes );

					//content extraxt
					$atts['content'] = $content;			
					$btncode= rawurldecode( base64_decode( strip_tags( $atts['button_code'] ) ) );
					
					$dir = plugin_dir_path( __FILE__ );
					
					//Buttonn setup

					if( $atts['btn'] == 'btn_code' ){
						$btn_code='<div class="btn-code">'.$btncode.'</div>';
					}					
					else if($atts['style']=='style2'){
						$btn_code='<a '. $attributes.' class="btn-table btn-1 readon" data-hoverbg="'.$button_hover_background.'" data-hovercolor="'.$button_hover_color.'" data-leavebg="'.$atts['button_color'].'" data-leavecolor="'.$atts['button_text_color'].'">'. $atts['button_text'].'</a> ';
					}
					
					else if($atts['style']=='style3'){
						$btn_code=' <a '. $attributes.' style="background:'.$atts['button_color'].'; color:'.$atts['button_text_color'].';"   class="btn-table btn-1">'.$atts['button_text'].'</a> ';
					}				
				
					
					else{
						$btn_code= '<a '. $attributes.' class="btn-table btn-1 readon">'. $atts['button_text'].'</a>';
					}
					
					//featured check
					$featured='';
					$featured_class='';
					
					if( $atts['featured'] == 'true' ){
						if($atts['feature_text']!=''){
						$featured = '<span class="popular">' .$atts['feature_text'].'</span>';
						}
						$featured_class='featured';
						$popular='popular_plan';
					}


				//checking Price Table style
	                
		        // Fill $html var with data

		        switch ( $style ) {

		    		case 'style1':
						$template = 'price-table-style1';
						break;

					case 'style2':
						$template = 'price-table-style2';
						break;

					case 'style3':
						$template = 'price-table-style3';
						break;					

					default:
						$template = 'price-table-style1';
						break;
				}
				return $this->template( $template, get_defined_vars() );
		    }
		}
	}	
	new AuburnForest_Pricetable;
 