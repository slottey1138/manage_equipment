<?php

require_once("config.php");

require_once("class.user.php");


class Service extends USER
{
    private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->Connection();
		$this->conn = $db;
    }

    public function getCase($eq_status,$eq_serial_number,$eq_case_name,$eq_name,$case_sup,$case_date)
    {
        try
        {
            $insert = $this->conn->prepare("INSERT INTO tbl_case(case_name,case_get_eq,case_get_serial,case_sup,case_date) 
            VALUE (:eq_case_name,:eq_name,:eq_serial_number,:case_sup,:case_date)");

            $update = $this->conn->prepare("UPDATE tbl_equipment SET eq_status = :eq_status 
            WHERE eq_serial_number =:eq_serial_number");

             $insert->execute(array(
                ':eq_serial_number' => $eq_serial_number, ':eq_case_name' => $eq_case_name, ':eq_name' => $eq_name,
                ':case_sup' => $case_sup, ':case_date' => $case_date
            ));
            
             $update->execute(array(
                ':eq_status' => $eq_status, ':eq_serial_number' => $eq_serial_number
            ));


            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public function takeCase($eq_status,$eq_serial_number,$eq_case_name,$eq_name,$case_sup,$case_date)
    {
        try
        {
            $insert = $this->conn->prepare("INSERT INTO tbl_case(case_name,case_add_eq,case_add_serial,case_sup,case_date) 
            VALUE (:eq_case_name,:eq_name,:eq_serial_number,:case_sup,:case_date)");

            $update = $this->conn->prepare("UPDATE tbl_equipment SET eq_status = :eq_status 
            WHERE eq_serial_number =:eq_serial_number");

            $insert->execute(array(
                ':eq_serial_number' => $eq_serial_number, ':eq_case_name' => $eq_case_name, ':eq_name' => $eq_name,
                ':case_sup' => $case_sup, ':case_date' => $case_date
            ));
            
            $update->execute(array(
                ':eq_status' => $eq_status, ':eq_serial_number' => $eq_serial_number
            ));

            return true;
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}
?>