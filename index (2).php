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
    <title>Fitness & Diet - Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            flex-direction: column;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #e0f7fa;
            margin: 0;
            padding: 0;
        }

        .nav {
            width: 100%;
            background-color: #004d40;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 18px;
        }

        .nav a {
            color: #fff;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
        }

        .welcome {
            margin: 30px auto 10px;
            font-size: 24px;
            color: #00796b;
            text-align: center;
        }

        .features {
            margin-top: 30px;
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card {
            background: #ffffff;
            padding: 20px;
            width: 250px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card img {
            width: 70px;
            height: 70px;
            object-fit: contain;
            margin-bottom: 12px;
        }

        .card h3 {
            color: #004d40;
            margin-bottom: 8px;
        }

        .logout {
            position: absolute;
            top: 20px;
            right: 20px;
            background: #f44336;
            color: white;
            padding: 8px 15px;
            border-radius: 8px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="nav">
    <a href="index.php">Home</a>
    <a href="plans.php">Plans</a>
    <a href="logtrack.php">Tracker</a>
    <a href="contact.php">Contact</a>
</div>

<a class="logout" href="logout.php">Logout</a>

<div class="welcome">
    Welcome, <?php echo $_SESSION['user_name']; ?>! 🏋️‍♂️
</div>

<div class="features">
    <div class="card">
        <img src="images/workout.png" alt="Workout">
        <h3>Workout Plans</h3>
        <p>Customized fitness routines to suit your goals.</p>
    </div>
    <div class="card">
        <img src="images/diet.png" alt="Diet">
        <h3>Diet Plans</h3>
        <p>Balanced diet programs for weight gain or loss.</p>
    </div>
    <div class="card">
        <img src="images/track.png" alt="Track">
        <h3>Daily Tracker</h3>
        <p>Monitor your progress and stay motivated daily.</p>
    </div>
</div>

</body>
</html>
