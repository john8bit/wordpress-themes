<?php
/**
 * Default content template.
 *
 * @package Celestial_Orbit
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('card post-card'); ?>>
    <p class="eyebrow"><?php echo esc_html(get_the_date()); ?></p>
    <h2 class="post-card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="post-card__excerpt"><?php the_excerpt(); ?></div>
    <a class="text-link" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more', 'celestial-orbit'); ?></a>
</article>
