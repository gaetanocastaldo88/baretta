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
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Theme stylesheet
    wp_enqueue_style(
        'baretta-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );

    // Custom scripts
    wp_enqueue_script(
        'baretta-scripts',
        get_template_directory_uri() . '/js/main.js',
        array('jquery'),
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