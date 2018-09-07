<?php

require_once("config.php");


class Service
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

            $update = $this->conn->prepare("UPDATE tbl_equipment SET eq_status = :eq_status WHERE eq_serial_number =:eq_serial_number");

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

    public function changeCase($get_eq_name,$get_eq_serial_number, $get_eq_status,$add_eq_name,$add_eq_serial_number,$add_eq_status,$supervisor,$date, $eq_case_name)
    {
        try
        {
            $insert_case = $this->conn->prepare("INSERT INTO tbl_case (case_name,case_get_eq,case_get_serial,case_add_eq,case_add_serial,case_sup,case_date)
            VALUE (:case_name, :case_get_eq, :case_get_serial, :case_add_eq, :case_add_serial, :case_sup, :case_date)");

            $insert_case->execute(array(
                ':case_name' => $eq_case_name, ':case_get_eq' => $get_eq_name, ':case_get_serial' => $get_eq_serial_number,
                ':case_add_eq' => $add_eq_name, ':case_add_serial' => $add_eq_serial_number, ':case_sup' => $supervisor, ':case_date' => $date
            ));
            
            $update_get = $this->conn->prepare("UPDATE tbl_equipment SET eq_status = :get_eq_status WHERE eq_serial_number =:get_eq_serial_number");

            $update_get->execute(array( ':get_eq_status' => $get_eq_status, ':get_eq_serial_number' => $get_eq_serial_number ));

            $update_add = $this->conn->prepare("UPDATE tbl_equipment SET eq_status = :get_eq_status WHERE eq_serial_number =:get_eq_serial_number");

            $update_add->execute(array( ':get_eq_status' => $add_eq_status, ':get_eq_serial_number' => $add_eq_serial_number ));

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