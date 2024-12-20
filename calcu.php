<?php
$operators=[
    "addition"=> "+",
    "subtraction"=> "-",
    "multiplication"=> "*",
    "division"=> "/",
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body {
    background: linear-gradient(135deg, #74ebd5, #acb6e5);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Arial', sans-serif;
    margin: 0;
}

.calculator-container {
    background: #fff;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    max-width: 400px;
    width: 100%;
}

h3 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 1.5rem;
    color: #333;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

input,
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1rem;
}

input:focus,
select:focus {
    outline: none;
    border-color: #74c7ff;
    box-shadow: 0 0 5px rgba(116, 199, 255, 0.5);
}

.result-box {
    background: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px;
    text-align: center;
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
}

button {
    width: 48%;
    padding: 10px;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 15px;
}

button:focus {
    outline: none;
}

button[type="reset"] {
    background: #f5f5f5;
    color: #555;
}

button[type="reset"]:hover {
    background: #e3e3e3;
}

button.calculate {
    background-color: #74c7ff;
    color: white;
    font-weight: bold;
}

button.calculate:hover {
    background-color: #5a9fd4;
}

</style>

<body>
<div class="calculator-container">
        <h3>Simple Calculator</h3>
        <form>
            <label for="number1">Number 1:</label>
            <input type="number" id="number1" placeholder="Enter first number">
            
            <label for="number2">Number 2:</label>
            <input type="number" id="number2" placeholder="Enter second number">

            <select name="operator" id="">
                <option value="">Plese select an operator </option>
                <?php
                    foreach ($operators as $key => $value) {
                ?>
                <option value="<?php echo $value; ?>"><?php echo $key; ?></option>

                <?php }?>
            </select>

            <label for="result">Result:</label>
            <div id="result" class="result-box">---</div>
            
            <div class="buttons">
                <button type="reset">Reset</button>
                <button type="button" class="calculate" onclick="calculate()">Calculate</button>
            </div>
    </form>
</div>


    <script>
        async function calculate() {
            // دریافت مقادیر ورودی‌ها
            const number1 = document.getElementById('number1').value;
            const number2 = document.getElementById('number2').value;
            const operator = document.querySelector('select[name="operator"]').value;

            // بررسی مقدارهای خالی
            if (!number1 || !number2 || !operator) {
                alert('Please fill in all fields and select an operator.');
                return;
            }

            // ارسال داده‌ها به سرور با استفاده از Fetch
            const response = await fetch('calcu_action.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `number1=${encodeURIComponent(number1)}&number2=${encodeURIComponent(number2)}&operator=${encodeURIComponent(operator)}`
            });

            // دریافت نتیجه از سرور
            const result = await response.text();

            // نمایش نتیجه در فیلد result
            document.getElementById('result').value = result;
        }
    </script>
</body>
</html>