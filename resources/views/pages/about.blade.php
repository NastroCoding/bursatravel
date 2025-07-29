@extends('layouts.main')
@section('content')
    <!-- Vision & Mission Section -->
    <section id="visimisi" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-medium text-gray-800 mb-4">Visi & Misi</h1>
                <div class="w-16 h-0.5 bg-blue-600 mx-auto"></div>
            </div>

            <!-- Vision & Mission Cards -->
            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-medium text-gray-800 mb-4 text-center">Visi</h2>
                    <p class="text-gray-600 leading-relaxed">{{ $configs->visi }}</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100">
                    <h2 class="text-2xl font-medium text-gray-800 mb-4 text-center">Misi</h2>
                    <p class="text-gray-600 leading-relaxed">{!! nl2br(e($configs->misi)) !!}</p>
                </div>
            </div>

            <!-- Values Section -->
            <div class="bg-gray-50 rounded-lg p-8">
                <h2 class="text-3xl font-medium text-gray-800 text-center mb-8">Nilai-Nilai Kami</h2>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
                    <div class="text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fa-solid fa-user-tie text-blue-600"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Profesional</span>
                    </div>
                    <div class="text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fa-solid fa-gear text-blue-600"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Integritas</span>
                    </div>
                    <div class="text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fa-solid fa-handshake text-blue-600"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Jujur</span>
                    </div>
                    <div class="text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fa-solid fa-scale-balanced text-blue-600"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Adil Peduli</span>
                    </div>
                    <div class="text-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
                            <i class="fa-solid fa-lock text-blue-600"></i>
                        </div>
                        <span class="text-sm font-medium text-gray-700">Komitmen</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- History Section -->
    <section id="sejarah" class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-medium text-gray-800 mb-4">Sejarah Kami</h1>
                <div class="w-16 h-0.5 bg-blue-600 mx-auto"></div>
            </div>

            <!-- History Content -->
            <div class="grid lg:grid-cols-2 gap-12 items-center mb-12">
                <div class="text-center">
                    <img src="{{ URL::asset('dist/assets/img/kelimatu_logo.png') }}" 
                         class="max-w-xs mx-auto" alt="Kelimatu Logo">
                </div>
                <div>
                    <p class="text-gray-600 leading-relaxed text-lg">{{ $configs->history }}</p>
                </div>
            </div>

            <!-- Logo Meaning -->
            <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100">
                <h3 class="text-2xl font-medium text-gray-800 mb-6">Arti Logo</h3>
                <div class="space-y-4 text-gray-600">
                    <p><strong class="text-gray-800">Warna Ungu Magenta:</strong> Memiliki nilai positif, berjiwa artistik, bijaksana, dan intuitif, dekat dan senang memikirkan masalah spiritual dalam kehidupan.</p>
                    <p><strong class="text-gray-800">Lambang:</strong> Huruf K (double) melambangkan kebersamaan dan persatuan.</p>
                    <p><strong class="text-gray-800">Tulisan "KELIMATU":</strong> Adalah branding nama dari PT. Emaar Pesona Wisata (EPW). Kelimatu (Kalimat; Bahasa Arab) memiliki arti kesatuan perasaan dan ungkapan dalam bentuk kata/tulisan.</p>
                    <p><strong class="text-gray-800">Travel & Tours:</strong> Adalah bentuk usaha perjalanan travel & tours berupa umroh, haji dan wisata halal lainnya.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="tim" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-medium text-gray-800 mb-4">Tim Kami</h1>
                <div class="w-16 h-0.5 bg-blue-600 mx-auto"></div>
            </div>

            <!-- Team Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($teams as $team)
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <img class="w-full h-64 object-cover" src="{{ Storage::url($team->image) }}" alt="{{ $team->name }}">
                        <div class="p-6">
                            <h3 class="text-xl font-medium text-gray-800 mb-2">{{ $team->name }}</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $team->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal (simplified) -->
    <div id="media-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg max-w-4xl max-h-full overflow-auto">
            <div class="p-4">
                <button id="close-modal" class="float-right text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
                <div id="modal-content" class="clear-both pt-4"></div>
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
                        content = `<img src="${media}" class="max-w-full h-auto rounded-lg" alt="">`;
                    } else {
                        content = `
                            <video class="max-w-full h-auto rounded-lg" controls>
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
        });
    </script>
@endsection