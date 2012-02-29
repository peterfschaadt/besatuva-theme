<?php
if(get_theme_option('featured_posts') != '') {
?>
<script type="text/javascript">
	function startGallery() {
		var myGallery = new gallery($('myGallery'), {
			timed: true,
			delay: 6000,
			slideInfoZoneOpacity: 1.0,
			showCarousel: false 
		});
	}
	window.addEvent('domready', startGallery);
</script>
<div class="fullbox_excerpt">
	<div class="fullbox_content">
		<div class="smooth_gallery">
			<div id="myGallery">
				
				
				<?php
				$featured_posts_category = get_theme_option('featured_posts_category');
				
				if($featured_posts_category != '' && $featured_posts_category != '0') {
					global $post;

					 $featured_posts = get_posts("numberposts=5&&category=$featured_posts_category");
					 $i = 0;
					 foreach($featured_posts as $post) {
					 	setup_postdata($post);
                        if ( version_compare( $wp_version, '2.9', '>=' ) ) {
                            $slide_image_full = get_the_post_thumbnail($post->ID,'large', array('class' => 'full'));
                            $slide_image_thumbnail = get_the_post_thumbnail($post->ID,'large', array('class' => 'thumbnail'));
                        } else {
                            $get_slide_image = get_post_meta($post->ID, 'featured', true);
                            $slide_image_full = "<img src=\"$get_slide_image\" class=\"full\" alt=\"\" />";
                            $slide_image_thumbnail = "<img src=\"$get_slide_image\" class=\"thumbnail\" alt=\"\" />";
                        }
					 	
					  ?>
					  <div class="imageElement">
							<h3><?php the_title(); ?></h3>
							<?php the_excerpt(); ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="open"></a> 
							<?php echo  $slide_image_full; ?>
							<?php echo  $slide_image_thumbnail; ?>
						</div>
					 <?php }
				} else {
					for($i = 1; $i <=5; $i++) {
						?>
							<div class="imageElement">
								<h3>Pictures of the Business Ethics Society</h3>
								<p>These pictures are from our "Hiring, Firing, and Facebook" panel we held in the spring.</p>
								<a href="#" title="This is featured post <?php echo $i; ?>" class="open"></a> 
								<img src="<?php bloginfo('template_directory'); ?>/jdgallery/slides/<?php echo $i; ?>.jpg" class="full" alt="" /> 
								<img src="<?php bloginfo('template_directory'); ?>/jdgallery/slides/<?php echo $i; ?>.jpg" class="thumbnail" alt="" /> 
							</div>
						<?php
					}
				}
				
				?>
			</div>
		</div>
	</div>
</div>
<?php } ?>