<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function processSearch(Request $request)
    {
        // 1. Validasi input form
        $validator = Validator::make($request->all(), [
            'version_code' => 'required|string|in:' . implode(',', array_keys(config('bible_versions.versions'))),
            'passage_input' => 'required|string|max:100',
        ]);

        if ($validator->fails()) {
            return redirect()->back() // Kembali ke halaman sebelumnya (misal: halaman detail ibadah)
                            ->withErrors($validator)
                            ->withInput()
                            ->with('error', 'Format bacaan Alkitab tidak valid.');
        }
        // if ($validator->fails()) {
        //     return redirect()->route('index.alkitab')->withErrors($validator)->withInput();
        // }

        $versionCode = $request->input('version_code');
        $passageInput = trim($request->input('passage_input'));

        $request->session()->put('last_bible_version', $versionCode);

        $originalPassage = $passageInput;
        $note = '';
        $goldenVerse = null;

        if (preg_match('/\s+\(AO\s*:\s*(\d+)\)$/i', $passageInput, $matches)) {
            $goldenVerse = (int) $matches[1];
            $note = trim($matches[0]);
            $passageInput = trim(str_replace($matches[0], '', $passageInput));
        }

        // --- Dapatkan daftar singkatan kitab dari API untuk parsing ---
        $bookAbbreviations = [];
        $responseList = Http::get('https://beeble.vercel.app/api/v1/passage/list');
        if ($responseList->successful()) {
            $dataApi = $responseList->json()['data'];
            foreach ($dataApi as $bookItem) {
                $bookAbbreviations[strtolower($bookItem['abbr'])] = $bookItem['abbr'];
                $bookAbbreviations[strtolower($bookItem['name'])] = $bookItem['abbr'];
                $bookAbbreviations[strtolower(str_replace(' ', '', $bookItem['name']))] = $bookItem['abbr'];
            }
        } else {
            return redirect()->route('index.alkitab')->with('error', 'Gagal memuat daftar kitab untuk parsing input Anda.')->withInput();
        }

        // 2. Parsing string passage_input
        $bookAbbr = null;
        $chapter = null;
        $startVerse = null;
        $endVerse = null;

        if (preg_match('/^(.+?)\s+(\d+)(?:\s*:\s*(\d+)(?:-(\d+))?)?$/i', $passageInput, $matches)) {
            $bookNameOrAbbr = strtolower(trim($matches[1]));
            $chapter = (int) $matches[2];
            $startVerse = isset($matches[3]) ? (int) $matches[3] : null;
            $endVerse = isset($matches[4]) ? (int) $matches[4] : null;

            $bookAbbr = $bookAbbreviations[$bookNameOrAbbr] ?? null;

        } else {
            return redirect()->route('index.alkitab')->withErrors(['passage_input' => 'Format pasal/ayat tidak valid. Contoh: "Kejadian 1:2-3" atau "Kej 1:2-3".'])->withInput();
        }

        if (!$bookAbbr) {
            return redirect()->route('index.alkitab')->withErrors(['passage_input' => 'Nama Kitab tidak dikenali.'])->withInput();
        }

        // 3. Bangun URL API untuk seluruh bab
        $apiUrl = "https://beeble.vercel.app/api/v1/passage/{$bookAbbr}/{$chapter}?ver={$versionCode}";

        // 4. Panggil API (dengan caching)
        $cacheKey = "passage_{$bookAbbr}_{$chapter}_{$versionCode}";
        $apiResponseData = Cache::remember($cacheKey, 3600, function () use ($apiUrl) {
            $response = Http::get($apiUrl);
            if ($response->successful()) {
                return $response->json()['data'];
            }
            return null; // Mengembalikan null jika gagal
        });

        $bookInfo = null; // Default value
        $verses = [];    // Default value

        if (is_null($apiResponseData) || !isset($apiResponseData['book'])) {
            return redirect()->back()->withInput()->withErrors(['api_error' => 'Gagal mengambil data dari API atau bacaan tidak ditemukan. Silakan periksa formatnya.']);
        }
        // if (is_null($apiResponseData) || !isset($apiResponseData['book'])) {
        //     return redirect()->route('index.alkitab')->withErrors(['api_error' => 'Gagal mengambil data dari API atau kitab/bab tidak ditemukan.'])->withInput();
        // }

        $bookInfo = $apiResponseData['book']; // Assign value to $bookInfo

        // 5. Filter ayat yang diinginkan dari respons API
        if (isset($apiResponseData['verses']) && is_array($apiResponseData['verses'])) {
            foreach ($apiResponseData['verses'] as $verse) {
                if (isset($verse['verse']) && is_numeric($verse['verse']) && ($verse['type'] ?? '') === 'content') {
                    $currentVerseNumber = (int) $verse['verse'];

                    if (is_null($startVerse) && is_null($endVerse)) {
                        $filteredVerses[] = $verse;
                    } elseif (!is_null($startVerse) && is_null($endVerse)) {
                        if ($currentVerseNumber === $startVerse) {
                            $filteredVerses[] = $verse;
                        }
                    } elseif (!is_null($startVerse) && !is_null($endVerse)) {
                        if ($currentVerseNumber >= $startVerse && $currentVerseNumber <= $endVerse) {
                            $filteredVerses[] = $verse;
                        }
                    }
                }
            }
        }

        // 6. Tampilkan hasil
        $versions = config('bible_versions.versions');
        $selectedVersion = $versionCode;
        $versionName = config('bible_versions.versions')[$versionCode] ?? $versionCode;

        // Kirim $filteredVerses ke view dengan nama $verses
        return view('content.detail-alkitab', [
            'versions' => $versions,
            'selectedVersion' => $selectedVersion,
            'bookAbbreviations' => $bookAbbreviations,
            'bookInfo' => $bookInfo,
            'verses' => $filteredVerses, // <-- Kirim $filteredVerses, tapi di view akan diakses sebagai $verses
            'versionName' => $versionName,
            'passageInput' => $originalPassage,
            'goldenVerse' => $goldenVerse,
            'note' => $note,
        ]);
    }
}
