<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Recovery | ERMS</title>
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
        .recovery-main {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 56px);
            padding: 2rem 0;
        }
        .recovery-form {
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
    <main class="recovery-main">
        <form class="recovery-form">
            <h2 class="text-center mb-3">Password Recovery</h2>
            <p class="text-muted text-center mb-4">Enter your email or employee ID to receive a password reset link or OTP.</p>
            
            <div class="mb-4">
                <input type="text" class="form-control" name="identifier" placeholder="Email or Employee ID" required>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="login.php" class="btn btn-outline-secondary">Back to Login</a>
            </div>
        </form>
    </main>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 