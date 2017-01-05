<?php 
/**
* Footer
 */
global $trav_options, $logo_url;
$footer_skin = empty( $trav_options['footer_skin'] )?'style-def':$trav_options['footer_skin'];
?>

    <footer id="footer" class="<?php echo esc_attr( $footer_skin ) ?> <?php _e('language_class', "lynxjet"); ?>">
        <div class="footer-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6- col-md-3">
                        <?php dynamic_sidebar( 'sidebar-footer-1' );?>
                    </div>
                    <div class="col-sm-6- col-md-3">
                        <?php dynamic_sidebar( 'sidebar-footer-2' );?>
                    </div>
                    <div class="col-sm-6- col-md-3">
                        <?php dynamic_sidebar( 'sidebar-footer-3' );?>
                    </div>
                    <div class="col-sm-6- col-md-3">
                        <?php dynamic_sidebar( 'sidebar-footer-4' );?>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom gray-area">
            <div class="container">
                <div class="logo pull-left">
                    <small><?php _e('Site by', 'lynxjet'); ?> <a href="http://ibanner.co.il" rel="nofollow" style="display: inline; border-bottom: solid 1px #98ce44"><?php _e('The Contechnician', 'lynxjet'); ?></a></small>
                </div>
                <div class="back-to-top pull-right">
                    <a id="back-to-top" href="#"><i class="soap-icon-longarrow-up circle"></i></a>
                </div>
                <div class="copyright pull-right">
					<p><a href="<?php echo esc_url( home_url() ); ?>">
						<small>&copy; <?php _e('LynxJet Private Flights', 'lynxjet'); ?></small>
					</a></p>
                </div>
            </div>
        </div>
    </footer>
</div>
<div class="opacity-overlay opacity-ajax-overlay"><i class="fa fa-spinner fa-spin spinner"></i></div>
<?php wp_footer(); ?>
</body>
</html>