<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjelasan;
use App\Models\Sambutan;
use Illuminate\Support\Facades\Storage;
use App\Models\Proker;
use App\Models\Foto;
use App\Models\BaganStruktur;

class DashboardController extends Controller
{
    public function index()
    {
        $penjelasan = Penjelasan::first();
        $sambutanKetua = Sambutan::where('jabatan', 'Ketua Komisi 1')->first();
        $sambutanWakil = Sambutan::where('jabatan', 'Wakil Ketua Komisi 1')->first();
        
        $prokers = Proker::all(); 
        // Mengambil semua data foto untuk disalurkan ke beranda
        $fotos = Foto::all(); 

        return view('beranda', compact('penjelasan', 'sambutanKetua', 'sambutanWakil', 'prokers', 'fotos'));
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

    public function storeProker(Request $request)
    {
        $request->validate([
            'nama_proker' => 'required|string|max:255',
            'penjelasan_proker'   => 'required|string',
            'foto_proker'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['nama_proker', 'penjelasan_proker']);

        if ($request->hasFile('foto_proker')) {
            $data['foto_proker'] = $request->file('foto_proker')->store('proker', 'public');
        }

        Proker::create($data);

        return redirect()->route('beranda')->with('success', 'Program Kerja baru berhasil ditambahkan!');
    }

    public function editProker($id)
    {
        $proker = Proker::findOrFail($id);
        return view('proker-edit', compact('proker'));
    }

    public function updateProker(Request $request, $id)
    {
        $proker = Proker::findOrFail($id);

        $request->validate([
            'nama_proker' => 'required|string|max:255',
            'penjelasan_proker'   => 'required|string',
            'foto_proker'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['nama_proker', 'penjelasan_proker']);

        if ($request->hasFile('foto_proker')) {
            if ($proker->foto_proker) {
                Storage::disk('public')->delete($proker->foto_proker);
            }
            $data['foto_proker'] = $request->file('foto_proker')->store('proker', 'public');
        }

        $proker->update($data);

        return redirect()->route('beranda')->with('success', 'Program Kerja berhasil diperbarui!');
    }
    
    public function destroyProker($id)
    {
        $proker = Proker::findOrFail($id);

        if ($proker->foto_proker) {
            Storage::disk('public')->delete($proker->foto_proker);
        }

        $proker->delete();

        return redirect()->route('beranda')->with('success', 'Program Kerja berhasil dihapus!');
    }

public function storeFoto(Request $request)
    {
        // 1. Validasi input file foto_komisi yang dikirim dari form blade
        $request->validate([
            'foto_komisi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pathFoto = null;
        // 2. Ambil file foto_komisi dan simpan ke folder storage
        if ($request->hasFile('foto_komisi')) {
            $pathFoto = $request->file('foto_komisi')->store('foto-komisi', 'public');
        }

        // 3. Simpan data path_foto ke database SQLite
        // PERBAIKAN: Ubah key 'judul' menjadi 'gambar' agar sesuai model & migration
        Foto::create([
            'gambar'    => 'Foto Komisi 1',
            'path_foto' => $pathFoto,
        ]);

        // 4. Alihkan kembali ke halaman beranda setelah sukses menyimpan
        return redirect()->route('beranda')->with('success', 'Foto Komisi 1 berhasil ditambahkan!');
    }

    public function editFoto($id)
    {
        $foto = Foto::findOrFail($id);
        return view('foto-edit', compact('foto'));
    }

    public function updateFoto(Request $request, $id)
    {
        $foto = Foto::findOrFail($id);

        $request->validate([
            'gambar'     => 'required|string|max:255',
            'path_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $data = $request->only(['gambar']);

        if ($request->hasFile('path_foto')) {
            if ($foto->path_foto) {
                Storage::disk('public')->delete($foto->path_foto);
            }
            $data['path_foto'] = $request->file('path_foto')->store('foto-komisi', 'public');
        }

        $foto->update($data);

        return redirect()->route('beranda')->with('success', 'Foto Komisi 1 berhasil diperbarui!');
    }

    public function destroyFoto($id)
    {
        $foto = Foto::findOrFail($id);
        if ($foto->path_foto) {
            Storage::disk('public')->delete($foto->path_foto);
        }

        $foto->delete();

        return redirect()->route('beranda')->with('success', 'Foto Komisi 1 berhasil dihapus!');
    }

    public function indexStruktur()
{
    // Mengambil bagan struktur pertama yang ada di database
    $bagan = BaganStruktur::first();
    return view('struktur', compact('bagan'));
}

// 2. Menampilkan Form Tambah / Upload Bagan
public function createBagan()
{
    return view('struktur-tambah');
}

// 3. Memproses Simpan Bagan
public function storeBagan(Request $request)
{
    $request->validate([
        'foto_bagan' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // Max 5MB
    ]);

    $pathFoto = null;
    if ($request->hasFile('foto_bagan')) {
        $pathFoto = $request->file('foto_bagan')->store('bagan-struktur', 'public');
    }

    BaganStruktur::create([
        'path_foto' => $pathFoto
    ]);

    return redirect()->route('struktur')->with('success', 'Bagan struktur organisasi berhasil diunggah!');
}

// 4. Menampilkan Form Edit Bagan
public function editBagan($id)
{
    $bagan = BaganStruktur::findOrFail($id);
    return view('struktur-edit', compact('bagan'));
}

// 5. Memproses Update Bagan
public function updateBagan(Request $request, $id)
{
    $bagan = BaganStruktur::findOrFail($id);

    $request->validate([
        'foto_bagan' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
    ]);

    $pathFoto = $bagan->path_foto;
    if ($request->hasFile('foto_bagan')) {
        // Hapus file bagan yang lama dari storage
        if ($bagan->path_foto) {
            Storage::disk('public')->delete($bagan->path_foto);
        }
        $pathFoto = $request->file('foto_bagan')->store('bagan-struktur', 'public');
    }

    $bagan->update([
        'path_foto' => $pathFoto
    ]);

    return redirect()->route('struktur')->with('success', 'Bagan struktur organisasi berhasil diperbarui!');
}

// 6. Memproses Hapus Bagan
public function destroyBagan($id)
{
    $bagan = BaganStruktur::findOrFail($id);

    if ($bagan->path_foto) {
        Storage::disk('public')->delete($bagan->path_foto);
    }
    
    $bagan->delete();

    return redirect()->route('struktur')->with('success', 'Bagan struktur organisasi berhasil dihapus!');
}
}