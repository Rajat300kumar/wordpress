<?php

$icon_css = $title_css = $title_spacing = $number_css = '';


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
    $title_spacing .= "margin-bottom: {$spacing_bottom}px;";
}

if ( $number_bg_color != '' ) { 
    $number_css  .= "background: {$number_bg_color};";  
}

if ( $service_num_color != '' ) {    
     $number_css  .= "color: {$service_num_color};";  
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
	<ul class="process-boxes">
	<li>
		<div class="services-main process-boxes rs-services-default  services-'.$align.'">
		<div class="services-wrap '.$css_class.' '.$css_class_custom.' '.$box_shadow.'"> 
		 <div class="services-item style_number">';
		 
            if($service_number!=""):
            $html .=  '<div style="'.$number_css.'" class="services-number">
							'.$service_number.'
					   </div>';
			endif;
			

           	 $html .= '<div class="services-desc" '.$desc_bg.'>
				'.$sub_title.'
					<h3 style ="'.esc_attr($title_spacing).'" class="services-title">
						<a data-onhovercolor="'.$title_hovercolor.'" data-onleavecolor="'.$title_color.'" '. $attributes.' style="'.esc_attr($title_css).'">'.$title.'</a>

						
					</h3>
					<p '.$desc_color_show.'>'.$atts['content'].' </p>
				</div>
			</div>	
		</div></div></li></ul>';
		
  	echo $html;
?>