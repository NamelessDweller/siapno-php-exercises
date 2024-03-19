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
    <link rel="stylesheet" href="css/exercise5-main.css">
    <title>Validate Login Form</title>
</head>

<body>
    <h2 class="exercise5-header">EXERCISE 5</h2>

    <div class="exercise5-description-container">
        <h3>Task:</h3>
        <p>Extend the login system to include form validations like checking for empty fields.</p>
    </div>

    <h2 class="exercise5-header">VALIDATED LOGIN SYSTEM</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username" />
        <label for="userpassword">Password</label>
        <input type="password" id="userpassword" name="password" placeholder="Enter password" />

        <div class="button-container">
            <button type="submit">Login</button>
        </div>

        <?php if (!empty ($success)): ?>
            <div class='login-success'>
                <?php echo htmlspecialchars($success); ?>
            </div>
        <?php elseif (!empty ($error)): ?>
            <div class='login-error'>
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
    </form>
</body>

</html>