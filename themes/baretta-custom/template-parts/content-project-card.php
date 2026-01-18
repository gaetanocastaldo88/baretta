<?php
/**
 * Template part for displaying project cards
 *
 * @package Baretta
 */

$categories = get_the_terms(get_the_ID(), 'categoria_progetto');
$category_name = $categories && !is_wp_error($categories) ? $categories[0]->name : '';
$category_slug = $categories && !is_wp_error($categories) ? $categories[0]->slug : '';
?>

<article class="project-card" data-category="<?php echo esc_attr($category_slug); ?>">
    <a href="<?php the_permalink(); ?>">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('project-thumbnail'); ?>
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/project-placeholder.jpg" alt="<?php the_title_attribute(); ?>">
        <?php endif; ?>
        <div class="project-overlay">
            <?php if ($category_name) : ?>
                <span class="project-category"><?php echo esc_html($category_name); ?></span>
            <?php endif; ?>
            <h3 class="project-title"><?php the_title(); ?></h3>
        </div>
    </a>
</article>