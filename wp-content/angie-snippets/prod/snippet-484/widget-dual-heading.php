<?php
namespace AngieSnippets;
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Dual_Heading_6e5b1bf5 extends \Elementor\Widget_Base {
    public function get_name() { return 'dual_heading_6e5b1bf5'; }
    public function get_title() { return esc_html__( 'Dual Font Heading', 'angie-snippets' ); }
    public function get_icon() { return 'eicon-heading'; }
    public function get_categories() { return [ 'angie-widgets', 'general' ]; }
    public function get_style_depends() { return [ 'dual-heading-style-6e5b1bf5' ]; }

    protected function register_controls() {
        $this->start_controls_section( 'content_section', [
            'label' => esc_html__( 'Content', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'title', [
            'label' => esc_html__( 'Title', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'dynamic' => [ 'active' => true ],
            'default' => esc_html__( 'See the difference, how our website & marketing strategy actually ', 'angie-snippets' ) . '<span>' . esc_html__( 'performs', 'angie-snippets' ) . '</span>',
            'description' => esc_html__( 'Wrap the word(s) you want to style differently in <span> tags.', 'angie-snippets' ),
        ] );

        $this->add_control( 'header_size', [
            'label' => esc_html__( 'HTML Tag', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'h1' => 'H1', 'h2' => 'H2', 'h3' => 'H3', 'h4' => 'H4', 'h5' => 'H5', 'h6' => 'H6', 'div' => 'div', 'span' => 'span', 'p' => 'p',
            ],
            'default' => 'h2',
        ] );

        $this->add_responsive_control( 'align', [
            'label' => esc_html__( 'Alignment', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [ 'title' => esc_html__( 'Left', 'angie-snippets' ), 'icon' => 'eicon-text-align-left' ],
                'center' => [ 'title' => esc_html__( 'Center', 'angie-snippets' ), 'icon' => 'eicon-text-align-center' ],
                'right' => [ 'title' => esc_html__( 'Right', 'angie-snippets' ), 'icon' => 'eicon-text-align-right' ],
                'justify' => [ 'title' => esc_html__( 'Justified', 'angie-snippets' ), 'icon' => 'eicon-text-align-justify' ],
            ],
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .dh-6e5b1bf5-title' => 'text-align: {{VALUE}};',
            ],
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'style_primary_section', [
            'label' => esc_html__( 'Primary Font Style', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'primary_color', [
            'label' => esc_html__( 'Text Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .dh-6e5b1bf5-title' => 'color: {{VALUE}};' ],
            'default' => '#111827',
        ] );

        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
            'name' => 'primary_typography',
            'selector' => '{{WRAPPER}} .dh-6e5b1bf5-title',
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'style_secondary_section', [
            'label' => esc_html__( 'Secondary Font Style (Inside <span>)', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'secondary_color', [
            'label' => esc_html__( 'Text Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .dh-6e5b1bf5-title span' => 'color: {{VALUE}};' ],
        ] );

        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
            'name' => 'secondary_typography',
            'selector' => '{{WRAPPER}} .dh-6e5b1bf5-title span',
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $tag = \Elementor\Utils::validate_html_tag( $settings['header_size'] );
        ?>
        <<?php echo $tag; ?> class="dh-6e5b1bf5-title">
            <?php echo wp_kses_post( $settings['title'] ); ?>
        </<?php echo $tag; ?>>
        <?php
    }

    protected function content_template() {
        ?>
        <#
        var tag = elementor.helpers.validateHTMLTag( settings.header_size );
        #>
        <{{{ tag }}} class="dh-6e5b1bf5-title">{{{ settings.title }}}</{{{ tag }}}>
        <?php
    }
}