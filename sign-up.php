<?php
require_once("class/class.user.php");

$regis = new User();

if(isset($_POST["register"]))
{
	
  $mb_id = $_POST["txt_mb_id"]; $mb_fname = $_POST["txt_mb_fname"];
  $mb_lname = $_POST["txt_mb_lname"]; $mb_pass = $_POST["txt_mb_pass"];
  $mb_type = "it";

  try
  {
	$stmt = $regis->runQuery("SELECT mb_id FROM tbl_member WHERE mb_id = :mb_id");
	$stmt->execute(array(':mb_id'=>$mb_id));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
		
	if($row['mb_id'] == $mb_id) {
		echo "<script>alert('มีรหัสผู้ใช้นี้ในระบบแล้ว !!')</script>";
	}
	  else{
		  if($regis->register($mb_id,$mb_fname,$mb_lname,$mb_pass,$mb_type)){
			  $regis->redirect("sign-up.php?joined");
		  }
	  }
  }
  catch(PDOException $e)
  {
	  echo $e->getMessage();
  }

}
?>

 <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="css/cosmo.css">
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
	<script src="js/check_register.js"></script>
	<style>
     body{
       background-color: #dcdcdc;
        font-family: 'Kanit', sans-serif;
     }
    </style>
</head>
<body>

	<div class="container col-md-5 mt-4">
	<?php
			if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-success">
				     <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <center>ลงทะเบียนเสร็จสมบูรณ์ คลิก<a href='sign-in.php'> ที่นี่</a> เพื่อเข้าสู่ระบบ</center>
                 </div>
                 <?php
			}
			?>
		<form action="" name="registerForm" method="post" onsubmit="return checkRegister()" >
			<fieldset>
				<legend><b>ลงทะเบียนสมาชิก</b></legend>
				<div class="form-group">
					<label><b>รหัสประจำตัว</b></label>
					<input name="txt_mb_id" type="text" id="txt_mb_id" class="form-control">
				</div>
				<div class="form-group">
					<label><b>ชื่อ</b></label>
					<input type="text" class="form-control" id="txt_mb_fname" name="txt_mb_fname">
				</div>
				<div class="form-group">
					<label><b>นามสกุล</b></label>
					<input type="text" class="form-control" name="txt_mb_lname">
				</div>
				<div class="form-group">
					<label><b>รหัสผ่าน</b></label>
					<input type="password" class="form-control" name="txt_mb_pass">
				</div>
				<div class="form-group">
					<label><b>ยืนยันรหัสผ่าน</b></label>
					<input type="password" class="form-control" name="txt_mb_cpass">
				</div>
				<button type="submit" name="register" class="btn btn-success col-md-4">ลงทะเบียน</button>
				<button type="reset" class="btn btn-secondary col-md-4">ยกเลิก</button>
			</fieldset>
		</form>
	</div>
</body>

</html>