window.users = [];

function setState() {
    let users_data = '';

    for (let user of window.users) {
        let button_color = user.status == 'active' ? 'danger' : 'success';
        let button_text = user.status == 'active' ? 'Deactivate' : 'Activate'
        users_data += `<tr>
            <td>${user.name}</td>
            <td>${user.username}</td>
            <td>${user.email}</td>
            <td>${user.phone}</td>
            <td>
                <button user_id="${user.id}" class="btn btn-sm btn-${button_color} btn-status">${button_text}</button>
                <button user_id="${user.id}" class="btn btn-sm btn-info btn-edit" username="${user.username}">Edit</button>
                <button user_id="${user.id}" class="btn btn-sm btn-danger delete-btn">Delete</button>
            </td>
        </tr>`;
    }

    $('#table-tbody').html(users_data);
    loadEvents();
}

function loadUser() {
    $.ajax({
        url : 'request.php?users=users',
        type: 'GET',
        success : function(response){
            window.users = JSON.parse(response);
            setState();
        }
    });
}

$(document).ready(function(){
    loadUser();
});

function loadEvents() {
    $('.delete-btn').click(function() {
        let user_id = $(this).attr('user_id');
        let This = $(this);

        $.ajax({
            url : 'request.php',
            type: "POST",
            data : {
                user : user_id,
                delete : true
            },
            success : function(response) {
                if (response == 'ok') {
                    This.parent().parent().remove();
                }
            }
        });

    });

    $('.btn-status').click(function() {
        let button_text = $(this).text().toLowerCase();
        let status = (button_text == 'activate') ?  'active' : 'inactive';
        let user_id = $(this).attr('user');
        let This = $(this);

        $.ajax({
            url : 'request.php',
            type: "POST",
            data : {
                user : 1,
                status : status
            },
            success : function(response) {
                if (response == 'ok') {
                    if (button_text == 'activate') {
                        This.text('Deactivate');
                        This.removeClass('btn-success');
                        This.addClass('btn-danger');
                    } else {
                        This.text('Activate');
                        This.removeClass('btn-danger');
                        This.addClass('btn-success');
                    }
                }
            }
        });
    });

    $('.btn-edit').click(function() {
        let username = $(this).attr('username');
        let user_id = $(this).attr('user_id');
        let user = window.users.find(function(user){
            return user.username == username;
        });

        if (user) {
            $('#name-input').val(user.name);
            $('#mobile-input').val(user.phone);
            $('#user_id-input').val(user_id);
            $('#form-modal').show();
        } else {
            alert('User not found!');
        }
    });

    $('#btn-save').click(function(){
        let name = $('#name-input').val();
        let phone = $('#mobile-input').val();
        let username = $('#username-input').val();
        let user_id = $('#user_id-input').val();

        let data = {
            name : name,
            phone : phone
        };

        $.ajax({
            url : 'request.php',
            type: "POST",
            data : {
                user : 1,
                data : data
            },
            success : function(response) {
                if (response == 'ok') {
                    $('#form-modal').hide();
                    loadUser();
                }
            }
        });

    });
}
