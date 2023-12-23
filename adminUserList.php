<?php
ob_start();
session_start();
require_once('./config/connect_database.php');
if (!isset($_SESSION['userType']) || $_SESSION['userType'] != 'Admin') header('Location: login.php');
$ulist = UserList();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ผู้ดูแลระบบ</title>

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
                    <a class="nav-link active" href="adminUserList.php">รายชื่อผู้ใช้</a>
                    <a class="nav-link" href="viewContact.php">รายการผู้ติดต่อ</a>
                    <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">ออกจากระบบ</a>
                </div>
            </div>
            <a href='UserEdit.php' class='link-dark'><?= $_SESSION['fullname']; ?></a>
        </div>
    </nav><br>

    <div class="container align-items-center justify-content-center">
        <section class="content">
            <table id="ulist" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>เลขผู้ใช้</th>
                        <th>คำนำหน้า</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>ตำแหน่ง</th>
                        <th>ประเภท</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($ulist as $list) {
                    ?>
                        <tr class="t<?= $list['id']; ?>" data-id="<?= $list['id']; ?>">
                            <td class="id" onclick="showDetail('<?= $list['id']; ?>')"><?= $list['userID']; ?></td>
                            <td class="id" onclick="showDetail('<?= $list['id']; ?>')"><?= $list['title']; ?></td>
                            <td class="id" onclick="showDetail('<?= $list['id']; ?>')"><?= $list['name']; ?></td>
                            <td class="id" onclick="showDetail('<?= $list['id']; ?>')"><?= $list['surname']; ?></td>
                            <td class="id" onclick="showDetail('<?= $list['id']; ?>')"><?= $list['position']; ?></td>
                            <td class="id" onclick="showDetail('<?= $list['id']; ?>')">
                                <?php
                                if ($list['user_type'] == '0') echo "ผู้ดูแลระบบ";
                                elseif ($list['user_type'] == '1') echo "ผู้ใช้ทั่วไป";
                                ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm btn-edit" data-id="<?= $list['id']; ?>" onclick="edit('<?= $list['id']; ?>')">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
                                        <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z" />
                                    </svg>
                                </button> |
                                <button type="button" class="btn btn-danger btn-sm btn-del" data-id="<?= $list['id']; ?>" onclick="del('<?= $list['id']; ?>')">
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

            <!-- Button trigger modal Edit Data-->
            <button type="button" class="btn btn-primary bt-modal-edit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" hidden></button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog dialog-edit"></div>
            </div>


            <!-- Button trigger modal Show DAta -->
            <button type="button" class="btn btn-primary bt-modal-show" data-bs-toggle="modal" data-bs-target="#staticBackdrop2" hidden></button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog dialog-data"></div>
            </div>
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
        $('#ulist').DataTable({
            fixedHeader: true,

            language: {
                processing: "กทด.สนผ.กห.",
                search: "ค้นหา",
                lengthMenu: "แสดงที่ละ _MENU_ แถว",
                info: "หน้า _START_ ใน _END_ หน้า ทั้งหมด _TOTAL_รายการ",
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

        $('#ulist').on('click', 'tbody tr', function() {
            utable.row(this).edit({
                buttons: [{
                        label: 'Cancel',
                        fn: function() {
                            this.close();
                        }
                    },
                    'Edit'
                ]
            });
        });

        $('.btn-delaa').click(function(e) {
            var id = $(this).attr('data-id');
            Swal.fire({
                text: "คุณต้องการลบข้อมูล ใช่หรือไม่ ",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "ยืนยันการลบ",
                cancelButtonText: "ยกเลิกการลบ"
            }).then(function(result) {
                if (result.value) {
                    $.get('adminDelUser.php?id=' + id, function(res) {
                        if (res == 0) {
                            $('tr.t' + id).remove();
                            toastr.error('ลบข้อมูลเรียบร้อย.', 'แจ้งเตือน')
                        }
                    })
                }
            });
        });

        $('.idd').click(function() {
            var id = $(this).attr('data-id');
            $('.dialog-data').load('./adminShowData.php?id=' + id);
            $('.bt-modal-show').click();
        });
    });

    function showDetail(id) {
        $('.dialog-data').load('./adminShowData.php?id=' + id);
        $('.bt-modal-show').click();
    }

    function edit(id) {
        $('.dialog-edit').load('./adminEditUser.php?id=' + id);
        $('.bt-modal-edit').click();
    }

    function del(id) {
        Swal.fire({
            text: "คุณต้องการลบข้อมูล ใช่หรือไม่ ",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "ยืนยันการลบ",
            cancelButtonText: "ยกเลิกการลบ"
        }).then(function(result) {
            if (result.value) {
                $.get('adminDelUser.php?id=' + id, function(res) {
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