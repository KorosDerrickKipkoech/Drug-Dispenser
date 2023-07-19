<?php
// Include the necessary files and establish the database connection
include "db_conn.php";

// Define variables to store form input values
$SSN = $firstname = $lastname = $email = $AGE = "";

// Define variables to store error messages
$errors = array('SSN' => '', 'firstname' => '', 'lastname' => '', 'email' => '', 'AGE' => '');

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

    // Validate firstname
    if (empty($_POST['firstname'])) {
        $errors['firstname'] = "First name is required";
    } else {
        $firstname = $_POST['firstname'];
    }

    // Validate lastname
    if (empty($_POST['lastname'])) {
        $errors['lastname'] = "Last name is required";
    } else {
        $lastname = $_POST['lastname'];
    }

    // Validate email
    if (empty($_POST['email'])) {
        $errors['email'] = "Email is required";
    } else {
        $email = $_POST['email'];
    }

    // Validate AGE
    if (empty($_POST['AGE'])) {
        $errors['AGE'] = "Age is required";
    } else {
        $AGE = $_POST['AGE'];
    }

    // Check if there are no errors, then insert the data into the database
    if (!array_filter($errors)) {
        // Prepare the SQL statement
        $sql = "INSERT INTO patients (SSN, firstname, lastname, email, AGE) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind the parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "sssss", $SSN, $firstname, $lastname, $email, $AGE);
        mysqli_stmt_execute($stmt);

        // Check if the data was successfully inserted
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $success = "Patient added successfully";
        } else {
            $errors['general'] = "Failed to add patient";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Patient</title>
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
        <h1>Add Patient</h1>

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
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" id="firstname" value="<?php echo htmlspecialchars($firstname); ?>">
                    <p class="error"><?php echo $errors['firstname']; ?></p>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" id="lastname" value="<?php echo htmlspecialchars($lastname); ?>">
                    <p class="error"><?php echo $errors['lastname']; ?></p>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
                    <p class="error"><?php echo $errors['email']; ?></p>
                </div>
                <div class="form-group">
                    <label for="AGE">Age:</label>
                    <input type="number" name="AGE" id="AGE" value="<?php echo htmlspecialchars($AGE); ?>">
                    <p class="error"><?php echo $errors['AGE']; ?></p>
                </div>
                <div class="form-group">
                    <button type="submit">Add Patient</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
