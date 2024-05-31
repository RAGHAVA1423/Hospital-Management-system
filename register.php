<?php
// Connect to the database
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Register</title>
  <style>
    body {
      background-size: cover;
      font-family: 'Arial', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .card {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      border-color:black;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      padding: 20px;
      width: 100%;
      max-width: 400px;
    }

    .card-title {
      text-align: center;
      font-weight: bold;
      font-size: 24px;
      margin-bottom: 20px;
      color: #4a90e2;
    }

    .btn-primary {
      background-color: #fd7e14;
      border: none;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #ff9f43;
    }

    .form-control {
      border-radius: 20px;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
      border-color: #4a90e2;
      box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
    }

    .form-group {
      margin-bottom: 15px;
    }

    .custom-select {
      border-radius: 20px;
    }

    .custom-select:focus {
      border-color: #4a90e2;
      box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
    }
	.login-bg {
      background: url('https://source.unsplash.com/1600x900/?hospital') no-repeat center center;
      background-size: cover;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      opacity: 0.7;
    }

  </style>
</head>
<body>
   
  <div class="login-bg"></div>
  <div class="card">
    <div class="card-body">
      <h2 class="card-title">Register</h2>
      <form action="register.php" method="POST" class="needs-validation" novalidate>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" required>
          <div class="invalid-feedback">Please enter your username.</div>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
          <div class="invalid-feedback">Please enter your password.</div>
        </div>
        <div class="form-group">
          <label for="role">Role</label>
          <select class="custom-select" id="role" name="role" required>
            <option value="">Select Role</option>
            <option value="patient">Patient</option>
            <option value="doctor">Doctor</option>
	    <option value="doctor">Staff</option>
          </select>
          <div class="invalid-feedback">Please select your role.</div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Register</button>
      </form>
	<p class="mt-3 text-center">Already have an account? <a href="login.php">Login here</a></p>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
</body>
</html>
