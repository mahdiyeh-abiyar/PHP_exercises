<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary_Calculation</title>
</head>
<style>
                body {
                    font-family: 'Poppins', sans-serif;
                    background: linear-gradient(135deg, #1f4037, #99f2c8);
                    color: white;
                    text-align: center;
                    padding: 20px;
                    
                }
                form {
                    background: rgba(255, 255, 255, 0.2);
                    padding: 20px;
                    border-radius: 10px;
                    width: 50%;
                    margin: auto;
                    padding: 20px;
                    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.4);
                }
                input, select, button {
                    display: block;
                    width: 100%;
                    margin: 10px 0;
                    padding: 10px;
                    border-radius: 5px;
                    border: none;
                    font-size: 1em;
                    transition: 0.3s;
                }
                input:focus, select:focus {
                    outline: none;
                    box-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
                }
                button {
                    background: #ff416c;
                    color: white;
                    cursor: pointer;
                    font-weight: bold;
                    transition: 0.3s;
                    box-shadow: 0 3px 10px rgba(255, 65, 108, 0.4);
                    margin-top: 30px;
                }
                button:hover {
                    background: #ff4b2b;
                    box-shadow: 0 3px 15px rgba(255, 75, 43, 0.6);
                    transform: scale(1.02);
                }
                #name,#overtime{
                    width: 97%;
                }
              </style>
<body>
    <?php
        // تعریف آرایه گزینه‌ها
        $degrees = ["Diploma", "Advanced Diploma", "Bachelor", "Doctorate", "Post-Doctorate"];
    ?>
    <form action="Salary_Calculation_action.php">
        <label for="name">Name and Surname</label>
        <input type="text" name="name" id="name">

        <label for="degree">Degree</label>
        <select name="degree" id="degree">
            <?php
                // نمایش گزینه‌ها از آرایه
                foreach ($degrees as $degree) {
                    echo "<option value='$degree'>$degree</option>";
                }
            ?>
        </select>


        <label for="overtime">Overtime hours per month</label>
        <input type="number" name="overtime" id="overtime">

        <button>calculation of overtime</button>
    </form>
</body>
</html>