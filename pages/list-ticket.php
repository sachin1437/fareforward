<?php
$pageTitle = 'List Ticket - FareForward';
$rootPath = '../';

// Get today's date for min attribute
$today = date('Y-m-d');

include '../includes/header.php';
?>

<!-- Main Container with Background Image -->
<div style="background-image: url('https://images.unsplash.com/photo-1488085061387-422e29b40080?w=1920'); background-size: cover; background-position: center; background-attachment: fixed; min-height: 100vh;">
    <div style="background: rgba(0, 0, 0, 0.5); min-height: 100vh; padding-bottom: 3rem;">

<!-- Hero Section -->
<section style="position: relative; min-height: 300px; display: flex; align-items: center; justify-content: center;">
    <div style="position: relative; z-index: 1; text-align: center; padding: 4rem 1.5rem;">
        <span style="display: inline-block; padding: 0.375rem 1rem; background: rgba(255, 255, 255, 0.2); color: white; font-size: 0.875rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; border-radius: 9999px; margin-bottom: 1rem;">Sell Your Ticket</span>
        <h1 style="font-size: clamp(2rem, 5vw, 3rem); font-weight: 700; color: white; margin-bottom: 1rem;">List Your Ticket for Sale</h1>
        <p style="font-size: 1.25rem; color: rgba(255, 255, 255, 0.9); max-width: 600px; margin: 0 auto;">Fill in the details below to list your ticket in under 2 minutes</p>
    </div>
</section>

