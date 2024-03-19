<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy"
        content="default-src 'self'; script-src 'self'; object-src 'none'; style-src 'self' 'unsafe-inline';">
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="Referrer-Policy" content="no-referrer-when-downgrade">
    <meta http-equiv="Permissions-Policy" content="geolocation=(self), microphone=()">
    <link rel="stylesheet" href="css/exercise2-main.css">
    <title>Simple Calculator</title>
</head>

<body>
    <h2 class="exercise2-header">EXERCISE 2</h2>

    <div class="exercise2-description-container">
        <h3>Task:</h3>
        <p>Create a basic calculator with HTML and PHP that performs addition, subtraction, multiplication, and
            division.
        </p>
    </div>

    <h2 class="exercise2-header">SIMPLE CALCULATOR</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="num1">First Number:</label>
        <input type="number" name="num1" id="num1" placeholder="Enter the first number" />
        <label for="num2">Second Number:</label>
        <input type="number" name="num2" id="num2" placeholder="Enter the second number" />

        <div class="button-container">
            <button type="submit" name="operator" value="add">+</button>
            <button type="submit" name="operator" value="subtract">-</button>
            <button type="submit" name="operator" value="multiply">*</button>
            <button type="submit" name="operator" value="divide">/</button>
        </div>

        <?php
        if (isset ($result)) {
            // Convert operator to a symbol for display
            switch ($operator) {
                case 'add':
                    $opSymbol = '+';
                    break;
                case 'subtract':
                    $opSymbol = '-';
                    break;
                case 'multiply':
                    $opSymbol = '*';
                    break;
                case 'divide':
                    $opSymbol = '/';
                    break;
                default:
                    $opSymbol = '?';
            }
            echo "<div class='calc-result'>" . htmlspecialchars((string) $num1) . " " . $opSymbol . " " . htmlspecialchars((string) $num2) . " = " . htmlspecialchars((string) $result) . "</div>";
        } elseif (isset ($error)) {
            echo "<div class='calc-error'>Error: " . htmlspecialchars($error) . "</div>";
        }
        ?>
    </form>
</body>

</html>