<?php
session_start();
function db_open(){
   global $connection;
    $connection = mysqli_connect("localhost", "root", "", "xampp_todo") or     die("Connection failed: %s\n". $connection -> error);
    return $connection;
}
function db_close($connection){
   if($connection->close()){
       return true;
   }
//   echo "\nCouldn't close connection";
   return false;
}
//if(db_open()){
//    echo "Successfully connected to database" ;
//}
//if(db_close($connection)){
//    echo "Successfully closed!";
//}
?>