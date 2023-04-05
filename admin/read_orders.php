<?php
include '../connection.php';


$sqlQuery = "SELECT * FROM order_table WHERE status ='new' ORDER BY dateTime DESC";  

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0) 
{
    $orderRecord = array();
    while($rowFound = $resultOfQuery->fetch_assoc())
    {
        $orderRecord[] = $rowFound;
    }

    echo json_encode(
        array(
            "success"=>true,
            "allOrderData"=>$orderRecord,
        )
    );
}
else 
{
    echo json_encode(array("success"=>false));
}