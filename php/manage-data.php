<?php
require_once("session.php");
require_once("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ข้อมูลอุปกรณ์</title>
  <style>
    .t1 {width: 10%;}
    .t2 { width: 30%;}
    .t3 { width: 20%;}
    .t4 {width: 35%; } .t5{width: 20%;}
  </style>
</head>

<body>
  <?php  include "navbar.php";  ?>
  <div class="container-fluid mt-2">
    <div class="row">

      <div class="col-md-6">
        <legend>ชื่ออุปกรณ์</legend>
        <button type="button" class="btn btn-primary col-md-4 mb-3" data-toggle="modal" data-target="#add_eq_name"><i class="fas fa-plus"></i> เพิ่มชื่ออุปกรณ์</button>
        <table class="table table-hover">
          <thead>
            <tr class="table-active">
              <th class="t1">รหัส</th>
              <th class="t2">ชื่ออุปกรณ์</th>
              <th class="t3"></th>
            </tr>
          </thead>
          <?php
              $sql = "SELECT * FROM tbl_equipment_name ORDER BY eq_name_id";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) { ?>
            <tbody>
              <tr class="table-active">
                <td>
                  <?php echo $row["eq_name_id"]; ?>
                </td>
                <td>
                  <?php echo $row["eq_name_name"]; ?>
                </td>
                <td>
                  <a href="edit-name.php?eq_name_id=<?php echo $row["eq_name_id"];?>" class="btn btn-warning btn-sm col-md-5">
                    <i class="fas fa-edit"></i>
                  </a>
                    <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='../scripts/delete-data.php?delete-eq-name&eq_name_id=<?php echo $row["eq_name_id"];?>
                    ';}" class="btn btn-danger btn-sm col-md-5" ><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
            </tbody>
            <?php }} else {echo "0 results";}?>
        </table>
      </div>
      <div class="col-md-6">
        <legend>ประเภทอุปกรณ์</legend>
        <button type="button" class="btn btn-primary col-md-4 mb-3" data-toggle="modal" data-target="#add_eq_type"><i class="fas fa-plus"></i> เพิ่มประเภทอุปกรณ์</button>
        <table class="table table-hover">
          <thead>
            <tr class="table-active">
              <th class="t1">รหัส</th>
              <th class="t2">ชื่อ</th>
              <th class="t3"></th>
            </tr>
          </thead>
          <?php
              $sql = "SELECT * FROM tbl_equipment_type ORDER BY eq_type_id";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) { ?>
            <tbody>
              <tr class="table-active">
                <td>
                  <?php echo $row["eq_type_id"]; ?>
                </td>
                <td>
                  <?php echo $row["eq_type_name"]; ?>
                </td>
                <td>
                  <a href="edit-type.php?eq_type_id=<?php echo $row["eq_type_id"]; ?>" class="btn btn-warning btn-sm col-md-5">
                    <i class="fas fa-edit"></i>
                  </a>
                  <a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='../scripts/delete-data.php?delete-type&eq_type_id=<?php echo $row["eq_type_id"];?>';}" class="btn btn-danger btn-sm col-md-5" ><i class="fas fa-trash-alt"></i></a>
                </td>
              </tr>
            </tbody>
            <?php }} else {echo "0 results";}?>
        </table>
      </div>
      
    </div>
  </div>


  <div class="container-fluid">
    <div class="modal" id="add_eq_name" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มข้อมูลชื่ออุปกรณ์</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="../scripts/manage.php" method="post">
              <div class="group-control">
                <label>รหัสอุปกรณ์</label>
                <input type="text" name="eq_name_id" class="form-control" />
              </div>
              <br>
              <div class="group-control">
                <label>ชื่ออุปกรณ์</label>
                <input type="text" name="eq_name_name" class="form-control" />
              </div><br>
              <div class="form-group">
                        <label for="exampleSelect1">ประเภทอุปกรณ์</label>
                        <select class="form-control" name="eq_name_type">
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
                <div class="group-control">
                    <label>วันหมดประกัน</label>
                    <input type="text" name="eq_name_expiry" class="form-control" />
              </div><br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary col-md-4" data-dismiss="modal">ยกเลิก</button>
            <input  type="submit" name="add_name" value="บันทึก" class="btn btn-primary col-md-4"/>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="modal" id="add_eq_type" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">เพิ่มข้อมูลชื่ออุปกรณ์</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="../scripts/manage.php" method="post">
              <div class="group-control">
                <label>รหัสประเภทอุปกรณ์</label>
                <input type="text" name="eq_type_id" class="form-control" />
              </div>
              <br>
              <div class="group-control">
                <label>ชื่อประเภทอุปกรณ์</label>
                <input type="text" name="eq_type_name" class="form-control" />
              </div>
              <br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary col-md-4" data-dismiss="modal">ยกเลิก</button>
            <input  type="submit" name="add_type" value="บันทึก" class="btn btn-primary col-md-4"/>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>