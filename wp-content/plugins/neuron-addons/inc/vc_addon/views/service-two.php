<?php
$icon_css = $title_css = $title_spacing = $padding_icon = $desc_css ='';

if ( $size != '' ) {
    $size       = (int) $size;
    $icon_css  .= "font-size: {$size}px;";
}


if ( $title_color != '' ) {    
    $title_css  .= "color: {$title_color};";  
}


if ( $desc_color != '' ) {    
    $desc_css  .= "color: {$desc_color};";  
}

if ( $spacing_top != '' ) {  
    $title_spacing .= "padding-top: {$spacing_top}px;";  
}

if ( $spacing_bottom != '' ) {
    $title_spacing .= "margin-bottom: {$spacing_bottom}px;";
}

if ( $title_size != '' ) {
    $title_size   = (int) $title_size;
    $title_css   .= "font-size: {$title_size}px;";
}

elseif($icon_style_2 == 'circle'){	
	if( $icon_radiussize != '' ){		
		$icon_css .= "border-radius: {$icon_radiussize}%;";
	}
}

$show_text = '';

if(!empty($atts['content'])){
	$show_text = '<p data-onhovercolor="'.$desc_hovercolor.'" data-onleavecolor="'.$desc_color.'" >'.$atts['content'].'</p>';
}


?>

<div class="services-main rs-services1 services-<?php echo $align; ?>" 
	data-leave-bg="<?php echo $primarybg;?>" 
	data-primay-bg="<?php echo $desc_bg_primary;?>" 
	data-title-onhovercolor="<?php echo $title_hovercolor;?>" 
	data-title-onleavecolor="<?php echo $title_color;?>">

	<div class="services-wrap <?php if(!empty($border_p_bg)){
		echo 'bottom_border';
	} ?> <?php echo $css_class; ?> <?php echo $css_class_custom; ?>">		
		<div class="services-item" <?php echo $desc_bg; ?>>


		     <?php if(!empty($imageClass)){ ?>
				<div class="services-icon">
					<?php echo $imageClass; ?>
				</div>
		    <?php } ?>
		    
			<div class="services-desc">
				<h3 class="services-title"><a <?php echo $attributes; ?>><?php echo $title; ?></a></h3>
				<?php echo $show_text; ?>
			</div>

			<?php if(!empty($border_p_bg)) { ?>
				<div class="border_bottom"></div>
			<?php } ?>

		</div>	
	</div>
</div>