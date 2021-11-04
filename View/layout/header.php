<?php
    if(isset($_REQUEST['logout']) && $_REQUEST['logout'] == 'yes') {
        unset($_SESSION['user']);
        header('location:../index.php');
    }
?>

<!DOCTYPE html>
<head>
<title>Hệ thống liên lạc trực tuyến IUH - Đại học Công nghiệp Tp HCM</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="../Lib/css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<!-- Custom CSS -->
<link href="../Lib/css/style.css" rel='stylesheet' type='text/css' />
<link href="../Lib/css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="../Lib/css/font.css" type="text/css"/>
<link href="../Lib/css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="../Lib/css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="../Lib/css/monthly.css"/>
<!-- //calendar -->
<link rel="stylesheet" href="../Lib/css/chatapp.css"/>
<!-- //font-awesome icons -->
<script src="../Lib/js/jquery2.0.3.min.js"></script>

<!--  -->
<script src="../Lib/js/raphael-min.js"></script>
<script src="../Lib/js/morris.js"></script>

<!-- tinyMCE -->
<script src="https://cdn.tiny.cloud/1/kmqehmod5l63vrhi3k2xc6d0y0elhnk9yrfbfirdbbumthns/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<!-- API key tinyMCE -->
<!-- CKEditor -->
<script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<!-- Ajax chu de -->
<script src="../Controller/frameCommentAjax.js"></script>
<!-- Sinh viên hoặc giảng viên -->
<?php if($_SESSION['user']['ten_quyen'] == "Sinh Viên") { ?>
<!-- notification chu de moi -->
<script src="../Controller/notificationNewThreadSSE.js"></script>
<?php } else if ($_SESSION['user']['ten_quyen'] == "Giảng Viên") {?>
<!-- notification chu de moi -->
<script src="../Controller/notificationRequestThreadSSE.js"></script>
<?php }?>

<!-- Ajax submit comment trong detailForum -->
<script src="../Controller/submitCommentAjax.js"></script>
<!-- notification comment moi -->
<script src="../Controller/notificationNewCommentSSE.js"></script>
<!-- chat box ajax -->
<script src="../Controller/chatBoxAjax.js"></script>
<!-- reset account bằng admin -->
<script src="../Controller/resetAccount.js"></script>
<!-- pusher -->
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    Pusher.logToConsole = true;

    var pusher = new Pusher('8284ad28a867466d3619', {
    cluster: 'ap1'
    });

    // push cho sinh viên xem chủ đề - home
    var channel = pusher.subscribe('demo_pusher');
    channel.bind('add_student', function(data) {
    $.ajax({
        url: '../Model/homeForumAjax.php',
        type: 'POST'
        }).done(function(ketqua) {
            $('#main_thread').html(ketqua);
        });
    
    });

    // push cho giảng viên duyệt chủ đề - manageThread
    var channel = pusher.subscribe('request_thread');
    channel.bind('add_request_thread', function(data) {
    $.ajax({
        url: '../Model/manageForumAjax.php',
        type: 'POST'
        }).done(function(ketqua) {
            $('#main_request_thread').html(ketqua);
        });
    
    });
</script>
<!-- tinyMCE Binh luan -->
<script>
    tinymce.init({
    selector: '#binhluan',
    plugins: 'code image',
    toolbar: 'undo redo | bold italic | image code',
    menubar: false,
    statusbar: false,
    content_style: ".mce-content-body {font-size:15px, font-family: Arial,sans-serif;}",
    height: 200,
    images_upload_url: "../Model/uploadCKEditor.php",
    images_upload_handler: function(blobInfo, success, failure) {
        var formData, xhr;
        xhr = new XMLHttpRequest();
        xhr.open("post", "../Model/uploadCKEditor.php");

        xhr.onload = function() {
            json = JSON.parse(xhr.responseText);
            success(json.location);
        }
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
    }
    });
</script>

<!-- tinyMCE create Thread -->
<script>
    tinymce.init({
    selector: '#mytextarea',
    plugins: 'code image',
    toolbar: 'undo redo | bold italic | image code',
    menubar: false,
    statusbar: false,
    content_style: ".mce-content-body {font-size:15px, font-family: Arial,sans-serif;}",
    height: 400,
    images_upload_url: "../Model/uploadCKEditor.php",
    images_upload_handler: function(blobInfo, success, failure) {
        var formData, xhr;
        xhr = new XMLHttpRequest();
        xhr.open("post", "../Model/uploadCKEditor.php");

        xhr.onload = function() {
            json = JSON.parse(xhr.responseText);
            success(json.location);
        }
        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());
        xhr.send(formData);
    }
    });
</script>
<!--  -->
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="index.php" class="logo">
        VISITORS
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <!-- settings start -->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" id="load_noti_comment">
                <i class="fa fa-tasks"></i>
                <span class="badge bg-success" id="noti_comment"></span>
            </a>
            <ul class="dropdown-menu extended tasks-bar">
                <li>
                    <p class="">Tổng cộng: <span id="noti_comment_inside"></span> bình luận chưa xem</p>
                </li>
                <div id="show_noti_comment">
                    
                </div>
            </ul>
        </li>
        <!-- settings end -->
        <!-- inbox dropdown start-->
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" >
                <i class="fa fa-envelope-o"></i>
                <span class="badge bg-important" id="noti_comment"></span>
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    <p class="red">You have 4 Mails</p>
                </li>
                <li>
                    <a href="#">
                        <span class="photo"><img alt="avatar" src="../Lib/images/3.png"></span>
                        <span class="subject">
                        <span class="from">Jonathan Smith</span>
                        <span class="time">Just now</span>
                        </span>
                        <span class="message">
                            Hello, this is an example msg.
                        </span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- inbox dropdown end -->
        <!-- notification dropdown start-->
        <?php
            if($_SESSION['user']['ten_quyen'] == "Sinh Viên") {
        ?>
        <!-- sinh viên - thông báo có chủ đề mới được tạo -->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" id="load_noti_thread">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning" id="noti_thread"></span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <!-- danh sach thong bao -->
                <div id="show_noti_thread">
                    
                </div>
                <!--  -->
            </ul>
        </li>
        <?php
            }
            else if($_SESSION['user']['ten_quyen'] == "Giảng Viên") {
        ?>
        <!-- giảng viên - thông báo có yêu cầu tạo chủ đề -->
        <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" id="load_request_thread">

                <i class="fa fa-bell-o"></i>
                <span class="badge bg-warning" id="request_thread"></span>
            </a>
            <ul class="dropdown-menu extended notification">
                <li>
                    <p>Notifications</p>
                </li>
                <!-- danh sach thong bao -->
                <div id="show_request_thread">
                    
                </div>
                <!--  -->
            </ul>
        </li>
        <?php } ?>
        <!-- notification dropdown end -->
    </ul>
    <!--  notification end -->
</div>
<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="" style="padding-left:10px; padding-top: 5px; padding-bottom: 5px">
                <span class="username"><?php echo $_SESSION['user']['ho_dem']."&nbsp". $_SESSION['user']['ten'] ?></span>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="?controller=profileAccount&id=<?php echo $_SESSION['user']['id_user'] ?>"><i class=" fa fa-suitcase"></i>Profile</a></li>
                <li><a href="?logout=yes"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->

