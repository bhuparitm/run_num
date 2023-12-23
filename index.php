<?php
ob_start();
session_start();
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) header('Location: login.php');
if (!isset($_GET['type'])) $_GET['type'] = "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ระบบออกที่หนังสือ กห 0207 พัฒนาโดย ฝ่ายสารสนเทศ สนผ.กห.</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <style>
    @font-face {
      font-family: 'Mali';
      src:
        url('./fonts/Mali-Regular.ttf') format('truetype'),
        url('./fonts/Mali-Bold.ttf') format('truetype'),
        url('./fonts/Mali-Italic.ttf') format('truetype');

    }

    @font-face {
      font-family: 'THSarabun';
      src:
        url('./fonts/THSarabun.ttf') format('truetype'),
        url('./fonts/THSarabun\ Bold.ttf') format('truetype'),
        url('./fonts/THSarabun\ Italic.ttf') format('truetype');
    }

    div {
      font-family: 'THSarabun';
      font-size: 18px;
    }
    .navbar-nav {
      font-size: 25px;
    }
  </style>
</head>

<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav" id="navs">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="./" class="nav-link">หน้าแรก</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="contact.php" class="nav-link">ติดต่อเรา</a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="./images/สนผ.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ระบบออกเลขหนังสือ กห 0207</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="./images/user.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="UserEdit.php" class="d-block"><?= $_SESSION['fullname']; ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  ออกที่หนังสือ กห 0207
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./frm_book.php?type=normal" class="nav-link <?php if ($_GET['type'] == 'normal') echo 'active'; ?>">
                    <i class="far fa-circle nav-icon" style="color: orange;"></i>
                    <p>หนังสือปกติ</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./frm_book.php?type=secret1" class="nav-link <?php if ($_GET['type'] == 'secret1') echo 'active'; ?>">
                    <i class="far fa-circle nav-icon" style="color: orange;"></i>
                    <p>หนังสือลับ</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./frm_book.php?type=secret2" class="nav-link <?php if ($_GET['type'] == 'secret2') echo 'active'; ?>">
                    <i class="far fa-circle nav-icon" style="color: orange;"></i>
                    <p>หนังสือลับมาก</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./frm_book.php?type=secret3" class="nav-link <?php if ($_GET['type'] == 'secret3') echo 'active'; ?>">
                    <i class="far fa-circle nav-icon" style="color: orange;"></i>
                    <p>หนังสือลับที่สุด</p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item menu-open">
              <a href="#" class="nav-link active" style="background-color:#F33;">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  รายงาน
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="./report_normal.php" class="nav-link">
                    <i class="far fa-circle nav-icon" style="color:aqua;"></i>
                    <p>เรื่องปกติ</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./report_secret1.php" class="nav-link">
                    <i class="far fa-circle nav-icon" style="color: aqua;"></i>
                    <p>เรื่องลับ</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./report_secret2.php" class="nav-link">
                    <i class="far fa-circle nav-icon" style="color: aqua;"></i>
                    <p>เรื่องลับมาก</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="./report_secret3.php" class="nav-link">
                    <i class="far fa-circle nav-icon" style="color: aqua;"></i>
                    <p>เรื่องลับที่สุด</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">

        <table width="395" border="0" align="center" cellpadding="0" cellspacing="1">
          <tbody>
            <tr>
              <th width="393" bordercolor="#009900" bgcolor="#009900" scope="col">
                <div align="center">
                  <img src="./images/ot.jpg" width="400" height="150">
                </div>
              </th>
            </tr>
          </tbody>
        </table>

        <table align="center">
          <tr>
            <td width="391" height="25" bordercolor="#99FFFF" bgcolor="#FFFFFF">
              <table border="0" cellpadding="0" cellspacing="0">
                <tbody>
                  <tr>
                    <td>
                      <a href="frm_book.php?type=normal" target="_top">
                        <img src="./images/menu1.jpg" border="0" alt="">
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a href="frm_book.php?type=secret1" target="_top">
                        <img src="./images/menu2.jpg" border="0" alt="">
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a href="frm_book.php?type=secret2" target="_top">
                        <img src="./images/menu3.jpg" border="0" alt="">
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <a href="frm_book.php?type=secret3" target="_top">
                        <img src="./images/menu4.jpg" border="0" alt="">
                      </a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </table>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2014-2023 <a href="#">ระบบออกเลขที่หนังสือ กห 0207</a></strong>

      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard2.js"></script>
</body>

</html>