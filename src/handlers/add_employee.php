<?php
require_once '../config/database.php';
require_once '../config/session.php';

// Check if user is admin
if (!isAdmin()) {
    redirect('../pages/index.html');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Start transaction
        $conn->beginTransaction();

        // Create user account
        $username = sanitize($_POST['email']); // Use email as username
        $password = password_hash('password123', PASSWORD_DEFAULT); // Default password
        $email = sanitize($_POST['email']);
        $role = 'employee';

        $stmt = $conn->prepare("INSERT INTO users (username, password, email, role) VALUES (?, ?, ?, ?)");
        $stmt->execute([$username, $password, $email, $role]);
        $user_id = $conn->lastInsertId();

        // Add employee details
        $stmt = $conn->prepare("INSERT INTO employees (
            user_id, employee_code, first_name, last_name, email, phone, 
            date_of_birth, position_id, department_id, joining_date, 
            salary, address, city, state, zip_code
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->execute([
            $user_id,
            sanitize($_POST['empCode']),
            sanitize($_POST['firstName']),
            sanitize($_POST['lastName']),
            $email,
            sanitize($_POST['phone']),
            sanitize($_POST['dob']),
            sanitize($_POST['position']),
            sanitize($_POST['department']),
            sanitize($_POST['joiningDate']),
            sanitize($_POST['salary']),
            sanitize($_POST['address']),
            sanitize($_POST['city']),
            sanitize($_POST['state']),
            sanitize($_POST['zipCode'])
        ]);

        // Add emergency contact
        $employee_id = $conn->lastInsertId();
        $stmt = $conn->prepare("INSERT INTO emergency_contacts (employee_id, name, relationship, phone) VALUES (?, ?, ?, ?)");
        $stmt->execute([
            $employee_id,
            sanitize($_POST['emergencyName']),
            sanitize($_POST['emergencyRelation']),
            sanitize($_POST['emergencyPhone'])
        ]);

        // Commit transaction
        $conn->commit();

        $_SESSION['success'] = "Employee added successfully!";
        redirect('../pages/admin/allemployees.html');

    } catch(PDOException $e) {
        // Rollback transaction on error
        $conn->rollBack();
        $_SESSION['error'] = "Failed to add employee: " . $e->getMessage();
        redirect('../pages/admin/addemployee.html');
    }
}
?> 