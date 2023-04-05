<?php
include '../connection.php';

$user_id = $_POST['user_id'];
$selectedItem = $_POST['selectedItem'];
$deliverySystem = $_POST['deliverySystem'];
$paymentSystem = $_POST['paymentSystem'];
$note = $_POST['note'];
$totalAmount = $_POST['totalAmount'];
$image = $_POST['image'];
$status =$_POST['status'];
$shipmentAddress = $_POST['shipmentAddress'];
$phoneNumber = $_POST['phoneNumber'];
$imageFile = $_POST['imageFile'];



$sqlQuery = "INSERT INTO order_table SET user_id='$user_id', selectedItem='$selectedItem',deliverySystem='$deliverySystem',paymentSystem='$paymentSystem', note='$note', totalAmount='$totalAmount', image='$image',status='$status',shipmentAddress='$shipmentAddress',phoneNumber='$phoneNumber'";

$resultOfQuery = $connectNow->query($sqlQuery);

if($resultOfQuery){

   $imageFileOfTransactionProof= base64_decode($imageFile);
   file_put_contents("../transaction_proof_images/".$image,$imageFileOfTransactionProof);
    echo json_encode(array("success"=>true));
}else 
{
    echo json_encode(array("success"=>false));
}
