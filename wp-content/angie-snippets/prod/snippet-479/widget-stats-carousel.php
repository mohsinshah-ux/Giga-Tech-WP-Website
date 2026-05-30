<?php

namespace AngieSnippets;
if ( ! defined( 'ABSPATH' ) ) { exit; }

class Stats_Carousel_4d7dfff6 extends \Elementor\Widget_Base {
    public function get_name() { return 'stats_carousel_4d7dfff6'; }
    public function get_title() { return esc_html__( 'Stats Carousel', 'angie-snippets' ); }
    public function get_icon() { return 'eicon-carousel'; }
    public function get_categories() { return [ 'angie-widgets', 'general' ]; }
    public function get_script_depends() { return [ 'swiper-bundle', 'stats-carousel-script-4d7dfff6' ]; }
    public function get_style_depends() { return [ 'swiper-bundle', 'stats-carousel-style-4d7dfff6' ]; }

    protected function register_controls() {
        $this->start_controls_section( 'content_section', [
            'label' => esc_html__( 'Cards', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control( 'logo', [
            'label' => esc_html__( 'Company Logo', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'media_types' => ['image', 'svg'],
            'default' => [
                'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
        ] );

        $repeater->add_control( 'title', [
            'label' => esc_html__( 'Company/Title', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => esc_html__( 'Company Name', 'angie-snippets' ),
        ] );

        $repeater->add_control( 'metric_1_value', [
            'label' => esc_html__( 'Metric 1 Value', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '200%',
        ] );

        $repeater->add_control( 'metric_1_label', [
            'label' => esc_html__( 'Metric 1 Label', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'More inbound sales calls',
        ] );

        $repeater->add_control( 'metric_2_value', [
            'label' => esc_html__( 'Metric 2 Value', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '53%',
        ] );

        $repeater->add_control( 'metric_2_label', [
            'label' => esc_html__( 'Metric 2 Label', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'More qualified pipeline',
        ] );

        $this->add_control( 'cards', [
            'label' => esc_html__( 'Carousel Cards', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'title' => 'Profoma',
                    'metric_1_value' => '200%',
                    'metric_1_label' => 'More inbound sales calls',
                    'metric_2_value' => '53%',
                    'metric_2_label' => 'More qualified pipeline',
                ],
                [
                    'title' => 'Xenova Commodity',
                    'metric_1_value' => '60+',
                    'metric_1_label' => 'Inbound leads',
                    'metric_2_value' => '66%',
                    'metric_2_label' => 'Win Rate %',
                ],
                [
                    'title' => 'Sonoma Energy',
                    'metric_1_value' => '12%',
                    'metric_1_label' => 'More Leads',
                    'metric_2_value' => '400%',
                    'metric_2_label' => 'High-intent downloads',
                ],
            ],
            'title_field' => '{{{ title }}}',
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'settings_section', [
            'label' => esc_html__( 'Carousel Settings', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

        $this->add_control( 'autoplay', [
            'label' => esc_html__( 'Autoplay', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'angie-snippets' ),
            'label_off' => esc_html__( 'No', 'angie-snippets' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ] );

        $this->add_control( 'autoplay_speed', [
            'label' => esc_html__( 'Autoplay Speed (ms)', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 3000,
            'condition' => [
                'autoplay' => 'yes',
            ],
        ] );

        $this->add_control( 'loop', [
            'label' => esc_html__( 'Infinite Loop', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => esc_html__( 'Yes', 'angie-snippets' ),
            'label_off' => esc_html__( 'No', 'angie-snippets' ),
            'return_value' => 'yes',
            'default' => 'yes',
        ] );

        $this->add_control( 'slides_per_view', [
            'label' => esc_html__( 'Slides Per View', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 1,
                    'max' => 6,
                    'step' => 0.1,
                ],
            ],
            'default' => [
                'size' => 2.5,
            ],
        ] );

        $this->end_controls_section();
        
        $this->start_controls_section( 'nav_content_section', [
            'label' => esc_html__( 'Navigation Icons', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );
        
        $this->add_control( 'prev_icon', [
            'label' => esc_html__( 'Previous Icon', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'media_types' => ['image', 'svg'],
        ] );
        
        $this->add_control( 'next_icon', [
            'label' => esc_html__( 'Next Icon', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'media_types' => ['image', 'svg'],
        ] );
        
        $this->end_controls_section();

        $this->start_controls_section( 'style_section', [
            'label' => esc_html__( 'Card Style', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'card_bg', [
            'label' => esc_html__( 'Card Background', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sc-4d7dfff6-card' => 'background-color: {{VALUE}};',
            ],
            'default' => '#ffffff',
        ] );

        $this->add_control( 'card_border_radius', [
            'label' => esc_html__( 'Border Radius', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .sc-4d7dfff6-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ] );
        
        $this->add_control( 'logo_width', [
            'label' => esc_html__( 'Logo Width', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 200,
                    'step' => 1,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .sc-4d7dfff6-header img' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ] );

        $this->add_control( 'title_color', [
            'label' => esc_html__( 'Title Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sc-4d7dfff6-title' => 'color: {{VALUE}};',
            ],
            'default' => '#111827',
        ] );

        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_html__( 'Title Typography', 'angie-snippets' ),
            'selector' => '{{WRAPPER}} .sc-4d7dfff6-title',
        ] );

        $this->add_control( 'metric_bg', [
            'label' => esc_html__( 'Metric Background', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sc-4d7dfff6-metric' => 'background-color: {{VALUE}};',
            ],
            'default' => '#f3f4f6',
        ] );

        $this->add_control( 'metric_value_color', [
            'label' => esc_html__( 'Metric Value Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sc-4d7dfff6-metric-val' => 'color: {{VALUE}};',
            ],
            'default' => '#111827',
        ] );

        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
            'name' => 'metric_value_typography',
            'label' => esc_html__( 'Metric Value Typography', 'angie-snippets' ),
            'selector' => '{{WRAPPER}} .sc-4d7dfff6-metric-val',
        ] );

        $this->add_control( 'metric_label_color', [
            'label' => esc_html__( 'Metric Label Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sc-4d7dfff6-metric-lbl' => 'color: {{VALUE}};',
            ],
            'default' => '#4b5563',
        ] );

        $this->add_group_control( \Elementor\Group_Control_Typography::get_type(), [
            'name' => 'metric_label_typography',
            'label' => esc_html__( 'Metric Label Typography', 'angie-snippets' ),
            'selector' => '{{WRAPPER}} .sc-4d7dfff6-metric-lbl',
        ] );

        $this->end_controls_section();

        $this->start_controls_section( 'nav_style_section', [
            'label' => esc_html__( 'Navigation Arrows', 'angie-snippets' ),
            'tab' => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

        $this->add_control( 'arrow_color', [
            'label' => esc_html__( 'Arrow Color', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sc-4d7dfff6-nav-btn' => 'color: {{VALUE}};',
                '{{WRAPPER}} .sc-4d7dfff6-nav-btn svg' => 'fill: {{VALUE}};',
            ],
            'default' => '#ffffff',
        ] );

        $this->add_control( 'arrow_bg', [
            'label' => esc_html__( 'Arrow Background', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sc-4d7dfff6-nav-btn' => 'background-color: {{VALUE}};',
            ],
            'default' => '#1f2937',
        ] );
        
        $this->add_control( 'arrow_disabled_bg', [
            'label' => esc_html__( 'Disabled Arrow Background', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .sc-4d7dfff6-nav-btn.swiper-button-disabled' => 'background-color: {{VALUE}};',
            ],
            'default' => '#4b5563',
        ] );

        $this->add_control( 'nav_gap', [
            'label' => esc_html__( 'Gap below Arrows', 'angie-snippets' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%', 'em', 'rem' ],
            'range' => [
                'px' => [ 'min' => 0, 'max' => 100, 'step' => 1 ],
            ],
            'default' => [
                'unit' => 'px',
                'size' => 20,
            ],
            'selectors' => [
                '{{WRAPPER}} .sc-4d7dfff6-top-bar' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ] );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        
        $swiper_data = [
            'autoplay' => $settings['autoplay'] === 'yes' ? [ 'delay' => $settings['autoplay_speed'] ] : false,
            'loop' => $settings['loop'] === 'yes',
            'slidesPerView' => $settings['slides_per_view']['size'],
            'spaceBetween' => 20,
        ];
        ?>
        <div class="sc-4d7dfff6-container">
            <div class="sc-4d7dfff6-top-bar">
                <div class="sc-4d7dfff6-nav">
                    <button class="sc-4d7dfff6-nav-btn sc-4d7dfff6-prev" aria-label="Previous slide">
                        <?php if ( ! empty( $settings['prev_icon']['url'] ) ) : ?>
                            <img src="<?php echo esc_url( $settings['prev_icon']['url'] ); ?>" alt="Previous" />
                        <?php else: ?>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                        <?php endif; ?>
                    </button>
                    <button class="sc-4d7dfff6-nav-btn sc-4d7dfff6-next" aria-label="Next slide">
                        <?php if ( ! empty( $settings['next_icon']['url'] ) ) : ?>
                            <img src="<?php echo esc_url( $settings['next_icon']['url'] ); ?>" alt="Next" />
                        <?php else: ?>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        <?php endif; ?>
                    </button>
                </div>
            </div>
            
            <div class="swiper sc-4d7dfff6-swiper" data-settings='<?php echo esc_attr( wp_json_encode( $swiper_data ) ); ?>'>
                <div class="swiper-wrapper">
                    <?php foreach ( $settings['cards'] as $card ) : ?>
                        <div class="swiper-slide">
                            <div class="sc-4d7dfff6-card">
                                <div class="sc-4d7dfff6-header">
                                    <?php if ( ! empty( $card['logo']['url'] ) ) : ?>
                                        <img src="<?php echo esc_url( $card['logo']['url'] ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>" />
                                    <?php endif; ?>
                                    <h3 class="sc-4d7dfff6-title"><?php echo esc_html( $card['title'] ); ?></h3>
                                </div>
                                
                                <div class="sc-4d7dfff6-metrics">
                                    <?php if ( ! empty( $card['metric_1_value'] ) ) : ?>
                                        <div class="sc-4d7dfff6-metric">
                                            <div class="sc-4d7dfff6-metric-val"><?php echo esc_html( $card['metric_1_value'] ); ?></div>
                                            <div class="sc-4d7dfff6-metric-lbl"><?php echo esc_html( $card['metric_1_label'] ); ?></div>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <?php if ( ! empty( $card['metric_2_value'] ) ) : ?>
                                        <div class="sc-4d7dfff6-metric">
                                            <div class="sc-4d7dfff6-metric-val"><?php echo esc_html( $card['metric_2_value'] ); ?></div>
                                            <div class="sc-4d7dfff6-metric-lbl"><?php echo esc_html( $card['metric_2_label'] ); ?></div>
                                        </div>
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
        <#
        var swiper_data = {
            autoplay: settings.autoplay === 'yes' ? { delay: settings.autoplay_speed } : false,
            loop: settings.loop === 'yes',
            slidesPerView: settings.slides_per_view.size,
            spaceBetween: 20
        };
        #>
        <div class="sc-4d7dfff6-container">
            <div class="sc-4d7dfff6-top-bar">
                <div class="sc-4d7dfff6-nav">
                    <button class="sc-4d7dfff6-nav-btn sc-4d7dfff6-prev">
                        <# if ( settings.prev_icon.url ) { #>
                            <img src="{{ settings.prev_icon.url }}" alt="Previous" />
                        <# } else { #>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                        <# } #>
                    </button>
                    <button class="sc-4d7dfff6-nav-btn sc-4d7dfff6-next">
                        <# if ( settings.next_icon.url ) { #>
                            <img src="{{ settings.next_icon.url }}" alt="Next" />
                        <# } else { #>
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        <# } #>
                    </button>
                </div>
            </div>
            
            <div class="swiper sc-4d7dfff6-swiper" data-settings='{{ JSON.stringify( swiper_data ) }}'>
                <div class="swiper-wrapper">
                    <# _.each( settings.cards, function( card ) { #>
                        <div class="swiper-slide">
                            <div class="sc-4d7dfff6-card">
                                <div class="sc-4d7dfff6-header">
                                    <# if ( card.logo.url ) { #>
                                        <img src="{{ card.logo.url }}" alt="{{ card.title }}" />
                                    <# } #>
                                    <h3 class="sc-4d7dfff6-title">{{{ card.title }}}</h3>
                                </div>
                                
                                <div class="sc-4d7dfff6-metrics">
                                    <# if ( card.metric_1_value ) { #>
                                        <div class="sc-4d7dfff6-metric">
                                            <div class="sc-4d7dfff6-metric-val">{{{ card.metric_1_value }}}</div>
                                            <div class="sc-4d7dfff6-metric-lbl">{{{ card.metric_1_label }}}</div>
                                        </div>
                                    <# } #>
                                    
                                    <# if ( card.metric_2_value ) { #>
                                        <div class="sc-4d7dfff6-metric">
                                            <div class="sc-4d7dfff6-metric-val">{{{ card.metric_2_value }}}</div>
                                            <div class="sc-4d7dfff6-metric-lbl">{{{ card.metric_2_label }}}</div>
                                        </div>
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