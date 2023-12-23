<?php
ob_start();
session_start();
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) header('Location: login.php');
require_once('./config/connect_database.php');
$user = findUser($_SESSION['id']);
if ($user['user_type'] == '0') {
    $ch0 = 'checked';
    $ch1 = '';
} else {
    $ch0 = '';
    $ch1 = 'checked';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขผู้ใช้งาน</title>

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

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">

    <style>
        @font-face {
            font-family: 'Mali';
            src: url('./fonts/Mali-Regular.ttf') format('truetype'),
                url('./fonts/Mali-Bold.ttf') format('truetype'),
                url('./fonts/Mali-Italic.ttf') format('truetype');
        }

        div {
            font-family: 'Mali';
        }

        p {
            font-family: 'Mali';
            font-size: 13px;
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
                    <?php
                    if ($_SESSION['userType'] == 'Admin') {
                    ?>
                        <a class="nav-link active" href="adminFrmAddUser.php">เพิ่มผู้ใช้</a>
                        <a class="nav-link" href="adminUserList.php">รายชื่อผู้ใช้</a>
                        <a class="nav-link" href="viewContact.php">รายการผู้ติดต่อ</a>
                    <?php
                    }
                    ?>
                    <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">ออกจากระบบ</a>
                </div>
            </div>
            <a href='UserEdit.php' class='link-dark'><?= $_SESSION['fullname']; ?></a>
        </div>
    </nav><br>
    <div class="container align-items-center justify-content-center">
        <center>
            <div class="content" style="width: 50%;">
                <!-- Main content -->
                <section class="content">
                    <div class='card card-primary' style='width: 100%;'>
                        <div class="card-header">
                            <h3 class="card-title">
                                เพิ่มผู้ใช้ใหม่
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="frm_edit_user">
                            <div class="card-body">
                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align:right">เลขผู้ใช้:</p>
                                    </div>
                                    <div class="col form-group" style="text-align: left;">
                                        <input type="text" name="cardid" class="form-control form-control-sm border border-dark" id="cardid" placeholder="เลขบัตรประชาชน" style="width: 50%; font-size:12px; height:fit-content;" maxlength="13" value="<?= $user['userID']; ?>" disabled required>
                                    </div>
                                </div>

                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align:right">คำนำหน้า:</p>
                                    </div>
                                    <div class="col form-group" style="text-align: left;">
                                        <input type="text" name="title" class="form-control form-control-sm border border-dark" id="title" placeholder="คำนำหน้า" style="width: 50%; font-size:12px; height:fit-content;" value="<?= $user['title']; ?>" disabled required>
                                    </div>
                                </div>

                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align:right">ชื่อ:</p>
                                    </div>
                                    <div class="col form-group" style="text-align: left;">
                                        <input type="text" name="name" class="form-control form-control-sm border border-dark" id="name" placeholder="ชื่อ" style="width: 50%; font-size:12px; height:fit-content;" value="<?= $user['name']; ?>" disabled required>
                                    </div>
                                </div>


                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align:right">นามสกุล:</p>
                                    </div>
                                    <div class="col form-group" style="text-align: left;">
                                        <input type="text" name="surname" class="form-control form-control-sm border border-dark" id="surname" placeholder="นามสกุล" style="width: 50%; font-size:12px; height:fit-content;" value="<?= $user['surname']; ?>" disabled required>
                                    </div>
                                </div>

                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align:right">ตำแหน่ง:</p>
                                    </div>
                                    <div class="col form-group" style="text-align: left;">
                                        <input type="text" name="pos" class="form-control form-control-sm border border-dark" id="pos" placeholder="ตำแหน่ง" style="width: 50%; font-size:12px; height:fit-content;" value="<?= $user['position']; ?>" disabled required>
                                    </div>
                                </div>

                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align: right;">ประเภทผู้ใช้งาน:</p>
                                    </div>
                                    <div class="col form-check" style="text-align: left;">
                                        <input type="radio" name="usertype" id="usertype1" value="1" disabled <?= $ch1; ?>>
                                        <font size="2px">ผู้ใช้ทั่วไป</font><br>
                                        <input type="radio" name="usertype" id="usertype2" value="0" disabled <?= $ch0; ?>>
                                        <font size="2px">Admin</font>
                                    </div>
                                </div>

                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align:right">Username:</p>
                                    </div>
                                    <div class="col form-group" style="text-align: left;">
                                        <input type="text" name="username" class="form-control form-control-sm border border-dark" id="username" placeholder="Username" style="width: 50%; font-size:12px; height:fit-content;" value="<?= $user['username']; ?>" disabled required>
                                    </div>
                                </div>

                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align:right">Password:</p>
                                    </div>
                                    <div class="col form-group" style="text-align: left;">
                                        <input type="password" name="pwd" class="form-control form-control-sm border border-dark" id="pwd" placeholder="Password" style="width: 50%; font-size:12px; height:fit-content;" disabled>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-primary" id="bt-save" disabled>บันทึก</button>
                                <button type="button" class="btn btn-outline-success bt-edit" id="bt-edit">แก้ไข</button>
                                <button type="button" class="btn btn-outline-danger bt-cancel" id="bt-cancel">ยกเลิก</button>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </center>
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2023 <a href="#">ระบบออกเลขที่หนังสือ กห 0207</a></strong>

            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
    </div>
</body>

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
<script src="./bootstrap/js/bootstrap.min.js"></script>

<script>
    $(function() {
        function disInput(b) {
            document.getElementById('cardid').disabled = b;
            document.getElementById('title').disabled = b;
            document.getElementById('name').disabled = b;
            document.getElementById('surname').disabled = b;
            document.getElementById('pos').disabled = b;
            document.getElementById('pwd').disabled = b;
            document.getElementById('bt-save').disabled = b;
            document.getElementById('bt-edit').disabled = true;
        }

        function showAlertError(str) {
            Swal.fire({
                title: str,
                text: "",
                icon: "error"
            });
        }

        $('.bt-edit').click(function() {
            disInput(false);
            document.getElementById('bt-edit').disabled = true;

        });

        $('.bt-cancel').click(function() {
            disInput(true);
            document.getElementById('bt-edit').disabled = false;
        });

        $('.frm_edit_user').submit(function(e) {
            e.preventDefault();
            document.getElementById('bt-save').disabled = true;
            document.getElementById('bt-edit').disabled = false;
            var data = $(this).serialize();
            $.ajax({
                url: "UserEditSave.php",
                type: "POST",
                data: data,
                success: function(res) {
                    if (res == "dupid") {
                        showAlertError('หมายเลขบัตรประชาชนซ้ำกับผู้อื่น');
                    } else if (res == "pass") {
                        Swal.fire('แก้ไขข้อมูลเรียบร้อย', '', 'success').then(function() {
                            disInput(true);
                            document.getElementById('bt-edit').disabled = false;
                            window.location.reload();
                        });
                    } else if (res == "dupcardid") {
                        showAlertError('กรุณาใช้ Username อื่น');
                    } else if (res == "lencardid") {
                        showAlertError('หมายเลขบัตรประชาชนต้องยาว 13 หลัก');
                    } else if (res == "lenpwd") {
                        showAlertError('Password ต้องมีความยาวอย่างน้อย 8 ตัวอักษร');
                        disInput(false);
                        document.getElementById('bt-edit').disabled = true;
                    }
                }
            });

        });
    });
</script>

</html>