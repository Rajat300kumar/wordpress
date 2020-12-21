<?php
	$title_color_price = ($atts['title_color']) ? 'style="color:'.$atts['title_color'].'"' : '';	
	$subtitle          = ($atts['subtitle']) ? '<h6 '.$title_color_price.'>'. $atts['subtitle'].'</h6>' : '';
	$price_content     = balanceTags($atts['content'], true);
	$price_color       = ($atts['price_color']) ? 'style="color:'.$atts['price_color'].'"' : '';	
	$text_color        = ($atts['text_color']) ? 'style="color:'.$atts['text_color'].'"' : '';	
?>

<section class="cl-pricing-wrap">
  <div class="clpricing-table">
	<div class="price-table <?php echo esc_attr($style); ?>" <?php echo wp_kses_post($boxes_color); ?>>
	  <div class="cl-pricetable-wrap <?php echo esc_attr($featured_class); ?>">
		<div class="top">
		 <?php echo wp_kses_post($iconbg); ?>
		 <?php echo wp_kses_post($featured); ?>
		  <div class="cl-header">
			<h3 class="price-title" <?php echo wp_kses_post($title_color_price); ?>><?php echo esc_html($title); ?></h3>           
		  </div>
		  <div class="cl-subheader">
			<h3 <?php echo wp_kses_post($price_color); ?>> 
				<span class="dolar"  <?php echo wp_kses_post($price_color); ?>><?php echo esc_html($currency); ?></span><?php echo $price; ?>  
			</h3>
		    <h5 <?php echo wp_kses_post($price_color); ?>><?php echo esc_html($per); ?></h5>
				<?php echo wp_kses_post($subtitle); ?>
		  </div>				  
		</div>
		<div class="bottom" <?php echo wp_kses_post($text_color); ?>>
		  <?php echo wp_kses_post($price_content); ?>
		  <div class="price-btn"><?php echo wp_kses_post($btn_code); ?></div>
		</div>
	  </div>
	</div>
  </div>
</section>
