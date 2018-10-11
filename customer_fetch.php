  <?php
  header("Content-type:application/json");
require "Config.php";
//remember to add where salesid equals to the logged in sales rep
$custID = $_POST["user"];

$sql="SELECT * FROM dbo.Customer where CustID = '$custID'";
$response=array();
      
        
        $stmt1 = sqlsrv_query($conn, $sql);
//$stmt = sqlsrv_query($conn, $sql);
   
         
            while($row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC))
			{
			//echo fixrn($row['Surname']);
			//echo '<br>';
						array_push($response,array("C_ID"=>fixrn($row['CustID']),"C_Name"=>fixrn($row['Name']), "C_Surname"=>fixrn($row['Surname']), "C_Email"=>fixrn($row['Email']), "C_Phone"=>fixrn($row['Phone']), "C_Company"=>fixrn($row['Company']), "C_Designation"=>fixrn($row['Designation']), "C_Address"=>fixrn($row['Address']), "C_City"=>fixrn($row['City']), "C_Province"=>fixrn($row['Province']), "C_Country"=>fixrn($row['Country']),"C_Comment"=>fixrn($row['Comment'])));

		//	echo $row['Surname'];
			//echo fixrn($row['Surname']);
		//	echo '<br>';
			}
			
  
          echo json_encode(array("server_response"=>$response));
		  http_response_code (200);
		  ?>