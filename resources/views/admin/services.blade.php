@extends('layouts.admin')
@section('content')

<!-- Alert Messages -->
@if ($errors->any())
    <div class="mb-6">
        @foreach ($errors->all() as $error)
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-3 flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                {{ $error }}
            </div>
        @endforeach
    </div>
@endif

@if (session('success'))
    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6 flex items-center">
        <i class="fas fa-check-circle mr-2"></i>
        {{ session('success') }}
    </div>
@endif

<!-- Page Header -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Kelola Layanan</h1>
            <p class="text-gray-600 mt-1">Atur dan kelola paket layanan Anda</p>
        </div>
        <button onclick="openModal('add-modal')" 
                class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg flex items-center gap-2 transition-colors duration-200">
            <i class="fas fa-plus"></i>
            Tambah Layanan
        </button>
    </div>
</div>

<!-- Services Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @foreach ($services->sortByDesc('created_at') as $service)
        <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200 overflow-hidden">
            
            <!-- Service Image -->
            <div class="h-48 overflow-hidden">
                <img class="w-full h-full object-cover"
                     src="{{ $service->image ? Storage::url($service->image) : URL::asset('dist/assets/img/kaabah-card.jpg') }}"
                     alt="{{ $service->title }}">
            </div>

            <!-- Service Content -->
            <div class="p-5">
                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $service->title }}</h3>
                <p class="text-gray-600 text-sm mb-4">{{ $service->description }}</p>

                <!-- Service Details -->
                <div class="space-y-2 mb-4">
                    @foreach ($details->where('service_id', $service->id)->take(3) as $detail)
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="{{ $detail->icon }} text-blue-600 w-4 mr-2"></i>
                            {{ $detail->option }}
                        </div>
                    @endforeach
                    @if($details->where('service_id', $service->id)->count() > 3)
                        <div class="text-xs text-gray-500">
                            +{{ $details->where('service_id', $service->id)->count() - 3 }} detail lainnya
                        </div>
                    @endif
                </div>

                <!-- Price -->
                <div class="bg-gray-50 rounded-lg p-3 mb-4">
                    <div class="text-2xl font-bold text-blue-600">
                        Rp {{ number_format($service->price, 0, ',', '.') }}
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-2">
                    <button onclick="openModal('edit-modal{{ $service->id }}')"
                            class="flex-1 bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-lg text-sm transition-colors duration-200">
                        Edit
                    </button>
                    <button onclick="openModal('manage-modal{{ $service->id }}')"
                            class="flex-1 bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg text-sm transition-colors duration-200">
                        Kelola
                    </button>
                    <button onclick="openModal('preview-modal{{ $service->id }}')"
                            class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-2 rounded-lg text-sm transition-colors duration-200">
                        <i class="fas fa-eye"></i>
                    </button>
                    <button onclick="confirmDelete({{ $service->id }})"
                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm transition-colors duration-200">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div id="edit-modal{{ $service->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto m-4">
                <div class="flex justify-between items-center p-6 border-b">
                    <h3 class="text-lg font-semibold">Edit Layanan</h3>
                    <button onclick="closeModal('edit-modal{{ $service->id }}')" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <form method="POST" action="/admin/service/update/{{ $service->id }}" enctype="multipart/form-data">
                    @csrf
                    <div class="p-6 space-y-4">
                        
                        <!-- Image Upload -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Foto Layanan</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4">
                                <input type="file" id="edit-image-{{ $service->id }}" name="image" accept="image/*" 
                                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                <input type="hidden" name="old_image" value="{{ $service->image }}">
                                @if($service->image)
                                    <img id="edit-preview-{{ $service->id }}" src="{{ Storage::url($service->image) }}" 
                                         class="mt-4 w-32 h-32 object-cover rounded-lg">
                                @endif
                            </div>
                        </div>

                        <!-- Service Name -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Paket <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="title" name="title" value="{{ $service->title }}" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Deskripsi <span class="text-red-500">*</span>
                            </label>
                            <textarea id="description" name="description" rows="3" required
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ $service->description }}</textarea>
                        </div>

                        <!-- Price -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                                Harga <span class="text-red-500">*</span>
                            </label>
                            <input type="number" id="price" name="price" value="{{ $service->price }}" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>

                        <!-- Service Details -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Detail Layanan</label>
                            <div id="edit-details-{{ $service->id }}" class="space-y-3">
                                @foreach ($details->where('service_id', $service->id) as $index => $detail)
                                    <div class="flex gap-3 items-center">
                                        <select name="options[{{ $index }}][icon]" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                            <option value="fa-solid fa-plane" {{ $detail->icon == 'fa-solid fa-plane' ? 'selected' : '' }}>✈️ Pesawat</option>
                                            <option value="fa-solid fa-hotel" {{ $detail->icon == 'fa-solid fa-hotel' ? 'selected' : '' }}>🏨 Hotel</option>
                                            <option value="fa-solid fa-calendar-days" {{ $detail->icon == 'fa-solid fa-calendar-days' ? 'selected' : '' }}>📅 Tanggal</option>
                                            <option value="fa-solid fa-location-dot" {{ $detail->icon == 'fa-solid fa-location-dot' ? 'selected' : '' }}>📍 Lokasi</option>
                                            <option value="fa-solid fa-car" {{ $detail->icon == 'fa-solid fa-car' ? 'selected' : '' }}>🚗 Transportasi</option>
                                        </select>
                                        <input type="hidden" name="options[{{ $index }}][id]" value="{{ $detail->id }}">
                                        <input type="text" name="options[{{ $index }}][option]" value="{{ $detail->option }}" 
                                               placeholder="Deskripsi detail..." 
                                               class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                        <button type="button" onclick="removeDetail(this)" 
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" onclick="addDetail('edit-details-{{ $service->id }}')" 
                                    class="mt-3 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                                + Tambah Detail
                            </button>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 p-6 border-t bg-gray-50">
                        <button type="button" onclick="closeModal('edit-modal{{ $service->id }}')" 
                                class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                            Batal
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Manage Modal -->
        <div id="manage-modal{{ $service->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg w-full max-w-4xl max-h-[90vh] overflow-y-auto m-4">
                <div class="flex justify-between items-center p-6 border-b">
                    <h3 class="text-lg font-semibold">Kelola Detail Layanan</h3>
                    <button onclick="closeModal('manage-modal{{ $service->id }}')" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <form method="POST" action="/admin/service/detail/add/{{ $service->id }}">
                    @csrf
                    <div class="p-6 space-y-6">
                        
                        <!-- Tour Guide -->
                        @php $serviceDetail = $service_details->where('service_id', $service->id)->first(); @endphp
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Tour Leader</label>
                                <input type="text" name="guider" value="{{ $serviceDetail->guider ?? '' }}" 
                                       placeholder="Masukkan nama tour leader"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Tambahan</label>
                                <textarea name="description" rows="2" placeholder="Deskripsi tambahan (opsional)"
                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $serviceDetail->description ?? '' }}</textarea>
                            </div>
                        </div>

                        <!-- Included Services -->
                        <div>
                            <h4 class="text-md font-semibold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-check-circle text-green-600 mr-2"></i>
                                Harga Sudah Termasuk
                            </h4>
                            <div id="included-container-{{ $service->id }}" class="space-y-3">
                                @php $includedIndex = 0; @endphp
                                @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                    @foreach ($all_details->where('type', 'included')->where('service_detail_id', $service_detail->id) as $all_detail)
                                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                                            <div class="flex gap-3 items-start">
                                                <select name="included[{{ $includedIndex }}][icon]" class="px-3 py-2 border border-gray-300 rounded-lg">
                                                    <option value="fa-solid fa-check" {{ $all_detail->icon == 'fa-solid fa-check' ? 'selected' : '' }}>✅ Termasuk</option>
                                                    <option value="fa-solid fa-plane" {{ $all_detail->icon == 'fa-solid fa-plane' ? 'selected' : '' }}>✈️ Pesawat</option>
                                                    <option value="fa-solid fa-hotel" {{ $all_detail->icon == 'fa-solid fa-hotel' ? 'selected' : '' }}>🏨 Hotel</option>
                                                    <option value="fa-solid fa-car" {{ $all_detail->icon == 'fa-solid fa-car' ? 'selected' : '' }}>🚗 Transportasi</option>
                                                </select>
                                                <div class="flex-1 space-y-2">
                                                    <input type="hidden" name="included[{{ $includedIndex }}][id]" value="{{ $all_detail->id }}">
                                                    <input type="text" name="included[{{ $includedIndex }}][text]" value="{{ $all_detail->text }}" 
                                                           placeholder="Deskripsi layanan..."
                                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                                    <textarea name="included[{{ $includedIndex }}][inc_description]" rows="2" 
                                                              placeholder="Detail tambahan (opsional)"
                                                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $all_detail->description }}</textarea>
                                                </div>
                                                <button type="button" onclick="removeDetail(this)" 
                                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @php $includedIndex++; @endphp
                                    @endforeach
                                @endforeach
                            </div>
                            <button type="button" onclick="addIncludedDetail('included-container-{{ $service->id }}')" 
                                    class="mt-3 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                                + Tambah Layanan Termasuk
                            </button>
                        </div>

                        <!-- Excluded Services -->
                        <div>
                            <h4 class="text-md font-semibold text-gray-900 mb-3 flex items-center">
                                <i class="fas fa-times-circle text-red-600 mr-2"></i>
                                Harga Belum Termasuk
                            </h4>
                            <div id="excluded-container-{{ $service->id }}" class="space-y-3">
                                @php $excludedIndex = 0; @endphp
                                @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                    @foreach ($all_details->where('type', 'excluded')->where('service_detail_id', $service_detail->id) as $all_detail)
                                        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                                            <div class="flex gap-3 items-start">
                                                <select name="excluded[{{ $excludedIndex }}][icon]" class="px-3 py-2 border border-gray-300 rounded-lg">
                                                    <option value="fa-solid fa-xmark" {{ $all_detail->icon == 'fa-solid fa-xmark' ? 'selected' : '' }}>❌ Tidak Termasuk</option>
                                                    <option value="fa-solid fa-plane" {{ $all_detail->icon == 'fa-solid fa-plane' ? 'selected' : '' }}>✈️ Pesawat</option>
                                                    <option value="fa-solid fa-hotel" {{ $all_detail->icon == 'fa-solid fa-hotel' ? 'selected' : '' }}>🏨 Hotel</option>
                                                    <option value="fa-solid fa-car" {{ $all_detail->icon == 'fa-solid fa-car' ? 'selected' : '' }}>🚗 Transportasi</option>
                                                </select>
                                                <div class="flex-1 space-y-2">
                                                    <input type="hidden" name="excluded[{{ $excludedIndex }}][id]" value="{{ $all_detail->id }}">
                                                    <input type="text" name="excluded[{{ $excludedIndex }}][text]" value="{{ $all_detail->text }}" 
                                                           placeholder="Deskripsi layanan..."
                                                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                                    <textarea name="excluded[{{ $excludedIndex }}][exc_description]" rows="2" 
                                                              placeholder="Detail tambahan (opsional)"
                                                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">{{ $all_detail->description }}</textarea>
                                                </div>
                                                <button type="button" onclick="removeDetail(this)" 
                                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                        @php $excludedIndex++; @endphp
                                    @endforeach
                                @endforeach
                            </div>
                            <button type="button" onclick="addExcludedDetail('excluded-container-{{ $service->id }}')" 
                                    class="mt-3 bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">
                                + Tambah Layanan Tidak Termasuk
                            </button>
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 p-6 border-t bg-gray-50">
                        <button type="button" onclick="closeModal('manage-modal{{ $service->id }}')" 
                                class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                            Batal
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                            Simpan Detail
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Preview Modal -->
        <div id="preview-modal{{ $service->id }}" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg w-full max-w-6xl max-h-[90vh] overflow-y-auto m-4">
                <div class="flex justify-between items-center p-6 border-b">
                    <h3 class="text-lg font-semibold">Preview Layanan</h3>
                    <button onclick="closeModal('preview-modal{{ $service->id }}')" class="text-gray-400 hover:text-gray-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <div class="p-6">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        
                        <!-- Service Info -->
                        <div class="lg:col-span-1">
                            <img class="w-full h-64 object-cover rounded-lg mb-4"
                                 src="{{ $service->image ? Storage::url($service->image) : URL::asset('dist/assets/img/kaabah-card.jpg') }}"
                                 alt="{{ $service->title }}">
                            
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $service->title }}</h2>
                            <p class="text-gray-600 mb-4">{{ $service->description }}</p>
                            
                            <div class="bg-blue-50 rounded-lg p-4 mb-4">
                                <div class="text-2xl font-bold text-blue-600">
                                    Rp {{ number_format($service->price, 0, ',', '.') }}
                                </div>
                            </div>

                            <!-- Basic Details -->
                            <div class="space-y-2 mb-4">
                                @foreach ($details->where('service_id', $service->id) as $detail)
                                    <div class="flex items-center text-sm">
                                        <i class="{{ $detail->icon }} text-blue-600 w-5 mr-2"></i>
                                        {{ $detail->option }}
                                    </div>
                                @endforeach
                            </div>

                            <!-- Tour Guide -->
                            @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                @if($service_detail->guider)
                                    <div class="flex items-center text-sm mb-2">
                                        <i class="fas fa-user-tag text-blue-600 w-5 mr-2"></i>
                                        Tour Leader: {{ $service_detail->guider }}
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <!-- Included Services -->
                        <div class="lg:col-span-1">
                            <h3 class="text-lg font-semibold text-green-700 mb-4 flex items-center">
                                <i class="fas fa-check-circle mr-2"></i>
                                Sudah Termasuk
                            </h3>
                            <div class="space-y-3">
                                @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                    @foreach ($all_details->where('type', 'included')->where('service_detail_id', $service_detail->id) as $all_detail)
                                        <div class="bg-green-50 border border-green-200 rounded-lg p-3">
                                            <div class="flex items-start">
                                                <i class="{{ $all_detail->icon }} text-green-600 w-5 mr-2 mt-1"></i>
                                                <div>
                                                    <div class="font-medium text-gray-900">{{ $all_detail->text }}</div>
                                                    @if($all_detail->description)
                                                        <div class="text-sm text-gray-600 mt-1">{{ $all_detail->description }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                        <!-- Excluded Services -->
                        <div class="lg:col-span-1">
                            <h3 class="text-lg font-semibold text-red-700 mb-4 flex items-center">
                                <i class="fas fa-times-circle mr-2"></i>
                                Belum Termasuk
                            </h3>
                            <div class="space-y-3">
                                @foreach ($service_details->where('service_id', $service->id) as $service_detail)
                                    @foreach ($all_details->where('type', 'excluded')->where('service_detail_id', $service_detail->id) as $all_detail)
                                        <div class="bg-red-50 border border-red-200 rounded-lg p-3">
                                            <div class="flex items-start">
                                                <i class="{{ $all_detail->icon }} text-red-600 w-5 mr-2 mt-1"></i>
                                                <div>
                                                    <div class="font-medium text-gray-900">{{ $all_detail->text }}</div>
                                                    @if($all_detail->description)
                                                        <div class="text-sm text-gray-600 mt-1">{{ $all_detail->description }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-3 p-6 border-t bg-gray-50">
                    <button onclick="closeModal('preview-modal{{ $service->id }}')" 
                            class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Add Service Modal -->
<div id="add-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-2xl max-h-[90vh] overflow-y-auto m-4">
        <div class="flex justify-between items-center p-6 border-b">
            <h3 class="text-lg font-semibold">Tambah Layanan Baru</h3>
            <button onclick="closeModal('add-modal')" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <form method="POST" action="/admin/service/post" enctype="multipart/form-data">
            @csrf
            <div class="p-6 space-y-4">
                
                <!-- Image Upload -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Foto Layanan</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4">
                        <input type="file" id="add-image" name="image" accept="image/*" 
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <img id="add-preview" class="mt-4 w-32 h-32 object-cover rounded-lg hidden">
                    </div>
                </div>

                <!-- Service Name -->
                <div>
                    <label for="add-title" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Paket <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="add-title" name="title" required
                           placeholder="Contoh: Paket Umroh Ekonomi"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Description -->
                <div>
                    <label for="add-description" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi <span class="text-red-500">*</span>
                    </label>
                    <textarea id="add-description" name="description" rows="3" required
                              placeholder="Deskripsi singkat tentang paket layanan ini..."
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <!-- Price -->
                <div>
                    <label for="add-price" class="block text-sm font-medium text-gray-700 mb-2">
                        Harga <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-2 text-gray-500">Rp</span>
                        <input type="number" id="add-price" name="price" required
                               placeholder="25000000"
                               class="w-full pl-8 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Masukkan harga tanpa titik atau koma</p>
                </div>

                <!-- Service Details -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Detail Layanan <span class="text-red-500">*</span></label>
                    <div id="add-details" class="space-y-3">
                        <div class="flex gap-3 items-center">
                            <select name="icons[]" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                                <option value="fa-solid fa-plane">✈️ Pesawat</option>
                                <option value="fa-solid fa-hotel">🏨 Hotel</option>
                                <option value="fa-solid fa-calendar-days">📅 Tanggal</option>
                                <option value="fa-solid fa-location-dot">📍 Lokasi</option>
                                <option value="fa-solid fa-car">🚗 Transportasi</option>
                            </select>
                            <input type="text" name="options[]" 
                                   placeholder="Contoh: Tiket pesawat PP Jakarta-Jeddah"
                                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                            <button type="button" onclick="removeDetail(this)" 
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <button type="button" onclick="addDetail('add-details')" 
                            class="mt-3 bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm">
                        + Tambah Detail
                    </button>
                </div>
            </div>

            <div class="flex justify-end gap-3 p-6 border-t bg-gray-50">
                <button type="button" onclick="closeModal('add-modal')" 
                        class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                    Batal
                </button>
                <button type="submit" 
                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                    Simpan Layanan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="delete-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg w-full max-w-md m-4">
        <div class="p-6">
            <div class="flex items-center mb-4">
                <div class="bg-red-100 rounded-full p-3 mr-4">
                    <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Konfirmasi Hapus</h3>
                    <p class="text-gray-600">Apakah Anda yakin ingin menghapus layanan ini?</p>
                </div>
            </div>
            <p class="text-sm text-gray-500 mb-6">Data yang dihapus tidak dapat dikembalikan.</p>
            
            <div class="flex justify-end gap-3">
                <button onclick="closeModal('delete-modal')" 
                        class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">
                    Batal
                </button>
                <a id="delete-confirm-btn" href="#" 
                   class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg">
                    Ya, Hapus
                </a>
            </div>
        </div>
    </div>
</div>

<script>
// Modal Functions
function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}

// Delete Confirmation
function confirmDelete(serviceId) {
    const deleteUrl = `/admin/service/delete/${serviceId}`;
    document.getElementById('delete-confirm-btn').setAttribute('href', deleteUrl);
    openModal('delete-modal');
}

// Image Preview Functions
function setupImagePreview(inputId, previewId) {
    document.getElementById(inputId).addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById(previewId);
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        } else {
            preview.classList.add('hidden');
        }
    });
}

