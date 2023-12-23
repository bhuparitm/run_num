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
    if ($user['user_type'] == '0') $usertype = 'ผู้ดูแลระบบ';
    elseif ($user['user_type'] == '1') $usertype = 'ผู้ใช้ทั่วไป';
}
?>
<div class="modal-content" style="width: 700px; text-align:center;">
    <div class="modal-header alert alert-danger d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
        </svg>
        <div class="title-user">
            &nbsp;&nbsp;รายละเอียดผู้ใช้งาน <?= $fullname; ?>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <table class="table">
            <tbody>
                <tr>
                    <th style="text-align: right;">เลขบัตรประชาชน</th>
                    <td align="left"><?= $user['userID']; ?></td>
                </tr>
                <tr>
                    <th style="text-align: right;">ชื่อ</th>
                    <td align="left"><?= $fullname; ?></td>
                </tr>
                <tr>
                    <th style="text-align: right;">ตำแหน่ง</th>
                    <td align="left"><?= $user['position']; ?></td>
                </tr>
                <tr>
                    <th style="text-align: right;">Username</th>
                    <td align="left"><?= $user['username']; ?></td>
                </tr>
                <tr>
                    <th style="text-align: right;">password</th>
                    <td align="left"><?= $user['pwd']; ?></td>
                </tr>
                <tr>
                    <th style="text-align: right;">ประเภทผู้ใช้</th>
                    <td align="left"><?= $usertype; ?></td>
                </tr>
                <tr>
                    <th style="text-align: right;">วันที่สร้าง</th>
                    <td align="left"><?= toDateThai($user['create_date']); ?></td>
                </tr>
                <tr>
                    <th style="text-align: right;">ผู้สร้าง</th>
                    <td align="left"><?= $user['create_by']; ?></td>
                </tr>
                <tr>
                    <th style="text-align: right;">วันที่อัพเดท</th>
                    <td align="left"><?= toDateThai($user['update_date']); ?></td>
                </tr>
                <tr>
                    <th style="text-align: right;">ผู้อัพเดท</th>
                    <td align="left"><?= $user['update_by']; ?></td>
                </tr>
            </tbody>
        </table>
        <div class="card-footer">
            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" aria-label="Close">ปิด</button>
        </div>
    </div>
</div>