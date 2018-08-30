<?php
require_once("connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เบิก - จ่าย</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script>
        function checkAvailability() {
            jQuery.ajax({
                url: "check_availability.php",
                data: 'username=' + $("#username").val(),
                type: "POST",
                success: function (data) {
                    $("#user-availability-status").html(data);
                },
                error: function () {}
            });
        }
    </script>
</head>

<body>
    <?php  include "navbar.php";  ?>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-4">
                <legend>คืนอุปกรณ์</legend>
                <form action="../scripts/service.php" method="post">
                    <div class="form-group">
                        <label for="exampleSelect1">ชื่ออุปกรณ์</label>
                        <select class="form-control" name="eq_name">
                            <?php
                    $sql = "SELECT * FROM tbl_equipment_name";
                    $result = mysqli_query($conn,$sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['eq_name_name']."' >".$row['eq_name_name']."</option>";
                    }
                    ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>รหัสอุปกรณ์</label>
                        <input name="eq_serial_number" type="text" class="form-control">
					<span id="user-availability-status"></span>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Supervisor</label>
                        <select class="form-control" name="sup_name">
                            <?php
                    $sql = "SELECT * FROM tbl_member WHERE mb_type = '"."sup"."' ";
                    $result = mysqli_query($conn,$sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['mb_fname']."' >".$row['mb_fname']."</option>";
                    }
                    ?>
                        </select>
                    </div>
                    <button type="submit" name="get_equipment" class="btn btn-success btn-block">
                        <i class="fas fa-save"></i> บันทึก</button>
                </form>
            </div>
            <div class="col-md-4">
                <legend>เบิกอุปกรณ์</legend>
                <form action="../scripts/service.php" method="post">
                    <div class="form-group">
                        <label for="exampleSelect1">ชื่ออุปกรณ์</label>
                        <select class="form-control" name="eq_name">
                            <?php
                    $sql = "SELECT * FROM tbl_equipment_name";
                    $result = mysqli_query($conn,$sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['eq_name_name']."' >".$row['eq_name_name']."</option>";
                    }
                    ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>รหัสอุปกรณ์</label>
                        <input type="text" class="form-control" name="eq_serial_number">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Supervisor</label>
                        <select class="form-control" name="sup_name">
                            <?php
                    $sql = "SELECT * FROM tbl_member WHERE mb_type = '"."sup"."' ";
                    $result = mysqli_query($conn,$sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['mb_fname']."' >".$row['mb_fname']."</option>";
                    }
                    ?>
                        </select>
                    </div>
                    <button type="submit" name="add_equipment" class="btn btn-success btn-block">
                        <i class="fas fa-save"></i> บันทึก</button>
                </form>
            </div>
            <div class="col-md-4">
                <legend>เปลี่ยนอุปกรณ์</legend>
                <form action="../scripts/service.php" method="post">
                    <div class="form-group">
                        <label for="exampleSelect1">ชื่ออุปกรณ์</label>
                        <select class="form-control" name="get_eq_name">
                            <?php
                    $sql = "SELECT * FROM tbl_equipment_name";
                    $result = mysqli_query($conn,$sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option>".$row['eq_name_name']."</option>";
                    }
                    ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>รหัสอุปกรณ์</label>
                        <input type="text" class="form-control" name="get_eq_serial_number">
                    </div>
                    <legend>เป็น</legend>
                    <div class="form-group">
                        <label for="exampleSelect1">ชื่ออุปกรณ์</label>
                        <select class="form-control" name="add_eq_name">
                            <?php
                    $sql = "SELECT * FROM tbl_equipment_name";
                    $result = mysqli_query($conn,$sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option>".$row['eq_name_name']."</option>";
                    }
                    ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>รหัสอุปกรณ์</label>
                        <input type="text" class="form-control" name="add_eq_serial_number">
                    </div>
                    <div class="form-group">
                        <label for="exampleSelect1">Supervisor</label>
                        <select class="form-control" name="sup_name">
                            <?php
                    $sql = "SELECT * FROM tbl_member WHERE mb_type = '"."sup"."' ";
                    $result = mysqli_query($conn,$sql);
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['mb_fname']."' >".$row['mb_fname']."</option>";
                    }
                    ?>
                        </select>
                    </div>
                    <button type="submit" name="change_equipment" class="btn btn-success btn-block">
                        <i class="fas fa-save"></i> บันทึก</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>