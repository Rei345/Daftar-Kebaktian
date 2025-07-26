<?php

namespace App\Http\Controllers;

use App\Models\Ibadah;
use Illuminate\Http\Request; // Pastikan ini di-import
use App\Models\AlkitabVersion; 
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class IbadahController extends Controller
{
    public function index(Request $request)
    {
        Log::info("Route /ibadah diakses");

        $ibadahs = Ibadah::orderBy('tanggal_ibadah', 'desc')->paginate(10);

        if ($request->ajax() || $request->wantsJson()) {
            Log::info("Return JSON dari /ibadah", ['count' => $ibadahs->count()]);
            return response()->json($ibadahs); 
        }
        // $ibadahs = Ibadah::orderBy('tanggal_ibadah', 'desc')->paginate(10);

        // if ($request->ajax() || $request->wantsJson()) {
        //     return response()->json($ibadahs); 
        // }

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

        return response()->view('content.list-ibadah', compact(
            'versions', 'selectedVersion', 'books',
            'bookInfo', 'verses', 'versionName', 'passageInput', 'ibadahs'
        ));
    }

    public function create()
    {
        abort(404);
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
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'message' => 'Validasi gagal. Silakan periksa input Anda.',
                    'errors' => $validator->errors()
                ], 422);
            }
            return response()->json([
                'message' => 'Validasi gagal. Silakan periksa input Anda.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $filteredDaftarEnde = collect($request->input('daftar_ende'))->filter(function ($item) {
                return !empty($item['nomor']) || !empty($item['catatan']);
            })->values()->all(); 

            Ibadah::create([
                'tanggal_ibadah' => $request->input('tanggal_ibadah'),
                'nama_minggu' => $request->input('nama_minggu'),
                'tema_khotbah' => $request->input('tema_khotbah'),
                'version_code' => $request->input('version_code'),
                'evangelium' => $request->input('evangelium'),
                'epistel' => $request->input('epistel'),
                's_patik' => $request->input('s_patik'),
                'daftar_ende' => empty($filteredDaftarEnde) ? [] : $filteredDaftarEnde,
            ]);

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['message' => 'Data ibadah berhasil ditambahkan!'], 201);
            }
            return response()->json(['message' => 'Data ibadah berhasil ditambahkan!'], 201);
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan data ibadah: ' . $e->getMessage());
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data ibadah. Silakan coba lagi.'], 500);
            }
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data ibadah. Silakan coba lagi.'], 500);
        }
    }

    public function show(Request $request, Ibadah $ibadah)
    {
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json($ibadah);
        }

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

        return response()->view('content.home', compact('ibadah', 'versions', 'selectedVersion', 'versionName', 'books'));
    }

    public function edit(Ibadah $ibadah)
    {
        abort(404);
    }

    public function update(Request $request, Ibadah $ibadah)
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
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'message' => 'Validasi gagal. Silakan periksa input Anda.',
                    'errors' => $validator->errors()
                ], 422);
            }
            return response()->json([
                'message' => 'Validasi gagal. Silakan periksa input Anda.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $filteredDaftarEnde = collect($request->input('daftar_ende'))->filter(function ($item) {
                return !empty($item['nomor']) || !empty($item['catatan']);
            })->values()->all();

            $ibadah->update([
                'tanggal_ibadah' => $request->input('tanggal_ibadah'),
                'nama_minggu' => $request->input('nama_minggu'),
                'tema_khotbah' => $request->input('tema_khotbah'),
                'version_code' => $request->input('version_code'),
                'evangelium' => $request->input('evangelium'),
                'epistel' => $request->input('epistel'),
                's_patik' => $request->input('s_patik'),
                'daftar_ende' => empty($filteredDaftarEnde) ? [] : $filteredDaftarEnde,
            ]);

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['message' => 'Data ibadah berhasil diperbarui!'], 200);
            }
            return response()->json(['message' => 'Data ibadah berhasil diperbarui!'], 200);
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui data ibadah: ' . $e->getMessage());
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['message' => 'Terjadi kesalahan saat memperbarui data ibadah. Silakan coba lagi.'], 500);
            }
            return response()->json(['message' => 'Terjadi kesalahan saat memperbarui data ibadah. Silakan coba lagi.'], 500);
        }
    }

    public function destroy(Request $request, Ibadah $ibadah) // Pastikan Request $request ada di sini
    {
        try {
            $ibadah->delete();
            // Jika ini request AJAX, kembalikan JSON sukses
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['message' => 'Data ibadah berhasil dihapus!'], 200);
            }
            // Jika bukan AJAX, redirect dengan pesan sukses
            return response()->json(['message' => 'Data ibadah berhasil dihapus!'], 200);
        } catch (\Exception $e) {
            Log::error('Gagal menghapus data ibadah: ' . $e->getMessage());
            // Jika ini request AJAX, kembalikan JSON error
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json(['message' => 'Terjadi kesalahan saat menghapus data ibadah. Silakan coba lagi.'], 500);
            }
            // Jika bukan AJAX, redirect dengan pesan error
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data ibadah. Silakan coba lagi.'], 500);
        }
    }
}