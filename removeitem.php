<?php session_start() ?>
<!DOCTYPE html>
<head>
<title>List</title>
<style>
table {
    border-collapse: collapse;
}

table, th, td{
    border: 1px solid black;
    padding: 10px 10px
}
#homenav{
    text-decoration:none; 
    color:black; 
}
</style>
</head>
<body>
<a href="index.php" id="homenav"><h1>Welcome to TheGarageSale Project.</h1></a>
<br>

<?php

if($_SESSION['userloggedin']){
    $conn = new mysqli("localhost", "default_u", "letmeinmysql", "tgsp_catalog");
}
else{
    $_SESSION['msg'] = "You need to log in.";
    header("Location: index.php");
}
$item_remove = $_GET["item_name"];
$query = "DELETE FROM Items WHERE name=\"". $item_remove . "\";";
$result = $conn->query($query);
if(!$result){
    $conn->close(); 
    echo "Query did not go through: " -> $conn->mysql_error();
}
else{
    $conn->close();
    $_SESSION['additem_prev'] = true; //use session credentials 
    $_SESSION['userloggedin'] = true; 
    header("Location: list_items.php");
     
}


?>