<?php
$db['db_host']="localhost";
$db['db_user']="root";
$db['db_password']="tornado1";
$db['db_database']="cms";

foreach($db as $key => $value) {
    define(strtoupper($key), $value);
}

$connection=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

if($connection){
    echo "You are connected to the database";
} else {
    die('Something went wrong ' . mysqli_error($connection));
}
?>
