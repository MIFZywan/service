<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class SuratKeluarController extends Controller
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
    public function createSuratKeluar(Request $request)
    {
        $suratkeluar = SuratKeluar::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'New suratkeluar created',
            'data' => [
                'suratkeluar' => $suratkeluar
            ]
        ]);
    }

    public function getAllSurat()
    {
        $suratkeluar = SuratKeluar::all();
        return response()->json(
            [
                'success' => true,
                'message' => 'All suratkeluar grabbed',
                'data' => [
                    'suratkeluar' => $suratkeluar,
                ]
            ]
        );
    }


    public function update(Request $request, $id_kontrak)
    {
        $suratkeluar = SuratKeluar::find($id_kontrak);

        if (!$suratkeluar) {
            return response()->json([
                'success' => false,
                'message' => 'Kontrak not found',
                'data' => null
            ], 404);
        }

        $suratkeluar->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Kontrak updated',
            'data' => [
                'suratkeluar' => $suratkeluar
            ]
        ]);
    }


    public function deleteSurat(Request $request)
    {
        $suratkeluar = SuratKeluar::find($request->id_kontrak);

        if (!$suratkeluar) {
            return response()->json([
                'success' => false,
                'message' => 'SuratKeluar not found',
            ], 404);
        }

        $suratkeluar->delete();

        return response()->json([
            'success' => true,
            'message' => 'SuratKeluar deleted successfully',
        ]);
    }
}
