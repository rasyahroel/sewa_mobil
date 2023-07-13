<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Sewa;
use Illuminate\Http\Request;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mobils = Mobil::all();
        return view('sewa', compact('mobils'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'mobil_id' => 'required|exists:mobils,id',
        ]);

        $sewa = new Sewa;
        $sewa->tanggal_mulai = $validatedData['tanggal_mulai'];
        $sewa->tanggal_selesai = $validatedData['tanggal_selesai'];
        $sewa->mobil_id = $validatedData['mobil_id'];
        $sewa->save();

        $mobil = Mobil::findOrFail($validatedData['mobil_id']);

        if ($mobil->sedangDisewa()) {
            return redirect()->back()->with('error', 'Mobil sudah disewa. Pilih mobil lain.');
        }

        return redirect('/index')->with('success', 'Mobil berhasil dipesan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function returnMobil(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_plat' => 'required',
        ]);

        $mobil = Mobil::where('nomor_plat', $validatedData['nomor_plat'])->first();

        if (!$mobil) {
            return redirect()->back()->with('error', 'Mobil dengan nomor plat tersebut tidak ditemukan.');
        }

        $sewa = Sewa::where('mobil_id', $mobil->id)
            ->where('status', '!=', 'selesai')
            ->first();

        if (!$sewa) {
            return redirect()->back()->with('error', 'Mobil dengan nomor plat tersebut tidak sedang disewa.');
        }

        // Proses pengembalian mobil

        $sewa->status = 'selesai';
        $sewa->save();

        return redirect()->back()->with('success', 'Mobil telah berhasil dikembalikan.');
    }
}
