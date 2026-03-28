<?php
/**
 * Footer template.
 *
 * @package Celestial_Orbit
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
</main>
<?php if (is_active_sidebar('footer-cta')) : ?>
    <section class="footer-cta">
        <div class="wrap">
            <?php dynamic_sidebar('footer-cta'); ?>
        </div>
    </section>
<?php endif; ?>
<footer class="site-footer">
    <div class="wrap site-footer__grid">
        <div>
            <h2 class="site-footer__title"><?php bloginfo('name'); ?></h2>
            <p><?php esc_html_e('WordPress websites, hosting, and dependable support for businesses and organizations.', 'celestial-orbit'); ?></p>
        </div>
        <div>
            <h3><?php esc_html_e('Quick Links', 'celestial-orbit'); ?></h3>
            <?php
            wp_nav_menu([
                'theme_location' => 'footer',
                'container'      => false,
                'fallback_cb'    => 'wp_page_menu',
            ]);
            ?>
        </div>
        <div>
            <h3><?php esc_html_e('Contact', 'celestial-orbit'); ?></h3>
            <p>
                <a href="mailto:john@celestialwebdevelopment.com">john@celestialwebdevelopment.com</a><br>
                <a href="tel:+15072516519">(507) 251-6519</a>
            </p>
        </div>
    </div>
    <div class="wrap site-footer__bottom">
        <p>&copy; <?php echo esc_html(wp_date('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'celestial-orbit'); ?></p>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
