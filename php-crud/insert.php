<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    $sql = "INSERT INTO users (first_name, last_name, email, phone, address) VALUES ('$first_name', '$last_name', '$email', '$phone', '$address')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
    } else {
        echo "خطا در افزودن کاربر: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>افزودن کاربر</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>افزودن کاربر جدید</h2>
    <form action="" method="post">
        نام: <input type="text" name="first_name" required><br>
        نام خانوادگی: <input type="text" name="last_name" required><br>
        ایمیل: <input type="email" name="email" required><br>
        شماره: <input type="text" name="phone" required><br>
        آدرس: <input type="text" name="address" required><br>
        <input type="submit" value="افزودن">
    </form>
</body>
</html>
