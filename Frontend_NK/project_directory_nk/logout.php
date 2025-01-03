<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging Out</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 100px;
        }
        .message {
            background-color: #d4edda;
            color: #155724;
            padding: 15px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            font-size: 1.2rem;
        }
        .redirect-message {
            margin-top: 20px;
            font-size: 1rem;
            color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="message">
        <i class="fas fa-sign-out-alt"></i> You have successfully logged out.
    </div>
    <div class="redirect-message">
        You will be redirected to the homepage shortly.
    </div>

    <script>
        // Redirect to Welcomepage.php after 3 seconds
        setTimeout(() => {
            window.location.href = "Welcomepage.php";
        }, 3000);
    </script>
</body>
</html>
