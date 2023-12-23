<?php
ob_start();
session_start();
require_once('./config/connect_database.php');
if (!isset($_SESSION['userType']) || $_SESSION['userType'] != 'Admin') header('Location: login.php');
if (!isset($_GET) || empty($_GET) && (!isset($_POST) || empty($_POST)))  header('Location: login.php');
else {
    $id = $_GET['id'];
    $cardid = $_POST['cardid'];
    $title = $_POST['title'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $pos = $_POST['pos'];
    $usertype = $_POST['usertype'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    if (chkUsernameID($id, $username)) {
        echo "dupuser";
    } elseif (chkUsernameCardID($id, $cardid)) {
        echo "dupcardid";
    } else {
        $conn = connect();
        if ($pwd == "") {
            $sql = "UPDATE account SET userID='{$cardid}', title='{$title}', name='{$name}', surname='{$surname}', position='{$pos}', username='{$username}', user_type={$usertype}, update_date=NOW(), update_by='{$_SESSION['fullname']}' ";
            $sql .= "WHERE id={$id}";
            $conn->query($sql);
            echo "pass";
        } else {
            if (chkLenPassword($pwd)) echo "lenpass";
            else {
                $sql = "UPDATE account SET userID='{$cardid}', title='{$title}', name='{$name}', surname='{$surname}', position='{$pos}', username='{$username}', pwd=PASSWORD('{$pwd}'), user_type={$usertype}, update_date=NOW(), update_by='{$_SESSION['fullname']}' ";
                $sql .= "WHERE id={$id}";
                $conn->query($sql);
                echo "pass";
            }
        }
    }
}
