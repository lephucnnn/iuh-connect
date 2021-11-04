<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>User</span>
                    </a>
                    <ul class="sub">
                        <li><a href="?controller=registation">Tạo tài khoản</a></li>
                    </ul>
                </li>
                <li>
                    <a href="fontawesome.html">
                        <i class="fa fa-tasks"></i>
                        <span>Xem lịch (chưa)</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo urlencode(base64_encode("createThread")) ?>">
                        <i class="fa fa-bullhorn"></i>
                        <span>Tạo chủ đề</span>
                    </a>
                </li>
                <li>
                    <a href="?controller=chatBox">
                        <i class="fa fa-envelope"></i>
                        <span>Nhắn tin</span>
                    </a>
                </li>

                <!-- giảng viên -->
                <li>
                    <a href="?controller=listStudent&id_lophoc=<?php echo $_SESSION['user']['id_lophoc'] ?>">
                        <i class="fa fa fa-book"></i>
                        <span>Danh sách sinh viên (giảng viên)</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <span>Quản lý diễn đàn (giảng viên)</span>
                    </a>
                    <ul class="sub">
                        <li><a href="<?php echo urlencode(base64_encode("createThread"))?>" >Tạo chủ đề</></a></li>
                        <li><a href="?controller=manageForum">Danh sách chủ đề</a></li>
                    </ul>
                </li>
                <li>
                    <a href="?controller=chatBox">
                        <i class="fa fa-envelope"></i>
                        <span>Nhắn tin (giảng viên)</span>
                    </a>
                </li>
                <li>
                    <a href="fontawesome.html">
                        <i class="fa fa-tasks"></i>
                        <span>Xem lịch (giảng viên)</span>
                    </a>
                </li>

                <!-- admin -->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Lớp học (admin)</span>
                    </a>
                    <ul class="sub">
                        <li><a href="?controller=createClass">Tạo lớp học</a></li>
                        <li><a href="?controller=listClass">Danh sách lớp học</a></li>
                    </ul>
                </li>
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>