<?php
namespace AngieSnippets;
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Sub_Heading_8958a847 extends \Elementor\Widget_Base {
    public function get_name() { return 'sub_heading_8958a847'; }
    public function get_title() { return esc_html__( 'Sub Heading', 'angie-snippets' ); }
    public function get_icon() { return 'eicon-heading'; }
    public function get_categories() { return [ 'angie-widgets', 'general' ]; }
    public function get_style_depends() { return [ 'sub-heading-style-8958a847' ]; }

    protected function register_controls() {
        $this->start_controls_section( 'content_section', [
            'label' => esc_html__( 'Content', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'title_text', [
            'label' => esc_html__( 'Title', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Our services', 'angie-snippets' ),
            'placeholder' => esc_html__( 'Enter your title', 'angie-snippets' ),
        ] );

        $this->add_control( 'header_size', [
            'label' => esc_html__( 'HTML Tag', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'h1' => 'H1',
                'h2' => 'H2',
                'h3' => 'H3',
                'h4' => 'H4',
                'h5' => 'H5',
                'h6' => 'H6',
                'div' => 'div',
                'span' => 'span',
                'p' => 'p',
            ],
            'default' => 'h3',
        ] );

        $this->add_control( 'icon_type', [
            'label' => esc_html__( 'Icon Type', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'icon' => [
                    'title' => esc_html__( 'Icon Library', 'angie-snippets' ),
                    'icon' => 'eicon-star',
                ],
                'image' => [
                    'title' => esc_html__( 'Image / SVG', 'angie-snippets' ),
                    'icon' => 'eicon-image',
                ],
            ],
            'default' => 'icon',
            'toggle' => false,
        ] );

        $this->add_control( 'selected_icon', [
            'label' => esc_html__( 'Icon', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'default' => [
                'value' => 'fas fa-check',
                'library' => 'fa-solid',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ] );

        $this->add_control( 'selected_image', [
            'label' => esc_html__( 'Choose Image / SVG', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'media_types' => [ 'image', 'svg' ],
            'condition' => [
                'icon_type' => 'image',
            ],
        ] );

        $this->add_control( 'link', [
            'label' => esc_html__( 'Link', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => esc_html__( 'https://your-link.com', 'angie-snippets' ),
            'default' => [
                'url' => '',
            ],
        ] );

        $this->end_controls_section();

        // Style Tab - General
        $this->start_controls_section( 'style_general_section', [
            'label' => esc_html__( 'General', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

        $this->add_responsive_control( 'alignment', [
            'label' => esc_html__( 'Alignment', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::CHOOSE,
            'options' => [
                'left' => [
                    'title' => esc_html__( 'Left', 'angie-snippets' ),
                    'icon' => 'eicon-text-align-left',
                ],
                'center' => [
                    'title' => esc_html__( 'Center', 'angie-snippets' ),
                    'icon' => 'eicon-text-align-center',
                ],
                'right' => [
                    'title' => esc_html__( 'Right', 'angie-snippets' ),
                    'icon' => 'eicon-text-align-right',
                ],
            ],
            'selectors' => [
                '{{WRAPPER}}' => 'text-align: {{VALUE}};',
                '{{WRAPPER}} .sh-container-8958a847' => 'justify-content: {{VALUE}};',
            ],
            'selectors_dictionary' => [
                'left' => 'flex-start',
                'center' => 'center',
                'right' => 'flex-end',
            ],
        ] );

        $this->add_responsive_control( 'gap', [
            'label' => esc_html__( 'Gap Between Icon & Text', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'default' => [
                'size' => 15,
                'unit' => 'px',
            ],
            'selectors' => [
                '{{WRAPPER}} .sh-wrapper-8958a847' => 'gap: {{SIZE}}{{UNIT}};',
            ],
        ] );

        $this->end_controls_section();

        // Style Tab - Text
        $this->start_controls_section( 'style_text_section', [
            'label' => esc_html__( 'Text', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

        $this->start_controls_tabs( 'text_colors_tabs' );

        $this->start_controls_tab( 'text_normal', [
            'label' => esc_html__( 'Normal', 'angie-snippets' ),
        ] );

        $this->add_control( 'text_color', [
            'label' => esc_html__( 'Text Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sh-text-8958a847' => 'color: {{VALUE}};',
            ],
        ] );

        $this->end_controls_tab();

        $this->start_controls_tab( 'text_hover', [
            'label' => esc_html__( 'Hover', 'angie-snippets' ),
        ] );

        $this->add_control( 'text_hover_color', [
            'label' => esc_html__( 'Text Hover Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sh-wrapper-8958a847:hover .sh-text-8958a847' => 'color: {{VALUE}};',
            ],
        ] );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
            'name' => 'text_typography',
            'selector' => '{{WRAPPER}} .sh-text-8958a847',
            'separator' => 'before',
        ] );

        $this->add_group_control( \Elementor\Group_Control_Text_Shadow::get_type(), [
            'name' => 'text_shadow',
            'selector' => '{{WRAPPER}} .sh-text-8958a847',
        ] );

        $this->end_controls_section();

        // Style Tab - Icon
        $this->start_controls_section( 'style_icon_section', [
            'label' => esc_html__( 'Icon / Image', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

        $this->add_responsive_control( 'icon_size', [
            'label' => esc_html__( 'Size', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 200,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sh-icon-8958a847' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .sh-icon-8958a847 svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .sh-icon-8958a847 img' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
            ],
        ] );

        $this->start_controls_tabs( 'icon_colors_tabs' );

        $this->start_controls_tab( 'icon_normal', [
            'label' => esc_html__( 'Normal', 'angie-snippets' ),
        ] );

        $this->add_control( 'icon_color', [
            'label' => esc_html__( 'Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sh-icon-8958a847' => 'color: {{VALUE}};',
                '{{WRAPPER}} .sh-icon-8958a847 svg' => 'fill: {{VALUE}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ] );
        
        $this->add_control( 'icon_bg_color', [
            'label' => esc_html__( 'Background Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sh-icon-8958a847' => 'background-color: {{VALUE}};',
            ],
        ] );

        $this->end_controls_tab();

        $this->start_controls_tab( 'icon_hover', [
            'label' => esc_html__( 'Hover', 'angie-snippets' ),
        ] );

        $this->add_control( 'icon_hover_color', [
            'label' => esc_html__( 'Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sh-wrapper-8958a847:hover .sh-icon-8958a847' => 'color: {{VALUE}};',
                '{{WRAPPER}} .sh-wrapper-8958a847:hover .sh-icon-8958a847 svg' => 'fill: {{VALUE}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ] );
        
        $this->add_control( 'icon_hover_bg_color', [
            'label' => esc_html__( 'Background Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sh-wrapper-8958a847:hover .sh-icon-8958a847' => 'background-color: {{VALUE}};',
            ],
        ] );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_responsive_control( 'icon_padding', [
            'label' => esc_html__( 'Padding', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
            'selectors' => [
                '{{WRAPPER}} .sh-icon-8958a847' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'separator' => 'before',
        ] );

        $this->add_responsive_control( 'icon_border_radius', [
            'label' => esc_html__( 'Border Radius', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
            'selectors' => [
                '{{WRAPPER}} .sh-icon-8958a847' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .sh-icon-8958a847 img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $html_tag = \Elementor\Utils::validate_html_tag( $settings['header_size'] );
        $link_open = '';
        $link_close = '';

        if ( ! empty( $settings['link']['url'] ) ) {
            $this->add_link_attributes( 'link', $settings['link'] );
            $link_attr = $this->get_render_attribute_string( 'link' );
            $link_open = "<a {$link_attr} class=\"sh-wrapper-8958a847\">";
            $link_close = '</a>';
        } else {
            $link_open = '<div class="sh-wrapper-8958a847">';
            $link_close = '</div>';
        }
        ?>
        <div class="sh-container-8958a847">
            <?php echo $link_open; ?>
                <span class="sh-icon-8958a847">
                    <?php 
                    if ( $settings['icon_type'] === 'icon' && ! empty( $settings['selected_icon']['value'] ) ) {
                        \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
                    } elseif ( $settings['icon_type'] === 'image' && ! empty( $settings['selected_image']['url'] ) ) {
                        echo '<img src="' . esc_url( $settings['selected_image']['url'] ) . '" alt="' . esc_attr( $settings['title_text'] ) . '">';
                    }
                    ?>
                </span>
                <?php echo '<' . $html_tag . ' class="sh-text-8958a847">' . wp_kses_post( $settings['title_text'] ) . '</' . $html_tag . '>'; ?>
            <?php echo $link_close; ?>
        </div>
        <?php
    }

    protected function content_template() {
        ?>
        <#
        var html_tag = elementor.helpers.validateHTMLTag( settings.header_size );
        var link_open = '<div class="sh-wrapper-8958a847">';
        var link_close = '</div>';

        if ( settings.link.url ) {
            var target = settings.link.is_external ? ' target="_blank"' : '';
            var nofollow = settings.link.nofollow ? ' rel="nofollow"' : '';
            link_open = '<a href="' + settings.link.url + '"' + target + nofollow + ' class="sh-wrapper-8958a847">';
            link_close = '</a>';
        }
        #>
        <div class="sh-container-8958a847">
            {{{ link_open }}}
                <span class="sh-icon-8958a847">
                    <# if ( settings.icon_type === 'icon' && settings.selected_icon.value ) { #>
                        <# var iconHTML = elementor.helpers.renderIcon( view, settings.selected_icon, { 'aria-hidden': 'true' }, 'i', 'object' ); #>
                        <# if ( iconHTML && iconHTML.value ) { #>
                            {{{ iconHTML.value }}}
                        <# } #>
                    <# } else if ( settings.icon_type === 'image' && settings.selected_image.url ) { #>
                        <img src="{{ settings.selected_image.url }}" alt="{{ settings.title_text }}">
                    <# } #>
                </span>
                <{{{ html_tag }}} class="sh-text-8958a847">
                    {{{ settings.title_text }}}
                </{{{ html_tag }}}>
            {{{ link_close }}}
        </div>
        <?php
    }
}
