<?php

namespace AngieSnippets;

if ( ! defined( 'ABSPATH' ) ) { exit; }
if ( class_exists( 'AngieSnippets\Inquiry_Form_Widget_0e694386' ) ) { return; }

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Repeater;

class Inquiry_Form_Widget_0e694386 extends Widget_Base {

    public function get_name() { return 'inquiry_form_widget_0e694386'; }
    public function get_title() { return esc_html__( 'Inquiry Form', 'angie-snippets' ); }
    public function get_icon() { return 'eicon-form-horizontal'; }
    public function get_categories() { return [ 'angie-widgets', 'general' ]; }
    public function get_script_depends() { return [ 'inquiry-form-script-0e694386' ]; }
    public function get_style_depends() { return [ 'inquiry-form-style-0e694386' ]; }

    protected function register_controls() {
        /* ===================== CONTENT TAB ===================== */

        // --- Service Options ---
        $this->start_controls_section( 'section_service_options_0e694386', [
            'label' => esc_html__( 'Service Options', 'angie-snippets' ),
            'tab'   => Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'service_label_0e694386', [
            'label'   => esc_html__( 'Section Label', 'angie-snippets' ),
            'type'    => Controls_Manager::TEXT,
            'default' => 'Service',
        ] );

        $service_repeater = new Repeater();
        $service_repeater->add_control( 'service_text_0e694386', [
            'label'   => esc_html__( 'Option Text', 'angie-snippets' ),
            'type'    => Controls_Manager::TEXT,
            'default' => 'Consulting',
        ] );
        $service_repeater->add_control( 'service_value_0e694386', [
            'label'   => esc_html__( 'Option Value', 'angie-snippets' ),
            'type'    => Controls_Manager::TEXT,
            'default' => 'consulting',
        ] );
        $service_repeater->add_control( 'service_selected_0e694386', [
            'label'   => esc_html__( 'Pre-selected', 'angie-snippets' ),
            'type'    => Controls_Manager::SWITCHER,
            'default' => '',
        ] );

        $this->add_control( 'service_options_0e694386', [
            'label'   => esc_html__( 'Options', 'angie-snippets' ),
            'type'    => Controls_Manager::REPEATER,
            'fields'  => $service_repeater->get_controls(),
            'default' => [
                [ 'service_text_0e694386' => 'Consulting', 'service_value_0e694386' => 'consulting' ],
                [ 'service_text_0e694386' => 'Development', 'service_value_0e694386' => 'development' ],
                [ 'service_text_0e694386' => 'Design', 'service_value_0e694386' => 'design' ],
                [ 'service_text_0e694386' => 'Marketing', 'service_value_0e694386' => 'marketing' ],
            ],
            'title_field' => '{{{ service_text_0e694386 }}}',
        ] );

        $this->add_control( 'service_allow_multiple_0e694386', [
            'label'   => esc_html__( 'Allow Multiple Selection', 'angie-snippets' ),
            'type'    => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ] );

        $this->end_controls_section();

        // --- Budget Options ---
        $this->start_controls_section( 'section_budget_options_0e694386', [
            'label' => esc_html__( 'Budget Options', 'angie-snippets' ),
            'tab'   => Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'budget_label_0e694386', [
            'label'   => esc_html__( 'Section Label', 'angie-snippets' ),
            'type'    => Controls_Manager::TEXT,
            'default' => 'Budget',
        ] );

        $budget_repeater = new Repeater();
        $budget_repeater->add_control( 'budget_text_0e694386', [
            'label'   => esc_html__( 'Option Text', 'angie-snippets' ),
            'type'    => Controls_Manager::TEXT,
            'default' => '$10K - $50K',
        ] );
        $budget_repeater->add_control( 'budget_value_0e694386', [
            'label'   => esc_html__( 'Option Value', 'angie-snippets' ),
            'type'    => Controls_Manager::TEXT,
            'default' => '10k-50k',
        ] );

        $this->add_control( 'budget_options_0e694386', [
            'label'   => esc_html__( 'Options', 'angie-snippets' ),
            'type'    => Controls_Manager::REPEATER,
            'fields'  => $budget_repeater->get_controls(),
            'default' => [
                [ 'budget_text_0e694386' => 'Less than $10K', 'budget_value_0e694386' => 'less-10k' ],
                [ 'budget_text_0e694386' => '$10K - $50K', 'budget_value_0e694386' => '10k-50k' ],
                [ 'budget_text_0e694386' => 'More than $50K', 'budget_value_0e694386' => 'more-50k' ],
            ],
            'title_field' => '{{{ budget_text_0e694386 }}}',
        ] );

        $this->end_controls_section();

        // --- Form Fields ---
        $this->start_controls_section( 'section_form_fields_0e694386', [
            'label' => esc_html__( 'Form Fields', 'angie-snippets' ),
            'tab'   => Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'fullname_placeholder_0e694386', [
            'label'   => esc_html__( 'Full Name Placeholder', 'angie-snippets' ),
            'type'    => Controls_Manager::TEXT,
            'default' => 'Full name*',
        ] );

        $this->add_control( 'email_placeholder_0e694386', [
            'label'   => esc_html__( 'Email Placeholder', 'angie-snippets' ),
            'type'    => Controls_Manager::TEXT,
            'default' => 'Email*',
        ] );

        $this->add_control( 'details_placeholder_0e694386', [
            'label'   => esc_html__( 'Project Details Placeholder', 'angie-snippets' ),
            'type'    => Controls_Manager::TEXT,
            'default' => 'Project details*',
        ] );

        $this->add_control( 'details_rows_0e694386', [
            'label'   => esc_html__( 'Textarea Rows', 'angie-snippets' ),
            'type'    => Controls_Manager::NUMBER,
            'default' => 4,
            'min'     => 2,
            'max'     => 15,
        ] );

        $this->add_control( 'show_file_upload_0e694386', [
            'label'   => esc_html__( 'Show File Upload', 'angie-snippets' ),
            'type'    => Controls_Manager::SWITCHER,
            'default' => 'yes',
        ] );

        $this->add_control( 'file_upload_label_0e694386', [
            'label'     => esc_html__( 'File Upload Label', 'angie-snippets' ),
            'type'      => Controls_Manager::TEXT,
            'default'   => 'Attach a file(optional)',
            'condition' => [ 'show_file_upload_0e694386' => 'yes' ],
        ] );

        $this->add_control( 'file_upload_text_0e694386', [
            'label'     => esc_html__( 'File Upload Text', 'angie-snippets' ),
            'type'      => Controls_Manager::TEXT,
            'default'   => 'Choose a file or drag and drop here',
            'condition' => [ 'show_file_upload_0e694386' => 'yes' ],
        ] );

        $this->add_control( 'file_accepted_types_0e694386', [
            'label'       => esc_html__( 'Accepted File Types', 'angie-snippets' ),
            'type'        => Controls_Manager::TEXT,
            'default'     => '.pdf,.doc,.docx,.png,.jpg,.jpeg',
            'description' => esc_html__( 'Comma-separated file extensions', 'angie-snippets' ),
            'condition'   => [ 'show_file_upload_0e694386' => 'yes' ],
        ] );

        $this->add_control( 'file_max_size_0e694386', [
            'label'     => esc_html__( 'Max File Size (MB)', 'angie-snippets' ),
            'type'      => Controls_Manager::NUMBER,
            'default'   => 10,
            'min'       => 1,
            'max'       => 50,
            'condition' => [ 'show_file_upload_0e694386' => 'yes' ],
        ] );

        $this->end_controls_section();

        // --- Google reCAPTCHA ---
        $this->start_controls_section( 'section_recaptcha_0e694386', [
            'label' => esc_html__( 'Google reCAPTCHA', 'angie-snippets' ),
            'tab'   => Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'enable_recaptcha_0e694386', [
            'label'   => esc_html__( 'Enable reCAPTCHA', 'angie-snippets' ),
            'type'    => Controls_Manager::SWITCHER,
            'default' => '',
            'description' => esc_html__( 'Enable Google reCAPTCHA v2 checkbox verification before form submission.', 'angie-snippets' ),
        ] );

        $this->add_control( 'recaptcha_site_key_0e694386', [
            'label'       => esc_html__( 'Site Key', 'angie-snippets' ),
            'type'        => Controls_Manager::TEXT,
            'default'     => '',
            'placeholder' => esc_html__( 'Enter your reCAPTCHA v2 Site Key', 'angie-snippets' ),
            'label_block' => true,
            'condition'   => [ 'enable_recaptcha_0e694386' => 'yes' ],
            'description' => sprintf(
                esc_html__( 'Get your keys from %s', 'angie-snippets' ),
                '<a href="https://www.google.com/recaptcha/admin" target="_blank">Google reCAPTCHA Admin</a>'
            ),
        ] );

        $this->add_control( 'recaptcha_secret_key_0e694386', [
            'label'       => esc_html__( 'Secret Key', 'angie-snippets' ),
            'type'        => Controls_Manager::TEXT,
            'default'     => '',
            'placeholder' => esc_html__( 'Enter your reCAPTCHA v2 Secret Key', 'angie-snippets' ),
            'label_block' => true,
            'input_type'  => 'password',
            'condition'   => [ 'enable_recaptcha_0e694386' => 'yes' ],
        ] );

        $this->add_control( 'recaptcha_theme_0e694386', [
            'label'   => esc_html__( 'Theme', 'angie-snippets' ),
            'type'    => Controls_Manager::SELECT,
            'default' => 'dark',
            'options' => [
                'light' => esc_html__( 'Light', 'angie-snippets' ),
                'dark'  => esc_html__( 'Dark', 'angie-snippets' ),
            ],
            'condition' => [ 'enable_recaptcha_0e694386' => 'yes' ],
        ] );

        $this->add_control( 'recaptcha_size_0e694386', [
            'label'   => esc_html__( 'Size', 'angie-snippets' ),
            'type'    => Controls_Manager::SELECT,
            'default' => 'normal',
            'options' => [
                'normal'  => esc_html__( 'Normal', 'angie-snippets' ),
                'compact' => esc_html__( 'Compact', 'angie-snippets' ),
            ],
            'condition' => [ 'enable_recaptcha_0e694386' => 'yes' ],
        ] );

        $this->end_controls_section();

        // --- Submit Button ---
        $this->start_controls_section( 'section_submit_button_0e694386', [
            'label' => esc_html__( 'Submit Button', 'angie-snippets' ),
            'tab'   => Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'submit_text_0e694386', [
            'label'   => esc_html__( 'Button Text', 'angie-snippets' ),
            'type'    => Controls_Manager::TEXT,
            'default' => 'Submit inquiry',
        ] );

        $this->add_control( 'submit_action_0e694386', [
            'label'   => esc_html__( 'On Submit', 'angie-snippets' ),
            'type'    => Controls_Manager::SELECT,
            'default' => 'email',
            'options' => [
                'email'    => esc_html__( 'Send Email', 'angie-snippets' ),
                'redirect' => esc_html__( 'Redirect to URL', 'angie-snippets' ),
            ],
        ] );

        $this->add_control( 'submit_email_to_0e694386', [
            'label'     => esc_html__( 'Send To Email', 'angie-snippets' ),
            'type'      => Controls_Manager::TEXT,
            'default'   => get_option( 'admin_email' ),
            'condition' => [ 'submit_action_0e694386' => 'email' ],
        ] );

        $this->add_control( 'submit_email_subject_0e694386', [
            'label'     => esc_html__( 'Email Subject', 'angie-snippets' ),
            'type'      => Controls_Manager::TEXT,
            'default'   => 'New Inquiry Submission',
            'condition' => [ 'submit_action_0e694386' => 'email' ],
        ] );

        $this->add_control( 'submit_redirect_url_0e694386', [
            'label'     => esc_html__( 'Redirect URL', 'angie-snippets' ),
            'type'      => Controls_Manager::URL,
            'condition' => [ 'submit_action_0e694386' => 'redirect' ],
        ] );

        $this->add_control( 'success_message_0e694386', [
            'label'   => esc_html__( 'Success Message', 'angie-snippets' ),
            'type'    => Controls_Manager::TEXT,
            'default' => 'Thank you! Your inquiry has been submitted.',
        ] );

        $this->end_controls_section();

        // --- SMTP Configuration ---
        $this->start_controls_section( 'section_smtp_0e694386', [
            'label' => esc_html__( 'SMTP Configuration', 'angie-snippets' ),
            'tab'   => Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'enable_smtp_0e694386', [
            'label'       => esc_html__( 'Enable Custom SMTP', 'angie-snippets' ),
            'type'        => Controls_Manager::SWITCHER,
            'default'     => '',
            'description' => esc_html__( 'Use custom SMTP server for reliable email delivery. When disabled, the form uses default WordPress wp_mail().', 'angie-snippets' ),
        ] );

        $this->add_control( 'smtp_host_0e694386', [
            'label'       => esc_html__( 'SMTP Host', 'angie-snippets' ),
            'type'        => Controls_Manager::TEXT,
            'default'     => '',
            'placeholder' => 'smtp.gmail.com',
            'label_block' => true,
            'condition'   => [ 'enable_smtp_0e694386' => 'yes' ],
        ] );

        $this->add_control( 'smtp_port_0e694386', [
            'label'     => esc_html__( 'SMTP Port', 'angie-snippets' ),
            'type'      => Controls_Manager::NUMBER,
            'default'   => 587,
            'condition' => [ 'enable_smtp_0e694386' => 'yes' ],
        ] );

        $this->add_control( 'smtp_encryption_0e694386', [
            'label'   => esc_html__( 'Encryption', 'angie-snippets' ),
            'type'    => Controls_Manager::SELECT,
            'default' => 'tls',
            'options' => [
                'none' => esc_html__( 'None', 'angie-snippets' ),
                'ssl'  => esc_html__( 'SSL', 'angie-snippets' ),
                'tls'  => esc_html__( 'TLS', 'angie-snippets' ),
            ],
            'condition' => [ 'enable_smtp_0e694386' => 'yes' ],
        ] );

        $this->add_control( 'smtp_username_0e694386', [
            'label'       => esc_html__( 'SMTP Username', 'angie-snippets' ),
            'type'        => Controls_Manager::TEXT,
            'default'     => '',
            'placeholder' => 'your-email@gmail.com',
            'label_block' => true,
            'condition'   => [ 'enable_smtp_0e694386' => 'yes' ],
        ] );

        $this->add_control( 'smtp_password_0e694386', [
            'label'       => esc_html__( 'SMTP Password', 'angie-snippets' ),
            'type'        => Controls_Manager::TEXT,
            'default'     => '',
            'placeholder' => esc_html__( 'App password or SMTP password', 'angie-snippets' ),
            'label_block' => true,
            'input_type'  => 'password',
            'condition'   => [ 'enable_smtp_0e694386' => 'yes' ],
        ] );

        $this->add_control( 'smtp_from_email_0e694386', [
            'label'       => esc_html__( 'From Email', 'angie-snippets' ),
            'type'        => Controls_Manager::TEXT,
            'default'     => '',
            'placeholder' => 'noreply@yourdomain.com',
            'label_block' => true,
            'condition'   => [ 'enable_smtp_0e694386' => 'yes' ],
            'description' => esc_html__( 'The email address that appears as the sender.', 'angie-snippets' ),
        ] );

        $this->add_control( 'smtp_from_name_0e694386', [
            'label'       => esc_html__( 'From Name', 'angie-snippets' ),
            'type'        => Controls_Manager::TEXT,
            'default'     => '',
            'placeholder' => 'Giga Technologies',
            'label_block' => true,
            'condition'   => [ 'enable_smtp_0e694386' => 'yes' ],
        ] );

        $this->end_controls_section();

        /* ===================== STYLE TAB ===================== */

        // --- Form Container Style ---
        $this->start_controls_section( 'section_style_container_0e694386', [
            'label' => esc_html__( 'Form Container', 'angie-snippets' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );

        $this->add_group_control( Group_Control_Background::get_type(), [
            'name'     => 'form_background_0e694386',
            'types'    => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .ifw-form-0e694386',
        ] );

        $this->add_responsive_control( 'form_padding_0e694386', [
            'label'      => esc_html__( 'Padding', 'angie-snippets' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'default'    => [ 'top' => '40', 'right' => '40', 'bottom' => '40', 'left' => '40', 'unit' => 'px', 'isLinked' => true ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-form-0e694386' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->add_group_control( Group_Control_Border::get_type(), [
            'name'     => 'form_border_0e694386',
            'selector' => '{{WRAPPER}} .ifw-form-0e694386',
        ] );

        $this->add_responsive_control( 'form_border_radius_0e694386', [
            'label'      => esc_html__( 'Border Radius', 'angie-snippets' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'default'    => [ 'top' => '16', 'right' => '16', 'bottom' => '16', 'left' => '16', 'unit' => 'px', 'isLinked' => true ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-form-0e694386' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
            'name'     => 'form_box_shadow_0e694386',
            'selector' => '{{WRAPPER}} .ifw-form-0e694386',
        ] );

        $this->end_controls_section();

        // --- Section Labels Style ---
        $this->start_controls_section( 'section_style_labels_0e694386', [
            'label' => esc_html__( 'Section Labels', 'angie-snippets' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'label_color_0e694386', [
            'label'     => esc_html__( 'Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ifw-section-label-0e694386' => 'color: {{VALUE}};',
            ],
        ] );

        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'label_typography_0e694386',
            'selector' => '{{WRAPPER}} .ifw-section-label-0e694386',
        ] );

        $this->add_responsive_control( 'label_margin_bottom_0e694386', [
            'label'      => esc_html__( 'Spacing Below', 'angie-snippets' ),
            'type'       => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 0, 'max' => 50 ] ],
            'default'    => [ 'size' => 12, 'unit' => 'px' ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-section-label-0e694386' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ] );

        $this->end_controls_section();

        // --- Option Buttons Style ---
        $this->start_controls_section( 'section_style_option_buttons_0e694386', [
            'label' => esc_html__( 'Option Buttons', 'angie-snippets' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );

        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'option_btn_typography_0e694386',
            'selector' => '{{WRAPPER}} .ifw-option-btn-0e694386',
        ] );

        $this->add_responsive_control( 'option_btn_padding_0e694386', [
            'label'      => esc_html__( 'Padding', 'angie-snippets' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em' ],
            'default'    => [ 'top' => '8', 'right' => '20', 'bottom' => '8', 'left' => '20', 'unit' => 'px', 'isLinked' => false ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-option-btn-0e694386' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->add_responsive_control( 'option_btn_gap_0e694386', [
            'label'      => esc_html__( 'Gap Between Buttons', 'angie-snippets' ),
            'type'       => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 0, 'max' => 30 ] ],
            'default'    => [ 'size' => 8, 'unit' => 'px' ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-options-wrap-0e694386' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ] );

        $this->add_responsive_control( 'option_btn_border_radius_0e694386', [
            'label'      => esc_html__( 'Border Radius', 'angie-snippets' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'default'    => [ 'top' => '30', 'right' => '30', 'bottom' => '30', 'left' => '30', 'unit' => 'px', 'isLinked' => true ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-option-btn-0e694386' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->start_controls_tabs( 'option_btn_tabs_0e694386' );

        $this->start_controls_tab( 'option_btn_normal_tab_0e694386', [
            'label' => esc_html__( 'Normal', 'angie-snippets' ),
        ] );
        $this->add_control( 'option_btn_color_0e694386', [
            'label'     => esc_html__( 'Text Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ifw-option-btn-0e694386' => 'color: {{VALUE}};',
            ],
        ] );
        $this->add_control( 'option_btn_bg_color_0e694386', [
            'label'     => esc_html__( 'Background Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => 'transparent',
            'selectors' => [
                '{{WRAPPER}} .ifw-option-btn-0e694386' => 'background-color: {{VALUE}};',
            ],
        ] );
        $this->add_group_control( Group_Control_Border::get_type(), [
            'name'     => 'option_btn_border_0e694386',
            'selector' => '{{WRAPPER}} .ifw-option-btn-0e694386',
            'fields_options' => [
                'border' => [ 'default' => 'solid' ],
                'width'  => [ 'default' => [ 'top' => '1', 'right' => '1', 'bottom' => '1', 'left' => '1', 'isLinked' => true ] ],
                'color'  => [ 'default' => 'rgba(255,255,255,0.3)' ],
            ],
        ] );
        $this->end_controls_tab();

        $this->start_controls_tab( 'option_btn_hover_tab_0e694386', [
            'label' => esc_html__( 'Hover', 'angie-snippets' ),
        ] );
        $this->add_control( 'option_btn_hover_color_0e694386', [
            'label'     => esc_html__( 'Text Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ifw-option-btn-0e694386:hover' => 'color: {{VALUE}};',
            ],
        ] );
        $this->add_control( 'option_btn_hover_bg_0e694386', [
            'label'     => esc_html__( 'Background Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => 'rgba(255,255,255,0.1)',
            'selectors' => [
                '{{WRAPPER}} .ifw-option-btn-0e694386:hover' => 'background-color: {{VALUE}};',
            ],
        ] );
        $this->add_control( 'option_btn_hover_border_color_0e694386', [
            'label'     => esc_html__( 'Border Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => 'rgba(255,255,255,0.6)',
            'selectors' => [
                '{{WRAPPER}} .ifw-option-btn-0e694386:hover' => 'border-color: {{VALUE}};',
            ],
        ] );
        $this->end_controls_tab();

        $this->start_controls_tab( 'option_btn_active_tab_0e694386', [
            'label' => esc_html__( 'Active', 'angie-snippets' ),
        ] );
        $this->add_control( 'option_btn_active_color_0e694386', [
            'label'     => esc_html__( 'Text Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ifw-option-btn-0e694386.is-active-0e694386' => 'color: {{VALUE}};',
            ],
        ] );
        $this->add_control( 'option_btn_active_bg_0e694386', [
            'label'     => esc_html__( 'Background Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => 'rgba(255,255,255,0.15)',
            'selectors' => [
                '{{WRAPPER}} .ifw-option-btn-0e694386.is-active-0e694386' => 'background-color: {{VALUE}};',
            ],
        ] );
        $this->add_control( 'option_btn_active_border_color_0e694386', [
            'label'     => esc_html__( 'Border Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ifw-option-btn-0e694386.is-active-0e694386' => 'border-color: {{VALUE}};',
            ],
        ] );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // --- Input Fields Style ---
        $this->start_controls_section( 'section_style_fields_0e694386', [
            'label' => esc_html__( 'Input Fields', 'angie-snippets' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'field_text_color_0e694386', [
            'label'     => esc_html__( 'Text Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ifw-field-0e694386' => 'color: {{VALUE}};',
            ],
        ] );

        $this->add_control( 'field_placeholder_color_0e694386', [
            'label'     => esc_html__( 'Placeholder Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => 'rgba(255,255,255,0.5)',
            'selectors' => [
                '{{WRAPPER}} .ifw-field-0e694386::placeholder' => 'color: {{VALUE}};',
            ],
        ] );

        $this->add_control( 'field_bg_color_0e694386', [
            'label'     => esc_html__( 'Background Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => 'transparent',
            'selectors' => [
                '{{WRAPPER}} .ifw-field-0e694386' => 'background-color: {{VALUE}};',
            ],
        ] );

        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'field_typography_0e694386',
            'selector' => '{{WRAPPER}} .ifw-field-0e694386',
        ] );

        $this->add_group_control( Group_Control_Border::get_type(), [
            'name'     => 'field_border_0e694386',
            'selector' => '{{WRAPPER}} .ifw-field-0e694386',
            'fields_options' => [
                'border' => [ 'default' => 'solid' ],
                'width'  => [ 'default' => [ 'top' => '0', 'right' => '0', 'bottom' => '1', 'left' => '0', 'isLinked' => false ] ],
                'color'  => [ 'default' => 'rgba(255,255,255,0.2)' ],
            ],
        ] );

        $this->add_responsive_control( 'field_border_radius_0e694386', [
            'label'      => esc_html__( 'Border Radius', 'angie-snippets' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-field-0e694386' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->add_responsive_control( 'field_padding_0e694386', [
            'label'      => esc_html__( 'Padding', 'angie-snippets' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em' ],
            'default'    => [ 'top' => '12', 'right' => '0', 'bottom' => '12', 'left' => '0', 'unit' => 'px', 'isLinked' => false ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-field-0e694386' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->add_control( 'field_focus_border_color_0e694386', [
            'label'     => esc_html__( 'Focus Border Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ifw-field-0e694386:focus' => 'border-color: {{VALUE}};',
            ],
        ] );

        $this->add_responsive_control( 'field_spacing_0e694386', [
            'label'      => esc_html__( 'Spacing Between Fields', 'angie-snippets' ),
            'type'       => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 0, 'max' => 50 ] ],
            'default'    => [ 'size' => 20, 'unit' => 'px' ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-field-group-0e694386' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .ifw-section-group-0e694386' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ] );

        $this->end_controls_section();

        // --- File Upload Style ---
        $this->start_controls_section( 'section_style_file_upload_0e694386', [
            'label'     => esc_html__( 'File Upload', 'angie-snippets' ),
            'tab'       => Controls_Manager::TAB_STYLE,
            'condition' => [ 'show_file_upload_0e694386' => 'yes' ],
        ] );

        $this->add_control( 'file_label_color_0e694386', [
            'label'     => esc_html__( 'Label Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ifw-file-label-0e694386' => 'color: {{VALUE}};',
            ],
        ] );

        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'file_label_typography_0e694386',
            'selector' => '{{WRAPPER}} .ifw-file-label-0e694386',
        ] );

        $this->add_control( 'file_dropzone_bg_0e694386', [
            'label'     => esc_html__( 'Dropzone Background', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => 'transparent',
            'selectors' => [
                '{{WRAPPER}} .ifw-dropzone-0e694386' => 'background-color: {{VALUE}};',
            ],
        ] );

        $this->add_control( 'file_dropzone_text_color_0e694386', [
            'label'     => esc_html__( 'Dropzone Text Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => 'rgba(255,255,255,0.5)',
            'selectors' => [
                '{{WRAPPER}} .ifw-dropzone-text-0e694386' => 'color: {{VALUE}};',
            ],
        ] );

        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'file_dropzone_typography_0e694386',
            'selector' => '{{WRAPPER}} .ifw-dropzone-text-0e694386',
        ] );

        $this->add_group_control( Group_Control_Border::get_type(), [
            'name'     => 'file_dropzone_border_0e694386',
            'selector' => '{{WRAPPER}} .ifw-dropzone-0e694386',
            'fields_options' => [
                'border' => [ 'default' => 'dashed' ],
                'width'  => [ 'default' => [ 'top' => '1', 'right' => '1', 'bottom' => '1', 'left' => '1', 'isLinked' => true ] ],
                'color'  => [ 'default' => 'rgba(255,255,255,0.2)' ],
            ],
        ] );

        $this->add_responsive_control( 'file_dropzone_border_radius_0e694386', [
            'label'      => esc_html__( 'Dropzone Border Radius', 'angie-snippets' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'default'    => [ 'top' => '8', 'right' => '8', 'bottom' => '8', 'left' => '8', 'unit' => 'px', 'isLinked' => true ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-dropzone-0e694386' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->add_responsive_control( 'file_dropzone_padding_0e694386', [
            'label'      => esc_html__( 'Dropzone Padding', 'angie-snippets' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em' ],
            'default'    => [ 'top' => '20', 'right' => '20', 'bottom' => '20', 'left' => '20', 'unit' => 'px', 'isLinked' => true ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-dropzone-0e694386' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->end_controls_section();

        // --- reCAPTCHA Style ---
        $this->start_controls_section( 'section_style_recaptcha_0e694386', [
            'label'     => esc_html__( 'reCAPTCHA', 'angie-snippets' ),
            'tab'       => Controls_Manager::TAB_STYLE,
            'condition' => [ 'enable_recaptcha_0e694386' => 'yes' ],
        ] );

        $this->add_responsive_control( 'recaptcha_alignment_0e694386', [
            'label'   => esc_html__( 'Alignment', 'angie-snippets' ),
            'type'    => Controls_Manager::CHOOSE,
            'options' => [
                'flex-start' => [ 'title' => esc_html__( 'Left', 'angie-snippets' ), 'icon' => 'eicon-text-align-left' ],
                'center'     => [ 'title' => esc_html__( 'Center', 'angie-snippets' ), 'icon' => 'eicon-text-align-center' ],
                'flex-end'   => [ 'title' => esc_html__( 'Right', 'angie-snippets' ), 'icon' => 'eicon-text-align-right' ],
            ],
            'default'   => 'flex-start',
            'selectors' => [
                '{{WRAPPER}} .ifw-recaptcha-wrap-0e694386' => 'justify-content: {{VALUE}};',
            ],
        ] );

        $this->add_responsive_control( 'recaptcha_spacing_0e694386', [
            'label'      => esc_html__( 'Spacing Below', 'angie-snippets' ),
            'type'       => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 0, 'max' => 60 ] ],
            'default'    => [ 'size' => 20, 'unit' => 'px' ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-recaptcha-wrap-0e694386' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ] );

        $this->end_controls_section();

        // --- Submit Button Style ---
        $this->start_controls_section( 'section_style_submit_0e694386', [
            'label' => esc_html__( 'Submit Button', 'angie-snippets' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );

        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'submit_typography_0e694386',
            'selector' => '{{WRAPPER}} .ifw-submit-btn-0e694386',
        ] );

        $this->add_responsive_control( 'submit_padding_0e694386', [
            'label'      => esc_html__( 'Padding', 'angie-snippets' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em' ],
            'default'    => [ 'top' => '16', 'right' => '40', 'bottom' => '16', 'left' => '40', 'unit' => 'px', 'isLinked' => false ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-submit-btn-0e694386' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->add_responsive_control( 'submit_border_radius_0e694386', [
            'label'      => esc_html__( 'Border Radius', 'angie-snippets' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'default'    => [ 'top' => '30', 'right' => '30', 'bottom' => '30', 'left' => '30', 'unit' => 'px', 'isLinked' => true ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-submit-btn-0e694386' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->add_control( 'submit_width_0e694386', [
            'label'   => esc_html__( 'Full Width', 'angie-snippets' ),
            'type'    => Controls_Manager::SWITCHER,
            'default' => 'yes',
            'selectors' => [
                '{{WRAPPER}} .ifw-submit-btn-0e694386' => 'width: 100%;',
            ],
            'condition' => [ 'submit_width_0e694386' => 'yes' ],
        ] );

        $this->start_controls_tabs( 'submit_btn_tabs_0e694386' );

        $this->start_controls_tab( 'submit_btn_normal_tab_0e694386', [
            'label' => esc_html__( 'Normal', 'angie-snippets' ),
        ] );
        $this->add_control( 'submit_color_0e694386', [
            'label'     => esc_html__( 'Text Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#0a0f1e',
            'selectors' => [
                '{{WRAPPER}} .ifw-submit-btn-0e694386' => 'color: {{VALUE}};',
            ],
        ] );
        $this->add_control( 'submit_bg_color_0e694386', [
            'label'     => esc_html__( 'Background Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ifw-submit-btn-0e694386' => 'background-color: {{VALUE}};',
            ],
        ] );
        $this->add_group_control( Group_Control_Border::get_type(), [
            'name'     => 'submit_border_0e694386',
            'selector' => '{{WRAPPER}} .ifw-submit-btn-0e694386',
        ] );
        $this->add_group_control( Group_Control_Box_Shadow::get_type(), [
            'name'     => 'submit_box_shadow_0e694386',
            'selector' => '{{WRAPPER}} .ifw-submit-btn-0e694386',
        ] );
        $this->end_controls_tab();

        $this->start_controls_tab( 'submit_btn_hover_tab_0e694386', [
            'label' => esc_html__( 'Hover', 'angie-snippets' ),
        ] );
        $this->add_control( 'submit_hover_color_0e694386', [
            'label'     => esc_html__( 'Text Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [
                '{{WRAPPER}} .ifw-submit-btn-0e694386:hover' => 'color: {{VALUE}};',
            ],
        ] );
        $this->add_control( 'submit_hover_bg_0e694386', [
            'label'     => esc_html__( 'Background Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#333333',
            'selectors' => [
                '{{WRAPPER}} .ifw-submit-btn-0e694386:hover' => 'background-color: {{VALUE}};',
            ],
        ] );
        $this->add_control( 'submit_hover_border_color_0e694386', [
            'label'     => esc_html__( 'Border Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .ifw-submit-btn-0e694386:hover' => 'border-color: {{VALUE}};',
            ],
        ] );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_responsive_control( 'submit_margin_top_0e694386', [
            'label'      => esc_html__( 'Top Spacing', 'angie-snippets' ),
            'type'       => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 0, 'max' => 60 ] ],
            'default'    => [ 'size' => 24, 'unit' => 'px' ],
            'separator'  => 'before',
            'selectors'  => [
                '{{WRAPPER}} .ifw-submit-wrap-0e694386' => 'margin-top: {{SIZE}}{{UNIT}};',
            ],
        ] );

        $this->end_controls_section();

        // --- Success Message Style ---
        $this->start_controls_section( 'section_style_success_0e694386', [
            'label' => esc_html__( 'Success Message', 'angie-snippets' ),
            'tab'   => Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'success_text_color_0e694386', [
            'label'     => esc_html__( 'Text Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => '#4ade80',
            'selectors' => [
                '{{WRAPPER}} .ifw-success-msg-0e694386' => 'color: {{VALUE}};',
            ],
        ] );

        $this->add_group_control( Group_Control_Typography::get_type(), [
            'name'     => 'success_typography_0e694386',
            'selector' => '{{WRAPPER}} .ifw-success-msg-0e694386',
        ] );

        $this->add_control( 'success_bg_color_0e694386', [
            'label'     => esc_html__( 'Background Color', 'angie-snippets' ),
            'type'      => Controls_Manager::COLOR,
            'default'   => 'rgba(74,222,128,0.1)',
            'selectors' => [
                '{{WRAPPER}} .ifw-success-msg-0e694386' => 'background-color: {{VALUE}};',
            ],
        ] );

        $this->add_responsive_control( 'success_padding_0e694386', [
            'label'      => esc_html__( 'Padding', 'angie-snippets' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'default'    => [ 'top' => '16', 'right' => '16', 'bottom' => '16', 'left' => '16', 'unit' => 'px', 'isLinked' => true ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-success-msg-0e694386' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->add_responsive_control( 'success_border_radius_0e694386', [
            'label'      => esc_html__( 'Border Radius', 'angie-snippets' ),
            'type'       => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'default'    => [ 'top' => '8', 'right' => '8', 'bottom' => '8', 'left' => '8', 'unit' => 'px', 'isLinked' => true ],
            'selectors'  => [
                '{{WRAPPER}} .ifw-success-msg-0e694386' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $widget_id = $this->get_id();
        $recaptcha_enabled = $settings['enable_recaptcha_0e694386'] === 'yes';
        $recaptcha_site_key = ! empty( $settings['recaptcha_site_key_0e694386'] ) ? $settings['recaptcha_site_key_0e694386'] : '';
        $recaptcha_secret_key = ! empty( $settings['recaptcha_secret_key_0e694386'] ) ? $settings['recaptcha_secret_key_0e694386'] : '';
        $recaptcha_theme = ! empty( $settings['recaptcha_theme_0e694386'] ) ? $settings['recaptcha_theme_0e694386'] : 'dark';
        $recaptcha_size = ! empty( $settings['recaptcha_size_0e694386'] ) ? $settings['recaptcha_size_0e694386'] : 'normal';

        $smtp_enabled = $settings['enable_smtp_0e694386'] === 'yes';

        /* Enqueue reCAPTCHA script if enabled */
        if ( $recaptcha_enabled && ! empty( $recaptcha_site_key ) ) {
            wp_enqueue_script( 'google-recaptcha', 'https://www.google.com/recaptcha/api.js', [], null, true );
        }
        ?>
        <div class="ifw-form-0e694386" data-widget-id="<?php echo esc_attr( $widget_id ); ?>">
            <form class="ifw-form-inner-0e694386" novalidate>

                <div class="ifw-section-group-0e694386">
                    <div class="ifw-section-label-0e694386"><?php echo esc_html( $settings['service_label_0e694386'] ); ?></div>
                    <div class="ifw-options-wrap-0e694386" data-group="service" data-multiple="<?php echo esc_attr( $settings['service_allow_multiple_0e694386'] ); ?>">
                        <?php foreach ( $settings['service_options_0e694386'] as $item ) :
                            $active_class = ( ! empty( $item['service_selected_0e694386'] ) && $item['service_selected_0e694386'] === 'yes' ) ? ' is-active-0e694386' : '';
                        ?>
                            <button type="button" class="ifw-option-btn-0e694386<?php echo esc_attr( $active_class ); ?>" data-value="<?php echo esc_attr( $item['service_value_0e694386'] ); ?>">
                                <?php echo esc_html( $item['service_text_0e694386'] ); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="ifw-section-group-0e694386">
                    <div class="ifw-section-label-0e694386"><?php echo esc_html( $settings['budget_label_0e694386'] ); ?></div>
                    <div class="ifw-options-wrap-0e694386" data-group="budget" data-multiple="no">
                        <?php foreach ( $settings['budget_options_0e694386'] as $item ) : ?>
                            <button type="button" class="ifw-option-btn-0e694386" data-value="<?php echo esc_attr( $item['budget_value_0e694386'] ); ?>">
                                <?php echo esc_html( $item['budget_text_0e694386'] ); ?>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="ifw-fields-row-0e694386">
                    <div class="ifw-field-group-0e694386 ifw-half-0e694386">
                        <input type="text" class="ifw-field-0e694386" name="fullname" placeholder="<?php echo esc_attr( $settings['fullname_placeholder_0e694386'] ); ?>" required />
                    </div>
                    <div class="ifw-field-group-0e694386 ifw-half-0e694386">
                        <input type="email" class="ifw-field-0e694386" name="email" placeholder="<?php echo esc_attr( $settings['email_placeholder_0e694386'] ); ?>" required />
                    </div>
                </div>

                <div class="ifw-field-group-0e694386">
                    <textarea class="ifw-field-0e694386" name="details" rows="<?php echo esc_attr( $settings['details_rows_0e694386'] ); ?>" placeholder="<?php echo esc_attr( $settings['details_placeholder_0e694386'] ); ?>" required></textarea>
                </div>

                <?php if ( $settings['show_file_upload_0e694386'] === 'yes' ) : ?>
                <div class="ifw-field-group-0e694386">
                    <div class="ifw-file-label-0e694386"><?php echo esc_html( $settings['file_upload_label_0e694386'] ); ?></div>
                    <div class="ifw-dropzone-0e694386" data-max-size="<?php echo esc_attr( $settings['file_max_size_0e694386'] ); ?>">
                        <input type="file" class="ifw-file-input-0e694386" accept="<?php echo esc_attr( $settings['file_accepted_types_0e694386'] ); ?>" />
                        <span class="ifw-dropzone-text-0e694386"><?php echo esc_html( $settings['file_upload_text_0e694386'] ); ?></span>
                        <span class="ifw-file-name-0e694386"></span>
                    </div>
                </div>
                <?php endif; ?>

                <?php /* --- reCAPTCHA before Submit Button --- */ ?>
                <?php if ( $recaptcha_enabled && ! empty( $recaptcha_site_key ) ) : ?>
                <div class="ifw-recaptcha-wrap-0e694386">
                    <div class="g-recaptcha" data-sitekey="<?php echo esc_attr( $recaptcha_site_key ); ?>" data-theme="<?php echo esc_attr( $recaptcha_theme ); ?>" data-size="<?php echo esc_attr( $recaptcha_size ); ?>"></div>
                    <div class="ifw-recaptcha-error-0e694386" style="display:none;"></div>
                </div>
                <?php endif; ?>

                <div class="ifw-submit-wrap-0e694386">
                    <button type="submit" class="ifw-submit-btn-0e694386">
                        <?php echo esc_html( $settings['submit_text_0e694386'] ); ?>
                    </button>
                </div>

                <div class="ifw-success-msg-0e694386" style="display:none;">
                    <?php echo esc_html( $settings['success_message_0e694386'] ); ?>
                </div>
                <div class="ifw-error-response-0e694386" style="display:none;"></div>

                <input type="hidden" name="action" value="ifw_submit_0e694386" />
                <input type="hidden" name="ifw_nonce_0e694386" value="<?php echo esc_attr( wp_create_nonce( 'ifw_form_nonce_0e694386' ) ); ?>" />
                <input type="hidden" name="ifw_to_0e694386" value="<?php echo esc_attr( $settings['submit_email_to_0e694386'] ); ?>" />
                <input type="hidden" name="ifw_subject_0e694386" value="<?php echo esc_attr( $settings['submit_email_subject_0e694386'] ); ?>" />
                <input type="hidden" name="ifw_action_type_0e694386" value="<?php echo esc_attr( $settings['submit_action_0e694386'] ); ?>" />
                <?php if ( $settings['submit_action_0e694386'] === 'redirect' && ! empty( $settings['submit_redirect_url_0e694386']['url'] ) ) : ?>
                    <input type="hidden" name="ifw_redirect_0e694386" value="<?php echo esc_url( $settings['submit_redirect_url_0e694386']['url'] ); ?>" />
                <?php endif; ?>

                <?php /* SMTP hidden fields - passed to AJAX */ ?>
                <?php if ( $recaptcha_enabled && ! empty( $recaptcha_secret_key ) ) : ?>
                    <input type="hidden" name="ifw_recaptcha_secret_0e694386" value="<?php echo esc_attr( $recaptcha_secret_key ); ?>" />
                <?php endif; ?>
                <?php if ( $smtp_enabled ) : ?>
                    <input type="hidden" name="ifw_smtp_host_0e694386" value="<?php echo esc_attr( $settings['smtp_host_0e694386'] ); ?>" />
                    <input type="hidden" name="ifw_smtp_port_0e694386" value="<?php echo esc_attr( $settings['smtp_port_0e694386'] ); ?>" />
                    <input type="hidden" name="ifw_smtp_encryption_0e694386" value="<?php echo esc_attr( $settings['smtp_encryption_0e694386'] ); ?>" />
                    <input type="hidden" name="ifw_smtp_username_0e694386" value="<?php echo esc_attr( $settings['smtp_username_0e694386'] ); ?>" />
                    <input type="hidden" name="ifw_smtp_password_0e694386" value="<?php echo esc_attr( $settings['smtp_password_0e694386'] ); ?>" />
                    <input type="hidden" name="ifw_smtp_from_email_0e694386" value="<?php echo esc_attr( $settings['smtp_from_email_0e694386'] ); ?>" />
                    <input type="hidden" name="ifw_smtp_from_name_0e694386" value="<?php echo esc_attr( $settings['smtp_from_name_0e694386'] ); ?>" />
                <?php endif; ?>
            </form>
        </div>
        <?php
    }

    protected function content_template() {
        ?>
        <#
        var serviceLabel = settings.service_label_0e694386 || 'Service';
        var budgetLabel = settings.budget_label_0e694386 || 'Budget';
        var serviceMultiple = settings.service_allow_multiple_0e694386 || 'yes';
        var recaptchaEnabled = settings.enable_recaptcha_0e694386 === 'yes';
        var recaptchaSiteKey = settings.recaptcha_site_key_0e694386 || '';
        var recaptchaTheme = settings.recaptcha_theme_0e694386 || 'dark';
        var recaptchaSize = settings.recaptcha_size_0e694386 || 'normal';
        #>
        <div class="ifw-form-0e694386">
            <form class="ifw-form-inner-0e694386" novalidate>

                <div class="ifw-section-group-0e694386">
                    <div class="ifw-section-label-0e694386">{{{ serviceLabel }}}</div>
                    <div class="ifw-options-wrap-0e694386" data-group="service" data-multiple="{{ serviceMultiple }}">
                        <# _.each( settings.service_options_0e694386, function( item ) {
                            var activeClass = ( item.service_selected_0e694386 === 'yes' ) ? ' is-active-0e694386' : '';
                        #>
                            <button type="button" class="ifw-option-btn-0e694386{{ activeClass }}" data-value="{{ item.service_value_0e694386 }}">
                                {{{ item.service_text_0e694386 }}}
                            </button>
                        <# }); #>
                    </div>
                </div>

                <div class="ifw-section-group-0e694386">
                    <div class="ifw-section-label-0e694386">{{{ budgetLabel }}}</div>
                    <div class="ifw-options-wrap-0e694386" data-group="budget" data-multiple="no">
                        <# _.each( settings.budget_options_0e694386, function( item ) { #>
                            <button type="button" class="ifw-option-btn-0e694386" data-value="{{ item.budget_value_0e694386 }}">
                                {{{ item.budget_text_0e694386 }}}
                            </button>
                        <# }); #>
                    </div>
                </div>

                <div class="ifw-fields-row-0e694386">
                    <div class="ifw-field-group-0e694386 ifw-half-0e694386">
                        <input type="text" class="ifw-field-0e694386" placeholder="{{ settings.fullname_placeholder_0e694386 }}" />
                    </div>
                    <div class="ifw-field-group-0e694386 ifw-half-0e694386">
                        <input type="email" class="ifw-field-0e694386" placeholder="{{ settings.email_placeholder_0e694386 }}" />
                    </div>
                </div>

                <div class="ifw-field-group-0e694386">
                    <textarea class="ifw-field-0e694386" rows="{{ settings.details_rows_0e694386 }}" placeholder="{{ settings.details_placeholder_0e694386 }}"></textarea>
                </div>

                <# if ( settings.show_file_upload_0e694386 === 'yes' ) { #>
                <div class="ifw-field-group-0e694386">
                    <div class="ifw-file-label-0e694386">{{{ settings.file_upload_label_0e694386 }}}</div>
                    <div class="ifw-dropzone-0e694386">
                        <span class="ifw-dropzone-text-0e694386">{{{ settings.file_upload_text_0e694386 }}}</span>
                    </div>
                </div>
                <# } #>

                <# if ( recaptchaEnabled && recaptchaSiteKey ) { #>
                <div class="ifw-recaptcha-wrap-0e694386">
                    <div class="ifw-recaptcha-placeholder-0e694386">
                        <svg width="256" height="60" viewBox="0 0 256 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="256" height="60" rx="4" fill="#222222"/>
                            <rect x="12" y="16" width="28" height="28" rx="3" stroke="#555" stroke-width="2" fill="none"/>
                            <text x="52" y="34" fill="#999" font-size="12" font-family="Arial">I'm not a robot</text>
                            <text x="160" y="28" fill="#666" font-size="8" font-family="Arial">reCAPTCHA</text>
                            <text x="160" y="42" fill="#555" font-size="7" font-family="Arial">Privacy - Terms</text>
                        </svg>
                    </div>
                </div>
                <# } #>

                <div class="ifw-submit-wrap-0e694386">
                    <button type="button" class="ifw-submit-btn-0e694386">
                        {{{ settings.submit_text_0e694386 }}}
                    </button>
                </div>
            </form>
        </div>
        <?php
    }
}
