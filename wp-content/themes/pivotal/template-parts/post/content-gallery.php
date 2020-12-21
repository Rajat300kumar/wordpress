
<?php
global $pivotal_option;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	if ( is_sticky() && is_home() ) {
		echo pivotal_get_svg( array( 'icon' => 'thumb-tack' ) );
	}
?>
<div class="single-content-full">
    <div class="bs-desc">
      <div class="blog-meta">
          <ul class="btm-cate">
          <?php
          if (!empty($pivotal_option['blog-date'])):
              if ($pivotal_option['blog-date'] == 1): ?>
                <li>
                  <div class="blog-date">
                    <i class="fa fa-calendar-check-o"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                  </div>                                              
                </li>                                                   
          <?php endif;
          else:
              if ($pivotal_option['blog-date'] == "0"):
                  else: ?>
                      <li>
                          <div class="blog-date">
                              <i class="fa fa-calendar-check-o"></i> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                          </div>                                              
                      </li>
              <?php endif; 
          endif; ?>
        

           <?php if(!empty($pivotal_option['blog-author-post'])){
           if ($pivotal_option['blog-author-post'] == 'show'): ?>
            <li>
                <div class="author">
                  <i class="fa fa-user-o"></i> <?php echo get_the_author(); ?>
                </div>
            </li>
            <?php endif; }
            else{ ?>
              <li>
                <div class="author">
                  <i class="fa fa-user-o"></i> <?php echo get_the_author(); ?>
                </div>
            </li>
           <?php }; 

           if(get_the_category()): ?>                                                                 
            <?php
                //tag add
                $seperator       = ', '; // blank instead of comma
                $after           = '';
                $before          = '';
                echo '<li class ="tag-line without-option-cat">';
                echo '<i class   ="fa fa-folder-o"></i>';
                the_category(', '); 
                echo '</li>';
              ?>                                      
        <?php
      endif; ?>
        </ul>                                                         
      </div>
    <?php
        the_content( sprintf(
          wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'pivotal' ),
            array(
              'span' => array(
                'class' => array(),
              ),
            )
          ),
          get_the_title()
        ) );

        wp_link_pages( array(
          'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'pivotal' ),
          'after'       => '</div>',
          'link_before' => '<span class="page-number">',
          'link_after'  => '</span>',
        ) );
      ?>
    </div>
     <?php 
        if(has_tag()){ ?>
        <div class="bs-info single-page-info tags">
        <?php
          //tag add
          $seperator = ''; // blank instead of comma
          $after = '';
          echo esc_html__( 'Tags: ', 'pivotal' );
          the_tags( '', $seperator, $after );
        ?>             
         </div> 
       <?php } ?> 
</div>
</article><!-- #post-## -->
