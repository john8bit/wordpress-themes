<?php
/**
 * Celestial Orbit functions and definitions.
 *
 * @package Celestial_Orbit
 */

if (!defined('ABSPATH')) {
    exit;
}

function celestial_orbit_setup(): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ]);
    add_theme_support('custom-logo', [
        'height'      => 80,
        'width'       => 320,
        'flex-height' => true,
        'flex-width'  => true,
    ]);
    add_theme_support('custom-background', [
        'default-color' => 'f7f9fc',
    ]);
    add_theme_support('custom-header');
    add_theme_support('responsive-embeds');
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('appearance-tools');

    register_nav_menus([
        'primary' => __('Primary Menu', 'celestial-orbit'),
        'footer'  => __('Footer Menu', 'celestial-orbit'),
    ]);

    add_editor_style('assets/css/editor-style.css');
}
add_action('after_setup_theme', 'celestial_orbit_setup');

function celestial_orbit_enqueue_assets(): void {
    $theme = wp_get_theme();
    $version = $theme->get('Version');

    wp_enqueue_style(
        'celestial-orbit-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'celestial-orbit-main',
        get_template_directory_uri() . '/assets/css/main.css',
        ['celestial-orbit-fonts'],
        $version
    );

    wp_enqueue_script(
        'celestial-orbit-theme',
        get_template_directory_uri() . '/assets/js/theme.js',
        [],
        $version,
        true
    );

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'celestial_orbit_enqueue_assets');

