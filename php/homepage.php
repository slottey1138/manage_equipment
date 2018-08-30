<?php
require_once("session.php");
require_once("../class/class.user.php");
require_once("../class/class.service.php");

$user = new USER();
$srv = new Service();

    $mb_id = $_SESSION['mb_session'];
	
	$stmt = $user->runQuery("SELECT * FROM tbl_member WHERE mb_id=:mb_id");
	$stmt->execute(array(":mb_id"=>$mb_id));
	
    $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['getEquipment']))
{
    $eq_name = $_POST["eq_name"];
    $eq_serial_number = $_POST["eq_serial_number"];
    $eq_status = "in";
    $eq_case_name = "get";
    $case_check = "out";
    $case_sup = $_POST["sup_name"];
    $case_date = date('Y-m-d H:i:s');
    
    try
    {
        $stmt = $user->runQuery("SELECT eq_name,eq_serial_number,eq_status FROM tbl_equipment WHERE eq_name =:eq_name 
        AND eq_serial_number =:eq_serial_number AND eq_status =:case_check");

        $stmt->execute(array(
            ':eq_name' => $eq_name, ':eq_serial_number' => $eq_serial_number, ':case_check' => $case_check
        ));

        $count = $stmt->rowCount();

        if($count > 0)
        {
            if($srv->getCase($eq_status,$eq_serial_number,$eq_case_name,$eq_name,$case_sup,$case_date))
            {
                $srv->redirect('homepage.php?success_get');
            }
            else{
                $error_get[] = "บันทึกข้อมูลไม่สำเร็จ...";
            }
        }
        else
        {
            $error_get[] = "ข้อมูลอุปกรณไม่ถูกต้อง !!";
        }
       
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
}

if(isset($_POST['addEquipment']))
{
    $eq_name = $_POST["eq_name"];
    $eq_serial_number = $_POST["eq_serial_number"];
    $eq_status = "out";
    $eq_case_name = "add";
    $case_check = "in";
    $case_sup = $_POST["sup_name"];
    $case_date = date('Y-m-d H:i:s');
    
    try
    {
        $stmt = $user->runQuery("SELECT eq_name,eq_serial_number,eq_status FROM tbl_equipment WHERE eq_name =:eq_name 
        AND eq_serial_number =:eq_serial_number AND eq_status =:case_check");

        $stmt->execute(array(
            ':eq_name' => $eq_name, ':eq_serial_number' => $eq_serial_number, ':case_check' => $case_check
        ));

        $count = $stmt->rowCount();

        if($count > 0)
        {
            if($srv->takeCase($eq_status,$eq_serial_number,$eq_case_name,$eq_name,$case_sup,$case_date))
            {
                $srv->redirect('homepage.php?success_add');
            }
            else{
                $error_add[] = "บันทึกข้อมูลไม่สำเร็จ...";
            }
        }
        else
        {
            $error_add[] = "ข้อมูลอุปกรณไม่ถูกต้อง !!";
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
    <title>เบิก - จ่าย</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script>
</head>

<body>
    <?php  include "navbar.php";  ?>
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-md-4">
            <?php
			if(isset($error_get))
			{
			 	foreach($error_get as $error_get)
			 	{
					 ?>
                     <div class="alert alert-danger">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <center><i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error_get; ?></center>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['success_get']))
			{
				 ?>
                 <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <center><i class="glyphicon glyphicon-log-in"></i> &nbsp; บันทึกข้อมูลเรียบร้อย...</center>
                 </div>
                 <?php
			}
			?>
                <legend>คืนอุปกรณ์</legend>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleSelect1">ชื่ออุปกรณ์</label>
                        <select class="form-control" name="eq_name">
                    <?php
                    $stmt = $user->runQuery("SELECT * FROM tbl_equipment_name");
                    $stmt->execute(array());
                   
                    while($eq = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='".$eq['eq_name_name']."' >".$eq['eq_name_name']."</option>";
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
                   $mb_type = "sup";
                   $stmt = $user->runQuery("SELECT * FROM tbl_member WHERE mb_type = :mb_type ");
                   $stmt->execute(array(':mb_type' => $mb_type ));
                  
                   while($sup = $stmt->fetch(PDO::FETCH_ASSOC)) {
                       echo "<option value='".$sup['mb_fname']."' >".$sup['mb_fname']."</option>";
                   }
                   ?>
                        </select>
                    </div>
                    <button type="submit" name="getEquipment" class="btn btn-success btn-block">
                        <i class="fas fa-save"></i> บันทึก</button>
                </form>
            </div>
            <div class="col-md-4">
            <?php
			if(isset($error_add))
			{
			 	foreach($error_add as $error_add)
			 	{
					 ?>
                     <div class="alert alert-danger">
                     <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <center><i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error_add; ?></center>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['success_add']))
			{
				 ?>
                 <div class="alert alert-success">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <center><i class="glyphicon glyphicon-log-in"></i> &nbsp; บันทึกข้อมูลเรียบร้อย...</center>
                 </div>
                 <?php
			}
			?>
                <legend>เบิกอุปกรณ์</legend>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleSelect1">ชื่ออุปกรณ์</label>
                        <select class="form-control" name="eq_name">
                    <?php
                    $stmt = $user->runQuery("SELECT * FROM tbl_equipment_name");
                    $stmt->execute(array());
                   
                    while($eq = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='".$eq['eq_name_name']."' >".$eq['eq_name_name']."</option>";
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
                           $mb_type = "sup";
                           $stmt = $user->runQuery("SELECT * FROM tbl_member WHERE mb_type = :mb_type ");
                           $stmt->execute(array(':mb_type' => $mb_type ));
                  
                           while($sup = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='".$sup['mb_fname']."' >".$sup['mb_fname']."</option>";
                          }
                         ?>
                        </select>
                    </div>
                    <button type="submit" name="addEquipment" class="btn btn-success btn-block">
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
                    $stmt = $user->runQuery("SELECT * FROM tbl_equipment_name");
                    $stmt->execute(array());
                   
                    while($eq = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='".$eq['eq_name_name']."' >".$eq['eq_name_name']."</option>";
                    }
                    ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>รหัสอุปกรณ์</label>
                        <input type="text" class="form-control" name="get_eq_serial_number">
                    </div>
                    <legend>เป็นอุปกรณ์</legend>
                    <div class="form-group">
                        <label for="exampleSelect1">ชื่ออุปกรณ์</label>
                        <select class="form-control" name="add_eq_name">
                    <?php
                    $stmt = $user->runQuery("SELECT * FROM tbl_equipment_name");
                    $stmt->execute(array());
                   
                    while($eq = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='".$eq['eq_name_name']."' >".$eq['eq_name_name']."</option>";
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
                           $mb_type = "sup";
                           $stmt = $user->runQuery("SELECT * FROM tbl_member WHERE mb_type = :mb_type ");
                           $stmt->execute(array(':mb_type' => $mb_type ));
                  
                           while($sup = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='".$sup['mb_fname']."' >".$sup['mb_fname']."</option>";
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