<?php
session_start();
include "db_conn.php";

// Check if the user is logged in with a valid session
if (!isset($_SESSION['SSN'])) {
    header("Location: login.php");
    exit();
}

$pass = $_SESSION['SSN'];

// Retrieve patient data from the database
$sql = "SELECT * FROM Patients WHERE SSN = '$pass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $SSN = $row["SSN"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $email = $row["email"];
    $age = $row["AGE"];
    // Retrieve appointments for the patient
    $appointmentSql = "SELECT * FROM appointments WHERE PatientSSN = '$pass'";
    $appointmentResult = mysqli_query($conn, $appointmentSql);
} else {
    header("Location: index.php?error=Patient not found");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Details</title>
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
            max-width: 1000px;
            margin: 50px auto;
        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .patient-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding: 20px;
            background: #f2f2f2;
            border-radius: 10px;
        }

        .patient-info img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 20px;
        }

        .patient-info-details {
            line-height: 1.5;
        }

        .patient-info-details strong {
            font-weight: bold;
        }

        .appointments-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .appointments-table th,
        .appointments-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .appointments-table th {
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }

        .no-data {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
        }

        .action-button {
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            border: none;
            text-decoration: none;
            margin-top: 10px;
        }

        .action-button:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="section-title">Patient Details</div>
        <?php if (isset($row)) : ?>
            <div class="patient-info">
                <?php if (!empty($imagePath)) : ?>
                    <img src="<?php echo $imagePath; ?>" alt="Patient Image">
                <?php else : ?>
                    <img src="images/ttt.png" alt="Default Image">
                <?php endif; ?>
                <div class="patient-info-details">
                    <strong>SSN:</strong> <?php echo $SSN; ?><br>
                    <strong>First Name:</strong> <?php echo $firstname; ?><br>
                    <strong>Last Name:</strong> <?php echo $lastname; ?><br>
                    <strong>Email:</strong> <?php echo $email; ?><br>
                    <strong>Age:</strong> <?php echo $age; ?>
                </div>
            </div>
        <?php else : ?>
            <div class="no-data">No patient found with the provided SSN.</div>
        <?php endif; ?>

        <div class="section-title">Appointments</div>
        <?php if (isset($appointmentResult) && mysqli_num_rows($appointmentResult) > 0) : ?>
            <table class="appointments-table">
                <tr>
                    <th>Appointment ID</th>
                    <th>Doctor SSN</th>
                    <th>Patient SSN</th>
                    <th>Illness</th>
                    <th>Prescription</th>
                    <th>dosage</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
                <?php while ($appointmentRow = mysqli_fetch_assoc($appointmentResult)) : ?>
                    <tr>
                        <td><?php echo $appointmentRow["AppointmentID"]; ?></td>
                        <td><?php echo $appointmentRow["DoctorSSN"]; ?></td>
                        <td><?php echo $appointmentRow["PatientSSN"]; ?></td>
                        <td><?php echo $appointmentRow["Illness"]; ?></td>
                        <td><?php echo $appointmentRow["Prescription"]; ?></td>
                        <td><?php echo $appointmentRow["dosage"]; ?></td>
                        <td>
                            <form method="POST" action="doctor_details.php">
                                <input type="hidden" name="doctorSSN" value="<?php echo $appointmentRow["DoctorSSN"]; ?>">
                                <input type="submit" class="action-button" value="View Doctor's Information">
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="view_drugs.php">
                                <input type="hidden" name="AppointmentID" value="<?php echo $appointmentRow["AppointmentID"]; ?>">
                                <input type="submit" class="action-button" value="View Drugs Information">
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else : ?>
            <div class="no-data">No appointments found for the patient.</div>
        <?php endif; ?>
    </div>
</body>
</html>
