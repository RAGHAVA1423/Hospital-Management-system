<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <title>Online Hospital Management System</title>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Hospital</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
	<li class="nav-item">
          <a class="nav-link" href="doctors.php">Doctors</a>
        </li>
      </ul>
    </div>
  </nav>
  
  <!-- Main content -->
  <header class="hero-image">
    <div class="hero-text">
      <h1 class="display-4">Welcome to Our Hospital</h1>
      <p class="lead">We provide the best healthcare services.</p>
      <a class="btn btn-primary btn-lg" href="appointments.php" role="button">Book Appointment</a>
    </div>
  </header>

  <div class="container mt-5">
    <!-- Features Section -->
    <div id="services" class="text-center">
      <h2>Our Services</h2>
      <div class="row mt-4">
        <div class="col-md-4">
          <img src="images/medical_services.webp" class="img-fluid rounded-circle" alt="Medical Services">
          <h3>Medical Services</h3>
          <p>Comprehensive health care services for all ages.</p>
        </div>
        <div class="col-md-4">
          <img src="images/expert_doctors.jpg" class="img-fluid rounded-circle" alt="Expert Doctors">
          <h3>Expert Doctors</h3>
          <p>Highly qualified and experienced doctors.</p>
        </div>
        <div class="col-md-4">
          <img src="images/24_7_support.jpg" class="img-fluid rounded-circle" alt="24/7 Support">
          <h3>24/7 Support</h3>
          <p>Emergency services available 24/7.</p>
        </div>
      </div>
    </div>

    <!-- Contact Form -->
    <div id="contact" class="mt-5">
      <h2>Contact Us</h2>
      <form>
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" required>
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" id="message" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="script.js"></script>
</body>
</html>
