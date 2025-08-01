@extends('layouts.admin')
@section('content')
    <h1 class="text-2xl mb-4">Manajemen Topik untuk: {{ $activity->title }}</h1>

    {{-- Form tambah topic --}}
    <form method="POST" action="{{ route('activities.activity-topics.store', $activity->id) }}">
        @csrf
        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-900">Judul Topik<span class="text-red-700">*</span></label>
            <input type="text" name="title" class="block w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-900">Subtopik</label>
            <input type="text" name="subtitle" class="block w-full p-2 border rounded">
        </div>
        <div class="mb-4">
            <label class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Topik</label>
            <div id="editor-container" class="h-40 bg-gray-50 border border-gray-300 rounded mb-2"></div>
            <input type="hidden" name="description" id="hidden-description">
        </div>
        <button type="submit" class="bg-blue-700 text-white px-4 py-2 rounded">Tambah Topik</button>
    </form>

    {{-- List topic --}}
    <h2 class="text-xl mt-8 mb-2">Daftar Topik</h2>
    <table class="w-full border">
        <thead>
            <tr>
                <th class="border px-2 py-1">Judul</th>
                <th class="border px-2 py-1">Subtopik</th>
                <th class="border px-2 py-1">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activity->activityTopics as $topic)
                <tr>
                    <td class="border px-2 py-1">{{ $topic->title }}</td>
                    <td class="border px-2 py-1">{{ $topic->subtitle }}</td>
                    <td class="border px-2 py-1">
                        <form method="POST" action="{{ route('activities.activity-topics.destroy', [$activity->id, $topic->id]) }}" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded" onclick="return confirm('Hapus topik ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Quill JS --}}
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        function selectLocalFile(quill, type) {
            const input = document.createElement('input');
            input.setAttribute('type', 'file');
            if (type === 'image') {
                input.setAttribute('accept', 'image/*');
            } else if (type === 'video') {
                input.setAttribute('accept', 'video/mp4,video/webm,video/ogg');
            }
            input.click();

            input.onchange = () => {
                const file = input.files[0];
                if (type === 'image' && /^image\//.test(file.type)) {
                    saveToServer(file, quill, 'image');
                } else if (type === 'video' && ['video/mp4', 'video/webm', 'video/ogg'].includes(file.type)) {
                    saveToServer(file, quill, 'video');
                } else {
                    alert('Format ' + type + ' tidak didukung.');
                }
            };
        }

        function saveToServer(file, quill, type) {
            const formData = new FormData();
            formData.append(type, file);

            fetch('/admin/quill-image-upload', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => response.json())
            .then(result => {
                if (result.url) {
                    const range = quill.getSelection();
                    if (type === 'image') {
                        quill.insertEmbed(range.index, 'image', result.url);
                    } else if (type === 'video') {
                        quill.insertEmbed(range.index, 'video', result.url);
                    }
                } else {
                    alert('Gagal upload ' + type);
                }
            })
            .catch(() => {
                alert('Gagal upload ' + type);
            });
        }

        var quill = new Quill('#editor-container', {
            theme: 'snow',
            modules: {
                toolbar: {
                    container: [
                        [{ 'header': [1, 2, false] }],
                        ['bold', 'italic', 'underline'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['link', 'image', 'video']
                    ],
                    handlers: {
                        'image': function() {
                            selectLocalFile(this.quill, 'image');
                        },
                        'video': function() {
                            // Pilihan: upload video lokal atau embed YouTube
                            let choice = prompt('Ketik "1" untuk upload video, "2" untuk embed YouTube');
                            if (choice === '1') {
                                selectLocalFile(this.quill, 'video');
                            } else if (choice === '2') {
                                let url = prompt('Masukkan URL YouTube:');
                                if (url) {
                                    let videoId = getYouTubeVideoId(url);
                                    if (videoId) {
                                        let embedUrl = 'https://www.youtube.com/embed/' + videoId;
                                        let range = this.quill.getSelection();
                                        this.quill.insertEmbed(range.index, 'video', embedUrl);
                                    } else {
                                        alert('URL YouTube tidak valid.');
                                    }
                                }
                            }
                        }
                    }
                }
            }
        });

        // Fungsi ekstrak ID video YouTube dari URL
        function getYouTubeVideoId(url) {
            const regex = /(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
            const matches = url.match(regex);
            return matches ? matches[1] : null;
        }

        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('hidden-description').value = quill.root.innerHTML;
        });
    </script>
@endsection
