<?php
function selectQuery($table,$condition)
{
    $con = mysqli_connect("localhost","root","12345678","manage_equipment")or die ("Error");

    $sql = "SELECT * FROM $table WHERE $condition ";
    $query = mysqli_query($con, $sql);
    return $query;
}
?>