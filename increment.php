<?php
include("config.php");
  header("Content-type:application/json");
$response = array();
$sql1 = "select * from dbo.Lead";
$stmt1 = sqlsrv_query( $conn, $sql1 );
$params = array();
$options = array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmt1 = sqlsrv_query( $conn, $sql1, $params, $options );
if ( sqlsrv_num_rows( $stmt1 ) >= 1 ) {
	while ( $row = sqlsrv_fetch_array( $stmt1, SQLSRV_FETCH_ASSOC ) ) {

		$temp = explode( "L", $row[ 'LeadID' ] );



	}
	$temp[ 1 ] += 1;
	$num = 123;
	$str_length = 3;

	// hardcoded left padding if number < $str_length
	$leadID = substr( "0000{$temp[1]}", -$str_length );

	// output: 0123

	//$custID="L".$temp[1];
	$leadID = "L" . $leadID;
} else
	$leadID = "L001";


$sqlINVO = "select * from dbo.Invoice";
$params = array();
$options = array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
$stmtINVO = sqlsrv_query( $conn, $sqlINVO, $params, $options );
if ( sqlsrv_num_rows( $stmtINVO ) >= 1 ) {

	while ( $row = sqlsrv_fetch_array( $stmtINVO, SQLSRV_FETCH_ASSOC ) ) {

		$temp = explode( "INV", $row[ 'Invoice_ID' ] );




	}
	$temp[ 1 ] += 1;
	$num = 123;
	$str_length = 3;

	// hardcoded left padding if number < $str_length
	$inv = substr( "0000{$temp[1]}", -$str_length );

	// output: 0123

	//$custID="L".$temp[1];
	$inv = "INV" . $inv;
} else
	$inv = "INV";

/*echo $inv;
echo '<br>';
echo $leadID;*/
array_push( $response, array( "leadID" => $leadID, "invoiceID" => $inv ) );
 echo  $json= json_encode(array("server_response"=>$response));

?>