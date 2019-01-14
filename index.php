<!DOCTYPE html>
<html>
<head>
    <title>XAMPP ToDo Project::Login</title>
    <h3>Login:</h3>
</head>
<body>
<form method="post" action="">
    Username:
    <input type="text" name="username" placeholder="username" id="username"><br>
    Password:
    <input type="password" name="password" placeholder="password" id="password"><br>
    <input type="submit" value="Submit" name="submit" id="submit"><br>
</form>
<?php
include "db_connect.php";
//if(db_open()){
//    echo "Database Status: Connected!";
//}
$connection=db_open();
if(isset($_POST['submit'])){
//    echo "submit pressed";
//    echo $_POST['password'];
    $username = $_POST['username'];
    $password = $_POST['password'];
//    echo $connection->host_info;
//    echo "$username <br>";
//    echo $password;
    $sql_query = "select count(*) as usercount from users where username='".$username."' and password='".$password."'";
    $query_result = mysqli_query($connection,$sql_query);
    $rows = mysqli_fetch_array($query_result);
    $i = $rows['usercount'];
    if($i > 0){
        $_SESSION['username'] = $username;
        header('Location: post_login.php');
    }
    else{
        echo "Invalid Username and/or Password";
    }
}
?>
</body>
</html>