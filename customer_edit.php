<?php

require"Config.php";
 header("Content-type:application/json");
$response=array();
$cust=$_POST['user'];

$name=$_POST["name"];
$surname=$_POST["surname"];
$email=$_POST["email"];
$company=$_POST["company"];
$designation=$_POST["designation"];
$phone=$_POST["phone"];
$addr1=$_POST["address"];
$city=$_POST["city"];
$province=$_POST["province"];
$country =$_POST["country"];
$comment =$_POST["comment"];
//$zip=$_POST["postal"];

//$sales=$_SESSION['name'];

$sql="UPDATE [dbo].[Customer]
   SET [Name] = '$name'
      ,[Surname] = '$surname'
      ,[Email] = '$email'
      ,[Phone] = '$phone'
      ,[Company] = '$company'
      ,[Designation] = '$designation'
      ,[Address] = '$designation'
      ,[City] = '$city'
      ,[Province] = '$province'
	  ,[Country] = '$country'
	  ,[Comment] = '$comment'
 WHERE custid='$cust'";
 
$stmt = sqlsrv_query( $conn, $sql );
array_push($response,array("status"=>"saved successfuly"));
echo json_encode(array("server_response"=>$response));
if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        foreach( $errors as $error ) {
            echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
            echo "code: ".$error[ 'code']."<br />";
            echo "message: ".$error[ 'message']."<br />";
            echo $sql;
        }
    }
	



}




?>