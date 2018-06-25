 
<?php
include_once("classadmin.php");
$sotin1trang=12;
if(!$_GET['trang']) $trang = 1;
else $trang = $_GET['trang'];
settype($trang, 'int');
$from = ($trang-1)*$sotin1trang;
$ql= new quanly;
$tongsp= $ql->demsanpham();
$sotrang = ceil($tongsp/$sotin1trang);
$resulttrang= $ql->phantrangsanpham($from,$sotin1trang);


?>
<div class="box">
    <div class="box-header">
        <h2 class="text-center">Danh sách sản phẩm</h2>                                    
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">

        <div class="phantrang text-right">
          <div class="container-fluid">
            <ul class="pagination">
              <?php 
              for($i=1;$i<=$sotrang;$i++){
               ?>
               <li class="<?php if($i==$trang) echo 'active'; ?>"  ><a href="index.php?act=listsp&trang=<?php   echo $i;    ?>"><?php echo $i;
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
            <th>Hình ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá</th>
            <th>Giảm giá</th>
            <th>Tuỳ chỉnh</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $i=$from+1;
        while($rowsp = mysql_fetch_array($resulttrang)){
            ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><img width="50px" height="50px" src="../img/sanpham/<?php echo $rowsp['Hinh'];?>" class="img-responsive"  alt="<?php echo $rowsp['TenSP'] ?>"></td>
                <td><?php 
                $tensp=$rowsp['TenSP'];
                if(strlen($tensp)>25){
                    echo substr($tensp, 0, 24)."...";
                }
                else echo $tensp;

                ?></td>
                <td><?php echo $rowsp['Soluong'] ?></td>
                <td><?php echo number_format($rowsp['Dongia'])."₫" ?></td>
                <td><?php echo number_format($rowsp['Dongia']*($rowsp['Giamgia'])/100)."₫" ?></td>
                <td>
                    <a href="index.php?act=editsp&id=<?php echo $rowsp['MaSP'];?>" class="btn btn-info refresh"><span  class="fa fa-fw fa-edit"></span></a>
                    <a href="index.php?act=delsp&id=<?php echo $rowsp['MaSP'];?>"  class="btn btn-danger "><span class="fa fa-fw fa-times"></span></a>     
                </td>
            </tr>
            <?php $i++;} ?>
        </tbody>

    </table>
</div><!-- /.box-body -->
</div><!-- /.box -->

