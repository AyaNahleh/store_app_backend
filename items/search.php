<?php
include '../connection.php';


$typedKeyWords = $_POST['typedKeyWords'];


$sqlQuery = "SELECT * FROM items_table WHERE name LIKE '%$typedKeyWords%'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0)// alow user to login
{
    $foundItemRecord=array();
    while($rowFound= $resultOfQuery->fetch_assoc())
    {
        $foundItemRecord[] = $rowFound;
    }
    echo json_encode(
        array(
        "success"=>true,
        "itemFoundRecord"=>$foundItemRecord,
        )
    );
}else // not allow to login
{
    echo json_encode(array("success"=>false));
}