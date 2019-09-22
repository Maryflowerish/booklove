<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bookstore
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    

    <?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100&display=swap&subset=greek" rel="stylesheet">
    <?php //function για το favicon ?>
    <?php add_my_favicon(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text"
            href="#content"><?php esc_html_e( 'Skip to content', 'bookstore' ); ?></a>

        <header id="masthead" class="site-header">
            <div class="top-menu-container">
                <div class="top-menu-wrap">
            <nav id="top-menu" class="top-navigation">
            <?php
            wp_nav_menu( array( 'theme_location' => 'additional-menu', 'container_class' => 'top-menu-class' ) );
             ?>
             </nav>
            </div><!-- .top-menu-wrap -->
            </div><!-- .top-menu-container -->
        
            <div class="header-container-wrap">
                <div class="site-branding">
                    <?php
            the_custom_logo();
            if (! get_custom_logo()) {?>
                <a href="<?php echo site_url(); ?>" class="custom-logo-link" rel="home"><img width="372" height="75" src='<?php echo get_template_directory_uri() . '/graphics/logo.png'?>' class="custom-logo" alt="<?php bloginfo( 'name' );?>" srcset='<?php echo get_template_directory_uri() . '/graphics/logo.png'?>'g 372w, <?php echo get_template_directory_uri() . '/graphics/logo.png'?> 300w, sizes="(max-width: 372px) 100vw, 372px" /></a> 
			<?php }	?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu"
                        aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'bookstore' ); ?></button>
                    <?php
                    wp_nav_menu( array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    ) );
                    ?>
                </nav><!-- #site-navigation -->
            </div>
            <section class="main-site-header-image">
                <div class="crop header-img">
                    <?php
                    $bookstore_description = get_bloginfo( 'description', 'display' );
                if ( $bookstore_description || is_customize_preview() ) :
                ?>
                    <div class="banner-description">
                        <p class="site-description">...<?php echo $bookstore_description; /* WPCS: xss ok. */ ?>...</p>
                    </div>
                    <?php endif; ?>
                </div>
            </section>
        </header><!-- #masthead -->

        <div id="content" class="site-content">
            <div class="content_wrap">