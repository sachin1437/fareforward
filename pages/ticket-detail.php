<?php
$pageTitle = 'Ticket Details - FareForward';
$rootPath = '../';
$bodyClass = 'page-with-hero';
include '../includes/header.php';

// Get ticket ID from URL
$ticketId = isset($_GET['id']) ? intval($_GET['id']) : 1;

// Dummy ticket data
$tickets = [
    1 => [
        'id' => 1,
        'type' => 'Train',
        'icon' => '🚆',
        'category' => 'travel',
        'from' => 'Delhi',
        'to' => 'Mumbai',
        'title' => 'Rajdhani Express',
        'date' => '2026-04-15',
        'time' => '16:30',
        'seat' => 'B3, 45 (3A)',
        'price' => 2850,
        'seller' => 'Amit Kumar',
        'sellerPhone' => '+91 98765 43210',
        'sellerRating' => 4.8,
        'upiId' => 'amit.kumar@okaxis',
        'listedDate' => '2026-04-01',
        'description' => 'Premium 3AC ticket on Rajdhani Express. PNR confirmed, can share screenshot. Selling due to change in travel plans.'
    ],
    2 => [
        'id' => 2,
        'type' => 'Flight',
        'icon' => '✈️',
        'category' => 'travel',
        'from' => 'Bangalore',
        'to' => 'Delhi',
        'title' => 'IndiGo 6E-234',
        'date' => '2026-04-12',
        'time' => '09:15',
        'seat' => '12F (Economy)',
        'price' => 5200,
        'seller' => 'Priya Sharma',
        'sellerPhone' => '+91 87654 32109',
        'sellerRating' => 4.9,
        'upiId' => 'priya.sharma@paytm',
        'listedDate' => '2026-04-02',
        'description' => 'Window seat with extra legroom. Boarding pass can be transferred. Urgent sale!'
    ]
];

// Default to first ticket if ID not found
$ticket = $tickets[$ticketId] ?? $tickets[1];

// Dummy reviews
$reviews = [
    ['name' => 'Rahul M.', 'rating' => 5, 'date' => '2026-03-15', 'text' => 'Smooth transaction, genuine ticket. Highly recommended seller!'],
    ['name' => 'Sneha K.', 'rating' => 5, 'date' => '2026-03-10', 'text' => 'Quick response and easy payment process. Ticket was exactly as described.'],
    ['name' => 'Vikram P.', 'rating' => 4, 'date' => '2026-02-28', 'text' => 'Good experience overall. Would buy again.']
];
?>

<!-- Ticket Detail Header -->
<section class="ticket-detail-header">
    <div class="container">
        <?php if ($ticket['category'] === 'travel'): ?>
        <!-- Travel Route Display -->
        <div class="ticket-detail-route">
            <span><?php echo $ticket['from']; ?></span>
            <div class="ticket-detail-route-line"></div>
            <span><?php echo $ticket['to']; ?></span>
        </div>
        <p style="text-align: center; opacity: 0.9; font-size: 1.25rem;"><?php echo $ticket['title']; ?></p>
        <?php else: ?>
        <!-- Entertainment Display -->
        <h1 style="text-align: center; font-size: 2.5rem; margin-bottom: 0.5rem;"><?php echo $ticket['event']; ?></h1>
        <p style="text-align: center; opacity: 0.9; font-size: 1.25rem;">📍 <?php echo $ticket['venue']; ?></p>
        <?php endif; ?>
        
        <div class="ticket-detail-meta">
            <span><?php echo $ticket['icon']; ?> <?php echo $ticket['type']; ?></span>
            <span>📅 <?php echo date('l, M d, Y', strtotime($ticket['date'])); ?></span>
            <span>🕐 <?php echo $ticket['time']; ?></span>
            <span class="badge badge-success">Available</span>
        </div>
    </div>
</section>

