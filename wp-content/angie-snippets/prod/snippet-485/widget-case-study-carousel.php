<?php
namespace AngieSnippets;
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Case_Study_Carousel_630c0858 extends \Elementor\Widget_Base {
    public function get_name() { return 'case_study_carousel_630c0858'; }
    public function get_title() { return esc_html__( 'Case Study Carousel', 'angie-snippets' ); }
    public function get_icon() { return 'eicon-carousel'; }
    public function get_categories() { return [ 'angie-widgets', 'general' ]; }
    public function get_script_depends() { return [ 'swiper-bundle', 'case-study-carousel-script-630c0858' ]; }
    public function get_style_depends() { return [ 'swiper-bundle', 'case-study-carousel-style-630c0858' ]; }

    protected function register_controls() {

        /* ===================== CONTENT: CARDS ===================== */
        $this->start_controls_section( 'content_section', [
            'label' => esc_html__( 'Cards', 'angie-snippets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control( 'title', [
            'label'   => esc_html__( 'Description', 'angie-snippets' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Understand how we improve mercedes-benz USA in marketing cost & efficiency.',
        ] );
        $repeater->add_control( 'image', [
            'label' => esc_html__( 'Image', 'angie-snippets' ),
            'type'  => \Elementor\Controls_Manager::MEDIA,
        ] );
        $repeater->add_control( 'link_text', [
            'label'   => esc_html__( 'Button Text', 'angie-snippets' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Read Case',
        ] );
        $repeater->add_control( 'link_url', [
            'label'   => esc_html__( 'Button URL', 'angie-snippets' ),
            'type'    => \Elementor\Controls_Manager::URL,
            'default' => [ 'url' => '#' ],
        ] );
        $repeater->add_control( 'button_icon', [
            'label'   => esc_html__( 'Button Icon', 'angie-snippets' ),
            'type'    => \Elementor\Controls_Manager::ICONS,
            'default' => [ 'value' => 'fas fa-arrow-up-right-from-square', 'library' => 'fa-solid' ],
        ] );

        $this->add_control( 'cards', [
            'label'       => esc_html__( 'Carousel Cards', 'angie-snippets' ),
            'type'        => \Elementor\Controls_Manager::REPEATER,
            'fields'      => $repeater->get_controls(),
            'default'     => [
                [ 'title' => 'Understand how we improve mercedes-benz USA in marketing cost & efficiency.' ],
                [ 'title' => 'Understand how we manage various marketing project for Mastercard.' ],
                [ 'title' => 'How we helped a global tech brand scale their digital presence by 300%.' ],
            ],
            'title_field' => '{{{ title.substring(0, 30) }}}...',
        ] );
        $this->end_controls_section();

        /* ===================== CONTENT: SLIDER SETTINGS ===================== */
        $this->start_controls_section( 'slider_settings_section', [
            'label' => esc_html__( 'Slider Settings', 'angie-snippets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
        $this->add_control( 'slides_per_view', [
            'label'   => esc_html__( 'Slides Per View', 'angie-snippets' ),
            'type'    => \Elementor\Controls_Manager::NUMBER,
            'min'     => 1,
            'max'     => 5,
            'step'    => 0.1,
            'default' => 2.2,
        ] );
        $this->add_control( 'space_between', [
            'label'   => esc_html__( 'Space Between Slides (px)', 'angie-snippets' ),
            'type'    => \Elementor\Controls_Manager::NUMBER,
            'min'     => 0,
            'max'     => 100,
            'default' => 20,
        ] );
        $this->add_control( 'loop', [
            'label'        => esc_html__( 'Loop', 'angie-snippets' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'Yes', 'angie-snippets' ),
            'label_off'    => esc_html__( 'No', 'angie-snippets' ),
            'return_value' => 'yes',
            'default'      => '',
        ] );
        $this->add_control( 'autoplay', [
            'label'        => esc_html__( 'Autoplay', 'angie-snippets' ),
            'type'         => \Elementor\Controls_Manager::SWITCHER,
            'label_on'     => esc_html__( 'Yes', 'angie-snippets' ),
            'label_off'    => esc_html__( 'No', 'angie-snippets' ),
            'return_value' => 'yes',
            'default'      => '',
        ] );
        $this->add_control( 'autoplay_delay', [
            'label'     => esc_html__( 'Autoplay Delay (ms)', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::NUMBER,
            'min'       => 500,
            'max'       => 10000,
            'default'   => 3000,
            'condition' => [ 'autoplay' => 'yes' ],
        ] );
        $this->end_controls_section();

        /* ===================== STYLE: WIDGET BACKGROUND & PADDING ===================== */
        $this->start_controls_section( 'style_widget_section', [
            'label' => esc_html__( 'Widget', 'angie-snippets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
        $this->add_control( 'widget_bg', [
            'label'     => esc_html__( 'Background Color', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#000000',
            'selectors' => [ '{{WRAPPER}} .csc-630c0858-container' => 'background-color: {{VALUE}};' ],
        ] );
        $this->add_responsive_control( 'widget_padding', [
            'label'      => esc_html__( 'Padding', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'default'    => [ 'top' => '20', 'right' => '0', 'bottom' => '20', 'left' => '0', 'unit' => 'px', 'isLinked' => false ],
            'selectors'  => [ '{{WRAPPER}} .csc-630c0858-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
        ] );
        $this->end_controls_section();

        /* ===================== STYLE: CARD ===================== */
        $this->start_controls_section( 'style_card_section', [
            'label' => esc_html__( 'Card', 'angie-snippets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
        $this->add_control( 'card_bg', [
            'label'     => esc_html__( 'Background Color', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [ '{{WRAPPER}} .csc-630c0858-card' => 'background-color: {{VALUE}};' ],
        ] );
        $this->add_responsive_control( 'card_padding', [
            'label'      => esc_html__( 'Content Padding', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'default'    => [ 'top' => '30', 'right' => '30', 'bottom' => '30', 'left' => '30', 'unit' => 'px', 'isLinked' => true ],
            'selectors'  => [ '{{WRAPPER}} .csc-630c0858-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
        ] );
        $this->add_responsive_control( 'card_min_height', [
            'label'      => esc_html__( 'Min Height', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', 'vh' ],
            'range'      => [ 'px' => [ 'min' => 100, 'max' => 800 ] ],
            'default'    => [ 'size' => 400, 'unit' => 'px' ],
            'selectors'  => [ '{{WRAPPER}} .csc-630c0858-card' => 'min-height: {{SIZE}}{{UNIT}};' ],
        ] );
        $this->add_responsive_control( 'card_border_radius', [
            'label'      => esc_html__( 'Border Radius', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'default'    => [ 'top' => '12', 'right' => '12', 'bottom' => '12', 'left' => '12', 'unit' => 'px', 'isLinked' => true ],
            'selectors'  => [ '{{WRAPPER}} .csc-630c0858-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
        ] );
        $this->add_group_control( \Elementor\Group_Control_Box_Shadow::get_type(), [
            'name'     => 'card_box_shadow',
            'label'    => esc_html__( 'Box Shadow', 'angie-snippets' ),
            'selector' => '{{WRAPPER}} .csc-630c0858-card',
        ] );
        $this->add_group_control( \Elementor\Group_Control_Border::get_type(), [
            'name'     => 'card_border',
            'label'    => esc_html__( 'Border', 'angie-snippets' ),
            'selector' => '{{WRAPPER}} .csc-630c0858-card',
        ] );
        $this->end_controls_section();

        /* ===================== STYLE: TEXT ===================== */
        $this->start_controls_section( 'style_text_section', [
            'label' => esc_html__( 'Description Text', 'angie-snippets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
        $this->add_control( 'text_color', [
            'label'     => esc_html__( 'Color', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#000000',
            'selectors' => [ '{{WRAPPER}} .csc-630c0858-content p' => 'color: {{VALUE}};' ],
        ] );
        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
            'name'     => 'text_typography',
            'label'    => esc_html__( 'Typography', 'angie-snippets' ),
            'selector' => '{{WRAPPER}} .csc-630c0858-content p',
        ] );
        $this->end_controls_section();

        /* ===================== STYLE: BUTTON ===================== */
        $this->start_controls_section( 'style_button_section', [
            'label' => esc_html__( 'Button', 'angie-snippets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
        $this->add_control( 'button_text_color', [
            'label'     => esc_html__( 'Text Color', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#000000',
            'selectors' => [ '{{WRAPPER}} .csc-630c0858-link' => 'color: {{VALUE}};' ],
        ] );
        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
            'name'     => 'button_typography',
            'label'    => esc_html__( 'Typography', 'angie-snippets' ),
            'selector' => '{{WRAPPER}} .csc-630c0858-link',
        ] );
        $this->add_control( 'button_icon_bg', [
            'label'     => esc_html__( 'Icon Background Color', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#bbf73e',
            'selectors' => [ '{{WRAPPER}} .csc-630c0858-arrow' => 'background-color: {{VALUE}};' ],
        ] );
        $this->add_control( 'button_icon_color', [
            'label'     => esc_html__( 'Icon Color', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#000000',
            'selectors' => [ '{{WRAPPER}} .csc-630c0858-arrow' => 'color: {{VALUE}};', '{{WRAPPER}} .csc-630c0858-arrow i' => 'color: {{VALUE}};', '{{WRAPPER}} .csc-630c0858-arrow svg' => 'fill: {{VALUE}};' ],
        ] );
        $this->add_responsive_control( 'button_icon_size', [
            'label'      => esc_html__( 'Icon Size', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 8, 'max' => 60 ] ],
            'default'    => [ 'size' => 20, 'unit' => 'px' ],
            'selectors'  => [ '{{WRAPPER}} .csc-630c0858-arrow i' => 'font-size: {{SIZE}}{{UNIT}};', '{{WRAPPER}} .csc-630c0858-arrow svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};' ],
        ] );
        $this->add_responsive_control( 'button_icon_box_size', [
            'label'      => esc_html__( 'Icon Box Size', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 20, 'max' => 100 ] ],
            'default'    => [ 'size' => 40, 'unit' => 'px' ],
            'selectors'  => [ '{{WRAPPER}} .csc-630c0858-arrow' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};' ],
        ] );
        $this->add_responsive_control( 'button_icon_border_radius', [
            'label'      => esc_html__( 'Icon Border Radius', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'default'    => [ 'top' => '8', 'right' => '8', 'bottom' => '8', 'left' => '8', 'unit' => 'px', 'isLinked' => true ],
            'selectors'  => [ '{{WRAPPER}} .csc-630c0858-arrow' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
        ] );
        $this->end_controls_section();

        /* ===================== STYLE: IMAGE ===================== */
        $this->start_controls_section( 'style_image_section', [
            'label' => esc_html__( 'Image', 'angie-snippets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
        $this->add_control( 'image_bg', [
            'label'     => esc_html__( 'Placeholder Background', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#1a1a1a',
            'selectors' => [ '{{WRAPPER}} .csc-630c0858-image' => 'background-color: {{VALUE}};' ],
        ] );
        $this->add_responsive_control( 'image_border_radius', [
            'label'      => esc_html__( 'Border Radius', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'selectors'  => [ '{{WRAPPER}} .csc-630c0858-image img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
        ] );
        $this->add_responsive_control( 'image_width', [
            'label'      => esc_html__( 'Image Area Width (%)', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ '%', 'px' ],
            'range'      => [ '%' => [ 'min' => 10, 'max' => 90 ] ],
            'selectors'  => [ '{{WRAPPER}} .csc-630c0858-image' => 'flex: 0 0 {{SIZE}}{{UNIT}};' ],
        ] );
        $this->add_control( 'image_fit', [
            'label'   => esc_html__( 'Object Fit', 'angie-snippets' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => 'cover',
            'options' => [
                'cover'   => esc_html__( 'Cover', 'angie-snippets' ),
                'contain' => esc_html__( 'Contain', 'angie-snippets' ),
                'fill'    => esc_html__( 'Fill', 'angie-snippets' ),
                'none'    => esc_html__( 'None', 'angie-snippets' ),
            ],
            'selectors' => [ '{{WRAPPER}} .csc-630c0858-image img' => 'object-fit: {{VALUE}};' ],
        ] );
        $this->end_controls_section();

        /* ===================== STYLE: ARROWS ===================== */
        $this->start_controls_section( 'style_arrows_section', [
            'label' => esc_html__( 'Slider Arrows', 'angie-snippets' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );
        $this->add_control( 'arrow_prev_icon', [
            'label'   => esc_html__( 'Prev Arrow Icon', 'angie-snippets' ),
            'type'    => \Elementor\Controls_Manager::ICONS,
            'default' => [ 'value' => 'fas fa-arrow-left', 'library' => 'fa-solid' ],
        ] );
        $this->add_control( 'arrow_next_icon', [
            'label'   => esc_html__( 'Next Arrow Icon', 'angie-snippets' ),
            'type'    => \Elementor\Controls_Manager::ICONS,
            'default' => [ 'value' => 'fas fa-arrow-right', 'library' => 'fa-solid' ],
        ] );
        $this->add_control( 'arrow_icon_color', [
            'label'     => esc_html__( 'Icon Color', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#ffffff',
            'selectors' => [ '{{WRAPPER}} .csc-630c0858-nav button' => 'color: {{VALUE}};', '{{WRAPPER}} .csc-630c0858-nav button svg' => 'fill: {{VALUE}};' ],
        ] );
        $this->add_responsive_control( 'arrow_icon_size', [
            'label'      => esc_html__( 'Icon Size', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 8, 'max' => 60 ] ],
            'default'    => [ 'size' => 16, 'unit' => 'px' ],
            'selectors'  => [ '{{WRAPPER}} .csc-630c0858-nav button i' => 'font-size: {{SIZE}}{{UNIT}};', '{{WRAPPER}} .csc-630c0858-nav button svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};' ],
        ] );
        $this->add_control( 'arrow_bg', [
            'label'     => esc_html__( 'Button Background', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'default'   => '#222222',
            'selectors' => [ '{{WRAPPER}} .csc-630c0858-nav button' => 'background-color: {{VALUE}};' ],
        ] );
        $this->add_control( 'arrow_bg_hover', [
            'label'     => esc_html__( 'Button Background (Hover)', 'angie-snippets' ),
            'type'      => \Elementor\Controls_Manager::COLOR,
            'selectors' => [ '{{WRAPPER}} .csc-630c0858-nav button:hover' => 'background-color: {{VALUE}};' ],
        ] );
        $this->add_responsive_control( 'arrow_button_size', [
            'label'      => esc_html__( 'Button Size', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 20, 'max' => 120 ] ],
            'default'    => [ 'size' => 50, 'unit' => 'px' ],
            'selectors'  => [ '{{WRAPPER}} .csc-630c0858-nav button' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};' ],
        ] );
        $this->add_responsive_control( 'arrow_border_radius', [
            'label'      => esc_html__( 'Border Radius', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%' ],
            'default'    => [ 'top' => '8', 'right' => '8', 'bottom' => '8', 'left' => '8', 'unit' => 'px', 'isLinked' => true ],
            'selectors'  => [ '{{WRAPPER}} .csc-630c0858-nav button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ],
        ] );
        $this->add_group_control( \Elementor\Group_Control_Border::get_type(), [
            'name'     => 'arrow_border',
            'label'    => esc_html__( 'Border', 'angie-snippets' ),
            'selector' => '{{WRAPPER}} .csc-630c0858-nav button',
        ] );
        $this->add_responsive_control( 'arrows_gap', [
            'label'      => esc_html__( 'Gap Between Arrows', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 0, 'max' => 60 ] ],
            'default'    => [ 'size' => 10, 'unit' => 'px' ],
            'selectors'  => [ '{{WRAPPER}} .csc-630c0858-nav' => 'gap: {{SIZE}}{{UNIT}};' ],
        ] );
        $this->add_responsive_control( 'arrows_bottom_gap', [
            'label'      => esc_html__( 'Gap Between Arrows & Slider', 'angie-snippets' ),
            'type'       => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range'      => [ 'px' => [ 'min' => 0, 'max' => 80 ] ],
            'default'    => [ 'size' => 20, 'unit' => 'px' ],
            'selectors'  => [ '{{WRAPPER}} .csc-630c0858-nav' => 'margin-bottom: {{SIZE}}{{UNIT}};' ],
        ] );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $loop       = ( 'yes' === $settings['loop'] ) ? 'true' : 'false';
        $autoplay   = ( 'yes' === $settings['autoplay'] ) ? esc_js( $settings['autoplay_delay'] ) : 'false';
        $spv        = floatval( $settings['slides_per_view'] );
        $sb         = intval( $settings['space_between'] );
        ?>
        <div class="csc-630c0858-container"
             data-spv="<?php echo esc_attr( $spv ); ?>"
             data-sb="<?php echo esc_attr( $sb ); ?>"
             data-loop="<?php echo esc_attr( $loop ); ?>"
             data-autoplay="<?php echo esc_attr( $autoplay ); ?>">
            <div class="csc-630c0858-nav">
                <button class="csc-630c0858-prev">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['arrow_prev_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </button>
                <button class="csc-630c0858-next">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['arrow_next_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </button>
            </div>
            <div class="swiper csc-630c0858-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ( $settings['cards'] as $card ) : ?>
                        <div class="swiper-slide">
                            <div class="csc-630c0858-card">
                                <div class="csc-630c0858-content">
                                    <p><?php echo esc_html( $card['title'] ); ?></p>
                                    <a href="<?php echo esc_url( $card['link_url']['url'] ); ?>" class="csc-630c0858-link">
                                        <?php echo esc_html( $card['link_text'] ); ?>
                                        <span class="csc-630c0858-arrow">
                                            <?php \Elementor\Icons_Manager::render_icon( $card['button_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                        </span>
                                    </a>
                                </div>
                                <div class="csc-630c0858-image">
                                    <?php if ( ! empty( $card['image']['url'] ) ) : ?>
                                        <img src="<?php echo esc_url( $card['image']['url'] ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>">
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }

    protected function content_template() {
        ?>
        <div class="csc-630c0858-container">
            <div class="csc-630c0858-nav">
                <button class="csc-630c0858-prev">
                    <# var prevIconHTML = elementor.helpers.renderIcon( view, settings.arrow_prev_icon, { 'aria-hidden': 'true' }, 'i', 'object' ); if ( prevIconHTML && prevIconHTML.value ) { #>{{{ prevIconHTML.value }}}<# } else { #><i class="fas fa-arrow-left"></i><# } #>
                </button>
                <button class="csc-630c0858-next">
                    <# var nextIconHTML = elementor.helpers.renderIcon( view, settings.arrow_next_icon, { 'aria-hidden': 'true' }, 'i', 'object' ); if ( nextIconHTML && nextIconHTML.value ) { #>{{{ nextIconHTML.value }}}<# } else { #><i class="fas fa-arrow-right"></i><# } #>
                </button>
            </div>
            <div class="swiper csc-630c0858-swiper">
                <div class="swiper-wrapper">
                    <# _.each( settings.cards, function( card ) {
                        var btnIconHTML = elementor.helpers.renderIcon( view, card.button_icon, { 'aria-hidden': 'true' }, 'i', 'object' );
                    #>
                        <div class="swiper-slide">
                            <div class="csc-630c0858-card">
                                <div class="csc-630c0858-content">
                                    <p>{{{ card.title }}}</p>
                                    <a href="{{ card.link_url.url }}" class="csc-630c0858-link">
                                        {{{ card.link_text }}}
                                        <span class="csc-630c0858-arrow">
                                            <# if ( btnIconHTML && btnIconHTML.value ) { #>{{{ btnIconHTML.value }}}<# } #>
                                        </span>
                                    </a>
                                </div>
                                <div class="csc-630c0858-image">
                                    <# if ( card.image.url ) { #>
                                        <img src="{{ card.image.url }}" alt="{{ card.title }}">
                                    <# } #>
                                </div>
                            </div>
                        </div>
                    <# } ); #>
                </div>
            </div>
        </div>
        <?php
    }
}
