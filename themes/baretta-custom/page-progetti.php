<?php
/**
 * Template Name: Progetti
 * Description: Template for the Projects/Portfolio page
 *
 * @package Baretta
 */

get_header(); ?>

<!-- Hero Section -->
<section class="hero hero-page">
    <div class="hero-background" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/projects-hero.jpg');"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="hero-tagline">Portfolio</span>
        <h1 class="hero-title">I Nostri Progetti</h1>
        <p class="hero-subtitle">Esplora una selezione dei nostri lavori in architettura, interior design e consulenza</p>
    </div>
</section>

<!-- Projects Section -->
<section class="section section-lg">
    <div class="container">

        <!-- Projects Filter -->
        <div class="projects-filter">
            <button class="filter-btn active" data-filter="all">Tutti</button>
            <?php
            $categories = baretta_get_project_categories();
            if (!empty($categories) && !is_wp_error($categories)) :
                foreach ($categories as $cat) :
            ?>
                <button class="filter-btn" data-filter="<?php echo esc_attr($cat->slug); ?>"><?php echo esc_html($cat->name); ?></button>
            <?php
                endforeach;
            else :
                // Default categories if none exist
            ?>
                <button class="filter-btn" data-filter="architettura-residenziale">Architettura Residenziale</button>
                <button class="filter-btn" data-filter="architettura-industriale">Architettura Industriale</button>
                <button class="filter-btn" data-filter="interior-residenziale">Interior Residenziale</button>
                <button class="filter-btn" data-filter="interior-commerciale">Interior Commerciale</button>
                <button class="filter-btn" data-filter="interior-uffici">Interior Uffici</button>
            <?php endif; ?>
        </div>

        <!-- Projects Grid -->
        <div class="projects-grid" id="projects-container">
            <?php
            $projects = new WP_Query(array(
                'post_type'      => 'progetto',
                'posts_per_page' => -1,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));

            if ($projects->have_posts()) :
                while ($projects->have_posts()) : $projects->the_post();
                    get_template_part('template-parts/content', 'project-card');
                endwhile;
                wp_reset_postdata();
            else :
                // Demo projects if no real ones exist
            ?>
                <div class="project-card" data-category="architettura-residenziale">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/projects/project-1.jpg" alt="Barasso">
                    <div class="project-overlay">
                        <span class="project-category">Architettura Residenziale</span>
                        <h3 class="project-title">Barasso</h3>
                    </div>
                </div>
                <div class="project-card" data-category="architettura-residenziale">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/projects/project-2.jpg" alt="Luvinate">
                    <div class="project-overlay">
                        <span class="project-category">Architettura Residenziale</span>
                        <h3 class="project-title">Luvinate</h3>
                    </div>
                </div>
                <div class="project-card" data-category="interior-residenziale">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/projects/project-3.jpg" alt="Petrarca Milano">
                    <div class="project-overlay">
                        <span class="project-category">Interior Residenziale</span>
                        <h3 class="project-title">Petrarca, Milano</h3>
                    </div>
                </div>
                <div class="project-card" data-category="interior-commerciale">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/projects/project-4.jpg" alt="Ristorante il Riccio">
                    <div class="project-overlay">
                        <span class="project-category">Interior Commerciale</span>
                        <h3 class="project-title">Ristorante il Riccio, Varese</h3>
                    </div>
                </div>
                <div class="project-card" data-category="interior-uffici">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/projects/project-5.jpg" alt="Studio LCA">
                    <div class="project-overlay">
                        <span class="project-category">Interior Uffici</span>
                        <h3 class="project-title">Studio LCA, Milano</h3>
                    </div>
                </div>
                <div class="project-card" data-category="architettura-industriale">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/projects/project-6.jpg" alt="ORA C'È Como">
                    <div class="project-overlay">
                        <span class="project-category">Architettura Industriale</span>
                        <h3 class="project-title">ORA C'È, Como</h3>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<!-- CTA -->
<section class="section section-lg" style="background: var(--color-dark); color: var(--color-white);">
    <div class="container text-center">
        <h2 style="color: var(--color-white);">Vuoi vedere il tuo progetto qui?</h2>
        <p class="lead" style="color: rgba(255,255,255,0.8); max-width: 600px; margin: 0 auto var(--spacing-lg);">Contattaci per discutere la tua visione. Insieme creeremo qualcosa di unico.</p>
        <a href="<?php echo home_url('/contatti/'); ?>" class="btn btn-white">Inizia un Progetto</a>
    </div>
</section>

<?php get_footer(); ?>