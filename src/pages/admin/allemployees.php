<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Employees | ERMS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
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
        .table th {
            font-weight: 600;
            background-color: #f8f9fa;
        }
        .action-links a {
            text-decoration: none;
            margin-right: 10px;
        }
        .action-links a:last-child {
            margin-right: 0;
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
            <a class="nav-link active" href="allemployees.php"><i class="fas fa-users"></i> Employees</a>
            <a class="nav-link" href="addemployee.php"><i class="fas fa-user-plus"></i> Add Employee</a>
            <a class="nav-link" href="editemployee.php"><i class="fas fa-user-edit"></i> Edit Employee</a>
            <a class="nav-link" href="search.php"><i class="fas fa-search"></i> Search</a>
            <a class="nav-link text-danger" href="../index.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Employees Details</h1>
            <div class="d-flex align-items-center">
                <div class="search-box me-3">
                    <i class="fas fa-search"></i>
                    <input type="text" class="form-control search-input" placeholder="Search...">
                </div>
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
                <div class="table-responsive">
                    <table class="table table-hover" id="employeesTable">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Emp Code</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Contact No</th>
                                <th>Joining Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>EMP001</td>
                                <td>John</td>
                                <td>Doe</td>
                                <td>john.doe@company.com</td>
                                <td>+1 234 567 8900</td>
                                <td>2023-01-15</td>
                                <td class="action-links">
                                    <a href="editempprofile.php?id=1">Edit Profile</a>
                                    <a href="editempeducation.php?id=1">Edit Education</a>
                                    <a href="editempexp.php?id=1">Edit Experience</a>
                                    <a href="#" onclick="return confirm('Do you really want to delete?')">Delete</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>EMP002</td>
                                <td>Jane</td>
                                <td>Smith</td>
                                <td>jane.smith@company.com</td>
                                <td>+1 234 567 8901</td>
                                <td>2023-02-01</td>
                                <td class="action-links">
                                    <a href="editempprofile.php?id=2">Edit Profile</a>
                                    <a href="editempeducation.php?id=2">Edit Education</a>
                                    <a href="editempexp.php?id=2">Edit Experience</a>
                                    <a href="#" onclick="return confirm('Do you really want to delete?')">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#employeesTable').DataTable({
                "pageLength": 10,
                "ordering": true,
                "responsive": true
            });
        });
    </script>
</body>
</html> 