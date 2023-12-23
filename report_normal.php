<?php
ob_start();
session_start();
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) header('Location: login.php');
if (!isset($_GET['type'])) $_GET['type'] = "";
if (!isset($_GET['year'])) $_GET['year'] = date('Y');
require_once("./config/connect_database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รายงานเอกสารปกติ</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="./plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="./plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="./dist/css/adminlte.min.css">

    <link rel="stylesheet" href="./datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="./datatable/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./datatable/buttons.dataTables.min.css">

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

        span {
            font-family: 'THSarabun';
        }

        a {
            font-family: 'THSarabun';
            font-size: 18px;
        }

        tr {
            font-size: 16px;
        }
    </style>

</head>

<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
        <!-- Left navbar links -->
        <ul class="navbar-nav" id="navs">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="font-size: 25px;"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="./" class="nav-link" style="font-size: 25px;">หน้าแรก</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="contact.php" class="nav-link" style="font-size: 25px;">ติดต่อเรา</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="logout.php" class="nav-link" style="font-size: 25px;">ออกจากระบบ</a>
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
                                <a href="./report_normal.php" class="nav-link active">
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
                        <h1 class="m-0">
                            รายงาน<u>เอกสารปกติ</u>
                        </h1>

                        <select name="years" id="years" class="form-control years">
                            <?php
                            $opt = LoopYear("doc_normal");
                            foreach ($opt as $op) {
                                if ($op['years'] == $_GET['year']) $sel = "selected";
                                else $sel = "";
                            ?>
                                <option value="<?= $op['years'] ?>" <?= $sel; ?>><?= $op['years'] + 543; ?></option>
                            <?php
                            }
                            ?>


                        </select>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">


            <table id="tbreport" class="display" style="width: 100%;">
                <thead>
                    <tr>
                        <th>เลขที่ส่ง</th>
                        <th>ชนิดหนังสือ</th>
                        <th>ชั้นความลับ</th>
                        <th>ชั้นความเร็ว</th>
                        <th>จาก</th>
                        <th>ถึง</th>
                        <th>เรื่อง</th>
                        <th>ลงชื่อ</th>
                        <th>ผู้ขอ</th>
                        <th>หมายเหตุ</th>
                        <th>วันที่ออกเลข</th>
                        <?php
                        if ($_SESSION['userType'] == 'Admin') echo "<th width='100'></th>";
                        ?>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $year = $_GET['year'];
                    $table = report("doc_normal", $year);
                    foreach ($table as $tb) {
                    ?>
                        <tr class="t<?= $tb['id']; ?>">
                            <td align="center"><?= $tb['num_doc']; ?>/ <?= getYear2Digit($tb['create_date']); ?></td>
                            <td><?= $tb['type_doc']; ?></td>
                            <td></td>
                            <td><?= $tb['urgent']; ?></td>
                            <td><?= $tb['from_dep']; ?></td>
                            <td><?= $tb['to_dep']; ?></td>
                            <td><?= $tb['subject']; ?></td>
                            <td><?= $tb['signer']; ?></td>
                            <td><?= $tb['requester']; ?></td>
                            <td><?= $tb['note']; ?></td>
                            <td><?= toDateThai($tb['create_date']); ?></td>
                            <?php
                            if ($_SESSION['userType'] == 'Admin') {
                                if ($tb['status'] == 'ลบ') {
                            ?>
                                    <td align="center" style="vertical-align: middle;">
                                        <font style="color:red; font-size:20px;"><b>ลบแล้ว</b></font>
                                    </td>
                                <?php
                                } else {
                                ?>
                                    <td align="center">
                                        <button type="button" class="btn btn-info btn-sm btn-edit" data-id="<?= $tb['id']; ?>" data-num_doc="<?= $tb['num_doc']; ?>" onclick="edit('<?= $tb['id']; ?>')">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                            </svg>
                                        </button> |
                                        <button type="button" class="btn btn-danger btn-sm btn-del" data-id="<?= $tb['id']; ?>" data-num_doc="<?= $tb['num_doc']; ?>" onclick="del('<?= $tb['id']; ?>', '<?= $tb['num_doc']; ?> ')">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                                <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                            </svg>
                                        </button>
                                    </td>
                            <?php
                                }
                            }
                            ?>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>เลขที่ส่ง</th>
                        <th>ชนิดหนังสือ</th>
                        <th>ชั้นความลับ</th>
                        <th>ชั้นความเร็ว</th>
                        <th>จาก</th>
                        <th>ถึง</th>
                        <th>เรื่อง</th>
                        <th>ลงชื่อ</th>
                        <th>ผู้ขอ</th>
                        <th>หมายเหตุ</th>
                        <th>วันที่ออกเลข</th>
                        <?php
                        if ($_SESSION['userType'] == 'Admin') echo "<th width='100'></th>";
                        ?>
                    </tr>
                </tfoot>
            </table>



            <center>
                <button class="btn btn-secondary btn-sm" style="width: 250px; font-size:25px" onclick="window.open('print.php?type=normal&year='+$('.years').val())" target="popup">Print</button>
            </center>

        </section>
        <br>
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


</body>
<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="./plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="./plugins/toastr/toastr.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>

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

<script src="./datatable/jquery.dataTables.min.js"></script>
<script src="./datatable/dataTables.bootstrap5.min.js"></script>
<script src="./datatable/dataTables.buttons.min.js"></script>
<script src="./datatable/jszip.min.js"></script>
<script src="./datatable/pdfmake.min.js"></script>
<script src="./datatable/vfs_fonts.js"></script>
<script src="./datatable/buttons.html5.min.js"></script>
<script src="./datatable/buttons.print.min.js"></script>
<script src="./js/vfs_fonts.js"></script>

<script>
    $(function() {
        $('#tbreport').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf',
            ],
            "language": {
                "sProcessing": "กำลังประมวลผล...",
                "sLengthMenu": "แสดง _MENU_ บันทึก",
                "sZeroRecords": "ไม่พบผลลัพธ์",
                "sEmptyTable": "ไม่มีข้อมูลในตาราง",
                "sInfo": "แสดงบันทึกตั้งแต่ _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
                "sInfoEmpty": "แสดงบันทึกตั้งแต่ 0 ถึง 0 จากทั้งหมด 0 รายการ",
                "sInfoFiltered": "(พบรายการทั้งหมด _MAX_ รายการ)",
                "sInfoPostFix": "",
                "sSearch": "ค้นหา:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "กำลังโหลด...",
                "oPaginate": {
                    "sFirst": "หน้าแรก",
                    "sLast": "หน้าสุดท้าย",
                    "sNext": "หน้าถัดไป",
                    "sPrevious": "ถอยหลัง"
                },
                "oAria": {
                    "sSortAscending": ": เปิดใช้งานเพื่อเรียงลำดับคอลัมน์จากน้อยไปหามาก",
                    "sSortDescending": ": เปิดใช้งานเพื่อเรียงลำดับคอลัมน์จากมากไปน้อย"
                }
            }
        });



        $('.btn-del').click(function() {
            alert('Delete');
        });

        $(".years").on("change", function() {
            var url = window.location.pathname;
            window.location.href = url + "?year=" + $(".years").val();
        });
    });

    function edit(id) {
        window.location.href = "frm_book.php?type=normal&id=" + id;
    }

    function del(id, num_doc) {
        Swal.fire({
            text: "คุณต้องการหนังสือลับเลขที่ " + num_doc,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "ยืนยันการลบ",
            cancelButtonText: "ยกเลิกการลบ."
        }).then(function(result) {
            if (result.value) {
                $.get('report_del.php?type=normal&id=' + id, function(res) {
                    if (res == '0') {
                        Swal.fire('ดำเนินการลบข้อมูลเรียบร้อย', '', 'success').then(function() {
                            $('tr.t' + id).remove();
                        })
                    } else {
                        Swal.fire('เกิดข้อผิดพลาด', 'error', 'error');
                    }
                });
            }
        })
    }
</script>

</html>