<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (!empty($_GET['name']) && !empty($_GET['degree']) && !empty($_GET['overtime'])) {
        
        $name = htmlspecialchars($_GET['name']);
        $degree = $_GET['degree'];
        $overtime = (int)$_GET['overtime'];
        $rate = 0;
        
        switch ($degree) {
            case "diploma":
                $rate = 50000;
                break;
            case "Advanced Diploma":
                $rate = 70000;
                break;
            case "Bachelor":
                $rate = 100000;
                break;
            case "Doctorate":
                $rate = 150000;
                break;
            case "Post-Doctorate":
                $rate = 200000;
                break;
            default:
                $rate = 0;
        }
        
        $overtime_pay = $overtime * $rate;
        
        echo "<style>
                body {
                    font-family: 'Poppins', sans-serif;
                    background: linear-gradient(135deg, #1f4037, #99f2c8);
                    color: white;
                    text-align: center;
                    padding: 20px;
                }
                table {
                    width: 60%;
                    margin: auto;
                    border-collapse: collapse;
                    background: rgba(255, 255, 255, 0.1);
                    border-radius: 10px;
                    overflow: hidden;
                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
                    transition: 0.3s ease-in-out;
                }
                th, td {
                    padding: 15px;
                    border: 1px solid rgba(255, 255, 255, 0.3);
                    transition: 0.3s ease-in-out;
                }
                th {
                    background: rgba(255, 255, 255, 0.3);
                    font-weight: bold;
                    text-transform: uppercase;
                }
                td {
                    background: rgba(0, 0, 0, 0.3);
                }
                tr:hover td {
                    background: rgba(255, 255, 255, 0.2);
                }
                p {
                    color: red;
                    font-size: 1.2em;
                    font-weight: bold;
                }
                form {
                    background: rgba(255, 255, 255, 0.2);
                    padding: 20px;
                    border-radius: 10px;
                    width: 50%;
                    margin: auto;
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
                }
                button:hover {
                    background: #ff4b2b;
                    box-shadow: 0 3px 15px rgba(255, 75, 43, 0.6);
                    transform: scale(1.05);
                }
              </style>
              <table>
                <tr>
                    <th>Name and Surname</th>
                    <th>Degree</th>
                    <th>Overtime Hours</th>
                    <th>Overtime Pay</th>
                </tr>
                <tr>
                    <td>$name</td>
                    <td>$degree</td>
                    <td>$overtime</td>
                    <td>$overtime_pay</td>
                </tr>
              </table>";
    } else {
        echo "<p>Please fill all the fields.</p>";
    }
} else {
    echo "<p>Invalid request method.</p>";
}
?>
