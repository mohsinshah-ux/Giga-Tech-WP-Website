/* Custom Cursor System - b7142d1a */
(function () {
    'use strict';

    var matchMedia = window.matchMedia('(pointer: fine)');
    if (!matchMedia.matches) return;

    var config = window.customCursorConfig_b7142d1a || {};
    var cursorColor = config.cursorColor || '#111111';
    var hoverLabelColor = config.hoverLabelColor || '#77B700';

    var cursorEl = null;
    var labelEl = null;
    var mouseX = -100;
    var mouseY = -100;
    var curX = -100;
    var curY = -100;
    var rafId = null;
    var isVisible = false;

    function initCursor() {
        cursorEl = document.querySelector('.angie-cursor-b7142d1a');
        if (!cursorEl) return;

        labelEl = cursorEl.querySelector('.angie-cursor-label-b7142d1a');
        var svgArrow = cursorEl.querySelector('.angie-cursor-arrow-b7142d1a');

        if (svgArrow) {
            svgArrow.style.color = cursorColor;
        }
        if (labelEl) {
            labelEl.style.backgroundColor = hoverLabelColor;
        }

        document.body.classList.add('angie-cursor-active-b7142d1a');

        document.addEventListener('mousemove', onMouseMove, { passive: true });
        document.addEventListener('mousedown', onMouseDown);
        document.addEventListener('mouseup', onMouseUp);
        document.addEventListener('mouseover', onMouseOver, { passive: true });
        document.addEventListener('mouseout', onMouseOut, { passive: true });
        document.addEventListener('mouseleave', onDocLeave);
        document.addEventListener('mouseenter', onDocEnter);

        animate();
    }

    function onMouseMove(e) {
        mouseX = e.clientX;
        mouseY = e.clientY;
        if (!isVisible) {
            isVisible = true;
            cursorEl.style.display = 'flex';
        }
    }

    function onMouseDown() {
        cursorEl.classList.add('is-clicking-b7142d1a');
    }

    function onMouseUp() {
        cursorEl.classList.remove('is-clicking-b7142d1a');
    }

    function getLabelForElement(el) {
        if (!el) return '';

        var dataLabel = el.getAttribute('data-cursor-label');
        if (dataLabel) return dataLabel;

        var tag = el.tagName.toLowerCase();

        if (tag === 'a') {
            var href = el.getAttribute('href') || '';
            if (href.indexOf('mailto:') === 0) return 'Email';
            if (href.indexOf('tel:') === 0) return 'Call';
            if (href.indexOf('#') === 0 && href.length > 1) return 'Scroll';
            if (el.getAttribute('target') === '_blank') return 'Open';
            return 'Click';
        }

        if (tag === 'button' || tag === 'input' && (el.type === 'submit' || el.type === 'button')) {
            return 'Click';
        }

        if (tag === 'input' || tag === 'textarea' || tag === 'select') {
            return 'Type';
        }

        if (tag === 'img' || tag === 'video' || tag === 'figure') {
            return 'View';
        }

        return '';
    }

    function getInteractiveParent(el) {
        var current = el;
        var maxDepth = 10;
        while (current && maxDepth > 0) {
            if (!current.tagName) break;
            var tag = current.tagName.toLowerCase();
            if (
                tag === 'a' ||
                tag === 'button' ||
                tag === 'input' ||
                tag === 'textarea' ||
                tag === 'select' ||
                current.getAttribute('role') === 'button' ||
                current.getAttribute('data-cursor-label')
            ) {
                return current;
            }
            current = current.parentElement;
            maxDepth--;
        }
        return null;
    }

    function onMouseOver(e) {
        var interactive = getInteractiveParent(e.target);
        if (interactive) {
            var label = getLabelForElement(interactive);
            if (label && labelEl) {
                labelEl.textContent = label;
                cursorEl.classList.add('is-hovering-b7142d1a');
            }
        }
    }

    function onMouseOut(e) {
        var interactive = getInteractiveParent(e.target);
        if (interactive) {
            var related = getInteractiveParent(e.relatedTarget);
            if (related !== interactive) {
                cursorEl.classList.remove('is-hovering-b7142d1a');
            }
        }
    }

    function onDocLeave() {
        isVisible = false;
        cursorEl.style.display = 'none';
    }

    function onDocEnter() {
        isVisible = true;
        cursorEl.style.display = 'flex';
    }

    function animate() {
        var ease = 0.15;
        curX += (mouseX - curX) * ease;
        curY += (mouseY - curY) * ease;

        if (cursorEl) {
            cursorEl.style.transform = 'translate3d(' + curX + 'px, ' + curY + 'px, 0)';
        }

        rafId = requestAnimationFrame(animate);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCursor);
    } else {
        initCursor();
    }
})();
