  <?php
  header("Content-type:application/json");
require "Config.php";
//remember to add where salesid equals to the logged in sales rep


$sql="SELECT * FROM Sales_rep";
$response=array();
      
        
        $stmt1 = sqlsrv_query($conn, $sql);
//$stmt = sqlsrv_query($conn, $sql);
   
         
            while($row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC))
			{
			//echo fixrn($row['Surname']);
			//echo '<br>';
						array_push($response,array("S_SalesID"=>$row['SalesID'], "S_Name"=>$row['S_Name'], "S_Surname"=>$row['S_Surname'], "S_Role"=>$row['S_Role'], "S_Email"=>$row['S_Emails']));

		//	echo $row['Surname'];
			//echo fixrn($row['Surname']);
		//	echo '<br>';
			}
			
  
          echo json_encode(array("server_response"=>$response));
		  http_response_code (200);
		  ?>