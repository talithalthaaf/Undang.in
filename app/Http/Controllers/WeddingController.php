<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WeddingController extends Controller
{
    private function getUserWedding()
    {
        return Wedding::firstOrCreate(['user_id' => Auth::id()]);
    }

    public function edit()
    {
        $wedding = $this->getUserWedding();
        return view('wedding.edit', compact('wedding'));
    }

    //card 1: Simpan Data Mempelai
    public function updateCouple(Request $request)
    {
        $validated = $request->validate([
            'groom_name' => 'required|string|max:255',
            'groom_nickname' => 'required|string|max:100',
            'groom_parents' => 'required|string|max:255',
            'bride_name' => 'required|string|max:255',
            'bride_nickname' => 'required|string|max:100',
            'bride_parents' => 'required|string|max:255',
        ]);

        $this->getUserWedding()->update($validated);
        return back()->with('success', 'Data kedua mempelai berhasil disimpan!');
    }

    //card 2: Simpan Waktu & Lokasi
    public function updateEvent(Request $request)
    {
        $validated = $request->validate([
            'akad_date' => 'required|date',
            'akad_start_time' => 'required',
            'akad_end_time' => 'required',
            'akad_venue' => 'required|string|max:255',
            'akad_address' => 'required|string',
            'akad_maps_url' => 'nullable|url',
            'resepsi_date' => 'required|date',
            'resepsi_start_time' => 'required',
            'resepsi_end_time' => 'required',
            'resepsi_venue' => 'required|string|max:255',
            'resepsi_address' => 'required|string',
            'resepsi_maps_url' => 'nullable|url',
        ]);

        $this->getUserWedding()->update($validated);
        return back()->with('success', 'Waktu dan lokasi acara berhasil disimpan!');
    }

    //card 3: Simpan Ketentuan
    public function updateNotes(Request $request)
    {
        $validated = $request->validate([
            'dresscode' => 'nullable|string|max:255',
            'additional_notes' => 'nullable|string',
        ]);

        $this->getUserWedding()->update($validated);
        return back()->with('success', 'Catatan tambahan & ketentuan berhasil disimpan!');
    }

    //card 4: Simpan Love Story 
    public function updateStory(Request $request)
    {
        $request->validate([
            'stories' => 'nullable|array',
            'stories.*.year' => 'nullable|string|max:50',
            'stories.*.title' => 'nullable|string|max:255',
            'stories.*.story' => 'nullable|string',
        ]);

        $filtered = collect($request->stories ?? [])
            ->filter(fn($item) => !empty($item['title']) || !empty($item['story']))
            ->values()
            ->all();

        $this->getUserWedding()->update(['love_stories' => $filtered]);
        return back()->with('success', 'Love story berhasil disimpan!');
    }

    //card 5: Unggah Foto
    public function uploadPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:10240', // PNG, JPG hingga 10 MB
        ]);

        $wedding = $this->getUserWedding();
        $photos = $wedding->gallery_photos ?? [];
        $photos[] = $request->file('photo')->store('weddings', 'public'); // Local Storage

        $wedding->update(['gallery_photos' => $photos]);
        return back()->with('success', 'Foto berhasil diunggah!');
    }

    public function deletePhoto($index)
    {
        $wedding = $this->getUserWedding();
        $photos = $wedding->gallery_photos ?? [];

        if (isset($photos[$index])) {
            Storage::disk('public')->delete($photos[$index]);
            unset($photos[$index]);
            $wedding->update(['gallery_photos' => array_values($photos)]);
        }

        return back()->with('success', 'Foto berhasil dihapus!');
    }

    //simpan Pilihan Template
    public function updateTemplate(Request $request)
    {
        $validated = $request->validate([
            'template' => 'required|in:whimsical,minimalist', // Whimsical & Minimalist[cite: 1]
        ]);

        $this->getUserWedding()->update($validated);
        return back()->with('success', 'Pilihan template design undangan berhasil disimpan!');
    }

    //tombol Bawah: simpan data & dapatkan Link
    public function generateLink()
    {
        $wedding = $this->getUserWedding();

        if (!$wedding->groom_nickname || !$wedding->bride_nickname) {
            return back()->with('error', 'Lengkapi dan simpan Data Kedua Mempelai terlebih dahulu sebelum membuat tautan!');
        }

        if (!$wedding->slug) {
            $base = Str::slug($wedding->groom_nickname . '-' . $wedding->bride_nickname);
            $wedding->slug = $base . '-' . Str::lower(Str::random(4));
            $wedding->save();
        }

        return back()->with('generated_link', url('/u/' . $wedding->slug))
                     ->with('success', 'Tautan undangan unik siap dibagikan!');
    }
}