<!DOCTYPE html>
<html>
<head>
  <title>Drug Dispensing Tool</title>
  <style>
    body {
      background: #1690A7;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      flex-direction: column;
    }

    * {
      font-family: sans-serif;
      box-sizing: border-box;
    }

    form {
      width: 500px;
      border: 2px solid #ccc;
      padding: 30px;
      background: #fff;
      border-radius: 15px;
    }

    h2 {
      text-align: center;
      margin-bottom: 40px;
    }

    input {
      display: block;
      border: 2px solid #ccc;
      width: 95%;
      padding: 10px;
      margin: 10px auto;
      border-radius: 5px;
    }

    label {
      color: #888;
      font-size: 18px;
      padding: 10px;
    }

    button {
      float: right;
      background: #555;
      padding: 10px 15px;
      color: #fff;
      border-radius: 5px;
      margin-right: 10px;
      border: none;
    }

    button:hover {
      opacity: .7;
    }

    .error {
      background: #F2DEDE;
      color: #A94442;
      padding: 10px;
      width: 95%;
      border-radius: 5px;
      margin: 20px auto;
    }

    h1 {
      text-align: center;
      color: #fff;
    }

    a {
      float: right;
      background: #555;
      padding: 10px 15px;
      color: #fff;
      border-radius: 5px;
      margin-right: 10px;
      border: none;
      text-decoration: none;
    }

    a:hover {
      opacity: .7;
    }
  </style>
</head>
<body>
  <h1>Drug Dispensing Tool</h1>

  <form>
    <h2>Select User Type</h2>
    <div class="button-container">
      <input type="button" value="Doctor" onclick="location.href='http://localhost/Doctor%20Login/Login-System-PHP-and-MYSQL/'">
      <input type="button" value="Patient" onclick="location.href='http://localhost/patient%20login/index.php'">
      <input type="button" value="Pharmacist" onclick="location.href='http://localhost/pharmacist%20login/'">
      <input type="button" value="Supervisor" onclick="location.href='http://localhost/supervisor%20login/'">
      <input type="button" value="Administrator" onclick="location.href='http://localhost/admin%20login/'">
      <input type="button" value="Register" onclick="location.href='http://localhost/registration/register.php'">
    </div>
  </form>

  <button class="exit-button" onclick="closeWindow()">Exit</button>

  <script>
  function closeWindow() {
    window.close();
  }
  </script>
  
</body>
</html>
