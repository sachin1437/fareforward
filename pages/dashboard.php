<?php
$pageTitle = "Dashboard — FareForward";
$rootPath = "../";
$cssPath = "../";
$jsPath = "../";
include '../includes/header.php';

// Dummy user data — will come from session in Part 2
$user = [
    "name" => "Rahul Sharma",
    "email" => "rahul@email.com",
    "phone" => "9876543210",
];

// Dummy tickets — will come from database in Part 2
$myTickets = [
    ["id" => 1, "type" => "train", "from" => "Delhi", "to" => "Mumbai", "date" => "28 March 2026", "seat" => "B2-34 Sleeper", "price" => "850", "status" => "available"],
    ["id" => 2, "type" => "flight", "from" => "Bangalore", "to" => "Goa", "date" => "2 April 2026", "seat" => "14A Window", "price" => "3200", "status" => "sold"],
    ["id" => 3, "type" => "bus", "from" => "Pune", "to" => "Mumbai", "date" => "5 April 2026", "seat" => "9 AC Sleeper", "price" => "450", "status" => "available"],
];

$totalListings = count($myTickets);
$soldTickets = count(array_filter($myTickets, fn($t) => $t['status'] == 'sold'));
$activeListings = count(array_filter($myTickets, fn($t) => $t['status'] == 'available'));
$icons = ["train" => "🚆", "flight" => "✈️", "bus" => "🚌"];
?>

<div class="section">

    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <h2>👋 Welcome back, <?php echo htmlspecialchars($user['name']); ?>!</h2>
        <p style="opacity:0.85; margin-top:0.3rem;">Manage your listed tickets and track your sales</p>
    </div>

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number"><?php echo $totalListings; ?></div>
            <div class="stat-label">Total Listings</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?php echo $activeListings; ?></div>
            <div class="stat-label">Active Listings</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?php echo $soldTickets; ?></div>
            <div class="stat-label">Tickets Sold</div>
        </div>
    </div>

    <!-- My Listings -->
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1.5rem;">
        <h3 style="font-size:1.3rem;">🎫 My Listings</h3>
        <a href="list-ticket.php" class="btn btn-primary">+ List New Ticket</a>
    </div>

    <?php if (empty($myTickets)) : ?>
        <div style="text-align:center; padding:3rem; background:var(--white); border-radius:var(--radius); box-shadow:var(--shadow);">
            <div style="font-size:3rem;">🎫</div>
            <h3 style="margin:1rem 0 0.5rem;">No listings yet</h3>
            <p style="color:var(--gray);">You haven't listed any tickets yet.</p>
            <a href="list-ticket.php" class="btn btn-primary" style="margin-top:1rem;">List Your First Ticket</a>
        </div>
    <?php else : ?>
        <div class="tickets-grid">
            <?php foreach ($myTickets as $ticket) : 
                $type = $ticket['type'];
                $icon = $icons[$type];
            ?>
            <div class="ticket-card">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:0.8rem;">
                    <span class="ticket-type type-<?php echo $type; ?>">
                        <?php echo $icon . ' ' . ucfirst($type); ?>
                    </span>
                    <span class="badge badge-<?php echo $ticket['status']; ?>">
                        <?php echo ucfirst($ticket['status']); ?>
                    </span>
                </div>

                <div class="ticket-route">
                    <span class="city"><?php echo $ticket['from']; ?></span>
                    <span class="arrow">→</span>
                    <span class="city"><?php echo $ticket['to']; ?></span>
                </div>

                <div class="ticket-info">
                    <span>📅 <?php echo $ticket['date']; ?></span>
                    <span>💺 <?php echo $ticket['seat']; ?></span>
                </div>

                <div class="ticket-footer">
                    <span class="ticket-price">₹<?php echo number_format($ticket['price']); ?></span>
                    <?php if ($ticket['status'] == 'available') : ?>
                        <button class="btn btn-danger" onclick="deleteTicket(<?php echo $ticket['id']; ?>)">
                            🗑️ Remove
                        </button>
                    <?php else : ?>
                        <span class="badge badge-sold">✅ Sold</span>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<?php include '../includes/footer.php'; ?>