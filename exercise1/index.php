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
    <link rel="stylesheet" href="exercise1-main.css">
    <title>Hello, World!</title>
</head>

<body>
    <h2 class="exercise1-header">EXERCISE 1</h2>

    <div class="exercise1-description-container">
        <h3>Task:</h3>
        <p>Write a simple PHP script to output "Hello, World!" to the browser.</p>
    </div>

    <div class="exercise1-task-container">
        <?php
        echo "Hello, World!";
        ?>
    </div>
</body>

</html>