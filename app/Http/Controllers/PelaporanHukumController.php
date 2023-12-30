<?php

namespace App\Http\Controllers;

use App\Models\PelaporanHukum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class PelaporanHukumController extends Controller
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
    public function createPelaporanHukum(Request $request)
    {
        $pelaporanhukum = PelaporanHukum::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New PelaporanHukum created',
            'data' => [
                'pelaporanhukum' => $pelaporanhukum
            ]
        ]);
    }

    public function getAllHukum()
    {
        $pelaporanhukum = PelaporanHukum::all();
        return response()->json(
            [
                'success' => true,
                'message' => 'All pelaporanhukum grabbed',
                'data' => [
                    'pelaporanhukum' => $pelaporanhukum,
                ]
            ]
        );
    }

    public function update(Request $request, $id_hukum)
    {
        $pelaporanhukum = PelaporanHukum::find($id_hukum);

        if (!$pelaporanhukum) {
            return response()->json([
                'success' => false,
                'message' => 'Laporan not found',
                'data' => null
            ], 404);
        }

        $pelaporanhukum->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Laporan updated',
            'data' => [
                'pelaporanhukum' => $pelaporanhukum
            ]
        ]);
    }

    public function deleteHukum(Request $request)
    {
        $pelaporanhukum = PelaporanHukum::find($request->id_hukum);

        if (!$pelaporanhukum) {
            return response()->json([
                'success' => false,
                'message' => 'PelaporanHukum not found',
            ], 404);
        }

        $pelaporanhukum->delete();

        return response()->json([
            'success' => true,
            'message' => 'PelaporanHukum deleted successfully',
        ]);
    }
}
