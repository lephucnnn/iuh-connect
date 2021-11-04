<section id="main-content">
    <section class='wrapper'>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Chỉnh sửa tài khoản
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                            <a class="fa fa-cog" href="javascript:;"></a>
                            <a class="fa fa-times" href="javascript:;"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class=" form">
                            <form class="form-horizontal" enctype="multipart/form-data" method="post">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Họ đệm</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" value="<?php echo $data['ho_dem'] ?>" name="ho_dem" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Tên</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" value="<?php echo $data['ten'] ?>" name="ten" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="cname" class="control-label col-lg-3">Giới tính</label>
                                    <div class="col-lg-6">
                                        <select name="gioi_tinh" class="form-control input-sm m-bot15">
                                            <option><?php
                                                if ($data['gioi_tinh'] == 1){
                                                    echo 'Nam';
                                                } else {
                                                    echo 'Nữ';
                                                }
                                            
                                            ?></option>
                                            <option value="1">Nam</option>
                                            <option value="0">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Ngày sinh</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" value="<?php echo $data['ngay_sinh'] ?>" name="ngay_sinh" minlength="2" type="date" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-3">Email</label>
                                    <div class="col-lg-6">
                                        <input class="form-control " value="<?php echo $data['email'] ?>" type="email" name="email" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="curl" class="control-label col-lg-3">Số điện thoại</label>
                                    <div class="col-lg-6">
                                        <input class="form-control " value="<?php echo $data['sdt'] ?>" type="text" name="sdt">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="ccomment" class="control-label col-lg-3">Mật khẩu</label>
                                    <div class="col-lg-6">
                                        <input class="form-control " type="text" name="password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <input type="submit" value="Lưu" name="luu" class="btn btn-success" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
        <div class="footer">
	        <div class="wthree-copyright">
		    <p>© 2021 Hệ thống liên lạc trực tuyến IUH | Design by <a href="">IUH-Connect</a></p>
	        </div>
        </div>
</section>