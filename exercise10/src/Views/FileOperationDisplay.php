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
    <link rel="stylesheet" href="css/exercise10-main.css">
    <script src="js/write-operation.js"></script>
    <title>File Operations</title>
</head>

<body>

    <h2 class="exercise10-header">EXERCISE 10</h2>

    <div class="exercise10-description-container">
        <h3>Task:</h3>
        <p>Write a script that creates a file, writes some text into it, reads the file, and then deletes it.</p>
    </div>

    <h2 class="exercise10-header">BASIC FILES OPERATIONS</h2>

    <div class="container">
        <div class="file-input">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="createinput-container">
                    <label for="filename">File Name:</label>
                    <input type="text" id="filename" name="filename" placeholder="Enter file name" />
                </div>

                <div class="createbutton-container">
                    <button type="submit" name="action" value="create">Create</button>
                </div>

                <?php if (!empty ($success)): ?>
                    <div class="operation-success">
                        <?php echo htmlspecialchars($success); ?>
                    </div>
                <?php elseif (!empty ($error)): ?>
                    <div class='operation-error'>
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
            </form>
        </div>

        <div class="file-section">
            <p><strong>List of Files:</strong></p>

            <div class="file-display">
                <?php if (isset ($_SESSION['currentFile'])): ?>
                    <p>
                        <?php echo "<strong>Filename:</strong> " . htmlspecialchars(basename($_SESSION['currentFile'])); ?>
                    </p>

                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <input type="hidden" name="filename"
                            value="<?php echo htmlspecialchars(basename($_SESSION['currentFile'])); ?>">

                        <div class="button-container">
                            <button type="submit" name="action" value="read">Read</button>
                            <button type="submit" name="action" value="delete">Delete</button>
                        </div>
                    </form>

                    <div class="file-content-display">
                        <?php
                        if (!empty ($_SESSION['fileContent'])) {
                            echo "<pre>" . nl2br(htmlspecialchars($_SESSION['fileContent'])) . "</pre>";
                        }
                        ?>
                    </div>
                <?php else: ?>
                    <p>No file created yet for this session.</p>
                <?php endif; ?>
            </div>

            <?php if (isset ($_SESSION['currentFile'])): ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="display: none;"
                    id="write-form">
                    <div class="input-container">
                        <label for="content">Content:</label>
                        <textarea id="content" name="content" placeholder="Enter content to write"></textarea>
                        <input type="hidden" name="filename"
                            value="<?php echo htmlspecialchars(basename($_SESSION['currentFile'])); ?>">
                    </div>
                    <div class="button-container">
                        <button type="submit" name="action" value="write">Done</button>
                    </div>
                </form>
            <?php endif; ?>

            <div class="button-container">
                <button type="button" id="write-button">Write</button>
            </div>
        </div>
    </div>

</body>

</html>