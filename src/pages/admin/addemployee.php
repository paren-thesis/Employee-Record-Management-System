<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee | ERMS</title>
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
        .form-label {
            font-weight: 500;
        }
        .required::after {
            content: " *";
            color: #dc3545;
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
            <a class="nav-link active" href="addemployee.php"><i class="fas fa-user-plus"></i> Add Employee</a>
            <a class="nav-link" href="editemployee.php"><i class="fas fa-user-edit"></i> Edit Employee</a>
            <a class="nav-link" href="search.php"><i class="fas fa-search"></i> Search</a>
            <a class="nav-link text-danger" href="../index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Add New Employee</h1>
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

        <div class="card">
            <div class="card-body">
                <form action="../handlers/add_employee.php" method="POST" class="needs-validation" novalidate>
                    <!-- Personal Information -->
                    <h5 class="mb-3">Personal Information</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="firstName" name="firstName" required>
                            <div class="invalid-feedback">Please enter first name.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="lastName" name="lastName" required>
                            <div class="invalid-feedback">Please enter last name.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                            <div class="invalid-feedback">Please enter phone number.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Date of Birth <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="dob" name="dob" required>
                            <div class="invalid-feedback">Please select date of birth.</div>
                        </div>
                    </div>

                    <!-- Employment Details -->
                    <h5 class="mb-3 mt-4">Employment Details</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="empCode" class="form-label">Employee Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="empCode" name="empCode" required>
                            <div class="invalid-feedback">Please enter employee code.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="department" class="form-label">Department <span class="text-danger">*</span></label>
                            <select class="form-select" id="department" name="department" required>
                                <option value="">Select Department</option>
                                <option value="1">IT</option>
                                <option value="2">HR</option>
                                <option value="3">Finance</option>
                                <option value="4">Marketing</option>
                            </select>
                            <div class="invalid-feedback">Please select department.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="position" class="form-label">Position <span class="text-danger">*</span></label>
                            <h5 class="mb-3">Personal Information</h5>
                            <div class="mb-3">
                                <label for="firstName" class="form-label required">First Name</label>
                                <input type="text" class="form-control" id="firstName" required>
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label required">Last Name</label>
                                <input type="text" class="form-control" id="lastName" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label required">Email</label>
                                <input type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label required">Phone</label>
                                <input type="tel" class="form-control" id="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="dob" class="form-label required">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-3">Employment Details</h5>
                            <div class="mb-3">
                                <label for="empCode" class="form-label required">Employee Code</label>
                                <input type="text" class="form-control" id="empCode" required>
                            </div>
                            <div class="mb-3">
                                <label for="department" class="form-label required">Department</label>
                                <select class="form-select" id="department" required>
                                    <option value="">Select Department</option>
                                    <option value="IT">Information Technology</option>
                                    <option value="HR">Human Resources</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Marketing">Marketing</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="position" class="form-label required">Position</label>
                                <input type="text" class="form-control" id="position" required>
                            </div>
                            <div class="mb-3">
                                <label for="joiningDate" class="form-label required">Joining Date</label>
                                <input type="date" class="form-control" id="joiningDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="salary" class="form-label required">Salary</label>
                                <input type="number" class="form-control" id="salary" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <h5 class="mb-3">Address Information</h5>
                            <div class="mb-3">
                                <label for="address" class="form-label required">Address</label>
                                <textarea class="form-control" id="address" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="city" class="form-label required">City</label>
                                <input type="text" class="form-control" id="city" required>
                            </div>
                            <div class="mb-3">
                                <label for="state" class="form-label required">State</label>
                                <input type="text" class="form-control" id="state" required>
                            </div>
                            <div class="mb-3">
                                <label for="zipCode" class="form-label required">ZIP Code</label>
                                <input type="text" class="form-control" id="zipCode" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="mb-3">Emergency Contact</h5>
                            <div class="mb-3">
                                <label for="emergencyName" class="form-label required">Contact Name</label>
                                <input type="text" class="form-control" id="emergencyName" required>
                            </div>
                            <div class="mb-3">
                                <label for="emergencyPhone" class="form-label required">Contact Phone</label>
                                <input type="tel" class="form-control" id="emergencyPhone" required>
                            </div>
                            <div class="mb-3">
                                <label for="emergencyRelation" class="form-label required">Relationship</label>
                                <input type="text" class="form-control" id="emergencyRelation" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='allemployees.php'">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('addEmployeeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your form submission logic here
            alert('Employee added successfully!');
            window.location.href = 'allemployees.php';
        });
    </script>
</body>
</html> 