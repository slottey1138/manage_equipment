<?php
require_once("session.php");
require_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ข้อมูลสมาชิก</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .td-1 {
            width: 20%;
        }

        .td-2 {
            width: 50%;
        }

        .td-3 {
            width: 30%;
        }
    </style>
</head>

<body>
    <?php require_once("navbar.php"); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <legend>แผนก IT</legend>
                <table class="table table-hover mt-2">
                    <thead>
                        <tr class="table-primary">
                            <th class="td-1">รหัสประจำตัว</th>
                            <th class="td-2">ชื่อ - นามสกุล</th>
                            <th class="td-3"></th>
                        </tr>
                    </thead>
                    <?php
                       $sl_sup = "SELECT * FROM tbl_member WHERE mb_type = '"."it"."' ";
                       $result = $conn->query($sl_sup);
                       if ($result->num_rows > 0)
                       {
                        while($row = $result->fetch_assoc()) {?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $row['mb_id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['mb_fname']." ".$row['mb_lname']; ?>
                                </td>
                                <td>
                                    <a href="JavaScript:if(confirm('ต้องการลบข้อมูลผู้ใช้คนนี้ออกจากระบบ ?')==true){window.location='../scripts/delete-data.php?mb_id=
                                    <?php echo $row["mb_id"];?>&mb_fname=<?php echo $row["mb_fname"];?>';}" class="btn btn-danger btn-sm col-md-5">
                                        <i class="fas fa-trash-alt"></i> ลบ</a>
                                </td>
                            </tr>
                        </tbody>
                        <?php    }
                       }
                       ?>
                </table>
            </div>
            <div class="col-md-6">
                <legend>Supervisor</legend>
                <button type="button" class="btn btn-primary btn-sm col-md-4" data-toggle="modal" data-target="#add_sup">
                    <i class="fa fa-plus"></i> เพิ่มหัวหน้างาน
                </button>
                <table class="table table-hover mt-2">
                    <thead>
                        <tr class="table-primary">
                            <th class="td-1">รหัสประจำตัว</th>
                            <th class="td-2">ชื่อ</th>
                            <th class="td-3"></th>
                        </tr>
                    </thead>
                    <?php
                       $sl_sup = "SELECT * FROM tbl_member WHERE mb_type = '"."sup"."' ";
                       $result = $conn->query($sl_sup);
                       if ($result->num_rows > 0)
                       {
                        while($row = $result->fetch_assoc()) {?>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $row['mb_id']; ?>
                                </td>
                                <td>
                                    <?php echo $row['mb_fname']; ?>
                                </td>
                                <td>
                                    <a href="JavaScript:if(confirm('ต้องการลบข้อมูล Supervisor คนนี้ออกจากระบบ ?')==true){window.location='../scripts/delete-data.php?mb_id=<?php echo $row["mb_id"];?>&mb_fname=<?php echo $row["mb_fname"];?>';}" class="btn btn-danger btn-sm col-md-5">
                                        <i class="fas fa-trash-alt"></i> ลบ</a>
                                </td>
                            </tr>
                        </tbody>
                        <?php    }
                       }
                       ?>
                </table>
            </div>
        </div>
    </div>

    <div class="modal" id="add_sup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">เพิ่มหัวหน้างาน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../scripts/manage.php" method="post">
                        <div class="form-group">
                            <label>รหัสประจำตัว</label>
                            <input type="text" class="form-control" name="txt_mb_id">
                        </div>
                        <div class="form-group">
                            <label>ชื่อ</label>
                            <input type="text" class="form-control" name="txt_mb_name">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary col-md-3" data-dismiss="modal">ยกเลิก</button>
                    <button type="submit" name="add_sup" class="btn btn-primary col-md-3">บันทึก</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>