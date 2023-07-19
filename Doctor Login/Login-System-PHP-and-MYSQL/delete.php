<?php
session_start();
include "db_conn.php";

// Get id parameter value from URL
$AppointmentID = $_GET['id'];
$illness = $_GET['illness'];

// Delete row from the database table
$result = mysqli_query($conn, "DELETE FROM appointments WHERE AppointmentID = $AppointmentID AND illness = $illness");

if ($result) {
    // Data deleted successfully
    $_SESSION['success'] = "Data deleted successfully.";
    header("Location: ndex.php");
    exit();
} else {
    // Error in deleting data
    $_SESSION['error'] = "Error deleting data.";
    header("Location: ndex.php");
    exit();
}
?>
