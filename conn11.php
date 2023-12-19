<?php
    $user = "root";
    $password = "";
    $server = "localhost";
    $db = "interiordeco";
    global $conn, $dbs;
    
    try {
      $dbs = new PDO('mysql:host=' .$server. ';dbname='.$db, $user, $password);
    }
    catch (PDOException $e){
      echo "<br/>Verbindung";
      die();
    }
    $con = mysqli_connect($server, $user, $password);
    if (!$con) {
    	# code...
    }
    else{
    	$createdb = "CREATE DATABASE IF NOT EXISTS interiordeco";
        if (mysqli_query($con,$createdb)) {
            //echo "<h2>database created</h2>";
            $mydb = "interiordeco";
        }
       else{
            //echo "<h2>not created</h2>";
        }
        $conn = mysqli_connect($server, $user, $password, $mydb);
        if ($conn) {
            //echo "<h2>database connected</h2>";
        }
        else{
           //echo "<h2>database not connected</h2>";
       }
            $createadmintbl = "CREATE TABLE IF NOT EXISTS adminreg(
                sn INT(2) AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(100) NOT NULL,
                lastname VARCHAR(100) NOT NULL,
                email VARCHAR(100) NOT NULL,
                password VARCHAR(100) NOT NULL,
                position VARCHAR(40) NOT NULL,
                phone VARCHAR(40) NOT NULL,
                photo TEXT NOT NULL

            )";
            if(mysqli_query($conn, $createadmintbl)){
                //echo "<h2>admin table created</h2>";
            }
            else{
                //echo "admin table not created";
            }

            $createdeletemsgtbl = "CREATE TABLE IF NOT EXISTS deletedmsgtbl(
                sn INT(11) AUTO_INCREMENT PRIMARY KEY,
                msgdate DATE NOT NULL,
                sender VARCHAR(150) NOT NULL,
                receiver VARCHAR(150) NOT NULL,
                message TEXT NOT NULL,
                msgread VARCHAR(20) NOT NULL,
                admininfo TEXT NOT NULL,
                deletedate DATETIME NOT NULL

            )";
            if(mysqli_query($conn, $createdeletemsgtbl)){
                //echo "<h2>deletemsg table created</h2>";
            }
            else{
                //echo "deletemsg table not created";
            }
            
            $createdeleteorder = "CREATE TABLE IF NOT EXISTS deletedorder(
                sn INT(11) AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(50) NOT NULL,
                lastname VARCHAR(50) NOT NULL,
                address VARCHAR(150) NOT NULL,
                email VARCHAR(100) NOT NULL,
                phone VARCHAR(20) NOT NULL,
                image TEXT NOT NULL,
                amount TEXT NOT NULL,
                site_address TEXT NOT NULL,
                type VARCHAR(50) NOT NULL,
                orderdate VARCHAR(30) NOT NULL,
                admininfo TEXT NOT NULL,
                deletedate DATETIME NOT NULL

            )";
            if(mysqli_query($conn, $createdeleteorder)){
                //echo "<h2>deletedorder table created</h2>";
            }
            else{
                //echo "deletedorder table not created";
            }

             $createdeletedproject = "CREATE TABLE IF NOT EXISTS deletedproject(
                sn INT(11) AUTO_INCREMENT PRIMARY KEY,
                projectname VARCHAR(150) NOT NULL,
                projectprice INT(6) NOT NULL,
                projectype VARCHAR(30) NOT NULL,
                promotype VARCHAR(30) NOT NULL,
                projectimage TEXT NOT NULL,
                admininfo VARCHAR(150) NOT NULL,
                deletedate DATETIME NOT NULL
                

            )";
            if(mysqli_query($conn, $createdeletedproject)){
                //echo "<h2>deletedproject table created</h2>";
            }
            else{
                //echo "<h2>deletedproject table not created</h2>";
            }

            $createdeletedvideo = "CREATE TABLE IF NOT EXISTS deletedvideo(
                sn INT(11) AUTO_INCREMENT PRIMARY KEY,
                projectname VARCHAR(50) NOT NULL,
                description VARCHAR(200) NOT NULL,
                projectype VARCHAR(30) NOT NULL,
                projectvideo TEXT NOT NULL,
                admininfo VARCHAR(150) NOT NULL,
                deletedate DATETIME NOT NULL
                

            )";
            if(mysqli_query($conn, $createdeletedvideo)){
                //echo "<h2>deletedvideo table created</h2>";
            }
            else{
                //echo "<h2>deletedvideoss table not created</h2>";
            }

            $createmsgtbl = "CREATE TABLE IF NOT EXISTS messagetbl(
                sn INT(11) AUTO_INCREMENT PRIMARY KEY,
                msgdate DATE NOT NULL,
                sender VARCHAR(200) NOT NULL,
                receiver VARCHAR(100) NOT NULL,
                message TEXT NOT NULL,
                msgread VARCHAR(10) NOT NULL
                

            )";
            if(mysqli_query($conn, $createmsgtbl)){
                //echo "<h2>messagetbl table created</h2>";
            }
            else{
                //echo "<h2>messatbl table not created</h2>";
            }

            $createnewsletter = "CREATE TABLE IF NOT EXISTS newslettertbl(
                sn INT(11) AUTO_INCREMENT PRIMARY KEY,
                message TEXT NOT NULL,
                admininfo VARCHAR(150) NOT NULL,
                msgdate DATE NOT NULL                

            )";
            if(mysqli_query($conn, $createnewsletter)){
                //echo "<h2>newslettertbl table created</h2>";
            }
            else{
                //echo "<h2>newslettertbl table not created</h2>";
            }


            $createdeleteorder = "CREATE TABLE IF NOT EXISTS ordertbl(
                sn INT(11) AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(100) NOT NULL,
                lastname VARCHAR(100) NOT NULL,
                address VARCHAR(150) NOT NULL,
                email VARCHAR(100) NOT NULL,
                phone VARCHAR(20) NOT NULL,
                images TEXT NOT NULL,
                amount TEXT NOT NULL,
                site_address TEXT NOT NULL,
                type VARCHAR(50) NOT NULL,
                orderdate VARCHAR(30) NOT NULL,
                admininfo DATE NOT NULL,
                respond VARCHAR(10) NOT NULL

            )";
            if(mysqli_query($conn, $createdeleteorder)){
                //echo "<h2>ordertbl table created</h2>";
            }
            else{
                //echo "ordertbl table not created";
            }

            $createproject = "CREATE TABLE IF NOT EXISTS project(
                sn INT(11) AUTO_INCREMENT PRIMARY KEY,
                projectname VARCHAR(150) NOT NULL,
                projectprice INT(10) NOT NULL,
                projectype VARCHAR(30) NOT NULL,
                promotype VARCHAR(30) NOT NULL,
                projectimage TEXT NOT NULL,
                admininfo VARCHAR(150) NOT NULL,
                uploadate DATETIME NOT NULL
                

            )";
            if(mysqli_query($conn, $createproject)){
                //echo "<h2>project table created</h2>";
            }
            else{
                //echo "<h2>project table not created</h2>";
            }


            $createresponsetbl = "CREATE TABLE IF NOT EXISTS responsetbl(
                sn INT(11) AUTO_INCREMENT PRIMARY KEY,
                sender VARCHAR(200) NOT NULL,
                receiver VARCHAR(100) NOT NULL,
                message TEXT NOT NULL,
                rdate DATE NOT NULL
                

            )";
            if(mysqli_query($conn, $createresponsetbl)){
                //echo "<h2>responsetbl table created</h2>";
            }
            else{
                //echo "<h2>responsetbl table not created</h2>";
            }


            $createresponsetbl = "CREATE TABLE IF NOT EXISTS subscribetbl(
                sn INT(11) AUTO_INCREMENT PRIMARY KEY,
                email VARCHAR(100) NOT NULL,
                subdate DATE NOT NULL
                

            )";
            if(mysqli_query($conn, $createresponsetbl)){
                //echo "<h2>subscribetbl table created</h2>";
            }
            else{
                //echo "<h2>subscribetbl table not created</h2>";
            }

            $createvideo = "CREATE TABLE IF NOT EXISTS videoproject(
                sn INT(11) AUTO_INCREMENT PRIMARY KEY,
                projectname VARCHAR(50) NOT NULL,
                description VARCHAR(200) NOT NULL,
                projectype VARCHAR(30) NOT NULL,
                projectvideo TEXT NOT NULL,
                admininfo VARCHAR(150) NOT NULL,
                uploadate DATE NOT NULL
                

            )";
            if(mysqli_query($conn, $createvideo)){
                //echo "<h2>videoproject table created</h2>";
            }
            else{
                //echo "<h2>videoproject table not created</h2>";
            }

        }

?>