<?php
include '../connection.php';

//send or save its post
// read or retrieve its get

$userEmail = $_POST['user_email'];
$userPassword = md5($_POST['user_password']);

$sqlQuery = "SELECT * FROM users_table WHERE  user_email='$userEmail' AND user_password='$userPassword'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery->num_rows > 0)// alow user to login
{
    $userRecord=array();
    while($rowFound= $resultOfQuery->fetch_assoc())
    {
        $userRecord[] = $rowFound;
    }
    echo json_encode(
        array(
        "success"=>true,
        "userData"=>$userRecord[0],
        )
    );
}else // not allow to login
{
    echo json_encode(array("success"=>false));
}