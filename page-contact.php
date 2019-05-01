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
<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="custom-main" class="custom-site-main" role="main">
                    <div class="contact-left">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
                    </div>
                    
                    <div class="contact-right">
                        <p>
                            If you are a business looking for a <b>front-end web developer, graphic design artist,</b> 
                            or anything in the creative/marketing field, check out my r&eacute;sum&eacute;.
                            Potential YouTube or <b>social media sponsors,</b> feel free to email me, I don't bite!
                            <p></p>
                            Too my <b>Cousins,</b> LOVE Y'ALL! This is my business email but y'all are my business so email away!
                        </p>
                            
                        <a href="<?php echo get_template_directory_uri(); ?>/images/webresume.pdf" target="_blank"><div id="resume">R&Eacute;SUM&Eacute;</div></a>
                        
                    </div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
get_footer();
