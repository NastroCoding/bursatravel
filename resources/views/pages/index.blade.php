@extends('layouts.main')

@section('content')
    <header id="home">
        <div class="header__container">
            <div class="header__content">
                <p>Umroh Mudah, Nyaman Ibadah</p>
                <h1><span class="grad">BURSA &nbsp;</span> Umroh Haji <span class="text-red-500">Indo</span><span
                        class="text-white">nesia</span></h1>
                <div class="header__btns">
                    <button class="btn">Pesan Kursi Sekarang!</button>
                    <a href="#">
                        <span><i class="ri-whatsapp-line"></i></span>
                    </a>
                </div>
            </div>
            <div class="header__image">
                <img src="img/bus.png" alt="header" />
            </div>
        </div>
    </header>

    <!-- Image Carousel -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Journey Highlights</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Experience the beauty of sacred destinations and comfortable
                    travel through our curated gallery</p>
            </div>

            <div class="relative max-w-8xl mx-auto">
                <!-- Carousel Container -->
                <div id="carousel" class="relative overflow-hidden rounded-2xl shadow-2xl">
                    <div id="carousel-inner" class="flex transition-transform duration-500 ease-in-out">
                        @foreach ($slideshows as $index => $slide)
                            <div class="carousel-slide min-w-full relative">
                                <img src="{{ Storage::url($slide->image) }}" alt="{{ $slide->title }}"
                                    class="w-full h-96 md:h-[500px] object-cover" />
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent">
                                </div>
                                <div class="absolute bottom-8 left-8 text-white">
                                    <h3 class="text-2xl md:text-3xl font-bold mb-2">{{ $slide->title }}</h3>
                                    <p class="text-lg opacity-90">{{ $slide->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Navigation Arrows -->
                <button id="prevBtn"
                    class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white p-3 rounded-full transition duration-300 z-10">
                    <i class="ri-arrow-left-s-line text-2xl"></i>
                </button>
                <button id="nextBtn"
                    class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/20 backdrop-blur-sm hover:bg-white/30 text-white p-3 rounded-full transition duration-300 z-10">
                    <i class="ri-arrow-right-s-line text-2xl"></i>
                </button>

                <!-- Indicators -->
                <div class="flex justify-center mt-6 space-x-2">
                    @foreach ($slideshows as $index => $slide)
                        <button class="indicator w-3 h-3 rounded-full bg-gray-400 hover:bg-gray-600 transition duration-300"
                            data-slide="{{ $index }}"></button>
                    @endforeach
                </div>
            </div>
            <!-- Testimonials Grid Display -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4 mx-auto">
                @foreach ($testimonials->sortByDesc('created_at') as $testimony)
                    @php
                        // Enhanced YouTube URL parsing
                        $youtube_id = null;
                        if ($testimony->youtube_url) {
                            if (
                                preg_match(
                                    '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/',
                                    $testimony->youtube_url,
                                    $matches,
                                )
                            ) {
                                $youtube_id = $matches[1];
                            } elseif (preg_match('/^([a-zA-Z0-9_-]{11})$/', $testimony->youtube_url)) {
                                $youtube_id = $testimony->youtube_url;
                            }
                        }
                    @endphp

                    @if ($youtube_id)
                        <!-- Full YouTube Embed Card -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="w-full aspect-video">
                                <iframe class="w-full h-full"
                                    src="https://www.youtube.com/embed/{{ $youtube_id }}?rel=0&modestbranding=1"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen>
                                </iframe>
                            </div>

                            <!-- Small overlay with name and actions -->
                            <div class="p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-gray-200">
                                            @if ($testimony->image)
                                                <img src="{{ Storage::url($testimony->image) }}"
                                                    alt="{{ $testimony->name }}" class="w-full h-full object-cover">
                                            @endif
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-sm">{{ $testimony->name }}</h3>
                                            @if ($testimony->caption)
                                                <p class="text-gray-500 text-xs">{{ $testimony->caption }}</p>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @elseif($testimony->video)
                        <!-- Full Video Card -->
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="w-full aspect-video">
                                <video controls class="w-full h-full" preload="metadata">
                                    <source src="{{ Storage::url($testimony->video) }}" type="video/mp4">
                                    <source src="{{ Storage::url($testimony->video) }}" type="video/webm">
                                    <source src="{{ Storage::url($testimony->video) }}" type="video/ogg">
                                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                                        <p class="text-gray-500">Browser Anda tidak mendukung pemutar video</p>
                                    </div>
                                </video>
                            </div>

                            <!-- Small overlay with name and actions -->
                            <div class="p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-gray-200">
                                            <img src="{{ $testimony->image ? Storage::url($testimony->image) : 'https://via.placeholder.com/40' }}"
                                                alt="{{ $testimony->name }}" class="w-full h-full object-cover">
                                        </div>
                                        <div>
                                            <h3 class="font-semibold text-sm">{{ $testimony->name }}</h3>
                                            @if ($testimony->caption)
                                                <p class="text-gray-500 text-xs">{{ $testimony->caption }}</p>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @else
                        <!-- Standard Text Card -->
                        <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
                            <!-- Profile Image -->
                            <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-gray-200 mb-4">
                                <img src="{{ $testimony->image ? Storage::url($testimony->image) : 'https://via.placeholder.com/100' }}"
                                    alt="{{ $testimony->name }}" class="w-full h-full object-cover">
                            </div>

                            <h3 class="font-semibold">{{ $testimony->name }}</h3>
                            @if ($testimony->caption)
                                <p class="text-gray-500">{{ $testimony->caption }}</p>
                            @endif

                            <div class="text-2xl text-gray-500 mb-4">
                                <i class="fas fa-quote-left"></i>
                            </div>

                            <p class="text-gray-700 mb-4">
                                {{ $testimony->description }}
                            </p>

                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>


    <section class="py-16 bg-gray-50" id="activities">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Recent Activities
                </h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Discover our latest activities, news updates, and inspiring quotes
                </p>
            </div>

            <!-- Filter Tabs -->
            <div class="flex justify-center mb-10">
                <div class="bg-white rounded-xl p-1 shadow-sm border border-gray-200">
                    <button class="filter-btn active px-6 py-3 text-sm font-medium rounded-lg transition-all duration-200"
                        data-filter="all">
                        All Activities
                    </button>
                    <button class="filter-btn px-6 py-3 text-sm font-medium rounded-lg transition-all duration-200"
                        data-filter="aktifitas">
                        Activities
                    </button>
                    <button class="filter-btn px-6 py-3 text-sm font-medium rounded-lg transition-all duration-200"
                        data-filter="berita">
                        News
                    </button>
                    <button class="filter-btn px-6 py-3 text-sm font-medium rounded-lg transition-all duration-200"
                        data-filter="quotes">
                        Quotes
                    </button>
                </div>
            </div>

            <!-- Activities Grid -->
            <div class="grid gap-8 md:grid-cols-2 activities-grid">
                @foreach ($activities->take(6) as $activity)
                    @php
                        $images = json_decode($activity->image, true);
                    @endphp
                    <div class="activity-card bg-white rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-100 group"
                        data-type="{{ strtolower($activity->type) }}">
                        <!-- Image Container -->
                        <div class="relative aspect-video overflow-hidden">
                            @if (is_array($images) && !empty($images))
                                <img src="{{ asset('storage/' . $images[0]) }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                    alt="{{ $activity->title }}">
                            @else
                                <div
                                    class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif

                            <!-- Type Badge -->
                            <div class="absolute top-4 left-4">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold backdrop-blur-sm uppercase
                                @if ($activity->type == 'Aktifitas') bg-blue-500/90 text-white
                                @elseif($activity->type == 'Berita') bg-green-500/90 text-white
                                @else bg-purple-500/90 text-white @endif">
                                    {{ $activity->type }}
                                </span>
                            </div>

                            <!-- Date Badge -->
                            <div class="absolute top-4 right-4">
                                @php
                                    \Carbon\Carbon::setLocale('id');
                                @endphp
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/90 text-gray-700 backdrop-blur-sm">
                                    {{ \Carbon\Carbon::parse($activity->date)->format('M d') }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <!-- Title -->
                            <h3
                                class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors duration-200">
                                {{ $activity->title }}
                            </h3>

                            <!-- Description -->
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3 leading-relaxed">
                                {{ $activity->description }}
                            </p>

                            <!-- Meta Info -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-sm text-gray-500">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                    <span>{{ $activity->trademark }}</span>
                                </div>

                                <!-- Read More Button -->
                                <a href="/activity/{{ $activity->slug }}"
                                    class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors duration-200 group">
                                    Read More
                                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform duration-200"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Load More Button -->
            @if ($activities->count() > 6)
                <div class="text-center mt-12">
                    <a href="/activities"
                        class="inline-flex items-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        <span>View All Activities</span>
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            @endif

            <!-- Empty State -->
            @if ($activities->isEmpty())
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">No activities yet</h3>
                    <p class="text-gray-600">Check back later for updates and new content.</p>
                </div>
            @endif
        </div>
    </section>

    <style>
        /* Filter Button Styles */
        .filter-btn {
            color: #6b7280;
            position: relative;
        }

        .filter-btn.active {
            color: #ffffff;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        }

        .filter-btn:not(.active):hover {
            color: #374151;
            background-color: #f9fafb;
        }

        /* Card Animation */
        .activity-card {
            transform: translateY(0);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .activity-card:hover {
            transform: translateY(-4px);
        }

        /* Line Clamp Utilities */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Filter Animation */
        .activity-card {
            opacity: 1;
            transform: translateY(0) scale(1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .activity-card.filtered-out {
            opacity: 0;
            transform: translateY(20px) scale(0.95);
            pointer-events: none;
        }

        /* Gradient Overlays */
        .activity-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.05), rgba(147, 51, 234, 0.05));
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
            border-radius: 1rem;
        }

        .activity-card:hover::before {
            opacity: 1;
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

    <section class="section__container journey__container" id="tour">
        <h2 class="section__header">Bus Travel, the Easy Way!</h2>
        <p class="section__description">
            Effortless planning for Your Next Adventure
        </p>
        <div class="journey__grid">
            <div class="journey__card">
                <div class="journey__card__bg">
                    <span><i class="ri-bookmark-3-line"></i></span>
                    <h4>Seamless Booking Process</h4>
                </div>
                <div class="journey__card__content">
                    <span><i class="ri-bookmark-3-line"></i></span>
                    <h4>Seat Booking, one Click Away</h4>
                    <p>
                        From booking tickets to tracking your bus in real-time, everything
                        is just a click away. No more long queues or last-minute confusion
                        — plan, book, and board with complete ease. Your journey,
                        simplified.
                    </p>
                </div>
            </div>

            <div class="journey__card">
                <div class="journey__card__bg">
                    <span><i class="ri-landscape-fill"></i></span>
                    <h4>Tailored Itineraries</h4>
                </div>
                <div class="journey__card__content">
                    <span><i class="ri-landscape-fill"></i></span>
                    <h4>Customized Plans Just for You</h4>
                    <p>
                        Everyone travels differently — that's why we create plans just for
                        you. From preferred timings to budget-friendly options and seat
                        choices, enjoy a trip designed around your lifestyle.
                    </p>
                </div>
            </div>

            <div class="journey__card">
                <div class="journey__card__bg">
                    <span><i class="ri-map-2-line"></i></span>
                    <h4>Expert Local Insights</h4>
                </div>
                <div class="journey__card__content">
                    <span><i class="ri-map-2-line"></i></span>
                    <h4>Insider Tips and Recommendations</h4>
                    <p>
                        From the best boarding points to local travel hacks, our insights
                        are powered by real people who know the roads. It's local
                        knowledge, delivered straight to your screen.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Travel Memories</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Capture the beautiful moments and sacred experiences from our pilgrimage journeys
                </p>
            </div>

            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($galleries->sortByDesc('created_at')->take(6) as $gallery)
                        <!-- Gallery Item 1 -->
                        <div
                            class="gallery-item group cursor-pointer overflow-hidden rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <div class="relative overflow-hidden">
                                <img src="{{ Storage::url($gallery->media) }}" alt="Masjid Al-Haram"
                                    class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-110" />
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    <div class="absolute bottom-4 left-4 text-white">
                                        <h3 class="text-lg font-semibold">{{ $gallery->description }}</h3>
                                        <p class="text-sm opacity-90">
                                            {{ \Carbon\Carbon::parse($gallery->date)->translatedFormat('d F Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="section__container banner__container">
        <div class="banner__card">
            <h4>10+</h4>
            <p>Years Experience</p>
        </div>
        <div class="banner__card">
            <h4>12k</h4>
            <p>Happy Clients</p>
        </div>
        <div class="banner__card">
            <h4>4.8</h4>
            <p>Overrall Ratings</p>
        </div>
    </section>

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
@endsection
