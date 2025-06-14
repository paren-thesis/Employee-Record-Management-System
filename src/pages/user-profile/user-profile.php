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
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <button class="btn btn-link text-dark" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Profile updated</a></li>
                        <li><a class="dropdown-item" href="#">New message</a></li>
                    </ul>
                </div>
                <img src="https://storage.googleapis.com/a1aa/image/5506f626-499c-4f19-3e4a-bab3079baff7.jpg" 
                     alt="Profile" class="profile-img ms-3">
            </div>
        </div>

        <div class="section-card">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img class="profile-img-large" alt="Profile" src="https://storage.googleapis.com/a1aa/image/27d823d6-9079-4627-0980-200ec68e51fc.jpg">
                </div>
                <div class="col">
                    <h2 class="h4 mb-1">Sophia Clark</h2>
                    <p class="text-muted mb-0">Product Manager</p>
                </div>
                <div class="col-auto">
                    <button class="btn btn-outline-primary" type="button">Edit Profile</button>
                </div>
            </div>
        </div>

        <div class="section-card">
            <h2 class="h4 mb-3">Personal Information</h2>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Full Name</label>
                    <p class="mb-0">Sophia Clark</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Employee ID</label>
                    <p class="mb-0">EMP001</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <p class="mb-0">sophia.clark@company.com</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Phone</label>
                    <p class="mb-0">+1 234 567 8900</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Department</label>
                    <p class="mb-0">Product Management</p>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Position</label>
                    <p class="mb-0">Senior Product Manager</p>
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
            <div class="position-relative mb-4">
                <h3 class="h5 mb-2">Senior Product Manager</h3>
                <p class="text-muted mb-2">2018 - Present</p>
                <p>Led the product strategy and roadmap for a flagship product, resulting in a 30% increase in user engagement.</p>
            </div>
        </div>

        <div class="section-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h4 mb-0">Education</h2>
                <a href="myeducation.php" class="btn btn-outline-primary">View All</a>
            </div>
            <div class="position-relative mb-4">
                <h3 class="h5 mb-2">Bachelor of Science in Business Administration</h3>
                <p class="text-muted mb-2">2012 - 2016</p>
                <p>Graduated with honors, specializing in Business Administration with a minor in Computer Science.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>