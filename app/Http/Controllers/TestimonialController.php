<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image',
            'caption' => 'nullable|string',
            'description' => 'required|string',
            'youtube_url' => 'nullable|string',
            'video' => 'nullable|file|mimetypes:video/mp4,video/webm,video/ogg',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('testimonial-videos', 'public');
        }

        $data['created_by'] = auth()->id();
        $testimony = Testimonial::create($data);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $testimonial = \App\Models\Testimonial::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image',
            'caption' => 'nullable|string',
            'description' => 'required|string',
            'youtube_url' => 'nullable|string',
            'video' => 'nullable|file|mimetypes:video/mp4,video/webm,video/ogg',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('testimonials', 'public');
        }

        if ($request->hasFile('video')) {
            $data['video'] = $request->file('video')->store('testimonial-videos', 'public');
        }

        $testimonial->update($data);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);
        $filePath = storage_path('app/public/' . $testimonial->image);
        if (file_exists($filePath) && $testimonial->image || $testimonial->video) {
            unlink($filePath); 
        }
        $testimonial->delete();

        return back()->with('success', 'Testimoni berhasil di hapus!');
    }
}