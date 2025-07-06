<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fitness Plans</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            flex-direction: column;
            padding: 40px;
        }

        .plan-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .plan {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 280px;
            padding: 20px;
            text-align: center;
        }

        .plan img {
            width: 100%;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .plan h3 {
            color: #004d40;
            margin-bottom: 10px;
        }

        .plan ul {
            text-align: left;
            padding-left: 20px;
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
    </style>
</head>
<body>

<h2 style="text-align: center; color: #00796b;">Choose Your Fitness Plan</h2>

<div class="plan-container">

    <div class="plan">
        <img src="https://generationiron.com/wp-content/uploads/2020/10/Bodybuilding-Muscle-Anatomy-Explained-1392x738.jpg" alt="Muscle Gain">
        <h3>Muscle Gain Plan</h3>
        <ul>
            <li>High protein diet</li>
            <li>Compound weightlifting</li>
            <li>Progressive overload</li>
            <li>6-day split</li>
        </ul>
    </div>

    <div class="plan">
        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b" alt="Weight Loss">
        <h3>Fat Loss Plan</h3>
        <ul>
            <li>Calorie deficit diet</li>
            <li>Cardio + HIIT</li>
            <li>Home workouts</li>
            <li>5-day routine</li>
        </ul>
    </div>

    <div class="plan">
        <img src="data:image/jpeg;base64,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" alt="Balanced">
        <h3>Balanced Health Plan</h3>
        <ul>
            <li>Moderate meals</li>
            <li>30-min walks</li>
            <li>Light training</li>
            <li>Flexible routine</li>
        </ul>
    </div>

</div>

<div class="back-link">
    <a href="index.php">← Back to Home</a>
</div>

</body>
</html>
