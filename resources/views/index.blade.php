@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1>Daftar Mobil</h1>

        <form action="{{ route('search') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Cari mobil...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>

        <div class="d-flex justify-content-between mb-3">
            <a href="{{ route('create') }}" class="btn btn-primary mb-3">Tambah Mobil</a>

            @if (request()->has('keyword'))
                <i class="bi bi-chevron-double-left">
                    <a href="{{ route('index') }}" class="btn btn-primary mr-0">Back to All List</a>
                </i>
            @endif
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Merek</th>
                    <th>Model</th>
                    <th>Nomor Plat</th>
                    <th>Tarif Sewa</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mobils as $mobil)
                    <tr>
                        <td>{{ $mobil->merek }}</td>
                        <td>{{ $mobil->model }}</td>
                        <td>{{ $mobil->nomor_plat }}</td>
                        <td>{{ $mobil->tarif_sewa }}</td>
                        <td>
                            @if ($mobil->sedangDisewa())
                                <span>Disewa</span>
                            @else
                                <span>Tersedia</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('return')}}" class="btn btn-primary">Kembalikan</a>
                            {{--  <form action="{{ route('mobils.destroy', $mobil->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus mobil ini?')">Hapus</button>
                            </form>  --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        // Setelah halaman selesai dimuat, atur waktu penampilan pesan sukses
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                var successMessage = document.getElementById('success-message');
                if (successMessage) {
                    successMessage.style.display = 'none';
                }
            }, 5000); // Ubah 5000 menjadi waktu tampilan dalam milidetik (misalnya 3000 untuk 3 detik)
        });
    </script>
@endsection
