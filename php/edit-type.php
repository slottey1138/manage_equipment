<?php
require_once("session.php");
require_once("connect.php");
$eq_id = $_GET["eq_type_id"];

$sql = "SELECT * FROM tbl_equipment_type WHERE eq_type_id = '$eq_id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

if(isset($_POST["edit-type"]))
{
    $eq_id = $_POST["txt_eq_id"];
    $eq_name = $_POST["txt_eq_name"];

   if($eq_name == "")
   {
       $error_name = "โปรดใส่ชื่อประเภทอุปกรณ์ !!";
   }
   else if(strlen($eq_name) < 3)
   {
       $error_name = "ชื่อประเภทอุปกรณ์สั้นเกินไป !!";
   }
   else {
    $sql = "UPDATE tbl_equipment_type SET eq_type_name = '$eq_name' WHERE eq_type_id = '$eq_id' ";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully')</script>";
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
       if(isset($error_name))
       {
           echo "<div class='alert alert-dismissible alert-danger'>
           <button type='button' class='close' data-dismiss='alert'>&times;</button>
           <center><strong>".$error_name."</strong></center>
         </div>";
       }
    ?>
       <form method="post">
       <div class="jumbotron">
          <legend>แก้ไขประเภทชื่ออุปกรณ์</legend>
           <div class="form-group">
              <label>รหัสอุปกรณ์</label><br>
              <input type="text" class="form-control" name="txt_eq_id" value="<?php echo $row["eq_type_id"]; ?>">
           </div>
           <div class="form-group">
              <label>ชื่ออุปกรณ์</label>
              <input type="text" class="form-control" name="txt_eq_name" value="<?php echo $row["eq_type_name"]; ?>">
           </div>
           <button type="submit" name="edit-type" class="btn btn-success btn-block mt-4"><i class="fas fa-save"></i> Save</button>
        </div>
       </form>
    </div>
</body>
</html>