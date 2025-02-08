<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
    <style>
        /* تنظیمات کلی برای بدنه صفحه */
        body {
            font-family: 'Poppins', sans-serif;
            text-align: center;
            background: linear-gradient(135deg, #ece9e6, #ffffff); /* پس‌زمینه گرادینت برای زیبایی */
            color: #333;
            padding: 50px;
            animation: fadeIn 1.5s ease-in-out; /* افکت محو شدن هنگام بارگذاری */
        }
        
        /* انیمیشن محو شدن */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* استایل جدول */
        table {
            border-collapse: collapse;
            width: 80%;
            margin: auto;
            background: #ffffff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1); /* سایه برای ظاهر حرفه‌ای */
            border-radius: 12px;
            overflow: hidden;
            animation: slideIn 1s ease-in-out; /* افکت ظاهر شدن */
        }
        
        /* انیمیشن ورود جدول */
        @keyframes slideIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        
        /* استایل سلول‌های جدول */
        th, td {
            border: 1px solid rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            transition: 0.3s;
            font-size: 18px;
            font-weight: bold;
        }
        
        /* استایل سر ستون‌ها */
        th {
            background: #2C3E50; /* رنگ پس‌زمینه سرستون */
            color: white;
        }
        
        /* استایل سلول‌های معمولی */
        td {
            background: #F8F9FA;
            color: #2C3E50;
        }
        
        /* افکت هاور برای سلول‌ها */
        td:hover {
            background: #3498DB; /* تغییر رنگ هنگام هاور شدن */
            color: white;
            transform: scale(1.1); /* بزرگنمایی هنگام هاور شدن */
            transition: 0.2s ease-in-out;
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.6); /* سایه برای جذابیت */
        }
    </style>
</head>
<body>
    <h2>Multiplication Table</h2>
    <table>
        <tr>
            <th></th> <!-- اولین سلول خالی برای هماهنگی ستون‌ها -->
            <?php 
            // حلقه برای تولید شماره‌های سرستون (1 تا 10)
            for ($i = 1; $i <= 10; $i++) { 
                echo "<th>$i</th>"; 
            } 
            ?>
        </tr>
        <?php
        // حلقه برای تولید ردیف‌های جدول ضرب
        for ($row = 1; $row <= 10; $row++) {
            echo "<tr><th>$row</th>"; // شماره‌گذاری سطرهای جدول
            for ($col = 1; $col <= 10; $col++) {
                echo "<td>" . ($row * $col) . "</td>"; // محاسبه مقدار هر خانه از جدول ضرب
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
