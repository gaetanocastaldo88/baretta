<?php
/**
 * Baretta Associati Theme Functions
 *
 * @package Baretta
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function baretta_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Image sizes for projects
    add_image_size('project-thumbnail', 600, 450, true);
    add_image_size('project-large', 1200, 800, true);
    add_image_size('team-photo', 400, 400, true);

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Menu Principale', 'baretta'),
        'footer'  => __('Menu Footer', 'baretta'),
    ));
}
add_action('after_setup_theme', 'baretta_theme_setup');

/**
 * Enqueue Scripts and Styles
 */
function baretta_enqueue_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'baretta-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Jost:wght@300;400;500&family=Playfair+Display:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // GLightbox CSS (for gallery lightbox)
    wp_enqueue_style(
        'glightbox',
        'https://cdn.jsdelivr.net/npm/glightbox@3.2.0/dist/css/glightbox.min.css',
        array(),
        '3.2.0'
    );

    // Theme stylesheet
    wp_enqueue_style(
        'baretta-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );

    // GLightbox JS
    wp_enqueue_script(
        'glightbox',
        'https://cdn.jsdelivr.net/npm/glightbox@3.2.0/dist/js/glightbox.min.js',
        array(),
        '3.2.0',
        true
    );

    // Custom scripts
    wp_enqueue_script(
        'baretta-scripts',
        get_template_directory_uri() . '/js/main.js',
        array('jquery', 'glightbox'),
        wp_get_theme()->get('Version'),
        true
    );

    // Localize script for AJAX
    wp_localize_script('baretta-scripts', 'barettaAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce'   => wp_create_nonce('baretta_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'baretta_enqueue_scripts');

/**
 * Register Custom Post Type: Progetti
 */
function baretta_register_post_types() {
    // Progetti (Projects)
    register_post_type('progetto', array(
        'labels' => array(
            'name'               => __('Progetti', 'baretta'),
            'singular_name'      => __('Progetto', 'baretta'),
            'add_new'            => __('Aggiungi Nuovo', 'baretta'),
            'add_new_item'       => __('Aggiungi Nuovo Progetto', 'baretta'),
            'edit_item'          => __('Modifica Progetto', 'baretta'),
            'new_item'           => __('Nuovo Progetto', 'baretta'),
            'view_item'          => __('Visualizza Progetto', 'baretta'),
            'search_items'       => __('Cerca Progetti', 'baretta'),
            'not_found'          => __('Nessun progetto trovato', 'baretta'),
            'not_found_in_trash' => __('Nessun progetto nel cestino', 'baretta'),
            'menu_name'          => __('Progetti', 'baretta'),
        ),
        'public'              => true,
        'has_archive'         => false,
        'rewrite'             => array('slug' => 'progetto'),
        'menu_icon'           => 'dashicons-building',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'        => true,
    ));

    // Team Members
    register_post_type('team', array(
        'labels' => array(
            'name'               => __('Team', 'baretta'),
            'singular_name'      => __('Membro Team', 'baretta'),
            'add_new'            => __('Aggiungi Membro', 'baretta'),
            'add_new_item'       => __('Aggiungi Nuovo Membro', 'baretta'),
            'edit_item'          => __('Modifica Membro', 'baretta'),
            'new_item'           => __('Nuovo Membro', 'baretta'),
            'view_item'          => __('Visualizza Membro', 'baretta'),
            'search_items'       => __('Cerca Membri', 'baretta'),
            'not_found'          => __('Nessun membro trovato', 'baretta'),
            'menu_name'          => __('Team', 'baretta'),
        ),
        'public'              => true,
        'has_archive'         => false,
        'rewrite'             => array('slug' => 'team'),
        'menu_icon'           => 'dashicons-groups',
        'supports'            => array('title', 'editor', 'thumbnail'),
        'show_in_rest'        => true,
    ));

    // Servizi (Services)
    register_post_type('servizio', array(
        'labels' => array(
            'name'               => __('Servizi', 'baretta'),
            'singular_name'      => __('Servizio', 'baretta'),
            'add_new'            => __('Aggiungi Servizio', 'baretta'),
            'add_new_item'       => __('Aggiungi Nuovo Servizio', 'baretta'),
            'edit_item'          => __('Modifica Servizio', 'baretta'),
            'menu_name'          => __('Servizi', 'baretta'),
        ),
        'public'              => true,
        'has_archive'         => false,
        'rewrite'             => array('slug' => 'servizi'),
        'menu_icon'           => 'dashicons-hammer',
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'        => true,
    ));
}
add_action('init', 'baretta_register_post_types');

/**
 * Register Custom Taxonomies
 */
function baretta_register_taxonomies() {
    // Categoria Progetto
    register_taxonomy('categoria_progetto', 'progetto', array(
        'labels' => array(
            'name'          => __('Categorie Progetto', 'baretta'),
            'singular_name' => __('Categoria', 'baretta'),
            'search_items'  => __('Cerca Categorie', 'baretta'),
            'all_items'     => __('Tutte le Categorie', 'baretta'),
            'edit_item'     => __('Modifica Categoria', 'baretta'),
            'add_new_item'  => __('Aggiungi Categoria', 'baretta'),
            'menu_name'     => __('Categorie', 'baretta'),
        ),
        'hierarchical' => true,
        'public'       => true,
        'rewrite'      => array('slug' => 'categoria'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'baretta_register_taxonomies');

/**
 * Register Widget Areas
 */
function baretta_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer 1', 'baretta'),
        'id'            => 'footer-1',
        'description'   => __('Prima colonna footer', 'baretta'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 2', 'baretta'),
        'id'            => 'footer-2',
        'description'   => __('Seconda colonna footer', 'baretta'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'baretta_widgets_init');

/**
 * Custom Meta Boxes for Team
 */
function baretta_team_meta_boxes() {
    add_meta_box(
        'baretta_team_details',
        __('Dettagli Membro', 'baretta'),
        'baretta_team_meta_callback',
        'team',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'baretta_team_meta_boxes');

function baretta_team_meta_callback($post) {
    wp_nonce_field('baretta_team_meta', 'baretta_team_nonce');
    $role = get_post_meta($post->ID, '_baretta_team_role', true);
    ?>
    <p>
        <label for="baretta_team_role"><strong><?php _e('Ruolo:', 'baretta'); ?></strong></label><br>
        <input type="text" id="baretta_team_role" name="baretta_team_role" value="<?php echo esc_attr($role); ?>" style="width: 100%;" placeholder="es. Architetto, Interior Designer, ecc.">
    </p>
    <?php
}

function baretta_save_team_meta($post_id) {
    if (!isset($_POST['baretta_team_nonce']) || !wp_verify_nonce($_POST['baretta_team_nonce'], 'baretta_team_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['baretta_team_role'])) {
        update_post_meta($post_id, '_baretta_team_role', sanitize_text_field($_POST['baretta_team_role']));
    }
}
add_action('save_post_team', 'baretta_save_team_meta');

/**
 * Custom Meta Boxes for Projects
 */
function baretta_project_meta_boxes() {
    add_meta_box(
        'baretta_project_details',
        __('Dettagli Progetto', 'baretta'),
        'baretta_project_meta_callback',
        'progetto',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'baretta_project_meta_boxes');

function baretta_project_meta_callback($post) {
    wp_nonce_field('baretta_project_meta', 'baretta_project_nonce');
    $location = get_post_meta($post->ID, '_baretta_project_location', true);
    $year = get_post_meta($post->ID, '_baretta_project_year', true);
    $size = get_post_meta($post->ID, '_baretta_project_size', true);
    ?>
    <p>
        <label for="baretta_project_location"><strong><?php _e('Località:', 'baretta'); ?></strong></label><br>
        <input type="text" id="baretta_project_location" name="baretta_project_location" value="<?php echo esc_attr($location); ?>" style="width: 100%;" placeholder="es. Milano, Varese, ecc.">
    </p>
    <p>
        <label for="baretta_project_year"><strong><?php _e('Anno:', 'baretta'); ?></strong></label><br>
        <input type="text" id="baretta_project_year" name="baretta_project_year" value="<?php echo esc_attr($year); ?>" style="width: 100%;" placeholder="es. 2023">
    </p>
    <p>
        <label for="baretta_project_size"><strong><?php _e('Dimensioni:', 'baretta'); ?></strong></label><br>
        <input type="text" id="baretta_project_size" name="baretta_project_size" value="<?php echo esc_attr($size); ?>" style="width: 100%;" placeholder="es. 150 mq">
    </p>
    <?php
}

function baretta_save_project_meta($post_id) {
    if (!isset($_POST['baretta_project_nonce']) || !wp_verify_nonce($_POST['baretta_project_nonce'], 'baretta_project_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    $fields = array('location', 'year', 'size');
    foreach ($fields as $field) {
        if (isset($_POST['baretta_project_' . $field])) {
            update_post_meta($post_id, '_baretta_project_' . $field, sanitize_text_field($_POST['baretta_project_' . $field]));
        }
    }
}
add_action('save_post_progetto', 'baretta_save_project_meta');

/**
 * Helper function to get project categories
 */
function baretta_get_project_categories() {
    return get_terms(array(
        'taxonomy'   => 'categoria_progetto',
        'hide_empty' => true,
    ));
}

/**
 * Customize excerpt length
 */
function baretta_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'baretta_excerpt_length');

/**
 * Customize excerpt more
 */
function baretta_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'baretta_excerpt_more');

/**
 * Add default project categories on theme activation
 */
function baretta_setup_default_terms() {
    $default_categories = array(
        'architettura-residenziale' => 'Architettura Residenziale',
        'architettura-industriale'  => 'Architettura Industriale',
        'interior-residenziale'     => 'Interior Residenziale',
        'interior-commerciale'      => 'Interior Commerciale',
        'interior-uffici'           => 'Interior Uffici',
        'design'                    => 'Design',
    );

    foreach ($default_categories as $slug => $name) {
        if (!term_exists($slug, 'categoria_progetto')) {
            wp_insert_term($name, 'categoria_progetto', array('slug' => $slug));
        }
    }
}
add_action('after_switch_theme', 'baretta_setup_default_terms');

/**
 * AJAX handler for filtering projects
 */
function baretta_filter_projects() {
    check_ajax_referer('baretta_nonce', 'nonce');

    $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : '';

    $args = array(
        'post_type'      => 'progetto',
        'posts_per_page' => 12,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'categoria_progetto',
                'field'    => 'slug',
                'terms'    => $category,
            ),
        );
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/content', 'project-card');
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p class="no-projects">' . __('Nessun progetto trovato.', 'baretta') . '</p>';
    endif;

    wp_die();
}
add_action('wp_ajax_filter_projects', 'baretta_filter_projects');
add_action('wp_ajax_nopriv_filter_projects', 'baretta_filter_projects');

/**
 * Flush rewrite rules on theme activation
 */
function baretta_rewrite_flush() {
    baretta_register_post_types();
    baretta_register_taxonomies();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'baretta_rewrite_flush');

/**
 * Create default pages on theme activation
 */
function baretta_create_default_pages() {
    $pages = array(
        'home' => array(
            'title'    => 'Home',
            'template' => '',
        ),
        'studio' => array(
            'title'    => 'Studio',
            'template' => 'page-studio.php',
        ),
        'servizi' => array(
            'title'    => 'Servizi',
            'template' => 'page-servizi.php',
        ),
        'progetti' => array(
            'title'    => 'Progetti',
            'template' => 'page-progetti.php',
        ),
        'contatti' => array(
            'title'    => 'Contatti',
            'template' => 'page-contatti.php',
        ),
        'news' => array(
            'title'    => 'News',
            'template' => 'page-news.php',
        ),
    );

    foreach ($pages as $slug => $page_data) {
        // Check if page exists
        $existing_page = get_page_by_path($slug);

        if (!$existing_page) {
            // Create the page
            $page_id = wp_insert_post(array(
                'post_title'     => $page_data['title'],
                'post_name'      => $slug,
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'post_content'   => '',
                'comment_status' => 'closed',
            ));

            // Set page template if specified
            if ($page_id && !empty($page_data['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page_data['template']);
            }

            // Set as front page if home
            if ($slug === 'home' && $page_id) {
                update_option('page_on_front', $page_id);
                update_option('show_on_front', 'page');
            }
        }
    }
}
add_action('after_switch_theme', 'baretta_create_default_pages');

/**
 * Admin notice for page setup
 */
function baretta_admin_notice_pages() {
    // Check if pages exist
    $required_pages = array('studio', 'servizi', 'progetti', 'contatti', 'news');
    $missing_pages = array();

    foreach ($required_pages as $slug) {
        $page = get_page_by_path($slug);
        if (!$page) {
            $missing_pages[] = ucfirst($slug);
        }
    }

    if (!empty($missing_pages)) {
        ?>
        <div class="notice notice-warning is-dismissible">
            <p><strong>Baretta Theme:</strong> <?php _e('Le seguenti pagine non esistono ancora:', 'baretta'); ?> <?php echo implode(', ', $missing_pages); ?></p>
            <p><?php _e('Vai su Pagine → Aggiungi nuova per crearle, oppure riattiva il tema per crearle automaticamente.', 'baretta'); ?></p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'baretta_admin_notice_pages');

/**
 * Force template for pages based on slug (fallback)
 */
function baretta_force_page_template($template) {
    global $post;

    if (!$post || !is_page()) {
        return $template;
    }

    $slug = $post->post_name;
    $custom_templates = array(
        'studio'   => 'page-studio.php',
        'servizi'  => 'page-servizi.php',
        'progetti' => 'page-progetti.php',
        'contatti' => 'page-contatti.php',
        'news'     => 'page-news.php',
    );

    if (isset($custom_templates[$slug])) {
        $new_template = locate_template($custom_templates[$slug]);
        if ($new_template) {
            return $new_template;
        }
    }

    return $template;
}
add_filter('template_include', 'baretta_force_page_template', 99);

/**
 * Create primary menu on theme activation
 */
function baretta_create_default_menu() {
    $menu_name = 'Menu Principale';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);

        // Get page IDs
        $pages = array(
            'home'     => get_page_by_path('home'),
            'studio'   => get_page_by_path('studio'),
            'servizi'  => get_page_by_path('servizi'),
            'progetti' => get_page_by_path('progetti'),
            'news'     => get_page_by_path('news'),
            'contatti' => get_page_by_path('contatti'),
        );

        $menu_order = 1;
        foreach ($pages as $slug => $page) {
            if ($page) {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title'     => $page->post_title,
                    'menu-item-object-id' => $page->ID,
                    'menu-item-object'    => 'page',
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                    'menu-item-position'  => $menu_order,
                ));
                $menu_order++;
            }
        }

        // Assign menu to primary location
        $locations = get_theme_mod('nav_menu_locations');
        $locations['primary'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}
add_action('after_switch_theme', 'baretta_create_default_menu', 20);

/**
 * Add News to existing menu if missing
 */
function baretta_add_news_to_menu() {
    $menu_name = 'Menu Principale';
    $menu = wp_get_nav_menu_object($menu_name);

    if (!$menu) {
        return;
    }

    // Check if News is already in menu
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    $news_page = get_page_by_path('news');

    if (!$news_page) {
        return;
    }

    $news_in_menu = false;
    foreach ($menu_items as $item) {
        if ($item->object_id == $news_page->ID) {
            $news_in_menu = true;
            break;
        }
    }

    // Add News if not in menu
    if (!$news_in_menu) {
        // Find Contatti position to insert before it
        $contatti_position = count($menu_items) + 1;
        foreach ($menu_items as $item) {
            if (strtolower($item->title) === 'contatti') {
                $contatti_position = $item->menu_order;
                // Move Contatti down
                wp_update_nav_menu_item($menu->term_id, $item->ID, array(
                    'menu-item-title'     => $item->title,
                    'menu-item-object-id' => $item->object_id,
                    'menu-item-object'    => $item->object,
                    'menu-item-type'      => $item->type,
                    'menu-item-status'    => 'publish',
                    'menu-item-position'  => $contatti_position + 1,
                ));
                break;
            }
        }

        // Add News
        wp_update_nav_menu_item($menu->term_id, 0, array(
            'menu-item-title'     => 'News',
            'menu-item-object-id' => $news_page->ID,
            'menu-item-object'    => 'page',
            'menu-item-type'      => 'post_type',
            'menu-item-status'    => 'publish',
            'menu-item-position'  => $contatti_position,
        ));
    }
}
add_action('init', 'baretta_add_news_to_menu');

/**
 * Disable comments on posts (news are simple articles without comments)
 */
function baretta_disable_comments_on_posts() {
    // Disable comments on all posts
    add_filter('comments_open', '__return_false', 20, 2);
    add_filter('pings_open', '__return_false', 20, 2);

    // Hide existing comments
    add_filter('comments_array', '__return_empty_array', 10, 2);
}
add_action('init', 'baretta_disable_comments_on_posts');

/**
 * Remove comments from admin menu
 */
function baretta_remove_comments_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'baretta_remove_comments_menu');

/**
 * Remove comments from admin bar
 */
function baretta_remove_comments_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action('wp_before_admin_bar_render', 'baretta_remove_comments_admin_bar');

/**
 * Disable comments widget
 */
function baretta_disable_comments_widget() {
    unregister_widget('WP_Widget_Recent_Comments');
}
add_action('widgets_init', 'baretta_disable_comments_widget');

/**
 * Remove comments metabox from post editor
 */
function baretta_remove_comments_metabox() {
    remove_meta_box('commentsdiv', 'post', 'normal');
    remove_meta_box('commentstatusdiv', 'post', 'normal');
}
add_action('admin_init', 'baretta_remove_comments_metabox');

/**
 * Create default sample projects on theme activation
 */
function baretta_create_sample_projects() {
    // Check if we already have projects
    $existing_projects = get_posts(array(
        'post_type'      => 'progetto',
        'posts_per_page' => 1,
        'post_status'    => 'any',
    ));

    // Only create sample projects if none exist
    if (!empty($existing_projects)) {
        return;
    }

    // Make sure taxonomies are registered
    baretta_register_taxonomies();

    // Sample projects data
    $sample_projects = array(
        array(
            'title'    => 'Villa Barasso',
            'category' => 'architettura-residenziale',
            'location' => 'Barasso, Varese',
            'year'     => '2023',
            'size'     => '280 mq',
            'excerpt'  => 'Villa unifamiliare immersa nel verde con vista sul lago. Design contemporaneo che dialoga con il paesaggio circostante.',
        ),
        array(
            'title'    => 'Residenza Luvinate',
            'category' => 'architettura-residenziale',
            'location' => 'Luvinate, Varese',
            'year'     => '2022',
            'size'     => '350 mq',
            'excerpt'  => 'Complesso residenziale di lusso con ampi spazi verdi e finiture di pregio. Efficienza energetica classe A.',
        ),
        array(
            'title'    => 'Appartamento Petrarca',
            'category' => 'interior-residenziale',
            'location' => 'Milano',
            'year'     => '2023',
            'size'     => '120 mq',
            'excerpt'  => 'Ristrutturazione completa di un appartamento nel cuore di Milano. Stile contemporaneo con elementi classici.',
        ),
        array(
            'title'    => 'Ristorante Il Riccio',
            'category' => 'interior-commerciale',
            'location' => 'Varese',
            'year'     => '2022',
            'size'     => '200 mq',
            'excerpt'  => 'Interior design per ristorante di pesce. Atmosfera marina elegante con materiali naturali.',
        ),
        array(
            'title'    => 'Studio LCA',
            'category' => 'interior-uffici',
            'location' => 'Milano',
            'year'     => '2023',
            'size'     => '450 mq',
            'excerpt'  => 'Progettazione di spazi ufficio open space con aree meeting e zone relax. Design funzionale e moderno.',
        ),
        array(
            'title'    => 'Capannone ORA C\'È',
            'category' => 'architettura-industriale',
            'location' => 'Como',
            'year'     => '2021',
            'size'     => '2500 mq',
            'excerpt'  => 'Riqualificazione di un capannone industriale in spazio polifunzionale. Architettura sostenibile e innovativa.',
        ),
    );

    foreach ($sample_projects as $index => $project) {
        // Create the project post
        $post_id = wp_insert_post(array(
            'post_title'   => $project['title'],
            'post_type'    => 'progetto',
            'post_status'  => 'publish',
            'post_excerpt' => $project['excerpt'],
            'post_content' => '<p>' . $project['excerpt'] . '</p>
<p>Questo è un progetto di esempio creato automaticamente dal tema. Puoi modificarlo o eliminarlo dall\'admin di WordPress.</p>
<h3>Caratteristiche del progetto</h3>
<ul>
<li>Design contemporaneo</li>
<li>Materiali di qualità</li>
<li>Attenzione al dettaglio</li>
<li>Soluzioni sostenibili</li>
</ul>',
        ));

        if ($post_id && !is_wp_error($post_id)) {
            // Assign category
            $term = get_term_by('slug', $project['category'], 'categoria_progetto');
            if ($term) {
                wp_set_object_terms($post_id, $term->term_id, 'categoria_progetto');
            }

            // Add meta data
            update_post_meta($post_id, '_baretta_project_location', $project['location']);
            update_post_meta($post_id, '_baretta_project_year', $project['year']);
            update_post_meta($post_id, '_baretta_project_size', $project['size']);
        }
    }
}
add_action('after_switch_theme', 'baretta_create_sample_projects', 30);

/**
 * Admin button to create sample projects manually
 */
function baretta_add_sample_projects_button() {
    // Check if we have projects
    $existing_projects = get_posts(array(
        'post_type'      => 'progetto',
        'posts_per_page' => 1,
        'post_status'    => 'any',
    ));

    if (empty($existing_projects)) {
        ?>
        <div class="notice notice-info is-dismissible">
            <p>
                <strong>Baretta Theme:</strong>
                <?php _e('Non ci sono progetti. Vuoi creare dei progetti di esempio?', 'baretta'); ?>
                <a href="<?php echo admin_url('admin.php?action=baretta_create_samples'); ?>" class="button button-primary" style="margin-left: 10px;">
                    <?php _e('Crea Progetti di Esempio', 'baretta'); ?>
                </a>
            </p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'baretta_add_sample_projects_button');

/**
 * Handle manual sample projects creation
 */
function baretta_handle_create_samples() {
    if (!current_user_can('manage_options')) {
        wp_die(__('Non hai i permessi per eseguire questa azione.', 'baretta'));
    }

    // First ensure terms exist
    baretta_setup_default_terms();

    // Then create sample projects
    baretta_create_sample_projects();

    // Redirect back to projects list
    wp_redirect(admin_url('edit.php?post_type=progetto&samples_created=1'));
    exit;
}
add_action('admin_action_baretta_create_samples', 'baretta_handle_create_samples');

/**
 * Show success message after creating samples
 */
function baretta_samples_created_notice() {
    if (isset($_GET['samples_created']) && $_GET['samples_created'] == '1') {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><strong><?php _e('Progetti di esempio creati con successo!', 'baretta'); ?></strong> <?php _e('Puoi modificarli o aggiungere immagini in evidenza.', 'baretta'); ?></p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'baretta_samples_created_notice');

/**
 * Import image from theme folder to media library
 */
function baretta_import_image_to_media($image_path, $post_id = 0) {
    // Check if file exists
    if (!file_exists($image_path)) {
        return false;
    }

    // Required for wp_handle_sideload
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    require_once(ABSPATH . 'wp-admin/includes/media.php');

    // Get file info
    $filename = basename($image_path);
    $upload_dir = wp_upload_dir();

    // Check if image already exists in media library
    $existing = get_posts(array(
        'post_type'      => 'attachment',
        'posts_per_page' => 1,
        'meta_query'     => array(
            array(
                'key'     => '_baretta_original_filename',
                'value'   => $filename,
                'compare' => '=',
            ),
        ),
    ));

    if (!empty($existing)) {
        return $existing[0]->ID;
    }

    // Copy file to uploads
    $new_file_path = $upload_dir['path'] . '/' . $filename;

    // If file already exists in uploads, generate unique name
    if (file_exists($new_file_path)) {
        $file_info = pathinfo($filename);
        $filename = $file_info['filename'] . '-' . time() . '.' . $file_info['extension'];
        $new_file_path = $upload_dir['path'] . '/' . $filename;
    }

    // Copy the file
    if (!copy($image_path, $new_file_path)) {
        return false;
    }

    // Get file type
    $filetype = wp_check_filetype($filename, null);

    // Prepare attachment data
    $attachment = array(
        'guid'           => $upload_dir['url'] . '/' . $filename,
        'post_mime_type' => $filetype['type'],
        'post_title'     => preg_replace('/\.[^.]+$/', '', $filename),
        'post_content'   => '',
        'post_status'    => 'inherit',
    );

    // Insert the attachment
    $attach_id = wp_insert_attachment($attachment, $new_file_path, $post_id);

    if (is_wp_error($attach_id)) {
        return false;
    }

    // Generate attachment metadata
    $attach_data = wp_generate_attachment_metadata($attach_id, $new_file_path);
    wp_update_attachment_metadata($attach_id, $attach_data);

    // Store original filename to prevent duplicates
    update_post_meta($attach_id, '_baretta_original_filename', basename($image_path));

    return $attach_id;
}

/**
 * Assign images to existing projects
 */
function baretta_assign_images_to_projects() {
    // Mapping of project titles to image files
    $project_images = array(
        'Villa Barasso'       => 'barasso.jpg',
        'Residenza Luvinate'  => 'luvinate.jpg',
        'Appartamento Petrarca' => 'petrarca.jpg',
        'Ristorante Il Riccio' => 'riccio.jpg',
        'Studio LCA'          => 'studio-lca.jpg',
        'Capannone ORA C\'È'  => 'ora-ce.jpg',
    );

    $theme_images_path = get_template_directory() . '/images/projects/';
    $updated = 0;

    foreach ($project_images as $title => $image_file) {
        // Find the project
        $projects = get_posts(array(
            'post_type'      => 'progetto',
            'posts_per_page' => 1,
            'title'          => $title,
            'post_status'    => 'publish',
        ));

        if (empty($projects)) {
            continue;
        }

        $project = $projects[0];

        // Check if already has featured image
        if (has_post_thumbnail($project->ID)) {
            continue;
        }

        // Check if image file exists
        $image_path = $theme_images_path . $image_file;
        if (!file_exists($image_path)) {
            continue;
        }

        // Import image to media library
        $attach_id = baretta_import_image_to_media($image_path, $project->ID);

        if ($attach_id) {
            // Set as featured image
            set_post_thumbnail($project->ID, $attach_id);
            $updated++;
        }
    }

    return $updated;
}

/**
 * Admin button to assign images to projects
 */
function baretta_add_assign_images_button() {
    // Check if we have projects without featured images
    $projects = get_posts(array(
        'post_type'      => 'progetto',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'meta_query'     => array(
            array(
                'key'     => '_thumbnail_id',
                'compare' => 'NOT EXISTS',
            ),
        ),
    ));

    if (!empty($projects)) {
        ?>
        <div class="notice notice-warning is-dismissible">
            <p>
                <strong>Baretta Theme:</strong>
                <?php printf(__('Ci sono %d progetti senza immagine in evidenza.', 'baretta'), count($projects)); ?>
                <a href="<?php echo admin_url('admin.php?action=baretta_assign_images'); ?>" class="button button-secondary" style="margin-left: 10px;">
                    <?php _e('Assegna Immagini Automaticamente', 'baretta'); ?>
                </a>
            </p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'baretta_add_assign_images_button');

/**
 * Handle image assignment action
 */
function baretta_handle_assign_images() {
    if (!current_user_can('manage_options')) {
        wp_die(__('Non hai i permessi per eseguire questa azione.', 'baretta'));
    }

    $updated = baretta_assign_images_to_projects();

    wp_redirect(admin_url('edit.php?post_type=progetto&images_assigned=' . $updated));
    exit;
}
add_action('admin_action_baretta_assign_images', 'baretta_handle_assign_images');

/**
 * Show success message after assigning images
 */
function baretta_images_assigned_notice() {
    if (isset($_GET['images_assigned'])) {
        $count = intval($_GET['images_assigned']);
        ?>
        <div class="notice notice-success is-dismissible">
            <p>
                <strong><?php _e('Immagini assegnate!', 'baretta'); ?></strong>
                <?php printf(__('%d progetti aggiornati con le relative immagini.', 'baretta'), $count); ?>
            </p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'baretta_images_assigned_notice');

/**
 * Force WordPress gallery images to link to full size (for lightbox)
 */
function baretta_gallery_link_to_file($block_content, $block) {
    if ($block['blockName'] === 'core/gallery') {
        // The gallery block should link to media file for lightbox to work
        // This is handled in the editor, but we ensure it here as fallback
    }
    return $block_content;
}
add_filter('render_block', 'baretta_gallery_link_to_file', 10, 2);

/**
 * Add custom styles for GLightbox
 */
function baretta_lightbox_styles() {
    ?>
    <style>
        /* GLightbox customizations */
        .goverlay {
            background: rgba(0, 0, 0, 0.95) !important;
        }

        .gslide-description {
            background: transparent !important;
        }

        .gdesc-inner {
            padding: 22px 20px !important;
        }

        .gslide-title {
            font-family: 'Playfair Display', serif !important;
            font-size: 1.2em !important;
            color: #fff !important;
        }

        .gnext, .gprev {
            background: rgba(255,255,255,0.1) !important;
            border-radius: 50% !important;
            width: 50px !important;
            height: 50px !important;
        }

        .gnext:hover, .gprev:hover {
            background: rgba(255,255,255,0.2) !important;
        }

        .gclose {
            background: transparent !important;
        }

        .gclose svg {
            fill: #fff !important;
        }

        /* Cursor pointer on gallery images */
        .wp-block-gallery .wp-block-image a,
        .wp-block-gallery figure a,
        .gallery .gallery-item a {
            cursor: zoom-in;
        }

        /* Hover effect on gallery images */
        .wp-block-gallery .wp-block-image,
        .wp-block-gallery figure {
            overflow: hidden;
        }

        .wp-block-gallery .wp-block-image img,
        .wp-block-gallery figure img {
            transition: transform 0.3s ease;
        }

        .wp-block-gallery .wp-block-image:hover img,
        .wp-block-gallery figure:hover img {
            transform: scale(1.05);
        }
    </style>
    <?php
}
add_action('wp_head', 'baretta_lightbox_styles');

/**
 * Create sample team members
 */
function baretta_create_sample_team() {
    // Check if we already have team members
    $existing_team = get_posts(array(
        'post_type'      => 'team',
        'posts_per_page' => 1,
        'post_status'    => 'any',
    ));

    if (!empty($existing_team)) {
        return 0;
    }

    $sample_team = array(
        array(
            'name'  => 'Stefano Baretta',
            'role'  => 'Founder & Director',
            'image' => 'stefano.jpg',
            'bio'   => 'Architetto e fondatore dello studio, Stefano guida il team con passione per l\'architettura sostenibile e il design biofilico.',
        ),
        array(
            'name'  => 'Venelina Gancheva',
            'role'  => 'Founder & Interior Designer',
            'image' => 'venelina.jpg',
            'bio'   => 'Co-fondatrice e responsabile dell\'interior design, Venelina cura ogni dettaglio degli spazi interni con un approccio olistico.',
        ),
        array(
            'name'  => 'Matteo Bollini',
            'role'  => 'Architetto',
            'image' => 'matteo.jpg',
            'bio'   => 'Architetto specializzato in progettazione sostenibile e certificazioni ambientali.',
        ),
        array(
            'name'  => 'Antonio Papa',
            'role'  => 'Architetto',
            'image' => 'antonio.jpg',
            'bio'   => 'Architetto con esperienza in progetti residenziali e commerciali.',
        ),
        array(
            'name'  => 'Alessia Rampazzo',
            'role'  => 'Architetto',
            'image' => 'alessia.jpg',
            'bio'   => 'Architetto specializzata in architettura bioclimatica e design passivo.',
        ),
        array(
            'name'  => 'Gloria Sacchelli',
            'role'  => 'Architetto',
            'image' => 'gloria.jpg',
            'bio'   => 'Architetto con focus su Life Cycle Assessment e sostenibilità ambientale.',
        ),
        array(
            'name'  => 'Pepe',
            'role'  => 'Mascotte',
            'image' => 'pepe.jpg',
            'bio'   => 'La mascotte dello studio, sempre presente per portare allegria e buon umore.',
        ),
    );

    $created = 0;
    $theme_images_path = get_template_directory() . '/images/team/';

    foreach ($sample_team as $index => $member) {
        $post_id = wp_insert_post(array(
            'post_title'   => $member['name'],
            'post_type'    => 'team',
            'post_status'  => 'publish',
            'post_content' => '<p>' . $member['bio'] . '</p>',
            'menu_order'   => $index + 1,
        ));

        if ($post_id && !is_wp_error($post_id)) {
            // Set role meta
            update_post_meta($post_id, '_baretta_team_role', $member['role']);

            // Try to import and set featured image
            $image_path = $theme_images_path . $member['image'];
            if (file_exists($image_path)) {
                $attach_id = baretta_import_image_to_media($image_path, $post_id);
                if ($attach_id) {
                    set_post_thumbnail($post_id, $attach_id);
                }
            }

            $created++;
        }
    }

    return $created;
}

/**
 * Create sample services
 */
function baretta_create_sample_services() {
    // Check if we already have services
    $existing_services = get_posts(array(
        'post_type'      => 'servizio',
        'posts_per_page' => 1,
        'post_status'    => 'any',
    ));

    if (!empty($existing_services)) {
        return 0;
    }

    $sample_services = array(
        array(
            'title'       => 'Casa ZED',
            'icon'        => 'home',
            'excerpt'     => 'La prima abitazione bioenergetica in Italia che migliora la vita rivoluzionando il concetto di Casa. La tranquillità inizia qui.',
            'description' => 'Casa ZED rappresenta il nostro approccio innovativo all\'abitare sostenibile. Un\'abitazione che produce più energia di quella che consuma, garantendo il massimo comfort con il minimo impatto ambientale. Utilizziamo tecnologie all\'avanguardia per creare case che migliorano la qualità della vita dei loro abitanti.',
        ),
        array(
            'title'       => 'Life Cycle Assessment',
            'icon'        => 'clock',
            'excerpt'     => 'Analisi del ciclo di vita dell\'edificio per identificare gli impatti ambientali e raggiungere la carbon neutrality.',
            'description' => 'Il Life Cycle Assessment (LCA) è uno strumento fondamentale per valutare l\'impatto ambientale di un edificio durante tutto il suo ciclo di vita. Dalla produzione dei materiali alla demolizione, analizziamo ogni fase per ottimizzare le scelte progettuali e raggiungere obiettivi di sostenibilità ambiziosi.',
        ),
        array(
            'title'       => 'Certificazioni Living Future',
            'icon'        => 'layers',
            'excerpt'     => 'Consulenza per certificazioni internazionali: Zero Carbon, Zero Energy, Living Building Challenge.',
            'description' => 'Come membri del Living Future Institute, offriamo consulenza specializzata per ottenere le certificazioni ambientali più prestigiose al mondo. Zero Carbon, Zero Energy e Living Building Challenge rappresentano il massimo standard di sostenibilità nell\'edilizia.',
        ),
        array(
            'title'       => 'Biophilic Design',
            'icon'        => 'shield',
            'excerpt'     => 'Colleghiamo persone e natura negli ambienti costruiti, creando spazi che offrono benefici fisici e psicologici.',
            'description' => 'Il Biophilic Design integra elementi naturali nell\'architettura per creare ambienti che promuovono il benessere psicofisico. Luce naturale, vegetazione, materiali organici e connessione visiva con la natura sono gli ingredienti dei nostri progetti.',
        ),
        array(
            'title'       => 'Work Energy +',
            'icon'        => 'monitor',
            'excerpt'     => 'Progettazione di ambienti lavorativi ottimizzati per produttività e creatività con misurazione della qualità ambientale.',
            'description' => 'Work Energy + è il nostro servizio dedicato alla progettazione di spazi lavorativi che favoriscono produttività, creatività e benessere. Attraverso il monitoraggio della qualità dell\'aria, dell\'illuminazione e dell\'acustica, creiamo uffici che potenziano le performance.',
        ),
        array(
            'title'       => 'Interior Design',
            'icon'        => 'box',
            'excerpt'     => 'Progettazione di interni residenziali, commerciali e uffici con focus su armonia e funzionalità degli spazi.',
            'description' => 'Il nostro servizio di Interior Design trasforma gli spazi interni in ambienti armonici e funzionali. Dalla scelta dei materiali all\'illuminazione, curiamo ogni dettaglio per creare interni che riflettono la personalità dei committenti.',
        ),
    );

    $created = 0;

    foreach ($sample_services as $index => $service) {
        $post_id = wp_insert_post(array(
            'post_title'   => $service['title'],
            'post_type'    => 'servizio',
            'post_status'  => 'publish',
            'post_excerpt' => $service['excerpt'],
            'post_content' => '<p>' . $service['description'] . '</p>',
            'menu_order'   => $index + 1,
        ));

        if ($post_id && !is_wp_error($post_id)) {
            // Store icon type in meta
            update_post_meta($post_id, '_baretta_service_icon', $service['icon']);
            $created++;
        }
    }

    return $created;
}

/**
 * Admin notice and button to create sample team
 */
function baretta_add_sample_team_button() {
    $existing_team = get_posts(array(
        'post_type'      => 'team',
        'posts_per_page' => 1,
        'post_status'    => 'any',
    ));

    if (empty($existing_team)) {
        ?>
        <div class="notice notice-info is-dismissible">
            <p>
                <strong>Baretta Theme:</strong>
                <?php _e('Non ci sono membri del team. Vuoi creare dei membri di esempio?', 'baretta'); ?>
                <a href="<?php echo admin_url('admin.php?action=baretta_create_team'); ?>" class="button button-primary" style="margin-left: 10px;">
                    <?php _e('Crea Team di Esempio', 'baretta'); ?>
                </a>
            </p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'baretta_add_sample_team_button');

/**
 * Admin notice and button to create sample services
 */
function baretta_add_sample_services_button() {
    $existing_services = get_posts(array(
        'post_type'      => 'servizio',
        'posts_per_page' => 1,
        'post_status'    => 'any',
    ));

    if (empty($existing_services)) {
        ?>
        <div class="notice notice-info is-dismissible">
            <p>
                <strong>Baretta Theme:</strong>
                <?php _e('Non ci sono servizi. Vuoi creare dei servizi di esempio?', 'baretta'); ?>
                <a href="<?php echo admin_url('admin.php?action=baretta_create_services'); ?>" class="button button-primary" style="margin-left: 10px;">
                    <?php _e('Crea Servizi di Esempio', 'baretta'); ?>
                </a>
            </p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'baretta_add_sample_services_button');

/**
 * Handle team creation action
 */
function baretta_handle_create_team() {
    if (!current_user_can('manage_options')) {
        wp_die(__('Non hai i permessi per eseguire questa azione.', 'baretta'));
    }

    $created = baretta_create_sample_team();

    wp_redirect(admin_url('edit.php?post_type=team&team_created=' . $created));
    exit;
}
add_action('admin_action_baretta_create_team', 'baretta_handle_create_team');

/**
 * Handle services creation action
 */
function baretta_handle_create_services() {
    if (!current_user_can('manage_options')) {
        wp_die(__('Non hai i permessi per eseguire questa azione.', 'baretta'));
    }

    $created = baretta_create_sample_services();

    wp_redirect(admin_url('edit.php?post_type=servizio&services_created=' . $created));
    exit;
}
add_action('admin_action_baretta_create_services', 'baretta_handle_create_services');

/**
 * Show success messages after creating team/services
 */
function baretta_team_services_created_notice() {
    if (isset($_GET['team_created'])) {
        $count = intval($_GET['team_created']);
        ?>
        <div class="notice notice-success is-dismissible">
            <p><strong><?php _e('Team creato con successo!', 'baretta'); ?></strong> <?php printf(__('%d membri aggiunti.', 'baretta'), $count); ?></p>
        </div>
        <?php
    }

    if (isset($_GET['services_created'])) {
        $count = intval($_GET['services_created']);
        ?>
        <div class="notice notice-success is-dismissible">
            <p><strong><?php _e('Servizi creati con successo!', 'baretta'); ?></strong> <?php printf(__('%d servizi aggiunti.', 'baretta'), $count); ?></p>
        </div>
        <?php
    }
}
add_action('admin_notices', 'baretta_team_services_created_notice');

/**
 * Add meta box for service icon
 */
function baretta_service_meta_boxes() {
    add_meta_box(
        'baretta_service_icon',
        __('Icona Servizio', 'baretta'),
        'baretta_service_icon_callback',
        'servizio',
        'side',
        'default'
    );
}
add_action('add_meta_boxes', 'baretta_service_meta_boxes');

function baretta_service_icon_callback($post) {
    wp_nonce_field('baretta_service_icon', 'baretta_service_icon_nonce');
    $icon = get_post_meta($post->ID, '_baretta_service_icon', true);

    $icons = array(
        'home'       => 'Casa (Home)',
        'building'   => 'Edificio (Building)',
        'clock'      => 'Orologio (Clock)',
        'layers'     => 'Livelli (Layers)',
        'shield'     => 'Scudo (Shield)',
        'monitor'    => 'Monitor',
        'box'        => 'Cubo (Box)',
        'leaf'       => 'Foglia (Leaf)',
        'sun'        => 'Sole (Sun)',
        'users'      => 'Utenti (Users)',
        'tool'       => 'Strumento (Tool)',
        'ruler'      => 'Righello (Ruler)',
        'compass'    => 'Compasso (Compass)',
        'grid'       => 'Griglia (Grid)',
        'maximize'   => 'Espandi (Maximize)',
        'zap'        => 'Fulmine (Zap)',
        'droplet'    => 'Goccia (Droplet)',
        'thermometer'=> 'Termometro',
        'wind'       => 'Vento (Wind)',
        'tree'       => 'Albero (Tree)',
        'mountains'  => 'Montagne',
        'award'      => 'Premio (Award)',
        'target'     => 'Target',
        'check'      => 'Spunta (Check)',
        'star'       => 'Stella (Star)',
        'heart'      => 'Cuore (Heart)',
        'eye'        => 'Occhio (Eye)',
        'lightbulb'  => 'Lampadina',
        'briefcase'  => 'Valigetta',
        'clipboard'  => 'Appunti (Clipboard)',
        'file'       => 'Documento (File)',
        'folder'     => 'Cartella (Folder)',
        'settings'   => 'Ingranaggio (Settings)',
        'sliders'    => 'Cursori (Sliders)',
        'refresh'    => 'Aggiorna (Refresh)',
        'trending'   => 'Trend (Trending Up)',
        'bar-chart'  => 'Grafico a Barre',
        'pie-chart'  => 'Grafico a Torta',
    );
    ?>
    <p>
        <label for="baretta_service_icon"><strong><?php _e('Seleziona icona:', 'baretta'); ?></strong></label><br>
        <select id="baretta_service_icon" name="baretta_service_icon" style="width: 100%;">
            <?php foreach ($icons as $value => $label) : ?>
                <option value="<?php echo esc_attr($value); ?>" <?php selected($icon, $value); ?>><?php echo esc_html($label); ?></option>
            <?php endforeach; ?>
        </select>
    </p>
    <?php
}

function baretta_save_service_icon($post_id) {
    if (!isset($_POST['baretta_service_icon_nonce']) || !wp_verify_nonce($_POST['baretta_service_icon_nonce'], 'baretta_service_icon')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    if (isset($_POST['baretta_service_icon'])) {
        update_post_meta($post_id, '_baretta_service_icon', sanitize_text_field($_POST['baretta_service_icon']));
    }
}
add_action('save_post_servizio', 'baretta_save_service_icon');

/**
 * Helper function to get service icon SVG
 */
function baretta_get_service_icon($icon_type) {
    $icons = array(
        'home' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M3 21h18M5 21V7l7-4 7 4v14M9 21v-6h6v6"/>
        </svg>',
        'building' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <rect x="4" y="2" width="16" height="20" rx="2"/><path d="M9 22v-4h6v4M8 6h.01M16 6h.01M12 6h.01M8 10h.01M16 10h.01M12 10h.01M8 14h.01M16 14h.01M12 14h.01"/>
        </svg>',
        'clock' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/>
        </svg>',
        'layers' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
        </svg>',
        'shield' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
        </svg>',
        'monitor' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/>
        </svg>',
        'box' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
        </svg>',
        'leaf' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/>
            <path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/>
        </svg>',
        'sun' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/>
        </svg>',
        'users' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
        </svg>',
        'tool' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
        </svg>',
        'ruler' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M21.21 15.89A1 1 0 0 0 22 15V6a1 1 0 0 0-.29-.71l-4-4A1 1 0 0 0 17 1H8a1 1 0 0 0-.71.29l-4 4A1 1 0 0 0 3 6v9a1 1 0 0 0 .79.98l7 1.5a1 1 0 0 0 .42 0l7-1.5a1 1 0 0 0 0-.09zM5 6.41l3-3 3 3V16l-6-1.29V6.41z"/>
        </svg>',
        'compass' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/>
        </svg>',
        'grid' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/>
        </svg>',
        'maximize' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"/>
        </svg>',
        'zap' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/>
        </svg>',
        'droplet' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"/>
        </svg>',
        'thermometer' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M14 14.76V3.5a2.5 2.5 0 0 0-5 0v11.26a4.5 4.5 0 1 0 5 0z"/>
        </svg>',
        'wind' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M9.59 4.59A2 2 0 1 1 11 8H2m10.59 11.41A2 2 0 1 0 14 16H2m15.73-8.27A2.5 2.5 0 1 1 19.5 12H2"/>
        </svg>',
        'tree' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M12 22v-7M17 8l-5-6-5 6h2v4h6V8h2zM8 12l-3 4h2v2h6v-2h2l-3-4"/>
        </svg>',
        'mountains' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="m8 3 4 8 5-5 5 15H2L8 3z"/>
        </svg>',
        'award' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <circle cx="12" cy="8" r="7"/><path d="M8.21 13.89 7 23l5-3 5 3-1.21-9.12"/>
        </svg>',
        'target' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/>
        </svg>',
        'check' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="M22 4 12 14.01l-3-3"/>
        </svg>',
        'star' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>
        </svg>',
        'heart' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
        </svg>',
        'eye' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
        </svg>',
        'lightbulb' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M9 18h6M10 22h4M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0 0 18 8 6 6 0 0 0 6 8c0 1 .23 2.23 1.5 3.5A4.61 4.61 0 0 1 8.91 14"/>
        </svg>',
        'briefcase' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
        </svg>',
        'clipboard' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1"/>
        </svg>',
        'file' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M16 13H8M16 17H8M10 9H8"/>
        </svg>',
        'folder' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"/>
        </svg>',
        'settings' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"/>
        </svg>',
        'sliders' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/>
        </svg>',
        'refresh' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M23 4v6h-6M1 20v-6h6"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/>
        </svg>',
        'trending' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="m23 6-9.5 9.5-5-5L1 18"/><path d="M17 6h6v6"/>
        </svg>',
        'bar-chart' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <line x1="12" y1="20" x2="12" y2="10"/><line x1="18" y1="20" x2="18" y2="4"/><line x1="6" y1="20" x2="6" y2="16"/>
        </svg>',
        'pie-chart' => '<svg class="service-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M21.21 15.89A10 10 0 1 1 8 2.83"/><path d="M22 12A10 10 0 0 0 12 2v10z"/>
        </svg>',
    );

    return isset($icons[$icon_type]) ? $icons[$icon_type] : $icons['box'];
}