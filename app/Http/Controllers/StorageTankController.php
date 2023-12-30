<?php

namespace App\Http\Controllers;

use App\Models\StorageTank;
use Illuminate\Http\Request;

class StorageTankController extends Controller
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

    public function create(Request $request)
    {
        $storagetank = StorageTank::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New Storage Tank created',
            'data' => [
                'storagetank' => $storagetank
            ]
        ], 201);
    }

    public function read($id_tangki_penyimpanan)
    {
        $storagetank = StorageTank::find($id_tangki_penyimpanan);

        if (!$storagetank) {
            return response()->json([
                'success' => false,
                'message' => 'storage not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'storagetank' => $storagetank
            ]
        ]);
    }

    public function readAll()
    {
        $storagetank = StorageTank::all();

        return response()->json([
            'success' => true,
            'data' => [
                'storagetank' => $storagetank
            ]
        ]);
    }

    public function update(Request $request, $id_tangki_penyimpanan)
    {
        $storagetank = StorageTank::find($id_tangki_penyimpanan);

        if (!$storagetank) {
            return response()->json([
                'success' => false,
                'message' => 'Storage Tank not found',
                'data' => null
            ], 404);
        }

        $storagetank->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Product updated',
            'data' => [
                'storagetank' => $storagetank
            ]
        ]);
    }

    public function delete($id_tangki_penyimpanan)
    {
        $storagetank = StorageTank::find($id_tangki_penyimpanan);

        if (!$storagetank) {
            return response()->json([
                'success' => false,
                'message' => 'storagetank not found',
                'data' => null
            ], 404);
        }

        $storagetank->delete();

        return response()->json([
            'success' => true,
            'message' => 'storagetank',
            'data' => null
        ], 204);
    }
}
