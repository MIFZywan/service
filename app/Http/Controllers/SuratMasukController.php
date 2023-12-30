<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SuratMasukController extends Controller
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
    public function createSuratMasuk(Request $request)
    {
        $suratmasuk = SuratMasuk::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'New suratmasuk created',
            'data' => [
                'suratmasuk' => $suratmasuk
            ]
        ]);
    }

    public function getAllSurat()
    {
        $suratmasuk = SuratMasuk::all();
        return response()->json(
            [
                'success' => true,
                'message' => 'All suratmasuk grabbed',
                'data' => [
                    'suratmasuk' => $suratmasuk,
                ]
            ]
        );
    }


    public function update(Request $request, $id_kontrak)
    {
        $suratmasuk = SuratMasuk::find($id_kontrak);

        if (!$suratmasuk) {
            return response()->json([
                'success' => false,
                'message' => 'Kontrak not found',
                'data' => null
            ], 404);
        }

        $suratmasuk->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Kontrak updated',
            'data' => [
                'suratmasuk' => $suratmasuk
            ]
        ]);
    }


    public function deleteSurat(Request $request)
    {
        $suratmasuk = SuratMasuk::find($request->id_kontrak);

        if (!$suratmasuk) {
            return response()->json([
                'success' => false,
                'message' => 'SuratMasuk not found',
            ], 404);
        }

        $suratmasuk->delete();

        return response()->json([
            'success' => true,
            'message' => 'SuratMasuk deleted successfully',
        ]);
    }
}
