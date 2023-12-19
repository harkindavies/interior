<?php
require '../db.php';
$ini_dbClass = new Dbh;
$conn = $ini_dbClass->connect();
error_reporting(E_ALL & ~ E_NOTICE);
$return_json = array();

session_start();

try {
        
    $login_acctUsername = $_POST['usernameLogin'] ? $_POST['usernameLogin'] : '';
    $login_acctPwd = $_POST['pwdLogin'] ? $_POST['pwdLogin'] : '';
    if (!$login_acctEmail && !$login_acctPwd) {
        $return_json['error'] = 'No creterial found. Process canceled!';
        echo json_encode($return_json);
        return false;    
    }
    $sqlLogin = "SELECT * FROM acct_create WHERE acct_username = ? AND acct_pwd = ?";
    $qryLogin = $conn->prepare($sqlLogin);
    $qryLogin->execute([
        $login_acctUsername,
        $login_acctPwd
    ]);
    if ($qryLogin->rowCount()) {
        $_SESSION['username_login'] = $login_acctUsername;
        $return_json['success'] = 'Access Granted';
    } else {
        $return_json['failed'] = 'Access Denied';
    }
} catch (PDOException $e) {
    $return_json['error'] = 'Oops! Something went wrong. '.$e;
}

echo json_encode($return_json);


?>