<?php
require_once("session.php");
require_once("../class/class.equipment.php");

$edit = new Equipment();

$eq_id = $_GET["eq_id"];
$eq_type = $_GET["eq_type"];

if(isset($_POST["btn-edit"]))
{
  $eq_id = $_POST["eq_id"]; $eq_status = $_POST["eq_status"];

  try
  {
    if($edit->updateEq($eq_id,$eq_status))
    {
        if($eq_status == "out" ){
          $edit->redirect("equipment-out.php");
        }
        else if($eq_status == "in"){
          $edit->redirect("equipment-in.php");
        }
        else{
          $edit->redirect("equipment-broken.php");
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
    <title>แก้ไขข้อมูลอุปกรณ์</title>
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
            <th scope="col">ชื่ออุปกรณ์</th>
            <th scope="col">รหัสอุปกรณ์</th>
            <th scope="col">ประเภทอุปกรณ์</th>
            <th scope="col">สถานะ</th>
            <th scope="col">แก้ไข</th>
          </tr>
        </thead>
        <?php
       $select_eq = $edit->runQuery("SELECT * FROM tbl_equipment WHERE eq_id = :eq_id ");
       $select_eq->execute(array( ':eq_id' => $eq_id ));

       $row = $select_eq->fetch(PDO::FETCH_ASSOC);
      ?>
          <form action="" method="post">
          <input type="hidden" name="eq_id" value="<?php echo $eq_id; ?>"/>
          <tbody>
            <tr>
              <td class="td-2">
              <input class="form-control" id="disabledInput" name="eq_name"  disabled="" value="<?php echo $row["eq_name"]; ?>" type="text">
              </td>
              <td class="td-3">
                <input type="text" class="form-control" name="eq_serial_number"  disabled="" value="<?php echo $row["eq_serial_number"]; ?>"/> </td>
              <td class="td-4">
               <input type="text" class="form-control" name="eq_type"  disabled="" value="<?php echo $row["eq_type"]; ?>"/> </td>
              </td>
              <td class="td-5">
                <select class="form-control" id="exampleSelect1" name="eq_status">
                  <option  value="broken" >Broken</option>
                  <option  value="out" >In use</option>
                  <option  value="in" >In Stock</option>
                </select>
              </td>
              <td class="td-6">
                <button type="submit" class="btn btn-success btn-block" name="btn-edit">
                  <i class="fa fa-save"></i> บันทึก</button>
              </td>
            </tr>
          </tbody>
          </form>
      </table>
    </div>
   
  </body>
  </html>