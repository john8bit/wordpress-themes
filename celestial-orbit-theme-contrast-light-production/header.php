<?php
/**
 * Header template.
 *
 * @package Celestial_Orbit
 */

if (!defined('ABSPATH')) {
    exit;
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
    <div class="wrap site-header__inner">
        <div class="site-branding">
            <?php if (has_custom_logo()) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
            <?php endif; ?>
            <div class="site-branding__text">
                <a class="site-title" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                <?php $description = get_bloginfo('description', 'display'); ?>
                <?php if ($description) : ?>
                    <p class="site-description"><?php echo esc_html($description); ?></p>
                <?php endif; ?>
            </div>
        </div>

        <button class="menu-toggle" aria-expanded="false" aria-controls="primary-menu">
            <span><?php esc_html_e('Menu', 'celestial-orbit'); ?></span>
        </button>

        <nav class="main-navigation" aria-label="<?php esc_attr_e('Primary Menu', 'celestial-orbit'); ?>">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'container'      => false,
                'fallback_cb'    => 'wp_page_menu',
            ]);
            ?>
        </nav>
    </div>
</header>
<main id="primary" class="site-main">
