/**
 * FareForward - Ticket Resale Platform
 * Main JavaScript File
 */

document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initNavbar();
    initMobileMenu();
    initScrollAnimations();
    initCategoryTabs();
    initTicketFiltering();
    initFAQAccordion();
    initDateValidation();
    initFormValidation();
    initCharacterCounter();
    initImageUpload();
    initStarRating();
    initCopyToClipboard();
    initSmoothScroll();
    initMultiStepForm();
    initToastSystem();
});

window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (navbar) {
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    }
});

// ========================================
// Navbar Scroll Effect
// ========================================
function initNavbar() {
    const navbar = document.querySelector('.navbar');
    if (!navbar) return;

    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    });
}

// ========================================
// Mobile Menu Toggle
// ========================================
function initMobileMenu() {
    const menuBtn = document.querySelector('.mobile-menu-btn');
    const mobileMenu = document.querySelector('.mobile-menu');

    if (!menuBtn || !mobileMenu) return;

    menuBtn.addEventListener('click', function() {
        mobileMenu.classList.toggle('active');
        
        // Animate hamburger
        const spans = menuBtn.querySelectorAll('span');
        if (mobileMenu.classList.contains('active')) {
            spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
            spans[1].style.opacity = '0';
            spans[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
        } else {
            spans[0].style.transform = 'none';
            spans[1].style.opacity = '1';
            spans[2].style.transform = 'none';
        }
    });

    // Close menu when clicking a link
    const mobileLinks = mobileMenu.querySelectorAll('.nav-link');
    mobileLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            const spans = menuBtn.querySelectorAll('span');
            spans[0].style.transform = 'none';
            spans[1].style.opacity = '1';
            spans[2].style.transform = 'none';
        });
    });
}

// ========================================
// Scroll Animations (Intersection Observer)
// ========================================
function initScrollAnimations() {
    const animatedElements = document.querySelectorAll('.scroll-animate, .card, .step-card, .testimonial-card, .value-card, .team-card');
    
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('visible');
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
}

// ========================================
// Category Tabs (All/Travel/Entertainment)
// ========================================
function initCategoryTabs() {
    const tabContainer = document.querySelector('.category-tabs');
    if (!tabContainer) return;

    const tabs = tabContainer.querySelectorAll('.category-tab');
    const ticketCards = document.querySelectorAll('.ticket-card');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            // Update active tab
            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            const category = this.dataset.category;

            // Filter tickets
            ticketCards.forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'scale(1)';
                    }, 50);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'scale(0.9)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });

            // Update ticket type buttons
            updateTicketTypeButtons(category);
        });
    });
}

function updateTicketTypeButtons(category) {
    const typeButtonsContainer = document.querySelector('.ticket-types');
    const typeButtons = document.querySelectorAll('.ticket-type-btn');
    
    if (!typeButtonsContainer) return;
    
    // Hide container for "all", show for specific categories
    if (category === 'all') {
        typeButtonsContainer.style.display = 'none';
        // Clear active state from all buttons
        typeButtons.forEach(btn => btn.classList.remove('active'));
    } else {
        typeButtonsContainer.style.display = 'flex';
        typeButtonsContainer.style.flexWrap = 'wrap';
        typeButtonsContainer.style.justifyContent = 'center';
        typeButtonsContainer.style.gap = '0.75rem';
        
        // Show/hide individual buttons based on category
        typeButtons.forEach(btn => {
            if (btn.dataset.category === category) {
                btn.style.display = 'inline-flex';
            } else {
                btn.style.display = 'none';
            }
        });
    }
}

