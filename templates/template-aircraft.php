<?php
 /*
 Template Name: Aircraft Page
 */
get_header();
$spec_max_pax = get_post_meta( get_the_ID(), 'max_pax' , true);
$spec_max_range = get_post_meta( get_the_ID(), 'max_range' , true);
$spec_speed = get_post_meta( get_the_ID(), 'speed' , true);
$spec_cabin_height = get_post_meta( get_the_ID(), 'cabin_height' , true);
$spec_cabin_width = get_post_meta( get_the_ID(), 'cabin_width' , true);
$spec_cabin_length = get_post_meta( get_the_ID(), 'cabin_length' , true);
$manu_name = get_post_meta( get_the_ID(), 'manu_name' , true);
$manu_url = get_post_meta( get_the_ID(), 'manu_url' , true);

if ( get_post_meta( get_the_ID(), 'lavatory' , true) == 'Full' ) {
	$spec_lavatory = __( 'Full' , 'lynxjet' );
	
	} elseif ( get_post_meta( get_the_ID(), 'lavatory' , true) == 'Partial' ) {
	$spec_lavatory = __( 'Partial' , 'lynxjet' );

	} elseif ( get_post_meta( get_the_ID(), 'lavatory' , true) == 'None' ) {
	$spec_lavatory = __( 'None' , 'lynxjet' );

}

if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		$attachments = get_posts( array(
								'post_type'   => 'attachment',
								'numberposts' => -1,
								'post_status' => null,
								'aircraft' => $post->post_title,
								'media_category_not_in' => '104'
								
							) );
		$slider_active = get_post_meta( get_the_ID(), 'trav_page_slider', true );
		$slider        = ( $slider_active == '' ) ? 'Deactivated' : $slider_active;
		if ( class_exists( 'RevSlider' ) && $slider != 'Deactivated' ) {
			echo '<div id="slideshow">';
			putRevSlider( $slider );
			echo '</div>';
		}

		$manufacturer = get_terms ( 'manufacturer', array (
							
							))
		?>

		<section id="content" class="aircraft-page">
			<div class="container">
				<div class="row">
					<div id="title" class="col-md-12">
						<h2><?php _e('Aircraft Description', 'lynxjet'); ?></h2>
					</div>
				</div>
				<div class="row">
					<div id="description" class="col-md-3 entry-content">
						<?php the_content(); ?>
						<div id="manufacturer" class="icon-box style2 full-width">
							<i class="soap-icon-plane circle"></i>
							<strong><a href="<?php echo $manu_url ?>" rel="nofollow" target="_blank"><?php echo $manu_name ?></a></strong>
						</div>
					</div>
					<div id="slider" class="col-md-6 flexslider photo-gallery style4 travelo-box" style="margin-bottom: 40px;">
						<ul class="slides">
							<?php 							 
							if ( $attachments ) {
								foreach ( $attachments as $attachment ) {
									?>
									<li><figure class="image-container"><?php echo wp_get_attachment_image( $attachment->ID, 'biggallery-thumb' , true ); ?></figure>
										<div class="img-source text-left"><i class="soap-icon-camera-3"></i> <small><?php echo apply_filters( 'the_description', $attachment->post_content ); ?></small></div>
									</li>
									<?php
								}
							}
							?>
						</ul>
					</div>
					<div class="tech-spec col-md-3">
						<div class="travelo-box">
							<div class="icon-box style4"><i class="soap-icon-plane-left"></i>
								<h3><?php _e('Tech Spec', 'lynxjet'); ?></h3>
								<div class="tech-spec">
									<ul class="check-circle">
										<li><?php _e('Maximum Passengers', 'lynxjet'); ?>: <?php echo $spec_max_pax ?></li>
										<li><?php _e('Maximum Cruising Speed', 'lynxjet'); ?>: <?php echo $spec_speed ?> <?php _e('KmH', 'lynxjet'); ?></li>
										<li><?php _e('Maximum Range', 'lynxjet'); ?>: <?php echo $spec_max_range ?> <?php _e('Km', 'lynxjet'); ?></li>
										<li><?php _e('Cabin Height', 'lynxjet'); ?>: <?php echo $spec_cabin_height ?> <?php _e('Cm', 'lynxjet'); ?></li>
										<li><?php _e('Cabin Width', 'lynxjet'); ?>: <?php echo $spec_cabin_width ?> <?php _e('Cm', 'lynxjet'); ?></li>
										<li><?php _e('Cabin Length', 'lynxjet'); ?>: <?php echo $spec_cabin_length ?> <?php _e('Cm', 'lynxjet'); ?></li>
										<li><?php _e('Lavatory', 'lynxjet'); ?>: <?php echo $spec_lavatory ?></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; endif;
get_footer();