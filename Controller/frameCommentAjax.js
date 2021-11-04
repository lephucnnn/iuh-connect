$.ajaxSetup({cache:false});
// Thiết lập thời gian thực vòng lặp 1 giây home forum
// setInterval(function() {
//     $('#main_thread').load('../Model/homeForumAjax.php');
//     console.log('thanh cong');
// }, 5000);

// Thiết lập thời gian thực vòng lặp 0.5 giây khung binh luan
setInterval(function() {
    var id_chude = $("#id_chude").val();
    // $("#khung_binh_luan").load("../Model/frameCommentAjax.php", {id_chude: id_chude});
    $.ajax({
        url: '../Model/frameCommentAjax.php',
        type: 'POST',
        dataType: 'html',
        data: {
            id_chude: id_chude
        }
    }).done(function(ketqua) {
        $("#khung_binh_luan").html(ketqua);
    });
}, 500);