$(document).ready(function() {

    $.validator.addMethod("pwcheck",function(value, element) {
        return (value.match(/[a-z]/) && value.match(/[A-Z]/) && value.match(/[0-9]/) && value.match(/[_!#@$%^&*]/));
    }, 'Please enter a valid password');

    $.validator.addMethod("oldcheck",function(value) { 
        var x = 0;
        var x = $.ajax({
            url: aurl + "/change-password/old-password-check",
            type: 'POST',
            async: false,
            data: {password:value},
        }).responseText; 
        if (x != 0){ return false; }else return true;
    }, 'Please Enter Currect Password');

    $("#changePassword_form").validate({
        rules: {
            oldpassword:
            {
                required: true,
                // minlength : 8,
                oldcheck : true,
            },
            password:
            {
                required: true,
                minlength : 8,
                pwcheck : true,
            },
            confirmpassword:
            {
                required: true,
                minlength : 8,
                equalTo : "#password"
            },

        },
        messages: {
            oldpassword:
            {
                required: "Please Enter Currect Password",
            },
            password: {
                required: "Please Enter Password",
                minlength: "Your Password Must Be At Least 8 Characters Long",
                pwcheck: "Please Enter Atleast One Uppercase, Number And Special Character!",
            },
            confirmpassword: {
                required: "This value should not be blank.",
                minlength: "Your Password Must Be At Least 8 Characters Long",
            },
            
        },
        errorPlacement: function(error, element) {
            if(element.parents("div").hasClass("uploader")||element.hasClass("datepicker")||element.hasClass("dobdatePicker")){
                error.appendTo(element.parent().parent());
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function(element) {
            $(element).removeClass("error");
        },
    });

       /* adding and updating fdo data */
       $(".submit_cahngePassword").on("click", function(event) {
        event.preventDefault();
        var form = $("#changePassword_form")[0];
        var formData = new FormData(form);
        if ($("#changePassword_form").valid()) {
            $.ajax({
                url: aurl + "/change-password",
                type: "POST",
                dataType: "JSON",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    toaster_message(data.message,data.icon,data.redirect_url);
                },
                error: function(request) {
                    toaster_message(
                        "Something Went Wrong! Please Try Again.",
                        "error"
                    );
                },
            });
        }
    });
    
});