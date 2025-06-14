<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Experience | ERMS</title>
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
            <a class="nav-link active" href="myexp.php"><i class="fas fa-briefcase"></i> My Experience</a>
            <a class="nav-link" href="myeducation.php"><i class="fas fa-graduation-cap"></i> My Education</a>
            <a class="nav-link text-danger" href="../index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">My Experience</h1>
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
                    <h5 class="mb-0">Work Experience</h5>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#experienceModal">
                        <i class="fas fa-plus"></i> Add Experience
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Position</th>
                                <th>Company</th>
                                <th>Location</th>
                                <th>Duration</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Experience records will be loaded dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Experience Modal -->
    <div class="modal fade" id="experienceModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="../handlers/experience.php" method="POST" class="needs-validation" novalidate>
                        <input type="hidden" name="action" value="add">
                        <input type="hidden" name="employee_id" id="employee_id">
                        
                        <div class="mb-3">
                            <label for="company" class="form-label">Company Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="company" name="company" required>
                            <div class="invalid-feedback">Please enter company name.</div>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Position <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="position" name="position" required>
                            <div class="invalid-feedback">Please enter position.</div>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="location" name="location" required>
                            <div class="invalid-feedback">Please enter location.</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="startDate" class="form-label">Start Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="startDate" name="startDate" required>
                                <div class="invalid-feedback">Please select start date.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="endDate" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="endDate" name="endDate">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="currentJob" name="currentJob">
                                <label class="form-check-label" for="currentJob">I currently work here</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Experience</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Experience Modal -->
    <div class="modal fade" id="editExperienceModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Experience</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="../handlers/experience.php" method="POST" class="needs-validation" novalidate>
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="employee_id" id="edit_employee_id">
                        <input type="hidden" name="experience_id" id="edit_experience_id">
                        
                        <div class="mb-3">
                            <label for="edit_company" class="form-label">Company Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_company" name="company" required>
                            <div class="invalid-feedback">Please enter company name.</div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_position" class="form-label">Position <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_position" name="position" required>
                            <div class="invalid-feedback">Please enter position.</div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_location" class="form-label">Location <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit_location" name="location" required>
                            <div class="invalid-feedback">Please enter location.</div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_startDate" class="form-label">Start Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control" id="edit_startDate" name="startDate" required>
                                <div class="invalid-feedback">Please select start date.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_endDate" class="form-label">End Date</label>
                                <input type="date" class="form-control" id="edit_endDate" name="endDate">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="edit_currentJob" name="currentJob">
                                <label class="form-check-label" for="edit_currentJob">I currently work here</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_description" class="form-label">Description</label>
                            <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update Experience</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Experience Form -->
    <form id="deleteExperienceForm" action="../handlers/experience.php" method="POST" style="display: none;">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="employee_id" id="delete_employee_id">
        <input type="hidden" name="experience_id" id="delete_experience_id">
    </form>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 