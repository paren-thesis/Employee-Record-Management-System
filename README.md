# Employee Record Management System (ERMS)

A comprehensive web-based system for managing employee records, built with PHP, MySQL, and modern web technologies.

## Features

### Authentication & Authorization
- Secure login system with role-based access control
- Session management with timeout functionality
- Password hashing for security
- Remember me functionality

### Employee Management
- Add new employees with comprehensive details
- Edit employee information
- View employee profiles
- Search and filter employees
- Manage employee status (active/inactive)

### Profile Management
- Personal information management
- Employment details tracking
- Address information
- Emergency contact management
- Education history
- Work experience tracking

### Department & Position Management
- Department creation and management
- Position management within departments
- Salary structure management

### Leave Management
- Leave request submission
- Leave approval workflow
- Leave balance tracking
- Leave history

### Document Management
- Document upload and storage
- Document categorization
- Document access control
- Document versioning

## Technical Stack

### Frontend
- HTML5
- CSS3 with Bootstrap 5.3.2
- JavaScript
- Font Awesome 6.4.0 for icons
- Responsive design for all devices

### Backend
- PHP
- MySQL Database
- PDO for database connections
- Session management
- Input sanitization and validation

### Security Features
- Password hashing
- SQL injection prevention
- XSS protection
- CSRF protection
- Input validation
- Session security

## Installation

1. Clone the repository:
```bash
git clone https://github.com/paren-thesis/Employee-Record-Management-System.git
```

2. Set up the database:
   - Install XAMPP or similar local server environment
   - Start Apache and MySQL services
   - Create a new database named 'erms'
   - Import the `database.sql` file

3. Configure the database connection:
   - Open `src/config/database.php`
   - Update the database credentials:
     ```php
     define('DB_HOST', 'localhost');
     define('DB_USER', 'your_username');
     define('DB_PASS', 'your_password');
     define('DB_NAME', 'erms');
     ```

4. Place the project in your web server directory:
   - For XAMPP: `C:\xampp\htdocs\Employee-Record-Management-System\`
   - For other servers: Place in the appropriate web root directory

5. Access the application:
   - Open your web browser
   - Navigate to `http://localhost/Employee-Record-Management-System/`

## Default Login Credentials

### Admin User
- Username: admin
- Password: password

## Directory Structure

```
Employee-Record-Management-System/
├── src/
│   ├── config/
│   │   ├── database.php
│   │   └── session.php
│   ├── handlers/
│   │   ├── login.php
│   │   ├── add_employee.php
│   │   ├── update_employee.php
│   │   ├── education.php
│   │   └── experience.php
│   ├── pages/
│   │   ├── admin/
│   │   │   ├── admin-panel.html
│   │   │   ├── addemployee.html
│   │   │   ├── editemployee.html
│   │   │   └── allemployees.html
│   │   ├── user-profile/
│   │   │   ├── user-profile.html
│   │   │   ├── myeducation.html
│   │   │   └── myexp.html
│   │   └── index.html
│   └── assets/
│       ├── css/
│       ├── js/
│       └── images/
├── database.sql
└── README.md
```

## Database Schema

The system uses a relational database with the following main tables:
- users
- employees
- departments
- positions
- education
- experience
- emergency_contacts
- documents
- leave_requests

## Security Considerations

1. Password Security
   - Passwords are hashed using PHP's password_hash()
   - Default passwords should be changed on first login

2. Session Security
   - Sessions expire after 30 minutes of inactivity
   - Session data is validated on each request

3. Input Validation
   - All user inputs are sanitized
   - Form validation on both client and server side

4. Access Control
   - Role-based access control
   - Admin and regular user roles
   - Protected routes and actions

## Contributing

1. Fork the repository
2. Create a new branch for your feature
3. Commit your changes
4. Push to the branch
5. Create a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Support

For support, please open an issue in the GitHub repository or contact the development team.

## Acknowledgments

- Bootstrap for the frontend framework
- Font Awesome for the icons
 