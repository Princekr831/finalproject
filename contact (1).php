<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $feedback = htmlspecialchars($_POST['message']);

    $message = "Thanks $name! Your message has been received.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            flex-direction: column;
            padding: 40px;
        }

        .banner {
            width: 100%;
            max-width: 800px;
            border-radius: 12px;
            margin-bottom: 30px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }

        .form-wrapper {
            display: flex;
            align-items: flex-start;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        form {
            width: 100%;
            max-width: 400px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        textarea {
            height: 120px;
        }

        .back-link {
            margin-top: 30px;
            text-align: center;
        }

        .back-link a {
            color: #00796b;
            font-weight: bold;
            text-decoration: none;
        }

        .message {
            color: green;
            font-weight: bold;
        }

        .side-image {
            width: 250px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<h2 style="color: #00796b;">Contact Us</h2>

<img class="banner" src="data:image/png;base64,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" alt="Contact Banner">

<?php if ($message) { echo "<p class='message'>$message</p>"; } ?>

<div class="form-wrapper">
    <img src="https://cdn-icons-png.flaticon.com/512/2951/2951373.png" class="side-image" alt="Contact Icon">

    <form method="POST">
        <input type="text" name="name" placeholder="Your name" required>
        <input type="email" name="email" placeholder="Your email" required>
        <textarea name="message" placeholder="Write your message..." required></textarea>
        <button type="submit">Send Message</button>
    </form>
</div>

<div class="back-link">
    <a href="index.php">← Back to Home</a>
</div>

</body>
</html>

