$(document).ready(function() {

    $('#submit').click(function(){
        let email = $('#email').val();
        let password = $('#password').val();

        $.ajax({
            url : 'request.php',
            type: 'POST',
            data : {
                url : '/login',
                email : email,
                password : password
            },
            success : function(response) {
                let res = JSON.parse(response);

                if (res.status == 'success') {
                    window.location.href = 'index.php';
                } else {
                    swal({
                        title : 'Error',
                        text : res.message,
                        icon : 'error'
                    });
                }
            }
        });
    });

});
