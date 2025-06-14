<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Education | ERMS</title>
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
        .section-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .timeline {
            position: relative;
            padding-left: 2rem;
        }
        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: #e9ecef;
        }
        .timeline-item {
            position: relative;
            padding-bottom: 2rem;
        }
        .timeline-item::before {
            content: '';
            position: absolute;
            left: -2.5rem;
            top: 0.25rem;
            width: 1rem;
            height: 1rem;
            border-radius: 50%;
            background: #0d6efd;
            border: 2px solid white;
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
            <a class="nav-link" href="user-profile.php"><i class="fas fa-user"></i> My Profile</a>
            <a class="nav-link" href="myexp.php"><i class="fas fa-briefcase"></i> My Experience</a>
            <a class="nav-link active" href="myeducation.php"><i class="fas fa-graduation-cap"></i> My Education</a>
            <a class="nav-link text-danger" href="../index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">My Education</h1>
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

        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="mb-0">Education History</h5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#educationModal">
                        <i class="fas fa-plus"></i> Add Education
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Degree</th>
                                <th>Field of Study</th>
                                <th>Institution</th>
                                <th>Duration</th>
                                <th>Grade</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Education records will be loaded dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Education Modal -->
    <div class="modal fade" id="educationModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Education</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="../handlers/education.php" method="POST" class="needs-validation" novalidate>
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="employee_id" id="employee_id">
                        
                        <div class="mb-3">
                            <label for="degree" class="form-label">Degree <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="degree" name="degree" required>
                            <div class="invalid-feedback">Please enter degree.</div>
                        </div>
                        <div class="mb-3">
                            <label for="field" class="form-label">Field of Study <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="field" name="field" required>
                            <div class="invalid-feedback">Please enter field of study.</div>
                        </div>
                        <div class="mb-3">
                            <label for="institution" class="form-label">Institution <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="institution" name="institution" required>
                            <div class="invalid-feedback">Please enter institution.</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="startDate" class="form-label">Start Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="startDate" name="startDate" required>
                                <div class="invalid-feedback">Please select start date.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="endDate" class="form-label">End Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="endDate" name="endDate" required>
                                <div class="invalid-feedback">Please select end date.</div>
                            </div>
                        </div>
                        <div class="mb-3">
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">Start Date</label>
                                <input type="date" class="form-control" required>
                            </div>
                            <div class="col">
                                <label class="form-label">End Date</label>
                                <input type="date" class="form-control">
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" id="currentlyStudying">
                                    <label class="form-check-label" for="currentlyStudying">
                                        Currently studying here
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="4" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save Education</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 