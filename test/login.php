<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - bTap</title>
    <link rel="stylesheet" href="acc/base.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="container">
        <nav>
            <div class="nav-logo">
                <a href="./index.php"><img src="./img/logo.svg" alt="bTap Logo"></a>
            </div>
            <div class="nav-title">Đăng nhập</div>
        </nav>
        
        <div class="login-form">
            <main>
                <header>
                    <h1>Đăng nhập</h1>
                    <span>Vui lòng nhập thông tin tài khoản của bạn để đăng nhập.</span>
                </header>

                <form action="process_login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Tên đăng nhập:</label>
                        <input type="text" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu:</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group form-submit">
                        <div class="btn"><button type="submit">Đăng nhập</button></div>
                        <div class="quenmk"><a href="">Quên mật khẩu?</a></div>
                    </div>
                </form>
                <div class="additional-options">
                    <div class="gach-ngang">
                        <hr>
                        <p>HOẶC</p>
                        <hr>
                    </div>
                    <p>Bạn chưa có tài khoản? <a href="register.php">Đăng ký ngay</a></p>
                </div>


            </main>
        </div>
        <footer class="login-footer">
            <div class="footer-content">
                <p class="footer-info">
                    Web được phát triển bởi: <strong>Nhóm 74DCTT21</strong>
                </p>
                <p class="footer-members">
                    Các thành viên: <span>Đặng Thành Tâm</span>, <span>Triệu Quang Ninh</span>, <span>Bùi Đức Huy</span>,<span>Lê Mạnh Hùng</span>, <span>Nguyễn Hồng Sơn</span>
                </p>
            </div>
        </footer>
    </div>
</body> 

</html>