<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan dan Data Pernikahan - Undang.in</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@500;700&family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #FAF7F2; color: #2B2A27; }
        .font-serif-display { font-family: 'Inknut Antiqua', serif; }
        .card-surface { background-color: #F2ECE1; border-radius: 16px; }
        .btn-primary { background-color: #7A795E; color: #FFFFFF; transition: background-color 0.2s; }
        .btn-primary:hover { background-color: #65644D; }
        .form-input { background-color: #FFFFFF; border: 1px solid #DCD5C7; border-radius: 8px; padding: 10px 14px; width: 100%; font-size: 13.5px; color: #2B2A27; }
        .form-input::placeholder { color: #A6A095; }
        .form-input:focus { outline: none; border-color: #7A795E; }
    </style>
</head>
<body class="min-h-screen pb-24">

    <header class="bg-[#7A795E] text-white px-6 md:px-12 py-4 flex justify-between items-center">
        <nav class="flex items-center space-x-8 text-sm">
            <a href="{{ url('/dashboard') }}" class="text-white/80 hover:text-white">Dashboard</a>
            <a href="{{ route('wedding.edit') }}" class="font-medium underline underline-offset-4">Edit Undangan</a>
        </nav>
        <div class="flex items-center space-x-2.5 text-sm">
            <span class="w-6 h-6 rounded-full bg-[#D8D2C5] inline-block"></span>
            <span>{{ Auth::user()->name ?? 'Alya Dhamierea' }}</span>
            <svg class="w-4 h-4 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 sm:px-6 pt-10">
        <h1 class="font-serif-display text-3xl md:text-[34px] font-bold text-[#1E1D1B] tracking-tight">Pengaturan dan Data Pernikahan</h1>
        <p class="text-[13px] text-[#6E6A61] mt-1.5">Lengkapi informasi pernikahan Anda untuk ditampilkan otomatis pada template undangan digital</p>

        <div class="flex items-center justify-between my-10 px-2 md:px-6">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-full bg-[#7A795E] text-white flex items-center justify-center text-xs font-serif-display font-bold">1</div>
                <div>
                    <p class="text-xs font-bold text-[#1E1D1B]">Data Pengantin</p>
                    <p class="text-[11px] text-[#8C877D]">Profil dan Keluarga</p>
                </div>
            </div>
            <div class="hidden sm:block flex-1 h-[1px] bg-[#DCD5C7] mx-4"></div>
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-full bg-[#E5DEC9] text-[#6E6A61] flex items-center justify-center text-xs font-serif-display font-bold">2</div>
                <div>
                    <p class="text-xs font-bold text-[#1E1D1B]">Detail Acara</p>
                    <p class="text-[11px] text-[#8C877D]">Waktu dan Tempat</p>
                </div>
            </div>
            <div class="hidden sm:block flex-1 h-[1px] bg-[#DCD5C7] mx-4"></div>
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 rounded-full bg-[#E5DEC9] text-[#6E6A61] flex items-center justify-center text-xs font-serif-display font-bold">3</div>
                <div>
                    <p class="text-xs font-bold text-[#1E1D1B]">Galeri Foto</p>
                    <p class="text-[11px] text-[#8C877D]">Prewedding dan Video</p>
                </div>
            </div>
        </div>

        {{-- Flash Notification --}}
        @if(session('success'))
            <div class="mb-6 px-4 py-3 rounded-xl bg-[#E4ECE1] border border-[#7A795E] text-[#2F3B2B] text-xs font-medium">
                ✓ {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 px-4 py-3 rounded-xl bg-red-100 border border-red-300 text-red-800 text-xs font-medium">
                ! {{ session('error') }}
            </div>
        @endif

        {{-- Data Kedua Mempelai --}}
        <form action="{{ route('wedding.update.couple') }}" method="POST" class="card-surface p-6 md:p-8 mb-8">
            @csrf
            <div class="flex items-start space-x-3 mb-6">
                <span class="text-[#5C594F] mt-0.5">👥</span>
                <div>
                    <h2 class="font-serif-display text-lg font-bold text-[#1E1D1B]">Data kedua mempelai</h2>
                    <p class="text-xs text-[#7D786E]">Informasi lengkap calon mempelai dan orang tua</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Mempelai Pria --}}
                <div class="space-y-4">
                    <h3 class="text-xs font-bold text-[#3D3B35]">♂ Calon Mempelai Pria</h3>
                    <div>
                        <label class="block text-xs font-medium mb-1">Nama Lengkap & Gelar</label>
                        <input type="text" name="groom_name" value="{{ old('groom_name', $wedding->groom_name) }}" placeholder="Dimas Prasetyo, S.T." class="form-input" required>
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-1">Nama Panggilan</label>
                        <input type="text" name="groom_nickname" value="{{ old('groom_nickname', $wedding->groom_nickname) }}" placeholder="Dimas" class="form-input" required>
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-1">Nama Orang Tua / Wali</label>
                        <input type="text" name="groom_parents" value="{{ old('groom_parents', $wedding->groom_parents) }}" placeholder="Bpk. Bambang Wijaya & Ibu Ratna" class="form-input" required>
                        <p class="text-[10.5px] text-[#8C877D] mt-1">Contoh: Putra pertama dari Bpk. ... & Ibu ...</p>
                    </div>
                </div>

                {{-- Mempelai Wanita --}}
                <div class="space-y-4">
                    <h3 class="text-xs font-bold text-[#3D3B35]">♀ Calon Mempelai Wanita</h3>
                    <div>
                        <label class="block text-xs font-medium mb-1">Nama Lengkap & Gelar</label>
                        <input type="text" name="bride_name" value="{{ old('bride_name', $wedding->bride_name) }}" placeholder="Alya Dhamierea, S.Kom." class="form-input" required>
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-1">Nama Panggilan</label>
                        <input type="text" name="bride_nickname" value="{{ old('bride_nickname', $wedding->bride_nickname) }}" placeholder="Dhami" class="form-input" required>
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-1">Nama Orang Tua / Wali</label>
                        <input type="text" name="bride_parents" value="{{ old('bride_parents', $wedding->bride_parents) }}" placeholder="Bpk. Doni & Ibu Rea" class="form-input" required>
                        <p class="text-[10.5px] text-[#8C877D] mt-1">Contoh: Putri pertama dari Bpk. ... & Ibu ...</p>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="btn-primary px-5 py-2 rounded-full text-xs font-medium">
                    ✓ Simpan Data Mempelai
                </button>
            </div>
        </form>

        {{-- Waktu dan Lokasi Acara --}}
        <form action="{{ route('wedding.update.event') }}" method="POST" class="card-surface p-6 md:p-8 mb-8">
            @csrf
            <div class="flex items-start space-x-3 mb-6">
                <span class="text-[#5C594F] mt-0.5">📅</span>
                <div>
                    <h2 class="font-serif-display text-lg font-bold text-[#1E1D1B]">Waktu dan Lokasi Acara</h2>
                    <p class="text-xs text-[#7D786E]">Detail pelaksanaan akad dan resepsi</p>
                </div>
            </div>

            {{-- Akad Nikah / Pemberkatan --}}
            <div class="space-y-4 mb-8">
                <h3 class="text-xs font-bold text-[#3D3B35]">Akad Nikah / Pemberkatan</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-medium mb-1">Tanggal</label>
                        <input type="date" name="akad_date" value="{{ old('akad_date', $wedding->akad_date) }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-1">Jam Mulai</label>
                        <input type="time" name="akad_start_time" value="{{ old('akad_start_time', $wedding->akad_start_time) }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-1">Jam Selesai</label>
                        <input type="time" name="akad_end_time" value="{{ old('akad_end_time', $wedding->akad_end_time) }}" class="form-input" required>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-medium mb-1">Nama Tempat / Venue / Gedung</label>
                    <input type="text" name="akad_venue" value="{{ old('akad_venue', $wedding->akad_venue) }}" placeholder="Gedung Arsip Jakarta" class="form-input" required>
                </div>
                <div>
                    <label class="block text-xs font-medium mb-1">Alamat Lengkap Venue</label>
                    <input type="text" name="akad_address" value="{{ old('akad_address', $wedding->akad_address) }}" placeholder="Jalan Bungasari No.15, Jakarta Timur" class="form-input" required>
                </div>
                <div>
                    <label class="block text-xs font-medium mb-1">Tautan Google Maps</label>
                    <input type="url" name="akad_maps_url" value="{{ old('akad_maps_url', $wedding->akad_maps_url) }}" placeholder="https://..." class="form-input">
                </div>
            </div>

            {{-- Resepsi Pernikahan --}}
            <div class="space-y-4">
                <h3 class="text-xs font-bold text-[#3D3B35]">Resepsi Pernikahan</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-xs font-medium mb-1">Tanggal</label>
                        <input type="date" name="resepsi_date" value="{{ old('resepsi_date', $wedding->resepsi_date) }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-1">Jam Mulai</label>
                        <input type="time" name="resepsi_start_time" value="{{ old('resepsi_start_time', $wedding->resepsi_start_time) }}" class="form-input" required>
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-1">Jam Selesai</label>
                        <input type="time" name="resepsi_end_time" value="{{ old('resepsi_end_time', $wedding->resepsi_end_time) }}" class="form-input" required>
                    </div>
                </div>
                <div>
                    <label class="block text-xs font-medium mb-1">Nama Tempat / Venue / Gedung</label>
                    <input type="text" name="resepsi_venue" value="{{ old('resepsi_venue', $wedding->resepsi_venue) }}" placeholder="Gedung Arsip Jakarta" class="form-input" required>
                </div>
                <div>
                    <label class="block text-xs font-medium mb-1">Alamat Lengkap Venue</label>
                    <input type="text" name="resepsi_address" value="{{ old('resepsi_address', $wedding->resepsi_address) }}" placeholder="Jalan Bungasari No.15, Jakarta Timur" class="form-input" required>
                </div>
                <div>
                    <label class="block text-xs font-medium mb-1">Tautan Google Maps</label>
                    <input type="url" name="resepsi_maps_url" value="{{ old('resepsi_maps_url', $wedding->resepsi_maps_url) }}" placeholder="https://..." class="form-input">
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="btn-primary px-5 py-2 rounded-full text-xs font-medium">
                    ✓ Simpan Waktu & Lokasi
                </button>
            </div>
        </form>

        {{-- Catatan Tambahan & Ketentuan --}}
        <form action="{{ route('wedding.update.notes') }}" method="POST" class="card-surface p-6 md:p-8 mb-8">
            @csrf
            <div class="flex items-start space-x-3 mb-6">
                <span class="text-[#5C594F] mt-0.5">🕒</span>
                <div>
                    <h2 class="font-serif-display text-lg font-bold text-[#1E1D1B]">Catatan Tambahan & Ketentuan</h2>
                    <p class="text-xs text-[#7D786E]">Busana dan Petunjuk Kehadiran Tamu Undangan</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-medium mb-1">Panduan Dresscode</label>
                    <input type="text" name="dresscode" value="{{ old('dresscode', $wedding->dresscode) }}" placeholder="Early warm pastel" class="form-input">
                </div>
                <div>
                    <label class="block text-xs font-medium mb-1">Ketentuan</label>
                    <input type="text" name="additional_notes" value="{{ old('additional_notes', $wedding->additional_notes) }}" placeholder="tamu undangan diharapkan hadir tepat waktu" class="form-input">
                    <p class="text-[10.5px] text-[#8C877D] mt-1">catatan : ketentuan disesuaikan masing-masing mempelai</p>
                </div>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="btn-primary px-5 py-2 rounded-full text-xs font-medium">
                    ✓ Simpan Ketentuan
                </button>
            </div>
        </form>

        {{-- Love Story --}}
        <form action="{{ route('wedding.update.story') }}" method="POST" class="card-surface p-6 md:p-8 mb-8">
            @csrf
            <div class="flex items-start justify-between mb-6">
                <div class="flex items-start space-x-3">
                    <span class="text-[#5C594F] mt-0.5">💌</span>
                    <div>
                        <h2 class="font-serif-display text-lg font-bold text-[#1E1D1B]">Cerita Cinta / Love Story <span class="text-xs font-sans font-normal text-[#7D786E]">(Opsional)</span></h2>
                        <p class="text-xs text-[#7D786E]">Kisah perjalanan cinta kedua mempelai</p>
                    </div>
                </div>
                <button type="button" onclick="addStoryRow()" class="text-xs font-medium text-[#7A795E] border border-[#7A795E] px-3 py-1 rounded-full hover:bg-[#7A795E] hover:text-white transition">
                    + Tambah Momen
                </button>
            </div>

            <div id="love-story-list" class="space-y-4">
                @php
                    $stories = old('stories', $wedding->love_stories ?? [['year' => '', 'title' => '', 'story' => '']]);
                @endphp
                @foreach($stories as $i => $item)
                <div class="p-4 rounded-xl bg-[#FAF7F2] border border-[#DCD5C7] space-y-3">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <div>
                            <label class="block text-xs font-medium mb-1">Tahun / Momen</label>
                            <input type="text" name="stories[{{ $i }}][year]" value="{{ $item['year'] ?? '' }}" placeholder="2022" class="form-input">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-medium mb-1">Judul Cerita</label>
                            <input type="text" name="stories[{{ $i }}][title]" value="{{ $item['title'] ?? '' }}" placeholder="Pertama Kali Bertemu" class="form-input">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-1">Deskripsi Singkat</label>
                        <textarea name="stories[{{ $i }}][story]" rows="2" placeholder="Ceritakan kisah singkatnya..." class="form-input">{{ $item['story'] ?? '' }}</textarea>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="btn-primary px-5 py-2 rounded-full text-xs font-medium">
                    ✓ Simpan Love Story
                </button>
            </div>
        </form>

        {{-- Unggah Foto Prewedding --}}
        <div class="card-surface p-6 md:p-8 mb-8">
            <div class="flex items-start space-x-3 mb-6">
                <span class="text-[#5C594F] mt-0.5">🖼️</span>
                <div>
                    <h2 class="font-serif-display text-lg font-bold text-[#1E1D1B]">Unggah Foto</h2>
                    <p class="text-xs text-[#7D786E]">Foto prewedding untuk mempercantik desain undangan</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-stretch">
                {{-- Preview Foto yang Diunggah --}}
                @if(!empty($wedding->gallery_photos))
                    @foreach($wedding->gallery_photos as $index => $photo)
                    <div class="relative group rounded-xl overflow-hidden aspect-[3/4] bg-[#E5DEC9]">
                        <img src="{{ asset('storage/' . $photo) }}" alt="Foto Prewedding" class="w-full h-full object-cover">
                        <form action="{{ route('wedding.delete.photo', $index) }}" method="POST" class="absolute top-2 right-2 opacity-0 group-hover:opacity-100 transition">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600/90 text-white text-[11px] px-2.5 py-1 rounded-full">Hapus</button>
                        </form>
                    </div>
                    @endforeach
                @endif

                {{-- Form Unggah Foto --}}
                <form action="{{ route('wedding.upload.photo') }}" method="POST" enctype="multipart/form-data" class="{{ empty($wedding->gallery_photos) ? 'sm:col-span-3' : 'sm:col-span-2' }}">
                    @csrf
                    <label class="flex flex-col items-center justify-center h-full min-h-[210px] border border-dashed border-[#B5AEA0] rounded-xl bg-[#EAE3D5]/70 hover:bg-[#EAE3D5] cursor-pointer transition p-6 text-center">
                        <span class="w-7 h-7 rounded-full bg-[#B5AEA0] text-white flex items-center justify-center text-sm mb-2">+</span>
                        <span class="text-xs font-semibold text-[#3D3B35]">+ Unggah Foto</span>
                        <span class="text-[11px] text-[#8C877D] mt-1">PNG, JPG hingga 10 MB</span>
                        <input type="file" name="photo" accept="image/png, image/jpeg" class="hidden" onchange="this.form.submit()">
                    </label>
                </form>
            </div>
        </div>

        {{-- Pilih Template Desain Undangan --}}
        <form action="{{ route('wedding.update.template') }}" method="POST" class="card-surface p-6 md:p-8 mb-10">
            @csrf
            <div class="flex items-start space-x-3 mb-6">
                <span class="text-[#5C594F] mt-0.5">⊞</span>
                <div>
                    <h2 class="font-serif-display text-lg font-bold text-[#1E1D1B]">Pilih Template Design Undangan</h2>
                    <p class="text-xs text-[#7D786E]">Pilih template design undangan yang sesuai dengan konsep pernikahan</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Whimsical Design --}}
                <label class="cursor-pointer block">
                    <input type="radio" name="template" value="whimsical" class="peer hidden" {{ ($wedding->template ?? 'whimsical') === 'whimsical' ? 'checked' : '' }}>
                    <div class="p-4 rounded-xl border border-[#C9C1B2] bg-[#EAE3D5] peer-checked:border-2 peer-checked:border-[#7A795E] transition">
                        <h3 class="text-xs font-bold text-[#1E1D1B] mb-3">Whimsical design</h3>
                        <div class="h-44 rounded-lg bg-[#D3DDD6] overflow-hidden mb-3">
                            <img src="{{ asset('images/template-whimsical.png') }}" onerror="this.src='https://placehold.co/400x240/D3DDD6/3D3B35?text=Whimsical+Design'" alt="Whimsical design" class="w-full h-full object-cover">
                        </div>
                        <p class="text-[11.5px] text-[#5C594F] leading-relaxed mb-4">Cocok untuk tema pernikahan rustic garden, bohemian, dan selebrasi intim penuh kehangatan.</p>
                        <div class="flex justify-end">
                            <span class="px-5 py-1 rounded-full text-[11px] font-medium bg-[#7A795E] text-white">pilih</span>
                        </div>
                    </div>
                </label>

                {{-- Minimalist Design --}}
                <label class="cursor-pointer block">
                    <input type="radio" name="template" value="minimalist" class="peer hidden" {{ ($wedding->template ?? '') === 'minimalist' ? 'checked' : '' }}>
                    <div class="p-4 rounded-xl border border-[#C9C1B2] bg-[#EAE3D5] peer-checked:border-2 peer-checked:border-[#7A795E] transition">
                        <h3 class="text-xs font-bold text-[#1E1D1B] mb-3">Minimalist design</h3>
                        <div class="h-44 rounded-lg bg-[#D6CBD0] overflow-hidden mb-3">
                            <img src="{{ asset('images/template-minimalist.png') }}" onerror="this.src='https://placehold.co/400x240/D6CBD0/3D3B35?text=Minimalist+Design'" alt="Minimalist design" class="w-full h-full object-cover">
                        </div>
                        <p class="text-[11.5px] text-[#5C594F] leading-relaxed mb-4">Didesain khusus untuk pesta ballroom kontemporer bernuansa elegan, modern, dan arsitektural.</p>
                        <div class="flex justify-end">
                            <span class="px-5 py-1 rounded-full text-[11px] font-medium bg-[#7A795E] text-white">pilih</span>
                        </div>
                    </div>
                </label>
            </div>

            <div class="mt-6 flex justify-end">
                <button type="submit" class="btn-primary px-5 py-2 rounded-full text-xs font-medium">
                    ✓ Simpan Pilihan Template
                </button>
            </div>
        </form>

        {{-- Simpan Data dan Dapatkan Link Undangan --}}
        <div class="text-center space-y-3">
            <form action="{{ route('wedding.generate.link') }}" method="POST">
                @csrf
                <button type="submit" class="btn-primary px-8 py-3 rounded-full text-xs font-semibold shadow-sm inline-flex items-center space-x-2">
                    <span>🔗</span>
                    <span>Simpan Data & Dapatkan Link</span>
                </button>
            </form>
            <p class="text-[11px] text-[#8C877D]">Pastikan seluruh data telah terisi dengan benar sebelum membuat tautan undangan</p>

            @if(session('generated_link') || $wedding->slug)
                @php
                    $finalLink = session('generated_link') ?? url('/u/' . $wedding->slug);
                @endphp
                <div class="max-w-md mx-auto mt-5 p-3.5 rounded-full bg-[#F2ECE1] border border-[#7A795E] flex items-center justify-between gap-2">
                    <input type="text" id="weddingUrl" value="{{ $finalLink }}" readonly class="bg-transparent text-xs text-[#1E1D1B] pl-3 w-full focus:outline-none">
                    <button type="button" onclick="copyWeddingUrl()" class="btn-primary px-4 py-1.5 rounded-full text-[11px] font-medium shrink-0">
                        Salin Link
                    </button>
                </div>
            @endif
        </div>
    </main>

    <script>
        @php
            $safeStories = $wedding->love_stories ?? [['year' => '', 'title' => '', 'story' => '']];
        @endphp
        let storyCounter = {{ count($safeStories) }};

        function addStoryRow() {
            const list = document.getElementById('love-story-list');
            const row = `
                <div class="p-4 rounded-xl bg-[#FAF7F2] border border-[#DCD5C7] space-y-3">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <div>
                            <label class="block text-xs font-medium mb-1">Tahun / Momen</label>
                            <input type="text" name="stories[${storyCounter}][year]" placeholder="2024" class="form-input">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-xs font-medium mb-1">Judul Cerita</label>
                            <input type="text" name="stories[${storyCounter}][title]" placeholder="Lamaran" class="form-input">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-medium mb-1">Deskripsi Singkat</label>
                        <textarea name="stories[${storyCounter}][story]" rows="2" placeholder="Ceritakan kisah singkatnya..." class="form-input"></textarea>
                    </div>
                </div>`;
            list.insertAdjacentHTML('beforeend', row);
            storyCounter++;
        }

        function copyWeddingUrl() {
            const input = document.getElementById('weddingUrl');
            input.select();
            navigator.clipboard.writeText(input.value);
            alert('Tautan undangan disalin: ' + input.value);
        }
    </script>
</body>
</html>