function celestial_orbit_widgets_init(): void {
    register_sidebar([
        'name'          => __('Footer CTA', 'celestial-orbit'),
        'id'            => 'footer-cta',
        'description'   => __('Optional widget area above the footer.', 'celestial-orbit'),
        'before_widget' => '<div class="footer-cta-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}
add_action('widgets_init', 'celestial_orbit_widgets_init');

function celestial_orbit_excerpt_more($more): string {
    return '…';
}
add_filter('excerpt_more', 'celestial_orbit_excerpt_more');

function celestial_orbit_body_classes(array $classes): array {
    if (is_front_page()) {
        $classes[] = 'cwo-front-page';
    }
    return $classes;
}
add_filter('body_class', 'celestial_orbit_body_classes');

function celestial_orbit_get_page_url_by_slug(string $slug, string $fallback = '#'): string {
    $page = get_page_by_path($slug);
    return $page ? get_permalink($page) : $fallback;
}

function celestial_orbit_service_cards(): array {
    return [
        [
            'title'       => __('Website Design', 'celestial-orbit'),
            'description' => __('Clean, modern websites tailored to your brand, goals, and audience.', 'celestial-orbit'),
            'url'         => celestial_orbit_get_page_url_by_slug('services'),
        ],
        [
            'title'       => __('WordPress Development', 'celestial-orbit'),
            'description' => __('Custom builds, theme improvements, integrations, and technical problem-solving.', 'celestial-orbit'),
            'url'         => celestial_orbit_get_page_url_by_slug('services'),
        ],
        [
            'title'       => __('Managed Hosting', 'celestial-orbit'),
            'description' => __('Dependable WordPress hosting with updates, backups, security, and support.', 'celestial-orbit'),
            'url'         => celestial_orbit_get_page_url_by_slug('wordpress-hosting'),
        ],
        [
            'title'       => __('Maintenance & Support', 'celestial-orbit'),
            'description' => __('Ongoing improvements, troubleshooting, updates, and long-term care.', 'celestial-orbit'),
            'url'         => celestial_orbit_get_page_url_by_slug('contact'),
        ],
    ];
}


function celestial_orbit_register_block_patterns(): void {
    if (!function_exists('register_block_pattern')) {
        return;
    }

    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category('celestial-orbit', [
            'label' => __('Celestial Orbit', 'celestial-orbit'),
        ]);
    }

    $content = <<<'HTML'
<!-- wp:group {"align":"full","className":"cwo-home-hero","layout":{"type":"constrained","wideSize":"1400px"},"style":{"spacing":{"padding":{"top":"96px","bottom":"84px","left":"24px","right":"24px"}}}} -->
<div class="wp-block-group alignfull cwo-home-hero" style="padding-top:96px;padding-right:24px;padding-bottom:84px;padding-left:24px"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"hero-section__grid"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center hero-section__grid"><!-- wp:column {"verticalAlignment":"center","width":"58%","className":"hero-copy"} -->
<div class="wp-block-column is-vertically-aligned-center hero-copy" style="flex-basis:58%"><!-- wp:paragraph {"className":"eyebrow"} -->
<p class="eyebrow">WordPress Development • Managed Hosting • Support</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>Professional WordPress websites with reliable hosting and support.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero-copy__lead"} -->
<p class="hero-copy__lead">Celestial Web Development builds, hosts, and maintains polished WordPress websites for businesses and organizations that want a clean professional presence, dependable performance, and long-term support.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"button-group"} -->
<div class="wp-block-buttons button-group"><!-- wp:button {"className":"button button--primary"} -->
<div class="wp-block-button button button--primary"><a class="wp-block-button__link wp-element-button" href="/contact">Get a Quote</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"button button--secondary"} -->
<div class="wp-block-button button button--secondary"><a class="wp-block-button__link wp-element-button" href="/services">View Services</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->

<!-- wp:list {"className":"trust-points"} -->
<ul class="trust-points"><li>Direct communication</li><li>Managed WordPress hosting</li><li>Performance-focused builds</li></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"42%","className":"hero-panel"} -->
<div class="wp-block-column hero-panel" style="flex-basis:42%"><!-- wp:group {"className":"hero-panel__card hero-panel__card--main","layout":{"type":"constrained"}} -->
<div class="wp-block-group hero-panel__card hero-panel__card--main"><!-- wp:paragraph {"className":"chip"} -->
<p class="chip">Featured Focus</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":2} -->
<h2>A sharper visual system for clients who want a stronger web presence.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>The design uses darker contrasts, restrained gradients, and polished content panels to give the site more depth while staying light, clean, and professional.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"className":"hero-panel__stack"} -->
<div class="wp-block-columns hero-panel__stack"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"hero-panel__card","layout":{"type":"constrained"}} -->
<div class="wp-block-group hero-panel__card"><!-- wp:heading {"level":3} -->
<h3>Stronger Contrast</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Deeper headers, stronger typography, and cleaner sections improve readability and make calls to action stand out.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:group {"className":"hero-panel__card","layout":{"type":"constrained"}} -->
<div class="wp-block-group hero-panel__card"><!-- wp:heading {"level":3} -->
<h3>Editable Foundation</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>This homepage can now be edited directly in the page editor while keeping the original design language.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"section section--tight","layout":{"type":"constrained","wideSize":"1400px"}} -->
<div class="wp-block-group section section--tight"><!-- wp:columns {"className":"trust-strip"} -->
<div class="wp-block-columns trust-strip"><!-- wp:column --><div class="wp-block-column"><p>WordPress Specialists</p></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><p>Managed Hosting</p></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><p>Ongoing Support</p></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><p>Performance Focused</p></div><!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"section","layout":{"type":"constrained","wideSize":"1400px"},"style":{"spacing":{"padding":{"top":"72px","bottom":"72px","left":"24px","right":"24px"}}}} -->
<div class="wp-block-group section" style="padding-top:72px;padding-right:24px;padding-bottom:72px;padding-left:24px"><!-- wp:group {"className":"section-heading","layout":{"type":"constrained"}} -->
<div class="wp-block-group section-heading"><!-- wp:paragraph {"className":"eyebrow"} --><p class="eyebrow">Services</p><!-- /wp:paragraph -->
<!-- wp:heading {"level":2} --><h2>WordPress services built for reliability and growth.</h2><!-- /wp:heading -->
<!-- wp:paragraph --><p>From custom site design to hosting and ongoing maintenance, Celestial Web Development provides practical solutions backed by direct support.</p><!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- wp:columns {"className":"card-grid"} -->
<div class="wp-block-columns card-grid"><!-- wp:column --><div class="wp-block-column"><div class="card service-card"><h3>Website Design</h3><p>Clean, modern websites tailored to your brand, goals, and audience.</p></div></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><div class="card service-card"><h3>WordPress Development</h3><p>Custom builds, theme improvements, integrations, and technical problem-solving.</p></div></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><div class="card service-card"><h3>Managed Hosting</h3><p>Dependable WordPress hosting with updates, backups, security, and support.</p></div></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><div class="card service-card"><h3>Maintenance &amp; Support</h3><p>Ongoing improvements, troubleshooting, updates, and long-term care.</p></div></div><!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
HTML;

    register_block_pattern('celestial-orbit/homepage-contrast-light', [
        'title'       => __('Homepage – Contrast Light', 'celestial-orbit'),
        'description' => __('Editable homepage starter pattern matching the packaged front page design.', 'celestial-orbit'),
        'categories'  => ['celestial-orbit'],
        'content'     => $content,
    ]);

    $services_content = <<<'HTML'
