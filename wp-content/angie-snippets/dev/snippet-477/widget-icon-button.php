<?php
namespace AngieSnippets;
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Icon_Button_fa685551 extends \Elementor\Widget_Base {
    public function get_name() { return 'icon_button_fa685551'; }
    public function get_title() { return esc_html__( 'Icon Button', 'angie-snippets' ); }
    public function get_icon() { return 'eicon-button'; }
    public function get_categories() { return [ 'angie-widgets', 'general' ]; }
    public function get_style_depends() { return [ 'icon-button-style-fa685551' ]; }

    protected function register_controls() {
        $this->start_controls_section( 'content_section', [
            'label' => esc_html__( 'Content', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'link', [
            'label' => esc_html__( 'Link', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => esc_html__( 'https://your-link.com', 'angie-snippets' ),
            'default' => [
                'url' => '#',
            ],
        ] );

        $this->add_control( 'icon', [
            'label' => esc_html__( 'Icon', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-arrow-up-right',
                'library' => 'fa-solid',
            ],
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'style_section', [
            'label' => esc_html__( 'Style', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'bg_size', [
            'label' => esc_html__( 'Background Size', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'em', 'rem' ],
            'range' => [
                'px' => [ 'min' => 20, 'max' => 200 ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 60,
            ],
            'selectors' => [
                '{{WRAPPER}} .icon-btn-fa685551' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
        ] );

        $this->add_control( 'icon_size', [
            'label' => esc_html__( 'Icon Size', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'em', 'rem' ],
            'range' => [
                'px' => [ 'min' => 10, 'max' => 100 ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 24,
            ],
            'selectors' => [
                '{{WRAPPER}} .icon-btn-fa685551 i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .icon-btn-fa685551 svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
        ] );

        $this->add_control( 'bg_color', [
            'label' => esc_html__( 'Background Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .icon-btn-fa685551' => 'background-color: {{VALUE}};',
            ],
            'default' => '#bbf73e',
        ] );

        $this->add_control( 'icon_color', [
            'label' => esc_html__( 'Icon Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .icon-btn-fa685551 i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .icon-btn-fa685551 svg' => 'fill: {{VALUE}};',
            ],
            'default' => '#111827',
        ] );

        $this->add_control( 'border_radius', [
            'label' => esc_html__( 'Border Radius', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'default' => [
                'top' => 16,
                'right' => 16,
                'bottom' => 16,
                'left' => 16,
                'unit' => 'px',
                'isLinked' => true,
            ],
            'selectors' => [
                '{{WRAPPER}} .icon-btn-fa685551' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        $target = $settings['link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
        
        ?>
        <a href="<?php echo esc_url( $settings['link']['url'] ); ?>" class="icon-btn-fa685551" <?php echo $target . $nofollow; ?>>
            <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
        </a>
        <?php
    }

    protected function content_template() {
        ?>
        <#
        var target = settings.link.is_external ? ' target="_blank"' : '';
        var nofollow = settings.link.nofollow ? ' rel="nofollow"' : '';
        var iconHTML = elementor.helpers.renderIcon( view, settings.icon, { 'aria-hidden': 'true' }, 'i', 'object' );
        #>
        <a href="{{ settings.link.url }}" class="icon-btn-fa685551" {{{ target }}} {{{ nofollow }}}>
            <# if ( iconHTML && iconHTML.value ) { #>
                {{{ iconHTML.value }}}
            <# } #>
        </a>
        <?php
    }
}