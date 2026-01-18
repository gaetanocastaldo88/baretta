<?php
/**
 * Template Name: Studio
 * Description: Template for the Studio/About page
 *
 * @package Baretta
 */

get_header(); ?>

<!-- Hero Section -->
<section class="hero hero-page">
    <div class="hero-background" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/hero-bg.jpg'); background-position: center top;"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="hero-tagline">Chi Siamo</span>
        <h1 class="hero-title">Lo Studio</h1>
        <p class="hero-subtitle">Un gruppo di persone che condividono valori comuni per creare progetti unici</p>
    </div>
</section>

<!-- Studio Intro -->
<section class="section section-lg">
    <div class="container">
        <div class="about-section">
            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/studio-office.jpg" alt="Baretta Associati Office">
            </div>
            <div class="about-content">
                <span class="section-label">La Nostra Storia</span>
                <h2>Baretta Associati</h2>
                <p class="lead">Baretta Associati s.r.l. è uno studio di architettura fondato nel 2018 con sede a Varese.</p>
                <p>Siamo un collettivo di professionisti creativi e tecnici che spazia dall'architettura residenziale a quella industriale, passando per gli spazi interni di abitazioni, uffici e locali commerciali.</p>
                <p>La nostra missione è progettare in modo olistico seguendo i nostri valori, integrando competenze specifiche in ogni progetto per renderlo esclusivo.</p>
            </div>
        </div>
    </div>
</section>

<!-- Philosophy -->
<section class="section section-gray section-lg">
    <div class="container">
        <div class="text-center mb-4">
            <span class="section-label">La Nostra Filosofia</span>
            <h2>Architettura per il Benessere</h2>
        </div>
        <div class="container-narrow">
            <p class="lead text-center">Crediamo che l'architettura debba migliorare la qualità della vita delle persone. Per questo ci specializziamo in:</p>
        </div>
        <div class="services-grid mt-3">
            <div class="service-card">
                <h3>Architettura Bioclimatica</h3>
                <p>Progettiamo edifici che sfruttano le condizioni climatiche locali per ridurre il fabbisogno energetico e aumentare il comfort abitativo.</p>
            </div>
            <div class="service-card">
                <h3>Tossicologia Ambientale</h3>
                <p>Selezioniamo materiali biocompatibili per creare ambienti salubri, privi di sostanze nocive per la salute.</p>
            </div>
            <div class="service-card">
                <h3>Sostenibilità</h3>
                <p>Come membri del Living Future Institute, ci impegniamo per certificazioni internazionali di sostenibilità e carbon neutrality.</p>
            </div>
        </div>
    </div>
</section>

<!-- CASAZED Concept -->
<section class="section section-lg">
    <div class="container">
        <div class="about-section">
            <div class="about-content">
                <span class="section-label">Il Nostro Approccio</span>
                <h2>CASAZED</h2>
                <p class="lead">Ambienti progettati per impattare positivamente sulla salute fisica, ridurre lo stress mentale e aumentare la produttività.</p>
                <p>Il concetto CASAZED nasce dalla nostra esperienza nel creare spazi che non sono solo esteticamente belli, ma che contribuiscono attivamente al benessere di chi li abita.</p>
                <p>Ogni progetto CASAZED integra:</p>
                <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem;">
                    <li>Qualità dell'aria e ventilazione naturale</li>
                    <li>Illuminazione ottimizzata per il ritmo circadiano</li>
                    <li>Materiali naturali e biocompatibili</li>
                    <li>Connessione con la natura (Biophilic Design)</li>
                    <li>Acustica e privacy</li>
                </ul>
            </div>
            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/casazed.jpg" alt="CASAZED Concept">
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="section section-gray section-lg">
    <div class="container">
        <div class="text-center mb-4">
            <span class="section-label">Il Team</span>
            <h2>Le Persone Dietro i Progetti</h2>
            <p class="lead">Un team di professionisti appassionati e dedicati</p>
        </div>
        <div class="team-grid">
            <?php
            $team = new WP_Query(array(
                'post_type'      => 'team',
                'posts_per_page' => -1,
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
                    <?php if (get_the_content()) : ?>
                        <p class="team-bio"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                    <?php endif; ?>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
            ?>
                <!-- Demo Team Members -->
                <div class="team-member">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/stefano.jpg" alt="Stefano Baretta" class="team-photo">
                    <h4 class="team-name">Stefano Baretta</h4>
                    <span class="team-role">Founder & Director</span>
                    <p class="team-bio">Architetto e designer con oltre 18 anni di esperienza. Co-fondatore di Voltasette (2006), ReeLab (2016) e Baretta Associati (2018). Specializzato in architettura sostenibile.</p>
                </div>
                <div class="team-member">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/venelina.jpg" alt="Venelina Gancheva" class="team-photo">
                    <h4 class="team-name">Venelina Gancheva</h4>
                    <span class="team-role">Founder & Interior Designer</span>
                    <p class="team-bio">Designer di interni con laurea IED Milano (2008). Dirige progetti di styling e grafica, enfatizzando composizioni spaziali armoniose.</p>
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
                    <span class="team-role">Ingegnere Strutturale</span>
                </div>
                <div class="team-member">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/gloria.jpg" alt="Gloria Sacchelli" class="team-photo">
                    <h4 class="team-name">Gloria Sacchelli</h4>
                    <span class="team-role">Amministrazione</span>
                </div>
                <div class="team-member">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/team/pepe.jpg" alt="Pepe" class="team-photo">
                    <h4 class="team-name">Pepe</h4>
                    <span class="team-role">Office Dog & Mascotte</span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Values Numbers -->
<section class="section section-lg">
    <div class="container">
        <div class="values-grid">
            <div class="value-item">
                <div class="value-number">2018</div>
                <div class="value-label">Anno di Fondazione</div>
            </div>
            <div class="value-item">
                <div class="value-number">8+</div>
                <div class="value-label">Professionisti</div>
            </div>
            <div class="value-item">
                <div class="value-number">150+</div>
                <div class="value-label">Progetti Completati</div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>