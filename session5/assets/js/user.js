$(document).ready(function() {
    $.ajax({
        url : 'request.php',
        type: 'POST',
        data : {
            url : '/authData'
        },
        success : function(response) {
            let res = JSON.parse(response);
            window.user  = JSON.parse(res.data);
            console.log(window.user);
        }
    });


    $('#logout-btn').click(function(){
        $.ajax({
            url : 'request.php',
            type: 'POST',
            data : {
                url : '/logout'
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
