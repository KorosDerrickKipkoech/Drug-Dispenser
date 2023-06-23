<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "drug_dispenser";

$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $SSN = $_POST["SSN"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $AGE = $_POST["AGE"];

    $sql = "SELECT * FROM patients WHERE SSN = '$SSN' AND firstname = '$firstname' AND lastname = '$lastname' AND email = '$email' AND AGE = $AGE";
    
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {

        header("Location: patient_interface.php");
        exit;
    } else {
        header("Location: register_interface.php");
        exit;
    }
}
mysqli_close($conn);
?>
