<?php


function someEQ($value)
{
    $conn = mysqli_connect("localhost","root","12345678","manage_equipment")or die ("Error");

    $result = mysqli_query($conn, "SELECT COUNT(*) AS `total` FROM `tbl_equipment` WHERE eq_name = '$value'");
    $row = mysqli_fetch_array($result);
    $count = $row['total'];
    return $count;
}
function someStatus($value,$status)
{
    $conn = mysqli_connect("localhost","root","12345678","manage_equipment")or die ("Error");

    $result = mysqli_query($conn, "SELECT COUNT(*) AS `total` FROM `tbl_equipment` WHERE eq_name = '$value' AND eq_status ='$status' ");
    $row = mysqli_fetch_array($result);
    $count = $row['total'];
    return $count;
}
function Total($value)
{
    $conn = mysqli_connect("localhost","root","12345678","manage_equipment")or die ("Error");

    $result = mysqli_query($conn, "SELECT COUNT(*) AS `total` FROM `tbl_equipment` WHERE eq_type = '$value'");
    $row = mysqli_fetch_array($result);
    $count = $row['total'];
    return $count;
}
function someTotal($value,$status)
{
    $conn = mysqli_connect("localhost","root","12345678","manage_equipment")or die ("Error");

    $result = mysqli_query($conn, "SELECT COUNT(*) AS `total` FROM `tbl_equipment` WHERE eq_type = '$value' AND eq_status ='$status'");
    $row = mysqli_fetch_array($result);
    $count = $row['total'];
       return $count;
}
?>