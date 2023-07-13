@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pesan Mobil</h1>

        <form action="{{ route('sewa.store') }}" method="POST">
            @csrf

            <div class="form-group mt-3">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control">
            </div>

            <div class="form-group mt-3">
                <label for="tanggal_selesai">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control">
            </div>

            <div class="form-group mt-3">
                <label for="mobil_id">Mobil</label>
                <select name="mobil_id" id="mobil_id" class="form-control">
                    <option value="">Pilih Mobil</option>
                    @foreach ($mobils as $mobil)
                        <option value="{{ $mobil->id }}">{{ $mobil->merek }} - {{ $mobil->model }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Pesan</button>
        </form>
    </div>
@endsection
