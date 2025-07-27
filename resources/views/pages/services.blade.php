@extends('layouts.main')

@section('content')
    <div class="mb-10 w-11/12 rounded-xl mx-auto">
        <div class="relative h-28 flex items-center justify-center">
            <div class="absolute inset-0 bg-fixed bg-center bg-no-repeat bg-cover filter blur z-1"
                style="background-image: url('{{ URL::asset('dist/assets/img/servicebackground.jpg') }}');">
            </div>
            <h1
                class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-center text-black md:text-3xl lg:text-4xl z-10">
                Paket Layanan Kami
            </h1>
        </div>
    </div>
    <div class="container mx-auto mt-10 px-4 sm:px-6 lg:px-8 w-11/12 mb-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $service)
                <!-- Card 1 -->
                <div
                    class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 h-auto">
                    <div class="h-64 overflow-hidden">
                        <img src="{{ $service->image ? Storage::url($service->image) : URL::asset('dist/assets/img/kaabah-card.jpg') }}" alt="Badrinath Temple"
                            class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="space-y-3">
                            <h4 class="text-xl font-bold text-gray-800 leading-tight">{{ $service->title }}</h4>
                            {{-- <p class="text-sm text-gray-600 font-medium">{{ $service->created_at->format('M, Y') }}</p> --}}
                            <p class="text-gray-700 leading-relaxed text-sm">
                                {{  $service->description ? Str::limit($service->description, 100) : 'Deskripsi tidak tersedia.' }}
                            </p>
                        </div>
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex items-center space-x-1 text-green-500">
                                {{-- <i class="ri-money-dollar-circle-line text-lg"></i> --}}
                                <span class="font-semibold text-gray-800">Rp {{ number_format($service->price, 0, ',', '.') }}</span>
                            </div>
                            <button data-modal-show="extralarge-modal{{ $service->id }}"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 text-sm font-medium">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        @foreach ($services as $service)
            <div id="extralarge-modal{{ $service->id }}" aria-hidden="true" data-modal-backdrop="static"
                class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-6xl max-h-full mx-auto p-4">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-xl shadow-xl overflow-hidden">
                        <!-- Modal header -->
                        <div class="relative h-48 overflow-hidden">
                            <img class="w-full h-full object-cover"
                                src="{{ $service->image ? Storage::url($service->image) : URL::asset('dist/assets/img/kaabah-card.jpg') }}"
                                alt="{{ $service->title }}">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            <div class="absolute top-4 right-4">
                                <button type="button"
                                    class="text-white bg-black/30 hover:bg-black/50 backdrop-blur-sm rounded-full w-10 h-10 flex items-center justify-center transition-all duration-200"
                                    data-modal-hide="extralarge-modal{{ $service->id }}">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    <span class="sr-only">Tutup</span>
                                </button>
                            </div>
                            <div class="absolute bottom-4 left-6">
                                <h3 class="text-2xl font-bold text-white mb-1">{{ $service->title }}</h3>
                                <div class="flex items-center space-x-1 text-yellow-400">
                                    <i class="ri-star-fill text-lg"></i>
                                    <span class="font-semibold text-white">4.8</span>
                                    <span class="text-white/80 text-sm ml-2">Detail Layanan</span>
                                </div>
                            </div>
                        </div>

                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <!-- Price Section -->
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
                                <div class="text-center">
                                    <p class="text-3xl font-bold text-gray-900 mb-2">
                                        Rp {{ number_format($service->price, 0, ',', '.') }}
                                    </p>
                                    <p class="text-gray-600">per paket</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                                <!-- Service Details -->
                                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-4">
                                    <h4 class="text-lg font-bold text-gray-900 flex items-center">
                                        <i class="ri-service-line text-blue-600 mr-2"></i>
                                        Fasilitas Paket
                                    </h4>
                                    <div class="space-y-3">
                                        @foreach ($details->where('service_id', $service->id) as $detail)
                                            <div
                                                class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-50 transition-colors">
                                                <div
                                                    class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                                                    <i class="{{ $detail->icon }} text-blue-600 text-sm"></i>
                                                </div>
                                                <span class="text-gray-700 text-sm">{{ $detail->option }}</span>
                                            </div>
                                        @endforeach
                                    </div>

                                    <!-- Tour Guide Section -->
                                    <div class="pt-4 border-t border-gray-100">
                                        <h5 class="font-semibold text-gray-900 mb-3 flex items-center">
                                            <i class="ri-user-star-line text-green-600 mr-2"></i>
                                            Tour Guide
                                        </h5>
                                        @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                            <div
                                                class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-50 transition-colors">
                                                <div
                                                    class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                                    <i class="fa-solid fa-user-tag text-green-600 text-sm"></i>
                                                </div>
                                                <span class="text-gray-700 text-sm">{{ $service_detail->guider }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Included Section -->
                                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-4">
                                    <h4 class="text-lg font-bold text-gray-900 flex items-center">
                                        <i class="ri-check-double-line text-green-600 mr-2"></i>
                                        Harga Sudah Termasuk
                                    </h4>
                                    <div class="space-y-2">
                                        @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                            @foreach ($all_details->where('type', '=', 'included')->where('service_detail_id', $service_detail->id) as $all_detail)
                                                <div
                                                    class="flex items-start space-x-3 p-2 rounded-lg hover:bg-green-50 transition-colors">
                                                    <div
                                                        class="w-5 h-5 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                                        <i class="ri-check-line text-green-600 text-xs"></i>
                                                    </div>
                                                    <div>
                                                        <p class="text-gray-700 text-sm">{{ $all_detail->text }}</p>
                                                        @if ($all_detail->description)
                                                            <p class="text-gray-500 text-xs mt-1">
                                                                {{ $all_detail->description }}</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Excluded Section -->
                                <div class="bg-white rounded-xl border border-gray-100 p-6 space-y-4">
                                    <h4 class="text-lg font-bold text-gray-900 flex items-center">
                                        <i class="ri-close-circle-line text-red-600 mr-2"></i>
                                        Harga Belum Termasuk
                                    </h4>
                                    <div class="space-y-2">
                                        @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                            @foreach ($all_details->where('type', '=', 'excluded')->where('service_detail_id', $service_detail->id) as $all_detail)
                                                <div
                                                    class="flex items-start space-x-3 p-2 rounded-lg hover:bg-red-50 transition-colors">
                                                    <div
                                                        class="w-5 h-5 bg-red-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                                        <i class="ri-close-line text-red-600 text-xs"></i>
                                                    </div>
                                                    <div>
                                                        <p class="text-gray-700 text-sm">{{ $all_detail->text }}</p>
                                                        @if ($all_detail->description)
                                                            <p class="text-gray-500 text-xs mt-1">
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
                        <div class="bg-gray-50 px-6 py-4 border-t border-gray-100">
                            <div class="flex items-center justify-between">
                                <div class="text-sm text-gray-600">
                                    <i class="ri-shield-check-line mr-1"></i>
                                    Garansi kepuasan 100%
                                </div>
                                <div class="flex space-x-3">
                                    <button data-modal-hide="extralarge-modal{{ $service->id }}" type="button"
                                        class="px-6 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-4 focus:ring-gray-100 transition-all duration-200">
                                        Tutup
                                    </button>
                                    <button type="submit" data-modal-target="contact-modal"
                                        data-modal-toggle="contact-modal"
                                        data-modal-hide="extralarge-modal{{ $service->id }}"
                                        class="px-6 py-2.5 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-all duration-200 flex items-center space-x-2">
                                        <i class="ri-shopping-cart-line"></i>
                                        <span>Beli Paket</span>
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
                                data-modal-hide="contact-modal">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
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
                            <button data-modal-hide="contact-modal" type="button"
                                data-modal-target="extralarge-modal{{ $service->id }}"
                                data-modal-toggle="extralarge-modal{{ $service->id }}"
                                class="w-full px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-4 focus:ring-gray-100 transition-all duration-200">
                                <i class="ri-arrow-left-line mr-2"></i>
                                Kembali ke Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
