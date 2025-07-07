<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Ibadah - {{ $ibadah->nama_minggu }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-2">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">
                <i class="fas fa-book-bible me-2"></i> ParHKI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('home.index') }}">Home Tampilan Utama</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.alkitab') }}">Alkitab</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index.ende') }}">Buku Ende</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('ibadah.index') }}">Manajemen Ibadah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Detail Ibadah: {{ $ibadah->nama_minggu }}</h4>
            </div>
            <div class="card-body">
                <p><strong>Tanggal Ibadah:</strong> {{ \Carbon\Carbon::parse($ibadah->tanggal_ibadah)->format('d F Y') }}</p>
                <p><strong>Nama Minggu:</strong> {{ $ibadah->nama_minggu }}</p>
                <p><strong>Tema Khotbah:</strong> {{ $ibadah->tema_khotbah }}</p>
                <p><strong>Versi Alkitab:</strong> 
                    @php
                        // Ambil nama versi dari collection $versions
                        $versionName = collect($versions)->firstWhere('code', $ibadah->version_code)->name ?? $ibadah->version_code;
                    @endphp
                    {{ $versionName }}
                </p>
                <p><strong>Evangelium:</strong> {{ $ibadah->evangelium }}</p>
                <p><strong>Epistel:</strong> {{ $ibadah->epistel }}</p>
                <p><strong>S.Patik:</strong> {{ $ibadah->s_patik }}</p>

                <h5 class="mt-4">Daftar Ende:</h5>
                @if (!empty($ibadah->daftar_ende))
                    <ul class="list-group list-group-flush">
                        @foreach ($ibadah->daftar_ende as $ende)
                            <li class="list-group-item">
                                @if(!empty($ende['nomor']))
                                    Nomor: <strong>{{ $ende['nomor'] }}</strong>
                                @endif
                                @if(!empty($ende['catatan']))
                                    (Catatan: {{ $ende['catatan'] }})
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p>Tidak ada daftar ende.</p>
                @endif

                <div class="mt-4">
                    <a href="{{ route('ibadah.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Ibadah
                    </a>
                    <button type="button" class="btn btn-warning edit-ibadah-btn"
                            data-bs-toggle="modal" data-bs-target="#editIbadahModal"
                            data-id="{{ $ibadah->id }}"
                            data-tanggal_ibadah="{{ $ibadah->tanggal_ibadah }}"
                            data-nama_minggu="{{ $ibadah->nama_minggu }}"
                            data-tema_khotbah="{{ $ibadah->tema_khotbah }}"
                            data-version_code="{{ $ibadah->version_code }}"
                            data-evangelium="{{ $ibadah->evangelium }}"
                            data-epistel="{{ $ibadah->epistel }}"
                            data-s_patik="{{ $ibadah->s_patik }}"
                            data-daftar_ende="{{ json_encode($ibadah->daftar_ende) }}"
                            title="Edit">
                        <i class="fas fa-edit"></i> Edit Ibadah Ini
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Anda juga perlu menyertakan modal edit dari index.blade.php di sini
         atau membuat modal terpisah jika Anda ingin mengedit dari halaman detail.
         Untuk kemudahan, lebih baik redirect ke index setelah edit dari modal. --}}
    @include('ibadah.modal_edit_create') {{-- Misal, jadikan modal sebagai partial --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Example of re-including relevant parts of the modal JS
            const editIbadahModal = document.getElementById('editIbadahModal');
            const formIbadah = document.getElementById('formIbadah');
            const modalTitle = document.getElementById('editIbadahModalLabel');
            const ibadahIdInput = document.getElementById('ibadahId');
            const formMethodInput = document.getElementById('formMethod');

            const tanggalIbadahInput = document.getElementById('tanggalIbadah');
            const namaMingguInput = document.getElementById('namaMinggu');
            const temaKhotbahInput = document.getElementById('temaKhotbah');
            const versionCodeInput = document.getElementById('version_code');
            const evangeliumInput = document.getElementById('evangelium');
            const epistelInput = document.getElementById('epistel');
            const sPatikInput = document.getElementById('sPatik');
            const endeInputsContainer = document.getElementById('endeInputsContainer');
            const addEndeRowBtn = document.getElementById('addEndeRowBtn');

            let endeItemCounter = 0; // Global counter for unique ende input names

            function addEndeItem(nomor = '', catatan = '') {
                const newIndex = endeItemCounter++;
                const endeItemDiv = document.createElement('div');
                endeItemDiv.className = 'ende-item';
                endeItemDiv.dataset.index = newIndex;

                endeItemDiv.innerHTML = `
                    <input type="text" class="form-control form-control-sm" name="daftar_ende[${newIndex}][nomor]" placeholder="Nomor Ende (ex: 74:1-2)" value="${nomor}">
                    <input type="text" class="form-control form-control-sm ms-2" name="daftar_ende[${newIndex}][catatan]" placeholder="Catatan (ex: P.Pelean 3)" value="${catatan}">
                    <div class="ende-actions ms-2">
                        <button type="button" class="btn btn-danger btn-sm remove-ende-item"><i class="fas fa-minus"></i></button>
                    </div>
                `;
                endeInputsContainer.appendChild(endeItemDiv);
                updateRemoveButtons();
            }

            function updateRemoveButtons() {
                const removeButtons = endeInputsContainer.querySelectorAll('.remove-ende-item');
                removeButtons.forEach(button => {
                    button.disabled = endeInputsContainer.children.length <= 1;
                });
            }

            function resetEndeInputs(initialData = null) {
                endeInputsContainer.innerHTML = '';
                endeItemCounter = 0;
                if (initialData && initialData.length > 0) {
                    initialData.forEach(ende => {
                        addEndeItem(ende.nomor, ende.catatan);
                    });
                } else {
                    addEndeItem();
                }
            }

            addEndeRowBtn.addEventListener('click', function() {
                addEndeItem();
            });

            endeInputsContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-ende-item') || event.target.closest('.remove-ende-item')) {
                    const itemToRemove = event.target.closest('.ende-item');
                    if (itemToRemove && endeInputsContainer.children.length > 1) {
                        itemToRemove.remove();
                        updateRemoveButtons();
                    }
                }
            });

            document.querySelectorAll('.edit-ibadah-btn').forEach(button => {
                button.addEventListener('click', function() {
                    modalTitle.textContent = 'Edit Detail Ibadah';
                    const ibadahId = this.dataset.id;
                    formIbadah.action = "{{ url('/ibadah') }}/" + ibadahId; // Ensure correct URL for update
                    formMethodInput.value = 'PUT';

                    ibadahIdInput.value = ibadahId;
                    tanggalIbadahInput.value = this.dataset.tanggal_ibadah;
                    namaMingguInput.value = this.dataset.nama_minggu;
                    temaKhotbahInput.value = this.dataset.tema_khotbah;
                    evangeliumInput.value = this.dataset.evangelium;
                    epistelInput.value = this.dataset.epistel;
                    sPatikInput.value = this.dataset.s_patik;
                    versionCodeInput.value = this.dataset.version_code;

                    const daftarEnde = JSON.parse(this.dataset.daftar_ende || '[]');
                    resetEndeInputs(daftarEnde);
                    // No need to clear validation errors here as this is a new modal open
                });
            });

            updateRemoveButtons();
        });
    </script>
</body>
</html>