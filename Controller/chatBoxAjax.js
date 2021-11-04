$.ajaxSetup({cache:false});

// scroll bottom
function scrollBottom() {
    var elmnt = document.getElementById("frameChat");
    elmnt.scrollTop = elmnt.scrollHeight;
}

// hien thi list user để chat
let listUserInterval = setInterval(function() {
    $.ajax({
        url: '../Model/listUserToChat.php',
        type: 'POST',
        dataType: 'html'
        }).done(function(ketqua) {
            $('#listUserToChat').html(ketqua);
        }); 
}, 500);

// hien thi khung lich su tro chuyen sau khi click chon user
let showMessage;
function modifyState(id_user_receive) {
    // let stateObj = { id: "100" };
    // window.history.pushState(stateObj,
    //             "Page 3", "?controller=chatBox&id_user_receive="+id_user_receive);
    $('#frameChat').css("display", "block");
    $('#divSend').css("display", "block");

    if (typeof showMessage !== "undefined") {
        clearInterval(showMessage);
    }

    showMessage = setInterval(function() {
        $.ajax({
            url: '../Model/showMessageAjax.php',
            type: 'POST',
            dataType: 'html',
            data: {
                id_user_receive: id_user_receive
            }
            }).done(function(ketqua) {
                $('#showMessage').html(ketqua);
                if(!$('#frameChat').hasClass("no-scroll")) {
                    scrollBottom();
                }
            });
    }, 500);

    // hien thi thong tin user dang chat
    $.ajax({
        url: '../Model/infoUserToChatAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            id_user_receive: id_user_receive
        }
        }).done(function(ketqua) {
            $('#infoUserToChat').html(ketqua);
            console.log('thanh cong');
        });
}


// gui tin nhan khi nhan send message
$(function() {
    function sendMessage() {
        let message = $('#message').val();
        let id_user_receive = $('#id_user_receive').val();
        message = $.trim(message);
        $.ajax({
            url: '../Model/sendMessageAjax.php',
            type: 'POST',
            dataType: 'html',
            data: {
                message: message,
                id_user_receive: id_user_receive
            }
            }).done(function(ketqua) {
                $('#message').val('');
            });
    }
    $('#sendMessage').click(function() {
        sendMessage();
        console.log('thanh cong');
    })
    $('#message').keydown(function(e) {
        if(e.keyCode == 13) {
            sendMessage();
        }
    })
})

// khi chỏ vào khung chat thì không scroll bottom
$(function() {
    $('#frameChat').mouseenter(function() {
        $('#frameChat').addClass("no-scroll");
    });
    $('#frameChat').mouseleave(function() {
        $('#frameChat').removeClass("no-scroll");
    });
});