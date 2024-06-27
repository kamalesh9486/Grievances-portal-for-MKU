<?php
// Include the database configuration file
include 'config.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form input values
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $course_type = $_POST['course_type'];

    // Prepare and execute the SQL query to insert the admin details into the database
    $stmt = $conn->prepare("INSERT INTO admins (username, password, course_type) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $username, $password, $course_type);
    $stmt->execute();
    echo "Admin created successfully";
}
?>

<!-- HTML document start -->
<!DOCTYPE html>
<html>
<head>
    <title>Create Admin</title>
    <style>
        /* CSS styles for the page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }

        /* Container for the form */
        .form-container {
            max-width: 400px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            margin: 0 auto;
        }

        /* Heading style */
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Label style */
        label {
            font-weight: bold;
        }

        /* Input field styles */
        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Select field style */
        select {
            margin-bottom: 15px;
        }

        /* Submit button styles */
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        /* Submit button hover style */
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Creating Admin</h1>
    <!-- Form to create an admin -->
    <form method="POST" action="">
        <!-- Username input field -->
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>

        <!-- Password input field -->
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>

        <!-- Course selection dropdown -->
        <label for="course">Course</label>
        <select id="course" name="course_type" required>
            <option value="">Select Section</option>
            <option value="UG Courses">UG Section</option>
            <option value="PG Courses">PG Section</option>
            <option value="Post Graduate Diploma">PG Diploma Section</option>
            <option value="Diploma Courses">Diploma Section</option>
            <option value="Certificate Courses">Certified Section</option>
        </select><br>

        <!-- Submit button -->
        <input type="submit" value="Create Admin">
    </form>
</body>
</html>

