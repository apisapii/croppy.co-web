<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class GuestProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        return view('guest.profile', compact('user'));
    }

    // ... (method create, store, show, edit biarkan kosong atau hapus juga boleh) ...

    /**
     * Update the specified resource in storage.
     * PERBAIKAN: Hapus parameter 'string $id' karena kita pakai Auth::user()
     */
    public function update(Request $request) 
    {
        // 1. Validasi
        $request->validate([
            'phone' => 'required|numeric',
            'address' => 'required|string|max:500',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Max 2MB
        ]);
    
        /** @var \App\Models\User $user */
        $user = Auth::user();
    
        // Siapkan data yang mau diupdate
        $dataToUpdate = [
            'phone' => $request->phone,
            'address' => $request->address,
        ];
    
        // 2. Cek apakah user upload foto baru?
        if ($request->hasFile('avatar')) {
            // Hapus foto lama kalau ada (opsional)
            if ($user->avatar && file_exists(public_path($user->avatar))) {
                @unlink(public_path($user->avatar));
            }
    
            // Simpan foto ke folder 'public/avatars'
            $path = $request->file('avatar')->store('avatars', 'public');
            
            // Simpan link-nya ke database
            $dataToUpdate['avatar'] = '/storage/' . $path;
        }
    
        // 3. Simpan semua perubahan
        $user->forceFill($dataToUpdate)->save();
    
        return back()->with('success', 'Profil & Foto berhasil diupdate! Kece parah! 😎✨');
    }
}