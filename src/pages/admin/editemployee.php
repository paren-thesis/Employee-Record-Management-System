<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee | ERMS</title>
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
        .nav-tabs .nav-link {
            color: #495057;
            border: none;
            padding: 0.8rem 1.5rem;
        }
        .nav-tabs .nav-link.active {
            color: #0d6efd;
            background: none;
            border-bottom: 2px solid #0d6efd;
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
            <a class="nav-link active" href="editemployee.php"><i class="fas fa-user-edit"></i> Edit Employee</a>
            <a class="nav-link" href="search.php"><i class="fas fa-search"></i> Search</a>
            <a class="nav-link text-danger" href="../index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Edit Employee</h1>
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
                <form action="../handlers/update_employee.php" method="POST" class="needs-validation" novalidate>
                    <input type="hidden" name="employee_id" id="employee_id">
                    
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
                            <select class="form-select" id="position" name="position" required>
                                <option value="">Select Position</option>
                                <option value="1">Manager</option>
                                <option value="2">Developer</option>
                                <option value="3">Designer</option>
                                <option value="4">Analyst</option>
                            </select>
                            <div class="invalid-feedback">Please select position.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="joiningDate" class="form-label">Joining Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="joiningDate" name="joiningDate" required>
                            <div class="invalid-feedback">Please select joining date.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="salary" class="form-label">Salary <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="salary" name="salary" required>
                            <div class="invalid-feedback">Please enter salary.</div>
                        </div>
                    </div>

                    <!-- Address Information -->
                    <h5 class="mb-3 mt-4">Address Information</h5>
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="address" name="address" required>
                            <div class="invalid-feedback">Please enter address.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="city" name="city" required>
                            <div class="invalid-feedback">Please enter city.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="state" class="form-label">State <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="state" name="state" required>
                            <div class="invalid-feedback">Please enter state.</div>
                        </div>
                        <div class="col-md-4">
                            <label for="zipCode" class="form-label">ZIP Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="zipCode" name="zipCode" required>
                            <div class="invalid-feedback">Please enter ZIP code.</div>
                        </div>
                    </div>

                    <!-- Emergency Contact -->
                    <h5 class="mb-3 mt-4">Emergency Contact</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="emergencyName" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="emergencyName" name="emergencyName" required>
                            <div class="invalid-feedback">Please enter emergency contact name.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="emergencyRelation" class="form-label">Relationship <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="emergencyRelation" name="emergencyRelation" required>
                            <div class="invalid-feedback">Please enter relationship.</div>
                        </div>
                        <div class="col-md-6">
                            <label for="emergencyPhone" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="emergencyPhone" name="emergencyPhone" required>
                            <div class="invalid-feedback">Please enter emergency contact phone.</div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                        <button type="button" class="btn btn-secondary" onclick="window.location.href='allemployees.php'">Cancel</button>
                    </div>
                </form>
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
                        <input type="hidden" name="employee_id" id="education_employee_id">
                        
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
                            <label for="grade" class="form-label">Grade</label>
                            <input type="text" class="form-control" id="grade" name="grade">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="text-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Add Education</button>
                        </div>
                    </form>
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
                        <input type="hidden" name="employee_id" id="experience_employee_id">
                        
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

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Handle current job checkbox
        document.getElementById('currentJob').addEventListener('change', function() {
            document.getElementById('endDate').disabled = this.checked;
            if (this.checked) {
                document.getElementById('endDate').value = '';
            }
        });

        // Handle form submissions
        document.getElementById('editProfileForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Profile updated successfully!');
        });

        document.getElementById('addEducationForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Education added successfully!');
            bootstrap.Modal.getInstance(document.getElementById('addEducationModal')).hide();
        });

        document.getElementById('addExperienceForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Experience added successfully!');
            bootstrap.Modal.getInstance(document.getElementById('addExperienceModal')).hide();
        });
    </script>
</body>
</html> 