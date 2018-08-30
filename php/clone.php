<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Table Data</title>
  </head>
  <body>
  <?php require_once("navbar.php") ?>
    <div class="container">
    <h1>Export Data to Excel</h1>
    <table class="table table-striped" id="tableData">
    <thead>
      <tr>
        <th colspan="4">Equipment</th>
        <th>Quantity</th>
        <th>In use</th>
        <th>Beoken</th>
        <th>Spare</th>
        <th>Expiry Date</th>
      </tr>
    </thead>
    <tbody>
    <tr class="table-info">
        <td colspan="12"><b>Computer</b></td>
      </tr>
      <tr>
        <td colspan="4">DELL Optiplex 3010</td>
        <td>133</td>
        <td>129</td>
        <td>-</td>
        <td>4</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td colspan="4">DELL Optiplex 360</td>
        <td>32</td>
        <td>32</td>
        <td>-</td>
        <td>-</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td colspan="4">DELL Optiplex 3050</td>
        <td>5</td>
        <td>4</td>
        <td>-</td>
        <td>1</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td colspan="4">Total</td>
        <td>170</td>
        <td>165</td>
        <td>-</td>
        <td>5</td>
        <td>Doe</td>
      </tr>
      <tr class="table-info">
        <td colspan="12"><b>Monitor</b></td>
      </tr>
      <tr>
        <td colspan="4">LCD Monitor</td>
        <td>168</td>
        <td>162</td>
        <td>-</td>
        <td>6</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td colspan="4">DELL Monitor</td>
        <td>5</td>
        <td>3</td>
        <td>-</td>
        <td>2</td>
        <td>Doe</td>
      </tr>
      <tr class="table-info">
        <td colspan="12"><b>MOUSE</b></td>
      </tr>
      <tr>
        <td colspan="4">Optical Mouse USB</td>
        <td>132</td>
        <td>132</td>
        <td>-</td>
        <td>-</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td colspan="4">Logitech Mouse M100R</td>
        <td>32</td>
        <td>32</td>
        <td>-</td>
        <td>-</td>
        <td>Doe</td>
      </tr>
      <tr>
        <td colspan="4">DELL Optical Mouse M116</td>
        <td>5</td>
        <td>1</td>
        <td>1</td>
        <td>3</td>
        <td>Doe</td>
      </tr>
    </tbody>
  </table>
        <button id='DLtoExcel' class="btn btn-success">Export Html Table to Excel</button>
        </div>
        </br>
        <script type="text/javascript">
            var $btnDLtoExcel = $('#DLtoExcel');
            $btnDLtoExcel.on('click', function () {
              $("#tableData").excelexportjs({
                  containerid: "tableData"
                  ,datatype: 'table'
              });
            });
        </script>
  </body>
</html>
