<?php
// Include database connection file
require_once "config.php";

// Check if 'id' is set in the URL
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    // Prepare a DELETE statement
    $sql = "DELETE FROM info WHERE id = ?";

    if ($stmt = mysqli_prepare($link, $sql)) {
        // Bind variables to the prepared statement
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set the parameter
        $param_id = $_GET["id"];

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Redirect back to display.php after successful deletion
            header("location: display.php");
            exit();
        } else {
            echo "Error: Could not execute the delete query.";
        }
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Close the database connection
mysqli_close($link);

// If no valid 'id' is found in the URL, redirect to display.php
header("location: display.php");
exit();
?>