// ========================================
// Ticket Filtering
// ========================================
function initTicketFiltering() {
    const searchForm = document.querySelector('.search-form');
    if (!searchForm) return;

    const searchInputs = searchForm.querySelectorAll('input, select');
    const ticketCards = document.querySelectorAll('.ticket-card');

    searchInputs.forEach(input => {
        input.addEventListener('input', filterTickets);
        input.addEventListener('change', filterTickets);
    });

    // Ticket type buttons
    const typeButtons = document.querySelectorAll('.ticket-type-btn');
    typeButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            typeButtons.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            filterTickets();
        });
    });

    function filterTickets() {
        const searchInput = document.querySelector('.search-input');
        const locationInput = document.querySelector('.location-input');
        const toCityInput = document.querySelector('.to-city-input');
        const dateInput = document.querySelector('.date-input');
        const activeTypeBtn = document.querySelector('.ticket-type-btn.active');

        const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
        const locationTerm = locationInput ? locationInput.value.toLowerCase() : '';
        const toCityTerm = toCityInput ? toCityInput.value.toLowerCase() : '';
        const dateTerm = dateInput ? dateInput.value : '';
        const typeTerm = activeTypeBtn ? activeTypeBtn.dataset.type : '';

        ticketCards.forEach(card => {
            const title = card.querySelector('.ticket-title')?.textContent.toLowerCase() || '';
            const location = card.querySelector('.ticket-location')?.textContent.toLowerCase() || '';
            const routeText = card.textContent.toLowerCase();
            const date = card.dataset.date || '';
            const type = card.dataset.type || '';

            const matchesSearch = !searchTerm || title.includes(searchTerm) || routeText.includes(searchTerm);
            const matchesLocation = !locationTerm || location.includes(locationTerm) || routeText.includes(locationTerm);
            const matchesToCity = !toCityTerm || routeText.includes(toCityTerm);
            const matchesDate = !dateTerm || date === dateTerm;
            const matchesType = !typeTerm || type === typeTerm;

            if (matchesSearch && matchesLocation && matchesToCity && matchesDate && matchesType) {
                card.style.display = 'block';
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'scale(1)';
                }, 50);
            } else {
                card.style.opacity = '0';
                card.style.transform = 'scale(0.9)';
                setTimeout(() => {
                    card.style.display = 'none';
                }, 300);
            }
        });
    }
}

// ========================================
// FAQ Accordion
// ========================================
function initFAQAccordion() {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', function() {
            const isActive = item.classList.contains('active');
            
            // Close all items
            faqItems.forEach(i => i.classList.remove('active'));
            
            // Open clicked item if it wasn't active
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });
}

// ========================================
// Date Validation (No Past Dates)
// ========================================
function initDateValidation() {
    const dateInputs = document.querySelectorAll('input[type="date"]');
    
    const today = new Date().toISOString().split('T')[0];
    
    dateInputs.forEach(input => {
        input.setAttribute('min', today);
        
        input.addEventListener('change', function() {
            if (this.value < today) {
                this.value = today;
                showToast('Please select a future date', 'error');
            }
        });
    });
}

// ========================================
// Form Validation
// ========================================
function initFormValidation() {
    const forms = document.querySelectorAll('form[data-validate]');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            const requiredFields = form.querySelectorAll('[required]');

            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('error');
                    
                    // Add error message if not exists
                    let errorMsg = field.parentElement.querySelector('.error-message');
                    if (!errorMsg) {
                        errorMsg = document.createElement('div');
                        errorMsg.className = 'error-message';
                        field.parentElement.appendChild(errorMsg);
                    }
                    errorMsg.textContent = 'This field is required';
                } else {
                    field.classList.remove('error');
                    const errorMsg = field.parentElement.querySelector('.error-message');
                    if (errorMsg) errorMsg.remove();
                }
            });

            // Email validation
            const emailFields = form.querySelectorAll('input[type="email"]');
            emailFields.forEach(field => {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (field.value && !emailRegex.test(field.value)) {
                    isValid = false;
                    field.classList.add('error');
                    showToast('Please enter a valid email address', 'error');
                }
            });

            // Password confirmation
            const passwordField = form.querySelector('input[name="password"]');
            const confirmField = form.querySelector('input[name="confirm_password"]');
            if (passwordField && confirmField && confirmField.value) {
                if (passwordField.value !== confirmField.value) {
                    isValid = false;
                    confirmField.classList.add('error');
                    showToast('Passwords do not match', 'error');
                }
            }

            // Phone validation
            const phoneFields = form.querySelectorAll('input[type="tel"]');
            phoneFields.forEach(field => {
                const phoneRegex = /^[\d\s\-\+\(\)]{10,}$/;
                if (field.value && !phoneRegex.test(field.value)) {
                    isValid = false;
                    field.classList.add('error');
                    showToast('Please enter a valid phone number', 'error');
                }
            });

            if (!isValid) {
                e.preventDefault();
            }
        });

        // Remove error on input
        const inputs = form.querySelectorAll('input, textarea, select');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('error');
                const errorMsg = this.parentElement.querySelector('.error-message');
                if (errorMsg) errorMsg.remove();
            });
        });
    });
}