<!-- Ticket Details Content -->
<section class="section">
    <div class="container">
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
            <!-- Left Column -->
            <div>
                <!-- Info Grid -->
                <div class="ticket-info-grid">
                    <div class="ticket-info-item">
                        <div class="ticket-info-label">Date</div>
                        <div class="ticket-info-value"><?php echo date('M d, Y', strtotime($ticket['date'])); ?></div>
                    </div>
                    <div class="ticket-info-item">
                        <div class="ticket-info-label">Time</div>
                        <div class="ticket-info-value"><?php echo $ticket['time']; ?></div>
                    </div>
                    <div class="ticket-info-item">
                        <div class="ticket-info-label">Seat/Info</div>
                        <div class="ticket-info-value"><?php echo $ticket['seat']; ?></div>
                    </div>
                    <div class="ticket-info-item">
                        <div class="ticket-info-label">Listed By</div>
                        <div class="ticket-info-value"><?php echo $ticket['seller']; ?></div>
                    </div>
                    <div class="ticket-info-item">
                        <div class="ticket-info-label">Seller Rating</div>
                        <div class="ticket-info-value" style="color: var(--primary-amber);">★ <?php echo $ticket['sellerRating']; ?></div>
                    </div>
                    <div class="ticket-info-item">
                        <div class="ticket-info-label">Listed On</div>
                        <div class="ticket-info-value"><?php echo date('M d, Y', strtotime($ticket['listedDate'])); ?></div>
                    </div>
                </div>

                <!-- Description -->
                <div class="glass-card" style="padding: 1.5rem; margin-bottom: 2rem;">
                    <h3 style="margin-bottom: 1rem;">Description</h3>
                    <p style="color: var(--text-medium);"><?php echo $ticket['description']; ?></p>
                </div>

                <!-- Reviews Section -->
                <div style="margin-bottom: 2rem;">
                    <h3 style="margin-bottom: 1.5rem;">Seller Reviews</h3>
                    
                    <?php foreach ($reviews as $review): ?>
                    <div class="review-card glass-card">
                        <div class="review-header">
                            <div class="review-author">
                                <div style="width: 40px; height: 40px; background: var(--gradient-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: white; font-weight: 600;">
                                    <?php echo substr($review['name'], 0, 1); ?>
                                </div>
                                <div>
                                    <div style="font-weight: 600;"><?php echo $review['name']; ?></div>
                                    <div class="star-rating" style="font-size: 0.875rem;">
                                        <?php for ($i = 0; $i < 5; $i++): ?>
                                        <span style="color: <?php echo $i < $review['rating'] ? 'var(--primary-amber)' : '#d1d5db'; ?>">★</span>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                            </div>
                            <span class="review-date"><?php echo $review['date']; ?></span>
                        </div>
                        <p class="review-text"><?php echo $review['text']; ?></p>
                    </div>
                    <?php endforeach; ?>

                    <!-- Add Review Form -->
                    <div class="glass-card" style="padding: 1.5rem;">
                        <h4 style="margin-bottom: 1rem;">Add a Review</h4>
                        <form class="review-form">
                            <div class="star-rating-input" style="margin-bottom: 1rem;">
                                <input type="hidden" name="rating" value="0">
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                                <span class="star">★</span>
                            </div>
                            <div class="form-group">
                                <textarea class="form-textarea" placeholder="Share your experience with this seller..." data-max-length="300"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Review</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column - Payment & Contact -->
            <div>
                <!-- Price Card -->
                <div class="glass-card" style="padding: 1.5rem; margin-bottom: 1.5rem; text-align: center;">
                    <div style="font-size: 0.875rem; color: var(--text-light); margin-bottom: 0.5rem;">Price</div>
                    <div style="font-size: 2.5rem; font-weight: 700; color: var(--primary-purple);">₹<?php echo number_format($ticket['price']); ?></div>
                </div>

                <!-- UPI Payment Section -->
                <div class="upi-section" style="margin-bottom: 1.5rem;">
                    <h4 style="margin-bottom: 1rem;">Pay via UPI</h4>
                    <p style="font-size: 0.875rem; color: var(--text-medium); margin-bottom: 1rem;">Scan QR or use UPI ID to pay</p>
                    
                    <div class="upi-id"><?php echo $ticket['upiId']; ?></div>
                    
                    <button class="btn btn-outline-dark" style="width: 100%; margin-bottom: 0.75rem;" data-copy="<?php echo $ticket['upiId']; ?>">
                        📋 Copy UPI ID
                    </button>
                    <a href="upi://pay?pa=<?php echo $ticket['upiId']; ?>&pn=<?php echo urlencode($ticket['seller']); ?>&am=<?php echo $ticket['price']; ?>&cu=INR" class="btn btn-primary" style="width: 100%;">
                        📱 Pay Now
                    </a>
                </div>

                <!-- Contact Seller -->
                <div class="glass-card" style="padding: 1.5rem;">
                    <h4 style="margin-bottom: 1rem;">Contact Seller</h4>
                    <form class="contact-seller-form">
                        <div class="form-group">
                            <input type="text" class="form-input" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-input" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-textarea" placeholder="Your message to the seller..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-secondary" style="width: 100%;">Send Message</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Related Tickets -->
        <div style="margin-top: 3rem;">
            <h3 style="margin-bottom: 1.5rem;">Similar Tickets</h3>
            <div class="tickets-grid" style="grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));">
                <?php for ($i = 1; $i <= 3; $i++): ?>
                <div class="ticket-card travel">
                    <div style="padding: 1.5rem;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                            <span class="ticket-badge travel">🚆 Train</span>
                            <span class="badge badge-success">Available</span>
                        </div>
                        <div class="route-display" style="margin-bottom: 0.75rem;">
                            <span style="font-size: 1.125rem; color: var(--primary-purple);">Mumbai</span>
                            <div class="route-line" style="flex: 0 0 40px;"></div>
                            <span style="font-size: 1.125rem; color: var(--primary-purple);">Goa</span>
                        </div>
                        <h3 style="font-size: 1rem; margin-bottom: 0.5rem;">Konkan Kanya Express</h3>
                        <div style="display: flex; gap: 1rem; margin-bottom: 1rem; font-size: 0.875rem; color: var(--text-medium);">
                            <span>📅 Apr 18, 2026</span>
                            <span>🕐 21:30</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div style="font-size: 1.25rem; font-weight: 700; color: var(--primary-purple);">₹1,850</div>
                            <a href="ticket-detail.php?id=<?php echo $i + 10; ?>" class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
