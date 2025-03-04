<?php
require_once "config.php"; // Include database connection

// Initialize variables
$id = $vehicle_reg = $driver_name = $check_inn = $check_out = $rate = $ITEM = $tot_amount = "";
$error = "";

// Check if 'id' is set in the URL
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch existing record
    $sql = "SELECT * FROM info WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $vehicle_reg = $row["vehicle_reg"];
                $driver_name = $row["driver_name"];
                $check_inn = $row["check_inn"];
                $check_out = $row["check_out"];
                $rate = $row["rate"];
                $ITEM = $row["ITEM"];
                $tot_amount = $row["tot_amount"];
            } else {
                echo "Record not found!";
                exit();
            }
        } else {
            echo "Error fetching record.";
            exit();
        }
        mysqli_stmt_close($stmt);
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"]; // Ensure ID is included in the update request
    $vehicle_reg = $_POST["vehicle_reg"];
    $driver_name = $_POST["driver_name"];
    $check_inn = $_POST["check_inn"];
    $check_out = $_POST["check_out"];
    $rate = $_POST["rate"];
    $ITEM = $_POST["ITEM"];
    $tot_amount = $_POST["tot_amount"];

    // Update query using prepared statement
    $sql = "UPDATE info SET vehicle_reg=?, driver_name=?, check_inn=?, check_out=?, rate=?, ITEM=?, tot_amount=? WHERE id=?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "sssssssi", $vehicle_reg, $driver_name, $check_inn, $check_out, $rate, $ITEM, $tot_amount, $id);

        if (mysqli_stmt_execute($stmt)) {
            header("location: display.php"); // Redirect after successful update
            exit();
        } else {
            echo "Error updating record.";
        }
        mysqli_stmt_close($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Update Record</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            
            <div class="form-group">
                <label>Vehicle Reg</label>
                <input type="text" name="vehicle_reg" class="form-control" value="<?php echo htmlspecialchars($vehicle_reg); ?>">
            </div>

            <div class="form-group">
                <label>Driver Name</label>
                <input type="text" name="driver_name" class="form-control" value="<?php echo htmlspecialchars($driver_name); ?>">
            </div>

            <div class="form-group">
                <label>Check In</label>
                <input type="date" name="check_inn" class="form-control" value="<?php echo htmlspecialchars($check_inn); ?>">
            </div>

            <div class="form-group">
                <label>Check Out</label>
                <input type="date" name="check_out" class="form-control" value="<?php echo htmlspecialchars($check_out); ?>">
            </div>

            <div class="form-group">
                <label>Rate</label>
                <input type="text" name="rate" class="form-control" value="<?php echo htmlspecialchars($rate); ?>">
            </div>

            <div class="form-group">
                <label>Item</label>
                <input type="text" name="ITEM" class="form-control" value="<?php echo htmlspecialchars($ITEM); ?>">
            </div>

            <div class="form-group">
                <label>Total Amount</label>
                <input type="text" name="tot_amount" class="form-control" value="<?php echo htmlspecialchars($tot_amount); ?>">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="display.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
