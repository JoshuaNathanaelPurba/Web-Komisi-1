<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjelasan;
use App\Models\Sambutan;
use Illuminate\Support\Facades\Storage;
use App\Models\Proker;
use App\Models\Foto;
use App\Models\BaganStruktur;
use App\Models\Pimpinan;
use App\Models\Anggota;
use App\Models\Renungan;
use App\Models\Galeri;

class DashboardController extends Controller
{
    public function index()
    {
        $penjelasan = Penjelasan::first();
        $sambutanKetua = Sambutan::where('jabatan', 'Ketua Komisi 1')->first();
        $sambutanWakil = Sambutan::where('jabatan', 'Wakil Ketua Komisi 1')->first();
        
        $prokers = Proker::all(); 
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

        return redirect()->route('profil')->with('success', 'Penjelasan berhasil disimpan!');
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

        return redirect()->route('profil')->with('success', 'Penjelasan berhasil diperbarui!');
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

        return redirect()->route('profil')->with('success', 'Program Kerja baru berhasil ditambahkan!');
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

        return redirect()->route('profil')->with('success', 'Program Kerja berhasil diperbarui!');
    }
    
    public function destroyProker($id)
    {
        $proker = Proker::findOrFail($id);

        if ($proker->foto_proker) {
            Storage::disk('public')->delete($proker->foto_proker);
        }

        $proker->delete();

        return redirect()->route('profil')->with('success', 'Program Kerja berhasil dihapus!');
    }

