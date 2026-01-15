<?php
/**
 * Theme Header - Baretta Associati
 *
 * @package Baretta
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="header-inner">
            <div class="site-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo-link">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="Baretta Associati" class="site-logo-img">
                    <?php endif; ?>
                </a>
            </div>

            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <nav id="site-navigation" class="main-nav">
                <?php
                if (has_nav_menu('primary')) :
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ));
                else :
                ?>
                    <ul>
                        <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
                        <li><a href="<?php echo home_url('/studio/'); ?>">Studio</a></li>
                        <li><a href="<?php echo home_url('/servizi/'); ?>">Servizi</a></li>
                        <li><a href="<?php echo home_url('/progetti/'); ?>">Progetti</a></li>
                        <li><a href="<?php echo home_url('/contatti/'); ?>">Contatti</a></li>
                    </ul>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <main id="content" class="site-content">