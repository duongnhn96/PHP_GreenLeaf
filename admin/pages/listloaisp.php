 
<?php
include_once("classadmin.php");
$ql= new quanly;
$result= $ql->loaisanpham();


?>
<div class="box">
    <div class="box-header">
        <h2 class="text-center">Danh sách loại sản phẩm</h2>                                    
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">


    
     <table id="example1" class="table table-bordered table-striped">
        <thead>

            <tr>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th>Tuỳ chỉnh</th>
            </tr>
        </thead>
        <tbody>
            <?php 
           
            while($row = mysql_fetch_array($result)){
                ?>
                <tr>
                    <td height="10"><?php echo $row['Maloai'] ?></td>
                     <td><?php echo $row['Tenloai'] ?></td>
                    <td >
                        <a href="index.php?act=editlsp&id=<?php echo $row['Maloai'];?>" class="btn btn-info refresh"><span  class="fa fa-fw fa-edit"></span></a>
                        <a href="javascript:void(0)" onclick="delloaisp(<?php echo $row['Maloai'];?>) " class="btn btn-danger "><span class="fa fa-fw fa-times"></span></a> 
                       
                    </td>
                </tr>
                <?php } ?>
            </tbody>
            

            </table>
        </form>
        </div><!-- /.box-body -->
    
    </div><!-- /.box -->
    <script>
      function delloaisp(id){
        check=confirm("Bạn có muốn xoá bản ghi này không?");
        if(check){
          window.location.href="index.php?act=delloaisp&id="+id;
          alert('Xoá thành công!');
        } else alert('Xoá không thành công!');
      }
    </script>
