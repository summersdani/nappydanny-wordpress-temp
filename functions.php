<?php
/**
 * NappyDanny functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package NappyDanny
 */

function exclude_category($query) {
  if ( $query->is_home )
    $query->set('cat', '-196');
  return $query;
}
add_filter('pre_get_posts', 'exclude_category');


function my_customizer_social_media_array() {
 
	/* store social site names in array */
	$social_sites = array('twitter', 'facebook', 'google-plus', 'flickr', 'pinterest', 'youtube', 'tumblr', 'dribbble', 'rss', 'linkedin', 'instagram', 'email', 'heart');
 
	return $social_sites;
}

/* add settings to create various social media text areas. */
add_action('customize_register', 'my_add_social_sites_customizer');
 
function my_add_social_sites_customizer($wp_customize) {
 
	$wp_customize->add_section( 'my_social_settings', array(
			'title'    => __('Social Media Icons', 'nappydanny'),
			'priority' => 35,
	) );
 
	$social_sites = my_customizer_social_media_array();
	$priority = 5;
 
	foreach($social_sites as $social_site) {
 
		$wp_customize->add_setting( "$social_site", array(
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'esc_url_raw'
		) );
 
		$wp_customize->add_control( $social_site, array(
				'label'    => __( "$social_site url:", 'nappydanny' ),
				'section'  => 'my_social_settings',
				'type'     => 'text',
				'priority' => $priority,
		) );
 
		$priority = $priority + 5;
	}
}

/* takes user input from the customizer and outputs linked social media icons */
function my_social_media_icons() {
 
    $social_sites = my_customizer_social_media_array();
 
    /* any inputs that aren't empty are stored in $active_sites array */
    foreach($social_sites as $social_site) {
        if( strlen( get_theme_mod( $social_site ) ) > 0 ) {
            $active_sites[] = $social_site;
        }
    }
 
    /* for each active social site, add it as a list item */
        if ( ! empty( $active_sites ) ) {
 
            echo "<ul class='social-media-icons'>";
 
            foreach ( $active_sites as $active_site ) {
 
	            /* setup the class */
		        $class = 'fa fa-' . $active_site;
 
                if ( $active_site == 'email' ) {
                    ?>
                    <li>
                        <a class="email" target="_blank" href="mailto:<?php echo antispambot( is_email( get_theme_mod( $active_site ) ) ); ?>">
                            <i class="fa fa-envelope" title="<?php _e('email icon', 'nappydanny'); ?>"></i>
                        </a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a class="<?php echo $active_site; ?>" target="_blank" href="<?php echo esc_url( get_theme_mod( $active_site) ); ?>">
                            <i class="<?php echo esc_attr( $class ); ?>" title="<?php printf( __('%s icon', 'nappydanny'), $active_site ); ?>"></i>
                        </a>
                    </li>
                <?php
                }
            }
            echo "</ul>";
        }
} /* end of social media functions */


if ( ! function_exists( 'nappydanny_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function nappydanny_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on NappyDanny, use a find and replace
	 * to change 'nappydanny' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'nappydanny', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
        
        // Add support for custom logo
        add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
        
        
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'nappydanny' ),
                'secondary' => __( 'Secondary', 'nappydanny'),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nappydanny_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'nappydanny_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nappydanny_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nappydanny_content_width', 640 );
}


add_action( 'after_setup_theme', 'nappydanny_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nappydanny_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nappydanny' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'nappydanny' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        
        register_sidebar( array(
		'name'          => esc_html__( 'footer', 'nappydanny' ),
		'id'            => 'footer-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'nappydanny' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        
        register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'nappydanny' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'nappydanny' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        
        register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'nappydanny' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'nappydanny' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        
        register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'nappydanny' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'nappydanny' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
        
        register_sidebar( array(
		'name'          => esc_html__( 'Store Sidebar', 'nappydanny' ),
		'id'            => 'store-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'nappydanny' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'nappydanny_widgets_init' );

//Read More Button For Excerpt
function themeprefix_excerpt_read_more_link( $output ) {
	global $post;
	return $output . ' <a href="' . get_permalink( $post->ID ) . '" class="more-link" title="Read More">Read More &rarr;</a>';
}
add_filter( 'the_excerpt', 'themeprefix_excerpt_read_more_link' );

/**
 * Enqueue scripts and styles.
 */
function nappydanny_scripts() {
	wp_enqueue_style( 'nappydanny-style', get_stylesheet_uri() );
        
        /* google fonts for roboto */
        wp_enqueue_style('nappydanny-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,500|Old+Standard+TT:400italic|Playfair+Display:400,400italic' ); 
        
        /* font awesome logos */
        wp_enqueue_style('nappydanny-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');    
        
	wp_enqueue_script( 'nappydanny-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20151215', true );

	wp_enqueue_script( 'nappydanny-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nappydanny_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 *  adds images to rss feed 
 */
function rss_post_thumbnail($content) {
global $post;
if(has_post_thumbnail($post->ID)) {
$content = '<p>' . get_the_post_thumbnail($post->ID) .
'</p>' . get_the_content();
}
return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');

/* Adds theme support for Woo Commerce for future sales if any. */
add_action( 'after_setup_theme', 'setup_woocommerce_support' );

 function setup_woocommerce_support()
{
  add_theme_support('woocommerce');
}

function style_every_second_post ( $classes ) {
global $current_class;
$classes[] = $current_class;
$current_class = ( $current_class == 'odd' ) ? 'even' : 'odd';
return $classes;
}
add_filter ( 'post_class' , 'style_every_second_post' );
global $current_class;
$current_class = 'odd';
