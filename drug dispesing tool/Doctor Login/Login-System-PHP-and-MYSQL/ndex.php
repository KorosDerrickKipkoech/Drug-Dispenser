<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (lastest entry first)
$doctorQuery = "SELECT * FROM appointments";
$doctorResult = mysqli_query($conn, $doctorQuery);
?>

<html>
<head>	
	<title>Appointments</title>
</head>

<body>
	<h2>Homepage</h2>
	<p>
		<a href="add.php">Add New Data</a>
	</p>
	<table width='80%' border=0>
		<tr bgcolor='#DDDDDD'>
			<td><strong>AppointmentID</strong></td>
			<td><strong>DoctorSSN</strong></td>
			<td><strong>PatientSSN</strong></td>
			<td><strong>Illness</strong></td>
			<td><strong>Prescription</strong></td>
		</tr>
		<?php
		// Fetch the next row of a result set as an associative array
		while ($res = mysqli_fetch_assoc($doctorResult)) {
			echo "<tr>";
			echo "<td>".$res['AppointmentID']."</td>";
			echo "<td>".$res['DoctorSSN']."</td>";
			echo "<td>".$res['PatientSSN']."</td>";	
			echo "<td>".$res['Illness']."</td>";	
			echo "<td>".$res['Prescription']."</td>";	
			
			echo "<td><a href=\"edit.php?AppointmentID=$res[AppointmentID]\">Edit</a> | 
			<a href=\"delete.php?AppointmentID=$res[AppointmentID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
	</table>
</body>
</html>
