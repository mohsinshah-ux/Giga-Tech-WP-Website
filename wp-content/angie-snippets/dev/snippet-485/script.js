class CaseStudyCarouselHandler extends elementorModules.frontend.handlers.Base {
    getDefaultSettings() {
        return {
            selectors: {
                container: '.csc-630c0858-container',
                swiper: '.csc-630c0858-swiper',
                prev: '.csc-630c0858-prev',
                next: '.csc-630c0858-next'
            }
        };
    }
    getDefaultElements() {
        const s = this.getSettings('selectors');
        return {
            $container: this.$element.find(s.container),
            $swiper: this.$element.find(s.swiper),
            $prev: this.$element.find(s.prev),
            $next: this.$element.find(s.next)
        };
    }
    bindEvents() {
        if (typeof Swiper === 'undefined') return;
        const el = this.elements.$container[0];
        const spv      = parseFloat(el.dataset.spv) || 2.2;
        const sb       = parseInt(el.dataset.sb) || 20;
        const loop     = el.dataset.loop === 'true';
        const autoplay = el.dataset.autoplay !== 'false' ? { delay: parseInt(el.dataset.autoplay) } : false;

        new Swiper(this.elements.$swiper[0], {
            slidesPerView: spv,
            spaceBetween: sb,
            loop: loop,
            autoplay: autoplay,
            navigation: {
                prevEl: this.elements.$prev[0],
                nextEl: this.elements.$next[0]
            },
            breakpoints: {
                320: { slidesPerView: 1, spaceBetween: 12 },
                768: { slidesPerView: Math.min(2, spv), spaceBetween: sb },
                1024: { slidesPerView: spv, spaceBetween: sb }
            }
        });
    }
}
jQuery(window).on('elementor/frontend/init', () => {
    elementorFrontend.hooks.addAction('frontend/element_ready/case_study_carousel_630c0858.default', ($element) => {
        elementorFrontend.elementsHandler.addHandler(CaseStudyCarouselHandler, { $element });
    });
});