<?php
/**
 * Front Page Template - Homepage
 *
 * @package Baretta
 */

get_header(); ?>

<!-- Hero Section -->
<section class="hero">
    <!-- Fallback immagine (visibile mentre il video carica) -->
    <div class="hero-background hero-image-fallback" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg');"></div>

    <!-- Video Background con lazy loading -->
    <video class="hero-video" autoplay muted loop playsinline preload="none" poster="<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg">
        <source data-src="<?php echo get_template_directory_uri(); ?>/videos/hero.mp4" type="video/mp4">
    </video>

    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="hero-tagline">Studio di Architettura</span>
        <h1 class="hero-title">Le nostre scelte<br>fanno la differenza</h1>
        <p class="hero-subtitle">Progettiamo in modo olistico seguendo i nostri valori, integrando competenze specifiche in ogni progetto per renderlo esclusivo.</p>
        <div class="hero-buttons">
            <a href="<?php echo get_permalink(get_page_by_path('progetti')); ?>" class="btn btn-primary">Scopri i Progetti</a>
            <a href="<?php echo get_permalink(get_page_by_path('contatti')); ?>" class="btn btn-outline">Contattaci</a>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="section section-lg">
    <div class="container">
        <div class="about-section">
            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/studio.jpg" alt="Baretta Associati Studio">
            </div>
            <div class="about-content">
                <span class="section-label">Chi Siamo</span>
                <h2>Siamo un gruppo di persone che condividono valori comuni per creare progetti unici</h2>
                <p class="lead">Baretta Associati nasce dalla passione per l'architettura sostenibile e il design che migliora la qualità della vita.</p>
                <p>Un collettivo di professionisti creativi e tecnici che spazia dall'architettura residenziale, a quella industriale, passando per gli spazi interni di abitazioni, uffici e locali commerciali.</p>
                <p>Ci specializziamo in architettura bioclimatica e passiva, tossicologia ambientale e biocompatibilità, sostenibilità come membri del Living Future Institute.</p>
                <a href="<?php echo get_permalink(get_page_by_path('studio')); ?>" class="btn btn-outline mt-2">Scopri lo Studio</a>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="section section-gray">
    <div class="container">
        <div class="text-center mb-4">
            <span class="section-label">I Nostri Numeri</span>
            <h2>Esperienza e dedizione</h2>
        </div>
        <div class="values-grid">
            <div class="value-item">
                <div class="value-number">18+</div>
                <div class="value-label">Anni di Esperienza</div>
            </div>
            <div class="value-item">
                <div class="value-number">150+</div>
                <div class="value-label">Progetti Realizzati</div>
            </div>
            <div class="value-item">
                <div class="value-number">100%</div>
                <div class="value-label">Clienti Soddisfatti</div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section section-lg">
    <div class="container">
        <div class="text-center mb-4">
            <span class="section-label">Servizi</span>
            <h2>I nostri progetti creano impatti positivi</h2>
            <p class="lead">Offriamo servizi esclusivi per trasformare la tua visione in realtà</p>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6"/>
                </svg>
                <h3>Casa ZED</h3>
                <p>La prima abitazione bioenergetica in Italia che migliora la vita rivoluzionando il concetto di Casa. La tranquillità inizia qui.</p>
            </div>
            <div class="service-card">
                <svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
                </svg>
                <h3>Life Cycle Assessment</h3>
                <p>Analisi del ciclo di vita dell'edificio per identificare gli impatti ambientali e raggiungere la carbon neutrality.</p>
            </div>
            <div class="service-card">
                <svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                </svg>
                <h3>Certificazioni Living Future</h3>
                <p>Consulenza per certificazioni internazionali: Zero Carbon, Zero Energy, Living Building Challenge.</p>
            </div>
            <div class="service-card">
                <svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                </svg>
                <h3>Biophilic Design</h3>
                <p>Colleghiamo persone e natura negli ambienti costruiti, creando spazi che offrono benefici fisici e psicologici.</p>
            </div>
            <div class="service-card">
                <svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/>
                </svg>
                <h3>Work Energy +</h3>
                <p>Progettazione di ambienti lavorativi ottimizzati per produttività e creatività con misurazione della qualità ambientale.</p>
            </div>
            <div class="service-card">
                <svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                </svg>
                <h3>Interior Design</h3>
                <p>Progettazione di interni residenziali, commerciali e uffici con focus su armonia e funzionalità degli spazi.</p>
            </div>
        </div>
        <div class="text-center mt-3">
            <a href="<?php echo get_permalink(get_page_by_path('servizi')); ?>" class="btn btn-primary">Tutti i Servizi</a>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section class="section section-gray section-lg">
    <div class="container">
        <div class="text-center mb-4">
            <span class="section-label">Portfolio</span>
            <h2>I nostri progetti</h2>
            <p class="lead">Esplora una selezione dei nostri lavori in architettura e design</p>
        </div>

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
            endif;
            ?>
        </div>

        <!-- Projects Grid -->
        <div class="projects-grid" id="projects-container">
            <?php
            $projects = new WP_Query(array(
                'post_type'      => 'progetto',
                'posts_per_page' => 6,
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
                <div class="project-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/projects/project-1.jpg" alt="Barasso">
                    <div class="project-overlay">
                        <span class="project-category">Architettura Residenziale</span>
                        <h3 class="project-title">Barasso</h3>
                    </div>
                </div>
                <div class="project-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/projects/project-2.jpg" alt="Luvinate">
                    <div class="project-overlay">
                        <span class="project-category">Architettura Residenziale</span>
                        <h3 class="project-title">Luvinate</h3>
                    </div>
                </div>
                <div class="project-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/projects/project-3.jpg" alt="Petrarca Milano">
                    <div class="project-overlay">
                        <span class="project-category">Interior Residenziale</span>
                        <h3 class="project-title">Petrarca, Milano</h3>
                    </div>
                </div>
                <div class="project-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/projects/project-4.jpg" alt="Ristorante il Riccio">
                    <div class="project-overlay">
                        <span class="project-category">Interior Commerciale</span>
                        <h3 class="project-title">Ristorante il Riccio, Varese</h3>
                    </div>
                </div>
                <div class="project-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/projects/project-5.jpg" alt="Studio LCA Milano">
                    <div class="project-overlay">
                        <span class="project-category">Interior Uffici</span>
                        <h3 class="project-title">Studio LCA, Milano</h3>
                    </div>
                </div>
                <div class="project-card">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/projects/project-6.jpg" alt="ORA C'È Como">
                    <div class="project-overlay">
                        <span class="project-category">Architettura Industriale</span>
                        <h3 class="project-title">ORA C'È, Como</h3>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-3">
            <a href="<?php echo get_permalink(get_page_by_path('progetti')); ?>" class="btn btn-outline">Vedi Tutti i Progetti</a>
        </div>
    </div>
</section>

<!-- News Section -->
<section class="section section-gray section-lg">
    <div class="container">
        <div class="text-center mb-4">
            <span class="section-label">News</span>
            <h2>Ultime novità</h2>
            <p class="lead">Aggiornamenti dal mondo dell'architettura e dello studio</p>
        </div>
        <div class="news-grid">
            <?php
            $news = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));

            if ($news->have_posts()) :
                while ($news->have_posts()) : $news->the_post();
            ?>
                <article class="news-card">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" class="news-card-image">
                            <?php the_post_thumbnail('medium_large'); ?>
                        </a>
                    <?php else : ?>
                        <a href="<?php the_permalink(); ?>" class="news-card-image news-card-no-image">
                            <span class="news-placeholder-icon">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z"/>
                                    <path d="M8.5 10a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    <path d="m21 15-5-5L5 21"/>
                                </svg>
                            </span>
                        </a>
                    <?php endif; ?>
                    <div class="news-card-content">
                        <span class="news-date"><?php echo get_the_date('j F Y'); ?></span>
                        <h3 class="news-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h3>
                        <p class="news-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        <a href="<?php the_permalink(); ?>" class="news-read-more">Leggi di più</a>
                    </div>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Demo news if no posts exist
            ?>
                <article class="news-card">
                    <div class="news-card-image news-card-no-image">
                        <span class="news-placeholder-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z"/>
                                <path d="M8.5 10a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                <path d="m21 15-5-5L5 21"/>
                            </svg>
                        </span>
                    </div>
                    <div class="news-card-content">
                        <span class="news-date">15 Gennaio 2026</span>
                        <h3 class="news-title"><a href="#">Nuovo progetto residenziale a Varese</a></h3>
                        <p class="news-excerpt">Siamo entusiasti di annunciare l'inizio di un nuovo progetto di architettura sostenibile nel cuore di Varese.</p>
                        <a href="#" class="news-read-more">Leggi di più</a>
                    </div>
                </article>
                <article class="news-card">
                    <div class="news-card-image news-card-no-image">
                        <span class="news-placeholder-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z"/>
                                <path d="M8.5 10a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                <path d="m21 15-5-5L5 21"/>
                            </svg>
                        </span>
                    </div>
                    <div class="news-card-content">
                        <span class="news-date">10 Gennaio 2026</span>
                        <h3 class="news-title"><a href="#">Certificazione Living Building Challenge</a></h3>
                        <p class="news-excerpt">Il nostro ultimo progetto ha ottenuto la prestigiosa certificazione Living Building Challenge.</p>
                        <a href="#" class="news-read-more">Leggi di più</a>
                    </div>
                </article>
                <article class="news-card">
                    <div class="news-card-image news-card-no-image">
                        <span class="news-placeholder-icon">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                                <path d="M19 3H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2z"/>
                                <path d="M8.5 10a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                <path d="m21 15-5-5L5 21"/>
                            </svg>
                        </span>
                    </div>
                    <div class="news-card-content">
                        <span class="news-date">5 Gennaio 2026</span>
                        <h3 class="news-title"><a href="#">Workshop Biophilic Design</a></h3>
                        <p class="news-excerpt">Partecipa al nostro workshop sul design biofilico e scopri come connettere natura e architettura.</p>
                        <a href="#" class="news-read-more">Leggi di più</a>
                    </div>
                </article>
            <?php endif; ?>
        </div>
        <div class="text-center mt-3">
            <a href="<?php echo get_permalink(get_page_by_path('news')); ?>" class="btn btn-outline">Tutte le News</a>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="section section-lg">
    <div class="container">
        <div class="text-center mb-4">
            <span class="section-label">Team</span>
            <h2>Le persone dietro i progetti</h2>
            <p class="lead">Un team di professionisti appassionati e dedicati</p>
        </div>
        <div class="team-grid">
            <?php
            $team = new WP_Query(array(
                'post_type'      => 'team',
                'posts_per_page' => 4,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            ));

            if ($team->have_posts()) :
                while ($team->have_posts()) : $team->the_post();
                    $role = get_post_meta(get_the_ID(), '_baretta_team_role', true);
            ?>
                <div class="team-member">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('team-photo', array('class' => 'team-photo')); ?>
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/team-placeholder.jpg" alt="<?php the_title(); ?>" class="team-photo">
                    <?php endif; ?>
                    <h4 class="team-name"><?php the_title(); ?></h4>
                    <?php if ($role) : ?>
                        <span class="team-role"><?php echo esc_html($role); ?></span>
                    <?php endif; ?>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Demo team members if no real ones exist
            ?>
                <div class="team-member">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/stefano.jpg" alt="Stefano Baretta" class="team-photo">
                    <h4 class="team-name">Stefano Baretta</h4>
                    <span class="team-role">Founder & Director</span>
                </div>
                <div class="team-member">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/venelina.jpg" alt="Venelina Gancheva" class="team-photo">
                    <h4 class="team-name">Venelina Gancheva</h4>
                    <span class="team-role">Founder & Interior Designer</span>
                </div>
                <div class="team-member">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/matteo.jpg" alt="Matteo Bollini" class="team-photo">
                    <h4 class="team-name">Matteo Bollini</h4>
                    <span class="team-role">Architetto</span>
                </div>
                <div class="team-member">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/antonio.jpg" alt="Antonio Papa" class="team-photo">
                    <h4 class="team-name">Antonio Papa</h4>
                    <span class="team-role">Architetto</span>
                </div>
                <div class="team-member">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/alessia.jpg" alt="Alessia Rampazzo" class="team-photo">
                    <h4 class="team-name">Alessia Rampazzo</h4>
                    <span class="team-role">Architetto</span>
                </div>
                <div class="team-member">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/gloria.jpg" alt="Gloria Sacchelli" class="team-photo">
                    <h4 class="team-name">Gloria Sacchelli</h4>
                    <span class="team-role">Architetto</span>
                </div>
                <div class="team-member">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/pepe.jpg" alt="Pepe" class="team-photo">
                    <h4 class="team-name">Pepe</h4>
                    <span class="team-role">Mascotte</span>
                </div>
            <?php endif; ?>
        </div>
        <div class="text-center mt-3">
            <a href="<?php echo get_permalink(get_page_by_path('studio')); ?>" class="btn btn-outline">Conosci il Team</a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section section-lg" style="background: var(--color-dark); color: var(--color-white);">
    <div class="container text-center">
        <h2 style="color: var(--color-white);">Hai un progetto in mente?</h2>
        <p class="lead" style="color: rgba(255,255,255,0.8); max-width: 600px; margin: 0 auto var(--spacing-lg);">Contattaci per discutere la tua visione. Siamo pronti a trasformare le tue idee in spazi che migliorano la qualità della vita.</p>
        <a href="<?php echo get_permalink(get_page_by_path('contatti')); ?>" class="btn btn-white">Inizia un Progetto</a>
    </div>
</section>

<?php get_footer(); ?>