// ========================================
// Character Counter
// ========================================
function initCharacterCounter() {
    const textareas = document.querySelectorAll('textarea[data-max-length]');

    textareas.forEach(textarea => {
        const maxLength = parseInt(textarea.dataset.maxLength);
        const counter = document.createElement('div');
        counter.className = 'char-counter';
        textarea.parentElement.appendChild(counter);

        function updateCounter() {
            const current = textarea.value.length;
            const remaining = maxLength - current;
            counter.textContent = `${current}/${maxLength}`;

            counter.classList.remove('warning', 'danger');
            if (remaining < 20) {
                counter.classList.add('danger');
            } else if (remaining < 50) {
                counter.classList.add('warning');
            }
        }

        textarea.addEventListener('input', updateCounter);
        updateCounter();
    });
}

// ========================================
// Image Upload Preview
// ========================================
function initImageUpload() {
    const uploadAreas = document.querySelectorAll('.image-upload');

    uploadAreas.forEach(area => {
        const input = area.querySelector('input[type="file"]');
        const preview = area.querySelector('.image-preview');

        if (!input) return;

        // Click to upload
        area.addEventListener('click', () => input.click());

        // Drag and drop
        area.addEventListener('dragover', (e) => {
            e.preventDefault();
            area.style.borderColor = 'var(--primary-purple)';
            area.style.background = 'rgba(99, 102, 241, 0.05)';
        });

        area.addEventListener('dragleave', () => {
            area.style.borderColor = '#d1d5db';
            area.style.background = 'transparent';
        });

        area.addEventListener('drop', (e) => {
            e.preventDefault();
            area.style.borderColor = '#d1d5db';
            area.style.background = 'transparent';
            
            const files = e.dataTransfer.files;
            if (files.length) {
                input.files = files;
                handleFile(files[0], preview, area);
            }
        });

        input.addEventListener('change', function() {
            if (this.files.length) {
                handleFile(this.files[0], preview, area);
            }
        });
    });

    function handleFile(file, preview, area) {
        if (!file.type.startsWith('image/')) {
            showToast('Please upload an image file', 'error');
            return;
        }

        const reader = new FileReader();
        reader.onload = (e) => {
            if (preview) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            } else {
                const newPreview = document.createElement('img');
                newPreview.className = 'image-preview';
                newPreview.src = e.target.result;
                area.appendChild(newPreview);
            }
            
            // Hide upload text
            const uploadText = area.querySelector('.image-upload-text');
            const uploadHint = area.querySelector('.image-upload-hint');
            const uploadIcon = area.querySelector('.image-upload-icon');
            if (uploadText) uploadText.style.display = 'none';
            if (uploadHint) uploadHint.style.display = 'none';
            if (uploadIcon) uploadIcon.style.display = 'none';
        };
        reader.readAsDataURL(file);
    }
}

// ========================================
// Star Rating
// ========================================
function initStarRating() {
    const ratingContainers = document.querySelectorAll('.star-rating-input');

    ratingContainers.forEach(container => {
        const stars = container.querySelectorAll('.star');
        const input = container.querySelector('input[type="hidden"]');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                const rating = index + 1;
                if (input) input.value = rating;

                stars.forEach((s, i) => {
                    if (i < rating) {
                        s.classList.add('active');
                    } else {
                        s.classList.remove('active');
                    }
                });
            });

            star.addEventListener('mouseenter', () => {
                stars.forEach((s, i) => {
                    if (i <= index) {
                        s.style.color = 'var(--primary-amber)';
                    } else {
                        s.style.color = '#d1d5db';
                    }
                });
            });
        });

        container.addEventListener('mouseleave', () => {
            const currentRating = input ? parseInt(input.value) || 0 : 0;
            stars.forEach((s, i) => {
                if (i < currentRating) {
                    s.style.color = 'var(--primary-amber)';
                } else {
                    s.style.color = '#d1d5db';
                }
            });
        });
    });
}

