<?php
session_start();
include "db_conn.php";

if (!isset($_SESSION['pass'])) {
    header("Location: index.php");
    exit();
}

$pharmacistID = $_SESSION['pass'];

// Retrieve dispensed drugs information from the database
$sql = "SELECT * FROM dispensed_drugs";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>View Dispensed Drugs</title>
    <style>
        body {
            background: #1690A7;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            max-width: 800px;
            margin: 50px auto;
        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .dispensed-drugs-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .dispensed-drugs-table th,
        .dispensed-drugs-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .dispensed-drugs-table th {
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
    <div class="container">
        <div class="section-title">Dispensed Drugs</div>
        <?php if (mysqli_num_rows($result) > 0) : ?>
            <table class="dispensed-drugs-table">
                <tr>
                    <th>Dispense ID</th>
                    <th>Appointment ID</th>
                    <th>Patient SSN</th>
                    <th>Drug ID</th>
                    <th>Trade Name</th>
                    <th>Formula</th>
                    <th>Price</th>
                    <th>Payment Status</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $row["dispense_id"]; ?></td>
                        <td><?php echo $row["AppointmentID"]; ?></td>
                        <td><?php echo $row["patientSSN"]; ?></td>
                        <td><?php echo $row["drug_id"]; ?></td>
                        <td><?php echo $row["trade_name"]; ?></td>
                        <td><?php echo $row["formula"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["payment_status"]; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else : ?>
            <div class="no-data">No dispensed drugs found.</div>
        <?php endif; ?>
    </div>
</body>
</html>
