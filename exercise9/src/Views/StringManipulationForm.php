<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basic String Operations</title>
    <link rel="stylesheet" href="css/exercise9-main.css">
    <script src="js/string-manipulation.js"></script>
</head>

<body>
    <h2 class="exercise9-header">EXERCISE 9</h2>

    <div class="exercise9-description-container">
        <h3>Task:</h3>
        <p>Create a PHP script to practice basic string operations like concatenation, substring, and replacement.</p>
    </div>

    <h2 class="exercise9-header">STRING MANIPULATION</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="input-container">
            <label for="string1">String 1:</label>
            <input type="text" name="string1" id="string1" placeholder="Enter first string">
        </div>

        <div class="input-container">
            <label for="string2">String 2:</label>
            <input type="text" name="string2" id="string2" placeholder="Enter second string">
        </div>

        <div class="input-container start-container">
            <label for="start">Start (For substring):</label>
            <input type="number" name="start" id="start" placeholder="Enter start index (index starts at 0)">
        </div>

        <div class="input-container length-container">
            <label for="length">Length (For substring):</label>
            <input type="number" name="length" id="length" placeholder="Enter length of substring">
        </div>

        <div class="input-container replace-with-container">
            <label for="replaceWith">Replace With:</label>
            <input type="text" name="replaceWith" id="replaceWith" placeholder="Enter replacement string">
        </div>

        <div class="input-container">
            <label for="operation">String Operation:</label>
            <select name="operation" id="operation">
                <option value="concatenate">Concatenate</option>
                <option value="substring">Substring Split</option>
                <option value="replace">Substring Replace</option>
            </select>
        </div>

        <div class="button-container">
            <button type="submit">Start Operation</button>
        </div>

        <?php if (!empty ($error)): ?>
            <div class="operation-error">
                <?php echo $error; ?>
            </div>
        <?php elseif (!empty ($result)): ?>
            <div class="operation-success">
                <?php echo $result; ?>
            </div>
        <?php endif; ?>
    </form>
</body>

</html>
