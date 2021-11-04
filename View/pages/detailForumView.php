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
          <!-- danh sach binh luan -->
          
          <!-- end khung binh luan -->
      </table>
      <!-- table binh luan -->
      <table class="table table-striped b-t b-light">
        <tbody id='khung_binh_luan'>
          
        </tbody>
      </table>
      <!-- them binh luan -->
      <div class="panel-body">
        <div class=" form">
          <form class="form-horizontal" action="" enctype="multipart/form-data" method="post">
          
            <textarea name="binhluan" id="binhluan" cols="10" rows="10"></textarea><br>
            <div class="form-group ">
                <div class="col-lg-1">
                  <button type="button" name="submitComment" id="submitComment" class="btn btn-danger">Submit</button>
                </div>
            </div>
          </form>
        </div>
      </div>
      <!--  -->
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm"></small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
</section>