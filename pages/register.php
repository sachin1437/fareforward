<?php
$pageTitle = "Register — FareForward";
$rootPath = "../";
$cssPath = "../";
$jsPath = "../";
include '../includes/header.php';
?>

<!-- REGISTER SECTION -->
<div class="form-container">
    <h2>Create Account</h2>
    <p>Join FareForward and start listing or buying tickets</p>

    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if (!empty($success)) : ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>

    <form action="register.php" method="POST">

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="name" placeholder="e.g. Rahul Sharma" 
                   value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
        </div>

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="e.g. rahul@email.com"
                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
        </div>

        <div class="form-group">
            <label>Phone Number</label>
            <input type="tel" name="phone" placeholder="e.g. 9876543210"
                   value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Min 6 characters">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" placeholder="Repeat password">
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-lg">
            Create Account
        </button>

    </form>

    <div class="form-link">
        Already have an account? <a href="login.php">Login here</a>
    </div>
</div>

<?php include '../includes/footer.php'; ?>