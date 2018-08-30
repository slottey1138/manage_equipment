<?php
require_once("connect.php");

$eq_status = "in";

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>อุปกรณ์เสีย</title>

    <style>
      .td-1 { width: 8%; }
      .td-2 { width: 20%;}
      .td-3 {width: 25%;}
      .td-4 { width: 15%;}
      .td-5 {width: 15%;}
      .td-6 { width: 17%;}
    </style>
  </head>
  <body>
    <?php  include "navbar.php"; ?>
    <div class="container-fluid mt-2">

       <div class="row">
      <div class="container col-md-4">
        <input class="form-control col-md-12" id="myInput" type="text" placeholder="ใส่รหัสอุปกรณ์เพื่อค้นหา...">
      </div>
      <div class="container col-md-8">
      สถานะอุปกรณ์ : 
      <a href="equipment.php" class="btn btn-info col-md-2">ทั้งหมด</a>
      <a href="equipment-in.php" class="btn btn-info col-md-2">อยู่ในสต๊อค</a>
      <a href="equipment-out.php" class="btn btn-info col-md-2">ใช้งานอยู่</a>
      <a href="equipment-broken.php" class="btn btn-danger col-md-2">เสีย</a>
      <a href="add_equipment.php" class="btn btn-primary float-right"><i class="fa fa-plus"></i> เพิ่มอุปกรณ์</a>
      </div>
      </div>

      <table class="table table-hover mt-3">
        <thead>
          <tr class="table-primary">
            <th scope="col">ลำดับที่</th>
            <th scope="col">ชื่อ</th>
            <th scope="col">รหัสอุปกรณ์</th>
            <th scope="col">ประเภทอุปกรณ์</th>
            <th scope="col">สถานะ</th>
            <th scope="col">แก้ไข</th>
          </tr>
        </thead>
       <?php
   $sql = "SELECT * FROM tbl_equipment WHERE  eq_status = '"."broken"."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $i = 1;
      while($row = $result->fetch_assoc()) { 
        ?>
          <tbody id="myTable">
            <tr>
              <td class="td-1"><?php echo $i; ?></td>
              <td class="td-2"><?php echo $row["eq_name"]; ?></td>
              <td class="td-3"><?php echo $row["eq_serial_number"]; ?></td>
              <td class="td-4"><?php echo $row["eq_type"]; ?></td>
              <td class="td-5">
                <?php 
      if($row["eq_status"] == "in")
      {
        echo "<button type='button' class='btn btn-info btn-sm col-md-6 disabled'>In-stock</button>";
      }
      if($row["eq_status"] == "out") 
      {
        echo "<button type='button' class='btn btn-success btn-sm col-md-6 disabled'>In-use</button>";
      }
      if($row["eq_status"] == "broken")
      {
        echo "<button type='button' class='btn btn-danger btn-sm col-md-6 disabled'>Broken</button>";
      }
      ?>
              </td>
              <td class="td-6">
                <a href="edit-equipment.php?eq_id=<?php echo $row["eq_id"]; ?>" class="btn btn-warning btn-sm col-md-5"><i class="fas fa-edit"></i> แก้ไข</a>
                <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='../scripts/delete-data.php?delete-eq&eq_id=<?php echo $row["eq_id"];?>';}" 
                class="btn btn-danger btn-sm col-md-5"><i class="fas fa-trash-alt"></i> ลบ</a>
              </td>
            </tr>
          </tbody>
          <?php  $i++;}} else {echo "ไม่มีข้อมูลอุปกรณ์";}?>
      </table>
    </div>

    <script>
      $(document).ready(function () {
        $("#myInput").on("keyup", function () {
          var value = $(this).val().toLowerCase();
          $("#myTable tr").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
          });
        });
      });
    </script>
  </body>

  </html>