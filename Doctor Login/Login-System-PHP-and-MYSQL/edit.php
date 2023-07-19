<?php
session_start();
include "db_conn.php";

// Get id from URL parameter
$AppointmentID = $_GET['id'];

// Select data associated with this particular id
$sql = "SELECT * FROM appointments WHERE AppointmentID = $AppointmentID";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $AppointmentID = $row['AppointmentID'];
    $DoctorSSN = $row['DoctorSSN'];
    $PatientSSN = $row['PatientSSN'];
    $Illness = $row['Illness'];
    $Prescription = $row['Prescription'];
    $dosage = $row['dosage'];
} else {
    echo "No appointment found.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
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

        table {
            width: 100%;
        }

        td:first-child {
            width: 30%;
        }

        td:last-child {
            text-align: right;
        }

        button {
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            border: none;
        }

        button:hover {
            opacity: .7;
        }
    </style>
</head>

<body>
    <h2>Edit Data</h2>
    <p>
        <a href="ndex.php">Back</a>
    </p>

    <form name="edit" method="post" action="editAction.php">
        <table>
            <tr>
                <td>AppointmentID:</td>
                <td><input type="text" name="AppointmentID" value="<?php echo $AppointmentID; ?>" readonly></td>
            </tr>
            <tr>
                <td>DoctorSSN:</td>
                <td><input type="text" name="DoctorSSN" value="<?php echo $DoctorSSN; ?>"></td>
            </tr>
            <tr>
                <td>PatientSSN:</td>
                <td><input type="text" name="PatientSSN" value="<?php echo $PatientSSN; ?>"></td>
            </tr>
            <tr>
                <td>Illness:</td>
                <td><input type="text" name="Illness" value="<?php echo $Illness; ?>"></td>
            </tr>
            <tr>
                <td>Prescription:</td>
                <td><input type="text" name="Prescription" value="<?php echo $Prescription; ?>"></td>
            </tr>
            <tr>
                <td>Dosage:</td>
                <td><input type="text" name="dosage" value="<?php echo $dosage; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="update">Update</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
