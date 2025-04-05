document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

const heroContent = document.querySelector('.hero-content');
const heroImage = document.querySelector('.hero-image');

window.addEventListener('scroll', () => {
    const scrollPosition = window.pageYOffset;
    if (heroContent) {
        heroContent.style.transform = `translateY(${scrollPosition * 0.5}px)`;
    }
    if (heroImage) {
        heroImage.style.transform = `translateY(${scrollPosition * 0.2}px)`;
    }
});

const sections = document.querySelectorAll('.section');
const animateOnScroll = () => {
    const triggerBottom = window.innerHeight / 5 * 4;
    sections.forEach(section => {
        const sectionTop = section.getBoundingClientRect().top;
        if (sectionTop < triggerBottom) {
            section.classList.add('animate');
        } else {
            section.classList.remove('animate');
        }
    });
};
window.addEventListener('scroll', animateOnScroll);

const menuToggle = document.createElement('div');
menuToggle.classList.add('menu-toggle');
menuToggle.innerHTML = '☰';
document.querySelector('.main-header .container').appendChild(menuToggle);

const nav = document.querySelector('.main-nav');

menuToggle.addEventListener('click', () => {
    nav.classList.toggle('show');
});

window.addEventListener('resize', () => {
    if (window.innerWidth > 768) {
        nav.classList.remove('show');
    }
});