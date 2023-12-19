<?php 

require 'db.php';
session_start();
error_reporting(E_ALL & ~ E_NOTICE);

$classFn = new Dbh;
$conn = $classFn->connect();
$uniID = $_SESSION['username_login'];

$files = $_FILES['files'];

$returns = array();
/*


$_filetree = $_POST['files'];

function createFoldersAndMoveFiles($_filetree) 
{

    $nFolders = count($_filetree);

    foreach ($_filetree as $folder => $files) {
        createFolder($folder);
        moveFiles($files, $folder);

    }
}
createFoldersAndMoveFiles($_filetree);
function moveFiles($_files, $_folder) {

    $source = 'tmpuploads/';
    $destination = 'mypath/';

    $nFiles = count($_files);
    for($i = 0; $i < $nFiles; $i++) {
        $file = $_files[$i];
        rename($source . $file, $destination .$_folder. '/' .$file);
      }
}

function createFolder($foldername) {
    $folders = explode("/", $foldername);

    $path = 'mypath/';
    $nFolders = count($folders);
    for($i = 0; $i < $nFolders; $i++){
        $newFolder = '/' . $folders[$i];
        $path .= $newFolder;

        if (!file_exists($path) && !is_dir($path)) {
            mkdir($path);
        }

    }
}

*/

// echo $filess; 
    // if ($_POST['page'] == 'upload files') {

        if ($_POST['page']) {
            try {                
                $linkName = $_POST['pageLink'];
                $dateCreated = $_POST['dateCreated'];
                $category = $_POST['category'];
                $aboutUpload = $_POST['aboutUpload'];
                $projectTitle = $_POST['projectTitle'];
                // if (mkdir($newFolder)) {
                    //  $newFolder;
                // }
            $returns[] = $linkName.' '.$dateCreated.' '.$category.' '.$aboutUpload;

                if (isset($files)) {
                    $errors = [];
                    $path = '../../upload/';
                    $extensions = [
                        'jpg', 'jpeg', 'png', 'gif', 
                        'html','htmlx','xml','xlsx',
                        'xls','txt','doc','docx',
                        'php','py','java'
                    ];

                    $all_files = count($_FILES['files']['tmp_name']);
            
                        $file_name = $_FILES['files']['name'];
                        $file_tmp = $_FILES['files']['tmp_name'];
                        $file_type = $_FILES['files']['type'];
                        $file_size = $_FILES['files']['size'];
                        $file_ext = strtolower(end(explode('.', $file_name)));
                        $file = $path . $file_name;
                        
                        if (empty($errors)) {
                         $sqlInst = "INSERT INTO file_upload(file_descrip,file_name,file_date_created,file_uniqID,projectLink,file_Cate,file_title) VALUES";
                                $sqlInst .= "(:fD,:fN,:fdC,:uID,:pLk,:pCat,:fT)";
                                $qryInst = $conn->prepare($sqlInst);
                                $qryInst->execute([
                                    ':fD' => $aboutUpload,
                                    ':fN' => $file_name,
                                    ':fdC' => $dateCreated,
                                    ':uID' => $uniID,
                                    ':pLk' => $linkName,
                                    ':pCat' => $category,
                                    ':fT' => $projectTitle
                                ]);
                                if ($qryInst->rowCount()) {
                                    if (move_uploaded_file($file_tmp, $file)) {
                                        $returns['success'] = 'File Uploaded';
                                    }else {
                                        $returns['err_upload'] = 'Unable to upload file';
                                    }
                                    
                                } /* else {
                                    $returns['err_db_int']='Not insert';
                                } */
                            }else {
                                $returns['file_err'] = 'File error';
                            }

                        if ($errors) $returns['file_err'] = 'File error';
                    }
                } catch (PDOException $e) {
                    $returns[] = 'Oops! Something went wrong '.$e;
                }
        }
      

echo json_encode($returns);
?>