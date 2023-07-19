<?php
// Include the necessary files and establish the database connection
include "db_conn.php";

// Define variables to store form input values
$SSN = $Names = $Speciality = $YearsOfExperience = "";

// Define variables to store error messages
$errors = array('SSN' => '', 'Names' => '', 'Speciality' => '', 'YearsOfExperience' => '');

// Define variable to store success message
$success = '';

// Process form submission when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate SSN
    if (empty($_POST['SSN'])) {
        $errors['SSN'] = "SSN is required";
    } else {
        $SSN = $_POST['SSN'];
    }

    // Validate Names
    if (empty($_POST['Names'])) {
        $errors['Names'] = "Names are required";
    } else {
        $Names = $_POST['Names'];
    }

    // Validate Speciality
    if (empty($_POST['Speciality'])) {
        $errors['Speciality'] = "Speciality is required";
    } else {
        $Speciality = $_POST['Speciality'];
    }

    // Validate YearsOfExperience
    if (empty($_POST['YearsOfExperience'])) {
        $errors['YearsOfExperience'] = "Years of Experience is required";
    } else {
        $YearsOfExperience = $_POST['YearsOfExperience'];
    }

    // Check if there are no errors, then insert the data into the database
    if (!array_filter($errors)) {
        // Prepare the SQL statement
        $sql = "INSERT INTO doctor (SSN, Names, Speciality, YearsOfExperience) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind the parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "ssss", $SSN, $Names, $Speciality, $YearsOfExperience);
        mysqli_stmt_execute($stmt);

        // Check if the data was successfully inserted
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $success = "Doctor added successfully";
        } else {
            $errors['general'] = "Failed to add doctor";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Doctor</title>
    <style>
        body {
            background: #1690A7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 400px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
            margin-top: 0;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            color: #333;
            font-weight: bold;
        }

        .form-group input {
            padding: 5px;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Doctor</h1>

        <?php if ($success): ?>
            <p class="success"><?php echo $success; ?></p>
        <?php else: ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="SSN">SSN:</label>
                    <input type="text" name="SSN" id="SSN" value="<?php echo htmlspecialchars($SSN); ?>">
                    <p class="error"><?php echo $errors['SSN']; ?></p>
                </div>
                <div class="form-group">
                    <label for="Names">Names:</label>
                    <input type="text" name="Names" id="Names" value="<?php echo htmlspecialchars($Names); ?>">
                    <p class="error"><?php echo $errors['Names']; ?></p>
                </div>
                <div class="form-group">
                    <label for="Speciality">Speciality:</label>
                    <input type="text" name="Speciality" id="Speciality" value="<?php echo htmlspecialchars($Speciality); ?>">
                    <p class="error"><?php echo $errors['Speciality']; ?></p>
                </div>
                <div class="form-group">
                    <label for="YearsOfExperience">Years of Experience:</label>
                    <input type="number" name="YearsOfExperience" id="YearsOfExperience" value="<?php echo htmlspecialchars($YearsOfExperience); ?>">
                    <p class="error"><?php echo $errors['YearsOfExperience']; ?></p>
                </div>
                <div class="form-group">
                    <button type="submit">Add Doctor</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
