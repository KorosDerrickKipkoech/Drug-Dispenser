<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['submit'])) {
	// Escape special characters in string for use in SQL statement	
	$AppointmentID = mysqli_real_escape_string($mysqli, $_POST['AppointmentID']);
	$DoctorSSN = mysqli_real_escape_string($mysqli, $_POST['DoctorSSN']);
	$PatientSSN = mysqli_real_escape_string($mysqli, $_POST['PatientSSN']);
	$Illness = mysqli_real_escape_string($mysqli, $_POST['Illness']);
	$Prescription = mysqli_real_escape_string($mysqli, $_POST['Prescription']);
		
	// Check for empty fields
	if (empty($AppointmentID) || empty($DoctorSSN) || empty($PatientSSN)|| empty($Illness) || empty($Prescription)) {
		if (empty($AppointmentID)) {
			echo "<font color='red'>AppointmentID field is empty.</font><br/>";
		}
		
		if (empty($DoctorSSN)) {
			echo "<font color='red'>DoctorSSN field is empty.</font><br/>";
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
		
		// Show link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// If all the fields are filled (not empty) 

		// Insert data into database
		$result = mysqli_query($mysqli, "INSERT INTO appointments (`AppointmentID`, `DoctorSSN`, `PatientSSN`, `Illness`, `Prescription`) VALUES ('$AppointmentID', '$DoctorSSN', '$PatientSSN', `$Illness`, `$Prescription`)");
		
		// Display success message
		echo "<p><font color='green'>Data added successfully!</p>";
		echo "<a href='ndex.php'>View Result</a>";
	}
}
?>
</body>
</html>
