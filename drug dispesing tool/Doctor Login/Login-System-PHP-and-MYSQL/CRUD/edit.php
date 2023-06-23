<?php
session_start(); 
include "db_conn.php";
// Get id from URL parameter
$AppointmentID = $_GET['AppointmentID'];

// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM appointments WHERE AppointmentID = $AppointmentID");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$AppointmentID = $resultData['AppointmentID'];
$DoctorSSN = $resultData['DoctorSSN'];
$PatientSSN = $resultData['PatientSSN'];
$Illness = $resultData['Illness'];
$Prescription = $resultData['Prescription'];
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
    <h2>Edit Data</h2>
    <p>
	    <a href="index.php">Home</a>
    </p>
	
	<form name="edit" method="post" action="editAction.php">
		<table border="0">
			<tr> 
				<td>AppointmentID</td>
				<td><input type="text" name="AppointmentID" value="<?php echo $AppointmentID; ?>"></td>
			</tr>
			<tr> 
				<td>DoctorSSN</td>
				<td><input type="text" name="DoctorSSN" value="<?php echo $DoctorSSN; ?>"></td>
			</tr>
			<tr> 
				<td>PatientSSN</td>
				<td><input type="text" name="PatientSSN" value="<?php echo $PatientSSN; ?>"></td>
			</tr>
			<tr> 
				<td>Illness</td>
				<td><input type="text" name="Illness" value="<?php echo $Illness; ?>"></td>
			</tr>
			<tr> 
				<td>Prescription</td>
				<td><input type="text" name="Presciption" value="<?php echo $Prescription; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="AppointmentID" value=<?php echo $AppointmentID; ?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
