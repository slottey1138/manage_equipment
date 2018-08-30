<?php
require_once("connect.php");


if(!empty($_POST["username"])) {
  $sql = "SELECT * FROM tbl_equipment WHERE eq_serial_number ='" . $_POST["username"] . "'";
  $query = mysqli_query($conn, $sql);
  if(mysqli_num_rows($query)>0) {
      echo "<span class='text-danger'> มีผู้ใช้งานนี้อยู่ในระบบแล้ว...</span>";
  }
  else{
    echo "<span class='text-success'>OK</span>";
  }
}
?>