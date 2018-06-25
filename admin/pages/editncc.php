<?php
include_once("classadmin.php");
$ql= new quanly;
$Ma=$_GET['id'];
$loaisp = $ql-> showncc($Ma);
$row = mysql_fetch_array($loaisp); 

$save='';
$MaNCC=$_POST['MaNCC'];
$TenNCC=$_POST['TenNCC'];
$Diachi=$_POST['Diachi'];
$Dienthoai=$_POST['Dienthoai'];
$Email=$_POST['Email'];
if(isset($_POST['sua'])){

    $update= $ql->editncc($MaNCC,$TenNCC,$Diachi,$Dienthoai,$Email);
    
    if($update){
     $save = '<div class="alert alert-success alert-dismissible">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>Thành công!</strong> 
     </div>';  
     }
     else{$save = '<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thất bại!</strong> 
    </div>';
    }    
}
?>



<aside class="right-side">


    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- right column -->
            <div class="col-md-9">
                <!-- general form elements disabled -->
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Chỉnh sửa nhà cung cấp</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php echo $save ?>
                        <form action="" method="post"  enctype="multipart/form-data">
                            <!-- text input -->
                            
                            <div class="form-group">
                                <label>Mã nhà cung cấp</label>
                                <input type="text" name="MaNCC" id="MaNCC" class="form-control" placeholder="Nhập mã NCC vd : NCC1" required  value="<?php if(isset($_POST['MaNCC'])){ echo $MaNCC;} else {echo $row['MaNCC']; }?>"/>
                            </div>
                            <div class="form-group">
                                <label>Tên nhà cung cấp</label>
                                <input type="text" name="TenNCC" id="TenNCC" class="form-control" placeholder="Nhập tên NCC" required  value="<?php if(isset($_POST['sua'])){ echo $TenNCC;} else {echo $row['TenNCC']; }?>"/>
                            </div>


                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="Diachi" id="Diachi" value="<?php if(isset($_POST['sua'])){ echo $Diachi;} else {echo $row['Diachi']; }?>"  required class="form-control" placeholder="Nhập Địa chỉ"  />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="Dienthoai" id="Dienthoai" value="<?php if(isset($_POST['sua'])){ echo $Dienthoai;} else {echo $row['Dienthoai']; }?>"  required class="form-control" placeholder="Nhập số dt"  />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="Email" id="Email"  class="form-control" value="<?php if(isset($_POST['sua'])){ echo $Email;} else {echo $row['Email']; }?>" placeholder="Nhập email"   required/>
                            </div>

                            <div class="form-group">
                                <a href="index.php?act=listncc" class="btn btn-warning"><i class="fa fa-angle-left"></i> Quay lại</a>
                                <input type="submit" name="sua" class="btn btn-primary btn-flat" id="reg" value="Cập nhật></input>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->


