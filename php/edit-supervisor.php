<?php
require_once("session.php");
require_once("connect.php");
$mb_id = $_GET["mb_id"];

$sql = "SELECT * FROM tbl_member WHERE mb_id = '$mb_id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

if(isset($_POST["edit-sup"]))
{
    $mb_id = $_POST["txt_mb_id"];
    $mb_fname = $_POST["txt_mb_name"];

    if($mb_fname == "")
    {
        $errorFname = "Enter First Name !!";
    }
    else 
    {
    $sql = "UPDATE tbl_member SET mb_fname = '$mb_fname' WHERE mb_id = '$mb_id' ";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('แก้ไขรายชื่อหัวหน้างานเรียบร้อย...')</script>";
        echo "<script>location='../php/manage-data.php'</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <?php require_once("navbar.php") ?>
    <div class="col-md-2 mt-1">
    <a href="manage-data.php" class="btn btn-danger btn-block"><i class="fas fa-backward"></i> ย้อนกลับ</a>
    </div>
    <div class="container col-md-5 mt-2">
    <?php
    if(isset($errorFname))
    {
        echo "<div class='alert alert-dismissible alert-danger'>
        <button type='button' class='close' data-dismiss='alert'>&times;</button>
       <center> <strong>'".$errorFname."'</strong> </center>
        </div>";
    }
    ?>
       <form  method="post">
       <div class="jumbotron">
          <legend>แก้ไข Supervisor</legend>
           <div class="form-group">
              <label>รหัสอุปกรณ์</label><br>
              <input type="text" class="form-control" name="txt_mb_id" value="<?php echo $row["mb_id"]; ?>">
           </div>
           <div class="form-group">
              <label>ชื่ออุปกรณ์</label>
              <input type="text" class="form-control" name="txt_mb_name" value="<?php echo $row["mb_fname"]; ?>">
           </div>
           <button type="submit" name="edit-sup" class="btn btn-success btn-block mt-4"><i class="fas fa-save"></i> Save</button>
        </div>
       </form>
    </div>
</body>
</html>