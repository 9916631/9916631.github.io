<?php
 
$host = "localhost";
$db = "crudtestingdatabasemyown";
$user = "a9916631_zina";
$pwd = "pleasejustwork";

$dsn = "mysql:host=$host; dbname=$db";

try
{
    $conn = new PDO($dsn, $user, $pwd);
}
catch(PDOException $error)
{
    echo "<h3>Sorry, something went wrong, please try again.</h3>" . $error->getMessage();
}

$selectAll = "Select * from crudscptable";

$record = $conn->prepare($selectAll);
$record->execute();

?>