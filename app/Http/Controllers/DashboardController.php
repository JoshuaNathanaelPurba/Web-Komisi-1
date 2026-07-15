<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjelasan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function storePenjelasan(Request $request)
    {
        $request->validate([
            'konten' => 'required|string',
        ]);

        Penjelasan::create([
            'konten' => $request->konten
        ]);

        return redirect()->route('beranda')->with('success', 'Penjelasan berhasil disimpan!');
    }

    public function updatePenjelasan(Request $request)
    {
        $request->validate([
            'konten' => 'required|string',
        ]);

        $penjelasan = Penjelasan::first();
        if ($penjelasan) {
            $penjelasan->update([
                'konten' => $request->konten
            ]);
        } else {
            Penjelasan::create([
                'konten' => $request->konten
            ]);
        }

        return redirect()->route('beranda')->with('success', 'Penjelasan berhasil diperbarui!');
    }
}