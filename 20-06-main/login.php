<?php
session_start();
include 'config.php';

$error = ''; // Initialize an error message variable

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $course_type = $_POST['course_type'];

    $stmt = $conn->prepare("SELECT id, password FROM admins WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        $_SESSION['admin_id'] = $id;
        $_SESSION['course_type'] = $course_type;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials"; // Set the error message
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery -->
     <link rel="stylesheet" href="css/toggle.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body {
            background-image: url('nn.png'); /* Replace with your background image URL */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
        }
        header {
            width: 100%;
            background-color: #003366;
            color: white;
            position: relative;
            padding: 10px 0;
        }

        header img {
            width: 100%;
            display: block;
        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <header>
        <img src="CFR.png" class="d-inline-block align-top" alt="" loading="lazy"> <!-- Replace with your logo image URL -->
        <button id="toggleButton">☰</button>
    </header>
    <div id="dashboard" class="dashboard">
    <h2>Dashboard</h2>
    <button class="dashboard-button" id="button0">Home</button></div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card login-card">
                    <div class="card-header">
                        <h3 class="text-center">Admin Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="showPassword" onclick="togglePassword()">
                                <label class="form-check-label" for="showPassword">Show Password</label>
                            </div>
                            <div class="form-group">
                                <label for="course_type">Course Type:</label>
                                <select name="course_type" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="UG Courses">UG Section</option>
                                    <option value="PG Courses">PG Section</option>
                                    <option value="Post Graduate Diploma">PG Diploma Section</option>
                                    <option value="Diploma Courses">Diploma Section</option>
                                    <option value="Certified Courses">Certified Section</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <?php if ($error): ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
        
        document.getElementById('button0').addEventListener('click', function() {
    window.location.href = 'home.php'; 
  });
    </script>
</body>
<script src="script/toggle.js"></script>
</html>