<?php

$host = "9916631.2020.labnet.nz";
$db = "a9916631_aliens";
$user = "a9916631_zina";
$pwd = "pleasejustwork";

$dsn = "mysql:host=$host; dbname=$db";

try{
    $conn = new PDO($dsn, $user, $pwd);
}
catch(PDOException $error){
    echo "<h3>Error</h3>" . $error->getMessage();
}

?>