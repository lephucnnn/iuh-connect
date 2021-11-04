<section id="main-content">
    <section class='wrapper'>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Tạo lớp
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                            <a class="fa fa-cog" href="javascript:;"></a>
                            <a class="fa fa-times" href="javascript:;"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class=" form">
                            <form class="form-horizontal " enctype="multipart/form-data" method="post">
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Tên lớp</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" value="<?php echo $data['ten_lop'] ?>" name="ten_lop" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Niên khóa</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" value="<?php echo $data['nien_khoa'] ?>" name="nien_khoa" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <input type="submit" value="Lưu" name="luu" class="btn btn-success">
                                        <button class="btn btn-default" type="button"><a href="#">Hủy</a></button>
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