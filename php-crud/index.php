<?php
include 'db.php';

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <title>مدیریت کاربران</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>لیست کاربران</h2>
    <a href="insert.php">+ افزودن کاربر جدید</a>
    <table>
        <tr>
            <th>شناسه</th>
            <th>نام</th>
            <th>نام خانوادگی</th>
            <th>ایمیل</th>
            <th>شماره</th>
            <th>آدرس</th>
            <th>عملیات</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><?php echo $row[5]; ?></td>
                <td>
                    <a >ویرایش</a>
                    <a>حذف</a>
                </td>
            </tr>
        <?php } ?>

    </table>
</body>

</html>