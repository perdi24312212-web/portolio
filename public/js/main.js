document.addEventListener('DOMContentLoaded', () => {
    const root = document.documentElement;
    const applyTheme = (dark) => {
        root.classList.toggle('dark', dark);
        try {
            localStorage.setItem('theme', dark ? 'dark' : 'light');
        } catch (error) {
            // Theme changes still work when browser storage is unavailable.
        }
    };

    document.querySelectorAll('[data-theme-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            applyTheme(!root.classList.contains('dark'));
        });
    });

    const menuButton = document.getElementById('menu-btn');
    const menu = document.getElementById('mobile-menu');
    const openIcon = document.getElementById('menu-icon-open');
    const closeIcon = document.getElementById('menu-icon-close');
    const closeMenu = () => {
        if (!menuButton || !menu) return;
        menu.classList.add('hidden');
        menuButton.setAttribute('aria-expanded', 'false');
        openIcon?.classList.remove('hidden');
        closeIcon?.classList.add('hidden');
    };

    if (menuButton && menu) {
        menuButton.addEventListener('click', () => {
            const isOpen = menu.classList.toggle('hidden') === false;
            menuButton.setAttribute('aria-expanded', String(isOpen));
            openIcon?.classList.toggle('hidden', isOpen);
            closeIcon?.classList.toggle('hidden', !isOpen);
        });

        menu.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', closeMenu);
        });
    }

    if ('IntersectionObserver' in window) {
        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal').forEach((element) => revealObserver.observe(element));

        const navLinks = [...document.querySelectorAll('[data-nav]')];
        const sections = navLinks
            .map((link) => document.querySelector(link.getAttribute('href')))
            .filter(Boolean);

        const navObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                navLinks.forEach((link) => {
                    const active = link.getAttribute('href') === `#${entry.target.id}`;
                    link.classList.toggle('text-brand-600', active);
                    link.classList.toggle('dark:text-brand-400', active);
                    link.classList.toggle('bg-white', active);
                    link.classList.toggle('dark:bg-slate-800', active);
                    link.classList.toggle('shadow-sm', active);
                });
            });
        }, { rootMargin: '-40% 0px -50% 0px' });

        sections.forEach((section) => navObserver.observe(section));
    } else {
        document.querySelectorAll('.reveal').forEach((element) => element.classList.add('is-visible'));
    }

    const topButton = document.getElementById('scroll-to-top');
    if (topButton) {
        window.addEventListener('scroll', () => {
            const visible = window.scrollY > 350;
            topButton.classList.toggle('hidden', !visible);
            topButton.classList.toggle('flex', visible);
        });

        topButton.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    const toastContainer = document.getElementById('toast-container');
    const showToast = (message) => {
        if (!toastContainer) return;
        const toast = document.createElement('div');
        toast.className = 'toast';
        toast.textContent = message;
        toastContainer.appendChild(toast);

        window.setTimeout(() => {
            toast.style.animation = 'toastOut 0.35s ease forwards';
            window.setTimeout(() => toast.remove(), 350);
        }, 3200);
    };

    document.querySelectorAll('[data-copy]').forEach((button) => {
        button.addEventListener('click', async (event) => {
            event.preventDefault();
            const text = button.dataset.copy;
            if (!text) return;

            try {
                await navigator.clipboard.writeText(text);
                showToast('Berhasil disalin ke clipboard.');
            } catch (error) {
                const textArea = document.createElement('textarea');
                textArea.value = text;
                textArea.setAttribute('readonly', '');
                textArea.style.position = 'absolute';
                textArea.style.left = '-9999px';
                document.body.appendChild(textArea);
                textArea.select();
                const copied = document.execCommand('copy');
                textArea.remove();
                showToast(copied ? 'Berhasil disalin ke clipboard.' : 'Tidak dapat menyalin teks.');
            }
        });
    });

    const filterButtons = document.querySelectorAll('[data-filter]');
    const projectCards = document.querySelectorAll('[data-tags]');

    filterButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const filter = button.dataset.filter;

            filterButtons.forEach((item) => {
                const active = item === button;
                item.classList.toggle('active', active);
                item.classList.toggle('bg-brand-600', active);
                item.classList.toggle('text-white', active);
                item.classList.toggle('shadow-md', active);
                item.classList.toggle('shadow-brand-500/25', active);
                item.classList.toggle('border-slate-300', !active);
                item.classList.toggle('bg-white', !active);
                item.classList.toggle('text-slate-700', !active);
                item.classList.toggle('dark:border-slate-800', !active);
                item.classList.toggle('dark:bg-slate-900', !active);
                item.classList.toggle('dark:text-slate-300', !active);
            });

            projectCards.forEach((card) => {
                const tags = (card.dataset.tags || '').split('|');
                card.classList.toggle('hidden', filter !== 'all' && !tags.includes(filter));
            });
        });
    });

    const quickMessageButton = document.getElementById('send-wa-quick');
    if (quickMessageButton) {
        quickMessageButton.addEventListener('click', () => {
            const name = document.getElementById('name')?.value.trim() || '';
            const email = document.getElementById('email')?.value.trim() || '';
            const subject = document.getElementById('subject')?.value.trim() || '';
            const message = document.getElementById('message')?.value.trim() || '';
            const ownerName = quickMessageButton.dataset.ownerName || 'Halo';
            const number = quickMessageButton.dataset.whatsapp;

            if (!number) {
                showToast('Nomor WhatsApp belum dikonfigurasi.');
                return;
            }

            const lines = [`Halo ${ownerName}, saya ingin menghubungi Anda melalui portofolio web.`];
            if (name) lines.push(`Nama: ${name}`);
            if (email) lines.push(`Email: ${email}`);
            if (subject) lines.push(`Subjek: ${subject}`);
            if (message) lines.push(`Pesan: ${message}`);

            const url = `https://wa.me/${encodeURIComponent(number)}?text=${encodeURIComponent(lines.join('\n'))}`;
            window.open(url, '_blank', 'noopener,noreferrer');
        });
    }
});