// ========================================
// Copy to Clipboard
// ========================================
function initCopyToClipboard() {
    const copyButtons = document.querySelectorAll('[data-copy]');

    copyButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const textToCopy = this.dataset.copy;
            
            navigator.clipboard.writeText(textToCopy).then(() => {
                showToast('Copied to clipboard!', 'success');
                
                // Visual feedback
                const originalText = this.textContent;
                this.textContent = 'Copied!';
                setTimeout(() => {
                    this.textContent = originalText;
                }, 2000);
            }).catch(() => {
                showToast('Failed to copy', 'error');
            });
        });
    });
}

// ========================================
// Smooth Scroll
// ========================================
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                const navHeight = document.querySelector('.navbar')?.offsetHeight || 0;
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - navHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// ========================================
// Multi-Step Form (List Ticket)
// ========================================
function initMultiStepForm() {
    const form = document.querySelector('.multi-step-form');
    if (!form) return;

    const steps = form.querySelectorAll('.form-step');
    const stepIndicators = document.querySelectorAll('.step-dot');
    const nextBtns = form.querySelectorAll('.btn-next');
    const prevBtns = form.querySelectorAll('.btn-prev');
    const categoryCards = form.querySelectorAll('.category-card');
    const typeCards = form.querySelectorAll('.ticket-type-card');

    let currentStep = 0;

    // Category selection
    categoryCards.forEach(card => {
        card.addEventListener('click', function() {
            categoryCards.forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
            
            const category = this.dataset.category;
            
            // Show relevant ticket types
            document.querySelectorAll('.ticket-types-section').forEach(section => {
                section.style.display = section.dataset.category === category ? 'block' : 'none';
            });
        });
    });

    // Ticket type selection
    typeCards.forEach(card => {
        card.addEventListener('click', function() {
            typeCards.forEach(c => c.classList.remove('selected'));
            this.classList.add('selected');
        });
    });

    // Next button
    nextBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            if (validateStep(currentStep)) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });

    // Previous button
    prevBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            currentStep--;
            showStep(currentStep);
        });
    });

    function showStep(step) {
        steps.forEach((s, i) => {
            s.style.display = i === step ? 'block' : 'none';
        });

        stepIndicators.forEach((indicator, i) => {
            indicator.classList.remove('active', 'completed');
            if (i < step) {
                indicator.classList.add('completed');
            } else if (i === step) {
                indicator.classList.add('active');
            }
        });

        // If showing Step 3, update labels based on selected category
        if (step === 2) {
            updateStep3Labels();
        }

        // Scroll to top of form
        form.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }

    // Update Step 3 labels based on selected category
    function updateStep3Labels() {
        const selectedCategoryCard = form.querySelector('.category-card.selected');
        if (!selectedCategoryCard) return;

        const category = selectedCategoryCard.dataset.category;
        const hiddenInput = document.getElementById('selected_category');
        if (hiddenInput) {
            hiddenInput.value = category;
        }

        // Update labels
        document.querySelectorAll('[data-label-travel][data-label-entertainment]').forEach(label => {
            label.textContent = category === 'travel' ? label.dataset.labelTravel : label.dataset.labelEntertainment;
        });

        // Update placeholders
        document.querySelectorAll('[data-placeholder-travel][data-placeholder-entertainment]').forEach(input => {
            input.placeholder = category === 'travel' ? input.dataset.placeholderTravel : input.dataset.placeholderEntertainment;
        });

        // Show/hide Number of Tickets field
        const numTicketsGroup = document.getElementById('num_tickets_group');
        const priceGroup = document.getElementById('price_group');
        if (numTicketsGroup && priceGroup) {
            if (category === 'travel') {
                // Hide number of tickets for travel, make price full width
                numTicketsGroup.style.display = 'none';
                priceGroup.style.gridColumn = '1 / -1';
            } else {
                // Show number of tickets for entertainment
                numTicketsGroup.style.display = 'block';
                priceGroup.style.gridColumn = 'auto';
            }
        }
    }

    function validateStep(step) {
        const currentStepEl = steps[step];
        const requiredFields = currentStepEl.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                field.classList.add('error');
            } else {
                field.classList.remove('error');
            }
        });

        // Check category selection on step 0
        if (step === 0) {
            const selectedCategory = form.querySelector('.category-card.selected');
            if (!selectedCategory) {
                isValid = false;
                showToast('Please select a category', 'error');
            }
        }

        // Check ticket type selection on step 1
        if (step === 1) {
            const selectedType = form.querySelector('.ticket-type-card.selected');
            if (!selectedType) {
                isValid = false;
                showToast('Please select a ticket type', 'error');
            }
        }

        if (!isValid) {
            showToast('Please fill in all required fields', 'error');
        }

        return isValid;
    }

    // Initialize first step
    showStep(0);
}

