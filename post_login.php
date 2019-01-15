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
if (isset($_POST['add'])){
    $item_name= $_POST['item_name'];
//    echo $item_name;
    $sql_query = "insert into items (id,item) values (NULL, '".$item_name."')";
    $sql_statement = mysqli_prepare($connection,$sql_query);
    $sql_statement->execute();
//    $_POST['add'] = NULL;
//    echo "<br>task added!";
//
}
if(isset($_POST['delete'])){
    $item_id = $_POST['number'];
    $sql_query = "delete from items where id ='".$item_id."'";
    $sql_statement = mysqli_prepare($connection,$sql_query);
    $sql_statement->execute();
}
?>
<!DOCTYPE html>
<html>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<head>
<h3>TODO LIST</h3>
</head>
<body>
<table>
    <tr>
        <th id="id">id</th>
        <th id="item">item</th>
    </tr>
    <?php
        $connection = db_open();
        $sql_query = "select * from items";
        $query_result = mysqli_query($connection,$sql_query);
        if(mysqli_num_rows($query_result)){
            while($rows=mysqli_fetch_assoc($query_result)){
                echo "<tr>";
                echo "<td>". $rows['id'] . "</td>";
                echo "<td>". $rows['item']."</td>";
            }
        }
        db_close($connection);
    ?>
</table>
<form method="post" action="">
    <input type="submit" value="add" name="add" id="add">
    <input type="text" placeholder="item" name="item_name" id="item_name">
    <input type="submit" value="delete" name="delete" id="delete">
    <input type="number" name="number" id="number" placeholder="id">
</form>
</body>
</html>
