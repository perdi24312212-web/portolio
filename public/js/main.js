/**
 * Portofolio Perdi (NPM: 24312212)
 * Interaktivitas JavaScript Modern & Responsif
 */

document.addEventListener('DOMContentLoaded', () => {
    // -------------------------------------------------------------------------
    // 1. Audio Synthesis for Micro-Interactions (Web Audio API)
    // -------------------------------------------------------------------------
    const playPopSound = () => {
        try {
            const ctx = new (window.AudioContext || window.webkitAudioContext)();
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();
            osc.type = 'sine';
            osc.frequency.setValueAtTime(440, ctx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(880, ctx.currentTime + 0.08);
            gain.gain.setValueAtTime(0.04, ctx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.08);
            osc.connect(gain);
            gain.connect(ctx.destination);
            osc.start();
            osc.stop(ctx.currentTime + 0.08);
        } catch (e) {}
    };

    // -------------------------------------------------------------------------
    // 2. Dark Mode Toggle
    // -------------------------------------------------------------------------
    const root = document.documentElement;
    const applyTheme = (dark) => {
        root.classList.toggle('dark', dark);
        try {
            localStorage.setItem('theme', dark ? 'dark' : 'light');
        } catch (e) {}
    };

    document.querySelectorAll('[data-theme-toggle]').forEach((btn) => {
        btn.addEventListener('click', () => {
            playPopSound();
            applyTheme(!root.classList.contains('dark'));
        });
    });

    // -------------------------------------------------------------------------
    // 3. Mobile Navigation Menu
    // -------------------------------------------------------------------------
    const menuBtn = document.getElementById('menu-btn');
    const menu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('menu-icon-open');
    const iconClose = document.getElementById('menu-icon-close');

    if (menuBtn && menu) {
        menuBtn.addEventListener('click', () => {
            const isHidden = menu.classList.toggle('hidden');
            menuBtn.setAttribute('aria-expanded', String(!isHidden));
            if (iconOpen && iconClose) {
                iconOpen.classList.toggle('hidden', !isHidden);
                iconClose.classList.toggle('hidden', isHidden);
            }
        });

        menu.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => {
                menu.classList.add('hidden');
                if (iconOpen && iconClose) {
                    iconOpen.classList.remove('hidden');
                    iconClose.classList.add('hidden');
                }
            });
        });
    }

    // -------------------------------------------------------------------------
    // 4. Scroll Reveal Animations (IntersectionObserver)
    // -------------------------------------------------------------------------
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                revealObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.reveal').forEach((el) => revealObserver.observe(el));

    // -------------------------------------------------------------------------
    // 5. Active Navbar Link Spy
    // -------------------------------------------------------------------------
    const navLinks = [...document.querySelectorAll('[data-nav]')];
    const sections = navLinks
        .map((link) => document.querySelector(link.getAttribute('href')))
        .filter(Boolean);

    const spyObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const id = entry.target.id;
                navLinks.forEach((link) => {
                    const match = link.getAttribute('href') === `#${id}`;
                    link.classList.toggle('text-brand-600', match);
                    link.classList.toggle('dark:text-brand-400', match);
                    link.classList.toggle('bg-white', match);
                    link.classList.toggle('dark:bg-slate-800', match);
                    link.classList.toggle('shadow-sm', match);
                });
            }
        });
    }, { rootMargin: '-40% 0px -50% 0px' });

    sections.forEach((s) => spyObserver.observe(s));

    // -------------------------------------------------------------------------
    // 6. Scroll to Top Floating Button
    // -------------------------------------------------------------------------
    const topBtn = document.getElementById('scroll-to-top');
    if (topBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 350) {
                topBtn.classList.remove('hidden');
                topBtn.classList.add('flex');
            } else {
                topBtn.classList.add('hidden');
                topBtn.classList.remove('flex');
            }
        });

        topBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // -------------------------------------------------------------------------
    // 7. Toast Notification Utility
    // -------------------------------------------------------------------------
    const toastContainer = document.getElementById('toast-container');
    const showToast = (message, icon = '✓') => {
        if (!toastContainer) return;
        const toast = document.createElement('div');
        toast.className = 'toast';
        toast.innerHTML = `<span class="text-brand-400 text-base font-bold">${icon}</span> <span>${message}</span>`;
        toastContainer.appendChild(toast);

        playPopSound();

        setTimeout(() => {
            toast.style.animation = 'toastOut 0.35s ease forwards';
            setTimeout(() => toast.remove(), 350);
        }, 3200);
    };

    // -------------------------------------------------------------------------
    // 8. Download CV as PDF
    // -------------------------------------------------------------------------
    const downloadCvBtn = document.getElementById('download-cv');
    if (downloadCvBtn) {
        downloadCvBtn.addEventListener('click', () => {
            const { jsPDF } = window.jspdf || {};
            if (!jsPDF) {
                showToast('Library PDF sedang dimuat ulang, silakan coba lagi dalam hitungan detik.', '⚠️');
                return;
            }

            const name = document.querySelector('#home h1')?.textContent.replace(/\s+/g, ' ').trim() || 'Perdi';
            const role = document.querySelector('#home p.font-display.text-xl')?.textContent.trim() || 'Full-Stack Web Developer & Informatics Student';
            const email = 'perdi24312212@gmail.com';
            const phone = '085319147609';
            const whatsapp = 'https://wa.me/6285319147609';

            const skillNames = Array.from(document.querySelectorAll('#skills li .font-bold')).map((el) => el.textContent.trim()).slice(0, 12);
            const doc = new jsPDF({ unit: 'pt', format: 'a4' });
            const pageWidth = doc.internal.pageSize.getWidth();
            const pageHeight = doc.internal.pageSize.getHeight();
            const margin = 42;
            let y = 44;

            doc.setFillColor(79, 70, 229);
            doc.roundedRect(margin, 24, pageWidth - margin * 2, 100, 16, 16, 'F');

            doc.setTextColor(255, 255, 255);
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(22);
            doc.text(name, margin + 18, 60);

            doc.setFont('helvetica', 'normal');
            doc.setFontSize(11);
            doc.text(role, margin + 18, 82);

            y = 150;
            doc.setTextColor(25, 25, 25);
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(18);
            doc.text('Profil Singkat', margin, y);
            doc.setFont('helvetica', 'normal');
            doc.setFontSize(11);

            const profileText = 'Mahasiswa S1 Informatika yang fokus pada pengembangan aplikasi web modern, desain antarmuka responsif, dan arsitektur sistem berbasis PHP OOP serta Laravel.';
            const lines = doc.splitTextToSize(profileText, pageWidth - margin * 2 - 30);
            doc.text(lines, margin, y + 20);

            y += 90;
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(18);
            doc.text('Kontak', margin, y);
            doc.setFont('helvetica', 'normal');
            doc.setFontSize(11);
            doc.text(`Email: ${email}`, margin, y + 20);
            doc.text(`Phone: ${phone}`, margin, y + 38);
            doc.text(`WhatsApp: ${whatsapp}`, margin, y + 56);

            y += 90;
            doc.setFont('helvetica', 'bold');
            doc.setFontSize(18);
            doc.text('Keahlian Utama', margin, y);
            doc.setFont('helvetica', 'normal');
            doc.setFontSize(11);
            const skillText = skillNames.map((skill, index) => `${index + 1}. ${skill}`).join(' | ');
            const skillLines = doc.splitTextToSize(skillText, pageWidth - margin * 2);
            doc.text(skillLines, margin, y + 20);

            doc.setDrawColor(210, 210, 210);
            doc.line(margin, pageHeight - 56, pageWidth - margin, pageHeight - 56);
            doc.setFont('helvetica', 'italic');
            doc.setFontSize(10);
            doc.setTextColor(90, 90, 90);
            doc.text('CV dibuat otomatis dari portfolio website.', margin, pageHeight - 38);

            doc.save('Perdi-CV.pdf');
            showToast('CV berhasil diunduh dalam format PDF.', '✅');
        });
    }

    // -------------------------------------------------------------------------
    // 9. 1-Click Copy to Clipboard
    // -------------------------------------------------------------------------
    document.querySelectorAll('[data-copy]').forEach((btn) => {
        btn.addEventListener('click', async (e) => {
            e.preventDefault();
            const text = btn.dataset.copy;
            try {
                await navigator.clipboard.writeText(text);
                showToast(`"${text}" berhasil disalin ke clipboard!`, '📋');
            } catch (err) {
                // Fallback for older browsers
                const ta = document.createElement('textarea');
                ta.value = text;
                document.body.appendChild(ta);
                ta.select();
                document.execCommand('copy');
                ta.remove();
                showToast(`"${text}" berhasil disalin!`, '📋');
            }
        });
    });

    // -------------------------------------------------------------------------
    // 10. Project Filtering
    // -------------------------------------------------------------------------
    const filterButtons = document.querySelectorAll('[data-filter]');
    const projectCards = document.querySelectorAll('[data-tags]');

    filterButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            const filter = btn.dataset.filter;
            playPopSound();

            filterButtons.forEach((b) => {
                if (b === btn) {
                    b.classList.remove('border-slate-300', 'bg-white', 'text-slate-700', 'dark:border-slate-800', 'dark:bg-slate-900', 'dark:text-slate-300');
                    b.classList.add('bg-brand-600', 'text-white', 'shadow-md', 'shadow-brand-500/25');
                } else {
                    b.classList.remove('bg-brand-600', 'text-white', 'shadow-md', 'shadow-brand-500/25');
                    b.classList.add('border-slate-300', 'bg-white', 'text-slate-700', 'dark:border-slate-800', 'dark:bg-slate-900', 'dark:text-slate-300');
                }
            });

            projectCards.forEach((card) => {
                const tags = card.dataset.tags.split('|');
                if (filter === 'all' || tags.includes(filter)) {
                    card.classList.remove('hidden');
                    card.style.animation = 'toastIn 0.35s ease forwards';
                } else {
                    card.classList.add('hidden');
                }
            });
        });
    });

    // -------------------------------------------------------------------------
    // 10. Project Detail Modal
    // -------------------------------------------------------------------------
    const modal = document.getElementById('project-modal');
    const modalTitle = document.getElementById('modal-title');
    const modalDesc = document.getElementById('modal-desc');
    const modalBadge = document.getElementById('modal-badge');
    const modalFeatures = document.getElementById('modal-features');
    const modalRepo = document.getElementById('modal-repo');
    const modalClose = document.getElementById('modal-close');
    const modalCloseBtn = document.getElementById('modal-close-btn');

    const projectData = {
        'sim-kelas': {
            title: 'Sistem Manajemen Kelas & Tugas Online',
            badge: 'Laravel MVC Class',
            desc: 'Aplikasi manajemen kelas virtual lengkap dengan arsitektur Class Controller Laravel. Dosen dapat membagikan materi kuliah, membuat penugasan berkas, dan menilai tugas mahasiswa secara transparan.',
            features: [
                'Arsitektur Controller & Model terpisah berbasis Class PHP OOP',
                'Sistem autentikasi role tingkat ganda (Dosen & Mahasiswa)',
                'Fitur upload berkas terenkripsi dengan validasi ukuran & format mime',
                'Dibuat oleh Perdi (NPM: 24312212) dengan integrasi Laravel & Tailwind'
            ],
            repo: 'https://github.com/perdi24312212/sim-kelas'
        },
        'pos-kasir': {
            title: 'Aplikasi Point of Sale (POS) & Inventori',
            badge: 'Full-Stack Web App',
            desc: 'Sistem kasir dan manajemen persediaan barang untuk UMKM. Dilengkapi pencarian kilat produk, pencetakan struk digital, manajemen pelanggan, dan grafik omzet harian.',
            features: [
                'Kalkulasi transaksi otomatis dan pengurangan stok database realtime',
                'Visualisasi omzet penjualan bulanan menggunakan Chart.js',
                'Desain antarmuka responsif kasir tablet & desktop dengan Tailwind CSS',
                'Pengolahan logika menggunakan Class PHP Service Pattern'
            ],
            repo: 'https://github.com/perdi24312212/pos-inventori'
        },
        'portal-hima': {
            title: 'Website Portal Informasi HIMA Informatika',
            badge: 'Portal Organisasi',
            desc: 'Platform informasi dan publikasi kegiatan resmi himpunan mahasiswa. Menyajikan warta teknologi, kalender acara, registrasi seminar, dan arsip kepengurusan divisi.',
            features: [
                'Manajemen konten artikel warta informatika dinamis',
                'Formulir pendaftaran event & rekrutmen anggota online',
                'Mode gelap/terang terintegrasi dengan preferensi pengguna',
                'Desain elegan khas almamater dengan alur navigasi intuitif'
            ],
            repo: 'https://github.com/perdi24312212/portal-hima'
        },
        'antrean-layanan': {
            title: 'Sistem Antrean Layanan Akademik Kampus',
            badge: 'Real-time Service',
            desc: 'Aplikasi display antrean loket pelayanan kampus. Menghitung estimasi giliran loket dan menyediakan pemanggilan nomor suara otomatis.',
            features: [
                'Display layar monitor antrean per loket terpisah',
                'Log riwayat pelayanan mahasiswa tersimpan aman dalam database',
                'Didesain dengan arsitektur controller class bersih dan terukur'
            ],
            repo: 'https://github.com/perdi24312212/sistem-antrean'
        }
    };

    document.querySelectorAll('[data-project-modal]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.projectModal;
            const data = projectData[id];
            if (!data || !modal) return;

            playPopSound();
            modalTitle.textContent = data.title;
            modalDesc.textContent = data.desc;
            modalBadge.textContent = data.badge;
            modalRepo.href = data.repo;

            modalFeatures.innerHTML = data.features
                .map((f) => `<li class="flex items-center gap-2"><span class="text-brand-600 dark:text-brand-400 font-bold">✓</span> <span>${f}</span></li>`)
                .join('');

            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });
    });

    const closeModal = () => {
        if (!modal) return;
        modal.classList.add('hidden');
        document.body.style.overflow = '';
    };

    if (modalClose) modalClose.addEventListener('click', closeModal);
    if (modalCloseBtn) modalCloseBtn.addEventListener('click', closeModal);
    if (modal) {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });
    }
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
            closeModal();
        }
    });

    // -------------------------------------------------------------------------
    // 11. Direct WhatsApp Message from Contact Form
    // -------------------------------------------------------------------------
    const waQuickBtn = document.getElementById('send-wa-quick');
    if (waQuickBtn) {
        waQuickBtn.addEventListener('click', () => {
            playPopSound();
            const name = document.getElementById('name')?.value || '';
            const email = document.getElementById('email')?.value || '';
            const subject = document.getElementById('subject')?.value || '';
            const message = document.getElementById('message')?.value || '';

            const waNumber = '6285319147609';
            let waText = `Halo Perdi (NPM: 24312212), saya ingin menghubungi Anda melalui portofolio web:%0A%0A`;
            if (name) waText += `*Nama:* ${encodeURIComponent(name)}%0A`;
            if (email) waText += `*Email:* ${encodeURIComponent(email)}%0A`;
            if (subject) waText += `*Subjek:* ${encodeURIComponent(subject)}%0A`;
            if (message) waText += `*Pesan:* ${encodeURIComponent(message)}%0A`;

            window.open(`https://wa.me/${waNumber}?text=${waText}`, '_blank');
            showToast('Membuka WhatsApp...', '💬');
        });
    }
});
