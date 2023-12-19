<?php
require 'db.php';
$tryConnect = new Dbh;
$conn = $tryConnect->connect();
$out = array();

if ($_POST["delete_file"] == 'granted') {
    try {
        
        /* $qry = "SELECT * FROM file_upload WHERE file_uniqID = ? AND idfile_upload = ?";
        $searchRs = $conn->prepare($qry);
        $searchRs->execute([$uniID,$file_id]);
        $rowS = $searchRs->fetch();
        $id = $rowS['idfile_upload'];

        if ($searchRs->rowCount()) {
            $sqlDelete = "DELETE FROM file_upload WHERE file_uniqID = ? AND idfile_upload = ?";
            $qryDel = $conn->prepare($sqlDelete);
            $qryDel->execute([$uniID,$file_id]);
            if ($qryDel->rowCount()) {
                unlink('../../upload/'.$id);
            }
        } */

    } catch (PDOException $e) {
        $out[] = 'Oops! Something went wrong '.$e;
    }

} 

if ($_POST['page'] == 'granted') {
    try {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $phonenum = $_POST['phonenum'];
        $gender = $_POST['gender'];
        $nin = $_POST['nin'];
        
        $sqlSEARCH = "SELECT * FROM acct_create WHERE acct_email = ? AND acct_username = ?";
        $qrySEARCH = $conn->prepare($sqlSEARCH);
        $qrySEARCH->execute([$email,$username]);
        if ($qrySEARCH->rowCount()) {
            $qryEdit = $conn->prepare("UPDATE acct_create SET acct_website =?,acct_fname=?,acct_lname=?,acct_username=?,acct_pwd=?,acct_email=?,acct_phone=?,acct_gender=?,acct_NG_NIN=? WHERE acct_username=? AND acct_email=?");
            $qryEdit->execute([
                $website,
                $fname,
                $lname,
                $username,
                $password,
                $email,
                $phonenum,
                $gender,
                $nin,
                $username,
                $email
            ]);
            if ($qryEdit->rowCount()) {
                $out['update'] = 'Record Updated';
            }
        }
        else {
            $sqlSave = "INSERT INTO acct_create(acct_fname,acct_lname,acct_username,acct_pwd,acct_email,acct_phone,acct_gender,acct_NG_NIN,acct_website)";
            $sqlSave .= " VALUES(:fn,:ln,:usn,:pd,:em,:ph,:gn,:nin,:wbs)";
            $qry = $conn->prepare($sqlSave);
            $qry->execute([
                ':fn' => $fname,
                ':ln' => $lname,
                ':usn' => $username,
                ':pd' => $password,
                ':em' => $email,
                ':ph' => $phonenum,
                ':gn' => $gender,
                ':nin' => $nin,
                ':wbs' => $website
            ]);

            if ($qry->rowCount()) {
                $out['save'] = 'Record Saved';
            }
        }
    } catch (PDOException $e) {
        $out['error'] = 'Oops! Something went wrong '.$e;
    }
}



echo json_encode($out);


?>