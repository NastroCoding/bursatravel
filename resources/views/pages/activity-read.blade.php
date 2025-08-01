@extends('layouts.main')
@section('content')
    <!-- Activity Detail Section -->
    <section class="py-16 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            @php
                $images = json_decode($activities->image, true);
            @endphp

            <!-- Article Header -->
            <div class="mb-8">
                <!-- Meta Information -->
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between text-sm text-gray-500 mb-6">
                    <div class="flex items-center mb-2 sm:mb-0">
                        <i class="fas fa-user-circle text-blue-600 mr-2"></i>
                        <span>Ditulis oleh: <strong class="text-gray-700">{{ $activities->trademark ?? 'Admin' }}</strong></span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-calendar text-blue-600 mr-2"></i>
                        @php
                            \Carbon\Carbon::setLocale('id');
                        @endphp
                        <span>{{ \Carbon\Carbon::parse($activities->date)->translatedFormat('d F Y') }}</span>
                    </div>
                </div>

                <!-- Title and Description -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-8 border-l-4 border-blue-600">
                    <h1 class="text-3xl md:text-4xl font-light text-gray-800 mb-4 leading-tight">
                        {{ $activities->title }}
                    </h1>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        {{ $activities->description }}
                    </p>
                </div>
            </div>

            <!-- Activity Images -->
            @if ($images)
                <div class="mb-12">
                    @if (count($images) === 1)
                        <!-- Single Image -->
                        <div class="text-center">
                            @foreach ($images as $image)
                                @if ($image)
                                    <img class="w-full max-w-2xl mx-auto rounded-lg shadow-sm border border-gray-100"
                                         src="{{ asset('storage/' . $image) }}" 
                                         alt="{{ $activities->title }}">
                                @else
                                    <div class="w-full max-w-2xl mx-auto h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <span class="text-gray-400">No Image Available</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @else
                        <!-- Multiple Images Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($images as $image)
                                @if ($image)
                                    <img class="w-full h-64 object-cover rounded-lg shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300"
                                         src="{{ asset('storage/' . $image) }}" 
                                         alt="{{ $activities->title }}">
                                @else
                                    <div class="w-full h-64 bg-gray-100 rounded-lg flex items-center justify-center">
                                        <span class="text-gray-400 text-sm">No Image</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            <!-- Activity Content: Semua Topic -->
            <div class="mb-12">
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-8">
                    @if($activities->activityTopics && $activities->activityTopics->count())
                        @foreach($activities->activityTopics as $topic)
                            <div class="mb-8">
                                <h2 class="text-2xl font-medium text-gray-800 mb-3">
                                    {{ $topic->title }}
                                </h2>
                                @if($topic->subtitle)
                                    <p class="text-gray-500 text-sm mb-4 italic">
                                        {{ $topic->subtitle }}
                                    </p>
                                @endif
                                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                                    {!! $topic->description !!}
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-500">Belum ada topik untuk aktivitas ini.</p>
                    @endif
                </div>
            </div>

            <!-- Navigation/Actions -->
            <div class="flex justify-center mb-12">
                <a href="/" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </section>

    <!-- Related Activities Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <!-- Section Header -->
            <div class="mb-12">
                <h2 class="text-3xl font-light text-gray-800 mb-4">Aktivitas Lainnya</h2>
                <div class="w-16 h-0.5 bg-blue-600"></div>
            </div>

            <!-- Related Activities Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @foreach ($all_activities->sortByDesc('date')->take(4) as $activity)
                    @if ($activity->id !== $activities->id)
                        @php
                            $activityImages = json_decode($activity->image, true);
                        @endphp
                        <div class="bg-white rounded-lg shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow duration-300">
                            <div class="md:flex">
                                <!-- Image -->
                                <div class="md:w-1/2">
                                    @if (is_array($activityImages) && !empty($activityImages))
                                        <img src="{{ asset('storage/' . $activityImages[0]) }}"
                                             class="w-full h-48 md:h-full object-cover" 
                                             alt="{{ $activity->title }}">
                                    @else
                                        <div class="w-full h-48 md:h-full bg-gray-100 flex items-center justify-center">
                                            <span class="text-gray-400 text-sm">No Image</span>
                                        </div>
                                    @endif
                                </div>
                                
                                <!-- Content -->
                                <div class="md:w-1/2 p-6 flex flex-col justify-between">
                                    <div>
                                        <h3 class="text-xl font-medium text-gray-800 mb-3 line-clamp-2">
                                            {{ $activity->title }}
                                        </h3>
                                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                            {{ $activity->description }}
                                        </p>
                                    </div>
                                    
                                    <div class="flex items-center justify-between">
                                        <div class="text-xs text-gray-500">
                                            <p class="mb-1">{{ $activity->trademark }}</p>
                                            @php
                                                \Carbon\Carbon::setLocale('id');
                                            @endphp
                                            <p>{{ \Carbon\Carbon::parse($activity->date)->translatedFormat('d M Y') }}</p>
                                        </div>
                                        <a href="/activity/{{ $activity->slug }}"
                                           class="inline-flex items-center text-sm font-medium text-blue-600 hover:text-blue-800 transition-colors">
                                            Baca
                                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- View All Activities Button -->
            <div class="text-center mt-12">
                <a href="/#aktifitas" class="inline-flex items-center px-6 py-3 bg-white text-blue-600 border border-blue-600 rounded-lg hover:bg-blue-50 transition-colors duration-300">
                    Lihat Semua Aktivitas
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Custom Styles for Text Truncation -->
    <style>
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

        .prose h1, .prose h2, .prose h3, .prose h4, .prose h5, .prose h6 {
            color: #374151;
            font-weight: 500;
        }

        .prose p {
            margin-bottom: 1rem;
        }

        .prose ul, .prose ol {
            margin: 1rem 0;
            padding-left: 1.5rem;
        }

        .prose blockquote {
            border-left: 4px solid #3b82f6;
            padding-left: 1rem;
            margin: 1.5rem 0;
            font-style: italic;
            background-color: #f8fafc;
            padding: 1rem;
            border-radius: 0.5rem;
        }
    </style>
@endsection