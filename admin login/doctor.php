<?php
// Include the necessary files and establish the database connection
include "db_conn.php";

// Retrieve doctors' information from the database
$sql = "SELECT * FROM doctor";
$result = mysqli_query($conn, $sql);

// Check if any doctors exist
if ($result && mysqli_num_rows($result) > 0) {
    $doctors = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $doctors = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctors</title>
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
        <h1>Doctors</h1>

        <?php if (!empty($doctors)): ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>SSN</th>
                        <th>Name</th>
                        <th>Speciality</th>
                        <th>Years of Experience</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($doctors as $doctor): ?>
                        <tr>
                            <td><?php echo $doctor['SSN']; ?></td>
                            <td><?php echo $doctor['Names']; ?></td>
                            <td><?php echo $doctor['Speciality']; ?></td>
                            <td><?php echo $doctor['YearsOfExperience']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data">No doctors found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
