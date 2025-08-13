@extends('layouts.main')

@section('content')
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
                @foreach ($services->sortByDesc('created_at') as $service)
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
    @endsection
