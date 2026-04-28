<?php
$pageTitle = 'Contact Us - FareForward';
$rootPath = '../';
$bodyClass = 'page-with-hero';
include '../includes/header.php';
?>

<!-- Hero Section -->
<section class="hero" style="min-height: 50vh; background-image: url('https://images.unsplash.com/photo-1530521954074-e64f6810b32d?w=1920');">
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <div class="container" style="text-align: center;">
            <h1 class="hero-title">Get in Touch</h1>
            <p class="hero-subtitle" style="margin: 0 auto;">
                Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
            </p>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="section" style="background: var(--bg-white);">
    <div class="container">
        <!-- Contact Info Cards -->
        <div class="contact-info-grid" style="margin-top: -4rem; position: relative; z-index: 10;">
            <div class="contact-info-card glass-card">
                <div class="contact-info-icon">📧</div>
                <h4 class="contact-info-title">Email Us</h4>
                <p class="contact-info-text">support@fareforward.com</p>
            </div>
            <div class="contact-info-card glass-card">
                <div class="contact-info-icon">📞</div>
                <h4 class="contact-info-title">Call Us</h4>
                <p class="contact-info-text">+91 98765 43210</p>
            </div>
            <div class="contact-info-card glass-card">
                <div class="contact-info-icon">📍</div>
                <h4 class="contact-info-title">Visit Us</h4>
                <p class="contact-info-text">Mumbai, Maharashtra, India</p>
            </div>
        </div>

        <!-- Contact Form -->
        <div style="max-width: 800px; margin: 3rem auto 0;">
            <div class="section-header">
                <span class="section-label">Send Message</span>
                <h2 class="section-title gradient-text">Drop Us a Line</h2>
                <p class="section-subtitle">Fill out the form below and we'll get back to you within 24 hours</p>
            </div>

            <form class="contact-form glass-card" style="padding: 2rem;" data-validate>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
                    <div class="form-group">
                        <label class="form-label" for="name">Your Name *</label>
                        <input type="text" id="name" name="name" class="form-input" placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email Address *</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="Enter your email" required>
                    </div>
                </div>

                <div class="form-group" style="margin-top: 1.5rem;">
                    <label class="form-label" for="subject">Subject *</label>
                    <select id="subject" name="subject" class="form-select" required>
                        <option value="">Select a subject</option>
                        <option value="general">General Inquiry</option>
                        <option value="support">Customer Support</option>
                        <option value="ticket">Ticket Issue</option>
                        <option value="payment">Payment Problem</option>
                        <option value="partnership">Business Partnership</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group" style="margin-top: 1.5rem;">
                    <label class="form-label" for="message">Your Message *</label>
                    <textarea id="message" name="message" class="form-textarea" placeholder="Tell us how we can help you..." data-max-length="1000" required></textarea>
                </div>

                <div style="margin-top: 1.5rem;">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- FAQ CTA -->
<section class="section">
    <div class="container" style="text-align: center;">
        <h2 class="section-title" style="margin-bottom: 1rem;">Frequently Asked Questions</h2>
        <p class="section-subtitle" style="margin-bottom: 2rem;">Find quick answers to common questions</p>
        <a href="../index.php#faq" class="btn btn-outline-dark btn-lg">View FAQ</a>
    </div>
</section>

<?php include '../includes/footer.php'; ?>
