<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    require_once("testFunction.php");

    $table = "tbl_equipment";
    $condition = "eq_type = '"."Amplifier"."' AND eq_status ='"."in"."' ";
    $result = selectQuery($table,$condition);
    if(!$result)
    {
        echo "Record not found<br>";
    }
    else
    {
         while($row = mysqli_fetch_array($result))
         {
             echo $row["eq_name"]." ".$row["eq_type"]."<br>";
             
         }
    }

?>
</body>
</html>