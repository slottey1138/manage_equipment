<?php  
 
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
      $connect = mysqli_connect("localhost", "root", "12345678", "manage_equipment");  
      $output = '';  
      $query = "  
           SELECT * FROM tbl_case  
           WHERE case_date BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."'  
      ";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
           <table class="table table-hover">  
           <tr class="table table-success"> 
           <th class="td-1">ชื่อเคส</th>
           <th class="td-2">วันที่</th>
           <th class="td-3">ชื่ออุปกรณ์ที่คืน</th>
           <th class="td-4">รหัสอุปกรณ์ที่คืน</th>
           <th class="td-5">ชื่ออุปกรณ์ที่เบิก</th>
           <th class="td-6">รหัสอุปกรณ์ที่คืน</th>
           <th class="td-7">หัวหน้างาน</th>
         </tr>  
      ';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>'. $row["case_name"].'</td>
                          <td>'. $row["case_date"] .'</td>  
                          <td>'. $row["case_get_eq"] .'</td>  
                          <td>'. $row["case_get_serial"] .'</td>  
                          <td>'. $row["case_add_eq"] .'</td>  
                          <td>'. $row["case_add_serial"] .'</td>  
                          <td>'. $row["case_sup"] .'</td> 
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">ไม่มีข้อมูล</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;  
 }  
 ?>