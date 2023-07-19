<?php
// Include the necessary files and establish the database connection
include "db_conn.php";

// Retrieve patients' information from the database
$sql = "SELECT * FROM patients";
$result = mysqli_query($conn, $sql);

// Check if any patients exist
if ($result && mysqli_num_rows($result) > 0) {
    $patients = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $patients = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patients</title>
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

        .patients-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .patients-table th,
        .patients-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .patients-table th {
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
        <h1>Patients</h1>

        <?php if (!empty($patients)): ?>
            <table class="patients-table">
                <thead>
                    <tr>
                        <th>SSN</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Age</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patients as $patient): ?>
                        <tr>
                            <td><?php echo $patient['SSN']; ?></td>
                            <td><?php echo $patient['firstname']; ?></td>
                            <td><?php echo $patient['lastname']; ?></td>
                            <td><?php echo $patient['email']; ?></td>
                            <td><?php echo $patient['AGE']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data">No patients found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
