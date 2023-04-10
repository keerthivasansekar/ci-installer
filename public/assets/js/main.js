(function ($) {

    var form = $("#signup-form");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {
            element.before(error);
        },
        rules: {
            app_url: "required",
            db_host: "required",
            db_name: "required",
            db_user: "required",
            db_port: "required",
            terms_acceptance: "required",
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
            if (confirm('Login details\nUsername: admin\nPassword: admin')) {
                window.location.replace($(location).attr('origin'));
            } else {
                alert('Click ok to redirect to main page');
            }
        },
        onStepChanged: function (event, currentIndex, priorIndex) {
            if (currentIndex === 2) {
                setDomainUrl();
            }
            if (currentIndex === 4) {
                disableNext();   
            }
            if (currentIndex === 5) {
                removeStatusIcon();
                setTimeout(
                    function(){
                        createEnv();
                        setTimeout(
                            function(){
                                createDatabase();
                                setTimeout(
                                    function(){
                                        createAdminUser();
                                        setTimeout(
                                            function(){
                                                createInstallLockFile();
                                                setTimeout(
                                                    function(){
                                                        finishInstallation();
                                                    }
                                                , 5000);
                                            }
                                        , 5000);
                                    }
                                , 5000);
                            }
                        , 5000);
                    }
                , 5000);
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

    function setDomainUrl(){
        var url = $(location).attr('origin');
        $('#app_url').val(url);
    }

    function removeIcon(elementId){
        $('#'+elementId+' i').remove();
    }

    function removeStatusIcon(){
        $('li img').remove();
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

    function createEnv(){
        var data = {
            'app_url': $('#app_url').val(),
            'db_host': $('#db_host').val(),
            'db_name': $('#db_name').val(),
            'db_user': $('#db_user').val(),
            'db_pass': $('#db_pass').val(),
            'db_port': $('#db_port').val(),
        };
        $.ajax({
            url: $(location).attr('origin') + '/install/create-env',
            type: 'POST',
            dataType: "json",
            data: data,
            success: function (res) {
                if (res.status) {
                    removeIcon('create-env');
                    $('#create-env').prepend('<img class="prerequisite-check-img" src="./assets/images/check-mark.png" alt="">');
                } else {
                    removeIcon('create-env');
                    $('#create-env').prepend('<img class="prerequisite-check-img" src="./assets/images/cross-icon.png" alt="">');
                }
            }
        });
    }

    function createDatabase(){

        $.ajax({
            url: $(location).attr('origin') + '/install/create-database',
            type: 'GET',
            dataType: "json",
            success: function (res) {
                if (res.status) {
                    removeIcon('create-database-tables');
                    $('#create-database-tables').prepend('<img class="prerequisite-check-img" src="./assets/images/check-mark.png" alt="">');
                } else {
                    removeIcon('create-database-tables');
                    $('#create-database-tables').prepend('<img class="prerequisite-check-img" src="./assets/images/cross-icon.png" alt="">');
                }
            }
        });
    }

    function createAdminUser(){
        var data = {
            'username': 'admin',
            'password': 'admin',
            'email': 'admin@admin.com',
        };
        $.ajax({
            url: $(location).attr('origin') + '/install/create-user',
            type: 'POST',
            dataType: "json",
            data: data,
            success: function (res) {
                if (res.status) {
                    removeIcon('create-admin-user');
                    $('#create-admin-user').prepend('<img class="prerequisite-check-img" src="./assets/images/check-mark.png" alt="">');
                } else {
                    removeIcon('create-admin-user');
                    $('#create-admin-user').prepend('<img class="prerequisite-check-img" src="./assets/images/cross-icon.png" alt="">');
                }
            }
        });
    }

    function createInstallLockFile(){

        $.ajax({
            url: $(location).attr('origin') + '/install/create-installlock',
            type: 'GET',
            dataType: "json",
            success: function (res) {
                if (res.status) {
                    removeIcon('create-verify-installation');
                    $('#create-verify-installation').prepend('<img class="prerequisite-check-img" src="./assets/images/check-mark.png" alt="">');
                } else {
                    removeIcon('create-verify-installation');
                    $('#create-verify-installation').prepend('<img class="prerequisite-check-img" src="./assets/images/cross-icon.png" alt="">');
                }
            }
        });
    }

    function finishInstallation(){
        $.ajax({
            url: $(location).attr('origin') + '/finish-Installation',
            type: 'GET',
            dataType: "json",
            success: function (res) {
                if (res.status) {
                    removeIcon('create-install-finished');
                    $('#create-install-finished').prepend('<img class="prerequisite-check-img" src="./assets/images/check-mark.png" alt="">');
                } else {
                    removeIcon('create-install-finished');
                    $('#create-install-finished').prepend('<img class="prerequisite-check-img" src="./assets/images/cross-icon.png" alt="">');
                }
            }
        });
    }

})(jQuery);