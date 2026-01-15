<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @package BarettaCustom
 */
?>

<section class="no-results not-found">
    <header class="page-header">
        <h1 class="page-title"><?php _e('Nothing Found', 'baretta-custom'); ?></h1>
    </header>

    <div class="page-content">
        <?php
        if (is_home() && current_user_can('publish_posts')) :
            printf(
                '<p>' . wp_kses(
                    __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'baretta-custom'),
                    array('a' => array('href' => array()))
                ) . '</p>',
                esc_url(admin_url('post-new.php'))
            );
        elseif (is_search()) :
        ?>
            <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'baretta-custom'); ?></p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'baretta-custom'); ?></p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</section>
