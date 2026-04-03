<?php
$pageTitle = 'Dashboard - FareForward';
$rootPath = '../';
include '../includes/header.php';

// Dummy user data
$userName = 'Rahul Sharma';

// Dummy listings data
$listings = [
    [
        'id' => 1,
        'type' => 'Train',
        'category' => 'travel',
        'from' => 'Delhi',
        'to' => 'Mumbai',
        'title' => 'Rajdhani Express',
        'date' => '2026-04-15',
        'price' => 2850,
        'status' => 'active',
        'views' => 45
    ],
    [
        'id' => 2,
        'type' => 'Movie',
        'category' => 'entertainment',
        'event' => 'Avatar 3',
        'venue' => 'PVR Cinemas',
        'date' => '2026-04-10',
        'price' => 800,
        'status' => 'sold',
        'views' => 120
    ],
    [
        'id' => 3,
        'type' => 'Flight',
        'category' => 'travel',
        'from' => 'Bangalore',
        'to' => 'Delhi',
        'title' => 'IndiGo 6E-234',
        'date' => '2026-04-12',
        'price' => 5200,
        'status' => 'active',
        'views' => 32
    ]
];

$totalListings = count($listings);
$activeListings = count(array_filter($listings, fn($l) => $l['status'] === 'active'));
$soldListings = count(array_filter($listings, fn($l) => $l['status'] === 'sold'));
?>

<!-- Dashboard Banner -->
<section class="dashboard-banner">
    <div class="container">
        <h1 style="font-size: 2rem; margin-bottom: 0.5rem;">Welcome back, <?php echo $userName; ?>! 👋</h1>
        <p style="opacity: 0.9;">Manage your listings and track your sales</p>
    </div>
</section>

<!-- Dashboard Content -->
<section class="section">
    <div class="container">
        <!-- Stats Cards -->
        <div class="dashboard-stats">
            <div class="dashboard-stat-card">
                <div class="dashboard-stat-value"><?php echo $totalListings; ?></div>
                <div class="dashboard-stat-label">Total Listings</div>
            </div>
            <div class="dashboard-stat-card">
                <div class="dashboard-stat-value" style="color: var(--primary-cyan);"><?php echo $activeListings; ?></div>
                <div class="dashboard-stat-label">Active</div>
            </div>
            <div class="dashboard-stat-card">
                <div class="dashboard-stat-value" style="color: #10b981;"><?php echo $soldListings; ?></div>
                <div class="dashboard-stat-label">Sold</div>
            </div>
            <div class="dashboard-stat-card">
                <div class="dashboard-stat-value" style="color: var(--primary-amber);">₹<?php echo number_format($soldListings * 3000); ?></div>
                <div class="dashboard-stat-label">Total Earnings</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div style="display: flex; gap: 1rem; margin-bottom: 2rem; flex-wrap: wrap;">
            <a href="list-ticket.php" class="btn btn-primary">
                <span>+</span> List New Ticket
            </a>
            <a href="#listings" class="btn btn-outline-dark">View My Listings</a>
        </div>

        <!-- Tabs -->
        <div class="category-tabs" style="margin-bottom: 2rem;">
            <button class="category-tab active" data-panel="all">All Listings</button>
            <button class="category-tab" data-panel="travel">Travel</button>
            <button class="category-tab" data-panel="entertainment">Entertainment</button>
        </div>

        <!-- Listings Grid -->
        <div id="listings">
            <?php if (count($listings) > 0): ?>
            <div class="tickets-grid">
                <?php foreach ($listings as $listing): ?>
                <div class="ticket-card <?php echo $listing['category']; ?>" data-category="<?php echo $listing['category']; ?>">
                    <div style="padding: 1.5rem;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                            <span class="ticket-badge <?php echo $listing['category']; ?>">
                                <?php echo $listing['type']; ?>
                            </span>
                            <?php if ($listing['status'] === 'active'): ?>
                            <span class="badge badge-success">Active</span>
                            <?php else: ?>
                            <span class="badge badge-warning">Sold</span>
                            <?php endif; ?>
                        </div>
                        
                        <?php if ($listing['category'] === 'travel'): ?>
                        <div class="route-display" style="margin-bottom: 0.75rem;">
                            <span style="font-size: 1.125rem; color: var(--primary-purple);"><?php echo $listing['from']; ?></span>
                            <div class="route-line" style="flex: 0 0 40px;"></div>
                            <span style="font-size: 1.125rem; color: var(--primary-purple);"><?php echo $listing['to']; ?></span>
                        </div>
                        <h3 style="font-size: 1rem; margin-bottom: 0.5rem;"><?php echo $listing['title']; ?></h3>
                        <?php else: ?>
                        <h3 style="font-size: 1.125rem; margin-bottom: 0.5rem; color: var(--primary-amber);"><?php echo $listing['event']; ?></h3>
                        <p style="color: var(--text-light); font-size: 0.875rem; margin-bottom: 0.75rem;">📍 <?php echo $listing['venue']; ?></p>
                        <?php endif; ?>
                        
                        <div style="display: flex; gap: 1rem; margin-bottom: 1rem; font-size: 0.875rem; color: var(--text-medium);">
                            <span>📅 <?php echo date('M d, Y', strtotime($listing['date'])); ?></span>
                            <span>👁 <?php echo $listing['views']; ?> views</span>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div style="font-size: 1.25rem; font-weight: 700; color: var(--primary-purple);">₹<?php echo number_format($listing['price']); ?></div>
                            <div style="display: flex; gap: 0.5rem;">
                                <a href="ticket-detail.php?id=<?php echo $listing['id']; ?>" class="btn btn-sm" style="background: var(--bg-gray); color: var(--text-dark);">View</a>
                                <?php if ($listing['status'] === 'active'): ?>
                                <button class="btn btn-sm" style="background: #fee2e2; color: #ef4444;">Delete</button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <!-- Empty State -->
            <div class="empty-state">
                <div class="empty-state-icon">🎫</div>
                <h3 class="empty-state-title">No Listings Yet</h3>
                <p class="empty-state-text">Start selling your unused tickets and earn money instantly!</p>
                <a href="list-ticket.php" class="btn btn-primary">List Your First Ticket</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
