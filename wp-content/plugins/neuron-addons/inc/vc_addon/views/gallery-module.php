<div class="rs-galleys <?php echo ($css_class);?> <?php echo ($css_class_custom);?>">           
	<div id="rs-galleys" class="gallery-grid">      
				
   <?php 
    function cmb2_output_file_list( $file_list_meta_key, $img_size = 'medium', $gallery_style = 0, $col_group = 1, $col_gap = 1 ) {

        // Get the list of files
        $files = get_post_meta( $gallery_style, $file_list_meta_key, 1 );     
        echo '<div class="file-list-wrap row '.$col_gap.'">';

        // Loop through them and output an image
        foreach ( (array) $files as $attachment_id => $attachment_url ) {
            echo '<div class="col-lg-'.$col_group.' col-md-6"><div class="file-list-image">';
            echo wp_get_attachment_image( $attachment_id, $img_size );
            echo '<a class="image-popup p-zoom" href="'.$attachment_url.'"><i class="fa fa-search"></i></a>';
            echo '</div></div>';
            
        }
        echo '</div>';
    }   

   
?>
				 <?php cmb2_output_file_list( 'Screenshot', 'small', $gallery_style, $col_group, $col_gap ); ?>
			<?php 
	
			wp_reset_query(); ?>
		</div>
	</div>