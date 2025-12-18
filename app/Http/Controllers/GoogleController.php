<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cari user berdasarkan google_id atau email
            $user = User::where('google_id', $googleUser->id)
                        ->orWhere('email', $googleUser->email)
                        ->first();

            if ($user) {
                // Kalau user udah ada, langsung update google_id (kalau belum ada) & login
                $user->update(['google_id' => $googleUser->id]);
                Auth::login($user);
            } else {
                // Kalau user baru, kita daftarkan otomatis
                $newUser = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    // Kalau tabel users punya kolom role, pastikan default-nya customer/guest
                    'role' => 'customer',
                    'password' => bcrypt(Str::random(16)), // Password acak karena login pake Google
                ]);
                Auth::login($newUser);
            }

            // Selalu arahkan ke halaman guest (home), jangan ke halaman admin
            return redirect('/'); 

        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Login Google gagal, coba lagi ya!');
        }
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
