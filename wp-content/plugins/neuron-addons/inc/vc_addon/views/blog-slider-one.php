<div class="rs-blog home-blog-area rs-blog-style1 <?php echo $css_class_custom; ?>">
	<div class="blog-carousel blog-slider owl-carousel owl-navigation-yes" data-carousel-options="<?php echo esc_attr( $owl_data );?>">
	 <?php 
		$post_title_show='';
		$degination='';
		$taxonomy='category';
	        if( empty($cat) ){
	        	$best_wp = new wp_Query(array(
					'posts_per_page' =>$post_per,
					'order' => 'DESC',							
					'tax_query' => array(
						array(                
							'taxonomy' => 'post_format',
							'field' => 'slug',
							'terms' => array( 
								'post-format-aside',
								'post-format-audio',
								'post-format-chat',
								'post-format-gallery',
								'post-format-image',
								'post-format-link',
								'post-format-quote',
								'post-format-status',
								'post-format-video'
							),
							'operator' => 'NOT IN'
						)
					)
				));	
	        }
	        else{
				$best_wp = new wp_Query(array(
						'posts_per_page' =>$post_per,
						'order' => 'DESC',
						'category_name'       => $cat,
						'tax_query' => array(
						array(                
							'taxonomy' => 'post_format',
							'field' => 'slug',
							'terms' => array( 
							'post-format-aside',
							'post-format-audio',
							'post-format-chat',
							'post-format-gallery',
							'post-format-image',
							'post-format-link',
							'post-format-quote',
							'post-format-status',
							'post-format-video'
						),
							'operator' => 'NOT IN'
						)
					)
				));	
	        }
		
			while($best_wp->have_posts()): $best_wp->the_post();
			    $post_title= get_the_title($best_wp->ID);
			    $post_img_url = '';
			    $post_url=get_post_permalink($best_wp->ID);
			    
			    $post_title= get_the_title($best_wp->ID);
				if( $title == 'yes'){
					$title_show = '<h3 class="blog-title"><a href="'.$post_url.'">'.$post_title.'</a></h3>' ;				
				}
				else{
					$title_show = '';
				}


				
				if($degination!='No'){
			    	$designation = get_post_meta( get_the_ID(), 'designation', true );
				}
			    
				$post_date      = get_the_date('d');	
				$post_date2     = get_the_date('M');	
				$full_date      = get_the_date();	
				
				//$post_comment      =get_wp_count_comments($best_wp->ID);
				$post_id = get_the_id();
				$post_admin          = get_the_author();
				$post_author_image   = get_avatar(( $best_wp->ID ) , 70 ); 	
				$post_content        = get_the_excerpt();

				if(!empty($excerpt_limit)){
					$post_content = pivotal_custom_excerpt($excerpt_limit);
				}

				$user_id             = '';
				$author_desigination = get_the_author_meta( 'position', $user_id );
				$comments_count      = get_comments_number( '0', '1', '%' );
				$categories          = get_the_category();
				$binfo               = '';
				$blog_cats           = '';
				$show_date           = '';
				$full_date_show      = '';

				if ( ! empty( $categories ) ) {
				    $cat_name = esc_html( $categories[0]->name );
				    $link= esc_url( get_category_link( $categories[0]->term_id ) ) ;
				}
				$by = __( "By", 'rsaddon' );		
			
				$readmore_text = ($readmore == 'Yes') ? '<div class="blog-button"><a href="'.esc_url($post_url).'">'.$more_text.'</a></div>' : '';
				if("icon"==$readmore_type){
					$readmore_text = ($readmore == 'Yes') ? '<div class="icon-button"><a href="'.esc_url($post_url).'"></a></div>' : '';
				}
				if('yes'==$blog_meta){
					if( $blog_information == 'yes'){
						$binfo = '<span class="post-meta author"><i class="fa fa-user-o"></i>'.$post_admin.'</span>' ;
					}
					if('yes'== $blog_cat){
						$blog_cats = '<span class="category"><i class="fa fa-folder-o"></i><a href="'.$link.'">'.$cat_name.'</a></span>';
					}
				}
				if( $blog_date == 'yes'){
					$show_date = '<div class="blog-date">
									<span class="date">'.$post_date.' </span>
									<span class="month">'.$post_date2.' </span>		
								</div>';
					$full_date_show = '<span class="post-meta date-meta"><i class="fa fa-calendar-check-o"></i>'.$full_date.'</span>';
				}
				
				if('no'!==$show_thumb){
					$post_img_url = get_the_post_thumbnail($best_wp->ID, 'latest_blog_home');
				}

				if( $blog_date == 'yes' && !$post_img_url ){
					$show_date = '<div class="full-date">
									'.$full_date.'
								</div>';
				}
				$no_thumb = '';
			    if(!$post_img_url){
			    	$no_thumb = 'no-thumb';
			    }

			   
				if($show_excerpt == 'Yes'){
					$description_text_content = '<div class="blog-desc">
						'.$post_content.'
					</div>';
				}
				else{
					$description_text_content = '';
				}
				if(!empty($description_text_content) || !empty($readmore_text)){
					$blog_description = '<div class="home_full_blog slider-blog-title">
						'.$description_text_content.'
						'.$readmore_text.'
						<div class="clear"></div>
					</div>';
				}else{
					$blog_description = '';
				}
		?>	
		<div class="blog-item <?php echo $news_style;?> <?php echo $no_thumb;?>  <?php echo $align;?>">
			<div class="blog-img content-overlay"> 
				<a href="<?php echo $post_url; ?>"><?php echo $post_img_url;?></a>
			</div>
			<div class="blogfull">
				<div class="blog-slidermeta blog-date">
					<?php echo $full_date_show; echo $blog_cats;
					echo $binfo;
					?>
				</div>	
				<div class="blog-meta">
					<?php echo $title_show;?>
				</div>
						
				<?php echo $blog_description;?>
			</div>
		</div>
	<?php endwhile;
	wp_reset_query();?>
	</div>
</div>