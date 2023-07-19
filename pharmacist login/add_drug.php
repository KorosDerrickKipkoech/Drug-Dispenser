<?php
include "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $drugID = $_POST['drugID'];
    $tradeName = $_POST['tradename'];
    $formula = $_POST['formula'];

    $insertQuery = "INSERT INTO drugs (drugID, tradename, formula) VALUES ('$drugID', '$tradeName', '$formula')";
    mysqli_query($conn, $insertQuery);
    header("Location: view_drugs.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Drug</title>
    <style>
        body {
            background: #1690A7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        * {
            font-family: sans-serif;
            box-sizing: border-box;
        }

        .container {
            width: 500px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 2px solid #ccc;
        }

        button {
            background: #555;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <h1>Add Drug</h1>

    <div class="container">
        <form method="POST">
            <input type="text" name="drugID" placeholder="drugID" required>
            <input type="text" name="tradename" placeholder="Trade Name" required>
            <input type="text" name="formula" placeholder="Formula" required>
            <button type="submit">Add Drug</button>
        </form>
    </div>
</body>
</html>
