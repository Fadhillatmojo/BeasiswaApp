@extends('layouts.app')

@section('title', 'Hasil Pendaftaran Beasiswa')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Hasil Pendaftaran Beasiswa</h4>
    </div>
    <div class="card-body">
        <!-- Pesan sukses setelah pendaftaran -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabel hasil pendaftaran -->
        @if(count($pendaftarans) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Nomor HP</th>
                        <th>Semester</th>
                        <th>IPK</th>
                        <th>Pilihan Beasiswa</th>
                        <th>Berkas</th>
                        <th>Status Ajuan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendaftarans as $pendaftaran)
                        <tr>
                            <td>{{ $pendaftaran->nama }}</td>
                            <td>{{ $pendaftaran->email }}</td>
                            <td>{{ $pendaftaran->nomor_hp }}</td>
                            <td>{{ $pendaftaran->semester }}</td>
                            <td>{{ $pendaftaran->ipk }}</td>
                            <td>{{ $pendaftaran->beasiswa ?? '-' }}</td>
                            <td>
                                @if($pendaftaran->berkas)
                                    <a href="{{ Storage::url($pendaftaran->berkas) }}" target="_blank">Lihat Berkas</a>
                                @else
                                    Tidak Ada Berkas
                                @endif
                            </td>
                            <td>{{ $pendaftaran->status_ajuan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada pendaftaran beasiswa yang ditemukan.</p>
        @endif
    </div>
</div>
@endsection
