<?php $btn_css= '';
if(!empty($buttoncolor)){
	$btn_css .="color:{$buttoncolor};";
}

if(!empty($bnt_background)){
	$btn_css .="background: {$bnt_background};";	
}

?>


<div class="rs-btn btn-<?php echo $align .' '.$css_class; ?>">
	<a style="<?php echo $btn_css; ?>" data-onhovercolor="<?php echo $bnt_hover_text; ?>" data-onhoverbg="<?php echo $bnt_background_hover; ?>" data-onleavebg="<?php echo $button_leave; ?>" data-onleavecolor="<?php echo $normal_btn; ?>" class="readon rs_button <?php echo $button_style; ?>" href="<?php echo $rs_button_link; ?>"><?php echo $rs_button; ?></a>
</div>

