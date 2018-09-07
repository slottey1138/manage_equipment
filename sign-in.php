<?php
require_once("class/class.user.php");

$login = new USER();


if(isset($_POST["login"]))
{
  $mb_id = strip_tags($_POST['txt_mb_id']);
	$mb_pass = strip_tags($_POST['txt_mb_pass']);
		
	if($login->doLogin($mb_id,$mb_pass))
	{
		  $login->redirect('php/homepage.php');
	}
	else
	{
    $error[] = "ข้อมูลไม่ถูกต้อง !";
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
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
    if(isset($error)){
      echo "<div class='alert alert-dismissible alert-danger'>
      <button type='button' class='close' data-dismiss='alert'>&times;</button>
      <strong>ข้อมูลไม่ถูกต้อง !!</strong>
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
    <a href="sign-up.php" class="btn btn-info col-md-3" style="float:right" >ลงทะเบียน</a>
  </fieldset>
</form>
    </div>
</body>
</html>