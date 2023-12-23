<?php
ob_start();
session_start();
require_once('./config/connect_database.php');
if (!isset($_SESSION['userType']) || $_SESSION['userType'] != 'Admin') header('Location: login.php');
if (!isset($_GET) || empty($_GET))  header('Location: login.php');
else {
    $id = $_GET['id'];

    $user = findContact($id);
    $conn = connect();
    $row = mysqli_fetch_assoc($user);
}
?>
<div class="modal-content" style="width: 700px; text-align:center;">
    <div class="modal-header alert alert-danger d-flex align-items-center" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.-->
            <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
        </svg>
        <div class="title-user">
            <?= $row['email']; ?>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form class="frm_add_user">
            <div class="card-body">
                <div class="row align-items-start">
                    <div class="col col-3">
                        <p style="text-align:right">E-mail:</p>
                    </div>
                    <div class="col form-group" style="text-align: left;">
                        <input type="email" name="email" class="form-control form-control-sm border border-dark" id="email" placeholder="E-mail" style="width: 50%; font-size:12px; height:fit-content;" value="<?= $row['email']; ?>" required disabled>
                    </div>
                </div>

                <div class="row align-items-start">
                    <div class="col col-3">
                        <p style="text-align:right">รายละเอียด:</p>
                    </div>
                    <div class="col form-group" style="text-align: left;">
                        <textarea name="desc" id="desc" cols="35" rows="5" disabled><?= $row['description']; ?></textarea>
                    </div>
                </div>

                <div class=" row align-items-start">
                    <div class="col col-3">
                        <p style="text-align:right">วันที่:</p>
                    </div>
                    <div class="col form-group" style="text-align: left;">
                        <input type="text" name="create_date" class="form-control form-control-sm border border-dark" id="create_date" placeholder="ชื่อ" style="width: 50%; font-size:12px; height:fit-content;" value="<?= toDateThai($row['create_date']); ?>" disabled required>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </form>
    </div>
    <div class="card-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal" aria-label="Close">ปิด</button>
    </div>
    <br>
    
</div>