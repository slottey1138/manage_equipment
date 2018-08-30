<?php
require_once("DBController.php");


if(!empty($_POST["username"])) {
  $sql = "SELECT * FROM tbl_member WHERE mb_id ='" . $_POST["username"] . "'";
  $query = mysqli_query($conn, $sql);
  if(mysqli_num_rows($query)>0) {
      echo "<span class='text-danger'> มีผู้ใช้งานนี้อยู่ในระบบแล้ว...</span>";
  }
}
?>