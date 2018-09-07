<?php
require_once("config.php");

class Equipment
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

    public function addName($eq_name_id,$eq_name_name,$eq_name_type,$eq_name_expiry)
    {
        try
        {
            $stmt = $this->conn->prepare("INSERT INTO tbl_equipment_name (eq_name_id,eq_name_name,eq_name_type,eq_name_expirydate)
            VALUE (:eq_name_id,:eq_name_name,:eq_name_type,:eq_name_expiry)");

            $stmt->execute(array(
                ':eq_name_id' => $eq_name_id, ':eq_name_name' => $eq_name_name,
                ':eq_name_type' => $eq_name_type, ':eq_name_expiry' => $eq_name_expiry
            ));

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function addType($eq_type_id,$eq_type_name)
    {
        try
        {
            $stmt = $this->conn->prepare("INSERT INTO tbl_equipment_type (eq_type_id,eq_type_name)
            VALUE (:eq_type_id,:eq_type_name)");

            $stmt->execute(array(
                ':eq_type_id' => $eq_type_id, ':eq_type_name' => $eq_type_name
            ));

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function redirect($url)
	{
		header("Location: $url");
	}

}
?>