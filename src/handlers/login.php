<?php
require_once '../config/database.php';
require_once '../config/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitize($_POST['username']);
    $password = $_POST['password'];

    try {
        // Prepare SQL statement
        $stmt = $conn->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            // Set session data
            setSession($user['id'], $user['username'], $user['role']);

            // Redirect based on role
            if ($user['role'] === 'admin') {
                redirect('../pages/admin/admin-panel.html');
            } else {
                redirect('../pages/user-profile/user-profile.html');
            }
        } else {
            // Invalid credentials
            $_SESSION['error'] = "Invalid username or password";
            redirect('../index.html');
        }
    } catch(PDOException $e) {
        $_SESSION['error'] = "Login failed: " . $e->getMessage();
        redirect('../index.html');
    }
}
?> 