// ========================================
// Toast Notification System
// ========================================
let toastContainer = null;

function initToastSystem() {
    toastContainer = document.createElement('div');
    toastContainer.className = 'toast-container';
    document.body.appendChild(toastContainer);
}

function showToast(message, type = 'info') {
    if (!toastContainer) initToastSystem();

    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    
    const icon = type === 'success' ? '✓' : type === 'error' ? '✕' : 'ℹ';
    toast.innerHTML = `<span>${icon}</span><span>${message}</span>`;
    
    toastContainer.appendChild(toast);

    // Remove after 3 seconds
    setTimeout(() => {
        toast.classList.add('hide');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// Make showToast globally available
window.showToast = showToast;

// ========================================
// Stats Counter Animation
// ========================================
function animateCounter(element, target, duration = 2000) {
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;

    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
        }
        element.textContent = Math.floor(current).toLocaleString();
    }, 16);
}

// Initialize counters when visible
const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const counters = entry.target.querySelectorAll('[data-counter]');
            counters.forEach(counter => {
                const target = parseInt(counter.dataset.counter);
                animateCounter(counter, target);
            });
            counterObserver.unobserve(entry.target);
        }
    });
}, { threshold: 0.5 });

document.querySelectorAll('.stats-section, .hero-stats').forEach(section => {
    counterObserver.observe(section);
});

// ========================================
// Dashboard Tabs
// ========================================
function initDashboardTabs() {
    const tabContainer = document.querySelector('.dashboard-tabs');
    if (!tabContainer) return;

    const tabs = tabContainer.querySelectorAll('.dashboard-tab');
    const panels = document.querySelectorAll('.dashboard-panel');

    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const targetPanel = this.dataset.panel;

            tabs.forEach(t => t.classList.remove('active'));
            this.classList.add('active');

            panels.forEach(panel => {
                panel.style.display = panel.dataset.panel === targetPanel ? 'block' : 'none';
            });
        });
    });
}

// Initialize dashboard tabs if on dashboard page
if (document.querySelector('.dashboard-tabs')) {
    initDashboardTabs();
}

// ========================================
// Utility Functions
// ========================================
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function throttle(func, limit) {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// ========================================
// Contact Form Handler
// ========================================
const contactForm = document.querySelector('.contact-form');
if (contactForm) {
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Simulate form submission
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Sending...';
        submitBtn.disabled = true;

        setTimeout(() => {
            showToast('Message sent successfully!', 'success');
            this.reset();
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }, 1500);
    });
}

// ========================================
// Contact Seller Form Handler
// ========================================
const contactSellerForm = document.querySelector('.contact-seller-form');
if (contactSellerForm) {
    contactSellerForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Sending...';
        submitBtn.disabled = true;

        setTimeout(() => {
            showToast('Message sent to seller!', 'success');
            this.reset();
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        }, 1500);
    });
}

// ========================================
// Review Form Handler
// ========================================
const reviewForm = document.querySelector('.review-form');
if (reviewForm) {
    reviewForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const rating = this.querySelector('input[name="rating"]')?.value;
        if (!rating || rating === '0') {
            showToast('Please select a rating', 'error');
            return;
        }

        showToast('Review submitted successfully!', 'success');
        this.reset();
        
        // Reset stars
        this.querySelectorAll('.star').forEach(s => s.classList.remove('active'));
    });
}
