<?php

if ( ! defined( 'ABSPATH' ) ) { exit; }

const INQUIRY_FORM_WIDGET_ASSETS_VERSION_0e694386 = '2.0.0';

function register_inquiry_form_widget_0e694386( $widgets_manager ) {
    require_once __DIR__ . '/widget-inquiry-form.php';
    $widgets_manager->register( new \AngieSnippets\Inquiry_Form_Widget_0e694386() );
}
add_action( 'elementor/widgets/register', 'register_inquiry_form_widget_0e694386' );

function register_inquiry_form_assets_0e694386() {
    wp_register_script( 'inquiry-form-script-0e694386', angie_cs_get_snippet_asset_url( __FILE__, 'script.js' ), [ 'elementor-frontend' ], INQUIRY_FORM_WIDGET_ASSETS_VERSION_0e694386, true );
    wp_register_style( 'inquiry-form-style-0e694386', angie_cs_get_snippet_asset_url( __FILE__, 'style.css' ), [], INQUIRY_FORM_WIDGET_ASSETS_VERSION_0e694386 );
}
add_action( 'wp_enqueue_scripts', 'register_inquiry_form_assets_0e694386' );

/* --- AJAX handler for form submission --- */
add_action( 'wp_ajax_ifw_submit_0e694386', 'ifw_handle_submit_0e694386' );
add_action( 'wp_ajax_nopriv_ifw_submit_0e694386', 'ifw_handle_submit_0e694386' );

