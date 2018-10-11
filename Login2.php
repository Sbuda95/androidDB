<?php
require "Config.php";

$username = $_POST["UserName"];
$userpass = $_POST["UserPassword"];
$name = $_POST["UserName"];
$pass = $_POST["UserName"];

if($username == $username && $userpass == $userpass){

$sql = "SELECT * FROM dbo.Sales_Rep WHERE S_Emails = '$username' and S_Password = '$userpass'";
$response=array();
      
        $stmt1 = sqlsrv_query($conn, $sql);
   
            $row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC);
			
			array_push($response,array("email"=>$row['S_Emails'],"password"=>$row['S_Password']));
  
          echo json_encode(array("server_response"=>$response));
            //echo $_SESSION['Role'];
}else{
	echo "Try again";
}	
?>