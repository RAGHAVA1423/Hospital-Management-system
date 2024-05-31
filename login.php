<?php
session_start();
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];

            if ($row['role'] == 'patient') {
                header('Location: aug_home.php');
            } elseif ($row['role'] == 'doctor') {
                header('Location: doctor view.php');
            } else {
                header('Location: login.php'); // Redirect to login for any other roles
            }
            exit();
        } else {
            $error_message = "Invalid password";
        }
    } else {
        $error_message = "No user found";
    }

    $stmt->close();
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
  <title>Login</title>
  <style>
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: 'Arial', sans-serif;
    }

    .card {
      background: rgba(255, 255, 255, 0.3);
      border-radius: 10px;
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
      background-color: #4a90e2;
      border: none;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #357ab8;
    }

    .form-control {
      border-radius: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .alert {
      text-align: center;
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
      <h2 class="card-title">Login</h2>
      <?php if (isset($error_message)): ?>
        <div class="alert alert-danger" role="alert">
          <?php echo htmlspecialchars($error_message); ?>
        </div>
      <?php endif; ?>
      <form action="login.php" method="POST" class="needs-validation" novalidate>
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
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>
      <p class="mt-3 text-center">Don't have an account? <a href="register.php">Register here</a></p>
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
