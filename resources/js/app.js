const menuToggle = document.querySelector('[data-menu-toggle]');
const menu = document.querySelector('[data-menu]');
const header = document.querySelector('[data-header]');

if (menuToggle && menu) {
    menuToggle.addEventListener('click', () => {
        const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';

        menuToggle.setAttribute('aria-expanded', String(!isOpen));
        menuToggle.querySelector('.sr-only').textContent = isOpen ? 'Abrir menu' : 'Fechar menu';
        menu.classList.toggle('is-open', !isOpen);
    });

    menu.addEventListener('click', (event) => {
        if (!event.target.closest('a')) {
            return;
        }

        menuToggle.setAttribute('aria-expanded', 'false');
        menuToggle.querySelector('.sr-only').textContent = 'Abrir menu';
        menu.classList.remove('is-open');
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth <= 960) {
            return;
        }

        menuToggle.setAttribute('aria-expanded', 'false');
        menuToggle.querySelector('.sr-only').textContent = 'Abrir menu';
        menu.classList.remove('is-open');
    });
}

const updateHeader = () => {
    header?.classList.toggle('is-scrolled', window.scrollY > 16);
};

updateHeader();
window.addEventListener('scroll', updateHeader, { passive: true });
