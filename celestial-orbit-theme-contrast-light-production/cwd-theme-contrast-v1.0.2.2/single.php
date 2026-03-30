<?php
/**
 * Single post template.
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
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class('entry-card'); ?>>
                <header class="entry-header">
                    <p class="eyebrow"><?php echo esc_html(get_the_date()); ?></p>
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="entry-thumbnail"><?php the_post_thumbnail('large'); ?></div>
                <?php endif; ?>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php the_post_navigation(); ?>
            <?php if (comments_open() || get_comments_number()) : comments_template(); endif; ?>
        <?php endwhile; ?>
    </div>
</section>
<?php
get_footer();
