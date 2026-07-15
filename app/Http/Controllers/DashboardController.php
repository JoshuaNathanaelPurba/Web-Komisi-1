<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjelasan;
use App\Models\Sambutan;
use Illuminate\Support\Facades\Storage;

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

    public function storeSambutan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'periode' => 'required|string|max:4',
            'kata_sambutan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pathFoto = null;
        if ($request->hasFile('foto')) {
            $pathFoto = $request->file('foto')->store('foto-sambutan', 'public');
        }

        Sambutan::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'periode' => $request->periode,
            'kata_sambutan' => $request->kata_sambutan,
            'foto' => $pathFoto,
        ]);

        return redirect()->route('beranda')->with('success', 'Sambutan pimpinan berhasil disimpan!');
    }

    public function updateSambutan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'periode' => 'required|string|max:4',
            'kata_sambutan' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $sambutan = Sambutan::where('jabatan', $request->jabatan)->first(); 

        if ($sambutan) {
            $pathFoto = $sambutan->foto;

            if ($request->hasFile('foto')) {
                if ($sambutan->foto) {
                    \Illuminate\Support\Facades\Storage::disk('public')->delete($sambutan->foto);
                }
                $pathFoto = $request->file('foto')->store('foto-sambutan', 'public');
            }

            $sambutan->update([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'periode' => $request->periode,
                'kata_sambutan' => $request->kata_sambutan,
                'foto' => $pathFoto,
            ]);
        } else {
            $pathFoto = null;
            if ($request->hasFile('foto')) {
                $pathFoto = $request->file('foto')->store('foto-sambutan', 'public');
            }
            
            Sambutan::create([
                'nama' => $request->nama,
                'jabatan' => $request->jabatan,
                'periode' => $request->periode,
                'kata_sambutan' => $request->kata_sambutan,
                'foto' => $pathFoto,
            ]);
        }

        return redirect()->route('beranda')->with('success', 'Sambutan pimpinan berhasil diperbarui!');
    }
}