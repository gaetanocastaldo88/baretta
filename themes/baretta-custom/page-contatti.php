<?php
/**
 * Template Name: Contatti
 * Description: Template for the Contact page
 *
 * @package Baretta
 */

get_header(); ?>

<!-- Hero Section -->
<section class="hero hero-page">
    <div class="hero-background" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/contact-us.jpg');"></div>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <span class="hero-tagline">Parliamo</span>
        <h1 class="hero-title">Contattaci</h1>
        <p class="hero-subtitle">Siamo pronti ad ascoltare le tue idee e trasformarle in realtà</p>
    </div>
</section>

<!-- Contact Section -->
<section class="section section-lg">
    <div class="container">
        <div class="contact-section">
            <div class="contact-info">
                <h2>Baretta Associati s.r.l.</h2>
                <p class="lead">Studio di Architettura</p>

                <h3>Sede</h3>
                <p>Via Torquato Tasso, 18<br>21100 Varese (VA)<br>Italia</p>

                <h3>Telefono</h3>
                <p><a href="tel:+390332238251">+39 0332 238251</a></p>

                <h3>Email</h3>
                <p>
                    <strong>Info generali:</strong><br>
                    <a href="mailto:info@barettaassociati.it">info@barettaassociati.it</a>
                </p>

                <h3>Social</h3>
                <div class="social-links" style="margin-top: 0.5rem;">
                    <a href="https://instagram.com/barettaassociati" target="_blank" rel="noopener noreferrer" style="color: var(--color-dark);">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="https://linkedin.com/company/barettaassociati" target="_blank" rel="noopener noreferrer" style="color: var(--color-dark);">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                </div>

                <h3>P.IVA</h3>
                <p>03844450126</p>
            </div>

            <div class="contact-form-wrapper">
                <h3 style="margin-bottom: var(--spacing-md);">Inviaci un messaggio</h3>
                <?php echo do_shortcode('[contact-form-7 id="69dd70e" title="Modulo di contatto 1"]'); ?>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="section" style="padding: 0;">
    <div style="width: 100%; height: 400px; background: var(--color-gray-light); display: flex; align-items: center; justify-content: center;">
        <!-- Placeholder for Google Maps -->
        <div style="text-align: center; color: var(--color-text-light);">
            <p style="margin-bottom: 1rem;">📍 Via Torquato Tasso, 18 - 21100 Varese</p>
            <a href="https://maps.google.com/?q=Via+Torquato+Tasso+18+Varese" target="_blank" rel="noopener noreferrer" class="btn btn-outline">Apri in Google Maps</a>
        </div>
        <!-- Uncomment below and add your Google Maps API key for real map -->
        <!--
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2784.1234567890!2d8.8234567!3d45.8234567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zVmlhIFRvcnF1YXRvIFRhc3NvIDE4LCBWYXJlc2U!5e0!3m2!1sit!2sit!4v1234567890"
            width="100%"
            height="400"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
        -->
    </div>
</section>

<?php get_footer(); ?>