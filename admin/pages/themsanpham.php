<?php
include_once("classadmin.php");
$ql= new quanly;
$loaisp = $ql-> loaisanpham();
$ncc = $ql-> nhacungcap();
$save='';
$masp=$_POST['masp'];
$ten=$_POST['ten'];
$nhacc=$_POST['ncc'];
$lsp=$_POST['lsp'];
$mota=$_POST['mota'];
$sl=$_POST['sl'];
$gia=$_POST['gia'];
$noibat=$_POST['noibat'];
$ngaynhap = date('Y-m-d');
$sale=$_POST['giamgia'];
$hinh=$_FILES['Hinh']['name'];
if(isset($_POST['add'])){
    $checkma=$ql->masp($masp);
    if($checkma==0){
        $insertsp= $ql->themsanpham($masp,$ten,$nhacc,$lsp,$mota,$sl,$gia,$hinh,$ngaynhap,$noibat,$sale);
        move_uploaded_file($_FILES['Hinh']['tmp_name'],"../img/sanpham/".$_FILES['Hinh']['name']);
        if($insertsp){
           $save = '<div class="alert alert-success alert-dismissible">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           <strong>Thành công!</strong> 
           </div>';  
       } else{
        $save = '<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Lỗi nhập dữ liệu!</strong> 
        </div>';
        }


}
else{$save = '<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Trùng mã sản phẩm!</strong> 
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
                        <h3 class="box-title">Thêm sản phẩm mới</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php echo $save ?>
                        <form action="" method="post"  enctype="multipart/form-data">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mã sản phẩm</label>
                                <input type="text" name="masp" id="masp" class="form-control" placeholder="Nhập mã sản phẩm vd: SP1" required  value="<?php echo $_POST["masp"];?>"/>
                            </div>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="ten" id="ten" class="form-control" placeholder="Nhập tên sản phẩm" required  value="<?php echo $_POST["ten"];?>"/>
                            </div>
                            <div class="form-group">
                                <label>Nhà cung cấp</label>
                                <select class="form-control" name="ncc" required>
                                    <option value="">--Chọn nhà cung cấp--</option>
                                    <?php while($rowncc=mysql_fetch_array($ncc)){ ?>
                                    <option value="<?php echo $rowncc['MaNCC'] ;?>"><?php echo $rowncc['TenNCC'] ;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <select class="form-control" name="lsp" required>
                                    <option value="">--Chọn loại sản phẩm--</option>
                                    <?php while($rowloaisp=mysql_fetch_array($loaisp)){ ?>
                                    <option value="<?php echo $rowloaisp['Maloai'] ;?>"><?php echo $rowloaisp['Tenloai'] ;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>

                                <div class='box-body pad'>

                                    <textarea id="mota" name="mota" rows="10" cols="80" required><?php echo $_POST["mota"];?>
                                    </textarea>                        

                                </div>

                            </div>
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input type="number" name="sl" id="soluong" value="<?php echo $_POST["sl"];?>"  required class="form-control" placeholder="Nhập số lượng" maxlength="1000" />
                                <div class="alert-danger text-center" id="sdt_error"></div>
                            </div>
                            <div class="form-group">
                                <label>Đơn giá</label>
                                <input type="number" name="gia" id="gia" minlength="1000"  class="form-control" value="<?php echo $_POST["gia"];?>" placeholder="Nhập giá"   required/>
                                <div class="alert-danger text-center" id="gia_error"></div>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" id="Hinh" accept="image/*"  name="Hinh" required>
                            </div>

                            <div class="form-group">
                               <label>Sản phẩm nỗi bật</label>
                               <div class="radio">

                                <label class="radi1"><span class="fas fa-transgender"></span></label>
                                <?php if($_POST['noibat']==0) { ?>
                                <label class="radi"><input type="radio" name="noibat" value="0" checked>Không</label>
                                <label class="radi"><input type="radio" name="noibat" value="1">Có</label>
                                <?php } else { ?> 
                                <label class="radi"><input type="radio" name="noibat" value="0">Không</label>
                                <label class="radi"><input type="radio" name="noibat" value="1" checked>Có</label>    
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Giảm giá</label>
                            <input type="number" name="giamgia" id="giamgia" value="<?php echo $_POST["giamgia"];?>" class="form-control" placeholder="Nhập % vd: 50" required/>
                            <div class="alert-danger text-center" id="giamgia_error"></div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="add" class="btn btn-primary btn-flat" id="reg" value="Thêm sản phẩm"></input>
                        </div>
                    </form>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->
</aside><!-- /.right-side -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
<!-- CK Editor -->
<script src="js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('mota');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
    $('#soluong').on('keyup change', function () {
        $("#soluong").val($(this).val().split(' ').join(''));
        if ($('#soluong').val().match(/([0-9])/)) {
            $('#reg').removeAttr('disabled');
            $('#sdt_error').html('');
        } else {
            $('#sdt_error').html('Dữ liệu nhập sai!');
            $('#reg').attr({
                "disabled": ''
            });
        }
    });
    $('#gia').on('keyup change', function () {
        $("#gia").val($(this).val().split(' ').join(''));
        if ($('#gia').val().match(/([0-9])/)) {
            $('#reg').removeAttr('disabled');
            $('#gia_error').html('');
        } else {
            $('#gia_error').html('Dữ liệu nhập sai!');
            $('#reg').attr({
                "disabled": ''
            });
        }
    });
    $('#giamgia').on('keyup change', function () {
        $("#giamgia").val($(this).val().split(' ').join(''));
        if ($('#giamgia').val().match(/([0-9])/)) {
            $('#reg').removeAttr('disabled');
            $('#giamgia_error').html('');
        } else {
            $('#giamgia_error').html('Dữ liệu nhập sai!');
            $('#reg').attr({
                "disabled": ''
            });
        }
    });
</script>

