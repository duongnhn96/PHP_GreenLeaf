<?php session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý GreenLeaf</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
     <script src="js/jquery.min.js"></script>
    <!-- jQuery UI 1.10.3 -->
    <script src="js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Morris.js charts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- fullCalendar -->
    <script src="js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

    <!-- AdminLTE App -->
    <script src="js/AdminLTE/app.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="js/AdminLTE/dashboard.js" type="text/javascript"></script>   

</head>

<body class="skin-black">
    <?php 
    ini_set("display_errors",0);
    include_once("../config/config.php");

    ?>
    <?php
    if(isset($_SESSION['user'])){
        if($_SESSION['Macv']==1){
            ?>
            <header class="header">
                <a href="index.php" class="logo">
                    GreenLeaf
                </a>

                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-right">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span>Tuỳ chọn <i class="caret"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header bg-light-blue">
                                        <img src="img/avatar2.png" class="img-circle" alt="User Image" />
                                        <p>
                                            <?php echo $_SESSION['Tenkhachhang'] ?>
                                        </p>
                                    </li>

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="../index.php" class="btn btn-default btn-flat">Trang chủ</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="pages/logout.php" class="btn btn-default btn-flat">Đăng xuất</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <div class="wrapper row-offcanvas row-offcanvas-left">
                <!-- Left side column. contains the logo and sidebar -->
                <aside class="left-side sidebar-offcanvas">
                    <!-- sidebar: style can be found in sidebar.less -->
                    <section class="sidebar">
                        <!-- Sidebar user panel -->
                        <div class="user-panel">
                            <div class="pull-left image">
                                <img src="img/avatar2.png" class="img-circle" alt="User Image" />
                            </div>
                            <div class="pull-left info">
                                <p>Chào <?php echo $_SESSION['user'] ?> !</p>

                                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                            </div>
                        </div>
                        <!-- search form -->
                        
                        <ul class="sidebar-menu">
                            <li>
                                 <a href="index.php?act=listdh"><i class="fa fa-fw fa-shopping-cart"></i>Quản lý đơn hàng</a>
                            </li>
                            
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-fw fa-pagelines"></i>
                                    <span>Sản phẩm</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="index.php?act=addsp"><i class="fa fa-angle-double-right"></i>Thêm sản phẩm</a></li>
                                    <li><a href="index.php?act=listsp"><i class="fa fa-angle-double-right"></i>Danh sách sản phẩm</a></li>
                                    
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-fw fa-users"></i>
                                    <span>Khách hàng</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="index.php?act=adduser"><i class="fa fa-angle-double-right"></i>Thêm khách hàng mới</a></li>
                                    <li><a href="index.php?act=listuser"><i class="fa fa-angle-double-right"></i>Danh sách khách hàng</a></li>
                                    
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-fw fa-pagelines"></i>
                                    <span>Loại sản phẩm</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="index.php?act=addlsp"><i class="fa fa-angle-double-right"></i>Thêm loại sản phẩm</a></li>
                                    <li><a href="index.php?act=listloaisp"><i class="fa fa-angle-double-right"></i>Danh sách loại sản phẩm</a></li>
                                    
                                </ul>
                            </li>
                             <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-fw fa-pagelines"></i>
                                    <span>Nhà cung cấp</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="index.php?act=addncc"><i class="fa fa-angle-double-right"></i>Thêm nhà cung cấp</a></li>
                                    <li><a href="index.php?act=listncc"><i class="fa fa-angle-double-right"></i>Danh sách nhà cung cấp</a></li>
                                    
                                </ul>
                            </li>
                             <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-fw fa-pagelines"></i>
                                    <span>Blog</span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li><a href="index.php?act=addtin"><i class="fa fa-angle-double-right"></i>Thêm blog</a></li>
                                    <li><a href="index.php?act=listblog"><i class="fa fa-angle-double-right"></i>Danh sách blog</a></li>
                                    
                                </ul>
                            </li>

                        </ul>
                    </section>
                    <!-- /.sidebar -->
                </aside>

                <!-- Right side column. Contains the navbar and content of the page -->
                <aside class="right-side">
                   
                    <section class="content">
                        <?php include_once('pages/sankhau.php') ?>
                    </section><!-- /.content -->
                </aside><!-- /.right-side -->
            </div><!-- ./wrapper -->

            <!-- add new calendar event modal -->

            <?php 

        } else{
            ?>
            <script>
                alert('Bạn không có quyền truy cập trang này!');
                location.href='../index.php';
            </script>
            <?php
        }
    } 
    else {
        include_once('pages/login.php');
    }
    ?>





</body>

</html>
