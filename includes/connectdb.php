<?php

/**
 * Localhost test
 */
// $namehost = "localhost";
// $userhost = "user";
// $passhost = "";
// $database = "php_chat";

/**
 * Deploy enviroment test
 */
$namehost = "remotemysql.com";
$userhost = "zWpqC9MXp2";
$passhost = "fGyMNzkmSE";
$database = "zWpqC9MXp2";



// Lệnh kết nối tới database
$cn = mysqli_connect($namehost, $userhost, $passhost, $database);

// Nếu kết nối database thất bại sẽ báo lỗi
if (!$cn) {
    echo "Could not connect to database!";
}


?>