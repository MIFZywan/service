<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
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
        $karyawan = Karyawan::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New Karyawan created',
            'data' => [
                'karyawan' => $karyawan
            ]
        ], 201);
    }

    public function read($nip)
    {
        $karyawan = Karyawan::find($nip);

        if (!$karyawan) {
            return response()->json([
                'success' => false,
                'message' => 'karyawan not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'karyawan' => $karyawan
            ]
        ]);
    }

    public function readAll()
    {
        $karyawan = Karyawan::all();

        return response()->json([
            'success' => true,
            'data' => [
                'karyawan' => $karyawan
            ]
        ]);
    }

    public function update(Request $request, $nip)
    {
        $karyawan = Karyawan::find($nip);

        if (!$karyawan) {
            return response()->json([
                'success' => false,
                'message' => 'karyawan not found',
                'data' => null
            ], 404);
        }

        $karyawan->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'karyawan updated',
            'data' => [
                'karyawan' => $karyawan
            ]
        ]);
    }

    public function delete($nip)
    {
        $karyawan = Karyawan::find($nip);

        if (!$karyawan) {
            return response()->json([
                'success' => false,
                'message' => 'karyawan not found',
                'data' => null
            ], 404);
        }

        $karyawan->delete();

        return response()->json([
            'success' => true,
            'message' => 'karyawan',
            'data' => null
        ], 204);
    }
}
