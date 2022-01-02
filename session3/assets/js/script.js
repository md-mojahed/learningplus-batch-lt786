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
                <button class="btn btn-sm btn-${button_color} btn-status">${button_text}</button>
                <button class="btn btn-sm btn-info btn-edit" username="${user.username}">Edit</button>
                <button class="btn btn-sm btn-danger delete-btn">Delete</button>
            </td>
        </tr>`;
    }

    $('#table-tbody').html(users_data);
}

$(document).ready(function(){
    setState();

    /**
    *======================================================================
    */

    $('.delete-btn').click(function() {
        $(this).parent().parent().remove();
    });

    $('.btn-status').click(function() {
        let button_text = $(this).text().toLowerCase();

        if (button_text == 'activate') {
            $(this).text('Deactivate');
            $(this).removeClass('btn-success');
            $(this).addClass('btn-danger');
        } else {
            $(this).text('Activate');
            $(this).removeClass('btn-danger');
            $(this).addClass('btn-success');
        }
    });

    $('.btn-edit').click(function() {
        let username = $(this).attr('username');
        let user = window.users.find(function(user){
            return user.username == username;
        });

        if (user) {
            $('#name-input').val(user.name);
            $('#mobile-input').val(user.phone);
            $('#username-input').val(username);
            $('#form-modal').show();
        } else {
            alert('User not found!');
        }
    });

    $('#btn-save').click(function(){
        let name = $('#name-input').val();
        let phone = $('#mobile-input').val();
        let username = $('#username-input').val();

        for (let i = 0; i < window.users.length; i++) {
            if (window.users[i].username == username) {
                window.users[i].name = name;
                window.users[i].phone = phone;
            }
        }
        setState();
        $('#form-modal').hide();
    });
});
