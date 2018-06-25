<?php
include_once("classadmin.php");
$ql= new quanly;
$ncc = $ql-> nhacungcap();
$save='';
$MaNCC=$_POST['MaNCC'];
$TenNCC=$_POST['TenNCC'];
$Diachi=$_POST['Diachi'];
$Dienthoai=$_POST['Dienthoai'];
$Email=$_POST['Email'];
if(isset($_POST['add'])){
    $checkma=$ql->masp($masp);
    if($checkma==0){
        $insert= $ql->insertncc($MaNCC,$TenNCC,$Diachi,$Dienthoai,$Email);

        $save = '<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Thành công!</strong> 
        </div>';  
    } else{
        $save = '<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Trùng mã NCC!</strong> 
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
                        <h3 class="box-title">Thêm nhà cung cấp mới</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php echo $save ?>
                        <form action="" method="post"  enctype="multipart/form-data">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mã nhà cung cấp</label>
                                <input type="text" name="MaNCC" id="MaNCC" class="form-control" placeholder="Nhập mã NCC vd : NCC1" required  value="<?php echo $_POST["MaNCC"];?>"/>
                            </div>
                            <div class="form-group">
                                <label>Tên nhà cung cấp</label>
                                <input type="text" name="TenNCC" id="TenNCC" class="form-control" placeholder="Nhập tên NCC" required  value="<?php echo $_POST["TenNCC"];?>"/>
                            </div>


                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="Diachi" id="Diachi" value="<?php echo $_POST["Diachi"];?>"  required class="form-control" placeholder="Nhập Địa chỉ"  />
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="text" name="Dienthoai" id="Dienthoai" value="<?php echo $_POST["Dienthoai"];?>"  required class="form-control" placeholder="Nhập số dt"  />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="Email" id="Email"  class="form-control" value="<?php echo $_POST["Email"];?>" placeholder="Nhập email"   required/>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="add" class="btn btn-primary btn-flat" id="reg" value="Thêm nhà cung cấp"></input>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->

