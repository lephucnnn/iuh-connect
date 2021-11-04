<section id="main-content">
    <section class='wrapper'>
        <div class="market-updates">
			<header class="panel-heading" style="background-color: #009966">
                Danh sách chủ đề
            </header>
			<div class="panel-body">
			</div>
			<div id="main_request_thread">
				<!-- xuat chu de -->
				<?php
					foreach ($data as $bv) {
						echo '<a href="?controller=detailManageForum&id_chude='.$bv['id_chude'].'">
									<div class="col-lg-12 panel">
										<span style="color:blue; font-size: 25px">'.$bv['ten_chu_de'].'</span><hr>
										<p>Được tạo bởi: <span style="color: black;">'. $bv['ho_dem'] ." ". $bv['ten'] .'</span></p>
										<p>Thời gian: '.$bv['ngay_dang'].'</p>
									</div>
								</a>';
					}
				?>
				<!--  -->
			</div>
		   	<div class="clearfix"> </div>
		</div>
    </section>
        <div class="footer">
	        <div class="wthree-copyright">
		    <p>© 2021 Hệ thống liên lạc trực tuyến IUH | Design by <a href="">IUH-Connect</a></p>
	        </div>
        </div>
</section>