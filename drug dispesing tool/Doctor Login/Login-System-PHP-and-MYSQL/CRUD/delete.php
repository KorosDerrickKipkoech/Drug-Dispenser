<?php
session_start(); 
include "db_conn.php";
// Get id parameter value from URL
$AppointmentID = $_GET['AppointmentID'];

// Delete row from the database table
$result = mysqli_query($mysqli, "DELETE FROM users WHERE AppointmentID= $AppointmentID");

// Redirect to the main display page (index.php in our case)
header("Location:ndex.php");
