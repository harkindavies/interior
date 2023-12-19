<?php
class Dbh
{
	private $servername;
	private $username;
	private $password;
	private $dbname;
	private $charset;
	
	public function connect()
	{
		$this->servername = "127.0.0.1";
		$this->username = "root";
		$this->password = "";
		$this->dbname = "profile";
		$this->charset = "utf8";
		
		try {
			$dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
			$pdo = new PDO($dsn, $this->username, $this->password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
            return $pdo; 
		} catch (PDOException $e) {
			echo "Connection failed: ".$e->getMessage();
		}
	}
}
?>