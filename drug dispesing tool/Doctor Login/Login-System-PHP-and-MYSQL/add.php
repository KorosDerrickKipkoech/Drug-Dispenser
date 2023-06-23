<html>
<head>
	<title>Add Data</title>
</head>

<body>
	<h2>Add Data</h2>
	<p>
		<a href="ndex.php">Home</a>
	</p>

	<form action="addAction.php" method="post" name="add">
		<table width="25%" border="0">
			<tr> 
				<td>Appointment ID</td>
				<td><input type="text" name="Appointment ID"></td>
			</tr>
			<tr> 
				<td>DoctorSSN</td>
				<td><input type="text" name="DoctorSSN"></td>
			</tr>
			<tr> 
				<td>PatientSSN</td>
				<td><input type="text" name="PatientSSN"></td>
			</tr>
			<tr> 
				<td>Illness</td>
				<td><input type="text" name="Illness"></td>
			</tr>
			<tr> 
				<td>Prescription</td>
				<td><input type="text" name="Prescription"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>

