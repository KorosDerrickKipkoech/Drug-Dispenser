<?php
session_start(); 
include "db_conn.php";

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$AppointmentID = mysqli_real_escape_string($mysqli, $_POST['AppointmentID']);
	$DoctorSSN = mysqli_real_escape_string($mysqli, $_POST['DoctorSSN']);
	$PatientSSN = mysqli_real_escape_string($mysqli, $_POST['PatientSSN']);
	$Illness = mysqli_real_escape_string($mysqli, $_POST['Illness']);	
	
	// Check for empty fields
	if (empty($AppointmentID) || empty($DoctorSSN) || empty($PatientSSN) || empty($Illness) || empty($Prescription)) {
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
			echo "<font color='red'>Prescription field is empty.</font><br/>";
		}

	} else {
		// Update the database table
		$result = mysqli_query($mysqli, "UPDATE appointments SET `AppointmentID` = '$AppointmentID', `DoctorSSN` = '$DoctorSSN', `PatientSSN` = '$PatientSSN', `Illness`  = '$Illness', `Prescription` = '$Prescription' WHERE `AppointmentID` = $AppointmentID");
		
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='ndex.php'>View Result</a>";
	}
}
