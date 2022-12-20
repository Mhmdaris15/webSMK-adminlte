<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StandarKompetensi;
use App\Models\BidangStudi;

class StandarKompetensiController extends Controller
{
    // Menampilkan Data Standar Kompetensi
    public function index(){
        $standkom = StandarKompetensi::all();
        return view('standarkompetensi.index', ['standkom' => $standkom]);
    }

    public function create(){
        return view('standarkompetensi.create', [
            'bidstudi' => BidangStudi::all() // Mengirimkan Data Bidang Studi
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'standarkompetensi' => 'required|unique:standarkompetensi,standarkompetensi',
            'kdbidstudi' => 'required'
        ]);

        $array = $request->only(['standarkompetensi', 'kdbidstudi']);
        $standkom = StandarKompetensi::create($array);

        return redirect()->route('standkomp.index')->with('success_message', 'Berhasil Menambahkan Data Standar Kompetensi ' . $standkom->standarkompetensi);
    }

    public function edit($id){
        $standkom = StandarKompetensi::findOrFail($id);

        if(!$standkom) return redirect()->route('standkomp.index')->with('error_message', 'Data Standar Kompetensi dengan ID ' . $id . ' Tidak Ditemukan');

        return view('standarkompetensi.edit', [
            'standkom' => $standkom,
            'bidstudi' => BidangStudi::all()
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'standarkompetensi' => 'required|unique:standarkompetensi,standarkompetensi,' . $id,
            'kdbidstudi' => 'required'
        ]);

        $standkom = StandarKompetensi::findOrFail($id);

        if(!$standkom) return redirect()->route('standkomp.index')->with('error_message', 'Data Standar Kompetensi dengan ID ' . $id . ' Tidak Ditemukan');

        $standkom->update($request->only(['standarkompetensi', 'kdbidstudi']));

        return redirect()->route('standkomp.index')->with('success_message', 'Berhasil Mengubah Data Standar Kompetensi ' . $standkom->standarkompetensi);
    }

    public function destroy(Request $request, $id){
//        Menghapus Standar Kompetensi
        $standkom = StandarKompetensi::findOrFail($id);
        if ($standkom) $standkom->delete();

        return redirect()->route('standkomp.index')->with('success_message', 'Berhasil Menghapus Data Standar Kompetensi ' . $standkom->standarkompetensi);
    }

}

