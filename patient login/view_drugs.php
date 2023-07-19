<?php
session_start();
include "db_conn.php";

if (!isset($_POST['AppointmentID'])) {
    header("Location: index.php?error=Invalid request");
    exit();
}

$appointmentID = $_POST['AppointmentID'];

// Retrieve drug information from the database
$sql = "SELECT * FROM dispensed_drugs WHERE AppointmentID = '$appointmentID'";
$result = mysqli_query($conn, $sql);

// Check if any drugs were dispensed for the given appointment
if (mysqli_num_rows($result) > 0) {
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Drugs Information</title>
        <style>
            body {
                background: #1690A7;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                flex-direction: column;
            }
        
            *{
                font-family: sans-serif;
                box-sizing: border-box;
            }
        
            h1 {
                text-align: center;
                color: #fff;
            }
        
            table {
                border-collapse: collapse;
                width: 500px;
                margin: 20px;
                background: #fff;
                border-radius: 15px;
            }
        
            th, td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #ccc;
            }
        
            th {
                background-color: #555;
                color: #fff;
            }
        </style>
    </head>
    <body>
        <h1>Drugs Information</h1>
        <table>
            <tr>
                <th>Drug ID</th>
                <th>Trade Name</th>
                <th>Formula</th>
                <th>Price</th>
                <th>Payment Status</th>
            </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $drugID = $row['drug_id'];
        $tradeName = $row['trade_name'];
        $formula = $row['formula'];
        $price = $row['price'];
        $paymentStatus = $row['payment_status'];

        echo "<tr>";
        echo "<td>$drugID</td>";
        echo "<td>$tradeName</td>";
        echo "<td>$formula</td>";
        echo "<td>$price</td>";
        echo "<td>$paymentStatus</td>";
        echo "</tr>";
    }

    echo '</table>
    </body>
    </html>';
} else {
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>No Drugs Information</title>
        <style>
            body {
                background: #1690A7;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                flex-direction: column;
            }
        
            *{
                font-family: sans-serif;
                box-sizing: border-box;
            }
        
            h1 {
                text-align: center;
                color: #fff;
            }
        
            p {
                color: #fff;
                font-style: italic;
            }
        </style>
    </head>
    <body>
        <h1>No Drugs Information</h1>
        <p>No drugs information available for the given appointment.</p>
    </body>
    </html>';
}

// Close the database connection
mysqli_close($conn);
?>
