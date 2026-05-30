<?php
namespace AngieSnippets;
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Custom_Button_d1aeb1d9 extends \Elementor\Widget_Base {
    public function get_name() { return 'custom_button_d1aeb1d9'; }
    public function get_title() { return esc_html__( 'Custom Button', 'angie-snippets' ); }
    public function get_icon() { return 'eicon-button'; }
    public function get_categories() { return [ 'angie-widgets', 'general' ]; }
    public function get_style_depends() { return [ 'custom-button-style-d1aeb1d9' ]; }

    protected function register_controls() {
        $this->start_controls_section( 'content_section', [
            'label' => esc_html__( 'Content', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'text', [
            'label' => esc_html__( 'Text', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Get in touch', 'angie-snippets' ),
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
                'value' => 'fas fa-arrow-up-right-from-square',
                'library' => 'fa-solid',
            ],
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'style_section', [
            'label' => esc_html__( 'Style', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'button_width', [
            'label' => esc_html__( 'Width', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'vw' ],
            'range' => [
                'px' => [ 'min' => 50, 'max' => 1000, 'step' => 1 ],
                '%' => [ 'min' => 10, 'max' => 100 ],
            ],
            'selectors' => [
                '{{WRAPPER}} .custom-btn-wrapper-d1aeb1d9' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ] );

        $this->add_control( 'button_padding', [
            'label' => esc_html__( 'Padding', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .custom-btn-wrapper-d1aeb1d9' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->add_control( 'bg_color', [
            'label' => esc_html__( 'Background Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .custom-btn-wrapper-d1aeb1d9' => 'background-color: {{VALUE}};',
            ],
            'default' => '#bbf73e',
        ] );

        $this->add_control( 'text_color', [
            'label' => esc_html__( 'Text Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .custom-btn-wrapper-d1aeb1d9 .btn-text' => 'color: {{VALUE}};',
            ],
            'default' => '#111827',
        ] );

        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
            'name' => 'typography',
            'selector' => '{{WRAPPER}} .custom-btn-wrapper-d1aeb1d9 .btn-text',
        ] );
        
        $this->add_control( 'button_border_radius', [
            'label' => esc_html__( 'Button Border Radius', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .custom-btn-wrapper-d1aeb1d9' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );
		
		$this->add_control( 'icon_bg_color', [
            'label' => esc_html__( 'Icon Background Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .custom-btn-wrapper-d1aeb1d9 .btn-icon' => 'background-color: {{VALUE}};',
            ],
            'default' => '#ffffff',
        ] );
        
        $this->add_control( 'icon_bg_size', [
            'label' => esc_html__( 'Icon Background Size', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 20,
                    'max' => 150,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 60,
            ],
            'selectors' => [
                '{{WRAPPER}} .custom-btn-wrapper-d1aeb1d9 .btn-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
        ] );

        $this->add_control( 'icon_color', [
            'label' => esc_html__( 'Icon Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .custom-btn-wrapper-d1aeb1d9 .btn-icon i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .custom-btn-wrapper-d1aeb1d9 .btn-icon svg' => 'fill: {{VALUE}};',
            ],
            'default' => '#111827',
        ] );
        
        $this->add_control( 'icon_size', [
            'label' => esc_html__( 'Icon Size', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 10,
                    'max' => 100,
                    'step' => 1,
                ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 24,
            ],
            'selectors' => [
                '{{WRAPPER}} .custom-btn-wrapper-d1aeb1d9 .btn-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .custom-btn-wrapper-d1aeb1d9 .btn-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
        ] );
        
        $this->add_control( 'icon_border_radius', [
            'label' => esc_html__( 'Icon Border Radius', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .custom-btn-wrapper-d1aeb1d9 .btn-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        $target = $settings['link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['link']['nofollow'] ? ' rel="nofollow"' : '';
        
        ?>
        <a href="<?php echo esc_url( $settings['link']['url'] ); ?>" class="custom-btn-wrapper-d1aeb1d9" <?php echo $target . $nofollow; ?>>
            <span class="btn-text"><?php echo esc_html( $settings['text'] ); ?></span>
            <span class="btn-icon">
                <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
            </span>
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
        <a href="{{ settings.link.url }}" class="custom-btn-wrapper-d1aeb1d9" {{{ target }}} {{{ nofollow }}}>
            <span class="btn-text">{{{ settings.text }}}</span>
            <span class="btn-icon">
                <# if ( iconHTML && iconHTML.value ) { #>
                    {{{ iconHTML.value }}}
                <# } #>
            </span>
        </a>
        <?php
    }
}