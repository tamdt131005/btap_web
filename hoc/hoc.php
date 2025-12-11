<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ghi người dùng</title>
    <link rel="stylesheet" href="hoc.css">
</head>
<body>
    <div class="container">
    <form id="add-user-form" method="post" action="adduser.php" accept-charset="utf-8" autocomplete="off">
    <table>
        <tr>
            <th colspan="2"> <h2>Thêm Người dùng</h2></th>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" id="username" required></td>
        </tr>
        <tr> 
            <td>Mật khẩu</td>
            <td><input type="password" name="password" id="password" required></td>
        </tr>
        <tr>
            <td>Họ tên</td>
            <td><input type="text" name="fullname" id="fullname" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:right">
                <button type="submit" id="btn-add" class="btn-add" name="action" value="add">Thêm</button>
            </td>
        </tr>
    </table>
    </form>
    </div>
</body>
</html>