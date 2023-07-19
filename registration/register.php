<?php
// Redirect to the respective add data form based on the button clicked
if (isset($_POST['add_admin'])) {
    header("Location: add_administrator.php");
    exit();
} elseif (isset($_POST['add_patient'])) {
    header("Location: add_patient.php");
    exit();
} elseif (isset($_POST['add_doctor'])) {
    header("Location: add_doctor.php");
    exit();
} elseif (isset($_POST['add_pharmacist'])) {
    header("Location: add_pharmacist.php");
    exit();
} elseif (isset($_POST['add_supervisor'])) {
    header("Location: add_supervisor.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Management</title>
    <style>
        body {
            background: #1690A7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 400px;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #fff;
            margin: 0 0 20px;
            padding-top: 10px;
            font-size: 24px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .button {
            margin: 10px;
        }

        .button button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .button button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Data Management</h1>

        <div class="button-container">
            <form method="post">
                <div class="button">
                    <button type="submit" name="add_admin">Add Administrator</button>
                </div>
                <div class="button">
                    <button type="submit" name="add_patient">Add Patient</button>
                </div>
                <div class="button">
                    <button type="submit" name="add_doctor">Add Doctor</button>
                </div>
                <div class="button">
                    <button type="submit" name="add_pharmacist">Add Pharmacist</button>
                </div>
                <div class="button">
                    <button type="submit" name="add_supervisor">Add Supervisor</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
