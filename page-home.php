<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package NappyDanny
 */

get_header(); ?>

<div id="primary" class="content-area">
		<main id="custom-main" class="custom-site-main" role="main">
                   
                    
                    <div class="after-nav">
                        <div class="after-about"><p>I'm just your average <b>art</b> loving, <b>camera</b> taking, <b>video</b> making, <b>graphic</b> designing, <b>front-end</b> web developing, carefree and quirky girl. <i>If I can't be creative than what can I be?</i></p></div>
                    <a href="about" class="button">About Me</a>
                    
                    </div>

                    <div class="after-action">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

                    </div><!-- .after-action -->
		</main><!-- #main -->
	</div><!-- #primary -->
        
<?php
get_footer();
