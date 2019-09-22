<?php
/**
 * bookstore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bookstore
 */

if ( ! function_exists( 'bookstore_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bookstore_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on bookstore, use a find and replace
		 * to change 'bookstore' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bookstore', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

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
			'menu-1' => esc_html__( 'Primary', 'bookstore' ),
			//Προσθήκη 2ου menu(top)
			'additional-menu' => esc_html__( 'Top Menu', 'bookstore' ),
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
		add_theme_support( 'custom-background', apply_filters( 'bookstore_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'bookstore_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bookstore_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'bookstore_content_width', 640 );
}
add_action( 'after_setup_theme', 'bookstore_content_width', 0 );

/**
 * function για να εμφανίζεται το επιθυμητό favicon βάση συσκευής 
 */
function add_my_favicon() {?>
	<link rel="apple-touch-icon" sizes="57x57" href='<?php echo get_template_directory_uri() . '/favicon/apple-icon-57x57.png'?>'>
		<link rel="apple-touch-icon" sizes="60x60" href='<?php echo get_template_directory_uri() . '/favicon/apple-icon-60x60.png'?>'>
		<link rel="apple-touch-icon" sizes="72x72" href='<?php echo get_template_directory_uri() . '/favicon/apple-icon-72x72.png'?>'>
		<link rel="apple-touch-icon" sizes="76x76" href='<?php echo get_template_directory_uri() . '/favicon/apple-icon-76x76.png'?>'>
		<link rel="apple-touch-icon" sizes="114x114" href='<?php echo get_template_directory_uri() . '/favicon/apple-icon-114x114.png'?>'>
		<link rel="apple-touch-icon" sizes="120x120" href='<?php echo get_template_directory_uri() . '/favicon/apple-icon-120x120.png'?>'>
		<link rel="apple-touch-icon" sizes="144x144" href='<?php echo get_template_directory_uri() . '/favicon/apple-icon-144x144.png'?>'>
		<link rel="apple-touch-icon" sizes="152x152" href='<?php echo get_template_directory_uri() . '/favicon/apple-icon-152x152.png'?>'>
		<link rel="apple-touch-icon" sizes="180x180" href='<?php echo get_template_directory_uri() . '/favicon/apple-icon-180x180.png'?>'>
		<link rel="icon" type="image/png" sizes="192x192"  href='<?php echo get_template_directory_uri() . '/favicon/android-icon-192x192.png'?>'>
		<link rel="icon" type="image/png" sizes="32x32" href='<?php echo get_template_directory_uri() . '/favicon/favicon-32x32.png'?>'>
		<link rel="icon" type="image/png" sizes="96x96" href='<?php echo get_template_directory_uri() . '/favicon/favicon-96x96.png'?>'>
		<link rel="icon" type="image/png" sizes="16x16" href='<?php echo get_template_directory_uri() . '/favicon/favicon-16x16.png'?>'>
		<link rel="manifest" href='<?php echo get_template_directory_uri() . '/favicon/manifest.json'?>'>
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content='<?php echo get_template_directory_uri() . '/favicon/ms-icon-144x144.png'?>'>
		<meta name="theme-color" content="#ffffff">
		<?php
	}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bookstore_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bookstore' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bookstore' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'bookstore' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'bookstore' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'bookstore_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bookstore_scripts() {
	wp_enqueue_style( 'bookstore-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bookstore-main-style', get_template_directory_uri() . '/css/main.css', array(), wp_get_theme()->get( 'Version' ), 'all' );
	wp_enqueue_style( 'bookstore-media-style', get_template_directory_uri() . '/css/media.css', array(), wp_get_theme()->get( 'Version' ), 'all' );

	wp_enqueue_script( 'bookstore-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'bookstore-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bookstore_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'bookstore_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 */
function bookstore_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// Plugins από WordPress Plugin Repository που είναι υποχρεωτική η χρήση τους (custom post types για τα βιβλία & custom fields).
		array(
			'name'      => 'Custom Post Type UI',
			'slug'      => 'custom-post-type-ui',
			'required'  => true,
		),
		array(
			'name'      => 'Advanced Custom Fields',
			'slug'      => 'advanced-custom-fields',
			'required'  => true,
		),
		array(
			'name'      => 'Widget Importer & Exporter',
			'slug'      => 'widget-importer-exporter',
			'required'  => false,
		),


	);

	/*
	 * Array of configuration settings.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'bookstore',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => 'Bookstore cannot work without books!',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'bookstore' ),
			'menu_title'                      => __( 'Install Plugins', 'bookstore' ),
			/* translators: %s: plugin name. */
			'installing'                      => __( 'Installing Plugin: %s', 'bookstore' ),
			/* translators: %s: plugin name. */
			'updating'                        => __( 'Updating Plugin: %s', 'bookstore' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'bookstore' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). */
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'bookstore'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). */
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'bookstore'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'bookstore'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). */
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'bookstore'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'bookstore'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). */
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'bookstore'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'bookstore'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'bookstore'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'bookstore'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'bookstore' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'bookstore' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'bookstore' ),
			/* translators: 1: plugin name. */
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'bookstore' ),
			/* translators: 1: plugin name. */
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'bookstore' ),
			/* translators: 1: dashboard link. */
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'bookstore' ),
			'dismiss'                         => __( 'Dismiss this notice', 'bookstore' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'bookstore' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'bookstore' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		
	);

	tgmpa( $plugins, $config );
}
/**
 * CPT UI display custom post types in front-end
 */

