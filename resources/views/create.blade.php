@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Mobil Baru</h1>

        <form action="{{ route('mobils.store') }}" method="POST">
            @csrf

            <div class="form-group mt-3">
                <label for="merek">Merek</label>
                <input type="text" name="merek" id="merek" class="form-control">
            </div>

            <div class="form-group mt-3">
                <label for="model">Model</label>
                <input type="text" name="model" id="model" class="form-control">
            </div>

            <div class="form-group mt-3">
                <label for="nomor_plat">Nomor Plat</label>
                <input type="text" name="nomor_plat" id="nomor_plat" class="form-control">
            </div>

            <div class="form-group mt-3">
                <label for="tarif_sewa">Tarif Sewa</label>
                <input type="number" name="tarif_sewa" id="tarif_sewa" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection
