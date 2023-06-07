<?php
include 'connect.php';

extract($_POST);

if (isset($_POST['nameSend']) && isset($_POST['emailSend']) &&
    isset($_POST['mobileSend'])) {
    $nameSend = $_POST['nameSend'];
    $emailSend = $_POST['emailSend'];
    $mobileSend = $_POST['mobileSend'];
    $sql = "insert into `employee` (name,email,mobile)
   values ('$nameSend','$emailSend','$mobileSend')";

    $result = mysqli_query($con, $sql);
    echo "1";
    exit;

}
?>