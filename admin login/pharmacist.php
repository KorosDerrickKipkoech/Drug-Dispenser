<?php
// Include the necessary files and establish the database connection
include "db_conn.php";

// Retrieve pharmacists' information from the database
$sql = "SELECT * FROM pharmacist";
$result = mysqli_query($conn, $sql);

// Check if any pharmacists exist
if ($result && mysqli_num_rows($result) > 0) {
    $pharmacists = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $pharmacists = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pharmacists</title>
    <style>
        body {
            background: #1690A7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
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

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .data-table th,
        .data-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .data-table th {
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
        <h1>Pharmacists</h1>

        <?php if (!empty($pharmacists)): ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Pharmacy</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pharmacists as $pharmacist): ?>
                        <tr>
                            <td><?php echo $pharmacist['ID']; ?></td>
                            <td><?php echo $pharmacist['names']; ?></td>
                            <td><?php echo $pharmacist['pharmacy']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data">No pharmacists found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
