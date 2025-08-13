@extends('layouts.main')

@section('content')
    <!-- Contact Section -->
    <section class="py-20 bg-gradient-to-br from-slate-50 via-crescent/10 to-islamic-emerald/5 relative overflow-hidden">
        <!-- Islamic Pattern Background -->
        <div class="absolute inset-0 islamic-pattern opacity-5"></div>

        <!-- Floating Islamic Elements -->
        <div class="absolute top-10 right-20 text-islamic-gold/10 text-8xl animate-float pointer-events-none">🕌</div>
        <div class="absolute bottom-20 left-10 text-islamic-green/10 text-6xl animate-float pointer-events-none" style="animation-delay: -3s;">☪</div>
        <div class="absolute top-1/3 left-1/4 text-islamic-emerald/5 text-4xl animate-float pointer-events-none" style="animation-delay: -1s;">✨</div>

        <div class="relative max-w-7xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center bg-islamic-gold/10 backdrop-blur-sm border border-islamic-gold/20 rounded-full px-6 py-3 mb-6">
                    <i class="ri-customer-service-2-line text-islamic-gold mr-2"></i>
                    <span class="text-islamic-green font-medium">Layanan Konsultasi</span>
                </div>

                <h1 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="text-islamic-green">Hubungi</span>
                    <span class="bg-gradient-to-r from-islamic-gold via-yellow-400 to-islamic-gold bg-clip-text text-transparent">Kami</span>
                </h1>
                <div class="w-24 h-1 bg-gradient-to-r from-islamic-gold to-islamic-emerald mx-auto rounded-full mb-6"></div>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Siap membantu Anda merencanakan perjalanan spiritual yang tak terlupakan menuju Tanah Suci. 
                    Hubungi tim konsultan berpengalaman kami melalui berbagai cara di bawah ini.
                </p>
            </div>

            <!-- Contact Methods -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-20">
                <!-- Address -->
                <div class="group text-center p-8 bg-white/90 backdrop-blur-md rounded-3xl shadow-xl hover:shadow-2xl border border-islamic-gold/20 transition-all duration-500 transform hover:-translate-y-3 relative overflow-hidden">
                    <!-- Islamic Corner Decoration -->
                    <div class="absolute top-0 right-0 w-16 h-16 bg-islamic-gold/10 rounded-bl-full"></div>
                    
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-islamic-gold/20 to-islamic-emerald/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="ri-map-pin-line text-islamic-gold text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-islamic-green mb-4">Alamat Kantor</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $configs->address }}</p>
                    </div>
                </div>

                <!-- WhatsApp -->
                <div class="group text-center p-8 bg-white/90 backdrop-blur-md rounded-3xl shadow-xl hover:shadow-2xl border border-islamic-gold/20 transition-all duration-500 transform hover:-translate-y-3 relative overflow-hidden">
                    <!-- Islamic Corner Decoration -->
                    <div class="absolute top-0 right-0 w-16 h-16 bg-islamic-emerald/10 rounded-bl-full"></div>
                    
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-islamic-emerald/20 to-islamic-gold/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="ri-whatsapp-line text-islamic-emerald text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-islamic-green mb-4">WhatsApp</h3>
                        <a href="https://wa.me/62{{ $configs->whatsapp_num }}" 
                           class="inline-flex items-center px-4 py-2 bg-islamic-emerald/10 hover:bg-islamic-emerald/20 text-islamic-emerald font-semibold rounded-full transition-all duration-300 border border-islamic-emerald/30">
                            <i class="ri-phone-line mr-2"></i>
                            0{{ $configs->whatsapp_num }}
                        </a>
                    </div>
                </div>

                <!-- Email -->
                <div class="group text-center p-8 bg-white/90 backdrop-blur-md rounded-3xl shadow-xl hover:shadow-2xl border border-islamic-gold/20 transition-all duration-500 transform hover:-translate-y-3 relative overflow-hidden">
                    <!-- Islamic Corner Decoration -->
                    <div class="absolute top-0 right-0 w-16 h-16 bg-islamic-green/10 rounded-bl-full"></div>
                    
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-islamic-green/20 to-islamic-gold/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="ri-mail-line text-islamic-green text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-islamic-green mb-4">Email</h3>
                        <a href="mailto:{{ $configs->gmail }}" 
                           class="inline-flex items-center px-4 py-2 bg-islamic-green/10 hover:bg-islamic-green/20 text-islamic-green font-semibold rounded-full transition-all duration-300 border border-islamic-green/30 break-all text-sm">
                            <i class="ri-at-line mr-2"></i>
                            {{ $configs->gmail }}
                        </a>
                    </div>
                </div>

                <!-- Instagram -->
                <div class="group text-center p-8 bg-white/90 backdrop-blur-md rounded-3xl shadow-xl hover:shadow-2xl border border-islamic-gold/20 transition-all duration-500 transform hover:-translate-y-3 relative overflow-hidden">
                    <!-- Islamic Corner Decoration -->
                    <div class="absolute top-0 right-0 w-16 h-16 bg-islamic-gold/10 rounded-bl-full"></div>
                    
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-islamic-gold/20 to-islamic-emerald/20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                            <i class="ri-instagram-line text-islamic-gold text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold text-islamic-green mb-4">Instagram</h3>
                        <a href="https://www.instagram.com/{{ $configs->instagram }}/" 
                           class="inline-flex items-center px-4 py-2 bg-islamic-gold/10 hover:bg-islamic-gold/20 text-islamic-gold font-semibold rounded-full transition-all duration-300 border border-islamic-gold/30">
                            <i class="ri-camera-line mr-2"></i>
                            {{ '@' . $configs->instagram }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Map and Contact Form -->
            <div class="grid lg:grid-cols-2 gap-16">
                <!-- Map -->
                <div class="order-2 lg:order-1">
                    <div class="bg-white/90 backdrop-blur-md rounded-3xl shadow-xl border border-islamic-gold/20 p-8 relative overflow-hidden">
                        <!-- Islamic Corner Decoration -->
                        <div class="absolute top-0 right-0 w-24 h-24 bg-islamic-emerald/10 rounded-bl-full"></div>
                        
                        <div class="relative">
                            <div class="flex items-center mb-8">
                                <div class="w-12 h-12 bg-islamic-gold/20 rounded-full flex items-center justify-center mr-4">
                                    <i class="ri-map-2-line text-islamic-gold text-xl"></i>
                                </div>
                                <h2 class="text-3xl font-bold text-islamic-green">Lokasi Kami</h2>
                            </div>
                            <div class="rounded-2xl overflow-hidden shadow-lg border border-islamic-gold/20">
                                <iframe
                                    src="{{ $configs->map }}"
                                    width="100%" 
                                    height="500" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="order-1 lg:order-2">
                    <div class="bg-white/90 backdrop-blur-md rounded-3xl shadow-xl border border-islamic-gold/20 p-8 relative overflow-hidden">
                        <!-- Islamic Pattern Overlay -->
                        <div class="absolute top-0 left-0 w-32 h-32 opacity-5">
                            <div class="w-full h-full" style="background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><defs><pattern id=%22islamic%22 patternUnits=%22userSpaceOnUse%22 width=%2220%22 height=%2220%22><circle cx=%2210%22 cy=%2210%22 r=%222%22 fill=%22%23D4AF37%22/></pattern></defs><rect width=%22100%25%22 height=%22100%25%22 fill=%22url(%23islamic)%22/></svg>'); background-size: 20px 20px;"></div>
                        </div>

                        <div class="relative">
                            <div class="flex items-center mb-8">
                                <div class="w-12 h-12 bg-islamic-emerald/20 rounded-full flex items-center justify-center mr-4">
                                    <i class="ri-message-2-line text-islamic-emerald text-xl"></i>
                                </div>
                                <h2 class="text-3xl font-bold text-islamic-green">Kirim Pesan</h2>
                            </div>
                            
                            <!-- Error Messages -->
                            @if ($errors->any())
                                <div class="mb-8">
                                    @foreach ($errors->all() as $error)
                                        <div class="p-4 mb-3 text-sm text-red-700 bg-red-50 border-l-4 border-red-400 rounded-lg backdrop-blur-sm" role="alert">
                                            <div class="flex items-center">
                                                <i class="ri-error-warning-line mr-2"></i>
                                                {{ $error }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Success Message -->
                            @if (session('success'))
                                <div class="p-4 mb-8 text-sm text-islamic-green bg-islamic-emerald/10 border-l-4 border-islamic-emerald rounded-lg backdrop-blur-sm" role="alert">
                                    <div class="flex items-center">
                                        <i class="ri-check-line mr-2"></i>
                                        <strong>Alhamdulillah!</strong> {{ session('success') }}
                                    </div>
                                </div>
                            @endif

                            <form action="/mail/add" method="POST" class="space-y-6">
                                @csrf
                                
                                <!-- Name Field -->
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-islamic-green mb-3">
                                        <i class="ri-user-line mr-2"></i>Nama Lengkap <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           id="name" 
                                           name="name"
                                           class="w-full px-6 py-4 border border-islamic-gold/30 rounded-2xl focus:ring-2 focus:ring-islamic-emerald focus:border-islamic-emerald bg-white/50 backdrop-blur-sm transition-all duration-300 @error('name') border-red-500 @enderror"
                                           value="{{ old('name') }}"
                                           placeholder="Masukkan nama lengkap Anda">
                                </div>

                                <!-- Email Field -->
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-islamic-green mb-3">
                                        <i class="ri-mail-line mr-2"></i>Email <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" 
                                           id="email" 
                                           name="email"
                                           class="w-full px-6 py-4 border border-islamic-gold/30 rounded-2xl focus:ring-2 focus:ring-islamic-emerald focus:border-islamic-emerald bg-white/50 backdrop-blur-sm transition-all duration-300 @error('email') border-red-500 @enderror"
                                           value="{{ old('email') }}"
                                           placeholder="nama@email.com">
                                </div>

                                <!-- Subject Field -->
                                <div>
                                    <label for="subject" class="block text-sm font-semibold text-islamic-green mb-3">
                                        <i class="ri-bookmark-line mr-2"></i>Subjek <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           id="subject" 
                                           name="subject"
                                           class="w-full px-6 py-4 border border-islamic-gold/30 rounded-2xl focus:ring-2 focus:ring-islamic-emerald focus:border-islamic-emerald bg-white/50 backdrop-blur-sm transition-all duration-300 @error('subject') border-red-500 @enderror"
                                           value="{{ old('subject') }}"
                                           placeholder="Topik pesan Anda">
                                </div>

                                <!-- Message Field -->
                                <div>
                                    <label for="message" class="block text-sm font-semibold text-islamic-green mb-3">
                                        <i class="ri-message-3-line mr-2"></i>Pesan <span class="text-red-500">*</span>
                                    </label>
                                    <textarea id="message" 
                                              name="description" 
                                              rows="6"
                                              class="w-full px-6 py-4 border border-islamic-gold/30 rounded-2xl focus:ring-2 focus:ring-islamic-emerald focus:border-islamic-emerald bg-white/50 backdrop-blur-sm transition-all duration-300 resize-vertical @error('message') border-red-500 @enderror"
                                              placeholder="Tulis pesan atau pertanyaan Anda tentang paket umrah & haji...">{{ old('message') }}</textarea>
                                </div>

                                {{-- CAPTCHA --}}
                                <div>
                                    <label for="captcha" class="block text-sm font-semibold text-islamic-green mb-3">
                                        <i class="ri-shield-check-line mr-2"></i>Kode Verifikasi
                                    </label>
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ captcha_src() }}" alt="CAPTCHA"
                                            class="captcha-img border border-islamic-gold/30 rounded-2xl p-2 bg-white/50" data-refresh-config="default">
                                        <button type="button"
                                            class="px-4 py-2 bg-islamic-gold/20 hover:bg-islamic-gold/30 text-islamic-gold rounded-2xl transition-all duration-300 btn-refresh-captcha border border-islamic-gold/30">
                                            <i class="ri-refresh-line mr-1"></i>
                                            Refresh
                                        </button>
                                    </div>
                                    <input type="text" id="captcha" name="captcha"
                                        class="mt-4 w-full px-6 py-4 border border-islamic-gold/30 rounded-2xl focus:ring-2 focus:ring-islamic-emerald focus:border-islamic-emerald bg-white/50 backdrop-blur-sm transition-all duration-300 @error('captcha') border-red-500 @enderror"
                                        placeholder="Masukkan kode verifikasi">
                                </div>

                                <!-- Submit Button -->
                                <button type="submit"
                                        class="group w-full px-8 py-5 bg-gradient-to-r from-islamic-green to-islamic-emerald hover:from-islamic-emerald hover:to-islamic-green text-white font-bold text-lg rounded-2xl transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105">
                                    <i class="ri-send-plane-line mr-3 group-hover:translate-x-1 transition-transform duration-300"></i>
                                    Kirim Pesan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Contact Info -->
            <div class="mt-20">
                <div class="bg-gradient-to-r from-islamic-green/10 via-islamic-emerald/5 to-islamic-gold/10 backdrop-blur-md rounded-3xl p-10 shadow-xl border border-islamic-gold/20 relative overflow-hidden">
                    <!-- Islamic Decorative Elements -->
                    <div class="absolute top-0 left-0 w-32 h-32 bg-islamic-gold/5 rounded-full blur-2xl"></div>
                    <div class="absolute bottom-0 right-0 w-40 h-40 bg-islamic-emerald/5 rounded-full blur-2xl"></div>
                    
                    <div class="relative text-center">
                        <div class="inline-flex items-center bg-islamic-gold/20 backdrop-blur-sm border border-islamic-gold/30 rounded-full px-6 py-3 mb-8">
                            <i class="ri-time-line text-islamic-gold mr-2"></i>
                            <span class="text-islamic-green font-semibold">Jam Layanan</span>
                        </div>
                        
                        <h3 class="text-3xl font-bold text-islamic-green mb-8">Jam Operasional Konsultasi</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="bg-white/50 backdrop-blur-sm rounded-2xl p-6 border border-islamic-gold/20">
                                <div class="w-12 h-12 bg-islamic-emerald/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="ri-calendar-line text-islamic-emerald text-xl"></i>
                                </div>
                                <p class="font-bold text-islamic-green text-lg mb-2">Senin - Jumat</p>
                                <p class="text-gray-600">08.00 - 17.00 WIB</p>
                            </div>
                            <div class="bg-white/50 backdrop-blur-sm rounded-2xl p-6 border border-islamic-gold/20">
                                <div class="w-12 h-12 bg-islamic-gold/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="ri-calendar-2-line text-islamic-gold text-xl"></i>
                                </div>
                                <p class="font-bold text-islamic-green text-lg mb-2">Sabtu</p>
                                <p class="text-gray-600">08.00 - 15.00 WIB</p>
                            </div>
                            <div class="bg-white/50 backdrop-blur-sm rounded-2xl p-6 border border-islamic-gold/20">
                                <div class="w-12 h-12 bg-islamic-green/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="ri-moon-line text-islamic-green text-xl"></i>
                                </div>
                                <p class="font-bold text-islamic-green text-lg mb-2">Minggu</p>
                                <p class="text-gray-600">Tutup</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Decorative Elements -->
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-islamic-gold/5 rounded-full blur-3xl"></div>
        <div class="absolute top-0 right-0 w-96 h-96 bg-islamic-emerald/5 rounded-full blur-3xl"></div>
    </section>

    <script>
        // CAPTCHA refresh functionality
        document.addEventListener('DOMContentLoaded', function() {
            const refreshBtn = document.querySelector('.btn-refresh-captcha');
            if (refreshBtn) {
                refreshBtn.addEventListener('click', function() {
                    var captchaImage = document.querySelector('.captcha-img');
                    var captchaSrc = captchaImage.src.split('?')[0];
                    captchaImage.src = captchaSrc + '?' + Math.random();
                });
            }
        });

        // Enhanced form validation with Islamic theme
        document.querySelector('form')?.addEventListener('submit', function(e) {
            const requiredFields = ['name', 'email', 'subject', 'message'];
            let isValid = true;

            requiredFields.forEach(field => {
                const input = document.getElementById(field);
                if (!input.value.trim()) {
                    input.classList.add('border-red-500');
                    input.classList.remove('border-islamic-gold/30');
                    isValid = false;
                } else {
                    input.classList.remove('border-red-500');
                    input.classList.add('border-islamic-gold/30');
                }
            });

            if (!isValid) {
                e.preventDefault();
                // Create Islamic-themed alert
                const alertDiv = document.createElement('div');
                alertDiv.className = 'fixed top-4 right-4 p-4 bg-red-50 border-l-4 border-red-400 rounded-lg shadow-xl z-50';
                alertDiv.innerHTML = `
                    <div class="flex items-center">
                        <i class="ri-error-warning-line text-red-500 mr-2"></i>
                        <span class="text-red-700">Mohon lengkapi semua field yang diperlukan.</span>
                    </div>
                `;
                document.body.appendChild(alertDiv);
                
                setTimeout(() => {
                    alertDiv.remove();
                }, 5000);
            }
        });
    </script>
@endsection