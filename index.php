<?php
$pageTitle = 'FareForward - Buy & Sell Tickets';
$rootPath = './';
$bodyClass = 'page-with-hero';
// Get today's date for min attribute
$today = date('Y-m-d');

include 'includes/header.php';

// Dummy ticket data
$travelTickets = [
    [
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
        'image' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=400'
    ],
    [
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
        'image' => 'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=400'
    ],
    [
        'id' => 3,
        'type' => 'Bus',
        'icon' => '🚌',
        'category' => 'travel',
        'from' => 'Pune',
        'to' => 'Goa',
        'title' => 'Volvo AC Sleeper',
        'date' => '2026-04-18',
        'time' => '22:00',
        'seat' => 'Lower Berth 5',
        'price' => 1200,
        'image' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=400'
    ],
    [
        'id' => 4,
        'type' => 'Flight',
        'icon' => '✈️',
        'category' => 'travel',
        'from' => 'Mumbai',
        'to' => 'Dubai',
        'title' => 'Emirates EK-505',
        'date' => '2026-04-20',
        'time' => '20:30',
        'seat' => '24A (Economy)',
        'price' => 18500,
        'image' => 'https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=400'
    ],
    [
        'id' => 5,
        'type' => 'Train',
        'icon' => '🚆',
        'category' => 'travel',
        'from' => 'Chennai',
        'to' => 'Bangalore',
        'title' => 'Shatabdi Express',
        'date' => '2026-04-14',
        'time' => '06:00',
        'seat' => 'C2, 18 (CC)',
        'price' => 1450,
        'image' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=400'
    ],
    [
        'id' => 6,
        'type' => 'Ferry',
        'icon' => '⛴️',
        'category' => 'travel',
        'from' => 'Mumbai',
        'to' => 'Alibaug',
        'title' => 'M2M Ferry Service',
        'date' => '2026-04-16',
        'time' => '14:00',
        'seat' => 'Premium Lounge',
        'price' => 350,
        'image' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=400'
    ]
];

$entertainmentTickets = [
    [
        'id' => 7,
        'type' => 'Movie',
        'icon' => '🎬',
        'category' => 'entertainment',
        'event' => 'Avatar 3',
        'venue' => 'PVR Cinemas, Phoenix Mall',
        'date' => '2026-04-10',
        'time' => '19:30',
        'seat' => 'Row H, Seat 12-13',
        'price' => 800,
        'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=400'
    ],
    [
        'id' => 8,
        'type' => 'Concert',
        'icon' => '🎵',
        'category' => 'entertainment',
        'event' => 'Coldplay Live',
        'venue' => 'DY Patil Stadium, Mumbai',
        'date' => '2026-04-25',
        'time' => '18:00',
        'seat' => 'Gold Circle - 2 Tickets',
        'price' => 15000,
        'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=400'
    ],
    [
        'id' => 9,
        'type' => 'Cricket',
        'icon' => '🏏',
        'category' => 'entertainment',
        'event' => 'IPL 2026 Final',
        'venue' => 'Narendra Modi Stadium',
        'date' => '2026-05-01',
        'time' => '19:30',
        'seat' => 'Upper Tier, Block C',
        'price' => 4500,
        'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=400'
    ],
    [
        'id' => 10,
        'type' => 'Theatre',
        'icon' => '🎭',
        'category' => 'entertainment',
        'event' => 'Hamlet - Shakespeare',
        'venue' => 'Prithvi Theatre, Mumbai',
        'date' => '2026-04-22',
        'time' => '20:00',
        'seat' => 'Row B, Seat 8',
        'price' => 1200,
        'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=400'
    ],
    [
        'id' => 11,
        'type' => 'Football',
        'icon' => '⚽',
        'category' => 'entertainment',
        'event' => 'ISL 2026 Final',
        'venue' => 'Salt Lake Stadium, Kolkata',
        'date' => '2026-04-28',
        'time' => '19:00',
        'seat' => 'East Stand, Block D',
        'price' => 800,
        'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=400'
    ],
    [
        'id' => 12,
        'type' => 'Comedy',
        'icon' => '🎪',
        'category' => 'entertainment',
        'event' => 'Zakir Khan Live',
        'venue' => 'NCPA, Mumbai',
        'date' => '2026-04-19',
        'time' => '20:30',
        'seat' => 'Balcony, Row C',
        'price' => 1500,
        'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=400'
    ]
];

