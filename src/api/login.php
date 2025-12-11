<?php
header('Content-Type: application/json; charset=utf-8');
include __DIR__ . '/../dao/connect.php';

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$password_hash = md5($password);
if ($username === '' || $password === '') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.']);
    exit;
}
$sql = "SELECT account_id, username, password FROM accounts WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Lỗi chuẩn bị truy vấn: ' . mysqli_error($conn)]);
    exit;
}
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if ($row = mysqli_fetch_assoc($result)) {
    if ($row['password'] === $password_hash) {
        session_start();
        $_SESSION['user_id'] = $row['account_id'];
        session_regenerate_id(true);
        echo json_encode(['success' => true, 'redirect' => '/']);
    } else {
        http_response_code(401);
        echo json_encode(['success' => false, 'message' => 'Mật khẩu không đúng.']);
    }
} else {
    http_response_code(404);
    echo json_encode(['success' => false, 'message' => 'Tên đăng nhập không tồn tại.']);
}
mysqli_stmt_close($stmt);
?>