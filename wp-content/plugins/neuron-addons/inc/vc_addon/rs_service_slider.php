<?php
    
    // Element Mapping
    function vc_rs_service_slider_mapping() {
         
        // Stop all if VC is not enabled
        if ( !defined( 'WPB_VC_VERSION' ) ) {
            return;
        }
        
        $category_dropdown = array( __( 'All Categories', 'rsaddon' ) => '0' );  
        $args = array(
            'taxonomy' => array('service-category'),//ur taxonomy
            'hide_empty' => false,                  
        );

        $terms_= new WP_Term_Query( $args );
        foreach ( (array)$terms_->terms as $term ) {
            $category_dropdown[$term->name] = $term->slug;      
        } 
        // Map the block with vc_map()
        vc_map( 
            array(
                'name' => __('Neuron Service Slider', 'rsaddon'),
                'base' => 'vc_serviceslider',
                'description' => __('Neuron Service Slider Information', 'rsaddon'), 
                'category' => __('by AuburnForest', 'rsaddon'),   
                'icon' => get_template_directory_uri().'/framework/assets/img/vc-icon.png',           
                'params' => array(   
                    
                    array(
                        "type" => "dropdown",
                        "heading" => __("Slider Style", "rsaddon"),
                        "param_name" => "service_slider_style",
                        "value" => array(                                                       
                            'Style 1' => "Style 1", 
                            'Style 2' => "Style 2",                                                  
                            'Style 3' => "Style 3",                                                  
                            'Style Grid' => "Style Grid",                                                  
                        ),                        
                    ),

                    array(
                        "type" => "dropdown",
                        "heading" => __("Slider Dark or Light", "rsaddon"),
                        "param_name" => "service_light_dark",
                        "value" => array(                                                       
                            'Light' => "light", 
                            'Dark' => "dark",                                                  
                        ), 
                         "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2', 'Style Grid')),                      
                    ),


                    array(
                        "type" => "dropdown",
                        "heading" => __("Show title", "rsaddon"),
                        "param_name" => "title",
                        "value" => array(                                                       
                            'Yes' => "Yes", 
                            'No' => "No",                                                                                                                                                                       
                        ), 
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2', 'Style Grid')),                       
                    ),

                    array(
                        "type" => "checkbox",
                        "class" => "",
                        "heading" => __( "Title Uppercase", "rsaddon" ),
                        "param_name" => "title_case",
                        "value" => '',
                        "description" => __( "If checked title will be show in uppercase.", "rsaddon" ),
                        "dependency" => Array('element' => 'title', 'value' => array('Yes')),
                    ),

                    array(
                        "type"       => "textfield",
                        "heading"    => __("Excerpt Limit", 'rsaddon'),
                        "param_name" => "excerpt_limit",
                        'value' => "22",
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2', 'Style 3', 'Style Grid')),                      
                    ), 

                    array(
                        "type" => "colorpicker",
                        "class" => "",
                        'admin_label' => false,
                        "heading" => __( "Number Color", "rsaddon" ),
                        "param_name" => "number_color",
                        "value" => '',
                        "description" => __( "Choose title color", "rsaddon" ),
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style Grid')),   
                    ),

                    array(
                    "type" => "dropdown_multi",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __( "Categories", 'rsaddon' ),
                    "param_name" => "cat",
                    'value' => $category_dropdown,
                    ),

                    array(
                        "type" => "textfield",
                        "heading" => __("Service Per Pgae", "rsaddon"),
                        "param_name" => "team_per",
                        'value' =>"6",
                        'description' => __( 'You can write how many team member show. ex(2)', 'rsaddon' ),                  
                    ),

                    array(
                        'type'        => 'dropdown',
                        'heading'     => __( 'Service Link', 'rsaddon' ),
                        'param_name'  => 'link_type',
                        "value" => array(                                                       
                            'No Link' => "", 
                            'Default Link' => "default_link",                                                                  
                            'External Link' => "external_link"                                                                        
                        ),                     
                    ),

                    array(
                        'type'        => 'vc_link',
                        'heading'     => __( 'External URL (Link)', 'rsaddon' ),
                        'param_name'  => 'service_link',
                        'description' => __( 'Add link to Serices Pages.', 'rsaddon' ),
                        "dependency" => Array('element' => 'link_type', 'value' => array('external_link')),                   
                    ),

                    array(
                        "type" => "dropdown",
                        "heading" => __("Show Read More", "rsaddon"),
                        "param_name" => "read_more",
                        'description' => __( 'Show read more', 'rsaddon' ),
                        "value" => array(
                            __( 'No', 'rsaddon')   => '',
                            __( 'Yes', 'rsaddon') => 'yes',
                        ),
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2', 'Style 3', 'Style Grid')),
                    ),

                    array(
                        "type"       => "dropdown",
                        "heading"    => __("Button Type", 'rsaddon'),
                        "param_name" => "readmore_type",
                        "value"      => array(
                            'Select' => "",
                            'Text' => "text",
                            'Icon' => "icon",
                        ),
                        "dependency" => Array('element' => 'read_more', 'value' => array('yes')),                    
                    ),

                    array(
                        "type" => "textfield",
                        "heading" => __("Read More Text", 'rsaddon'),
                        "param_name" => "more_text",
                        'description' => __( 'Type your read more text here', 'rsaddon' ),
                        "dependency" => Array('element' => 'readmore_type', 'value' => array('text')),
                    ),

                    array(
                        "type" => "colorpicker",
                        "class" => "",
                        "heading" => __( "Service Title Color", "rsaddon" ),
                        "param_name" => "title_color",
                        "value" => '',
                        "description" => __( "Choose title color", "rsaddon" ),
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2', 'Style Grid')),
                    ),                    
                    

                    //item show depending on screen size
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __( "Number of items ( Desktops > 1199px )", 'rsaddon' ),
                        "param_name" => "col_lg",
                        "value" => array(                           
                                    '1' => "1", 
                                    '2' => "2",
                                    '3' => "3", 
                                    '4' => "4",
                                    '5' => "5",
                                    '6' => "6",                                                                                     
                                ),
                        "std" => "3",
                        'group' => 'Style',
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2')),
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __( "Number of items ( Desktops > 991px )", 'rsaddon' ),
                        "param_name" => "col_md",
                        "value" => array(                           
                                    '1' => "1", 
                                    '2' => "2",
                                    '3' => "3", 
                                    '4' => "4",
                                    '5' => "5",
                                    '6' => "6",                                                                                     
                                ),
                        "std" => "3",
                        'group' => 'Style',
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2')),
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __( "Number of items ( Tablets > 767px )", 'rsaddon' ),
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
                        'group' => 'Style',
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2')),
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __( "Number of items ( Small Phones < 480px )", 'rsaddon' ),
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
                        'group' => 'Style',
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2')),
                    ),
                    array(
                        "type" => "dropdown",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __( "Navigation Dots", 'rsaddon' ),
                        "param_name" => "slider_dots",
                        "value" => array(
                            __( 'Disabled', 'rsaddon' ) => 'false',
                            __( 'Enabled', 'rsaddon' )  => 'true',
                            ),
                        "description" => __( "Enable or disable navigation dots. Default: Disable", 'rsaddon' ),
                        "dependency" => Array('element' => 'service_slider_style', 'value' => array('Style 2')),
                        'group' => 'Style',                      
                    ),
                
                    array(
                        'type' => 'css_editor',
                        'heading' => __( 'CSS box', 'rsaddon' ),
                        'param_name' => 'css',
                        'group' => __( 'Design Options', 'rsaddon' ),
                    ),            
                        
                ),
                
                    
            )
        );                                   
    }
     
   add_action( 'vc_before_init', 'vc_rs_service_slider_mapping' );
     
    // Element HTML
    function vc_rsservice_slider_html( $atts,$content ) {
         $attributes = array();
        // Params extraction
        extract(
            shortcode_atts(
                array(
                    'title'                => '',                      
                    'title_case'           => '',                      
                    'service_light_dark'   => 'light',                      
                    'team_per'             => '6',                                     
                    'align'                => '',                                     
                    'css_class_custom'     => '',                                     
                    'excerpt_limit'        => '22',                                     
                    'service_slider_style' => '',                                     
                    'css'                  => '' ,
                    'cat'                  => '',           
                    'read_more'            => '',           
                    'readmore_type'        => '',           
                    'more_text'            => '',           
                    'link_type'            => '',
                    'number_color'         => '',           
                    'service_link'         => '',           
                    'title_color'          => '',           
                    'border_color'         => '',           
                    'desc_color'           => '',           
                    'desc_bg'              => '',
                    'col_lg'               => '3',
                    'col_md'               => '3',
                    'col_sm'               => '3',
                    'col_mobile'           => '1',          
                    'slider_dots'          => 'false',          
                ), 
                $atts,'vc_serviceslider'
           )
        );

    
        $a = shortcode_atts(array(
            'screenshots' => 'screenshots',
        ), $atts);

        //parse link for vc linke
        if($link_type == "external_link"){
            //parse link for vc linke       
            $service_link = ( '||' === $service_link ) ? '' : $service_link;
            $service_link = vc_build_link( $service_link );
            $use_link = false;
            if ( strlen( $service_link['url'] ) > 0 ) {
                $use_link = true;
                $a_href = $service_link['url'];
                $a_title = $service_link['title'];
                $a_target = $service_link['target'];
            }
            
            if ( $use_link ) {
                $attributes[] = 'href="' . esc_url( trim( $a_href ) ) . '"';
                $attributes[] = 'title="' . esc_attr( trim( $a_title ) ) . '"';
                if ( ! empty( $a_target ) ) {
                    $attributes[] = 'target="' . esc_attr( trim( $a_target ) ) . '"';
                }
            }
            $attributes = implode( ' ', $attributes );
        }

        $img = wp_get_attachment_image_src($a["screenshots"], "large");
        $imgSrc = $img[0];
        
        //extract content
        $atts['content'] = $content;

        //extact icon 
        $iconClass = isset( ${'icon_fontawesome'} ) ? esc_attr( ${'icon_fontawesome'} ) : 'fa fa-users';
        //extract css edit box
        $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css, ' ' ), $atts ); 

        //custom color added
        $title_color  = ($title_color) ? ' style="color: '.$title_color.'"' : '';
        $border_color = ($border_color) ? ' style="border-color: '.$border_color.'"' : '';
        $desc_color   = ($desc_color) ? ' style="color: '.$desc_color.'"' : '';
        $desc_bg      = ($desc_bg) ? ' style="background: '.$desc_bg.'"' : '';
        $title_case = ($title_case=="true") ? 'title-upper' : '';
        $number_color   = ($number_color) ? ' style="color: '.$number_color.'"' : '';
        $html='<div class="rs-team">
        <div class="team-carousel owl-carousel owl-navigation-yes">';       
        $post_title_show='';
        $degination='';
        $description_team='';

            
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
        if(empty($cat)){
            $best_wp = new wp_Query(array(
                    'post_type' => 'services',
                    'posts_per_page' =>$team_per,
                    
            ));   
        }   
        else{
            $best_wp = new wp_Query(array(
                    'post_type' => 'services',
                    'posts_per_page' =>$team_per,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'service-category',
                            'field' => 'slug', //can be set to ID
                            'terms' => $arr_cats//if field is ID you can reference by cat/term number
                        ),
                    )
            ));   
        }  
            
        if("Style 2" == $service_slider_style ){

            $html = '<div class="service-carousel services-'.$service_light_dark.'">';
                while($best_wp->have_posts()): $best_wp->the_post();

                    $post_title= get_the_title($best_wp->ID);
                    $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
                    $post_meta_data = get_post_meta(get_the_ID(), 'service-thumb', true);
                    $post_meta_data2 = get_post_meta(get_the_ID(), 'service-thumb-hover', true);
                    if($link_type == ""){
                        $attributes = '';
                        $service_title = $post_title;
                    }
                    if($link_type == "default_link"){
                        $attributes = 'href="' . get_post_permalink($best_wp->ID) . '"';
                        $service_title = '<a '.$attributes.' '.$title_color.'>'.$post_title.'</a>';
                    }
                    if($link_type == "external_link"){
                        $service_title = '<a '.$attributes.' '.$title_color.'>'.$post_title.'</a>';
                    }

                    $title = get_the_title();

                    $excerpt = neurone_custom_excerpt($excerpt_limit);

                    if($link_type != ""){
                        $more_text = ($more_text) ? '<a class="service-readons" '.$attributes.'>Read More</a>' : '';
                        if("icon"==$readmore_type){
                            $more_text = '<div class="icon-button"><a '.$attributes.'><i class="glyph-icon flaticon-right-arrow"></i></a></div>';
                        }
                    }else{
                        $more_text = '';
                    }

                    $service_item_data = array(      
                        'nav'        => ( $slider_dots === 'true' ) ? true : false,                          
                        'col_lg'     => $col_lg,
                        'col_md'     => $col_md,
                        'col_sm'     => $col_sm,                                
                        'col_mobile' => $col_mobile,
                        'slider_dots'=> $slider_dots,
                    );                            
                    wp_localize_script( 'neuron-main', 'service_slider_data', $service_item_data );

                    $html .= '
                        <div class="service-item services-sliders2 '.$css_class.' '.$css_class_custom.'" '.$border_color.'>';
                            
                            $html .= '<div class="services-desc">';
                                if ($post_meta_data) {
                                    $html .= '<img class="service_icon" src="'.$post_meta_data.'" alt="" />';
                                }
                                if ($post_meta_data2) {
                                    $html .= '<img class="service_icon service_icon2" src="'.$post_meta_data2.'" alt="" />';
                                }
                                $html .= '<h4 class="services-title '.$title_case.'">'.$service_title.'</h4>
                                    <p '.$desc_color.'>'.$excerpt.'</p>
                                    '.$more_text.'
                                </div>
                            </div>';
                    endwhile;
                    wp_reset_query();
            $html .='</div>';   
        } elseif("Style 3" == $service_slider_style ){

            $html = '<div class="service-carousels row services4">';
                while($best_wp->have_posts()): $best_wp->the_post();
                   
                    $post_title= get_the_title($best_wp->ID);
                    $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
                    $post_meta_data = get_post_meta(get_the_ID(), 'service-thumb', true);
                    $post_meta_data2 = get_post_meta(get_the_ID(), 'service-thumb-hover', true);
                    if($link_type == ""){
                        $attributes = '';
                        $service_title = $post_title;
                    }
                    if($link_type == "default_link"){
                        $attributes = 'href="' . get_post_permalink($best_wp->ID) . '"';
                        $service_title = '<a '.$attributes.' '.$title_color.'>'.$post_title.'</a>';
                    }
                    if($link_type == "external_link"){
                        $service_title = '<a '.$attributes.' '.$title_color.'>'.$post_title.'</a>';
                    }
                    
                    $title = get_the_title();

                    $excerpt = neurone_custom_excerpt($excerpt_limit);

                    if($link_type != ""){
                        $more_text = ($more_text) ? '<a class="service-readons" '.$attributes.'>Read More</a>' : '';
                        if("icon"==$readmore_type){
                            $more_text = '<div class="icon-button"><a '.$attributes.'><i class="glyph-icon flaticon-right-arrow"></i></a></div>';
                        }
                    }else{
                        $more_text = '';
                    }

                    $service_item_data = array(      
                        'nav'                => ( $slider_dots === 'true' ) ? true : false,                          
                        'col_lg'     => $col_lg,
                        'col_md'     => $col_md,
                        'col_sm'     => $col_sm,                                
                        'col_mobile' => $col_mobile,
                        'slider_dots'=> $slider_dots,
                    );                            
                    wp_localize_script( 'neuron-main', 'service_slider_data', $service_item_data );

                    $html .= '
                        <div class="service-item services-sliders4 col-lg-4 '.$css_class.' '.$css_class_custom.'" '.$border_color.'>';
                            
                            $html .= '<div class="services-desc">';                                
                                if ($post_img_url) {
                                    $html .= '<img class="service_image" src="'.$post_img_url.'" alt="" />';
                                }
                                $html .= '<div class="inner-dis">';
                                 if ($post_meta_data) {
                                    $html .= '<div class="top-imgs"><img class="service_icon_cir" src="'.$post_meta_data.'" alt="" /></div>';
                                }
                                $html .= '<h4 class="services-title '.$title_case.'">'.$service_title.'</h4>
                                    <p '.$desc_color.'>'.$excerpt.'</p>
                                    '.$more_text.'
                                </div>
                                </div>
                            </div>';
                    endwhile;
                    wp_reset_query();
            $html .='</div>';
        } elseif("Style Grid" == $service_slider_style ){            
            
            $html = '<div class="service-carousels row services-'.$service_light_dark.'">';
                $i = 1;
                while($best_wp->have_posts()): $best_wp->the_post();
                   
                    $post_title= get_the_title($best_wp->ID);
                    $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
                    $post_meta_data = get_post_meta(get_the_ID(), 'service-thumb', true);
                    $post_meta_data2 = get_post_meta(get_the_ID(), 'service-thumb-hover', true);
                    if($link_type == ""){
                        $attributes = '';
                        $service_title = $post_title;
                    }
                    if($link_type == "default_link"){
                        $attributes = 'href="' . get_post_permalink($best_wp->ID) . '"';
                        $service_title = '<a '.$attributes.' '.$title_color.'>'.$post_title.'</a>';
                    }
                    if($link_type == "external_link"){
                        $service_title = '<a '.$attributes.' '.$title_color.'>'.$post_title.'</a>';
                    }
                    
                    $title = get_the_title();

                    $excerpt = neurone_custom_excerpt($excerpt_limit);

                    if($link_type != ""){
                        $more_text = ($more_text) ? '<a class="service-readons" '.$attributes.'>Read More</a>' : '';
                        if("icon"==$readmore_type){
                            $more_text = '<div class="icon-button"><a '.$attributes.'><i class="glyph-icon flaticon-right-arrow"></i></a></div>';
                        }
                    }else{
                        $more_text = '';
                    }

                    $service_item_data = array(      
                        'nav'                => ( $slider_dots === 'true' ) ? true : false,                          
                        'col_lg'     => $col_lg,
                        'col_md'     => $col_md,
                        'col_sm'     => $col_sm,                                
                        'col_mobile' => $col_mobile,
                        'slider_dots'=> $slider_dots,
                    );                            
                    wp_localize_script( 'neuron-main', 'service_slider_data', $service_item_data );

                    $html .= '
                        <div class="service-item services-sliders2 services-sliders3 col-lg-4 '.$css_class.' '.$css_class_custom.'" '.$border_color.'>';
                            
                            $html .= '<div class="services-desc">';                                
                                if ($post_meta_data) {
                                    $html .= '<img class="service_icon" src="'.$post_meta_data.'" alt="" />';
                                }
                                if ($post_meta_data2) {
                                    $html .= '<img class="service_icon service_icon2" src="'.$post_meta_data2.'" alt="" />';
                                }
                                $html .= '<h4 class="services-title '.$title_case.'">'.$service_title.'</h4>
                                    <p '.$desc_color.'>'.$excerpt.'</p>
                                    '.$more_text.'
                                    <span class="num" '.$number_color.'>'.$i++.'</span>
                                </div>
                            </div>';
                    endwhile;
                    wp_reset_query();
            $html .='</div>';   
        }  else  {
                $html = '<section id="rs-services-slider" class="rs-services gray-color rs-services1">  
                    <div>                   
                        <div class="clfeatures">
                            <div class="row common-height clearfix">
                                <div class="col-md-6  nopadding-sm clearfix">
                                    <div class="vertical-middle">
                                        <div class="col-padding clearfix">
                                            <div id="item-thumb" class="item-thumb">';
                                                while($best_wp->have_posts()): $best_wp->the_post();
                                                    $post_title= get_the_title($best_wp->ID);
                        
                            
                                                     $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
                                                     $post_meta_data = get_post_meta(get_the_ID(), 'service-thumb', true);

                                                    $ttile = get_the_title();

                                                     $service3_item_data = array(
                                                        'col_lg'     => $col_lg
                                                    );                            
                                                    wp_localize_script( 'neuron-main', 'service3_slider_data', $service3_item_data );

               
                                                if( $post_meta_data !='' ){ 
                                                        $html .= '<div class="owl-dot service_icon_style">
                                                    <img class="service_icon" src="'.$post_meta_data.'" alt="" />
                                                    
                                                    <h5 class="tile-content">
                                                            <a href="#">
                                                                '.$ttile.'
                                                            </a>
                                                        </h5>

                                                    </div>';
                                               }
                                               else{

                                                    $html .= '<div class="owl-dot">
                                                    <img class="service-img" src="'.$post_img_url.'" alt="" />
                                                    
                                                        <h5 class="overlay-feature-title">
                                                            <a href="#">
                                                                '.$ttile.'
                                                            </a>
                                                        </h5>
                                                    </div>';
                                               }

                                                endwhile; 
                                                wp_reset_query();
                                            $html .= '</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 nopadding">

                                    <div id="feature-left" class="menu-carousel owl-carousel image-carousel feature-left custom-js owl-loaded">';
                                        while($best_wp->have_posts()): $best_wp->the_post();
                                            $post_title= get_the_title($best_wp->ID);
                
                    
                                            $post_img_url = get_the_post_thumbnail_url($best_wp->ID,'full');
                                            $post_url = get_post_permalink($best_wp->ID); 
                                            $title = get_the_title();
                                            $excerpt = get_the_excerpt();

                                            if($link_type == ""){
                                                $attributes = '';
                                                $service_title = $post_title;
                                                $service_image = '<img src="'. $post_img_url.'" alt="" >';
                                            }
                                            if($link_type == "default_link"){
                                                $attributes = 'href="' . get_post_permalink($best_wp->ID) . '"';
                                                $service_title = '<a '.$attributes.'>'.$post_title.'</a>';
                                                $service_image = '<a '.$attributes.'><img src="'. $post_img_url.'" alt="" ></a>';
                                            }
                                            if($link_type == "external_link"){
                                                $service_title = '<a '.$attributes.'>'.$post_title.'</a>';
                                                $service_image = '<a '.$attributes.'><img src="'. $post_img_url.'" alt="" ></a>';
                                            }
                                            $ser_link = get_permalink();

                                            $html .='<div class="cl-ft-item">
                                                '.$service_image.'
                                                <div class="feature-content clearfix">
                                                    <div class="heading-block">
                                                        <h4 class="feature-title">'.$service_title.'</h4>
                                                        '.$excerpt.'
                                                    </div>
                                                    <div class="service_details">
                                                        <a class="readon" href="'.$ser_link.'">View Details</a>
                                                    </div>
                                                </div>
                                            </div>';                      
                                            endwhile; 
                                            wp_reset_query();           
                                    $html .='</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>' ;
            }
    return $html; 
}

add_shortcode( 'vc_serviceslider', 'vc_rsservice_slider_html' );