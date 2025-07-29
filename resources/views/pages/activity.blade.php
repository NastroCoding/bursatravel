@extends('layouts.main')
@section('content')
    <!-- Activities Section -->
    <section id="aktifitas" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-medium text-gray-800 mb-4">Aktivitas Kami</h1>
                <div class="w-16 h-0.5 bg-blue-600 mx-auto"></div>
            </div>

            <!-- Activities Grid -->
            <div class="space-y-8">
                @foreach ($activities->sortByDesc('date') as $activity)
                    @php
                        $images = json_decode($activity->image, true);
                    @endphp
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <div class="md:flex">
                            <!-- Image -->
                            <div class="md:w-1/3">
                                @if (is_array($images) && !empty($images))
                                    <img src="{{ asset('storage/' . $images[0]) }}"
                                        class="w-full h-64 md:h-full object-cover" alt="{{ $activity->title }}">
                                @else
                                    <div class="w-full h-64 md:h-full bg-gray-100 flex items-center justify-center">
                                        <span class="text-gray-400">No Image</span>
                                    </div>
                                @endif
                            </div>
                            
                            <!-- Content -->
                            <div class="md:w-2/3 p-6 flex flex-col justify-between">
                                <div>
                                    <h3 class="text-2xl font-medium text-gray-800 mb-3">{{ $activity->title }}</h3>
                                    <p class="text-gray-600 leading-relaxed mb-4">{{ $activity->description }}</p>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div class="text-sm text-gray-500">
                                        <p class="mb-1">Oleh: {{ $activity->trademark }}</p>
                                        @php
                                            \Carbon\Carbon::setLocale('id');
                                        @endphp
                                        <p>{{ \Carbon\Carbon::parse($activity->date)->translatedFormat('d F Y') }}</p>
                                    </div>
                                    <a href="/activity/{{ $activity->slug }}"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors">
                                        Baca selengkapnya
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="galeri" class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-medium text-gray-800 mb-4">Galeri</h1>
                <div class="w-16 h-0.5 bg-blue-600 mx-auto"></div>
            </div>

            <!-- Gallery Grid -->
            <div id="gallery-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach ($galleries->sortByDesc('created_at')->take(6) as $gallery)
                    <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                        <a href="#" class="open-modal block" 
                           data-media="{{ Storage::url($gallery->media) }}"
                           data-type="{{ in_array(pathinfo($gallery->media, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif', 'webp']) ? 'image' : 'video' }}"
                           data-description="{{ $gallery->description }}">
                            <div class="aspect-w-16 aspect-h-9">
                                @if (in_array(pathinfo($gallery->media, PATHINFO_EXTENSION), ['jpeg', 'png', 'jpg', 'gif', 'webp']))
                                    <img src="{{ Storage::url($gallery->media) }}" 
                                         class="w-full h-48 object-cover" alt="">
                                @else
                                    <video class="w-full h-48 object-cover">
                                        <source src="{{ Storage::url($gallery->media) }}"
                                                type="video/{{ pathinfo($gallery->media, PATHINFO_EXTENSION) }}">
                                    </video>
                                @endif
                            </div>
                        </a>
                        @if (!empty($gallery->description))
                            <div class="p-4">
                                <p class="text-sm text-gray-600">{{ $gallery->description }}</p>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <!-- Load More Button -->
            <div class="text-center">
                <button id="load-more" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300">
                    Lihat Foto Lainnya
                </button>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimoni" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-medium text-gray-800 mb-4">Testimoni</h1>
                <div class="w-16 h-0.5 bg-blue-600 mx-auto"></div>
            </div>

            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($testimonials->sortByDesc('created_at') as $testimonial)
                    <div class="bg-white p-8 rounded-lg shadow-sm border border-gray-100 relative">
                        <!-- Quote Icon -->
                        <div class="absolute top-4 left-4 text-blue-100">
                            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                        </div>

                        <!-- Profile -->
                        <div class="flex items-center mb-6">
                            <img src="{{ $testimonial->image ? Storage::url($testimonial->image) : 'https://via.placeholder.com/60' }}"
                                 alt="{{ $testimonial->name }}"
                                 class="w-12 h-12 rounded-full object-cover border-2 border-gray-100">
                            <div class="ml-4">
                                <h4 class="font-medium text-gray-800">{{ $testimonial->name }}</h4>
                                <p class="text-sm text-gray-500">{{ $testimonial->caption }}</p>
                            </div>
                        </div>

                        <!-- Testimonial Content -->
                        <p class="text-gray-600 leading-relaxed italic">
                            "{{ $testimonial->description }}"
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div id="media-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 hidden">
        <div class="bg-white rounded-lg max-w-4xl max-h-full overflow-auto relative">
            <button id="close-modal" class="absolute top-4 right-4 z-10 w-8 h-8 bg-white rounded-full flex items-center justify-center text-gray-600 hover:text-gray-800 shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
            <div id="modal-content" class="p-4">
                <!-- Content will be inserted here -->
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const modal = document.getElementById('media-modal');
            const modalContent = document.getElementById('modal-content');
            const closeModal = document.getElementById('close-modal');

            // Modal functionality
            document.addEventListener('click', event => {
                if (event.target.closest('.open-modal')) {
                    event.preventDefault();
                    const item = event.target.closest('.open-modal');
                    const media = item.getAttribute('data-media');
                    const type = item.getAttribute('data-type');
                    const description = item.getAttribute('data-description');

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

                    if (description) {
                        content += `<p class="mt-4 text-gray-600 text-center">${description}</p>`;
                    }

                    modalContent.innerHTML = content;
                    modal.classList.remove('hidden');
                }
            });

            closeModal.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            modal.addEventListener('click', event => {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });

            // Load more functionality
            let currentIndex = 6;
            const loadMoreButton = document.getElementById('load-more');

            loadMoreButton.addEventListener('click', () => {
                fetch(`/load-more-galleries?start=${currentIndex}`)
                    .then(response => response.json())
                    .then(data => {
                        const galleryContainer = document.getElementById('gallery-container');
                        data.galleries.forEach(gallery => {
                            const mediaType = ['jpeg', 'png', 'jpg', 'gif', 'webp'].includes(
                                gallery.extension) ? 'image' : 'video';
                            
                            const mediaElement = mediaType === 'image' ?
                                `<img src="${gallery.media}" class="w-full h-48 object-cover" alt="">` :
                                `<video class="w-full h-48 object-cover">
                                    <source src="${gallery.media}" type="video/${gallery.extension}">
                                </video>`;

                            const galleryItem = document.createElement('div');
                            galleryItem.classList.add('bg-white', 'rounded-lg', 'shadow-sm', 'border', 'border-gray-100', 'overflow-hidden', 'hover:shadow-md', 'transition-shadow', 'duration-300');
                            galleryItem.innerHTML = `
                                <a href="#" class="open-modal block" data-media="${gallery.media}" data-type="${mediaType}" data-description="${gallery.description}">
                                    <div class="aspect-w-16 aspect-h-9">
                                        ${mediaElement}
                                    </div>
                                </a>
                                ${gallery.description ? `<div class="p-4"><p class="text-sm text-gray-600">${gallery.description}</p></div>` : ''}
                            `;
                            galleryContainer.appendChild(galleryItem);
                        });

                        currentIndex += data.galleries.length;
                        if (!data.hasMore) {
                            loadMoreButton.style.display = 'none';
                        }
                    });
            });
        });
    </script>
@endsection