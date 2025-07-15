<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Ibadah - ParHKI Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body { background-color: #f8f9fa; }
        .table-responsive { overflow-x: auto; }
        .table th, .table td { vertical-align: middle; }

        /* Custom button for Add (Btn) */
        .Btn {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 45px;
            height: 45px;
            border-radius: calc(45px/2);
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background: linear-gradient(144deg,#af40ff,#5b42f3 50%,#00ddeb);
        }

        .sign {
            width: 100%;
            font-size: 2.2em;
            color: white;
            transition-duration: .3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .text {
            position: absolute;
            right: 0%;
            width: 0%;
            opacity: 0;
            color: white;
            font-size: 1.4em;
            font-weight: 500;
            transition-duration: .3s;
            white-space: nowrap;
        }

        .Btn:hover {
            width: 125px;
            transition-duration: .3s;
        }

        .Btn:hover .sign {
            width: 30%;
            transition-duration: .3s;
            padding-left: 15px;
        }

        .Btn:hover .text {
            opacity: 1;
            width: 70%;
            transition-duration: .3s;
            padding-right: 15px;
        }

        .Btn:active {
            transform: translate(2px ,2px);
        }

        /* Styles for action buttons to make them cohesive */
        .action-buttons {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }
        .action-buttons .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.8rem;
        }

        /* Modal specific styles */
        .modal-header.bg-primary {
            background: linear-gradient(144deg,#af40ff,#5b42f3 50%,#00ddeb) !important;
            color: white; /* Ensure text is white */
        }
        .modal-header .btn-close-white {
            /* This might not be needed if btn-close automatically adapts to dark background,
               but keeps it as a fallback if you need to manually invert the close icon color */
            filter: invert(1) grayscale(100%) brightness(200%);
        }
        .ende-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
        }
        .ende-item .form-control {
            flex-grow: 1;
            margin-right: 0.5rem;
        }
        .ende-actions {
            display: flex;
            gap: 0.25rem;
        }

        /* Styling for validation errors directly below input */
        .is-invalid + .invalid-feedback {
            display: block;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm py-2">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-book-bible me-2"></i> ParHKI
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Daftar Data Ibadah</h2>

            <button class="Btn" id="createIbadahBtn" data-bs-toggle="modal" data-bs-target="#editIbadahModal">
                <div class="sign">+</div>
                <div class="text">Tambah</div>
            </button>
        </div>

        {{-- Alert untuk Success, Error, dan Validation Errors --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ada kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error_book_list'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('error_book_list') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th style="width: 150px;">Tanggal</th>
                                <th>Nama Minggu</th>
                                <th>Tema Khotbah</th> 
                                <th style="width: 250px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($ibadahs as $ibadah)
                                <tr>
                                    <td>{{ $loop->iteration + ($ibadahs->currentPage() - 1) * $ibadahs->perPage() }}</td>
                                    <td>{{ \Carbon\Carbon::parse($ibadah->tanggal_ibadah)->format('d F Y') }}</td>
                                    <td>{{ $ibadah->nama_minggu }}</td>
                                    <td>{{ Str::limit($ibadah->tema_khotbah, 70, '...') }}</td>
                                    <td>
                                        <div class="action-buttons">
                                            <a href="{{ route('ibadah.show', $ibadah->id) }}" class="btn btn-info btn-sm" title="Lihat Detail">
                                                <i class="fas fa-eye"></i> Lihat
                                            </a>

                                            {{-- Tombol Edit --}}
                                            <button type="button" class="btn btn-warning btn-sm edit-ibadah-btn"
                                                    data-bs-toggle="modal" data-bs-target="#editIbadahModal"
                                                    data-id="{{ $ibadah->id }}"
                                                    data-tanggal_ibadah="{{ \Carbon\Carbon::parse($ibadah->tanggal_ibadah)->format('Y-m-d') }}"
                                                    data-nama_minggu="{{ $ibadah->nama_minggu }}"
                                                    data-tema_khotbah="{{ $ibadah->tema_khotbah }}"
                                                    data-version_code="{{ $ibadah->version_code }}"
                                                    data-evangelium="{{ $ibadah->evangelium }}"
                                                    data-epistel="{{ $ibadah->epistel }}"
                                                    data-s_patik="{{ $ibadah->s_patik }}"
                                                    data-daftar_ende="{{ json_encode($ibadah->daftar_ende) }}"
                                                    title="Edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>

                                            {{-- Tombol Hapus --}}
                                            <form action="{{ route('ibadah.destroy', $ibadah->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="hapus btn btn-danger btn-sm" title="Hapus">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4">Tidak ada data ibadah ditemukan. <a href="#" id="createNoDataLink">Tambahkan yang pertama!</a></td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    {{ $ibadahs->links() }} {{-- Pagination links --}}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal untuk Tambah/Edit Ibadah --}}
    <div class="modal fade" id="editIbadahModal" tabindex="-1" aria-labelledby="editIbadahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="formIbadah" action="" method="POST">
                    @csrf
                    {{-- Hidden input for PUT method, will be added/removed by JS --}}
                    <input type="hidden" name="_method" id="formMethod" value="POST">

                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="editIbadahModalLabel">Tambah Data Ibadah Baru</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="ibadah_id" id="ibadahId"> {{-- Hidden field to store ibadah ID for updates --}}

                        <div class="mb-3">
                            <label for="tanggalIbadah" class="form-label">Tanggal Ibadah</label>
                            <input type="date" class="form-control @error('tanggal_ibadah') is-invalid @enderror" id="tanggalIbadah" name="tanggal_ibadah" required value="{{ old('tanggal_ibadah') }}">
                            @error('tanggal_ibadah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="namaMinggu" class="form-label">Nama Minggu</label>
                            <input type="text" class="form-control @error('nama_minggu') is-invalid @enderror" id="namaMinggu" name="nama_minggu" placeholder="Contoh: II Dung Epiphanias" required value="{{ old('nama_minggu') }}">
                            @error('nama_minggu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="temaKhotbah" class="form-label">Tema Khotbah</label>
                            <textarea class="form-control @error('tema_khotbah') is-invalid @enderror" id="temaKhotbah" name="tema_khotbah" rows="3" placeholder="Masukkan tema ibadah di sini" required>{{ old('tema_khotbah') }}</textarea>
                            @error('tema_khotbah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <label for="version_code" class="form-label me-2 mb-0 text-nowrap">Pilih Bahasa/Versi Alkitab:</label>
                            <select class="form-select @error('version_code') is-invalid @enderror" id="version_code" name="version_code">
                                @foreach ($versions as $code => $name) {{-- <--- Ubah di sini! --}}
                                    <option value="{{ $code }}" {{ old('version_code', $selectedVersion) == $code ? 'selected' : '' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('version_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="evangelium" class="form-label">Evangelium</label>
                            <input type="text" class="form-control @error('evangelium') is-invalid @enderror" id="evangelium" name="evangelium" placeholder="Contoh: Yohanes 1 : 43-51" required value="{{ old('evangelium') }}">
                            @error('evangelium')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="epistel" class="form-label">Epistel</label>
                            <input type="text" class="form-control @error('epistel') is-invalid @enderror" id="epistel" name="epistel" placeholder="Contoh: 1 Samuel 3 : 1-10 (AO : 10)" required value="{{ old('epistel') }}">
                            @error('epistel')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sPatik" class="form-label">S.Patik</label>
                            <input type="text" class="form-control @error('s_patik') is-invalid @enderror" id="sPatik" name="s_patik" placeholder="Contoh: Mazmur 2 : 10-11" required value="{{ old('s_patik') }}">
                            @error('s_patik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Daftar Ende</label>
                            <div id="endeInputsContainer">
                                {{-- Ende inputs will be dynamically added here by JavaScript --}}
                                {{-- Jika ada error validasi, isi kembali dari old('daftar_ende') --}}
                                @if(old('daftar_ende'))
                                    @foreach(old('daftar_ende') as $index => $endeItem)
                                        <div class="ende-item" data-index="{{ $index }}">
                                            <input type="text" class="form-control form-control-sm @error("daftar_ende.{$index}.nomor") is-invalid @enderror" name="daftar_ende[{{ $index }}][nomor]" placeholder="Nomor Ende (ex: 74:1-2)" value="{{ $endeItem['nomor'] ?? '' }}">
                                            <input type="text" class="form-control form-control-sm ms-2 @error("daftar_ende.{$index}.catatan") is-invalid @enderror" name="daftar_ende[{{ $index }}][catatan]" placeholder="Catatan (ex: P.Pelean 3)" value="{{ $endeItem['catatan'] ?? '' }}"> {{-- <--- PERBAIKAN DI SINI --}}
                                            <div class="ende-actions ms-2">
                                                <button type="button" class="btn btn-danger btn-sm remove-ende-item"><i class="fas fa-minus"></i></button>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    {{-- Initial empty row will be added by JS if no old data --}}
                                @endif
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="addEndeRowBtn">
                                <i class="fas fa-plus"></i> Tambah Baris Ende
                            </button>
                            @error('daftar_ende')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            @error('daftar_ende.*.nomor')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            @error('daftar_ende.*.catatan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

            let endeItemCounter = {{ old('daftar_ende') ? count(old('daftar_ende')) : 0 }}; // Initialize with count of old data

            function addEndeItem(nomor = '', catatan = '', indexOverride = null) {
                const newIndex = indexOverride !== null ? indexOverride : endeItemCounter++;
                const endeItemDiv = document.createElement('div');
                endeItemDiv.className = 'ende-item';
                endeItemDiv.dataset.index = newIndex;

                endeItemDiv.innerHTML = `
                    <input type="text" class="form-control form-control-sm" name="daftar_ende[${newIndex}][nomor]" placeholder="Nomor Ende (ex: 74:1-2)" value="${nomor || ''}">
                    <input type="text" class="form-control form-control-sm ms-2" name="daftar_ende[${newIndex}][catatan]" placeholder="Catatan (ex: P.Pelean 3)" value="${catatan || ''}">
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

            // Function to reset and (conditionally) initialize ende inputs
            function resetEndeInputs(initialData = null) {
                endeInputsContainer.innerHTML = ''; // Clear previous
                endeItemCounter = 0; // Reset counter

                if (initialData && initialData.length > 0) {
                    initialData.forEach(ende => {
                        addEndeItem(ende.nomor, ende.catatan);
                    });
                } else {
                    addEndeItem(); // Add one empty row by default
                }
            }

            // Event listener for adding new ende row
            addEndeRowBtn.addEventListener('click', function() {
                addEndeItem();
            });

            // Event listener for removing ende row (delegated)
            endeInputsContainer.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-ende-item') || event.target.closest('.remove-ende-item')) {
                    const itemToRemove = event.target.closest('.ende-item');
                    if (itemToRemove && endeInputsContainer.children.length > 1) { // Prevent removing last item
                        itemToRemove.remove();
                        updateRemoveButtons();
                    }
                }
            });

            // Event listener for "Tambah Data Ibadah Baru" button
            document.getElementById('createIbadahBtn').addEventListener('click', function() {
                modalTitle.textContent = 'Tambah Data Ibadah Baru';
                formIbadah.action = "{{ route('ibadah.store') }}"; // Route for storing new data
                formMethodInput.value = 'POST'; // Set method to POST

                // Clear all form fields
                formIbadah.reset();
                ibadahIdInput.value = ''; // Ensure ID is empty for new record
                resetEndeInputs(); // Ensure at least one empty ende row
                clearValidationErrors(); // Clear any previous validation errors
            });

            // Event listener for "Edit" buttons
            document.querySelectorAll('.edit-ibadah-btn').forEach(button => {
                button.addEventListener('click', function() {
                    modalTitle.textContent = 'Edit Detail Ibadah';
                    const ibadahId = this.dataset.id;
                    formIbadah.action = `/ibadah/${ibadahId}`; // Route for updating data
                    formMethodInput.value = 'PUT'; // Set method to PUT

                    ibadahIdInput.value = ibadahId;
                    tanggalIbadahInput.value = this.dataset.tanggal_ibadah;
                    namaMingguInput.value = this.dataset.nama_minggu;
                    temaKhotbahInput.value = this.dataset.tema_khotbah;
                    evangeliumInput.value = this.dataset.evangelium;
                    epistelInput.value = this.dataset.epistel;
                    sPatikInput.value = this.dataset.s_patik;
                    versionCodeInput.value = this.dataset.version_code;

                    const daftarEnde = JSON.parse(this.dataset.daftar_ende || '[]');
                    resetEndeInputs(daftarEnde); // Populate with existing data
                    clearValidationErrors(); // Clear any previous validation errors
                });
            });

            // Handle the "Tambahkan yang pertama!" link if no data
            const createNoDataLink = document.getElementById('createNoDataLink');
            if (createNoDataLink) {
                createNoDataLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    // Simulate click on the create button to open modal
                    document.getElementById('createIbadahBtn').click();
                });
            }

            // Function to clear validation errors and classes
            function clearValidationErrors() {
                document.querySelectorAll('.is-invalid').forEach(element => {
                    element.classList.remove('is-invalid');
                });
                document.querySelectorAll('.invalid-feedback').forEach(element => {
                    element.remove(); // Remove dynamically added feedback
                });
                // Also clear the general error alert if it's there
                const generalErrorAlert = document.querySelector('.alert-danger');
                if (generalErrorAlert) {
                    generalErrorAlert.remove();
                }
            }

            // If there are validation errors from a failed submission, re-open the modal
            // and populate fields with old input
            @if ($errors->any() || session('error'))
                document.addEventListener('DOMContentLoaded', function() {
                    const editIbadahModalElement = document.getElementById('editIbadahModal');
                    const modalInstance = new bootstrap.Modal(editIbadahModalElement);
                    modalInstance.show();

                    // Adjust modal title and form action based on whether an ID was submitted (for edit)
                    // or if it was a new creation attempt
                    const oldIbadahId = "{{ old('ibadah_id') }}"; // Get the ID that might have failed validation
                    if (oldIbadahId) {
                        modalTitle.textContent = 'Edit Detail Ibadah';
                        formIbadah.action = `/ibadah/${oldIbadahId}`;
                        formMethodInput.value = 'PUT';
                        ibadahIdInput.value = oldIbadahId;
                    } else {
                        modalTitle.textContent = 'Tambah Data Ibadah Baru';
                        formIbadah.action = "{{ route('ibadah.store') }}";
                        formMethodInput.value = 'POST';
                        ibadahIdInput.value = '';
                    }

                    // Populate ende inputs from old data if validation failed
                    const oldDaftarEnde = @json(old('daftar_ende'));
                    if (oldDaftarEnde) {
                        resetEndeInputs(oldDaftarEnde);
                    } else {
                        // If no old daftar_ende but there's a validation error, still ensure one empty row
                        resetEndeInputs();
                    }

                    // Add is-invalid class to fields that had validation errors
                    @foreach ($errors->keys() as $key)
                        @php
                            // Handle array fields like daftar_ende.*.nomor
                            $fieldName = str_replace(['.', '*'], ['\\.', ''], $key);
                        @endphp
                        const errorInput = document.querySelector('[name="{{ $fieldName }}"]');
                        if (errorInput) {
                            errorInput.classList.add('is-invalid');
                        }
                    @endforeach
                });
            @endif

            // Ensure the initial state of remove buttons is correct when page loads
            updateRemoveButtons();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            document.querySelectorAll(".hapus").forEach((button) => {
                button.addEventListener("click", (event) => {
                    event.preventDefault(); // Menghentikan submit form default

                    const form = button.closest('form'); // Dapatkan form terdekat dari tombol

                    Swal.fire({
                        title: "Apakah kamu yakin?",
                        text: "Kamu akan menghapus data ini",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Ya, Hapus saja!",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                            Swal.fire({
                                title: "Dihapus!",
                                text: "Data berhasil dihapus.",
                                icon: "success"
                            });
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>
