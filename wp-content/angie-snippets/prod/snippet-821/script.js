/* Inquiry Form Widget - 0e694386 */

class InquiryFormHandler_0e694386 extends elementorModules.frontend.handlers.Base {
    getDefaultSettings() {
        return {
            selectors: {
                form: '.ifw-form-inner-0e694386',
                optionBtns: '.ifw-option-btn-0e694386',
                optionsWrap: '.ifw-options-wrap-0e694386',
                submitBtn: '.ifw-submit-btn-0e694386',
                successMsg: '.ifw-success-msg-0e694386',
                errorResponse: '.ifw-error-response-0e694386',
                dropzone: '.ifw-dropzone-0e694386',
                fileInput: '.ifw-file-input-0e694386',
                fileName: '.ifw-file-name-0e694386',
                fields: '.ifw-field-0e694386',
                recaptchaWrap: '.ifw-recaptcha-wrap-0e694386',
                recaptchaError: '.ifw-recaptcha-error-0e694386'
            }
        };
    }

    getDefaultElements() {
        var selectors = this.getSettings('selectors');
        return {
            $form: this.$element.find(selectors.form),
            $optionBtns: this.$element.find(selectors.optionBtns),
            $optionsWraps: this.$element.find(selectors.optionsWrap),
            $submitBtn: this.$element.find(selectors.submitBtn),
            $successMsg: this.$element.find(selectors.successMsg),
            $errorResponse: this.$element.find(selectors.errorResponse),
            $dropzone: this.$element.find(selectors.dropzone),
            $fileInput: this.$element.find(selectors.fileInput),
            $fileName: this.$element.find(selectors.fileName),
            $fields: this.$element.find(selectors.fields),
            $recaptchaWrap: this.$element.find(selectors.recaptchaWrap),
            $recaptchaError: this.$element.find(selectors.recaptchaError)
        };
    }

    bindEvents() {
        var self = this;

        this.elements.$optionBtns.on('click', function () {
            var btn = jQuery(this);
            var wrap = btn.closest('.ifw-options-wrap-0e694386');
            var isMultiple = wrap.data('multiple') === 'yes';

            if (isMultiple) {
                btn.toggleClass('is-active-0e694386');
            } else {
                wrap.find('.ifw-option-btn-0e694386').removeClass('is-active-0e694386');
                btn.addClass('is-active-0e694386');
            }
        });

        if (this.elements.$dropzone.length) {
            this.elements.$dropzone.on('dragover', function (e) {
                e.preventDefault();
                jQuery(this).addClass('is-dragover-0e694386');
            });

            this.elements.$dropzone.on('dragleave drop', function () {
                jQuery(this).removeClass('is-dragover-0e694386');
            });

            this.elements.$fileInput.on('change', function () {
                var file = this.files[0];
                if (file) {
                    var maxSize = self.elements.$dropzone.data('max-size') || 10;
                    if (file.size > maxSize * 1024 * 1024) {
                        self.elements.$fileName.text('File too large (max ' + maxSize + 'MB)').addClass('has-file-0e694386').css('color', '#f87171');
                        this.value = '';
                        return;
                    }
                    self.elements.$fileName.text(file.name).addClass('has-file-0e694386').css('color', '');
                } else {
                    self.elements.$fileName.text('').removeClass('has-file-0e694386');
                }
            });
        }

        this.elements.$form.on('submit', function (e) {
            e.preventDefault();
            self.handleSubmit();
        });
    }

