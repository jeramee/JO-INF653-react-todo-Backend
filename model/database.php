<?php
$dsn = "mysql:host=localhost; dbname=world";
$username = 'root';
// $password = '1qaz';


try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username_todolist, $password_todolist);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

?>
