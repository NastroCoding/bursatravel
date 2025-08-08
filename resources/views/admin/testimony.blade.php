@extends('layouts.admin')
@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 animate__animated animate__fadeInDown animate__faster"
                role="alert">
                <span class="font-medium">{{ $error }}</span>
            </div>
        @endforeach
    @endif
    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 animate__animated animate__fadeInDown animate__faster"
            role="alert">
            <span class="font-medium">Sukses!</span> {{ session('success') }}
        </div>
    @endif
    <h1 class="text-3xl">Testimoni</h1>
    <button data-modal-target="add-modal" data-modal-toggle="add-modal" type="button"
        class="mt-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 transition mb-2 focus:outline-none">Tambah
        Testimoni</button>

    <!-- Add Modal -->
    <div id="add-modal" aria-hidden="true" data-modal-backdrop="static"
        class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Tambah Testimoni
                    </h3>
                    <button type="button"
                        class="transition text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="add-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form method="post" action="/admin/testimony/post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-4 md:p-5 space-y-4">
                        <!-- Image Upload Section -->
                        <div class="mb-5">
                            <label class="block mb-2 text-sm font-medium text-gray-900" for="add_file_input">Upload
                                foto</label>
                            <input
                                class="transition block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                id="add_file_input" name="image" type="file" accept="image/*">
                            <span class="text-red-700 text-sm font-medium">* disarankan foto dengan aspek rasio 4:3 atau
                                1:1</span>
                            <img id="add_image_preview" class="mt-4 hidden w-3/5 rounded-lg" />
                        </div>

                        <!-- Name Input -->
                        <div class="mb-5">
                            <label for="add_nama" class="block mb-2 text-sm font-medium text-gray-900">Nama <span
                                    class="text-red-700">*</span></label>
                            <input type="text" id="add_nama" name="name" placeholder="Masukkan Nama"
                                class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                required value="{{ old('name') }}" />
                        </div>

                        <!-- Caption Input -->
                        <div class="mb-5">
                            <label for="add_caption" class="block mb-2 text-sm font-medium text-gray-900">Caption</label>
                            <input type="text" id="add_caption" name="caption"
                                placeholder="Masukkan Caption, contoh : Influencer" value="{{ old('caption') }}"
                                class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                        </div>

                        <!-- Testimony Description -->
                        <div class="mb-5">
                            <label for="add_message" class="block mb-2 text-sm font-medium text-gray-900">Testimoni <span
                                    class="text-red-700">*</span></label>
                            <textarea id="add_message" rows="4" name="description"
                                class="transition block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Masukkan Testimoni" required>{{ old('description') }}</textarea>
                        </div>

                        <!-- Media Section -->
                        <div class="mb-5 border-t pt-4">
                            <h4 class="text-lg font-medium text-gray-900 mb-3">Media (Opsional - Pilih salah satu)</h4>

                            <!-- YouTube URL Input -->
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900">YouTube URL</label>
                                <input type="url" name="youtube_url" value="{{ old('youtube') }}"
                                    placeholder="https://www.youtube.com/watch?v=..."
                                    class="transition block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                <span class="text-gray-500 text-xs">Masukkan URL YouTube untuk video testimoni</span>
                            </div>

                            <!-- Video/Photo Upload Input -->
                            <div class="mb-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900">Upload Video/Foto</label>
                                <input type="file" name="video" accept="video/mp4,video/webm,video/ogg,image/*"
                                    class="transition block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                <span class="text-gray-500 text-xs">Format yang didukung: MP4, WebM, OGG, JPG, PNG, JPEG, GIF (maksimal 50MB)</span>
                            </div>

                            <div class="mt-2 p-2 bg-blue-50 rounded border-l-4 border-blue-400">
                                <p class="text-xs text-blue-700">
                                    <strong>Catatan:</strong> Jika Anda mengisi YouTube URL dan upload video file, YouTube
                                    URL akan diprioritaskan.
                                    Kosongkan YouTube URL jika ingin menggunakan video file yang diupload.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                        <button type="submit"
                            class="text-white transition bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Tambah
                            Testimoni</button>
                        <button data-modal-hide="add-modal" type="button"
                            class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Testimonials Grid Display -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4">
    @foreach ($testimonials->sortByDesc('created_at') as $testimony)
        @php
            // Optimized YouTube ID extraction (supports youtube.com, youtu.be, youtube shorts)
            $youtube_id = null;
            if ($testimony->youtube_url) {
                if (
                    preg_match(
                        '/(?:youtube\.com\/(?:shorts\/|watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/',
                        $testimony->youtube_url,
                        $matches
                    )
                ) {
                    $youtube_id = $matches[1];
                } elseif (preg_match('/^([a-zA-Z0-9_-]{11})$/', $testimony->youtube_url)) {
                    $youtube_id = $testimony->youtube_url;
                }
            }

            // Detect if $testimony->video is actually an image or video
            $filePath = $testimony->video;
            $extension = $filePath ? strtolower(pathinfo($filePath, PATHINFO_EXTENSION)) : null;
            $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
            $isVideo = in_array($extension, ['mp4', 'webm', 'ogg']);
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
                                    <img src="{{ Storage::url($testimony->image) ?? "https://placehold.co/40" }}" alt="{{ $testimony->name }}"
                                        class="w-full h-full object-cover">
                                @endif
                            </div>
                            <div>
                                <h3 class="font-semibold text-sm">{{ $testimony->name }}</h3>
                                @if ($testimony->caption)
                                    <p class="text-gray-500 text-xs">{{ $testimony->caption }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-2">
                            <button data-modal-target="edit-modal-{{ $testimony->id }}"
                                data-modal-toggle="edit-modal-{{ $testimony->id }}"
                                class="inline-flex items-center px-3 py-1 text-xs font-medium text-center text-white bg-blue-700 rounded hover:bg-blue-800 transition">
                                Edit
                            </button>
                            <a href="#" data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                data-id="{{ $testimony->id }}"
                                class="delete-btn px-3 py-1 text-xs font-medium text-white bg-red-700 rounded hover:bg-red-800 transition">
                                Hapus
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        @elseif ($isVideo)
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
                                <img src="{{ Storage::url($testimony->image) ?? "https://placehold.co/40"}}"
                                    alt="{{ $testimony->name }}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-semibold text-sm">{{ $testimony->name }}</h3>
                                @if ($testimony->caption)
                                    <p class="text-gray-500 text-xs">{{ $testimony->caption }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-2">
                            <button data-modal-target="edit-modal-{{ $testimony->id }}"
                                data-modal-toggle="edit-modal-{{ $testimony->id }}"
                                class="inline-flex items-center px-3 py-1 text-xs font-medium text-center text-white bg-blue-700 rounded hover:bg-blue-800 transition">
                                Edit
                            </button>
                            <a href="#" data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                data-id="{{ $testimony->id }}"
                                class="delete-btn px-3 py-1 text-xs font-medium text-white bg-red-700 rounded hover:bg-red-800 transition">
                                Hapus
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        @elseif ($isImage)
            <!-- Full Image Card -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="w-full aspect-video">
                    <img src="{{ Storage::url($testimony->video) }}" 
                         alt="{{ $testimony->name }}" class="w-full h-full object-contain">
                </div>

                <!-- Small overlay with name and actions -->
                <div class="p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-gray-200">
                                <img src="https://placehold.co/40"
                                    alt="" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="font-semibold text-sm">{{ $testimony->name }}</h3>
                                @if ($testimony->caption)
                                    <p class="text-gray-500 text-xs">{{ $testimony->caption }}</p>
                                @endif
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-2">
                            <button data-modal-target="edit-modal-{{ $testimony->id }}"
                                data-modal-toggle="edit-modal-{{ $testimony->id }}"
                                class="inline-flex items-center px-3 py-1 text-xs font-medium text-center text-white bg-blue-700 rounded hover:bg-blue-800 transition">
                                Edit
                            </button>
                            <a href="#" data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                data-id="{{ $testimony->id }}"
                                class="delete-btn px-3 py-1 text-xs font-medium text-white bg-red-700 rounded hover:bg-red-800 transition">
                                Hapus
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        @else
            <!-- Standard Text Card -->
            <div class="bg-white p-6 rounded-lg shadow-md flex flex-col items-center text-center">
                <!-- Profile Image -->
                <div class="w-16 h-16 rounded-full overflow-hidden border-2 border-gray-200 mb-4">
                    <img src="{{ $testimony->image ? Storage::url($testimony->image) : 'https://placehold.co/40' }}"
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

                <!-- Action Buttons -->
                <div class="flex mt-4 md:mt-6">
                    <button data-modal-target="edit-modal-{{ $testimony->id }}"
                        data-modal-toggle="edit-modal-{{ $testimony->id }}"
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 transition">
                        Edit
                    </button>
                    <a href="#" data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                        data-id="{{ $testimony->id }}"
                        class="delete-btn py-2 px-4 ms-2 text-sm font-medium text-white focus:outline-none bg-red-700 rounded-lg border border-gray-200 hover:bg-red-800 focus:z-10 focus:ring-4 focus:ring-gray-100 transition">
                        Hapus
                    </a>
                </div>
            </div>
        @endif
    @endforeach
</div>
    <!-- Edit Modals -->
    @foreach ($testimonials as $testimony)
        <div id="edit-modal-{{ $testimony->id }}" aria-hidden="true" data-modal-backdrop="static"
            class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900">
                            Edit Testimoni
                        </h3>
                        <button type="button"
                            class="transition text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                            data-modal-hide="edit-modal-{{ $testimony->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Tutup</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form method="post" action="/admin/testimony/update/{{ $testimony->id }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="p-4 md:p-5 space-y-4">
                            <!-- Image Upload Section -->
                            <div class="mb-5">
                                <label class="block mb-2 text-sm font-medium text-gray-900"
                                    for="edit_file_input_{{ $testimony->id }}">Upload
                                    foto</label>
                                <input
                                    class="transition block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                    id="edit_file_input_{{ $testimony->id }}" name="image" type="file"
                                    accept="image/*">
                                <input type="hidden" name="old_image" value="{{ $testimony->image }}">
                                @if ($testimony->image)
                                    <img id="edit_image_preview_{{ $testimony->id }}" class="mt-4 w-3/5 rounded-lg"
                                        src="{{ Storage::url($testimony->image) }}" />
                                @endif
                                <span class="text-red-700 text-sm font-medium">* disarankan foto dengan aspek rasio 4:3
                                    atau 1:1</span>
                            </div>

                            <!-- Name Input -->
                            <div class="mb-5">
                                <label for="edit_nama_{{ $testimony->id }}"
                                    class="block mb-2 text-sm font-medium text-gray-900">Nama <span
                                        class="text-red-700">*</span></label>
                                <input type="text" id="edit_nama_{{ $testimony->id }}" name="name"
                                    placeholder="Masukkan Nama"
                                    class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    required value="{{ $testimony->name }}" />
                            </div>

                            <!-- Caption Input -->
                            <div class="mb-5">
                                <label for="edit_caption_{{ $testimony->id }}"
                                    class="block mb-2 text-sm font-medium text-gray-900">Caption</label>
                                <input type="text" id="edit_caption_{{ $testimony->id }}" name="caption"
                                    placeholder="Masukkan Caption, contoh : Influencer" value="{{ $testimony->caption }}"
                                    class="transition shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" />
                            </div>

                            <!-- Testimony Description -->
                            <div class="mb-5">
                                <label for="edit_message_{{ $testimony->id }}"
                                    class="block mb-2 text-sm font-medium text-gray-900">Testimoni
                                    <span class="text-red-700">*</span></label>
                                <textarea id="edit_message_{{ $testimony->id }}" rows="4" name="description"
                                    class="transition block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Masukkan Testimoni" required>{{ $testimony->description }}</textarea>
                            </div>

                            <!-- Media Section -->
                            <div class="mb-5 border-t pt-4">
                                <h4 class="text-lg font-medium text-gray-900 mb-3">Media (Pilih salah satu)</h4>

                                <!-- YouTube URL Input -->
                                <div class="mb-4">
                                    <label class="block mb-2 text-sm font-medium text-gray-900">YouTube URL</label>
                                    <input type="url" name="youtube_url"
                                        value="{{ $testimony->youtube_url}}"
                                        placeholder="https://www.youtube.com/watch?v=..."
                                        class="transition block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                                    <span class="text-gray-500 text-xs">Masukkan URL YouTube untuk video testimoni</span>
                                </div>

                                <!-- Video/Photo Upload Input -->
                                <div class="mb-4">
                                    <label class="block mb-2 text-sm font-medium text-gray-900">Upload Video/Foto</label>
                                    <input type="file" name="video" accept="video/mp4,video/webm,video/ogg,image/*"
                                        class="transition block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                                    <input type="hidden" name="old_video" value="{{ $testimony->video }}">
                                    <span class="text-gray-500 text-xs">Format yang didukung: MP4, WebM, OGG, JPG, PNG, JPEG, GIF (maksimal 50MB)</span>
                                </div>

                                <!-- Current Media Display -->
                                @if ($testimony->youtube || $testimony->video)
                                    <div class="mt-4 p-3 bg-gray-50 rounded-lg">
                                        <h5 class="text-sm font-medium text-gray-700 mb-2">Media saat ini:</h5>

                                        @if ($testimony->youtube)
                                            <div class="mb-3">
                                                <span class="text-xs text-gray-600">YouTube Video:</span>
                                                @php
                                                    // Extract YouTube video ID
                                                    preg_match(
                                                        '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/',
                                                        $testimony->youtube,
                                                        $matches,
                                                    );
                                                    $youtube_id = $matches[1] ?? null;
                                                @endphp
                                                @if ($youtube_id)
                                                    <div class="aspect-video w-full max-w-md">
                                                        <iframe class="w-full h-full rounded-lg"
                                                            src="https://www.youtube.com/embed/{{ $youtube_id }}"
                                                            frameborder="0"
                                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen>
                                                        </iframe>
                                                    </div>
                                                @else
                                                    <p class="text-sm text-red-600">URL YouTube tidak valid</p>
                                                @endif
                                            </div>
                                        @endif

                                        @if ($testimony->video)
                                            <div class="mb-3">
                                                <span class="text-xs text-gray-600">Video File:</span>
                                                <video controls class="w-full max-w-md rounded-lg mt-1">
                                                    <source src="{{ Storage::url($testimony->video) }}" type="video/mp4">
                                                    <source src="{{ Storage::url($testimony->video) }}"
                                                        type="video/webm">
                                                    <source src="{{ Storage::url($testimony->video) }}" type="video/ogg">
                                                    Browser Anda tidak mendukung tag video.
                                                </video>
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                <div class="mt-2 p-2 bg-blue-50 rounded border-l-4 border-blue-400">
                                    <p class="text-xs text-blue-700">
                                        <strong>Catatan:</strong> Jika Anda mengisi YouTube URL dan upload video file,
                                        YouTube URL akan diprioritaskan.
                                        Kosongkan YouTube URL jika ingin menggunakan video file yang diupload.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                            <button type="submit"
                                class="text-white transition bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit
                                Testimoni</button>
                            <button data-modal-hide="edit-modal-{{ $testimony->id }}" type="button"
                                class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Delete modal -->
    <div id="delete-modal" aria-hidden="true" data-modal-backdrop="static"
        class="hidden animate__animated animate__fadeIn animate__faster overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Hapus
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="delete-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Tutup</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <p>Apakah anda yakin untuk menghapus data ini?</p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                    <a type="button" id="deleteButton"
                        class="text-white transition bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Hapus</a>
                    <button data-modal-hide="delete-modal" type="button"
                        class="py-2.5 px-5 ms-3 transition text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Delete button functionality
            $('.delete-btn').click(function() {
                var teamId = $(this).data('id');
                var deleteUrl = '/admin/testimony/delete/' + teamId;
                $('#deleteButton').attr('href', deleteUrl);
            });
        });

        // Image preview for Add modal
        document.getElementById('add_file_input').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('add_image_preview');
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        });

        // Image preview for Edit modals
        @foreach ($testimonials as $testimony)
            document.getElementById('edit_file_input_{{ $testimony->id }}').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.getElementById('edit_image_preview_{{ $testimony->id }}');
                        preview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        @endforeach
    </script>
@endsection
