<?php
session_start();
require_once '../db.php';

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$userName = $_SESSION['user_name'];
$userEmail = $_SESSION['user_email'];

// Handle delete
if (isset($_GET['delete'])) {
    $delete_id = (int)$_GET['delete'];
    mysqli_query($conn, "DELETE FROM tickets WHERE id=$delete_id AND user_id=$user_id");
    header('Location: dashboard.php');
    exit();
}

// Fetch real tickets from database
$result = mysqli_query($conn, "SELECT * FROM tickets WHERE user_id = $user_id ORDER BY created_at DESC");
$listings = [];
while ($row = mysqli_fetch_assoc($result)) {
    $listings[] = $row;
}

$totalListings = count($listings);
$activeListings = count(array_filter($listings, fn($l) => $l['status'] === 'available'));
$soldListings = count(array_filter($listings, fn($l) => $l['status'] === 'sold'));
$totalEarnings = array_sum(array_map(fn($l) => $l['status'] === 'sold' ? $l['price'] : 0, $listings));

$pageTitle = 'Dashboard - FareForward';
$rootPath = '../';
$bodyClass = 'page-no-hero';
include '../includes/header.php';
?>

<style>
.dashboard-hero {
    background: linear-gradient(135deg, #1e1b4b 0%, #312e81 50%, #4f46e5 100%);
    padding: 5rem 0 3rem;
    position: relative;
    overflow: hidden;
}

.dashboard-hero::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(99,102,241,0.15) 0%, transparent 60%);
    animation: pulse 4s ease-in-out infinite;
}

.dashboard-hero::after {
    content: '🎫';
    position: absolute;
    right: 5%;
    top: 50%;
    transform: translateY(-50%);
    font-size: 10rem;
    opacity: 0.08;
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0%, 100% { transform: translateY(-50%) rotate(-5deg); }
    50% { transform: translateY(-60%) rotate(5deg); }
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

@keyframes countUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.hero-greeting {
    position: relative;
    z-index: 1;
    color: #fff;
}

.hero-greeting .badge-tag {
    display: inline-block;
    background: rgba(255,255,255,0.15);
    border: 1px solid rgba(255,255,255,0.3);
    padding: 0.4rem 1rem;
    border-radius: 50px;
    font-size: 0.85rem;
    font-weight: 600;
    margin-bottom: 1rem;
    backdrop-filter: blur(10px);
}

.hero-greeting h1 {
    font-size: clamp(1.8rem, 4vw, 2.5rem);
    font-weight: 800;
    margin-bottom: 0.5rem;
    font-family: 'Poppins', sans-serif;
}

.hero-greeting h1 span {
    color: #fbbf24;
}

.hero-greeting p {
    opacity: 0.85;
    font-size: 1rem;
}

.stats-row {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.5rem;
    margin-top: 3rem;
    position: relative;
    z-index: 1;
}

.stat-glass {
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 16px;
    padding: 1.5rem;
    text-align: center;
    color: #fff;
    transition: all 0.3s ease;
    animation: countUp 0.6s ease forwards;
}

.stat-glass:hover {
    background: rgba(255,255,255,0.2);
    transform: translateY(-5px);
}

.stat-glass .stat-icon {
    font-size: 1.8rem;
    margin-bottom: 0.5rem;
}

.stat-glass .stat-value {
    font-size: 2rem;
    font-weight: 800;
    font-family: 'Poppins', sans-serif;
    color: #fbbf24;
}

.stat-glass .stat-label {
    font-size: 0.85rem;
    opacity: 0.8;
    margin-top: 0.3rem;
}

.dashboard-content {
    background: #f8fafc;
    padding: 3rem 0;
}

.action-bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1rem;
}

.action-bar h2 {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1f2937;
}

.action-buttons {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.ticket-card-dashboard {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border: 1px solid #e5e7eb;
    position: relative;
}

.ticket-card-dashboard:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.12);
}

.ticket-card-dashboard.travel {
    border-top: 4px solid #6366f1;
}

.ticket-card-dashboard.entertainment {
    border-top: 4px solid #f59e0b;
}

.card-inner {
    padding: 1.5rem;
}

