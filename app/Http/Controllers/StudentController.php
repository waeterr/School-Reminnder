<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class StudentController extends Controller
{
    /**
     * Menampilkan daftar seluruh siswa.
     */
    public function index()
    {
        // Ambil data user + relasi class
        $students = User::with('classroom')->get();

        // Render ke Blade
        return view('students.index', compact('students'));
    }

    /**
     * Update last_seen setiap user melakukan aktivitas.
     * Middleware akan memanggil ini otomatis.
     */
    public function updateActivity()
    {
        $user = Auth::user();

        if ($user instanceof User) {
            $user->update([
                'last_seen' => now(),
                'status'    => 'active',
            ]);
        }
    }
    /**
     * Tandai user sebagai offline jika sudah lama tidak aktif.
     * Ini dipakai oleh scheduler (cron).
     */
    public function markOffline()
    {
        $limit = Carbon::now()->subMinutes(1); // 1 menit tidak aktif

        User::where('last_seen', '<=', $limit)
            ->update(['status' => 'offline']);

        return "Updated";
    }
}
