<?php

include_once("classadmin.php");
$ql= new quanly;

$save='';
$ma=$_GET['id'];
$ct = $ql-> user($ma);
echo $rowct= mysql_fetch_array($ct);
$Tenkhachhang=$_POST['Tenkhachhang'];
$Phai=$_POST['Phai'];
$Diachi=$_POST['Diachi'];
$Dienthoai=$_POST['Dienthoai'];
$Matkhau=sha1(md5(md5(addslashes($_POST['Matkhau']))));
$Macv=$_POST['Macv'];
$email=$_POST['email'];
if(isset($_POST['sua'])){
   $result=$ql->edituser($ma,$Tenkhachhang,$Phai,$Diachi,$Dienthoai,$Matkhau,$Macv,$email);
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
                        <h3 class="box-title">Chỉnh sửa thông tin khách hàng: <?php echo $rowct['user'] ?></h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php echo $save ?>
                        <form action="" method="post"  enctype="multipart/form-data">
                            <!-- text input -->

                            <div class="form-group">
                                <label>Tên khách hàng</label>
                                <input type="text" name="Tenkhachhang" id="Tenkhachhang" class="form-control"  value="<?php if(isset($_POST['sua'])){ echo $Tenkhachhang;} else {echo $rowct['Tenkhachhang']; }?>"/>
                            </div>
                            <div class="form-group">
                                <label>Phái</label>
                                <div class="radio">

                                    <label class="radi1"><span class="fas fa-transgender"></span></label>

                                    <?php $i=0; if(isset($_POST['sua'])){$i=$Phai;} else { $i=$rowct['Phai']; }
                                    if($i==0) { ?>
                                    <label class="radi"><input type="radio" name="Phai" value="0" checked>Nữ</label>
                                    <label class="radi"><input type="radio" name="Phai" value="1">Nam</label>
                                    <?php } else { ?> 
                                    <label class="radi"><input type="radio" name="Phai" value="0">Nữ</label>
                                    <label class="radi"><input type="radio" name="Phai" value="1" checked>Nam</label>    
                                    <?php } ?>
                                </div>                
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" name="Diachi" id="Diachi" class="form-control"  value="<?php if(isset($_POST['sua'])){ echo $Diachi;} else {echo $rowct['Diachi']; }?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" name="Dienthoai" id="Dienthoai" class="form-control"  value="<?php if(isset($_POST['sua'])){ echo $Dienthoai;} else {echo $rowct['Dienthoai']; }?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" id="email" class="form-control"  value="<?php if(isset($_POST['sua'])){ echo $email;} else {echo $rowct['email']; }?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="Matkhau" id="Matkhau" class="form-control"  value="<?php if(isset($_POST['sua'])){ echo $Matkhau;} else {echo $rowct['Matkhau']; }?>"/>
                                </div>
                                <div class="form-group">
                                   <label>Chức vụ</label>
                                   <div class="radio">

                                    <label class="radi1"><span class="fas fa-transgender"></span></label>

                                    <?php $i=0; if(isset($_POST['sua'])){$i=$Macv;} else { $i=$rowct['Macv']; }
                                    if($i==0) { ?>
                                    <label class="radi"><input type="radio" name="Macv" value="0" checked>Khách hàng</label>
                                    <label class="radi"><input type="radio" name="Macv" value="1">Admin</label>
                                    <?php } else { ?> 
                                    <label class="radi"><input type="radio" name="Macv" value="0">Khách hàng</label>
                                    <label class="radi"><input type="radio" name="Macv" value="1" checked>Admin</label>    
                                    <?php } ?>
                                </div>
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



