<?php
 /*
 Template Name: Destination Page
 */
get_header();
$title = get_the_title();
$lynxjet_map_embed = get_post_meta( get_the_ID(), 'lynxjet_map_embed' , true);
$lynxjet_dest_intro = get_post_meta( get_the_ID(), 'lynxjet_dest_intro' , true);
$lynxjet_dest_title = get_post_meta( get_the_ID(), 'lynxjet_dest_title' , true);
$lynxjet_dest_h1 = get_post_meta( get_the_ID(), 'lynxjet_dest_h1' , true);

if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		$slider_active = get_post_meta( get_the_ID(), 'trav_page_slider', true );
		$slider        = ( $slider_active == '' ) ? 'Deactivated' : $slider_active;
		if ( class_exists( 'RevSlider' ) && $slider != 'Deactivated' ) {
			echo '<div id="slideshow">';
			putRevSlider( $slider );
			echo '</div>';
		} ?>

		<section id="content" class="wp-page destination">
			<div id="intro" class="paralax section" data-stellar-background-ratio="0.5" style="background-image: url('<?php the_post_thumbnail_url(); ?>'); background-position: 50% 0px; background-repeat: no-repeat;">
				<div class="container destination-intro">
					<p class="destination-intro-title h1"><?php echo $title ?><br/><small><?php _e('By Private Jet', 'lynxjet'); ?></small></p>
					<div class="travelo-box hero h1"><?php echo $lynxjet_dest_intro ?></div>
				</div>
			</div>
			<div class="container section">
				<div class="row">
					<div class="col-md-12 destination-title">
						<h1><?php printf( __( 'Flying Private to %s'  , 'lynxjet') , $lynxjet_dest_h1 ); ?></h1>
					</div>
				</div>
				<div class="row">
					<div id="main" class="col-md-12 entry-content">
						<?php the_content(); ?>
						<div class="travelo-box"><?php echo $lynxjet_map_embed ?></div>
						<?php wp_link_pages('before=<div class="page-links">&after=</div>'); ?>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile;
endif;
get_footer();