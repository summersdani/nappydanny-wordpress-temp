<?php
/**
 * Template for displaying search forms in NappyDanny
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
            <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'nappydanny' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'type & hit enter', 'placeholder', 'nappydanny' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
</form>
