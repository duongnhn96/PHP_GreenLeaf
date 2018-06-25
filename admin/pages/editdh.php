<?php

include_once("classadmin.php");
$ql= new quanly;

$save='';
$ma=$_GET['id'];
$donhang = $ql-> dh($ma);
$rowdh= mysql_fetch_array($donhang);
$ngaygiao=$_POST['ngaygiao'];
$tinhtrang=$_POST['tinhtrang'];
$tennguoinhan=$_POST['tennguoinhan'];
$diachi=$_POST['diachi'];
$dienthoai=$_POST['dienthoai'];
$email=$_POST['email'];
$ghichu=$_POST['ghichu'];
if(isset($_POST['sua'])){

 $result=$ql->editorder($ma,$ngaygiao,$tinhtrang,$tennguoinhan,$diachi,$dienthoai,$email,$ghichu);

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
                        <h3 class="box-title">Chỉnh sửa đơn hàng</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php echo $save ?>
                        <form action="" method="post"  enctype="multipart/form-data">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mã đơn hàng</label>
                                <input type="text" name="ma" id="ma" class="form-control"  readonly  value="<?php echo $rowdh['idDH']; ?>"/>
                            </div>
                            <div class="form-group">
                                <label>User</label>
                                <input type="text" name="ma" id="ma" class="form-control"  readonly  value="<?php echo $rowdh['user']; ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Ngày đặt</label>
                                <input type="text" name="ma" id="ma" class="form-control"  readonly  value="<?php echo $rowdh['Ngaydat']; ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Ngày giao</label>
                                <input type="text" name="ngaygiao" id="ngaygiao" class="form-control"   value="<?php if(isset($_POST['sua'])){ echo $ngaygiao;} else {echo $rowdh['Ngaygiao']; }?>"/>
                            </div>
                            <div class="form-group">
                                <label>Tên người nhận</label>
                                <input type="text" name="tennguoinhan" id="tennguoinhan" class="form-control"   value="<?php if(isset($_POST['sua'])){ echo $tennguoinhan;} else {echo $rowdh['tennguoinhan']; }?>"/>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="diachi" id="diachi" class="form-control"   value="<?php if(isset($_POST['sua'])){ echo $diachi;} else {echo $rowdh['dc']; }?>"/>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="dienthoai" id="dienthoai" class="form-control"   value="<?php if(isset($_POST['sua'])){ echo $dienthoai;} else {echo $rowdh['dt']; }?>"/>
                            </div>
                            <div class="form-group">
                                <label>email</label>
                                <input type="text" name="email" id="email" class="form-control"   value="<?php if(isset($_POST['sua'])){ echo $email;} else {echo $rowdh['email']; }?>"/>
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <input type="text" name="ghichu" id="ghichu" class="form-control"   value="<?php if(isset($_POST['sua'])){ echo $ghichu;} else {echo $rowdh['ghichu']; }?>"/>
                            </div>
                            <div class="form-group">
                               <label>Tình trạng</label>
                               <div class="radio">

                                <label class="radi1"><span class="fas fa-transgender"></span></label>

                                <?php $i=0; if(isset($_POST['sua'])){$i=$tinhtrang;} else { $i=$rowdh['tinhtrang']; }
                                if($i==0) { ?>
                                <label class="radi"><input type="radio" name="tinhtrang" value="0" checked>Đang xử lý</label>
                                <label class="radi"><input type="radio" name="tinhtrang" value="1">Đã xong</label>
                                <?php } else { ?> 
                                <label class="radi"><input type="radio" name="tinhtrang" value="0">Đang xử lý</label>
                                <label class="radi"><input type="radio" name="tinhtrang" value="1" checked>Đã xong</label>    
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



