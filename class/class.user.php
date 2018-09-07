<?php

require_once('config.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->Connection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($mb_id,$mb_fname,$mb_lname,$mb_pass,$mb_type)
	{
		try
		{
			
			$stmt = $this->conn->prepare("INSERT INTO tbl_member(mb_id,mb_fname,mb_lname,mb_pass,mb_type) 
		                                               VALUES(:mb_id, :mb_fname,:mb_lname, :mb_pass, :mb_type)");
				
			$stmt->bindparam(":mb_id", $mb_id);
			$stmt->bindparam(":mb_fname", $mb_fname);
			$stmt->bindparam(":mb_lname", $mb_lname);
			$stmt->bindparam(":mb_pass", $mb_pass);		
			$stmt->bindparam(":mb_type", $mb_type);										  
				
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	
	public function doLogin($mb_id,$mb_pass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT mb_id, mb_pass FROM tbl_member WHERE mb_id =:mb_id");
			$stmt->execute(array(':mb_id'=>$mb_id));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if($mb_pass == $row['mb_pass'])
				{
					$_SESSION['mb_session'] = $row['mb_id'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['mb_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['mb_session']);
		return true;
	}
}
?>