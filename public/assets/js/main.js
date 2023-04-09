(function ($) {

    var form = $("#signup-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            email: {
                email: true
            }
        },
        onfocusout: function (element) {
            $(element).valid();
        },
    });
    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        stepsOrientation: "vertical",
        titleTemplate: '<div class="title"><span class="step-number">#index#</span><span class="step-text">#title#</span></div>',
        labels: {
            previous: 'Previous',
            next: 'Next',
            finish: 'Finish',
            current: ''
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            if (currentIndex === 0) {
                checkPrerequisite();
                form.parent().parent().parent().append('<div class="footer footer-' + currentIndex + '"></div>');
            }
            if (currentIndex === 1) {
                form.parent().parent().parent().find('.footer').removeClass('footer-0').addClass('footer-' + currentIndex + '');
            }
            if (currentIndex === 2) {
                form.parent().parent().parent().find('.footer').removeClass('footer-1').addClass('footer-' + currentIndex + '');
            }
            if (currentIndex === 3) {
                form.parent().parent().parent().find('.footer').removeClass('footer-2').addClass('footer-' + currentIndex + '');
            }
            if (currentIndex === 4) {
                form.parent().parent().parent().find('.footer').removeClass('footer-3').addClass('footer-' + currentIndex + '');
            }
            if (currentIndex === 5) {
                form.parent().parent().parent().find('.footer').removeClass('footer-4').addClass('footer-' + currentIndex + '');
            }
            // if(currentIndex === 4) {
            //     form.parent().parent().parent().append('<div class="footer" style="height:752px;"></div>');
            // }
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex) {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            alert('Submited');
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            if (currentIndex === 4) {
                disableNext();   
            }
            return true;
        }
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "",
        email: "",
        url: "",
        date: "",
        dateISO: "",
        number: "",
        digits: "",
        creditcard: "",
        equalTo: ""
    });

    function checkPrerequisite() {
        $.ajax({
            url: $(location).attr('origin') + '/install/prerequisite-check',
            type: 'GET',
            dataType: "json",
            success: function (res) {
                if (res.php_version) {
                    $('#phpCheck').html(
                        '<img class="prerequisite-check-img" src="./assets/images/check-mark.png" alt=""><span class="prerequisite-check-text">PHP version > 7.4 or 8.0</span>'
                    );
                } else {
                    $('#phpCheck').html(
                        '<img class="prerequisite-check-img" src="./assets/images/cross-icon.png" alt=""><span class="prerequisite-check-text">PHP version > 7.4 or 8.0</span>'
                    );
                }

                if (res.intl) {
                    $('#intlCheck').html(
                        '<img class="prerequisite-check-img" src="./assets/images/check-mark.png" alt=""><span class="prerequisite-check-text">Intl extension enabled</span>'
                    );
                } else {
                    $('#intlCheck').html(
                        '<img class="prerequisite-check-img" src="./assets/images/cross-icon.png" alt=""><span class="prerequisite-check-text">Intl extension enabled</span>'
                    );
                }

                if (res.mbstring) {
                    $('#mbstringCheck').html(
                        '<img class="prerequisite-check-img" src="./assets/images/check-mark.png" alt=""><span class="prerequisite-check-text">Mbstring extension enabled</span>'
                    );
                } else {
                    $('#mbstringCheck').html(
                        '<img class="prerequisite-check-img" src="./assets/images/cross-icon.png" alt=""><span class="prerequisite-check-text">Mbstring extension enabled</span>'
                    );
                }

                if (res.writable_folder) {
                    $('#writableFolderCheck').html(
                        '<img class="prerequisite-check-img" src="./assets/images/check-mark.png" alt=""><span class="prerequisite-check-text">Writable folder is writable</span>'
                    );
                } else {
                    $('#writableFolderCheck').html(
                        '<img class="prerequisite-check-img" src="./assets/images/cross-icon.png" alt=""><span class="prerequisite-check-text">Writable folder is writable</span>'
                    );
                }

                if (res.public_folder) {
                    $('#publicFolderCheck').html(
                        '<img class="prerequisite-check-img" src="./assets/images/check-mark.png" alt=""><span class="prerequisite-check-text">Public folder is accessible</span>'
                    );
                } else {
                    $('#publicFolderCheck').html(
                        '<img class="prerequisite-check-img" src="./assets/images/cross-icon.png" alt=""><span class="prerequisite-check-text">Public folder is accessible</span>'
                    );
                }

                if (res.overall) {
                    $('#prerequisite-status').html(
                        '<img src="./assets/images/check-mark.png" alt="Success" /><h4> All requirements met!! Proceed to next step.</h4>'
                    );
                } else {
                    $('#prerequisite-status').html(
                        '<img src="./assets/images/cross-icon.png" alt="Failure" /><h4> Check requirements are met!!</h4>'
                    );
                }
            }
        });
    }

    $('#db_test_connect').click(function (event) {
        event.preventDefault();
        var data = {
            'db_host': $('#db_host').val(),
            'db_name': $('#db_name').val(),
            'db_user': $('#db_user').val(),
            'db_pass': $('#db_pass').val(),
            'db_port': $('#db_port').val(),
        };
        $.ajax({
            url: $(location).attr('origin') + '/install/database-check',
            type: 'POST',
            dataType: "json",
            data: data,
            success: function (res) {
                if (res.status) {
                    $('#test_db_status').addClass('success-message');
                    $('#test_db_status').text('Connection Success');
                } else {
                    $('#test_db_status').addClass('failure-message');
                    $('#test_db_status').text('Connection Failed');
                }
            }
        });
    });

    $('#terms_acceptance').change(function(){
        if (this.checked) {
            enableNext()
            $(this).attr("checked");
        }
    });

    var buttonEnabled = true;
    function disableNext() {
        var nextButton = $(".actions ul li:nth-child(2) a");
        buttonEnabled = $(".actions ul li:nth-child(2)").addClass("disabled").attr("aria-disabled", "true");
    }

    function enableNext() {
        var nextButton = $(".actions ul li:nth-child(2) a");
        buttonEnabled = $(".actions ul li:nth-child(2)").removeClass("disabled").attr("aria-disabled", "false");
    }

})(jQuery);