<?php
require "Config.php";
$sql="SELECT * FROM dbo.Sales_Rep where Employee_status != '0' ";
$response=array();
      
        
        $stmt1 = sqlsrv_query($conn, $sql);
//$stmt = sqlsrv_query( $conn, $sql );
   
         
            while($row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC))
			
			array_push($response,array("Sales_id"=>$row['SalesID'], "Name"=>$row['S_Name'], "Surname"=>$row['S_Surname'], "Role"=>$row['S_Role'], "Email"=>$row['S_Emails'], "Status"=>$row['Employee_Status']));
  
          echo json_encode(array("server_response"=>$response));
            //echo $_SESSION['Role'];
		
		/*
		       for (int i = 0; i < jsonarray.length(); i++) {
                    HashMap<String, String> map = new HashMap<String, String>();
                    jsonobject = jsonarray.getJSONObject(i);
                    // Retrive JSON Objects
                    map.put("Sales_id", jsonobject.getString("Sales_id"));
                    map.put("Name", jsonobject.getString("Name"));
                    map.put("Surname", jsonobject.getString("Surname"));
                    map.put("Role", jsonobject.getString("Role"));
                    map.put("Email", jsonobject.getString("Email"));
                    map.put("Status", String.valueOf(jsonobject.getInt("Status")));

                    arraylist.add(map);

                }*/
?>
