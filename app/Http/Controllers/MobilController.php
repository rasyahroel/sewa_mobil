<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'nomor_plat' => 'required|unique:mobils',
            'tarif_sewa' => 'required',
        ]);

        Mobil::create($validatedData);

        Session::flash('success', 'Mobil baru berhasil ditambahkan.');

        return redirect('/index');
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

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $mobils = Mobil::where('merek', 'like', "%$keyword%")
            ->orWhere('model', 'like', "%$keyword%")
            ->orWhere('nomor_plat', 'like', "%$keyword%")
            ->orWhere('tarif_sewa', 'like', "%$keyword%")
            ->get();

        return view('index', compact('mobils'));
    }
}
