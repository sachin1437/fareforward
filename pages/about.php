<?php
$pageTitle = 'About Us - FareForward';
$rootPath = '../';
include '../includes/header.php';
?>

<!-- Hero Section -->
<section class="hero" style="min-height: 60vh; background-image: url('https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=1920');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="container" style="text-align: center;">
            <span class="hero-badge">Our Mission</span>
            <h1 class="hero-title">Connecting Travelers,<br>One Ticket at a Time</h1>
            <p class="hero-subtitle" style="margin: 0 auto;">
                We're on a mission to reduce waste and help people travel by making ticket resale simple, safe, and accessible to everyone.
            </p>
        </div>
    </div>
</section>

<!-- Our Story -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center;">
            <div>
                <span class="section-label">Our Story</span>
                <h2 class="section-title" style="margin-bottom: 1.5rem;">How FareForward<br><span class="gradient-text">Came to Life</span></h2>
                <p style="color: var(--text-medium); margin-bottom: 1.5rem; line-height: 1.8;">
                    It all started in 2024 when our founder missed a train due to an emergency and couldn't get a refund. 
                    The ticket went to waste, and someone else could have used it. That moment sparked an idea.
                </p>
                <p style="color: var(--text-medium); margin-bottom: 1.5rem; line-height: 1.8;">
                    FareForward was born to solve a simple problem: connecting people who can't use their tickets with 
                    those who need them. Today, we've helped thousands of travelers save money and reduce waste.
                </p>
                <div style="display: flex; gap: 2rem; margin-top: 2rem;">
                    <div>
                        <div style="font-size: 2rem; font-weight: 700; color: var(--primary-purple);">2024</div>
                        <div style="color: var(--text-light);">Founded</div>
                    </div>
                    <div>
                        <div style="font-size: 2rem; font-weight: 700; color: var(--primary-purple);">50K+</div>
                        <div style="color: var(--text-light);">Users</div>
                    </div>
                    <div>
                        <div style="font-size: 2rem; font-weight: 700; color: var(--primary-purple);">₹5Cr+</div>
                        <div style="color: var(--text-light);">Saved</div>
                    </div>
                </div>
            </div>
            <div>
                <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=800" alt="Team" style="border-radius: var(--radius-xl); box-shadow: var(--shadow-xl);">
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Our Team</span>
            <h2 class="section-title gradient-text">Meet the People Behind FareForward</h2>
            <p class="section-subtitle">Passionate individuals working to transform ticket resale in India</p>
        </div>
        
        <div class="team-grid" style="grid-template-columns: repeat(2, minmax(auto, 600px)); justify-content: center; max-width: 1200px; margin: 0 auto;">
            <!-- Sachin Gupta -->
            <div class="team-card glass-card" style="max-width: 600px;">
                <img src="https://ui-avatars.com/api/?name=Sachin+Gupta&background=6366f1&color=fff&size=200&rounded=true" alt="Sachin Gupta" class="team-avatar">
                <h3 class="team-name">Sachin Gupta</h3>
                <div class="team-role">🧙 Full Stack Sorcerer & Chief Ticket Whisperer</div>
                <p style="font-style: italic; color: var(--text-light); font-size: 0.9rem; margin: 0.5rem 0;">"It works on my machine 🤷"</p>
                <p class="team-bio">The man behind the magic. Builds everything from database queries to pixel-perfect UIs while whispering sweet nothings to tickets.</p>
            </div>
            <!-- Aditya Kumar -->
            <div class="team-card glass-card" style="max-width: 600px;">
                <img src="https://ui-avatars.com/api/?name=Aditya+Kumar&background=06b6d4&color=fff&size=200&rounded=true" alt="Aditya Kumar" class="team-avatar">
                <h3 class="team-name">Aditya Kumar</h3>
                <div class="team-role">⚔️ Bug Slayer General & CSS Destroyer</div>
                <p style="font-style: italic; color: var(--text-light); font-size: 0.9rem; margin: 0.5rem 0;">"It's not a bug, it's a feature ✨"</p>
                <p class="team-bio">Fearlessly hunts bugs at 3am and destroys CSS layouts just to rebuild them better. The unsung hero of every pixel on this website.</p>
            </div>
        </div>
    </div>
</section>

<!-- Values Section -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Our Values</span>
            <h2 class="section-title gradient-text">What We Stand For</h2>
            <p class="section-subtitle">The principles that guide everything we do</p>
        </div>
        
        <div class="values-grid">
            <div class="value-card glass-card">
                <div class="value-icon">🤝</div>
                <h3 class="value-title">Trust</h3>
                <p class="value-description">We verify every ticket and seller to ensure a safe marketplace for everyone.</p>
            </div>
            <div class="value-card glass-card">
                <div class="value-icon">⚡</div>
                <h3 class="value-title">Speed</h3>
                <p class="value-description">Instant UPI payments mean no waiting. List, sell, and get paid in minutes.</p>
            </div>
            <div class="value-card glass-card">
                <div class="value-icon">🌱</div>
                <h3 class="value-title">Sustainability</h3>
                <p class="value-description">Every ticket resold is one less wasted. We're building a greener future.</p>
            </div>
            <div class="value-card glass-card">
                <div class="value-icon">💙</div>
                <h3 class="value-title">Community</h3>
                <p class="value-description">We're more than a platform. We're a community of travelers helping each other.</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-item-value" data-counter="50000">0</div>
                <div class="stat-item-label">Registered Users</div>
            </div>
            <div class="stat-item">
                <div class="stat-item-value" data-counter="15000">0</div>
                <div class="stat-item-label">Tickets Sold</div>
            </div>
            <div class="stat-item">
                <div class="stat-item-value" data-counter="5000000">0</div>
                <div class="stat-item-label">Rupees Saved</div>
            </div>
            <div class="stat-item">
                <div class="stat-item-value" data-counter="99">0</div>
                <div class="stat-item-label">% Happy Customers</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: var(--bg-white);">
    <div class="container" style="text-align: center;">
        <h2 class="section-title" style="margin-bottom: 1rem;">Ready to Join the Movement?</h2>
        <p class="section-subtitle" style="margin-bottom: 2rem;">Start buying or selling tickets today and be part of India's ticket revolution.</p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
            <a href="register.php" class="btn btn-primary btn-lg">Get Started</a>
            <a href="list-ticket.php" class="btn btn-outline-dark btn-lg">List a Ticket</a>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
