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
            'geojsonIo' => 'http://geojson.io/#map=14.92/-6.59645/106.79497',
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
      return redirect('/tabelKoordinat')->with('success', 'data koordinat disimpan');
   }

   function update(Request $request, $id){
      Koordinat::where('id', $id)->update([
      'nama_tempat' => $request->nama_tempat_edit,
      'longitude' => $request->longitude_edit,
      'latitude' => $request->latitude_edit,
      ]);

      return redirect('/tabelKoordinat')->with('success', 'data koordinat diubah');
   }

   function destroy($id){
      Koordinat::where('id', $id)->delete();

      return redirect('/tabelKoordinat')->with('success', 'data karyawan dihapus');
   }
}
