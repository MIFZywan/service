<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
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
        $workshop = workshop::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'New workshop created',
            'data' => [
                'workshop' => $workshop
            ]
        ], 201);
    }

    public function read($id_workshop)
    {
        $workshop = workshop::find($id_workshop);

        if (!$workshop) {
            return response()->json([
                'success' => false,
                'message' => 'workshop not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'workshop' => $workshop
            ]
        ]);
    }

    public function readAll()
    {
        $workshop = workshop::all();

        return response()->json([
            'success' => true,
            'data' => [
                'workshop' => $workshop
            ]
        ]);
    }

    public function update(Request $request, $id_workshop)
    {
        $workshop = workshop::find($id_workshop);

        if (!$workshop) {
            return response()->json([
                'success' => false,
                'message' => 'Workshop not found',
                'data' => null
            ], 404);
        }

        $workshop->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Workshop updated',
            'data' => [
                'workshop' => $workshop
            ]
        ]);
    }

    public function delete($id_workshop)
    {
        $workshop = workshop::find($id_workshop);

        if (!$workshop) {
            return response()->json([
                'success' => false,
                'message' => 'workshop not found',
                'data' => null
            ], 404);
        }

        $workshop->delete();

        return response()->json([
            'success' => true,
            'message' => 'workshop',
            'data' => null
        ], 204);
    }
}
