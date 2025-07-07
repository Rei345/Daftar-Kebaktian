<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Ende {{ $ende->song_number }}</title>
    </head>
<body>
    <div class="container my-4">
        <div class="card p-4">
            <h1 class="mb-3 text-primary">Buku Ende Nomor {{ $ende->song_number }}</h1>
            <h2 class="mb-4">{{ $ende->song_title }}</h2>

            {{-- Memisahkan lirik berdasarkan baris baru untuk menampilkan per bait --}}
            @php
                // Asumsi bait dipisahkan oleh dua baris baru atau lebih (\n\n)
                // Atau cukup satu baris baru jika setiap bait memang hanya satu baris
                $baits = preg_split("/\r\n|\n|\r/", $ende->song_lyric);
                // Filter bait kosong jika ada
                $baits = array_filter($baits, 'trim'); // Hapus baris yang hanya spasi
            @endphp

            @if ($baits)
                @foreach ($baits as $index => $bait)
                    <div class="mb-3">
                        <p class="verse-content">
                            <span class="verse-number">{{ $index + 1 }}.</span> {{ $bait }}
                        </p>
                    </div>
                @endforeach
            @else
                <p>Belum ada lirik untuk lagu ini.</p>
            @endif

            <div class="mt-4">
                <a href="{{ route('index.ende') }}" class="btn btn-outline-primary"><i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Ende</a>
            </div>
        </div>
    </div>

    </body>
</html>