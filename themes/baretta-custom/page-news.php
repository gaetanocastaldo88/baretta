<?php
/**
 * Template Name: News
 * Description: Template for the News archive page
 *
 * @package Baretta
 */

get_header(); ?>

<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <span class="section-label">Blog</span>
        <h1>News</h1>
        <p class="lead">Aggiornamenti dal mondo dell'architettura e dello studio</p>
    </div>
</div>

<!-- News Archive -->
<section class="section section-lg">
    <div class="container">
        <div class="news-grid news-grid-archive">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $news = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 9,
                'paged'          => $paged,
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
                        <p class="news-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
                        <a href="<?php the_permalink(); ?>" class="news-read-more">Leggi di più</a>
                    </div>
                </article>
            <?php
                endwhile;
            ?>
            </div>

            <!-- Pagination -->
            <?php if ($news->max_num_pages > 1) : ?>
            <div class="pagination">
                <?php
                echo paginate_links(array(
                    'total'     => $news->max_num_pages,
                    'current'   => $paged,
                    'prev_text' => '&larr; Precedente',
                    'next_text' => 'Successivo &rarr;',
                    'type'      => 'list',
                ));
                ?>
            </div>
            <?php endif; ?>

            <?php
                wp_reset_postdata();
            else :
            ?>
            <div class="no-posts-message">
                <p>Nessuna news disponibile al momento.</p>
                <a href="<?php echo home_url(); ?>" class="btn btn-primary">Torna alla Home</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
