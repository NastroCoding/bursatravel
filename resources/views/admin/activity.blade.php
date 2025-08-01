@extends('layouts.admin')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Alerts -->
    @if ($errors->any())
        <div class="mb-6 space-y-2">
            @foreach ($errors->all() as $error)
                <div class="flex items-center p-4 bg-red-50 border border-red-200 rounded-lg animate-fade-in-down">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-red-800">{{ $error }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @if (session('success'))
        <div class="mb-6">
            <div class="flex items-center p-4 bg-green-50 border border-green-200 rounded-lg animate-fade-in-down">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Page Header -->
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Aktifitas</h1>
            <p class="mt-1 text-sm text-gray-600">Kelola aktifitas, berita, dan quotes Anda</p>
        </div>
        <button data-modal-target="add-modal" data-modal-toggle="add-modal" type="button"
            class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Aktifitas
        </button>
    </div>

    <!-- Activities Grid -->
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($activities->sortByDesc('date') as $activity)
            @php
                $images = json_decode($activity->image, true);
            @endphp
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-200 overflow-hidden">
                <!-- Image -->
                <div class="aspect-video bg-gray-100">
                    @if (is_array($images) && !empty($images))
                        <img src="{{ asset('storage/' . $images[0]) }}" 
                             class="w-full h-full object-cover lazyload" 
                             alt="{{ $activity->title }}">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-gray-100">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    @endif
                </div>

                <!-- Content -->
                <div class="p-6">
                    <!-- Type Badge -->
                    <div class="mb-3">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium uppercase
                            @if($activity->type == 'Aktifitas') bg-blue-100 text-blue-800
                            @elseif($activity->type == 'Berita') bg-green-100 text-green-800
                            @else bg-purple-100 text-purple-800 @endif">
                            {{ $activity->type }}
                        </span>
                    </div>

                    <!-- Title -->
                    <h3 class="text-lg font-semibold text-gray-900 mb-2 line-clamp-2">
                        {{ $activity->title }}
                    </h3>

                    <!-- Description -->
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        {{ $activity->description }}
                    </p>

                    <!-- Meta Info -->
                    <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                        <span>Oleh {{ $activity->trademark }}</span>
                        @php
                            \Carbon\Carbon::setLocale('id');
                        @endphp
                        <span>{{ \Carbon\Carbon::parse($activity->date)->format('d M Y') }}</span>
                    </div>

                    <!-- Actions -->
                    <div class="flex items-center gap-2">
                        <button data-modal-target="edit-modal{{ $activity->id }}" data-modal-toggle="edit-modal{{ $activity->id }}"
                            class="flex-1 inline-flex items-center justify-center px-3 py-2 text-xs font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors duration-200">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit
                        </button>

                        <a href="/activity/{{ $activity->slug }}"
                            class="flex-1 inline-flex items-center justify-center px-3 py-2 text-xs font-medium text-green-700 bg-green-50 hover:bg-green-100 rounded-lg transition-colors duration-200">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Lihat
                        </a>

                        <button data-modal-target="delete-modal" data-modal-toggle="delete-modal" data-id="{{ $activity->id }}"
                            class="p-2 text-red-700 bg-red-50 hover:bg-red-100 rounded-lg transition-colors duration-200 delete-btn">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </div>

                    <!-- Topics Link -->
                    <div class="mt-3 pt-3 border-t border-gray-100">
                        <a href="{{ route('activities.activity-topics.index', $activity->id) }}"
                            class="inline-flex items-center text-xs font-medium text-gray-600 hover:text-gray-900 transition-colors duration-200">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            Kelola Topik
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Empty State -->
    @if($activities->isEmpty())
        <div class="text-center py-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada aktifitas</h3>
            <p class="mt-1 text-sm text-gray-500">Mulai dengan membuat aktifitas pertama Anda.</p>
            <div class="mt-6">
                <button data-modal-target="add-modal" data-modal-toggle="add-modal" type="button"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Tambah Aktifitas
                </button>
            </div>
        </div>
    @endif
</div>

