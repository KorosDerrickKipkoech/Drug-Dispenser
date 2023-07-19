<!DOCTYPE html>
<html>
<head>
	<title>Add Data</title>
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
			color: #1690A7;
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
			text-align: right;
			padding-right: 10px;
			font-weight: bold;
			color: #555;
		}

		td:last-child {
			text-align: left;
		}

		input[type="submit"] {
			background: #555;
			color: #fff;
			border: none;
			border-radius: 5px;
			padding: 10px 20px;
			cursor: pointer;
			font-size: 16px;
			float: right;
		}

		a {
			float: right;
			background: #555;
			padding: 10px 15px;
			color: #fff;
			border-radius: 5px;
			margin-right: 10px;
			border: none;
			text-decoration: none;
		}

		a:hover,
		input[type="submit"]:hover {
			opacity: 0.7;
		}
	</style>
</head>

<body>
	<h2>Add Data</h2>
	<p>
		<a href="ndex.php">Back</a>
	</p>

	<form action="addAction.php" method="post" name="add">
		<table>
			<tr>
				<td>Appointment ID</td>
				<td><input type="text" name="AppointmentID"></td>
			</tr>
			<tr>
				<td>Doctor SSN</td>
				<td><input type="text" name="DoctorSSN"></td>
			</tr>
			<tr>
				<td>Patient SSN</td>
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
				<td>dosage</td>
				<td><input type="text" name="dosage"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="submit" value="Add"></td>
			</tr>
		</table>
	</form>
</body>
</html>
