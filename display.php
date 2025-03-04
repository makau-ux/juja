<?php
// Include config file
require_once "config.php";

// Fetch records from the database
$sql = "SELECT id, vehicle_reg, driver_name, check_inn, check_out, rate, ITEM,tot_amount FROM info";
$result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Records</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Vehicle Records</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vehicle Reg</th>
                    <th>Driver Name</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Rate</th>
                    <th>ITEM</th>
                    <th>tot_amount</th>
                    <th>Actions</th> <!-- Column for Edit/Delete buttons -->
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['vehicle_reg']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['driver_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['check_inn']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['check_out']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['rate']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['ITEM']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['tot_amount']) . "</td>";
                        echo "<td>";
                        echo '<a href="update.php?id=' . $row['id'] . '" class="btn btn-warning btn-sm">Edit</a> ';
                        echo '<a href="delete.php?id=' . $row['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure you want to delete this record?\');">Delete</a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="insert.php" class="btn btn-success">Add New Record</a>
    </div>
</body>
</html>

<?php
// Close database connection
mysqli_close($link);
?>
