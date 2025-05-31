<?php
require_once '../config/database.php';
require_once '../config/session.php';

// Check if user is logged in
if (!isLoggedIn()) {
    redirect('../pages/index.html');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Start transaction
        $conn->beginTransaction();

        $employee_id = sanitize($_POST['employee_id']);

        // Update employee details
        $stmt = $conn->prepare("UPDATE employees SET 
            first_name = ?, 
            last_name = ?, 
            email = ?, 
            phone = ?, 
            date_of_birth = ?, 
            position_id = ?, 
            department_id = ?, 
            joining_date = ?, 
            salary = ?, 
            address = ?, 
            city = ?, 
            state = ?, 
            zip_code = ? 
            WHERE id = ?");

        $stmt->execute([
            sanitize($_POST['firstName']),
            sanitize($_POST['lastName']),
            sanitize($_POST['email']),
            sanitize($_POST['phone']),
            sanitize($_POST['dob']),
            sanitize($_POST['position']),
            sanitize($_POST['department']),
            sanitize($_POST['joiningDate']),
            sanitize($_POST['salary']),
            sanitize($_POST['address']),
            sanitize($_POST['city']),
            sanitize($_POST['state']),
            sanitize($_POST['zipCode']),
            $employee_id
        ]);

        // Update emergency contact
        $stmt = $conn->prepare("UPDATE emergency_contacts SET 
            name = ?, 
            relationship = ?, 
            phone = ? 
            WHERE employee_id = ?");

        $stmt->execute([
            sanitize($_POST['emergencyName']),
            sanitize($_POST['emergencyRelation']),
            sanitize($_POST['emergencyPhone']),
            $employee_id
        ]);

        // Commit transaction
        $conn->commit();

        $_SESSION['success'] = "Profile updated successfully!";
        
        // Redirect based on user role
        if (isAdmin()) {
            redirect('../pages/admin/allemployees.html');
        } else {
            redirect('../pages/user-profile/user-profile.html');
        }

    } catch(PDOException $e) {
        // Rollback transaction on error
        $conn->rollBack();
        $_SESSION['error'] = "Failed to update profile: " . $e->getMessage();
        
        // Redirect based on user role
        if (isAdmin()) {
            redirect('../pages/admin/editemployee.html?id=' . $employee_id);
        } else {
            redirect('../pages/user-profile/user-profile.html');
        }
    }
}
?> 