<?php 
include("config.php");
error_reporting(0);
  header("Content-type:application/json");
$response=array();


$sale=$_POST['saleID'];
$custID=$_POST['custID'];
$prodID=$_POST['prodID'];

/*$sql="select  * from Customer c,AssignTask a, Status where c.CustID=a.custid and Status.CustID=c.CustID and a.SalesID='$sale' and Status.Status_Name='$stat'";
$params = array();
////$options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
//$stmt = sqlsrv_query( $conn, $sql , $params, $options );
$stmt = sqlsrv_query( $conn, $sql );
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
*/



$sql1= "select * from dbo.Lead";
$stmt1 = sqlsrv_query( $conn, $sql1 );
 $params = array();
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $stmt1 = sqlsrv_query($conn, $sql1, $params, $options);
	if (sqlsrv_num_rows($stmt1) >= 1)
{
	while( $row = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC) ) 
		{
			
			$temp= explode("L",$row['LeadID']);
			
			
			
		}
		$temp[1]+=1;
		$num = 123;
$str_length = 3;

// hardcoded left padding if number < $str_length
$leadID= substr("0000{$temp[1]}", -$str_length);

// output: 0123
		
		//$custID="L".$temp[1];
		 $leadID="L".$leadID;
		 }
		 else
		 $leadID="L001";
		 

	$sqlINVO= "select * from dbo.Invoice";
 $params = array();
    $options = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
    $stmtINVO = sqlsrv_query($conn, $sqlINVO, $params, $options);
	if (sqlsrv_num_rows($stmtINVO) >= 1)
{

	while( $row = sqlsrv_fetch_array( $stmtINVO, SQLSRV_FETCH_ASSOC) ) 
		{
			
			$temp= explode("INV",$row['Invoice_ID']);

			
			
			
		}
		$temp[1]+=1;
		$num = 123;
$str_length = 3;

// hardcoded left padding if number < $str_length
$inv= substr("0000{$temp[1]}", -$str_length);

// output: 0123
		
		//$custID="L".$temp[1];
		  $inv="INV".$inv;
		  }
		  else 
		  $inv="INV";

/*echo $inv;
echo '<br>';
echo $leadID;*/
array_push($response,array("leadID"=>$leadID,"invoiceID"=>$inv));

echo json_encode(array("response"=>$response));
		  
		  

?>
