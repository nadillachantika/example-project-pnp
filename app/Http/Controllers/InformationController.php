<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformationController extends Controller
{

    public function index()
    {
        $informations = Information::all();
        return view('admin.informasi.index', compact('informations'));
    }

    public function create()
    {
        return view('admin.informasi.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images/information/', $filename);

        $information = new Information();
        $information->title = $request->title;
        $information->description = $request->description;
        $information->image = $filename;


        $information->save();
        return redirect()->route('admin.informasi');
    }

    public function edit($id)
    {
        $information = Information::find($id);
        return view('admin.informasi.edit', compact('information'));
    }

    public function update(Request $request, $id)
    {
        $information = Information::find($id);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        // Simpan gambar baru jika ada yang diunggah
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/images/information/', $filename);

            // Hapus gambar lama jika ada
            if ($information->image) {
                Storage::delete('public/images/information/' . $information->image);
            }

            $information->image = $filename;
        }


        $information->title = $request->title;
        $information->description = $request->description;
        $information->save();

        return redirect()->route('admin.informasi');
    }

    public function destroy($id)
    {
        $information = Information::find($id);
        $information->delete();
        return redirect()->route('admin.informasi');
    }
}
