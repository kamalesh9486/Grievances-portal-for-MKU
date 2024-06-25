<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grievances</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f9f9f9;
        }
        p {
            font-style: italic;
            color: #888;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Grievances</h2>

    <?php
    // Your PHP code goes here
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
  
      if (isset($_GET['timestamp'])) {
          $timestamp = $_GET['timestamp'];
  
          // Prepare and execute the SQL query
          $stmt = $conn->prepare("SELECT * FROM grievances WHERE created_at = ?");
          $stmt->bind_param("s", $timestamp);
          $stmt->execute();
          $result = $stmt->get_result();
  
       } // Database connection and query execution

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>Message that responding to the grievances request :</th>";
        echo "</tr>";

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['detailed_description']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No records found for the given timestamp.</p>";
    }
    ?>

</div>

</body>
</html>
