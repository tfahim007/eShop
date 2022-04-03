$(document).ready(function () {
    $('.payment_btn').click(function (e) { 
        e.preventDefault();
        var fname= $('.fname').val();
        var lname= $('.lname').val();
        var email= $('.email').val();
        var phone= $('.phone').val();
        var address1= $('.address1').val();
        var address2= $('.address2').val();
        var city= $('.city').val();
        var division= $('.division').val();
        var country= $('.country').val();
        var pincode= $('.pincode').val();

        if(!fname){
            fname_error = "First Name is required";
            $('.fname_error').html('');
            $('.fname_error').html(fname_error);
        }

        if(!lname){
            lname_error = "Last Name is required";
            $('.lname_error').html('');
            $('.lname_error').html(lname_error);
        }

        if(!email){
            email_error = "Email is required";
            $('.email_error').html('');
            $('.email_error').html(email_error);
        }

        if(!lname){
            lname_error = "Last Name is required";
            $('.lname_error').html('');
            $('.lname_error').html(lname_error);
        }
    });
});