// Setup image previews for all forms
setupImagePreview('add-image', 'add-preview');
@foreach ($services as $service)
setupImagePreview('edit-image-{{ $service->id }}', 'edit-preview-{{ $service->id }}');
@endforeach

// Dynamic Detail Management
let detailCounter = 100; // Start with high number to avoid conflicts

function addDetail(containerId) {
    detailCounter++;
    const container = document.getElementById(containerId);
    const isAddForm = containerId === 'add-details';
    
    const detailHtml = `
        <div class="flex gap-3 items-center">
            <select name="${isAddForm ? 'icons[]' : `options[${detailCounter}][icon]`}" class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                <option value="fa-solid fa-plane">✈️ Pesawat</option>
                <option value="fa-solid fa-hotel">🏨 Hotel</option>
                <option value="fa-solid fa-calendar-days">📅 Tanggal</option>
                <option value="fa-solid fa-location-dot">📍 Lokasi</option>
                <option value="fa-solid fa-car">🚗 Transportasi</option>
            </select>
            ${!isAddForm ? `<input type="hidden" name="options[${detailCounter}][id]" value="">` : ''}
            <input type="text" name="${isAddForm ? 'options[]' : `options[${detailCounter}][option]`}" 
                   placeholder="Deskripsi detail..." 
                   class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            <button type="button" onclick="removeDetail(this)" 
                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', detailHtml);
}

function removeDetail(button) {
    button.closest('.flex').remove();
}

// Included/Excluded Detail Management
let includedCounter = {{ $includedIndex ?? 0 }} + 100;
let excludedCounter = {{ $excludedIndex ?? 0 }} + 100;

function addIncludedDetail(containerId) {
    includedCounter++;
    const container = document.getElementById(containerId);
    
    const detailHtml = `
        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
            <div class="flex gap-3 items-start">
                <select name="included[${includedCounter}][icon]" class="px-3 py-2 border border-gray-300 rounded-lg">
                    <option value="fa-solid fa-check">✅ Termasuk</option>
                    <option value="fa-solid fa-plane">✈️ Pesawat</option>
                    <option value="fa-solid fa-hotel">🏨 Hotel</option>
                    <option value="fa-solid fa-car">🚗 Transportasi</option>
                </select>
                <div class="flex-1 space-y-2">
                    <input type="hidden" name="included[${includedCounter}][id]" value="">
                    <input type="text" name="included[${includedCounter}][text]" 
                           placeholder="Contoh: Hotel bintang 4 di Madinah"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <textarea name="included[${includedCounter}][inc_description]" rows="2" 
                              placeholder="Detail tambahan (opsional)"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <button type="button" onclick="removeDetail(this)" 
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', detailHtml);
}

