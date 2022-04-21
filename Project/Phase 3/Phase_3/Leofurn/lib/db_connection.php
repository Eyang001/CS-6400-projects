<?php

define('DB_HOST', "localhost");
define('DB_PORT', "3306");
/*update to your database username*/
define('DB_USER', "root");
/*update to your database password*/
define('DB_PASS', "admin123");
/*update to your database name*/
define('DB_SCHEMA', "leofurn");

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_SCHEMA, DB_PORT);

if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error() . NEWLINE;
    echo "Running on: ". DB_HOST . ":". DB_PORT . '<br>' . "Username: " . DB_USER . '<br>' . "Password: " . DB_PASS . '<br>' ."Database: " . DB_SCHEMA;
    phpinfo();
    exit();
}

$query = "SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));";
$result = mysqli_query($conn, $query);

?>
