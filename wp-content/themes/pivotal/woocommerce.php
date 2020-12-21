<?php
get_header();
global $pivotal_option;
// Layout class
if ( $pivotal_option['shop-layout'] == 'full' ) {
	$pivotal_layout_class = 'col-sm-12 col-xs-12';
}
elseif( $pivotal_option['shop-layout'] == 'left-col' || $pivotal_option['shop-layout'] == 'right-col'){
	$pivotal_layout_class = 'col-md-9 col-xs-12';
}
else{
	$pivotal_layout_class = 'col-sm-12 col-xs-12';
}
?>
<div class="container">
	<div id="content" class="site-content">		
		<div class="row">
			<?php
				if(!empty($pivotal_option['disable-sidebar']) && is_product()){
					?>
					<div class="col-sm-12 col-xs-12">
					    <?php					
							woocommerce_content();						
						?>
					</div>
					<?php
				}else{				
					if ( $pivotal_option['shop-layout'] == 'left-col'  ) {
						get_sidebar('woocommerce');
					}
					?>    			
				    <div class="<?php echo esc_attr($pivotal_layout_class);?>">
					    <?php					
							woocommerce_content();						
		   				 ?>
				    </div>
					<?php
					if ( $pivotal_option['shop-layout'] == 'right-col'  ) {
						get_sidebar('woocommerce');
					}	
				}
			?>
		</div>
	</div>
</div>
<?php
get_footer();