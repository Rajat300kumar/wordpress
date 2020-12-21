<?php
/* Top Header part for grassy template
*/
global $pivotal_option;
?>
<?php if(!empty($pivotal_option['show-top'])){ 
  if(is_page()){
     $rs_top_bar = get_post_meta($post->ID, 'top_bar', true);
     if($rs_top_bar == 'Show' || $rs_top_bar == ''){
     ?> 
    <div class="toolbar-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-7 col-xs-12">
            <div class="toolbar-contact">
              <ul>
                <?php if(!empty($pivotal_option['welcome-text'])) { ?>
                <li> <i class="fa fa-handshake-o"></i> <?php echo esc_html($pivotal_option['welcome-text']); ?> </li>
                <?php } ?>
                <?php if(!empty($pivotal_option['top-email'])) { ?>
                <li> <i class="fa fa-envelope-o"></i><a href="mailto:<?php echo esc_attr($pivotal_option['top-email'])?>"><?php echo esc_html($pivotal_option['top-email'])?></a> </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-sm-5 col-xs-12">
            <div class="toolbar-sl-share">
              <ul>
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
                      <?php } 
                      }
                  }
                 ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
  }
 }
 else{
  ?>
  <div class="toolbar-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-sm-7 col-xs-12">
            <div class="toolbar-contact">
              <ul>
                <?php if(!empty($pivotal_option['welcome-text'])) { ?>
                <li> <i class="fa fa-handshake-o"></i> <?php echo esc_html($pivotal_option['welcome-text']); ?> </li>
                <?php } ?>                
              </ul>
            </div>
          </div>
          <div class="col-lg-6 col-sm-5 col-xs-12">
            <div class="toolbar-sl-share">
              <ul>
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
                      <?php } 
                      }
                  }
                 ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php
 }
} ?>
