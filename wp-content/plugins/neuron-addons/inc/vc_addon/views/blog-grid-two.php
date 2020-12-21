
<div class="rs-blog-grid rs-blog <?php echo esc_attr($css_class_custom);?>">
	<div class="row">                     
		<?php $post_title_show='';
			$degination='';
			$categories= '';

			global  $paged;
		    $paged = get_query_var("paged") ? get_query_var("paged"): 1; 

			$best_wp = new wp_Query(array(
					'posts_per_page' =>$post_per,							
					'order' => 'DESC',
					'category_name'       => $cat,
					'paged'			 => $paged,
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
						
			while($best_wp->have_posts()): $best_wp->the_post();

			    $post_title= get_the_title($best_wp->ID);
			    $post_img_url = '';
				$post_url=get_post_permalink($best_wp->ID); 
				if( $title == 'yes'){
					$title_show = '<h3 class="blog-title"><a href="'.$post_url.'"> '.$post_title.' </a></h3>' ;
				}
				else{
					$title_show = '';
				}			
								

						
				if($degination!='No'){
				$designation = get_post_meta( get_the_ID(), 'designation', true );
				}

			    if('no'!==$show_thumb){
					$post_img_url = get_the_post_thumbnail($best_wp->ID);
				}
				
				$post_date=get_the_date('d');	
				$post_date2=get_the_date('M');	
				$full_date=get_the_date();	

				//$post_comment=get_wp_count_comments($best_wp->ID);
				$readmore_text = ($readmore == 'Yes') ? '<div class="blog-button"><a href="'.esc_url($post_url).'">'.$more_text.'</a></div>' : '';
				if("icon"==$readmore_type){
					$readmore_text = ($readmore == 'Yes') ? '<div class="icon-button"><a href="'.esc_url($post_url).'"><i class="glyph-icon flaticon-right-arrow"></i></a></div>' : '';
				}


				$post_admin=get_the_author();
				$author_link = get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) );
				$post_author_image=get_avatar(( $best_wp->ID ) , 70 ); 	


				$post_content= get_the_excerpt();
				if(!empty($excerpt_limit)){
					$post_content = pivotal_custom_excerpt($excerpt_limit);
				}
				$description_text_content  = '';
				$binfo               = '';
				$blog_cats           = '';
				$show_date           = '';
				$by = __( "By", 'rsaddon' );
				if('yes'==$blog_meta){
					if( $blog_information == 'yes'){
						$binfo = '<i class="glyph-icon flaticon-user-1"></i> <span class="author"> '.$post_admin.'</span>' ;
					}
				}

				$full_date_show = '';

				if( $blog_date == 'yes'){
					
					$full_date_show = '<span class="post-meta date-meta"><i class="glyph-icon flaticon-clock-1"></i> '.$full_date.'</span>';
				}

				if('no'!==$show_thumb){
					$post_img_url = get_the_post_thumbnail($best_wp->ID);
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

				$user_id='';
				$author_desigination=get_the_author_meta( 'position', $user_id );
				$comments_count=get_comments_number( '0', '1', '%' );
				$cats_show = get_the_term_list( $best_wp->ID, 'category', ' ', ', ');						
				

				//checking column grid
				$per_item=$pre_row;
				$col='';
				if($per_item =='Col-1'){				
					$col='12';
					
				}
				if($per_item =='Col-4'){
					$col='3';				
				}
				if($per_item =='Col-2'){				
					$col='6';				
				}
				if($per_item =='Col-3'){				
					$col='4';				
				}?>

				<div class="blog-item col-lg-<?php echo $col;?> <?php echo $news_style;?>">
						<div class="blog-img image-scale">
							<?php echo $post_img_url; 
							if('yes'== $blog_cat){ ?>
								<span class="categories">
									<i class="fa fa-book"></i>											
									<?php echo $cats_show; ?>
								</span>
							<?php }  ?>
						</div>
					<div class="bottom-shadow1 <?php echo $no_thumb; ?>">
						<div class="blog-meta">
							<?php echo $title_show;?>	  
								<div class="blog-date">
									<?php echo $full_date_show;
									 	echo $binfo;?>									 									 		
								</div>			 	
							</div>
							<?php echo $description_text_content;
							echo $readmore_text;?>
						</div>
					</div>
			
			<?php endwhile; 
			wp_reset_query();?>
	
	</div>
		<?php $paginate = paginate_links( array(
			'total' => $best_wp->max_num_pages
			));
		if($paginate && $pagination == 'yes'){
			$pagination = '<div class="pagination-area"><div class="nav-links">'.$paginate.'</div></div>';
		}
		else
		{
			$pagination ='';
		}
	echo $pagination;?>
</div>