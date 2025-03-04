<?php
require_once "config.php";

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
    <title>Admin Dashboard</title>
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

        /* Footer */
        .footer { text-align: center; padding: 10px; background: #343a40; color: white; position: absolute; bottom: 0; width: 100%; }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <div class="sidebar">
        <h3><i class="fas fa-user-shield"></i> Admin Panel</h3>
        <a href="admin.php"><i class="fas fa-home"></i> Dashboard</a>
        <a href="welcome.php"><i class="fas fa-user"></i> User Dashboard</a>
        <a href="display.php"><i class="fas fa-list"></i> Manage Records</a>
        <a href="#"><i class="fas fa-envelope"></i> Messages</a>
        <a href="reset-password.php"><i class="fas fa-lock"></i> Reset Password</a>
        <a href="logout.php" class="text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="header">
            Welcome, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> to the Admin Dashboard
        </div>

        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-3 text-center">
                        <h4><i class="fas fa-users text-primary"></i> Users</h4>
                        <p>Manage user accounts and access levels.</p>
                        <a href="welcome.php" class="btn btn-outline-primary btn-sm">Go to Users</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 text-center">
                        <h4><i class="fas fa-car text-success"></i> Vehicle Records</h4>
                        <p>View, edit, and manage vehicle records.</p>
                        <a href="display.php" class="btn btn-outline-success btn-sm">Manage Records</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card p-3 text-center">
                        <h4><i class="fas fa-cogs text-warning"></i> System Settings</h4>
                        <p>Update system settings and security.</p>
                        <a href="reset-password.php" class="btn btn-outline-warning btn-sm">Reset Password</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    &copy; <?php echo date("Y"); ?> Admin Panel - All Rights Reserved
</div>

</body>
</html>
