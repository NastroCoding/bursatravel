<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ URL::asset('img/bursa_logo_only.ico') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/5cedab7152.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'islamic-gold': '#D4AF37',
                        'islamic-green': '#006233',
                        'islamic-emerald': '#50C878',
                        'mosque-blue': '#1E40AF',
                        'kaaba-black': '#1F2937',
                        'crescent': '#FEF3C7'
                    },
                    fontFamily: {
                        'arabic': ['Amiri', 'serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                    }
                }
            }
        }
    </script>
    <style>
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes glow {
            from {
                box-shadow: 0 0 5px #D4AF37, 0 0 10px #D4AF37;
            }

            to {
                box-shadow: 0 0 10px #D4AF37, 0 0 20px #D4AF37, 0 0 30px #D4AF37;
            }
        }

        .islamic-pattern {
            background-image:
                radial-gradient(circle at 1px 1px, rgba(212, 175, 55, 0.15) 1px, transparent 0);
            background-size: 20px 20px;
        }

        .crescent-shadow {
            filter: drop-shadow(0 4px 8px rgba(212, 175, 55, 0.3));
        }

        .aurafilter {
            -webkit-filter: drop-shadow(1px 1px 0 white) drop-shadow(-1px -1px 0 white);
            filter: drop-shadow(1px 1px 0 white) drop-shadow(-1px -1px 0 white);
        }
    </style>
    <title>Bursa Travel - Perjalanan Umrah & Haji Terpercaya</title>
</head>

