<?php
/**
 * 404 template.
 *
 * @package Celestial_Orbit
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="section">
    <div class="wrap narrow-content">
        <article class="entry-card text-center">
            <p class="eyebrow"><?php esc_html_e('404', 'celestial-orbit'); ?></p>
            <h1><?php esc_html_e('That page could not be found.', 'celestial-orbit'); ?></h1>
            <p><?php esc_html_e('Try heading back to the homepage or use the menu to find the page you need.', 'celestial-orbit'); ?></p>
            <p><a class="button button--primary" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to Home', 'celestial-orbit'); ?></a></p>
        </article>
    </div>
</section>
<?php
get_footer();
