<?php
require_once("../php/connect.php");

if(isset($_POST["add_equipment"]))
{
    $eq_name = $_POST["eq_name"];
    $eq_serial_number = $_POST["eq_serial_number"];
    $eq_status = "out";
    $eq_case_name = "add";
    $supervisor = $_POST["sup_name"];
    $date = date('Y-m-d H:i:s');

    $check_out = "SELECT * FROM tbl_equipment WHERE eq_serial_number = '$eq_serial_number' AND eq_name = '$eq_name'
    AND eq_status = '"."in"."' ";
    $query  = mysqli_query($conn, $check_out);
    if(mysqli_num_rows($query) == 1)
    {
        $up_status = "UPDATE tbl_equipment SET eq_status ='$eq_status' WHERE eq_serial_number = '$eq_serial_number'
        AND eq_name = '$eq_name' ";
        $query_up = mysqli_query($conn, $up_status);
        if($query_up)
        {
           $insert_case_add = "INSERT INTO tbl_case (case_name,case_add_eq,case_add_serial,case_sup,case_date)
           VALUE('$eq_case_name','$eq_name','$eq_serial_number','$supervisor','$date')";
           $query_case = mysqli_query($conn, $insert_case_add);
           if($query_case)
           {
            echo "<script>alert('บันทึกข้อมูลการคืนอุปกรณ์เสร็จเรียบร้อย')</script>";
            echo "<script>location='../php/homepage.php'</script>";
           }
           else 
           {
            echo "<script>alert('บันทึกข้อมูลไม่สำเร็จ')</script>";
            echo "<script>location='../php/homepage.php'</script>";
           }
        }
        else 
        {
            echo "<script>alert('สถานะของอุปกรณ์ไม่ถูกต้อง !!')</script>";
            echo "<script>location='../php/homepage.php'</script>";
        }
    }
    else {
        echo "<script>alert('ข้อมูลชื่ออุปกรณ์ หรือ สถานะ และ รหัสอุปกรณ์ไม่ถูกต้อง !!')</script>";
        echo "<script>location='../php/homepage.php'</script>";
    }
}

if(isset($_POST["get_equipment"]))
{
    $eq_name = $_POST["eq_name"];
    $eq_serial_number = $_POST["eq_serial_number"];
    $eq_status = "in";
    $eq_case_name = "get";
    $supervisor = $_POST["sup_name"];
    $date = date('Y-m-d H:i:s');

    $check_in = "SELECT * FROM tbl_equipment WHERE eq_serial_number = '$eq_serial_number' 
    AND eq_name = '$eq_name' AND eq_status = '"."out"."'" ;
    $query = mysqli_query($conn, $check_in);
    if(mysqli_num_rows($query) == 1) {
        $up_status = "UPDATE tbl_equipment SET eq_status = '$eq_status' WHERE eq_serial_number = '".$eq_serial_number."'
        AND eq_name = '".$eq_name."'";
        $query_up = mysqli_query($conn, $up_status);
        if($query_up)
        {
            $insert_case_get = "INSERT INTO tbl_case (case_name,case_get_eq,case_get_serial,case_sup,case_date)
             VALUE('$eq_case_name','$eq_name','$eq_serial_number','$supervisor','$date')";
             $query_case = mysqli_query($conn, $insert_case_get);
             if($query_case)
             {
                echo "<script>alert('บันทึกการเก็บอุปกรณ์เสร็จสมบูรณ์')</script>";
                echo "<script>location='../php/homepage.php'</script>";
             }
        else 
           {
            echo "<script>alert('บันทึกข้อมูลไม่สำเร็จ')</script>";
            echo "<script>location='../php/homepage.php'</script>";
           }
        }
        else 
        {
            echo "<script>alert('สถานะของอุปกรณ์ไม่ถูกต้อง !!')</script>";
            echo "<script>location='../php/homepage.php'</script>";
        }
        $conn->close();
    }
    else
    {
        echo "<script>alert('ข้อมูลชื่ออุปกรณ์ หรือ สถานะ และ รหัสอุปกรณ์ไม่ถูกต้อง')</script>";
        echo "<script>location='../php/homepage.php'</script>";
    }
}

if(isset($_POST["change_equipment"]))
{
    $get_eq_name = $_POST["get_eq_name"];
    $get_eq_serial_number = $_POST["get_eq_serial_number"];
    $get_eq_status = "in";
    $add_eq_name = $_POST["add_eq_name"];
    $add_eq_serial_number = $_POST["add_eq_serial_number"];
    $add_eq_status = "out";
    $supervisor = $_POST["sup_name"];
    $date = date('Y-m-d H:i:s');
    $eq_case_name = "change";

    $check_get = "SELECT * FROM tbl_equipment WHERE eq_serial_number = '$get_eq_serial_number' AND eq_name = '$get_eq_name'
    AND eq_status = '"."out"."' ";
    $query_check_get = mysqli_query($conn, $check_get);
    if(mysqli_num_rows($query_check_get) == 1)
    {
        $check_add = "SELECT * FROM tbl_equipment WHERE eq_serial_number = '$add_eq_serial_number' AND eq_name = '$add_eq_name'
        AND eq_status ='"."in"."'";
        $query_check_add = mysqli_query($conn, $check_add);
        if(mysqli_num_rows($query_check_add) == 1)
        {
            $insert_case_change = "INSERT INTO tbl_case (case_name,case_get_eq,case_get_serial,case_add_eq,case_add_serial,case_sup,case_date)
            VALUE ('$eq_case_name','$get_eq_name','$get_eq_serial_number','$add_eq_name','$add_eq_serial_number','$supervisor','$date') ";
            $query_case_insert = mysqli_query($conn, $insert_case_change);
            if($query_case_insert)
            {
                echo "<script>alert('บันทึกข้อมูลการเปลี่ยนแปลงอุปกรณ์เสร็จสมบูรณ์')</script>";
                echo "<script>location='../php/homepage.php'</script>";
            }
        }
        else
        {
            echo "<script>alert('ข้อมูลอุปกรณ์ที่เบิกไม่ถูกต้อง !!')</script>";
            echo "<script>location='../php/homepage.php'</script>";
        }
    }
    else
    {
        echo "<script>alert('ข้อมูลอุปกรณ์ที่คืนไม่ถูกต้อง !!')</script>";
        echo "<script>location='../php/homepage.php'</script>";
    }
}
?>