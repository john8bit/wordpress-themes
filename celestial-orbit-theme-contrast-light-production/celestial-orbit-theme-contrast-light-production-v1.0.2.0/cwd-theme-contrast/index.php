<?php
/**
 * Main index template.
 *
 * @package Celestial_Orbit
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="section">
    <div class="wrap content-grid">
        <div class="content-area">
            <?php if (have_posts()) : ?>
                <header class="archive-header">
                    <?php if (is_home() && !is_front_page()) : ?>
                        <h1><?php single_post_title(); ?></h1>
                    <?php elseif (is_archive()) : ?>
                        <?php the_archive_title('<h1>', '</h1>'); ?>
                        <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
                    <?php else : ?>
                        <h1><?php esc_html_e('Latest Posts', 'celestial-orbit'); ?></h1>
                    <?php endif; ?>
                </header>

                <div class="post-list">
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/content', get_post_type()); ?>
                    <?php endwhile; ?>
                </div>

                <?php the_posts_pagination(); ?>
            <?php else : ?>
                <?php get_template_part('template-parts/content', 'none'); ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
get_footer();
