<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="../css/cosmo.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
    <script src="../js/jquery.tabledit.js"></script>
    <script src='../js/excelexportjs.js'></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">  
    <style>
     body{
        font-family: 'Kanit', sans-serif;
        color: #000;
     }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="homepage.php"> เบิก-จ่าย</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="manage-data.php">ข้อมูลอุปกรณ์</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="equipment.php">จัดการอุปกรณ์</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="manage-member.php">ข้อมูลสมาชิก</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="case.php">ประวัติการเบิก-จ่าย</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="export.php">ข้อมูลคลังอุปกรณ์</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="logout.php" class="btn btn-danger my-2 my-sm-0" >
      <i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
    </form>
  </div>
</nav>
</body>
</html>