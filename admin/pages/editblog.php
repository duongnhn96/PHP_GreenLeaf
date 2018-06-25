<?php

include_once("classadmin.php");
$ql= new quanly;
$save='';
$Ma=$_GET['id'];
 echo $sanpham = $ql-> showtin($Ma);
$rowsp= mysql_fetch_array($sanpham);
$TieuDe=$_POST['TieuDe'];
$TomTat=$_POST['TomTat'];
$Noidung=$_POST['Noidung'];
$Ngay=date('Y-m-d H:i:s');
$Hinh=$_FILES['Hinh']['name'];
if(isset($_POST['sua'])){
    if($Hinh!=''){
        $resultsp=$ql->edittin($Ma,$TieuDe,$TomTat,$Hinh,$Noidung,$Ngay);
        move_uploaded_file($_FILES['Hinh']['tmp_name'],"../img/tintuc/".$_FILES['Hinh']['name']);
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
    $resultsp=$ql->edittin($Ma,$TieuDe,$TomTat,$hinh2,$Noidung,$Ngay);
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
                    <h3 class="box-title">Chỉnh sửa blog</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php echo $save ?>
                    <form action="" method="post"  enctype="multipart/form-data">
                        <!-- text input -->

                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="TieuDe" id="TieuDe" class="form-control"  required  value="<?php if(isset($_POST['sua'])){ echo $TieuDe;} else {echo $rowsp['TieuDe']; }?>"/>
                        </div>
                         <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="TomTat" id="TomTat" class="form-control" required  value="<?php if(isset($_POST['sua'])){ echo $TomTat;} else {echo $rowsp['TomTat']; }?>"/>
                        </div>


                        <div class="form-group">
                            <label>Nội dung</label>

                            <div class='box-body pad'>

                                <textarea id="Noidung" name="Noidung" rows="10" cols="80" required><?php if(isset($_POST['sua'])){ echo $Noidung;} else {echo $rowsp['Noidung']; }?>
                                </textarea>                        

                            </div>

                        </div>

                        </div>
                        <div class="form-group">
                            <label>Hình ảnh </label>

                            <input type="file" id="Hinh" accept="image/*"  name="Hinh"> 
                            <img src="../img/sanpham/<?php echo $rowsp['Hinh'];?>" width='120px' height='120px' alt="">
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
                CKEDITOR.replace('Noidung');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
   
</script>

