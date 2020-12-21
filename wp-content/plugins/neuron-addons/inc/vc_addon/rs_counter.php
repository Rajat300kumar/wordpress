<?php

    // Element Mapping
     function vc_counter_mapping() {
         
    // Stop all if VC is not enabled
    if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
    }    
         
    // Map the block with vc_map()
    vc_map( 
  
        array(
            'name'        => __('Counter', 'neuron_addon'),
            'base'        => 'vc_counter',
            'description' => __('counter for project', 'neuron_addon'), 
            'category'    => __('by AuburnForest', 'neuron_addon'),   
            'icon'        => get_template_directory_uri().'/framework/assets/img/vc-icon.png',            
            'params'      => array(

                array(
                    "type" => "dropdown",
                    "heading" => __("Select Counter Style", 'neuron_addon'),
                    "param_name" => "counter_style",
                    "value" => array(                    
                        'Style 1' => 'style1',                     
                        'Style 2' => "style2",
                        'Style 3' => "style3",
                    ),                      
                ),            
                array(
                    "type"                => "dropdown",
                    "heading"             => __("Border Style", 'neuron_addon'),
                    "param_name"          => "border_style",
                    "value"               => array(
                    __( 'No', 'neuron_addon')  => '',
                    __( 'Yes', 'neuron_addon') => 'border-style',
                    ),
                    "description"         => __("Select yes for border style", 'neuron_addon')
                ),
                array(
                    "type"        => "colorpicker",
                    "class"       => "",
                    "heading"     => __( "Border Color", 'neuron_addon' ),
                    "param_name"  => "border_color",
                    "value"       => '',
                    "description" => __( "Box border color", 'neuron_addon' ),
                    "dependency" => Array('element' => 'border_style', 'value' => array('border-style')),
                ),
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Porject Title', 'neuron_addon'),
                    'param_name'  => 'title',
                    'value'       => __( '', 'neuron_addon'),
                    'description' => __( 'Project Title', 'neuron_addon'),
                    'admin_label' => false,
                    'weight'      => 0,
                   
                ),              
                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Counter Number', 'neuron_addon'),
                    'param_name'  => 'project',
                    'value'       => __( '', 'neuron_addon'),
                    'description' => __( 'Project counter (Example: 100 only number)', 'neuron_addon'),
                    'admin_label' => false,
                    'weight'      => 0,
                    
                ),

                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Counter Post Text', 'neuron_addon'),
                    'param_name'  => 'post_text',
                    'value'       => __( '', 'neuron_addon'),
                    'description' => __( 'Counter post text here. Example: %, $ etc', 'neuron_addon'),                    
                ),

                array(
                    "type" => "dropdown",
                    "heading" => __("Select Icon Type", 'neuron_addon'),
                    "param_name" => "icon_type",
                    "value" => array(                    
                        'Icon' => 'type_icon',                     
                        'Image' => "type_image",
                    ),                      
                ),



                array(
                    "type"        => "attach_image",
                    "heading"     => __( "Counter Image", 'neuron_addon' ),
                    "description" => __( "Add counter image", 'neuron_addon' ),
                    "param_name"  => "counter_img",
                    "value"       => "",
                    "dependency" => Array('element' => 'icon_type', 'value' => array('type_image')),
                ),


                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Counter Image Width', 'neuron_addon'),
                    'param_name'  => 'img_width',
                    'value'       => __( '', 'neuron_addon'),
                    'description' => __( 'Enter Counter Image Width', 'neuron_addon'),     
                     "dependency" => Array('element' => 'icon_type', 'value' => array('type_image')),               
                ),

                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Icon library', 'neuron_addon' ),
                    'value' => array(
                        __( 'Font Awesome', 'neuron_addon' ) => 'fontawesome',
                        __( 'Open Iconic', 'neuron_addon' ) => 'openiconic',
                        __( 'Typicons', 'neuron_addon' ) => 'typicons',
                        __( 'Entypo', 'neuron_addon' ) => 'entypo',
                        __( 'Linecons', 'neuron_addon' ) => 'linecons',
                        __( 'Mono Social', 'neuron_addon' ) => 'monosocial',
                        __( 'Material', 'neuron_addon' ) => 'material',
                    ),
                    'admin_label' => true,
                    'param_name' => 'type',
                    'description' => __( 'Select icon library.', 'neuron_addon' ),
                    "dependency" => Array('element' => 'icon_type', 'value' => array('type_icon')),
                ),

                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'neuron_addon' ),
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
                    'description' => __( 'Select icon from library.', 'neuron_addon' ),
                ),
                array(
                    'type'       => 'iconpicker',
                    'heading'    => __( 'Icon', 'neuron_addon' ),
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
                    'description' => __( 'Select icon from library.', 'neuron_addon' ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'neuron_addon' ),
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
                    'description' => __( 'Select icon from library.', 'neuron_addon' ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'neuron_addon' ),
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
                    'heading'    => __( 'Icon', 'neuron_addon' ),
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
                    'description' => __( 'Select icon from library.', 'neuron_addon' ),
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon', 'neuron_addon' ),
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
                    'description' => __( 'Select icon from library.', 'neuron_addon' ),
                ),
                array(
                    'type'       => 'iconpicker',
                    'heading'    => __( 'Icon', 'neuron_addon' ),
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
                    'description' => __( 'Select icon from library.', 'neuron_addon' ),
                ),

                array(
                    "type"                   => "dropdown",
                    "heading"                => __("Select Icon Align", 'neuron_addon'),
                    "param_name"             => "align",
                    "value"                  => array(
                    __( 'None', 'neuron_addon')   => '',
                    __( 'Left', 'neuron_addon')   => 'left',
                    __( 'Center', 'neuron_addon') => 'text-center',
                    __( 'Right', 'neuron_addon')  => 'right',
                    ),
                    "std"                    => 'style1',
                    "admin_label"            => true,
                    "description"            => __("", 'neuron_addon')
                ),

                array(
                    "type"                   => "dropdown",
                    "heading"                => __("Content Alignment", 'neuron_addon'),
                    "param_name"             => "content_align",
                    "value"                  => array(
                    __( 'Left', 'neuron_addon')   => 'left',
                    __( 'Center', 'neuron_addon') => 'center',
                    __( 'Right', 'neuron_addon')  => 'right',
                    ),
                    "std"                    => 'style1',
                    "admin_label"            => true,
                    "description"            => __("", 'neuron_addon')
                ),

                array(
                    "type"        => "colorpicker",
                    "class"       => "",
                    "heading"     => __( "Counter Background Color", 'neuron_addon' ),
                    "param_name"  => "counter_bg",
                    "value"       => '',
                    "description" => __( "Counter background here", 'neuron_addon' ),
                    'group'       => 'Styles',
                ),
                
                array(
                    "type"        => "colorpicker",
                    "class"       => "",
                    "heading"     => __( "Icon Color", 'neuron_addon' ),
                    "param_name"  => "icon_color",
                    "value"       => '',
                    "description" => __( "Choose icon color here", 'neuron_addon' ),
                    'group'       => 'Styles',
                ),
                array(
                    "type"        => "colorpicker",
                    "class"       => "",
                    "heading"     => __( "Number Color", 'neuron_addon' ),
                    "param_name"  => "number_color",
                    "value"       => '',
                    "description" => __( "Choose number color here", 'neuron_addon' ),
                    'group'       => 'Styles',
                ),
                array(
                    "type"        => "colorpicker",
                    "class"       => "",
                    "heading"     => __( "Title Color", 'neuron_addon' ),
                    "param_name"  => "title_color",
                    "value"       => '',
                    "description" => __( "Choose title color here", 'neuron_addon' ),
                    'group'       => 'Styles',
                ),

                array(
                    "type"        => "textfield",
                    "class"       => "",
                    "heading"     => __( "Icon Size", 'neuron_addon' ),
                    "param_name"  => "icon_size",
                    "value"       => '',
                    "description" => __( "Choose Icon Size here", 'neuron_addon' ),
                    'group'       => 'Styles',
                ),  

                array(
                    "type"        => "textfield",
                    "class"       => "",
                    "heading"     => __( "Title Font Size", 'neuron_addon' ),
                    "param_name"  => "title_font_size",
                    "value"       => '',
                    "description" => __( "Choose Font Size here", 'neuron_addon' ),
                    'group'       => 'Styles',
                ), 
                array(
                    "type"        => "textfield",
                    "class"       => "",
                    "heading"     => __( "Number Font Size", 'neuron_addon' ),
                    "param_name"  => "number_font_size",
                    "value"       => '',
                    "description" => __( "Choose Font Size here", 'neuron_addon' ),
                    'group'       => 'Styles',
                ), 

                array(
                    "type"        => "textfield",
                    "class"       => "",
                    "heading"     => __( "Post Text Size", 'neuron_addon' ),
                    "param_name"  => "pre_text_size",
                    "value"       => '',
                    "description" => __( "Choose Font Size here", 'neuron_addon' ),
                    'group'       => 'Styles',
                ), 

                array(
                    "type"        => "textfield",
                    "class"       => "",
                    "heading"     => __( "Margin Top", 'neuron_addon' ),
                    "param_name"  => "margin_spc_top",
                    "value"       => '',
                    "description" => __( "Enter Margin here", 'neuron_addon' ),
                    'group'       => 'Styles',
                ), 

                array(
                    "type"        => "textfield",
                    "class"       => "",
                    "heading"     => __( "Margin Buttom", 'neuron_addon' ),
                    "param_name"  => "margin_spc_btm",
                    "value"       => '',
                    "description" => __( "Enter Margin here", 'neuron_addon' ),
                    'group'       => 'Styles',
                ),

                array(
                    'type'        => 'textfield',
                    'heading'     => __( 'Extra class name', 'neuron_addon'),
                    'param_name'  => 'el_class',
                    'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'neuron_addon'                                                                    ),
                ), 
                array(
                    "type"        => "attach_image",
                    "heading"     => __( "Counter Background Image", 'neuron_addon' ),
                    "description" => __( "Add Counter Background image", 'neuron_addon' ),
                    "param_name"  => "conterbg",
                    "value"       => "",
                    'group' => 'Styles',
                ),

                array(
                    'type' => 'css_editor',
                    'heading' => __( 'CSS box', 'neuron_addon'),
                    'param_name' => 'css',
                    'group' => __( 'Design Options', 'neuron_addon'),
                ),      
                 
            )
        )
    );                                
        
}

 add_action( 'vc_before_init', 'vc_counter_mapping' );
 
