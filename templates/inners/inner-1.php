<?php
/**
 * Inner style1
 */
?>
<div class="page-title-container">
	<div class="container">
		<div class="page-title pull-left">
			<h1 class="entry-title">
				<?php
					if ( is_category() ) {
						single_cat_title();
					} elseif ( is_tag() ) {
						single_tag_title();
					} elseif ( is_author() ) {
						the_author_meta('display_name');
					} elseif ( is_date() ) {
						single_month_title( ' ' );
					} elseif ( is_search() ) {
						printf( __( 'Search Results for: %s', 'lynxjet' ), '<span>' . get_search_query() . '</span>' );
					} elseif ( is_tax() ){
						if ( get_query_var( 'taxonomy' ) == 'location' ) {
							printf( __( 'Activities in %s', 'lynxjet' ), single_term_title( '', false ) );
						} else {
							single_term_title();
						}
					} else {
						the_title();
					}
				?>
			</h1>
		</div>
		<?php trav_breadcrumbs();?>
	</div>
</div>