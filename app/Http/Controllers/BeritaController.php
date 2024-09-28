<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $data = Berita::all();

        if ($data->count() > 0) {
            return response()->json([
                'success' => true,
                'message' => 'berita ditemukan',
                'data'    => $data
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'berita tidak ditemukan',
                'data'    => ''
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $data = Berita::create([
            'judul'             => $request->judul,
            'konten'            => $request->konten,
            'penulis'           => $request->penulis,
            'tanggal_terbit'    => Carbon::now()->toDateString()
        ]);

        if ($data) {
            return response()->json([
                'success' => true,
                'message' => 'berita ditambahkan',
                'data'    => $data
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'berita gagal ditambahkan',
                'data'    => ''
            ], 500);
        }
    }

    public function destroy($id)
    {
        $data = Berita::find($id);

        if ($data) {
            $data->delete();
            return response()->json([
                'success' => true,
                'message' => 'berita dihapus',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'berita tidak ditemukan',
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $data = Berita::find($id);

        if ($data) {
            $response = $data->update([
                'judul'             => $request->judul,
                'konten'            => $request->konten,
                'penulis'           => $request->penulis,
                'tanggal_terbit'    => Carbon::now()->toDateString()
            ]);

            return response()->json([
                "success"   =>  true,
                "message"   =>  "Berita berhasil di update!",
                "data"      =>  $data
            ], 200);
        } else {
            return response()->json([
                "success"   => false,
                "message"   => "Data tidak ditemukan"
            ], 404);
        }
    }
}
