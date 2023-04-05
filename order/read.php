<?php
include '../connection.php';

$currentOnlineUserID = $_POST["currentOnlineUserID"];

$sqlQuery = "SELECT * FROM order_table WHERE user_id = '$currentOnlineUserID' AND status ='new' ORDER BY dateTime DESC";  

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
            "currentUserOrderData"=>$orderRecord,
        )
    );
}
else 
{
    echo json_encode(array("success"=>false));
}