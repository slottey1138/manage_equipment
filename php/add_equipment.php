<?php
require_once("session.php");
require_once("connect.php");

if(isset($_POST["add_equipment"]))
{
    $eq_serial_number = $_POST["eq_serial_number"];
    $eq_serial_number = preg_replace('/[ ,]+/', '', $eq_serial_number);
    $eq_name = $_POST["eq_name"];  $result_eq_name = explode('|', $eq_name); $eq_status = "in";

    $check_eq = "SELECT * FROM tbl_equipment WHERE eq_name = '$result_eq_name[0]' AND eq_serial_number = '$eq_serial_number'
    AND eq_type = '$result_eq_name[1]' ";
    $query_eq = mysqli_query($conn, $check_eq);
    if(mysqli_num_rows($query_eq) == 1)
    {
        $error[] = "มีข้อมูลอุปกรณ์นี้อยู่ในระบบแล้ว !";
    }
    else {
        $insert_eq = "INSERT INTO tbl_equipment (eq_name,eq_serial_number,eq_type,eq_status)
        VALUES ('$result_eq_name[0]','$eq_serial_number','$result_eq_name[1]','$eq_status')";
        $result = mysqli_query($conn, $insert_eq);
        if($result)
        {
            $success[] = "";
        }
        else{
            $error[] = "เพิ่มอุปกรณ์ม่สำเร็จ !";
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
    <title>เพิ่มอุปกรณ์</title>
    <script src="../js/check_register.js"></script>
</head>
<body>
    <?php require_once("navbar.php"); ?>

    <div class="container-fluid">
          <div class="container col-md-6 mt-4">
          <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                    <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <center><b><?php echo $error; ?></b></center>
                    </div>
                     <?php
				}
            }
            else if(isset($success))
			{
				 ?>
                 <div class="alert alert-dismissible alert-success">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                       <center><b>เพิ่มอุปกรณ์เสร็จเรียบร้อย...<a href="equipment-in.php"> ตรวจสอบ</a></b></center>
                 </div>
                 <?php
			}
            ?>
             <div class="container col-md-12">
             <legend>เพิ่มอุปกรณ์</legend>
               <form action="" method="post" name="add_eq" onsubmit="return checkEq()">
                     <div class="form-group">
                          <label>รหัสอุปกรณ์</label>
                          <input type="text" class="form-control" name="eq_serial_number" >
                     </div>
                     <div class="form-group">
                        <label for="exampleSelect1">ชื่ออุปกรณ์</label>
                        <select class="form-control" name="eq_name">
                    <?php
                    $sql = "SELECT * FROM tbl_equipment_name";
                    $result = mysqli_query($conn,$sql);
                    echo "<option></option>";
                    while($row = $result->fetch_assoc()) {?>
                        <option value="<?php echo $row["eq_name_name"];?>|<?php echo $row["eq_name_type"];?>"><?php echo $row["eq_name_name"];?></option>
                    <?php } ?>
                        </select>
                    </div>
                    <button type="submit" name="add_equipment" class="btn btn-primary col-md-3">บันทึก</button>
               </form>
             </div>
          </div>
    </div>
</body>
</html>