<?php
require_once("config.php");

class User
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
    }

    public function register($mb_id,$mb_fname,$mb_lname,$mb_pass)
    {
       try
       {
        $stmt = $this->db->prepare("INSERT INTO tbl_member(mb_id,mb_fname,mb_lname,mb_pass) 
        VALUES(:mb_id, :mb_fname, :mb_lname, :mb_pass)");

           $stmt->bindparam(":mb_id", $mb_id);
           $stmt->bindparam(":mb_fname", $mb_fname);
           $stmt->bindparam(":mb_lname", $mb_lname);
           $stmt->bindparam(":mb_pass", $mb_pass);     
           $stmt->execute(); 
   
           return $stmt; 
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }   
    }
}
?>