// Element HTML
function vc_counter_html( $atts ) {
     
    // Params extraction
    extract(
        shortcode_atts(
            array(
                'title'            => 'Counter Title',
                'title_font_size'  => '22px',
                'number_font_size' => '30px',
                'icon_size'        => '',
                'margin_spc_top'   => '0px',
                'margin_spc_btm'   => '2px',
                'pre_text_size'    => '',
                'counter_style'    => 'style1',
                'border_style'     => '',
                'border_color'     => '',
                'project'          => '',
                'post_text'        => '',
                'align'            => '',
                'content_align'    => '',
                'img_width'        => '70px',
                'type'             => '',
                'icon_fontawesome' => '',
                'icon_openiconic'  => '',
                'icon_typicons'    => '',
                'icon_material'    => '',
                'services_icon'    => '',
                'icon_entypo'      => '',
                'icon_linecons'    => '',
                'icon_monosocial'  => '',
                'icon_color'       =>'',
                'icon_color'       =>'',
                'counter_bg'       =>'',
                'icon_type'        =>'type_icon',
                'counter_img'      =>'',
                'conterbg'         =>'',
                'title_color'      =>'',
                'number_color'     =>'#8d6e63',
                'el_class'         =>'',
                'css'              => ''
            ), 
            $atts,'vc_counter'
        )
    );

    //Counter Image
    $a = shortcode_atts(array(
      'conterbg'    => 'conterbg',
      'counter_img' => 'counter_img',
    ), $atts);

    $img = wp_get_attachment_image_src($a["conterbg"], "large");
    $imgSrc = $img[0];

    $counter_bg_img = ($imgSrc) ? ' style="background-image: url('.$imgSrc.')"' : '';

    $img2 = wp_get_attachment_image_src($a["counter_img"], "large");
    $imgSrc2 = $img2[0];
    $counter_img  = $imgSrc2 ? '<div class="counter-icon"><img src="'.$imgSrc2.'" style="width:'.$img_width.'" alt="Counter Icon"/></div>' : '';
    
     //custom class added
    $wrapper_classes = array($el_class) ;           
    $class_to_filter = implode( ' ', array_filter( $wrapper_classes ) );        
    $css_class_custom = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $atts );

    //for css edit box value extract
    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts );

    //load icon
    // Enqueue needed icon font.
    vc_icon_element_fonts_enqueue( $type );
    $icon = "";
    if($icon_fontawesome != ''):
      $icon = esc_attr($icon_fontawesome);
    endif;

    if ($icon_openiconic != ''):
        $icon = esc_attr($icon_openiconic);
    endif;

    if ($icon_typicons != ''):
        $icon = esc_attr($icon_typicons);
    endif;

    if ($icon_entypo != ''):
        $icon = esc_attr($icon_entypo);
    endif;

    if ($icon_linecons != ''):
        $icon = esc_attr($icon_linecons);
    endif;

    if ($icon_monosocial != ''):
        $icon = esc_attr($icon_monosocial);
    endif;

    if ($icon_material != ''):
        $icon = esc_attr($icon_material);
    endif;
    $content_align ='content-'.$content_align;
    $border_style = ($border_style) ? 'border-style' : '';
    $icon_color = ($icon_color) ? ' style="color: '.$icon_color.'"' : '';
    $title_color = ($title_color) ? ' style="color: '.$title_color.'"' : '';  
     
    $title_font_size = ($title_font_size) ? ' style="font-size: '.$title_font_size.'; line-height: '.$title_font_size.'!important"' : '';

    $icon_size = ($icon_size) ? ' style="font-size: '.$icon_size.'; line-height: '.$icon_size .'!important"' : '';
    $border_color = ($border_color) ? ' style="border-color: '.$border_color.'"' : '';
    $counter_bg = ($counter_bg) ? ' style="background: '.$counter_bg.'"' : '';
    $post_text = ($post_text) ? '<span style="font-size:'.$pre_text_size.'; line-height:'.$pre_text_size.'">'.$post_text.'</span>' : '';
    $count_icon = ($icon !== '') ? '<div class="count-icon vc_icon_element-icon" '.$icon_size.'><i class="vc_icon_element-icon '.$icon.'"'.$icon_color.'></i></div>' : '';
    if(!empty($counter_img)){
        $count_icon = $counter_img;
    }

    $html = '
    <div class="counter-top-area '.$css_class.' '.$counter_style.' '.$align.' '.$content_align.' '.$border_style.'" '.$counter_bg.' '.$counter_bg_img.' '.$border_color.'>

    <div class="rs-counter-list">
        '.$count_icon.'
    <div class="count-text">
    <div style="margin-top:'.$margin_spc_top.'; margin-bottom:'.$margin_spc_btm.'; color:'.$number_color.'" class="count-number">
        <span style="font-size:'.$number_font_size.'; line-height:'.$number_font_size.'; color:'.$number_color.'" class="rs-counter"> ' . $project. '</span> 
        <span style="color:'.$number_color.'">'.$post_text.'</span>
    </div>         
        <h3 '.$title_color.'><span '.$title_font_size.'>'.$title.'</span></h3></div>
    </div></div>';
     
    return $html;
     
}
add_shortcode( 'vc_counter', 'vc_counter_html' );