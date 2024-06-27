<?php
session_start();

// Check if admin is logged in (optional, based on your implementation)

// Include database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vinzo1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Retrieve data from POST request
$registerNumber = isset($_POST['register_number']) ? $_POST['register_number'] : null;
$timestamp = isset($_POST['timestamp']) ? $_POST['timestamp'] : null;
$newStatus = isset($_POST['status']) ? $_POST['status'] : null;
$grievances_message= isset($_POST['comments']) ? $_POST['comments'] : null;
$email= isset($_POST['email']) ? $_POST['email'] : null;

// Validate data (optional)
// You can add validation checks here to ensure data integrity

// Connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Prepare statement to update status
$stmt = $conn->prepare("UPDATE grievances SET status = ?, detailed_description = ? WHERE register_number = ? AND created_at = ?");

$stmt->bind_param('ssss', $newStatus, $grievances_message, $registerNumber, $timestamp);

// Output message styling
$outputMessage = "";

if ($stmt->execute()) {
  $outputMessage = "<div class='alert alert-success' role='alert'>Grievance status updated successfully!</div>";
} else {
  $outputMessage = "<div class='alert alert-danger' role='alert'>Error updating grievance status: " . $conn->error . "</div>";
}

// Add button to go to dashboard.php
$outputMessage .= "<a href='dashboard.php' class='btn btn-primary'>Go to Dashboard</a>";

$stmt->close();
$conn->close();

// Output the message
echo $outputMessage;
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


    $user_email = $email;
    $subject = "Grievances ";
    $message = $grievances_message;

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->SMTPDebug = 0; // Enable verbose debug output
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'vinzocenzo27@gmail.com';
        $mail->Password = 'viep golf ahww ffby';
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption; `ssl` also accepted
        $mail->Port = 587; // TCP port to connect to (587 for TLS)

        // Recipients
        $mail->setFrom('vinzocenzo27@gmail.com', 'Admin');
        $mail->addAddress($user_email); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = strip_tags($message); // For non-HTML mail clients

        $mail->send();
        $outputMessage="<div class='alert alert-success' role='alert'> Email Message has been sent</div>";
       // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

// Output the message
echo $outputMessage;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    
</body>
</html>