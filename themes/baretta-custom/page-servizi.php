<?php
/**
 * Template Name: Servizi
 * Description: Template for the Services page
 *
 * @package Baretta
 */

get_header(); ?>

<!-- Hero Section -->
<section class="hero hero-page">
    <div class="hero-background" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/services.jpg');"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="hero-tagline">Cosa Facciamo</span>
        <h1 class="hero-title">I Nostri Servizi</h1>
        <p class="hero-subtitle">Soluzioni esclusive per trasformare la tua visione in realtà</p>
    </div>
</section>

<!-- Intro -->
<section class="section section-lg">
    <div class="container-narrow text-center">
        <p class="lead">Offriamo una gamma completa di servizi di architettura, design e consulenza, tutti orientati alla sostenibilità e al benessere delle persone.</p>
    </div>
</section>

<!-- Services from WordPress -->
<?php
$services = new WP_Query(array(
    'post_type'      => 'servizio',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
));

if ($services->have_posts()) :
    $counter = 0;
    while ($services->have_posts()) : $services->the_post();
        $counter++;
        $is_gray = ($counter % 2 == 1);
        $is_reversed = ($counter % 2 == 0);
        $icon = get_post_meta(get_the_ID(), '_baretta_service_icon', true);
?>
<section class="section <?php echo $is_gray ? 'section-gray' : ''; ?> section-lg" id="<?php echo sanitize_title(get_the_title()); ?>">
    <div class="container">
        <div class="about-section <?php echo $is_reversed ? 'about-section-reversed' : ''; ?>">
            <?php if (!$is_reversed) : ?>
            <div class="about-image">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large'); ?>
                <?php else : ?>
                    <div class="service-placeholder-image">
                        <?php echo baretta_get_service_icon($icon ?: 'box'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
            <div class="about-content">
                <span class="section-label">Servizio</span>
                <h2><?php the_title(); ?></h2>
                <?php if (has_excerpt()) : ?>
                    <p class="lead"><?php echo get_the_excerpt(); ?></p>
                <?php endif; ?>
                <?php the_content(); ?>
                <a href="<?php the_permalink(); ?>" class="btn <?php echo $is_gray ? 'btn-primary' : 'btn-outline'; ?>">Scopri di più</a>
            </div>
            <?php if ($is_reversed) : ?>
            <div class="about-image">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large'); ?>
                <?php else : ?>
                    <div class="service-placeholder-image">
                        <?php echo baretta_get_service_icon($icon ?: 'box'); ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php
    endwhile;
    wp_reset_postdata();
else :
?>
<!-- Fallback static services if none in WordPress -->
<!-- Casa ZED -->
<section class="section section-gray section-lg" id="casazed">
    <div class="container">
        <div class="about-section">
            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/services/casazed.jpg" alt="Casa ZED">
            </div>
            <div class="about-content">
                <span class="section-label">Servizio Esclusivo</span>
                <h2>Casa ZED</h2>
                <p class="lead">La tranquillità inizia qui.</p>
                <p>La prima abitazione bioenergetica in Italia che migliora la vita rivoluzionando il concetto di Casa.</p>
                <a href="<?php echo home_url('/contatti/'); ?>" class="btn btn-primary">Scopri Casa ZED</a>
            </div>
        </div>
    </div>
</section>

<!-- LCA -->
<section class="section section-lg" id="lca">
    <div class="container">
        <div class="about-section">
            <div class="about-content">
                <span class="section-label">Consulenza</span>
                <h2>Life Cycle Assessment (LCA)</h2>
                <p class="lead">Analisi del ciclo di vita dell'edificio per un futuro sostenibile.</p>
                <p>Il nostro servizio LCA identifica e valuta gli impatti ambientali durante l'intero ciclo produttivo dell'edificio.</p>
                <a href="<?php echo home_url('/contatti/'); ?>" class="btn btn-outline">Richiedi Analisi LCA</a>
            </div>
            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/services/lca.png" alt="Life Cycle Assessment">
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- CTA -->
<section class="section section-lg" style="background: var(--color-dark); color: var(--color-white);">
    <div class="container text-center">
        <h2 style="color: var(--color-white);">Hai bisogno di una consulenza?</h2>
        <p class="lead" style="color: rgba(255,255,255,0.8); max-width: 600px; margin: 0 auto var(--spacing-lg);">Contattaci per discutere il tuo progetto. Insieme troveremo la soluzione migliore per le tue esigenze.</p>
        <a href="<?php echo home_url('/contatti/'); ?>" class="btn btn-white">Contattaci</a>
    </div>
</section>

<?php get_footer(); ?>