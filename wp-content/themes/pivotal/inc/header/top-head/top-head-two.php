<?php
/* Top Header part for pivotal Theme
*/
global $pivotal_option;

// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');

if($rs_top_bar != 'hide'){
  if(!empty($pivotal_option['show-top']) || ($rs_top_bar == 'show')){
       if( !empty($pivotal_option['top-email']) || !empty($pivotal_option['phone']) || !empty($pivotal_option['show-social'])){?> 

          <div class="toolbar-area">
            <div class="<?php echo esc_attr($header_width);?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="toolbar-contact">
                    <ul class="rs-contact-info">                        

                        <?php if(!empty($pivotal_option['top-email'])) { ?>
                        <li class="rs-contact-email">
                            <i class="glyph-icon flaticon-email"></i>                  
                            <a href="mailto:<?php echo esc_attr($pivotal_option['top-email'])?>"><?php echo esc_html($pivotal_option['top-email'])?></a>                
                        </li>
                        <?php } ?>

                        <?php if(!empty($pivotal_option['phone'])) { ?>
                        <li class="rs-contact-phone">
                          <i class="glyph-icon flaticon-phone-1"></i>                                      
                              <a href="tel:<?php echo esc_attr(str_replace(" ","",($pivotal_option['phone'])))?>"> <?php echo esc_html($pivotal_option['phone']); ?></a>                   
                        </li>
                        <?php } ?>                        

                        <?php if(!empty($pivotal_option['top-location'])) { ?>              
                        <li class="rs-contact-location">
                          <i class="fa flaticon-location"></i> 
                          <span class="contact-inf">
                            <span><?php if(!empty($pivotal_option['location-pretext'])): echo esc_html($pivotal_option['location-pretext']); endif;?> </span>
                           <?php echo esc_html($pivotal_option['top-location'])?>
                          </span>
                        </li>
                      <?php } ?>
                  </ul>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="top-bar-right">
                        <?php  if($rs_show_quote != 'hide'){
                            if(!empty($pivotal_option['quote'])){ ?>
                            <div class="btn_quote"><a href="<?php echo esc_url($pivotal_option['quote_link']); ?>" class="quote-button"><?php  echo esc_html($pivotal_option['quote']); ?></a></div>
                        <?php } }  ?>
                        <div class="toolbar-sl-share">
                            <ul class="clearfix">
                              <?php
                              if(!empty($pivotal_option['show-social'])){
                                $top_social = $pivotal_option['show-social']; 
                            
                                if($top_social == '1'){ 
                                                  
                                    if(!empty($pivotal_option['facebook'])) { ?>
                                    <li> <a href="<?php echo esc_url($pivotal_option['facebook']);?>" target="_blank"><i class="fa fa-facebook"></i></a> </li>
                                    <?php } ?>
                                    <?php if(!empty($pivotal_option['twitter'])) { ?>
                                    <li> <a href="<?php echo esc_url($pivotal_option['twitter']);?> " target="_blank"><i class="fa fa-twitter"></i></a> </li>
                                    <?php } ?>
                                    <?php if(!empty($pivotal_option['rss'])) { ?>
                                    <li> <a href="<?php  echo esc_url($pivotal_option['rss']);?> " target="_blank"><i class="fa fa-rss"></i></a> </li>
                                    <?php } ?>
                                    <?php if (!empty($pivotal_option['pinterest'])) { ?>
                                    <li> <a href="<?php  echo esc_url($pivotal_option['pinterest']);?> " target="_blank"><i class="fa fa-pinterest-p"></i></a> </li>
                                    <?php } ?>
                                    <?php if (!empty($pivotal_option['linkedin'])) { ?>
                                    <li> <a href="<?php  echo esc_url($pivotal_option['linkedin']);?> " target="_blank"><i class="fa fa-linkedin"></i></a> </li>
                                    <?php } ?>
                                    <?php if (!empty($pivotal_option['google'])) { ?>
                                    <li> <a href="<?php  echo esc_url($pivotal_option['google']);?> " target="_blank"><i class="fa fa-google-plus-square"></i></a> </li>
                                    <?php } ?>
                                    <?php if (!empty($pivotal_option['instagram'])) { ?>
                                    <li> <a href="<?php  echo esc_url($pivotal_option['instagram']);?> " target="_blank"><i class="fa fa-instagram"></i></a> </li>
                                    <?php } ?>
                                    <?php if(!empty($pivotal_option['vimeo'])) { ?>
                                    <li> <a href="<?php  echo esc_url($pivotal_option['vimeo']);?> " target="_blank"><i class="fa fa-vimeo"></i></a> </li>
                                    <?php } ?>
                                    <?php if (!empty($pivotal_option['tumblr'])) { ?>
                                    <li> <a href="<?php  echo esc_url($pivotal_option['tumblr']);?> " target="_blank"><i class="fa fa-tumblr"></i></a> </li>
                                    <?php } ?>
                                    <?php if (!empty($pivotal_option['youtube'])) { ?>
                                    <li> <a href="<?php  echo esc_url($pivotal_option['youtube']);?> " target="_blank"><i class="fa fa-youtube"></i></a> </li>
                                    <?php } ?>
                                            <?php if(is_active_sidebar('language-widget')){?>                                 
                                                <?php dynamic_sidebar('language-widget');?>                             
                                            <?php }?>
                                        <?php }
                                    }
                                 ?>
                            </ul>
                        </div>
                    </div>
                </div>              
            </div>            
          </div>
          <hr>
      </div>
      <?php 
    }
  }
} ?>
