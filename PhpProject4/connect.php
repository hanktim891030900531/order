<?php
$server="localhost";//主機
$db_username="root";//你的資料庫使用者名稱
$db_password="";//你的資料庫密碼
$dbname = "ordersystem";
$conn = new mysqli($server, $db_username, $db_password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>