<?php
$icon_css = $title_css = $title_spacing = $padding_icon = $desc_css  = '';

if ( $icon_color != '' ) {    
        $icon_css  .= "color: {$icon_color};";  
}

if ( $size != '' ) {
    $size       = (int) $size;
    $icon_css  .= "font-size: {$size}px;";
}

if ( $icon_padding != '' ) {    
    $icon_padding = (int) $icon_padding;
    $padding_icon    .= "padding: {$icon_padding}px;";
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

?>

<div class="services-main rs-services2 services-<?php echo $align; ?>" 
	data-icon-hover="<?php echo $icon_hover_color;?>" 
	data-icon-bg="<?php echo $service_icon_bg;?>" 
	data-icon-color="<?php echo $icon_color_normal;?>" 
	data-icon-sec="<?php echo $icon_color_sec; ?>"  
	data-leave-bg="<?php echo $primarybg;?>" 
	data-primay-bg="<?php echo $desc_bg_primary;?>" 
	data-secondary-bg="<?php echo $desc_bg_secondary;?>" 
	data-title-onhovercolor="<?php echo $title_hovercolor;?>" 
	data-title-onleavecolor="<?php echo $title_color;?>" 
	data-desc-onhovercolor="<?php echo $desc_hovercolor;?>" 
	data-desc-onleavecolor="<?php echo $desc_color;?>">


	<div class="services-wrap <?php echo $css_class; ?> <?php echo $css_class_custom; ?> <?php echo $box_shadow; ?> <?php echo $box_shadow_always; ?> <?php echo $service_alignement; ?>">	
		<div class="services-item " <?php echo $desc_bg; ?>>

			<?php if(!empty($imageClass)){ ?>
				<div class="services-icon">

					<?php if($service_alignement=='icon-left') { ?>
					<div class="icon_left">
					<?php } ?>
						<?php echo $imageClass;

					if($service_alignement=='icon-left') { ?>
						</div>
					<?php } ?>	
					

					</div>
			<?php } ?>



		    <?php if($service_alignement=='icon-left') { ?>
				<div class="icon_left_servie">
			<?php } ?>

			<div class="about-title">
	            <h3 class="title"><a style="<?php echo $title_css; ?>" <?php echo $attributes; ?> ><?php echo $title; ?></a></h3>
	        </div>

			<div class="services-desc"  style="<?php echo $desc_css; ?>">
				<?php echo force_balance_tags($content); ?>
			</div>

			<?php if($service_alignement=='icon-left') { ?>
				</div>
			<?php } ?>

		</div>	
		<?php 
		if(!empty($imgSrc2)){ ?>
			<div class="hover-image">
				<img src="<?php echo esc_url($imgSrc2);?>" alt="Service Image">
			</div>
		<?php } ?>
	</div>
</div>