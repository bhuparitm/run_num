<?php
ob_start();
session_start();
require_once('./config/connect_database.php');
if (!isset($_SESSION['userType']) || $_SESSION['userType'] != 'Admin') header('Location: login.php');
if (!isset($_GET) || empty($_GET))  header('Location: login.php');
else {
    $id = $_GET['id'];

    $user = findUser($id);
    $fullname = $user['title'] . $user['name'] . ' ' . $user['surname'];
    if ($user['user_type'] == '0') {
        $ch0 = 'checked';
        $ch1 = '';
    } else {
        $ch0 = '';
        $ch1 = 'checked';
    }
}
?>
<div class="modal-content" style="width: 700px; text-align:center;">
    <div class="modal-header alert alert-primary d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
        </svg>
        <div class="title-user">
            &nbsp;&nbsp;แก้ไขข้อมูล <?= $fullname; ?>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form class="frm_edit_user" method="POST" action="adminSaveEditUser.php?id=<?= $id; ?>" data-id="<?= $id; ?>">
            <div class="card-body">
                <div class="row align-items-start">
                    <div class="col col-3">
                        <p style="text-align:right">เลขบัตรประชาชน:</p>
                    </div>
                    <div class="col form-group" style="text-align: left;">
                        <input type="text" name="cardid" class="form-control form-control-sm border border-dark" id="cardid" placeholder="เลขบัตรประชาชน" style="width: 50%; font-size:12px; height:fit-content;" maxlength="13" required value="<?= $user['userID']; ?>">
                    </div>
                </div>

                <div class="row align-items-start">
                    <div class="col col-3">
                        <p style="text-align:right">คำนำหน้า:</p>
                    </div>
                    <div class="col form-group" style="text-align: left;">
                        <input type="text" name="title" class="form-control form-control-sm border border-dark" id="title" placeholder="คำนำหน้า" style="width: 50%; font-size:12px; height:fit-content;" required value="<?= $user['title']; ?>">
                    </div>
                </div>

                <div class="row align-items-start">
                    <div class="col col-3">
                        <p style="text-align:right">ชื่อ:</p>
                    </div>
                    <div class="col form-group" style="text-align: left;">
                        <input type="text" name="name" class="form-control form-control-sm border border-dark" id="name" placeholder="ชื่อ" style="width: 50%; font-size:12px; height:fit-content;" value="<?= $user['name']; ?>" required>
                    </div>
                </div>


                <div class="row align-items-start">
                    <div class="col col-3">
                        <p style="text-align:right">นามสกุล:</p>
                    </div>
                    <div class="col form-group" style="text-align: left;">
                        <input type="text" name="surname" class="form-control form-control-sm border border-dark" id="surname" placeholder="นามสกุล" style="width: 50%; font-size:12px; height:fit-content;" value="<?= $user['surname']; ?>" required>
                    </div>
                </div>

                <div class="row align-items-start">
                    <div class="col col-3">
                        <p style="text-align:right">ตำแหน่ง:</p>
                    </div>
                    <div class="col form-group" style="text-align: left;">
                        <input type="text" name="pos" class="form-control form-control-sm border border-dark" id="pos" placeholder="ตำแหน่ง" style="width: 50%; font-size:12px; height:fit-content;" value="<?= $user['position']; ?>" required>
                    </div>
                </div>

                <div class="row align-items-start">
                    <div class="col col-3">
                        <p style="text-align: right;">ประเภทผู้ใช้งาน:</p>
                    </div>
                    <div class="col form-check" style="text-align: left;">
                        <input type="radio" name="usertype" value="1" <?= $ch1; ?>>
                        <font size="2px">ผู้ใช้ทั่วไป</font><br>
                        <input type="radio" name="usertype" value="0" <?= $ch0; ?>>
                        <font size="2px">Admin</font>
                    </div>
                </div>

                <div class="row align-items-start">
                    <div class="col col-3">
                        <p style="text-align:right">Username:</p>
                    </div>
                    <div class="col form-group" style="text-align: left;">
                        <input type="text" name="username" class="form-control form-control-sm border border-dark" id="username" placeholder="Username" style="width: 50%; font-size:12px; height:fit-content;" value="<?= $user['username']; ?>" required>
                    </div>
                </div>

                <div class="row align-items-start">
                    <div class="col col-3">
                        <p style="text-align:right">Password:</p>
                    </div>
                    <div class="col form-group" style="text-align: left;">
                        <input type="password" name="pwd" class="form-control form-control-sm border border-dark" id="pwd" placeholder="Password" style="width: 50%; font-size:12px; height:fit-content;">
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-outline-primary">แก้ไข</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(function() {

        function showAlertError(str) {
            Swal.fire({
                title: str,
                text: "",
                icon: "error"
            });
        }
        $('.frm_edit_user').submit(function(e) {
            e.preventDefault();
            var id = $(this).attr('data-id');
            var data = $(this).serialize();
            $.ajax({
                url: "adminSaveEditUser.php?id=" + id,
                type: "POST",
                data: data,
                success: function(res) {
                    if (res == "dupuser") {
                        showAlertError("Username ซ้ำ");
                    } else if (res == "dupcardid") {
                        showAlertError("เลขบัตรประชาชนซ้ำ");
                    } else if (res == "pass") {
                        Swal.fire('แก้ไขข้อมูลเรียบร้อย', '', 'success').then(function() {
                            window.location.reload();
                        });
                    } else if(res == "lenpass") {
                        showAlertError("Password ต้องมีความยาวอย่างน้อย 8 ตัวอักษร");
                    }
                }
            });
        });
    });
</script>