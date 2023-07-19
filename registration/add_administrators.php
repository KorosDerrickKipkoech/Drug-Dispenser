<?php
// Include the necessary files and establish the database connection
include "db_conn.php";

// Initialize variables
$id = "";
$names = "";
$errors = [];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Validate and sanitize the input values
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $names = mysqli_real_escape_string($conn, $_POST["names"]);

    // Validate input fields
    if (empty($id)) {
        $errors["id"] = "ID is required";
    }

    if (empty($names)) {
        $errors["names"] = "Name is required";
    }

    
    // Insert data into the administrator table if there are no validation errors
    if (empty($errors)) {
        $sql = "INSERT INTO administrator (id, names) VALUES ('$id', '$names')";
        mysqli_query($conn, $sql);

        // Redirect to the page displaying the administrators' information
        header("Location: administrator.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Administrator</title>
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

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .error-message {
            color: #ff0000;
            font-size: 12px;
            margin-top: 5px;
        }

        button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Administrator</h1>

        <form method="POST">
            <label for="id">ID:</label>
            <input type="text" name="id" value="<?php echo $id; ?>">
            <?php if (isset($errors["id"])) : ?>
                <span class="error-message"><?php echo $errors["id"]; ?></span>
            <?php endif; ?>

            <label for="names">Name:</label>
            <input type="text" name="names" value="<?php echo $names; ?>">
            <?php if (isset($errors["names"])) : ?>
                <span class="error-message"><?php echo $errors["names"]; ?></span>
            <?php endif; ?>

            <button type="submit">Add</button>
        </form>
    </div>
</body>
</html>
