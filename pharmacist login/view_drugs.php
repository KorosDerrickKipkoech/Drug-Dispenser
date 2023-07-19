<?php
include "db_conn.php";

// Handle delete action
if (isset($_GET['delete'])) {
    $deleteID = $_GET['delete'];
    $deleteQuery = "DELETE FROM drugs WHERE drugID='$deleteID'";
    mysqli_query($conn, $deleteQuery);
}

$sql = "SELECT * FROM drugs";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Drugs</title>
    <style>
        body {
            background: #1690A7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        * {
            font-family: sans-serif;
            box-sizing: border-box;
        }

        table {
            width: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .action-buttons a {
            display: inline-block;
            margin: 0 10px;
            padding: 8px 16px;
            background-color: #555;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .action-buttons a:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <h1>View Drugs</h1>

    <table>
        <tr>
            <th>Drug ID</th>
            <th>Trade Name</th>
            <th>Formula</th>
            <th>Action</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['drugID'] . "</td>";
                echo "<td>" . $row['tradename'] . "</td>";
                echo "<td>" . $row['formula'] . "</td>";
                echo "<td>
                        <a href='edit_drug.php?id=" . $row['drugID'] . "'>Edit</a>
                        <a href='view_drugs.php?delete=" . $row['drugID'] . "'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No drugs found.</td></tr>";
        }
        ?>
    </table>

    <div class="action-buttons">
        <a href="add_drug.php">Add New Drug</a>
    </div>
</body>
</html>
