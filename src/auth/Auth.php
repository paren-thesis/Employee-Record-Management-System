<?php
require_once __DIR__ . '/../config/database.php';

class Auth {
    private $conn;
    private $table_name = "users";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function login($username, $password) {
        try {
            $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username AND is_active = 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                $user = $stmt->fetch();
                if(password_verify($password, $user['password'])) {
                    // Update last login
                    $this->updateLastLogin($user['id']);
                    
                    // Create session
                    $session_token = $this->createSession($user['id']);
                    
                    // Set session cookie
                    setcookie("session_token", $session_token, time() + (86400 * 30), "/"); // 30 days
                    
                    return [
                        'success' => true,
                        'user' => [
                            'id' => $user['id'],
                            'username' => $user['username'],
                            'email' => $user['email'],
                            'full_name' => $user['full_name'],
                            'role' => $user['role']
                        ]
                    ];
                }
            }
            return ['success' => false, 'message' => 'Invalid username or password'];
        } catch(PDOException $e) {
            return ['success' => false, 'message' => 'Login failed: ' . $e->getMessage()];
        }
    }

    public function register($username, $password, $email, $full_name) {
        try {
            // Check if username or email already exists
            $query = "SELECT id FROM " . $this->table_name . " WHERE username = :username OR email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            if($stmt->rowCount() > 0) {
                return ['success' => false, 'message' => 'Username or email already exists'];
            }

            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user
            $query = "INSERT INTO " . $this->table_name . " 
                    (username, password, email, full_name) 
                    VALUES (:username, :password, :email, :full_name)";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $hashed_password);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":full_name", $full_name);

            if($stmt->execute()) {
                return ['success' => true, 'message' => 'Registration successful'];
            }
            return ['success' => false, 'message' => 'Registration failed'];
        } catch(PDOException $e) {
            return ['success' => false, 'message' => 'Registration failed: ' . $e->getMessage()];
        }
    }

    private function updateLastLogin($user_id) {
        $query = "UPDATE " . $this->table_name . " SET last_login = CURRENT_TIMESTAMP WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $user_id);
        $stmt->execute();
    }

    private function createSession($user_id) {
        $token = bin2hex(random_bytes(32));
        $expires = date('Y-m-d H:i:s', strtotime('+30 days'));
        
        $query = "INSERT INTO sessions (user_id, session_token, expires_at) 
                 VALUES (:user_id, :token, :expires)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $user_id);
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":expires", $expires);
        $stmt->execute();

        return $token;
    }

    public function checkSession() {
        if(!isset($_COOKIE['session_token'])) {
            return false;
        }

        $token = $_COOKIE['session_token'];
        $query = "SELECT u.* FROM users u 
                 INNER JOIN sessions s ON u.id = s.user_id 
                 WHERE s.session_token = :token 
                 AND s.expires_at > CURRENT_TIMESTAMP 
                 AND u.is_active = 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":token", $token);
        $stmt->execute();

        if($stmt->rowCount() > 0) {
            return $stmt->fetch();
        }
        return false;
    }

    public function logout() {
        if(isset($_COOKIE['session_token'])) {
            $token = $_COOKIE['session_token'];
            $query = "DELETE FROM sessions WHERE session_token = :token";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":token", $token);
            $stmt->execute();
            
            setcookie("session_token", "", time() - 3600, "/");
        }
        return true;
    }
}
?> 