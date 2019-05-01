<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package NappyDanny
 */

get_header(); ?>    

<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="custom-main" class="custom-site-main" role="main">

                
<div id="gridcontainer" align="center">
<?php
$counter = 1; //start counter
 
$grids = 4; //Grids per row
 
global $query_string; //Need this to make pagination work
 
 
/*Setting up our custom query (In here we are setting it to show 12 posts per page and eliminate all sticky posts) */
query_posts($query_string . '&ignore_sticky_posts=1&posts_per_page=12');
 
 
if(have_posts()) :  while(have_posts()) :  the_post(); 
?>
<?php
//Show the left hand side column
if($counter == 1) :
?>
            <div class="griditemleft">
                <div class="postimage">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?> </a>
                </div>
                
                    <p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
           
            </div>
<?php
//Show the left hand side column
elseif($counter == 2) :
?>
<div class="griditemmiddle">
                <div class="postimage">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                </div>
                <p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
            </div>
   <?php
//Show the left hand side column
elseif($counter == 3) :
?> 
   
    <div class="griditemmiddle">
                <div class="postimage">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                </div>
                <p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
            </div>
<?php
//Show the right hand side column
elseif($counter == $grids) :
?>
<div class="griditemright">
                <div class="postimage">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                </div>
                <p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
            </div>
<div class="clear"></div>
<?php
$counter = 0;
endif;
?>
<?php
$counter++;
endwhile;
//Pagination can go here if you want it.
endif;
?>
</div>


		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php
get_footer();


