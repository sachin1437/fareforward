<?php
// Get current page for active nav link
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'FareForward'; ?></title>
    <link rel="stylesheet" href="<?php echo $cssPath ?? ''; ?>css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<nav class="navbar">
    <a href="<?php echo $rootPath ?? ''; ?>index.php" class="logo">Fare<span>Forward</span></a>
    <ul class="nav-links">
        <li><a href="<?php echo $rootPath ?? ''; ?>index.php" 
            <?php echo $currentPage == 'index.php' ? 'style="color:var(--primary)"' : ''; ?>>
            Home</a></li>
        <li><a href="<?php echo $rootPath ?? ''; ?>pages/list-ticket.php"
            <?php echo $currentPage == 'list-ticket.php' ? 'style="color:var(--primary)"' : ''; ?>>
            List a Ticket</a></li>
        <li><a href="<?php echo $rootPath ?? ''; ?>pages/login.php" class="btn btn-outline">Login</a></li>
        <li><a href="<?php echo $rootPath ?? ''; ?>pages/register.php" class="btn btn-primary">Register</a></li>
    </ul>
</nav>