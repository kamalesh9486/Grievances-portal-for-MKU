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
    /* Your existing styles here */
    .loading-text {
      display: inline-block;
      font-size: 3em;
      font-weight: bold;
      color: white;
      opacity: 0;
      animation: loadingEffect 3s infinite;
    }
    @keyframes loadingEffect {
      0% { opacity: 0; transform: translateY(20px); }
      50% { opacity: 1; transform: translateY(0); }
      100% { opacity: 0; transform: translateY(-20px); }
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
  
  <div id="dynamicContent" class="hero">
    <h1 id="content1" class="loading-text">Welcome to Our University</h1>
    <h1 id="content2" class="loading-text" style="display: none;">Directorate of Distance Education</h1>
    <h1 id="content3" class="loading-text" style="display: none;">Learning Management System</h1>
  </div>

  <!-- Your existing section and card content -->

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    // JavaScript for toggling content
    var contents = ["content1", "content2", "content3"];
    var currentIndex = 0;
    var contentInterval;

    function toggleContent() {
      var currentContent = contents[currentIndex];
      var previousIndex = currentIndex === 0 ? contents.length - 1 : currentIndex - 1;

      // Hide the previous content
      document.getElementById(contents[previousIndex]).style.display = "none";

      // Show the current content
      document.getElementById(currentContent).style.display = "block";

      // Increment index or reset to 0
      currentIndex = (currentIndex + 1) % contents.length;
    }

    function startLoadingEffect() {
      contentInterval = setInterval(toggleContent, 3000); // Change content every 3 seconds
    }

    // Start the loading effect when the window loads
    window.onload = function() {
      startLoadingEffect();
    };

    // Toggle dashboard visibility
    document.getElementById('toggleButton').addEventListener('click', function() {
      var dashboard = document.getElementById('dashboard');
      dashboard.classList.toggle('open');
    });

    document.addEventListener('click', function(event) {
      var dashboard = document.getElementById('dashboard');
      var toggleButton = document.getElementById('toggleButton');
      if (!dashboard.contains(event.target) && !toggleButton.contains(event.target)) {
        dashboard.classList.remove('open');
      }
    });

    // Event listeners for dashboard buttons
    document.getElementById('button1').addEventListener('click', function() {
      window.location.href = 'grievances.html'; 
    });
    document.getElementById('button2').addEventListener('click', function() {
      window.location.href = 'status_check.html'; 
    });
    document.getElementById('button3').addEventListener('click', function() {
      window.location.href = 'login.php'; 
    });

  </script>
</body>
</html>
