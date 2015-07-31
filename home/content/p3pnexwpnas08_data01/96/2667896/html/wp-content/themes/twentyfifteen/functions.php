<?php

/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
// require_once('../inc/linkedinoauth.php');

if (!isset($content_width)) {
    $content_width = 660;
}

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.1-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('twentyfifteen_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * @since Twenty Fifteen 1.0
     */
    function twentyfifteen_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on twentyfifteen, use a find and replace
         * to change 'twentyfifteen' to the name of your theme in all the template files
         */
        load_theme_textdomain('twentyfifteen', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(825, 510, true);

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'twentyfifteen'),
            'social' => __('Social Links Menu', 'twentyfifteen'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ));

        $color_scheme = twentyfifteen_get_color_scheme();
        $default_color = trim($color_scheme[0], '#');

        // Setup the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('twentyfifteen_custom_background_args', array(
            'default-color' => $default_color,
            'default-attachment' => 'fixed',
        )));

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style(array('css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url()));
    }

endif; // twentyfifteen_setup
add_action('after_setup_theme', 'twentyfifteen_setup');

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
    register_sidebar(array(
        'name' => __('Widget Area', 'twentyfifteen'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'twentyfifteen'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'twentyfifteen_widgets_init');

if (!function_exists('twentyfifteen_fonts_url')) :

    /**
     * Register Google fonts for Twenty Fifteen.
     *
     * @since Twenty Fifteen 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function twentyfifteen_fonts_url() {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Noto Sans, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Noto Sans font: on or off', 'twentyfifteen')) {
            $fonts[] = 'Noto Sans:400italic,700italic,400,700';
        }

        /* translators: If there are characters in your language that are not supported by Noto Serif, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Noto Serif font: on or off', 'twentyfifteen')) {
            $fonts[] = 'Noto Serif:400italic,700italic,400,700';
        }

        /* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Inconsolata font: on or off', 'twentyfifteen')) {
            $fonts[] = 'Inconsolata:400,700';
        }

        /* translators: To add an additional character subset specific to your language, translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language. */
        $subset = _x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen');

        if ('cyrillic' == $subset) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ('greek' == $subset) {
            $subsets .= ',greek,greek-ext';
        } elseif ('devanagari' == $subset) {
            $subsets .= ',devanagari';
        } elseif ('vietnamese' == $subset) {
            $subsets .= ',vietnamese';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
                    ), '//fonts.googleapis.com/css');
        }

        return $fonts_url;
    }

