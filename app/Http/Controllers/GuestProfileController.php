<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GuestProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        // Arahkan ke view yang kemarin kita buat (resources/views/guest/profile.blade.php)
        return view('guest.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // 1. Validasi (Tambah validasi foto)
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
            // Hapus foto lama kalau ada (opsional, biar hemat storage)
            // if ($user->avatar && file_exists(public_path($user->avatar))) {
            //     unlink(public_path($user->avatar));
            // }
    
            // Simpan foto ke folder 'public/avatars'
            $path = $request->file('avatar')->store('avatars', 'public');
            
            // Simpan link-nya ke database (tambah '/storage/' di depannya)
            $dataToUpdate['avatar'] = '/storage/' . $path;
        }
    
        // 3. Simpan semua perubahan
        $user->forceFill($dataToUpdate)->save();
    
        return back()->with('success', 'Profil & Foto berhasil diupdate! Kece parah! 😎✨');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
