<?php
/**
 * The main template file - fallback
 *
 * @package Baretta
 */

get_header(); ?>

<div class="page-header">
    <div class="container">
        <?php if (is_home() && !is_front_page()) : ?>
            <h1><?php single_post_title(); ?></h1>
        <?php elseif (is_archive()) : ?>
            <?php the_archive_title('<h1>', '</h1>'); ?>
            <?php the_archive_description('<p class="lead">', '</p>'); ?>
        <?php elseif (is_search()) : ?>
            <h1><?php printf(__('Risultati per: %s', 'baretta'), '<span>' . get_search_query() . '</span>'); ?></h1>
        <?php else : ?>
            <h1><?php _e('Blog', 'baretta'); ?></h1>
        <?php endif; ?>
    </div>
</div>

<section class="section section-lg">
    <div class="container">
        <?php if (have_posts()) : ?>
            <div class="posts-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem;">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?> style="border: 1px solid var(--color-gray-medium); padding: 0;">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('project-thumbnail', array('style' => 'width: 100%; height: 200px; object-fit: cover;')); ?>
                            </a>
                        <?php endif; ?>
                        <div style="padding: 2rem;">
                            <header class="entry-header">
                                <h2 style="font-size: 1.25rem; margin-bottom: 0.5rem;">
                                    <a href="<?php the_permalink(); ?>" style="color: var(--color-dark);"><?php the_title(); ?></a>
                                </h2>
                                <div class="entry-meta" style="font-size: 0.85rem; color: var(--color-text-light); margin-bottom: 1rem;">
                                    <span><?php echo get_the_date(); ?></span>
                                </div>
                            </header>
                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline" style="margin-top: 1rem;">Leggi di più</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div style="margin-top: 3rem; text-align: center;">
                <?php
                the_posts_pagination(array(
                    'mid_size'  => 2,
                    'prev_text' => '&larr; Precedente',
                    'next_text' => 'Successivo &rarr;',
                ));
                ?>
            </div>

        <?php else : ?>
            <div class="text-center">
                <h2><?php _e('Nessun contenuto trovato', 'baretta'); ?></h2>
                <p><?php _e('Prova a effettuare una ricerca diversa.', 'baretta'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
