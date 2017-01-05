<?php
/**
 * Header 7
 */
global $trav_options, $logo_url, $my_account_page, $language_count;
?>
<header id="header" class="navbar-static-top style7 <?php _e('language_class', "lynxjet"); ?>">
	<div class="container">
		<div class="topnav">
			<ul class="quick-menu pull-right clearfix">
				<?php if ( $language_count > 1 ) {
					$languages = icl_get_languages('skip_missing=1'); ?>

					<li class="ribbon">
						<?php
						$langs = '<ul class="menu mini">';
						foreach ( $languages as $l ) {
							if ( $l['active'] ) {
								echo '<a href="#">' . $l['translated_name'] . '</a>';
								// $langs .= '<li class="active"><a href="' . $l['url'] . '" title="' . $l['translated_name'] . '">' . $l['native_name'] . '</a>';
								$langs .= '<li class="active lang"><a href="' . $l['url'] . '" title="' . $l['translated_name'] . '"><img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />' . $l['native_name'] . '</a>';
							} else {
								$langs .= '<li class="lang"><a href="' . $l['url'] . '" title="' . $l['translated_name'] . '"><img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />' . $l['native_name'] . '</a>';
							}
						}
						$langs .= '</ul>';
						echo $langs; ?>
					</li>

				<?php } ?>
					<!-- <li><a href="<?php echo esc_url( $my_account_page ); ?>"<?php echo ( $my_account_page == '#travelo-login' )?' class="soap-popupbox"':'' ?>><?php _e('For Travel Agents', 'lynxjet'); ?></a></li> -->
				<?php if ( trav_is_multi_currency() ) { ?>
					<li class="ribbon currency">
						<a href="#" title=""><?php echo esc_html( trav_get_user_currency() ) ?></a>
						<ul class="menu mini">
							<?php
								$all_currencies = trav_get_all_available_currencies();
								foreach ( array_filter( $trav_options['site_currencies'] ) as $key => $content) {
									$class = "";
									if ( trav_get_user_currency() == $key ) $class = ' class="active"';
									$params = $_GET;
									$params['selected_currency'] = $key;
									$paramString = http_build_query($params, '', '&amp;');
									echo '<li' . wp_kses_post( $class ) . '><a href="' . esc_url( strtok( $_SERVER['REQUEST_URI'], '?' ) . '?' . $paramString ) . '" title="' . esc_attr( $all_currencies[$key] ) . '">' . esc_html( strtoupper( $key ) ) . '</a></li>';
								}
							?>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div>
		<div class="pull-right hidden-mobile">
			<address class="contact-details">
				<?php if ( ! empty ( $trav_options['phone_no'] ) ) { ?>
					<span class="contact-phone"><i class="soap-icon-phone"></i> <?php echo esc_html( $trav_options['phone_no'] ) ?></span>
				<?php } ?>
				<?php if ( ! empty ( $trav_options['email'] ) ) { ?>
					<a class="contact-email" href="mailto:<?php echo esc_html( $trav_options['email'] ) ?>"><i class="soap-icon-letter-1"></i> <?php echo esc_html( $trav_options['email'] ) ?></a>
				<?php } ?>
			</address>
		</div>
	</div>
	<a href="#mobile-menu-01" data-toggle="collapse" class="mobile-menu-toggle">
		Mobile Menu Toggle
	</a>
	<div class="main-navigation">
		<div class="container mobile-brand">
			<h1 class="logo navbar-brand">
				<a href="<?php echo esc_url( home_url() ); ?>" class="home-link">
					<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo('name'); ?>" /><h2 class="mobile-title">LynxJet Private Flights</h2>
				</a>
				<!-- <a href="tel:+97237228020" class="button btn-small yellow call-us"><i class="soap-icon-phone"></i></a> -->
			</h1>
			<a href="tel:+97237228020" class="button btn-small yellow call-us"><i class="soap-icon-phone"></i></a>
			<ul class="social-icons style2 clearfix pull-right visible-lg">
				<?php
					$social_links = array( 'twitter', 'googleplus', 'facebook', 'linkedin', 'youtube', 'pinterest', 'vimeo', 'skype', 'instagram', 'dribble', 'flickr', 'tumblr', 'behance' );
					foreach ( $social_links as $key ) {
						if ( isset( $trav_options[$key] ) && ! empty( $trav_options[$key] ) ) {
							echo '<li class="' . esc_attr( $key ) . '"><a title="' . esc_attr( $key ) . '" href="' . esc_url( $trav_options[$key] ) . '" data-toggle="tooltip" target="_blank"><i class="soap-icon-' . esc_attr( $key ) . '"></i></a></li>';
						}
					}
				?>
			</ul>
			<?php if ( has_nav_menu( 'header-menu' ) ) {
					wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => 'nav', 'container_id' => 'main-menu', 'menu_class' => 'menu', 'walker'=>new Trav_Walker_Nav_Menu ) ); 
				} else { ?>
					<nav id="main-menu" class="menu-my-menu-container">
						<ul class="menu">
							<li class="menu-item"><a href="<?php echo esc_url( home_url() ); ?>"><?php _e('Home', "trav"); ?></a></li>
							<li class="menu-item"><a href="<?php echo esc_url( admin_url('nav-menus.php') ); ?>"><?php _e('Configure', "trav"); ?></a></li>
						</ul>
					</nav>
			<?php } ?>
		</div>
	</div>