<?php
session_start();
include "db_conn.php";

if (isset($_GET['pass'])) {
    $ID = $_GET['pass'];

    // Retrieve supervisor information from the database
    $sql = "SELECT * FROM administrator WHERE id = '$ID'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $supervisorName = $row['names'];
    } else {
        echo "Administrator not found.";
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrator</title>
    <style>
        body {
            background: #1690A7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        * {
            font-family: sans-serif;
            box-sizing: border-box;
        }

        .container {
            width: 1000px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
            margin-top: 0;
        }

        .supervisor-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .supervisor-info img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .supervisor-details {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .supervisor-details span {
            font-weight: bold;
        }

        .buttons-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .button {
            margin: 0 10px;
        }

        .button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .button a:hover {
            background-color: #45a049;
        }

        .contracts-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .contracts-table th,
        .contracts-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .contracts-table th {
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }

        .no-data {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Admin</h1>

    <div class="container">
        <div class="supervisor-info">
            <?php $imagePath = "images/R.png"; ?>
            <img src="<?php echo $imagePath; ?>" alt="Supervisor Image">
            <div class="supervisor-details">
                <h2 style="text-align: center;">Welcome, <?php echo $supervisorName; ?></h2>
                <p><span>Supervisor ID:</span> <?php echo $ID; ?></p>
                <p><span>Name:</span> <?php echo $supervisorName; ?></p>
            </div>
        </div>

        <div class="buttons-container">
            <div class="button">
                <a href="administrator.php">Admin</a>
            </div>
            <div class="button">
                <a href="patient.php">Patient</a>
            </div>
            <div class="button">
                <a href="doctor.php">Doctor</a>
            </div>
            <div class="button">
                <a href="pharmacist.php">Pharmacist</a>
            </div>
            <div class="button">
                <a href="supervisor.php">Supervisor</a>
            </div>
        </div>

        <!-- Rest of your HTML content -->

    </div>
</body>
</html>
