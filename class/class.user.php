<?php
require_once("config.php");

class USER
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
           $new_password = password_hash($mb_pass, PASSWORD_DEFAULT);
   
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
 
    public function login($mb_id,$mb_pass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM tbl_member WHERE mb_id=:mb_id");
          $stmt->execute(array(':mb_id'=>$mb_id));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($mb_pass, $userRow['mb_pass']))
             {
                $_SESSION['user_session'] = $userRow['user_id'];
                return 1;
             }
             else
             {
                return 2;
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
      if(isset($_SESSION['user_session']))
      {
         return true;
      }
   }
 
   public function redirect($url)
   {
       header("Location: $url");
   }
 
   public function logout()
   {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
   }
}
?>