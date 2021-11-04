// SSE nhận dữ liệu từ file notificationNewThreadSSE.php
var id_comment = 0; //biến này để lưu id của event
var danhsachComment = null;
var source = new EventSource("../Model/notificationNewCommentSSE.php");
source.onmessage = function(event) {
    if (event.lastEventId != id_comment) {
        id_comment = event.lastEventId; //mỗi lần dữ liệu về là lưu vào biến id
        if(id_comment != 0) {
            $('#noti_comment').html(event.lastEventId);
            $('#noti_comment_inside').html(event.lastEventId);
            danhsachComment = event.data;
        }
        else {
            $('#noti_comment').html('');
            danhsachComment = event.data;
        }
    }
}
// nếu click vào nút chuông có id = load_noti_thread thì sẽ hiển thị danh sách
// các thông báo chưa xem lên div có id = show_noti_thread
$(document).ready(function() {
    $("#load_noti_comment").click(function() {
        $.ajax({
            url: '../Model/loadNotiCommentAjax.php',
            type: 'POST',
            dataType: 'html',
            data: {
                danhsach: danhsachComment
            }
        }).done(function(ketqua) {
            $('#show_noti_comment').html(ketqua);
            console.log("notificationNewThreadSSE.js thanh cong: "+danhsachComment);
        });
    });
    
});

// nếu click vào thông báo để chuyển hướng thì sẽ thực hiện hàm này để cập
// nhật cơ sở dữ liệu là đã xem thông báo có id chủ đề = id_chude
// để không hiển thị lên thông báo nữa
function checkNotiComment(id_chude, ds) {
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../Model/checkNotiCommentAjax.php?id_chude="+id_chude+"&data="+ds);
    xhttp.send();
    xhttp.onload = function() {
        console.log(xhttp.responseText);
      }
}