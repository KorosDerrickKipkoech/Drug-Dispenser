<?php
// Include the necessary files and establish the database connection
include "db_conn.php";

// Define variables to store form input values
$ID = $names = $pharmacy = "";

// Define variables to store error messages
$errors = array('ID' => '', 'names' => '', 'pharmacy' => '');

// Define variable to store success message
$success = '';

// Process form submission when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate ID
    if (empty($_POST['ID'])) {
        $errors['ID'] = "ID is required";
    } else {
        $ID = $_POST['ID'];
    }

    // Validate names
    if (empty($_POST['names'])) {
        $errors['names'] = "Names are required";
    } else {
        $names = $_POST['names'];
    }

    // Validate pharmacy
    if (empty($_POST['pharmacy'])) {
        $errors['pharmacy'] = "Pharmacy is required";
    } else {
        $pharmacy = $_POST['pharmacy'];
    }

    // Check if there are no errors, then insert the data into the database
    if (!array_filter($errors)) {
        // Prepare the SQL statement
        $sql = "INSERT INTO pharmacist (ID, names, pharmacy) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // Bind the parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "sss", $ID, $names, $pharmacy);
        mysqli_stmt_execute($stmt);

        // Check if the data was successfully inserted
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $success = "Pharmacist added successfully";
        } else {
            $errors['general'] = "Failed to add pharmacist";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Pharmacist</title>
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
        <h1>Add Pharmacist</h1>

        <?php if ($success): ?>
            <p class="success"><?php echo $success; ?></p>
        <?php else: ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <div class="form-group">
                    <label for="ID">ID:</label>
                    <input type="text" name="ID" id="ID" value="<?php echo htmlspecialchars($ID); ?>">
                    <p class="error"><?php echo $errors['ID']; ?></p>
                </div>
                <div class="form-group">
                    <label for="names">Names:</label>
                    <input type="text" name="names" id="names" value="<?php echo htmlspecialchars($names); ?>">
                    <p class="error"><?php echo $errors['names']; ?></p>
                </div>
                <div class="form-group">
                    <label for="pharmacy">Pharmacy:</label>
                    <input type="text" name="pharmacy" id="pharmacy" value="<?php echo htmlspecialchars($pharmacy); ?>">
                    <p class="error"><?php echo $errors['pharmacy']; ?></p>
                </div>
                <div class="form-group">
                    <button type="submit">Add Pharmacist</button>
                </div>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