function addExcludedDetail(containerId) {
    excludedCounter++;
    const container = document.getElementById(containerId);
    
    const detailHtml = `
        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
            <div class="flex gap-3 items-start">
                <select name="excluded[${excludedCounter}][icon]" class="px-3 py-2 border border-gray-300 rounded-lg">
                    <option value="fa-solid fa-xmark">❌ Tidak Termasuk</option>
                    <option value="fa-solid fa-plane">✈️ Pesawat</option>
                    <option value="fa-solid fa-hotel">🏨 Hotel</option>
                    <option value="fa-solid fa-car">🚗 Transportasi</option>
                </select>
                <div class="flex-1 space-y-2">
                    <input type="hidden" name="excluded[${excludedCounter}][id]" value="">
                    <input type="text" name="excluded[${excludedCounter}][text]" 
                           placeholder="Contoh: Tiket masuk tempat wisata"
                           class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                    <textarea name="excluded[${excludedCounter}][exc_description]" rows="2" 
                              placeholder="Detail tambahan (opsional)"
                              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <button type="button" onclick="removeDetail(this)" 
                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-2 rounded-lg">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', detailHtml);
}

// // Close modal when clicking outside
// document.addEventListener('click', function(event) {
//     if (event.target.classList.contains('fixed') && event.target.classList.contains('inset-0')) {
//         const modalId = event.target.id;
//         if (modalId) {
//             closeModal(modalId);
//         }
//     }
// });

// Close modal with Escape key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        const openModals = document.querySelectorAll('.fixed:not(.hidden)');
        openModals.forEach(modal => {
            if (modal.id) {
                closeModal(modal.id);
            }
        });
    }
});

// Format price input
document.addEventListener('DOMContentLoaded', function() {
    const priceInputs = document.querySelectorAll('input[type="number"][name="price"]');
    priceInputs.forEach(input => {
        input.addEventListener('input', function() {
            // Remove any non-digit characters
            this.value = this.value.replace(/\D/g, '');
        });
    });
});
</script>

@endsection