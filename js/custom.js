/* global $, alert, console */
$(function () {
    'use strict';

    var userError = true;
    var emailError = true;
    var messageError = true;

    function checkErrors(){
        if(userError === true || emailError === true || messageError === true){
            console.log("There's Errors in Form");
        }else {
            console.log("Form Is Valid");
        }
    }
    checkErrors();

    $('.username').blur(function () {
        if ($(this).val().length < 4) { // show errors
            $(this).css('border', '1px solid red');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.asterisx').fadeIn(100);
            userError = true;
        } else { // no errors
            $(this).css('border', '1px solid green');
            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).parent().find('.asterisx').fadeOut(100);
            userError = false;
        }
        checkErrors();
    });

    $('.email').blur(function () {
        if ($(this).val()=== "") { 
            $(this).css('border', '1px solid red');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.asterisx').fadeIn(100);
            emailError = true;
        } else {
            $(this).css('border', '1px solid green');
            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).parent().find('.asterisx').fadeOut(100);
            emailError = false;
        }
        checkErrors();
    });

    $('.message').blur(function () {
        if ($(this).val().length < 11) {
            $(this).css('border', '1px solid red');
            $(this).parent().find('.custom-alert').fadeIn(200);
            $(this).parent().find('.asterisx').fadeIn(100);
            messageError = true;
        } else {
            $(this).css('border', '1px solid green');
            $(this).parent().find('.custom-alert').fadeOut(200);
            $(this).parent().find('.asterisx').fadeOut(100);
            messageError = false;
        }
        checkErrors();
    });

    // Submit Form Validation
    $('.contact-form').submit(function (e) {
        
        if (userError === true || emailError === true || msgError === true) {
            
            e.preventDefault();
            
            $('.username, .email, .message').blur();
            
        }
        
    });
});