function ifw_handle_submit_0e694386() {
    /* Verify nonce */
    if ( ! isset( $_POST['ifw_nonce_0e694386'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['ifw_nonce_0e694386'] ) ), 'ifw_form_nonce_0e694386' ) ) {
        wp_send_json_error( [ 'message' => 'Security check failed.' ] );
    }

    /* --- reCAPTCHA verification --- */
    $recaptcha_secret = isset( $_POST['recaptcha_secret'] ) ? sanitize_text_field( wp_unslash( $_POST['recaptcha_secret'] ) ) : '';
    $recaptcha_response = isset( $_POST['g-recaptcha-response'] ) ? sanitize_text_field( wp_unslash( $_POST['g-recaptcha-response'] ) ) : '';

    if ( ! empty( $recaptcha_secret ) ) {
        if ( empty( $recaptcha_response ) ) {
            wp_send_json_error( [ 'message' => 'Please complete the reCAPTCHA verification.' ] );
        }
        $verify_url = 'https://www.google.com/recaptcha/api/siteverify';
        $verify_response = wp_remote_post( $verify_url, [
            'body' => [
                'secret'   => $recaptcha_secret,
                'response' => $recaptcha_response,
                'remoteip' => isset( $_SERVER['REMOTE_ADDR'] ) ? sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) ) : '',
            ],
        ] );
        if ( is_wp_error( $verify_response ) ) {
            wp_send_json_error( [ 'message' => 'reCAPTCHA verification failed. Please try again.' ] );
        }
        $verify_body = json_decode( wp_remote_retrieve_body( $verify_response ), true );
        if ( empty( $verify_body['success'] ) ) {
            wp_send_json_error( [ 'message' => 'reCAPTCHA verification failed. Please try again.' ] );
        }
    }

    /* --- Collect form data --- */
    $fullname = isset( $_POST['fullname'] ) ? sanitize_text_field( wp_unslash( $_POST['fullname'] ) ) : '';
    $email    = isset( $_POST['email'] ) ? sanitize_email( wp_unslash( $_POST['email'] ) ) : '';
    $details  = isset( $_POST['details'] ) ? sanitize_textarea_field( wp_unslash( $_POST['details'] ) ) : '';
    $services = isset( $_POST['services'] ) ? sanitize_text_field( wp_unslash( $_POST['services'] ) ) : '';
    $budget   = isset( $_POST['budget'] ) ? sanitize_text_field( wp_unslash( $_POST['budget'] ) ) : '';
    $to_email = isset( $_POST['to_email'] ) ? sanitize_email( wp_unslash( $_POST['to_email'] ) ) : get_option( 'admin_email' );
    $subject  = isset( $_POST['email_subject'] ) ? sanitize_text_field( wp_unslash( $_POST['email_subject'] ) ) : 'New Inquiry Submission';

    if ( empty( $fullname ) || empty( $email ) || empty( $details ) ) {
        wp_send_json_error( [ 'message' => 'Please fill in all required fields.' ] );
    }

    /* --- SMTP configuration --- */
    $smtp_host   = isset( $_POST['smtp_host'] ) ? sanitize_text_field( wp_unslash( $_POST['smtp_host'] ) ) : '';
    $smtp_port   = isset( $_POST['smtp_port'] ) ? absint( $_POST['smtp_port'] ) : 587;
    $smtp_enc    = isset( $_POST['smtp_encryption'] ) ? sanitize_text_field( wp_unslash( $_POST['smtp_encryption'] ) ) : 'tls';
    $smtp_user   = isset( $_POST['smtp_username'] ) ? sanitize_text_field( wp_unslash( $_POST['smtp_username'] ) ) : '';
    $smtp_pass   = isset( $_POST['smtp_password'] ) ? sanitize_text_field( wp_unslash( $_POST['smtp_password'] ) ) : '';
    $smtp_from   = isset( $_POST['smtp_from_email'] ) ? sanitize_email( wp_unslash( $_POST['smtp_from_email'] ) ) : '';
    $smtp_from_n = isset( $_POST['smtp_from_name'] ) ? sanitize_text_field( wp_unslash( $_POST['smtp_from_name'] ) ) : get_bloginfo( 'name' );

    /* Build email body */
    $body  = "<h2>New Inquiry Submission</h2>";
    $body .= "<p><strong>Name:</strong> " . esc_html( $fullname ) . "</p>";
    $body .= "<p><strong>Email:</strong> " . esc_html( $email ) . "</p>";
    if ( ! empty( $services ) ) {
        $body .= "<p><strong>Services:</strong> " . esc_html( $services ) . "</p>";
    }
    if ( ! empty( $budget ) ) {
        $body .= "<p><strong>Budget:</strong> " . esc_html( $budget ) . "</p>";
    }
    $body .= "<p><strong>Details:</strong><br>" . nl2br( esc_html( $details ) ) . "</p>";

    $headers = [ 'Content-Type: text/html; charset=UTF-8' ];
    $attachments = [];

    /* Handle file upload */
    if ( ! empty( $_FILES['attachment'] ) && ! empty( $_FILES['attachment']['tmp_name'] ) ) {
        $upload = wp_handle_upload( $_FILES['attachment'], [ 'test_form' => false ] );
        if ( ! empty( $upload['file'] ) ) {
            $attachments[] = $upload['file'];
        }
    }

    /* If SMTP is configured, hook into PHPMailer */
    $smtp_configured = ! empty( $smtp_host ) && ! empty( $smtp_user ) && ! empty( $smtp_pass );

    if ( $smtp_configured ) {
        $smtp_callback = function( $phpmailer ) use ( $smtp_host, $smtp_port, $smtp_enc, $smtp_user, $smtp_pass, $smtp_from, $smtp_from_n ) {
            $phpmailer->isSMTP();
            $phpmailer->Host       = $smtp_host;
            $phpmailer->Port       = $smtp_port;
            $phpmailer->SMTPSecure = $smtp_enc;
            $phpmailer->SMTPAuth   = true;
            $phpmailer->Username   = $smtp_user;
            $phpmailer->Password   = $smtp_pass;
            if ( ! empty( $smtp_from ) ) {
                $phpmailer->setFrom( $smtp_from, $smtp_from_n );
            }
        };
        add_action( 'phpmailer_init', $smtp_callback, 99 );
    }

    $sent = wp_mail( $to_email, $subject, $body, $headers, $attachments );

    /* Remove SMTP hook after sending */
    if ( $smtp_configured && isset( $smtp_callback ) ) {
        remove_action( 'phpmailer_init', $smtp_callback, 99 );
    }

    /* Clean up uploaded file */
    if ( ! empty( $attachments ) ) {
        foreach ( $attachments as $att_file ) {
            if ( file_exists( $att_file ) ) {
                wp_delete_file( $att_file );
            }
        }
    }

    if ( $sent ) {
        wp_send_json_success( [ 'message' => 'Inquiry submitted successfully.' ] );
    } else {
        wp_send_json_error( [ 'message' => 'Failed to send email. Please check your SMTP settings or try again later.' ] );
    }
}

/* Localize AJAX URL */
function ifw_localize_ajax_0e694386() {
    wp_localize_script( 'inquiry-form-script-0e694386', 'ifw_ajax_0e694386', [
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'ifw_form_nonce_0e694386' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'ifw_localize_ajax_0e694386', 20 );
