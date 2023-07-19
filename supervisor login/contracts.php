<?php
session_start();
include "db_conn.php";

if (isset($_GET['pass'])) {
    $supervisorID = $_GET['pass'];

    // Retrieve supervisor information from the database
    $sqlSupervisor = "SELECT * FROM supervisors WHERE supervisor_id = '$supervisorID'";
    $resultSupervisor = mysqli_query($conn, $sqlSupervisor);

    if ($resultSupervisor && mysqli_num_rows($resultSupervisor) === 1) {
        $rowSupervisor = mysqli_fetch_assoc($resultSupervisor);
        $supervisorName = $rowSupervisor['names'];
    } else {
        echo "Supervisor not found.";
        exit();
    }

    // Retrieve contracts information for the supervisor
    $sqlContracts = "SELECT * FROM contracts WHERE supervisor_id = '$supervisorID'";
    $resultContracts = mysqli_query($conn, $sqlContracts);

    $contracts = array();
    if ($resultContracts && mysqli_num_rows($resultContracts) > 0) {
        while ($rowContract = mysqli_fetch_assoc($resultContracts)) {
            $contractID = $rowContract['contract_id'];
            $contractText = $rowContract['texts'];
            $pharmaceuticalCompany = $rowContract['pharmaceutical_company'];
            $pharmacy = $rowContract['pharmacy'];
            $startDate = $rowContract['start_date'];
            $endDate = $rowContract['end_date'];

            $contracts[] = [
                'contractID' => $contractID,
                'contractText' => $contractText,
                'pharmaceuticalCompany' => $pharmaceuticalCompany,
                'pharmacy' => $pharmacy,
                'startDate' => $startDate,
                'endDate' => $endDate,
            ];
        }
    }
} else {
    echo "Invalid request.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contracts</title>
    <style>
        body {
            background: #1690A7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        * {
            font-family: sans-serif;
            box-sizing: border-box;
        }

        .container {
            width: 1000px;
            border: 2px solid #ccc;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
            margin-top: 0;
        }

        .supervisor-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .supervisor-info img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .supervisor-details {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .supervisor-details span {
            font-weight: bold;
        }

        .contracts-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .contracts-table th,
        .contracts-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .contracts-table th {
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }

        .no-data {
            text-align: center;
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <h1>Contracts</h1>

    <div class="container">
        <div class="supervisor-info">
            <?php if (file_exists("images/6047098.png")) : ?>
                <img src="images/6047098.png" alt="Supervisor Image">
            <?php else : ?>
                <img src="default_image.png" alt="Default Image">
            <?php endif; ?>
            <div class="supervisor-details">
                <h2 style="text-align: center;">Welcome, <?php echo $supervisorName; ?></h2>
                <p><span>Supervisor ID:</span> <?php echo $supervisorID; ?></p>
                <p><span>Name:</span> <?php echo $supervisorName; ?></p>
            </div>
        </div>

        <?php if (!empty($contracts)) : ?>
            <table class="contracts-table">
                <tr>
                    <th>Contract ID</th>
                    <th>Text</th>
                    <th>Pharmaceutical Company</th>
                    <th>Pharmacy</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
                <?php foreach ($contracts as $contract) : ?>
                    <tr>
                        <td><?php echo $contract['contractID']; ?></td>
                        <td><?php echo $contract['contractText']; ?></td>
                        <td><?php echo $contract['pharmaceuticalCompany']; ?></td>
                        <td><?php echo $contract['pharmacy']; ?></td>
                        <td><?php echo $contract['startDate']; ?></td>
                        <td><?php echo $contract['endDate']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <div class="no-data">No contracts available for the supervisor.</div>
        <?php endif; ?>
    </div>
</body>
</html>
