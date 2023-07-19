<?php
session_start();
include "db_conn.php";
// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define variables
$ssn = "SSN";
$firstname = "firstname";
$lastname = "lastname";
$email = "email";
$age = "AGE";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ssn = $_POST["ssn"];

    // Retrieve patient data from the database
    $sql = "SELECT * FROM patients WHERE SSN = '$ssn'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $email = $row["email"];
        $age = $row["AGE"];
    } else {
        echo "No patient found with the provided SSN.";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Details</title>
    <style>
        body {
            background: #1690A7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
            font-family: sans-serif;
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
        }
        
        input {
            display: block;
            border: 2px solid #ccc;
            width: 95%;
            padding: 10px;
            margin: 10px auto;
            border-radius: 5px;
        }
        
        label {
            color: #888;
            font-size: 18px;
            padding: 10px;
        }
        
        button {
            float: right;
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            margin-right: 10px;
            border: none;
        }
        
        button:hover {
            opacity: .7;
        }
    </style>
</head>
<body>
    <h1 style="color: #fff;">Patient Details</h1>
    <div>
        <div>
            <h2>Patient Details</h2>
            <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <label for="ssn">Enter Patient SSN:</label>
                <input type="text" name="ssn" id="ssn" value="<?php echo $ssn; ?>">
                <button type="submit">Submit</button>
            </form>
        </div>

        <?php if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($age)) : ?>
            <div>
                <h2>Patient Details</h2>
                <div>
                    <div><strong>SSN:</strong> <?php echo $ssn; ?></div>
                    <div><strong>First Name:</strong> <?php echo $firstname; ?></div>
                    <div><strong>Last Name:</strong> <?php echo $lastname; ?></div>
                    <div><strong>Email:</strong> <?php echo $email; ?></div>
                    <div><strong>Age:</strong> <?php echo $age; ?></div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
