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
</head>
<body>
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
