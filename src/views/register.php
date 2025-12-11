<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - bTap</title>
    <link rel="stylesheet" href="../public/css/base.css">
    <link rel="stylesheet" href="../public/css/register.css">
</head>
<body>
    <div class="container">
        <nav>
            <div class="nav-logo">
                <a href="index.php"><img src="../public/img/logo.svg" alt="bTap Logo"></a>
            </div>
            <div class="nav-title">Đăng Ký</div>
        </nav>
        
        <div class="register-form">
            <main>
                <header>
                    <h1>Đăng Ký</h1>
                    <span>Vui lòng nhập thông tin để tạo tài khoản mới.</span>
                </header>

                <form action="../api/register.php" method="POST">
                    <div class="form-group">
                        <label for="fullname">Họ và tên:</label>
                        <input type="text" id="fullname" name="fullname" placeholder="Nhập họ và tên">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Nhập email">
                    </div>
                    <div class="form-group">
                        <label for="username">Tên đăng nhập:</label>
                        <input type="text" id="username" name="username" required placeholder="Nhập tên đăng nhập">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu:</label>
                        <input type="password" id="password" name="password" required placeholder="Nhập mật khẩu (ít nhất 6 ký tự)">
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Xác nhận mật khẩu:</label>
                        <input type="password" id="confirm_password" name="confirm_password" required placeholder="Nhập lại mật khẩu">
                    </div>
                    <div class="form-group form-submit">
                        <div class="btn"><button type="submit">Đăng Ký</button></div>
                    </div>
                </form>
                <div class="additional-options">
                    <div class="gach-ngang">
                        <hr>
                        <p>HOẶC</p>
                        <hr>
                    </div>
                    <p>Bạn đã có tài khoản? <a href="login.php">Đăng nhập ngay</a></p>
                </div>
            </main>
        </div>
        
        <footer class="login-footer">
            <div class="footer-content">
                <p class="footer-info">
                    Web được phát triển bởi: <strong>Nhóm 74DCTT21</strong>
                </p>
                <p class="footer-members">
                    Các thành viên: <span>Đặng Thành Tâm</span>, <span>Triệu Quang Ninh</span>, <span>Bùi Đức Huy</span>, <span>Lê Mạnh Hùng</span>, <span>Nguyễn Hồng Sơn</span>
                </p>
            </div>
        </footer>
    </div>
</body>
</html>