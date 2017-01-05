<?php
 /*
 Template Name: Aicraft Main Page
 */
get_header();
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		$slider_active = get_post_meta( get_the_ID(), 'trav_page_slider', true );
		$slider        = ( $slider_active == '' ) ? 'Deactivated' : $slider_active;
		if ( class_exists( 'RevSlider' ) && $slider != 'Deactivated' ) {
			echo '<div id="slideshow">';
			putRevSlider( $slider );
			echo '</div>';
		} ?>

		<section id="content" class="aircraft-main">
			<div id="main-image" class="text-center">
				<?php if ( has_post_thumbnail() ) { ?>
					<figure class="image-container block">
						<?php the_post_thumbnail(); ?>
					</figure>
				<?php } ?>
			</div>
			<div class="container">
				<div class="row">
					<div id="jet-cats" class="col-md-12 entry-content">
						<div id="jet-cats" class="image-box style10 block">
						<h1 class="jumbo-title text-center"><?php _e('Our Aircraft Fleet', 'lynxjet'); ?><br />
						<small><?php _e('Which aircraft will best suit your flight plans? Let us help you choose the model that will fit your needs!', 'lynxjet'); ?></small></h1>
						<?php the_content(); ?>
						<?php
						$child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' AND post_status = 'publish' ORDER BY menu_order", 'OBJECT');    ?>
						<?php if ( $child_pages ) : foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild ); ?>
						
						<article class="box">
							<div class="details text-center">
								<h2 class="box-title"><a href="<?php echo get_permalink($pageChild->ID); ?>" rel="bookmark" title="<?php echo $pageChild->post_title; ?>"><?php echo $pageChild->post_title; ?></a></h2>	
							</div>
							<figure>
								<a href="<?php echo get_permalink($pageChild->ID); ?>" rel="bookmark" title="<?php echo $pageChild->post_title; ?>" class="hover-effect">
									<?php echo get_the_post_thumbnail($pageChild->ID, 'full-width' ); ?>
								</a>
							</figure>
							<div class="details text-center">
								<p><?php echo get_post_meta($pageChild->ID, '_yoast_wpseo_metadesc', true); ?></p>
							</div>
						</article>
						
						<?php endforeach; endif; ?>
						
						
						<?php wp_link_pages('before=<div class="page-links">&after=</div>'); ?>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile;
endif;
get_footer();