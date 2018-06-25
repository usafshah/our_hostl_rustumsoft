  $(document).ready(function() {
    $('#regform').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
           name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply your first name'
                    }
                }
            },
             bg: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply your last name'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    email: {
                        type:'post',
                        url:'check_email.php',// put your real file name
                        data:{email: email},
                        message: 'Please supply a valid email address'
                    }
                }
            },
            phone: {
                validators: {

                    notEmpty: {
                        message: 'Please supply your phone number'
                    },
                    phone: {
                        country: 'PK',
                        message: 'phone number should be 3121234567'
						
                    }
                }
            },
            cnic: {
                validators: {

                    notEmpty: {
                        message: 'Please supply your CNIC number(1610112345670)'
                    },
                    numeric: {
                        message: 'The value is not a number'
                    },
                    stringlength: {
                        max: 11,
                    },
                }
            },
            address: {
                validators: {
                     stringLength: {
                        min: 8,
                    },
                    notEmpty: {
                        message: 'Please supply your Full address'
                    }
                }
            },
            city: {
                validators: {
                     stringLength: {
                        min: 4,
                    },
                    notEmpty: {
                        message: 'Please supply your city'
                    }
                }
            },
            district: {
                validators: {
                    notEmpty: {
                        message: 'Please select your District'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your zip code'
                    },
                    zipCode: {
                        country: 'US',
                        message: 'Please supply a vaild zip code'
                    }
                }
            },
            pass: {
                validators: {
                      stringLength: {
                        min: 8,
                        message:'Please enter at least 8 characters password'
                    },
                    notEmpty: {
                        message: 'Password will not be empty please enter your password'
                    }
                    }
                }
            }
        })
        .on('success.form.bv', function(e) {
            $('#success_message').slideDown({ opacity: "show" }, "slow") // Do something ...
                $('#contact_form').data('bootstrapValidator').resetForm();

            // Prevent form submission
            e.preventDefault();

            // Get the form instance
            var $form = $(e.target);

            // Get the BootstrapValidator instance
            var bv = $form.data('bootstrapValidator');

            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function(result) {
                console.log(result);
            }, 'json');
        });
});