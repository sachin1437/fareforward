<?php
$pageTitle = "Ticket Detail — FareForward";
$rootPath = "../";
$cssPath = "../";
$jsPath = "../";
include '../includes/header.php';

// Dummy ticket data — will come from database in Part 2
$ticket = [
    "type" => "train",
    "from" => "Delhi",
    "to" => "Mumbai",
    "date" => "28 March 2026",
    "seat" => "B2 — 34 (Sleeper)",
    "price" => "850",
    "upi_id" => "rahul@upi",
    "listed_by" => "Rahul Sharma",
    "phone" => "9876543210",
    "status" => "available",
];

$icons = ["train" => "🚆", "flight" => "✈️", "bus" => "🚌"];
$icon = $icons[$ticket['type']];
?>

<!-- TICKET DETAIL -->
<div class="detail-container">
    <a href="../index.php" style="display:inline-flex; align-items:center; gap:0.5rem; color:var(--gray); margin-bottom:1.5rem; font-size:0.9rem;">
        ← Back to listings
    </a>

    <div class="detail-card">

        <!-- Card Header -->
        <div class="detail-header">
            <span class="ticket-type type-<?php echo $ticket['type']; ?>" style="margin-bottom:1rem; display:inline-block;">
                <?php echo $icon . ' ' . ucfirst($ticket['type']); ?>
            </span>

            <div class="detail-route">
                <div class="detail-city">
                    <div class="city-name"><?php echo $ticket['from']; ?></div>
                    <div class="city-label">Origin</div>
                </div>
                <div style="font-size:2rem;">✈</div>
                <div class="detail-city">
                    <div class="city-name"><?php echo $ticket['to']; ?></div>
                    <div class="city-label">Destination</div>
                </div>
            </div>
        </div>

        <!-- Card Body -->
        <div class="detail-body">

            <!-- Ticket Info Grid -->
            <div class="detail-info-grid">
                <div class="detail-info-item">
                    <label>📅 Travel Date</label>
                    <span><?php echo $ticket['date']; ?></span>
                </div>
                <div class="detail-info-item">
                    <label>💺 Seat Info</label>
                    <span><?php echo $ticket['seat']; ?></span>
                </div>
                <div class="detail-info-item">
                    <label>👤 Listed By</label>
                    <span><?php echo $ticket['listed_by']; ?></span>
                </div>
                <div class="detail-info-item">
                    <label>📞 Contact</label>
                    <span><?php echo $ticket['phone']; ?></span>
                </div>
                <div class="detail-info-item">
                    <label>🏷️ Status</label>
                    <span class="badge badge-<?php echo $ticket['status']; ?>">
                        <?php echo ucfirst($ticket['status']); ?>
                    </span>
                </div>
                <div class="detail-info-item">
                    <label>💰 Asking Price</label>
                    <span style="color:var(--primary); font-size:1.3rem;">
                        ₹<?php echo number_format($ticket['price']); ?>
                    </span>
                </div>
            </div>

            <!-- UPI Payment Section -->
            <?php if ($ticket['status'] == 'available') : ?>
            <div class="upi-section">
                <h3>💸 Pay via UPI</h3>
                <p style="color:var(--gray); font-size:0.9rem; margin:0.5rem 0;">
                    Send ₹<?php echo number_format($ticket['price']); ?> to this UPI ID:
                </p>
                <div class="upi-id"><?php echo $ticket['upi_id']; ?></div>
                <p style="color:var(--gray); font-size:0.8rem; margin-top:0.5rem;">
                    After payment, contact the seller to get your ticket transferred.
                </p>

                <div style="display:flex; gap:1rem; justify-content:center; margin-top:1.2rem; flex-wrap:wrap;">
                    <button class="btn btn-primary btn-lg" onclick="copyUPI('<?php echo $ticket['upi_id']; ?>')">
                        📋 Copy UPI ID
                    </button>
                    <a href="upi://pay?pa=<?php echo $ticket['upi_id']; ?>&pn=<?php echo urlencode($ticket['listed_by']); ?>&am=<?php echo $ticket['price']; ?>&cu=INR" 
                       class="btn btn-success btn-lg">
                        💸 Pay Now
                    </a>
                </div>
            </div>
            <?php else : ?>
            <div class="upi-section">
                <div style="font-size:3rem;">✅</div>
                <h3 style="margin-top:0.5rem;">This ticket has been sold</h3>
                <p style="color:var(--gray); font-size:0.9rem; margin-top:0.5rem;">
                    Check other available tickets.
                </p>
                <a href="../index.php" class="btn btn-primary" style="margin-top:1rem;">
                    Browse Other Tickets
                </a>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>