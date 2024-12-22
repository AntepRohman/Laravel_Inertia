<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    // Menampilkan form upload gambar
    public function showUploadForm()
    {
        return view('upload'); // Pastikan view ini ada
    }

    // Menangani proses upload gambar
    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('image')) {
            $path = $request->file('image')->store('images', 'public');
            // Simpan path ke database atau lakukan hal lain yang diperlukan
        }

        return back()->with('success', 'Image uploaded successfully.');
    }
}
