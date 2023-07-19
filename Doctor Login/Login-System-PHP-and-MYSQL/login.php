<?php
session_start();
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=Username is required");
        exit();
    } elseif (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM doctor WHERE Names='$uname' AND SSN='$pass'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['Names'] === $uname && $row['SSN'] === $pass) {
                $_SESSION['uname'] = $row['Names']; // Store username in the session
                header("Location: ndex.php");
                exit();
            } else {
                header("Location: index.php?error=Incorrect username or password");
                exit();
            }
        } else {
            header("Location: index.php?error=Incorrect username or password");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
