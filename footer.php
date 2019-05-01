<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package NappyDanny
 */

?>

	</div><!-- #content -->
        
        
        <div id="footer-widgets">
<div id="footer-widget1">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-1') ) : ?>
<?php endif; ?>
</div>
<div id="footer-widget2">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-2') ) : ?>
<?php endif; ?>
</div>
<div id="footer-widget3">
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-3') ) : ?>
<?php endif; ?>
</div>
</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		            
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-sidebar') ) : ?>
<?php endif; ?>
            
            <div class="site-info">
           
                    &copy; NappyDanny <?php echo date('Y'); ?> &#8226; All Rights Reserved &#8226;
			
			<?php printf( esc_html__( 'Designed by %2$s', 'nappydanny' ), 'nappydanny', '<a href="http://www.nappydanny.com" rel="designer">NappyDanny</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
