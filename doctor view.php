<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connect.php');

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'doctor') {
    header('Location: login.php');
    exit();
}

$doctor_username = $_SESSION['username'];

$sql = "SELECT id FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $doctor_username);
$stmt->execute();
$stmt->bind_result($doctor_id);
$stmt->fetch();
$stmt->close();

// Check if the doctor ID was found
if (!$doctor_id) {
    echo "Doctor not found.";
    exit();
}

// Fetch appointments for the logged-in doctor using the doctor's ID
$sql = "SELECT patient_name, place, problem, appointment_date, status
        FROM appointments
        WHERE doctor_id = ?
        ORDER BY appointment_date DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $doctor_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Doctor Dashboard</title>
  <style>
    body {
      background: url("images/doc.jpeg") no-repeat center center;
      background-color: #f8f9fa;
      background-size: cover;
      font-family: Arial, sans-serif;
      height: 100vh;
    }
    .navbar-brand, .nav-link {
      font-weight: bold;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 30px;
      border-radius: 10px;
      background-color: rgba(255, 255, 255, 0.5);
      box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #007bff;
    }
    table {
      width: 100%;
      margin-bottom: 20px;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #007bff;
      color: #ffffff;
    }
    tr:nth-child(even) {
      background-color: rgba(242, 242, 242, 0.7); /* Semi-transparent gray */
    }
    tr:nth-child(odd) {
      background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white */
    }
  </style>
</head>
<body>
   <nav class="navbar navbar-expand-lg navbar-light  w-100">
    <a class="navbar-brand" href="#">Hospital</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="aug_home.php">Home</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container mt-5">
    <h2>Your Appointments</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Patient Name</th>
          <th>Place</th>
          <th>Problem</th>
          <th>Appointment Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['patient_name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['place']) . "</td>";
                echo "<td>" . htmlspecialchars($row['problem']) . "</td>";
                echo "<td>" . htmlspecialchars($row['appointment_date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['status']) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No appointments found</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>
