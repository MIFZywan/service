<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;


class AkunController extends Controller
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
        $Akun = Akun::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New Akun created',
            'data' => [
                'Akun' => $Akun
            ]
        ]);
    }

    public function getAll()
    {
        $Akun = Akun::all();
        if (!$Akun) {
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
                    'akun' => $Akun
                ]
            ]
        );
    }
    public function getid($id_akun)
    {
        $Akun = Akun::find($id_akun);

        if (!$Akun) {
            return response()->json([
                'success' => false,
                'message' => 'storage not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'akun' => $Akun
            ]
        ]);
    }

    public function update(Request $request, $id_akun)
    {
        $Akun = Akun::find($id_akun);

        if (!$Akun) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        $Akun->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data updated',
            'data' => [
                'akun' => $Akun
            ]
        ]);
    }


    public function delete(Request $request)
    {
        $Akun = Akun::find($request->id_akun);

        if (!$Akun) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $Akun->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully',
        ]);
    }
}
