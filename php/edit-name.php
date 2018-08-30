<?php
session_start();
require_once("connect.php");
$eq_id = $_GET["eq_name_id"];

$sql = "SELECT * FROM tbl_equipment_name WHERE eq_name_id = '$eq_id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

if(isset($_POST["edit-name"]))
{
    $eq_id = $_POST["txt_eq_id"];
    $eq_name = $_POST["txt_eq_name"];
    $eq_type = $_POST["eq_type"];
    $eq_expiry = $_POST["txt_eq_expiry"];

    if($eq_name == "")
    {
        $error_name = "Enter equipment name !!";
    }
    else if(strlen($eq_name) < 3)
    {
        $error_name = "ชื่ออุปกรณ์สั้นเกินไป !!";
    }
    else
    {
        $sql = "UPDATE tbl_equipment_name SET eq_name_name = '$eq_name',eq_name_type ='$eq_type',
        eq_name_expirydate ='$eq_expiry' WHERE eq_name_id = '$eq_id' ";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('แก้ไขข้อมูลรายชื่ออุปกรณ์เรียบร้อย ')</script>";
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
    <title>Document</title>
</head>
<body>
    <?php require_once("navbar.php") ?>
    <div class="col-md-2 mt-1">
    <a href="manage-data.php" class="btn btn-danger btn-block"><i class="fas fa-backward"></i> ย้อนกลับ</a>
    </div>
    <div class="container col-md-5 mt-2">
    <?php if(isset($error_name)){
    echo "<div class='alert alert-dismissible alert-danger'>
             <button type='button' class='close' data-dismiss='alert'>&times;</button>
             <center>".$error_name."</center>
          </div>";
    }
    ?>
       <form action="" method="post">
       <div class="jumbotron">
          <legend>แก้ไขรายชื่ออุปกรณ์</legend>
           <div class="form-group">
              <label>รหัสอุปกรณ์</label><br>
              <input type="text" class="form-control" name="txt_eq_id" value="<?php echo $row["eq_name_id"]; ?>">
           </div>
           <div class="form-group">
              <label>ชื่ออุปกรณ์</label>
              <input type="text" class="form-control" name="txt_eq_name" value="<?php echo $row["eq_name_name"]; ?>">
           </div>
           <div class="form-group">
              <label>ชื่ออุปกรณ์</label>
              <input type="text" class="form-control" name="txt_eq_expiry" value="<?php echo $row["eq_name_expirydate"]; ?>">
           </div>
           <div class="form-group">
                        <label for="exampleSelect1">ประเภทอุปกรณ์</label>
                        <select class="form-control" name="eq_type">
                            <?php
                    $sql = "SELECT * FROM tbl_equipment_type";
                    $result = mysqli_query($conn,$sql);
                    echo "<option></option>";
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['eq_type_name']."' >".$row['eq_type_name']."</option>";
                    }
                    ?>
                        </select>
            </div>
           <button type="submit" name="edit-name" class="btn btn-success btn-block mt-4"><i class="fas fa-save"></i> Save</button>
        </div>
       </form>
    </div>
</body>
</html>