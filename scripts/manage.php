<?php
require_once("../php/connect.php");

if(isset($_POST["add_type"]))
{
    $eq_type_id = $_POST["eq_type_id"];
    $eq_type_name = $_POST["eq_type_name"];


    $check_type = "SELECT * FROM tbl_equipment_type WHERE eq_type_id = '$eq_type_id'";
    $query_type = mysqli_query($conn, $check_type);
    if(mysqli_num_rows($query_type) == 0)
    {
       $check_type_name = "SELECT * FROM tbl_equipment_type WHERE eq_type_name = '$eq_type_name'";
       $query_type_name = mysqli_query($conn, $check_type_name);
       if(mysqli_num_rows($query_type_name) == 0)
       {
        $insert_eq_type = "INSERT INTO tbl_equipment_type (eq_type_id,eq_type_name) VALUES ('$eq_type_id','$eq_type_name')";
        if ($conn->multi_query($insert_eq_type) === TRUE) 
        {
            echo "<script>alert('เพิ่มรายชื่อประเภทอุปกรณ์เสร็จเรียบร้อยแล้ว')</script>";
            echo "<script>location='../php/manage-data.php'</script>";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
       }
       else{
        echo "<script>alert('มีชื่ออุปกรณ์นี้อยู่ในระบบแล้ว !!')</script>";
        echo "<script>location='../php/manage.php'</script>";
    }
    }
    else{
        echo "<script>alert('มีรหัสอุปกรณ์นี้อยู่ในระบบแล้ว !!')</script>";
        echo "<script>location='../php/manage.php'</script>";
    }
}
if(isset($_POST["add_name"]))
{
    $eq_name_id = $_POST["eq_name_id"];
    $eq_name_name = $_POST["eq_name_name"];
    $eq_name_type = $_POST["eq_name_type"];
    $eq_name_expiry = $_POST["eq_name_expiry"];

    $check_name = "SELECT * FROM tbl_equipment_name WHERE eq_name_id = '$eq_name_id'";
    $query_name = mysqli_query($conn, $check_name);
    if(mysqli_num_rows($query_name) == 0)
    {
        $check_name_name = "SELECT * FROM tbl_equipment_name WHERE eq_name_name = '$eq_name_name'";
        $query_name_name = mysqli_query($conn, $check_name_name);
       if(mysqli_num_rows($query_name_name) == 0)
       {
        $insert_eq_name = "INSERT INTO tbl_equipment_name (eq_name_id,eq_name_name,eq_name_type,eq_name_expirydate)
         VALUES ('$eq_name_id','$eq_name_name','$eq_name_type','$eq_name_expiry')";
        if ($conn->multi_query($insert_eq_name) === TRUE) 
        {
            echo "<script>alert('เพิ่มชื่ออุปกรณ์เสร็จเรียบร้อยแล้ว')</script>";
            echo "<script>location='../php/manage-data.php'</script>";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
       }
       else{
        echo "<script>alert('มีชื่ออุปกรณ์นี้ในระบบแล้ว !!')</script>";
        echo "<script>location='../php/manage-data.php'</script>";
       }
    }
    else{
        echo "<script>alert('มีรหัสชื่ออุปกรณ์นี้ในระบบแล้ว !!')</script>";
        echo "<script>location='../php/manage-data.php'</script>";
    }
    $conn->close();

}


if(isset($_POST["add_sup"]))
{
    $mb_id = $_POST["txt_mb_id"];
    $mb_name = $_POST["txt_mb_name"];
    $mb_type = "sup";

    $check_sup = "SELECT * FROM tbl_member WHERE mb_id = '$mb_id'";
    $query_sup = mysqli_query($conn, $check_sup);
    if(mysqli_num_rows($query_sup) == 0)
    {
        $insert_sup = "INSERT INTO tbl_member (mb_id,mb_fname,mb_type) VALUES ('$mb_id','$mb_name','$mb_type')";
        if ($conn->query($insert_sup) === TRUE) {
            echo "<script>alert('เพิ่มหัวหน้างานเสร็จเรียบร้อย')</script>";
            echo "<script>location='../php/manage-member.php'</script>";
        } else {
            echo "Error: " . $insert_sup . "<br>" . $conn->error;
        }
    }
    else{
        echo "<script>alert('มีรหัสผู้ใช้นี้อยู่ในระบบแล้ว')</script>";
        echo "<script>location='../php/manage-member.php'</script>";
    }
}

if(isset($_POST["edit-equipment"]))
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
        echo "<script>alert('แก้ไขข้อมูลอุปกรณ์เรียบร้อยแล้ว')</script>";
        echo "<script>location='../php/view-detail.php?".$eq_name_name."'</script>";
       }
       else
       {
         echo "<script>alert(''Error)</script>";
         echo "<script>location='view-detail'</script>";
       }
}
?>