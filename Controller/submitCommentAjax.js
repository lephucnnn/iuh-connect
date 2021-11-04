$.ajaxSetup({cache:false});
$(document).ready(function() {
    $("#submitComment").click(function() {
        var noidung = tinyMCE.get('binhluan').getContent();
        var id_chude = $("#id_chude").val();

        if(noidung != '') {
            // thêm thông báo có bình luận mới
            upDateNotiComment(id_chude);

            // thực hiện lưu bình luận lên csdl
            $.ajax({
                url: '../Model/submitCommentAjax.php',
                type: 'POST',
                dataType: 'html',
                data: {
                    id_chude: id_chude,
                    noidung: noidung
                }
            }).done(function(ketqua) {
                tinyMCE.activeEditor.setContent('');
                console.log('id_chude: '+id_chude);
            });
        }
    });
    
    function upDateNotiComment(id_chude) {
        $.ajax({
            url: '../Model/upDateNotiCommentAjax.php',
            type: 'POST',
            dataType: 'html',
            data: {
                id_chude: id_chude
            }
        }).done(function(ketqua) {
            console.log(ketqua)
        });
    }
});