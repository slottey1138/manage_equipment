<?php  
require_once("session.php");

 $conn = mysqli_connect("localhost", "root", "12345678", "manage_equipment");  
 $query = "SELECT * FROM tbl_case ORDER BY eq_id desc";  
 $result = mysqli_query($conn, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>ประวัติ เบิก - จ่าย</title>  
           <link rel="stylesheet" href="../css/united.css">
      </head>  
      <body>  
      <?php  include "navbar.php";  ?>
           <div class="container-fluid">  
               <div class="row mt-4">
               <div class="col-md-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" />  
                </div>  
                <div class="col-md-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-5">  
                     <input type="button" name="filter" id="filter" value="ค้นหา" class="btn btn-info col-md-2" />  
                </div>  
               </div>
                <div style="clear:both"></div>                 
                <br />
                <div id="order_table">  
                     <table class="table table-hover">  
                          <tr class="table-success">  
                            <th class="td-1">ชื่อเคส</th>
                            <th class="td-2">วันที่</th>
                            <th class="td-3">ชื่ออุปกรณ์ที่คืน</th>
                            <th class="td-4">รหัสอุปกรณ์ที่คืน</th>
                            <th class="td-5">ชื่ออุปกรณ์ที่เบิก</th>
                            <th class="td-6">รหัสอุปกรณ์ที่คืน</th>
                            <th class="td-7">หัวหน้างาน</th>
                          </tr>  
                          <?php
                    $sql = "SELECT * FROM tbl_case";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                    $i = 1;
                    while($row = $result->fetch_assoc()) { ?>
                    <tbody>
                        <tr>
                           <td>
                           <?php 
                           if($row['case_name'] == "get")
                           {
                               echo "<button type='button' class='btn btn-primary btn-block btn-sm disabled'>คืน</button>";
                           }
                           if($row['case_name'] == "add")
                           {
                               echo "<button type='button' class='btn btn-success btn-block btn-sm disabled'>เบิก</button>";
                           }
                           if($row['case_name'] == "change")
                           {
                               echo "<button type='button' class='btn btn-info btn-block btn-sm disabled'>เปลี่ยน</button>";
                           }
                           ?>
                           </td>
                           <td><?php echo $row['case_date']; ?></td>
                           <td><?php echo $row['case_get_eq']; ?></td>
                           <td><?php echo $row['case_get_serial']; ?></td>
                           <td><?php echo $row['case_add_eq']; ?></td>
                           <td><?php echo $row['case_add_serial']; ?></td>
                           <td><?php echo $row['case_sup']; ?></td>
                        </tr>
                    </tbody>
                    <?php  $i++;}} else {echo "0 results";}?>
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      });  
 </script>
