<?php
include_once("classadmin.php");
$ql= new quanly;
$save='';
$TieuDe=$_POST['TieuDe'];
$TomTat=$_POST['TomTat'];
$Noidung=$_POST['Noidung'];
$Ngay=date('Y-m-d H:i:s');
$Hinh=$_FILES['Hinh']['name'];
if(isset($_POST['add'])){
    $checkma=$ql->masp($masp);
    if($checkma==0){
        $insertsp= $ql->themtin($TieuDe,$TomTat,$Hinh,$Noidung,$Ngay);
        move_uploaded_file($_FILES['Hinh']['tmp_name'],"../img/tintuc/".$_FILES['Hinh']['name']);
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
                        <h3 class="box-title">Thêm blog</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php echo $save ?>
                        <form action="" method="post"  enctype="multipart/form-data">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tiêu Đề</label>
                                <input type="text" name="TieuDe" id="TieuDe" class="form-control" placeholder="Nhập tiêu đề" required  value="<?php echo $_POST["TieuDe"];?>"/>
                            </div>
                            <div class="form-group">
                                <label>Tóm Tắt</label>
                                <input type="text" name="TomTat" id="TomTat" class="form-control" placeholder="Nhập tóm tắt" required  value="<?php echo $_POST["TomTat"];?>"/>
                            </div>
                           
                            <div class="form-group">
                                <label>Nội dung</label>

                                <div class='box-body pad'>

                                    <textarea id="Noidung" name="Noidung" rows="10" cols="80" required><?php echo $_POST["Noidung"];?>
                                    </textarea>                        

                                </div>

                            </div>
                            
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" id="Hinh" accept="image/*"  name="Hinh" required>
                            </div>

                            
                        <div class="form-group">
                            <input type="submit" name="add" class="btn btn-primary btn-flat" id="reg" value="Thêm blog"></input>
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
                CKEDITOR.replace('Noidung');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });

</script>

