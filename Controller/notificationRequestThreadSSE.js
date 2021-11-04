// SSE nhận dữ liệu từ file notificationNewThreadSSE.php
var id = 0; //biến này để lưu id của event
var danhsach = null;
var source = new EventSource("../Model/notificationNewThreadSSE.php");
source.onmessage = function(event) {
    if (event.lastEventId != id) {
        id = event.lastEventId; //mỗi lần dữ liệu về là lưu vào biến id
        if(id != 0) {
            document.getElementById("request_thread").innerHTML = id;
            danhsach = event.data;
        }
        else {
            document.getElementById("request_thread").innerHTML = '';
            danhsach = event.data;
        }
    }
}
// nếu click vào nút chuông có id = load_noti_thread thì sẽ hiển thị danh sách
// các thông báo chưa xem lên div có id = show_noti_thread
$(document).ready(function() {
    $("#load_request_thread").click(function() {
        $.ajax({
            url: '../Model/loadNothiThreadAjax.php',
            type: 'POST',
            dataType: 'html',
            data: {
                danhsach: danhsach
            }
        }).done(function(ketqua) {
            $('#show_request_thread').html(ketqua);
            console.log("notificationNewThreadSSE.js thanh cong: "+danhsach);
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