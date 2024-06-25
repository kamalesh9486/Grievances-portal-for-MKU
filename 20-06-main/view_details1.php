<?php
session_start();

// Check if admin is logged in (optional, based on your implementation)


// Get register number and timestamp from URL parameters
$register_Number = isset($_GET['register_number']) ? $_GET['register_number'] : null;
$timestamp = isset($_GET['timestamp']) ? $_GET['timestamp'] : null;

// Validate and sanitize data if needed (optional)
// ...

// Connect to your database (replace with your connection details)

// Check if grievance data is found
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grievance Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 5px 10px;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Application Status</h1>
    <?php
    // PHP code

    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "vinzo1";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM grievances WHERE register_number = ? AND created_at = ?");
    $stmt->bind_param('ss', $register_Number, $timestamp); // Use 'ss' for two strings
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        // echo "<th>Name</th>";
        echo "<th>Register Number</th>";
        // echo "<th>Course Name</th>";
        // echo "<th>Mobile</th>";
        // echo "<th>Email</th>";
        // echo "<th>Address</th>";
        echo "<th>Application Submitted On</th>";
        echo "<th>Grievance Type</th>";
        echo "<th>Status</th>";
        echo "</tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['register_number']) . "</td>";
            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
            echo "<td>" . htmlspecialchars($row['grievance_type']) . "</td>";
            echo "<td>" . htmlspecialchars($row['status']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No records found for the given register number.</p>";
    }

    $stmt->close();
    $conn->close();
    ?>
    <form action="change_status.php" method="post">
        <input type="hidden" name="register_number" value="<?php echo $register_Number; ?>">
        <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" name="status" id="status">
                <option value="">Select Status</option>
                <option value="In Process">In Process</option>
                <option value="Resolved">Resolved</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>
        <div class="form-group">
            <label for="comments">Message to Students About thier Grievances Status:</label>
            <textarea class="form-control" name="comments" id="comments" rows="3" placeholder="Enter here ...."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <a href="dashboard.php" class="back-link">Back to Dashboard Check</a>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
