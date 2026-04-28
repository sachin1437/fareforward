<?php
session_start();
require_once '../db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim(mysqli_real_escape_string($conn, $_POST['fullname'] ?? ''));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email'] ?? ''));
    $phone = trim(mysqli_real_escape_string($conn, $_POST['phone'] ?? ''));
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Validation
    if (empty($name) || empty($email) || empty($password) || empty($confirm_password)) {
        $error = '⚠️ Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = '⚠️ Please enter a valid email address.';
    } elseif (strlen($password) < 6) {
        $error = '⚠️ Password must be at least 6 characters.';
    } elseif ($password !== $confirm_password) {
        $error = '⚠️ Passwords do not match.';
    } else {
        // Check if email already exists
        $check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'");
        if (mysqli_num_rows($check) > 0) {
            $error = '⚠️ This email is already registered. Please login.';
        } else {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert user
            $sql = "INSERT INTO users (name, email, phone, password) 
                    VALUES ('$name', '$email', '$phone', '$hashed_password')";

            if (mysqli_query($conn, $sql)) {
                $user_id = mysqli_insert_id($conn);
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $name;
                $_SESSION['user_email'] = $email;

                header('Location: dashboard.php');
                exit();
            } else {
                $error = '⚠️ Registration failed. Please try again.';
            }
        }
    }
}

$pageTitle = 'Register - FareForward';
$rootPath = '../';
include '../includes/header.php';
?>

<!-- Register Page -->
<div class="auth-page" style="background-image: url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=1920'); min-height: 100vh; padding-top: 80px; display: flex; align-items: center; justify-content: center;">
    <div class="auth-overlay" style="position: fixed;"></div>
    
    <div class="auth-card glass-card" style="margin: 2rem 0; position: relative; z-index: 1;">
        <div class="auth-header">
            <h1 class="auth-title gradient-text">Create Account</h1>
            <p class="auth-subtitle">Join FareForward and start buying or selling tickets</p>
        </div>

        <?php if (!empty($error)) : ?>
            <div class="alert alert-danger" style="background:#fee2e2; color:#dc2626; border:1px solid #fca5a5; padding:0.9rem 1.2rem; border-radius:8px; margin-bottom:1rem; font-size:0.9rem;">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($success)) : ?>
            <div class="alert alert-success" style="background:#dcfce7; color:#16a34a; border:1px solid #86efac; padding:0.9rem 1.2rem; border-radius:8px; margin-bottom:1rem; font-size:0.9rem;">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>
        
        <form class="auth-form" method="POST" action="register.php">
            <div class="form-group">
                <label class="form-label" for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" class="form-input" 
                       placeholder="Enter your full name" required
                       value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-input" 
                       placeholder="Enter your email" required
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label class="form-label" for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="form-input" 
                       placeholder="+91 98765 43210" required
                       value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-input" 
                       placeholder="Create a password" required minlength="6">
            </div>
            
            <div class="form-group">
                <label class="form-label" for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-input" 
                       placeholder="Confirm your password" required>
            </div>
            
            <div class="form-group">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" required>
                    <span>I agree to the <a href="#" style="color: var(--primary-purple);">Terms of Service</a> and <a href="#" style="color: var(--primary-purple);">Privacy Policy</a></span>
                </label>
            </div>
            
            <button type="submit" class="btn btn-primary" style="width: 100%;">
                Create Account
            </button>
        </form>
        
        <div class="auth-footer">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>