<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Đăng chủ đề
                    </header>
                    <div class="panel-body">
                        <div class="position-center">
                            <!-- form tao chu de -->
                            <form class="form-horizontal" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <label for="inputEmail1" class="col-lg-2 col-sm-2 control-label">Tiêu đề</label>
                                <div class="col-lg-10">
                                    <input type="text" name="title" class="form-control" id="title">
                                    <p class="help-block">Vd: Thảo luận về nội dung bài tập thường kỳ.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Nội dung</label>
                                <div class="col-lg-10">
                                <!-- ck editor -->
                                <textarea name="content" id="mytextarea" cols="30" rows="10" class="form-control"></textarea>
                                <!-- <script>
                                        CKEDITOR.replace('content', {
                                            filebrowserUploadMethod: 'form',
                                            filebrowserUploadUrl: '../Model/uploadCKEditor.php'
                                        });
                                </script> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <input type="file" name="listFile[]" multiple>
                                    <br>
                                    <input type="submit" value="Đăng chủ đề" name="dang_chu_de" class="btn btn-danger">
                                    
                                    <!-- <button type="submit" class="btn btn-danger">Tải file đính kèm</button> -->
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </section>

            </div>
        </div>
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>