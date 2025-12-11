<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'connect.php';

    // Lấy dữ liệu từ form
    $username = trim($_REQUEST['username'] ?? '');
    $password = $_REQUEST['password'] ?? '';
    $fullname = trim($_REQUEST['fullname'] ?? '');
    if ($username === '' || $password === '') {
        die('Vui lòng nhập đầy đủ username và password.');
    }
    $sql = "INSERT INTO users (username, password, fullname) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        die('Lỗi chuẩn bị query: ' . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, 'sss', $username, $password, $fullname);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo '<p style="color:green;">Thêm người dùng thành công!</p>';
    } else {
        $errno = mysqli_errno($conn);
        if ($errno === 1062) {
            echo '<p style="color:red;">Tên đăng nhập đã tồn tại.</p>';
        } else {
            echo '<p style="color:red;">Lỗi: ' . htmlspecialchars(mysqli_stmt_error($stmt)) . '</p>';
        }
    }

    mysqli_stmt_close($stmt);
    ?>
</body>
</html>