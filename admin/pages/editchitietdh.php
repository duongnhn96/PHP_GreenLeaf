<?php

include_once("classadmin.php");
$ql= new quanly;

$save='';
$ma=$_GET['idct'];
$ct = $ql-> ctdh($ma);
$rowct= mysql_fetch_array($ct);
$Masp=$_POST['MaSP'];
$Soluong=$_POST['Soluong'];
$Dongia=$_POST['Dongia'];
if(isset($_POST['sua'])){
 $result=$ql->editctdh($ma,$Masp,$Soluong,$Dongia);
 if($result){
     $save = '<div class="alert alert-success alert-dismissible">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>Thành công!</strong> 
     </div>';  
     


 }else{
    $save = '<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thất bại</strong> 
    </div>';
}

}
?>



<aside class="right-side">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- right column -->
            <div class="col-md-9">
                <!-- general form elements disabled -->
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Chỉnh sửa chi tiết đơn hàng</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php echo $save ?>
                        <form action="" method="post"  enctype="multipart/form-data">
                            <!-- text input -->
                            
                            <div class="form-group">
                                <label>Mã Sản Phẩm</label>
                                <input type="text" name="MaSP" id="ma" class="form-control"  value="<?php if(isset($_POST['sua'])){ echo $Masp;} else {echo $rowct['MaSP']; }?>"/>
                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input type="text" name="Soluong" id="Soluong" class="form-control"  value="<?php if(isset($_POST['sua'])){ echo $Soluong;} else {echo $rowct['SoLuong']; }?>"/>
                            </div>
                            <div class="form-group">
                                <label>Đơn giá</label>
                                <input type="text" name="Dongia" id="Dongia" class="form-control"  value="<?php if(isset($_POST['sua'])){ echo $Dongia;} else {echo $rowct['Dongia']; }?>"/>
                            </div>
                            
                            <div class="form-group">
                                <a href="javascript:history.back()" class="btn btn-warning"><i class="fa fa-angle-left"></i> Quay lại</a>
                                <input type="submit" name="sua" class="btn btn-primary btn-flat" id="reg" value="Cập nhật"></input>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->

<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
<!-- CK Editor -->
<script src="js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>



