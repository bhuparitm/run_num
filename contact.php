<?php
ob_start();
session_start();
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) header('Location: login.php');
/*
$_SESSION['id'] = "1";
$_SESSION['title'] = "ส.ต.";
$_SESSION['name'] = "ภูพริษฐ์";
$_SESSION['surname'] = "เมธาพัฒนบูรณ์";
$fullname = $_SESSION['title'] . $_SESSION['name'] . ' ' . $_SESSION['surname'];
*/
if (!isset($_GET['type'])) $_GET['type'] = "";
if (!isset($_GET['report'])) $_GET['report'] = "";

require_once("./config/connect_database.php");
if (isset($_POST) && !empty($_POST)) {
    $conn = connect();
    $mail = $_POST['email'];
    $desc = $_POST['desc'];

    $sql = "INSERT INTO contact(email, description, create_date) ";
    $sql .= "VALUES('{$mail}', '{$desc}', NOW())";

    $conn->query($sql) or die(mysqli_error($conn, "ไม่สามารถเพิ่มข้อมูล."));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบออกที่หนังสือ กห 0207 พัฒนาโดย ฝ่ายสารสนเทศ สนผ.กห.</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="./plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="./plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">

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
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="./" class="nav-link">หน้าแรก</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="contact.php" class="nav-link">ติดต่อเรา</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="logout.php" class="nav-link">ออกจากระบบ</a>
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
            <br><br>
            <center>
                <h1>กองเทคโนโลและดิจิทัล สำนักนโยบายและแผนกลาโหม</p>
                </h1>
                <!-- Main content -->
                <section class="content">
                    <div class="border border-primary rounded" style="width: 80%; text-align:left; font-size: 20px;">
                        <div style="text-align:center; padding-top:5px; font-size:25px;"><b>ถาม-ตอบ / ติดต่อเรา</b></div>

                        <table border="0" cellpadding="10" cellspacing="1">
                            <tr>
                                <td width="50%">
                                    กองเทคโนโลยีและดิจิทัล สำนักนโยบายและแผนกลาโหม<br>
                                    สำนักงานปลัดกระทรวงกลาโหม (กห.) ศาลาว่าการกลาโหม ถ.สนามไชย เขตพระนคร
                                    กรุงเทพฯ ๑๐๒๐๐
                                    <br>
                                    <u>แผนกปฏิบัติการ</u><br>
                                    โทร: ๑๓๖๘ ภายใน
                                    <br>
                                    <u>แผนกวิเคราะห์ระบบ</u><br>
                                    โทร: ๐ ๒๒๒ .....<br>
                                </td>
                                <td rowspan="2" style="vertical-align: top;">
                                    <form method="POST" action="#">
                                        <table border="0">
                                            <tr>
                                                <td>อีเมล์( E- mail ):</td>
                                            </tr>
                                            <tr>
                                                <td><input type="email" name="email" id="email" width="120" placeholder="E-mail" required></td>
                                            </tr>
                                            <tr>
                                                <td>รายละเอียด (Description):</td>
                                            </tr>
                                            <tr>
                                                <td><textarea name="desc" id="desc" rows="5" cols="55" required></textarea></td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <button type="submit" class="btn btn-primary btn-sm btn-block  bt-send" style="font-size: 20px;"><b>ส่ง</b></button>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1937.7273818398478!2d100.49414034149703!3d13.751427107368112!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sth!2sth!4v1702628397313!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </td>

                            </tr>
                        </table>

                    </div>
                </section>
                <!-- /.content -->
            </center>
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
    <script src="./plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="./plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="./plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="./dist/js/adminlte.min.js"></script>

</body>

</html>