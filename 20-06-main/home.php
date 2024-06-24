<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/toggle.css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
     /* CSS for sliding in from the left for heading */
     @keyframes slideInLeft {
      0% {
        transform: translateX(-100%);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }
    .slide-in-left {
      display: inline-block; /* Ensures the heading can be animated */
      animation: slideInLeft 2s ease-out; /* Duration and easing of the animation */
    }
    .card {
      height: 100%;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }
    .card-body {
      height: 100%;
      opacity: 0.8;
      transition: opacity 0.3s ease;
    }
    .card:hover .card-body {
      opacity: 1;
    }
    #dashboard {
      display: none;
    }
    #dashboard.open {
      display: block;
    }
  </style>
</head>
<body>
  <header>
    <img src="CFR.png" width="100%" alt="no image">
    <div class="container">
      <button id="toggleButton">☰</button>
      <nav>
        <ul>
          <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#academics">Academics</a></li>
          <li><a href="#admissions">Admissions</a></li>
          <li><a href="#research">Research</a></li>
          <li><a href="#student-life">Students</a></li>
          <li><a href="#news">News</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#virtual-tour">VirtualTour</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>
  
  <div id="dashboard" class="dashboard">
    <h2>Dashboard</h2>
    <button class="dashboard-button" id="button1">Student Grievance</button>
    <button class="dashboard-button" id="button2">Grievance Status</button>
    <button class="dashboard-button" id="button3">Admin Login</button>
    <button class="dashboard-button">Exams</button>
    <button class="dashboard-button">Administration</button>
    <button class="dashboard-button">Library</button>
  </div>
  <section id="home" class="d-flex justify-content-center align-items-center" style="height: 100vh;">
  <div class="hero">
    <h1 class="slide-in-left display-20">Welcome to Our University</h1>
  </div>
</section>

  <div class="container mt-5">
    <div class="d-flex justify-content-between mb-4">
        <!-- Dropdown buttons can be added here if needed -->
    </div>
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="about.jpeg" class="card-img-top" alt="Image 1">
                <div class="card-body">
                    <h5 class="card-title">About Us</h5>
                    <p class="card-text">Learn more about our history, mission, and values</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="acadamy.jpg" class="card-img-top" alt="Image 2">
                <div class="card-body">
                    <h5 class="card-title">Academics</h5>
                    <p class="card-text">Discover our wide range of academic programs and resources</p>
                    <a href="#" class="btn btn-primary">Explore programs</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="admission.jpeg" class="card-img-top" alt="Image 3">
                <div class="card-body">
                    <h5 class="card-title">Admissions</h5>
                    <p class="card-text">Find out how to apply, tuition fees, and financial aid options</p>
                    <a href="#" class="btn btn-primary">Learn More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="research.jpg" class="card-img-top" alt="Image 4">
                <div class="card-body">
                    <h5 class="card-title">Research</h5>
                    <p class="card-text">Explore our cutting-edge research initiatives and opportunities</p>
                    <a href="#" class="btn btn-primary">Discover Research</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="student.jpg" class="card-img-top" alt="Image 5">
                <div class="card-body">
                    <h5 class="card-title">Student Life</h5>
                    <p class="card-text">Experience vibrant campus life through various activities and organizations</p>
                    <a href="#" class="btn btn-primary">Get Involved</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="news.jpeg" class="card-img-top" alt="Image 6">
                <div class="card-body">
                    <h5 class="card-title">News</h5>
                    <p class="card-text">Summary of the latest news</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="event.jpg" class="card-img-top" alt="Image 7">
                <div class="card-body">
                    <h5 class="card-title">Events</h5>
                    <p class="card-text">Detail about upcoming events</p>
                    <br><br><br>
                    <a href="#" class="btn btn-primary">Find Out More</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="tour.png" class="card-img-top" alt="Image 8">
                <div class="card-body">
                    <h5 class="card-title">Virtual Tour</h5>
                    <p class="card-text">Interactive campus tour, descriptions of key buildings and facilities</p>
                    <a href="#" class="btn btn-primary">View</a>
                </div>
            </div>
        </div>
        
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  document.getElementById('toggleButton').addEventListener('click', function() {
  var dashboard = document.getElementById('dashboard');
  dashboard.classList.toggle('open');
});

document.getElementById('button1').addEventListener('click', function() {
  window.location.href = 'grievances.html'; 
});
document.getElementById('button2').addEventListener('click', function() {
  window.location.href = 'status_check.html'; 
});
document.getElementById('button3').addEventListener('click', function() {
  window.location.href = 'login.php'; 
});


document.addEventListener('click', function(event) {
  var dashboard = document.getElementById('dashboard');
  var toggleButton = document.getElementById('toggleButton');
  if (!dashboard.contains(event.target) && !toggleButton.contains(event.target)) {
    dashboard.classList.remove('open');
  }
});

</script>
</body>

</html>
