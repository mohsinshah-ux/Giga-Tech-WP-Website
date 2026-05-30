class StatsCarouselHandler extends elementorModules.frontend.handlers.Base {
    getDefaultSettings() {
        return {
            selectors: {
                swiper: '.sc-4d7dfff6-swiper',
                prevBtn: '.sc-4d7dfff6-prev',
                nextBtn: '.sc-4d7dfff6-next',
            },
        };
    }

    getDefaultElements() {
        const selectors = this.getSettings('selectors');
        return {
            $swiper: this.$element.find(selectors.swiper),
            $prevBtn: this.$element.find(selectors.prevBtn),
            $nextBtn: this.$element.find(selectors.nextBtn),
        };
    }

    bindEvents() {
        this.initSwiper();
    }

    initSwiper() {
        const swiperElement = this.elements.$swiper[0];
        if (!swiperElement || typeof Swiper === 'undefined') return;

        let settings = {};
        try {
            settings = JSON.parse(swiperElement.getAttribute('data-settings'));
        } catch (e) {
            console.error('Failed to parse swiper settings', e);
        }

        const swiperOptions = {
            slidesPerView: settings.slidesPerView || 2.5,
            spaceBetween: settings.spaceBetween || 20,
            loop: settings.loop || false,
            autoplay: settings.autoplay || false,
            navigation: {
                nextEl: this.elements.$nextBtn[0],
                prevEl: this.elements.$prevBtn[0],
            },
            breakpoints: {
                320: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                1024: { slidesPerView: settings.slidesPerView || 2.5 },
            }
        };

        this.swiper = new Swiper(swiperElement, swiperOptions);
    }
}

jQuery(window).on('elementor/frontend/init', () => {
    const addHandler = ($element) => {
        elementorFrontend.elementsHandler.addHandler(StatsCarouselHandler, { $element });
    };
    elementorFrontend.hooks.addAction('frontend/element_ready/stats_carousel_4d7dfff6.default', addHandler);
});