<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    // 🔹 Tampilkan form register
    public function showRegister()
    {
        return view('auth.register');
    }

    // 🔹 Proses registrasi user baru
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // ⚠️ Simpan password TANPA Hash
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // langsung disimpan apa adanya
            'role' => 'user', // default role
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // 🔹 Tampilkan form login
    public function showLogin()
    {
        return view('auth.login');
    }

    // 🔹 Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $credentials['email'])->first();

        // ✅ Cek password biasa (tanpa hash)
        if ($user && $credentials['password'] === $user->password) {
            // Simpan session
            $request->session()->put('user_id', $user->id);
            $request->session()->put('user_name', $user->name);
            $request->session()->put('user_role', $user->role);

            return redirect()->route('warga.index');
        }

        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    // 🔹 Logout user
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
