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

//     function store(Request $request){
//       Koordinat::create([
//       'nama_tempat' => $request->nama_tempat,
//       'latitude' => $request->latitude,
//       'longitude' => $request->longitude,


//       ]);
//       return redirect('/tabelKoordinat')->with('success', 'data koordinat disimpan');
//    }

public function store(Request $request)
{
    // Validate the form data, including the image
    $request->validate([
        'nama_tempat' => 'required|string|max:255',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');

        // Generate a unique identifier (UUID)
        $uniqueIdentifier = \Illuminate\Support\Str::uuid()->toString();

        // Create a custom file name based on location data and the unique identifier
        $imageName = \Illuminate\Support\Str::slug($request->nama_tempat) . '-' . $uniqueIdentifier . '.' . $image->getClientOriginalExtension();

        // Store the image with the custom file name
        $imagePath = $image->storeAs('koordinat_images', $imageName, 'public');

        // Create a new Koordinat record with the uploaded image path
        Koordinat::create([
            'nama_tempat' => $request->nama_tempat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => $imagePath, // Store the image path in the database
        ]);

        return redirect('/tabelKoordinat')->with('success', 'Data koordinat disimpan');
    }

    // If the image upload fails, return an error message or response.
    return redirect()->back()->with('error', 'Image upload failed');
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
