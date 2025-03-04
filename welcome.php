<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f4f6f9; }
        .wrapper { display: flex; height: 100vh; }

        /* Sidebar */
        .sidebar { width: 270px; background: #343a40; color: white; padding: 20px; transition: all 0.3s; }
        .sidebar h3 { text-align: center; font-weight: bold; }
        .sidebar a { 
            color: white; 
            display: block; 
            padding: 12px 15px; 
            text-decoration: none; 
            border-radius: 5px; 
            transition: 0.3s;
        }
        .sidebar a:hover { background: #007bff; transform: translateX(5px); }
        .sidebar i { margin-right: 10px; }

        /* Content Area */
        .content { flex: 1; padding: 20px; transition: all 0.3s; }
        .header { background: #007bff; color: white; padding: 15px; text-align: center; font-size: 22px; font-weight: bold; border-radius: 5px; }

        /* Dashboard Cards */
        .card { 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
            border: none; 
            transition: transform 0.3s ease-in-out; 
        }
        .card:hover { transform: scale(1.05); }

        /* Form Styling */
        .form-container { background: white; padding: 20px; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); }
        .form-container input { margin-bottom: 10px; }

        /* Footer */
        .footer { text-align: center; padding: 10px; background: #343a40; color: white; position: absolute; bottom: 0; width: 100%; }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <h3><i class="fas fa-user"></i> User Panel</h3>
        <a href="welcome.php"><i class="fas fa-home"></i> Dashboard</a>
        <a href="register.php"><i class="fas fa-user-shield"></i> Admin Panel</a>
        <a href="user_display.php"><i class="fas fa-list"></i> View Records</a>
        <a href="reset-password.php"><i class="fas fa-lock"></i> Reset Password</a>
        <a href="logout.php" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="header">
            Welcome, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> to your Dashboard
        </div>

        

        <!-- Data Entry Form -->
        <div class="container mt-5" id="data-entry-form">
            <div class="form-container">
                <h4 class="text-center"><i class="fas fa-plus-circle text-primary"></i> Add New Vehicle Entry</h4>
                <form action="insert_query.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Vehicle Registration</label>
                            <input type="text" name="vehicle_reg" class="form-control" required>

                            <label>Driver Name</label>
                            <input type="text" name="driver_name" class="form-control" required>

                            <label>Check-in Time</label>
                            <input type="datetime-local" name="check_inn" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label>Check-out Time</label>
                            <input type="datetime-local" name="check_out" class="form-control">

                            <label>Rate</label>
                            <input type="number" name="rate" class="form-control" required>

                            <label>Item</label>
                            <input type="text" name="ITEM" class="form-control" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-3">Submit Entry</button>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Footer -->
<div class="footer">
    &copy; <?php echo date("Y"); ?> Weight Bridge System - All Rights Reserved
</div>

</body>
</html>
