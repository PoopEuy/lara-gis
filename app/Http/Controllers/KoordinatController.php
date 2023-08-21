<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Koordinat;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;


class KoordinatController extends Controller
{
    /**
     * index
     *
     * @return View
     */
    public function tabelKoordinat(): View
    {
        $data = array(
            'title' => 'Data Koordinat',
            'data_koordinat' => Koordinat::all(),
        );

        return view('master.koordinat.koordinatList', $data);
    }

    function koordinatMap(){
        $data = array(
            'title' => 'Data Koordinat',
            'data_koordinat' => Koordinat::all(),
        );

        return json_encode($data);

    }

    function store(Request $request){
      Koordinat::create([
      'nama_tempat' => $request->nama_tempat,
      'latitude' => $request->latitude,
      'longitude' => $request->longitude,


      ]);
      return redirect('/koordinat')->with('success', 'data koordinat disimpan');
   }

   // function update(Request $request, $id){
   //    Karyawan::where('id', $id)->update([
   //    'kode_karyawan' => $request->kode_karyawan_edit,
   //    'nama_karyawan' => $request->nama_karyawan_edit,
   //    'kode_cabang' => $request->selectCabang_edit,
   //    'kode_divisi' => $request->selectDivisi_edit,
   //    'kode_departemen' => $request->selectDepart_edit,
   //    ]);

   //    return redirect('/karyawan')->with('success', 'data karyawan diubah');
   // }

   // function destroy($id){
   //    Karyawan::where('id', $id)->delete();

   //    return redirect('/karyawan')->with('success', 'data karyawan dihapus');
   // }
}
