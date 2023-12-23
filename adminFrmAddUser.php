<?php
ob_start();
session_start();
require_once('./config/connect_database.php');
if (!isset($_SESSION['userType']) || $_SESSION['userType'] != 'Admin') header('Location: login.php');
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
                    <a class="nav-link active" href="adminFrmAddUser.php">เพิ่มผู้ใช้</a>
                    <a class="nav-link" href="adminUserList.php">รายชื่อผู้ใช้</a>
                    <a class="nav-link" href="viewContact.php">รายการผู้ติดต่อ</a>
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
                        <form class="frm_add_user">
                            <div class="card-body">
                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align:right">เลขผู้ใช้:</p>
                                    </div>
                                    <div class="col form-group" style="text-align: left;">
                                        <input type="text" name="cardid" class="form-control form-control-sm border border-dark" id="cardid" placeholder="เลขบัตรประชาชน" style="width: 50%; font-size:12px; height:fit-content;" maxlength="13" value="<?= getUserID(); ?>" required readonly>
                                    </div>
                                </div>

                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align:right">คำนำหน้า:</p>
                                    </div>
                                    <div class="col form-group" style="text-align: left;">
                                        <input type="text" name="title" class="form-control form-control-sm border border-dark" id="title" placeholder="คำนำหน้า" style="width: 50%; font-size:12px; height:fit-content;" required>
                                    </div>
                                </div>

                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align:right">ชื่อ:</p>
                                    </div>
                                    <div class="col form-group" style="text-align: left;">
                                        <input type="text" name="name" class="form-control form-control-sm border border-dark" id="name" placeholder="ชื่อ" style="width: 50%; font-size:12px; height:fit-content;" required>
                                    </div>
                                </div>


                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align:right">นามสกุล:</p>
                                    </div>
                                    <div class="col form-group" style="text-align: left;">
                                        <input type="text" name="surname" class="form-control form-control-sm border border-dark" id="surname" placeholder="นามสกุล" style="width: 50%; font-size:12px; height:fit-content;" required>
                                    </div>
                                </div>

                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align:right">ตำแหน่ง:</p>
                                    </div>
                                    <div class="col form-group" style="text-align: left;">
                                        <input type="text" name="pos" class="form-control form-control-sm border border-dark" id="pos" placeholder="ตำแหน่ง" style="width: 50%; font-size:12px; height:fit-content;" required>
                                    </div>
                                </div>

                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align: right;">ประเภทผู้ใช้งาน:</p>
                                    </div>
                                    <div class="col form-check" style="text-align: left;">
                                        <input type="radio" name="usertype" value="1" checked>
                                        <font size="2px">ผู้ใช้ทั่วไป</font><br>
                                        <input type="radio" name="usertype" value="0">
                                        <font size="2px">Admin</font>
                                    </div>
                                </div>

                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align:right">Username:</p>
                                    </div>
                                    <div class="col form-group" style="text-align: left;">
                                        <input type="text" name="username" class="form-control form-control-sm border border-dark" id="username" placeholder="Username" style="width: 50%; font-size:12px; height:fit-content;" required>
                                    </div>
                                </div>

                                <div class="row align-items-start">
                                    <div class="col col-3">
                                        <p style="text-align:right">Password:</p>
                                    </div>
                                    <div class="col form-group" style="text-align: left;">
                                        <input type="password" name="pwd" class="form-control form-control-sm border border-dark" id="pwd" placeholder="Password" style="width: 50%; font-size:12px; height:fit-content;" required>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-primary">บันทึก</button>
                                <button type="reset" class="btn btn-outline-danger bt-reset">ล้าง</button>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </center>
        <footer class="alert alert-primary">
            <strong>Copyright &copy; 2014-2023 <a href="#" style="color:black;">ระบบออกเลขที่หนังสือ กห 0207</a></strong>
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

        function showAlertError(str) {
            Swal.fire({
                title: str,
                text: "",
                icon: "error"
            });
        }

        $('.frm_add_user').submit(function(e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                url: "adminadduser.php",
                type: "POST",
                data: data,
                success: function(res) {
                    if (res == "dupid") {
                        showAlertError('มีเลขบัตรประชาชนซ้ำ');
                    } else if (res == "pass") {
                        Swal.fire('เพิ่มข้อมูลเรียบร้อย', '', 'success').then(function(res) {
                            //$(".bt-reset").click();
                            if (res.value) {
                                window.location.reload();
                            }
                        });
                        //window.location.reload();

                    } else if (res == "dupuser") {
                        showAlertError('กรุณาเปลี่ยน Username');
                    } else if (res == "lenpass") {
                        showAlertError('Password ต้องมีความยาวอย่างน้อย 8 ตัวอักษร');
                    }
                }
            });

        });
    });
</script>

</html>