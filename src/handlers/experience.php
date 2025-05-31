<?php
require_once '../config/database.php';
require_once '../config/session.php';

// Check if user is logged in
if (!isLoggedIn()) {
    redirect('../pages/index.html');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = sanitize($_POST['action']);
    $employee_id = sanitize($_POST['employee_id']);

    try {
        switch ($action) {
            case 'add':
                $stmt = $conn->prepare("INSERT INTO experience (
                    employee_id, company_name, position, location, 
                    start_date, end_date, description, is_current_job
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

                $stmt->execute([
                    $employee_id,
                    sanitize($_POST['company']),
                    sanitize($_POST['position']),
                    sanitize($_POST['location']),
                    sanitize($_POST['startDate']),
                    sanitize($_POST['endDate']),
                    sanitize($_POST['description']),
                    isset($_POST['currentJob']) ? 1 : 0
                ]);

                $_SESSION['success'] = "Experience record added successfully!";
                break;

            case 'update':
                $experience_id = sanitize($_POST['experience_id']);
                $stmt = $conn->prepare("UPDATE experience SET 
                    company_name = ?, 
                    position = ?, 
                    location = ?, 
                    start_date = ?, 
                    end_date = ?, 
                    description = ?, 
                    is_current_job = ? 
                    WHERE id = ? AND employee_id = ?");

                $stmt->execute([
                    sanitize($_POST['company']),
                    sanitize($_POST['position']),
                    sanitize($_POST['location']),
                    sanitize($_POST['startDate']),
                    sanitize($_POST['endDate']),
                    sanitize($_POST['description']),
                    isset($_POST['currentJob']) ? 1 : 0,
                    $experience_id,
                    $employee_id
                ]);

                $_SESSION['success'] = "Experience record updated successfully!";
                break;

            case 'delete':
                $experience_id = sanitize($_POST['experience_id']);
                $stmt = $conn->prepare("DELETE FROM experience WHERE id = ? AND employee_id = ?");
                $stmt->execute([$experience_id, $employee_id]);

                $_SESSION['success'] = "Experience record deleted successfully!";
                break;
        }

        // Redirect based on user role
        if (isAdmin()) {
            redirect('../pages/admin/editemployee.html?id=' . $employee_id . '#experience');
        } else {
            redirect('../pages/user-profile/myexp.html');
        }

    } catch(PDOException $e) {
        $_SESSION['error'] = "Operation failed: " . $e->getMessage();
        
        // Redirect based on user role
        if (isAdmin()) {
            redirect('../pages/admin/editemployee.html?id=' . $employee_id . '#experience');
        } else {
            redirect('../pages/user-profile/myexp.html');
        }
    }
}
?> 