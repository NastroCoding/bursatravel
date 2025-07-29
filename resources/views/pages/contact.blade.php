@extends('layouts.main')

@section('content')
    <!-- Contact Section -->
    <section class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-medium text-gray-800 mb-4">Hubungi Kami</h1>
                <div class="w-16 h-0.5 bg-blue-600 mx-auto"></div>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                    Siap membantu Anda merencanakan perjalanan spiritual yang tak terlupakan. 
                    Hubungi kami melalui berbagai cara di bawah ini.
                </p>
            </div>

            <!-- Contact Methods -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
                <!-- Address -->
                <div class="text-center p-6 bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fa-solid fa-location-dot text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-800 mb-2">Alamat</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">{{ $configs->address }}</p>
                </div>

                <!-- WhatsApp -->
                <div class="text-center p-6 bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fab fa-whatsapp text-green-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-800 mb-2">WhatsApp</h3>
                    <a href="https://wa.me/62{{ $configs->whatsapp_num }}" 
                       class="text-green-600 hover:text-green-800 font-medium transition-colors">
                        0{{ $configs->whatsapp_num }}
                    </a>
                </div>

                <!-- Email -->
                <div class="text-center p-6 bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-800 mb-2">Email</h3>
                    <a href="mailto:{{ $configs->gmail }}" 
                       class="text-red-600 hover:text-red-800 text-sm transition-colors break-all">
                        {{ $configs->gmail }}
                    </a>
                </div>

                <!-- Instagram -->
                <div class="text-center p-6 bg-white rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                    <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fab fa-instagram text-pink-600 text-xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-800 mb-2">Instagram</h3>
                    <a href="https://www.instagram.com/{{ $configs->instagram }}/" 
                       class="text-pink-600 hover:text-pink-800 font-medium transition-colors">
                        {{ '@' . $configs->instagram }}
                    </a>
                </div>
            </div>

            <!-- Map and Contact Form -->
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Map -->
                <div class="order-2 lg:order-1">
                    <h2 class="text-2xl font-medium text-gray-800 mb-6">Lokasi Kami</h2>
                    <div class="rounded-lg overflow-hidden shadow-sm border border-gray-100">
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

                <!-- Contact Form -->
                <div class="order-1 lg:order-2">
                    <h2 class="text-2xl font-medium text-gray-800 mb-6">Kirim Pesan</h2>
                    
                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="mb-6">
                            @foreach ($errors->all() as $error)
                                <div class="p-4 mb-3 text-sm text-red-700 bg-red-50 border border-red-200 rounded-lg" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="p-4 mb-6 text-sm text-green-700 bg-green-50 border border-green-200 rounded-lg" role="alert">
                            <strong>Berhasil!</strong> {{ session('success') }}
                        </div>
                    @endif

                    <form action="/mail/add" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="name" 
                                   name="name"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('name') border-red-500 @enderror"
                                   value="{{ old('name') }}"
                                   placeholder="Masukkan nama lengkap Anda">
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" 
                                   id="email" 
                                   name="email"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('email') border-red-500 @enderror"
                                   value="{{ old('email') }}"
                                   placeholder="nama@email.com">
                        </div>

                        <!-- Subject Field -->
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                Subjek <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   id="subject" 
                                   name="subject"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('subject') border-red-500 @enderror"
                                   value="{{ old('subject') }}"
                                   placeholder="Topik pesan Anda">
                        </div>

                        <!-- Message Field -->
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                                Pesan <span class="text-red-500">*</span>
                            </label>
                            <textarea id="message" 
                                      name="description" 
                                      rows="5"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-vertical @error('message') border-red-500 @enderror"
                                      placeholder="Tulis pesan Anda di sini...">{{ old('message') }}</textarea>
                        </div>

                        {{-- CAPTCHA (commented out as in original) --}}
                        {{-- <div>
                            <label for="captcha" class="block text-sm font-medium text-gray-700 mb-2">CAPTCHA</label>
                            <div class="flex items-center space-x-3">
                                <img src="{{ captcha_src() }}" alt="CAPTCHA"
                                    class="captcha-img border border-gray-300 rounded-lg" data-refresh-config="default">
                                <button type="button"
                                    class="px-3 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition-colors btn-refresh-captcha">
                                    Refresh
                                </button>
                            </div>
                            <input type="text" id="captcha" name="captcha"
                                class="mt-3 w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('captcha') border-red-500 @enderror"
                                placeholder="Masukkan kode CAPTCHA">
                        </div> --}}

                        <!-- Submit Button -->
                        <button type="submit"
                                class="w-full px-6 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 transition-colors duration-300">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Additional Contact Info -->
            <div class="mt-16 bg-gray-50 rounded-lg p-8">
                <div class="text-center">
                    <h3 class="text-xl font-medium text-gray-800 mb-4">Jam Operasional</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm text-gray-600">
                        <div>
                            <p class="font-medium text-gray-800">Senin - Jumat</p>
                            <p>08.00 - 17.00 WIB</p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Sabtu</p>
                            <p>08.00 - 15.00 WIB</p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">Minggu</p>
                            <p>Tutup</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // CAPTCHA refresh functionality (if needed)
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

        // Form validation enhancement
        document.getElementById('contact-form')?.addEventListener('submit', function(e) {
            const requiredFields = ['name', 'email', 'subject', 'message'];
            let isValid = true;

            requiredFields.forEach(field => {
                const input = document.getElementById(field);
                if (!input.value.trim()) {
                    input.classList.add('border-red-500');
                    isValid = false;
                } else {
                    input.classList.remove('border-red-500');
                }
            });

            if (!isValid) {
                e.preventDefault();
                alert('Mohon lengkapi semua field yang diperlukan.');
            }
        });
    </script>
@endsection