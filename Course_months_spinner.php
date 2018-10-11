<?php
require "Config.php";
$sql="select distinct month(l.Date_Created),datename(mm,l.Date_Created) as Date
from Lead l
order by month(l.Date_Created),datename(mm,l.Date_Created";
$response=array();
      
        
        $stmt1 = sqlsrv_query($conn, $sql);
//$stmt = sqlsrv_query( $conn, $sql );
   
         
            while($row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC))
			
			array_push($response,array("Date"=>$row['Date']);
  
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