add_action( 'pre_get_posts', 'add_my_post_types_to_query' );
 
function add_my_post_types_to_query( $query ) {
    if ( is_home() && $query->is_main_query() )
        $query->set( 'post_type', array( 'post', 'books' ) );
    return $query;
}


/**
 * widget για να εμφανίζονται τα θέματα των βιβλίων σε cloud (tag)
 */

// Register and load the widget
function tc_load_widget() {
    register_widget( 'tc_widget' );
}
add_action( 'widgets_init', 'tc_load_widget' );
 
// Creating the widget 
class tc_widget extends WP_Widget {
 
function __construct() {
parent::__construct(
 
// Base ID of your widget
'tc_widget', 
 
// Widget name will appear in UI
__('BookLove Θέματα cloud widget', 'tc_widget_domain'), 
 
// Widget description
array( 'description' => __( 'Εμφάνιση των θεμάτων σε cloud', 'tc_widget_domain' ), ) 
);
}
 
// Creating widget front-end
 
public function widget( $args, $instance ) {


$title = apply_filters( 'widget_title', $instance['title'] );
 
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output
	wp_tag_cloud( array( 'taxonomy' => 'thema',
'number' => 40 ) ); 
echo $args['after_widget'];
}
         
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'tc_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
     
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class tc_widget ends here

/**
 * Δημιουργία shortcode για χρήση με το widget text, για εμφάνιση των custom taxonomies 
 */

function list_terms_custom_taxonomy( $atts ) {
 
	// Inside the function we extract custom taxonomy parameter of our shortcode
	 	extract( shortcode_atts( array(
			'custom_taxonomy' => '',
		), $atts ) );
	 
	// arguments for function wp_list_categories
	$args = array(
		'taxonomy' => $custom_taxonomy,
		'title_li' => '',
		'show_count'=> 0,
		'orderby' => 'name'
	);
	
	// We wrap it in unordered list 
	ob_start();
	echo '<ul class="list-terms list-terms-'.$custom_taxonomy.'">'; 
	wp_list_categories($args);
	echo '</ul>';
	return ob_get_clean();
	}
	 
	// Add a shortcode that executes our function
	add_shortcode( 'ct_terms', 'list_terms_custom_taxonomy' );
	 
	//Allow Text widgets to execute shortcodes
	add_filter('widget_text', 'do_shortcode', 1);


/**
 * function για να εμφανίζονται τα custom fields isbn13, χρονολογία έκδοσης & αριθμός σελίδων του βιβλίου
 */
function display_books_custom_fields() {
	$isbn = get_field_object('isbn13');
	$year_pub = get_field_object('year-pub');
	$pages = get_field_object('pages');
	
	if ($isbn['value']) {?>
	<div><span class="label"><?php echo $isbn['label']; ?></span>: <?php echo $isbn['value']; ?></div> <?php } ?>
	<?php if ($year_pub['value']) {?>
	<div><span class="label"><?php echo $year_pub['label']; ?></span>: <?php echo $year_pub['value']; ?></div> <?php } ?>
	<?php if ($pages['value']) {?>
	<div><span class="label"><?php echo $pages['label']; ?></span>: <?php echo $pages['value']; ?></div> <?php } ?>
<?php }

/**
 * function για να εμφανίζονται οι custom taxonomies συγγραφέας, εκδόσεις & θέμα βιβλίου, με σύνδεσμο στην archive σελίδα τους 
 */
function display_books_custom_terms() {?>
	<div class="book-author"><?php echo get_the_term_list( $post->ID, 'syggrafeas', '<span class="label">Συγγραφέας</span>: ', ', ' );?></div>
	<div class="book-publish"><?php echo get_the_term_list( $post->ID, 'ekdotis', '<span class="label">Εκδόσεις</span>: ', ', ' );?></div>	
	<div class="book-theme"><?php echo get_the_term_list( $post->ID, 'thema', '<span class="label">Θέμα</span>: ', ', ' );  ?></div>
<?php }