.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.ticket-type-pill {
    display: inline-flex;
    align-items: center;
    gap: 0.3rem;
    padding: 0.3rem 0.9rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.ticket-type-pill.travel {
    background: rgba(99,102,241,0.1);
    color: #6366f1;
}

.ticket-type-pill.entertainment {
    background: rgba(245,158,11,0.1);
    color: #f59e0b;
}

.status-pill {
    padding: 0.3rem 0.8rem;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: 700;
}

.status-active {
    background: #dcfce7;
    color: #16a34a;
}

.status-sold {
    background: #fee2e2;
    color: #dc2626;
}

.route-info {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    margin-bottom: 0.8rem;
}

.route-city {
    font-size: 1.1rem;
    font-weight: 700;
    color: #6366f1;
    font-family: 'Poppins', sans-serif;
}

.route-arrow {
    flex: 1;
    height: 2px;
    background: repeating-linear-gradient(to right, #d1d5db 0, #d1d5db 6px, transparent 6px, transparent 10px);
    position: relative;
}

.event-title {
    font-size: 1.1rem;
    font-weight: 700;
    color: #f59e0b;
    font-family: 'Poppins', sans-serif;
    margin-bottom: 0.3rem;
}

.event-venue {
    font-size: 0.85rem;
    color: #6b7280;
    margin-bottom: 0.8rem;
}

.card-meta {
    display: flex;
    gap: 1rem;
    font-size: 0.8rem;
    color: #6b7280;
    margin-bottom: 1rem;
    background: #f9fafb;
    padding: 0.6rem 0.8rem;
    border-radius: 8px;
}

.card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1rem;
    border-top: 1px solid #e5e7eb;
}

.card-price {
    font-size: 1.4rem;
    font-weight: 800;
    color: #6366f1;
    font-family: 'Poppins', sans-serif;
}

.card-actions {
    display: flex;
    gap: 0.5rem;
}

.btn-view {
    padding: 0.5rem 1rem;
    background: #f3f4f6;
    color: #374151;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
}

.btn-view:hover {
    background: #6366f1;
    color: #fff;
}

.btn-delete {
    padding: 0.5rem 1rem;
    background: #fee2e2;
    color: #ef4444;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 600;
    transition: all 0.3s ease;
    text-decoration: none;
    border: none;
    cursor: pointer;
}

.btn-delete:hover {
    background: #ef4444;
    color: #fff;
}

.tabs-wrapper {
    display: flex;
    gap: 0.5rem;
    margin-bottom: 2rem;
    background: #fff;
    padding: 0.5rem;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    display: inline-flex;
}

.dash-tab {
    padding: 0.6rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.9rem;
    cursor: pointer;
    border: none;
    background: transparent;
    color: #6b7280;
    transition: all 0.3s ease;
}

.dash-tab.active {
    background: linear-gradient(135deg, #6366f1, #06b6d4);
    color: #fff;
    box-shadow: 0 4px 15px rgba(99,102,241,0.3);
}

.empty-dashboard {
    text-align: center;
    padding: 4rem 2rem;
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
}

.empty-dashboard .empty-icon {
    font-size: 4rem;
    margin-bottom: 1rem;
    opacity: 0.5;
}

.empty-dashboard h3 {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    color: #1f2937;
}

.empty-dashboard p {
    color: #6b7280;
    margin-bottom: 1.5rem;
}

@media (max-width: 768px) {
    .stats-row { grid-template-columns: repeat(2, 1fr); }
    .dashboard-hero::after { display: none; }
}

@media (max-width: 480px) {
    .stats-row { grid-template-columns: 1fr 1fr; }
}
</style>

<!-- Dashboard Hero -->
<section class="dashboard-hero">
    <div class="container">
        <div class="hero-greeting">
            <div class="badge-tag">👋 Welcome back!</div>
            <h1>Hello, <span><?php echo htmlspecialchars($userName); ?></span>!</h1>
            <p>Here's what's happening with your listings today</p>
        </div>

        <div class="stats-row">
            <div class="stat-glass" style="animation-delay: 0.1s;">
                <div class="stat-icon">🎫</div>
                <div class="stat-value"><?php echo $totalListings; ?></div>
                <div class="stat-label">Total Listings</div>
            </div>
            <div class="stat-glass" style="animation-delay: 0.2s;">
                <div class="stat-icon">✅</div>
                <div class="stat-value"><?php echo $activeListings; ?></div>
                <div class="stat-label">Active</div>
            </div>
            <div class="stat-glass" style="animation-delay: 0.3s;">
                <div class="stat-icon">🏷️</div>
                <div class="stat-value"><?php echo $soldListings; ?></div>
                <div class="stat-label">Sold</div>
            </div>
            <div class="stat-glass" style="animation-delay: 0.4s;">
                <div class="stat-icon">💰</div>
                <div class="stat-value">₹<?php echo number_format($totalEarnings); ?></div>
                <div class="stat-label">Total Earnings</div>
            </div>
        </div>
    </div>
</section>

<!-- Dashboard Content -->
<section class="dashboard-content">
    <div class="container">

        <!-- Action Bar -->
        <div class="action-bar">
            <h2>🎟️ My Listings</h2>
            <div class="action-buttons">
                <a href="list-ticket.php" class="btn btn-primary">+ List New Ticket</a>
                <a href="logout.php" class="btn btn-outline-dark">🚪 Logout</a>
            </div>
        </div>

        <!-- Tabs -->
        <div class="tabs-wrapper">
            <button class="dash-tab active" onclick="filterDash('all', this)">All (<?php echo $totalListings; ?>)</button>
            <button class="dash-tab" onclick="filterDash('travel', this)">✈️ Travel</button>
            <button class="dash-tab" onclick="filterDash('entertainment', this)">🎬 Entertainment</button>
        </div>

        <!-- Listings Grid -->
        <?php if (count($listings) > 0): ?>
        <div class="tickets-grid" id="dashGrid">
            <?php foreach ($listings as $listing): ?>
            <div class="ticket-card-dashboard <?php echo $listing['category']; ?>"
                 data-category="<?php echo $listing['category']; ?>">
                <div class="card-inner">
                    <div class="card-header">
                        <span class="ticket-type-pill <?php echo $listing['category']; ?>">
                            <?php echo htmlspecialchars($listing['type']); ?>
                        </span>
                        <span class="status-pill <?php echo $listing['status'] === 'available' ? 'status-active' : 'status-sold'; ?>">
                            <?php echo $listing['status'] === 'available' ? '🟢 Active' : '🔴 Sold'; ?>
                        </span>
                    </div>

                    <?php if ($listing['category'] === 'travel'): ?>
                    <div class="route-info">
                        <span class="route-city"><?php echo htmlspecialchars($listing['travel_from']); ?></span>
                        <div class="route-arrow"></div>
                        <span class="route-city"><?php echo htmlspecialchars($listing['travel_to']); ?></span>
                    </div>
                    <p style="font-size:0.85rem; color:#6b7280; margin-bottom:0.5rem;">
                        <?php echo htmlspecialchars($listing['title'] ?? ''); ?>
                    </p>
                    <?php else: ?>
                    <div class="event-title"><?php echo htmlspecialchars($listing['title'] ?? ''); ?></div>
                    <div class="event-venue">📍 <?php echo htmlspecialchars($listing['venue'] ?? ''); ?></div>
                    <?php endif; ?>

                    <div class="card-meta">
                        <span>📅 <?php echo date('M d, Y', strtotime($listing['travel_date'])); ?></span>
                        <span>👁 <?php echo $listing['views']; ?> views</span>
                    </div>

                    <div class="card-footer">
                        <div class="card-price">₹<?php echo number_format($listing['price']); ?></div>
                        <div class="card-actions">
                            <a href="ticket-detail.php?id=<?php echo $listing['id']; ?>" class="btn-view">View</a>
                            <?php if ($listing['status'] === 'available'): ?>
                            <a href="dashboard.php?delete=<?php echo $listing['id']; ?>"
                               class="btn-delete"
                               onclick="return confirm('Delete this listing?')">Delete</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <?php else: ?>
        <div class="empty-dashboard">
            <div class="empty-icon">🎫</div>
            <h3>No Listings Yet</h3>
            <p>Start selling your unused tickets and earn money instantly!</p>
            <a href="list-ticket.php" class="btn btn-primary">List Your First Ticket</a>
        </div>
        <?php endif; ?>

    </div>
</section>

<script>
function filterDash(category, btn) {
    // Update active tab
    document.querySelectorAll('.dash-tab').forEach(t => t.classList.remove('active'));
    btn.classList.add('active');

    // Filter cards
    document.querySelectorAll('.ticket-card-dashboard').forEach(card => {
        if (category === 'all' || card.dataset.category === category) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

<?php include '../includes/footer.php'; ?>