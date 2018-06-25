 
<?php
include_once("classadmin.php");
$ql= new quanly;
$result= $ql->nhacungcap();


?>
<div class="box">
  <div class="box-header">
    <h2 class="text-center">Danh sách loại sản phẩm</h2>                                    
  </div><!-- /.box-header -->
  <div class="box-body table-responsive">



   <table id="example1" class="table table-bordered table-striped">
    <thead>

      <tr>
        <th>Mã NCC</th>
        <th>Tên NCC</th>
        <th>Địa chỉ</th>
        <th>Điện thoại</th>
        <th>Email</th>
        <th>Tuỳ chỉnh</th>
      </tr>
    </thead>
    <tbody>
      <?php 

      while($row = mysql_fetch_array($result)){
        ?>
        <tr>
          <td height="10"><?php echo $row['MaNCC'] ?></td>
          <td><?php echo $row['TenNCC'] ?></td>
          <td><?php echo $row['Diachi'] ?></td>
          <td><?php echo $row['Dienthoai'] ?></td>
          <td><?php echo $row['Email'] ?></td>
          <td>
            <a href="index.php?act=editncc&id=<?php echo $row['MaNCC'];?>" class="btn btn-info refresh"><span  class="fa fa-fw fa-edit"></span></a>
            <a href="index.php?act=delncc&id=<?php echo $row['MaNCC'];?>" class="btn btn-danger "><span class="fa fa-fw fa-times"></span></a> 

          </td>
        </tr>
        <?php } ?>
      </tbody>


    </table>
  </form>
</div><!-- /.box-body -->

</div><!-- /.box -->

