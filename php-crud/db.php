<?php
$conn = mysqli_connect("localhost", "root", "", "php-crud");

if (!$conn) {
    echo("اتصال به پایگاه داده ناموفق بود: " . mysqli_connect_error());
}
?>
