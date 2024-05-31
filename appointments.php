<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connect.php');

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'patient') {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointment_date = $_POST['appointment_date'];
    $doctor_id = $_POST['doctor_id'];
    $patient_name = $_POST['patient_name'];
    $place = $_POST['place'];
    $problem = $_POST['problem'];

    // Insert the appointment with a status of 'pending payment'
    $sql = "INSERT INTO appointments (appointment_date, status, doctor_id, patient_name, place, problem) VALUES (?, 'pending payment', ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisss", $appointment_date, $doctor_id, $patient_name, $place, $problem);

    if ($stmt->execute() === TRUE) {
        $_SESSION['appointment_details'] = [
            'appointment_date' => $appointment_date,
            'doctor_id' => $doctor_id,
            'status' => 'pending payment',
            'patient_name' => $patient_name,
            'place' => $place,
            'problem' => $problem
        ];
        $stmt->close();
        $conn->close();
        header('Location: payment.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Error: " . $stmt->error;
        $stmt->close();
        $conn->close();
        header('Location: appointments.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Book Appointment</title>
  <style>
    body {
      background: url('images/bg.jpg') no-repeat center center;
      background-color: #f8f9fa;
      background-size: cover; 
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center; /* Center horizontally */
      align-items: center; /* Center vertically */
      height: 100vh;
    }
    .container {
      max-width: 500px;
      margin: 0 auto;
      padding: 30px;
      border-radius: 10px;
      background-color: #ffffff;
      box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #007bff;
    }
    .form-group label {
      font-weight: bold;
      color: #333333;
    }
    .btn-primary {
      width: 100%;
      margin-top: 20px;
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <h2>Book an Appointment</h2>
    
    <!-- Display error message -->
    <?php if (isset($_SESSION['error_message'])): ?>
      <div class="alert alert-danger">
        <?php 
        echo $_SESSION['error_message']; 
        unset($_SESSION['error_message']);
        ?>
      </div>
    <?php endif; ?>

    <form action="appointments.php" method="POST">
      <div class="form-group">
        <label for="doctor_id">Select Doctor</label>
        <select class="form-control" id="doctor_id" name="doctor_id" required>
          <!-- Fetch doctors from the database -->
          <?php
          $sql = "SELECT id, username FROM users WHERE role='doctor'";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<option value='" . $row['id'] . "'>" . $row['username'] . "</option>";
              }
          } else {
              echo "<option>No doctors available</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="appointment_date">Appointment Date</label>
        <input type="datetime-local" class="form-control" id="appointment_date" name="appointment_date" required>
      </div>
      <div class="form-group">
        <label for="patient_name">Patient Name</label>
        <input type="text" class="form-control" id="patient_name" name="patient_name" required>
      </div>
      <div class="form-group">
        <label for="place">Place</label>
        <input type="text" class="form-control" id="place" name="place" required>
      </div>
      <div class="form-group">
          <label for="problem">problem</label>
          <select class="custom-select" id="problem" name="problem" required>
            <option value="">select the problem you are facing</option>
            <option value="fever">Fever</option>
            <option value="ENT">ENT</option>
            <option value="heart pain">Heart Pain</option>
            <option value="joint pains">Joint Pains</option>
            <option value="heavy breathing">Heavy Breathing</option>
            <option value="eye infection">Eye Infection</option>
            <option value="skin allergy">Skin Allergy</option>
            <option value="tooth pain">Tooth Pain</option>
          </select>
          <div class="invalid-feedback">Please select your role.</div>
        </div>

      <button type="submit" class="btn btn-primary">Book Appointment</button>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
</body>
</html>
