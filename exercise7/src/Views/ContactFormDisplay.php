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
    <link rel="stylesheet" href="css/exercise7-main.css">
    <title>Contact Form</title>
</head>

<body>
    <h2 class="exercise7-header">EXERCISE 7</h2>

    <div class="exercise7-description-container">
        <h3>Task:</h3>
        <p>Make a contact form with fields for Name, Email, and Message. On submission, display the entered data.</p>
    </div>

    <h2 class="exercise7-header">CONTACT FORM</h2>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" />

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" placeholder="Enter your message"></textarea>

            <div class="button-container">
                <button type="submit">Send</button>
            </div>

            <?php if (!empty ($success)): ?>
                <div class="contactform-success">
                    <?php echo htmlspecialchars($success); ?>
                </div>
            <?php elseif (!empty ($error)): ?>
                <div class='contactform-error'>
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
        </form>

        <div class="contactlist-section">
            <p><strong>Submitted Information:</strong></p>
            <?php if (!empty ($contactData)): ?>
                <div class="contactlist-display">
                    <p><strong>Name:</strong>
                        <?php echo htmlspecialchars($contactData['name']); ?>
                    </p>
                    <p><strong>Email:</strong>
                        <?php echo htmlspecialchars($contactData['email']); ?>
                    </p>
                    <p><strong>Message:</strong>
                        <?php echo htmlspecialchars($contactData['message']); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
