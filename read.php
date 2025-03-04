<?php
// Include the database configuration file
require_once "config.php";

// Check if $link is set
if (!isset($link)) {
    die("Database connection error.");
}

// Check if ID is set in the URL
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Prepare a SELECT query
    $sql = "SELECT * FROM info WHERE id = ?";
    
    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameter
        $param_id = trim($_GET["id"]);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);

            // Check if the record exists
            if (mysqli_num_rows($result) == 1) {
                // Fetch the record
                $row = mysqli_fetch_assoc($result);
            } else {
                // Redirect if no valid ID is found
                header("location: error.php");
                exit();
            }
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Redirect if ID is missing
    header("location: error.php");
    exit();
}

// Close the connection
mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { font: 14px sans-serif; margin: 20px; }
        .wrapper { width: 600px; margin: auto; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>View Record</h2>
        <a href="display.php" class="btn btn-primary">Back to List</a>
        <table class="table table-bordered mt-3">
            <tr>
                <th>ID</th>
                <td><?php echo htmlspecialchars($row["id"]); ?></td>
            </tr>
            <tr>
                <th>Vehicle Reg</th>
                <td><?php echo htmlspecialchars($row["vehicle_reg"]); ?></td>
            </tr>
            <tr>
                <th>Driver Name</th>
                <td><?php echo htmlspecialchars($row["driver_name"]); ?></td>
            </tr>
            <tr>
                <th>Check In</th>
                <td><?php echo htmlspecialchars($row["check_inn"]); ?></td>
            </tr>
            <tr>
                <th>Check Out</th>
                <td><?php echo htmlspecialchars($row["check_out"]); ?></td>
            </tr>
            <tr>
                <th>Rate</th>
                <td><?php echo htmlspecialchars($row["rate"]); ?></td>
            </tr>
            <tr>
                <th>ITEM</th>
                <td><?php echo htmlspecialchars($row["ITEM"]); ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
