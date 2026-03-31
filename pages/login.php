<?php
$pageTitle = "Login — FareForward";
$rootPath = "../";
$cssPath = "../";
$jsPath = "../";
include '../includes/header.php';
?>

<!-- LOGIN SECTION -->
<div class="form-container">
    <h2>Welcome Back</h2>
    <p>Login to your FareForward account</p>

    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if (!empty($success)) : ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>

    <form action="login.php" method="POST">

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="e.g. rahul@email.com"
                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password">
        </div>

        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.2rem;">
            <label style="display:flex; align-items:center; gap:0.5rem; font-size:0.9rem; cursor:pointer;">
                <input type="checkbox" name="remember"> Remember me
            </label>
            <a href="#" style="color:var(--primary); font-size:0.9rem;">Forgot password?</a>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-lg">
            Login
        </button>

    </form>

    <div class="form-link">
        Don't have an account? <a href="register.php">Register here</a>
    </div>
</div>

<?php include '../includes/footer.php'; ?>