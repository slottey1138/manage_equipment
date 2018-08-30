<?php
require_once("session.php");
require_once("connect.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ข้อมูลคลังอุปกรณ์</title>
    <style>
    .td1{width: 10%;}
    .td2{width: 10%;}
    .td3{width: 10%;}
    .td4{width: 10%;}
    .td5{width: 10%;}
    .td6{width: 15%;}
    </style>
  </head>
  <body>
  <?php require_once("navbar.php") ?>
    <div class="container-fluid mt-2">
   <legend>ข้อมูลอุปกรณ์ทั้งหมด</legend>
    <table class="table " id="tableData">
    <thead>
      <tr class="table table-dark">
        <th colspan="4">Equipment</th>
        <th class="td1" style=" text-align: center;">Quantity</th>
        <th class="td2" style=" text-align: center;">In use</th>
        <th class="td3" style=" text-align: center;">Broken</th>
        <th class="td4" style=" text-align: center;">Spare</th>
        <th class="td5" style=" text-align: center;">Expiry Date</th>
      </tr>
    </thead>
    <?php
    require_once("function.php");

    $sql_type = "SELECT * FROM tbl_equipment_type";
    $result = $conn->query($sql_type);

        while($row = $result->fetch_assoc()) {?>
          <tbody>
          <tr class="table-info">
              <td colspan="12"><b><?php echo $row["eq_type_name"]; ?></b></td>
          </tr>
          <?php 
          $type = $row["eq_type_name"];
          $sql_name = "SELECT * FROM tbl_equipment_name WHERE eq_name_type = '$type'";
          $result_name = $conn->query($sql_name);
          while($row_name = $result_name->fetch_assoc()) {?>
          <tr>
          <td colspan="4"><?php echo $row_name['eq_name_name'] ?></td>
               <td style=" text-align: center;"><?php echo someEQ($row_name["eq_name_name"]); ?></td>
               <td style=" text-align: center;"><?php echo someStatus($row_name["eq_name_name"],"out");?></td>
               <td style=" text-align: center;"><?php echo someStatus($row_name["eq_name_name"],"broken");?></td>
               <td style=" text-align: center;"><?php echo someStatus($row_name["eq_name_name"],"in"); ?></td>
               <td style=" text-align: center;"><?php echo $row_name['eq_name_expirydate'] ?></td>
          </tr>
          <?php } ?>
          <tr>
               <td colspan="4"><p style=" text-align: right;">Total</p></td>
               <td style=" text-align: center;"><?php echo Total($row["eq_type_name"]); ?></td>
               <td style=" text-align: center;"><?php echo someTotal($row["eq_type_name"],"out");?></td>
               <td style=" text-align: center;"><?php echo someTotal($row["eq_type_name"],"broken");?></td>
               <td style=" text-align: center;"><?php echo someTotal($row["eq_type_name"],"in");?></td>
               <td></td>
          </tr>
         </tbody>
            <?php }
    $conn->close();?>
  </table>
       <center> <button id='DLtoExcel' class="btn btn-success col-md-3 btn-lg">ส่งออกข้อมูล</button></center>
        </div>
        </br>
        <script type="text/javascript">
            var $btnDLtoExcel = $('#DLtoExcel');
            $btnDLtoExcel.on('click', function () {
              $("#tableData").excelexportjs({
                  containerid: "tableData"
                  ,datatype: 'table'
              });
            });
        </script>
  </body>
</html>
