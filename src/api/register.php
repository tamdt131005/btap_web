<?php
header('Content-Type: application/json; charset=utf-8');
include __DIR__ . '/../dao/connect.php';

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';
$fullname = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');

// Validate input
if ($username === '' || $password === '') {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu.']);
    exit;
}

if ($password !== $confirm_password) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Mật khẩu xác nhận không khớp.']);
    exit;
}

if (strlen($password) < 6) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Mật khẩu phải có ít nhất 6 ký tự.']);
    exit;
}

if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Email không hợp lệ.']);
    exit;
}

$sql = "SELECT account_id FROM accounts WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Lỗi chuẩn bị truy vấn: ' . mysqli_error($conn)]);
    exit;
}
mysqli_stmt_bind_param($stmt, 's', $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_fetch_assoc($result)) {
    http_response_code(409);
    echo json_encode(['success' => false, 'message' => 'Tên đăng nhập đã tồn tại.']);
    mysqli_stmt_close($stmt);
    exit;
}
mysqli_stmt_close($stmt);

// Hash password (using md5 to match login, but recommend password_hash in production)
$password_hash = md5($password);

// Insert new account
$sql = "INSERT INTO accounts (username, password, fullname, email) VALUES (?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
if (!$stmt) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Lỗi chuẩn bị truy vấn: ' . mysqli_error($conn)]);
    exit;
}
mysqli_stmt_bind_param($stmt, 'ssss', $username, $password_hash, $fullname, $email);
$ok = mysqli_stmt_execute($stmt);

if ($ok) {
    echo json_encode(['success' => true, 'message' => 'Đăng ký thành công!', 'redirect' => 'login.php']);
} else {
    $errno = mysqli_errno($conn);
    if ($errno === 1062) {
        http_response_code(409);
        echo json_encode(['success' => false, 'message' => 'Tên đăng nhập hoặc email đã tồn tại.']);
    } else {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Lỗi đăng ký: ' . mysqli_stmt_error($stmt)]);
    }
}
mysqli_stmt_close($stmt);
?>
