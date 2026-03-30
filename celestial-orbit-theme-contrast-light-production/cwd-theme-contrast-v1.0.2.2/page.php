<?php
/**
 * Page template.
 *
 * @package Celestial_Orbit
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="section">
    <div class="page-content-wrap">
        <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class('entry-card'); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php if (comments_open() || get_comments_number()) : comments_template(); endif; ?>
        <?php endwhile; ?>
    </div>
</section>
<?php
get_footer();
