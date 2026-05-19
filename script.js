// ===== CONFIGURATION EMAILJS =====
// Instructions : 
// 1. Allez sur https://www.emailjs.com/ et créez un compte
// 2. Créez un service email (Gmail recommandé)
// 3. Créez un template d'email
// 4. Remplacez les valeurs ci-dessous par vos identifiants

const EMAILJS_CONFIG = {
    serviceID: 'VOTRE_SERVICE_ID', // Ex: 'service_abc123'
    templateID: 'VOTRE_TEMPLATE_ID', // Ex: 'template_xyz789'
    publicKey: 'VOTRE_PUBLIC_KEY' // Ex: 'user_abcdefghijk'
};

function isEmailJsConfigured() {
    const { serviceID, templateID, publicKey } = EMAILJS_CONFIG;
    const looksPlaceholder = String(serviceID).includes('VOTRE_') || String(templateID).includes('VOTRE_') || String(publicKey).includes('VOTRE_');
    return !looksPlaceholder && Boolean(serviceID) && Boolean(templateID) && Boolean(publicKey);
}

function buildMailto({ to, name, email, subject, message }) {
    const finalSubject = subject ? subject : 'Demande via le formulaire de contact';
    const body =
        `Nom : ${name}\n` +
        `Email : ${email}\n\n` +
        `${message}\n`;

    return `mailto:${encodeURIComponent(to)}?subject=${encodeURIComponent(finalSubject)}&body=${encodeURIComponent(body)}`;
}

// ===== INITIALISATION =====
document.addEventListener('DOMContentLoaded', function() {
    initThemeToggle();
    initScrollAnimations();
    initSmoothScroll();
    initFormValidation();
    initScrollToTop();
    initMobileMenu();
    initSkillBarsAnimation();
});

// ===== MODE SOMBRE / CLAIR =====
function initThemeToggle() {
    const themeSwitch = document.getElementById('theme-switch');
    
    if (!themeSwitch) return;

    // Récupérer le thème sauvegardé
    const savedTheme = localStorage.getItem('theme') || 'dark';
    document.documentElement.setAttribute('data-theme', savedTheme);
    themeSwitch.checked = savedTheme === 'light';

    // Écouter les changements
    themeSwitch.addEventListener('change', function() {
        const newTheme = this.checked ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        
        // Animation de transition
        document.body.style.transition = 'background 0.3s ease, color 0.3s ease';
    });
}

// ===== ANIMATIONS AU SCROLL =====
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observer tous les éléments à animer
    const animatedElements = document.querySelectorAll(
        '.project-card, .about-card, .featured-card, .skill-quick, .timeline-item, .veille-card'
    );
    
    animatedElements.forEach(el => {
        el.classList.add('animate-on-scroll');
        observer.observe(el);
    });
}

// ===== SCROLL FLUIDE =====
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            e.preventDefault();
            const target = document.querySelector(href);
            
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}

// ===== FORMULAIRE DE CONTACT =====
function initFormValidation() {
    const form = document.querySelector('.contact-form');
    
    if (!form) return;

    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const submitBtn = form.querySelector('button[type="submit"]');
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const messageInput = document.getElementById('message');

        // Validation basique
        if (!nameInput.value.trim() || !emailInput.value.trim() || !messageInput.value.trim()) {
            showNotification('Veuillez remplir tous les champs', 'error');
            return;
        }

        // Validation email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value)) {
            showNotification('Veuillez entrer une adresse email valide', 'error');
            return;
        }

        // Désactiver le bouton pendant l'envoi
        submitBtn.disabled = true;
        submitBtn.textContent = 'Envoi en cours...';

        try {
            const toEmail = 'ethan.labat33@gmail.com';

            // Si EmailJS n'est pas configuré, on bascule sur un mailto (le formulaire "fonctionne" quand même)
            if (!isEmailJsConfigured()) {
                const subjectValue = form.querySelector('#subject')?.value || 'autre';
                const mailto = buildMailto({
                    to: toEmail,
                    name: nameInput.value.trim(),
                    email: emailInput.value.trim(),
                    subject: `Contact (${subjectValue})`,
                    message: messageInput.value.trim()
                });

                showNotification('EmailJS non configuré : ouverture de votre client mail...', 'success');
                window.location.href = mailto;
                form.reset();
                return;
            }

            // Envoi avec EmailJS
            await emailjs.send(
                EMAILJS_CONFIG.serviceID,
                EMAILJS_CONFIG.templateID,
                {
                    from_name: nameInput.value,
                    from_email: emailInput.value,
                    message: messageInput.value,
                    to_email: toEmail
                },
                EMAILJS_CONFIG.publicKey
            );

            showNotification('Message envoyé avec succès ! Je vous répondrai rapidement.', 'success');
            form.reset();

        } catch (error) {
            console.error('Erreur EmailJS:', error);
            showNotification('Erreur lors de l\'envoi. Veuillez réessayer ou me contacter directement.', 'error');
        } finally {
            submitBtn.disabled = false;
            submitBtn.textContent = 'Envoyer';
        }
    });

    // Validation en temps réel
    form.querySelectorAll('input, textarea').forEach(input => {
        input.addEventListener('blur', function() {
            validateField(this);
        });
    });
}

