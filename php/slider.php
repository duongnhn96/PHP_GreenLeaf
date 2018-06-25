<?php
	// $lenhspmoi="Select *from sanpham order by ngaynhap desc limit 0,6";
include_once("classsanpham.php");
$sp = new sanPham;
$kqspmoi=$sp->hiensanphammoi();
$kqsphot=$sp->hiensanphamhot();
	// sale
$lenhsale="SELECT MaSP,TenSP,Dongia,Hinh,GiamGia,TenKhongDau from Sanpham where GiamGia!=0 limit 0,8";
$kqspsale=mysql_query($lenhsale);
	// end sale
?>
<!--begin slider-->


<div class="slider">
  <div class="container">
    <div class="row">
      <div class="col-sm-12" id="slider2">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active"> <img src="<?php echo $url_host ?>img/design/slider_1.png" alt="Hinh anh 1" style="width:100%;"> </div>
            <div class="item"> <img src="<?php echo $url_host ?>img/design/slider_2.png" alt="Hinh anh 2" style="width:100%;"> </div>
            <div class="item"> <img src="<?php echo $url_host ?>img/design/slider_3.png" alt="Hinh anh 3" style="width:100%;"> </div>
          </div>
          <a class="left carousel-control" href="#myCarousel" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> <span class="sr-only">Next</span> </a> </div>
        </div>
      </div>
    </div>
  </div>
  <!--end slider--> 

  <!-- begin giam gia -->
  <div class="sanphamhot">
    <div class="container">
      <div class="row">
        <div class="tieude">
          <h2>Đang giảm giá</h2>
        </div>
        <!-- /.tieude --> 
        <!--begin tieudegiamgia -->
        <div class="col-sm-12">
          <div class="ndtieude"> <span>Giảm giá đến <font color="red">50%</font> giá trị sản phẩm ngay trong hôm nay</span> </div>
          <!-- /.ndtieude --> 
        </div>
        <!--end tieudegiamgia -->
        <div class="col-md-12">
          <div class="row2">
            <?php 
            while($rowsale = mysql_fetch_array($kqspsale)){
              ?>
              <div class="col-md-3">
                <div class="product-item">
                  <div class="pi-img-wrapper" id="thumb-post3"> <img src="<?php echo $url_host ?>img/sanpham/<?php echo $rowsale['Hinh'];?>" class="img-responsive" alt="<?php echo $rowsale['TenSP'] ?>">
                    <div> <a href="#" class="btn" id="btn-buy"><span id="<?php echo $rowsale['MaSP'];?>" class="fas fa-cart-plus" onclick="xulygiohang(this)"></span></a> 
                    <a href="<?php echo $url_host ?>San-pham/<?php echo $rowsale['TenKhongDau'];?>.html" class="btn"><span class="fas fa-search-plus"></span></a> 
                    </div>
                  </div>
                  <h3><a href="<?php echo $url_host ?>San-pham/<?php echo $rowsale['TenKhongDau'];?>.html">
                    <?php 
                    $tensp=$rowsale['TenSP'];
                    if(strlen($tensp)>30){
                      echo substr($tensp, 0, 25)."...";
                    }
                    else echo $tensp;

                    ?>
                  </a></h3>
                  <div class="pi-price">
                    <?php
                    echo $sale = number_format($rowsale['Dongia']*(100-$rowsale['GiamGia'])/100)."₫";?>
                  </div>
                  <div class="pi-price-sale"> <?php echo number_format($rowsale['Dongia'])."₫";?> </div>
                  <div class="sticker sticker-sale"><span><?php echo "-".$rowsale['GiamGia'] ?></span></div>
                </div>
              </div>
              <?php } ?>
            </div>
            <!--.row--> 
          </div>
          <!--.row--> 

        </div>
      </div>
    </div>

    <!-- end giam gia --> 
    <!-- begin san pham moi -->
    <div class="sanphamhot">
      <div class="container">
        <div class="row">
          <div class="tieude">
            <h2>SẢN PHẨM MỚI</h2>
          </div>
          <!-- /.tieude --> 
          <!--begin tieude -->
          <div class="col-sm-12">
            <div class="ndtieude"> <span>Sản phẩm vừa được cập nhật gần đây!</span> </div>
            <!-- /.ndtieude --> 
          </div>
          <!--end tieude -->
          <div class="col-md-12">
            <div class="row2">
              <?php 
              while($rowspmoi = mysql_fetch_array($kqspmoi)){
                ?>
                <div class="col-md-3">
                  <div class="product-item">
                    <div class="pi-img-wrapper" id="thumb-post3"> <img src="img/sanpham/<?php echo $rowspmoi['Hinh'];?>" class="img-responsive" alt="<?php echo $rowspmoi['TenSP'] ?>">
                      <div> <a href="#" class="btn" id="btn-buy"><span id="<?php echo $rowspmoi['MaSP'];?>" class="fas fa-cart-plus" onclick="xulygiohang(this)"></span></a> 
                        <a href="<?php echo $url_host ?>San-pham/<?php echo $rowspmoi['TenKhongDau'];?>.html" class="btn"><span class="fas fa-search-plus"></span></a> 
                      </div>
                    </div>
                    <h3><a href="<?php echo $url_host ?>San-pham/<?php echo $rowspmoi['TenKhongDau'];?>.html">
                      <?php 
                      $tensp=$rowspmoi['TenSP'];
                      if(strlen($tensp)>30){
                        echo substr($tensp, 0, 25)."...";
                      }
                      else echo $tensp;

                      ?>
                    </a></h3>
                    <?php if($rowspmoi['GiamGia']!=0){ ?>
                    <div class="pi-price">
                      <?php
                      echo $sale = number_format($rowspmoi['DonGia']*(100-$rowspmoi['GiamGia'])/100)."₫";?>
                    </div>
                    <div class="pi-price-sale"> <?php echo number_format($rowspmoi['DonGia'])."₫";?> </div>
                    <div class="sticker sticker-sale"><span><?php echo "-".$rowspmoi['GiamGia'] ?></span></div>
                    <?php }else { ?>
                    <div class="pi-price-goc"> <?php echo number_format($rowspmoi['DonGia'])."₫";?> </div>
                    <?php  }  ?>
                    <div class="sticker sticker-new"></div>
                  </div>
                </div>
                <?php } ?>
              </div>
              <!--.row--> 
            </div>
            <!--.row--> 

          </div>
        </div>
      </div>
      <!-- end san pham moi --> 
      <!-- begin san pham hot -->
      <div class="sanphamhot">
        <div class="container">
          <div class="row">
            <div class="tieude">
              <h2>SẢN PHẨM HOT NHẤT</h2>
            </div>
            <!-- /.tieude --> 
            <!--begin tieude -->
            <div class="col-sm-12">
              <div class="ndtieude"> <span>Sản phẩm được nhiều khách hàng tin dùng!</span> </div>
              <!-- /.ndtieude --> 
            </div>
            <!--end tieude -->
            <div class="col-md-12">
              <div class="row2">
                <?php 
                while($rowshot = mysql_fetch_array($kqsphot)){
                  ?>
                  <div class="col-md-3">
                    <div class="product-item">
                     <div class="pi-img-wrapper" id="thumb-post3"> <img src="img/sanpham/<?php echo $rowshot['Hinh'];?>" class="img-responsive" alt="<?php echo $rowshot['TenSP'] ?>">
                      <div> <a href="#" class="btn" id="btn-buy"><span id="<?php echo $rowshot['MaSP'];?>" class="fas fa-cart-plus" onclick="xulygiohang(this)"></span></a> 
                        <a href="<?php echo $url_host ?>San-pham/<?php echo $rowshot['TenKhongDau'];?>.html" class="btn"><span class="fas fa-search-plus"></span></a> 
                      </div>
                    </div>
                    <h3><a href="<?php echo $url_host ?>San-pham/<?php echo $rowshot['TenKhongDau'];?>.html">
                      <?php 
                      $tensp=$rowshot['TenSP'];
                      if(strlen($tensp)>30){
                        echo substr($tensp, 0, 25)."...";
                      }
                      else echo $tensp;

                      ?>
                    </a></h3>
                    <?php if($rowshot['GiamGia']!=0){ ?>
                    <div class="pi-price">
                      <?php
                      echo $sale = number_format($rowshot['DonGia']*(100-$rowshot['GiamGia'])/100)."₫";?>
                    </div>
                    <div class="pi-price-sale"> <?php echo number_format($rowshot['DonGia'])."₫";?> </div>
                    <div class="sticker sticker-sale"><span><?php echo "-".$rowshot['GiamGia'] ?></span></div>
                    <?php }else { ?>
                    <div class="pi-price-goc"> <?php echo number_format($rowshot['DonGia'])."₫";?> </div>
                    <?php  }  ?>
                    <div class="sticker sticker-hot"></div>
                  </div>
                </div>
                <?php } ?>
              </div>
              <!--.row--> 
            </div>
            <!--.row--> 

          </div>
        </div>
      </div>
      <!-- end san pham hot --> 

      <!--begin ykienkhachhang-->
      <div class="ykienkhachhang">
        <section id="carousel">
          <div class="container">
            <div class="row ykien">
              
                <div class="quote"><i class="fa fa-quote-left fa-4x"></i></div>
                <div class="carousel slide" id="fade-quote-carousel" data-ride="carousel" data-interval="5000">
                  <ol class="carousel-indicators">
                    <li data-target="#fade-quote-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#fade-quote-carousel" data-slide-to="1"></li>
                    <li data-target="#fade-quote-carousel" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner text-center">
                    <div class="active item">
                      <div class="profile-circle" style="background-color: rgba(77,5,51,.2);"><img class="img-circle" alt="Cinque Terre" width="100" height="100" src="img/design/fb1.jpg" alt=""></div>
                      <blockquote>
                        <p>Tôi là khách hàng quen thuộc của GreenLeaf. Nhờ GreenLeaf mà tôi tiết kiệm khá nhiều thời gian và công sức cho việc mua thực phẩm cho gia đình. Tôi đã giới thiệu cho bạn bè và người thân của tôi họ cũng rất thích mua sắm ở đây</p>
                      </blockquote>
                    </div>
                    <div class="item">
                      <div class="profile-circle" style="background-color: rgba(77,5,51,.2);"><img class="img-circle" alt="Cinque Terre" width="100" height="100" src="img/design/fb2.gif" alt=""></div>
                      <blockquote>
                        <p>Thực phẩm ở đây rất tươi và an toàn. Dịch vụ cũng như nhân viên rất tốt, tôi đã giới thiệu cho nhiều bạn bè và fan của tôi, họ cũng cảm thấy rất hài lòng! Tôi thích nhất là thịt ở đây rất tươi ngon và đảm bảo an toàn</p>
                      </blockquote>
                    </div>
                    <div class="item">
                      <div class="profile-circle" style="background-color: rgba(77,5,51,.2);"><img class="img-circle" alt="Cinque Terre" width="100" height="100" src="img/design/fb3.jpg" alt=""></div>
                      <blockquote>
                        <p>Các con tôi rất thích trái cây và thực phẩm ở đây vừa tươi lại đảm bảo an toàn. Đây là nơi mà tôi chọn để đảm bảo sức khoẻ cho gia đình! Tôi cũng thích những sản phẩm đặt sản mà khó tìm được chổ mua đúng giá và đảm bảo như thế này </p>
                      </blockquote>
                    </div>
                  </div>
                </div>
             
              
            </div>
          </div>
        </section>
      </div>
      <!--end ykienkhachhang--> 

      <!-- counter --> 

      <div class="counter">
        <section id="counter"> 
          <!-- <div class="main_counter_area"> --> 
            <!-- <div class="one-overlay p-y-3"> -->
              <div class="container">
                <div class="row text-center"> 
                  <!-- <div class="main_counter_content text-center white-text wow fadeInUp"> -->
                    <div class="col-md-3">
                      <div class="ocounter"> <i class="fa fa-heart"></i>
                        <h2 class="statistic-counter">99</h2>
                        <p>Độ hài lòng(%)</p>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="ocounter"> <i class="fa fa-check"></i>
                        <h2 class="statistic-counter">97</h2>
                        <p>Giao hành công(%)</p>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="ocounter"> <i class="fab fa-opencart"></i>
                        <h2 class="statistic-counter">4246</h2>
                        <p>Tổng đơn hàng</p>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="ocounter"> <i class="fa fa-street-view"></i>
                        <h2 class="statistic-counter">4780</h2>
                        <p>Lượt ghé thăm</p>
                      </div>
                    </div>
                  </div>
                  <!-- </div> --> 
                  <!-- </div> --> 
                  <!-- </div> --> 
                </div>
              </section>
            </div>
            <!-- /.counter --> 

            <!-- trenfooter -->
            <div class="trenfooter">
              <div class="section-brand">
                <div class="container">
                  <div class="row">
                    <div class="col-md-3  "> <img alt="Quality" src="img/design/brand_01.png"> </div>
                    <div class="col-md-3  "> <img alt="Quality" src="img/design/brand_02.png"> </div>
                    <div class="col-md-3  "> <img alt="Quality" src="img/design/brand_03.png"> </div>
                    <div class="col-md-3  "> <img alt="Quality" src="img/design/brand_04.png"> </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.trenfooter --> 
            <!-- end trenfooter --> 

            <script type="text/javascript" src="js/jquery.waypoints.min.js"></script> 
            <script type="text/javascript" src="js/jquery.counterup.min.js"></script> 
            <script>
              $('.statistic-counter_two, .statistic-counter, .count-number').counterUp({
                delay: 10,
                time: 2000
              });
            </script>
