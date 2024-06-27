<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit();
}

$course_type = $_SESSION['course_type'];
echo htmlspecialchars($course_type);
$stmt = $conn->prepare("SELECT * FROM grievances WHERE main_course = ?");
if ($stmt) {
    $stmt->bind_param('s', $course_type);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    $stmt->close();
} else {
    // Error handling
    die("Error preparing statement: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell
            $('#grievancesTable thead tr').clone(true).appendTo('#grievancesTable thead');
            $('#grievancesTable thead tr:eq(1) th').each(function(i) {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');

                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });

            var table = $('#grievancesTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                orderCellsTop: true,
                fixedHeader: true
            });
        });
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table.dataTable thead th {
            position: relative;
        }
        table.dataTable thead th input {
            width: 100%;
            box-sizing: border-box;
        }
        .disabled-link {
            color: gray; /* Change this to the desired color for disabled links */
            pointer-events: none;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <h1>Welcome, Admin</h1>
    <table id="grievancesTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Register Number</th>
                <th>Course Name</th>
                <th>Date of Birth</th>
                <th>Program Type</th>
                <th>Course Type</th>
                <th>Mobile no</th>
                <th>Email</th>
                <th>Address</th>
                <th>ID Card</th>
                <th>Grievance Type</th>
                <th>Batch</th>
                <th>Status</th>
                <th>Grievance</th>
                <th>Fees Payment Details</th>
                <th>Hall Ticket</th>
                <th>Exam Application Form</th>
                <th>Available Mark Statement</th>
                <th>Consolidated Mark Statement</th>
                <th>Course Completion Certificate</th>
                <th>Application Fees</th>
                <th>Genuine Certificate Fees</th>
                <th>PSTM</th>
                <th>Submission Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['register_number']; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                    <td><?php echo $row['date_of_birth']; ?></td>
                    <td><?php echo $row['program_type']; ?></td>
                    <td><?php echo $row['main_course']; ?></td>
                    <td><?php echo $row['mobile']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><a class='document-link' href='uploads/<?php echo $row['idcard']; ?>' target='_blank'>View Document</a></td>
                    <td><?php echo $row['grievance_type']; ?></td>
                    <td><?php echo $row['batch']; ?></td>
                    <td><button type='button' class='btn btn-primary view-details'><?php echo $row['status']; ?></button></td>

                    <td><?php echo $row['grievances_details']; ?></td>
                    <td><a class='document-link' href='<?php echo $row['Fees_Payment_Details']; ?>' target='_blank'>View Document</a></td>
                    <td><a class='document-link' href='<?php echo $row['Hall_Ticket']; ?>' target='_blank'>View Document</a></td>
                    <td><a class='document-link' href='<?php echo $row['Exam_Application_Form']; ?>' target='_blank'>View Document</a></td>
                    <td><a class='document-link' href='<?php echo $row['Available_Mark_Statement']; ?>' target='_blank'>View Document</a></td>
                    <td><a class='document-link' href='<?php echo $row['Consolidated_Mark_Statement']; ?>' target='_blank'>View Document</a></td>
                    <td><a class='document-link' href='<?php echo $row['Course_Completion_Certificate']; ?>' target='_blank'>View Document</a></td>
                    <td><a class='document-link' href='<?php echo $row['Application_Fees']; ?>' target='_blank'>View Document</a></td>
                    <td><a class='document-link' href='<?php echo $row['Genuine_Certificate_Fees']; ?>' target='_blank'>View Document</a></td>
                    <td><a class='document-link' href='<?php echo $row['PSTM']; ?>' target='_blank'>View Document</a></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        document.querySelectorAll('.document-link').forEach(link => {
            if (!link.getAttribute('href') || link.getAttribute('href') === 'uploads/') {
                link.classList.add('disabled-link');
                link.setAttribute('href', '#');
            }
        });

        document.querySelectorAll('.view-details').forEach(button => {
            button.addEventListener('click', function() {
                // Get the table row associated with the button
                const row = this.closest('tr');

                // Extract the register number and timestamp from the row
                const registerNumber = row.querySelector('td:nth-child(3)').innerText; // Adjust selector if needed
                const timestamp = row.querySelector('td:nth-child(25)').innerText; // Assuming data-timestamp attribute exists

                // Construct the URL with both parameters
                const url = `view_details1.php?register_number=${encodeURIComponent(registerNumber)}&timestamp=${encodeURIComponent(timestamp)}`;

                // Redirect the user to the constructed URL
                window.location.href = url;
            });
        });
    </script>
</body>
</html>
