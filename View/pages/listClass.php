<section id="main-content">
    <section class='wrapper'>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Danh sách lớp học
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped b-t b-light">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên lớp</th>
                                        <th>Niên khóa</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php   
                                        $i = 0;
                                        foreach($data as $class) {
                                        $i++;
                                    ?>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $class['ten_lop'] ?></td>
                                        <td><?php echo $class['nien_khoa'] ?></td>
                                        <td>
                                            <a class="btn btn-info" href="?controller=listAccount&id_lophoc=<?php echo $class['id_lophoc'] ?>">Chi tiết</a>
                                            <a class="btn btn-success" href="?controller=updateClass&id=<?php echo $class['id_lophoc'] ?>">Chỉnh sửa</a>
                                            <a onclick="return confirm('Bạn có chắc muốn xóa lớp này không?')" 
                                            class="btn btn-danger" href="?controller=deleteClass&id=<?php echo $class['id_lophoc'] ?>">Xóa lớp học</a>
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