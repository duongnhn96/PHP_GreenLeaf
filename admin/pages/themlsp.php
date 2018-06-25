<?php
include_once("classadmin.php");
$ql= new quanly;

$save='';
$Tenloai=$_POST['Tenloai'];

if(isset($_POST['add'])){

    $insertsp= $ql->insertlsp($Tenloai);
    if($insertsp){
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
                        <h3 class="box-title">Thêm sản loại phẩm mới</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <?php echo $save ?>
                        <form action="" method="post"  enctype="multipart/form-data">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Tên loại sản phẩm</label>
                                <input type="text" name="Tenloai" id="Tenloai" class="form-control" placeholder="Nhập tên loại sản phẩm vd: Trái cây" required  value="<?php echo $_POST["Tenloai"];?>"/>
                            </div>
                            
                            <div class="form-group">
                                <a href="index.php?act=listloaisp" class="btn btn-warning"><i class="fa fa-angle-left"></i> Quay lại</a>
                                <input type="submit" name="add" class="btn btn-primary btn-flat" id="reg" value="Thêm loại sản phẩm"></input>
                            </div>
                        </form>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!--/.col (right) -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->


