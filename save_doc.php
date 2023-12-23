<?php
ob_start();
session_start();
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) header('Location: login.php');
require_once('./config/connect_database.php');
$conn = connect();
if (!empty($_POST)) {
    $urgent = $_POST['urgent'];
    $type_doc = $_POST['type_doc'];
    $from = $_POST['from'];
    $subject = $_POST['subject'];
    $to = $_POST['to'];
    $signer = $_POST['signer'];
    $requester = $_POST['requester'];

    if (!empty($_POST['note']))
        $note = $_POST['note'];
    else $note = "";

    if ($_GET['type'] != 'normal') {
        //$detail = $_POST['detail'];
        $detail = "";
        //$reasoner = $_POST['reasoner'];
        $pos = $_POST['position'];
        if (!empty($_POST['note'])) {
            $note = $_POST['note'];
            $txt_note = $_POST['txt_note'];
            
            $nstr = "";
            /*if ($note[count($note) - 1] == "อื่นๆ") {
                $nstr = "<ul><li>{$txt_note}</li></ul>";
            }*/
            
            $html = "";
            foreach ($note as $notes => $val) {
                /*if ($val == "อื่นๆ") $html .= "<li rel=\"{$val}\">{$val} {$nstr}</li>";
                else $html .= "<li rel=\"{$val}\">{$val}</li>";*/
                $html .= "{$val},";
            }
            if(str_contains($html, "ๆ")) $html .= $txt_note;
            if(substr($html, strlen($html)-1, strlen($html)) == ',') {
                $html = substr($html, 0, strlen($html)-1);
            }
        } else {
            $html = "";
        }
    }

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        if ($_GET['type'] == 'normal') {
            /*$num = getNumDoc('normal');
            $sql = "INSERT INTO doc_normal(num_doc, urgent, type_doc, from_dep, subject, to_dep, signer, requester, note, create_date) ";
            $sql .= "VALUES({$num}, '{$urgent}', '{$type_doc}', '{$from}', '{$subject}', '{$to}', '{$signer}', '{$requester}', '{$note}', NOW())";
            $sel = "SELECT * FROM doc_normal d1 WHERE ";
            $sel .= "(SELECT MAX(num_doc) AS mnum FROM doc_normal)=d1.num_doc";
            */
            $sql = "UPDATE doc_normal SET urgent='{$urgent}', type_doc='{$type_doc}', from_dep='{$from}', ";
            $sql .= "subject='{$subject}', to_dep='{$to}', ";
            $sql .= "signer='{$signer}', requester='{$requester}', note='{$note}' ";
            $sql .= "WHERE id={$id}";
            $sel = "SELECT * FROM doc_normal WHERE id={$id}";
        } else {
            if ($_GET['type'] == 'secret1') {
                $tb = "doc_secret1";
            } elseif ($_GET['type'] == 'secret2') {
                $tb = "doc_secret2";
            } elseif ($_GET['type'] == 'secret3') {
                $tb = "doc_secret3";
            }

            $sql = "UPDATE {$tb} SET urgent='{$urgent}', type_doc='{$type_doc}', from_dep='{$from}', subject='{$subject}', ";
            $sql .= "position='{$pos}', to_dep='{$to}', ";
            $sql .= "signer='{$signer}', requester='{$requester}', note='{$html}' ";
            $sql .= " WHERE id={$id}";
            $conn->query($sql);
            $sel = "SELECT * FROM {$tb} WHERE id={$id}";
        }
    } else {
        if ($_GET['type'] == 'normal') {
            $num = getNumDoc('normal');
            $sql = "INSERT INTO doc_normal(num_doc, urgent, type_doc, from_dep, subject, to_dep, signer, requester, note, create_date) ";
            $sql .= "VALUES({$num}, '{$urgent}', '{$type_doc}', '{$from}', '{$subject}', '{$to}', '{$signer}', '{$requester}', '{$note}', NOW())";
            $sel = "SELECT * FROM doc_normal d1 WHERE ";
            $sel .= "(SELECT MAX(num_doc) AS mnum FROM doc_normal)=d1.num_doc";
        } else {
            if ($_GET['type'] == 'secret1') {
                $num = getNumDoc('secret1');
                $tb = "doc_secret1";
            } elseif ($_GET['type'] == 'secret2') {
                $num = getNumDoc('secret2');
                $tb = "doc_secret2";
            } elseif ($_GET['type'] == 'secret3') {
                $num = getNumDoc('secret3');
                $tb = "doc_secret3";
            }

            $sql = "INSERT INTO {$tb}(num_doc, urgent, type_doc, from_dep, subject, ";
            $sql .= "position, to_dep, signer, requester, note, create_date) ";
            $sql .= "VALUES({$num}, '{$urgent}', '{$type_doc}', '{$from}', '{$subject}', ";
            $sql .= "'{$pos}', '{$to}', '{$signer}', '{$requester}', '{$html}', NOW())";
            $sel = "SELECT * FROM {$tb} d1 WHERE ";
            $sel .= "(SELECT MAX(num_doc) AS mnum FROM {$tb})=d1.num_doc";
            //printf("%s\n", htmlspecialchars($sql));
        }
    }


    if ($save = $conn->query($sql)) {
        if ($rs = $conn->query($sel)) {
            $row = mysqli_fetch_assoc($rs);
            $arr = array();

            if ($_GET['type'] == 'normal') {
                array_push($arr, array(
                    'id' => $row['id'],
                    'num_doc' => $row['num_doc'],
                    'urgent' => $row['urgent'],
                    'type_doc' => $row['type_doc'],
                    'from_dep' => $row['from_dep'],
                    'subject' => $row['subject'],
                    'to_dep' => $row['to_dep'],
                    'signer' => $row['signer'],
                    'req' => $row['requester'],
                    'note' => $row['note'],
                    'create_date' => toDateThai($row['create_date']),
                    'sts' => '0'
                ));
            } else {
                array_push($arr, array(
                    'id' => $row['id'],
                    'num_doc' => $row['num_doc'],
                    'urgent' => $row['urgent'],
                    'type_doc' => $row['type_doc'],
                    'from_dep' => $row['from_dep'],
                    'subject' => $row['subject'],
                    'pos' => $row['position'],
                    'to_dep' => $row['to_dep'],
                    'signer' => $row['signer'],
                    'req' => $row['requester'],
                    'note' => $row['note'],
                    'create_date' => toDateThai($row['create_date']),
                    'sts' => '1'
                ));
            }
        }
    }
    echo json_encode($arr);
} else {
    echo "x";
}
