<?php

namespace App\Http\Controllers;

use App\Models\Ibadah;
use Illuminate\Http\Request;
use App\Models\AlkitabVersion;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class IbadahController extends Controller
{
    public function index()
    {
        $versions = config('bible_versions.versions');
        $selectedVersion = session('last_bible_version', 'toba');
        $versionName = $versions[$selectedVersion] ?? $selectedVersion;

        $books = [];
        try {
            $response = Http::timeout(5)->get('https://beeble.vercel.app/api/v1/passage/list');
            if ($response->successful()) {
                $dataApi = $response->json()['data'];
                foreach ($dataApi as $bookItem) {
                    $books[$bookItem['abbr']] = $bookItem['name'];
                }
            } else {
                Log::error('Gagal memuat daftar kitab dari Beeble API: ' . $response->status());
                session()->flash('error_book_list', 'Gagal memuat daftar kitab dari API. Beberapa fungsi mungkin terbatas.');
            }
        } catch (\Exception $e) {
            Log::error('Exception saat memanggil Beeble API: ' . $e->getMessage());
            session()->flash('error_book_list', 'Terjadi kesalahan jaringan saat memuat daftar kitab. Beberapa fungsi mungkin terbatas.');
        }

        $passageInput = '';
        $bookInfo = null;
        $verses = [];

        $ibadahs = Ibadah::orderBy('tanggal_ibadah', 'desc')->paginate(10);

        return view('content.list-ibadah', compact(
            'versions', 'selectedVersion', 'books',
            'bookInfo', 'verses', 'versionName', 'passageInput', 'ibadahs'
        ));
    }

    public function show(Ibadah $ibadah)
    {
        $versions = config('bible_versions.versions');
        $selectedVersion = session('last_bible_version', 'toba');
        $versionName = $versions[$selectedVersion] ?? $selectedVersion;

        $books = [];
        try {
            $response = Http::timeout(5)->get('https://beeble.vercel.app/api/v1/passage/list');
            if ($response->successful()) {
                $dataApi = $response->json()['data'];
                foreach ($dataApi as $bookItem) {
                    $books[$bookItem['abbr']] = $bookItem['name'];
                }
            }
        } catch (\Exception $e) {
            Log::error('Exception saat memanggil Beeble API untuk detail ibadah: ' . $e->getMessage());
        }

        return view('content.home', compact('ibadah', 'versions', 'selectedVersion', 'versionName', 'books'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_ibadah' => 'required|date',
            'nama_minggu' => 'required|string|max:255',
            'tema_khotbah' => 'required|string',
            'version_code' => 'required|string|max:10',
            'evangelium' => 'required|string|max:255',
            'epistel' => 'required|string|max:255',
            's_patik' => 'required|string|max:255',
            'daftar_ende' => 'nullable|array',
            'daftar_ende.*.nomor' => 'nullable|string|max:50',
            'daftar_ende.*.catatan' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error', 'Gagal menambahkan data ibadah. Silakan periksa input Anda.');
        }

        try {
            $filteredDaftarEnde = collect($request->input('daftar_ende'))->filter(function ($item) {
                return !empty($item['nomor']) || !empty($item['catatan']);
            })->values()->all(); 

            Ibadah::create([
                'tanggal_ibadah' => $request->tanggal_ibadah,
                'nama_minggu' => $request->nama_minggu,
                'tema_khotbah' => $request->tema_khotbah,
                'version_code' => $request->version_code,
                'evangelium' => $request->evangelium,
                'epistel' => $request->epistel,
                's_patik' => $request->s_patik,
                'daftar_ende' => empty($filteredDaftarEnde) ? [] : $filteredDaftarEnde,
            ]);

            return redirect()->route('ibadah.index')->with('success', 'Data ibadah berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan data ibadah: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data ibadah. Silakan coba lagi.');
        }
    }

    public function update(Request $request, Ibadah $ibadah)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'tanggal_ibadah' => 'required|date',
            'nama_minggu' => 'required|string|max:255',
            'tema_khotbah' => 'required|string',
            'version_code' => 'required|string|max:10',
            'evangelium' => 'required|string|max:255',
            'epistel' => 'required|string|max:255',
            's_patik' => 'required|string|max:255',
            'daftar_ende' => 'nullable|array',
            'daftar_ende.*.nomor' => 'nullable|string|max:50',
            'daftar_ende.*.catatan' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()
                        ->with('error', 'Gagal memperbarui data ibadah. Silakan periksa input Anda.');
        }

        try {
            $filteredDaftarEnde = collect($request->input('daftar_ende'))->filter(function ($item) {
                return !empty($item['nomor']) || !empty($item['catatan']);
            })->values()->all();

            $ibadah->update([
                'tanggal_ibadah' => $request->tanggal_ibadah,
                'nama_minggu' => $request->nama_minggu,
                'tema_khotbah' => $request->tema_khotbah,
                'version_code' => $request->version_code,
                'evangelium' => $request->evangelium,
                'epistel' => $request->epistel,
                's_patik' => $request->s_patik,
                'daftar_ende' => empty($filteredDaftarEnde) ? [] : $filteredDaftarEnde,
            ]);

            return redirect()->route('ibadah.index')->with('success', 'Data ibadah berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui data ibadah: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data ibadah. Silakan coba lagi.');
        }
    }

    public function destroy(Ibadah $ibadah)
    {
        try {
            $ibadah->delete();
            return redirect()->route('ibadah.index')->with('success', 'Data ibadah berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Gagal menghapus data ibadah: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data ibadah. Silakan coba lagi.');
        }
    }
}