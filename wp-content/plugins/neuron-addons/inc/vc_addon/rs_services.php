<?php
/*
Element Description: Rs Services Box
*/
	if ( !defined( 'WPB_VC_VERSION' ) ) {
		return;
	}

	// Element Mapping
	if ( !class_exists( 'AuburnForest_Service_Box' ) ) {   
	 
		class AuburnForest_Service_Box extends AuburnForest_VC_Modules {
			public function __construct(){
				$this->name = __( "Service Box", 'rsaddon' );
				$this->base = 'vc_RsServices';				
				parent::__construct();
			}
			
			public function fields(){
				$fields = array(
					array(
						"type" => "dropdown",
						"heading" => __("Select Sevices Style", "rsaddon"),
						"param_name" => "service_style",
						"value" => array(						    
							'Default' => "Default",						
							'Style 1' => "Style 1",						
							'Style 2' => "Style 2",						
							'Style 3' => "Style 3",				
						),						
					),   

					
					array(
	                    'type' => 'textfield',
	                    'holder' => 'h3',
	                    'class' => 'title-class',
	                    'heading' => __( 'Rs Service Title ', 'rsaddon' ),
	                    'param_name' => 'title',
	                    'value' => __( '', 'rsaddon' ),
	                    'description' => __( 'Rs services title here', 'rsaddon' ),
	                    'admin_label' => false,
	                    'weight' => 0,                       
	                ),

	                array(
	                    'type' => 'textfield',
	                    'heading' => __( 'Rs Service Subtitle ', 'rsaddon' ),
	                    'param_name' => 'subtilte',
	                    'value' => __( '', 'rsaddon' ),
	                    'description' => __( 'Rs services subtitle here', 'rsaddon' ),  
	                     "dependency" => Array('element' => 'service_style', 'value' => array('Default', 'Style 1')),                
	                ),

	                array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						"admin_label" => false,
						"heading" => __( "Title Font Size", 'rsaddon' ),
						"param_name" => "title_size",
						'description' => __( 'Title font size in px. eg 20. If not defined, default h3 font size will be used', 'rsaddon' ),
					),

					array(
					    "type" => "dropdown",
					    "heading" => __("Title Uppercase", "rsaddon"),
					    "param_name" => "title_transform",
					    'description' => __( 'Make service title in uppercase', 'rsaddon' ),
					    "value" => array(
					        __( 'No', 'rsaddon')   => '',
					        __( 'Yes', 'rsaddon') => 'title-upper',
					    ),
					    "dependency" => Array('element' => 'service_style', 'value' => array('Style 9', 'Style 7', 'Style 10', 'Style 11')),
					),

					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						'admin_label' => false,
						"heading" => __( "Spacing Before Title", 'rsaddon' ),
						"param_name" => "spacing_top",
						"description" => __( "Spacing between icon and title in px eg. 25", 'rsaddon' ),
					),
					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						'admin_label' => false,
						"heading" => __( "Spacing After Title", 'rsaddon' ),
						"param_name" => "spacing_bottom",
						"description" => __( "Spacing between title and content in px eg. 12", 'rsaddon' ),
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						'admin_label' => false,
						"heading" => __( "Service Title Color", "rsaddon" ),
						"param_name" => "title_color",
						"value" => '',
						"description" => __( "Choose title color", "rsaddon" ),
						'group' => 'Styles',

		               
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Service Title Hover Color", "rsaddon" ),
						"param_name" => "title_hovercolor",
						'admin_label' => false,
						"value" => '',
						"description" => __( "Choose title hover color", "rsaddon" ),
						'group' => 'Styles',
		                
					),


					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Service Subtitle Color", "rsaddon" ),
						"param_name" => "subtitle_color",
						"value" => '',
						"description" => __( "Choose Subtitle color", "rsaddon" ),
						"dependency" => Array('element' => 'service_style', 'value' => array('Default', 'Style 1')),	
						'group' => 'Styles',

					), 


	                array(
						"type" => "textarea_html",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Services content here", "rsaddon" ),
						"param_name" => "content", // Important: Only one textarea_html param per content element allowed and it should have "content" as a 	"param_name"
						"value" =>'',
						"description" => __( "Duis in mi erat. Phasellus vitae in to lorem vehicula, viverra libero quis, sodalesnulla. Donec at the turpis quis tellus laoreet.", "rsaddon" ),
						"dependency" => Array('element' => 'service_style', 'value' => array('Default', 'Style 1',  'Style 2', 'Style 3', 'Style 4', 'Style 6', 'Style 7', 'Style 9', 'Style 10', 'Style 11')),	

					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Service Description Color", "rsaddon" ),
						"param_name" => "desc_color",
						"value" => '',
						"description" => __( "Choose description color", "rsaddon" ),
						'group' => 'Styles',

					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Service Description Hover Color", "rsaddon" ),
						"param_name" => "desc_hovercolor",
						'admin_label' => false,
						"value" => '',
						"description" => __( "Choose Description hover color", "rsaddon" ),
						'group' => 'Styles',
					             
					), 


					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Service Content Background Color", "rsaddon" ),
						"param_name" => "desc_bg",
						"value" => '',
						"description" => __( "Choose description Background color", "rsaddon" ),
						"dependency" => Array('element' => 'service_style', 'value' => array('Default', 'Style 1', 'Style 2',  'Style 3')),
						'group' => 'Styles',	

					), 

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Service Content Hover Background Color", "rsaddon" ),
						"param_name" => "desc_bg_primary",
						"value" => '',
						"description" => __( "Choose description Background color", "rsaddon" ),
						"dependency" => Array('element' => 'service_style', 'value' => array( 'Style 2', 'Style 3')),
						'group' => 'Styles',	
					), 

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Service Content Hover Secondary Background", "rsaddon" ),
						"param_name" => "desc_bg_secondary",
						"value" => '',
						"description" => __( "Choose description Background color", "rsaddon" ),
						"dependency" => Array('element' => 'service_style', 'value' => array('Style 2')),
						'group' => 'Styles',
					), 

					array(
						"type"        => "textfield",
						"heading"     => __( "Service Number", "rsaddon" ),
						"description" => __( "Add services number", "rsaddon" ),
						"param_name"  => "service_number",
						"value"       => "",
						"dependency" => Array('element' => 'service_style', 'value' => array('Style 1')),
					),
					
					array(
						"type"        => "attach_image",
						"heading"     => __( "Service Image", "rsaddon" ),
						"description" => __( "Add services image", "rsaddon" ),
						"param_name"  => "screenshots",
						"value"       => "",
						"dependency"  => Array('element' => 'service_style', 'value' => array('Default', 'Style 3')),
					),

					array(
						"type"        => "attach_image",
						"heading"     => __( "Service Secondary Image", "rsaddon" ),
						"description" => __( "Add services secondary image", "rsaddon" ),
						"param_name"  => "secondary_screenshots",
						"value"       => "",
						"dependency"  => Array('element' => 'service_style', 'value' => array('Style 3')),
					),


					array(
						'type'    => 'dropdown',
						'heading' => __( 'Services Alignment', 'rsaddon' ),
						'value' => array(
							__( 'Left', 'rsaddon' )   => 'left',
							__( 'Center', 'rsaddon' ) => 'center',
							__( 'Right', 'rsaddon' )  => 'right',
							__( 'Icon Left Circle', 'rsaddon' )  => 'icon-left',
						),
						'admin_label' => true,
						'param_name'  => 'service_alignement',
						"dependency"  => Array('element' => 'service_style', 'value' => array('Style 3')),
						'description' => __( 'Select Services Style', 'rsaddon' ),
					),
														
					array(
						'type' => 'dropdown',
						'heading' => __( 'Icon library', 'rsaddon' ),
						'value' => array(
							__( 'Font Awesome', 'rsaddon' ) => 'fontawesome',
							__( 'Open Iconic', 'rsaddon' ) => 'openiconic',
							__( 'Typicons', 'rsaddon' ) => 'typicons',
							__( 'Entypo', 'rsaddon' ) => 'entypo',
							__( 'Linecons', 'rsaddon' ) => 'linecons',
							__( 'Mono Social', 'rsaddon' ) => 'monosocial',
							__( 'Material', 'rsaddon' ) => 'material',						
						),
						'admin_label' => true,
						'param_name' => 'type',

						'dependency' => array(
							'element' => 'service_style',
							'value' => array('Style 2'),
						),

						'description' => __( 'Select icon library.', 'rsaddon' ),
					),

					array(
						'type' => 'iconpicker',
						'heading' => __( 'Icon', 'rsaddon' ),
						'param_name' => 'icon_fontawesome',
						'value' => 'fa fa-users',
						// default value to backend editor admin_label
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display, we use (big number) to display all icons in single page
						),
						'dependency' => array(
							'element' => 'type',
							'value' => 'fontawesome',
						),
						'description' => __( 'Select icon from library.', 'rsaddon' ),
					),

					array(
						'type'       => 'iconpicker',
						'heading'    => __( 'Icon', 'rsaddon' ),
						'param_name' => 'icon_openiconic',
						'value'      => 'vc-oi vc-oi-dial',
						// default value to backend editor admin_label
						'settings' => array(
							'emptyIcon'    => false,
							// default true, display an "EMPTY" icon?
							'type'         => 'openiconic',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'type',
							'value' => 'openiconic',
						),
						'description' => __( 'Select icon from library.', 'rsaddon' ),
					),
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Icon', 'rsaddon' ),
						'param_name' => 'icon_typicons',
						'value' => 'typcn typcn-adjust-brightness',
						// default value to backend editor admin_label
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'type' => 'typicons',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'type',
							'value' => 'typicons',
						),
						'description' => __( 'Select icon from library.', 'rsaddon' ),
					),
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Icon', 'rsaddon' ),
						'param_name' => 'icon_entypo',
						'value' => 'entypo-icon entypo-icon-note',
						// default value to backend editor admin_label
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'type' => 'entypo',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'type',
							'value' => 'entypo',
						),
					),
					array(
						'type'       => 'iconpicker',
						'heading'    => __( 'Icon', 'rsaddon' ),
						'param_name' => 'icon_linecons',
						'value'      => 'vc_li vc_li-heart',
						// default value to backend editor admin_label
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'type' => 'linecons',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'type',
							'value' => 'linecons',
						),
						'description' => __( 'Select icon from library.', 'rsaddon' ),
					),
					array(
						'type' => 'iconpicker',
						'heading' => __( 'Icon', 'rsaddon' ),
						'param_name' => 'icon_monosocial',
						'value' => 'vc-mono vc-mono-fivehundredpx',
						// default value to backend editor admin_label
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'type' => 'monosocial',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'type',
							'value'   => 'monosocial',
						),
						'description' => __( 'Select icon from library.', 'rsaddon' ),
					),
					array(
						'type'       => 'iconpicker',
						'heading'    => __( 'Icon', 'rsaddon' ),
						'param_name' => 'icon_material',
						'value'      => 'vc-material vc-material-cake',
						// default value to backend editor admin_label
						'settings' => array(
							'emptyIcon' => false,
							// default true, display an "EMPTY" icon?
							'type' => 'material',
							'iconsPerPage' => 4000,
							// default 100, how many icons per/page to display
						),
						'dependency' => array(
							'element' => 'type',
							'value'   => 'material',
						),
						'description' => __( 'Select icon from library.', 'rsaddon' ),
					),
	        

					array(
						"type"       => "textfield",
						"heading"    => __("Image Width", 'rsaddon'),
						"param_name" => "img_width",
						'description' => __( 'Image Width in px eg. 70', 'rsaddon' ),
						"dependency" => Array('element' => 'service_style', 'value' => array('Default')),						
					),		

					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						'admin_label' => false,
						"heading" => __( "Icon size", 'rsaddon' ),
						"param_name" => "size",
						'description' => __( 'Icon size in px eg. 30', 'rsaddon' ),	
						"dependency" => Array('element' => 'service_style', 'value' => array('Style 2', 'Style 4', 'Style 6')),			
					),

					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						'admin_label' => false,
						"heading" => __( "Icon Wrapper Size", 'rsaddon' ),
						"param_name" => "wrapper_size",
						'description' => __( 'Icon size in px eg. 30', 'rsaddon' ),	
						"dependency" => Array('element' => 'service_style', 'value' => array( 'Style 2', 'Style 4', 'Style 5', 'Style 6')),	
					),					

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Service Icon Primary Color", "rsaddon" ),
						"param_name" => "icon_color",
						"value" => '',
						"description" => __( "Choose icon color", "rsaddon" ),
						"dependency" => Array('element' => 'service_style', 'value' => array('Style 2')), 
						'group' => 'Styles',             
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Service Number Color", "rsaddon" ),
						"param_name" => "service_num_color",
						"value" => '',
						"description" => __( "Choose number color", "rsaddon" ),
						"dependency" => Array('element' => 'service_style', 'value' => array('Style 1')), 
						'group' => 'Styles',             
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Service Number Background Color", "rsaddon" ),
						"param_name" => "number_bg_color",
						"value" => '',
						"description" => __( "Choose number background color", "rsaddon" ),
						"dependency" => Array('element' => 'service_style', 'value' => array('Style 1')), 
						'group' => 'Styles',             
					),

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Service Icon Secondary Color", "rsaddon" ),
						"param_name" => "icon_color_sec",
						"value" => '',
						"description" => __( "Choose icon color", "rsaddon" ),
						"dependency" => Array('element' => 'service_style', 'value' => array('Style 2')), 
						'group' => 'Styles',             
					),					

					array(
						"type" => "colorpicker",
						"class" => "",
						"heading" => __( "Service Icon Hover Color", "rsaddon" ),
						"param_name" => "icon_hover_color",
						"value" => '',
						"description" => __( "Choose icon hover color", "rsaddon" ),		               
		                "dependency" => Array('element' => 'service_style', 'value' => array('Style 2')),
		                'group' => 'Styles',
					),	

				
					array(
						"type" => "dropdown",
						"heading" => __( "Box Shadow", "rsaddon" ),
						"param_name" => "box_shadow_always",
						'value' => array(							
							__( 'No', 'rsaddon' ) => 'shadow_off_always',
							__( 'Yes', 'rsaddon' )   => 'shadow_yes_always',
						),
						"dependency" => Array('element' => 'service_style', 'value' => array('Default','Style 3')),
						'group' => 'Styles',
						'default' => 'shadow_off',	

					), 

					array(
						"type" => "dropdown",
						"heading" => __( "Box Shadow On Hover", "rsaddon" ),
						"param_name" => "box_shadow",
						'value' => array(
							__( 'Yes', 'rsaddon' )   => 'shadow_yes',
							__( 'No', 'rsaddon' ) => 'shadow_off',
						),
						"dependency" => Array('element' => 'service_style', 'value' => array('Style 3')),
						'group' => 'Styles',
						'default' => 'shadow_off',	

					), 

					array(
						"type" => "textfield",
						"holder" => "div",
						"class" => "",
						"heading" => __( "Icon padding", 'rsaddon' ),
						"param_name" => "icon_padding",
						'description' => __( "Icon padding in px eg. 15. Doesn't work on custom image" , 'rsaddon' ),
						'admin_label' => false,	
						"dependency" => Array('element' => 'service_style', 'value' => array('Style 2')),				
					),

							

					array(
						'type'       => 'dropdown',
						'heading'    => __( 'Services Content Alignment', 'rsaddon' ),
						'param_name' => 'align',
						'value' => array(
							__( 'Left Icon', 'rsaddon' )   => 'left',
							__( 'Top Icon', 'rsaddon' )  => 'top',
							__( 'Right Icon', 'rsaddon' )  => 'right',
							__( 'Center Icon', 'rsaddon' ) => 'center',
						),
						"dependency" => Array('element' => 'service_style', 'value' => array('Default')),
						'description' => __( 'Select alignment here.', 'rsaddon' ),
					),

					array(
						'type'        => 'vc_link',
						'heading'     => __( 'URL (Link)', 'rsaddon' ),
						'param_name'  => 'button_link',
						'description' => __( 'Add link to Serices Pages.', 'rsaddon' ),						
					),

					array(
					    "type" => "dropdown",
					    "heading" => __("Show Read More Icon", "rsaddon"),
					    "param_name" => "readmore",
					    'description' => __( 'Show read more icon', 'rsaddon' ),
					    "value" => array(
					        __( 'No', 'rsaddon')   => '',
					        __( 'Yes', 'rsaddon') => 'yes',
					    ),
					    "dependency" => Array('element' => 'service_style', 'value' => array('Style 9')),
					),			

				
					array(
						'type'        => 'textfield',
						'heading'     => __( 'Extra class name', 'rsaddon' ),
						'param_name'  => 'el_class',
						'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'rsaddon' ),
					),
					
					array(
						'type'       => 'css_editor',
						'heading'    => __( 'CSS box', 'rsaddon' ),
						'param_name' => 'css',
						'group'      => __( 'Design Options', 'rsaddon' ),
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
							'title'             => '',
							'subtilte'          => '',
							'subtitle_color'    => '#303745',
							'title_size'        => '',
							'service_number'    => '',
							'service_num_color'      => '#fff',
							'number_bg_color'   => '',
							'title_transform'   => '',
							'spacing_top'       => '',
							'spacing_bottom'    => '',
							'type'              => '',
							'icon_fontawesome'  => '',
							'icon_openiconic'   => '',
							'icon_typicons'     => '',
							'services_icon'     => '',
							'icon_entypo'       => '',
							'icon_linecons'     => '',
							'icon_monosocial'   => '',
							'custom_icons'      => 'flaticon-artificial-intelligence',
							'title_color'       => '#333333',
							'title_hovercolor'  => '#ffffff',							
							'icon_bgcolor'      => '#1292c2',
							'icon_bgcolor_sec'  => '#00aeef',
							'desc_color'        => '#666666',							
							'desc_hovercolor'   => '#ffffff',							
							'number_color'      => '#f54955',
							'number_hovercolor' => '#f14652',
							'service_icon_bg'   => '',
							'icon_style'        => '',
							'icon_radiussize'   => '',
							'img_width'         => '',
							'img_align'         => '',
							'icon_color'        => '#222',
							'icon_color_hover'  => '',
							'icon_color_sec'    => '',
							'icon_hover_color'  => '#ccc',
							'border_color'      => '',
							'show_icon'         => '',
							'box_shadow'        => 'shadow_yes',
							'box_shadow_always' => 'shadow_off_always',
							'number_value'      => '',
							'number_font_size'  => '',
							'icon_bg_color'     => '',
							'desc_bg'           => '',
							'icon_material'     => '',
							'icon'              => 'Image',	
							'size'              => '30px',
							'wrapper_size'      => '',
							'icon_padding'      => '',				
							'text_font'         => '',
							'align'             => 'left',
							'el_class'          =>'',
							'service_style'     => 'Default',
							'icon_style'        => 'border_style',
							'desc_bg_primary'   => '',
							'desc_bg_secondary' => '',
							'button_link'       => '',					
							'readmore'          => '',					
							'css'               => '',
							'service_alignement' => 'left'
		                ), 
		                $atts,'vc_RsServices'
		            )
		        );

		        $a = shortcode_atts(array(
		          'screenshots' => 'screenshots',
		        ), $atts);

		        $a2 = shortcode_atts(array(
		          'secondary_screenshots' => 'secondary_screenshots',
		        ), $atts);
		           
				// Enqueue needed icon font.
				vc_icon_element_fonts_enqueue( $type );
				
				//parse link for vc linke		
				$button_link = ( '||' === $button_link ) ? '' : $button_link;
				$button_link = vc_build_link( $button_link );
				$use_link = false;
				if ( strlen( $button_link['url'] ) > 0 ) {
					$use_link = true;
					$a_href = $button_link['url'];
					$a_title = $button_link['title'];
					$a_target = $button_link['target'];
				}
				
				if ( $use_link ) {
					$attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
					$attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
					if ( ! empty( $a_target ) ) {
						$attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
					}
				}
				$attributes = implode( ' ', $attributes );
							

				if($icon_fontawesome != ''):
				  $services_icon = esc_attr($icon_fontawesome);
				endif;

				if ($icon_openiconic != ''):
					$services_icon = esc_attr($icon_openiconic);
				endif;

				if ($icon_typicons != ''):
					$services_icon = esc_attr($icon_typicons);
				endif;

				if ($icon_entypo != ''):
					$services_icon = esc_attr($icon_entypo);
				endif;

				if ($icon_linecons != ''):
					$services_icon = esc_attr($icon_linecons);
				endif;

				if ($icon_monosocial != ''):
					$services_icon = esc_attr($icon_monosocial);
				endif;
				
				if ($icon_material != ''):
					$services_icon = esc_attr($icon_material);
				endif;

				if ($custom_icons != ''):
					$custom_icons = esc_attr($custom_icons);
				endif;

				
		        $img = wp_get_attachment_image_src($a["screenshots"], "large");

		        $img2 = wp_get_attachment_image_src($a2["secondary_screenshots"], "large");

		        $imgSrc2 = $img2[0];
		       

		        $imgSrc = $img[0];

		        if ($imgSrc) {
					$imageClass='<img src="'.$imgSrc.'" alt="Rs-service" />';
		        }else{
		        	$imageClass= "";
		        }
                 
                if(!empty($img_width) && !empty($imgSrc)):
                	$imageClass='<img src="'.$imgSrc.'" alt="Rs-service" style="width: '.$img_width.'px" />';
                endif;

		        $icon_bg = '';
		        if ($imgSrc) {
					$icon_bg ='style="background-color:'.$icon_bg_color.'"';
					$imagebg ='<img src="'.$imgSrc.'" alt="Rs-service" />';
		        }else{
		        	$imagebg = "";
		        }


						
				//extract content
				$atts['content'] = $content;

				$icon_color_normal = ($icon_color) ? $icon_color : '';
				$icon_color_sec    = ($icon_color_sec) ? $icon_color_sec : '';
				
				$icon_hover_color  = $icon_hover_color ? $icon_hover_color : '';

				$service_icon_bg   = $service_icon_bg ? $service_icon_bg : '';
				$icon_hover_color  = $icon_hover_color ? $icon_hover_color : '';

				//custom color added		
				
				$border_color  = ($border_color) ? ' style="border-color: '.$border_color.'"' : '';
				$primarybg     = $desc_bg;
				$desc_bg       = ($desc_bg) ? ' style="background: '.$desc_bg.'"' : '';
				$icon_bg_color = ($icon_bg_color) ? ' style="background: '.$icon_bg_color.'"' : '';

				//extract css edit box
				$css_class        = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );
				
				//custom class added
				$wrapper_classes  = array($el_class) ;			
				$class_to_filter  = implode( ' ', array_filter( $wrapper_classes ) );		
				$css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );

				//variable
				$read_more = !empty($readmore) ? '<a '.$attributes.' class="service-readon"><i class="flaticon flaticon-right-arrow"></i></a>' : '';


				//checking services style
	                
		        // Fill $html var with data

		        switch ( $service_style ) {

		    		case 'Style 1':
						$template = 'service-one';
						break;

					case 'Style 2':
						$template = 'service-two';
						break;

					case 'Style 3':
						$template = 'service-three';
						break;				

					default:
						$template = 'service-default';
						break;
				}
				return $this->template( $template, get_defined_vars() );
		    }
		}
	}	
	new AuburnForest_Service_Box;
 