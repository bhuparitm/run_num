<?php
ob_start();
session_start();
require_once("./config/connect_database.php");
if (isset($_POST) && !empty($_POST)) {
    $conn = connect();
    $sql = "SELECT * FROM account WHERE username='{$_POST['username']}' AND pwd=PASSWORD('{$_POST['pwd']}')";
    if ($result = $conn->query($sql)) {
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $row['id'];
            if (strpos($row['title'], "หญิง") > 0)
                $_SESSION['fullname'] = $row['title'] . ' ' . $row['name'] . ' ' . $row['surname'];
            else
                $_SESSION['fullname'] = $row['title'] . $row['name'] . ' ' . $row['surname'];
            $_SESSION['UserID'] = $row['userID'];
            $_SESSION['position'] = $row['position'];
            if ($row['user_type'] == '0') {
                $_SESSION['userType'] = 'Admin';
                header('Location: adminUserList.php');
            } else {
                $_SESSION['userType'] = 'User';
                header('Location: index.php');
            }
        } else {
            header('Location: login.php');
        }
    } else {
        echo mysqli_error($conn, $result);
    }
}
