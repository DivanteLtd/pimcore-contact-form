$(function () {
    var FormValidator = {
        init: function () {
            FormValidator.validate();
        },
        validate: function () {
            FormValidator.validateInput('.name', 1);
            FormValidator.validateInput('.subject', 1);
            FormValidator.validateInput('.message', 10);
            FormValidator.validateEmail('.email');
        },
        validateInput: function (className, minChar) {
            $(className).blur(function () {
                if ($(this).val() === '' || $(this).val().length < minChar) {
                    $(this).addClass('error-alert').removeClass('correct-alert');
                    $(this).parent().find('.custom-alert').fadeIn(300).end();
                } else {
                    $(this).addClass('correct-alert').removeClass('error-alert');
                    $(this).parent().find('.custom-alert').fadeOut(300).end();
                }
            });
        },
        validateEmail: function (className) {
            $(className).blur(function () {
                var atpos = this.value.indexOf("@");
                var dotpos = this.value.lastIndexOf(".");
                if ($(this).val() === '' || (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= this.value.length)) {
                    $(this).addClass('error-alert').removeClass('correct-alert');
                    $(this).parent().find('.custom-alert').fadeIn(300).end();
                }
                else {
                    $(this).addClass('correct-alert').removeClass('error-alert');
                    $(this).parent().find('.custom-alert').fadeOut(300).end();
                }
            });
        }
    };
    $(document).ready(FormValidator.init);
});