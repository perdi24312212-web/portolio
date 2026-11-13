import './bootstrap';

// Dark mode
const root = document.documentElement;
const applyTheme = (dark) => {
    root.classList.toggle('dark', dark);
    try { localStorage.setItem('theme', dark ? 'dark' : 'light'); } catch (e) {}
};

document.querySelectorAll('[data-theme-toggle]').forEach((btn) => {
    btn.addEventListener('click', () => applyTheme(!root.classList.contains('dark')));
});

// Menu mobile
const menuBtn = document.getElementById('menu-btn');
const menu = document.getElementById('mobile-menu');
if (menuBtn && menu) {
    menuBtn.addEventListener('click', () => {
        const open = menu.classList.toggle('hidden') === false;
        menuBtn.setAttribute('aria-expanded', String(open));
    });
    menu.querySelectorAll('a').forEach((a) =>
        a.addEventListener('click', () => menu.classList.add('hidden'))
    );
}

// Animasi reveal saat scroll
const io = new IntersectionObserver(
    (entries) => entries.forEach((e) => {
        if (e.isIntersecting) {
            e.target.classList.add('is-visible');
            io.unobserve(e.target);
        }
    }),
    { threshold: 0.12 }
);
document.querySelectorAll('.reveal').forEach((el) => io.observe(el));

// Tandai menu aktif
const links = [...document.querySelectorAll('[data-nav]')];
const sections = links.map((l) => document.querySelector(l.getAttribute('href'))).filter(Boolean);
const spy = new IntersectionObserver(
    (entries) => entries.forEach((e) => {
        if (e.isIntersecting) {
            links.forEach((l) =>
                l.classList.toggle('text-brand-600', l.getAttribute('href') === '#' + e.target.id)
            );
        }
    }),
    { rootMargin: '-45% 0px -50% 0px' }
);
sections.forEach((s) => spy.observe(s));

// Filter proyek
document.querySelectorAll('[data-filter]').forEach((btn) => {
    btn.addEventListener('click', () => {
        const tag = btn.dataset.filter;
        document.querySelectorAll('[data-filter]').forEach((b) =>
            b.classList.toggle('bg-brand-600', b === btn)
        );
        document.querySelectorAll('[data-tags]').forEach((card) => {
            const tags = card.dataset.tags.split('|');
            card.classList.toggle('hidden', tag !== 'all' && !tags.includes(tag));
        });
    });
});
