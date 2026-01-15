<?php
/**
 * Single Project Template
 *
 * @package Baretta
 */

get_header();

$location = get_post_meta(get_the_ID(), '_baretta_project_location', true);
$year = get_post_meta(get_the_ID(), '_baretta_project_year', true);
$size = get_post_meta(get_the_ID(), '_baretta_project_size', true);
$categories = get_the_terms(get_the_ID(), 'categoria_progetto');
?>

<?php while (have_posts()) : the_post(); ?>

<!-- Hero Image -->
<?php if (has_post_thumbnail()) : ?>
<div class="project-hero" style="height: 60vh; position: relative; overflow: hidden;">
    <?php the_post_thumbnail('full', array('style' => 'width: 100%; height: 100%; object-fit: cover;')); ?>
    <div style="position: absolute; bottom: 0; left: 0; right: 0; padding: 4rem 2rem; background: linear-gradient(transparent, rgba(0,0,0,0.7));">
        <div class="container">
            <?php if ($categories && !is_wp_error($categories)) : ?>
                <span class="project-category" style="color: var(--color-primary);"><?php echo esc_html($categories[0]->name); ?></span>
            <?php endif; ?>
            <h1 style="color: #fff; margin-bottom: 0;"><?php the_title(); ?></h1>
        </div>
    </div>
</div>
<?php else : ?>
<div class="page-header">
    <div class="container">
        <?php if ($categories && !is_wp_error($categories)) : ?>
            <span class="section-label"><?php echo esc_html($categories[0]->name); ?></span>
        <?php endif; ?>
        <h1><?php the_title(); ?></h1>
    </div>
</div>
<?php endif; ?>

<!-- Project Details -->
<section class="section section-lg">
    <div class="container">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 4rem; align-items: start;">
            <div class="project-content">
                <?php if (has_excerpt()) : ?>
                    <p class="lead"><?php the_excerpt(); ?></p>
                <?php endif; ?>
                <?php the_content(); ?>
            </div>
            <aside class="project-sidebar" style="background: var(--color-gray-light); padding: 2rem;">
                <h3 style="font-size: 1rem; text-transform: uppercase; letter-spacing: 0.1em; margin-bottom: 1.5rem;">Dettagli Progetto</h3>

                <?php if ($categories && !is_wp_error($categories)) : ?>
                <div style="margin-bottom: 1.5rem;">
                    <strong style="display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--color-text-light); margin-bottom: 0.25rem;">Categoria</strong>
                    <span><?php echo esc_html($categories[0]->name); ?></span>
                </div>
                <?php endif; ?>

                <?php if ($location) : ?>
                <div style="margin-bottom: 1.5rem;">
                    <strong style="display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--color-text-light); margin-bottom: 0.25rem;">Località</strong>
                    <span><?php echo esc_html($location); ?></span>
                </div>
                <?php endif; ?>

                <?php if ($year) : ?>
                <div style="margin-bottom: 1.5rem;">
                    <strong style="display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--color-text-light); margin-bottom: 0.25rem;">Anno</strong>
                    <span><?php echo esc_html($year); ?></span>
                </div>
                <?php endif; ?>

                <?php if ($size) : ?>
                <div style="margin-bottom: 1.5rem;">
                    <strong style="display: block; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--color-text-light); margin-bottom: 0.25rem;">Dimensioni</strong>
                    <span><?php echo esc_html($size); ?></span>
                </div>
                <?php endif; ?>

                <a href="<?php echo home_url('/contatti/'); ?>" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Richiedi Info</a>
            </aside>
        </div>
    </div>
</section>

<!-- Related Projects -->
<?php
$related = new WP_Query(array(
    'post_type'      => 'progetto',
    'posts_per_page' => 3,
    'post__not_in'   => array(get_the_ID()),
    'orderby'        => 'rand',
    'tax_query'      => $categories ? array(
        array(
            'taxonomy' => 'categoria_progetto',
            'field'    => 'term_id',
            'terms'    => $categories[0]->term_id,
        ),
    ) : array(),
));

if ($related->have_posts()) :
?>
<section class="section section-gray section-lg">
    <div class="container">
        <div class="text-center mb-4">
            <span class="section-label">Portfolio</span>
            <h2>Progetti Correlati</h2>
        </div>
        <div class="projects-grid">
            <?php while ($related->have_posts()) : $related->the_post(); ?>
                <?php get_template_part('template-parts/content', 'project-card'); ?>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div class="text-center mt-3">
            <a href="<?php echo home_url('/progetti/'); ?>" class="btn btn-outline">Vedi Tutti i Progetti</a>
        </div>
    </div>
</section>
<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>
