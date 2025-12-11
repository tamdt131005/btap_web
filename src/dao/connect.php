<?php
/**
 * dao/connect.php
 * Kết nối database sử dụng cấu hình từ config/database.php
 */

$config = require __DIR__ . '/../config/database.php';

$conn = mysqli_connect(
    $config['host'],
    $config['username'],
    $config['password'],
    $config['database'],
    $config['port']
);

if (!$conn) {
    $err = mysqli_connect_error();
    error_log('DB connect error: ' . $err);
    die("Kết nối thất bại: " . htmlspecialchars($err) . ".\nHãy kiểm tra MySQL trong Laragon.");
}

mysqli_set_charset($conn, $config['charset']);