<!-- wp:group {"align":"full","className":"cwo-page-shell services-page-shell","layout":{"type":"constrained","wideSize":"1400px"}} -->
<div class="wp-block-group alignfull cwo-page-shell services-page-shell"><!-- wp:group {"align":"full","className":"cwo-home-hero","layout":{"type":"constrained","wideSize":"1400px"},"style":{"spacing":{"padding":{"top":"96px","bottom":"84px","left":"24px","right":"24px"}}}} -->
<div class="wp-block-group alignfull cwo-home-hero" style="padding-top:96px;padding-right:24px;padding-bottom:84px;padding-left:24px"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"hero-section__grid"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center hero-section__grid"><!-- wp:column {"verticalAlignment":"center","width":"60%","className":"hero-copy"} -->
<div class="wp-block-column is-vertically-aligned-center hero-copy" style="flex-basis:60%"><!-- wp:paragraph {"className":"eyebrow"} -->
<p class="eyebrow">Services</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":1} -->
<h1>WordPress development, hosting, and support built for long-term reliability.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"hero-copy__lead"} -->
<p class="hero-copy__lead">Celestial Web Development is a solo web development practice specializing in WordPress customization, custom development, high availability hosting, and practical long-term support for organizations that need direct technical expertise.</p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"button-group"} -->
<div class="wp-block-buttons button-group"><!-- wp:button {"className":"button button--primary"} -->
<div class="wp-block-button button button--primary"><a class="wp-block-button__link wp-element-button" href="/contact">Get a Quote</a></div>
<!-- /wp:button -->

<!-- wp:button {"className":"button button--secondary"} -->
<div class="wp-block-button button button--secondary"><a class="wp-block-button__link wp-element-button" href="/portfolio">View Portfolio</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"40%","className":"hero-panel"} -->
<div class="wp-block-column hero-panel" style="flex-basis:40%"><!-- wp:group {"className":"hero-panel__card hero-panel__card--main","layout":{"type":"constrained"}} -->
<div class="wp-block-group hero-panel__card hero-panel__card--main"><!-- wp:heading {"level":3} -->
<h3>What You Can Expect</h3>
<!-- /wp:heading -->

