<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package NappyDanny
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="whole-content">
    <div class="entry-content">
          
            <div class="cat-meta">
	<?php nappydanny_cat_meta(); ?>
            </div>
                
            <?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		
            <div class="entry-meta">
			<?php nappydanny_posted_on(); ?>
		</div><!-- .entry-meta -->
            
		<?php
		endif; ?>
                
</div>
                <header class="entry-header">
                
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

                
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
                    if ( is_single() ) :

			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nappydanny' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nappydanny' ),
				'after'  => '</div>',
			) );
                        
                        else :

			/* translators: %s: Name of current post */
			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'nappydanny' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nappydanny' ),
				'after'  => '</div>',
			) );
			endif;

		
		?>
            
	</div><!-- .entry-content -->
    

	<footer class="entry-footer">
		<?php nappydanny_entry_footer(); ?>
	</footer><!-- .entry-footer -->
        </div><!-- .whole-content -->
</article><!-- #post-## -->