<!-- Form Section -->
<section class="section" style="padding-top: 0;">
    <div class="container">
        <!-- Step Indicator -->
        <div class="step-indicator" style="margin-bottom: 2rem;">
            <div class="step-dot active">
                <div class="step-number-indicator">1</div>
                <span class="step-label">Category</span>
            </div>
            <div class="step-dot">
                <div class="step-number-indicator">2</div>
                <span class="step-label">Type</span>
            </div>
            <div class="step-dot">
                <div class="step-number-indicator">3</div>
                <span class="step-label">Details</span>
            </div>
        </div>

        <!-- Multi-step Form -->
        <form class="multi-step-form" style="padding: 2rem; background: white; border-radius: var(--radius-xl); box-shadow: var(--shadow-lg);" data-validate>
            
            <!-- Step 1: Category Selection -->
            <div class="form-step" data-step="1">
                <h3 style="text-align: center; margin-bottom: 1.5rem;">Select Category</h3>
                <div class="category-selection">
                    <div class="category-card glass-card" data-category="travel">
                        <div class="category-card-icon">🚆</div>
                        <h4 class="category-card-title">Travel</h4>
                        <p class="category-card-description">Train, Flight, Bus, Ferry tickets</p>
                    </div>
                    <div class="category-card glass-card" data-category="entertainment">
                        <div class="category-card-icon">🎭</div>
                        <h4 class="category-card-title">Entertainment</h4>
                        <p class="category-card-description">Movies, Concerts, Sports, Events</p>
                    </div>
                </div>
                <div style="text-align: center; margin-top: 2rem;">
                    <button type="button" class="btn btn-primary btn-next">Continue</button>
                </div>
            </div>

            <!-- Step 2: Ticket Type Selection -->
            <div class="form-step" data-step="2" style="display: none;">
                <h3 style="text-align: center; margin-bottom: 1.5rem;">Select Ticket Type</h3>
                
                <!-- Travel Types -->
                <div class="ticket-types-section" data-category="travel" style="display: none;">
                    <div class="ticket-types-grid">
                        <div class="ticket-type-card" data-type="train">
                            <div class="ticket-type-card-icon">🚆</div>
                            <div class="ticket-type-card-label">Train</div>
                        </div>
                        <div class="ticket-type-card" data-type="flight">
                            <div class="ticket-type-card-icon">✈️</div>
                            <div class="ticket-type-card-label">Flight</div>
                        </div>
                        <div class="ticket-type-card" data-type="bus">
                            <div class="ticket-type-card-icon">🚌</div>
                            <div class="ticket-type-card-label">Bus</div>
                        </div>
                        <div class="ticket-type-card" data-type="ferry">
                            <div class="ticket-type-card-icon">⛴️</div>
                            <div class="ticket-type-card-label">Ferry</div>
                        </div>
                    </div>
                </div>
                
                <!-- Entertainment Types -->
                <div class="ticket-types-section" data-category="entertainment" style="display: none;">
                    <div class="ticket-types-grid">
                        <div class="ticket-type-card" data-type="movie">
                            <div class="ticket-type-card-icon">🎬</div>
                            <div class="ticket-type-card-label">Movie</div>
                        </div>
                        <div class="ticket-type-card" data-type="theatre">
                            <div class="ticket-type-card-icon">🎭</div>
                            <div class="ticket-type-card-label">Theatre/Play</div>
                        </div>
                        <div class="ticket-type-card" data-type="concert">
                            <div class="ticket-type-card-icon">🎵</div>
                            <div class="ticket-type-card-label">Concert</div>
                        </div>
                        <div class="ticket-type-card" data-type="cricket">
                            <div class="ticket-type-card-icon">🏏</div>
                            <div class="ticket-type-card-label">Cricket</div>
                        </div>
                        <div class="ticket-type-card" data-type="football">
                            <div class="ticket-type-card-icon">⚽</div>
                            <div class="ticket-type-card-label">Football</div>
                        </div>
                        <div class="ticket-type-card" data-type="comedy">
                            <div class="ticket-type-card-icon">🎪</div>
                            <div class="ticket-type-card-label">Comedy Show</div>
                        </div>
                        <div class="ticket-type-card" data-type="theme-park">
                            <div class="ticket-type-card-icon">🎡</div>
                            <div class="ticket-type-card-label">Theme Park</div>
                        </div>
                        <div class="ticket-type-card" data-type="gaming">
                            <div class="ticket-type-card-icon">🎮</div>
                            <div class="ticket-type-card-label">Gaming/Esports</div>
                        </div>
                    </div>
                </div>
                
                <div style="display: flex; justify-content: space-between; margin-top: 2rem;">
                    <button type="button" class="btn btn-outline-dark btn-prev">Back</button>
                    <button type="button" class="btn btn-primary btn-next">Continue</button>
                </div>
            </div>

            <!-- Step 3: Ticket Details -->
            <div class="form-step" data-step="3" style="display: none;">
                
                <!-- Info Box -->
                <div class="info-box">
                    <div class="info-box-title">💡 UPI Payment Info</div>
                    <div class="info-box-text">Buyers will pay directly to your UPI ID. Make sure to enter a valid UPI ID (Google Pay, PhonePe, Paytm, etc.)</div>
                </div>

                <!-- Hidden input to store selected category -->
                <input type="hidden" id="selected_category" name="selected_category" value="">

                <!-- All Ticket Fields -->
                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem;">
                    <!-- Row 1: Date and Time -->
                    <div class="form-group">
                        <label class="form-label" for="ticket_date" data-label-travel="Travel Date *" data-label-entertainment="Event Date *">Travel / Event Date *</label>
                        <input type="date" id="ticket_date" name="ticket_date" class="form-input" min="<?php echo date('Y-m-d'); ?>" placeholder="Select date" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="ticket_time" data-label-travel="Departure Time *" data-label-entertainment="Event Time *">Departure / Event Time *</label>
                        <input type="time" id="ticket_time" name="ticket_time" class="form-input" required>
                    </div>

                    <!-- Row 2: From City / Event Name -->
                    <div class="form-group">
                        <label class="form-label" for="from_city" data-label-travel="From City *" data-label-entertainment="Event Name *">From City / Event Name *</label>
                        <input type="text" id="from_city" name="from_city" class="form-input" data-placeholder-travel="e.g. Delhi" data-placeholder-entertainment="e.g. Coldplay Concert" placeholder="e.g. Delhi / Coldplay Concert" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="to_city" data-label-travel="To City *" data-label-entertainment="Venue *">To City / Venue *</label>
                        <input type="text" id="to_city" name="to_city" class="form-input" data-placeholder-travel="e.g. Mumbai" data-placeholder-entertainment="e.g. DY Patil Stadium" placeholder="e.g. Mumbai / DY Patil Stadium" required>
                    </div>

                    <!-- Row 3: Seat Info and Number -->
                    <div class="form-group">
                        <label class="form-label" for="seat_info" data-label-travel="Seat / Berth Info *" data-label-entertainment="Section / Row / Seat *">Seat / Section / Berth Info *</label>
                        <input type="text" id="seat_info" name="seat_info" class="form-input" data-placeholder-travel="e.g. B3-45 / 12A Window" data-placeholder-entertainment="e.g. Block A, Row 5, Seat 23" placeholder="e.g. B3-45 / Block A Row 5 / 12A Window" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="train_number" data-label-travel="Train / Flight / Bus Number" data-label-entertainment="Event Number / Code">Train / Flight / Bus / Event Number</label>
                        <input type="text" id="train_number" name="train_number" class="form-input" data-placeholder-travel="e.g. 12301 / 6E-234" data-placeholder-entertainment="e.g. IPL-2026 / CONCERT-001" placeholder="e.g. 12301 / 6E-234 / IPL-2026">
                    </div>

                    <!-- Row 4: Number of Tickets (entertainment only) and Price -->
                    <div class="form-group" id="num_tickets_group">
                        <label class="form-label" for="num_tickets">Number of Tickets *</label>
                        <input type="number" id="num_tickets" name="num_tickets" class="form-input" min="1" max="10" value="1" required>
                    </div>
                    <div class="form-group" id="price_group">
                        <label class="form-label" for="price">Price in ₹ *</label>
                        <input type="number" id="price" name="price" class="form-input" placeholder="Enter selling price" min="1" required>
                    </div>

                    <!-- Row 5: UPI ID (full width) -->
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="upi_id">Your UPI ID *</label>
                        <input type="text" id="upi_id" name="upi_id" class="form-input" placeholder="e.g. yourname@upi / 9876543210@paytm" required>
                    </div>

                    <!-- Row 6: Image Upload (full width) -->
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label">Upload Ticket Image</label>
                        <div class="image-upload">
                            <input type="file" name="ticket_image" accept="image/*" style="display: none;">
                            <div class="image-upload-icon">📷</div>
                            <div class="image-upload-text">Click or drag image here</div>
                            <div class="image-upload-hint">Supports JPG, PNG up to 5MB</div>
                        </div>
                    </div>

                    <!-- Row 7: Additional Info (full width) -->
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <label class="form-label" for="description">Additional Information</label>
                        <textarea id="description" name="description" class="form-textarea" placeholder="Any additional details about the ticket (optional)..." data-max-length="500"></textarea>
                    </div>
                </div>
                
                <!-- Buttons -->
                <div style="display: flex; justify-content: space-between; margin-top: 2rem;">
                    <button type="button" class="btn btn-outline-dark btn-prev">Back</button>
                    <button type="submit" class="btn btn-primary">List Ticket for Sale</button>
                </div>
            </div>
        </form>
    </div>
</section>

    </div>
</div>

<?php include '../includes/footer.php'; ?>
