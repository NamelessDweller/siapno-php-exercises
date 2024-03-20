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
    <link rel="stylesheet" href="css/exercise6-main.css">
    <title>Array Sorting</title>
</head>

<body>
    <h2 class="exercise6-header">EXERCISE 6</h2>

    <div class="exercise6-description-container">
        <h3>Task:</h3>
        <p>Create a PHP script that sorts an array of numbers in ascending and descending order.</p>
    </div>

    <h2 class="exercise6-header">ARRAY SORTING</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="array">Enter numbers (comma-separated):</label>
        <input type="text" name="array" id="array" placeholder="e.g. 1, 2, 3, 4">

        <label for="order">Sort Order:</label>
        <select name="order" id="order">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select>

        <div class="button-container">
            <button type="submit">Sort</button>
        </div>

        <?php if ($showResults): ?>
            <div class="sort-result">
                <p><strong>Original Array:</strong></p>
                <pre><?php echo htmlspecialchars($originalArrayInput); ?></pre>
                <p>
                    <strong>
                        <?php echo 'Sorted by ' . ($order === 'asc' ? 'ascending' : 'descending') . ' order:'; ?>
                    </strong>
                </p>
                <pre><?php echo htmlspecialchars($sortedArrayString); ?></pre>
            </div>
        <?php else: ?>
            <?php if ($postRequestMade): ?>
                <div class="sort-error">
                    <p>No valid numbers provided or invalid input.</p>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </form>

</body>

</html>
