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

require_once("./config/connect_database.php");
$id = "";
$num_doc = "";
$urgent = "";
$type_doc = "";
$from_dep = "";
$subject = "";
$detail = "";
$position = "";
$to_dep = "";
$signer = "";
$requester = "";
$note = "";
$create_date = "";
$status = "";
if (!isset($_GET['type'])) $_GET['type'] = "";
else {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        if ($_GET['type'] == 'normal') {
            $tb = getDoc($_GET['id'], 'doc_normal');
        } elseif ($_GET['type'] == 'secret1') {
            $tb = getDoc($_GET['id'], 'doc_secret1');
            //$detail = $tb['detail'];
            $position = $tb['position'];
        } elseif ($_GET['type'] == 'secret2') {
            $tb = getDoc($_GET['id'], 'doc_secret2');
            //$detail = $tb['detail'];
            $position = $tb['position'];
        } elseif ($_GET['type'] == 'secret3') {
            $tb = getDoc($_GET['id'], 'doc_secret3');
            //$detail = $tb['detail'];
            $position = $tb['position'];
        }
        $id = $tb['id'];
        $num_doc = $tb['num_doc'];
        $urgent = $tb['urgent'];
        $type_doc = $tb['type_doc'];
        $from_dep = $tb['from_dep'];
        $subject = $tb['subject'];
        $to_dep = $tb['to_dep'];
        $signer = $tb['signer'];
        $requester = $tb['requester'];
        $note = $tb['note'];
        $create_date = $tb['create_date'];
        $status = $tb['status'];
    }
}
if (!isset($_GET['report'])) $_GET['report'] = "";

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
                <h1>ออกเลขหนังสือ กห 0207</p>
                </h1>
                <!-- Main content -->
                <section class="content">
                    <?php
                    if ($_GET['type'] == 'normal') echo "<div class='card card-info' style='width: 60%;'>";
                    elseif ($_GET['type'] == 'secret1') echo "<div class='card card-primary' style='width: 60%;'>";
                    elseif ($_GET['type'] == 'secret2') echo "<div class='card card-warning' style='width: 60%;'>";
                    elseif ($_GET['type'] == 'secret3') echo "<div class='card card-danger' style='width: 60%;'>";
                    ?>

                    <div class="card-header">
                        <h3 class="card-title">
                            <font style="color:#000; font-size:25px"><b>
                                    <?php
                                    if ($_GET['type'] == 'normal') echo "หนังสือปกติ {$num_doc}";
                                    elseif ($_GET['type'] == 'secret1') echo "หนังสือลับ {$num_doc}";
                                    elseif ($_GET['type'] == 'secret2') echo "หนังสือลับมาก {$num_doc}";
                                    elseif ($_GET['type'] == 'secret3') echo "หนังสือลับที่สุด {$num_doc}";
                                    ?>
                                </b>
                            </font>
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="frm_book" data-book="<?= $_GET['type']; ?>" data-id="<?= $id; ?>">
                        <div class="card-body">
                            <div class="row align-items-start form-group">
                                <div class="col col-2">
                                    <p style="text-align:right">ความเร่งด่วน: </p>
                                </div>
                                <?php
                                $u1 = "checked";
                                $u2 = "";
                                $u3 = "";
                                $u4 = "";
                                if ($urgent == "ปกติ") $u1 = "checked";
                                if ($urgent == "ด่วน") $u2 = "checked";
                                if ($urgent == "ด่วนมาก") $u3 = "checked";
                                if ($urgent == "ด่วนที่สุด") $u4 = "checked";
                                ?>
                                <div class="col" style="text-align: left;">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="urgent" id="normal" value="ปกติ" class="form-check-input" <?= $u1; ?>>
                                        <label class="form-check-label" for="normal">ปกติ</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="urgent" id="urgent" value="ด่วน" class="form-check-input" <?= $u2; ?>>
                                        <label class="form-check-label text-danger" for="normal">ด่วน</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="urgent" id="very_urgent" value="ด่วนมาก" class="form-check-input" <?= $u3; ?>>
                                        <label class="form-check-label text-danger" for="normal">ด่วนมาก</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="urgent" id="most_urgent" value="ด่วนที่สุด" class="form-check-input" <?= $u4; ?>>
                                        <label class="form-check-label text-danger" for="normal">ด่วนที่สุด</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row align-items-start form-group">
                                <div class="col col-2">
                                    <p style="text-align:right">ชนิดหนังสือ: </p>
                                </div>
                                <?php
                                $td1 = "checked";
                                $td2 = "";
                                $td3 = "";
                                if ($type_doc == "บันทึกข้อความ") $td1 = "checked";
                                if ($type_doc == "หนังสือประทับตรา") $td2 = "checked";
                                if ($type_doc == "กระดาษเขียนข่าว") $td3 = "checked";
                                ?>
                                <div class="col" style="text-align: left;">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="type_doc" value="บันทึกข้อความ" class="form-check-input" <?= $td1; ?>>
                                        <label class="form-check-label" for="normal">บันทึกข้อความ</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="type_doc" value="หนังสือประทับตรา" class="form-check-input" <?= $td2; ?>>
                                        <label class="form-check-label" for="normal">หนังสือประทับตรา</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="type_doc" value="กระดาษเขียนข่าว" class="form-check-input" <?= $td3; ?>>
                                        <label class="form-check-label" for="normal">กระดาษเขียนข่าว</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-start">
                                <div class="col col-2">
                                    <p style="text-align:right">ส่วนราชการเจ้าของเรื่อง:</p>
                                </div>
                                <div class="col form-group">
                                    <input type="text" name="from" class="form-control form-control-sm border border-dark" id="from" placeholder="หน่วยต้นเรื่อง" value="<?= $from_dep; ?>" required>
                                </div>
                            </div>

                            <div class="row align-items-start">
                                <div class="col col-2">
                                    <p style="text-align:right">เรื่อง:</p>
                                </div>
                                <div class="col form-group">
                                    <textarea name="subject" class="form-control border border-dark" id="subject" placeholder="เรื่อง" required><?= $subject; ?></textarea>
                                </div>
                            </div>

                            <?php
                            if ($_GET['type'] == 'secret1' || $_GET['type'] == 'secret2' || $_GET['type'] == 'secret3') {
                                $nt1 = "";
                                $nt2 = "";
                                $nt3 = "";
                                $nt4 = "";
                                $nt5 = "";
                                $nt6 = "";
                                $nt7 = "";
                                $nt8 = "";
                                $nt9 = "";
                                if (isset($_GET['id']) && !empty($_GET['id'])) {
                                    /* $dom = new DOMDocument('1.0', 'UTF-8');
                                    $source = '<root><name>doraemon</name><name>โดเรม่อน</name></root>';
                                    $dom->loadXML($note);
                                    $e = $dom->getElementsByTagName('li');
                                    //echo $e->item(3)->textContent;

                                    foreach ($e as $li) {
                                        $txt = $li->nodeValue;
                                        if ($txt == "กระทบต่อชื่อเสียง เกียรติศักดิ์ของบุคคลสำคัญ หน่วยงาน และเกียรติภูมิของประเทศ") $nt1 = "checked";
                                        if ($txt == "กระทบต่อผลประโยชน์ และความมั่นคงแห่งชาติด้านการทหาร (หรือด้าน.....................)") $nt2 = "checked";
                                        if ($txt == "กระทบต่อความสัมพันธ์ระหว่างประเทศ") $nt3 = "checked";
                                        if ($txt == "กระทบต่อความมั่นคงทางเศรษฐกิจ งบประมาณ หรือการคลัง") $nt4 = "checked";
                                        if ($txt == "กระทบต่อกระบวนการยุติธรรม รุกล้ำสิทธิมนุษยชน ความเป็นส่วนบุคคล หรือศักดิ์ศรีความเป็นมนุษย์") $nt5 = "checked";
                                        if ($txt == "ทำให้การปฏิบัติภารกิจเสื่อมประสิทธิภาพ หรือไม่สำเร็จตามวัตถุประสงค์") $nt6 = "checked";
                                        if ($txt == "เกิดอันตรายต่อชีวิตหรือความปลอดภัยของหน่วยงาน แหล่งข่าว หรือบุคคล") $nt7 = "checked";
                                        if (strpos($txt, "ๆ") > 0) $nt8 = "checked";
                                    }

                                    if ($nt8 == "checked") {
                                        $node = count($e) - 1;
                                        $nt9 = $e->item($node)->textContent;
                                    } */
                                    $nt = array();
                                    $nt = explode(",", $note);
                                    for ($i = 0; $i < count($nt); $i++) {
                                        $txt = $nt[$i];
                                        if ($txt == "กระทบต่อชื่อเสียง เกียรติศักดิ์ของบุคคลสำคัญ หน่วยงาน และเกียรติภูมิของประเทศ") $nt1 = "checked";
                                        if ($txt == "กระทบต่อผลประโยชน์ และความมั่นคงแห่งชาติด้านการทหาร (หรือด้าน.....................)") $nt2 = "checked";
                                        if ($txt == "กระทบต่อความสัมพันธ์ระหว่างประเทศ") $nt3 = "checked";
                                        if ($txt == "กระทบต่อความมั่นคงทางเศรษฐกิจ งบประมาณ หรือการคลัง") $nt4 = "checked";
                                        if ($txt == "กระทบต่อกระบวนการยุติธรรม รุกล้ำสิทธิมนุษยชน ความเป็นส่วนบุคคล หรือศักดิ์ศรีความเป็นมนุษย์") $nt5 = "checked";
                                        if ($txt == "ทำให้การปฏิบัติภารกิจเสื่อมประสิทธิภาพ หรือไม่สำเร็จตามวัตถุประสงค์") $nt6 = "checked";
                                        if ($txt == "เกิดอันตรายต่อชีวิตหรือความปลอดภัยของหน่วยงาน แหล่งข่าว หรือบุคคล") $nt7 = "checked";
                                        if (strpos($txt, "ๆ") > 0) $nt8 = "checked";
                                    }
                                    if($nt8 == "checked") {
                                        $node = count($nt)-1;
                                        $nt9 = $nt[$node];
                                    }
                                }
                            ?>
                                <!-- รายละเอียด -->
                                <div class="row align-items-start">
                                    <div class="col col-2" style="padding-top: 22px;">
                                        <p style="text-align:right">หมายเหตุ:</p>
                                    </div>
                                    <div class="col form-group" style="text-align:left;">
                                        เหตุผลที่กำหนดชั้นความลับ เพราะ (ตาม พ.ร.บ.ข้อมูลข่าวสารของทางราชการ พ.ศ.2540 ข้อมูลข่าวสารที่ไม่ต้องการเปิดเผย)
                                        <div class="row align-items-start">
                                            
                                            <div class="col form-check" style="text-align: left; margin-left:10px;">
                                                <input type="checkbox" class="form-check-input" name="note[]" value="กระทบต่อชื่อเสียง เกียรติศักดิ์ของบุคคลสำคัญ หน่วยงาน และเกียรติภูมิของประเทศ" id="note1" <?= $nt1; ?>>
                                                กระทบต่อชื่อเสียง เกียรติศักดิ์ของบุคคลสำคัญ หน่วยงาน และเกียรติภูมิของประเทศ<br>
                                                <input type="checkbox" class="form-check-input" name="note[]" value="กระทบต่อผลประโยชน์ และความมั่นคงแห่งชาติด้านการทหาร (หรือด้าน.....................)" id="note2" <?= $nt2; ?>>
                                                กระทบต่อผลประโยชน์ และความมั่นคงแห่งชาติด้านการทหาร (หรือด้าน.....................)<br>
                                                <input type="checkbox" class="form-check-input" name="note[]" value="กระทบต่อความสัมพันธ์ระหว่างประเทศ" id="note3" <?= $nt3; ?>>
                                                กระทบต่อความสัมพันธ์ระหว่างประเทศ<br>
                                                <input type="checkbox" class="form-check-input" name="note[]" value="กระทบต่อความมั่นคงทางเศรษฐกิจ งบประมาณ หรือการคลัง" id="note4" <?= $nt4; ?>>
                                                กระทบต่อความมั่นคงทางเศรษฐกิจ งบประมาณ หรือการคลัง<br>
                                                <input type="checkbox" class="form-check-input" name="note[]" value="กระทบต่อกระบวนการยุติธรรม รุกล้ำสิทธิมนุษยชน ความเป็นส่วนบุคคล หรือศักดิ์ศรีความเป็นมนุษย์" id="note5" <?= $nt5; ?>>
                                                กระทบต่อกระบวนการยุติธรรม รุกล้ำสิทธิมนุษยชน ความเป็นส่วนบุคคล หรือศักดิ์ศรีความเป็นมนุษย์<br>
                                                <input type="checkbox" class="form-check-input" name="note[]" value="ทำให้การปฏิบัติภารกิจเสื่อมประสิทธิภาพ หรือไม่สำเร็จตามวัตถุประสงค์" id="note6" <?= $nt6; ?>>
                                                ทำให้การปฏิบัติภารกิจเสื่อมประสิทธิภาพ หรือไม่สำเร็จตามวัตถุประสงค์<br>
                                                <input type="checkbox" class="form-check-input" name="note[]" value="เกิดอันตรายต่อชีวิตหรือความปลอดภัยของหน่วยงาน แหล่งข่าว หรือบุคคล" id="note7" <?= $nt7; ?>>
                                                เกิดอันตรายต่อชีวิตหรือความปลอดภัยของหน่วยงาน แหล่งข่าว หรือบุคคล<br>
                                                <input type="checkbox" class="form-check-input" name="note[]" value="อื่นๆ" id="note7" <?= $nt8; ?>>
                                                อื่นๆ
                                                <div class="row-2 form-group">
                                                    <input type="text" class="form-control form-control-sm border border-dark" name="txt_note" id="txt_note" placeholder="อื่นๆ" value="<?= $nt9; ?>">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <!-- ชื่อผู้ให้เหตุผล -->
                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align:right"></p>
                                    </div>
                                    <div class="col form-group">
                                        <div class="row align-items-start">
                                            <div class="col col-2" style="padding-top: 5px;">
                                                <p style="text-align:right">ผู้ขอ:</p>
                                            </div>
                                            <?php
                                            $req = "";
                                            if ($requester == "") $req = $_SESSION['fullname'];
                                            else $req = $requester;
                                            ?>
                                            <div class="col form-group">
                                                <input type="text" name="requester" class="form-control form-control-sm border border-dark" id="requester" placeholder="ผู้ขอ" value="<?= $req; ?>" readonly>
                                            </div>
                                        </div>
                                        <!-- ตำแหน่ง -->
                                        <div class="row align-items-start">
                                            <div class="col col-2" style="padding-top: 5px;">
                                                <p style="text-align: right;">ตำแหน่ง: </p>
                                            </div>
                                            <div class="col form-group">
                                                <input type="text" name="position" class="form-control form-control-sm border border-dark" id="position" placeholder="ตำแหน่ง" value="<?= $_SESSION['position']; ?>" required readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <!-- คำขึ้นต้น/หน่วยรับ -->
                            <div class="row align-items-start">
                                <div class="col col-2">
                                    <p style="text-align:right">คำขึ้นต้น/หน่วยรับ:</p>
                                </div>
                                <div class="col form-group">
                                    <input type="text" name="to" class="form-control form-control-sm border border-dark" id="to" placeholder="หน่วยรับ" value="<?= $to_dep; ?>" required>
                                </div>
                            </div>

                            <!-- ผู้ลงนาม -->
                            <div class="row align-items-start">
                                <div class="col col-2" style="padding-top: 5px;">
                                    <p style="text-align:right">ผู้ลงนาม:</p>
                                </div>
                                <div class="col form-group">
                                    <input type="text" name="signer" class="form-control form-control-sm border border-dark" id="signer" placeholder="ผู้ลงนาม" value="<?= $signer; ?>" required>
                                </div>
                            </div>

                            <?php
                            if ($_GET['type'] == "normal") {
                            ?>
                                <!-- ผู้ขอ -->
                                <div class="row align-items-start">
                                    <div class="col col-2" style="padding-top: 5px;">
                                        <p style="text-align:right">ผู้ขอ:</p>
                                    </div>
                                    <?php
                                    $req = "";
                                    if ($requester == "") $req = $_SESSION['fullname'];
                                    else $req = $requester;
                                    ?>
                                    <div class="col form-group">
                                        <input type="text" name="requester" class="form-control form-control-sm border border-dark" id="requester" placeholder="ผู้ขอ" value="<?= $req; ?>" readonly>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            if ($_GET['type'] == 'normal') {
                            ?>
                                <div class="row align-items-start">
                                    <div class="col col-2" style="padding-top: 5px;">
                                        <p style="text-align:right">หมายเหตุ:</p>
                                    </div>
                                    <div class="col form-group">
                                        <input type="text" name="note" class="form-control form-control-sm border border-dark" id="note" value="<?= $note; ?>" placeholder="หมายเหตุ">
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <?php
                            if ($id == "") {
                            ?>
                                <button type="submit" class="btn btn-outline-primary">บันทึก</button>
                                <button type="reset" class="btn btn-outline-danger bt-reset">ล้าง</button>
                            <?php
                            } else {
                            ?>
                                <button type="submit" class="btn btn-outline-primary">บันทึก</button>
                            <?php
                            }
                            ?>
                        </div>
                    </form>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary bt-result" data-toggle="modal" data-target="#resultModal" data-backdrop="static" data-keyboard="false" hidden>
        </button>

        <!-- Modal -->
        <div class="modal fade" id="resultModal" tabindex="-1" role="dialog" aria-labelledby="resultModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <?php
                        if ($_GET['type'] == 'normal')
                            echo "<h5 class='modal-title alert alert-info' id='resultModalLabel'></h5>";
                        elseif ($_GET['type'] == 'secret1')
                            echo "<h5 class='modal-title alert alert-primary' id='resultModalLabel'></h5>";
                        elseif ($_GET['type'] == 'secret2')
                            echo "<h5 class='modal-title alert alert-warning' id='resultModalLabel'></h5>";
                        elseif ($_GET['type'] == 'secret3')
                            echo "<h5 class='modal-title alert alert-danger' id='resultModalLabel'></h5>";
                        ?>
                        <button type="button" class="close bt-close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body ">
                        <div class="container">
                            <div class="row border border-secondary">
                                <div class="col-3 border border-secondary text-right">ชั้นความเร็ว: </div>
                                <div class="col urgent border border-secondary text-left">Column</div>
                                <div class="w-100"></div>
                                <div class="col-3 border border-secondary text-right">ชนิดหนังสือ: </div>
                                <div class="col type_doc border border-secondary text-left">Column</div>
                                <div class="w-100"></div>
                                <div class="col-3 border border-secondary text-right">ส่วนราชการเจ้าของเรื่อง:</div>
                                <div class="col from_dep border border-secondary text-left">Column</div>
                                <div class="w-100"></div>
                                <div class="col-3 border border-secondary text-right">เรื่อง: </div>
                                <div class="col sub border border-secondary text-left">Column</div>
                                <?php
                                if ($_GET['type'] != 'normal') {
                                ?>
                                    <div class="w-100"></div>
                                    <div class="col-3 border border-secondary text-right">เหตุผล: </div>
                                    <div class="col notes border border-secondary text-left">Column</div>
                                    <div class="w-100"></div>
                                    <div class="col-3 border border-secondary text-right">ผู้ขอ: </div>
                                    <div class="col req border border-secondary text-left">Column</div>
                                    <div class="w-100"></div>
                                    <div class="col-3 border border-secondary text-right">ตำแหน่ง: </div>
                                    <div class="col pos border border-secondary text-left">Column</div>
                                <?php
                                }

                                ?>
                                <div class="w-100"></div>
                                <div class="col-3 border border-secondary text-right">คำขึ้นต้น/หน่วยรับ:</div>
                                <div class="col to_dep border border-secondary text-left">Column</div>
                                <div class="w-100"></div>
                                <div class="col-3 border border-secondary text-right">ผู้ลงนาม:</div>
                                <div class="col signer border border-secondary text-left">Column</div>
                                <div class="w-100"></div>
                                <?php
                                if ($_GET['type'] == "normal") {
                                ?>
                                    <div class="col-3 border border-secondary text-right">ผู้ขอ:</div>
                                    <div class="col req border border-secondary text-left">Column</div>
                                    <div class="w-100"></div>
                                    <div class="col-3 border border-secondary text-right">หมายเหตุ:</div>
                                    <div class="col notes border border-secondary text-left">Column</div>
                                    <div class="w-100"></div>
                                <?php
                                }
                                ?>
                                <div class="col-3 border border-secondary text-right">เวลา: </div>
                                <div class="col create_date border border-secondary text-left">Column</div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-info bt-close btn-block btn-lg" data-dismiss="modal">ปิด</button>
                    </div>
                </div>
            </div>
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
<script>
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
    $(function() {
        $(".frm_book").submit(function(e) {
            e.preventDefault();
            var data_book = $(this).attr('data-book');
            var id = $(this).attr('data-id');
            if (id == "") url = "save_doc.php?type=" + data_book;
            else url = "save_doc.php?type=" + data_book + "&id=" + id;
            var data = $(this).serialize();
            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(result) {
                    obj = $.parseJSON(result);

                    var id = obj[0]['id'];
                    var num_doc = obj[0]['num_doc'];
                    var urgent = obj[0]['urgent'];
                    var type_doc = obj[0]['type_doc'];
                    var from_dep = obj[0]['from_dep'];
                    var sub = obj[0]['subject'];
                    var to_dep = obj[0]['to_dep'];
                    var signer = obj[0]['signer'];
                    var req = obj[0]['req'];
                    var note = obj[0]['note'];
                    var create_date = obj[0]['create_date'];

                    if (obj[0]['sts'] == '1') {
                        var detail = obj[0]['detail'];
                        var name = obj[0]['name'];
                        var pos = obj[0]['pos'];

                        $('.detail').text(detail);
                        $('.pos').text(pos);
                    }

                    var html = "<ul>";
                    var other = "";
                    const nt = note.split(",");
                    if(note.search('อื่นๆ') > 0) {
                        other = "<ul><li>"+nt[nt.length-1]+"</li></ul>";
                    }
                    for(i=0; i<nt.length; i++) {
                        if(nt[i]!="อื่นๆ")
                            html += "<li>"+nt[i]+"</li>";
                        else {
                            html += "<li>"+nt[i]+other+"</li>";
                            break;
                        }
                    }
                    html += "</ul>";
                    $('.modal-title').html("หนังสือเลขที่: กห 0207/ <font color='black'><b><u>" + num_doc + "</u></b></font>");
                    //$('.num').text(num_doc);
                    $('.urgent').text(urgent);
                    $('.type_doc').text(type_doc);
                    $('.from_dep').text(from_dep);
                    $('.sub').text(sub);
                    $('.to_dep').text(to_dep);
                    $('.signer').text(signer);
                    $('.req').text(req);
                    $('.notes').html(html);
                    $('.create_date').html(create_date);

                    $('.bt-result').click();

                    Toast.fire({
                        icon: 'success',
                        title: "<b><u>บันทึกข้อมูลเรียบร้อย</u></b>"
                    })

                    //alert(id + "\n" + sub + "\n" + from + "\n" + to + "\n" + name + "\n" + send_date + "\n");*/

                }
            });
        });

        $(".bt-close").click(function() {
            window.location.reload();
        })
    });

    function subNote(note) {
        document.getElementsByTagName('li').text();
    }
</script>

</html>