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
                $stmt = $conn->prepare("INSERT INTO education (
                    employee_id, degree, field_of_study, institution, 
                    start_date, end_date, grade, description
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

                $stmt->execute([
                    $employee_id,
                    sanitize($_POST['degree']),
                    sanitize($_POST['field']),
                    sanitize($_POST['institution']),
                    sanitize($_POST['startDate']),
                    sanitize($_POST['endDate']),
                    sanitize($_POST['grade']),
                    sanitize($_POST['description'])
                ]);

                $_SESSION['success'] = "Education record added successfully!";
                break;

            case 'update':
                $education_id = sanitize($_POST['education_id']);
                $stmt = $conn->prepare("UPDATE education SET 
                    degree = ?, 
                    field_of_study = ?, 
                    institution = ?, 
                    start_date = ?, 
                    end_date = ?, 
                    grade = ?, 
                    description = ? 
                    WHERE id = ? AND employee_id = ?");

                $stmt->execute([
                    sanitize($_POST['degree']),
                    sanitize($_POST['field']),
                    sanitize($_POST['institution']),
                    sanitize($_POST['startDate']),
                    sanitize($_POST['endDate']),
                    sanitize($_POST['grade']),
                    sanitize($_POST['description']),
                    $education_id,
                    $employee_id
                ]);

                $_SESSION['success'] = "Education record updated successfully!";
                break;

            case 'delete':
                $education_id = sanitize($_POST['education_id']);
                $stmt = $conn->prepare("DELETE FROM education WHERE id = ? AND employee_id = ?");
                $stmt->execute([$education_id, $employee_id]);

                $_SESSION['success'] = "Education record deleted successfully!";
                break;
        }

        // Redirect based on user role
        if (isAdmin()) {
            redirect('../pages/admin/editemployee.html?id=' . $employee_id . '#education');
        } else {
            redirect('../pages/user-profile/myeducation.html');
        }

    } catch(PDOException $e) {
        $_SESSION['error'] = "Operation failed: " . $e->getMessage();
        
        // Redirect based on user role
        if (isAdmin()) {
            redirect('../pages/admin/editemployee.html?id=' . $employee_id . '#education');
        } else {
            redirect('../pages/user-profile/myeducation.html');
        }
    }
}
?> 