<?php
$pageTitle = 'Login - FareForward';
$rootPath = '../';
include '../includes/header.php';
?>

<!-- Login Page -->
<div class="auth-page" style="background-image: url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=1920'); min-height: 100vh; padding-top: 80px; display: flex; align-items: center; justify-content: center;">
    <div class="auth-overlay" style="position: fixed;"></div>
    
    <div class="auth-card glass-card" style="margin: 2rem 0; position: relative; z-index: 1;">
        <div class="auth-header">
            <h1 class="auth-title gradient-text">Welcome Back</h1>
            <p class="auth-subtitle">Login to access your account and manage your tickets</p>
        </div>
        
        <form class="auth-form" data-validate>
            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email" required>
            </div>
            
            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-input" placeholder="Enter your password" required>
            </div>
            
            <div class="form-group" style="display: flex; justify-content: space-between; align-items: center;">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" name="remember">
                    <span>Remember me</span>
                </label>
                <a href="#" style="color: var(--primary-purple); font-size: 0.875rem;">Forgot password?</a>
            </div>
            
            <button type="submit" class="btn btn-primary" style="width: 100%;">Login</button>
        </form>
        
        <div class="auth-footer">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
