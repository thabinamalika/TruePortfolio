
const hamburger = document.querySelector('.hamburger');
const navLinks = document.querySelector('.nav-links');

hamburger.addEventListener('click', () => {
    navLinks.classList.toggle('active');
    hamburger.classList.toggle('open');
});


document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });

        navLinks.classList.remove('active');
        hamburger.classList.remove('open');
    });
});


const contactForm = document.getElementById('kontak-form');
const formMessage = document.getElementById('form-pesan');

contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const name = document.getElementById('nama').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('pesan').value;

    if (name && email && message) {
        formMessage.textContent = 'Pesan berhasil dikirim! Terima kasih!';
        formMessage.style.color = '#ff9cc7';
        contactForm.reset();
    } else {
        formMessage.textContent = 'Harap isi semua kolom!';
        formMessage.style.color = '#ff5555';
    }
});


const progressBars = document.querySelectorAll('.progress');
const skillsSection = document.getElementById('keterampilan');

const animateProgress = () => {
    if (skillsSection.getBoundingClientRect().top < window.innerHeight - 100) {
        progressBars.forEach(bar => {
            bar.style.width = bar.getAttribute('style').split(':')[1];
        });
        window.removeEventListener('scroll', animateProgress);
    }
};

window.addEventListener('scroll', animateProgress);


const certificateImages = document.querySelectorAll('.sertifikat-img');

certificateImages.forEach(img => {
    img.addEventListener('mouseenter', () => {
        img.style.transform = 'scale(1.05)';
        img.style.boxShadow = '0 8px 20px rgba(0, 0, 0, 0.15)';
    });
    img.addEventListener('mouseleave', () => {
        img.style.transform = 'scale(1)';
        img.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.1)';
    });
});

// Social icon hover effect
const socialIcons = document.querySelectorAll('.social-icon');

socialIcons.forEach(icon => {
    icon.addEventListener('mouseenter', () => {
        icon.style.transform = 'scale(1.2)';
        icon.style.color = '#ff80ab';
    });
    icon.addEventListener('mouseleave', () => {
        icon.style.transform = 'scale(1)';
        icon.style.color = '#ff9cc7';
    });
});
function editProject(id, title, description) {
    document.getElementById('project_id').value = id;
    document.getElementById('title').value = title;
    document.getElementById('description').value = description;
}