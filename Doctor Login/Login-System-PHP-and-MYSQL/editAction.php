<?php
session_start();
include "connect.php";

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$AppointmentID = mysqli_real_escape_string($mysqli, $_POST['AppointmentID']);
	$DoctorSSN = mysqli_real_escape_string($mysqli, $_POST['DoctorSSN']);
	$PatientSSN = mysqli_real_escape_string($mysqli, $_POST['PatientSSN']);
	$Illness = mysqli_real_escape_string($mysqli, $_POST['Illness']);
	$Prescription = mysqli_real_escape_string($mysqli, $_POST['Prescription']);
	$dosage = mysqli_real_escape_string($mysqli, $_POST['dosage']);

	// Check for empty fields
	if (empty($AppointmentID) || empty($DoctorSSN) || empty($PatientSSN) || empty($Illness) || empty($Prescription) || empty($dosage)) {
		if (empty($AppointmentID)) {
			echo "<font color='red'>Appointment field is empty.</font><br/>";
		}

		if (empty($DoctorSSN)) {
			echo "<font color='red'>Doctor field is empty.</font><br/>";
		}

		if (empty($PatientSSN)) {
			echo "<font color='red'>PatientSSN field is empty.</font><br/>";
		}
		if (empty($Illness)) {
			echo "<font color='red'>Illness field is empty.</font><br/>";
		}
		if (empty($Prescription)) {
			echo "<font color='green'>Prescription field is empty.</font><br/>";
		}
		if (empty($dosage)) {
			echo "<font color='green'>dosage field is empty.</font><br/>";
		}
		

	} else {
		// Update the database table
		$query = "UPDATE appointments SET `DoctorSSN` = '$DoctorSSN', `PatientSSN` = '$PatientSSN', `Illness` = '$Illness', `Prescription` = '$Prescription', `dosage` = '$dosage' WHERE `AppointmentID` = '$AppointmentID'";
		$result = mysqli_query($mysqli, $query);

		if ($result) {
			// Display success message
			echo "<p><font color='green'>Data updated successfully!</p>";
			echo "<a href='ndex.php'>View Result</a>";
		} else {
			// Display error message
			echo "<font color='red'>Failed to update data.</font><br/>";
		}
	}
}
?>
