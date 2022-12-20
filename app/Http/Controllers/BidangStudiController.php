<?php

namespace App\Http\Controllers;

use App\Models\BidangStudi;
use Illuminate\Http\Request;

class BidangStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // Menampilkan data Seluruh Bidang Studi
        $bidstudi = BidangStudi::all();
        return view('bidangstudi.index', ['bidstudi' => $bidstudi]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Menampilkan Form Tambah Bidang Studi
        return view('bidangstudi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Menyimpan Data Bidang Studi
        $request->validate([
            'bidangstudi' => 'required|unique:bidangstudi,bidangstudi',
        ]);

        $array = $request->only(['bidangstudi']);
        $bidstudi = BidangStudi::create($array);

        return redirect()->route('bidstudi.index')->with('success_message', 'Berhasil Menambahkan Data Bidang Studi ' . $bidstudi->bidangstudi);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Menampilkan Form Edit Bidang Studi
        $bidstudi = BidangStudi::findOrFail($id);

        if ($bidstudi) {
            return view('bidangstudi.edit', ['bidstudi' => $bidstudi]);
        } else {
            return redirect()->route('bidstudi.index')->with('error_message', 'Data Bidang Studi'. $id .'Tidak Ditemukan');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Mengupdate Data Bidang Studi
        $request->validate([
            'bidangstudi' => 'required|unique:bidangstudi,bidangstudi', // bidangstudi = nama kolom, bidangstudi = nama field
        ]);
        $bidstudi = BidangStudi::findOrFail($id);
        $bidstudi->bidangstudi = $request->bidangstudi;
        $bidstudi->save();

        return redirect()->route('bidstudi.index')->with('success_message', 'Berhasil Mengupdate Data Bidang Studi '. $bidstudii->bidangstudi);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Menghapus Bidang Studi
        $bidstudi = BidangStudi::findOrFail($id);
        $bidstudi->delete();

        return redirect()->route('bidstudi.index')->with('success_message', 'Berhasil Menghapus Data Bidang Studi '. $bidstudi->bidangstudi);
    }
}
