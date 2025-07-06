<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';
$user_id = $_SESSION['user_id'];
$message = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $meal = mysqli_real_escape_string($conn, $_POST['meal']);
    $workout = mysqli_real_escape_string($conn, $_POST['workout']);
    $date = date("Y-m-d");

    $sql = "INSERT INTO tracker (user_id, date, meal, workout) VALUES ('$user_id', '$date', '$meal', '$workout')";
    if (mysqli_query($conn, $sql)) {
        $message = "✅ Entry saved!";
    } else {
        $message = "❌ Error: " . mysqli_error($conn);
    }
}

// Fetch previous entries
$entries = mysqli_query($conn, "SELECT * FROM tracker WHERE user_id = '$user_id' ORDER BY date DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daily Tracker</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            padding: 40px;
            flex-direction: column;
            background: #f0f4f8;
            font-family: 'Segoe UI', sans-serif;
        }

        textarea {
            width: 100%;
            height: 80px;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
        }

        .form-box {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .log-box {
            margin-top: 40px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .log-entry {
            background: #ffffff;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
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

        .msg {
            color: green;
            font-weight: bold;
            text-align: center;
            margin: 10px 0;
        }

        h2, h3 {
            text-align: center;
            color: #00796b;
        }

        button {
            padding: 10px 20px;
            background-color: #00796b;
            border: none;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background-color: #005f56;
        }
    </style>
</head>
<body>

<h2>📝 Daily Meal & Workout Tracker</h2>

<?php if ($message) { echo "<p class='msg'>$message</p>"; } ?>

<div class="form-box">
    <form method="POST">
        <label>🍽️ Meals you had today:</label><br>
        <textarea name="meal" placeholder="Example: 2 eggs, dal, rice..." required></textarea><br>

        <label>💪 Workouts you did today:</label><br>
        <textarea name="workout" placeholder="Example: 30 pushups, squats..." required></textarea><br>

        <button type="submit">Save Entry</button>
    </form>
</div>

<div class="log-box">
    <h3>📅 Your Past Logs</h3>
    <?php while($row = mysqli_fetch_assoc($entries)) { ?>
        <div class="log-entry">
            <strong>Date:</strong> <?php echo $row['date']; ?><br>
            <strong>Meal:</strong> <?php echo nl2br(htmlspecialchars($row['meal'])); ?><br>
            <strong>Workout:</strong> <?php echo nl2br(htmlspecialchars($row['workout'])); ?>
        </div>
    <?php } ?>
</div>

<div class="back-link">
    <a href="index.php">← Back to Home</a>
</div>

</body>
</html>

