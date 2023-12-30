<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class KategoriController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function create(Request $request)
    {
        $Kategori = Kategori::with('akun')->create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New Kategori created',
            'data' => [
                'kategori' => $Kategori
            ]
        ]);
    }

    public function getAll()
    {
        $Kategori = Kategori::with('akun')->get();
        if (!$Kategori) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        return response()->json(
            [
                'success' => true,
                'message' => 'All Data grabbed',
                'data' => [
                    'kategori' => $Kategori
                ]
            ]
        );
    }

    public function getid($id_kategori)
    {
        $Kategori = Kategori::with('akun')->find($id_kategori);

        if (!$Kategori) {
            return response()->json([
                'success' => false,
                'message' => 'storage not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'kategori' => $Kategori
            ]
        ]);
    }

    public function update(Request $request, $id_kategori)
    {
        $Kategori = Kategori::with('akun')->find($id_kategori);

        if (!$Kategori) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        $Kategori->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data updated',
            'data' => [
                'kategori' => $Kategori
            ]
        ]);
    }

    public function delete(Request $request)
    {
        $Kategori = Kategori::find($request->id_kategori);

        if (!$Kategori) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $Kategori->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully',
        ]);
    }
}
