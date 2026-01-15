<?php
/**
 * Theme Footer - Baretta Associati
 *
 * @package Baretta
 */
?>

    </main><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-brand">
                    <div class="site-logo-text" style="color: #fff; margin-bottom: 1rem;">
                        BARETTA<br><small>ASSOCIATI</small>
                    </div>
                    <p>Le nostre scelte fanno la differenza.<br>I nostri progetti creano impatti positivi.</p>
                </div>

                <div class="footer-links">
                    <h4>Navigazione</h4>
                    <?php if (has_nav_menu('footer')) : ?>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_id'        => 'footer-menu',
                            'container'      => false,
                            'fallback_cb'    => false,
                        ));
                        ?>
                    <?php else : ?>
                        <ul>
                            <li><a href="<?php echo home_url('/'); ?>">Home</a></li>
                            <li><a href="<?php echo home_url('/studio/'); ?>">Studio</a></li>
                            <li><a href="<?php echo home_url('/servizi/'); ?>">Servizi</a></li>
                            <li><a href="<?php echo home_url('/progetti/'); ?>">Progetti</a></li>
                            <li><a href="<?php echo home_url('/contatti/'); ?>">Contatti</a></li>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="footer-contact">
                    <h4>Contatti</h4>
                    <p>Via Torquato Tasso, 18<br>21100 Varese</p>
                    <p><a href="tel:+390332238251">+39 0332 238251</a></p>
                    <p><a href="mailto:info@barettaassociati.it">info@barettaassociati.it</a></p>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Baretta Associati s.r.l. - P.IVA 03844450126</p>
                <div class="social-links">
                    <a href="https://instagram.com/barettaassociati" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="https://linkedin.com/company/barettaassociati" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>