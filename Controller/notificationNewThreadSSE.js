// SSE nhận dữ liệu từ file notificationNewThreadSSE.php
var id_thread = 0; //biến này để lưu id của event
var danhsach_thread = null;
var source = new EventSource("../Model/notificationNewThreadSSE.php");
source.onmessage = function(event) {
    if (event.lastEventId != id_thread) {
        id = event.lastEventId; //mỗi lần dữ liệu về là lưu vào biến id
        if(id != 0) {
            document.getElementById("noti_thread").innerHTML = event.lastEventId;
            danhsach_thread = event.data;
        }
        else {
            document.getElementById("noti_thread").innerHTML = '';
            danhsach_thread = event.data;
        }
    }
}
// nếu click vào nút chuông có id = load_noti_thread thì sẽ hiển thị danh sách
// các thông báo chưa xem lên div có id = show_noti_thread
$(document).ready(function() {
    $("#load_noti_thread").click(function() {
        $.ajax({
            url: '../Model/loadNothiThreadAjax.php',
            type: 'POST',
            dataType: 'html',
            data: {
                danhsach: danhsach_thread
            }
        }).done(function(ketqua) {
            $('#show_noti_thread').html(ketqua);
            console.log("notificationNewThreadSSE.js thanh cong: "+danhsach_thread);
        });
    });
    
});

// nếu click vào thông báo để chuyển hướng thì sẽ thực hiện hàm này để cập
// nhật cơ sở dữ liệu là đã xem thông báo có id chủ đề = id_chude
// để không hiển thị lên thông báo nữa
function checkNotiThread(id_chude, ds) {
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../Model/checkNotiThreadAjax.php?id_chude="+id_chude+"&data="+ds);
    xhttp.send();
    xhttp.onload = function() {
        console.log(xhttp.responseText);
      }
}