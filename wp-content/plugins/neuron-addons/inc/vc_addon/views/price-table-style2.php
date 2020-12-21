<?php
	$title_color_price = ($atts['title_color']) ? 'style="color:'.$atts['title_color'].'"' : '';	
	$price_content = balanceTags($atts['content'], true);
	$titlebg = !empty($titlebg) ? 'style="background:url('.$titlebg.')"' : '';
?>
<section class="cl-pricing-wrap">
	<div class="clpricing-table">
		<div class="price-table <?php echo esc_attr($style); ?>">
			<div class="cl-pricetable-wrap" <?php echo wp_kses_post($boxes_color); ?>>
				<div class="top" <?php echo $titlebg; ?>>
					<?php echo wp_kses_post($iconbg); ?>
					<?php echo wp_kses_post($featured); ?>
					<div class="cl-header">
						<h3 style="color:<?php echo wp_kses_post($title_color); ?>"><?php echo esc_html($title); ?></h3>          
					</div>
					<div class="cl-subheader">
						<h3 style="color:<?php echo wp_kses_post($price_color); ?>"> <span class="dolar"  style="color:<?php echo wp_kses_post($price_color); ?>"><?php echo esc_html($currency); ?></span><?php echo esc_html($price); ?>
							<small style="color:<?php echo wp_kses_post($title_color); ?>"><?php echo esc_html($per); ?></small>
						</h3>
						<?php if(!empty($subtitle)){?>
						<h6 style="color:<?php echo wp_kses_post($subtitle_color); ?>"><?php echo wp_kses_post($subtitle); ?></h6>
						<?php } ?>
					</div>
				</div>
				<div class="bottom"  style="color:<?php echo wp_kses_post($text_color); ?>">
					<?php echo wp_kses_post($price_content); ?>
					<div class="price-btn"><?php echo wp_kses_post($btn_code); ?></div>
				</div>
			</div>
		</div>
	</div>
</section>