<!-- wp:list -->
<ul><li>Direct communication with the developer</li><li>Custom WordPress solutions</li><li>Hosting options inside and outside the U.S.</li><li>Maintenance and technical support</li></ul>
<!-- /wp:list --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"section","layout":{"type":"constrained","wideSize":"1400px"},"style":{"spacing":{"padding":{"top":"72px","bottom":"72px","left":"24px","right":"24px"}}}} -->
<div class="wp-block-group section" style="padding-top:72px;padding-right:24px;padding-bottom:72px;padding-left:24px"><!-- wp:group {"className":"section-heading","layout":{"type":"constrained"}} -->
<div class="wp-block-group section-heading"><!-- wp:paragraph {"className":"eyebrow"} --><p class="eyebrow">Professional Focus</p><!-- /wp:paragraph -->
<!-- wp:heading {"level":2} --><h2>Practical web services for clients who need more than a generic website.</h2><!-- /wp:heading -->
<!-- wp:paragraph --><p>Whether you need a new WordPress site, better performance, dependable hosting, or help maintaining an existing platform, services are designed to deliver stability, flexibility, and a polished end result without unnecessary complexity.</p><!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- wp:columns {"className":"card-grid"} -->
<div class="wp-block-columns card-grid"><!-- wp:column --><div class="wp-block-column"><div class="card service-card"><h3>Website Design</h3><p>Clean, modern websites designed around your content, audience, and goals.</p></div></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><div class="card service-card"><h3>WordPress Development</h3><p>Custom WordPress development including theme customization, plugin configuration, troubleshooting, and advanced functionality.</p></div></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><div class="card service-card"><h3>High Availability Hosting</h3><p>Reliable hosting solutions built for uptime, security, and performance, with infrastructure options inside and outside the United States.</p></div></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><div class="card service-card"><h3>Maintenance &amp; Support</h3><p>Ongoing updates, technical support, troubleshooting, and site care to keep your website stable and current.</p></div></div><!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:columns {"className":"card-grid card-grid--three","style":{"spacing":{"margin":{"top":"20px"}}}} -->
<div class="wp-block-columns card-grid card-grid--three" style="margin-top:20px"><!-- wp:column --><div class="wp-block-column"><div class="card service-card"><h3>Custom Development</h3><p>Experience includes PHP, Java, JavaScript, Python, and other technologies for custom tools, integrations, and specialized solutions.</p></div></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><div class="card service-card"><h3>Project Types</h3><p>Experience includes personal and hobby websites, nonprofit organizations, small business sites, and corporate web projects.</p></div></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><div class="card service-card"><h3>Direct Collaboration</h3><p>You work directly with the developer handling the project, which keeps communication clear and decision-making efficient.</p></div></div><!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"section section--alt","layout":{"type":"constrained","wideSize":"1400px"},"style":{"spacing":{"padding":{"top":"72px","bottom":"72px","left":"24px","right":"24px"}}}} -->
<div class="wp-block-group section section--alt" style="padding-top:72px;padding-right:24px;padding-bottom:72px;padding-left:24px"><!-- wp:columns {"className":"two-column"} -->
<div class="wp-block-columns two-column"><!-- wp:column --><div class="wp-block-column"><div class="section-heading"><p class="eyebrow">Why Celestial Web Development</p><h2>A direct, flexible approach to web development.</h2><p>From WordPress customization to broader application development, solutions are adapted to fit real technical needs rather than a one-size-fits-all package.</p></div></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><div class="card check-list"><ul><li>Direct communication</li><li>Practical technical depth</li><li>Hosting, development, and support in one place</li><li>Long-term reliability</li></ul></div></div><!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"className":"section section--cta","layout":{"type":"constrained","wideSize":"1400px"},"style":{"spacing":{"padding":{"top":"36px","bottom":"72px","left":"24px","right":"24px"}}}} -->
<div class="wp-block-group section section--cta" style="padding-top:36px;padding-right:24px;padding-bottom:72px;padding-left:24px"><!-- wp:group {"className":"cta-panel","layout":{"type":"constrained"}} -->
<div class="wp-block-group cta-panel"><!-- wp:group --><div class="wp-block-group"><p class="eyebrow">Start a Project</p><h2>Need a WordPress developer, hosting provider, or long-term support partner?</h2><p>Whether you are launching a new website, improving an existing one, or looking for dependable hosting and support, Celestial Web Development can help you move forward with a practical solution.</p></div><!-- /wp:group -->
<!-- wp:buttons {"className":"button-group button-group--stack-mobile"} -->
<div class="wp-block-buttons button-group button-group--stack-mobile"><!-- wp:button {"className":"button button--primary"} -->
<div class="wp-block-button button button--primary"><a class="wp-block-button__link wp-element-button" href="/contact">Request a Quote</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
HTML;

    register_block_pattern('celestial-orbit/services-page-cohesive', [
        'title'       => __('Services Page – Cohesive Layout', 'celestial-orbit'),
        'description' => __('A services page pattern styled to match the homepage layout and widened content system.', 'celestial-orbit'),
        'categories'  => ['celestial-orbit'],
        'content'     => $services_content,
    ]);
}
add_action('init', 'celestial_orbit_register_block_patterns');