endif;

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style('twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null);

    // Add Genericons, used in the main stylesheet.
    wp_enqueue_style('genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2');

    // Load our main stylesheet.
    wp_enqueue_style('twentyfifteen-style', get_stylesheet_uri());

    // Load the Internet Explorer specific stylesheet.
    wp_enqueue_style('twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array('twentyfifteen-style'), '20141010');
    wp_style_add_data('twentyfifteen-ie', 'conditional', 'lt IE 9');

    // Load the Internet Explorer 7 specific stylesheet.
    wp_enqueue_style('twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array('twentyfifteen-style'), '20141010');
    wp_style_add_data('twentyfifteen-ie7', 'conditional', 'lt IE 8');

    wp_enqueue_script('twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_singular() && wp_attachment_is_image()) {
        wp_enqueue_script('twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20141010');
    }

    wp_enqueue_script('twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20141212', true);
    wp_localize_script('twentyfifteen-script', 'screenReaderText', array(
        'expand' => '<span class="screen-reader-text">' . __('expand child menu', 'twentyfifteen') . '</span>',
        'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'twentyfifteen') . '</span>',
    ));
}

add_action('wp_enqueue_scripts', 'twentyfifteen_scripts');

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
    if (!is_single()) {
        return;
    }

    $previous = ( is_attachment() ) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
    $next = get_adjacent_post(false, '', false);
    $css = '';

    if (is_attachment() && 'attachment' == $previous->post_type) {
        return;
    }

    if ($previous && has_post_thumbnail($previous->ID)) {
        $prevthumb = wp_get_attachment_image_src(get_post_thumbnail_id($previous->ID), 'post-thumbnail');
        $css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url($prevthumb[0]) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    if ($next && has_post_thumbnail($next->ID)) {
        $nextthumb = wp_get_attachment_image_src(get_post_thumbnail_id($next->ID), 'post-thumbnail');
        $css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url($nextthumb[0]) . '); }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
    }

    wp_add_inline_style('twentyfifteen-style', $css);
}

add_action('wp_enqueue_scripts', 'twentyfifteen_post_nav_background');

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description($item_output, $item, $depth, $args) {
    if ('primary' == $args->theme_location && $item->description) {
        $item_output = str_replace($args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output);
    }

    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4);

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify($html) {
    return str_replace('class="search-submit"', 'class="search-submit screen-reader-text"', $html);
}

add_filter('get_search_form', 'twentyfifteen_search_form_modify');

/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';

function incubator() {
    $args = array(
        'label' => 'Incubator',
        'public' => true,
        'taxonomies' => array('category'),
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'incubator'),
        'query_var' => true,
        'menu_icon' => 'dashicons-editor-kitchensink',
        'supports' => array(
            'title',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('incubator', $args);
}

add_action('init', 'incubator');

function startup() {
    $args = array(
        'label' => 'Startup',
        'public' => true,
        'taxonomies' => array('category'),
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'startup'),
        'query_var' => true,
        'menu_icon' => 'dashicons-editor-kitchensink',
        'supports' => array(
            'title',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('startup', $args);
}

add_action('init', 'startup');

function mentor() {
    $args = array(
        'label' => 'Mentor',
        'public' => true,
        'taxonomies' => array('category'),
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'mentor'),
        'query_var' => true,
        'menu_icon' => 'dashicons-editor-kitchensink',
        'supports' => array(
            'title',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('mentor', $args);
}

add_action('init', 'mentor');

function corporate() {
    $args = array(
        'label' => 'Corporate',
        'public' => true,
        'taxonomies' => array('category'),
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'corporate'),
        'query_var' => true,
        'menu_icon' => 'dashicons-editor-kitchensink',
        'supports' => array(
            'title',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('corporate', $args);
}

add_action('init', 'corporate');

function investor() {
    $args = array(
        'label' => 'Investor',
        'public' => true,
        'taxonomies' => array('category'),
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'investor'),
        'query_var' => true,
        'menu_icon' => 'dashicons-editor-kitchensink',
        'supports' => array(
            'title',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('investor', $args);
}

add_action('init', 'investor');

function institute() {
    $args = array(
        'label' => 'Institute',
        'public' => true,
        'taxonomies' => array('category'),
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'institute'),
        'query_var' => true,
        'menu_icon' => 'dashicons-editor-kitchensink',
        'supports' => array(
            'title',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('institute', $args);
}

add_action('init', 'institute');

function innovator() {
    $args = array(
        'label' => 'Innovator',
        'public' => true,
        'taxonomies' => array('category'),
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'innovator'),
        'query_var' => true,
        'menu_icon' => 'dashicons-editor-kitchensink',
        'supports' => array(
            'title',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('innovator', $args);
}

add_action('init', 'innovator');

function application() {
    $args = array(
        'label' => 'Application',
        'public' => true,
        'taxonomies' => array('category'),
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'application'),
        'query_var' => true,
        'menu_icon' => 'dashicons-editor-kitchensink',
        'supports' => array(
            'title',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('application', $args);
}

add_action('init', 'application');

function question() {
    $args = array(
        'label' => 'Questions',
        'public' => true,
        'taxonomies' => array('category'),
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'question'),
        'query_var' => true,
        'menu_icon' => 'dashicons-editor-kitchensink',
        'supports' => array(
            'editor',
            'title',
            'custom-fields',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type('question', $args);
}

add_action('init', 'question');

function theme_add_user_entity_column($columns) {

    $columns['entity'] = __('Entity', 'theme');
    return $columns;
}

// end theme_add_user_zip_code_column
add_filter('manage_users_columns', 'theme_add_user_entity_column');

function theme_show_user_entity_data($value, $column_name, $user_id) {

    if ('entity' == $column_name) {
        return get_user_meta($user_id, 'entity', true);
    } // end if
}

// end theme_show_user_zip_code_data
add_action('manage_users_custom_column', 'theme_show_user_entity_data', 10, 3);

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
        show_admin_bar(false);
    }
}

function check_startup() {
    if (is_user_logged_in()) {

        $user = wp_get_current_user();

        if (get_user_meta($user->ID, "entity", true) != "startu") {
            header("Location:/");
        }
    } else {
        header("Location:/");
    }
}

function theme_prefix_rewrite_flush() {
    flush_rewrite_rules();
}

add_action('after_switch_theme', 'theme_prefix_rewrite_flush');

// bhavana added code for session 

add_action('init', 'myStartSession', 1);

function myStartSession() {
    if (!session_id()) {
        session_start();
    }
}

// end here code for session 
function getPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    $view = json_decode($count, true);
    $user_view_count = count($view);
    if ($user_view_count == '') {

        return "0 View";
    }
    return $user_view_count . ' Views';
}

function setPostViews($postID, $date) {
    $user_id = get_current_user_id();

    $count_like = get_post_meta($postID, 'post_views_count', true);
    $user = json_decode($count_like, true);
    $array = array(
        'id' => $user_id,
        'time' => $date,
    );

    array_push($user, $array);
    update_post_meta($postID, 'post_views_count', json_encode($user));
}

///////////////////////
function getPostIncubators($postID) {
    $count_key = 'Interested in Incubating';
    $count = get_post_meta($postID, $count_key, true);
    $Incubating = json_decode($count, true);
    $user_Incubating = count($Incubating);
    if ($user_Incubating == '') {
        return "0 Interested in Incubating";
    }
    return $user_Incubating . ' Interested in Incubating';
}

function setPostIncubators($postID, $date) {
    $user_id = get_current_user_id();
    $count_key = 'Interested in Incubating';
    // $count = get_post_meta($postID, $count_key, true);
    $count_like = get_post_meta($postID, 'Interested in Incubating', true);
    $user = json_decode($count_like, true);
    $array = array(
        'id' => $user_id,
        'time' => $date,
    );
    if (!searchForKey('id', $user_id, $user)) {
        array_push($user, $array);
        update_post_meta($postID, 'Interested in Incubating', json_encode($user));
    }
}

//////////////////////////////////


function getPostLikes($postID) {

    $count_key = 'User Likes';
    $count = get_post_meta($postID, $count_key, true);
    $user = json_decode($count, true);
    $user_like = count($user);
    if ($user_like == '') {
        //  delete_post_meta($postID, $count_key);
        //  add_post_meta($postID, $count_key, '0');
        return "0 Value Added";
    }
    return $user_like . ' Value Added';
}

function setPostLikes($postID, $date) {

    $user_id = get_current_user_id();

    $post_like_by = 'User Likes';

    $count_like = get_post_meta($postID, 'User Likes', true);
    $user = json_decode($count_like, true);
    $array = array(
        'id' => $user_id,
        'time' => $date,
    );
    if (!searchForKey('id', $user_id, $user)) {
        array_push($user, $array);
        update_post_meta($postID, 'User Likes', json_encode($user));
    }
}

function getPostInterests($postID) {
    $count_key = 'Show Interest';
    $count = get_post_meta($postID, $count_key, true);
    $user = json_decode($count, true);
    $intestred_count = count($user);
    if ($count == '') {
        // delete_post_meta($postID, $count_key);
        // add_post_meta($postID, $count_key, '0');
        return "0 Mentors Showed Interest";
    }
    return $intestred_count . ' Mentors Showed Interest';
}

function setPostInterests($postID, $date) {
    $user_id = get_current_user_id();
    $post_interest_by = 'Show Interest';
    //$count_key = 'post_interest_count';
    //$count = get_post_meta($postID, $count_key, true);
    $count_like = get_post_meta($postID, 'Show Interest', true);
    $user = json_decode($count_like, true);

    $array = array(
        'id' => $user_id,
        'time' => $date,
    );
    if (!searchForKey('id', $user_id, $user)) {
        array_push($user, $array);
        update_post_meta($postID, 'Show Interest', json_encode($user));
    }

//    if (!in_array($user_id, $user)) {
//        array_push($user, $user_id);
//        update_post_meta($postID, 'Show Interest', json_encode($user));
//    }
}

function searchForKey($keyy, $value, $array) {
    foreach ($array as $key => $val) {
        // echo $val[$keyy];
        if ($val[$keyy] == $value) {
            return TRUE;
        }
    }
    return FALSE;
}

//function getPostQuestions($postID) {
//    $count_key = 'Questions Asked';
//    $count = get_post_meta($postID, $count_key, true);
//    $user = json_decode($count, true);
//      $Question_count = count($user);
//    if ($count == '') {
//        delete_post_meta($postID, $count_key);
//        add_post_meta($postID, $count_key, '0');
//        return "0 Questions Asked";
//    }
//    return $Question_count . ' Questions Asked';
//}
//
//function setPostQuestions($postID) {
//    $user_id = get_current_user_id();
//    $count_key = 'Questions Asked';
//    $count_que = get_post_meta($postID, 'Questions Asked', true);
//    $user = json_decode($count_que, true);
//     if (!in_array($user_id,$user)) {
//        array_push($user,$user_id);
//        update_post_meta($postID, 'Questions Asked', json_encode($user));
//    }
//}
// new added code for question ask
function getPostQuestions($postID) {
    $count_key = 'post_question_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Questions Asked";
    }
    return $count . ' Questions Asked';
}

function setPostQuestions($postID, $status) {
    $count_key = 'post_question_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// new added code for question ask ---EnD Here----//
function getPostInvests($postID) {
    $count_key = 'Interested in Investing';
    $count = get_post_meta($postID, $count_key, true);
    $user = json_decode($count, true);
    $intvest_count = count($user);
    if ($count == '') {
        // delete_post_meta($postID, $count_key);
        // add_post_meta($postID, $count_key, '0');
        return "0 Interested in Investing";
    }

    return $intvest_count . ' Interested in Investing';
}

function setPostInvests($postID, $date) {
    $user_id = get_current_user_id();
    $post_interest_by = 'Interested in Investing';
    //$count_key = 'post_interest_count';
    //$count = get_post_meta($postID, $count_key, true);
    $count_like = get_post_meta($postID, 'Interested in Investing', true);
    $user = json_decode($count_like, true);

    $array = array(
        'id' => $user_id,
        'time' => $date,
    );
    if (!searchForKey('id', $user_id, $user)) {
        array_push($user, $array);
        update_post_meta($postID, 'Interested in Investing', json_encode($user));
    }
}

function oa_social_login_set_new_user_role($user_role) {
//This is an example for a custom setting with one role
    $user_role = 'contributor';



//The new user will be created with this role
    return $user_role;
}

@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '3000000000000');

add_theme_support('post-thumbnail');
set_post_thumbnail_size(150, 150);
// Remove issues with prefetching adding extra views
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function chkLogin() {
    $user_id = get_current_user_id();
    if ($user_id == 0) {
        header("location:/login/");
    } else {
        
    }
}

add_filter('wp_mail', 'my_wp_mail_filter');

function my_wp_mail_filter($args) {
    array_push($args['headers'], 'Bcc: ivycamp@ivycapventures.com');

    $new_wp_mail = array(
        'to' => $args['to'],
        'subject' => $args['subject'],
        'message' => $args['message'],
        'headers' => array_filter($args['headers']),
        'attachments' => $args['attachments'],
    );
    
    return $new_wp_mail;
}
