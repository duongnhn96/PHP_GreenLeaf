<?php

include_once('classsanpham.php');
$sotin1trang=12;
if(!$_GET['trang']) $trang = 1;
else $trang = $_GET['trang'];
settype($trang, 'int');
$from = ($trang-1)*$sotin1trang;
$sp = new sanPham;
$resultdanhmuc = $sp->hiendanhmuc();
$resultdanhmuc2 = $sp->hiendanhmuc2();
$tongsp= $sp->demsanpham();
$sotrang = ceil($tongsp/$sotin1trang);
$resulttrang= $sp->phantrangsanpham($from,$sotin1trang);

?>
<div class="menuleft">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <!-- tabs -->
        <div class="tabbable tabs-top panel panel-success   ">
          <ul class="nav nav-tabs" >
            <li class="active sptitle" ><a href="#all" data-toggle="tab">Tất Cả Sản Phẩm</a>
            
            </li>

            <?php
            while($rowdanhmuc = mysql_fetch_array($resultdanhmuc)){ 
             ?>
             <li ><a href="#<?php echo $rowdanhmuc["Tenloai_KhongDau"]; ?>" data-toggle="tab"  ><?php echo $rowdanhmuc["Tenloai"]; ?></a></li>
             <?php } ?>
           </ul>
 
           <div class="tab-content">
            <div class="tab-pane active" id="all">
              <div class="">
                <h1 class="text-center cachkhung">Tất Cả Sản Phẩm</h1>
                <div class="phantrang text-right">
                      <div class="container-fluid">
                        <ul class="pagination">
                          <?php 
                          for($i=1;$i<=$sotrang;$i++){
                           ?>
                           <li class="<?php if($i==$trang) echo 'active'; ?>"  ><a href="<?php echo $url_host ?>San-pham/trang-<?php   echo $i;    ?>"><?php echo $i;
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
                            <a href="<?php echo $url_host ?>San-pham/<?php echo $rowsp['TenKhongDau'];?>.html" class="btn"><span class="fas fa-search-plus"></span></a> 
                          </div>
                        </div>
                        <h3><a href="<?php echo $url_host ?>San-pham/<?php echo $rowsp['TenKhongDau'];?>.html">
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
                          echo $sale = number_format($rowsp['DonGia']*(100-$rowsp['GiamGia'])/100)."₫";?>
                        </div>
                        <div class="pi-price-sale"> <?php echo number_format($rowsp['DonGia'])."₫";?> </div>
                        <div class="sticker sticker-sale"><span><?php echo "-".$rowsp['GiamGia'] ?></span></div>
                        <?php }else { ?>
                        <div class="pi-price-goc"> <?php echo number_format($rowsp['DonGia'])."₫";?> </div>
                        <?php  }  ?>
                      </div>
                    </div>
                    <?php } ?>
                    

                   </div>
                 </div>
                 <!-- end top sanpham --> 
               </div>
             </div>
             <?php
             while($rowdanhmuc2 = mysql_fetch_array($resultdanhmuc2)){ 
               ?>
               <div class="tab-pane" id="<?php echo $rowdanhmuc2["Tenloai_KhongDau"]; ?>">
                <div class="text-center">
                  <h1 class=" cachkhung"><?php echo $rowdanhmuc2["Tenloai"]; ?></h1>


                  <!-- begin top sanpham -->
                  <div class="container-fluid">
                    <div class="row" id="fixsp">
                     <?php 
                     $resulttheoloai = $sp->phantrangsanphamtheoloai($rowdanhmuc2["Maloai"]);
                     while($rowsp = mysql_fetch_array($resulttheoloai)){
                      ?>    
                      <div class="col-md-3">
                        <div class="product-item">
                         <div class="pi-img-wrapper" id="thumb-post3"> <img src="<?php echo $url_host ?>img/sanpham/<?php echo $rowsp['Hinh'];?>" class="img-responsive" alt="<?php echo $rowsp['TenSP'] ?>">
                          <div> <a href="#" class="btn" id="btn-buy"><span id="<?php echo $rowsp['MaSP'];?>" class="fas fa-cart-plus" onclick="xulygiohang(this)"></span></a> 
                            <a href="<?php echo $url_host ?>San-pham/<?php echo $rowsp['TenKhongDau'];?>.html" class="btn"><span class="fas fa-search-plus"></span></a> 
                          </div>
                        </div>
                          <h3><a href="<?php echo $url_host ?>San-pham/<?php echo $rowsp['TenKhongDau'];?>.html">
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
                            echo $sale = number_format($rowsp['DonGia']*(100-$rowsp['GiamGia'])/100)."₫";?>
                          </div>
                          <div class="pi-price-sale"> <?php echo number_format($rowsp['DonGia'])."₫";?> </div>
                          <div class="sticker sticker-sale"><span><?php echo "-".$rowsp['GiamGia'] ?></span></div>
                          <?php }else { ?>
                          <div class="pi-price-goc"> <?php echo number_format($rowsp['DonGia'])."₫";?> </div>
                          <?php  }  ?>
                        </div>
                      </div>
                      <?php } ?>


                    </div>
                  </div>
                  <!-- end top sanpham --> 

                </div>
              </div>
              <?php } ?>
            </div>
          </div>
          <!-- /tabs --> 
        </div>
      </div>
    </div>
  </div>
  <!-- begin phan trang --> 
