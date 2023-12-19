  <?php
     include "conn.php";

    $createdeleteorder = "CREATE TABLE IF NOT EXISTS trainingtbl(
        sn INT(11) AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(100) NOT NULL,
        lastname VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        address VARCHAR(150) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        dob VARCHAR(30) NOT NULL,
        gender VARCHAR(30) NOT NULL,
        images TEXT(255) NOT NULL,
        state VARCHAR(50) NOT NULL,
        local VARCHAR(50) NOT NULL,
        city VARCHAR(50) NOT NULL,
        plan VARCHAR(20) NOT NULL,
        parent VARCHAR(50) NOT NULL,
        maiden VARCHAR(50) NOT NULL,
        paddress VARCHAR(150) NOT NULL,
        pphone VARCHAR(20) NOT NULL,
        gname VARCHAR(50) NOT NULL,
        gphone VARCHAR(20) NOT NULL,
        gaddress VARCHAR(150) NOT NULL,
        kinname VARCHAR(50) NOT NULL,
        kinstatus VARCHAR(30) NOT NULL,
        kinphone VARCHAR(20) NOT NULL,
        kinaddress VARCHAR(150) NOT NULL

    )";
    if(mysqli_query($conn, $createdeleteorder)){
        echo "<h2>ordertbl table created</h2>";
    }
    else{
        echo "trainingtbl table not created";
    }
?>