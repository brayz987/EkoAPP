'use strict';

const formPass = $("#changePassForm");
const buttonChangePass = $("#changePasswordButton");

buttonChangePass.click((e) => {
    e.preventDefault();
    const formData = new FormData(formPass[0]);
    
    $.ajax({
        type: "POST",
        url: "../actions/cambiosContrasena.php",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (response) {
            if( response.status == "true") {
                $("#formDiv").addClass('d-none');
                $("#changePasswordButton").addClass('d-none');
                $('#OKchangePasswordButton').removeClass('d-none');
                $("#alertPassword").removeClass("d-none");
                $("#alertPassword").find('.alert').removeClass('alert-danger').addClass('alert-success')
                $("#messagePassword").text(response.message);
            }else{
            $("#alertPassword").removeClass("d-none");
            $("#messagePassword").text(response);
            }
        }
    });
});
