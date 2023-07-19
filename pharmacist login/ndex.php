<?php
session_start();
include "db_conn.php";


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
