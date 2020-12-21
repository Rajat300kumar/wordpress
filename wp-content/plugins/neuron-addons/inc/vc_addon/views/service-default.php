<?php

$icon_css = $title_css = $title_spacing = '';


if ( $icon_padding != '' ) {    
    $icon_padding = (int) $icon_padding;
    $icon_css    .= "padding: {$icon_padding}px;";
}

if ( $service_icon_bg != '' ) { 
    $icon_css  .= "background-color: {$service_icon_bg};";  
}

if ( $title_color != '' ) {    
     $title_css  .= "color: {$title_color};";  
}

if ( $spacing_top != '' ) {  
    $title_spacing .= "padding-top: {$spacing_top}px;";  
}

if ( $spacing_bottom != '' ) {
    $title_css .= "margin-bottom: {$spacing_bottom}px;";
}

if ( $title_size != '' ) {
    $title_size   = (int) $title_size;
    $title_css   .= "font-size: {$title_size}px;";
}

$sub_title = '';
if( $subtilte != ''){
	$sub_title ='<h4 style="color:'.$subtitle_color.'">'.$subtilte.'</h4>';
}

$sub_title = '';
if( $subtilte != ''){
	$sub_title ='<h4 style="color:'.$subtitle_color.'">'.$subtilte.'</h4>';
}

$desc_color_show = '';
if( $desc_color != ''){
	$desc_color_show ='style="color:'.$desc_color.'"';
}



	$html = '
	
		<div class="services-main rs-services-default  services-'.$align.' '.$box_shadow_always.'">
		<div class="services-wrap '.$css_class.' '.$css_class_custom.'"> 
         <div class="services-item img-'.$img_align.'">';
            if($imageClass!=""):
            $html .=  '<div class="services-icon">
							'.$imageClass.'
					   </div>';
            endif;

           	 $html .= '<div class="services-desc" '.$desc_bg.'>
				'.$sub_title.'
					<h3 style ="'.esc_attr($title_css).'" class="services-title">

						<a data-onhovercolor="'.$title_hovercolor.'" data-onleavecolor="'.$title_color.'" '. $attributes.' style="'.esc_attr($title_css).'">'.$title.'</a>

						
					</h3> ';
					if(!empty($atts['content'])) : 
						$html .='<p '.$desc_color_show.'>'.$atts['content'].' </p>';
					endif;
				$html .='</div>
			</div>	
		</div></div>';
		
  	echo $html;
?>