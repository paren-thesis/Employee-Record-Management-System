<?php
// Start session to store user data
session_start();

// Initialize variables
$errors = [];
$success = false;

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $employeeid = trim($_POST['employeeid']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    // Validate Full Name
    if (preg_match('/^\d/', $fullname)) {
        $errors[] = "Full name cannot start with a number";
    }
    if (str_word_count($fullname) < 2) {
        $errors[] = "Full name must contain at least two words";
    }

    // Validate Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate Password
    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters long";
    }
    if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Password must contain at least one uppercase letter";
    }
    if (!preg_match('/[a-z]/', $password)) {
        $errors[] = "Password must contain at least one lowercase letter";
    }
    if (!preg_match('/[0-9]/', $password)) {
        $errors[] = "Password must contain at least one number";
    }

    // Check if passwords match
    if ($password !== $confirmpassword) {
        $errors[] = "Passwords do not match";
    }

    // If no errors, proceed with registration
    if (empty($errors)) {
        // TODO: Add database connection and user registration logic here
        
        // Store user details in session
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;
        $_SESSION['employeeid'] = $employeeid;
        $_SESSION['username'] = $username;
        
        // Redirect to user profile
        header("Location: user-profile/user-profile.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | ERMS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,.08);
        }
        .register-main {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 56px);
            padding: 2rem 0;
        }
        .register-form {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,.1);
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <span class="navbar-brand">
                <i class="fas fa-gear me-2"></i>ERMS
            </span>
        </div>
    </nav>
    <main class="register-main">
        <form class="register-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <h2 class="text-center mb-4">Create your account</h2>
            
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if ($success): ?>
                <div class="alert alert-success">
                    Registration successful! Redirecting...
                </div>
            <?php endif; ?>
            
            <div class="mb-3">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name" value="<?php echo isset($fullname) ? htmlspecialchars($fullname) : ''; ?>" required>
            </div>

            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" required>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" name="employeeid" placeholder="Employee ID" value="<?php echo isset($employeeid) ? htmlspecialchars($employeeid) : ''; ?>" required>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo isset($username) ? htmlspecialchars($username) : ''; ?>" required>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

            <div class="text-center mt-3">
                <a href="login.php" class="text-decoration-none">Already have an account? Sign in</a>
            </div>
        </form>
    </main>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 