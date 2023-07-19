<?php
session_start();
include "db_conn.php";

// Check if the user is logged in with a valid session
if (!isset($_SESSION['SSN'])) {
    header("Location: login.php");
    exit();
}

$doctorSSN = $_POST['doctorSSN'];

// Retrieve doctor details from the database based on SSN
$sql = "SELECT * FROM doctor WHERE SSN = '$doctorSSN'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $SSN = $row["SSN"];
    $names = $row["Names"];
    $specialty = $row["Speciality"];
    $yearsOfExperience = $row["YearsOfExperience"];
} else {
    header("Location: patient_login.php?error=Doctor not found");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Details</title>
    <style>
        body {
            background-color: #1690A7;
            color: #fff;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .doctor-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .doctor-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-right: 20px;
        }

        .doctor-info-details {
            line-height: 1.5;
            color: #000; /* Adjusted text color for better visibility */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="section-title">Doctor Details</div>
        <?php if (isset($row)) : ?>
            <div class="doctor-info">
                <img class="doctor-image" src="images/R.png" alt="Doctor Image">
                <div class="doctor-info-details">
                    <strong>SSN:</strong> <?php echo $SSN; ?><br>
                    <strong>Names:</strong> <?php echo $names; ?><br>
                    <strong>Specialty:</strong> <?php echo $specialty; ?><br>
                    <strong>Years of Experience:</strong> <?php echo $yearsOfExperience; ?><br>
                </div>
            </div>
        <?php else : ?>
            <div class="no-data">No doctor found with the provided SSN.</div>
        <?php endif; ?>
    </div>
</body>
</html>
