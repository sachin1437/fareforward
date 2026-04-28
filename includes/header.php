<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Set default values if not defined
if (!isset($pageTitle)) $pageTitle = 'FareForward - Ticket Resale Platform';
if (!isset($rootPath)) $rootPath = './';
if (!isset($cssPath)) $cssPath = $rootPath . 'css/style.css';
if (!isset($jsPath)) $jsPath = $rootPath . 'js/main.js';
if (!isset($bodyClass)) $bodyClass = '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo $cssPath; ?>">
</head>
<body class="<?php echo $bodyClass; ?>">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="<?php echo $rootPath; ?>index.php" class="logo">
                <span class="logo-icon">🎫</span>
                <span class="logo-text">FareForward</span>
            </a>
            
            <div class="nav-links">
                <a href="<?php echo $rootPath; ?>index.php" class="nav-link">Home</a>
                <a href="<?php echo $rootPath; ?>pages/list-ticket.php" class="nav-link">List Ticket</a>
                <a href="<?php echo $rootPath; ?>pages/about.php" class="nav-link">About</a>
                <a href="<?php echo $rootPath; ?>pages/contact.php" class="nav-link">Contact</a>
            </div>
            
            <div class="nav-actions">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="<?php echo $rootPath; ?>pages/dashboard.php" class="btn btn-outline btn-sm">
                        👤 <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                    </a>
                    <a href="<?php echo $rootPath; ?>pages/logout.php" class="btn btn-primary btn-sm">
                        Logout
                    </a>
                <?php else: ?>
                    <a href="<?php echo $rootPath; ?>pages/login.php" class="btn btn-outline btn-sm">Login</a>
                    <a href="<?php echo $rootPath; ?>pages/register.php" class="btn btn-primary btn-sm">Register</a>
                <?php endif; ?>
            </div>
            
            <button class="mobile-menu-btn" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <a href="<?php echo $rootPath; ?>index.php" class="nav-link">Home</a>
        <a href="<?php echo $rootPath; ?>pages/list-ticket.php" class="nav-link">List Ticket</a>
        <a href="<?php echo $rootPath; ?>pages/about.php" class="nav-link">About</a>
        <a href="<?php echo $rootPath; ?>pages/contact.php" class="nav-link">Contact</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="<?php echo $rootPath; ?>pages/dashboard.php" class="nav-link">
                👤 <?php echo htmlspecialchars($_SESSION['user_name']); ?>
            </a>
            <a href="<?php echo $rootPath; ?>pages/logout.php" class="nav-link">Logout</a>
        <?php else: ?>
            <a href="<?php echo $rootPath; ?>pages/login.php" class="nav-link">Login</a>
            <a href="<?php echo $rootPath; ?>pages/register.php" class="nav-link">Register</a>
        <?php endif; ?>
    </div>