<?php
/**
 * Single Service Template
 *
 * @package Baretta
 */

get_header();

$icon = get_post_meta(get_the_ID(), '_baretta_service_icon', true);
if (!$icon) $icon = 'box';
?>

<?php while (have_posts()) : the_post(); ?>

<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <span class="section-label">Servizio</span>
        <h1><?php the_title(); ?></h1>
        <?php if (has_excerpt()) : ?>
            <p class="lead"><?php echo get_the_excerpt(); ?></p>
        <?php endif; ?>
    </div>
</div>

<!-- Service Content -->
<section class="section section-lg">
    <div class="container">
        <div class="about-section">
            <div class="about-content" style="flex: 1;">
                <div class="service-icon-large" style="margin-bottom: 2rem;">
                    <?php echo baretta_get_service_icon($icon); ?>
                </div>
                <div class="service-content">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php if (has_post_thumbnail()) : ?>
            <div class="about-image">
                <?php the_post_thumbnail('large'); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section section-gray section-lg">
    <div class="container text-center">
        <h2>Interessato a <?php the_title(); ?>?</h2>
        <p class="lead" style="max-width: 600px; margin: 0 auto var(--spacing-lg);">Contattaci per discutere come possiamo aiutarti con questo servizio.</p>
        <a href="<?php echo home_url('/contatti/'); ?>" class="btn btn-primary">Richiedi Informazioni</a>
    </div>
</section>

<!-- Other Services -->
<?php
$other_services = new WP_Query(array(
    'post_type'      => 'servizio',
    'posts_per_page' => 3,
    'post__not_in'   => array(get_the_ID()),
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
));

if ($other_services->have_posts()) :
?>
<section class="section section-lg">
    <div class="container">
        <div class="text-center mb-4">
            <span class="section-label">Esplora</span>
            <h2>Altri Servizi</h2>
        </div>
        <div class="services-grid">
            <?php while ($other_services->have_posts()) : $other_services->the_post();
                $service_icon = get_post_meta(get_the_ID(), '_baretta_service_icon', true);
                if (!$service_icon) $service_icon = 'box';
            ?>
                <a href="<?php the_permalink(); ?>" class="service-card service-card-link">
                    <?php echo baretta_get_service_icon($service_icon); ?>
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                </a>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div class="text-center mt-3">
            <a href="<?php echo home_url('/servizi/'); ?>" class="btn btn-outline">Tutti i Servizi</a>
        </div>
    </div>
</section>
<?php endif; ?>

<?php endwhile; ?>

<?php get_footer(); ?>
