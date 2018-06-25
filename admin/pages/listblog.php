 
<?php
include_once("classadmin.php");
$ql= new quanly;
$result= $ql->tintuc();


?>
<div class="box">
  <div class="box-header">
    <h2 class="text-center">Danh sách blog</h2>                                    
  </div><!-- /.box-header -->
  <div class="box-body table-responsive">



   <table id="example1" class="table table-bordered table-striped">
    <thead>

      <tr>
        <th>Mã Tin</th>
        <th>Tiêu Đề</th>
        <th>Hình Ảnh</th>
        <th>Tóm Tắt</th>
        <th>Ngày</th>
        <th>Nội Dung</th>
        <th>Tuỳ chỉnh</th>
      </tr>
    </thead>
    <tbody>
      <?php 

      while($row = mysql_fetch_array($result)){
        ?>
        <tr>
          <td height="10"><?php echo $row['MaTin'] ?></td>
          <td><?php echo $row['TieuDe'] ?></td>
          <td><img src="../img/tintuc/<?php echo $row['Hinh'] ?>" width="50px" height="30px" alt=""></td>
          <td><?php echo $row['TomTat'] ?></td>
          <td><?php echo $row['Ngay'] ?></td>
          <td><?php echo substr($row['Noidung'],0,300); ?></td>
          <td>
            <a href="index.php?act=editblog&id=<?php echo $row['MaTin'];?>" class="btn btn-info refresh"><span  class="fa fa-fw fa-edit"></span></a>
            <a href="index.php?act=deltin&id=<?php echo $row['MaTin'];?>" class="btn btn-danger "><span class="fa fa-fw fa-times"></span></a> 

          </td>
        </tr>
        <?php } ?>
      </tbody>


    </table>
  </form>
</div><!-- /.box-body -->

</div><!-- /.box -->