function validateField(field) {
    const value = field.value.trim();
    
    if (!value) {
        field.style.borderColor = '#ef4444';
        return false;
    }
    
    if (field.type === 'email') {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            field.style.borderColor = '#ef4444';
            return false;
        }
    }
    
    field.style.borderColor = '#10b981';
    return true;
}

function showNotification(message, type) {
    // Supprimer l'ancienne notification si elle existe
    const oldNotif = document.querySelector('.notification');
    if (oldNotif) oldNotif.remove();

    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.textContent = message;
    
    document.body.appendChild(notification);

    // Animation d'entrée
    setTimeout(() => notification.classList.add('show'), 10);

    // Retrait automatique après 5 secondes
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 5000);
}

// ===== BOUTON SCROLL TO TOP =====
function initScrollToTop() {
    const scrollBtn = document.createElement('button');
    scrollBtn.className = 'scroll-to-top';
    scrollBtn.innerHTML = '↑';
    scrollBtn.setAttribute('aria-label', 'Retour en haut');
    document.body.appendChild(scrollBtn);

    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) {
            scrollBtn.classList.add('visible');
        } else {
            scrollBtn.classList.remove('visible');
        }
    });

    scrollBtn.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// ===== MENU MOBILE =====
function initMobileMenu() {
    const nav = document.querySelector('.navbar');
    
    // Créer le bouton burger s'il n'existe pas
    if (!document.querySelector('.burger-menu')) {
        const burger = document.createElement('button');
        burger.className = 'burger-menu';
        burger.innerHTML = '<span></span><span></span><span></span>';
        burger.setAttribute('aria-label', 'Menu');
        
        const navContainer = document.querySelector('.nav-container');
        navContainer.appendChild(burger);

        burger.addEventListener('click', function() {
            const navMenu = document.querySelector('.nav-menu');
            navMenu.classList.toggle('active');
            this.classList.toggle('active');
        });

        // Fermer le menu au clic sur un lien
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelector('.nav-menu').classList.remove('active');
                document.querySelector('.burger-menu').classList.remove('active');
            });
        });
    }
}

// ===== ANIMATION DES BARRES DE COMPÉTENCES =====
function initSkillBarsAnimation() {
    const skillBars = document.querySelectorAll('.skill-level');
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const width = entry.target.style.width;
                entry.target.style.width = '0%';
                setTimeout(() => {
                    entry.target.style.width = width;
                }, 100);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    skillBars.forEach(bar => observer.observe(bar));
}

// ===== COMPTEUR ANIMÉ (optionnel) =====
function animateCounter(element, target, duration = 2000) {
    let current = 0;
    const increment = target / (duration / 16);
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target;
            clearInterval(timer);
        } else {
            element.textContent = Math.floor(current);
        }
    }, 16);
}

// ===== LIGHTBOX POUR LES IMAGES =====
function createLightbox() {
    const lightbox = document.createElement('div');
    lightbox.className = 'lightbox';
    lightbox.innerHTML = `
        <button class="lightbox-close">&times;</button>
        <button class="lightbox-prev">‹</button>
        <button class="lightbox-next">›</button>
        <img src="" alt="">
    `;
    document.body.appendChild(lightbox);

    let currentImages = [];
    let currentIndex = 0;

    // Activer la lightbox sur les images de projets
    document.querySelectorAll('.project-image img').forEach((img, index) => {
        img.style.cursor = 'pointer';
        img.addEventListener('click', function() {
            currentImages = Array.from(document.querySelectorAll('.project-image img'));
            currentIndex = index;
            openLightbox(this.src);
        });
    });

    function openLightbox(src) {
        lightbox.querySelector('img').src = src;
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
    }

    lightbox.querySelector('.lightbox-close').addEventListener('click', closeLightbox);
    
    lightbox.addEventListener('click', function(e) {
        if (e.target === lightbox) closeLightbox();
    });

    lightbox.querySelector('.lightbox-prev').addEventListener('click', function() {
        currentIndex = (currentIndex - 1 + currentImages.length) % currentImages.length;
        lightbox.querySelector('img').src = currentImages[currentIndex].src;
    });

    lightbox.querySelector('.lightbox-next').addEventListener('click', function() {
        currentIndex = (currentIndex + 1) % currentImages.length;
        lightbox.querySelector('img').src = currentImages[currentIndex].src;
    });

    // Fermer avec Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && lightbox.classList.contains('active')) {
            closeLightbox();
        }
    });
}

// Initialiser la lightbox après le chargement
if (document.querySelectorAll('.project-image img').length > 0) {
    createLightbox();
}
