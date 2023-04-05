<?php
include '../connection.php';

//send or save its post
// read or retrieve its get

$adminEmail = $_POST['admin_email'];
$adminPassword = $_POST['admin_password'];

$sqlQuery = "SELECT * FROM admins_table WHERE  admin_email='$adminEmail' AND admin_password='$adminPassword'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0)// alow admin to login
{
    $adminRecord=array();
    while($rowFound= $resultOfQuery->fetch_assoc())
    {
        $adminRecord[] = $rowFound;
    }
    echo json_encode(
        array(
        "success"=>true,
        "adminData"=>$adminRecord[0],
        )
    );
}else // not allow to login
{
    echo json_encode(array("success"=>false));
}