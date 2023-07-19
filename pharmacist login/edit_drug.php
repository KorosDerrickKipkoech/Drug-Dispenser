<?php
include "db_conn.php";

if (isset($_GET['id'])) {
    $drugID = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $newTradeName = $_POST['tradename'];
        $newFormula = $_POST['formula'];

        $updateQuery = "UPDATE drugs SET tradename='$newTradeName', formula='$newFormula' WHERE drugID='$drugID'";
        mysqli_query($conn, $updateQuery);

        header("Location: view_drugs.php");
        exit();
    }

    $selectQuery = "SELECT * FROM drugs WHERE drugID='$drugID'";
    $result = mysqli_query($conn, $selectQuery);

    if ($result && mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $currentTradeName = $row['tradename'];
        $currentFormula = $row['formula'];
    } else {
        echo "Drug not found.";
        exit();
    }
} else {
    header("Location: view_drugs.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Drug</title>
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
    <h1>Edit Drug</h1>

    <div class="container">
        <form method="POST">
            <input type="text" name="tradename" value="<?php echo $currentTradeName; ?>" required>
            <input type="text" name="formula" value="<?php echo $currentFormula; ?>" required>
            <button type="submit">Update Drug</button>
        </form>
    </div>
</body>
</html>
