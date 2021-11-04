<section id="main-content">
    <section class='wrapper'>
        <div class="col-lg-12 panel">
			</br>
		    <div class="col-md-10">
				    <div class="table-responsive">
						<table class="table table-condensed">
							<h3><strong><?php echo $data['ho_dem'] ." ".$data['ten'] ?></strong></h3>
								<tbody>
								<tr>
									<td><b>Tên đăng nhập</b></td>
									<td style="color: blue;"><?php echo $data['username'] ?></td>
								</tr>
								<tr>
									<td><b>Chức vụ</b></td>
									<td style="color: blue;"><?php echo $_SESSION['user']['ten_quyen'] ?></td>
								</tr>
								<tr>
									<td><b>Lớp</b></td>
									<td style="color: blue;"><?php echo $class['ten_lop'] ?></td>
								</tr>
								<tr>
									<td><b>Email</b></td>
									<td style="color: blue;"><a href="#"><?php echo $data['email'] ?></a></td>
								</tr>
								<tr>
									<td><b>Số điện thoại</b></td>
									<td style="color: blue;"><?php echo $data['sdt'] ?></td>
								</tr>
								<tr>
									<td><b>Ngày sinh</b></td>
									<td style="color: blue;"><?php echo $data['ngay_sinh'] ?></td>
								</tr>
								<tr>
									<td><b>Giới tính</b></td>
									<td style="color: blue;"><?php 
										if($data['ngay_sinh'] = 1){
											echo 'Nam';
										} else {
											echo 'Nữ';
										}
									?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			<div class="col-md-2">
				<button><a href="?controller=updateAccount&id=<?php echo $_SESSION['user']['id_user'] ?>"><i class=" fa fa-wrench"></i> Chỉnh sửa</a>
			</div>
		</div>

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
                                        <th>Tích lũy hệ 4</th>
                                        <th>Tích lũy hệ 10</th>
                                        <th>Tổng tín chỉ</th>
                                        <th>Tín chỉ đã học</th>
                                        <th>TOEIC</th>
                                        <th>Xếp loại</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $info['diem_tich_luy_4'] ?></td>
                                        <td><?php echo $info['diem_tich_luy_10'] ?></td>
                                        <td><?php echo $info['tong_sotc'] ?></td>
                                        <td><?php echo $info['sotc_da_hoc'] ?></td>
                                        <td><?php 
                                            if($info['toeic'] == 1){
                                                echo 'Đạt';
                                            } else {
                                                echo 'Chưa có';
                                            }
                                        
                                        ?></td>
                                        <td><?php echo $info['xep_loai'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
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