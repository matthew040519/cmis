<?php

header('Content-Type: application/json');

include('include/connection.php');
// Check connection
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    $data_points = array();
    
    $result = mysqli_query($con, "SELECT *, SUM(price) as price FROM `tblorder` INNER JOIN tbltransaction ON tbltransaction.transaction_number=tblorder.order_code WHERE tbltransaction.status_id = 2 GROUP BY tbltransaction.transaction_number");
    
    while($row = mysqli_fetch_array($result))
    {        
        $point = array("name" => $row['tdate'] , "Sales" => $row['price']);
        
        $array = array_push($data_points, $point);        
    }
    
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
mysqli_close($con);

?>