<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connect.php');

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'patient') {
    header('Location: login.php');
    exit();
}

// Check if payment details are already in the session
if (!isset($_SESSION['appointment_details'])) {
    header('Location: appointments.php');
    exit();
}

// Check if the payment button is clicked
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pay_now'])) {
    // Process the payment
    $appointment_date = $_SESSION['appointment_details']['appointment_date'];
    $doctor_id = $_SESSION['appointment_details']['doctor_id'];
    $patient_name = $_SESSION['appointment_details']['patient_name'];
    
    // Perform payment processing here
    
    // After successful payment
    $sql = "UPDATE appointments SET status = 'CONFIRMED' WHERE appointment_date = ? AND doctor_id = ? AND patient_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $appointment_date, $doctor_id, $patient_name);

    if ($stmt->execute() === TRUE) {
        unset($_SESSION['appointment_details']);
        $_SESSION['success_message'] = "Payment successful! Your appointment is confirmed.";
    } else {
        $_SESSION['error_message'] = "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();

    // Redirect back to this page to display success/error message
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
	<style>
        * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

html {
  font-size: 62.5%;
}

body {
  background: url('https://images.pexels.com/photos/2876787/pexels-photo-2876787.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
  background-position: center;
  background-size: cover;
  backdrop-filter: blur(8px);
  color: #3c3c39;

  display: flex;
  justify-content: center;
  height: 100vh;
  font-family: 'Monsterrat', sans-serif;
  position: relative;
  padding: 2rem 0;
}

.checkout-container {
  /* background-color: red; */
  max-width: 120rem;
  height: 50rem;
  display: grid;
  grid-template-columns: 1fr 1fr;
  justify-content: center;
  /* margin-bottom: 10rem; */
}

em {
  font-style: normal;
  font-weight: 700;
}

hr {
  color: #fff;
  margin-bottom: 1.2rem;
}

/* Left Side Of Container */
.left-side {

  background-position: center;
  background-size: cover;
  position: relative;
}

.text-box {
  background: rgba(95, 121, 134, 0.8);
  width: 100%;
  padding: 1rem 2rem;
  position: absolute;
  bottom: 0;
}

/* Left container text */

.home-heading {
  color: #e8e8e1;
  font-size: 3.2rem;
  font-weight: 700;
  line-height: 1;
  margin-bottom: 1rem;
}

.home-price {
  color: #aeae97;
  font-size: 2rem;
  margin-bottom: 1.2rem;
}

.home-desc {
  color: #e8e8e1;
  font-size: 1.2rem;
  line-height: 1.5;
  letter-spacing: 0.5px;
}

/* Right Side of container */

.right-side {
  background-color: #fff;
  padding: 1.8rem 3.2rem;
}

.receipt {
  display: flex;
  flex-direction: column;
  gap: 1rem;
  border-bottom: solid 1px;
  margin-bottom: 1rem;
}

.receipt-heading {
  font-size: 1.6rem;
  text-align: left;
}

.table {
  border-collapse: separate;
  border-spacing: 0 1.5rem;
  color: #64645f;
  font-size: 1.2rem;
  margin-bottom: 0.5rem;
  width: 100%;
}

.total td {
  font-size: 1.4rem;
  font-weight: 700;
}

.price {
  text-align: end;
}

/* Payment Section */

.payment-heading {
  font-size: 1.4rem;
  margin-bottom: 1rem;
}

.form-box {
  display: grid;
  grid-template-rows: 1fr;
  gap: 1.5rem;
}

.card-logo {
  font-size: 2rem;
}

.expires,
.form-box label {
  font-size: 1.2rem;
  font-weight: 700;
}

.form-box input {
  font-family: inherit;
  font-size: 1.2rem;
  padding: 0.5rem;
  width: 100%;
}

.form-box select {
  padding: 0.5rem;
}

.form-box #cvv {
  width: 25%;
}

.cvv-info:link,
.cvv-info:visited {
  color: inherit;
  text-decoration: underline;
}

.cvv-info:hover,
.cvv-info:active {
  color: #5f7986;
  text-decoration: none;
}

.btn {
  background-color: #4c616b;
  border: none;
  border-radius: 8px;
  color: #eff2f3;
  font-size: 1.6rem;
  font-weight: 700;
  letter-spacing: 0.5px;
  margin-bottom: 1rem;
  padding: 1.5rem;
  cursor: pointer;
}

.btn:hover {
  background-color: #5f7986;
  transition: ease-out 0.1s;
}

.footer-text {
  font-size: 1rem;
  text-align: center;
}

.form-box *:focus {
  outline: none;
  box-shadow: 0 0 0 0.8rem rgba(139, 139, 107, 0.5);
  border-radius: 8px;
}
    </style>
</head>
<body>
  <div class="container mt-5">
    <!-- Display success or error message -->
    <?php if (isset($_SESSION['success_message'])): ?>
      <div class="alert alert-success">
        <?php 
        echo $_SESSION['success_message']; 
        unset($_SESSION['success_message']);
        ?>
      </div>
    <?php elseif (isset($_SESSION['error_message'])): ?>
      <div class="alert alert-danger">
        <?php 
        echo $_SESSION['error_message']; 
        unset($_SESSION['error_message']);
        ?>
      </div>
    <?php endif; ?>

    <h2>Payment Page</h2>
    <div class="right-side">
        <div class="receipt">
            <h2 class="receipt-heading">Receipt Summary</h2>
            <div>
                <table class="table">
                    <tr>
                        <td>1 x OP</td>
                        <td class="price">499.00 INR</td>
                    </tr>
                    <tr>
                        <td>Discount</td>
                        <td class="price">0.00 INR</td>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td class="price">499.00 INR</td>
                    </tr>
                    <tr>
                        <td>GST</td>
                        <td class="price">47.41 INR</td>
                    </tr>
                    <tr class="total">
                        <td>Total</td>
                        <td class="price">546.41 INR</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="payment-info">
            <h3 class="payment-heading">Payment Information</h3>
            <form class="form-box" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div>
                    <label for="full-name">Full Name</label>
                    <input id="full-name" name="full-name" placeholder="" type="text"/>
                </div>

                <div>
                    <label for="credit-card-num">Card Number</label>
                    <input id="credit-card-num" name="credit-card-num" placeholder="1111-2222-3333-4444" type="text"/>
                </div>

                <div>
                    <p class="expires">Expires on:</p>
                    <div class="card-experation">
                        <label for="expiration-month">Month</label>
                        <select id="expiration-month" name="expiration-month">
                            <option value="">Month:</option>
                            <option value="">January</option>
                  <option value="">February</option>
                  <option value="">March</option>
                  <option value="">April</option>
                  <option value="">May</option>
                  <option value="">June</option>
                  <option value="">July</option>
                  <option value="">August</option>
                  <option value="">September</option>
                  <option value="">October</option>
                  <option value="">November</option>
                  <option value="">Decemeber</option>
                        </select>

                        <label class="expiration-year">Year</label>
                        <select id="experation-year" name="experation-year">
                            <option value="">Year</option>
                            <option value="">2023</option>
                  <option value="">2024</option>
                  <option value="">2025</option>
                  <option value="">2026</option>

                        </select>
                    </div>
                </div>

                <div>
                    <label for="cvv">CVV</label>
                    <input id="cvv" name="cvv" placeholder="415" type="text"/>
                    <a class="cvv-info" href="#">What is CVV?</a>
                </div>

                <button type="submit" class="btn btn-primary" name="pay_now">Pay Now</button>
            </form>
        </div>
    </div>
  </div>
</body>
</html>
