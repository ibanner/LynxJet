<?php
 /*
 Template Name: Aircraft Category
 */
get_header();
$spec_max_pax = get_post_meta( get_the_ID(), 'max_pax' , true);
$spec_max_range = get_post_meta( get_the_ID(), 'max_range' , true);
$spec_speed = get_post_meta( get_the_ID(), 'speed' , true);

if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		$slider_active = get_post_meta( get_the_ID(), 'trav_page_slider', true );
		$slider        = ( $slider_active == '' ) ? 'Deactivated' : $slider_active;
		if ( class_exists( 'RevSlider' ) && $slider != 'Deactivated' ) {
			echo '<div id="slideshow">';
			putRevSlider( $slider );
			echo '</div>';
		} ?>

		<section id="content" class="aircraft-cat-page">
			<div id="main-image">
				<?php if ( has_post_thumbnail() ) { ?>
					<figure class="image-container block">
						<?php the_post_thumbnail( 'full-width' ); ?>
					</figure>
				<?php } ?>
			</div>
			<div class="container">
				<div class="row">
					<div id="main" class="col-md-8 entry-content">
						<h2><?php _e('Category Description', 'lynxjet'); ?></h2>
						<?php the_content(); ?>
						<?php wp_link_pages('before=<div class="page-links">&after=</div>'); ?>
					</div>
					<div class="tech-spec col-md-4">
						<div class="travelo-box">
							<div class="icon-box style4"><i class="soap-icon-plane-left"></i><h3><?php _e('Tech Spec', 'lynxjet'); ?></h3></div>
							<div class="vc_custom_1439972585402">
								<ul class="check-circle">
									<li><?php _e('Maximum Passengers', 'lynxjet'); ?>: <?php echo $spec_max_pax ?></li>
									<li><?php _e('Maximum Range', 'lynxjet'); ?>: <?php echo $spec_max_range ?> <?php _e('Km', 'lynxjet'); ?></li>
									<li><?php _e('Maximum Cruising Speed', 'lynxjet'); ?>: <?php echo $spec_speed ?> <?php _e('KmH', 'lynxjet'); ?></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div id="models" class="col-md-12">
					<h2><?php _e('Category Jets', 'lynxjet'); ?></h2></div>
					<?php
					$child_pages = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_parent = ".$post->ID." AND post_type = 'page' AND post_status = 'publish' ORDER BY menu_order", 'OBJECT');    ?>
					<?php if ( $child_pages ) : foreach ( $child_pages as $pageChild ) : setup_postdata( $pageChild ); ?>
					<div class="col-sm-3">
						<div class="image-box style1 aircraft-cat">
							<article class="box">
								<figure>
									<a href="<?php echo get_permalink($pageChild->ID); ?>" rel="bookmark" title="<?php echo $pageChild->post_title; ?>" class="hover-effect">
										<?php echo get_the_post_thumbnail($pageChild->ID, 'biggallery-thumb' ); ?>
									</a>
								</figure>
								<div class="details">
									<h4 class="box-title text-left"><a href="<?php echo  get_permalink($pageChild->ID); ?>" rel="bookmark" title="<?php echo $pageChild->post_title; ?>"><?php echo $pageChild->post_title; ?></a></h4>	
								</div>
							</article>
						</div>
					</div>
					<?php endforeach; endif; ?>
				</div>
			</div>
		</section>
	<?php endwhile;
endif;
get_footer();