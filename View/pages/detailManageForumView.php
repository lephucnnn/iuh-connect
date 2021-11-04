<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      <?php
        echo $thread['ten_chu_de'];
        echo '<input name="" id="id_chude" value="'.$_REQUEST['id_chude'].'" type="hidden">';
      ?>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <tbody>
          <!-- tieu de -->
          <?php if(!isset($_REQUEST['page']) || $_REQUEST['page'] == 1) { ?>
          <tr>
              <td style="width: 200px">
                <div style="width: 200px">
                  <p><b>
                    <?php
                      if($thread['id_quyen'] == 3) {
                        echo "<p><b><span style='color: red;'>".$thread['ho_dem'] . " " . $thread['ten']."</span></b></p>";
                        echo "<p><span style='color: red;'>Giảng viên</span></p>";
                      }
                      else {
                        echo "<p><b>".$thread['ho_dem'] . " " . $thread['ten']."</b></p>";
                        echo "<p>".$thread['username']."</p>";
                      }
                    ?>
                  </b></p><br>
                  <p><?php echo $thread['ngay_dang']?></p>
                </div>
              </td>
              <td style="height:auto; max-width: 100px">
                <div style="width: 100%; min-height:auto; max-height:300px; overflow-x:auto; overflow-y:auto">
                  <?php
                      echo $thread['noi_dung'];
                      echo "<br>";
                      echo "<span style='color:blue; font-style: italic; text-decoration-line: underline'>File đính kèm:</span><br>";
                      for($i = 0; $i < count($systemMangDocument); $i++) {
                        echo "<a href='?file=".$systemMangDocument[$i]."&filename=".$nameMangDocument[$i]."'/>".$nameMangDocument[$i]."</a>&nbsp&nbsp";
                      }
                    ?>
                </div>
              </td>
          </tr>
          <?php
            }
          ?>
      </table>
      <div class="panel-body">
        <div class=" form">
          <form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
            <div class="col-lg-6">
                <input type="submit" name="browseThread" value="Duyệt" class="btn btn-primary">
                <input type="submit" name="cancleThread" value="Từ chối" class="btn btn-danger">
            </div>
          </form>
        </div>
      </div>
      <!--  -->
  </div>
</div>
</section>