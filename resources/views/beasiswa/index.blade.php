@extends('layouts.app')

@section('title', 'Form Pendaftaran Beasiswa')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Form Pendaftaran Beasiswa</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('beasiswa.daftar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Masukkan Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Masukkan Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="nomor_hp" class="form-label">Nomor HP</label>
                    <input type="text" name="nomor_hp" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="semester" class="form-label">Semester Saat Ini</label>
                    <select name="semester" class="form-control" required>
                        <option value="">Pilih</option>
                        @for ($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ipk" class="form-label">IPK Terakhir</label>
                    <input type="text" name="ipk" class="form-control" readonly value="3.4">
                </div>

                <div class="mb-3">
                    <label for="beasiswa" class="form-label">Pilihan Beasiswa</label>
                    <select name="beasiswa" class="form-control" required>
                        <option value="">Pilih Beasiswa</option>
                        <option value="Akademik">Beasiswa Akademik</option>
                        <option value="Non-Akademik">Beasiswa Non-Akademik</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="berkas" class="form-label">Upload Berkas Syarat</label>
                    <input type="file" name="berkas" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Daftar</button>
                <button type="reset" class="btn btn-secondary">Batal</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <!-- Script untuk validasi IPK dan menonaktifkan elemen -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ipkInput = document.querySelector('input[name="ipk"]');
            const beasiswaSelect = document.querySelector('select[name="beasiswa"]');
            const berkasInput = document.querySelector('input[name="berkas"]');
            const daftarButton = document.querySelector('button[type="submit"]');

            const checkIPK = () => {
                const ipkValue = parseFloat(ipkInput.value);
                // Jika IPK di bawah 3, nonaktifkan pilihan beasiswa, berkas, dan tombol daftar
                if (ipkValue < 3) {
                    beasiswaSelect.disabled = true;
                    berkasInput.disabled = true;
                    daftarButton.disabled = true;
                } else {
                    // Jika IPK >= 3, aktifkan semuanya
                    beasiswaSelect.disabled = false;
                    berkasInput.disabled = false;
                    daftarButton.disabled = false;
                }
            };

            // Panggil fungsi checkIPK saat halaman dimuat dan setiap kali IPK diubah
            ipkInput.addEventListener('input', checkIPK);
            checkIPK(); // Panggil fungsi saat halaman pertama kali dimuat
        });
    </script>
@endsection
