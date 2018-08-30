<?php
session_start();
include "php/connect.php";

if(isset($_POST["register"]))
{
  $mb_id = $_POST["txt_mb_id"];
  $mb_fname = $_POST["txt_mb_fname"];
  $mb_lname = $_POST["txt_mb_lname"];
  $mb_pass = $_POST["txt_mb_pass"];
  $mb_conpass = $_POST["txt_mb_conpass"];

  /*if($mb_id == ""){$alert = "Enter Member ID...";}
  if($mb_fname == ""){ $alert = "Enter Firstname...";}
  if($mb_lname == ""){ $alert = "Enter Lastname...";}
  if($mb_pass == "") {$alert = "Enter Password...";}
  if($mb_conpass == "") {$alert = "Enter Confirm Password...";}
  if($mb_pass != $mb_conpass) {$alert = "Password Not Match...";}*/

  $sql = "INSERT INTO tbl_member (mb_id,mb_fname,mb_lname,mb_pass)
  VALUE('$mb_id','$mb_fname','$mb_lname','$mb_pass')";

  if ($conn->query($sql) === TRUE) {
    $alertRegister = "Register Success...";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

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
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="css/hero.css">
	<link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
	<script>
		function checkAvailability() {
			    $.ajax({
				url: "check_availability.php",
				data: 'username=' + $("#username").val(),
				type: "POST",
				success: function (data) {
					$("#user-availability-status").html(data);
				},
				error: function () {}
			});
		}

		function checkFname()
		{
			$("#error_fname").hide();
			var fname = $("#txt_mb_fname").val();
			if( fname.lenght < 6 )
			{
				alert("OK");
			}
		}
	</script>
</head>

<body>

	<div class="container col-md-6">
		<form action="" method="post">
			<fieldset>
				<legend>REGISTER</legend>
				<div class="form-group">
					<label>MEMBER ID</label>
					<input name="username" type="text" id="username" class="form-control" onBlur="checkAvailability()">
					<span id="user-availability-status"></span>
				</div>
				<div class="form-group">
					<label>FIRSTNAME</label>
					<input type="text" class="form-control" id="txt_mb_fname" name="txt_mb_fname"onBlur="checkFname()"><span id="error_fname">Error</span>
				</div>
				<div class="form-group">
					<label>LASTNAME</label>
					<input type="text" class="form-control" name="txt_mb_lname">
				</div>
				<div class="form-group">
					<label>PASSWORD</label>
					<input type="text" class="form-control" name="txt_mb_pass">
				</div>
				<div class="form-group">
					<label>CONFIRMPASSWORD</label>
					<input type="text" class="form-control" name="txt_mb_conpass">
				</div>
				<button type="submit" name="register" class="btn btn-success col-md-3">REGISTER</button>
				<button type="reset" class="btn btn-secondary col-md-3">CANCEL</button>
			</fieldset>
		</form>
	</div>
</body>

</html>