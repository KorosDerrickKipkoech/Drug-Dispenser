<?php
// Include the necessary files and establish the database connection
include "db_conn.php";

// Retrieve all administrator records from the database
$sql = "SELECT * FROM administrator";
$result = mysqli_query($conn, $sql);

// Check if any administrators exist
if ($result && mysqli_num_rows($result) > 0) {
    $administrators = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $administrators = [];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrators</title>
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
            width: 600px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }

        h1 {
            text-align: center;
            color: #808080;;
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

        .add-button {
            text-align: center;
            margin-top: 20px;
        }

        .add-button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-button a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Administrators</h1>

        <?php if (!empty($administrators)): ?>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <!-- Add more columns if needed -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($administrators as $administrator): ?>
                        <tr>
                            <td><?php echo $administrator['id']; ?></td>
                            <td><?php echo $administrator['names']; ?></td>
                            <!-- Display more data from the administrator table as needed -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data">No administrators found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
