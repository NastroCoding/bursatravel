<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuillImageController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('quill-images', 'public');
            $url = Storage::url($path);
            return response()->json(['url' => $url]);
        }
        if ($request->hasFile('video')) {
            $file = $request->file('video');
            if (in_array($file->getClientOriginalExtension(), ['mp4', 'webm', 'ogg'])) {
                $path = $file->store('quill-videos', 'public');
                $url = Storage::url($path);
                return response()->json(['url' => $url]);
            }
            return response()->json(['error' => 'Invalid video format'], 400);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }
}
