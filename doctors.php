<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctors' Details</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-size: cover;
      font-family: 'Arial', sans-serif;
      padding: 20px;
    }
    .navbar-brand, .nav-link {
      font-weight: bold;
    }
    .card {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
      transition: transform 0.2s;
    }
    .card:hover {
      transform: scale(1.05);
    }
    .card-title {
      color: #4a90e2;
    }
    .card-text {
      color: #333;
    }
    .container {
      margin-top: 50px;
    }
    .doctor-img {
      height: 200px;
      object-fit: cover;
      border-radius: 10px 10px 0 0;
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

  <div class="container">
    <h1 class="text-center text-black mb-4">Our Doctors</h1>
    <div class="row">
      <!-- Doctor 1 -->
      <div class="col-md-6 mb-4">
        <div class="card">
          <img src="images/doctor1.jpg" class="card-img-top doctor-img" alt="Dr. John Smith">
          <div class="card-body">
            <h5 class="card-title">Dr. John Smith</h5>
            <p class="card-text">Specialty: Cardiology</p>
            <p class="card-text">Experience: 15 years</p>
            <p class="card-text">Location: New York, NY</p>
          </div>
        </div>
      </div>
      <!-- Doctor 2 -->
      <div class="col-md-6 mb-4">
        <div class="card">
          <img src="images/doctor2.jpg" class="card-img-top doctor-img" alt="Dr. Emily Brown">
          <div class="card-body">
            <h5 class="card-title">Dr. Emily Brown</h5>
            <p class="card-text">Specialty: Neurology</p>
            <p class="card-text">Experience: 10 years</p>
            <p class="card-text">Location: Los Angeles, CA</p>
          </div>
        </div>
      </div>
      <!-- Doctor 3 -->
      <div class="col-md-6 mb-4">
        <div class="card">
          <img src="images/doctor3.jpg" class="card-img-top doctor-img" alt="Dr. Michael Lee">
          <div class="card-body">
            <h5 class="card-title">Dr. Michael Lee</h5>
            <p class="card-text">Specialty: Pediatrics</p>
            <p class="card-text">Experience: 8 years</p>
            <p class="card-text">Location: Chicago, IL</p>
          </div>
        </div>
      </div>
      <!-- Doctor 4 -->
      <div class="col-md-6 mb-4">
        <div class="card">
          <img src="images/doctor4.jpg" class="card-img-top doctor-img" alt="Dr. Sarah Davis">
          <div class="card-body">
            <h5 class="card-title">Dr. Sarah Davis</h5>
            <p class="card-text">Specialty: Dermatology</p>
            <p class="card-text">Experience: 12 years</p>
            <p class="card-text">Location: Houston, TX</p>
          </div>
        </div>
      </div>
      <!-- Doctor 5 -->
      <div class="col-md-6 mb-4">
        <div class="card">
          <img src="images/doctor5.jpg" class="card-img-top doctor-img" alt="Dr. David Wilson">
          <div class="card-body">
            <h5 class="card-title">Dr. David Wilson</h5>
            <p class="card-text">Specialty: Orthopedics</p>
            <p class="card-text">Experience: 20 years</p>
            <p class="card-text">Location: Phoenix, AZ</p>
          </div>
        </div>
      </div>
      <!-- Doctor 6 -->
      <div class="col-md-6 mb-4">
        <div class="card">
          <img src="images/doctor6.jpg" class="card-img-top doctor-img" alt="Dr. Linda Martinez">
          <div class="card-body">
            <h5 class="card-title">Dr. Linda Martinez</h5>
            <p class="card-text">Specialty: Gastroenterology</p>
            <p class="card-text">Experience: 9 years</p>
            <p class="card-text">Location: Philadelphia, PA</p>
          </div>
        </div>
      </div>
      <!-- Doctor 7 -->
      <div class="col-md-6 mb-4">
        <div class="card">
          <img src="images/doctor7.jpg" class="card-img-top doctor-img" alt="Dr. James Garcia">
          <div class="card-body">
            <h5 class="card-title">Dr. James Garcia</h5>
            <p class="card-text">Specialty: Oncology</p>
            <p class="card-text">Experience: 14 years</p>
            <p class="card-text">Location: San Antonio, TX</p>
          </div>
        </div>
      </div>
      <!-- Doctor 8 -->
      <div class="col-md-6 mb-4">
        <div class="card">
          <img src="images/doctor8.jpg" class="card-img-top doctor-img" alt="Dr. Barbara Martinez">
          <div class="card-body">
            <h5 class="card-title">Dr. Barbara Martinez</h5>
            <p class="card-text">Specialty: Rheumatology</p>
            <p class="card-text">Experience: 16 years</p>
            <p class="card-text">Location: San Diego, CA</p>
          </div>
        </div>
      </div>
      <!-- Doctor 9 -->
      <div class="col-md-6 mb-4">
        <div class="card">
          <img src="images/doctor9.jpg" class="card-img-top doctor-img" alt="Dr. Robert Rodriguez">
          <div class="card-body">
            <h5 class="card-title">Dr. Robert Rodriguez</h5>
            <p class="card-text">Specialty: Urology</p>
            <p class="card-text">Experience: 11 years</p>
            <p class="card-text">Location: Dallas, TX</p>
          </div>
        </div>
      </div>
      <!-- Doctor 10 -->
      <div class="col-md-6 mb-4">
        <div class="card">
          <img src="images/doctor10.jpg" class="card-img-top doctor-img" alt="Dr. Maria Hernandez">
          <div class="card-body">
            <h5 class="card-title">Dr. Maria Hernandez</h5>
            <p class="card-text">Specialty: Endocrinology</p>
            <p class="card-text">Experience: 18 years</p>
            <p class="card-text">Location: San Jose, CA</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
