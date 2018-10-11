<?php
//header("Content-Type: application/json");
require "Config.php";
//error_reporting(0);
$user_name=$_POST["user"];
$user_pass=$_POST["pass"];
//$user_name="veronica@ikworx.co.za";
//$user_pass="vero123";
$response=array();
$saleID="";
$message="";
if(isset($_POST['user']) and isset($_POST['pass']))
{
	
$sql = "SELECT * FROM dbo.Sales_Rep WHERE S_Emails = '$user_name'";

      
       
        $stmt1 = sqlsrv_query($conn, $sql);
//$stmt = sqlsrv_query( $conn, $sql );
   
         
            $row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC);

			if($row['S_Emails']===$user_name)
			{
				$message='emailOK';
				$status=1;
				http_response_code(412);
				if($row['S_Password']===$user_pass)
				{
					$message='loginOK';
					
					$status=2;
					http_response_code(200);
					$saleID=$row['SalesID'];
				}
				
			}
			else
			{
				$message="wrong";
				$status=0;
				http_response_code(412);
			}
	
			
			array_push($response,array("message"=>$message,"status"=>$status,"saleID"=>$saleID));
  
          echo json_encode(array("server_response"=>$response));
}else{
	array_push($response,array("message"=>"both username and password are empty","status"=>"4"));
	echo json_encode(array("server_response"=>$response));
	http_response_code(412);
}


            //echo $_SESSION['Role'];
		
?>
