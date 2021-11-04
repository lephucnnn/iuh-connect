<section id="main-content">
    <section class='wrapper'>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Thông tin học tập
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>MSSV</th>
                                        <th>Họ đệm</th>
                                        <th>Tên</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php   
                                        $i = 0;
                                        foreach($data as $student) {
                                        $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $student['mssv'] ?></td>
                                        <td><?php echo $student['ho_dem'] ?></td>
                                        <td><?php echo $student['ten'] ?></td>
                                        <td>
                                            <button type="button" onclick="resetAccount(<?php echo $student['mssv'] ?>)" class="btn btn-primary">Đặt lại mật khẩu</button>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
        <div class="footer">
	        <div class="wthree-copyright">
		    <p>© 2021 Hệ thống liên lạc trực tuyến IUH | Design by <a href="">IUH-Connect</a></p>
	        </div>
        </div>
</section>