<?php
$pageTitle = "List a Ticket — FareForward";
$rootPath = "../";
$cssPath = "../";
$jsPath = "../";
include '../includes/header.php';
?>

<!-- LIST TICKET SECTION -->
<div class="form-container" style="max-width: 650px;">
    <h2>📋 List Your Ticket</h2>
    <p>Fill in your ticket details and help another traveller</p>

    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <?php if (!empty($success)) : ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php endif; ?>

    <form action="list-ticket.php" method="POST">

        <!-- Ticket Type -->
        <div class="form-group">
            <label>Ticket Type</label>
            <select name="type">
                <option value="">-- Select Type --</option>
                <option value="train" <?php echo (isset($_POST['type']) && $_POST['type'] == 'train') ? 'selected' : ''; ?>>🚆 Train</option>
                <option value="flight" <?php echo (isset($_POST['type']) && $_POST['type'] == 'flight') ? 'selected' : ''; ?>>✈️ Flight</option>
                <option value="bus" <?php echo (isset($_POST['type']) && $_POST['type'] == 'bus') ? 'selected' : ''; ?>>🚌 Bus</option>
            </select>
        </div>

        <!-- From & To -->
        <div class="form-row">
            <div class="form-group">
                <label>From (City)</label>
                <input type="text" name="travel_from" placeholder="e.g. Delhi"
                       value="<?php echo isset($_POST['travel_from']) ? htmlspecialchars($_POST['travel_from']) : ''; ?>">
            </div>
            <div class="form-group">
                <label>To (City)</label>
                <input type="text" name="travel_to" placeholder="e.g. Mumbai"
                       value="<?php echo isset($_POST['travel_to']) ? htmlspecialchars($_POST['travel_to']) : ''; ?>">
            </div>
        </div>

        <!-- Date & Seat -->
        <div class="form-row">
            <div class="form-group">
                <label>Travel Date</label>
                <input type="date" name="travel_date"
                       value="<?php echo isset($_POST['travel_date']) ? htmlspecialchars($_POST['travel_date']) : ''; ?>">
            </div>
            <div class="form-group">
                <label>Seat Info</label>
                <input type="text" name="seat_info" placeholder="e.g. B2-34 Sleeper"
                       value="<?php echo isset($_POST['seat_info']) ? htmlspecialchars($_POST['seat_info']) : ''; ?>">
            </div>
        </div>

        <!-- Price & UPI -->
        <div class="form-row">
            <div class="form-group">
                <label>Asking Price (₹)</label>
                <input type="number" name="price" placeholder="e.g. 850" min="1"
                       value="<?php echo isset($_POST['price']) ? htmlspecialchars($_POST['price']) : ''; ?>">
            </div>
            <div class="form-group">
                <label>Your UPI ID</label>
                <input type="text" name="upi_id" placeholder="e.g. rahul@upi"
                       value="<?php echo isset($_POST['upi_id']) ? htmlspecialchars($_POST['upi_id']) : ''; ?>">
            </div>
        </div>

        <!-- UPI Note -->
        <div style="background: #eff6ff; border: 1px solid #bfdbfe; border-radius: var(--radius-sm); padding: 0.8rem 1rem; margin-bottom: 1.2rem; font-size: 0.85rem; color: #1d4ed8;">
            💡 Buyers will pay directly to your UPI ID. Make sure it's correct!
        </div>

        <button type="submit" class="btn btn-primary btn-block btn-lg">
            🎫 List My Ticket
        </button>

    </form>

    <div class="form-link">
        Changed your mind? <a href="../index.php">Back to Home</a>
    </div>
</div>

<?php include '../includes/footer.php'; ?>