<?php
require_once("../php/connect.php");

if(isset($_GET["delete-eq-name"]))
{
    $eq_name_id = $_GET["eq_name_id"];
    $sql = "DELETE FROM tbl_equipment_name WHERE eq_name_id = '$eq_name_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>location='../php/manage-data.php'</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
if(isset($_GET["delete-type"]))
{
    $eq_type_id = $_GET["eq_type_id"];
    $sql = "DELETE FROM tbl_equipment_type WHERE eq_type_id = '$eq_type_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>location='../php/manage-data.php'</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
if(isset($_GET["mb_id"]) && $_GET["mb_fname"])
{
    $mb_id = $_GET["mb_id"];
    $sql = "DELETE FROM tbl_member WHERE mb_id = '$mb_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>location='../php/manage-member.php'</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
if(isset($_GET["delete-eq"]))
{
    $eq_id = $_GET["eq_id"];
    $sql = "DELETE FROM tbl_equipment WHERE eq_id = '$eq_id'";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        echo "<script>location='../php/equipment-broken.php'</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>