<!-- Edit Modals -->
@foreach ($activities->sortByDesc('created_at') as $activity)
    @php
        $images = json_decode($activity->image, true);
    @endphp
    <div id="edit-modal{{ $activity->id }}" aria-hidden="true" data-modal-backdrop="static"
        class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50">
        <div class="relative w-full max-w-2xl max-h-[90vh] bg-white rounded-xl shadow-xl">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">Edit Activity</h3>
                <button type="button" data-modal-hide="edit-modal{{ $activity->id }}"
                    class="text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg p-2 transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="p-6 max-h-[60vh] overflow-y-auto">
                <form id="edit-activity-form-{{ $activity->id }}" method="post"
                    action="/admin/activity/edit/{{ $activity->id }}" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-6">
                        <!-- Image Upload -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Upload Images</label>
                            <input type="file" id="file_input_edit_{{ $activity->id }}" name="image[]" 
                                accept="image/*" multiple
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-200 p-2">
                            <div class="mt-2 text-xs text-gray-500 space-y-1">
                                <p>• Recommended aspect ratio: 16:9</p>
                                <p>• Maximum 3 images</p>
                            </div>
                            
                            <!-- Current Images -->
                            @if ($activity->image)
                                <div class="mt-4 grid grid-cols-3 gap-2">
                                    @foreach (json_decode($activity->image, true) as $image)
                                        <div class="relative group">
                                            <img src="{{ asset('storage/' . $image) }}" class="w-full h-20 object-cover rounded-lg">
                                            <button type="button" data-image-path="{{ $image }}"
                                                class="delete-image-button absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-xs hover:bg-red-600 transition-colors duration-200">×</button>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <div id="image_preview_edit_{{ $activity->id }}" class="mt-4 hidden"></div>
                        </div>

                        <!-- Title -->
                        <div>
                            <label for="title_edit_{{ $activity->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                Title <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="title_edit_{{ $activity->id }}" name="title" 
                                value="{{ $activity->title }}" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description_edit_{{ $activity->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                Description <span class="text-red-500">*</span>
                            </label>
                            <textarea id="description_edit_{{ $activity->id }}" name="description" rows="4" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">{{ $activity->description }}</textarea>
                        </div>

                        <!-- Type -->
                        <div>
                            <label for="type_edit_{{ $activity->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                Type <span class="text-red-500">*</span>
                            </label>
                            <select id="type_edit_{{ $activity->id }}" name="type" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
                                <option value="Aktifitas" {{ $activity->type == 'Aktifitas' ? 'selected' : '' }}>Aktifitas</option>
                                <option value="Berita" {{ $activity->type == 'Berita' ? 'selected' : '' }}>Berita</option>
                                <option value="Quotes" {{ $activity->type == 'Quotes' ? 'selected' : '' }}>Quotes</option>
                            </select>
                        </div>

                        <!-- Author and Date -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="author_edit_{{ $activity->id }}" class="block text-sm font-medium text-gray-700 mb-2">Author</label>
                                <input type="text" id="author_edit_{{ $activity->id }}" name="author" 
                                    value="{{ $activity->trademark }}" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
                            </div>
                            <div>
                                <label for="date_edit_{{ $activity->id }}" class="block text-sm font-medium text-gray-700 mb-2">
                                    Date <span class="text-red-500">*</span>
                                </label>
                                <input type="date" id="date_edit_{{ $activity->id }}" name="date" 
                                    value="{{ $activity->date }}" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                        <button type="button" data-modal-hide="edit-modal{{ $activity->id }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors duration-200">
                            Update Activity
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

<!-- Add Modal -->
<div id="add-modal" aria-hidden="true" data-modal-backdrop="static"
    class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50">
    <div class="relative w-full max-w-2xl max-h-[90vh] bg-white rounded-xl shadow-xl">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900">Add New Activity</h3>
            <button type="button" data-modal-hide="add-modal"
                class="text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg p-2 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Modal body -->
        <div class="p-6 max-h-[60vh] overflow-y-auto">
            <form id="add-activity-form" method="post" action="/admin/activity/post" enctype="multipart/form-data">
                @csrf
                <div class="space-y-6">
                    <!-- Image Upload -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Upload Images</label>
                        <input type="file" id="file_input_add" name="image[]" accept="image/*" multiple
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition-colors duration-200 p-2">
                        <div class="mt-2 text-xs text-gray-500 space-y-1">
                            <p>• Recommended aspect ratio: 16:9</p>
                            <p>• Maximum 3 images</p>
                        </div>
                        <div id="image_preview_add" class="mt-4 hidden"></div>
                    </div>

                    <!-- Title -->
                    <div>
                        <label for="title_add" class="block text-sm font-medium text-gray-700 mb-2">
                            Title <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="title_add" name="title" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                            placeholder="Enter activity title">
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description_add" class="block text-sm font-medium text-gray-700 mb-2">
                            Description <span class="text-red-500">*</span>
                        </label>
                        <textarea id="description_add" name="description" rows="4" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                            placeholder="Enter activity description"></textarea>
                    </div>

                    <!-- Type -->
                    <div>
                        <label for="type_add" class="block text-sm font-medium text-gray-700 mb-2">
                            Type <span class="text-red-500">*</span>
                        </label>
                        <select id="type_add" name="type" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
                            <option value="Aktifitas">Aktifitas</option>
                            <option value="Berita">Berita</option>
                            <option value="Quotes">Quotes</option>
                        </select>
                    </div>

                    <!-- Author and Date -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="author_add" class="block text-sm font-medium text-gray-700 mb-2">Author</label>
                            <input type="text" id="author_add" name="author" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                                placeholder="Enter author name">
                        </div>
                        <div>
                            <label for="date_add" class="block text-sm font-medium text-gray-700 mb-2">
                                Date <span class="text-red-500">*</span>
                            </label>
                            <input type="date" id="date_add" name="date" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-200">
                    <button type="button" data-modal-hide="add-modal"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors duration-200">
                        Add Activity
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div id="delete-modal" aria-hidden="true" data-modal-backdrop="static"
    class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50">
    <div class="relative w-full max-w-md bg-white rounded-xl shadow-xl">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-6 border-b border-gray-200">
            <h3 class="text-xl font-semibold text-gray-900">Delete Activity</h3>
            <button type="button" data-modal-hide="delete-modal"
                class="text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg p-2 transition-colors duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <!-- Modal body -->
        <div class="p-6">
            <div class="flex items-center mb-4">
                <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <h4 class="text-lg font-medium text-gray-900">Are you sure?</h4>
                    <p class="text-sm text-gray-600">This action cannot be undone. This will permanently delete the activity.</p>
                </div>
            </div>

            <div class="flex items-center justify-end gap-3">
                <button type="button" data-modal-hide="delete-modal"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                    Cancel
                </button>
                <a id="deleteButton"
                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition-colors duration-200">
                    Delete Activity
                </a>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Delete button functionality
    $('.delete-btn').click(function() {
        var activityId = $(this).data('id');
        var deleteUrl = '/admin/activity/delete/' + activityId;
        $('#deleteButton').attr('href', deleteUrl);
    });

    // File input handlers for add modal
    $("#file_input_add").on("change", function() {
        const files = $("#file_input_add")[0].files;
        const previewContainer = $("#image_preview_add");

        if (files.length > 3) {
            alert("You can select only 3 images");
            $(this).val('');
            previewContainer.addClass('hidden').html('');
        } else if (files.length > 0) {
            previewContainer.removeClass('hidden').html('');
            
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imageContainer = $('<div>').addClass('relative inline-block mr-2 mb-2');
                    const img = $('<img>').attr('src', e.target.result).addClass('w-20 h-20 object-cover rounded-lg');
                    imageContainer.append(img);
                    previewContainer.append(imageContainer);
                }
                reader.readAsDataURL(file);
            });
        } else {
            previewContainer.addClass('hidden').html('');
        }
    });

    // File input handlers for edit modals
    $('[id^="file_input_edit_"]').on("change", function() {
        const activityId = $(this).attr('id').split('_').pop();
        const files = this.files;
        const previewContainer = $(`#image_preview_edit_${activityId}`);

        if (files.length > 3) {
            alert("You can select only 3 images");
            $(this).val('');
            previewContainer.addClass('hidden').html('');
        } else if (files.length > 0) {
            previewContainer.removeClass('hidden').html('');
            
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imageContainer = $('<div>').addClass('relative inline-block mr-2 mb-2');
                    const img = $('<img>').attr('src', e.target.result).addClass('w-20 h-20 object-cover rounded-lg');
                    imageContainer.append(img);
                    previewContainer.append(imageContainer);
                }
                reader.readAsDataURL(file);
            });
        } else {
            previewContainer.addClass('hidden').html('');
        }
    });

    // Delete image functionality
    $('.delete-image-button').click(function() {
        const imagePath = $(this).data('image-path');
        const imageContainer = $(this).parent();
        
        // You can add AJAX call here to delete image from server
        // For now, just hide the image container
        imageContainer.fadeOut(300, function() {
            $(this).remove();
        });
    });

    // Modal backdrop click to close
    // $('[id$="-modal"]').click(function(e) {
    //     if (e.target === this) {
    //         $(this).addClass('hidden');
    //     }
    // });

    // Escape key to close modals
    $(document).keydown(function(e) {
        if (e.key === "Escape") {
            $('[id$="-modal"]').addClass('hidden');
        }
    });

    // Form validation
    $('form').on('submit', function(e) {
        const form = $(this);
        const requiredFields = form.find('[required]');
        let isValid = true;

        requiredFields.each(function() {
            const field = $(this);
            if (!field.val().trim()) {
                field.addClass('border-red-500');
                isValid = false;
            } else {
                field.removeClass('border-red-500');
            }
        });

        if (!isValid) {
            e.preventDefault();
            alert('Please fill in all required fields');
        }
    });

    // Real-time validation
    $('[required]').on('input change', function() {
        const field = $(this);
        if (field.val().trim()) {
            field.removeClass('border-red-500');
        }
    });
});

// Animation classes for fade in
const style = document.createElement('style');
style.textContent = `
    .animate-fade-in-down {
        animation: fadeInDown 0.3s ease-out;
    }
    
    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
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
`;
document.head.appendChild(style);
</script>
@endsection