<body class="bg-gradient-to-br from-slate-50 via-crescent/20 to-islamic-emerald/10">

    <!-- Islamic decorative header -->
    <div class="w-full h-2 bg-gradient-to-r from-islamic-green via-islamic-gold to-islamic-green"></div>

    <!-- Top Header Bar -->
    <header class="relative bg-gradient-to-r from-islamic-green to-islamic-emerald text-white">
        <!-- Islamic pattern overlay -->
        <div class="absolute inset-0 islamic-pattern opacity-20"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">

                <!-- Logo Section with Islamic styling -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <img class="relative w-28 h-20 object-contain crescent-shadow aurafilter"
                            src="{{ URL::asset('img/bursa_logo_only.png') }}" alt="Bursa Travel Logo">
                    </div>
                    <div class="hidden sm:block">
                        <h1 class="text-white font-bold text-2xl font-grad">Bursa Umrah Haji</h1>
                        <p class="text-islamic-gold text-sm font-medium">بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ</p>
                    </div>
                </div>

                <!-- Contact Info & CTA Section -->
                <div class="flex items-center space-x-6">

                    <!-- Contact Info (Hidden on mobile) -->
                    <div class="hidden md:flex items-center space-x-6">
                        <div class="flex items-center space-x-2 text-crescent">
                            <i class="ri-phone-line text-islamic-gold"></i>
                            <div class="text-sm">
                                <p class="font-semibold">0{{ $configs->whatsapp_num }}</p>
                                <p class="text-xs text-crescent/80">24/7 Service</p>
                            </div>
                        </div>
                        <div class="w-px h-8 bg-islamic-gold/30"></div>
                        <div class="flex items-center space-x-2 text-crescent">
                            <i class="ri-mail-line text-islamic-gold"></i>
                            <div class="text-sm">
                                <p class="font-semibold">{{ $configs->gmail }}</p>
                                <p class="text-xs text-crescent/80">Email Resmi</p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex items-center space-x-3">
                        <button
                            class="hidden sm:flex bg-white/10 backdrop-blur-sm border border-islamic-gold/50 text-white hover:bg-islamic-gold hover:text-kaaba-black px-5 py-2.5 rounded-full transition-all duration-300 font-semibold items-center space-x-2">
                            <i class="ri-customer-service-line"></i><span>HUBUNGI KAMI</span>
                        </button>
                        <a href="#"
                            class="bg-islamic-gold hover:bg-yellow-500 text-kaaba-black px-6 py-2.5 rounded-full hover:shadow-lg hover:shadow-islamic-gold/25 transition-all duration-300 font-bold animate-glow flex items-center space-x-2">
                            <i class="ri-flight-takeoff-line"></i><span>BOOK TRIP</span>
                        </a>
                    </div>

                    <!-- Mobile menu button -->
                    <button id="menu-btn" class="lg:hidden p-2 text-islamic-gold hover:text-white transition-colors">
                        <i class="ri-menu-line text-2xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation Bar -->
    <nav class="relative bg-white/95 backdrop-blur-md shadow-lg border-b border-islamic-gold/20">
        <!-- Islamic pattern overlay -->
        <div class="absolute inset-0 islamic-pattern opacity-20"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Desktop Navigation -->
            <ul class="hidden lg:flex items-center justify-center space-x-12 py-4">
                <li><a href="/"
                        class="nav-link group flex items-center space-x-2 text-islamic-green hover:text-islamic-gold transition-all duration-300 font-semibold py-2">
                        <i class="ri-home-4-line group-hover:animate-bounce"></i>
                        <span>BERANDA</span>
                        <div
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-islamic-gold transition-all duration-300 group-hover:w-full">
                        </div>
                    </a></li>
                <li><a href="/about-us"
                        class="nav-link group flex items-center space-x-2 text-islamic-green hover:text-islamic-gold transition-all duration-300 font-semibold py-2 relative">
                        <i class="ri-information-line group-hover:animate-bounce"></i>
                        <span>TENTANG KAMI</span>
                        <div
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-islamic-gold transition-all duration-300 group-hover:w-full">
                        </div>
                    </a></li>
                <li><a href="/services"
                        class="nav-link group flex items-center space-x-2 text-islamic-green hover:text-islamic-gold transition-all duration-300 font-semibold py-2 relative">
                        <i class="ri-service-line group-hover:animate-bounce"></i>
                        <span>LAYANAN</span>
                        <div
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-islamic-gold transition-all duration-300 group-hover:w-full">
                        </div>
                    </a></li>
                <li><a href="/activity"
                        class="nav-link group flex items-center space-x-2 text-islamic-green hover:text-islamic-gold transition-all duration-300 font-semibold py-2 relative">
                        <i class="ri-calendar-event-line group-hover:animate-bounce"></i>
                        <span>AKTIFITAS</span>
                        <div
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-islamic-gold transition-all duration-300 group-hover:w-full">
                        </div>
                    </a></li>
                <li><a href="/contact-us"
                        class="nav-link group flex items-center space-x-2 text-islamic-green hover:text-islamic-gold transition-all duration-300 font-semibold py-2 relative">
                        <i class="ri-phone-line group-hover:animate-bounce"></i>
                        <span>KONTAK KAMI</span>
                        <div
                            class="absolute bottom-0 left-0 w-0 h-0.5 bg-islamic-gold transition-all duration-300 group-hover:w-full">
                        </div>
                    </a></li>
            </ul>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden lg:hidden">
                <div class="bg-white/95 backdrop-blur-sm rounded-lg mx-4 my-4 shadow-xl border border-islamic-gold/30">
                    <ul class="py-4">
                        <li><a href="/"
                                class="flex items-center space-x-3 text-islamic-green hover:text-islamic-gold hover:bg-islamic-gold/10 px-6 py-3 transition-all duration-300">
                                <i class="ri-home-4-line text-lg"></i><span class="font-semibold">BERANDA</span>
                            </a></li>
                        <li><a href="/about-us"
                                class="flex items-center space-x-3 text-islamic-green hover:text-islamic-gold hover:bg-islamic-gold/10 px-6 py-3 transition-all duration-300">
                                <i class="ri-information-line text-lg"></i><span class="font-semibold">TENTANG
                                    KAMI</span>
                            </a></li>
                        <li><a href="/services"
                                class="flex items-center space-x-3 text-islamic-green hover:text-islamic-gold hover:bg-islamic-gold/10 px-6 py-3 transition-all duration-300">
                                <i class="ri-service-line text-lg"></i><span class="font-semibold">LAYANAN</span>
                            </a></li>
                        <li><a href="/activity"
                                class="flex items-center space-x-3 text-islamic-green hover:text-islamic-gold hover:bg-islamic-gold/10 px-6 py-3 transition-all duration-300">
                                <i class="ri-calendar-event-line text-lg"></i><span
                                    class="font-semibold">AKTIFITAS</span>
                            </a></li>
                        <li><a href="/contact-us"
                                class="flex items-center space-x-3 text-islamic-green hover:text-islamic-gold hover:bg-islamic-gold/10 px-6 py-3 transition-all duration-300">
                                <i class="ri-phone-line text-lg"></i><span class="font-semibold">KONTAK KAMI</span>
                            </a></li>
                    </ul>

                    <!-- Mobile Contact & CTA -->
                    <div class="px-6 pb-6 pt-2 border-t border-islamic-gold/20">
                        <div class="grid grid-cols-1 gap-3">
                            <div class="flex items-center justify-center space-x-2 text-islamic-green text-sm">
                                <i class="ri-phone-line text-islamic-gold"></i>
                                <span>0{{ $configs->whatsapp_num }}</span>
                            </div>
                            <button
                                class="w-full bg-gradient-to-r from-islamic-green to-islamic-emerald text-white px-4 py-3 rounded-full font-semibold flex items-center justify-center space-x-2">
                                <i class="ri-customer-service-line"></i><span>HUBUNGI KAMI</span>
                            </button>
                            <button
                                class="w-full bg-gradient-to-r from-islamic-gold to-yellow-500 text-white px-4 py-3 rounded-full font-semibold flex items-center justify-center space-x-2">
                                <i class="ri-flight-takeoff-line"></i><span>BOOK TRIP</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="relative min-h-screen">
        @yield('content')
    </main>

    <!-- Enhanced Footer -->
    <footer class="relative bg-gradient-to-r from-kaaba-black via-slate-800 to-kaaba-black text-white">
        <!-- Islamic pattern overlay -->
        <div class="absolute inset-0 islamic-pattern opacity-20"></div>

        <!-- Decorative top border -->
        <div class="h-1 bg-gradient-to-r from-transparent via-islamic-gold to-transparent"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

                <!-- Company Info -->
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-4 mb-6">
                        <img class="w-16 h-12 object-contain" src="{{ URL::asset('img/bursa_logo.png') }}"
                            alt="Bursa Travel Logo">
                        <div>
                            <h3 class="text-islamic-gold font-bold text-xl">Bursa Umrah Haji</h3>
                            <p class="text-islamic-emerald text-sm">الحج والعمرة المبروك</p>
                        </div>
                    </div>
                    <p class="text-gray-300 leading-relaxed mb-6 max-w-md">
                        Kami adalah Bursa Umroh Haji Indonesia, sebuah lembaga pertemuan (market) yang dikelola secara
                        profesional untuk memberikan kemudahan dan kenyamanan ibadah umroh dan haji.
                    </p>

                    <!-- Social Media -->
                    <div class="flex space-x-4">
                        <a href="#"
                            class="bg-islamic-green/20 hover:bg-islamic-green p-3 rounded-full transition-all duration-300 hover:shadow-lg hover:shadow-islamic-green/25">
                            <i class="ri-facebook-fill text-islamic-gold"></i>
                        </a>
                        <a href="#"
                            class="bg-islamic-green/20 hover:bg-islamic-green p-3 rounded-full transition-all duration-300 hover:shadow-lg hover:shadow-islamic-green/25">
                            <i class="ri-instagram-line text-islamic-gold"></i>
                        </a>
                        <a href="#"
                            class="bg-islamic-green/20 hover:bg-islamic-green p-3 rounded-full transition-all duration-300 hover:shadow-lg hover:shadow-islamic-green/25">
                            <i class="ri-youtube-line text-islamic-gold"></i>
                        </a>
                        <a href="#"
                            class="bg-islamic-green/20 hover:bg-islamic-green p-3 rounded-full transition-all duration-300 hover:shadow-lg hover:shadow-islamic-green/25">
                            <i class="ri-whatsapp-line text-islamic-gold"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-islamic-gold font-bold text-lg mb-6 flex items-center">
                        <i class="ri-links-line mr-2"></i>Quick Links
                    </h4>
                    <ul class="space-y-3">
                        <li><a href="#"
                                class="text-gray-300 hover:text-islamic-gold transition-colors duration-300 flex items-center">
                                <i class="ri-arrow-right-s-line mr-2"></i>Beranda
                            </a></li>
                        <li><a href="#"
                                class="text-gray-300 hover:text-islamic-gold transition-colors duration-300 flex items-center">
                                <i class="ri-arrow-right-s-line mr-2"></i>Paket Umrah
                            </a></li>
                        <li><a href="#"
                                class="text-gray-300 hover:text-islamic-gold transition-colors duration-300 flex items-center">
                                <i class="ri-arrow-right-s-line mr-2"></i>Paket Haji
                            </a></li>
                        <li><a href="#"
                                class="text-gray-300 hover:text-islamic-gold transition-colors duration-300 flex items-center">
                                <i class="ri-arrow-right-s-line mr-2"></i>Galeri
                            </a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-islamic-gold font-bold text-lg mb-6 flex items-center">
                        <i class="ri-contacts-line mr-2"></i>Hubungi Kami
                    </h4>
                    <ul class="space-y-4">
                        <li>
                            <a href="tel:0{{ $configs->whatsapp_num }}"
                                class="text-gray-300 hover:text-islamic-gold transition-colors duration-300 flex items-start">
                                <i class="ri-phone-fill text-islamic-emerald mr-3 mt-1"></i>
                                <div>
                                    <span class="block">0{{ $configs->whatsapp_num }}</span>
                                    <span class="text-xs text-gray-400">24/7 Customer Service</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:{{ $configs->gmail }}"
                                class="text-gray-300 hover:text-islamic-gold transition-colors duration-300 flex items-start">
                                <i class="ri-mail-line text-islamic-emerald mr-3 mt-1"></i>
                                <div>
                                    <span class="block">{{ $configs->gmail }}</span>
                                    <span class="text-xs text-gray-400">Email Resmi</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="text-gray-300 flex items-start">
                                <i class="ri-map-pin-2-fill text-islamic-emerald mr-3 mt-1"></i>
                                <div>
                                    <span class="block">{{ $configs->address }}</span>
                                    <span class="text-xs text-gray-400">Kantor Pusat</span>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <!-- Newsletter -->
                    <div class="mt-8">
                        <h5 class="text-islamic-gold font-semibold mb-3">Newsletter</h5>
                        <form class="flex">
                            <input type="email" placeholder="Email Anda"
                                class="flex-1 px-4 py-2 bg-white/10 border border-islamic-gold/30 rounded-l-lg focus:outline-none focus:border-islamic-gold text-white placeholder-gray-400">
                            <button
                                class="bg-islamic-gold hover:bg-yellow-500 px-4 py-2 rounded-r-lg transition-colors duration-300 text-kaaba-black font-semibold">
                                <i class="ri-send-plane-line"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Bottom bar -->
            <div class="mt-12 pt-8 border-t border-islamic-gold/20 text-center">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-gray-400">
                        © 2025 Bursa Umrah Haji. All rights reserved. |
                        <span class="text-islamic-gold">Terdaftar & Berizin Resmi</span>
                    </p>
                    <div class="flex items-center space-x-4 text-sm text-gray-400">
                        <a href="#" class="hover:text-islamic-gold transition-colors">Privacy Policy</a>
                        <span>•</span>
                        <a href="#" class="hover:text-islamic-gold transition-colors">Terms of Service</a>
                        <span>•</span>
                        <span class="text-islamic-emerald">🕌 Berkah & Amanah</span>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <a href="https://wa.me/62{{ $configs->whatsapp_num }}"
            class="bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 animate-pulse">
            <i class="ri-whatsapp-line text-2xl"></i>
        </a>
    </div>

    <!-- Scripts -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <script>
        // Mobile menu toggle
        document.getElementById('menu-btn').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });

        // ScrollReveal animations
        if (typeof ScrollReveal !== 'undefined') {
            ScrollReveal().reveal('.nav-link', {
                delay: 100,
                interval: 100
            });
        }
    </script>
</body>

</html>
