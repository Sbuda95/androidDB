  <?php
  header("Content-type:application/json");
require "Config.php";
//remember to add where salesid equals to the logged in sales rep
$salesID = $_POST["user"];

$sql="select distinct(s.S_Name), s.salesid, c.custid, c.name, c.surname, c.phone, c.email, l.product, i.I_Status, c.company, c.designation, c.address, c.city, c.province, c.country, c.comment,datename(mm,l.Date_Created) as Date
from Sales_Rep s, Customer c, Lead l, Invoice i, Product p, AssignTask a
where a.SalesID = s.SalesID
AND c.CustID = l.CustID
AND l.Prod_ID = p.Prod_ID
AND l.LeadID = i.Lead_ID
AND datename(mm, a.stMonth) = datename(mm, l.Date_Created)
AND i.I_Status = 'Not yet paid'
AND a.SalesID = '$salesID'
AND datename(MM, a.stMonth) = 'January'";
$response=array();
      
        
        $stmt1 = sqlsrv_query($conn, $sql);
//$stmt = sqlsrv_query($conn, $sql);
   
         
            while($row = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC))
			{
			//echo fixrn($row['Surname']);
			//echo '<br>';
						array_push($response,array("C_ID"=>fixrn($row['custid']),"C_Name"=>fixrn($row['name']), "C_Surname"=>fixrn($row['surname']), "C_Email"=>fixrn($row['email']), "C_Phone"=>fixrn($row['phone']), "C_Company"=>fixrn($row['company']), "C_Designation"=>fixrn($row['designation']), "C_Address"=>fixrn($row['address']), "C_City"=>fixrn($row['city']), "C_Province"=>fixrn($row['province']), "C_Country"=>fixrn($row['country']),"C_Comment"=>fixrn($row['comment'])));

		//	echo $row['Surname'];
			//echo fixrn($row['Surname']);
		//	echo '<br>';
			}
			
  
          echo json_encode(array("server_response"=>$response));
		  http_response_code (200);
		  ?>