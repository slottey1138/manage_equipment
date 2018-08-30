<?php
require_once("connect.php");

$eq_id = $_GET["eq_id"];

if(isset($_POST["btn-edit"]))
{
  $eq_id = $_POST["eq_id"];
  $eq_name = $_POST["eq_name"];
  $eq_serial_number = $_POST["eq_serial_number"];
  $eq_type = $_POST["eq_type"];
  $eq_status = $_POST["eq_status"];
  $eq_name_name = $_POST["eq_name_name"];

     $update_eq = "UPDATE tbl_equipment SET  eq_serial_number = '$eq_serial_number',
     eq_type = '$eq_type',
     eq_status = '$eq_status'
     WHERE eq_id = '$eq_id'";
     if($conn->query($update_eq) === true )
     {
       if($eq_status == "broken")
       {
        echo "<script>alert('แก้ไขข้อมูลอุปกรณ์เรียบร้อยแล้ว')</script>";
        echo "<script>location='equipment-broken.php'</script>";
       }
       else if($eq_status == "in")
       {
        echo "<script>alert('แก้ไขข้อมูลอุปกรณ์เรียบร้อยแล้ว')</script>";
        echo "<script>location='equipment-in.php'</script>";
       }
       else {
        echo "<script>alert('แก้ไขข้อมูลอุปกรณ์เรียบร้อยแล้ว')</script>";
        echo "<script>location='equipment-out.php'</script>";
       }
     }
     else
     {
       echo "<script>alert(''Error)</script>";
       echo "<script>location='view-detail'</script>";
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
    <style>
      .td-1 { width: 8%;}
      .td-2 {width: 20%;}
      .td-3 {width: 25%;}
      .td-4 {width: 15%;}
      .td-5 {width: 15%;}
      .td-6 {width: 17%;}
    </style>
  </head>

  <body>
    <?php  include "navbar.php";  ?>
    <div class="container-fluid mt-3">
      <table class="table table-hover">
        <thead>
          <tr class="table-primary">
            <th scope="col">ชื่อ</th>
            <th scope="col">รหัสอุปกรณ์</th>
            <th scope="col">ประเภทอุปกรณ์</th>
            <th scope="col">สถานะ</th>
            <th scope="col">แก้ไข</th>
          </tr>
        </thead>
        <?php
   $sql = "SELECT * FROM tbl_equipment WHERE eq_id = '$eq_id' ";
  $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      ?>
          <form action="" method="post">
          <input type="hidden" name="eq_id" value="<?php echo $eq_id; ?>"/>
          <input type="hidden" name="eq_name_name" value="<?php echo $eq_name_name; ?>">
          <tbody>
            <tr>
              <td class="td-2">
              <input class="form-control" id="disabledInput" name="eq_name" value="<?php echo $row["eq_name"]; ?>" type="text">
              </td>
              <td class="td-3">
                <input type="text" class="form-control" name="eq_serial_number" value="<?php echo $row["eq_serial_number"]; ?>"/> </td>
              <td class="td-4">
                <select class="form-control" id="exampleSelect1" name="eq_type">
                  <?php
                   $sql = "SELECT * FROM tbl_equipment_type";
                   $result = $conn->query($sql);
                   if ($result->num_rows > 0){
                   while($row = $result->fetch_assoc()){
                   echo "<option value='".$row["eq_type_name"]."'>";
                   echo $row["eq_type_name"];
                   echo "</option>";
                   }
                ?>
                </select>
              </td>
              <td class="td-5">
                <select class="form-control" id="exampleSelect1" name="eq_status">
                  <option value="out">In use</option>
                  <option value="in">In Stock</option>
                  <option value="broken">Broken</option>
                </select>
              </td>
              <td class="td-6">
                <button type="submit" class="btn btn-success btn-block" name="btn-edit">
                  <i class="fa fa-save"></i> บันทึก</button>
              </td>
            </tr>
          </tbody>
          </form>
          <?php  }} else {echo "ไม่มีข้อมูลอุปกรณ์";}?>
      </table>
    </div>
  </body>
  </html>