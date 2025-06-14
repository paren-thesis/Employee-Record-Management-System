<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['fullname'])) {
    header("Location: ../login.php");
    exit();
}

// Get user details from session
$fullname = $_SESSION['fullname'] ?? '';
$email = $_SESSION['email'] ?? '';
$employeeid = $_SESSION['employeeid'] ?? '';
$username = $_SESSION['username'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile | ERMS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .sidebar {
            background: white;
            box-shadow: 2px 0 4px rgba(0,0,0,.05);
            height: 100vh;
            position: fixed;
            width: 250px;
        }
        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }
        .nav-link {
            color: #495057;
            padding: 0.8rem 1rem;
            border-radius: 0.25rem;
            margin: 0.2rem 0;
        }
        .nav-link:hover, .nav-link.active {
            background-color: #e9ecef;
            color: #0d6efd;
        }
        .nav-link i {
            width: 20px;
        }
        .profile-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        .profile-img-large {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,.1);
        }
        .section-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar p-3">
        <div class="d-flex align-items-center mb-4">
            <i class="fas fa-gear me-2"></i>
            <span class="h5 mb-0">ERMS</span>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link active" href="user-profile.php"><i class="fas fa-user"></i> My Profile</a>
            <a class="nav-link" href="myexp.php"><i class="fas fa-briefcase"></i> My Experience</a>
            <a class="nav-link" href="myeducation.php"><i class="fas fa-graduation-cap"></i> My Education</a>
            <a class="nav-link text-danger" href="../index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">My Profile</h1>
        </div>

        <div class="section-card">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img class="profile-img-large" alt="Profile" src="https://storage.googleapis.com/a1aa/image/27d823d6-9079-4627-0980-200ec68e51fc.jpg">
                </div>
                <div class="col">
                    <h2 class="h4 mb-1"><?php echo htmlspecialchars($fullname); ?></h2>
                    <p class="text-muted mb-0">Employee ID: <?php echo htmlspecialchars($employeeid); ?></p>
                </div>
            </div>
        </div>

        <div class="section-card">
            <h2 class="h4 mb-3">Personal Information</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Full Name</label>
                    <p class="mb-0"><?php echo htmlspecialchars($fullname); ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Employee ID</label>
                    <p class="mb-0"><?php echo htmlspecialchars($employeeid); ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <p class="mb-0"><?php echo htmlspecialchars($email); ?></p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Username</label>
                    <p class="mb-0"><?php echo htmlspecialchars($username); ?></p>
                </div>
            </div>
        </div>

        <div class="section-card">
            <h2 class="h4 mb-3">Bio</h2>
            <textarea class="form-control" rows="4" placeholder="Write something about yourself..."></textarea>
        </div>

        <div class="section-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 mb-0">Work Experience</h2>
                <a href="myexp.php" class="btn btn-outline-primary">View All</a>
            </div>
        </div>

        <div class="section-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 mb-0">Education</h2>
                <a href="myeducation.php" class="btn btn-outline-primary">View All</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>