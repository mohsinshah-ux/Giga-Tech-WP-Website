<?php

namespace AngieSnippets;
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Comparison_Widget_2c1d9cbb extends \Elementor\Widget_Base {
    public function get_name() { return 'comparison_widget_2c1d9cbb'; }
    public function get_title() { return esc_html__( 'Comparison', 'angie-snippets' ); }
    public function get_icon() { return 'eicon-columns'; }
    public function get_categories() { return [ 'angie-widgets', 'general' ]; }
    public function get_style_depends() { return [ 'comparison-style-2c1d9cbb' ]; }

    protected function register_controls() {

        /* ===================== CONTENT: COLUMN 1 ===================== */
        $this->start_controls_section( 'col1_section', [
            'label' => esc_html__( 'Column 1 (Traditional)', 'angie-snippets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
        $this->add_control( 'col1_title', [
            'label'   => esc_html__( 'Title', 'angie-snippets' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Traditional Websites & Social Media Marketing', 'angie-snippets' ),
        ] );
        $repeater1 = new \Elementor\Repeater();
        $repeater1->add_control( 'text', [
            'label'   => esc_html__( 'Text', 'angie-snippets' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Static and outdated designs', 'angie-snippets' ),
        ] );
        $repeater1->add_control( 'icon', [
            'label'   => esc_html__( 'Icon', 'angie-snippets' ),
            'type'    => \Elementor\Controls_Manager::ICONS,
            'default' => [ 'value' => 'fas fa-times', 'library' => 'fa-solid' ],
        ] );
        $this->add_control( 'col1_items', [
            'label'       => esc_html__( 'Items', 'angie-snippets' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater1->get_controls(),
            'default'     => [
                [ 'text' => 'Static and outdated designs' ],
                [ 'text' => 'Slow loading speeds' ],
                [ 'text' => 'Poor mobile responsiveness' ],
                [ 'text' => 'Limited customization options' ],
            ],
            'title_field' => '{{{ text }}}',
        ] );
        $this->end_controls_section();

        /* ===================== CONTENT: COLUMN 2 ===================== */
        $this->start_controls_section( 'col2_section', [
            'label' => esc_html__( 'Column 2 (Modern)', 'angie-snippets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
        $this->add_control( 'col2_title', [
            'label'   => esc_html__( 'Title', 'angie-snippets' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Modern Websites & Social Media Marketing', 'angie-snippets' ),
        ] );
        $repeater2 = new \Elementor\Repeater();
        $repeater2->add_control( 'text', [
            'label'   => esc_html__( 'Text', 'angie-snippets' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Interactive and modern user experiences', 'angie-snippets' ),
        ] );
        $repeater2->add_control( 'icon', [
            'label'   => esc_html__( 'Icon', 'angie-snippets' ),
            'type'    => \Elementor\Controls_Manager::ICONS,
            'default' => [ 'value' => 'fas fa-check', 'library' => 'fa-solid' ],
        ] );
        $this->add_control( 'col2_items', [
            'label'       => esc_html__( 'Items', 'angie-snippets' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater2->get_controls(),
            'default'     => [
                [ 'text' => 'Interactive and modern user experiences' ],
                [ 'text' => 'Fast and performance-optimized platforms' ],
                [ 'text' => 'Fully responsive on all devices' ],
                [ 'text' => 'Unlimited design flexibility' ],
            ],
            'title_field' => '{{{ text }}}',
        ] );
        $this->end_controls_section();

        /* ===================== STYLE: WIDGET ===================== */
        $this->start_controls_section( 'style_widget_section', [
            'label' => esc_html__( 'Widget', 'angie-snippets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
        $this->add_responsive_control( 'widget_width', [
            'label'      => esc_html__( 'Widget Width', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'vw' ],
            'range'      => [
                'px' => [ 'min' => 100, 'max' => 2000 ],
                '%'  => [ 'min' => 10,  'max' => 100 ],
                'vw' => [ 'min' => 10,  'max' => 100 ],
            ],
            'selectors'  => [
                '{{WRAPPER}} .comp-2c1d9cbb-wrapper' => 'width: {{SIZE}}{{UNIT}}; max-width: 100%; margin-left: auto; margin-right: auto;',
            ],
        ] );
        $this->add_responsive_control( 'widget_padding', [
            'label'      => esc_html__( 'Padding', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'selectors'  => [ '{{WRAPPER}} .comp-2c1d9cbb-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
        ] );
        $this->add_responsive_control( 'columns_gap', [
            'label'      => esc_html__( 'Columns Gap', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 0, 'max' => 100 ] ],
            'default'    => [ 'size' => 20, 'unit' => 'px' ],
            'selectors'  => [ '{{WRAPPER}} .comp-2c1d9cbb-wrapper' => 'gap: {{SIZE}}{{UNIT}};' ],
        ] );
        $this->add_responsive_control( 'items_gap', [
            'label'      => esc_html__( 'Items Gap', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 0, 'max' => 60 ] ],
            'default'    => [ 'size' => 15, 'unit' => 'px' ],
            'selectors'  => [ '{{WRAPPER}} .comp-2c1d9cbb-col-items' => 'gap: {{SIZE}}{{UNIT}};' ],
        ] );
        $this->end_controls_section();

        /* ===================== STYLE: COLUMN TITLES ===================== */
        $this->start_controls_section( 'style_titles_section', [
            'label' => esc_html__( 'Column Titles', 'angie-snippets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
        $this->add_control( 'title_align', [
            'label'     => esc_html__( 'Alignment', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::CHOOSE,
            'options'   => [
                'left'   => [ 'title' => esc_html__( 'Left', 'angie-snippets' ),   'icon' => 'eicon-text-align-left' ],
                'center' => [ 'title' => esc_html__( 'Center', 'angie-snippets' ), 'icon' => 'eicon-text-align-center' ],
                'right'  => [ 'title' => esc_html__( 'Right', 'angie-snippets' ),  'icon' => 'eicon-text-align-right' ],
            ],
            'default'   => 'center',
            'selectors' => [ '{{WRAPPER}} .comp-2c1d9cbb-title' => 'text-align: {{VALUE}};' ],
        ] );
        $this->add_control( 'col1_title_color', [
            'label'     => esc_html__( 'Column 1 Title Color', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .comp-2c1d9cbb-col:first-child .comp-2c1d9cbb-title' => 'color: {{VALUE}};' ],
        ] );
        $this->add_control( 'col2_title_color', [
            'label'     => esc_html__( 'Column 2 Title Color', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .comp-2c1d9cbb-col:last-child .comp-2c1d9cbb-title' => 'color: {{VALUE}};' ],
        ] );
        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
            'name'     => 'title_typography',
            'label'    => esc_html__( 'Typography', 'angie-snippets' ),
            'selector' => '{{WRAPPER}} .comp-2c1d9cbb-title',
        ] );
        $this->add_responsive_control( 'title_margin_bottom', [
            'label'      => esc_html__( 'Spacing Below Title', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 0, 'max' => 80 ] ],
            'default'    => [ 'size' => 20, 'unit' => 'px' ],
            'selectors'  => [ '{{WRAPPER}} .comp-2c1d9cbb-title' => 'margin-bottom: {{SIZE}}{{UNIT}};' ],
        ] );
        $this->end_controls_section();

        /* ===================== STYLE: CARDS ===================== */
        $this->start_controls_section( 'style_cards_section', [
            'label' => esc_html__( 'Item Cards', 'angie-snippets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
        $this->add_control( 'col1_card_bg', [
            'label'     => esc_html__( 'Column 1 Card Background', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#f3f4f6',
            'selectors' => [ '{{WRAPPER}} .comp-2c1d9cbb-col:first-child .comp-2c1d9cbb-item' => 'background-color: {{VALUE}};' ],
        ] );
        $this->add_control( 'col2_card_bg', [
            'label'     => esc_html__( 'Column 2 Card Background', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#f3f4f6',
            'selectors' => [ '{{WRAPPER}} .comp-2c1d9cbb-col:last-child .comp-2c1d9cbb-item' => 'background-color: {{VALUE}};' ],
        ] );
        $this->add_responsive_control( 'card_padding', [
            'label'      => esc_html__( 'Card Padding', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'default'    => [ 'top' => '15', 'right' => '15', 'bottom' => '15', 'left' => '15', 'unit' => 'px', 'isLinked' => true ],
            'selectors'  => [ '{{WRAPPER}} .comp-2c1d9cbb-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
        ] );
        $this->add_responsive_control( 'card_border_radius', [
            'label'      => esc_html__( 'Border Radius', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'default'    => [ 'top' => '8', 'right' => '8', 'bottom' => '8', 'left' => '8', 'unit' => 'px', 'isLinked' => true ],
            'selectors'  => [ '{{WRAPPER}} .comp-2c1d9cbb-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
        ] );
        $this->add_group_control( \Elementor\Group_Control_Box_Shadow::get_type(), [
            'name'     => 'card_box_shadow',
            'label'    => esc_html__( 'Box Shadow', 'angie-snippets' ),
            'selector' => '{{WRAPPER}} .comp-2c1d9cbb-item',
        ] );
        $this->add_group_control( \Elementor\Group_Control_Border::get_type(), [
            'name'     => 'card_border',
            'label'    => esc_html__( 'Border', 'angie-snippets' ),
            'selector' => '{{WRAPPER}} .comp-2c1d9cbb-item',
        ] );
        $this->end_controls_section();

        /* ===================== STYLE: TEXT ===================== */
        $this->start_controls_section( 'style_text_section', [
            'label' => esc_html__( 'Item Text', 'angie-snippets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
        $this->add_control( 'col1_text_color', [
            'label'     => esc_html__( 'Column 1 Text Color', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .comp-2c1d9cbb-col:first-child .comp-2c1d9cbb-text' => 'color: {{VALUE}};' ],
        ] );
        $this->add_control( 'col2_text_color', [
            'label'     => esc_html__( 'Column 2 Text Color', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .comp-2c1d9cbb-col:last-child .comp-2c1d9cbb-text' => 'color: {{VALUE}};' ],
        ] );
        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
            'name'     => 'text_typography',
            'label'    => esc_html__( 'Typography', 'angie-snippets' ),
            'selector' => '{{WRAPPER}} .comp-2c1d9cbb-text',
        ] );
        $this->end_controls_section();

        /* ===================== STYLE: ICONS ===================== */
        $this->start_controls_section( 'style_icons_section', [
            'label' => esc_html__( 'Icons', 'angie-snippets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
        $this->add_control( 'col1_icon_color', [
            'label'     => esc_html__( 'Column 1 Icon Color', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [ '{{WRAPPER}} .comp-2c1d9cbb-col:first-child .comp-2c1d9cbb-icon' => 'color: {{VALUE}};', '{{WRAPPER}} .comp-2c1d9cbb-col:first-child .comp-2c1d9cbb-icon svg' => 'fill: {{VALUE}};' ],
        ] );
        $this->add_control( 'col2_icon_color', [
            'label'     => esc_html__( 'Column 2 Icon Color', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#000000',
            'selectors' => [ '{{WRAPPER}} .comp-2c1d9cbb-col:last-child .comp-2c1d9cbb-icon' => 'color: {{VALUE}};', '{{WRAPPER}} .comp-2c1d9cbb-col:last-child .comp-2c1d9cbb-icon svg' => 'fill: {{VALUE}};' ],
        ] );
        $this->add_control( 'col1_icon_bg', [
            'label'     => esc_html__( 'Column 1 Icon Background', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#374151',
            'selectors' => [ '{{WRAPPER}} .comp-2c1d9cbb-col:first-child .comp-2c1d9cbb-icon' => 'background-color: {{VALUE}};' ],
        ] );
        $this->add_control( 'col2_icon_bg', [
            'label'     => esc_html__( 'Column 2 Icon Background', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#bbf73e',
            'selectors' => [ '{{WRAPPER}} .comp-2c1d9cbb-col:last-child .comp-2c1d9cbb-icon' => 'background-color: {{VALUE}};' ],
        ] );
        $this->add_responsive_control( 'icon_size', [
            'label'      => esc_html__( 'Icon Size', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 8, 'max' => 60 ] ],
            'default'    => [ 'size' => 20, 'unit' => 'px' ],
            'selectors'  => [ '{{WRAPPER}} .comp-2c1d9cbb-icon i' => 'font-size: {{SIZE}}{{UNIT}};', '{{WRAPPER}} .comp-2c1d9cbb-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};' ],
        ] );
        $this->add_responsive_control( 'icon_box_size', [
            'label'      => esc_html__( 'Icon Box Size', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 20, 'max' => 100 ] ],
            'default'    => [ 'size' => 40, 'unit' => 'px' ],
            'selectors'  => [ '{{WRAPPER}} .comp-2c1d9cbb-icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};' ],
        ] );
        $this->add_responsive_control( 'icon_border_radius', [
            'label'      => esc_html__( 'Icon Border Radius', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'default'    => [ 'top' => '8', 'right' => '8', 'bottom' => '8', 'left' => '8', 'unit' => 'px', 'isLinked' => true ],
            'selectors'  => [ '{{WRAPPER}} .comp-2c1d9cbb-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
        ] );
        $this->add_responsive_control( 'icon_gap', [
            'label'      => esc_html__( 'Gap Between Icon & Text', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 0, 'max' => 40 ] ],
            'default'    => [ 'size' => 15, 'unit' => 'px' ],
            'selectors'  => [ '{{WRAPPER}} .comp-2c1d9cbb-item' => 'gap: {{SIZE}}{{UNIT}};' ],
        ] );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="comp-2c1d9cbb-wrapper">
            <div class="comp-2c1d9cbb-col">
                <h3 class="comp-2c1d9cbb-title"><?php echo esc_html( $settings['col1_title'] ); ?></h3>
                <div class="comp-2c1d9cbb-col-items">
                    <?php foreach ( $settings['col1_items'] as $item ) : ?>
                        <div class="comp-2c1d9cbb-item">
                            <span class="comp-2c1d9cbb-icon">
                                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </span>
                            <span class="comp-2c1d9cbb-text"><?php echo esc_html( $item['text'] ); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="comp-2c1d9cbb-col">
                <h3 class="comp-2c1d9cbb-title"><?php echo esc_html( $settings['col2_title'] ); ?></h3>
                <div class="comp-2c1d9cbb-col-items">
                    <?php foreach ( $settings['col2_items'] as $item ) : ?>
                        <div class="comp-2c1d9cbb-item">
                            <span class="comp-2c1d9cbb-icon">
                                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </span>
                            <span class="comp-2c1d9cbb-text"><?php echo esc_html( $item['text'] ); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }

    protected function content_template() {
        ?>
        <div class="comp-2c1d9cbb-wrapper">
            <div class="comp-2c1d9cbb-col">
                <h3 class="comp-2c1d9cbb-title">{{{ settings.col1_title }}}</h3>
                <div class="comp-2c1d9cbb-col-items">
                    <# _.each( settings.col1_items, function( item ) {
                        var iconHTML = elementor.helpers.renderIcon( view, item.icon, { 'aria-hidden': 'true' }, 'i', 'object' );
                    #>
                        <div class="comp-2c1d9cbb-item">
                            <span class="comp-2c1d9cbb-icon">
                                <# if ( iconHTML && iconHTML.value ) { #>{{{ iconHTML.value }}}<# } #>
                            </span>
                            <span class="comp-2c1d9cbb-text">{{{ item.text }}}</span>
                        </div>
                    <# } ); #>
                </div>
            </div>
            <div class="comp-2c1d9cbb-col">
                <h3 class="comp-2c1d9cbb-title">{{{ settings.col2_title }}}</h3>
                <div class="comp-2c1d9cbb-col-items">
                    <# _.each( settings.col2_items, function( item ) {
                        var iconHTML = elementor.helpers.renderIcon( view, item.icon, { 'aria-hidden': 'true' }, 'i', 'object' );
                    #>
                        <div class="comp-2c1d9cbb-item">
                            <span class="comp-2c1d9cbb-icon">
                                <# if ( iconHTML && iconHTML.value ) { #>{{{ iconHTML.value }}}<# } #>
                            </span>
                            <span class="comp-2c1d9cbb-text">{{{ item.text }}}</span>
                        </div>
                    <# } ); #>
                </div>
            </div>
        </div>
        <?php
    }
}