    public function storeFoto(Request $request)
    {
        $request->validate([
            'foto_komisi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pathFoto = null;
        if ($request->hasFile('foto_komisi')) {
            $pathFoto = $request->file('foto_komisi')->store('foto-komisi', 'public');
        }

        Foto::create([
            'gambar'    => 'Foto Komisi 1',
            'path_foto' => $pathFoto,
        ]);

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
        $bagan = BaganStruktur::first();
        $pimpinans = Pimpinan::all();
        $anggotas = Anggota::all();
        return view('struktur', compact('bagan', 'pimpinans', 'anggotas'));
    }

    public function createBagan()
    {
        return view('struktur-tambah');
    }

    public function storeBagan(Request $request)
    {
        $request->validate([
            'foto_bagan' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
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

    public function editBagan($id)
    {
        $bagan = BaganStruktur::findOrFail($id);
        return view('struktur-edit', compact('bagan'));
    }

    public function updateBagan(Request $request, $id)
    {
        $bagan = BaganStruktur::findOrFail($id);

        $request->validate([
            'foto_bagan' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        $pathFoto = $bagan->path_foto;
        if ($request->hasFile('foto_bagan')) {
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

    public function destroyBagan($id)
    {
        $bagan = BaganStruktur::findOrFail($id);

        if ($bagan->path_foto) {
            Storage::disk('public')->delete($bagan->path_foto);
        }
    
        $bagan->delete();

        return redirect()->route('struktur')->with('success', 'Bagan struktur organisasi berhasil dihapus!');
    }

    public function createPimpinan()
    {
        return view('pimpinan-tambah');
    }

    public function storePimpinan(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'jabatan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jurusan_angkatan' => 'required|string|max:255',
        ]);

        $fotoPath = $request->file('foto')->store('pimpinan', 'public');

        Pimpinan::create([
            'foto' => $fotoPath,
            'jabatan' => $request->jabatan,
            'nama' => $request->nama,
            'jurusan_angkatan' => $request->jurusan_angkatan,
        ]);

        return redirect()->route('struktur')->with('success', 'Data pimpinan berhasil ditambahkan.');
    }

    public function editPimpinan($id)
    {
        $pimpinan = Pimpinan::findOrFail($id);
        return view('pimpinan-edit', compact('pimpinan'));
    }

    public function updatePimpinan(Request $request, $id)
    {
        $pimpinan = Pimpinan::findOrFail($id);

        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'jabatan' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'jurusan_angkatan' => 'required|string|max:255',
        ]);

        if ($request->hasFile('foto')) {
            if ($pimpinan->foto) {
                Storage::disk('public')->delete($pimpinan->foto);
            }
            $pimpinan->foto = $request->file('foto')->store('pimpinan', 'public');
        }

        $pimpinan->jabatan = $request->jabatan;
        $pimpinan->nama = $request->nama;
        $pimpinan->jurusan_angkatan = $request->jurusan_angkatan;
        $pimpinan->save();

        return redirect()->route('struktur')->with('success', 'Data pimpinan berhasil diperbarui.');
    }

    public function destroyPimpinan($id)
    {
        $pimpinan = Pimpinan::findOrFail($id);
        
        if ($pimpinan->foto) {
            Storage::disk('public')->delete($pimpinan->foto);
        }
        
        $pimpinan->delete();

        return redirect()->route('struktur')->with('success', 'Data pimpinan berhasil dihapus.');
    }

    public function createAnggota()
    {
        return view('anggota-tambah');
    }

    public function storeAnggota(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:255',
            'prodi_angkatan' => 'required|string|max:255',
        ]);

        $fotoPath = $request->file('foto')->store('anggota', 'public');

        Anggota::create([
            'foto' => $fotoPath,
            'nama' => $request->nama,
            'prodi_angkatan' => $request->prodi_angkatan,
        ]);

        return redirect()->route('struktur')->with('success', 'Data anggota berhasil ditambahkan.');
    }

    public function editAnggota($id)
    {
        $anggota = Anggota::findOrFail($id);
        return view('anggota-edit', compact('anggota'));
    }
    
    public function updateAnggota(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:255',
            'prodi_angkatan' => 'required|string|max:255',
        ]);

        if ($request->hasFile('foto')) {
            if ($anggota->foto) {
                Storage::disk('public')->delete($anggota->foto);
            }
            $anggota->foto = $request->file('foto')->store('anggota', 'public');
        }

        $anggota->nama = $request->nama;
        $anggota->prodi_angkatan = $request->prodi_angkatan;
        $anggota->save();

        return redirect()->route('struktur')->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroyAnggota($id)
    {
        $anggota = Anggota::findOrFail($id);
        
        if ($anggota->foto) {
            Storage::disk('public')->delete($anggota->foto);
        }
        
        $anggota->delete();

        return redirect()->route('struktur')->with('success', 'Data anggota berhasil dihapus.');
    }

    public function renunganIndex(){
        $allRenungan = Renungan::latest()->get();
        return view('renungan', compact('allRenungan'));
    }

    public function renunganShow($id){
        $renungan = Renungan::findOrFail($id);
        return view('detail-renungan', compact('renungan'));
    }

    public function renunganCreate(){
        return view('renungan-tambah');
    }

    public function renunganStore(Request $request){
        $request->validate([
            'judul' => 'required|string|max:255',
            'ayat_alkitab' => 'nullable|string|max:255',
            'isi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pathFoto = null;
        if ($request->hasFile('foto')) {
            $pathFoto = $request->file('foto')->store('renungan', 'public');
        }

        Renungan::create([
            'judul' => $request->judul,
            'ayat_alkitab' => $request->ayat_alkitab,
            'isi' => $request->isi,
            'foto' => $pathFoto,
        ]);

        return redirect()->route('renungan')->with('success', 'Renungan berhasil ditambahkan!');
    }

    public function renunganEdit($id){
        $renungan = Renungan::findOrFail($id);
        return view('renungan-edit', compact('renungan'));
    }

    public function renunganUpdate(Request $request, $id){
        $renungan = Renungan::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'ayat_alkitab' => 'nullable|string|max:255',
            'isi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pathFoto = $renungan->foto;
        if ($request->hasFile('foto')) {
            if ($renungan->foto) {
                Storage::disk('public')->delete($renungan->foto);
            }
            $pathFoto = $request->file('foto')->store('renungan', 'public');
        }

        $renungan->update([
            'judul' => $request->judul,
            'ayat_alkitab' => $request->ayat_alkitab,
            'isi' => $request->isi,
            'foto' => $pathFoto,
        ]);

        return redirect()->route('renungan')->with('success', 'Renungan berhasil diperbarui!');
    }

    public function renunganDestroy($id){
        $renungan = Renungan::findOrFail($id);
        if ($renungan->foto) {
            Storage::disk('public')->delete($renungan->foto);
        }
        $renungan->delete();
        return redirect()->route('renungan')->with('success', 'Renungan berhasil dihapus!');
    }

    public function profilIndex()
    {
        $penjelasan = Penjelasan::first();
        $prokers = Proker::all(); 

        return view('profil', compact('penjelasan', 'prokers'));
    }
    
    public function galeri()
    {
        $galeris = Galeri::all();
        return view('galeri', compact('galeris'));
    }

    public function galeriCreate()
    {
        return view('galeri-tambah');
    }

    public function galeriStore(Request $request)
    {
        $request->validate([
            'judul'       => 'required|string|max:255',
            'foto_komisi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pathFoto = null;
        if ($request->hasFile('foto_komisi')) {
            $pathFoto = $request->file('foto_komisi')->store('galeri', 'public');
        }

        Galeri::create([
            'judul'     => $request->judul,
            'path_foto' => $pathFoto,
        ]);

        return redirect()->route('galeri')->with('success', 'Foto berhasil ditambahkan ke galeri!');
    }

    public function galeriEdit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('galeri-edit', compact('galeri'));
    }

    public function galeriUpdate(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'foto_komisi'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pathFoto = $galeri->path_foto;
        if ($request->hasFile('foto_komisi')) {
            if ($galeri->path_foto) {
                Storage::disk('public')->delete($galeri->path_foto);
            }
            $pathFoto = $request->file('foto_komisi')->store('galeri', 'public');
        }

        $galeri->update([
            'judul'     => $request->judul,
            'path_foto' => $pathFoto,
        ]);

        return redirect()->route('galeri')->with('success', 'Foto galeri berhasil diperbarui!');
    }

    public function galeriDestroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        if ($galeri->path_foto) {
            Storage::disk('public')->delete($galeri->path_foto);
        }
        $galeri->delete();
        
        return redirect()->route('galeri')->with('success', 'Foto galeri berhasil dihapus!');
    }
}