<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search | ERMS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        .card {
            border: none;
            box-shadow: 0 2px 4px rgba(0,0,0,.05);
        }
        .search-box {
            position: relative;
        }
        .search-box i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        .search-input {
            padding-left: 2.5rem;
        }
        .filter-section {
            background-color: #f8f9fa;
            border-radius: 0.5rem;
            padding: 1rem;
        }
        .result-card {
            transition: transform 0.2s;
        }
        .result-card:hover {
            transform: translateY(-2px);
        }
        .result-card .card-title {
            color: #0d6efd;
        }
        .result-card .badge {
            font-size: 0.8rem;
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
            <a class="nav-link" href="admin-panel.php"><i class="fas fa-home"></i> Dashboard</a>
            <a class="nav-link" href="allemployees.php"><i class="fas fa-users"></i> Employees</a>
            <a class="nav-link" href="addemployee.php"><i class="fas fa-user-plus"></i> Add Employee</a>
            <a class="nav-link" href="editemployee.php"><i class="fas fa-user-edit"></i> Edit Employee</a>
            <a class="nav-link active" href="search.php"><i class="fas fa-search"></i> Search</a>
            <a class="nav-link text-danger" href="../index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Search Employees</h1>
            <div class="d-flex align-items-center">
                <div class="dropdown">
                    <button class="btn btn-link text-dark" type="button" data-bs-toggle="dropdown">
                        <i class="fas fa-bell"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">New employee registered</a></li>
                        <li><a class="dropdown-item" href="#">Leave request pending</a></li>
                    </ul>
                </div>
                <img src="https://storage.googleapis.com/a1aa/image/5506f626-499c-4f19-3e4a-bab3079baff7.jpg" 
                     alt="Profile" class="rounded-circle ms-3" style="width: 40px; height: 40px; object-fit: cover;">
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <div class="search-box mb-4">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control search-input" placeholder="Search by name, employee code, department...">
                </div>

                <div class="filter-section mb-4">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Department</label>
                            <select class="form-select">
                                <option value="">All Departments</option>
                                <option value="IT">Information Technology</option>
                                <option value="HR">Human Resources</option>
                                <option value="Finance">Finance</option>
                                <option value="Marketing">Marketing</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Position</label>
                            <select class="form-select">
                                <option value="">All Positions</option>
                                <option value="developer">Developer</option>
                                <option value="manager">Manager</option>
                                <option value="analyst">Analyst</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Joining Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Status</label>
                            <select class="form-select">
                                <option value="">All Status</option>
                                <option value="active">Active</option>
                                <option value="on_leave">On Leave</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    <!-- Search Result Card 1 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card result-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="https://storage.googleapis.com/a1aa/image/5506f626-499c-4f19-3e4a-bab3079baff7.jpg" 
                                         alt="Profile" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                    <div>
                                        <h5 class="card-title mb-0">John Doe</h5>
                                        <span class="text-muted">EMP001</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <span class="badge bg-primary me-2">IT</span>
                                    <span class="badge bg-secondary">Senior Developer</span>
                                </div>
                                <p class="card-text">
                                    <i class="fas fa-envelope me-2"></i>john.doe@company.com<br>
                                    <i class="fas fa-phone me-2"></i>+1 234 567 8900<br>
                                    <i class="fas fa-calendar me-2"></i>Joined: Jan 15, 2023
                                </p>
                                <div class="d-flex gap-2">
                                    <a href="editemployee.php?id=1" class="btn btn-outline-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Search Result Card 2 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card result-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="https://storage.googleapis.com/a1aa/image/5506f626-499c-4f19-3e4a-bab3079baff7.jpg" 
                                         alt="Profile" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                    <div>
                                        <h5 class="card-title mb-0">Jane Smith</h5>
                                        <span class="text-muted">EMP002</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <span class="badge bg-success me-2">HR</span>
                                    <span class="badge bg-secondary">HR Manager</span>
                                </div>
                                <p class="card-text">
                                    <i class="fas fa-envelope me-2"></i>jane.smith@company.com<br>
                                    <i class="fas fa-phone me-2"></i>+1 234 567 8901<br>
                                    <i class="fas fa-calendar me-2"></i>Joined: Feb 01, 2023
                                </p>
                                <div class="d-flex gap-2">
                                    <a href="editemployee.php?id=2" class="btn btn-outline-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Search Result Card 3 -->
                    <div class="col-md-6 col-lg-4">
                        <div class="card result-card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="https://storage.googleapis.com/a1aa/image/5506f626-499c-4f19-3e4a-bab3079baff7.jpg" 
                                         alt="Profile" class="rounded-circle me-3" style="width: 50px; height: 50px; object-fit: cover;">
                                    <div>
                                        <h5 class="card-title mb-0">Mike Johnson</h5>
                                        <span class="text-muted">EMP003</span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <span class="badge bg-info me-2">Finance</span>
                                    <span class="badge bg-secondary">Financial Analyst</span>
                                </div>
                                <p class="card-text">
                                    <i class="fas fa-envelope me-2"></i>mike.johnson@company.com<br>
                                    <i class="fas fa-phone me-2"></i>+1 234 567 8902<br>
                                    <i class="fas fa-calendar me-2"></i>Joined: Mar 10, 2023
                                </p>
                                <div class="d-flex gap-2">
                                    <a href="editemployee.php?id=3" class="btn btn-outline-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav class="mt-4">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add search functionality
        document.querySelector('.search-input').addEventListener('input', function(e) {
            // Add your search logic here
            console.log('Searching for:', e.target.value);
        });

        // Add filter functionality
        document.querySelectorAll('.filter-section select, .filter-section input').forEach(element => {
            element.addEventListener('change', function() {
                // Add your filter logic here
                console.log('Filter changed:', this.value);
            });
        });
    </script>
</body>
</html> 