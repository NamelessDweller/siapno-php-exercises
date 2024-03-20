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
    <link rel="stylesheet" href="css/exercise8-main.css">
    <title>Date and Time</title>
</head>

<body>
    <h2 class="exercise8-header">EXERCISE 8</h2>

    <div class="exercise8-description-container">
        <h3>Task:</h3>
        <p>Write a script that displays the current date and time in various formats.</p>
    </div>

    <h2 class="exercise8-header">WORKING WITH DATE AND TIME</h2>

    <div class="exercise8-datetime-container">
        <h3>Time in Manila, Philippines:</h3>
        <ul class="datetime-list">
            <li><strong>Y-m-d H:i:s:</strong>
                <?= htmlspecialchars($ymdHis) ?>
            </li>
            <li><strong>Day Name:</strong>
                <?= htmlspecialchars($dayName) ?>
            </li>
            <li><strong>ISO 8601:</strong>
                <?= htmlspecialchars($iso8601) ?>
            </li>
            <li><strong>RFC 2822:</strong>
                <?= htmlspecialchars($rfc2822) ?>
            </li>
            <li><strong>Timestamp:</strong>
                <?= htmlspecialchars((string) $timestamp) ?>
            </li>
        </ul>
    </div>
</body>

</html>
