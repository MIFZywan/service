<?php

namespace App\Http\Controllers;

use App\Models\Kesehatan;
use Illuminate\Http\Request;

class KesehatanController extends Controller
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
        $kesehatan = Kesehatan::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New Data created',
            'data' => [
                'kesehatan' => $kesehatan
            ]
        ], 201);
    }

    public function read($id_kesehatan)
    {
        $kesehatan = Kesehatan::find($id_kesehatan);

        if (!$kesehatan) {
            return response()->json([
                'success' => false,
                'message' => 'Data Kesehatan not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'kesehatan' => $kesehatan
            ]
        ]);
    }

    public function readAll()
    {
        $kesehatan = Kesehatan::all();

        return response()->json([
            'success' => true,
            'data' => [
                'kesehatan' => $kesehatan
            ]
        ]);
    }

    public function update(Request $request, $id_kesehatan)
    {
        $kesehatan = Kesehatan::find($id_kesehatan);

        if (!$kesehatan) {
            return response()->json([
                'success' => false,
                'message' => 'Data Kesehatan not found',
                'data' => null
            ], 404);
        }

        $kesehatan->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data Kesehatan updated',
            'data' => [
                'kesehatan' => $kesehatan
            ]
        ]);
    }

    public function delete($id_kesehatan)
    {
        $kesehatan = Kesehatan::find($id_kesehatan);

        if (!$kesehatan) {
            return response()->json([
                'success' => false,
                'message' => 'Data Kesehatan not found',
                'data' => null
            ], 404);
        }

        $kesehatan->delete();

        return response()->json([
            'success' => true,
            'message' => 'kesehatan',
            'data' => null
        ], 204);
    }
}
