 
<?php
include_once("classadmin.php");
$sotin1trang=12;
if(!$_GET['trang']) $trang = 1;
else $trang = $_GET['trang'];
settype($trang, 'int');
$from = ($trang-1)*$sotin1trang;
$ql= new quanly;
$tong= $ql->demuser();
$sotrang = ceil($tong/$sotin1trang);
$resulttrang= $ql->phantranguser($from,$sotin1trang);


?>
<div class="box">
  <div class="box-header">
    <h2 class="text-center">Danh sách khách hàng</h2>                                    
  </div><!-- /.box-header -->
  <div class="box-body table-responsive">


    <div class="phantrang text-right">
      <div class="container-fluid">
        <ul class="pagination">
          <?php 
          for($i=1;$i<=$sotrang;$i++){
           ?>
           <li class="<?php if($i==$trang) echo 'active'; ?>"  ><a href="index.php?act=listuser&trang=<?php   echo $i;    ?>"><?php echo $i;
           if($i==$trang) echo '<span class="sr-only">(current)</span>' ?> </a></li>
           <?php } ?>
         </ul>
       </div>
     </div>
     <!-- /.phantrang -->
     <table id="example1" class="table table-bordered table-striped">
      <thead>

        <tr>
          <th>STT</th>
          <th>User</th>
          <th>Tên</th>
          <th>Phái</th>
          <th>Địa chỉ</th>
          <th>Điện thoại</th>
          <th>Email</th>
          <th>Tuỳ chỉnh</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        $i=$from+1;
        while($row = mysql_fetch_array($resulttrang)){
          ?>
          <tr>
            <td height="10">#<?php echo $i ?></td>
            <td><?php 
              if($row['Macv']==1) echo "<font color='red'>".$row['user']."</font>";
              else echo "<font color='green'>".$row['user']."</font>"; ?>
            </td>
            <td height="10"><?php echo $row['Tenkhachhang'] ?></td>
            <td><?php 
            if($row['Phai']==0) echo "Nữ";
            else echo "Nam" ?></td>
            <td><?php echo $row['Diachi'] ?></td>
            <td><?php echo $row['Dienthoai'] ?></td>
            <td><?php echo $row['email'] ?></td>
            
            <td >
              <a href="index.php?act=edituser&id=<?php echo $row['Makhachhang'];?>" class="btn btn-info refresh"><span  class="fa fa-fw fa-edit"></span></a>
              <a href="index.php?act=deluser&id=<?php echo $row['Makhachhang'];?>"  class="btn btn-danger "><span class="fa fa-fw fa-times"></span></a> 
            </td>
          </tr>
          <?php $i++;} ?>
        </tbody>


      </table>
    </form>
  </div><!-- /.box-body -->

</div><!-- /.box -->
