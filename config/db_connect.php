<?php 

// Connect to database: MySQLi

$conn = mysqli_connect('localhost','Nabil','nabilnaruto1997', 'members');

// check the connection

if (!$conn) {
    echo 'Connection error'.mysqli_connect_error();
}


?>
