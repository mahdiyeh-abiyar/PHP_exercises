<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['name']) && !empty($_POST['language'])) {
        
        $name = htmlspecialchars($_POST['name']);
        $language = htmlspecialchars($_POST['language']);
        
        echo "<p style='font-size: 24px; font-weight: bold; color: #4CAF50; background: #f0f0f0; padding: 10px; border-radius: 8px; text-align: center; width: 50%; margin: 20px auto;'>Welcome, $name! You selected $language.</p>";
    } else {
        echo "<p style='color:red;font-weight:bold; text-align: center;'>Please enter your name and select a language.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Language Selection</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            text-align: center;
            padding: 50px;
        }
        form {
            background: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 10px;
            width: 40%;
            margin: auto;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
        }
        input[type="text"], button {
            display: block;
            width: 80%;
            margin: 10px auto;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 1em;
            transition: 0.3s;
        }
        input[type="text"]:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.6);
        }
        .radio-group {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .radio-group label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1em;
        }
        button {
            background: #ff416c;
            color: white;
            cursor: pointer;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 3px 10px rgba(255, 65, 108, 0.4);
        }
        button:hover {
            background: #ff4b2b;
            box-shadow: 0 3px 15px rgba(255, 75, 43, 0.6);
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <form action="" method="post">
        <p style="font-size: 20px; font-weight: bold;">Choose your desired language</p>
        
        <input type="text" name="name" placeholder="Enter your name">
        
        <div class="radio-group">
            <label><input type="radio" name="language" value="Persian"> Persian</label>
            <label><input type="radio" name="language" value="English"> English</label>
            <label><input type="radio" name="language" value="Spanish"> Spanish</label>
            <label><input type="radio" name="language" value="French"> French</label>
        </div>

        <button type="submit">Confirmation</button>
    </form>
</body>
</html>