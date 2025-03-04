<?php include 'config.php'; ?>

<?php
// Attempt MySQL server connection
$link = mysqli_connect("localhost", "root", "", "demo");

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Check if POST variables are set
if (isset($_POST['vehicle_reg'], $_POST['driver_name'], $_POST['check_inn'], $_POST['check_out'], $_POST['rate'], $_POST['ITEM'])) {
    
    // Assign values to variables
    $vehicle_reg = $_POST['vehicle_reg'];
    $driver_name = $_POST['driver_name'];
    $check_inn = $_POST['check_inn'];  
    $check_out = $_POST['check_out'];  
    $rate = (float)$_POST['rate']; 
    $ITEM = $_POST['ITEM'];

    // Calculate the time difference between check_inn and check_out (in days)
    $sql_time_diff = "SELECT TIMESTAMPDIFF(DAY, '$check_inn', '$check_out') AS duration_in_days";
    $result = mysqli_query($link, $sql_time_diff);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $time = $row['duration_in_days'];  // Time in days
    } else {
        echo "ERROR: Could not calculate time difference.";
        exit;
    }

    // Calculate the total amount
    $tot_amount = $time * $rate;
    
    // Prepare an insert statement
    $sql = "INSERT INTO info (vehicle_reg, driver_name, check_inn, check_out, rate, ITEM, tot_amount) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ssssssd", $vehicle_reg, $driver_name, $check_inn, $check_out, $rate, $ITEM, $tot_amount);

        // Attempt to execute the prepared statement
        if (mysqli_stmt_execute($stmt)) {
            // ✅ Redirect to display.php after successful insertion
            header("Location: user_display.php");
            exit; // Ensure script stops here
        } else {
            echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
        }
    } else {
        echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
    }

    // Close statement
    mysqli_stmt_close($stmt);

} else {
    echo "ERROR: All fields are required.";
}

// Close connection
mysqli_close($link);
?>
