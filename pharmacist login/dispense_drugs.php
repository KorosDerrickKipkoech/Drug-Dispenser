<!DOCTYPE html>
<html>
<head>
    <title>Dispense Drugs</title>
    <style>
        body {
            background: #1690A7;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            max-width: 500px;
            margin: 50px auto;
        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-submit {
            text-align: center;
        }

        .form-submit input {
            background: #555;
            padding: 10px 15px;
            color: #fff;
            border-radius: 5px;
            border: none;
            text-decoration: none;
            cursor: pointer;
        }

        .form-submit input:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="section-title">Dispense Drugs</h1>
        <form action="dispense.php" method="POST">
            <div class="form-group">
                <label for="dispenseID">Dispense ID:</label>
                <input type="text" id="dispenseID" name="dispenseID" required>
            </div>
            <div class="form-group">
                <label for="appointmentID">Appointment ID:</label>
                <input type="text" id="appointmentID" name="appointmentID" required>
            </div>
            <div class="form-group">
                <label for="patientSSN">Patient SSN:</label>
                <input type="text" id="patientSSN" name="patientSSN" required>
            </div>
            <div class="form-group">
                <label for="drugID">Drug ID:</label>
                <input type="text" id="drugID" name="drugID" required>
            </div>
            <div class="form-group">
                <label for="tradeName">Trade Name:</label>
                <input type="text" id="tradeName" name="tradeName" required>
            </div>
            <div class="form-group">
                <label for="formula">Formula:</label>
                <textarea id="formula" name="formula" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" required>
            </div>
            <div class="form-group">
                <label for="paymentStatus">Payment Status:</label>
                <select id="paymentStatus" name="paymentStatus" required>
                    <option value="Paid">Paid</option>
                    <option value="Unpaid">Unpaid</option>
                </select>
            </div>
            <div class="form-submit">
                <input type="submit" value="Dispense">
            </div>
        </form>
    </div>
</body>
</html>
