<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Function to set session data
function setSession($user_id, $username, $role) {
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;
}

// Function to destroy session
function destroySession() {
    session_unset();
    session_destroy();
}

// Function to check if session is expired
function isSessionExpired() {
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
        // Session is expired (30 minutes)
        destroySession();
        return true;
    }
    $_SESSION['last_activity'] = time();
    return false;
}

// Check session expiration
isSessionExpired();
?> 