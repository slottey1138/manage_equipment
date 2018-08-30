<?php
session_start();
require_once("php/connect.php");

if(isset($_POST["login"]))
{
  $mb_id = $_POST["txt_mb_id"];
  $mb_pass = $_POST["txt_mb_pass"];

  $sql = "SELECT * FROM tbl_member WHERE mb_id = '$mb_id' AND mb_pass = '$mb_pass'";
  $query = mysqli_query($conn,$sql);
  $row = mysqli_fetch_assoc($query);
  if(mysqli_num_rows($query) ==1){
    $_SESSION["mb_id"] = $row["mb_id"];
    echo "<script>location='php/homepage.php'</script>";
  }
  else {
    $Error = "<p style='color:red'>ข้อมูลไม่ถูกต้อง !!<p/>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เข้าสู่ระบบ</title>
    <link rel="stylesheet" href="css/cosmo.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <style>
     body{
       background-color: #dcdcdc;
        font-family: 'Kanit', sans-serif;
     }
    </style>
</head>
<body>
    <div class="container col-md-5 mt-5 well">
    <center>
    <?php
    if(isset($Error)){
      echo "<div class='alert alert-dismissible alert-danger'>
     ข้อมูลไม่ถูกต้อง
    </div>";
    }
    ?>
  </center>
    <form method="post">
  <fieldset>
    <legend>เข้าสู่ระบบ</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">รหัสประจำตัว</label>
      <input type="text" class="form-control" name="txt_mb_id" required >
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">รหัสผ่าน</label>
      <input type="password" class="form-control" name="txt_mb_pass" id="password" required>
    </div>
    <button type="submit" name="login" class="btn btn-success col-md-3">เข้าสู่ระบบ</button>
    <button type="reset" class="btn btn-secondary col-md-3">ยกเลิก</button>
    <a href="register.php" class=" btn btn-info col-md-3" style="float:right" >ลงทะเบียน</a>
  </fieldset>
</form>
    </div>
</body>
</html>