<?php
session_start();
include "connect.php";

if (isset($_POST['submit'])) {
	// Escape special characters in a string for use in an SQL statement
	$AppointmentID = mysqli_real_escape_string($mysqli, $_POST['AppointmentID']);
	$DoctorSSN = mysqli_real_escape_string($mysqli, $_POST['DoctorSSN']);
	$PatientSSN = mysqli_real_escape_string($mysqli, $_POST['PatientSSN']);
	$Illness = mysqli_real_escape_string($mysqli, $_POST['Illness']);
	$Prescription = mysqli_real_escape_string($mysqli, $_POST['Prescription']);
	$dosage = mysqli_real_escape_string($mysqli, $_POST['dosage']);

	// Check for empty fields
	if (empty($AppointmentID) || empty($DoctorSSN) || empty($PatientSSN) || empty($Illness) || empty($Prescription)) {
		echo "<font color='red'>All fields are required.</font><br/>";
	} else {
		// Insert the data into the database table
		$query = "INSERT INTO appointments (`AppointmentID`, `DoctorSSN`, `PatientSSN`, `Illness`, `Prescription`) VALUES ('$AppointmentID', '$DoctorSSN', '$PatientSSN', '$Illness', '$Prescription')";
		$result = mysqli_query($mysqli, $query);

		if ($result) {
			// Display success message
			echo "<p><font color='green'>Data added successfully!</p>";
			echo "<a href='index.php'>View Result</a>";
		} else {
			// Display error message
			echo "<font color='red'>Failed to add data.</font><br/>";
		}
	}
}
?>
