<?php

include_once('classsanpham.php');
$ten=$_REQUEST['tukhoa'];
$sotin1trang=12;
if(!$_GET['trang']) $trang = 1;
else $trang = $_GET['trang'];
settype($trang, 'int');
$from = ($trang-1)*$sotin1trang;
$sp = new sanPham;
$tongsp= $sp->demtimkiem($ten);
$sotrang = ceil($tongsp/$sotin1trang);
$resulttrang= $sp->phantrangtimkiem($from,$sotin1trang,$ten);

?>
<div class="menuleft">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <!-- tabs -->
        <h1 class="text-center cachkhung">Tìm thấy tổng cộng <?php echo $tongsp ?> sản phẩm </h1>
        <div class="phantrang text-right">
          <div class="container-fluid">
            <ul class="pagination">
              <?php 
              for($i=1;$i<=$sotrang;$i++){
               ?>
               <li class="<?php if($i==$trang) echo 'active'; ?>"  ><a href="index.php?act=tim&tukhoa=<?php echo $ten ?>&trang=<?php   echo $i;    ?>"><?php echo $i;
               if($i==$trang) echo '<span class="sr-only">(current)</span>' ?> </a></li>
               <?php } ?>
             </ul>
           </div>
         </div>
         <!-- /.phantrang --> 
         <!-- begin top sanpham -->
         <div class="container-fluid">
          <div class="row" id="fixsp">
            <?php 
            while($rowsp = mysql_fetch_array($resulttrang)){
             ?>
             <div class="col-md-3">
              <div class="product-item ">
                <div class="pi-img-wrapper" id="thumb-post3"> <img src="<?php echo $url_host ?>img/sanpham/<?php echo $rowsp['Hinh'];?>" class="img-responsive" alt="<?php echo $rowsp['TenSP'] ?>">
                  <div> <a href="#" class="btn" id="btn-buy"><span id="<?php echo $rowsp['MaSP'];?>" class="fas fa-cart-plus" onclick="xulygiohang(this)"></span></a> 
                    <a href="index.php?idsp=<?php echo $rowsp['MaSP'];?>" class="btn"><span class="fas fa-search-plus"></span></a> 
                  </div>
                </div>
                <h3><a href="index.php?idsp=<?php echo $rowsp['MaSP'];?> ">
                  <?php 
                  $tensp=$rowsp['TenSP'];
                  if(strlen($tensp)>23){
                    echo substr($tensp, 0, 18)."...";
                  }
                  else echo $tensp;

                  ?>
                </a> </h3>
                <?php if($rowsp['GiamGia']!=0){ ?>
                <div class="pi-price">
                  <?php
                  echo $sale = number_format($rowsp['Dongia']*(100-$rowsp['GiamGia'])/100)."₫";?>
                </div>
                <div class="pi-price-sale"> <?php echo number_format($rowsp['Dongia'])."₫";?> </div>
                <div class="sticker sticker-sale"><span><?php echo "-".$rowsp['GiamGia'] ?></span></div>
                <?php }else { ?>
                <div class="pi-price-goc"> <?php echo number_format($rowsp['Dongia'])."₫";?> </div>
                <?php  }  ?>
              </div>
            </div>
            <?php } ?>


          </div>
        </div>
        <!-- end top sanpham --> 
      </div>
    </div>
  </div>
</div>
    