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
                                        <th>Tích lũy hệ 4</th>
                                        <th>Tích lũy hệ 10</th>
                                        <th>Tổng TC</th>
                                        <th>TC đã học</th>
                                        <th>TOEIC</th>
                                        <th colspan="2">Xếp loại</th>
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
                                        <td><?php echo $student['diem_tich_luy_4'] ?></td>
                                        <td><?php echo $student['diem_tich_luy_10'] ?></td>
                                        <td><?php echo $student['tong_sotc'] ?></td>
                                        <td><?php echo $student['sotc_da_hoc'] ?></td>
                                        <td><?php 
                                            if($student['toeic'] == 1){
                                                echo 'Đạt';
                                            } else {
                                                echo 'Chưa đạt';
                                            }
                                        
                                        ?></td>
                                        <td><?php echo $student['xep_loai'] ?></td>
                                        <td>
                                            <a class="btn btn-success" href="?controller=detailStudent&id_user=<?php echo $student['id_user'] ?>">Chi tiết</a>
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