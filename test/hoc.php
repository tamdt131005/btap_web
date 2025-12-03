<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng STT</title>
</head>
<body>
    <table border="1" cellpadding="5" style="border-collapse: collapse;">
        <tr>
            <th>STT</th>
            <th>Tên</th>
            <th>Lớp</th>
            <th>...</th>
        </tr>
        <?php
            for ($i = 1; $i <= 5; $i++) {
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td></td>
            <td></td>
            <td>
                <select name = "thang">
                    <?php
                        for ($j = 1; $j <= 12; $j++) {
                            echo "<option value='$j'>$j</option>";
                        }
                    ?>
                </select>


            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>