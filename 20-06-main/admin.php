<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $course_type = $_POST['course_type'];

    $stmt = $conn->prepare("INSERT INTO admins (username, password, course_type) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $username, $password, $course_type);
    $stmt->execute();
    echo "Admin created successfully";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .form-container {
            max-width: 400px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        select {
            margin-bottom: 15px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h1>Creating Admin</h1>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <label for="course">Course</label>
            <select id="course" name="course_type" required>
                <option value="">Select Section</option>
                <option value="UG Courses">UG Section</option>
                <option value="PG Courses">PG Section</option>
                <option value="Post Graduate Diploma">PG Diploma Section</option>
                <option value="Diploma Courses">Diploma Section</option>

                <option value="Certificate Courses">Certified Section</option>

            </select><br>
        <input type="submit" value="Create Admin">
    </form>
</body>
</html>
