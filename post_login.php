<?php
include "db_connect.php";
if(isset($_SESSION['username']) == false){
    header('Location: index.php');
}
$connection = db_open();
if ($connection){
    echo "Connection Info: ".$connection->host_info;
}
if (isset($_POST['logout'])){
    session_destroy();
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<h3>Hello World!</h3>
</head>
