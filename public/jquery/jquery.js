// function isEmail(inputEmail) {
//     var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
//     return regex.test(inputEmail);
// }

// function validatePassword(inputPassword) {
//     return inputPassword.length > 4;
// }

// $(document).ready(function() {
//     $('#re_email').change(function() {
//         var re_email = $(this).val().trim();
//         // alert(`email = ${JSON.stringify(email)}`)
//         if (!isEmail(re_email)) {
//             //Error ?
//             $(".emailError").html("Email khong dung");
//         } else {
//             $(".emailError").html("");
//         }
//     });

//     $('#password').change(function() {
//         var password = $(this).val();
//         if (!validatePassword(password)) {
//             $(".passwordError").html("Password hon 5 ki tu");
//         } else {
//             $(".passwordError").html("");
//         }
//     });
// });
// }
// function IsEmail(re_email) {
//              var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-]+\.)+\.+\.)+([a-zA-Z0-9]{2,4})+$/;
//              if(!regex.test(re_email)) {
//                 return false;
//              }else{
//                 return true;
//              }


$(document).ready(function () {

jQuery.validator.addMethod('phonenu', function(value, element) {
    if(element.value != 10 && element.value == isNaN)
    {
        return false;
    }
    else 
    {    return true;
        
    }, 'Invalid phone number'}); 


    $('#myform').validate({
        rules: {
            phone: {
                required: true
                phonenu: true,
                
            }
        }
    });

});
