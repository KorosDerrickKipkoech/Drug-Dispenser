<?php
session_start();
include "db_conn.php";

if (!isset($_SESSION['pass'])) {
    header("Location: index.php");
    exit();
}

$pharmacistID = $_SESSION['pass'];

$sql = "SELECT * FROM pharmacist WHERE ID='$pharmacistID'";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $pharmacistName = $row['names'];
    $pharmacistPharmacy = $row['pharmacy'];
} else {
    echo "Pharmacist not found.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pharmacist</title>
    <style>
        body {
            background: #1690A7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        * {
            font-family: sans-serif;
            box-sizing: border-box;
        }

        .container {
            width: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
        }

        .pharmacist-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .pharmacist-info img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .pharmacist-details {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .pharmacist-details span {
            font-weight: bold;
        }

        .btn-container {
            display: flex;
            justify-content: center;
        }

        .btn {
            padding: 10px 20px;
            margin: 0 10px;
            background: #555;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <h1>Pharmacist</h1>

    <div class="container">
        <div class="pharmacist-info">
            <img src="images/OIP (1).jpg" alt="Pharmacist Image">
            <div class="pharmacist-details">
                <h2 style="text-align: center;">Welcome, <?php echo $pharmacistName; ?></h2>
                <p><span>ID:</span> <?php echo $pharmacistID; ?></p>
                <p><span>Name:</span> <?php echo $pharmacistName; ?></p>
                <p><span>Pharmacy:</span> <?php echo $pharmacistPharmacy; ?></p>
            </div>
        </div>

        <div class="btn-container">
            <a href="view_drugs.php" class="btn">View Drugs</a>
            <a href="dispense_drugs.php" class="btn">Dispense Drugs</a>
            <a href="ndex.php" class="btn">View Prescriptions</a>
            <a href="view_dispensed_drugs.php" class="btn">View Dispensed Drugs</a>
        </div>
    </div>
</body>
</html>
