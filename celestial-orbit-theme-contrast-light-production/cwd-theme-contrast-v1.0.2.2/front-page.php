<?php
/**
 * Front page template.
 *
 * @package Celestial_Orbit
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$services_url = celestial_orbit_get_page_url_by_slug('services', '#services');
$contact_url  = celestial_orbit_get_page_url_by_slug('contact', '#contact');
$about_url    = celestial_orbit_get_page_url_by_slug('about', '#about');
$hosting_url  = celestial_orbit_get_page_url_by_slug('wordpress-hosting', '#hosting');
$portfolio_url = celestial_orbit_get_page_url_by_slug('portfolio', '#portfolio');
$current_front_page = get_post(get_queried_object_id());
$has_editable_home_content = $current_front_page instanceof WP_Post && trim(wp_strip_all_tags((string) $current_front_page->post_content)) !== '';

if ($has_editable_home_content) :
    ?>
    <main class="editable-homepage-content" aria-label="<?php esc_attr_e('Homepage content', 'celestial-orbit'); ?>">
        <?php
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
        ?>
    </main>
    <?php
else : ?>

<section class="hero-section">
    <div class="wrap hero-section__grid">
        <div class="hero-copy">
            <p class="eyebrow"><?php esc_html_e('WordPress Development • Managed Hosting • Support', 'celestial-orbit'); ?></p>
            <h1><?php esc_html_e('Professional WordPress websites with reliable hosting and support.', 'celestial-orbit'); ?></h1>
            <p class="hero-copy__lead"><?php esc_html_e('Celestial Web Development builds, hosts, and maintains polished WordPress websites for businesses and organizations that want a clean professional presence, dependable performance, and long-term support.', 'celestial-orbit'); ?></p>
            <div class="button-group">
                <a class="button button--primary" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Get a Quote', 'celestial-orbit'); ?></a>
                <a class="button button--secondary" href="<?php echo esc_url($services_url); ?>"><?php esc_html_e('View Services', 'celestial-orbit'); ?></a>
            </div>
            <ul class="trust-points">
                <li><?php esc_html_e('Direct communication', 'celestial-orbit'); ?></li>
                <li><?php esc_html_e('Managed WordPress hosting', 'celestial-orbit'); ?></li>
                <li><?php esc_html_e('Performance-focused builds', 'celestial-orbit'); ?></li>
            </ul>
        </div>
        <div class="hero-panel">
            <div class="hero-panel__card hero-panel__card--main">
                <span class="chip"><?php esc_html_e('Featured Focus', 'celestial-orbit'); ?></span>
                <h2><?php esc_html_e('A sharper visual system for clients who want a stronger web presence.', 'celestial-orbit'); ?></h2>
                <p><?php esc_html_e('The design uses darker contrasts, restrained gradients, and polished content panels to give the site more depth while staying light, clean, and professional.', 'celestial-orbit'); ?></p>
            </div>
            <div class="hero-panel__stack">
                <div class="hero-panel__card">
                    <strong><?php esc_html_e('Stronger Contrast', 'celestial-orbit'); ?></strong>
                    <p><?php esc_html_e('Deeper headers, stronger typography, and cleaner sections improve readability and make calls to action stand out.', 'celestial-orbit'); ?></p>
                </div>
                <div class="hero-panel__card">
                    <strong><?php esc_html_e('Editable Foundation', 'celestial-orbit'); ?></strong>
                    <p><?php esc_html_e('The theme stays lightweight and business-focused, with a homepage template you can refine further as your services and content evolve.', 'celestial-orbit'); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section--tight">
    <div class="wrap trust-strip">
        <div><?php esc_html_e('WordPress Specialists', 'celestial-orbit'); ?></div>
        <div><?php esc_html_e('Managed Hosting', 'celestial-orbit'); ?></div>
        <div><?php esc_html_e('Ongoing Support', 'celestial-orbit'); ?></div>
        <div><?php esc_html_e('Performance Focused', 'celestial-orbit'); ?></div>
    </div>
</section>

<section id="services" class="section">
    <div class="wrap">
        <div class="section-heading">
            <p class="eyebrow"><?php esc_html_e('Services', 'celestial-orbit'); ?></p>
            <h2><?php esc_html_e('WordPress services built for reliability and growth.', 'celestial-orbit'); ?></h2>
            <p><?php esc_html_e('From custom site design to hosting and ongoing maintenance, Celestial Web Development provides practical solutions backed by direct support.', 'celestial-orbit'); ?></p>
        </div>
        <div class="card-grid">
            <?php foreach (celestial_orbit_service_cards() as $card) : ?>
                <article class="card service-card">
                    <h3><?php echo esc_html($card['title']); ?></h3>
                    <p><?php echo esc_html($card['description']); ?></p>
                    <a class="text-link" href="<?php echo esc_url($card['url']); ?>"><?php esc_html_e('Learn more', 'celestial-orbit'); ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--alt">
    <div class="wrap two-column">
        <div>
            <p class="eyebrow"><?php esc_html_e('Why Choose Celestial Web Development', 'celestial-orbit'); ?></p>
            <h2><?php esc_html_e('A better way to build and manage your website.', 'celestial-orbit'); ?></h2>
            <p><?php esc_html_e('Clients work directly with the developer, not a layered agency team. That means clearer communication, practical recommendations, and a long-term support mindset.', 'celestial-orbit'); ?></p>
        </div>
        <div class="check-list card">
            <ul>
                <li><?php esc_html_e('Work directly with the owner and developer', 'celestial-orbit'); ?></li>
                <li><?php esc_html_e('WordPress-focused expertise', 'celestial-orbit'); ?></li>
                <li><?php esc_html_e('Hosting, development, and support in one place', 'celestial-orbit'); ?></li>
                <li><?php esc_html_e('Fast, clean, modern websites', 'celestial-orbit'); ?></li>
                <li><?php esc_html_e('Long-term partnership mindset', 'celestial-orbit'); ?></li>
            </ul>
        </div>
    </div>
</section>

<section id="portfolio" class="section">
    <div class="wrap">
        <div class="section-heading">
            <p class="eyebrow"><?php esc_html_e('Featured Work', 'celestial-orbit'); ?></p>
            <h2><?php esc_html_e('Present real projects, redesign examples, or sample builds.', 'celestial-orbit'); ?></h2>
            <p><?php esc_html_e('This section is ready for screenshots and short summaries. Replace the sample content below with your best work.', 'celestial-orbit'); ?></p>
        </div>
        <div class="card-grid card-grid--three">
            <article class="card portfolio-card">
                <span class="chip"><?php esc_html_e('Sample Slot', 'celestial-orbit'); ?></span>
                <h3><?php esc_html_e('WordPress Redesign', 'celestial-orbit'); ?></h3>
                <p><?php esc_html_e('Show how an outdated site was transformed into a cleaner, faster, more professional experience.', 'celestial-orbit'); ?></p>
            </article>
            <article class="card portfolio-card">
                <span class="chip"><?php esc_html_e('Sample Slot', 'celestial-orbit'); ?></span>
                <h3><?php esc_html_e('Managed Hosting Client', 'celestial-orbit'); ?></h3>
                <p><?php esc_html_e('Highlight stability, maintenance, uptime, security, and support outcomes.', 'celestial-orbit'); ?></p>
            </article>
            <article class="card portfolio-card">
                <span class="chip"><?php esc_html_e('Sample Slot', 'celestial-orbit'); ?></span>
                <h3><?php esc_html_e('Custom Business Site', 'celestial-orbit'); ?></h3>
                <p><?php esc_html_e('Feature a clean custom build that demonstrates branding, usability, and mobile performance.', 'celestial-orbit'); ?></p>
            </article>
        </div>
        <p class="section-cta"><a class="button button--secondary" href="<?php echo esc_url($portfolio_url); ?>"><?php esc_html_e('View Portfolio Page', 'celestial-orbit'); ?></a></p>
    </div>
</section>

<section class="section section--alt">
    <div class="wrap">
        <div class="section-heading section-heading--center">
            <p class="eyebrow"><?php esc_html_e('Process', 'celestial-orbit'); ?></p>
            <h2><?php esc_html_e('A clear process from planning to launch and beyond.', 'celestial-orbit'); ?></h2>
        </div>
        <div class="steps-grid">
            <article class="card step-card"><span class="step-number">01</span><h3><?php esc_html_e('Discovery', 'celestial-orbit'); ?></h3><p><?php esc_html_e('Define goals, scope, structure, and requirements.', 'celestial-orbit'); ?></p></article>
            <article class="card step-card"><span class="step-number">02</span><h3><?php esc_html_e('Build', 'celestial-orbit'); ?></h3><p><?php esc_html_e('Design and develop a site that is clean, fast, and easy to use.', 'celestial-orbit'); ?></p></article>
            <article class="card step-card"><span class="step-number">03</span><h3><?php esc_html_e('Launch', 'celestial-orbit'); ?></h3><p><?php esc_html_e('Deploy with hosting, optimization, and technical checks in place.', 'celestial-orbit'); ?></p></article>
            <article class="card step-card"><span class="step-number">04</span><h3><?php esc_html_e('Support', 'celestial-orbit'); ?></h3><p><?php esc_html_e('Keep your site updated, secure, and running smoothly long-term.', 'celestial-orbit'); ?></p></article>
        </div>
    </div>
</section>

<section id="about" class="section">
    <div class="wrap two-column">
        <div>
            <p class="eyebrow"><?php esc_html_e('About', 'celestial-orbit'); ?></p>
            <h2><?php esc_html_e('A solo web development business built around direct service.', 'celestial-orbit'); ?></h2>
        </div>
        <div>
            <p><?php esc_html_e('Celestial Web Development is a solo WordPress development business focused on website design, hosting, and long-term support. Clients benefit from working directly with the person building and maintaining their website.', 'celestial-orbit'); ?></p>
            <p><a class="text-link" href="<?php echo esc_url($about_url); ?>"><?php esc_html_e('Learn more about the business', 'celestial-orbit'); ?></a></p>
        </div>
    </div>
</section>

<section id="hosting" class="section section--cta">
    <div class="wrap cta-panel">
        <div>
            <p class="eyebrow"><?php esc_html_e('Ready to Build or Improve Your Website?', 'celestial-orbit'); ?></p>
            <h2><?php esc_html_e('Let’s create something reliable, modern, and built to last.', 'celestial-orbit'); ?></h2>
            <p><?php esc_html_e('Use the Contact page for your form and project details, or build out the Hosting page to explain your managed WordPress plans.', 'celestial-orbit'); ?></p>
        </div>
        <div class="button-group button-group--stack-mobile">
            <a class="button button--primary" href="<?php echo esc_url($contact_url); ?>"><?php esc_html_e('Contact Celestial Web Development', 'celestial-orbit'); ?></a>
            <a class="button button--secondary" href="<?php echo esc_url($hosting_url); ?>"><?php esc_html_e('WordPress Hosting', 'celestial-orbit'); ?></a>
        </div>
    </div>
</section>

<?php endif;
get_footer();
