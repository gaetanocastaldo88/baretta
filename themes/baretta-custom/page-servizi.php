<?php
/**
 * Template Name: Servizi
 * Description: Template for the Services page
 *
 * @package Baretta
 */

get_header(); ?>

<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <span class="section-label">Cosa Facciamo</span>
        <h1>I Nostri Servizi</h1>
        <p class="lead">Soluzioni esclusive per trasformare la tua visione in realtà</p>
    </div>
</div>

<!-- Intro -->
<section class="section section-lg">
    <div class="container-narrow text-center">
        <p class="lead">Offriamo una gamma completa di servizi di architettura, design e consulenza, tutti orientati alla sostenibilità e al benessere delle persone.</p>
    </div>
</section>

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
                <p>La prima abitazione bioenergetica in Italia che migliora la vita rivoluzionando il concetto di Casa. Casa ZED offre una soluzione abitativa innovativa che combina sostenibilità e benessere abitativo.</p>
                <p>Un ambiente progettato per:</p>
                <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem;">
                    <li>Impattare positivamente sulla salute fisica</li>
                    <li>Ridurre lo stress mentale</li>
                    <li>Aumentare la produttività</li>
                    <li>Garantire il massimo comfort</li>
                </ul>
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
                <p>Il nostro servizio LCA identifica e valuta gli impatti ambientali durante l'intero ciclo produttivo dell'edificio, dalla materia prima al fine vita.</p>
                <p>Con l'analisi LCA è possibile:</p>
                <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem;">
                    <li>Calcolare la carbon footprint dell'edificio</li>
                    <li>Identificare le fasi più impattanti</li>
                    <li>Ottimizzare le scelte progettuali</li>
                    <li>Raggiungere la carbon neutrality</li>
                </ul>
                <a href="<?php echo home_url('/contatti/'); ?>" class="btn btn-outline">Richiedi Analisi LCA</a>
            </div>
            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/services/lca.png" alt="Life Cycle Assessment">
            </div>
        </div>
    </div>
</section>

<!-- Living Future -->
<section class="section section-gray section-lg" id="certificazioni">
    <div class="container">
        <div class="about-section">
            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/services/living-future.png" alt="Living Future Institute">
            </div>
            <div class="about-content">
                <span class="section-label">Living Future Accredited</span>
                <h2>Certificazioni Internazionali</h2>
                <p class="lead">Consulenza per le più prestigiose certificazioni di sostenibilità.</p>
                <p>Come studio accreditato Living Future, offriamo consulenza per ottenere:</p>
                <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem;">
                    <li><strong>Core Green Building Certification</strong></li>
                    <li><strong>Zero Carbon Certification</strong></li>
                    <li><strong>Zero Energy Certification</strong></li>
                    <li><strong>Living Building Challenge Petal Certification</strong></li>
                    <li><strong>Living Certification</strong></li>
                </ul>
                <a href="<?php echo home_url('/contatti/'); ?>" class="btn btn-primary">Richiedi Consulenza</a>
            </div>
        </div>
    </div>
</section>

<!-- Biophilic Design -->
<section class="section section-lg" id="biophilic">
    <div class="container">
        <div class="about-section">
            <div class="about-content">
                <span class="section-label">Design</span>
                <h2>Biophilic Design</h2>
                <p class="lead">Collegare persone e natura negli ambienti costruiti.</p>
                <p>Il Biophilic Design è un approccio progettuale che integra elementi naturali negli spazi costruiti, creando ambienti che offrono benefici:</p>
                <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem;">
                    <li><strong>Fisici:</strong> miglioramento della qualità dell'aria e del comfort</li>
                    <li><strong>Psicologici:</strong> riduzione dello stress e aumento del benessere</li>
                    <li><strong>Emotivi:</strong> connessione con la natura e senso di appartenenza</li>
                </ul>
                <a href="<?php echo home_url('/contatti/'); ?>" class="btn btn-outline">Scopri di Più</a>
            </div>
            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/services/biophilic.png" alt="Biophilic Design">
            </div>
        </div>
    </div>
</section>

<!-- Work Energy + -->
<section class="section section-gray section-lg" id="work-energy">
    <div class="container">
        <div class="about-section">
            <div class="about-image">
                <img src="<?php echo get_template_directory_uri(); ?>/images/services/work-energy.jpg" alt="Work Energy Plus">
            </div>
            <div class="about-content">
                <span class="section-label">Uffici</span>
                <h2>Work Energy +</h2>
                <p class="lead">Ambienti lavorativi ottimizzati per produttività e creatività.</p>
                <p>Il progetto Work Energy + è dedicato alla progettazione di spazi di lavoro che massimizzano il benessere e le performance dei collaboratori.</p>
                <p>Il servizio include:</p>
                <ul style="margin-left: 1.5rem; margin-bottom: 1.5rem;">
                    <li>Misurazione della qualità ambientale interna (IEQ)</li>
                    <li>Analisi acustica e illuminotecnica</li>
                    <li>Progettazione ergonomica</li>
                    <li>Ottimizzazione dei flussi di lavoro</li>
                </ul>
                <a href="<?php echo home_url('/contatti/'); ?>" class="btn btn-primary">Richiedi Consulenza</a>
            </div>
        </div>
    </div>
</section>

<!-- Other Services -->
<section class="section section-lg">
    <div class="container">
        <div class="text-center mb-4">
            <span class="section-label">Altri Servizi</span>
            <h2>Progettazione Completa</h2>
        </div>
        <div class="services-grid">
            <div class="service-card">
                <svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6"/>
                </svg>
                <h3>Architettura Residenziale</h3>
                <p>Progettazione di ville, appartamenti e residenze private con focus su comfort, efficienza energetica e design personalizzato.</p>
            </div>
            <div class="service-card">
                <svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v2"/>
                </svg>
                <h3>Architettura Industriale</h3>
                <p>Progettazione di capannoni, stabilimenti produttivi e spazi industriali con attenzione alla funzionalità e sostenibilità.</p>
            </div>
            <div class="service-card">
                <svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M20 9v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9"/><path d="M9 22V12h6v10"/><path d="M2 10.6L12 2l10 8.6"/>
                </svg>
                <h3>Interior Residenziale</h3>
                <p>Progettazione di interni per abitazioni, dalla ristrutturazione completa all'arredo di dettaglio.</p>
            </div>
            <div class="service-card">
                <svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/>
                </svg>
                <h3>Interior Commerciale</h3>
                <p>Progettazione di negozi, ristoranti, bar e spazi commerciali che attraggono clienti e valorizzano il brand.</p>
            </div>
            <div class="service-card">
                <svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/>
                </svg>
                <h3>Interior Uffici</h3>
                <p>Progettazione di spazi di lavoro moderni, flessibili e orientati al benessere dei collaboratori.</p>
            </div>
            <div class="service-card">
                <svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/>
                </svg>
                <h3>Product Design</h3>
                <p>Progettazione di arredi e complementi su misura, dalla concezione alla produzione.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="section section-lg" style="background: var(--color-dark); color: var(--color-white);">
    <div class="container text-center">
        <h2 style="color: var(--color-white);">Hai bisogno di una consulenza?</h2>
        <p class="lead" style="color: rgba(255,255,255,0.8); max-width: 600px; margin: 0 auto var(--spacing-lg);">Contattaci per discutere il tuo progetto. Insieme troveremo la soluzione migliore per le tue esigenze.</p>
        <a href="<?php echo home_url('/contatti/'); ?>" class="btn btn-white">Contattaci</a>
    </div>
</section>

<?php get_footer(); ?>