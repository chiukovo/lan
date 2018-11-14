;(function($) {
    'use strict';

    /**
     * Only proceed if current page is a 'Profile Forms' form builder page
     */
    if (!$('#wpuf-form-builder.wpuf-form-builder-profile').length) {
        return;
    }

    window.wpuf_forms_mixin_root = {
        data: function () {
            return {
                validation_error_msg: wpuf_form_builder.i18n.email_needed,
            };
        },

        methods: {
            // wpuf_profile must have 'user_email'
            // field template
            validate_form_before_submit: function () {
                var is_valid = false;

                _.each(this.form_fields, function (form_field) {
                    if (_.indexOf(['user_email'], form_field.template) >= 0) {
                        is_valid = true;
                        return;
                    }
                });

                return is_valid;
            }
        }
    };

    window.wpuf_forms_mixin_builder_stage = {
        data: function () {
            return {
                label_type: 'left',
                post_form_settings: {
                    submit_text: '',
                    draft_post: false
                }
            };
        }
    };

})(jQuery);
