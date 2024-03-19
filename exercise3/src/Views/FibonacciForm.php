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
    <link rel="stylesheet" href="css/exercise3-main.css">
    <title>Fibonacci Series</title>
</head>

<body>
    <h2 class="exercise3-header">EXERCISE 3</h2>

    <div class="exercise3-description-container">
        <h3>Task:</h3>
        <p>Write a PHP script that prints the first 10 numbers of the Fibonacci sequence.</p>
    </div>

    <h2 class="exercise3-header">FIBONACCI SERIES</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="length">Number of Fibonacci series:</label>
        <input type="number" name="length" id="length"
            placeholder="Enter length of series (putting 0 or 1 results to 0, 1)" />

        <div class="button-container">
            <button type="submit">Generate</button>
        </div>

        <?php if (isset ($series)): ?>
            <div class='calc-result'>
                <p>
                    <strong>
                        <?php echo "The first " . count($series) . " numbers in the Fibonacci sequence:"; ?>
                    </strong>
                </p>

                <?php echo htmlspecialchars(implode(', ', $series)); ?>
            </div>
        <?php elseif (isset ($error)): ?>
            <div class='calc-error'>
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
    </form>
</body>

</html>