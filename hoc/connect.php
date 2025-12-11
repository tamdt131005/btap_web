<?php
$host = '127.0.0.1';
$port = 3310;
$username = 'root';
$password = '';
$database = 'hoc';

$conn = mysqli_connect($host, $username, $password, $database, $port);
if (!$conn) {
    $err = mysqli_connect_error();
    error_log('DB connect error: ' . $err);
    die("Kết nối thất bại: " . htmlspecialchars($err) . ".\nHãy kiểm tra MySQL trong Laragon (Start MySQL) và cấu hình trong hoc/connect.php.");
}

mysqli_set_charset($conn, 'utf8');

?>