<?php
$con= new mysqli('localhost','root','','employeetable');

if(!$con){
    die(mysqli_error($con));
}

?>