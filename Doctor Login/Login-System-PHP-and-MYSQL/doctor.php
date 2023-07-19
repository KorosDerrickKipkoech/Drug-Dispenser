<?
$sql = "SELECT SSN, firstname, lastname, email, age FROM patients";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Patients Data</title>
  <style>
    /* CSS for top right corner */
    .top-right {
      position: absolute;
      top: 10px;
      right: 10px;
    }

    /* CSS for center table */
    .center-table {
      margin: auto;
      width: 50%;
      text-align: center;
    }
  </style>
</head>
<body>
  </div>

  <table class="center-table">
    <tr>
      <th>SSN</th>
      <th>Names</th>
      <th>Speciality</th>
      <th>YearsOfExperience</th>
    </tr>
    <?php
    // Display patient data in the middle table
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['SSN'] . "</td>";
            echo "<td>" . $row['firstname'] . "</td>";
            echo "<td>" . $row['lastname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No patients found</td></tr>";
    }
    ?>
  </table>

  <?php
  // Close the connection
  $conn->close();
  ?>
</body>
</html>
