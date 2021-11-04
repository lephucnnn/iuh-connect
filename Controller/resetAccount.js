function resetAccount(username) {
    r = confirm ('Bạn muốn đặt lại mật khẩu của tài khoản ' + username + '?');
    if(r === true) {
        $.ajax({
            url: '../Model/resetAccountModel.php',
            type: 'POST',
            dataType: 'html',
            data: {
                username: username
            }
        }).done(function(ketqua) {
            if(ketqua) {
                alert('Đã đặt lại mật khẩu: 123456');
            }
            else {
                alert('Đặt lại mật khẩu thất bại');
            }
        });
    }
}