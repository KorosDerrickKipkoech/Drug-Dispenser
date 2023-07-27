<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Establish a connection to the database (replace placeholders with your database credentials)
    $servername = "localhost";
    $username = "root";
    $password_db = "";
    $dbname = "drug_dispenser";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted

    // Retrieve the user's saved password from the respective table based on their email
    $sql = "SELECT password FROM patient WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Patient table has a matching email
        $row = $result->fetch_assoc();
        $savedpassword = $row["password"];
        $userType = "patient";
    } else {
        // No match in patient table, check other tables
        $sql = "SELECT password FROM doctor WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Doctor table has a matching email
            $row = $result->fetch_assoc();
            $savedpassword = $row["password"];
            $userType = "doctor";
        } else {
            $sql = "SELECT password FROM pharmacist WHERE email = '$email'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Pharmacist table has a matching email
                $row = $result->fetch_assoc();
                $savedpassword = $row["password"];
                $userType = "pharmacist";
            } else {
                $sql = "SELECT password FROM supervisor WHERE email = '$email'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Supervisor table has a matching email
                    $row = $result->fetch_assoc();
                    $savedpassword = $row["password"];
                    $userType = "supervisor";
                } else {
                    $sql = "SELECT password FROM admin WHERE email = '$email'";
                    $result = $conn->query($sql);
    
                    if ($result->num_rows > 0) {
                        // Supervisor table has a matching email
                        $row = $result->fetch_assoc();
                        $savedpassword = $row["password"];
                        $userType = "admin";
                    }
                else {
                    // No user found with the given email, redirect back to the login page with an error message
                    header("Location: login-error.html");
                    exit();
                }
            }
        }
    }

    if ($password == $savedpassword) {
        // Password is correct

        // Store the email in the session for future use
        $_SESSION['email'] = $email;
        if ($userType == "patient") {
            header("Location: patient-page.php");
            exit();
        } elseif ($userType == "doctor") {
            header("Location: doctor-page.php");
            exit();
        } elseif ($userType == "pharmacist") {
            header("Location: pharmacist-page.php");
            exit();
        } elseif ($userType == "supervisor") {
            header("Location: supervisor-page.php");
            exit();
        } elseif ($userType == "admin") {
            header("Location: admin-page.php");
            exit();
        }
    } else {
        // Password is incorrect, redirect back to the login page with an error message
        header("Location: login-error.html");
        exit();
    }
}
} else {
    // Redirect back to the login page
    header("Location: login.html");
    exit();
}
?>