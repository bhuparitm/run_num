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
                    <a class="nav-link active" aria-current="page" href="#">หน้าแรก</a>
                    <a class="nav-link" href="index.php">ออกเลขหนังสือ</a>
                    <a class="nav-link" href="adminFrmAddUser.php">เพิ่มผู้ใช้</a>
                    <a class="nav-link" href="adminUserList.php">รายชื่อผู้ใช้</a>
                    <a class="nav-link" href="viewContact.php">รายการผู้ติดต่อ</a>
                    <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">ออกจากระบบ</a>
                </div>
            </div>
            <a href='UserEdit.php' class='link-dark'><?= $_SESSION['fullname']; ?></a>
        </div>
    </nav><br><br>
    <div class="container align-items-center justify-content-center">
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
        <br><br>
        <footer class="alert alert-primary">
            <strong>Copyright &copy; 2014-2023 <a href="#" style="color:black;">ระบบออกเลขที่หนังสือ กห 0207</a></strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>
    </div>
</body>
<script src="./bootstrap/js/bootstrap.min.js"></script>

</html>