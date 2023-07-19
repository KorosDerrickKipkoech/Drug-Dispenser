<?php
session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=Username is required");
        exit();
    } elseif (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM doctor WHERE Names='$uname' AND SSN='$pass'";
        $result = mysqli_query($conn, $sql);
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Appointments</title>
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

        form {
            width: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }

        h2 {
            text-align: center;
            margin-bottom: 40px;
        }

        input {
            display: block;
            border: 2px solid #ccc;
            width: 95%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }

        label {
            color: #888;
            font-size: 18px;
            padding: 10px;
        }

        button {
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
        }

        button:hover {
            opacity: .7;
        }

        .error {
            background: #F2DEDE;
            color: #A94442;
            padding: 10px;
            width: 95%;
            border-radius: 5px;
            margin: 20px auto;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        a {
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
            text-decoration: none;
        }

        a:hover {
            opacity: .7;
        }

        table {
            width: 80%;
            margin-top: 40px;
            background: #fff;
            border-radius: 15px;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table th {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: left;
            border-radius: 15px 15px 0 0;
        }

        table td {
            padding: 10px;
        }

        .user-image {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <h1>Doctor</h1>

    <?php
    if (isset($_SESSION['uname'])) {
        echo "<p>Welcome, " . $_SESSION['uname'] . "!</p>";
        // Retrieve the image based on SSN from the images table
        $uname = $_SESSION['uname'];
        $imageQuery = "SELECT * FROM images WHERE imagename='$uname'";
        $imageResult = mysqli_query($conn, $imageQuery);
        if ($imageResult && mysqli_num_rows($imageResult) === 1) {
            $imageData = mysqli_fetch_assoc($imageResult);
            $imageURL = $imageData['imageURL'];
            echo "<img src='$imageURL' alt='User Image' class='user-image'>";
        } else {
            $defaultImageURL = "images/R.png"; // Path to default image
            echo "<img src='$defaultImageURL' alt='Default Image' class='user-image'>";
        }
    }
    ?>

    <p>
        <a href="add.php">Add Appointment</a>
        <a href="search.php">Search patient</a>

    </p>

    <table>
        <tr>
            <th>AppointmentID</th>
            <th>DoctorSSN</th>
            <th>PatientSSN</th>
            <th>Illness</th>
            <th>Prescription</th>
            <th>Dosage</th>
            <th>Action</th>
        </tr>
        <?php
        // Fetch and display the appointments in the table
        $sql = "SELECT * FROM appointments";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['AppointmentID'] . "</td>";
                echo "<td>" . $row['DoctorSSN'] . "</td>";
                echo "<td>" . $row['PatientSSN'] . "</td>";
                echo "<td>" . $row['Illness'] . "</td>";
                echo "<td>" . $row['Prescription'] . "</td>";
                echo "<td>" . $row['dosage'] . "</td>";
                echo "<td>
                        <a href='edit.php?id=" . $row['AppointmentID'] . "'>Edit</a>
                        <a href='delete.php?id=" . $row['AppointmentID'] . "'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No appointments found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
