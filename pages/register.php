<?php
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
        
        <form class="auth-form" data-validate>
            <div class="form-group">
                <label class="form-label" for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" class="form-input" placeholder="Enter your full name" required>
            </div>
            
            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email" required>
            </div>
            
            <div class="form-group">
                <label class="form-label" for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" class="form-input" placeholder="+91 98765 43210" required>
            </div>
            
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-input" placeholder="Create a password" required minlength="8">
            </div>
            
            <div class="form-group">
                <label class="form-label" for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-input" placeholder="Confirm your password" required>
            </div>
            
            <div class="form-group">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" required>
                    <span>I agree to the <a href="#" style="color: var(--primary-purple);">Terms of Service</a> and <a href="#" style="color: var(--primary-purple);">Privacy Policy</a></span>
                </label>
            </div>
            
            <button type="submit" class="btn btn-primary" style="width: 100%;">Create Account</button>
        </form>
        
        <div class="auth-footer">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
