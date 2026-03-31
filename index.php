<?php
$pageTitle = "FareForward — Don't Let Your Ticket Go to Waste";
$rootPath = "";
$cssPath = "";
$jsPath = "";
include 'includes/header.php';
?>

<!-- HERO -->
<section class="hero">
    <h1>🎫 Don't Let Your Ticket Go to Waste</h1>
    <p>Missed your train, flight, or bus? List it here and help someone else travel — while you recover your cost.</p>
    <div class="hero-btns">
        <a href="pages/list-ticket.php" class="btn btn-white btn-lg">List My Ticket</a>
        <a href="#listings" class="btn btn-outline btn-lg" style="border-color:white; color:white;">Browse Tickets</a>
    </div>
</section>

<!-- SEARCH -->
<div class="search-section">
    <div class="search-bar">
        <select id="filterType">
            <option value="">All Types</option>
            <option value="train">🚆 Train</option>
            <option value="flight">✈️ Flight</option>
            <option value="bus">🚌 Bus</option>
        </select>
        <input type="text" id="filterFrom" placeholder="From (e.g. Delhi)">
        <input type="text" id="filterTo" placeholder="To (e.g. Mumbai)">
        <button class="btn btn-primary" onclick="filterTickets()">Search</button>
    </div>
</div>

<!-- LISTINGS -->
<div class="section" id="listings">
    <h2 class="section-title">Available Tickets</h2>
    <p class="section-subtitle">Grab a last-minute seat at a great price</p>

    <div class="tickets-grid" id="ticketsGrid">

        <?php
        // Dummy ticket data — will come from database in Part 2
        $tickets = [
            ["type" => "train", "from" => "Delhi", "to" => "Mumbai", "date" => "28 March 2026", "seat" => "B2 — 34 (Sleeper)", "user" => "Rahul S.", "price" => "850"],
            ["type" => "flight", "from" => "Bangalore", "to" => "Hyderabad", "date" => "29 March 2026", "seat" => "14A (Window)", "user" => "Priya M.", "price" => "3,200"],
            ["type" => "bus", "from" => "Pune", "to" => "Goa", "date" => "30 March 2026", "seat" => "9 (AC Sleeper)", "user" => "Amit K.", "price" => "650"],
            ["type" => "train", "from" => "Chennai", "to" => "Kolkata", "date" => "1 April 2026", "seat" => "A1 — 12 (AC 2 Tier)", "user" => "Sneha R.", "price" => "1,450"],
            ["type" => "flight", "from" => "Delhi", "to" => "Goa", "date" => "2 April 2026", "seat" => "22C (Aisle)", "user" => "Vikram P.", "price" => "4,100"],
            ["type" => "bus", "from" => "Mumbai", "to" => "Ahmedabad", "date" => "3 April 2026", "seat" => "5 (Non-AC)", "user" => "Neha T.", "price" => "400"],
        ];

        $icons = ["train" => "🚆", "flight" => "✈️", "bus" => "🚌"];

        foreach ($tickets as $ticket) :
            $type = $ticket['type'];
            $icon = $icons[$type];
        ?>
        <div class="ticket-card" data-type="<?php echo $type; ?>" 
             data-from="<?php echo strtolower($ticket['from']); ?>" 
             data-to="<?php echo strtolower($ticket['to']); ?>">
            
            <span class="ticket-type type-<?php echo $type; ?>">
                <?php echo $icon . ' ' . ucfirst($type); ?>
            </span>

            <div class="ticket-route">
                <span class="city"><?php echo $ticket['from']; ?></span>
                <span class="arrow">→</span>
                <span class="city"><?php echo $ticket['to']; ?></span>
            </div>

            <div class="ticket-info">
                <span>📅 Date: <?php echo $ticket['date']; ?></span>
                <span>💺 Seat: <?php echo $ticket['seat']; ?></span>
                <span>👤 Listed by: <?php echo $ticket['user']; ?></span>
            </div>

            <div class="ticket-footer">
                <span class="ticket-price">₹<?php echo $ticket['price']; ?></span>
                <a href="pages/ticket-detail.php" class="btn btn-primary">View & Buy</a>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
</div>

<!-- HOW IT WORKS -->
<div style="background: white; padding: 3rem 2rem; text-align: center;">
    <h2 class="section-title" style="text-align:center;">How It Works</h2>
    <p class="section-subtitle" style="text-align:center;">Simple. Fast. Helpful.</p>
    <div style="display:flex; justify-content:center; gap:3rem; flex-wrap:wrap; margin-top:2rem;">
        <?php
        $steps = [
            ["icon" => "📋", "title" => "List Your Ticket", "desc" => "Missed your trip? Post your ticket in 2 minutes."],
            ["icon" => "🔍", "title" => "Buyer Finds It", "desc" => "Travellers browse and find your listed ticket."],
            ["icon" => "💸", "title" => "Pay via UPI", "desc" => "Instant payment directly to your UPI ID."],
        ];
        foreach ($steps as $step) :
        ?>
        <div style="max-width:200px;">
            <div style="font-size:3rem;"><?php echo $step['icon']; ?></div>
            <h3 style="margin:0.5rem 0;"><?php echo $step['title']; ?></h3>
            <p style="color:var(--gray); font-size:0.9rem;"><?php echo $step['desc']; ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>