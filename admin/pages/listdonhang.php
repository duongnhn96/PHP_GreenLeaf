 
<?php
include_once("classadmin.php");
$sotin1trang=12;
if(!$_GET['trang']) $trang = 1;
else $trang = $_GET['trang'];
settype($trang, 'int');
$from = ($trang-1)*$sotin1trang;
$ql= new quanly;
$tongdh= $ql->demdonhang();
$sotrang = ceil($tongdh/$sotin1trang);
$resulttrang= $ql->phantrangdh($from,$sotin1trang);


?>
<div class="box">
    <div class="box-header">
        <h2 class="text-center">Danh sách đơn hàng</h2>                                    
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">


        <div class="phantrang text-right">
          <div class="container-fluid">
            <ul class="pagination">
              <?php 
              for($i=1;$i<=$sotrang;$i++){
                 ?>
                 <li class="<?php if($i==$trang) echo 'active'; ?>"  ><a href="index.php?act=listdh&trang=<?php   echo $i;    ?>"><?php echo $i;
                 if($i==$trang) echo '<span class="sr-only">(current)</span>' ?> </a></li>
                 <?php } ?>
             </ul>
         </div>
     </div>
     <!-- /.phantrang -->
     <table id="example1" class="table table-bordered table-striped">
        <thead>

            <tr>
                <th>Mã đơn hàng</th>
                <th>Ngày đặt</th>
                <th>Ngày giao</th>
                <th>Tình trạng</th>
                <th>Tuỳ chỉnh</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i=$from+1;
            while($row = mysql_fetch_array($resulttrang)){
                ?>
                <tr>
                    <td height="10">#<?php echo $row['idDH'] ?></td>
                    <td><?php echo date("d-m-Y",strtotime($row['Ngaydat'])) ?></td>
                    <td><?php echo date("d-m-Y",strtotime($row['Ngaygiao'])) ?></td>
                    <td>
                        <?php 
                        if($row['TinhTrang']==0) echo "<font color='red'>Đang xử lý</font>";
                        else echo "<font color='green'>Đã xong</font>" ?>
                    </td>
                    <td >
                        <a href="index.php?act=editdh&id=<?php echo $row['idDH'];?>" class="btn btn-info refresh"><span  class="fa fa-fw fa-edit"></span></a>
                        <a href="javascript:void(0)" onclick="deldh(<?php echo $row['idDH'];?>) " class="btn btn-danger "><span class="fa fa-fw fa-times"></span></a> 
                        <a href="index.php?iddh=<?php echo $row['idDH'];?>"  class="btn  bg-olive ">Chi tiết</a> 
                       
                    </td>
                </tr>
                <?php $i++;} ?>
            </tbody>
            

            </table>
        </form>
        </div><!-- /.box-body -->
    
    </div><!-- /.box -->
    <script>
      function deldh(id){
        check=confirm("Bạn có muốn xoá bản ghi này không?");
        if(check){
          window.location.href="index.php?act=deldh&id="+id;
        }
      }
    </script>
