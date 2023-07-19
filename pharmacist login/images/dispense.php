<?php
session_start();
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $dispenseID = $_POST['dispenseID'];
    $appointmentID = $_POST['appointmentID'];
    $patientSSN = $_POST['patientSSN'];
    $drugID = $_POST['drugID'];
    $tradeName = $_POST['tradeName'];
    $formula = $_POST['formula'];
    $price = $_POST['price'];
    $paymentStatus = $_POST['paymentStatus'];

    // Insert the dispensed drug information into the table
    $sql = "INSERT INTO dispensed_drugs (dispense_id, AppointmentID, patientSSN, drug_id, trade_name, formula, price, payment_status)
            VALUES ('$dispenseID', '$appointmentID', '$patientSSN', '$drugID', '$tradeName', '$formula', '$price', '$paymentStatus')";
    
    if (mysqli_query($conn, $sql)) {
        // Dispensed drug information successfully inserted
        echo "Drugs dispensed successfully!";
    } else {
        // Error occurred while inserting the dispensed drug information
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