$allTickets = array_merge($travelTickets, $entertainmentTickets);
?>

<!-- Hero Section -->
<section class="hero" style="background-image: url('https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=1920');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="container">
            <div class="hero-badge animate-pulse">
                <span>🔥</span>
                <span>India's #1 Ticket Resale Platform</span>
            </div>
            <h1 class="hero-title">Don't Let Your Ticket Go to Waste</h1>
            <p class="hero-subtitle">
                Buy and sell travel & entertainment tickets instantly. 
                Secure UPI payments, verified sellers, zero hassle.
            </p>
            <div class="hero-buttons">
                <a href="pages/list-ticket.php" class="btn btn-primary btn-lg">Sell Your Ticket</a>
                <a href="#tickets" class="btn btn-outline btn-lg">Browse Tickets</a>
            </div>
            <div class="hero-stats">
                <div class="hero-stat">
                    <div class="hero-stat-value" data-counter="2400">0</div>
                    <div class="hero-stat-label">Tickets Sold</div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-value" data-counter="1800">0</div>
                    <div class="hero-stat-label">Happy Users</div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-value" data-counter="98">0</div>
                    <div class="hero-stat-label">% Success Rate</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tickets Section -->
<section class="section" id="tickets">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Browse Tickets</span>
            <h2 class="section-title gradient-text">Find Your Perfect Ticket</h2>
            <p class="section-subtitle">Browse from thousands of verified tickets at great prices</p>
        </div>

        <!-- Category Tabs -->
        <div class="category-tabs">
            <button class="category-tab active" data-category="all">All Tickets</button>
            <button class="category-tab" data-category="travel">🚆 Travel</button>
            <button class="category-tab" data-category="entertainment">🎭 Entertainment</button>
        </div>

        <!-- Ticket Type Buttons -->
        <div class="ticket-types" style="display: none;">
            <button class="ticket-type-btn" data-category="travel" data-type="train">🚆 Train</button>
            <button class="ticket-type-btn" data-category="travel" data-type="flight">✈️ Flight</button>
            <button class="ticket-type-btn" data-category="travel" data-type="bus">🚌 Bus</button>
            <button class="ticket-type-btn" data-category="travel" data-type="ferry">⛴️ Ferry</button>
            <button class="ticket-type-btn" data-category="entertainment" data-type="movie">🎬 Movie</button>
            <button class="ticket-type-btn" data-category="entertainment" data-type="concert">🎵 Concert</button>
            <button class="ticket-type-btn" data-category="entertainment" data-type="cricket">🏏 Cricket</button>
            <button class="ticket-type-btn" data-category="entertainment" data-type="theatre">🎭 Theatre</button>
        </div>

        <!-- Search Bar -->
        <div class="search-bar">
            <form class="search-form" onsubmit="return false;" style="display: flex; align-items: flex-end; gap: 1rem;">
                <div class="form-group" style="flex: 1; margin-bottom: 0;">
                    <input type="text" class="form-input search-input" placeholder="Search by ticket name or route..." style="height: 48px;">
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 0;">
                    <input type="text" class="form-input location-input" placeholder="From City / Venue" style="height: 48px;">
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 0;">
                    <input type="text" class="form-input to-city-input" placeholder="To City (for travel tickets)" style="height: 48px;">
                </div>
                <div class="form-group" style="flex: 1; margin-bottom: 0;">
                    <input type="date" class="form-input date-input" min="<?php echo $today; ?>" style="height: 48px;">
                </div>
                <button type="button" class="btn btn-primary" style="height: 48px; white-space: nowrap;">Search</button>
            </form>
        </div>

        <!-- Tickets Grid -->
        <div class="tickets-grid">
            <?php foreach ($allTickets as $ticket): ?>
            <div class="ticket-card <?php echo $ticket['category']; ?>" data-category="<?php echo $ticket['category']; ?>" data-type="<?php echo strtolower($ticket['type']); ?>" data-date="<?php echo $ticket['date']; ?>">
                <div style="padding: 1.5rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <span class="ticket-badge <?php echo $ticket['category']; ?>">
                            <span><?php echo $ticket['icon']; ?></span>
                            <span><?php echo $ticket['type']; ?></span>
                        </span>
                        <span class="badge badge-success">Available</span>
                    </div>
                    
                    <?php if ($ticket['category'] === 'travel'): ?>
                    <!-- Travel Route -->
                    <div class="route-display" style="margin-bottom: 1rem;">
                        <span style="font-size: 1.25rem; color: var(--primary-purple);"><?php echo $ticket['from']; ?></span>
                        <div class="route-line"></div>
                        <span style="font-size: 1.25rem; color: var(--primary-purple);"><?php echo $ticket['to']; ?></span>
                    </div>
                    <h3 class="ticket-title" style="font-size: 1.125rem; margin-bottom: 0.5rem;"><?php echo $ticket['title']; ?></h3>
                    <?php else: ?>
                    <!-- Entertainment -->
                    <h3 class="ticket-title" style="font-size: 1.25rem; margin-bottom: 0.5rem; color: var(--primary-amber);"><?php echo $ticket['event']; ?></h3>
                    <p class="ticket-location" style="color: var(--text-light); margin-bottom: 1rem;">📍 <?php echo $ticket['venue']; ?></p>
                    <?php endif; ?>
                    
                    <div style="display: flex; gap: 1rem; margin-bottom: 1rem; font-size: 0.875rem; color: var(--text-medium);">
                        <span>📅 <?php echo date('M d, Y', strtotime($ticket['date'])); ?></span>
                        <span>🕐 <?php echo $ticket['time']; ?></span>
                    </div>
                    
                    <div style="background: var(--bg-gray); padding: 0.75rem; border-radius: var(--radius-md); margin-bottom: 1rem;">
                        <span style="font-size: 0.875rem; color: var(--text-light);">Seat/Info:</span>
                        <span style="font-weight: 600; margin-left: 0.5rem;"><?php echo $ticket['seat']; ?></span>
                    </div>
                    
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <span style="font-size: 0.875rem; color: var(--text-light);">Price</span>
                            <div style="font-size: 1.5rem; font-weight: 700; color: var(--primary-purple);">₹<?php echo number_format($ticket['price']); ?></div>
                        </div>
                        <a href="pages/ticket-detail.php?id=<?php echo $ticket['id']; ?>" class="btn btn-primary">View & Buy</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <div class="section-header">
            <span class="section-label">How It Works</span>
            <h2 class="section-title gradient-text">Simple & Secure Process</h2>
            <p class="section-subtitle">Get started in minutes with our easy 4-step process</p>
        </div>
        
        <div class="steps-grid">
            <div class="step-card glass-card">
                <div class="step-number">1</div>
                <h3 class="step-title">List Your Ticket</h3>
                <p class="step-description">Upload your ticket details, set your price, and add your UPI ID for instant payments.</p>
            </div>
            <div class="step-card glass-card">
                <div class="step-number">2</div>
                <h3 class="step-title">Get Verified</h3>
                <p class="step-description">Our team verifies your ticket to ensure authenticity and protect buyers.</p>
            </div>
            <div class="step-card glass-card">
                <div class="step-number">3</div>
                <h3 class="step-title">Receive Offers</h3>
                <p class="step-description">Interested buyers contact you directly through our secure messaging system.</p>
            </div>
            <div class="step-card glass-card">
                <div class="step-number">4</div>
                <h3 class="step-title">Get Paid Instantly</h3>
                <p class="step-description">Buyer pays via UPI, you receive money instantly. No waiting, no hassle!</p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-item-value" data-counter="5000">0</div>
                <div class="stat-item-label">Tickets Listed</div>
            </div>
            <div class="stat-item">
                <div class="stat-item-value" data-counter="2400">0</div>
                <div class="stat-item-label">Successful Sales</div>
            </div>
            <div class="stat-item">
                <div class="stat-item-value" data-counter="1800">0</div>
                <div class="stat-item-label">Happy Customers</div>
            </div>
            <div class="stat-item">
                <div class="stat-item-value" data-counter="98">0</div>
                <div class="stat-item-label">% Satisfaction</div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <div class="section-header">
            <span class="section-label">Testimonials</span>
            <h2 class="section-title gradient-text">What Our Users Say</h2>
            <p class="section-subtitle">Join thousands of satisfied customers</p>
        </div>
        
        <div class="testimonials-grid">
            <div class="testimonial-card glass-card">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-text">"Sold my train ticket within 2 hours of listing! The UPI payment was instant and hassle-free. Highly recommend!"</p>
                <div class="testimonial-author">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop" alt="Rahul" class="testimonial-avatar">
                    <div>
                        <div class="testimonial-name">Rahul Sharma</div>
                        <div class="testimonial-role">Mumbai</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card glass-card">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-text">"Got IPL final tickets at face value when everywhere else was selling at 3x. FareForward is a lifesaver!"</p>
                <div class="testimonial-author">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&h=100&fit=crop" alt="Priya" class="testimonial-avatar">
                    <div>
                        <div class="testimonial-name">Priya Patel</div>
                        <div class="testimonial-role">Ahmedabad</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card glass-card">
                <div class="testimonial-stars">★★★★★</div>
                <p class="testimonial-text">"The verification process gives me confidence. Bought concert tickets and they were 100% genuine."</p>
                <div class="testimonial-author">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&h=100&fit=crop" alt="Arjun" class="testimonial-avatar">
                    <div>
                        <div class="testimonial-name">Arjun Kumar</div>
                        <div class="testimonial-role">Bangalore</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <span class="section-label">FAQ</span>
            <h2 class="section-title gradient-text">Frequently Asked Questions</h2>
            <p class="section-subtitle">Everything you need to know about FareForward</p>
        </div>
        
        <div class="faq-list">
            <div class="faq-item">
                <button class="faq-question">
                    <span>How does FareForward work?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        FareForward connects ticket sellers with buyers. Sellers list their unused tickets, set a price, and provide their UPI ID. Buyers browse listings, contact sellers, and pay directly via UPI. It's simple, fast, and secure!
                    </div>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>Is it safe to buy tickets on FareForward?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Yes! We verify all tickets before they go live. Our rating system helps you identify trusted sellers. Plus, UPI payments offer buyer protection. Always check seller ratings and reviews before purchasing.
                    </div>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>How do I get paid for my ticket?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        When listing your ticket, you provide your UPI ID (Google Pay, PhonePe, Paytm, etc.). When a buyer purchases your ticket, they pay directly to your UPI ID. The money is transferred instantly to your account!
                    </div>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>What types of tickets can I sell?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        You can sell travel tickets (train, flight, bus, ferry) and entertainment tickets (movies, concerts, sports, theatre, comedy shows, theme parks, and gaming events). All tickets must be for future dates.
                    </div>
                </div>
            </div>
            <div class="faq-item">
                <button class="faq-question">
                    <span>Are there any fees?</span>
                    <span class="faq-icon">+</span>
                </button>
                <div class="faq-answer">
                    <div class="faq-answer-content">
                        Listing tickets is completely free! We charge a small 5% service fee only when your ticket sells. This helps us maintain the platform and provide customer support. No hidden charges!
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Banner -->
<section class="cta-banner" style="background-image: url('https://images.unsplash.com/photo-1488085061387-422e29b40080?w=1920');">
    <div class="cta-overlay"></div>
    <div class="container">
        <div class="cta-content">
            <h2 class="cta-title">Ready to Sell Your Ticket?</h2>
            <p class="cta-subtitle">Join thousands of sellers who've recovered their costs. List your ticket in under 2 minutes!</p>
            <a href="pages/list-ticket.php" class="btn btn-white btn-lg">List Ticket Now</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>