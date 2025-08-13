@extends('layouts.main')
@section('content')
    <!-- Vision & Mission Section -->
    <section id="visimisi" class="py-20 bg-gradient-to-br from-slate-50 via-crescent/10 to-islamic-emerald/5 relative overflow-hidden">
        <!-- Islamic Pattern Background -->
        <div class="absolute inset-0 islamic-pattern opacity-5"></div>

        <!-- Floating Islamic Elements -->
        <div class="absolute top-10 right-20 text-islamic-gold/10 text-8xl animate-float pointer-events-none">🕌</div>
        <div class="absolute bottom-20 left-10 text-islamic-green/10 text-6xl animate-float pointer-events-none" style="animation-delay: -3s;">☪</div>

        <div class="relative max-w-7xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center bg-islamic-gold/10 backdrop-blur-sm border border-islamic-gold/20 rounded-full px-6 py-3 mb-6">
                    <i class="ri-eye-line text-islamic-gold mr-2"></i>
                    <span class="text-islamic-green font-medium">Visi & Misi</span>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="text-islamic-green">Visi</span>
                    <span class="text-gray-600">&</span>
                    <span class="bg-gradient-to-r from-islamic-gold via-yellow-400 to-islamic-gold bg-clip-text text-transparent">Misi</span>
                </h1>
                <div class="w-24 h-1 bg-gradient-to-r from-islamic-gold to-islamic-emerald mx-auto rounded-full"></div>
            </div>

            <!-- Vision & Mission Cards -->
            <div class="grid md:grid-cols-2 gap-12 mb-20">
                <!-- Vision Card -->
                <div class="group bg-white/90 backdrop-blur-md p-10 rounded-3xl shadow-xl hover:shadow-2xl border border-islamic-gold/20 transition-all duration-500 transform hover:-translate-y-3 relative overflow-hidden">
                    <!-- Islamic Corner Decoration -->
                    <div class="absolute top-0 right-0 w-24 h-24 bg-islamic-emerald/10 rounded-bl-full"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-islamic-gold/5 rounded-tr-full"></div>
                    
                    <div class="relative">
                        <div class="flex items-center justify-center mb-8">
                            <div class="w-20 h-20 bg-gradient-to-br from-islamic-emerald/20 to-islamic-gold/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <i class="ri-eye-2-line text-islamic-emerald text-3xl"></i>
                            </div>
                        </div>
                        <h2 class="text-3xl font-bold text-islamic-green mb-6 text-center">Visi</h2>
                        <div class="border-l-4 border-islamic-emerald pl-6">
                            <p class="text-gray-600 leading-relaxed text-lg">{{ $configs->visi }}</p>
                        </div>
                    </div>
                </div>

                <!-- Mission Card -->
                <div class="group bg-white/90 backdrop-blur-md p-10 rounded-3xl shadow-xl hover:shadow-2xl border border-islamic-gold/20 transition-all duration-500 transform hover:-translate-y-3 relative overflow-hidden">
                    <!-- Islamic Corner Decoration -->
                    <div class="absolute top-0 right-0 w-24 h-24 bg-islamic-gold/10 rounded-bl-full"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-islamic-emerald/5 rounded-tr-full"></div>
                    
                    <div class="relative">
                        <div class="flex items-center justify-center mb-8">
                            <div class="w-20 h-20 bg-gradient-to-br from-islamic-gold/20 to-islamic-emerald/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <i class="ri-target-line text-islamic-gold text-3xl"></i>
                            </div>
                        </div>
                        <h2 class="text-3xl font-bold text-islamic-green mb-6 text-center">Misi</h2>
                        <div class="border-l-4 border-islamic-gold pl-6">
                            <p class="text-gray-600 leading-relaxed text-lg">{!! nl2br(e($configs->misi)) !!}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Values Section -->
            <div class="bg-gradient-to-r from-islamic-green/10 via-islamic-emerald/5 to-islamic-gold/10 backdrop-blur-md rounded-3xl p-12 shadow-xl border border-islamic-gold/20 relative overflow-hidden">
                <!-- Islamic Decorative Elements -->
                <div class="absolute top-0 left-0 w-40 h-40 bg-islamic-gold/5 rounded-full blur-2xl"></div>
                <div class="absolute bottom-0 right-0 w-48 h-48 bg-islamic-emerald/5 rounded-full blur-2xl"></div>
                
                <div class="relative">
                    <div class="text-center mb-12">
                        <div class="inline-flex items-center bg-islamic-gold/20 backdrop-blur-sm border border-islamic-gold/30 rounded-full px-6 py-3 mb-6">
                            <i class="ri-star-line text-islamic-gold mr-2"></i>
                            <span class="text-islamic-green font-semibold">Nilai-Nilai Kami</span>
                        </div>
                        <h2 class="text-4xl font-bold text-islamic-green">Prinsip Pelayanan</h2>
                    </div>
                    
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-8">
                        <div class="group text-center">
                            <div class="w-16 h-16 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg border border-islamic-gold/20 group-hover:scale-110 transition-transform duration-300">
                                <i class="ri-user-star-line text-islamic-emerald text-2xl"></i>
                            </div>
                            <span class="text-lg font-bold text-islamic-green">Profesional</span>
                        </div>
                        <div class="group text-center">
                            <div class="w-16 h-16 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg border border-islamic-gold/20 group-hover:scale-110 transition-transform duration-300">
                                <i class="ri-shield-check-line text-islamic-gold text-2xl"></i>
                            </div>
                            <span class="text-lg font-bold text-islamic-green">Integritas</span>
                        </div>
                        <div class="group text-center">
                            <div class="w-16 h-16 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg border border-islamic-gold/20 group-hover:scale-110 transition-transform duration-300">
                                <i class="ri-hand-heart-line text-islamic-emerald text-2xl"></i>
                            </div>
                            <span class="text-lg font-bold text-islamic-green">Jujur</span>
                        </div>
                        <div class="group text-center">
                            <div class="w-16 h-16 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg border border-islamic-gold/20 group-hover:scale-110 transition-transform duration-300">
                                <i class="ri-scales-3-line text-islamic-gold text-2xl"></i>
                            </div>
                            <span class="text-lg font-bold text-islamic-green">Adil Peduli</span>
                        </div>
                        <div class="group text-center">
                            <div class="w-16 h-16 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center mx-auto mb-4 shadow-lg border border-islamic-gold/20 group-hover:scale-110 transition-transform duration-300">
                                <i class="ri-medal-line text-islamic-emerald text-2xl"></i>
                            </div>
                            <span class="text-lg font-bold text-islamic-green">Komitmen</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- History Section -->
    <section id="sejarah" class="py-20 bg-gradient-to-br from-islamic-green/5 via-slate-50 to-islamic-emerald/5 relative overflow-hidden">
        <!-- Floating Islamic Elements -->
        <div class="absolute top-10 left-10 text-islamic-gold/5 text-6xl animate-float pointer-events-none">✨</div>
        <div class="absolute bottom-10 right-10 text-islamic-emerald/10 text-8xl animate-float pointer-events-none" style="animation-delay: -2s;">🌙</div>

        <div class="relative max-w-7xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center bg-islamic-emerald/10 backdrop-blur-sm border border-islamic-emerald/20 rounded-full px-6 py-3 mb-6">
                    <i class="ri-time-line text-islamic-emerald mr-2"></i>
                    <span class="text-islamic-green font-medium">Sejarah Perjalanan</span>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="text-islamic-green">Sejarah</span>
                    <span class="bg-gradient-to-r from-islamic-gold via-yellow-400 to-islamic-gold bg-clip-text text-transparent">Kami</span>
                </h1>
                <div class="w-24 h-1 bg-gradient-to-r from-islamic-emerald to-islamic-gold mx-auto rounded-full"></div>
            </div>

            <!-- History Content -->
            <div class="grid lg:grid-cols-2 gap-16 items-center mb-16">
                <div class="text-center">
                    <div class="bg-white/90 backdrop-blur-md rounded-3xl p-10 shadow-xl border border-islamic-gold/20 relative overflow-hidden">
                        <!-- Islamic Corner Decoration -->
                        <div class="absolute top-0 right-0 w-20 h-20 bg-islamic-gold/10 rounded-bl-full"></div>
                        
                        <div class="relative">
                            <img src="{{ URL::asset('dist/assets/img/kelimatu_logo.png') }}" 
                                 class="max-w-xs mx-auto drop-shadow-lg hover:scale-105 transition-transform duration-300" 
                                 alt="Kelimatu Logo">
                        </div>
                    </div>
                </div>
                <div class="bg-white/90 backdrop-blur-md rounded-3xl p-10 shadow-xl border border-islamic-emerald/20 relative overflow-hidden">
                    <!-- Islamic Pattern Overlay -->
                    <div class="absolute top-0 left-0 w-32 h-32 opacity-5">
                        <div class="w-full h-full" style="background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><defs><pattern id=%22islamic%22 patternUnits=%22userSpaceOnUse%22 width=%2220%22 height=%2220%22><circle cx=%2210%22 cy=%2210%22 r=%222%22 fill=%22%23D4AF37%22/></pattern></defs><rect width=%22100%25%22 height=%22100%25%22 fill=%22url(%23islamic)%22/></svg>'); background-size: 20px 20px;"></div>
                    </div>
                    
                    <div class="relative">
                        <div class="border-l-4 border-islamic-emerald pl-8">
                            <p class="text-gray-600 leading-relaxed text-xl">{{ $configs->history }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logo Meaning -->
            <div class="bg-white/90 backdrop-blur-md rounded-3xl p-12 shadow-xl border border-islamic-gold/20 relative overflow-hidden">
                <!-- Islamic Decorative Elements -->
                <div class="absolute top-0 right-0 w-40 h-40 bg-islamic-emerald/5 rounded-full blur-2xl"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-islamic-gold/5 rounded-full blur-2xl"></div>
                
                <div class="relative">
                    <div class="flex items-center mb-8">
                        <div class="w-16 h-16 bg-islamic-gold/20 rounded-full flex items-center justify-center mr-6">
                            <i class="ri-ancient-gate-line text-islamic-gold text-2xl"></i>
                        </div>
                        <h3 class="text-4xl font-bold text-islamic-green">Filosofi Logo</h3>
                    </div>
                    
                    <div class="space-y-6 text-gray-600 text-lg">
                        <div class="bg-islamic-emerald/5 backdrop-blur-sm rounded-2xl p-6 border-l-4 border-islamic-emerald">
                            <p><strong class="text-islamic-green">Warna Ungu Magenta:</strong> Memiliki nilai positif, berjiwa artistik, bijaksana, dan intuitif, dekat dan senang memikirkan masalah spiritual dalam kehidupan.</p>
                        </div>
                        <div class="bg-islamic-gold/5 backdrop-blur-sm rounded-2xl p-6 border-l-4 border-islamic-gold">
                            <p><strong class="text-islamic-green">Lambang:</strong> Huruf K (double) melambangkan kebersamaan dan persatuan.</p>
                        </div>
                        <div class="bg-islamic-emerald/5 backdrop-blur-sm rounded-2xl p-6 border-l-4 border-islamic-emerald">
                            <p><strong class="text-islamic-green">Tulisan "KELIMATU":</strong> Adalah branding nama dari PT. Emaar Pesona Wisata (EPW). Kelimatu (Kalimat; Bahasa Arab) memiliki arti kesatuan perasaan dan ungkapan dalam bentuk kata/tulisan.</p>
                        </div>
                        <div class="bg-islamic-gold/5 backdrop-blur-sm rounded-2xl p-6 border-l-4 border-islamic-gold">
                            <p><strong class="text-islamic-green">Travel & Tours:</strong> Adalah bentuk usaha perjalanan travel & tours berupa umroh, haji dan wisata halal lainnya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="tim" class="py-20 bg-gradient-to-br from-slate-50 via-crescent/10 to-islamic-gold/5 relative overflow-hidden">
        <!-- Islamic Pattern Background -->
        <div class="absolute inset-0 islamic-pattern opacity-5"></div>

        <!-- Floating Islamic Elements -->
        <div class="absolute top-20 right-20 text-islamic-emerald/10 text-6xl animate-float pointer-events-none">👥</div>
        <div class="absolute bottom-20 left-20 text-islamic-gold/10 text-8xl animate-float pointer-events-none" style="animation-delay: -3s;">🤝</div>

        <div class="relative max-w-7xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center bg-islamic-gold/10 backdrop-blur-sm border border-islamic-gold/20 rounded-full px-6 py-3 mb-6">
                    <i class="ri-team-line text-islamic-gold mr-2"></i>
                    <span class="text-islamic-green font-medium">Tim Profesional</span>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="text-islamic-green">Tim</span>
                    <span class="bg-gradient-to-r from-islamic-gold via-yellow-400 to-islamic-gold bg-clip-text text-transparent">Kami</span>
                </h1>
                <div class="w-24 h-1 bg-gradient-to-r from-islamic-gold to-islamic-emerald mx-auto rounded-full mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Tim berpengalaman dan berdedikasi tinggi untuk memberikan pelayanan terbaik dalam perjalanan spiritual Anda
                </p>
            </div>

            <!-- Team Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($teams as $team)
                    <div class="group bg-white/90 backdrop-blur-md rounded-3xl shadow-xl hover:shadow-2xl border border-islamic-gold/20 overflow-hidden transition-all duration-500 transform hover:-translate-y-3 relative">
                        <!-- Islamic Corner Decoration -->
                        <div class="absolute top-0 right-0 w-16 h-16 bg-islamic-gold/10 rounded-bl-full z-10"></div>
                        
                        <div class="relative overflow-hidden">
                            <img class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110" 
                                 src="{{ Storage::url($team->image) }}" 
                                 alt="{{ $team->name }}">
                            <!-- Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-islamic-green/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        
                        <div class="p-8 relative">
                            <!-- Islamic Decoration -->
                            <div class="absolute bottom-0 left-0 w-20 h-20 bg-islamic-emerald/5 rounded-tr-full"></div>
                            
                            <div class="relative">
                                <h3 class="text-2xl font-bold text-islamic-green mb-4 group-hover:text-islamic-gold transition-colors duration-300">
                                    {{ $team->name }}
                                </h3>
                                <div class="border-l-4 border-islamic-gold pl-4">
                                    <p class="text-gray-600 leading-relaxed">{{ $team->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Floating Decorative Elements -->
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-islamic-gold/5 rounded-full blur-3xl"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-islamic-emerald/5 rounded-full blur-3xl"></div>
    </section>

    <!-- Modal (Enhanced with Islamic Styling) -->
    <div id="media-modal" class="hidden fixed inset-0 bg-black/80 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white/95 backdrop-blur-md rounded-3xl max-w-5xl max-h-full overflow-auto shadow-2xl border border-islamic-gold/20 relative">
            <!-- Islamic Corner Decoration -->
            <div class="absolute top-0 right-0 w-16 h-16 bg-islamic-gold/10 rounded-bl-full"></div>
            
            <div class="p-8 relative">
                <button id="close-modal" class="absolute top-4 right-4 w-10 h-10 bg-islamic-gold/20 hover:bg-islamic-gold/30 rounded-full flex items-center justify-center text-islamic-gold hover:text-white transition-all duration-300 z-10">
                    <i class="ri-close-line text-xl"></i>
                </button>
                <div id="modal-content" class="pt-8"></div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('media-modal');
            const modalContent = document.getElementById('modal-content');
            const closeModal = document.getElementById('close-modal');

            document.querySelectorAll('.open-modal').forEach(item => {
                item.addEventListener('click', event => {
                    event.preventDefault();
                    const media = event.currentTarget.getAttribute('data-media');
                    const type = event.currentTarget.getAttribute('data-type');

                    let content = '';
                    if (type === 'image') {
                        content = `<img src="${media}" class="max-w-full h-auto rounded-2xl shadow-lg border border-islamic-gold/20" alt="">`;
                    } else {
                        content = `
                            <video class="max-w-full h-auto rounded-2xl shadow-lg border border-islamic-gold/20" controls>
                                <source src="${media}" type="video/${media.split('.').pop()}">
                                Your browser does not support the video tag.
                            </video>
                        `;
                    }

                    modalContent.innerHTML = content;
                    modal.classList.remove('hidden');
                });
            });

            closeModal.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            modal.addEventListener('click', event => {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });

            // Enhanced scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.group').forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(el);
            });
        });
    </script>
@endsection