<?php
/*
$host = "localhost";
$username = "root";
$pwd = "root";
$db = "num_doc";

$conn = new mysqli($host, $username, $pwd, $db) or die("ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้");
*/
define('TIMEZONE', 'Asia/Bangkok');
header('content-type:text/html;charset=utf-8');
function connect()
{
    $host = "localhost";
    $username = "root";
    $pwd = "";
    $db = "num_doc";

    $conn = new mysqli($host, $username, $pwd, $db) or die("ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้");
    $conn->query("SET NAMES UTF8");
    mysqli_set_charset($conn, 'UTF8');

    date_default_timezone_set(TIMEZONE);
    return $conn;
}
function toDateThai($date)
{
    if (!empty($date)) {
        $month = array(
            "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
            "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
        );
        list($y, $m, $d) = explode("-", $date);
        $y = $y + 543;
        list($dd, $t) = explode(" ", $d);
        $gd = $dd . " " . $month[intval($m) - 1] . " " . $y . " " . $t;
        return $gd;
    } else {
        return "";
    }
}

function getYear2Digit($date)
{
    list($y, $m, $d) = explode("-", $date);
    $y = $y + 543;
    return substr($y, 2, 2);
}

function getNumDoc($type)
{
    $conn = connect();
    if ($type == "normal") {
        $sql = "SELECT MAX(num_doc) AS num_doc FROM doc_normal WHERE YEAR(create_date)=YEAR(now())";
    } elseif ($type == "secret1") {
        $sql = "SELECT MAX(num_doc) AS num_doc FROM doc_secret1 WHERE YEAR(create_date)=YEAR(now())";
    } elseif ($type == "secret2") {
        $sql = "SELECT MAX(num_doc) AS num_doc FROM doc_secret2 WHERE YEAR(create_date)=YEAR(now())";
    } elseif ($type == "secret3") {
        $sql = "SELECT MAX(num_doc) AS num_doc FROM doc_secret3 WHERE YEAR(create_date)=YEAR(now())";
    }

    $num_doc = "0";
    if ($result = $conn->query($sql)) {
        $row = mysqli_num_rows($result);
        if ($row == "1") {
            $rs = mysqli_fetch_assoc($result);
            $num_doc = $rs['num_doc'];
        }
    }
    return $num_doc + 1;
}

function LoopYear($report)
{
    $conn = connect();
    $sql = "SELECT YEAR(create_date) AS years FROM $report GROUP BY years ORDER BY years DESC";
    if ($result = $conn->query($sql)) {
        return $result;
    }
}

function getDoc($id, $tb) {
    $conn = connect();
    $sql = "SELECT * FROM {$tb} WHERE id={$id}";
    if($result = $conn->query($sql)) return mysqli_fetch_assoc($result);
}

function report($tb, $years)
{
    $conn = connect();
    if (!isset($years)) {
        if ($_SESSION['userType'] == 'Admin')
            $sql = "SELECT YEAR(create_date) AS years FROM {$tb} WHERE status<>'ลบ' ORDER BY years DESC LIMIT 1";
        else
            $sql = "SELECT YEAR(create_date) AS years FROM {$tb} ORDER BY years DESC LIMIT 1";
        if ($rs = $conn->query($sql)) {
            $row = $rs->fetch_array();
            $years = $row['years'];
        }
    } else 
        $sql = "SELECT * FROM {$tb} WHERE YEAR(create_date)='{$years}' ORDER BY create_date ASC";
    if ($result = $conn->query($sql)) {
        return $result;
        $result->free_result();
    }
}

function escape($str)
{
    $conn = connect();
    $sql = mysqli_real_escape_string($conn, $str);
    return $sql;
}

function chkIDCard($cardid)
{
    $conn = connect();
    $sql = "SELECT * FROM account WHERE userID='{$cardid}'";
    if ($result = $conn->query($sql)) {
        $row = mysqli_num_rows($result);
        if ($row > 0) return true;
        else return false;
    }
}

function chkUsername($user)
{
    $conn = connect();
    $sql = "SELECT * FROM account WHERE username='{$user}'";
    if ($result = $conn->query($sql)) {
        $row = mysqli_num_rows($result);
        if ($row > 0) return true;
        else return false;
    }
}

function UserList()
{
    $conn = connect();
    $sql = "SELECT * FROM account WHERE id<>{$_SESSION['id']} ORDER BY id ASC";
    if ($result = $conn->query($sql)) {
        return $result;
    }
}

function findUser($id)
{
    $conn = connect();
    $sql = "SELECT * FROM account WHERE id={$id}";
    if ($result = $conn->query($sql)) {

        return mysqli_fetch_assoc($result);;
    }
}

function chkUsernameID($id, $username)
{
    $conn = connect();
    $sql = "SELECT * FROM account WHERE id<>{$id} AND username='{$username}'";
    if ($result = $conn->query($sql)) {
        $row = mysqli_num_rows($result);
        if ($row > 0) return true;
        else return false;
    }
}

function chkUsernameCardID($id, $cardid)
{
    $conn = connect();
    $sql = "SELECT * FROM account WHERE id<>{$id} AND userID='{$cardid}'";
    if ($result = $conn->query($sql)) {
        $row = mysqli_num_rows($result);
        if ($row > 0) return true;
        else return false;
    }
}

function chkLenCardID($str)
{
    if (strlen($str) < 13 || strlen($str) > 13) return true;
}

function chkLenPassword($str)
{
    if (strlen($str) < 8) return true;
}

function findContact($id)
{
    $conn = connect();
    if (empty($id)) {
        $sql = "SELECT * FROM contact ORDER BY id";
    } else {
        $sql = "SELECT * FROM contact WHERE id={$id} ORDER BY id";
    }
    if ($result = $conn->query($sql)) {
        return $result;
    }
}

function getUserID() {
    $userid = rand(1, 10000000000000);
    return $userid;
}
