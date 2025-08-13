@extends('layouts.main')
@section('content')
    <!-- Activity Detail Section -->
    <section class="py-20 bg-gradient-to-br from-slate-50 via-crescent/10 to-islamic-emerald/5 relative overflow-hidden">
        <!-- Islamic Pattern Background -->
        <div class="absolute inset-0 islamic-pattern opacity-5"></div>

        <!-- Floating Islamic Elements -->
        <div class="absolute top-20 right-20 text-islamic-gold/10 text-8xl animate-float pointer-events-none">🕌</div>
        <div class="absolute bottom-20 left-20 text-islamic-green/10 text-6xl animate-float pointer-events-none" style="animation-delay: -3s;">☪</div>

        <div class="relative max-w-5xl mx-auto px-4">
            @php
                $images = json_decode($activities->image, true);
            @endphp

            <!-- Article Header -->
            <div class="mb-12">
                <!-- Meta Information -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
                    <div class="inline-flex items-center bg-islamic-gold/10 backdrop-blur-sm border border-islamic-gold/20 rounded-full px-6 py-3 mb-4 sm:mb-0">
                        <div class="w-8 h-8 bg-islamic-gold/20 rounded-full flex items-center justify-center mr-3">
                            <i class="ri-user-line text-islamic-gold"></i>
                        </div>
                        <span class="text-islamic-green font-medium">{{ $activities->trademark ?? 'Admin' }}</span>
                    </div>
                    <div class="inline-flex items-center bg-white/80 backdrop-blur-sm border border-islamic-emerald/20 rounded-full px-6 py-3">
                        <i class="ri-calendar-2-line text-islamic-emerald mr-2"></i>
                        @php
                            \Carbon\Carbon::setLocale('id');
                        @endphp
                        <span class="text-islamic-green font-medium">{{ \Carbon\Carbon::parse($activities->date)->translatedFormat('d F Y') }}</span>
                    </div>
                </div>

                <!-- Title and Description -->
                <div class="bg-white/90 backdrop-blur-md rounded-3xl p-10 shadow-xl border border-islamic-gold/20 relative overflow-hidden">
                    <!-- Islamic Corner Decoration -->
                    <div class="absolute top-0 right-0 w-24 h-24 bg-islamic-gold/10 rounded-bl-full"></div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-islamic-emerald/10 rounded-tr-full"></div>
                    
                    <div class="relative">
                        <div class="border-l-4 border-islamic-gold pl-8">
                            <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                                <span class="bg-gradient-to-r from-islamic-green via-islamic-emerald to-islamic-green bg-clip-text text-transparent">
                                    {{ $activities->title }}
                                </span>
                            </h1>
                            <p class="text-xl text-gray-600 leading-relaxed">
                                {{ $activities->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activity Images -->
            @if ($images)
                <div class="mb-16">
                    @if (count($images) === 1)
                        <!-- Single Image -->
                        <div class="text-center">
                            @foreach ($images as $image)
                                @if ($image)
                                    <div class="relative inline-block rounded-3xl overflow-hidden shadow-2xl border border-islamic-gold/20">
                                        <img class="w-full max-w-4xl mx-auto rounded-3xl"
                                            src="{{ asset('storage/' . $image) }}" alt="{{ $activities->title }}">
                                        <!-- Image Overlay -->
                                        <div class="absolute inset-0 bg-gradient-to-t from-islamic-green/20 via-transparent to-transparent rounded-3xl"></div>
                                    </div>
                                @else
                                    <div class="w-full max-w-4xl mx-auto h-96 bg-gradient-to-br from-islamic-gold/20 to-islamic-emerald/20 rounded-3xl flex items-center justify-center shadow-xl border border-islamic-gold/20">
                                        <div class="text-center">
                                            <i class="ri-image-line text-6xl text-islamic-gold/50 mb-4"></i>
                                            <span class="text-islamic-green/70 font-medium">Gambar Tidak Tersedia</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <!-- Multiple Images Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($images as $image)
                                @if ($image)
                                    <div class="relative group overflow-hidden rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 border border-islamic-gold/20">
                                        <img class="w-full h-80 object-cover transition-transform duration-500 group-hover:scale-110"
                                            src="{{ asset('storage/' . $image) }}" alt="{{ $activities->title }}">
                                        <!-- Hover Overlay -->
                                        <div class="absolute inset-0 bg-gradient-to-t from-islamic-green/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-3xl"></div>
                                    </div>
                                @else
                                    <div class="w-full h-80 bg-gradient-to-br from-islamic-gold/20 to-islamic-emerald/20 rounded-3xl flex items-center justify-center shadow-xl border border-islamic-gold/20">
                                        <div class="text-center">
                                            <i class="ri-image-line text-4xl text-islamic-gold/50 mb-2"></i>
                                            <span class="text-islamic-green/70 text-sm font-medium">Gambar Tidak Ada</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            <!-- Activity Content: Semua Topic -->
            <div class="mb-16">
                <div class="bg-white/90 backdrop-blur-md rounded-3xl shadow-xl border border-islamic-gold/20 p-10 relative overflow-hidden">
                    <!-- Islamic Pattern Decoration -->
                    <div class="absolute top-0 right-0 w-40 h-40 opacity-5">
                        <div class="w-full h-full" style="background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><defs><pattern id=%22islamic%22 patternUnits=%22userSpaceOnUse%22 width=%2220%22 height=%2220%22><circle cx=%2210%22 cy=%2210%22 r=%222%22 fill=%22%23D4AF37%22/></pattern></defs><rect width=%22100%25%22 height=%22100%25%22 fill=%22url(%23islamic)%22/></svg>'); background-size: 20px 20px;"></div>
                    </div>

                    <div class="relative">
                        @if ($activities->activityTopics && $activities->activityTopics->count())
                            @foreach ($activities->activityTopics as $index => $topic)
                                <div class="mb-10 {{ !$loop->last ? 'pb-10 border-b border-islamic-gold/20' : '' }}">
                                    <div class="flex items-start">
                                        <div class="w-12 h-12 bg-islamic-gold/20 rounded-full flex items-center justify-center mr-6 mt-1 flex-shrink-0">
                                            <span class="text-islamic-gold font-bold text-lg">{{ $index + 1 }}</span>
                                        </div>
                                        <div class="flex-1">
                                            <h2 class="text-3xl font-bold text-islamic-green mb-4">
                                                {{ $topic->title }}
                                            </h2>
                                            @if ($topic->subtitle)
                                                <p class="text-islamic-emerald font-medium mb-6 italic">
                                                    {{ $topic->subtitle }}
                                                </p>
                                            @endif
                                            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                                                {!! $topic->description !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-16">
                                <div class="w-24 h-24 bg-islamic-gold/20 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <i class="ri-file-text-line text-4xl text-islamic-gold"></i>
                                </div>
                                <p class="text-islamic-green/70 text-lg">Belum ada topik untuk aktivitas ini.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Navigation/Actions -->
            <div class="flex justify-center mb-16">
                <a href="/"
                    class="group inline-flex items-center px-10 py-5 bg-gradient-to-r from-islamic-green to-islamic-emerald hover:from-islamic-emerald hover:to-islamic-green text-white font-bold text-lg rounded-full transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105">
                    <i class="ri-arrow-left-line mr-3 group-hover:-translate-x-1 transition-transform duration-300"></i>
                    <span>Kembali ke Beranda</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Related Activities Section -->
    <section class="py-20 bg-gradient-to-br from-islamic-green/5 via-slate-50 to-islamic-emerald/5 relative overflow-hidden">
        <!-- Floating Islamic Elements -->
        <div class="absolute top-10 left-10 text-islamic-gold/5 text-6xl animate-float pointer-events-none">✨</div>
        <div class="absolute bottom-10 right-10 text-islamic-emerald/10 text-8xl animate-float pointer-events-none" style="animation-delay: -2s;">🌙</div>

        <div class="relative max-w-7xl mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center bg-islamic-gold/10 backdrop-blur-sm border border-islamic-gold/20 rounded-full px-6 py-3 mb-6">
                    <i class="ri-article-line text-islamic-gold mr-2"></i>
                    <span class="text-islamic-green font-medium">Aktivitas Terkait</span>
                </div>

                <h2 class="text-4xl md:text-5xl font-bold mb-6">
                    <span class="text-islamic-green">Aktivitas</span>
                    <span class="bg-gradient-to-r from-islamic-gold via-yellow-400 to-islamic-gold bg-clip-text text-transparent">Lainnya</span>
                </h2>
                <div class="w-24 h-1 bg-gradient-to-r from-islamic-gold to-islamic-emerald mx-auto rounded-full"></div>
            </div>

            <!-- Related Activities Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @foreach ($all_activities->sortByDesc('date')->take(4) as $activity)
                    @if ($activity->id !== $activities->id)
                        @php
                            $activityImages = json_decode($activity->image, true);
                        @endphp
                        <div class="bg-white/90 backdrop-blur-md rounded-3xl shadow-xl hover:shadow-2xl border border-islamic-gold/20 overflow-hidden group transition-all duration-500 transform hover:-translate-y-2">
                            <div class="md:flex h-full">
                                <!-- Image -->
                                <div class="md:w-1/2 relative overflow-hidden">
                                    @if (is_array($activityImages) && !empty($activityImages))
                                        <img src="{{ asset('storage/' . $activityImages[0]) }}"
                                            class="w-full h-64 md:h-full object-cover transition-transform duration-500 group-hover:scale-110" alt="{{ $activity->title }}">
                                    @else
                                        <div class="w-full h-64 md:h-full bg-gradient-to-br from-islamic-gold/20 to-islamic-emerald/20 flex items-center justify-center">
                                            <div class="text-center">
                                                <i class="ri-image-line text-4xl text-islamic-gold/50 mb-2"></i>
                                                <span class="text-islamic-green/70 text-sm font-medium">Gambar Tidak Ada</span>
                                            </div>
                                        </div>
                                    @endif
                                    <!-- Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-islamic-green/20 via-transparent to-transparent group-hover:from-islamic-green/40 transition-all duration-300"></div>
                                </div>

                                <!-- Content -->
                                <div class="md:w-1/2 p-8 flex flex-col justify-between relative">
                                    <!-- Islamic Corner Decoration -->
                                    <div class="absolute top-0 right-0 w-16 h-16 bg-islamic-gold/10 rounded-bl-full"></div>
                                    
                                    <div class="relative">
                                        <h3 class="text-2xl font-bold text-islamic-green mb-4 line-clamp-2 group-hover:text-islamic-gold transition-colors duration-300">
                                            {{ $activity->title }}
                                        </h3>
                                        <p class="text-gray-600 mb-6 line-clamp-3 leading-relaxed">
                                            {{ $activity->description }}
                                        </p>
                                    </div>

                                    <div class="flex items-center justify-between pt-4 border-t border-islamic-gold/20">
                                        <div class="text-sm text-islamic-green/80">
                                            <div class="flex items-center mb-2">
                                                <div class="w-6 h-6 bg-islamic-gold/20 rounded-full flex items-center justify-center mr-2">
                                                    <i class="ri-user-line text-islamic-gold text-xs"></i>
                                                </div>
                                                <span class="font-semibold">{{ $activity->trademark }}</span>
                                            </div>
                                            @php
                                                \Carbon\Carbon::setLocale('id');
                                            @endphp
                                            <div class="flex items-center text-xs text-gray-500">
                                                <i class="ri-calendar-line mr-1"></i>
                                                {{ \Carbon\Carbon::parse($activity->date)->translatedFormat('d M Y') }}
                                            </div>
                                        </div>
                                        <a href="/activity/{{ $activity->slug }}"
                                            class="group/btn inline-flex items-center px-6 py-3 bg-gradient-to-r from-islamic-gold to-yellow-500 hover:from-yellow-500 hover:to-islamic-gold text-white font-semibold rounded-full transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105">
                                            <span>Baca</span>
                                            <i class="ri-arrow-right-line ml-2 group-hover/btn:translate-x-1 transition-transform duration-200"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- View All Activities Button -->
            <div class="text-center mt-16">
                <a href="/#aktifitas"
                    class="group inline-flex items-center px-10 py-5 bg-white/90 backdrop-blur-sm text-islamic-green border-2 border-islamic-green rounded-full hover:bg-islamic-green hover:text-white transition-all duration-300 shadow-xl hover:shadow-2xl font-bold text-lg transform hover:scale-105">
                    <span>Lihat Semua Aktivitas</span>
                    <i class="ri-arrow-right-line ml-3 group-hover:translate-x-2 transition-transform duration-300"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Custom Styles for Text Truncation and Prose -->
    <style>
        .prose h1 {
            font-size: 2.25rem;
            line-height: 2.5rem;
            font-weight: 600;
            color: #006233;
            margin-bottom: 1.5rem;
        }

        .prose h2 {
            font-size: 1.875rem;
            line-height: 2.25rem;
            font-weight: 600;
            color: #006233;
            margin-bottom: 1rem;
        }

        .prose h3 {
            font-size: 1.5rem;
            line-height: 2rem;
            font-weight: 500;
            color: #50C878;
            margin-bottom: 1rem;
        }

        .prose h4 {
            font-size: 1.25rem;
            line-height: 1.75rem;
            font-weight: 500;
            color: #50C878;
            margin-bottom: 0.75rem;
        }

        .prose h5 {
            font-size: 1.125rem;
            line-height: 1.5rem;
            font-weight: 500;
            color: #50C878;
            margin-bottom: 0.75rem;
        }

        .prose h6 {
            font-size: 1rem;
            line-height: 1.5rem;
            font-weight: 500;
            color: #50C878;
            margin-bottom: 0.5rem;
        }

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

        .prose p {
            margin-bottom: 1rem;
            line-height: 1.75;
        }

        .prose ul,
        .prose ol {
            margin: 1rem 0;
            padding-left: 1.5rem;
        }

        .prose li {
            margin-bottom: 0.5rem;
        }

        .prose blockquote {
            border-left: 4px solid #D4AF37;
            padding-left: 1.5rem;
            margin: 1.5rem 0;
            font-style: italic;
            background: linear-gradient(135deg, #D4AF37/10, #50C878/5);
            padding: 1.5rem;
            border-radius: 1rem;
            backdrop-filter: blur(10px);
            border: 1px solid #D4AF37/20;
        }

        .prose strong {
            color: #006233;
            font-weight: 600;
        }

        .prose em {
            color: #50C878;
        }

        .prose a {
            color: #D4AF37;
            text-decoration: none;
            font-weight: 500;
        }

        .prose a:hover {
            color: #006233;
            text-decoration: underline;
        }
    </style>
@endsection