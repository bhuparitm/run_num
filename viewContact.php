<?php
ob_start();
session_start();
require_once('./config/connect_database.php');
if (!isset($_SESSION['userType']) || $_SESSION['userType'] != 'Admin') header('Location: login.php');
$clist = findContact("");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผู้ดูแลระบบ</title>

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
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

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="./fontawesome/css/fontawesome.css">

    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-1.13.8/e-2.2.2/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.11.0/r-2.5.0/rg-1.4.1/rr-1.4.1/sc-2.3.0/sb-1.6.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.css" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'Mali';
            src: url('./fonts/Mali-Regular.ttf') format('truetype'),
                url('./fonts/Mali-Bold.ttf') format('truetype'),
                url('./fonts/Mali-Italic.ttf') format('truetype');
        }

        th,
        tr,
        td {
            font-family: 'Mali';
            font-size: 12px;
        }

        div {
            font-family: 'Mali';
            font-size: 12px;
        }

        .nav-link {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <img src="./images/สนผ.png" alt="" width="100" height="85" class="d-inline-block align-text-top">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" aria-current="page" href="admin.php">หน้าแรก</a>
                    <a class="nav-link" href="index.php">ออกเลขหนังสือ</a>
                    <a class="nav-link" href="adminFrmAddUser.php">เพิ่มผู้ใช้</a>
                    <a class="nav-link" href="adminUserList.php">รายชื่อผู้ใช้</a>
                    <a class="nav-link active" href="viewContact.php">รายการผู้ติดต่อ</a>
                    <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">ออกจากระบบ</a>
                </div>
            </div>
            <a href='UserEdit.php' class='link-dark'><?= $_SESSION['fullname']; ?></a>
        </div>
    </nav><br>
    <div class="container align-items-center justify-content-center">
        <section class="content">
            <table id="clist" class="table table-striped" style="width:100%;">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>E-mail</th>
                        <th>รายละเอียด</th>
                        <th>วันที่ส่ง</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    foreach ($clist as $list) {
                        $i++;
                    ?>
                        <tr class="t<?= $list['id']; ?>">
                            <td><?= $i; ?></td>
                            <td><?= $list['email']; ?></td>
                            <td><?= $list['description']; ?></td>
                            <td><?= toDateThai($list['create_date']); ?></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm btn-del" onclick="del('<?= $list['id']; ?>')">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
        <br>
        <footer class="alert alert-primary">
            <strong>Copyright &copy; 2014-2023 <a href="#" style="color:black;">ระบบออกเลขที่หนังสือ กห 0207</a></strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
    </div>
</body>
<script src="./bootstrap/js/bootstrap.min.js"></script>

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

<script src="./datatable/dataTables.bootstrap5.min.js"></script>
<script src="./datatable/jquery.dataTables.min.js"></script>
<script src="./bootstrap/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-1.13.8/e-2.2.2/af-2.6.0/b-2.4.2/b-colvis-2.4.2/b-html5-2.4.2/b-print-2.4.2/cr-1.7.0/date-1.5.1/fc-4.3.0/fh-3.4.0/kt-2.11.0/r-2.5.0/rg-1.4.1/rr-1.4.1/sc-2.3.0/sb-1.6.0/sp-2.2.0/sl-1.7.0/sr-1.3.0/datatables.min.js"></script>

<script>
    $(function() {
        //var utable = $('#ulist').DataTable();
        $('#clist').DataTable({
            fixedHeader: true,

            language: {
                processing: "กทด.สนผ.กห.",
                search: "ค้นหา",
                lengthMenu: "แสดงที่ละ _MENU_ แถว",
                info: "หน้า _START_ ใน _END_ :จากทั้งหมด _TOTAL_ หน้า",
                infoEmpty: "ไม่มีข้อมูล",
                infoFiltered: "(กรองจากทั้งหมด _MAX_ รายการ)",
                infoPostFix: "",
                loadingRecords: "กำลังโหลด....",
                zeroRecords: "ไม่มีข้อมูล",
                paginate: {
                    first: "หน้าแรก",
                    previous: "<< กลับ: ",
                    next: " :ถัดไป >>",
                    last: "หน้าสุดท้าย"
                }
            }
        })
    });

    function del(id) {
        Swal.fire({
            text: "คุณต้องการลบข้อมูล ใช่หรือไม่ ",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "ยืนยันการลบ",
            cancelButtonText: "ยกเลิกการลบ"
        }).then(function(result) {
            if (result.value) {
                $.get('contactDel.php?id=' + id, function(res) {
                    if (res == 0) {
                        $('tr.t' + id).remove();
                        toastr.error('ลบข้อมูลเรียบร้อย.', 'แจ้งเตือน')
                    }
                })
            }
        });
    }
</script>

</html>