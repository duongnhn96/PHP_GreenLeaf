<?php

include_once("classadmin.php");
$ql= new quanly;
$loaisp = $ql-> loaisanpham();
$ncc = $ql-> nhacungcap();
$save='';
$masp=$_GET['id'];
$sanpham = $ql-> sanpham($masp);
$rowsp= mysql_fetch_array($sanpham);
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
if(isset($_POST['sua'])){
    if($hinh!=''){
        $resultsp=$ql->updatesanpham($masp,$ten,$nhacc,$lsp,$mota,$sl,$gia,$hinh,$ngaynhap,$noibat,$sale);
        move_uploaded_file($_FILES['Hinh']['tmp_name'],"../img/sanpham/".$_FILES['Hinh']['name']);
        if($resultsp){
         $save = '<div class="alert alert-success alert-dismissible">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>Thành công!</strong> 
         </div>';  
     }else{
        $save = '<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Lỗi nhập dữ liệu!</strong> 
        </div>';
    }

} else{
    $hinh2=$rowsp['Hinh'];
    $resultsp=$ql->updatesanpham($masp,$ten,$nhacc,$lsp,$mota,$sl,$gia,$hinh2,$ngaynhap,$noibat,$sale);
    if($resultsp){
     $save = '<div class="alert alert-success alert-dismissible">
     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
     <strong>Thành công!</strong> 
     </div>';  
 }else{
    $save = '<div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Lỗi nhập dữ liệu!</strong> 
    </div>';
}
}

}
?>



<aside class="right-side">
    
    <section class="content">
        <div class="row">

            <!-- right column -->
            <div class="col-md-9">
                <!-- general form elements disabled -->
                <div class="box box-warning">
                    <div class="box-header">
                        <h3 class="box-title">Chỉnh sửa sản phẩm</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php echo $save ?>
                        <form action="" method="post"  enctype="multipart/form-data">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Mã sản phẩm</label>
                                <input type="text" name="masp" id="masp" class="form-control"  readonly  value="<?php echo $rowsp['MaSP']; ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="ten" id="ten" class="form-control" placeholder="Nhập tên sản phẩm" required  value="<?php if(isset($_POST['sua'])){ echo $ten;} else {echo $rowsp['TenSP']; }?>"/>
                            </div>
                            <div class="form-group">

                                <label>Nhà cung cấp</label>
                                <select class="form-control" name="ncc" required>
                                    <option value="">--Chọn nhà cung cấp--</option>
                                    <?php while($rowncc=mysql_fetch_array($ncc)){
                                        if($rowncc['MaNCC']==$rowsp['MaNCC']){
                                            $select='selected';
                                        }else $select='';
                                        echo $select;
                                        ?>
                                        <option value="<?php echo $rowncc['MaNCC'] ;?>" <?php echo $select; ?> ><?php echo $rowncc['TenNCC'] ;?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Loại sản phẩm</label>
                                    <select class="form-control" name="lsp" required>
                                        <option value="">--Chọn loại sản phẩm--</option>
                                        <?php while($rowloaisp=mysql_fetch_array($loaisp)){ 
                                            if($rowloaisp['Maloai']==$rowsp['Maloai']){
                                                $selected='selected';
                                            }else $selected='';
                                            ?>
                                            <option value="<?php echo $rowloaisp['Maloai'] ;?>" <?php echo $selected; ?> ><?php echo $rowloaisp['Tenloai'] ;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>

                                        <div class='box-body pad'>

                                            <textarea id="mota" name="mota" rows="10" cols="80" required><?php if(isset($_POST['sua'])){ echo $mota;} else {echo $rowsp['Mota']; }?>
                                            </textarea>                        

                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label>Số lượng</label>
                                        <input type="number" name="sl" id="soluong" value="<?php if(isset($_POST['sua'])){ echo $sl;} else {echo $rowsp['Soluong']; }?>"  required class="form-control" placeholder="Nhập số lượng" maxlength="1000" />
                                        <div class="alert-danger text-center" id="sdt_error"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Đơn giá</label>
                                        <input type="number" name="gia" id="gia" minlength="1000"  class="form-control" value="<?php if(isset($_POST['sua'])){ echo $gia;} else {echo $rowsp['Dongia']; }?>" placeholder="Nhập giá"   required/>
                                        <div class="alert-danger text-center" id="gia_error"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Hình ảnh </label>
                                        
                                        <input type="file" id="Hinh" accept="image/*"  name="Hinh"> 
                                        <img src="../img/sanpham/<?php echo $rowsp['Hinh'];?>" width='120px' height='120px' alt="">
                                    </div>

                                    <div class="form-group">
                                     <label>Sản phẩm nỗi bật</label>
                                     <div class="radio">

                                        <label class="radi1"><span class="fas fa-transgender"></span></label>

                                        <?php $i=0; if(isset($_POST['sua'])){$i=$noibat;} else { $i=$rowsp['NoiBat']; }
                                        if($i==0) { ?>
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
                                    <input type="number" name="giamgia" id="giamgia" value="<?php if(isset($_POST['sua'])){ echo $sale;} else {echo $rowsp['GiamGia']; }?>" class="form-control" placeholder="Nhập % vd: 50" required/>
                                    <div class="alert-danger text-center" id="giamgia_error"></div>
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

