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

    public function addName($eq_name_id,$eq_name_name,$eq_name_type,$eq_name_expiry,$eq_name_status)
    {
        try
        {
            $stmt = $this->conn->prepare("INSERT INTO tbl_equipment_name (eq_name_id,eq_name_name,eq_name_type,eq_name_expirydate,eq_name_status)
            VALUE (:eq_name_id,:eq_name_name,:eq_name_type,:eq_name_expiry,:eq_name_status)");

            $stmt->execute(array(
                ':eq_name_id' => $eq_name_id, ':eq_name_name' => $eq_name_name,
                ':eq_name_type' => $eq_name_type, ':eq_name_expiry' => $eq_name_expiry, ':eq_name_status' => $eq_name_status
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

    public function updateEq($eq_id,$eq_serial,$eq_status)
    {
        try
        {
           
            $stmt = $this->conn->prepare("UPDATE tbl_equipment SET eq_serial_number =:eq_serial_number, eq_status =:eq_status
            WHERE eq_id = :eq_id ");
            $stmt->execute(array(
             ':eq_serial_number' => $eq_serial, ':eq_status' => $eq_status, ':eq_id' => $eq_id
            ));
            return $stmt;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function broken($eq_status,$eq_id)
    {
        try
        {
            $stmt = $this->conn->prepare("UPDATE tbl_equipment SET eq_status = :eq_status WHERE eq_id = :eq_id");
            $stmt->execute(array(':eq_status' => $eq_status, ':eq_id' => $eq_id));

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