    handleSubmit() {
        var self = this;
        var form = this.elements.$form;

        /* Clear previous errors */
        form.find('.ifw-error-msg-0e694386').remove();
        this.elements.$errorResponse.hide().text('');
        if (this.elements.$recaptchaError.length) {
            this.elements.$recaptchaError.hide().text('');
        }

        var fullname = form.find('input[name="fullname"]').val().trim();
        var email = form.find('input[name="email"]').val().trim();
        var details = form.find('textarea[name="details"]').val().trim();
        var hasError = false;

        if (!fullname) {
            this.showFieldError(form.find('input[name="fullname"]'), 'Full name is required');
            hasError = true;
        }

        if (!email || !this.isValidEmail(email)) {
            this.showFieldError(form.find('input[name="email"]'), 'Valid email is required');
            hasError = true;
        }

        if (!details) {
            this.showFieldError(form.find('textarea[name="details"]'), 'Project details are required');
            hasError = true;
        }

        /* reCAPTCHA validation */
        var recaptchaResponse = '';
        var hasRecaptcha = this.elements.$recaptchaWrap.length > 0 && form.find('.g-recaptcha').length > 0;
        if (hasRecaptcha) {
            recaptchaResponse = form.find('textarea[name="g-recaptcha-response"]').val() || '';
            if (!recaptchaResponse && typeof grecaptcha !== 'undefined') {
                recaptchaResponse = grecaptcha.getResponse();
            }
            if (!recaptchaResponse) {
                this.elements.$recaptchaError.text('Please complete the reCAPTCHA verification.').show();
                hasError = true;
            }
        }

        if (hasError) return;

        var services = [];
        form.find('.ifw-options-wrap-0e694386[data-group="service"] .is-active-0e694386').each(function () {
            services.push(jQuery(this).data('value'));
        });

        var budget = '';
        var activeBudget = form.find('.ifw-options-wrap-0e694386[data-group="budget"] .is-active-0e694386');
        if (activeBudget.length) {
            budget = activeBudget.data('value');
        }

        var originalText = this.elements.$submitBtn.text().trim();
        this.elements.$submitBtn.prop('disabled', true).text('Sending...');

        var actionType = form.find('input[name="ifw_action_type_0e694386"]').val();

        if (actionType === 'redirect') {
            var redirectUrl = form.find('input[name="ifw_redirect_0e694386"]').val();
            if (redirectUrl) {
                window.location.href = redirectUrl;
                return;
            }
        }

        var formData = new FormData();
        formData.append('action', 'ifw_submit_0e694386');
        formData.append('ifw_nonce_0e694386', form.find('input[name="ifw_nonce_0e694386"]').val());
        formData.append('fullname', fullname);
        formData.append('email', email);
        formData.append('details', details);
        formData.append('services', services.join(', '));
        formData.append('budget', budget);
        formData.append('to_email', form.find('input[name="ifw_to_0e694386"]').val());
        formData.append('email_subject', form.find('input[name="ifw_subject_0e694386"]').val());

        /* reCAPTCHA */
        if (recaptchaResponse) {
            formData.append('g-recaptcha-response', recaptchaResponse);
        }
        var recaptchaSecret = form.find('input[name="ifw_recaptcha_secret_0e694386"]').val();
        if (recaptchaSecret) {
            formData.append('recaptcha_secret', recaptchaSecret);
        }

        /* SMTP fields */
        var smtpFields = ['smtp_host', 'smtp_port', 'smtp_encryption', 'smtp_username', 'smtp_password', 'smtp_from_email', 'smtp_from_name'];
        smtpFields.forEach(function(field) {
            var val = form.find('input[name="ifw_' + field + '_0e694386"]').val();
            if (val) {
                formData.append(field, val);
            }
        });

        /* File attachment */
        var fileInput = form.find('.ifw-file-input-0e694386');
        if (fileInput.length && fileInput[0].files[0]) {
            formData.append('attachment', fileInput[0].files[0]);
        }

        var ajaxUrl = (typeof ifw_ajax_0e694386 !== 'undefined') ? ifw_ajax_0e694386.ajax_url : '/wp-admin/admin-ajax.php';

        jQuery.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    self.elements.$successMsg.slideDown(300);
                    self.elements.$submitBtn.prop('disabled', false).text(originalText);
                    form[0].reset();
                    form.find('.is-active-0e694386').removeClass('is-active-0e694386');
                    form.find('.ifw-file-name-0e694386').text('').removeClass('has-file-0e694386');
                    /* Reset reCAPTCHA */
                    if (hasRecaptcha && typeof grecaptcha !== 'undefined') {
                        grecaptcha.reset();
                    }
                    setTimeout(function () {
                        self.elements.$successMsg.slideUp(300);
                    }, 5000);
                } else {
                    var msg = (response.data && response.data.message) ? response.data.message : 'Something went wrong. Please try again.';
                    self.elements.$errorResponse.text(msg).slideDown(300);
                    self.elements.$submitBtn.prop('disabled', false).text(originalText);
                    if (hasRecaptcha && typeof grecaptcha !== 'undefined') {
                        grecaptcha.reset();
                    }
                    setTimeout(function () {
                        self.elements.$errorResponse.slideUp(300);
                    }, 6000);
                }
            },
            error: function () {
                self.elements.$errorResponse.text('Network error. Please try again.').slideDown(300);
                self.elements.$submitBtn.prop('disabled', false).text(originalText);
                if (hasRecaptcha && typeof grecaptcha !== 'undefined') {
                    grecaptcha.reset();
                }
                setTimeout(function () {
                    self.elements.$errorResponse.slideUp(300);
                }, 6000);
            }
        });
    }

    showFieldError(field, message) {
        var errorEl = jQuery('<div class="ifw-error-msg-0e694386"></div>').text(message);
        field.closest('.ifw-field-group-0e694386, .ifw-half-0e694386').append(errorEl);
    }

    isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }
}

jQuery(window).on('elementor/frontend/init', function () {
    var addHandler = function addHandler($element) {
        elementorFrontend.elementsHandler.addHandler(InquiryFormHandler_0e694386, { $element: $element });
    };
    elementorFrontend.hooks.addAction('frontend/element_ready/inquiry_form_widget_0e694386.default', addHandler);
});
