@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Kembalikan Mobil</h1>

        <form action="{{ route('return', $sewa->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomor_plat">Nomor Plat Mobil</label>
                <input type="text" class="form-control" id="nomor_plat" name="nomor_plat" placeholder="Masukkan nomor plat mobil" required>
            </div>
            <button type="submit" class="btn btn-primary">Kembalikan</button>
        </form>
    </div>
@endsection
