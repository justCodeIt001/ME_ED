<?php

// Set the content width in pixels, based on the theme's design and stylesheet.

function ed_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'ed_content_width', 992 );
}

add_action( 'after_setup_theme', 'ed_content_width', 0 );

// Shortcode in HTML-Widget

add_filter( 'widget_text', 'do_shortcode' );

//Enqueue scripts and styles

function ed_scripts() {
    $modificated_styleCss = date( 'YmdHi', filemtime( get_stylesheet_directory() . '/style.css' ) );
    $modificated_bootstrapCss = date( 'YmdHi', filemtime( get_template_directory() . '/css/lib/bootstrap.min.css' ) );
    $modificated_bootstrapJs = date( 'YmdHi', filemtime( get_template_directory() . '/js/lib/bootstrap.bundle.min.js' ) );
    $modificated_bootstrapSelectJs = date( 'YmdHi', filemtime( get_template_directory() . '/js/lib/bootstrap-select.min.js' ) );
    $modificated_cookieJs = date( 'YmdHi', filemtime( get_template_directory() . '/js/lib/cookies.js' ) );
    $modificated_themeJs = date( 'YmdHi', filemtime( get_template_directory() . '/js/theme.js' ) );

    // Bootstrap    
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/lib/bootstrap.min.css', array(), $modificated_bootstrapCss );

    // Style CSS
    wp_enqueue_style( 'ed-style', get_stylesheet_uri(), array(), $modificated_styleCss );

    // Bootstrap JS
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/lib/bootstrap.bundle.min.js', array(), $modificated_bootstrapJs, true );

    // Bootstrap Select JS
    wp_enqueue_script( 'bootstrap-select', get_template_directory_uri() . '/js/lib/bootstrap-select.min.js', array(), $modificated_bootstrapSelectJs, true );

    // Cookies
    wp_enqueue_script( 'cookies', get_stylesheet_directory_uri() . '/js/lib/cookies.js', array('jquery'), $modificated_cookieJs, true );
    
    // Theme JS
    wp_enqueue_script( 'ed-script', get_template_directory_uri() . '/js/theme.js', array(), $modificated_themeJs, true );
}

add_action( 'wp_enqueue_scripts', 'ed_scripts' );

// Add Async to Js

function add_async_attribute($tag, $handle) {	
	$scripts_to_async = array('bootstrap', 'bootstrap-select', 'ed-script');

	if ( in_array($handle, $scripts_to_async) ) {
		return str_replace(' src', 'defer src', $tag);
	}
    else {
		return $tag;
	}
}

add_filter('script_loader_tag', 'add_async_attribute', 10, 2);

// Disables the block editor from managing widgets in the Gutenberg plugin.

add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );

// Disables the block editor from managing widgets.

add_filter( 'use_widgets_block_editor', '__return_false' );

// Register Widgets

function ed_widgets() {

    // Nav CTA Button
    register_sidebar(array(
        'name' => esc_html__('Nav CTA', 'energiadirect' ),
        'id' => 'nav-cta',
        'description' => esc_html__('Nav CTA', 'energiadirect' ),
        'before_widget' => '<div class="">',
        'after_widget' => '</div>',
        'before_title' => '<div class="d-none">',
        'after_title' => '</div>'
    ));

    // Footer Top
    register_sidebar(array(
        'name' => esc_html__('Footer Top', 'energiadirect' ),
        'id' => 'footer-top',
        'description' => esc_html__('Add widgets here.', 'energiadirect' ),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="d-none">',
        'after_title' => '</h5>'
    ));

    // Footer Col #1
    register_sidebar(array(
        'name' => esc_html__('Footer 1', 'energiadirect' ),
        'id' => 'footer-1',
        'description' => esc_html__('Add widgets here.', 'energiadirect' ),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="d-none">',
        'after_title' => '</h5>'
    ));

    // Footer Col #2
    register_sidebar(array(
        'name' => esc_html__('Footer 2', 'energiadirect' ),
        'id' => 'footer-2',
        'description' => esc_html__('Add widgets here.', 'energiadirect' ),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="d-none">',
        'after_title' => '</h5>'
    ));

    // Form Modal 1
    register_sidebar(array(
        'name' => esc_html__('Form Modal 1', 'energiadirect' ),
        'id' => 'modal-form-1',
        'description' => esc_html__('Add widgets here.', 'energiadirect' ),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="d-none">',
        'after_title' => '</h5>'
    ));

    // Form Modal 2
    register_sidebar(array(
        'name' => esc_html__('Form Modal 2', 'energiadirect' ),
        'id' => 'modal-form-2',
        'description' => esc_html__('Add widgets here.', 'energiadirect' ),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="d-none">',
        'after_title' => '</h5>'
    ));

    // Form Modal 3
    register_sidebar(array(
        'name' => esc_html__('Form Modal 3', 'energiadirect' ),
        'id' => 'modal-form-3',
        'description' => esc_html__('Add widgets here.', 'energiadirect' ),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="d-none">',
        'after_title' => '</h5>'
    ));
}

add_action( 'widgets_init', 'ed_widgets' );

// Disable srcset on frontend

function disable_wp_responsive_images() {
    return 1;
}

add_filter('max_srcset_image_width', 'disable_wp_responsive_images');

// Change Email Sender

function change_mail_sender($content_type) {
  return 'magazynenergii@energiadirect.pl';
}

add_filter('wp_mail_from','change_mail_sender');

function change_mail_sender_name($name) {
  return 'Energia Direct';
}

add_filter('wp_mail_from_name','change_mail_sender_name');

// ED Send form

function send_contact_form() {

    // if ( isset($_POST) ) {
    //     // $to = 'biuro@kodemaster.pl';
    //     $subject = 'Nowa wiadomość fotowoltaika.energiadirect.pl : ' . $_POST['email'];
    //     $message .= 'Pojawiła się nowa wiadomość przesłana z formularza kontaktowego:';
    //     $message .= '<br>';
    //     $message .= '<br>';
    //     $message .= '<strong>Dane kontaktowe:</strong> <br>';
    //     $message .= '<br>';
    //     $message .= 'Imię: ' . $_POST['first_name'] . '<br>';
    //     $message .= 'Adres e-mail: ' . $_POST['email'] . '<br>';
    //     $message .= 'Telefon: ' . $_POST['telefon'] . '<br>';
    //     $message .= 'UTM Source: ' . $_POST['source'] . '<br>';

    //     $headers = array('Content-Type: text/html; charset=UTF-8');

    //     if ( wp_mail($to, $subject, $message, $headers) ) {
    //         wp_send_json('success');
    //     }
    //     else {
    //         echo 'Wystąpił błąd spróbuj ponownie wypełnić formularz.';
    //         wp_send_json('error');
    //     }

    //     die();
    // }

    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     wp_send_json('success');
    // }
    // else {
    //     echo 'Wystąpił błąd spróbuj ponownie wypełnić formularz.';
    //     wp_send_json('error');
    // }
}

add_action("wp_ajax_send_contact_form", "send_contact_form");
add_action("wp_ajax_nopriv_send_contact_form", "send_contact_form");