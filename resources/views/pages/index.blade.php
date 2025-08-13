@extends('layouts.main')

@section('content')
    <header id="home"
        class="relative min-h-screen bg-gradient-to-br from-green-800 via-green-700 to-green-800 overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat blur-sm"
            style="background-image: url('{{ asset('img/background.JPG') }}');">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <!-- Islamic Pattern Overlay -->
        <div class="absolute inset-0 islamic-pattern opacity-5"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 min-h-screen flex items-center">
            <div class="grid lg:grid-cols-2 gap-12 items-center w-full">

                <!-- Content Section -->
                <div class="text-white space-y-8 lg:pr-8">
                    <!-- Subtitle -->
                    <div
                        class="inline-flex items-center bg-yellow-500/10 backdrop-blur-sm border border-yellow-500/20 rounded-full px-6 py-3">
                        <i class="ri-star-line text-yellow-400 mr-2"></i>
                        <p class="text-yellow-400 font-medium text-lg">Umroh Mudah, Nyaman Ibadah</p>
                    </div>

                    <!-- Main Title -->
                    <div class="space-y-4">
                        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold leading-tight">
                            <span class="grad">
                                BURSA
                            </span>
                            <br>
                            <span class="text-white font-grad">Umroh Haji</span>
                            <br>
                            <span class="text-red-400 font-grad">Indo</span><span class="text-white font-grad">nesia</span>
                        </h1>

                        <!-- Description -->
                        <p class="text-lg text-gray-200 max-w-lg leading-relaxed">
                            Wujudkan impian suci Anda bersama kami. Perjalanan ibadah yang berkah, aman, dan penuh makna
                            menanti Anda.
                        </p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row items-start sm:items-center space-y-4 sm:space-y-0 sm:space-x-6">
                        <!-- Primary CTA -->
                        <button
                            class="group bg-yellow-400 hover:bg-yellow-500 text-gray-900 px-8 py-4 rounded-full font-bold text-lg shadow-lg transition-all duration-300 transform hover:scale-105 flex items-center space-x-3"
                            type="submit" data-modal-target="contact-modal-display"
                            data-modal-toggle="contact-modal-display">
                            <i class="ri-flight-takeoff-line group-hover:animate-bounce"></i>
                            <span>Pesan Kursi Sekarang!</span>
                        </button>

                        <!-- WhatsApp Button -->
                        <a href="#"
                            class="group bg-green-500/10 backdrop-blur-sm border border-green-500/30 hover:bg-green-500 text-green-400 hover:text-white px-6 py-4 rounded-full font-semibold transition-all duration-300 transform hover:scale-105 flex items-center space-x-3">
                            <i class="ri-whatsapp-line text-2xl group-hover:animate-bounce"></i>
                            <span class="hidden sm:inline">Chat WhatsApp</span>
                        </a>
                    </div>

                    <!-- Trust Indicators -->
                    <div class="pt-8 border-t border-white/10">
                        <div class="grid grid-cols-3 gap-4 text-center">
                            <div class="text-white">
                                <div class="text-2xl font-bold text-yellow-400">1000+</div>
                                <div class="text-sm text-gray-300">Jamaah Puas</div>
                            </div>
                            <div class="text-white">
                                <div class="text-2xl font-bold text-yellow-400">15+</div>
                                <div class="text-sm text-gray-300">Tahun Pengalaman</div>
                            </div>
                            <div class="text-white">
                                <div class="text-2xl font-bold text-yellow-400">99%</div>
                                <div class="text-sm text-gray-300">Rating Kepuasan</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image Section - Kaaba Logo -->
                <div class="relative flex justify-center lg:justify-end">
                    <div class="relative">
                        <!-- Glowing Background Circle -->
                        <div class="absolute inset-0 bg-yellow-400/10 rounded-full blur-3xl transform scale-150">
                        </div>

                        <!-- Logo Container -->
                        <div
                            class="relative bg-white/5 backdrop-blur-md border border-yellow-400/20 rounded-full p-8 shadow-2xl">
                            <div class="w-80 h-80 lg:w-96 lg:h-96 flex items-center justify-center">
                                <img src="{{ asset('img/kaabah.png') }}" alt="Kaaba - Holy Mosque"
                                    class="w-full h-full object-contain filter drop-shadow-lg" />
                            </div>
                        </div>

                        <!-- Decorative Elements -->
                        <div
                            class="absolute -top-4 -right-4 bg-yellow-400 text-gray-900 w-12 h-12 rounded-full flex items-center justify-center font-bold text-xl">
                            ☪
                        </div>
                        <div class="absolute -bottom-4 -left-4 bg-green-500 text-white w-10 h-10 rounded-full flex items-center justify-center text-lg"
                            style="animation-delay: -1s;">
                            ✦
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Down Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-white/60 animate-bounce">
            <div class="flex flex-col items-center space-y-2">
                <span class="text-sm">Scroll Down</span>
                <i class="ri-arrow-down-line text-xl"></i>
            </div>
        </div>
    </header>


    <!-- Contact modal -->
    <div id="contact-modal-display" aria-hidden="true" data-modal-backdrop="static"
        class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-xl shadow-xl overflow-hidden">
                <!-- Modal header -->
                <div class="bg-gradient-to-r from-green-500 to-green-600 p-6 text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-customer-service-2-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-2">Kontak Kami</h3>
                    <p class="text-green-100 text-sm">Hubungi admin untuk konsultasi dan pemesanan</p>
                    <button type="button"
                        class="absolute top-4 right-4 text-white/80 hover:text-white bg-white/10 hover:bg-white/20 rounded-full w-8 h-8 flex items-center justify-center transition-all duration-200"
                        data-modal-hide="contact-modal-display">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-6 space-y-4">
                    <div class="space-y-3">
                        <a href="https://wa.me/62{{ $configs->whatsapp_num }}"
                            class="w-full flex items-center justify-center space-x-3 p-4 border-2 border-green-500 text-green-600 bg-white hover:bg-green-500 hover:text-white rounded-xl transition-all duration-200 font-medium">
                            <i class="ri-whatsapp-line text-xl"></i>
                            <span>Kontak Admin 1</span>
                        </a>
                        @if ($configs->whatsapp_num2)
                            <a href="https://wa.me/62{{ $configs->whatsapp_num2 }}"
                                class="w-full flex items-center justify-center space-x-3 p-4 border-2 border-green-500 text-green-600 bg-white hover:bg-green-500 hover:text-white rounded-xl transition-all duration-200 font-medium">
                                <i class="ri-whatsapp-line text-xl"></i>
                                <span>Kontak Admin 2</span>
                            </a>
                        @endif
                    </div>
                    <div class="text-center pt-4 border-t border-gray-100">
                        <p class="text-gray-600 text-sm">
                            <i class="ri-time-line mr-1"></i>
                            Respon cepat dalam 5 menit
                        </p>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="bg-gray-50 px-6 py-4 border-t border-gray-100">
                    <button data-modal-hide="contact-modal-display" type="button"
                        class="w-full px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-4 focus:ring-gray-100 transition-all duration-200">
                        <i class="ri-arrow-left-line mr-2"></i>
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Image Carousel -->
    <section class="py-20 bg-gradient-to-b from-crescent via-white to-green-50 relative overflow-hidden">
        <!-- Islamic Pattern Background -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-0 left-0 w-full h-full"
                style="background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 100 100\"><defs><pattern id=\"islamic\" x=\"0\" y=\"0\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\"><circle cx=\"10\" cy=\"10\" r=\"2\" fill=\"%23006233\"/><path d=\"M10 5 L12 8 L10 15 L8 8 Z\" fill=\"%23006233\"/></pattern></defs><rect width=\"100\" height=\"100\" fill=\"url(%23islamic)\"/></svg>'); background-size: 80px 80px;">
            </div>
        </div>

        <div class="container mx-auto px-4 relative">
            <!-- Header with Islamic Symbolism -->
            <div class="text-center mb-16">
                <!-- Crescent and Star Symbol -->
                <div class="flex justify-center mb-6">
                    <div class="relative">
                        <div
                            class="w-20 h-20 rounded-full border-4 border-islamic-gold bg-gradient-to-br from-islamic-gold to-yellow-600 flex items-center justify-center shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M9.5 2C5.4 2 2 5.4 2 9.5C2 13.6 5.4 17 9.5 17C11.3 17 13 16.3 14.3 15.1C13.7 15.4 13 15.5 12.3 15.5C8.7 15.5 5.8 12.6 5.8 9C5.8 5.4 8.7 2.5 12.3 2.5C13 2.5 13.7 2.6 14.3 2.9C13 1.7 11.3 1 9.5 1V2Z" />
                                <polygon points="18,7 19,10 22,10 19.5,12 20.5,15 18,13 15.5,15 16.5,12 14,10 17,10" />
                            </svg>
                        </div>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-islamic-emerald rounded-full animate-pulse"></div>
                    </div>
                </div>

                <h2
                    class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-islamic-green to-islamic-emerald mb-6">
                    <span class="block text-2xl md:text-3xl text-islamic-gold font-arabic mb-2">بركات الحج والعمرة</span>
                    Moment Kebersamaan Kami
                </h2>
                <div class="flex items-center justify-center mb-6">
                    <div class="h-px bg-gradient-to-r from-transparent via-islamic-gold to-transparent w-32"></div>
                    <div class="mx-4 text-islamic-gold">
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L14.5 8.5L22 9L16.5 14L18 22L12 18.5L6 22L7.5 14L2 9L9.5 8.5L12 2Z" />
                        </svg>
                    </div>
                    <div class="h-px bg-gradient-to-r from-transparent via-islamic-gold to-transparent w-32"></div>
                </div>
                <p class="text-gray-700 max-w-3xl mx-auto text-lg leading-relaxed">
                    <span class="text-islamic-green font-semibold">ﷺ</span> Mari bersama membangun momen spiritual yang tak
                    terlupakan dalam perjalanan suci Umrah.
                    Dengarkan kisah inspiratif dari para jamaah yang telah merasakan kedamaian dan keberkahan.
                </p>
            </div>

            <!-- Enhanced Carousel with Islamic Frame -->
            <div class="relative max-w-7xl mx-auto mb-20">
                <div class="relative">
                    <!-- Islamic Decorative Frame -->
                    <div
                        class="absolute -inset-4 bg-gradient-to-r from-islamic-gold via-yellow-500 to-islamic-gold rounded-3xl opacity-20 blur-xl">
                    </div>
                    <div
                        class="absolute -inset-2 bg-gradient-to-r from-islamic-green to-islamic-emerald rounded-2xl opacity-10">
                    </div>

                    <!-- Carousel Container with Mihrab-inspired design -->
                    <div id="carousel"
                        class="relative overflow-hidden rounded-2xl shadow-2xl border-4 border-islamic-gold/30">
                        <div
                            class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-2 w-8 h-8 bg-islamic-gold rounded-full flex items-center justify-center">
                            <div class="w-4 h-4 bg-white rounded-full"></div>
                        </div>

                        <div id="carousel-inner" class="flex transition-transform duration-500 ease-in-out">
                            @foreach ($slideshows as $index => $slide)
                                <div class="carousel-slide min-w-full relative">
                                    <img src="{{ Storage::url($slide->image) }}" alt="{{ $slide->title }}"
                                        class="w-full h-96 md:h-[500px] object-cover" />

                                    <!-- Islamic Pattern Overlay -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-kaaba-black/80 via-islamic-green/20 to-transparent">
                                    </div>

                                    <!-- Content with Islamic Design -->
                                    <div class="absolute bottom-0 left-0 right-0 p-8">
                                        <div
                                            class="bg-black/40 backdrop-blur-md rounded-xl p-6 border border-islamic-gold/30">
                                            <div class="flex items-center mb-4">
                                                <div
                                                    class="w-12 h-12 bg-islamic-gold rounded-full flex items-center justify-center mr-4">
                                                    <svg class="w-6 h-6 text-white" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12 2L15 9L22 9L17 14L19 22L12 18L5 22L7 14L2 9L9 9L12 2Z" />
                                                    </svg>
                                                </div>
                                                <div class="h-px bg-islamic-gold flex-1"></div>
                                            </div>
                                            <h3 class="text-2xl md:text-3xl font-bold mb-3 text-islamic-gold font-arabic">
                                                {{ $slide->title }}
                                            </h3>
                                            <p class="text-white text-lg opacity-90 leading-relaxed">
                                                {{ $slide->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Enhanced Navigation with Islamic Design -->
                    <button id="prevBtn"
                        class="absolute left-6 top-1/2 transform -translate-y-1/2 bg-islamic-green/80 backdrop-blur-sm hover:bg-islamic-green text-white p-4 rounded-full transition-all duration-300 z-10 shadow-lg border-2 border-islamic-gold/50 hover:scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="nextBtn"
                        class="absolute right-6 top-1/2 transform -translate-y-1/2 bg-islamic-green/80 backdrop-blur-sm hover:bg-islamic-green text-white p-4 rounded-full transition-all duration-300 z-10 shadow-lg border-2 border-islamic-gold/50 hover:scale-110">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <!-- Decorative Islamic Indicators -->
                    <div class="flex justify-center mt-8 space-x-3">
                        @foreach ($slideshows as $index => $slide)
                            <button class="indicator group transition-all duration-300" data-slide="{{ $index }}">
                                <div
                                    class="w-4 h-4 rounded-full bg-islamic-gold/30 group-hover:bg-islamic-gold border-2 border-islamic-gold/50 transition-all duration-300 relative">
                                    <div
                                        class="absolute inset-0.5 rounded-full bg-islamic-gold opacity-0 group-hover:opacity-100 transition-opacity">
                                    </div>
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Enhanced Testimonials Grid with Islamic Cards -->
            <div class="max-w-8xl mx-auto">
                <!-- Section Divider with Islamic Pattern -->
                <div class="flex items-center justify-center mb-12">
                    <div class="h-px bg-gradient-to-r from-transparent via-islamic-gold to-transparent w-48"></div>
                    <div class="mx-6 text-islamic-gold">
                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L14 7H19L15.5 10.5L17 16L12 13L7 16L8.5 10.5L5 7H10L12 2Z" />
                        </svg>
                    </div>
                    <div class="h-px bg-gradient-to-r from-transparent via-islamic-gold to-transparent w-48"></div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-8 p-4">
                    @foreach ($testimonials->sortByDesc('created_at') as $testimony)
                        @php
                            $youtube_id = null;
                            if ($testimony->youtube_url) {
                                if (
                                    preg_match(
                                        '/(?:youtube\.com\/(?:shorts\/|watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
                                        $testimony->youtube_url,
                                        $matches,
                                    )
                                ) {
                                    $youtube_id = $matches[1];
                                } elseif (preg_match('/^([a-zA-Z0-9_-]{11})$/', $testimony->youtube_url)) {
                                    $youtube_id = $testimony->youtube_url;
                                }
                            }

                            $filePath = $testimony->video;
                            $extension = $filePath ? strtolower(pathinfo($filePath, PATHINFO_EXTENSION)) : null;
                            $is_short = $testimony->youtube_url && strpos($testimony->youtube_url, 'shorts') !== false;
                            $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                            $isVideo = in_array($extension, ['mp4', 'webm', 'ogg']);
                        @endphp

                        @if ($youtube_id)
                            <!-- Enhanced YouTube Card with Islamic Design -->
                            <div class="group relative">
                                <!-- Decorative Background -->
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-islamic-gold to-islamic-emerald rounded-2xl opacity-30 blur-sm group-hover:opacity-50 transition duration-300">
                                </div>

                                <div
                                    class="relative bg-white rounded-2xl shadow-xl overflow-hidden border-2 border-islamic-gold/20 hover:border-islamic-gold/40 transition-all duration-300 transform group-hover:scale-105">
                                    <!-- Islamic Corner Decoration -->
                                    <div class="absolute top-0 right-0 w-16 h-16 bg-islamic-gold/10 rounded-bl-2xl">
                                        <div class="absolute top-2 right-2 w-3 h-3 bg-islamic-gold rounded-full"></div>
                                    </div>

                                    <div
                                        class="w-full h-[500px] flex justify-center items-center bg-gradient-to-b from-kaaba-black to-gray-900 relative">
                                        <!-- Decorative Islamic Pattern Border -->
                                        <div
                                            class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-islamic-gold via-yellow-500 to-islamic-gold">
                                        </div>

                                        @if ($is_short)
                                            <iframe class="w-[320px] h-[500px] rounded-lg"
                                                src="https://www.youtube.com/embed/{{ $youtube_id }}?rel=0&modestbranding=1"
                                                title="YouTube Shorts player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                            </iframe>
                                        @else
                                            <iframe class="w-full h-full aspect-video rounded-lg"
                                                src="https://www.youtube.com/embed/{{ $youtube_id }}?rel=0&modestbranding=1"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                            </iframe>
                                        @endif
                                    </div>
                                    <div class="p-6 bg-gradient-to-r from-green-50 to-crescent">
                                        <div class="flex items-center space-x-4">
                                            <div class="relative">
                                                <div
                                                    class="w-14 h-14 rounded-full overflow-hidden border-3 border-islamic-gold shadow-lg">
                                                    @if ($testimony->image)
                                                        <img src="{{ Storage::url($testimony->image) ?? 'https://placehold.co/40' }}"
                                                            alt="{{ $testimony->name }}"
                                                            class="w-full h-full object-cover">
                                                    @endif
                                                </div>
                                                <div
                                                    class="absolute -top-1 -right-1 w-6 h-6 bg-islamic-emerald rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <h3 class="font-bold text-lg text-islamic-green">{{ $testimony->name }}
                                                </h3>
                                                @if ($testimony->caption)
                                                    <p class="text-gray-600 text-sm font-medium">{{ $testimony->caption }}
                                                    </p>
                                                @endif
                                                <div class="flex items-center mt-1">
                                                    <div class="flex text-islamic-gold">
                                                        @for ($i = 0; $i < 5; $i++)
                                                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12 2l2.4 7.4h7.6l-6 4.6 2.4 7.4-6-4.6-6 4.6 2.4-7.4-6-4.6h7.6z" />
                                                            </svg>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($isVideo)
                            <!-- Enhanced Video Card -->
                            <div class="group relative">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-islamic-gold to-islamic-emerald rounded-2xl opacity-30 blur-sm group-hover:opacity-50 transition duration-300">
                                </div>

                                <div
                                    class="relative bg-white rounded-2xl shadow-xl overflow-hidden border-2 border-islamic-gold/20 hover:border-islamic-gold/40 transition-all duration-300 transform group-hover:scale-105">
                                    <div class="absolute top-0 right-0 w-16 h-16 bg-islamic-gold/10 rounded-bl-2xl">
                                        <div class="absolute top-2 right-2 w-3 h-3 bg-islamic-gold rounded-full"></div>
                                    </div>

                                    <!-- Fixed-height container for uniform cards -->
                                    <div
                                        class="w-full h-[500px] bg-gradient-to-b from-kaaba-black to-gray-900 flex items-center justify-center relative">
                                        <div
                                            class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-islamic-gold via-yellow-500 to-islamic-gold">
                                        </div>
                                        <video controls preload="metadata"
                                            class="max-h-full max-w-full object-contain rounded-t-2xl bg-black">
                                            <source src="{{ Storage::url($testimony->video) }}" type="video/mp4">
                                            <source src="{{ Storage::url($testimony->video) }}" type="video/webm">
                                            <source src="{{ Storage::url($testimony->video) }}" type="video/ogg">
                                        </video>
                                    </div>

                                    <div class="p-6 bg-gradient-to-r from-green-50 to-crescent">
                                        <div class="flex items-center space-x-4">
                                            <div class="relative">
                                                <div
                                                    class="w-14 h-14 rounded-full overflow-hidden border-3 border-islamic-gold shadow-lg">
                                                    <img src="{{ Storage::url($testimony->image) ?? 'https://placehold.co/40' }}"
                                                        alt="{{ $testimony->name }}" class="w-full h-full object-cover">
                                                </div>
                                                <div
                                                    class="absolute -top-1 -right-1 w-6 h-6 bg-islamic-emerald rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <h3 class="font-bold text-lg text-islamic-green">{{ $testimony->name }}
                                                </h3>
                                                @if ($testimony->caption)
                                                    <p class="text-gray-600 text-sm font-medium">{{ $testimony->caption }}
                                                    </p>
                                                @endif
                                                <div class="flex text-islamic-gold mt-1">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                                            <path
                                                                d="M12 2l2.4 7.4h7.6l-6 4.6 2.4 7.4-6-4.6-6 4.6 2.4-7.4-6-4.6h7.6z" />
                                                        </svg>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($isImage)
                            <!-- Enhanced Image Card -->
                            <div class="group relative">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-islamic-gold to-islamic-emerald rounded-2xl opacity-30 blur-sm group-hover:opacity-50 transition duration-300">
                                </div>

                                <div
                                    class="relative bg-white rounded-2xl shadow-xl overflow-hidden border-2 border-islamic-gold/20 hover:border-islamic-gold/40 transition-all duration-300 transform group-hover:scale-105">
                                    <div class="absolute top-0 right-0 w-16 h-16 bg-islamic-gold/10 rounded-bl-2xl">
                                        <div class="absolute top-2 right-2 w-3 h-3 bg-islamic-gold rounded-full"></div>
                                    </div>

                                    <!-- Fixed-height container for uniform cards -->
                                    <div
                                        class="w-full h-[500px] bg-gradient-to-b from-kaaba-black to-gray-900 flex items-center justify-center relative">
                                        <div
                                            class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-islamic-gold via-yellow-500 to-islamic-gold">
                                        </div>
                                        <img src="{{ Storage::url($testimony->video) }}" alt="{{ $testimony->name }}"
                                            class="max-h-full max-w-full object-contain rounded-t-2xl bg-black">
                                    </div>

                                    <div class="p-6 bg-gradient-to-r from-green-50 to-crescent">
                                        <div class="flex items-center space-x-4">
                                            <div class="relative">
                                                <div
                                                    class="w-14 h-14 rounded-full overflow-hidden border-3 border-islamic-gold shadow-lg">
                                                    <img src="{{ Storage::url($testimony->image) ?? 'https://placehold.co/40' }}"
                                                        alt="{{ $testimony->name }}" class="w-full h-full object-cover">
                                                </div>
                                                <div
                                                    class="absolute -top-1 -right-1 w-6 h-6 bg-islamic-emerald rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-white" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path d="M9 12l2 2 4-4" />
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex-1">
                                                <h3 class="font-bold text-lg text-islamic-green">{{ $testimony->name }}
                                                </h3>
                                                @if ($testimony->caption)
                                                    <p class="text-gray-600 text-sm font-medium">{{ $testimony->caption }}
                                                    </p>
                                                @endif
                                                <div class="flex text-islamic-gold mt-1">
                                                    @for ($i = 0; $i < 5; $i++)
                                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24">
                                                            <path
                                                                d="M12 2l2.4 7.4h7.6l-6 4.6 2.4 7.4-6-4.6-6 4.6 2.4-7.4-6-4.6h7.6z" />
                                                        </svg>
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Enhanced Text Testimonial Card with Mihrab Design -->
                            <div class="group relative">
                                <div
                                    class="absolute -inset-1 bg-gradient-to-r from-islamic-gold to-islamic-emerald rounded-2xl opacity-30 blur-sm group-hover:opacity-50 transition duration-300">
                                </div>

                                <div
                                    class="relative bg-white rounded-2xl shadow-xl overflow-hidden border-2 border-islamic-gold/20 hover:border-islamic-gold/40 transition-all duration-300 transform group-hover:scale-105">
                                    <!-- Mihrab-inspired top design -->
                                    <div class="h-20 bg-gradient-to-r from-islamic-green to-islamic-emerald relative">
                                        <div
                                            class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 w-16 h-16 bg-white rounded-full border-4 border-islamic-gold shadow-lg flex items-center justify-center">
                                            <div class="w-12 h-12 rounded-full overflow-hidden">
                                                <img src="{{ $testimony->image ? Storage::url($testimony->image) : 'https://placehold.co/40' }}"
                                                    alt="{{ $testimony->name }}" class="w-full h-full object-cover">
                                            </div>
                                        </div>
                                        <!-- Islamic geometric pattern -->
                                        <div class="absolute inset-0 opacity-20">
                                            <svg class="w-full h-full" viewBox="0 0 100 20">
                                                <pattern id="islamicPattern" x="0" y="0" width="10" height="10"
                                                    patternUnits="userSpaceOnUse">
                                                    <circle cx="5" cy="5" r="1" fill="white" />
                                                    <path d="M5 3 L6 5 L5 7 L4 5 Z" fill="white" />
                                                </pattern>
                                                <rect width="100" height="20" fill="url(#islamicPattern)" />
                                            </svg>
                                        </div>
                                    </div>

                                    <div class="px-8 pt-12 pb-8 text-center bg-gradient-to-b from-crescent to-white">
                                        <h3 class="font-bold text-xl text-islamic-green mb-2">{{ $testimony->name }}</h3>
                                        @if ($testimony->caption)
                                            <p class="text-islamic-gold font-semibold text-sm mb-4">
                                                {{ $testimony->caption }}</p>
                                        @endif

                                        <!-- Quote decoration -->
                                        <div class="flex justify-center mb-6">
                                            <div
                                                class="w-12 h-12 bg-islamic-gold/10 rounded-full flex items-center justify-center">
                                                <svg class="w-6 h-6 text-islamic-gold" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path d="M14,17H17L19,13V7H13V13H16M6,17H9L11,13V7H5V13H8L6,17Z" />
                                                </svg>
                                            </div>
                                        </div>

                                        <blockquote class="text-gray-700 mb-6 leading-relaxed italic">
                                            "{{ $testimony->description }}"
                                        </blockquote>

                                        <!-- Star rating -->
                                        <div class="flex justify-center text-islamic-gold mb-4">
                                            @for ($i = 0; $i < 5; $i++)
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 2l2.4 7.4h7.6l-6 4.6 2.4 7.4-6-4.6-6 4.6 2.4-7.4-6-4.6h7.6z" />
                                                </svg>
                                            @endfor
                                        </div>

                                        <!-- Islamic blessing -->
                                        <div class="text-islamic-emerald text-sm font-arabic">
                                            بارك الله فيكم
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @if ($configs->img_info)
        <section>
            <div class="container mx-auto">
                <div class="relative overflow-hidden shadow-2xl">
                    <!-- Banner Image -->
                    <img src="{{ Storage::url($configs->img_info) }}" alt="Promotion Banner"
                        class="w-full max-h-64 object-cover">

                    <!-- Full Centered Dark Overlay -->
                    <div class="absolute inset-0 bg-black/60 flex flex-col items-center justify-center text-center px-4">
                        @if ($configs->title_info)
                            <h2 class="text-2xl md:text-4xl font-bold text-white mb-4">
                                {{ $configs->title_info }}
                            </h2>
                        @endif
                        @if ($configs->info)
                            <p class="text-white/90 text-sm md:text-base mb-6">
                                {{ $configs->info }}
                            </p>
                        @endif
                        <a href="https://wa.me/+62{{ $configs->whatsapp_num }}"
                            class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200">
                            <i class="ri-whatsapp-line mr-2 text-lg"></i>
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if ($items->isNotEmpty())
        <!-- Item Showcase -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-grad font-bold text-gray-900 mb-4">
                        Perlengkapan Umroh & Haji
                    </h2>
                    <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                        Berikut perlengkapan umroh & haji yang disediakan oleh Bursa.
                    </p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 md:gap-6">
                    @foreach ($items as $item)
                        <div
                            class="aspect-square overflow-hidden rounded-full bg-gray-50 p-2 hover:shadow-lg transition-shadow duration-300">
                            <img src="{{ Storage::url($item->image) }}" alt="{{ $item->caption }}"
                                class="w-full h-full object-contain" loading="lazy">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="py-20 bg-crescent/10 relative overflow-hidden" id="activities">
        <!-- Islamic Pattern Background -->
        <div class="absolute inset-0 islamic-pattern opacity-5"></div>

        <!-- Floating Islamic Elements -->
        <div class="absolute top-20 right-20 text-islamic-gold/10 text-6xl animate-float pointer-events-none">☪</div>
        <div class="absolute bottom-20 left-20 text-islamic-green/10 text-4xl animate-float pointer-events-none"
            style="animation-delay: -2s;">🕌</div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center bg-islamic-gold/10 backdrop-blur-sm border border-islamic-gold/20 rounded-full px-6 py-3 mb-6">
                    <i class="ri-calendar-event-line text-islamic-gold mr-2"></i>
                    <span class="text-islamic-green font-medium">Aktivitas Terkini</span>
                </div>

                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="text-islamic-green">Kegiatan</span>
                    <span
                        class="bg-gradient-to-r from-islamic-gold via-yellow-400 to-islamic-gold bg-clip-text text-transparent">Bursa</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Ikuti perjalanan spiritual dan berbagai kegiatan ibadah bersama jamaah Bursa Umrah Haji Indonesia
                </p>
            </div>

            <!-- Filter Tabs -->
            <div class="flex justify-center mb-12">
                <div class="bg-white/80 backdrop-blur-md rounded-2xl p-2 shadow-xl border border-islamic-gold/20">
                    <button
                        class="filter-btn active px-8 py-4 text-sm font-semibold rounded-xl transition-all duration-300 bg-islamic-green text-white shadow-lg"
                        data-filter="all">
                        <i class="ri-apps-line mr-2"></i>Semua Postingan
                    </button>
                    <button
                        class="filter-btn px-8 py-4 text-sm font-semibold rounded-xl transition-all duration-300 text-islamic-green hover:bg-islamic-green/10"
                        data-filter="aktifitas">
                        <i class="ri-calendar-line mr-2"></i>Aktifitas
                    </button>
                    <button
                        class="filter-btn px-8 py-4 text-sm font-semibold rounded-xl transition-all duration-300 text-islamic-green hover:bg-islamic-green/10"
                        data-filter="berita">
                        <i class="ri-newspaper-line mr-2"></i>Berita
                    </button>
                    <button
                        class="filter-btn px-8 py-4 text-sm font-semibold rounded-xl transition-all duration-300 text-islamic-green hover:bg-islamic-green/10"
                        data-filter="quotes">
                        <i class="ri-double-quotes-l mr-2"></i>Quotes
                    </button>
                </div>
            </div>

            <!-- Activities Grid -->
            <div class="grid gap-8 lg:grid-cols-2 activities-grid">
                @foreach ($activities->take(6) as $activity)
                    @php
                        $images = json_decode($activity->image, true);
                    @endphp
                    <div class="activity-card bg-white/90 backdrop-blur-md rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden border border-islamic-gold/20 group transform hover:-translate-y-2"
                        data-type="{{ strtolower($activity->type) }}">

                        <!-- Image Container -->
                        <div class="relative aspect-video overflow-hidden">
                            @if (is_array($images) && !empty($images))
                                <img src="{{ asset('storage/' . $images[0]) }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                    alt="{{ $activity->title }}">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-islamic-emerald/20 to-islamic-green/10 flex items-center justify-center">
                                    <div class="text-center">
                                        <i class="ri-image-line text-6xl text-islamic-gold/50 mb-4"></i>
                                        <p class="text-islamic-green/70 font-medium">Gambar Tidak Tersedia</p>
                                    </div>
                                </div>
                            @endif

                            <!-- Overlay Gradient -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>

                            <!-- Type Badge -->
                            <div class="absolute top-4 left-4">
                                <span
                                    class="inline-flex items-center px-4 py-2 rounded-full text-xs font-bold backdrop-blur-md uppercase tracking-wide
                                @if ($activity->type == 'aktifitas') bg-islamic-emerald/90 text-white
                                @elseif($activity->type == 'berita') bg-islamic-green/90 text-white
                                @else bg-islamic-gold/90 text-kaaba-black @endif">
                                    @if ($activity->type == 'aktifitas')
                                        <i class="ri-calendar-event-fill mr-1"></i>
                                    @elseif($activity->type == 'berita')
                                        <i class="ri-newspaper-fill mr-1"></i>
                                    @else
                                        <i class="ri-double-quotes-r mr-1"></i>
                                    @endif
                                    {{ $activity->type }}
                                </span>
                            </div>

                            <!-- Date Badge -->
                            <div class="absolute top-4 right-4">
                                @php
                                    \Carbon\Carbon::setLocale('id');
                                @endphp
                                <span
                                    class="inline-flex items-center px-4 py-2 rounded-full text-xs font-semibold bg-white/95 text-islamic-green backdrop-blur-md border border-islamic-gold/30">
                                    <i class="ri-calendar-2-line mr-2 text-islamic-gold"></i>
                                    {{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-8">
                            <!-- Title -->
                            <h3
                                class="text-2xl font-bold text-islamic-green mb-4 line-clamp-2 group-hover:text-islamic-gold transition-colors duration-300 leading-tight">
                                {{ $activity->title }}
                            </h3>

                            <!-- Description -->
                            <p class="text-gray-600 mb-6 line-clamp-3 leading-relaxed text-justify">
                                {{ $activity->description }}
                            </p>

                            <!-- Meta Info -->
                            <div class="flex items-center justify-between pt-4 border-t border-islamic-gold/20">
                                <div class="flex items-center text-sm text-islamic-green/80">
                                    <div
                                        class="w-8 h-8 bg-islamic-gold/20 rounded-full flex items-center justify-center mr-3">
                                        <i class="ri-user-line text-islamic-gold"></i>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-islamic-green">{{ $activity->trademark }}</p>
                                        <p class="text-xs text-gray-500">Organizer</p>
                                    </div>
                                </div>

                                <!-- Read More Button -->
                                <a href="/activity/{{ $activity->slug }}"
                                    class="group/btn inline-flex items-center px-6 py-3 bg-gradient-to-r from-islamic-gold to-yellow-500 hover:from-yellow-500 hover:to-islamic-gold text-white font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                    <span>Baca Selengkapnya</span>
                                    <i
                                        class="ri-arrow-right-line ml-2 group-hover/btn:translate-x-1 transition-transform duration-200"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Load More Button -->
            @if ($activities->count() > 6)
                <div class="text-center mt-16">
                    <a href="/activities"
                        class="group inline-flex items-center px-10 py-5 bg-gradient-to-r from-islamic-green to-islamic-emerald hover:from-islamic-emerald hover:to-islamic-green text-white font-bold text-lg rounded-full transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105">
                        <i class="ri-eye-line mr-3 group-hover:animate-bounce"></i>
                        <span>Lihat Semua Aktifitas</span>
                        <i
                            class="ri-arrow-right-line ml-3 group-hover:translate-x-2 transition-transform duration-300"></i>
                    </a>
                </div>
            @endif

            <!-- Empty State -->
            @if ($activities->isEmpty())
                <div class="text-center py-20">
                    <div
                        class="w-32 h-32 bg-gradient-to-br from-islamic-gold/20 to-islamic-emerald/20 rounded-full flex items-center justify-center mx-auto mb-8">
                        <i class="ri-calendar-todo-line text-6xl text-islamic-gold"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-islamic-green mb-4">Belum Ada Aktivitas</h3>
                    <p class="text-gray-600 text-lg max-w-md mx-auto leading-relaxed">
                        Aktivitas terbaru akan segera hadir. Tetap pantau halaman ini untuk update terkini dari Bursa Umrah
                        Haji.
                    </p>
                    <div class="mt-8">
                        <a href="/contact-us"
                            class="inline-flex items-center px-8 py-4 bg-islamic-gold hover:bg-yellow-500 text-white font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl">
                            <i class="ri-phone-line mr-2"></i>
                            <span>Hubungi Kami</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <style>
        /* Custom CSS for filter buttons */
        .filter-btn.active {
            background: linear-gradient(135deg, #006233, #50C878) !important;
            color: white !important;
            box-shadow: 0 10px 25px rgba(0, 98, 51, 0.25) !important;
        }

        .filter-btn:not(.active):hover {
            background: rgba(0, 98, 51, 0.1) !important;
            color: #006233 !important;
        }

        /* Animation for cards */
        .activity-card:hover {
            transform: translateY(-8px) scale(1.02);
        }

        /* Enhanced floating animation */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(5deg);
            }
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const activityCards = document.querySelectorAll('.activity-card');

            // Filter functionality
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const filterValue = this.getAttribute('data-filter');

                    // Update active button
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    // Filter cards with animation
                    activityCards.forEach(card => {
                        const cardType = card.getAttribute('data-type');

                        if (filterValue === 'all' || cardType === filterValue) {
                            card.classList.remove('filtered-out');
                            setTimeout(() => {
                                card.style.display = 'block';
                            }, 50);
                        } else {
                            card.classList.add('filtered-out');
                            setTimeout(() => {
                                if (card.classList.contains('filtered-out')) {
                                    card.style.display = 'none';
                                }
                            }, 400);
                        }
                    });

                    // Reorganize grid after filtering
                    setTimeout(() => {
                        reorganizeGrid();
                    }, 450);
                });
            });

            // Reorganize grid layout
            function reorganizeGrid() {
                const visibleCards = Array.from(activityCards).filter(card =>
                    !card.classList.contains('filtered-out')
                );

                visibleCards.forEach((card, index) => {
                    setTimeout(() => {
                        card.style.display = 'block';
                        card.classList.remove('filtered-out');
                    }, index * 50);
                });
            }

            // Intersection Observer for scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            }, observerOptions);

            // Observe all activity cards
            activityCards.forEach(card => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                card.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                observer.observe(card);
            });

            // Stagger animation on initial load
            activityCards.forEach((card, index) => {
                setTimeout(() => {
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>

    <section class="py-20 bg-islamic-emerald/5 relative overflow-hidden" id="tour">
        <!-- Islamic Pattern Background -->
        <div class="absolute inset-0 islamic-pattern opacity-10"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center bg-islamic-gold/10 backdrop-blur-sm border border-islamic-gold/20 rounded-full px-6 py-3 mb-6">
                    <i class="ri-service-line text-islamic-gold mr-2"></i>
                    <span class="text-islamic-green font-medium">Layanan Terpercaya</span>
                </div>

                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="text-islamic-green">Layanan Jasa</span>
                    <span
                        class="bg-gradient-to-r from-islamic-gold via-yellow-400 to-islamic-gold bg-clip-text text-transparent">Kami</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Pilihan paket umrah dan haji terbaik dengan fasilitas lengkap dan pelayanan prima untuk perjalanan
                    ibadah yang berkah
                </p>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($services->sortByDesc('created_at')->take(3) as $service)
                    <div
                        class="bg-white/90 backdrop-blur-md rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden border border-islamic-gold/20 group transform hover:-translate-y-2">
                        <!-- Image Container -->
                        <div class="relative h-56 overflow-hidden">
                            <img src="{{ $service->image ? Storage::url($service->image) : URL::asset('dist/assets/img/kaabah-card.jpg') }}"
                                alt="{{ $service->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">

                            <!-- Gradient Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                            </div>

                            <!-- Price Badge -->
                            <div class="absolute top-4 right-4">
                                <div
                                    class="bg-islamic-gold/95 backdrop-blur-sm text-kaaba-black px-4 py-2 rounded-full font-bold text-sm border border-white/20">
                                    <i class="ri-price-tag-3-line mr-1"></i>
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                </div>
                            </div>

                            <!-- Popular Badge (if needed) -->
                            <div class="absolute top-4 left-4">
                                <div
                                    class="bg-islamic-green/90 backdrop-blur-sm text-white px-3 py-1 rounded-full font-semibold text-xs">
                                    <i class="ri-star-fill mr-1"></i>POPULER
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-8 space-y-4">
                            <!-- Title -->
                            <h4
                                class="text-2xl font-bold text-islamic-green leading-tight group-hover:text-islamic-gold transition-colors duration-300">
                                {{ $service->title }}
                            </h4>

                            <!-- Description -->
                            <p class="text-gray-600 leading-relaxed text-justify">
                                {{ $service->description ? Str::limit($service->description, 80) : 'Paket ibadah terbaik dengan fasilitas lengkap dan pelayanan prima untuk perjalanan spiritual yang berkesan.' }}
                            </p>

                            <!-- Features Preview -->
                            <div class="flex items-center space-x-4 py-3">
                                <div class="flex items-center text-sm text-islamic-emerald">
                                    <i class="ri-shield-check-line mr-1"></i>
                                    <span>Terpercaya</span>
                                </div>
                                <div class="flex items-center text-sm text-islamic-emerald">
                                    <i class="ri-customer-service-line mr-1"></i>
                                    <span>24/7 Support</span>
                                </div>
                                <div class="flex items-center text-sm text-islamic-emerald">
                                    <i class="ri-star-line mr-1"></i>
                                    <span>4.9/5</span>
                                </div>
                            </div>

                            <!-- CTA Button -->
                            <div class="pt-4 border-t border-islamic-gold/20">
                                <button data-modal-show="extralarge-modal{{ $service->id }}"
                                    class="group/btn w-full bg-gradient-to-r from-islamic-gold to-yellow-500 hover:from-yellow-500 hover:to-islamic-gold text-white font-bold py-4 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 flex items-center justify-center space-x-2">
                                    <i class="ri-eye-line group-hover/btn:animate-bounce"></i>
                                    <span>Lihat Detail Paket</span>
                                    <i
                                        class="ri-arrow-right-line group-hover/btn:translate-x-1 transition-transform duration-200"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Services Button -->
            <div class="text-center mt-16">
                <a href="/services"
                    class="group inline-flex items-center px-10 py-5 bg-gradient-to-r from-islamic-green to-islamic-emerald hover:from-islamic-emerald hover:to-islamic-green text-white font-bold text-lg rounded-full transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105">
                    <i class="ri-service-line mr-3 group-hover:animate-bounce"></i>
                    <span>Lihat Semua Layanan</span>
                    <i class="ri-arrow-right-line ml-3 group-hover:translate-x-2 transition-transform duration-300"></i>
                </a>
            </div>
        </div>

        <!-- Modals for each service -->
        @foreach ($services as $service)
            <!-- Service Detail Modal -->
            <div id="extralarge-modal{{ $service->id }}" aria-hidden="true" data-modal-backdrop="static"
                class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-6xl max-h-full mx-auto p-4">
                    <!-- Modal content -->
                    <div
                        class="relative bg-white/95 backdrop-blur-md rounded-3xl shadow-2xl overflow-hidden border border-islamic-gold/30">
                        <!-- Modal header -->
                        <div class="relative h-64 overflow-hidden">
                            <img class="w-full h-full object-cover"
                                src="{{ $service->image ? Storage::url($service->image) : URL::asset('dist/assets/img/kaabah-card.jpg') }}"
                                alt="{{ $service->title }}">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-islamic-green/80 via-black/40 to-transparent">
                            </div>

                            <!-- Close Button -->
                            <div class="absolute top-6 right-6">
                                <button type="button"
                                    class="text-white bg-black/30 hover:bg-black/50 backdrop-blur-sm rounded-full w-12 h-12 flex items-center justify-center transition-all duration-200 group"
                                    data-modal-hide="extralarge-modal{{ $service->id }}">
                                    <i
                                        class="ri-close-line text-xl group-hover:rotate-90 transition-transform duration-200"></i>
                                    <span class="sr-only">Tutup</span>
                                </button>
                            </div>

                            <!-- Title Overlay -->
                            <div class="absolute bottom-6 left-8">
                                <h3 class="text-3xl font-bold text-white mb-2">{{ $service->title }}</h3>
                                <div class="flex items-center space-x-4 text-islamic-gold">
                                    <div class="flex items-center">
                                        <i class="ri-star-fill text-lg mr-1"></i>
                                        <span class="font-semibold text-white">4.8</span>
                                    </div>
                                    <span class="text-white/80">Detail Paket Lengkap</span>
                                </div>
                            </div>
                        </div>

                        <!-- Modal body -->
                        <div class="p-8 space-y-8">
                            <!-- Price Section -->
                            <div
                                class="bg-gradient-to-r from-islamic-gold/10 to-islamic-emerald/10 rounded-2xl p-8 border border-islamic-gold/20 text-center">
                                <div class="flex items-center justify-center space-x-3 mb-4">
                                    <i class="ri-price-tag-3-line text-3xl text-islamic-gold"></i>
                                    <div>
                                        <p class="text-4xl font-bold text-islamic-green">
                                            Rp {{ number_format($service->price, 0, ',', '.') }}
                                        </p>
                                        <p class="text-gray-600 font-medium">per jamaah</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-center space-x-6 text-sm text-islamic-emerald">
                                    <span><i class="ri-shield-check-line mr-1"></i>Garansi Terpercaya</span>
                                    <span><i class="ri-customer-service-line mr-1"></i>Support 24/7</span>
                                    <span><i class="ri-medal-line mr-1"></i>Berpengalaman</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                                <!-- Service Details -->
                                <div
                                    class="bg-white/80 backdrop-blur-sm rounded-2xl border border-islamic-gold/20 p-6 space-y-6">
                                    <h4 class="text-xl font-bold text-islamic-green flex items-center">
                                        <div
                                            class="w-10 h-10 bg-islamic-gold/20 rounded-full flex items-center justify-center mr-3">
                                            <i class="ri-service-line text-islamic-gold"></i>
                                        </div>
                                        Fasilitas Paket
                                    </h4>
                                    <div class="space-y-3">
                                        @foreach ($details->where('service_id', $service->id) as $detail)
                                            <div
                                                class="flex items-center space-x-3 p-3 rounded-xl hover:bg-islamic-gold/10 transition-colors duration-200">
                                                <div
                                                    class="w-10 h-10 bg-islamic-emerald/20 rounded-full flex items-center justify-center flex-shrink-0">
                                                    <i class="{{ $detail->icon }} text-islamic-emerald"></i>
                                                </div>
                                                <span class="text-gray-700 font-medium">{{ $detail->option }}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Tour Guide Section -->
                                    <div class="pt-4 border-t border-islamic-gold/20">
                                        <h5 class="font-bold text-islamic-green mb-4 flex items-center">
                                            <div
                                                class="w-8 h-8 bg-islamic-gold/20 rounded-full flex items-center justify-center mr-2">
                                                <i class="ri-user-star-line text-islamic-gold"></i>
                                            </div>
                                            Tour Guide
                                        </h5>
                                        @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                            <div
                                                class="flex items-center space-x-3 p-3 rounded-xl hover:bg-islamic-emerald/10 transition-colors duration-200">
                                                <div
                                                    class="w-10 h-10 bg-islamic-gold/20 rounded-full flex items-center justify-center flex-shrink-0">
                                                    <i class="fa-solid fa-user-tag text-islamic-gold"></i>
                                                </div>
                                                <span
                                                    class="text-gray-700 font-medium">{{ $service_detail->guider }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Included Section -->
                                <div
                                    class="bg-white/80 backdrop-blur-sm rounded-2xl border border-islamic-emerald/30 p-6 space-y-6">
                                    <h4 class="text-xl font-bold text-islamic-green flex items-center">
                                        <div
                                            class="w-10 h-10 bg-islamic-emerald/20 rounded-full flex items-center justify-center mr-3">
                                            <i class="ri-check-double-line text-islamic-emerald"></i>
                                        </div>
                                        Sudah Termasuk
                                    </h4>
                                    <div class="space-y-3">
                                        @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                            @foreach ($all_details->where('type', '=', 'included')->where('service_detail_id', $service_detail->id) as $all_detail)
                                                <div
                                                    class="flex items-start space-x-3 p-3 rounded-xl hover:bg-islamic-emerald/10 transition-colors duration-200">
                                                    <div
                                                        class="w-6 h-6 bg-islamic-emerald/20 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                                        <i class="ri-check-line text-islamic-emerald text-sm"></i>
                                                    </div>
                                                    <div>
                                                        <p class="text-gray-700 font-medium">{{ $all_detail->text }}</p>
                                                        @if ($all_detail->description)
                                                            <p class="text-gray-500 text-sm mt-1">
                                                                {{ $all_detail->description }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Excluded Section -->
                                <div class="bg-white/80 backdrop-blur-sm rounded-2xl border border-red-300 p-6 space-y-6">
                                    <h4 class="text-xl font-bold text-islamic-green flex items-center">
                                        <div
                                            class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                                            <i class="ri-close-circle-line text-red-500"></i>
                                        </div>
                                        Belum Termasuk
                                    </h4>
                                    <div class="space-y-3">
                                        @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                            @foreach ($all_details->where('type', '=', 'excluded')->where('service_detail_id', $service_detail->id) as $all_detail)
                                                <div
                                                    class="flex items-start space-x-3 p-3 rounded-xl hover:bg-red-50 transition-colors duration-200">
                                                    <div
                                                        class="w-6 h-6 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                                                        <i class="ri-close-line text-red-500 text-sm"></i>
                                                    </div>
                                                    <div>
                                                        <p class="text-gray-700 font-medium">{{ $all_detail->text }}</p>
                                                        @if ($all_detail->description)
                                                            <p class="text-gray-500 text-sm mt-1">
                                                                {{ $all_detail->description }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div
                            class="bg-gradient-to-r from-islamic-green/10 to-islamic-emerald/10 px-8 py-6 border-t border-islamic-gold/20">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-islamic-green">
                                    <i class="ri-shield-check-line text-2xl mr-2"></i>
                                    <div>
                                        <p class="font-bold">Garansi Kepuasan 100%</p>
                                        <p class="text-sm text-gray-600">Terpercaya & Berpengalaman</p>
                                    </div>
                                </div>
                                <div class="flex space-x-4">
                                    <button data-modal-hide="extralarge-modal{{ $service->id }}" type="button"
                                        class="px-8 py-3 text-islamic-green bg-white border-2 border-islamic-green hover:bg-islamic-green hover:text-white rounded-full font-semibold transition-all duration-300">
                                        Tutup
                                    </button>
                                    <button type="submit" data-modal-target="contact-modal"
                                        data-modal-toggle="contact-modal"
                                        data-modal-hide="extralarge-modal{{ $service->id }}"
                                        class="group px-8 py-3 bg-gradient-to-r from-islamic-gold to-yellow-500 hover:from-yellow-500 hover:to-islamic-gold text-white rounded-full font-bold transition-all duration-300 shadow-lg hover:shadow-xl flex items-center space-x-2">
                                        <i class="ri-shopping-cart-line group-hover:animate-bounce"></i>
                                        <span>Pesan Sekarang</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact modal -->
            <div id="contact-modal" aria-hidden="true" data-modal-backdrop="static"
                class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <!-- Modal content -->
                    <div
                        class="relative bg-white/95 backdrop-blur-md rounded-3xl shadow-2xl overflow-hidden border border-islamic-gold/30">
                        <!-- Modal header -->
                        <div class="bg-gradient-to-r from-islamic-green to-islamic-emerald p-8 text-center relative">
                            <div class="w-20 h-20 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="ri-customer-service-2-line text-white text-3xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-2">Hubungi Admin</h3>
                            <p class="text-islamic-gold/90">Konsultasi gratis & pemesanan paket</p>
                            <button type="button"
                                class="absolute top-4 right-4 text-white/80 hover:text-white bg-white/10 hover:bg-white/20 rounded-full w-10 h-10 flex items-center justify-center transition-all duration-200 group"
                                data-modal-hide="contact-modal">
                                <i
                                    class="ri-close-line text-lg group-hover:rotate-90 transition-transform duration-200"></i>
                                <span class="sr-only">Tutup</span>
                            </button>
                        </div>

                        <!-- Modal body -->
                        <div class="p-8 space-y-4">
                            <div class="space-y-4">
                                <a href="https://wa.me/62{{ $configs->whatsapp_num }}"
                                    class="group w-full flex items-center justify-center space-x-3 p-4 border-2 border-green-500 text-green-600 bg-white hover:bg-green-500 hover:text-white rounded-2xl transition-all duration-300 font-bold transform hover:scale-105">
                                    <i class="ri-whatsapp-line text-2xl group-hover:animate-bounce"></i>
                                    <span>Admin Utama</span>
                                    <i
                                        class="ri-arrow-right-line group-hover:translate-x-1 transition-transform duration-200"></i>
                                </a>
                                @if ($configs->whatsapp_num2)
                                    <a href="https://wa.me/62{{ $configs->whatsapp_num2 }}"
                                        class="group w-full flex items-center justify-center space-x-3 p-4 border-2 border-green-500 text-green-600 bg-white hover:bg-green-500 hover:text-white rounded-2xl transition-all duration-300 font-bold transform hover:scale-105">
                                        <i class="ri-whatsapp-line text-2xl group-hover:animate-bounce"></i>
                                        <span>Admin Kedua</span>
                                        <i
                                            class="ri-arrow-right-line group-hover:translate-x-1 transition-transform duration-200"></i>
                                    </a>
                                @endif
                            </div>

                            <!-- Trust Indicators -->
                            <div class="grid grid-cols-2 gap-4 pt-6 border-t border-islamic-gold/20">
                                <div class="text-center">
                                    <div
                                        class="w-12 h-12 bg-islamic-gold/20 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <i class="ri-time-line text-islamic-gold text-xl"></i>
                                    </div>
                                    <p class="text-sm text-gray-600 font-medium">Respon < 5 menit</p>
                                </div>
                                <div class="text-center">
                                    <div
                                        class="w-12 h-12 bg-islamic-emerald/20 rounded-full flex items-center justify-center mx-auto mb-2">
                                        <i class="ri-customer-service-line text-islamic-emerald text-xl"></i>
                                    </div>
                                    <p class="text-sm text-gray-600 font-medium">Konsultasi Gratis</p>
                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div
                            class="bg-gradient-to-r from-islamic-gold/10 to-islamic-emerald/10 px-8 py-6 border-t border-islamic-gold/20">
                            <button data-modal-hide="contact-modal" type="button"
                                data-modal-target="extralarge-modal{{ $service->id }}"
                                data-modal-toggle="extralarge-modal{{ $service->id }}"
                                class="w-full px-6 py-3 text-islamic-green bg-white border-2 border-islamic-green hover:bg-islamic-green hover:text-white rounded-full font-semibold transition-all duration-300 flex items-center justify-center space-x-2">
                                <i class="ri-arrow-left-line"></i>
                                <span>Kembali ke Detail</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>

    <!-- Gallery Section -->
    <section class="py-20 bg-gradient-to-bl from-slate-50 via-crescent/10 to-islamic-emerald/5 relative overflow-hidden">

        <div class="relative container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div
                    class="inline-flex items-center bg-islamic-gold/10 backdrop-blur-sm border border-islamic-gold/20 rounded-full px-6 py-3 mb-6">
                    <i class="ri-gallery-line text-islamic-gold mr-2"></i>
                    <span class="text-islamic-green font-medium">Galeri Perjalanan</span>
                </div>

                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="text-islamic-green">Memori</span>
                    <span
                        class="bg-gradient-to-r from-islamic-gold via-yellow-400 to-islamic-gold bg-clip-text text-transparent">Kebersamaan</span>
                    <span class="text-islamic-green">Kami</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                    Saksikan momen-momen berharga dan perjalanan spiritual jamaah Bursa Umrah Haji Indonesia menuju Tanah
                    Suci
                </p>
            </div>

            <!-- Gallery Grid -->
            <div class="max-w-8xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($galleries->sortByDesc('created_at')->take(6) as $index => $gallery)
                    @php
                        $is_video = false;
                        $media = $gallery->media;
                        $ext = strtolower(pathinfo($media, PATHINFO_EXTENSION));
                        if (in_array($ext, ['mp4', 'webm', 'ogg'])) {
                            $is_video = true;
                        }
                    @endphp
                    <div class="gallery-item group cursor-pointer relative overflow-hidden rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-3 bg-white/90 backdrop-blur-md border border-islamic-gold/20 lg:row-span-2"
                        onclick="openGalleryModal({{ json_encode(Storage::url($gallery->media)) }}, {{ json_encode($gallery->description) }}, {{ json_encode($is_video ? $ext : '') }})">

                        <!-- Media Container -->
                        <div class="relative overflow-hidden h-80">
                            @if ($is_video)
                                <video src="{{ Storage::url($gallery->media) }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                    poster="">
                                </video>
                                <!-- Video Play Icon -->
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div
                                        class="w-20 h-20 bg-islamic-gold/90 backdrop-blur-sm rounded-full flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-2xl border-2 border-white/30">
                                        <i class="ri-play-fill text-white text-2xl ml-1"></i>
                                    </div>
                                </div>
                            @else
                                <img src="{{ Storage::url($gallery->media) }}" alt="{{ $gallery->description }}"
                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" />
                            @endif

                            <!-- Consistent Overlay Gradient -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent"></div>

                            <!-- Hover Overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-islamic-green/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            </div>

                            <!-- Top Elements Container -->
                            <div class="absolute top-4 left-4 right-4 flex items-center justify-between">
                                <!-- Date Badge -->
                                @php
                                    \Carbon\Carbon::setLocale('id');
                                @endphp
                                <span
                                    class="inline-flex items-center px-4 py-2 rounded-full text-xs font-semibold bg-white/95 backdrop-blur-md text-islamic-green border border-islamic-gold/30 shadow-lg">
                                    <i class="ri-calendar-2-line mr-2 text-islamic-gold"></i>
                                    {{ \Carbon\Carbon::parse($gallery->date)->format('d M Y') }}
                                </span>

                                <!-- Media Type Icon -->
                                <div
                                    class="w-12 h-12 bg-islamic-gold/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-lg border-2 border-white/30">
                                    @if ($is_video)
                                        <i class="ri-video-line text-white text-xl"></i>
                                    @else
                                        <i class="ri-image-2-line text-white text-xl"></i>
                                    @endif
                                </div>
                            </div>

                            <!-- Bottom Content Container -->
                            <div class="absolute bottom-0 left-0 right-0 p-6">
                                <!-- Content with consistent styling -->
                                <div class="border-l-4 border-islamic-gold pl-4 mb-4">
                                    <h3
                                        class="text-xl font-bold text-white mb-2 line-clamp-2 leading-tight drop-shadow-lg">
                                        {{ $gallery->description }}
                                    </h3>
                                    <p class="text-white/90 text-sm flex items-center drop-shadow-md">
                                        <i class="ri-map-pin-line mr-2 text-islamic-gold"></i>
                                        Tanah Suci • Perjalanan Spiritual
                                    </p>
                                </div>

                                <!-- View Details Button - Consistent for all cards -->
                                <div
                                    class="opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                    <div
                                        class="inline-flex items-center px-6 py-3 bg-islamic-gold/20 backdrop-blur-md border border-islamic-gold/40 rounded-full text-sm font-semibold text-white hover:bg-islamic-gold/30 transition-all duration-200 shadow-lg">
                                        <i class="ri-eye-line mr-2"></i>
                                        <span>Lihat Detail</span>
                                        <i
                                            class="ri-arrow-right-line ml-2 transition-transform duration-200 group-hover:translate-x-1"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Islamic Decorative Corner Pattern -->
                            <div class="absolute top-0 right-0 w-16 h-16 overflow-hidden">
                                <div class="absolute -top-2 -right-2 w-8 h-8 bg-islamic-gold/20 rounded-full"></div>
                                <div class="absolute -top-1 -right-1 w-4 h-4 bg-islamic-emerald/30 rounded-full"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Gallery Button -->
            @if ($galleries->count() > 6)
                <div class="text-center mt-16">
                    <a href="/galleries"
                        class="group inline-flex items-center px-10 py-5 bg-gradient-to-r from-islamic-green to-islamic-emerald hover:from-islamic-emerald hover:to-islamic-green text-white font-bold text-lg rounded-full transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105">
                        <i class="ri-gallery-line mr-3 group-hover:animate-bounce"></i>
                        <span>Lihat Semua Galeri</span>
                        <i
                            class="ri-arrow-right-line ml-3 group-hover:translate-x-2 transition-transform duration-300"></i>
                    </a>
                </div>
            @endif

            <!-- Empty State -->
            @if ($galleries->isEmpty())
                <div class="text-center py-20">
                    <div
                        class="w-32 h-32 bg-gradient-to-br from-islamic-gold/20 to-islamic-emerald/20 rounded-full flex items-center justify-center mx-auto mb-8">
                        <i class="ri-gallery-line text-6xl text-islamic-gold"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-islamic-green mb-4">Galeri Belum Tersedia</h3>
                    <p class="text-gray-600 text-lg max-w-md mx-auto leading-relaxed">
                        Galeri perjalanan spiritual akan segera hadir. Pantau terus untuk melihat momen-momen berharga
                        jamaah kami.
                    </p>
                    <div class="mt-8">
                        <a href="/contact-us"
                            class="inline-flex items-center px-8 py-4 bg-islamic-gold hover:bg-yellow-500 text-white font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl">
                            <i class="ri-phone-line mr-2"></i>
                            <span>Hubungi Kami</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Gallery Modal -->
    <div id="galleryModal" class="fixed inset-0 z-50 hidden overflow-auto bg-black/90 backdrop-blur-sm">
        <div class="min-h-screen flex items-center justify-center p-4">
            <div class="relative max-w-7xl w-full">
                <!-- Close Button -->
                <button onclick="closeGalleryModal()"
                    class="absolute top-0 right-0 m-4 text-white hover:text-gray-300 z-50">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Media Container -->
                <div class="relative flex flex-col items-center">
                    <img id="modalImage" src="" alt="Gallery Image" class="mx-auto max-h-[80vh] w-auto hidden">
                    <video id="modalVideo" controls class="mx-auto max-h-[80vh] w-auto bg-black hidden">
                        <source id="modalVideoSource" src="" type="">
                        Browser Anda tidak mendukung video.
                    </video>
                    <p id="modalCaption" class="text-white text-center mt-4 text-lg"></p>
                </div>
            </div>
        </div>
    </div>

    <section class="section__container discover__container">
        <h2 class="section__header">
            Discover Peace, Culture, and Devotion with Our Temple Bus Travels
        </h2>
        <p class="section__description">
            Witness Stunning Landscapes from the Comfort of Your Bus Seat"
        </p>
        <div class="discover__grid">
            <div class="discover__card">
                <span><i class="ri-camera-lens-line"></i></span>
                <h4>Your Road, Your Story</h4>
                <p>
                    Experience the freedom of travel with our comfortable and reliable
                    bus trips. Enjoy stunning views along the way while relaxing in
                    spacious seats. Whether it's a short trip or a long journey, our
                    buses ensure a smooth and enjoyable ride.
                </p>
            </div>
            <div class="discover__card">
                <span><i class="ri-ship-line"></i></span>
                <h4>Coastal Wonders</h4>
                <p>
                    Embark on a journey through the mesmerizing coastal wonders. Enjoy
                    the serene beauty of pristine beaches, stunning cliffs, and
                    breathtaking ocean views, all from the comfort of our bus. Let the
                    coastal breeze guide you to unforgettable destinations.
                </p>
            </div>
            <div class="discover__card">
                <span><i class="ri-landscape-line"></i></span>
                <h4>Historic Landmarks</h4>
                <p>
                    Explore the charm of historic landmarks on our specially curated bus
                    tours. Our comfortable buses will take you through iconic sites,
                    offering insights into their fascinating stories. Sit back, relax,
                    and immerse yourself in the rich history that each destination
                    holds.
                </p>
            </div>
        </div>
    </section>

    @if ($configs->img_info2)
        <section>
            <div class="container mx-auto">
                <div class="relative overflow-hidden shadow-2xl">
                    <!-- Banner Image -->
                    <img src="{{ Storage::url($configs->img_info2) }}" alt="Promotion Banner"
                        class="w-full max-h-64 object-cover">

                    <!-- Full Centered Dark Overlay -->
                    <div class="absolute inset-0 bg-black/60 flex flex-col items-center justify-center text-center px-4">
                        @if ($configs->title_info2)
                            <h2 class="text-2xl md:text-4xl font-bold text-white mb-4">
                                {{ $configs->title_info2 }}
                            </h2>
                        @endif
                        @if ($configs->info2)
                            <p class="text-white/90 text-sm md:text-base mb-6">
                                {{ $configs->info2 }}
                            </p>
                        @endif
                        <a href="https://wa.me/+62{{ $configs->whatsapp_num }}"
                            class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors duration-200">
                            <i class="ri-whatsapp-line mr-2 text-lg"></i>
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif



    <script>
        function openGalleryModal(mediaUrl, caption, type) {
            const modal = document.getElementById("galleryModal");
            const modalImage = document.getElementById("modalImage");
            const modalVideo = document.getElementById("modalVideo");
            const modalVideoSource = document.getElementById("modalVideoSource");
            const modalCaption = document.getElementById("modalCaption");

            if (type === "mp4" || type === "webm" || type === "ogg") {
                modalImage.classList.add("hidden");
                modalVideo.classList.remove("hidden");
                modalVideoSource.src = mediaUrl;
                modalVideo.load();
            } else {
                modalVideo.classList.add("hidden");
                modalImage.classList.remove("hidden");
                modalImage.src = mediaUrl;
            }
            modalCaption.textContent = caption;
            modal.classList.remove("hidden");
            document.body.style.overflow = "hidden";

            // Close on escape key
            document.onkeydown = function(e) {
                if (e.key === "Escape") closeGalleryModal();
            };

            // Close on background click
            modal.onclick = function(e) {
                if (e.target === modal) closeGalleryModal();
            };
        }

        function closeGalleryModal() {
            const modal = document.getElementById("galleryModal");
            const modalVideo = document.getElementById("modalVideo");
            modal.classList.add("hidden");
            document.body.style.overflow = "";
            modalVideo.pause();
            // Remove event listeners
            document.onkeydown = null;
            modal.onclick = null;
        }
    </script>

    <script>
        class ImageCarousel {
            constructor() {
                this.currentSlide = 0;
                this.totalSlides = document.querySelectorAll('.carousel-slide').length;
                this.carousel = document.getElementById('carousel-inner');
                this.indicators = document.querySelectorAll('.indicator');
                this.autoPlayInterval = null;

                this.init();
            }

            init() {
                this.updateIndicators();
                this.startAutoPlay();
                this.bindEvents();
            }

            bindEvents() {
                document.getElementById('nextBtn').addEventListener('click', () => this.nextSlide());
                document.getElementById('prevBtn').addEventListener('click', () => this.prevSlide());

                this.indicators.forEach((indicator, index) => {
                    indicator.addEventListener('click', () => this.goToSlide(index));
                });

                // Pause autoplay on hover
                const carouselContainer = document.getElementById('carousel');
                carouselContainer.addEventListener('mouseenter', () => this.stopAutoPlay());
                carouselContainer.addEventListener('mouseleave', () => this.startAutoPlay());

                // Touch/swipe support
                let startX = 0;
                let endX = 0;

                carouselContainer.addEventListener('touchstart', (e) => {
                    startX = e.touches[0].clientX;
                });

                carouselContainer.addEventListener('touchend', (e) => {
                    endX = e.changedTouches[0].clientX;
                    this.handleSwipe();
                });
            }

            handleSwipe() {
                const threshold = 50;
                const diff = startX - endX;

                if (Math.abs(diff) > threshold) {
                    if (diff > 0) {
                        this.nextSlide();
                    } else {
                        this.prevSlide();
                    }
                }
            }

            nextSlide() {
                this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
                this.updateCarousel();
            }

            prevSlide() {
                this.currentSlide = this.currentSlide === 0 ? this.totalSlides - 1 : this.currentSlide - 1;
                this.updateCarousel();
            }

            goToSlide(index) {
                this.currentSlide = index;
                this.updateCarousel();
            }

            updateCarousel() {
                const translateX = -this.currentSlide * 100;
                this.carousel.style.transform = `translateX(${translateX}%)`;
                this.updateIndicators();
            }

            updateIndicators() {
                this.indicators.forEach((indicator, index) => {
                    if (index === this.currentSlide) {
                        indicator.classList.remove('bg-gray-400');
                        indicator.classList.add('bg-blue-600');
                    } else {
                        indicator.classList.remove('bg-blue-600');
                        indicator.classList.add('bg-gray-400');
                    }
                });
            }

            startAutoPlay() {
                this.autoPlayInterval = setInterval(() => {
                    this.nextSlide();
                }, 5000); // Change slide every 5 seconds
            }

            stopAutoPlay() {
                if (this.autoPlayInterval) {
                    clearInterval(this.autoPlayInterval);
                    this.autoPlayInterval = null;
                }
            }
        }

        // Initialize carousel when DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            new ImageCarousel();
        });
    </script>

    <script>
        // Add scroll event listener for navbar
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });
    </script>
@endsection
