<?php
/*
     Footer Social
*/
     global $pivotal_option;
?>
<?php 
      if(!empty($pivotal_option['show-social2'])){
            $footer_social = $pivotal_option['show-social2'];
            if($footer_social == 1){?>
                  <ul class="footer_social">  
                        <?php
                         if(!empty($pivotal_option['facebook'])) { ?>
                         <li> 
                              <a href="<?php echo esc_url($pivotal_option['facebook'])?>" target="_blank"><span><i class="fa fa-facebook"></i></span></a> 
                         </li>
                        <?php } ?>
                        <?php if(!empty($pivotal_option['twitter'])) { ?>
                        <li> 
                              <a href="<?php echo esc_url($pivotal_option['twitter']);?> " target="_blank"><span><i class="fa fa-twitter"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if(!empty($pivotal_option['rss'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($pivotal_option['rss']);?> " target="_blank"><span><i class="fa fa-rss"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($pivotal_option['pinterest'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($pivotal_option['pinterest']);?> " target="_blank"><span><i class="fa fa-pinterest-p"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($pivotal_option['linkedin'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($pivotal_option['linkedin']);?> " target="_blank"><span><i class="fa fa-linkedin"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($pivotal_option['google'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($pivotal_option['google']);?> " target="_blank"><span><i class="fa fa-google-plus-square"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($pivotal_option['instagram'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($pivotal_option['instagram']);?> " target="_blank"><span><i class="fa fa-instagram"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if(!empty($pivotal_option['vimeo'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($pivotal_option['vimeo'])?> " target="_blank"><span><i class="fa fa-vimeo"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($pivotal_option['tumblr'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($pivotal_option['tumblr'])?> " target="_blank"><span><i class="fa fa-tumblr"></i></span></a> 
                        </li>
                        <?php } ?>
                        <?php if (!empty($pivotal_option['youtube'])) { ?>
                        <li> 
                              <a href="<?php  echo esc_url($pivotal_option['youtube'])?> " target="_blank"><span><i class="fa fa-youtube"></i></span></a> 
                        </li>
                        <?php } ?>     
                  </ul>
       <?php } 
}?>
